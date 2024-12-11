<?php

namespace App\Http\Controllers;

use App\Notifications\NotifikasiTiket;
use Illuminate\Http\Request;

use App\Models\Tiket;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Departemen;

class AdminController extends Controller
{
    public function indexAdmin()
    {
        $admin = User::with(['role', 'departemen'])
            ->whereHas('role', function($query) {
                $query->where('role', 'Admin');
            })
            ->orderByRaw("CAST(SUBSTRING(user_id, 2) AS UNSIGNED)")
            ->get();

        return view('v_user.index.admin', [
            'title' => 'Daftar Admin',
            'admin' => $admin
        ]);
    }

    public function indexKaryawan() {
        $karyawan = User::with(['role', 'departemen'])
            ->whereHas('role', function($query) {
                $query->where('role', 'Karyawan');
            })
            ->orderByRaw("CAST(SUBSTRING(user_id, 2) AS UNSIGNED)")
            ->get();

        return view('v_user.index.karyawan', [
            'title' => 'Daftar Karyawan',
            'karyawan' => $karyawan,
        ]);
    }

    public function indexTeknisi() {
        $teknisi = User::with(['role', 'spesialis', 'departemen'])
            ->whereHas('role', function($query) {
                $query->where('role', 'Teknisi');
            })
            ->orderByRaw("CAST(SUBSTRING(user_id, 2) AS UNSIGNED)")
            ->get();

        return view('v_user.index.teknisi', [
            'title' => 'Daftar Teknisi',
            'teknisi' => $teknisi,
        ]);
    }
    
    public function indexTiket(Request $request) {
        // Ambil query dari search
        $cari = $request->input('search');
        $kategori = $request->input('kategori');
        $status = $request->input('status');

        $tiketQuery = Tiket::with(['user', 'kategori', 'teknisi']);

        if($cari) {
            $tiketQuery->where(function($query) use ($cari) {
                $query->where('tiket_id', 'like', "%$cari%")
                    ->orWhereHas('user', function($q) use ($cari) {
                        $q->where('nama', 'like', "%$cari%");
                    })
                    ->orWhereHas('kategori', function($q) use ($cari) {
                        $q->where('kategori', 'like', "%$cari%");
                    });
            });
        }

        if($kategori) {
            $tiketQuery->where('kategori_id', $kategori);
        }

        if($status) {
            $tiketQuery->where('status', $status);
        }


        $tiket = $tiketQuery->orderBy('tanggal_lapor', 'desc')->paginate(10);

        $teknisi = User::whereHas('role', function($query) {
            $query->where('role', 'Teknisi');
        })->get(['user_id', 'nama', 'spesialis_id']);

        $kategoris = Kategori::all();

        return view('v_tiket.index', [
            'title' => 'Daftar Tiket',
            'teknisis' => $teknisi,
            'tikets' => $tiket,
            'kategoris' => $kategoris
        ]);
    }

    public function teruskanTiket(Request $request, $id) {
        $request->validate([
            'teknisi_id' => 'required|exists:user,user_id'
        ]);

        $tiket = Tiket::findOrFail($id);
        $tiket->update([
            'teknisi_id' => $request->teknisi_id,
            'status' => 'Progress'
        ]);

        $teknisi = User::findOrFail($request->teknisi_id);

        // Pesan Notifikasi
        $message = $tiket->deskripsi;
        $teknisi->notify(new NotifikasiTiket($message, $tiket));

        return redirect()->route('admin.list-tiket')->with('success', 'Tiket berhasil diteruskan ke teknisi');
    }
    
    public function detailTiket($id) {
        $tiket = Tiket::with(['user', 'kategori', 'teknisi', 'foto', 'note'])->findOrFail($id);
        
        return view('v_tiket.detail', [
            'title' => 'Detail Tiket',
            'tiket' => $tiket,
        ]);
    }

    public function formTiket() {
        return view('v_laporan.form', [
            'title' => 'Laporan Tiket'
        ]);
    }
    
    public function printTiket(Request $request) {
        $tanggalAwal = $request->tanggal_awal;
        $tanggalAkhir = $request->tanggal_akhir;

        $printTiket = Tiket::with(['user', 'teknisi', 'kategori'])
            ->whereBetween('tanggal_lapor', [$tanggalAwal, $tanggalAkhir])
            ->get();
        
        return view('v_laporan.print', [
            'title' => 'Laporan Data Tiket',
            'tanggalAwal' => $tanggalAwal,
            'tanggalAkhir' => $tanggalAkhir,
            'cetak' => $printTiket
        ]);
    }

    public function listDepartemen() {
        $departemen = Departemen::all();

        return view('v_departemen.index', [
            'title' => 'Daftar Departemen',
            'departemen' => $departemen
        ]);
    }

    public function tambahDepartemen(Request $request){
    $request->validate([
        'departemen_id' => 'nullable|max:5|unique:departemen,departemen_id',
        'nama_departemen' => 'required|max:25'
    ], [
        'nama_departemen.required' => 'Nama Departemen tidak boleh kosong',
        'departemen_id.unique' => 'Kode Departemen sudah digunakan'
    ]);

    if (empty($request->departemen_id)) {
        $lastId = Departemen::orderBy('departemen_id', 'desc')->first();
        
        if (!$lastId) {
            $newId = 'DP101';
        } else {
            $lastIdNumber = (int)substr($lastId->departemen_id, 2); 
            $newIdNumber = $lastIdNumber + 1;
            $newId = 'DP' . str_pad($newIdNumber, 3, '0', STR_PAD_LEFT);
        }
    } else {
        $newId = $request->departemen_id;
    }

    Departemen::create([
        'departemen_id' => $newId,
        'nama_departemen' => $request->nama_departemen
    ]);

    return redirect()->route('admin.departemen')->with('success', 'Departemen berhasil ditambahkan.');
    }

    public function hapusDepartemen(string $id) {
        $departemen = Departemen::findOrFail($id);
        $departemen->delete();

        return redirect()->route('admin.departemen')->with('success', 'Departemen berhasil dihapus');
    }
}
