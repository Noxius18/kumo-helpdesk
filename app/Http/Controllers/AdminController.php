<?php

namespace App\Http\Controllers;

use App\Notifications\NotifikasiTiket;
use Illuminate\Http\Request;

use App\Models\Tiket;
use App\Models\User;
use App\Models\Kategori;

class AdminController extends Controller
{
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
}
