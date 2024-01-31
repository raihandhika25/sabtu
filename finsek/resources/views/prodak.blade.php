@extends('master')
@section('prodak')
    <div class="container-fluid">
        <div class="text-end m-2"><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahprodak"> +
                Tambah barang Baru</button></div>
        @if (session('message'))
            <div class="alert alert-success m-3"> {{ session('message') }} </div>
        @endif
        <table class="table table-dark table-hover m-lg-2">
            <tr>
                <th>foto</th>
                <th>id</th>
                <th>nama</th>
                <th>harga</th>
                <th>stok</th>
            </tr>
            @foreach ($prodak as $p)
                <tr>
                    <td> {{$p->foto}}<br><img src="/images/{{$p->foto}}" alt="" width="200" height="200" class="object-fit-cover"> </td>
                    <td> {{ $p->id }} </td>
                    <td> {{ $p->nama }} </td>
                    <td> {{ $p->harga }} </td>
                    <td> {{ $p->stok}} </td>
                    <td>    

                    <button class="btn btn-info" data-bs-toggle="modal"
                        data-bs-target="#ModalUpdateprodak{{ $p->id }}">Update</button>
                    |
                    <button class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#ModalDeleteprodak{{ $p->id }}">Delete</button>
                    </td>
                </tr>

                <!-- Ini tampil form update prodak -->
                <div class="modal fade" id="ModalUpdateprodak{{ $p->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Update prodak</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/prodak/storeupdate" method="post" class="form-floating">
                                    @csrf
                                    <div class="form-floating p-1">
                                        <input type="text" name="id" id="id" readonly class="form-control"
                                            value="{{ $p->id }}">
                                        <label for="floatingInputValue">id</label>
                                    </div>
                                    <div class="form-floating p-1">
                                        <input type="text" name="nama" required="required" class="form-control"
                                            value="{{ $p->nama }}">
                                        <label for="floatingInputValue">Nama</label>
                                    </div>
                                   
                                    <div class="form-floating p-1">
                                        <input type="text" name="harga" required="required" class="form-control"
                                            value="{{ $p->harga }}">
                                        <label for="floatingInputValue">harga</label>
                                    </div>
                                    <div class="form-floating p-1">
                                        <input type="text" name="stok" required="required" class="form-control"
                                            value="{{ $p->stok }}">
                                        <label for="floatingInputValue">stok</label>
                                    </div>
                                    <div class="form-floating p-1">
                                        <input type="text" name="foto" required="required" class="form-control"
                                            value="{{ $p->foto }}">
                                        <label for="floatingInputValue">foto</label>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save Updates</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ini tampil form delete prodak -->
                <div class="modal fade" id="ModalDeleteprodak{{ $p->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus prodak</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/prodak/delete/{{ $p->id }}" method="get" class="form-floating">
                                    @csrf
                                    <div>
                                        <h3>Yakin mau menghapus data <b>{{ $p->nama }}</b> ?</h3>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Yes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </table>
    </div>

    <!-- Ini tampil form tambah prodak -->
    <div class="modal fade" id="ModalTambahprodak" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah prodak</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/prodak/storeinput" method="post" class="form-floating"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating p-1">
                            <input type="text" name="id" required="required" class="form-control">
                            <label for="floatingInputValue">id</label>
                        </div>
                        <div class="form-floating p-1">
                            <input type="text" name="nama" required="required" class="form-control">
                            <label for="floatingInputValue">Nama</label>
                        </div>
                        <div class="form-floating p-1">
                            <input type="text" name="jenis" required="required" class="form-control">
                            <label for="floatingInputValue">jenis</label>
                        </div>
                        <div class="form-floating p-1">
                            <input type="text" name="tipe" required="required" class="form-control">
                            <label for="floatingInputValue">tipe</label>
                        </div>
                        <div class="form-floating p-1">
                            <input type="text" name="harga" required="required" class="form-control">
                            <label for="floatingInputValue">harga</label>
                        </div>
                        <div class="form-floating p-1">
                            <input type="text" name="stok" required="required" class="form-control">
                            <label for="floatingInputValue">stok</label>
                        </div>
                        <div class="form-floating p-1">
                            <input type="file" name="foto" required="required" class="form-control">
                            <label for="floatingInputValue">foto</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection