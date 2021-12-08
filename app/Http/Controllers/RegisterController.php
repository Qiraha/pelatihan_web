<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('register',['siteTitle'=>'Register']);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'required|max:255',
            'username' => 'required|max:20|unique:users',
            'email'=>'required|email:dns|max:255|unique:users',
            'password'=>'required|min:6',

        ]);

        User::create([
            'fullname'=>$validated['fullname'],
            'username'=>$validated['username'],
            'email'=>$validated['email'],
            'password'=> Hash::make($validated['password']),

        ]);

        return redirect('login')->with('success','You have successfully registered! Please login to continue.');


    }
}
