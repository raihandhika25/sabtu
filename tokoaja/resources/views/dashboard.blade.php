@extends('layout.master')
@section('konten')
    <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
        <span class="font-xl">Selamat datang <b>{{ Auth::user()->name }}</b></span> anda login sebagai
        <b>{{ Auth::user()->role }}</b>
    </div>
@endsection
