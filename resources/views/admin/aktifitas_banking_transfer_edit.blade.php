@extends('template')

@section('main')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Transaksi Tabungan
                    </h5>
                    <small id="rekening" class="form-text text-muted"> (Dikirim dari {{ $transaksis->fullname_transaksi }}
                        untuk {{ $transaksis->rekening_transaksi }})</small>
                    <div class="panel">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body p-20">
                            <form action="{{ route('aktifitas_banking_transfer_update') }}" method="POST">
                                <?= csrf_field() ?>
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
                                        name="nama_pengguna_aktifitas" value="{{ $transaksis->fullname_transaksi }}"
                                        readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nominal</label>
                                    <input type="text" class="form-control" id="nominal_aktifitas"
                                        name="nominal_aktifitas" value="{{ $transaksis->transfer_transaksi }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Transaksi</label>
                                    <input type="text" class="form-control" id="kegiatan_aktifitas"
                                        name="kegiatan_aktifitas" value="{{ $transaksis->kategori_transaksi }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Penerima</label>
                                    <select class="form-select" aria-label="Default select example"
                                        name="penerima_aktifitas">
                                        <option value="{{ $transaksis->rekening_transaksi }}" selected>
                                            {{ $transaksis->rekening_transaksi }}</option>
                                        @foreach ($user as $us)
                                            <option value="{{ $us->name }}">{{ $us->username }} - {{ $us->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="form-text" id="basic-addon4">Harap pilih Nama yang mempunyai NISN {{ $transaksis->rekening_transaksi }}</div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Notifikasi</label>
                                    <input type="text" class="form-control" id="transfer_aktifitas"
                                        name="transfer_aktifitas" value="{{ $transaksis->fullname_transaksi }} melakukan transfer kepada anda sebesar {{ $transaksis->transfer_transaksi }} rupiah">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Catatan</label>
                                    <input type="text" class="form-control" id="imbuhan_aktifitas"
                                        name="imbuhan_aktifitas" value="{{ $transaksis->imbuhan_transaksi }}">
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
