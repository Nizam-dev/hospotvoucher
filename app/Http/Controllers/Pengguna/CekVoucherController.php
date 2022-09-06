<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\history_voucher;
use App\Models\voucher;
use Carbon\Carbon;

class CekVoucherController extends Controller
{
    public function putuskan_voucher()
    {
        $voucher_saya = User::where('id',auth()->user()->id)->first();
        $hv = history_voucher::where('history_vouchers.kode_voucher',$voucher_saya->voucher_digunakan)
                ->join('vouchers','vouchers.id','history_vouchers.voucher_id')
                ->select("history_vouchers.*","vouchers.durasi")
                ->first();
        $w = new Carbon($hv->updated_at);
        $v = $w->addMinutes($hv->sisa_durasi);
        $sekarang = Carbon::now();
        $sisa_durasi = 0;
        if($v > $sekarang){
            $sisa = $v->diffForHumans($sekarang,true);
            $sisa_durasi = str_replace(' menit', '', $sisa);

        }

        history_voucher::where('kode_voucher',$voucher_saya->voucher_digunakan)->update([
            "updated_at"=> Carbon::now(),
            "sisa_durasi"=> $sisa_durasi
        ]);

        $voucher_saya->update([
            'voucher_digunakan'=>null
        ]);

    }
    public function cekvoucher()
    {
        $voucher_saya = User::where('id',auth()->user()->id)->first();
        $hv = history_voucher::where('history_vouchers.kode_voucher',$voucher_saya->voucher_digunakan)
                ->join('vouchers','vouchers.id','history_vouchers.voucher_id')
                ->select("history_vouchers.*","vouchers.durasi")
                ->first();
        $w = new Carbon($hv->updated_at);
        $v = $w->addMinutes($hv->sisa_durasi);
        $sekarang = Carbon::now();
        return response()->json([
            "waktu_habis" => $v,
            "sekarang" => $sekarang
        ]);
    }

}
