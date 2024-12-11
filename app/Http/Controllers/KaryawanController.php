<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tiket;

class KaryawanController extends Controller
{
    public function indexTiket() {
        $tickets = Tiket::with('kategori')
            ->where('user_id', auth()->user()->user_id)
            ->orderBy('tanggal_lapor', 'desc')
            ->paginate(10);
        
            return view('v_tiket.index', [
                'title' => 'List Tiket',
                'tikets' => $tickets
            ]);
    }

    public function detailTiket($id) {
        $tiket = Tiket::with(['user', 'kategori', 'teknisi', 'foto', 'note'])->findOrFail($id);
        
        return view('v_tiket.detail', [
            'title' => 'Detail Tiket',
            'tiket' => $tiket,
        ]);
    }
}
