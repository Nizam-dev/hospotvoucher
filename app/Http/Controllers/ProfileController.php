<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'no_hp'=>'required',
        ]);

        User::find(auth()->user()->id)
        ->update($request->all());
        return redirect()->back()->with("sukses","Berhasil Mengubah Profil");
    }

    public function ubahpassword(Request $request)
    {

        User::find(auth()->user()->id)
        ->update([
            "password" => bcrypt($request->password)
        ]);

        return redirect()->back()->with("sukses","Berhasil Mengubah Password");
    }
}
