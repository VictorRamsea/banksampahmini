@extends('template')

@section('main')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Transaksi Tabungan
                    </h5>
                    @include('pesan')
                    <div class="panel">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body p-20">
                            <form action="/admin/admin_tabungan_update/{{ $tabungan->id_tabungan }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_tabungan" value="{{ $tabungan->id_tabungan }}">
                                <!-- agar form ini hanya dapat diinput via halaman ini saja , Cross side riger forcary-->
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Tanggal tabungan</label>
                                    <input type="date" class="form-control" id="tanggal_tabungan" name="tanggal_tabungan"
                                        value="{{ $tabungan->tanggal_tabungan }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Username</label>
                                    <select class="form-select" aria-label="Default select example"
                                        name="username_tabungan">
                                        <option value="{{ $tabungan->username_tabungan }}">{{ $tabungan->username_tabungan }}
                                        </option>
                                        @foreach ($user as $tb)
                                            <option value="{{ $tb->username }}">{{ $tb->name }} - {{ $tb->email }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nama</label>
                                    <select class="form-select" aria-label="Default select example"
                                        name="fullname_tabungan">
                                        <option value="{{ $tabungan->fullname_tabungan }}">{{ $tabungan->fullname_tabungan }}
                                        </option>
                                        @foreach ($userv as $tb)
                                            <option value="{{ $tb->name }}">{{ $tb->name }} - {{ $tb->email }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nominal</label>
                                    <input type="text" class="form-control" id="nominal_tabungan" name="nominal_tabungan"
                                        value="{{ $tabungan->nominal_tabungan }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Petugas</label>
                                    <input type="text" class="form-control" id="keterangan_tabungan"
                                        name="keterangan_tabungan" value="{{ $tabungan->keterangan_tabungan }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Jenis Pengguna</label>
                                    <select class="form-select" aria-label="Default select example" name="jenis_penabung">
                                        <option value="{{ $tabungan->jenis_penabung }}">{{ $tabungan->jenis_penabung }}
                                        </option>
                                        @foreach ($totaltabungan as $tb)
                                            <option value="{{ $tb->jenis_penabung }}">{{ $tb->jenis_penabung }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <a href="{{ url('/pengguna/banking') }}" class="btn btn-primary"><i
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
