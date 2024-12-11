<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Log;

use App\Models\User;
use App\Models\Role;
use App\Models\Departemen;
use App\Models\Spesialis;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexAdmin()
    {
        $admin = User::with(['role', 'departemen'])
            ->whereHas('role', function($query) {
                $query->where('role', 'Admin');
            })
            ->orderByRaw("CAST(SUBSTRING(user_id, 2) AS UNSIGNED)")
            ->get();

        return view('v_user.index.admin', [
            'title' => 'Daftar Admin',
            'admin' => $admin
        ]);
    }

    public function indexKaryawan() {
        $karyawan = User::with(['role', 'departemen'])
            ->whereHas('role', function($query) {
                $query->where('role', 'Karyawan');
            })
            ->orderByRaw("CAST(SUBSTRING(user_id, 2) AS UNSIGNED)")
            ->get();

        return view('v_user.index.karyawan', [
            'title' => 'Daftar Karyawan',
            'karyawan' => $karyawan,
        ]);
    }

    public function indexTeknisi() {
        $teknisi = User::with(['role', 'spesialis', 'departemen'])
            ->whereHas('role', function($query) {
                $query->where('role', 'Teknisi');
            })
            ->orderByRaw("CAST(SUBSTRING(user_id, 2) AS UNSIGNED)")
            ->get();

        return view('v_user.index.teknisi', [
            'title' => 'Daftar Teknisi',
            'teknisi' => $teknisi,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        $departemen = Departemen::all();
        $spesialis = Spesialis::all();

        return view('v_user.create', [
            'title' => 'Tambah User Baru', 
            'roles' => $roles,
            'departemen' => $departemen,
            'spesialis' => $spesialis
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validasiData = $request->validate([
                'nama' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:user,email',
                'password' => [
                    'required',
                    'string',
                    'min:8',
                    'confirmed',
                    Password::min(8)
                        ->mixedCase()
                        ->letters()
                        ->numbers()
                        ->symbols()
                ],
                'spesialis_id' => 'nullable',
                'role_id' => 'required',
                'departemen_id' => 'required',
            ], [
                'nama.required' => 'Nama wajib diisi',
                'email.required' => 'Email wajib diisi',
                'email.email' => 'Email tidak valid',
                'email.unique' => 'Email sudah digunakan',
                'password.required' => 'Password wajib diisi',
                'password.min' => 'Password minimal 8 digit',
                'password.confirmed' => 'Konfirmasi password tidak sesuai',
                'role_id.required' => 'Role wajib diisi'
            ]);

            // Hashing Password
            $validasiData['password'] = Hash::make($validasiData['password']);

            // Format untuk ID Primary Key
            $lastUser = User::orderBy('user_id', 'desc')->first();

            if(!$lastUser) {
                $newId = 'U101';
            }
            else {
                $lastIdNumber = (int)substr($lastUser -> user_id, 1);
                $newIdNumber = $lastIdNumber + 1;
                $newId = 'U' . str_pad($newIdNumber, 3, '0', STR_PAD_LEFT);
            }
            $validasiData['user_id'] = $newId;

            // Masukkan ke database
            User::create($validasiData);

            Log::info('User berhasil ditambah: ', $validasiData);

            $roleId = $validasiData['role_id'];
            if($roleId === 'RL001') {
                return redirect()->route('dashboard.admin.data-admin')->with('success', 'Data Admin Berhasil ditambah');
            }
            elseif($roleId === 'RL002') {
                return redirect()->route('dashboard.admin.data-teknisi')->with('success', 'Data teknisi berhasil ditambah');
            }
            elseif($roleId === 'RL003') {
                return redirect()->route('dashboard.admin.data-karyawan')->with('success', 'Data Karyawan berhasil ditambah');
            }
            else {
                return redirect()->route('dashboard.admin')->with('success', 'Data berhasil ditambah');
            }
        } catch (\Exception $e) {
            Log::error('Error saat menyimpan data', ['message' => $e->getMessage()]);
            return redirect()->back()->with('error', $e->getMessage());
        }
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
        $user = User::findOrFail($id);
        $role = Role::all();
        $departemen = Departemen::all();
        $spesialis = Spesialis::all();

        return view('v_user.update', [
            'title' => 'Edit User',
            'user' => $user,
            'roles' => $role,
            'departemen' => $departemen,
            'spesialis' => $spesialis,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $rules = [
            'nama' => 'required|string|max:255',
            'spesialis_id' => 'nullable',
            'role_id' => 'required',
            'departemen_id' => 'required'
        ];

        if($request->email != $user->email){
            $rules['email'] = 'required|string|max:255|email|unique:user,email,' . $user->user_id . ',user_id';
        }

        if($request->filled('password')) {
            $rules['password'] = ['required|string|min:8|', 
                Password::min(8)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols()
            ];
        }

        $validasiData = $request->validate($rules);
        $user->update($validasiData);

        return redirect()->route('dashboard.admin')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('dashboard.admin')->with('success', 'Data berhasil dihapus');
    }
}
