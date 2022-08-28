<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\history_voucher;

class RekapitulasiController extends Controller
{
    public function index()
    {
        $rekaps = history_voucher::join('users','users.id','history_vouchers.user_id')
        ->join('vouchers','vouchers.id','history_vouchers.voucher_id')
        ->select('history_vouchers.*','users.name','vouchers.nama_voucher','vouchers.durasi','vouchers.harga')
        ->get();
        return view('admin.rekapitulasi',compact('rekaps'));
    }
}
