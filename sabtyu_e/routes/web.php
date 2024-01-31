<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginCon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ProdukController as produkCon;
use App\Http\Controllers\RegisterCon;
use App\Http\Controllers\DashboardCon;
use App\Http\Controllers\pembelianController as pembelianCon;
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
});Route::get('/barang', function () {
    return view('/barang',[
        'produk' => DB::table('produk')->get()
    ]);
});
//register
Route::get("register", [RegisterCon::class, 'register'])->name('register');
Route::post('register/action', [RegisterCon::class, 'actionregister'])->name('actionregister');
//login
Route::post('actionlogin', [loginCon::class, 'actionlogin'])->name('actionlogin');
Route::get('dashboard', [DashboardCon::class,'index'])->name('dashboard')->
middleware(['auth']);
Route::get('logout', [loginCon::class, 'actionlogout'])->name('actionlogout')->
middleware('auth');

Route::get('/produk', [produkCon::class, 'index'])->name('indexproduk')->middleware('auth');
Route::get('/produk/input', [produkCon::class, 'input'])->name('inputproduk')->middleware('auth');
Route::post('/produk/storeinput', [produkCon::class, 'storeinput'])->name('storeInputproduk')->middleware('auth');
Route::get('/produk/update/{id}', [produkCon::class, 'update'])->name('updateproduk')->middleware('auth');
Route::post('/produk/storeupdate', [produkCon::class, 'storeupdate'])->name('storeUpdateproduk')->middleware('auth');
Route::get('/produk/delete/{id}', [produkCon::class, 'delete'])->name('deleteproduk')->middleware('auth');
Route::get('/produk/upload', [produkCon::class, 'upload'])->name('upload')->middleware('auth');
Route::post('/produk/uploadproses', [produkCon::class, 'uploadproses'])->name('uploadproses')->middleware('auth');
Route::Get('/produk/search', [produkCon::class, 'search'])->name('search')->middleware('auth');

route::get('/pembelian', [pembelianCon::class, 'index'])->name('indexpembelian')->middleware('auth');
Route::get('/pembelian/input', [pembelianCon::class, 'input'])->name('inputpembelian')->middleware('auth');
Route::post('/pembelian/storeinput', [pembelianCon::class, 'storeinput'])->name('storeInputpembelian')->middleware('auth');
Route::get('/pembelian/update/{id}', [pembelianCon::class, 'update'])->name('updatepembelian')->middleware('auth');
Route::post('/pembelian/storeupdate/{id}', [pembelianCon::class, 'storeupdate'])->name('storeUpdatepembelian')->middleware('auth');
Route::get('/pembelian/delete/{id}', [pembelianCon::class, 'delete'])->name('deletepembelian')->middleware('auth');
Route::post('/update/pembelian/{id}',[pembelianCon::class,'updatepembelian']);

Route::get('/user/tampil', [UserCon::class, 'index'])->name('indexUser')->middleware('auth');
Route::get('/user/input', [UserCon::class, 'input'])->name('inputUser')->middleware('auth');
Route::post('/user/storeinput', [UserCon::class, 'storeinput'])->name('storeInputUser')->middleware('auth');
Route::get('/user/update/{id}', [UserCon::class, 'update'])->name('updateUser')->middleware('auth');
Route::post('/user/storeupdate', [UserCon::class, 'storeupdate'])->name('storeUpdateUser')->middleware('auth');
Route::get('/user/delete/{id}', [UserCon::class, 'delete'])->name('deleteUser')->middleware('auth');