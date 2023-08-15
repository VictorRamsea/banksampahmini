<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{

    function index()
    {
        return view('auth/login');
    }

    function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'email.required' => 'Email wajib diisi',
                'password.required' => 'Password wajib diisi',
            ]
        );

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            if (Auth::user()->role == 'superadmin') {
                return redirect('home');
            } elseif (Auth::user()->role == 'admin') {
                return redirect('home');
            } elseif (Auth::user()->role == 'user') {
                return redirect('home');
            }
        } else {
            // return redirect(RouteServiceProvider::HOME);
            return redirect('')->withErrors('Username atau Password tidak sesuai')->withInput();
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('');
    }
}
