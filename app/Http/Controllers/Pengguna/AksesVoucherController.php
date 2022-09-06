<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\voucher;
use App\Models\history_voucher;
use Carbon\Carbon;
use App\Models\User;

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
                'sisa_durasi'=>$voucher->durasi
            ]);
            User::find(auth()->user()->id)->update(['voucher_digunakan'=>$voucher->kode]);
            return response()->json([
                "status"=>"sukses",
                "pesan"=>"Berhasil, Tunggu Beberapa Detik Untuk Akses Internet"
            ]);
        }else{
            $cek_vc_saya = history_voucher::where('kode_voucher',$request->kode)->where("user_id",auth()->user()->id)->where("sisa_durasi","!=","0")->first();
            if($cek_vc_saya != null){
                $cek_vc_saya->update(['updated_at'=>Carbon::now()]);
                User::find(auth()->user()->id)->update(['voucher_digunakan'=>$request->kode]);
                return response()->json([
                    "status"=>"sukses",
                    "pesan"=>"Berhasil, Tunggu Beberapa Detik Untuk Akses Internet"
                ]);
            }
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
