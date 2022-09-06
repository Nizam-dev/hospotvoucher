<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\history_voucher;
use DB;


class HistoryController extends Controller
{
    public function index()
    {
        $historys = history_voucher::join('users','users.id','history_vouchers.user_id')
        ->join('vouchers','vouchers.id','history_vouchers.voucher_id')
        ->select('history_vouchers.*','users.name','vouchers.nama_voucher','vouchers.durasi','vouchers.harga')
        ->where('history_vouchers.user_id',auth()->user()->id)
        ->get();

        $history_grafik = history_voucher::join('vouchers','vouchers.id','history_vouchers.voucher_id')
        ->where('history_vouchers.user_id',auth()->user()->id)
        ->select('vouchers.nama_voucher',DB::raw('count(vouchers.id) as total'))
        ->groupBy('nama_voucher')
        ->get();
        return view('pengguna.history',compact('historys','history_grafik'));
    }
}
