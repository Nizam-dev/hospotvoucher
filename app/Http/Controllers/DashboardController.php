<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\voucher;
use App\Models\history_voucher;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        if(!Auth::check()){
            return redirect('login');
        }
        if(auth()->user()->role == "admin")
            return view('admin.dashboard');
        else{
            $hv = history_voucher::where('history_vouchers.user_id',auth()->user()->id)
            ->join('vouchers','vouchers.id','history_vouchers.voucher_id')
            ->select("history_vouchers.*","vouchers.durasi")
            ->latest()->first();
            if($hv == null){
                $status = "Anda Belum Memiliki Akses Internet";
            }else{
                $v = Carbon::now()->addMinutes($hv->durasi);
                if($v > Carbon::now()){
                    $status = "Internet Akses";
                }else{
                    $status = "Anda Belum Memiliki Akses Internet";
                }
            }

            return view('pengguna.beranda',compact("status"));
        }
    }
}
