@extends('template')

@section('main')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Aktifitas
                    </h5>
                    <div class="panel">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body p-20">
                            <form action="/admin/admin_aktifitas_update/{{ $aktifitas->id_aktifitas }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_aktifitas" value="{{ $aktifitas->id_aktifitas }}">
                                <!-- agar form ini hanya dapat diinput via halaman ini saja , Cross side riger forcary-->
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Tanggal Transaksi</label>
                                    <input type="text" class="form-control" id="tanggal_aktifitas"
                                        name="tanggal_aktifitas" value="{{ $aktifitas->tanggal_aktifitas }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Petugas</label>
                                    <input type="text" class="form-control" id="nama_admin_aktifitas"
                                        name="nama_admin_aktifitas" value="{{ $aktifitas->nama_admin_aktifitas }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Pengguna</label>
                                    <input type="text" class="form-control" id="nama_pengguna_aktifitas"
                                        name="nama_pengguna_aktifitas" value="{{ $aktifitas->nama_pengguna_aktifitas }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nominal</label>
                                    <input type="text" class="form-control" id="nominal_aktifitas"
                                        name="nominal_aktifitas" value="{{ $aktifitas->nominal_aktifitas }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Transaksi</label>
                                    <input type="text" class="form-control" id="kegiatan_aktifitas"
                                        name="kegiatan_aktifitas" value="{{ $aktifitas->kegiatan_aktifitas }}">
                                </div>
                                <div class="mb-3">
                                    <label for="inputField" class="form-label">Nama Penerima</label>
                                    <select class="form-select" id="sasaran_pil" aria-label="Default select example"
                                        name="penerima_aktifitas">
                                        <option value="{{ $aktifitas->penerima_aktifitas }}" selected>
                                            {{ $aktifitas->penerima_aktifitas }}
                                        </option>
                                        @foreach ($userv as $tb)
                                            <option value="{{ $tb->name }}">{{ $tb->name }} - {{ $tb->email }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="inputFielddua" class="form-label">Nominal Transfer</label>
                                    <input type="text" class="form-control" id="transfer_aktifitas"
                                        name="transfer_aktifitas" value="{{ $aktifitas->transfer_aktifitas }}">
                                </div>
                                <div class="mb-3">
                                    <label for="inputFieldtiga" class="form-label">Catatan</label>
                                    <input type="text" class="form-control" id="imbuhan_aktifitas"
                                        name="imbuhan_aktifitas" value="{{ $aktifitas->imbuhan_aktifitas }}">
                                </div>
                                <a href="{{ url('/admin/aktifitas') }}" class="btn btn-primary"><i
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
