<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function autenticate(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        // dd('berhasil');

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('administrator');
        }

        return back()->withError([
            'email' => 'Akun tidak sesuai',
        ])->onlyInput('email');
    }

    //logout

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    //login

    public function login(){
        // return view('')
        // dd(request());
        return redirect('/', [
            'isLogin' => 0,
        ]);
    }
}
