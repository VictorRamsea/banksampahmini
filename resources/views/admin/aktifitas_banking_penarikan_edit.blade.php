@extends('template')

@section('main')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Aktifitas Penarikan
                    </h5>
                    @include('pesan')
                    <div class="panel">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body p-20">
                            <form action="{{ route('aktifitas_banking_penarikan_update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_transaksi" value="{{ $transaksis->id_transaksi }}">
                                <!-- agar form ini hanya dapat diinput via halaman ini saja , Cross side riger forcary-->
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal_aktifitas"
                                        name="tanggal_aktifitas" value="{{ $transaksis->tanggal_transaksi }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Petugas</label>
                                    <input type="text" class="form-control" id="nama_admin_aktifitas"
                                        name="nama_admin_aktifitas" value="{{ $name }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Pengguna</label>
                                    <input type="text" class="form-control" id="nama_pengguna_aktifitas"
                                        name="nama_pengguna_aktifitas" value="{{ $transaksis->fullname_transaksi }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nominal</label>
                                    <input type="text" class="form-control" id="nominal_aktifitas"
                                        name="nominal_aktifitas" value="{{ $transaksis->penarikan_transaksi }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Transaksi</label>
                                    <input type="text" class="form-control" id="kegiatan_aktifitas"
                                        name="kegiatan_aktifitas" value="{{ $transaksis->kategori_transaksi }}" readonly>
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
