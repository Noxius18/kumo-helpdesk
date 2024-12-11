<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Notifications\NotifikasiTiket;
use App\Models\Tiket;
use App\Models\User;
use App\Models\Note;

class TeknisiController extends Controller
{

    public function indexTiket() {
        $tiket = Tiket::with(['user', 'kategori'])
            ->where('teknisi_id', Auth::user()->user_id)
            ->orderBy('tanggal_lapor', 'desc')
            ->paginate(10);
        
            return view('v_tiket.index', [
                'title' => 'Tiket yang kamu kerjakan',
                'tikets' => $tiket
            ]);
    }

    public function detailTiket($id) {
        $tiket = Tiket::with(['user', 'kategori', 'teknisi', 'foto', 'note'])->findOrFail($id);
        
        return view('v_tiket.detail', [
            'title' => 'Detail Tiket',
            'tiket' => $tiket,
        ]);
    }

    public function updateStatus(Request $request, $id) {
        $tiket = Tiket::findOrFail($id);

        if($tiket->status !== 'Progress') {
            return redirect()->route('teknisi.list-tiket')
                ->with('error', 'Tiket dapat dapat diupdate karena status tiket sudah dikerjakan');
        }

        $tiket->update([
            'status' => 'Resolved',
            'tanggal_selesai' => now()->timezone('Asia/Jakarta')
        ]);

        $teknisi = Auth::user();
        $karyawan = User::find($tiket->user_id);
        $admins = User::where('role_id', 'RL001')->get();

        $messageToKaryawan = 'Tiket "' . $tiket->tiket_id . '" telah selesai dikerjakan oleh ' . $teknisi->nama;
        $messageToAdmin = 'Tiket "' . $tiket->tiket_id . '" telah diselesaikan oleh ' . $teknisi->nama;

        // Notifikasi Tiket sudah selesai ke Karyawan dan Admin
        $message = 'Tiket' . $tiket->tiket_id . 'sudah selesai dikerjakan oleh' . $teknisi->nama;

        if($karyawan) {
            $karyawan->notify(new NotifikasiTiket($messageToKaryawan, $tiket));
        }

        foreach($admins as $admin) {
            $admin->notify(new NotifikasiTiket($messageToAdmin, $tiket));
        }

        return redirect()->route('teknisi.list-tiket')->with('success', 'Tiket selesai dikerjakan');
    }

    public function tambahNote(Request $request) {
        $request->validate([
            'note' => 'required|string'
        ]);

        $lastNote = Note::orderBy('note_id', 'desc')->first();
        if(!$lastNote){
            $newId = 'N101';
        }
        else {
            $lastIdNumber = (int)substr($lastNote -> note_id, 1);
            $newIdNumber = $lastIdNumber + 1;
            $newId = 'N' . str_pad($newIdNumber, 3, '0', STR_PAD_LEFT);
        }

        Note::create([
            'note_id' => $newId,
            'teknisi_id' => Auth::user()->user_id,
            'tiket_id' => $request->tiket_id,
            'note' => $request->note,
            'tanggal' => now()->timezone('Asia/Jakarta')
        ]);

        return redirect()->route('teknisi.list-tiket')->with('success', 'Berhasil menambah catatan pada tiket');
    }

    public function listNote() {
        $teknisi = Auth::user()->user_id;

        $note = Note::with('tiket')
            ->where('teknisi_id', $teknisi)
            ->orderBy('tanggal', 'desc')
            ->paginate(10);
        
        return view('v_tiket.note', [
            'title' => 'List Note',
            'notes' => $note
        ]);
    }

    public function bacaNotifikasi($notifikasiId) {
        $notifikasi = Auth::user()->notifications()->find($notifikasiId);
        if($notifikasi) {
            $notifikasi->markAsRead();
        }

        return back()->with('success', 'Notifikasi sudah dibaca');
    }
}
