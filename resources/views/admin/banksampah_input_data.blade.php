@extends('template')

@section('main')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <!-- Fungsi Penambahan -->
                    <h5 class="card-title">
                        BANK SAMPAH
                    </h5>
                    <br>
                    <form id="orderForm">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="daftarItem">Daftar Barang:</label>
                                <select id="daftarItem" class="form-control"> //tambah name disetiap input
                                    <option value="">Pilih Barang</option>
                                    @foreach ($banksampah as $barang)
                                        <option value="{{ $barang->id_banksampah }}" data-harga="{{ $barang->Harga }}">
                                            {{ $barang->Nama_Item }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="hargaItem">Harga Barang:</label>
                                <input type="text" id="hargaItem" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="jumlah">Jumlah:</label>
                                <input type="number" id="jumlah" class="form-control" value="1" min="1">
                            </div>
                            <div class="col-md-6">
                                <label for="totalHarga">Total Harga:</label>
                                <input type="text" id="totalHarga" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <button type="button" id="tambahKeranjang" class="btn btn-success">Tambahkan ke
                                    Keranjang</button>
                            </div>
                        </div>
                    </form>
                    <!-- Akhir Penambahan -->

                    <br>

                    <div class="mt-4">
                        <h3>Form Transaksi</h3>

                        @include('pesan')

                        <form action="{{ route('simpanKeDatabase') }}" method="POST">
                            @csrf
                            {{-- <input type="hidden" name="cartItems" id="cartItemsInput"> --}}
                            <section>
                                <div class="form-group">
                                    <label for="daftarBarang">Barang</label>
                                    <textarea class="form-control" name="daftarBarang" id="daftarBarang" rows="3" placeholder="Daftar barang ..."></textarea>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="jumlahDiKeranjang">Jumlah</label>
                                        <input type="text" name="jumlahDiKeranjang" id="jumlahDiKeranjang"
                                            class="form-control" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="totalHargaDiKeranjang">Total Harga</label>
                                        <input type="text" name="totalHargaDiKeranjang" id="totalHargaDiKeranjang"
                                            class="form-control" readonly>
                                    </div>
                                </div>
                            </section>
                            <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="exampleFormControlInput1" class="form-label">Username</label>
                                    <select class="form-select" aria-label="Default select example" name="username_sampah">
                                        @foreach ($user as $tb)
                                            <option value="{{ $tb->username }}">{{ $tb->name }} - {{ $tb->email }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nama</label>
                                    <select class="form-select" aria-label="Default select example" name="fullname_sampah">
                                        @foreach ($userv as $tb)
                                            <option value="{{ $tb->name }}">{{ $tb->name }} - {{ $tb->email }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="col-md-3">
                                    <label for="date">Tanggal:</label>
                                    <input type="date" id="tanggal_sampah" name="tanggal_sampah" class="form-control"
                                        required>
                                </div>
                                <div class="col-md-3">
                                    <label for="petugas">Petugas:</label>
                                    <input type="text" id="petugas_sampah" name="petugas_sampah" class="form-control"
                                        required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    {{-- <button type="button" id="saveToDatabaseBtn" class="btn btn-primary">Simpan</button> --}}
                                    <button class="btn btn-success"><i class="fa fa-plus"></i>Tambah</button>
                                </div>
                            </div>
                        </form>
                        <br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
