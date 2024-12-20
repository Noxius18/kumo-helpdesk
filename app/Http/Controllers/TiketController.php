<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\Notifications\NotifikasiTiket;
use App\Models\Kategori;
use App\Models\Tiket;
use App\Models\User;
use App\Models\Foto;

use App\Helpers\ImageHelper;
class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('v_tiket.create', [
            'title' => 'Buat Tiket Baru',
            'kategori' => $kategori
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori,kategori_id',
            'deskripsi' => 'required|string',
            'prioritas' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In_Progress,Resolved,Closed',
            'files.*' => 'nullable|image|max:2048'
        ], [
            'files.*.image' => 'File lampiran harus berupa gambar',
            'files.*.max' => 'Ukuran maksimal sebesar 2048 kb'
        ]
    );

        // Format untuk id Tiket
        $hari_ini = now()->timezone('Asia/Jakarta');
        $tahun = $hari_ini->format('Y');
        $bulan = $hari_ini->format('m');
        $hari = $hari_ini->format('d');

        // Mengambil jumlah tiket yang sudah ada untuk satu hari
        $jumlahTiket = Tiket::whereDate('tanggal_lapor', $hari_ini->toDateString())->count();

        // Membuat id Tiket
        $ticketId = $tahun . $bulan . $hari . str_pad($jumlahTiket + 1, 3, '0', STR_PAD_LEFT); 
        
        // Nilai Default untuk Status
        
        $tiket = Tiket::create([
            'tiket_id' => $ticketId,
            'user_id' => auth()->id(),
            'kategori_id' => $request->kategori_id,
            'deskripsi' => $request->deskripsi,
            'tanggal_lapor' => now()->timezone('Asia/Jakarta'),
            'prioritas' => $request->prioritas,
            'status' => $request->status
        ]);

        if($request->hasFile('files')) {
            foreach($request->file('files') as $file) {
                $extension = $file->getClientOriginalExtension();
                $fileName = date('YmdHis') . '_' . uniqid() . '.' . $extension;
                $filePath = 'storage/lampiran-tiket';

                ImageHelper::uploadAndResize($file, $filePath, $fileName, 800, 800);

                Foto::create([
                    'tiket_id' => $ticketId,
                    'nama_file' => $fileName,
                    'nama_path' => $filePath
                ]);
            }
        }

        // Logika untuk Notifikasi
        $karyawan = Auth::user();
        $admins = User::where('role_id', 'RL001')->get();

        $message = $karyawan->nama . ' telah membuat tiket baru';

        foreach($admins as $admin) {
            $admin->notify(new NotifikasiTiket($message, $tiket));
        }

        return redirect()->route('karyawan.list-tiket')->with('success', 'Berhasil membuat tiket');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tiket = Tiket::with(['user', 'kategori', 'teknisi', 'foto', 'note'])->findOrFail($id);
        
        return view('v_tiket.detail', [
            'title' => 'Detail Tiket',
            'tiket' => $tiket,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
