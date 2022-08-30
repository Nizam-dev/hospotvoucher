<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\voucher;
use App\Models\User;
use App\Models\history_voucher;
use App\Models\profile_voucher;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        if(!Auth::check()){
            return redirect('login');
        }
        if(auth()->user()->role == "admin"){
            $pengguna = User::where('role','pengguna')->get();
            $pengguna_aktif = 0;
            foreach ($pengguna as $p) {
                if(\Cache::has('user-is-online-' . $p->id)){
                    $pengguna_aktif +=1; 
                }
            }
            $data = [
                'pengguna' => $pengguna->count(),
                'pengguna_aktif' =>$pengguna_aktif,
                'voucher' => voucher::count(),
                'voucher_terpakai' => voucher::where('status','Digunakan')->count()
            ];
            return view('admin.dashboard',compact('data'));
        }else{
            $no_admin = User::where('role','admin')->first()->no_hp;

            $list_voucher = profile_voucher::all();

            // Cek Voucher digunakan
            $hv = history_voucher::where('history_vouchers.user_id',auth()->user()->id)
            ->join('vouchers','vouchers.id','history_vouchers.voucher_id')
            ->select("history_vouchers.*","vouchers.durasi")
            ->latest()->first();
            if($hv == null){
                $status = "Anda Belum Memiliki Akses Internet";
            }else{
                $w = new Carbon($hv->created_at);
                $v = $w->addMinutes($hv->durasi);
                $sekarang = Carbon::now();
                if($v > $sekarang){
                    $status = "Internet Akses";
                }else{
                    $status = "Anda Belum Memiliki Akses Internet";
                }
            }

            return view('pengguna.beranda',compact("status","no_admin","list_voucher"));
        }
    }
}
