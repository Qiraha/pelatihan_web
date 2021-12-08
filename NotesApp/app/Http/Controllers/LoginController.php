<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index(){
        return view('login',['siteTitle'=>'Login']);
    }

    public function authenticate(Request $request){
        $credential = $request->validate([
            'email' => 'required|email:dns',
            'password'=>'required'
        ]);

        if(Auth::attempt($credential)){

            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('credentialError','invalid credentials');

    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }
}
