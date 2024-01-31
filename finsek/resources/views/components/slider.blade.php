@foreach ($barangs as $p)
                <div class="col-lg-4 col-md-6 portfolio-item {{$p->nama}}">
                    <div class="portfolio-wrap">
                        <img src="/images/{{$p->foto}}" class="img-fluid" alt="" width="400px" height="600px">
                        <div class="portfolio-info">
                            <h4>{{$p->nama}}</h4>
                            <p>{{$p->foto}}</p>
                            <div class="portfolio-links">
                                <a href="assets/img/{{$p->foto}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="{{$p->nama.' '.$p->stok}}"><i class="bx bx-plus"></i>SHOW</a>
                                |
                                @if(Auth::check())
                                <a href="" data-bs-toggle="modal" data-bs-target="#ModalTambahpembelian{{$p->id}}" title="Pesan"><i class="bx bx-link"></i>BELI</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ini tampil form tambah pembelian -->
                <div class=" modal fade" id="ModalTambahpembelian{{$p->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah pembelian</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body clearfix">
                                <div class="card" style="width: 18rem;">
                                    <img src="/images/{{$p->foto}}" class="card-img-top" alt="{{$p->nama}}">
                                    <div class="card-body">
                                        <h5 class="card-title">Deskripsi :</h5>
                                     
                                        <p class="card-text">Harga : Rp.{{$p->harga}}</p>
                                        <p class="card-text">Stok : {{$p->stok}}</p>
                                    </div>
                                </div>
                                <form action="/transaksi/storeinput" method="post" class="form-floating">
                                    @csrf
                                    <input type="hidden" name="idproduk" value="{{$p->id}}">
                                    <input type="hidden" name="harga" value="{{$p->harga}}">
                                    <div class="form-floating p-1">
                                        <input type="text" name="banyak" required="required" class="form-control">
                                        <label for="floatingInputValue">Banyak</label>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Beli</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach