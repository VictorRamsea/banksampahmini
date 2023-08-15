@extends('template')

@section('main')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    Banking
                </h5>
                @include('pesan')
                <div class="panel">
                    <div class="panel-heading">
                    </div>
                    <div class="panel-body p-20">
                        <form action="/admin/banking_penarikan_update/{{ $transaksis->id_transaksi }}" method="POST">
                            @csrf
                            <input type="hidden" name="id_transaksi" value="{{ $transaksis->id_transaksi }}">
                            <!-- agar form ini hanya dapat diinput via halaman ini saja , Cross side riger forcary-->
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Tanggal Transaksi</label>
                                    <input type="date" class="form-control" id="tanggal_transaksi" name="tanggal_transaksi"
                                        value="{{ $transaksis->tanggal_transaksi }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Username Transaksi</label>
                                    <input type="text" class="form-control" id="username_transaksi" name="username_transaksi"
                                        value="{{ $transaksis->username_transaksi }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nama Transaksi</label>
                                    <input type="text" class="form-control" id="fullname_transaksi" name="fullname_transaksi"
                                        value="{{ $transaksis->fullname_transaksi }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nominal Transaksi</label>
                                    <input type="text" class="form-control" id="penarikan_transaksi" name="penarikan_transaksi"
                                        value="{{ $transaksis->penarikan_transaksi }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Petugas Transaksi</label>
                                    <input type="text" class="form-control" id="petugas_transaksi" name="petugas_transaksi"
                                        value="{{ $name }}" readonly>
                                </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Keterangan</label>
                                <select class="form-select" aria-label="Default select example" name="keterangan_transaksi">
                                    <option value="{{ $transaksis->keterangan_transaksi }}" selected>{{ $transaksis->keterangan_transaksi }}</option>
                                    <option value="Selesai">Selesai</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Gagal">Gagal</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Warna</label>
                                <select class="form-select" aria-label="Default select example" name="warna_transaksi">
                                    <<option value="{{ $transaksis->warna_transaksi }}" selected>{{ $transaksis->warna_transaksi }}</option>
                                    <option value="success">Selesai</option>
                                    <option value="warning">Pending</option>
                                    <option value="danger">Gagal</option>
                                </select>
                            </div>
                            <a href="{{ url('/admin/banking') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                            <button class="btn btn-success"><i class="fa fa-plus"></i>Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






@endsection
