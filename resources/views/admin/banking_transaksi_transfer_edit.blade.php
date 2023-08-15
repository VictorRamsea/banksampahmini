@extends('template')

@section('main')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    Transfer ke Penerima
                </h5>
                <small id="rekening" class="form-text text-muted"> (Dikirim dari {{ $transaksis->fullname_transaksi }} untuk {{ $transaksis->rekening_transaksi }})</small>
                <div class="panel">
                    <div class="panel-heading">
                    </div>
                    <div class="panel-body p-20">
                        <form action="{{ route('banking_transaksi_transfer_update') }}" method="POST">
                            @csrf
                            <!-- agar form ini hanya dapat diinput via halaman ini saja , Cross side riger forcary-->
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Tanggal Transaksi</label>
                                <input type="text" class="form-control" id="tanggal_tabungan"
                                    name="tanggal_tabungan" value="{{ $transaksis->tanggal_transaksi }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Username</label>
                                <select class="form-select" aria-label="Default select example" name="username_tabungan">
                                    <option value="-" selected>Pilih akun dengan username {{ $transaksis->rekening_transaksi }}</option>
                                    @foreach ($user as $tb)
                                        <option value="{{ $tb->username }}">{{ $tb->name }} - {{ $tb->username }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nama</label>
                                <select class="form-select" aria-label="Default select example" name="fullname_tabungan">
                                    <option value="-" selected>Pilih akun dengan nama {{ $transaksis->rekening_transaksi }}</option>
                                    @foreach ($userv as $tb)
                                        <option value="{{ $tb->name }}">{{ $tb->name }} - {{ $tb->username }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nominal Tabungan</label>
                                <input type="text" class="form-control" id="nominal_tabungan"
                                    name="nominal_tabungan" value="{{ $transaksis->transfer_transaksi }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Jenis Transaksi</label>
                                <input type="text" class="form-control" id="jenis_penabung" name="jenis_penabung"
                                    value="{{ $transaksis->jenis_transaksi }} ">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Petugas</label>
                                <input type="text" class="form-control" id="keterangan_tabungan"
                                    name="keterangan_tabungan" value="{{ $name }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Jenis Transaksi</label>
                                <input type="text" class="form-control" id="jenis_penabung" name="jenis_penabung"
                                    value="{{ $transaksis->jenis_transaksi }}" readonly>
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
