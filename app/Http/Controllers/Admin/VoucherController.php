<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \RouterOS\Client;
use \RouterOS\Query;
use \RouterOS\Config;
use \RouterOS\Exceptions\ConnectException;
use App\Models\mikrotik;
use App\Models\profile_voucher;
use App\Models\voucher;

class VoucherController extends Controller
{
    public function index()
    {
        $mikrotik = mikrotik::first();
        $profile_vouchers = profile_voucher::all();
        $vouchers = voucher::where('status','Belum Digunakan')
                    ->get();


        // try {
        //     // Initiate client with config object
        //     $client = new Client([
        //         'timeout' => 1,
        //         // 'host'    => $mikrotik->ip,
        //         // 'user'    => $mikrotik->username,
        //         // 'pass'    => $mikrotik->password
        //         'host'    => '192.168.56.101',
        //         'user'    => 'admin',
        //         'pass'    => ''
        //     ]);
        // } catch (ConnectException $e) {
        //     // echo $e->getMessage() . PHP_EOL;
        //     $akses["body"] = $e->getMessage();
        //     $akses["status"] = "gagal";
        //     return view('admin.setting',compact('akses','mikrotik'));
        //     die();
        // }


        // $vouchers = $client->query('/ip/hotspot/user/print')->read();
        return view('admin.voucher',compact('vouchers','profile_vouchers','vouchers'));
    }

    public function profile_user_add()
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
            return view('admin.setting',compact('akses','mikrotik'));
            die();
        }

            // Build query for creating new user
            // $query =
            //     (new Query('/ip/hotspot/user/profile/add'))
            //         ->equal('name', 'test-1');
            $query =
    (new Query('/ip/hotspot/ip-binding/print'))
        ->where('mac-address', '00:00:00:00:40:29');

        $z = $client->query($query)->read();
        
        sleep(1);
        dd($z);
        

        

    }

    public function print(Request $request)
    {
        $vouchers = voucher::whereIn('id',$request->vc)->get();
        return view('admin.print_voucher',compact('vouchers'));
    }

}
