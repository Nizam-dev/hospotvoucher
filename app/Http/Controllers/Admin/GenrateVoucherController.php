<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\profile_voucher;
use App\Models\voucher;
use Illuminate\Support\Str;
use \RouterOS\Client;
use \RouterOS\Query;
use \RouterOS\Config;
use \RouterOS\Exceptions\ConnectException;
use App\Models\mikrotik;


class GenrateVoucherController extends Controller
{
    public function genrate($id,Request $request)
    {
        $profile = profile_voucher::find($id);

        for($i=0;$i < $request->jumlah ; $i++){
            voucher::create([
                'kode' => $this->genrate_kode($profile->durasi),
                'nama_voucher' => $profile->nama_voucher,
                'harga' => $profile->harga,
                'durasi' => $profile->durasi,
                'status' => "Belum Digunakan"
            ]);
        }
        return redirect()->back()->with('sukses',$request->jumlah.' Voucher Berhasil dibuat');
    }

    public function genrate_kode($durasi)
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

        do {
            $code = Str::random(7);
        } while (voucher::where("kode", "=", $code)->first());

        $query =
            (new Query('/ip/hotspot/user/add'))
                ->equal('name', $code)
                ->equal('password', $code)
                ->equal('limit-uptime', "00:".$durasi.":00")
                ->equal('profile', '1MB');
        $client->query($query)->read();
        sleep(1);
  
        return $code;
    }
}
