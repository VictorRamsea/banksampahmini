<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('/auth/register');
    }

    public function create(Request $request)
    {
        $verification_token = sha1(time());

        $request->validate([
            'name' => 'required', 'string', 'max:255',
            'username' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'password' => 'required', 'string', 'min:8', 'confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->userrrrrrrname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'verification_token' => $verification_token,
        ]);

        event(new Registered($user));

        Auth::login($user);
    }
}
