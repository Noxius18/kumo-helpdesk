<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Tiket;

class DashboardController extends Controller
{
    public function dashboardAdmin() {
        
        $totalUser = User::count();
        $totalTiket = Tiket::count();
        $openTiket = Tiket::where('status', 'Open')->count();
        $progresTiket = Tiket::where('status', 'Progress')->count();
        
        return view('dashboard.index', [
            'title' => 'Dashboard Admin',
            'totalUser' => $totalUser,
            'totalTiket' => $totalTiket,
            'openTiket' => $openTiket,
            'progresTiket' => $progresTiket
        ]);
    }

    public function dashboardKaryawan() {
        $userId = Auth::id();

        $openedTickets = Tiket::where('user_id', $userId)->where('status', 'Open')->count();
        $progressTickets = Tiket::where('user_id', $userId)->where('status', 'Progress')->count();
        $resolvedTickets = Tiket::where('user_id', $userId)->where('status', 'Resolved')->count();

        $tickets = Tiket::where('user_id', $userId)->get();

        $username = Auth::user()->nama;

        return view('dashboard.index', [
            'title' => 'Dashboard Karyawan',
            'openTicket' => $openedTickets,
            'progressTicket' => $progressTickets,
            'resolvedTicket' => $resolvedTickets,
            'tickets' => $tickets,
            'nama' => $username
        ]);
    }

    public function dashboardTeknisi() {
        $teknisiId = Auth::id();
        
        $progressTickets = Tiket::where('teknisi_id', $teknisiId)->where('status', 'Progress')->count();
        $resolvedTickets = Tiket::where('teknisi_id', $teknisiId)->where('status', 'Resolved')->count();
        $totalTickets = Tiket::where('teknisi_id', $teknisiId)->where('status', 'Closed')->count();

        $tickets = Tiket::where('teknisi_id', $teknisiId)->get();

        $username = Auth::user()->nama;

        return view('dashboard.index', [
            'title' => 'Dashboard Teknisi',
            'progressTiket' => $progressTickets,
            'resolvedTiket' => $resolvedTickets,
            'totalTiket' => $totalTickets,
            'tickets' => $tickets,
            'nama' => $username
        ]);
    }

    public function bacaNotifikasi($id = null) {
        
        if($id) {
            $notifikasi = Auth::user()->notifications()->find($id);
            if($notifikasi){
                $notifikasi->markAsRead();
            }
        }
        else {
            Auth::user()->unreadNotifications->markAsRead();
        }

        return back()->with('success', 'Notifikasi sudah dibaca');
    }
}
