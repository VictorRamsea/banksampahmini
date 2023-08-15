@extends('template')

@section('main')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Penarikan
                    </h5>
                    @include('pesan')
                    <div class="panel">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body p-20">
                            <form action="{{ route('admin_penarikan_save') }}" method="POST">
                                <?= csrf_field() ?>
                                <!-- agar form ini hanya dapat diinput via halaman ini saja , Cross side riger forcary-->
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Tanggal penarikan</label>
                                    <input type="date" class="form-control" id="tanggal_penarikan"
                                        name="tanggal_penarikan" value="{{ Session::get('tanggal_penarikan') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Username</label>
                                    <select class="form-select" aria-label="Default select example"
                                        name="username_penarikan">
                                        @foreach ($user as $tb)
                                            <option value="{{ $tb->username }}">{{ $tb->name }} - {{ $tb->email }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nama</label>
                                    <select class="form-select" aria-label="Default select example"
                                        name="fullname_penarikan">
                                        @foreach ($userv as $tb)
                                            <option value="{{ $tb->name }}">{{ $tb->name }} - {{ $tb->email }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nominal</label>
                                    <input type="text" class="form-control" id="nominal_penarikan"
                                        name="nominal_penarikan" value="{{ Session::get('nominal_penarikan') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Petugas</label>
                                    <input type="text" class="form-control" id="keterangan_penarikan"
                                        name="keterangan_penarikan" value="{{ $name }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Jenis Pengguna</label>
                                    <select class="form-select" aria-label="Default select example" name="jenis_penarikan">
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
