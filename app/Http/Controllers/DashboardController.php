<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if(!Auth::check()){
            return redirect('login');
        }
        if(auth()->user()->role == "admin")
            return view('admin.dashboard');
        else{
            return view('admin.dashboard');
        }
    }
}
