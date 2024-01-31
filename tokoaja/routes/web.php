<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginCon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\BarangController as BarangCon;
use App\Http\Controllers\RegisterCon;
use App\Http\Controllers\DashboardCon;
use App\Http\Controllers\TransaksiController as TransaksiCon;
use App\Http\Controllers\UserCon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});Route::get('/produk', function () {
    return view('produk',[
        'produk' => DB::table('produk')->get()
    ]);
});
//register
Route::get("register", [RegisterCon::class, 'register'])->name('register');
Route::post('register/action', [RegisterCon::class, 'actionregister'])->name('actionregister');
//login
Route::post('actionlogin', [LoginCon::class, 'actionlogin'])->name('actionlogin');
Route::get('dashboard', [DashboardCon::class,'index'])->name('dashboard')->
middleware(['auth']);
Route::get('logout', [LoginCon::class, 'actionlogout'])->name('actionlogout')->
middleware('auth');

Route::get('/barang', [BarangCon::class, 'index'])->name('indexbarang')->middleware('auth');
Route::get('/barang/input', [BarangCon::class, 'input'])->name('inputbarang')->middleware('auth');
Route::post('/barang/storeinput', [BarangCon::class, 'storeinput'])->name('storeInputbarang')->middleware('auth');
Route::get('/barang/update/{id}', [BarangCon::class, 'update'])->name('updatebarang')->middleware('auth');
Route::post('/barang/storeupdate', [BarangCon::class, 'storeupdate'])->name('storeUpdatebarang')->middleware('auth');
Route::get('/barang/delete/{id}', [BarangCon::class, 'delete'])->name('deletebarang')->middleware('auth');
Route::get('/barang/upload', [BarangCon::class, 'upload'])->name('upload')->middleware('auth');
Route::post('/barang/uploadproses', [BarangCon::class, 'uploadproses'])->name('uploadproses')->middleware('auth');
Route::Get('/barang/search', [BarangCon::class, 'search'])->name('search')->middleware('auth');

route::get('/transaksi', [TransaksiCon::class, 'index'])->name('indextransaksi')->middleware('auth');
Route::get('/transaksi/input', [TransaksiCon::class, 'input'])->name('inputtransaksi')->middleware('auth');
Route::post('/transaksi/storeinput', [TransaksiCon::class, 'storeinput'])->name('storeInputtransaksi')->middleware('auth');
Route::get('/transaksi/update/{id}', [TransaksiCon::class, 'update'])->name('updatetransaksi')->middleware('auth');
Route::post('/transaksi/storeupdate/{id}', [TransaksiCon::class, 'storeupdate'])->name('storeUpdatetransaksi')->middleware('auth');
Route::get('/transaksi/delete/{id}', [TransaksiCon::class, 'delete'])->name('deletetransaksi')->middleware('auth');
Route::post('/update/transaksi/{id}',[TransaksiCon::class,'updateTransaksi']);

Route::get('/user/tampil', [UserCon::class, 'index'])->name('indexUser')->middleware('auth');
Route::get('/user/input', [UserCon::class, 'input'])->name('inputUser')->middleware('auth');
Route::post('/user/storeinput', [UserCon::class, 'storeinput'])->name('storeInputUser')->middleware('auth');
Route::get('/user/update/{id}', [UserCon::class, 'update'])->name('updateUser')->middleware('auth');
Route::post('/user/storeupdate', [UserCon::class, 'storeupdate'])->name('storeUpdateUser')->middleware('auth');
Route::get('/user/delete/{id}', [UserCon::class, 'delete'])->name('deleteUser')->middleware('auth');