<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()){
            $user = Auth::user();
            if ($user && $user->hasRole('admin')){
                return redirect(route('dashboard'));
            }elseif ($user && $user->hasRole('client')){
                return redirect(route('client'));
            }
        }
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard')->with('success', 'Successfully entered!');
        } else {
            return redirect()->route('login')->withErrors([
                'credentials' => 'Invalid credentials. Please try again.',
            ])->withInput();
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('login');
    }
}
