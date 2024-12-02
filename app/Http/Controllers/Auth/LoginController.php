<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin() {
        return view('Auth.login', [
            'title' => 'Login User'
        ]);
    }

    public function authLogin(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            if($user->role->role === 'Admin'){
                return redirect()->intended(route('dashboard.admin'));
            }
            elseif($user->role->role === 'Teknisi') {
                return redirect()->intended(route('dashboard.teknisi'));
            }
            elseif($user->role->role === 'Karyawan') {
                return redirect()->intended(route('dashboard.karyawan'));
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah'
        ]);
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
    }
}
