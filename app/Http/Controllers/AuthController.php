<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('pages.login.index');
    }

    public function validasi()
    {
        if(Auth::attempt(request()->only('email', 'password'))){
            return redirect()->route('home.index');
        }
        return redirect()->route('login.index');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login.index');
    }
}
