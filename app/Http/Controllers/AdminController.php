<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tiket;
use App\Models\User;

class AdminController extends Controller
{
    public function indexTiket() {
        $tiket = Tiket::with(['user', 'kategori', 'teknisi'])
            ->orderBy('tanggal_lapor', 'desc')
            ->get();
        $teknisi = User::where('role_id', 'RL002')->get();

        return view('admin.tiket.index', [
            'title' => 'Daftar Tiket',
            'teknisis' => $teknisi,
            'tikets' => $tiket
        ]);
    }

    public function teruskanTiket(Request $request, $id) {
        $request->validate([
            'teknisi_id' => 'required|exists:user,user_id'
        ]);

        $tiket = Tiket::findOrFail($id);
        $tiket->update([
            'teknisi_id' => $request->teknisi_id,
            'status' => 'In_Progress'
        ]);

        return redirect()->route('admin.tiket.index')->with('success', 'Tiket berhasil diteruskan ke admin');
    }
}
