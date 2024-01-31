@extends('layout.master')
@section('konten')
    <a href="/barang">

        <button type="button"
            class="text-white my-4 bg-yellow-300 rounded-lg border-0 p-2 hover:bg-yellow-500
            focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 my-5 dark:bg-yellow-600
            dark:hover:bg-yellow-700 focus:outline-none dark:focus:ring-yellow-800 ">Go
            to Product</button>
    </a>
    {{-- Tabel Biodata --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
        <table class="w-full  text-sm text-left  text-gray-500 dark:text-gray-400 ">
            <thead
                class="text-xs text-black uppercase bg-[conic-gradient(at_top,_var(--tw-gradient-stops))] from-yellow-200 via-yellow-300 to-yellow-400">
                <tr>
                    <th scope="col" class="px-6 py-5">
                        #
                    </th>
                    <th scope="col" class="px-6 py-5">
                        Jumlah
                    </th>
                    <th scope="col" class="px-6 py-5">
                        User Id
                    </th>
                    <th scope="col" class="px-10 py-5">
                        Produk
                    </th>
                    <th scope="col" class="px-6 py-5">
                        Nama
                    </th>
                    <th scope="col" class="px-10 py-5">
                        Gambar
                    </th>
                    <th scope="col" class="px-8 py-5">
                        Status
                    </th>
                    @if (Auth::user()->role == "admin")
                        <th scope="col" class="px-28 py-3">
                            Option
                        </th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($pembelian as $b)
                    <tr class=" border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-slate-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-6 py-4 ">
                            {{ $b->banyak }}
                        </td>
                        <td class="px-7 py-4 ">
                            {{ $b->kode_pembeli }}
                        </td>
                        <td class="px-7 py-4 ">
                            {{ $b->nama }}
                        </td>
                        <td class="px-7 py-4 ">
                            {{ $b->name }}
                        </td>
                        <td class="px-6 py-4">
                            <img src="/img/{{ $b->gambar }}" alt="" width="100px" height="100px">
                        </td>
                        <td class="px-7 py-4 ">
                            @if ($b->status == 'selesai')
                                <span class="bg-green-500 rounded-lg p-2 text-white">{{ $b->status }}</span>
                            @elseif($b->status == 'verifikasi')
                                <span class="bg-blue-500 rounded-lg p-2 text-white">{{ $b->status }}</span>
                            @else
                                <span class="bg-yellow-500 rounded-lg p-2 text-white">{{ $b->status }}</span>
                            @endif
                        </td>
                        @if (auth()->user()->role == "admin")
                            <td class="px-14 py-6 ">
                                <form class="inline-block" action="/pembelian/delete/{{ $b->kode_pembelian }}"
                                    method="get">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('Apakah Ingin Menghapus')" type="submit"
                                        class="text-white bg-[conic-gradient(at_top_right,_var(--tw-gradient-stops))] from-orange-500 to-yellow-300 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Delete</button>
                                </form>
                                <button data-modal-target="authentication-modal{{ $b->kode_pembelian }}"
                                    data-modal-toggle="authentication-modal{{ $b->kode_pembelian }}"
                                    class="text-white bg-[conic-gradient(at_top_right,_var(--tw-gradient-stops))] from-orange-500 to-yellow-300 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Update</button>
                            </td>
                        @endif
                    </tr>
                    {{-- Update --}}

                    <!-- Main modal -->

                    <div id="authentication-modal{{ $b->kode_pembelian }}" tabindex="-1" aria-hidden="true"
                        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full">

                            <!-- Modal content -->

                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button"
                                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="authentication-modal{{ $b->kode_pembelian }}">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="px-6 py-6 lg:px-8">
                                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Update Produk</h3>
                                    <form class="space-y-6" action="/update/pembelian/{{ $b->kode_pembelian }}"
                                        method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $b->kode_pembelian }}">

                                        <label for="countries"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                                            option</label>
                                        <select id="countries" name="status"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="verifikasi">Verifikasi</option>
                                            <option value="proses">Proses</option>
                                            <option value="selesai">Selesai</option>

                                        </select>

                                        <button type="submit"
                                            class="w-full mb-10 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
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
