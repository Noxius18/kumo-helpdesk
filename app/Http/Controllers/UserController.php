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
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        $departemen = Departemen::all();
        $spesialis = Spesialis::all();

        return view('admin.user.create', [
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
            return redirect()->route('dashboard.admin')->with('success', 'User berhasil ditambah!');
        } catch (\Exception $e) {
            Log::error('Error saat menyimpan data', ['message' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Error saat menyimpan data');
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
