<?php

use Illuminate\Support\Facades\Route;
use App\Models\Barang;
use App\Http\Controllers\login;
use App\Http\Controllers\prodak;
use App\Http\Controllers\register;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\transaksi;
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
    $barangs = Barang::all();
    return view('index', compact('barangs'));
});



Route::get('/prodak/tampil', [prodak::class, 'index'])->name('indexprodak')->middleware('auth');
Route::get('/prodak/input', [prodak::class, 'input'])->name('inputprodak')->middleware('auth');
Route::post('/prodak/storeinput', [prodak::class, 'storeinput'])->name('storeInputprodak')->middleware('auth');
Route::get('/prodak/update/{id}', [prodak::class, 'update'])->name('updateprodak')->middleware('auth');
Route::post('/prodak/storeupdate', [prodak::class, 'storeupdate'])->name('storeUpdateprodak')->middleware('auth');
Route::get('/prodak/delete/{id}', [prodak::class, 'delete'])->name('deleteprodak')->middleware('auth');
Route::get('/prodak/upload', [prodak::class, 'upload'])->name('upload')->middleware('auth');
Route::post('/prodak/uploadproses', [prodak::class, 'uploadproses'])->name('uploadproses')->middleware('auth'); 


Route::get('/login', [login::class, 'login'])->name('login');
Route::post('actionlogin', [login::class, 'actionlogin'])->name('actionlogin');
Route::get('dashboard', [Dashboard::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('actionlogout', [login::class, 'actionlogout'])->name('actionlogout')->middleware('auth');
Route::get('register', [register::class, 'register'])->name('register');
Route::post('register/action', [register::class, 'actionregister'])->name('actionregister');




Route::get('/transaksi/tampil', [transaksi::class, 'index'])->name('indextransaksi')->middleware('auth');
Route::get('/transaksi/input', [transaksi::class, 'input'])->name('inputtransaksi')->middleware('auth');
Route::post('/transaksi/storeinput', [transaksi::class, 'storeinput'])->name('storeInputtransaksi')->middleware('auth');
Route::get('/transaksi/update/{id}', [transaksi::class, 'update'])->name('updatetransaksi')->middleware('auth');
Route::post('/transaksi/storeupdate', [transaksi::class, 'storeupdate'])->name('storeUpdatetranksi')->middleware('auth');
Route::get('/transaksi/delete/{id}', [transaksi::class, 'delete'])->name('deletetransaksi')->middleware('auth');
Route::get('/transaksi/upload', [transaksi::class, 'upload'])->name('upload')->middleware('auth');
Route::post('/transaksi/uploadproses', [transaksi::class, 'uploadproses'])->name('uploadproses')->middleware('auth');