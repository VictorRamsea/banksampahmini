@extends('template')

@section('main')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Daftar Kelas
                    </h5>
                    <br><br>
                    @include('pesan')
                    <div class="panel-body p-20">
                        <div class="table-responsive">
                            <table id="NoButton"
                                class="table star-student table-hover table-center table-bordered table-striped"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kelas</th>

                                        <th width="200px">
                                            <center>Aksi</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($kelas as $kelas)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>
                                                {{ $kelas->kelas }} {{ $kelas->prodi_kelas }} {{ $kelas->jurusan_kelas }}
                                            </td>
                                            <td style="min-width: 175px;">
                                                <center>
                                                    <!-- <div class="btn btn-group"> -->
                                                    <a href="/superadmin/kelasdetail/{{ $kelas->id_kelas }}"
                                                        class="btn btn-warning">Detail</a>
                                                    <!-- </div> -->
                                                </center>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
