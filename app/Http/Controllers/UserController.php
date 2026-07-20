<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display login form.
     */
    public function login()
    {
        return view('login');
    }

    /**
     * Handle login request.
     */
    public function loginPost(Request $request)
    {
        $request->validate([
            'user' => 'required',
            'password' => 'required'
        ]);

        $nmuser = $request->user;
        $password = $request->password;

        // Cari user berdasarkan username
        $user = Pengguna::where('nm_user', $nmuser)->first();

        if ($user && Hash::check($password, $user->kata_kunci)) {
            // Login berhasil
            Session::put('nmuser', $user->nm_user);
            Session::put('nootor', $user->no_otor);
            Session::put('role', $user->role);
            
            return redirect('/')->with('success', 'Login berhasil');
        }

        return redirect('login')->with('alert', 'Password atau Username salah!');
    }

    /**
     * Handle logout request.
     */
    public function logout()
    {
        Session::flush();
        
        return redirect('login')->with('success', 'Logout berhasil');
    }
}
