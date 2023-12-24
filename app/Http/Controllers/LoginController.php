<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;

class LoginController extends Controller
{
    public function login()
    {
        return view ('auth.login');
    }

    public function login_post(Request $request)
    {
        $success = auth()->attempt([
            'email' => request('email'),
            'password' => request('password')
        ]);

        if($success)
        {
            $request->session()->regenerate();
            return redirect()->to(RouteServiceProvider::HOME);
        }
        return back()->with('loginError', 'Invalid login details');
        // return back()->withErrors([
        //     'email' => 'The Credentials do not match.'
        // ])->onlyInput('email');
    }
}
