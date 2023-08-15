@extends('template')

@section('main')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Transaksi Penarikan
                    </h5>
                    @include('pesan')
                    <div class="panel">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body p-20">
                            <form action="{{ route('banking_transaksi_penarikan_update') }}" method="POST">
                                @csrf
                                <!-- agar form ini hanya dapat diinput via halaman ini saja , Cross side riger forcary-->
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Tanggal Transaksi</label>
                                    <input type="text" class="form-control" id="tanggal_penarikan"
                                        name="tanggal_penarikan" value="{{ $transaksis->tanggal_transaksi }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Username Transaksi</label>
                                    <input type="text" class="form-control" id="username_penarikan"
                                        name="username_penarikan" value="{{ $transaksis->username_transaksi }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Fullname Transaksi</label>
                                    <input type="text" class="form-control" id="fullname_penarikan"
                                        name="fullname_penarikan" value="{{ $transaksis->fullname_transaksi }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nominal Transaksi</label>
                                    <input type="text" class="form-control" id="nominal_penarikan"
                                        name="nominal_penarikan" value="{{ $transaksis->penarikan_transaksi }} ">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Petugas Transaksi</label>
                                    <input type="text" class="form-control" id="keterangan_penarikan"
                                        name="keterangan_penarikan" value="{{ $name }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Jenis Transaksi</label>
                                    <input type="text" class="form-control" id="jenis_penarikan" name="jenis_penarikan"
                                        value="{{ $transaksis->jenis_transaksi }}" readonly>
                                </div>
                                <a href="{{ url('/admin/banking') }}" class="btn btn-primary"><i
                                        class="fa fa-arrow-left"></i> Kembali</a>
                                <button class="btn btn-success"><i class="fa fa-plus"></i>Tambah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
