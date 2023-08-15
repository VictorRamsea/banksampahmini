@extends('template')

@section('main')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Data Kelas
                    </h5>
                    <a href="/superadmin/kelas_input" class="btn btn-primary ml-15"><i class="fa fa-plus"></i> Tambah Kelas</a>
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
                                        <th>Prodi</th>
                                        <th>Rombel</th>

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
                                                {{ $kelas->kelas }}
                                            </td>
                                            <td>
                                                {{ $kelas->prodi_kelas }}
                                            </td>
                                            <td>
                                                {{ $kelas->jurusan_kelas }}
                                            </td>
                                            </td>
                                            <td style="min-width: 175px;">
                                                <center>
                                                    <!-- <div class="btn btn-group"> -->
                                                    <a href="/superadmin/kelas_edit/{{ $kelas->id_kelas }}"
                                                        class="btn btn-warning"><i
                                                            class="fa-sharp fa-solid fa-pencil"></i></a>
                                                    <form action="/superadmin/kelas_hapus/{{ $kelas->id_kelas }}"
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
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
@endsection
