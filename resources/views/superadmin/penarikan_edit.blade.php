@extends('template')

@section('main')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Edit Penarikan
                    </h5>
                    @include('pesan')
                    <div class="panel">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body p-20">
                            <form action="/superadmin/penarikan_update/{{ $penarikans->id_penarikan }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_penarikan" value="<?= $penarikans['id_penarikan'] ?>">
                                <!-- agar form ini hanya dapat diinput via halaman ini saja , Cross side riger forcary-->
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Tanggal Transaksi</label>
                                    <input type="date" class="form-control" id="tanggal_penarikan"
                                        name="tanggal_penarikan" value="{{ $penarikans->tanggal_penarikan }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Username</label>
                                    <select class="form-select" aria-label="Default select example"
                                        name="username_penarikan">
                                        <option value="{{ $penarikans->username_penarikan }}">
                                            {{ $penarikans->username_penarikan }}
                                        </option>
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
                                        name="fullname_penarikan">
                                        <option value="{{ $penarikans->fullname_penarikan }}">
                                            {{ $penarikans->fullname_penarikan }}
                                        </option>
                                        @foreach ($userv as $user)
                                            <option value="{{ $user->name }}">
                                                {{ $user->username }} - {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nominal penarikan</label>
                                    <input type="text" class="form-control" id="nominal_penarikan"
                                        name="nominal_penarikan" value="{{ $penarikans->nominal_penarikan }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Jenis Pengguna</label>
                                    <select class="form-select" aria-label="Default select example" name="jenis_penarikan">
                                        <option value="{{ $penarikans->jenis_penarikan }}">
                                            {{ $penarikans->jenis_penarikan }}
                                        </option>
                                        @foreach ($total_tabungan as $tp)
                                            <option value="{{ $tp->jenis_penabung }}">
                                                {{ $tp->jenis_penabung }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Keterangan</label>
                                    <input type="text" class="form-control" id="keterangan_penarikan"
                                        name="keterangan_penarikan" value="{{ $penarikans->keterangan_penarikan }}">
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
