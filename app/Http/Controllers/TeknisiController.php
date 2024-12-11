<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeknisiController extends Controller
{
    public function bacaNotifikasi($notifikasiId) {
        $notifikasi = Auth::user()->notifications()->find($notifikasiId);
        if($notifikasi) {
            $notifikasi->markAsRead();
        }

        return back()->with('success', 'Notifikasi sudah dibaca');
    }
}
