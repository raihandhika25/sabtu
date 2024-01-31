<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;


class BarangController extends Controller
{
     public function index(Request $request)
    {


        $barangs = DB::table('produk')->get();
        return view('barang', ['produk' => $barangs]);
    }


    public function input()
    {
        return view('tambahbarang');
    }

    public function storeinput(Request $request)
    {

        // insert data ke table tbproduktambahproduk

        $file = $request->file('gambar');
        $filename = $request->nama . "." . $file->getClientOriginalExtension();
        $file->move(public_path('/img'), $filename);
        DB::table('produk')->insert([
            'nama' => $request->nama,
            'jenis'=> $request->jenis,
            'tipe' => $request->tipe,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar' => $filename,
        ]);
        // alihkan halaman ke route produk
        Session::flash('message', 'Input Berhasil.');
        return redirect('/barang');
    }

    public function update($id)
    {
        // mengambil data produk berdasarkan id yang dipilih
        $barangs = DB::table('produk')->where('produk', $id)->get();
        // passing data produk yang didapat ke view edit.blade.php
        return redirect('/barang');
    }

    public function storeupdate(Request $request)
    {
        // update data produk

        DB::table('produk')->where('produk', $request->id)->update([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'tipe' => $request->tipe,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar' => $request->gambar
        ]);

        // alihkan halaman ke halaman produk
        return redirect('/barang');
    }

    public function delete($id)
    {
        // mengambil data produk berdasarkan id yang dipilih
        DB::table('produk')->where('kode', $id)->delete();
        // passing data produk yang didapat ke view edit.blade.php
        return redirect('/barang');
    }

    public function search(Request $request){
        if($request->has('search')){
            $laptop = DB::table('laptop')->where('nama','LIKE','%'.$request->search.'%');
        }
        else{
              $laptop = DB::table('laptop')->get();


        }

        return view('laptop', ['laptop' => $laptop]);
    }
}