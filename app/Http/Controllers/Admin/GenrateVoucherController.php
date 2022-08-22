<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\profile_voucher;
use App\Models\voucher;
use Illuminate\Support\Str;


class GenrateVoucherController extends Controller
{
    public function genrate($id,Request $request)
    {
        $profile = profile_voucher::find($id);

        for($i=0;$i < $request->jumlah ; $i++){
            voucher::create([
                'kode' => $this->genrate_kode(),
                'nama_voucher' => $profile->nama_voucher,
                'harga' => $profile->harga,
                'durasi' => $profile->durasi,
                'status' => "Belum Digunakan"
            ]);
        }
        return redirect()->back()->with('sukses',$request->jumlah.' Voucher Berhasil dibuat');
    }

    public function genrate_kode()
    {
        do {
            $code = Str::random(7);
        } while (voucher::where("kode", "=", $code)->first());

        $query =
            (new Query('/ip/hotspot/user/add'))
                ->equal('name', $code)
                ->equal('password', $code)
                ->equal('name', 'test-1');
  
        return $code;
    }
}
