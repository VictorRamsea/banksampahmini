@extends('template')

@section('main')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Data Pengguna
                    </h5>
                    <a href="/superadmin/pengguna_input" class="btn btn-primary ml-15"><i class="fa fa-plus"></i> Tambah
                        Pengguna</a>
                    <br><br>
                    @include('pesan')
                    <div class="panel-body p-20">
                        <div class="table-responsive">
                            <table id="table"
                                class="table star-student table-hover table-center table-bordered table-striped"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Email</th>
                                        <th>Nama Lengkap</th>
                                        <th>Username</th>
                                        <th>Grup</th>

                                        <th width="200px">
                                            <center>Aksi</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($user as $us)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>
                                                {{ $us->email }}
                                            </td>
                                            <td>
                                                {{ $us->name }}
                                            </td>
                                            <td>
                                                {{ $us->username }}
                                            </td>
                                            <td>
                                                {{ $us->role }}
                                            </td>

                                            <td style="min-width: 175px;">
                                                <center>
                                                    <!-- <div class="btn btn-group"> -->
                                                    <a href="/superadmin/pengguna_detail/{{ $us->id }}"
                                                        class="btn btn-info"><i class="fa fa-search"></i></a>
                                                    <a href="/superadmin/pengguna_edit/{{ $us->id }}"
                                                        class="btn btn-warning"><i
                                                            class="fa-sharp fa-solid fa-pencil"></i></a>
                                                    <a href="/superadmin/ubahpassword/{{ $us->id }}"
                                                        class="btn btn-success"><i class="fa-solid fa-key"></i></a>
                                                    <form action="/superadmin/pengguna_hapus/{{ $us->id }}"
                                                        method="post" class="d-inline">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="delete">
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
