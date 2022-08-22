<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \RouterOS\Client;
use \RouterOS\Query;
use \RouterOS\Config;
use \RouterOS\Exceptions\ConnectException;
use App\Models\mikrotik;

class MikrotikController extends Controller
{
    public function index()
    {

        $mikrotik = mikrotik::first();

        try {
            // Initiate client with config object
            $client = new Client([
                'timeout' => 1,
                'host'    => $mikrotik->ip,
                'user'    => $mikrotik->username,
                'pass'    => $mikrotik->password
            ]);
        } catch (ConnectException $e) {
            // echo $e->getMessage() . PHP_EOL;
            $akses["body"] = $e->getMessage();
            $akses["status"] = "gagal";
            return view('admin.setting',compact('akses','mikrotik'));
            die();
        }

        $akses = $client->query('/interface/print', [
            ['type', 'ether'],  // same as ['type', '=', 'ether']
            ['type', 'vlan'],   // same as ['type', '=', 'vlan']
        ], '|')->read();

        $akses = $client->query('/ip/address/print')->read()[0];
        
        $akses["status"] = "sukses";
        $akses["body"] = "Conected";

        return view('admin.setting',compact('akses','mikrotik'));
        
    }

    public function simpan(Request $request)
    {
        $request->validate([
            "username"=>"required",
            "ip"=>"required",
        ]);

        $mikrotik = [
            "username" => $request->username,
            "ip" => $request->ip,
            "password" => $request->password == null ? '': $request->password,
        ]; 


        mikrotik::first()->update($mikrotik);
        return redirect()->back()->with('sukses','konfigurasiberhasil disimpan');
    }
}
