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
        $progresTiket = Tiket::where('status', 'In_Progress')->count();
        
        return view('admin.index', [
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
        $progressTickets = Tiket::where('user_id', $userId)->where('status', 'In_Progress')->count();
        $resolvedTickets = Tiket::where('user_id', $userId)->where('status', 'Resolved')->count();

        $tickets = Tiket::where('user_id', $userId)->get();

        $username = Auth::user()->nama;

        return view('karyawan.dashboard', [
            'title' => 'Dashboard Karyawan',
            'openTicket' => $openedTickets,
            'progressTicket' => $progressTickets,
            'resolvedTicket' => $resolvedTickets,
            'tickets' => $tickets,
            'nama' => $username
        ]);
    }
}
