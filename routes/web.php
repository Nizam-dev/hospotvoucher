<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('login', [App\Http\Controllers\LoginController::class,'index']);
Route::post('login', [App\Http\Controllers\LoginController::class,'login']);

Route::get('register',[App\Http\Controllers\RegisterController::class,'index']);
Route::post('register',[App\Http\Controllers\RegisterController::class,'register']);

Auth::routes(['register' => false,'login' => false]);


// Admin
Route::get('setting',[App\Http\Controllers\Admin\MikrotikController::class,'index']);
Route::post('setting',[App\Http\Controllers\Admin\MikrotikController::class,'simpan']);
Route::get('/',[App\Http\Controllers\DashboardController::class,'index']);

Route::get('voucher',[App\Http\Controllers\Admin\VoucherController::class,'index']);
Route::post('voucher/print',[App\Http\Controllers\Admin\VoucherController::class,'print']);

Route::post('profilevoucher',[App\Http\Controllers\Admin\VoucherProfileController::class,'tambah']);
Route::post('profilevoucher/{id}',[App\Http\Controllers\Admin\VoucherProfileController::class,'edit']);
Route::get('profilevoucher/hapus/{id}',[App\Http\Controllers\Admin\VoucherProfileController::class,'hapus']);

Route::post('genratevoucher/{id}',[App\Http\Controllers\Admin\GenrateVoucherController::class,'genrate']);


Route::get('users',[App\Http\Controllers\Admin\UserController::class,'index']);
Route::get('rekapitulasi',[App\Http\Controllers\Admin\RekapitulasiController::class,'index']);

// Profile
Route::resource('profile',App\Http\Controllers\ProfileController::class);
Route::post('profile/ubahpassword',[App\Http\Controllers\ProfileController::class,'ubahpassword']);


// Pengguna
Route::get('pengguna/beranda',[App\Http\Controllers\Pengguna\BerandaController::class,'index']);
Route::get('pengguna/history',[App\Http\Controllers\Pengguna\HistoryController::class,'index']);
Route::post('pengguna/aksesvoucher',[App\Http\Controllers\Pengguna\AksesVoucherController::class,'akesvoucher']);
Route::get('pengguna/cekinternet',[App\Http\Controllers\Pengguna\AksesVoucherController::class,'cekinternet']);
Route::get('pengguna/cekvoucher',[App\Http\Controllers\Pengguna\CekVoucherController::class,'cekvoucher']);
Route::get('pengguna/disconnect',[App\Http\Controllers\Pengguna\CekVoucherController::class,'putuskan_voucher']);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
