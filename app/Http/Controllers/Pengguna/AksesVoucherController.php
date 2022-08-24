<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\voucher;
use App\Models\history_voucher;


class AksesVoucherController extends Controller
{
    public function akesvoucher(Request $request)
    {
        $voucher = voucher::where("kode",$request->kode)
                ->where("status","Belum Digunakan")
                ->first();
        if($voucher != null){
            $voucher->update(["status"=>"Digunakan"]);
            history_voucher::create([
                'kode_voucher'=>$voucher->kode,
                'user_id'=>auth()->user()->id,
                'voucher_id'=>$voucher->id,
            ]);
            return response()->json([
                "status"=>"sukses",
                "pesan"=>"Berhasil, Tunggu Beberapa Detik Untuk Akses Internet"
            ]);
        }else{
            return response()->json([
                "status"=>"gagal",
                "pesan"=>"Voucher Tidak Ada"
            ]);
        }
        
    }


    public function cekinternet()
    {
        $v = voucher::latest()->first();
        dd($v);
    }
}
