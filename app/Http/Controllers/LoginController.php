<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return redirect('/');
        }
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        if(!User::where("email",$request->email)->first()){
            return redirect()->back()->with("gagal","Email tidak ditemukan");
        }

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){

            $ip_address = request()->ip(); 
            User::find(auth()->user()->id)
            ->update(['ip_address'=>$ip_address]);
            return redirect('/');
        }

        return redirect()->back()->with("gagal","Password tidak valid");
    }
}
