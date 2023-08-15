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
                            <form action="{{ route('aktifitas_save') }}" method="POST">
                                @csrf
                                <!-- agar form ini hanya dapat diinput via halaman ini saja , Cross side riger forcary-->
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Tanggal Transaksi</label>
                                    <input type="date" class="form-control" id="tanggal_aktifitas"
                                        name="tanggal_aktifitas" value="{{ Session::get('tanggal_aktifitas') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Petugas</label>
                                    <input type="text" class="form-control" id="nama_admin_aktifitas"
                                        name="nama_admin_aktifitas" value="{{ Session::get('nama_admin_aktifitas') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nama</label>
                                    <select class="form-select" aria-label="Default select example"
                                        name="nama_pengguna_aktifitas">
                                        @foreach ($user as $tb)
                                            <option value="{{ $tb->name }}">{{ $tb->name }} - {{ $tb->email }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nominal</label>
                                    <input type="text" class="form-control" id="nominal_aktifitas"
                                        name="nominal_aktifitas" value="{{ Session::get('nominal_aktifitas') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Jenis Aktifitas</label>
                                    <select class="form-select" id="aktifitas_pil" onchange="aktifitas_memilih()"
                                        aria-label="Default select example" name="kegiatan_aktifitas">
                                        <option value="tabungan">tabungan
                                        </option>
                                        <option value="penarikan">penarikan
                                        </option>
                                        <option value="transfer">transfer
                                        </option>
                                    </select>
                                </div>
                                <h5>Transfer</h5>
                                <div class="mb-3">
                                    <label for="inputField" class="form-label">Nama Penerima</label>
                                    <select class="form-select" id="sasaran_pil" aria-label="Default select example"
                                        name="penerima_aktifitas" @readonly(true)>
                                        <option value="user" selected>user
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
                                        name="transfer_aktifitas"
                                        value="{{ Session::get('transfer_aktifitas') }}."readOnly>
                                </div>
                                <div class="mb-3">
                                    <label for="inputFieldtiga" class="form-label">Catatan</label>
                                    <input type="text" class="form-control" id="imbuhan_aktifitas"
                                        name="imbuhan_aktifitas" value="{{ Session::get('imbuhan_aktifitas') }}. "
                                        readonly>
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
