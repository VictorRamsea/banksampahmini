@extends('template')

@section('main')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Tambah Tabungan
                    </h5>
                    @include('pesan')
                    <div class="panel">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body p-20">
                            <form action="{{ route('tabungan_save') }}" method="POST">
                                @csrf
                                <!-- agar form ini hanya dapat diinput via halaman ini saja , Cross side riger forcary-->
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Tanggal Transaksi</label>
                                    <input type="date" class="form-control" id="tanggal_tabungan" name="tanggal_tabungan"
                                        value="{{ Session::get('tanggal_tabungan') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Username</label>
                                    <select class="form-select" aria-label="Default select example"
                                        name="username_tabungan">
                                        @foreach ($user as $user)
                                            <option value="{{ $user->username }}">
                                                {{ $user->username }} - {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Fullname</label>
                                    <select class="form-select" aria-label="Default select example"
                                        name="fullname_tabungan">
                                        @foreach ($userv as $user)
                                            <option value="{{ $user->name }}">
                                                {{ $user->username }} - {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nominal Tabungan</label>
                                    <input type="text" class="form-control" id="nominal_tabungan" name="nominal_tabungan"
                                        value="{{ Session::get('nominal_tabungan') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Jenis Pengguna</label>
                                    <select class="form-select" aria-label="Default select example" name="jenis_penabung">
                                        @foreach ($total_tabungan as $tp)
                                            <option value="{{ $tp->jenis_penabung }}">
                                                {{ $tp->jenis_penabung }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <a href="{{ url('/superadmin/transaksi') }}" class="btn btn-primary"><i
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
