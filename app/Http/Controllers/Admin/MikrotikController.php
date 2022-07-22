<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \RouterOS\Client;
use \RouterOS\Query;
use \RouterOS\Config;
use \RouterOS\Exceptions\ConnectException;

class MikrotikController extends Controller
{
    public function index()
    {

        try {
            // Initiate client with config object
            $client = new Client([
                'timeout' => 1,
                'host'    => '192.168.56.101',
                'user'    => 'admin',
                'pass'    => ''
            ]);
        } catch (ConnectException $e) {
            // echo $e->getMessage() . PHP_EOL;
            $akses["body"] = $e->getMessage();
            $akses["status"] = "gagal";
            return view('admin.setting',compact('akses'));
            die();
        }

        $akses = $client->query('/interface/print', [
            ['type', 'ether'],  // same as ['type', '=', 'ether']
            ['type', 'vlan'],   // same as ['type', '=', 'vlan']
        ], '|')->read();

        $akses = $client->query('/ip/address/print')->read()[0];
        
        $akses["status"] = "sukses";
        $akses["body"] = "Conected";

        return view('admin.setting',compact('akses'));
        
    }
}
