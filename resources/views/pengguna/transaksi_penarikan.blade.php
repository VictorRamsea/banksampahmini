@extends('template')

@section('main')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Transaksi Penarikan
                    </h5>
                    @include('pesan')
                    <div class="panel">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body p-20">
                            <form action="{{ route('transaksi_penarikan_save') }}" method="POST">
                                @csrf
                                <!-- agar form ini hanya dapat diinput via halaman ini saja , Cross side riger forcary-->
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Tanggal Transaksi</label>
                                    <input type="date" class="form-control" id="tanggal_transaksi"
                                        name="tanggal_transaksi" value="{{ Session::get('tanggal_transaksi') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username_transaksi"
                                        name="username_transaksi" value="{{ $userall->username }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="fullname_transaksi"
                                        name="fullname_transaksi" value="{{ $userall->name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nominal</label>
                                    <input type="text" class="form-control" id="penarikan_transaksi"
                                        name="penarikan_transaksi" value="{{ Session::get('penarikan_transaksi') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Jenis Transaksi</label>
                                    <select class="form-select" aria-label="Default select example" name="jenis_transaksi">
                                        @if ($userall->bidang_user == 'Guru')
                                            <option value="guru_total">Guru</option>
                                        @elseif ($userall->bidang_user == 'Staff')
                                            <option value="staff_total">Staff</option>
                                        @else
                                            <option value="siswa_total">Siswa</option>
                                        @endif
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
