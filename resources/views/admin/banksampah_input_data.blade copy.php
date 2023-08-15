@extends('template')

@section('main')
<div class="container mt-4">
    <!-- Fungsi Penambahan -->
    <form id="orderForm">
        <div class="row">
            <div class="col-md-6">
                <label for="itemList">Daftar Barang:</label>
                <select id="itemList" class="form-control">
                    <option value="">Pilih Barang</option>
                    @foreach ($banksampah as $barang)
                    <option value="{{ $barang->id_banksampah }}" data-price="{{ $barang->Harga }}">
                        {{ $barang->Nama_Item }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="itemPrice">Harga Barang:</label>
                <input type="text" id="itemPrice" class="form-control" readonly>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <label for="quantity">Jumlah:</label>
                <input type="number" id="quantity" class="form-control" value="1" min="1">
            </div>
            <div class="col-md-6">
                <label for="totalPrice">Total Harga:</label>
                <input type="text" id="totalPrice" class="form-control" readonly>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <button type="button" id="addToCartBtn" class="btn btn-success">Tambahkan ke Keranjang</button>
            </div>
        </div>
    </form>
    <!-- Akhir Penambahan -->

    <div class="form-group">
        <label for="alamat">Alamat</label>
        <textarea class="form-control" id="alamat" rows="3" placeholder="Contoh textarea .."></textarea>
    </div>



    <div class="mt-4">
        <h3>Form Transaksi</h3>

        @include('pesan')

        <form action="{{ route('saveSampah') }}" method="POST">
            @csrf
            <input type="hidden" name="cartItems" id="cartItemsInput">
            <div class="row">
                <div class="col-md-3">
                    <label for="username">Username:</label>
                    <input type="text" id="username_sampah" name="username_sampah" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label for="name">Nama:</label>
                    <input type="text" id="fullname_sampah" name="fullname_sampah" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label for="date">Tanggal:</label>
                    <input type="date" id="tanggal_sampah" name="tanggal_sampah" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label for="petugas">Petugas:</label>
                    <input type="text" id="petugas_sampah" name="petugas_sampah" class="form-control" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    {{-- <button type="button" id="saveToDatabaseBtn" class="btn btn-primary">Simpan</button> --}}
                    <button class="btn btn-success"><i class="fa fa-plus"></i>Tambah</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection