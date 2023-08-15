@extends('template')

@section('main')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Data Jurusan
                    </h5>
                    <a href="/superadmin/prodi_input" class="btn btn-primary ml-15"><i class="fa fa-plus"></i> Tambah Prodi</a>
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
                                        <th>Jurusan</th>

                                        <th width="200px">
                                            <center>Aksi</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($prodi as $prodi)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>
                                                {{ $prodi->prodi }}
                                            </td>
                                            </td>
                                            <td style="min-width: 175px;">
                                                <center>
                                                    <!-- <div class="btn btn-group"> -->
                                                    <a href="/superadmin/prodi_edit/{{ $prodi->id_prodi }}"
                                                        class="btn btn-warning"><i
                                                            class="fa-sharp fa-solid fa-pencil"></i></a>
                                                    <form action="/superadmin/prodi_hapus/{{ $prodi->id_prodi }}"
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
@endsection
