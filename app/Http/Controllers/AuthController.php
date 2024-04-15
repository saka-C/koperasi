<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    function index(){
        return view('index');
    }

    function login(Request $request){
        $cek_admin = Administrator::where('username', $request->username)->where('password', $request->password)->first();
        if (!$cek_admin) {
            return back()->with('error','Opps! Username atau Password Salah');
        } 
            session([
                'role' => 'admin',
                'usename' => $cek_admin->username
            ]);
            return redirect('/home');
    }

    function logout(Request $request){
        $request->session()->invalidate();
        return redirect('/');
    }
}
