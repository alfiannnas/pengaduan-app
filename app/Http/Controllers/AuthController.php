<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        if(!empty($request->username) && !empty($request->password)) {
            $user = User::where('username', $request->username)->first();
            if($user) {
                if(Hash::check($request->password, $user->password)) {
                    return redirect()->route('home');
                }
            }
            return back()->with('error', 'Username atau password salah!');
        }
        return back()->with('error', 'Silakan isi username dan password!');
    }

    public function showRegistrationForm()
    {
        return view('registration');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:users',
            'name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|min:8',
            'telephone' => 'required|min:10',
        ]);

        $user = User::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'telephone' => $request->telephone,
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}