@extends('template')

@section('main')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Aktifitas Edit
                    </h5>
                    <small id="aktifitas" class="form-text text-muted"> (Dikirim dari
                        {{ $aktifitass->nama_pengguna_aktifitas }} untuk {{ $aktifitass->penerima_aktifitas }})</small>
                    <div class="panel">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body p-20">
                            <form action="/superadmin/aktifitas_update/{{ $aktifitass->id_aktifitas }}" method="POST">
                                <?= csrf_field() ?>
                                <input type="hidden" name="id_aktifitas" value="{{ $aktifitass->id_aktifitas }}">
                                <!-- agar form ini hanya dapat diinput via halaman ini saja , Cross side riger forcary-->
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal_aktifitas"
                                        name="tanggal_aktifitas" value="{{ $aktifitass->tanggal_aktifitas }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Petugas</label>
                                    <input type="text" class="form-control" id="nama_admin_aktifitas"
                                        name="nama_admin_aktifitas" value="{{ $aktifitass->nama_admin_aktifitas }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Pengirim</label>
                                    <input type="text" class="form-control" id="nama_pengguna_aktifitas"
                                        name="nama_pengguna_aktifitas" value="{{ $aktifitass->nama_pengguna_aktifitas }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nominal</label>
                                    <input type="text" class="form-control" id="nominal_aktifitas"
                                        name="nominal_aktifitas" value="{{ $aktifitass->nominal_aktifitas }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">aktifitas</label>
                                    <input type="text" class="form-control" id="kegiatan_aktifitas"
                                        name="kegiatan_aktifitas" value="{{ $aktifitass->kegiatan_aktifitas }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Penerima</label>
                                    <select class="form-select" aria-label="Default select example"
                                        name="penerima_aktifitas">
                                        <option value="{{ $aktifitass->penerima_aktifitas }}" selected>
                                            {{ $aktifitass->penerima_aktifitas }}</option>
                                        <?php foreach ($user as $us) : ?>
                                        <option value="{{ $us->name }}">{{ $us->name }} - {{ $us->email }}
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">notifikasi</label>
                                    <input type="text" class="form-control" id="transfer_aktifitas"
                                        name="transfer_aktifitas" value="{{ $aktifitass->transfer_aktifitas }}">
                                </div>
                                <a href="{{ url('/superadmin/aktifitas') }}" class="btn btn-primary"><i
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
