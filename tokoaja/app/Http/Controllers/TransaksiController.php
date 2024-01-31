<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
      public function index()
    {





        $transaksi = DB::table('pembelian')
        ->select('pembelian.*','produk.nama','produk.gambar','users.name')
        ->join('users','users.id', '=' , 'pembelian.kode_pembeli')
        ->join('produk','kode_produk', '=' , 'produk.kode')

        ->get();




        return view('transaksi', ['pembelian' => $transaksi]);
    }


    public function input()
    {
        return view('tambahtransaksi');
    }

    public function storeinput(Request $request)
    {
        // insert da    sta ke table tbproduktambahproduk
        DB::table('pembelian')->insert([
            'kode_produk' => $request->kodeproduk,
            'banyak' => $request->banyak,
            'bayar' => $request->harga * $request->banyak,
            'kode_pembeli' => auth()->user()->id,
            'status' => 'verifikasi'

        ]);
        // alihkan halaman ke route produk
        Session::flash('message', 'Input Berhasil.');
        return redirect('/transaksi');
    }

    public function update($id)
    {
        // mengambil data produk berdasarkan id yang dipilih
        $transaksi = DB::table('pembelian')->where('kode_pembelian', $id)->get();
        // passing data produk yang didapat ke view edit.blade.php
        return redirect('/transaksi');
    }

    public function storeupdate(Request $request)
    {
        // update data produk

        DB::table('produk')->where('kode', $request->kode)->update([
            'status' => $request->status,
        ]);

        // alihkan halaman ke halaman produk
        return redirect('/transaksi');
    }

    public function delete($kode)
    {

        // mengambil data produk berdasarkan id yang dipilih
        DB::table('pembelian')->where('kode_pembelian', $kode)->delete();
        // passing data produk yang didapat ke view edit.blade.php
        return redirect('/transaksi');

    }
    public function updateTransaksi($kode,Request $request){
        DB::table('pembelian')->where('kode_pembelian', $kode)->update([
            "status" => $request->status
        ]);
        return redirect()->back();
    }
}