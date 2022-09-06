<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \RouterOS\Client;
use \RouterOS\Query;
use \RouterOS\Config;
use \RouterOS\Exceptions\ConnectException;
use App\Models\mikrotik;
use App\Models\profile_voucher;
use App\Models\voucher;
use App\Models\history_voucher;
use PDF;

class VoucherController extends Controller
{
    public function index()
    {
        $mikrotik = mikrotik::first();
        $profile_vouchers = profile_voucher::all();
        $vouchers = voucher::where('status','Belum Digunakan')
                    ->get();
        $voucher_terpakai = history_voucher::join('users','users.id','history_vouchers.user_id')
        ->join('vouchers','vouchers.id','history_vouchers.voucher_id')
        ->select('history_vouchers.*','users.name','vouchers.nama_voucher','vouchers.status','vouchers.durasi','vouchers.harga')
        ->get();
        return view('admin.voucher',compact('vouchers','profile_vouchers','vouchers','voucher_terpakai'));
    }



    public function print(Request $request)
    {
        $vouchers = voucher::whereIn('id',$request->vc)->get();
        // return view('admin.print_voucher',compact('vouchers'));

        $pdf = PDF::loadview('admin.print_voucher',compact('vouchers'));
	    $pdf->setPaper('legal', 'potrait');
	    return $pdf->stream('test_pdf.pdf');
    }

}
