<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\profile_voucher;

class VoucherProfileController extends Controller
{
    public function tambah(Request $request)
    {
        profile_voucher::create($request->all());
        return redirect()->back()->with('sukses-profile','Profile Berhasil Ditambahkan');
    }

    public function edit($id, Request $request)
    {
        profile_voucher::find($id)->update($request->all());
        return redirect()->back()->with('sukses-profile','Profile Berhasil Di Ubah');
    }
}
