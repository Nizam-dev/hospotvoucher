<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \RouterOS\Client;
use \RouterOS\Query;
use \RouterOS\Config;
use \RouterOS\Exceptions\ConnectException;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role','pengguna')->get();
        return view('admin.users',compact('users'));
    }
}
