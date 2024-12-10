<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboardAdmin() {
        
        $totalUser = User::count();
        
        return view('admin.index', [
            'title' => 'Dashboard Admin',
            'totalUser' => $totalUser
        ]);
    }
}
