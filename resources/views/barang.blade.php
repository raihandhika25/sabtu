@extends('layout.main')
@section('container')
    <div class=" mt-10 h-screen rounded-md w-full ">
        <div class="grid grid-cols-2 md:grid-cols-4 p-4 gap-5">
            @foreach ($produk as $b)
                <div
                    class="w-72 max-w-sm  bg-white-800 border  border-gray-200 rounded-xl  shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="p-8 w-72 h-72 mx-auto object-cover rounded-t-lg" src="/img/{{ $b->gambar }}"
                            alt="product image" />
                    </a>
                    <div class="px-5 pb-5">
                        <a href="#">
                            <h5 class="text-lg ms-20 font-bold tracking-tight  text-black dark:text-white">
                                {{ $b->nama }}</h5>
                        </a>
                        <div class="flex ms-16 pt-2 items-center justify-between">
                            <span class="text-l font-bold text-black dark:text-white">Rp.{{ $b->harga }}</span>
                        </div>
                        @if (Auth::check() && auth()->user()->role != 'admin')
                            <button type="button" data-modal-target="defaultModal{{ $b->kode }}"
                                data-modal-toggle="defaultModal{{ $b->kode }}"
                                class="text-white mt-5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Beli</button>
                        @endif
                    </div>
                </div>



                <!-- Main modal -->
                <div id="defaultModal{{ $b->kode }}" tabindex="-1" aria-hidden="true"
                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-2xl max-h-full">id
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Deskripsi
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="defaultModal{{ $b->kode }}">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->

                            <div
                                class="max-w-sm ms-40 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                <a href="#">
                                    <img class="rounded-t-lg" src="/img/{{ $b->gambar }}" alt="" />
                                </a>
                                <h5 class="text-lg mb-5 ms-4 text-black-700">{{ $b->nama }}</h5>
                                <h5 class="text-lg mb-5 ms-4 text-slate-700">Harga : Rp.{{ $b->harga }}</h5>

                                <form action="/pembelian/storeinput" method="POST">

                                    @csrf
                                    <input type="hidden" name="kode_produk" value="{{ $b->kode }}">
                                    <input type="hidden" name="harga" value="{{ $b->harga }}">
                                    <div>
                                        <label for="banyak"
                                            class="block ms-3 mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Banyak</label>
                                        <input type="number" name="banyak"
                                            class="bg-gray-50 border my-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                            required>
                                    </div>

                                    <div
                                        class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                        <button data-modal-hide="defaultModal" type="submit"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Beli</button>
                                    </div>
                                </form>
                            </div>

                            <!-- Modal footer -->
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endsection
