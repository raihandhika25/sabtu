@extends('layout.master')
@section('konten')
    @if (session('message'))
        <div id="alert-3"
            class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <svg class="flex-shrink-0 w-10 h-10" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-medium">
                <strong>{{ session('message') }}</strong>
            </div>
            <button type="button"
                class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif


    {{-- Modal Tambah --}}

    <!-- Modal toggle -->
    @if (Auth::user()->role == 'admin')
        <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
            class="text-white my-4 bg-yellow-500 rounded-lg border-0 p-2" type="button">
            Add Produk
        </button>
    @endif

    <!-- Main modal -->
    <div id="authentication-modal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">


            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="authentication-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Tambahkan Produk</h3>
                    <form enctype="multipart/form-data" class="space-y-6" action="/produk/storeinput" method="post">
                        @csrf
                        <div>
                            <label for="nama"
                                class="block mb-2 ms-1  text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                            <input type="text" name="nama" kode="nama"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required>
                        </div>
                        <div>
                            <label for="spesifikasi"
                                class="block mb-2 ms-1  text-sm font-medium text-gray-900 dark:text-white">tipe</label>
                            <input type="text" name="tipe" kode="tipe"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required>
                        </div>
                        <div>
                            <label for="jenis"
                                class="block mb-2 ms-1  text-sm font-medium text-gray-900 dark:text-white">jenis</label>
                            <input type="text" name="jenis" kode="jenis"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required>
                        </div>
                        <div>
                            <label for="harga"
                                class="block mb-2 ms-1  text-sm font-medium text-gray-900 dark:text-white">harga</label>
                            <input type="number" name="harga" kode="harga"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required>
                        </div>
                        <div>
                            <label for="stok"
                                class="block mb-2 ms-1  text-sm font-medium text-gray-900 dark:text-white">stok</label>
                            <input type="number" name="stok" kode="stok"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required>
                        </div>
                        <div>
                            <label for="gambar"
                                class="block mb-2 ms-1  text-sm font-medium text-gray-900 dark:text-white"> </label>
                            <input type="file" name="gambar" kode="gambar"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required>
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                            New Produk </button>
                    </form>
                </div>
            </div>
        </div>
    </div>




    {{-- Tabel Biodata --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col">
                        Nama
                    </th>
                    <th scope="col">
                        tipe
                    </th>
                    <th scope="col">
                        jenis
                    </th>
                    <th scope="col">
                        harga
                    </th>
                    <th scope="col">
                        stok
                    </th>
                    <th scope="col">
                        Gambar
                    </th>
                    <th scope="col">
                        Option
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produk as $b)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <td class="">
                            {{ $b->nama }}
                        </td>
                        <td>
                            {{ $b->tipe }}
                        </td>
                        <td>
                            {{ $b->jenis }}
                        </td>
                        <td>
                            {{ $b->harga }}
                        </td>
                        <td>
                            {{ $b->stok }}
                        </td>
                        <td class="">
                            <img src="/img/{{ $b->gambar }}" alt="" width="100px" height="100px">
                        </td>
                        <td class="flex items-center h-32">
                            <button type="button" data-modal-target="authentication-modal{{ $b->kode }}"
                                data-modal-toggle="authentication-modal{{ $b->kode }}"
                                class="bg-yellow-300 px-5 py-2.5 rounded-lg text-white">Update</button>
                            <form class="" action="/produk/delete/{{ $b->kode }}" method="get">
                                <button onclick="return confirm('Apakah Ingin Menghapus')" type="submit"
                                    class="text-white bg-red-700 ms-10 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">delete</button>
                            </form>

                        </td>
                    </tr>



                    {{-- Update --}}

                    <!-- Main modal -->

                    <div id="authentication-modal{{ $b->kode }}" tabindex="-1" aria-hidden="true"
                        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full">

                            <!-- Modal content -->

                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button"
                                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="authentication-modal{{ $b->kode }}">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="px-6 py-6 lg:px-8">
                                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Update
                                        Produk
                                    </h3>
                                    <form class="space-y-6" action="/produk/storeupdate" method="post">
                                        @csrf
                                        <input type="hidden" name="kode" value="{{ $b->kode }}">
                                        <div>
                                            <label for="nama"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                            </label>
                                            <input type="text" value="{{ $b->nama }}" name="nama"
                                                id="nama"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                required>
                                        </div>
                                        <div>
                                            <label for="tipe"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">tipe
                                            </label>
                                            <input type="text" value="{{ $b->tipe }}" name="tipe"
                                                id="tipe"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                required>
                                        </div>
                                        <div>
                                            <label for="jenis"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">jenis
                                            </label>
                                            <input type="text" value="{{ $b->jenis }}" name="jenis"
                                                id="jenis"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                required>
                                        </div>
                                        <div>
                                            <label for="stok"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stok
                                            </label>
                                            <input type="nama" value="{{ $b->stok }}" name="stok"
                                                id="stok"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                required>
                                        </div>
                                        <div>
                                            <label for="telp"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                                            </label>
                                            <input type="number" value="{{ $b->harga }}" name="harga"
                                                id="harga"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                required>
                                        </div>
                                        <div>
                                            <label for="foto"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-3">
                                            </label>
                                            <input type="hidden" value="{{ $b->gambar }}" name="gambar"
                                                id=""
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">

                                            <button type="submit"
                                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                                        </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
    </div>
    @endforeach
    </tbody>

    </table>
    </div>
@endsection
