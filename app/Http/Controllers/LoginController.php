<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
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
}