<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\history_voucher;


class HistoryController extends Controller
{
    public function index()
    {
        $historys = history_voucher::join('users','users.id','history_vouchers.user_id')
        ->join('vouchers','vouchers.id','history_vouchers.voucher_id')
        ->select('history_vouchers.*','users.name','vouchers.nama_voucher','vouchers.durasi','vouchers.harga')
        ->where('history_vouchers.user_id',auth()->user()->id)
        ->get();
        return view('pengguna.history',compact('historys'));
    }
}
