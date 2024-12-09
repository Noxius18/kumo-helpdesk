<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.index' , [
            'title' => 'Dashboard Admin',
        ]);
    }

    public function dataAdmin() {
        $admin = User::with(['role', 'departemen'])
            ->whereHas('role', function($query) {
                $query->where('role', 'Admin');
            })
            ->orderByRaw("CAST(SUBSTRING(user_id, 2) AS UNSIGNED)")
            ->get();

        return view('admin.user.admin', [
            'title' => 'Daftar Admin',
            'admin' => $admin
        ]);
    }
    
    public function dataKaryawan() {
        $karyawan = User::with(['role', 'departemen'])
            ->whereHas('role', function($query) {
                $query->where('role', 'Karyawan');
            })
            ->orderByRaw("CAST(SUBSTRING(user_id, 2) AS UNSIGNED)")
            ->get();

        return view('admin.user.karyawan', [
            'title' => 'Daftar Karyawan',
            'karyawan' => $karyawan,
        ]);
    }

    public function dataTeknisi() {
        $teknisi = User::with(['role', 'spesialis', 'departemen'])
            ->whereHas('role', function($query) {
                $query->where('role', 'Teknisi');
            })
            ->orderByRaw("CAST(SUBSTRING(user_id, 2) AS UNSIGNED)")
            ->get();

        return view('admin.user.teknisi', [
            'title' => 'Daftar Teknisi',
            'teknisi' => $teknisi,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
