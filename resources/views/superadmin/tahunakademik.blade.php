@extends('template')

@section('main')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Data Tahun Akademik
                    </h5>
                    <a href="/superadmin/tahunakademik_input" class="btn btn-primary ml-15"><i class="fa fa-plus"></i> Tambah
                        Tahun Akademik</a>
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
                                        <th>Tanggal Awal</th>
                                        <th>Tanggal Akhir</th>
                                        <!-- <th>Tanggal Update</th> -->
                                        <th width="200px">
                                            <center>Aksi</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($tahunakademik as $thk)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>
                                                {{ $thk->tanggal_awal }}
                                            </td>
                                            <td>
                                                {{ $thk->tanggal_akhir }}
                                            </td>

                                            <td style="min-width: 175px;">
                                                <center>
                                                    <!-- <div class="btn btn-group"> -->
                                                    <a href="/superadmin/tahunakademik_edit/{{ $thk->id_tahunakademik }}"
                                                        class="btn btn-warning"><i
                                                            class="fa-sharp fa-solid fa-pencil"></i></a>
                                                    <form
                                                        action="/superadmin/tahunakademik_hapus/{{ $thk->id_tahunakademik }}"
                                                        method="post" class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('apakah anda yakin?');">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                    <!-- </div> -->
                                                </center>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table><br>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
