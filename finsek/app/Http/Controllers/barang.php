<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class barang extends Controller
{
    public function home()
    {
        $prodak = DB::table('prodak')->get();
        return view('home', ['prodak' => $prodak]);
    }

    public function index()
    {
        $prodak = DB::table('prodak')->get();
        return view('prodak', ['prodak' => $prodak]);
    }

    public function input()
    {
        return view('tambahprinter');
    }

    public function storeinput(Request $request)
    {
        if($request->file('gambar')){
            $imageName = time() .'.'.$request->file('gambar')->extension();
            $request->file("gambar")->move(public_path('assets/img'),$imageName);
        // insert data ke table tbprodak
        DB::table('barangs')->insert([
            'id' => $request->id,
            'nama' => $request->nama,
            'foto' => $imageName,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);
    }

        // alihkan halaman ke route prodak
        Session::flash('message', 'Input Berhasil.');
        return redirect('/prodak/tampil');
    }

    public function update($kode)
    {
        // mengambil data prodak berdasarkan kode yang dipilih
        $kode = DB::table('barangs')->where('id', $kode)->get();
        // passing data prodak yang didapat ke view edit.blade.php
        return redirect('/prodak/tampil');
    }

    public function storeupdate(Request $request)
    {
        // update data prodak

        DB::table('barangs')->where('id', $request->kode)->update([
            'id' => $request->kode,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'foto' => $request->gambar
        ]);

        // alihkan halaman ke halaman prodak
        return redirect('/prodak/tampil');
    }

    public function delete($kode)
    {
        // mengambil data prodak berdasarkan kode yang dipilih
        DB::table('barangs')->where('id', $kode)->delete();
        // passing data prodak yang didapat ke view edit.blade.php
        return redirect('/prodak/tampil');
    }
}