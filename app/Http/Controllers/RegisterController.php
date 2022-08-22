<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return redirect('/');
        }
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'name'=>'required',
            'password'=>'required'
        ]);

        if(User::where("email",$request->email)->first()){
            return redirect()->back()->with("gagal","Email sudah terdaftar");
        }

        $data = $request->all();
        $data["password"] = bcrypt($request->password);
        $data["role"]= "pengguna";
        User::create($data);

        return redirect("login")->with("sukses","Berhasil mendaftar, Silahkan Masuk");


    }
}
