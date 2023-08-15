@extends('template')

@section('main')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Tambah Tahun Akademik
                    </h5>
                    @include('pesan')
                    <div class="panel">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body p-20">
                            <i>( * ) Wajib di Isi</i>
                            <form action="/superadmin/tahunakademik_update/{{ $tahunakademik->id_tahunakademik }}"
                                method="POST">

                                @csrf
                                <!-- agar form ini hanya dapat diinput via halaman ini saja , Cross side riger forcary-->
                                <table class="table">
                                    <tr>
                                        <td>
                                            Tanggal Awal*
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>
                                            <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal"
                                                value="{{ $tahunakademik->tanggal_awal }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Tanggal Akhir*
                                        </td>
                                        <td>
                                            :
                                        </td>
                                        <td>
                                            <input type="date" class="form-control" id="tanggal_akhir"
                                                name="tanggal_akhir" value="{{ $tahunakademik->tanggal_akhir }}">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="3"></td>
                                    </tr>
                                </table>
                                <a href="{{ url('superadmin/tahunakademik') }}" class="btn btn-primary"><i
                                        class="fa fa-arrow-left"></i> Kembali</a>
                                <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i>Tambah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
