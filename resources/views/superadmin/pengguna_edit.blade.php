@extends('template')

@section('main')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Tambah Pengguna
                    </h5>
                    @include('pesan')
                    <div class="panel">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body p-20">
                            <form action="/superadmin/pengguna_update/{{ $users->id }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Fullname</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $users->name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username"
                                        value="{{ $users->username }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ $users->email }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Role</label>
                                    <select class="form-select" aria-label="Default select example" name="role">
                                        <option value="{{ $users->role }}" selected>{{ $users->role }}</option>
                                        <option value="superadmin">superadmin</option>
                                        <option value="admin">admin</option>
                                        <option value="user">user</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin</label>
                                    <select class="form-select" aria-label="Default select example" name="jk_user">
                                        <option value="{{ $users->jk_user }}" selected>{{ $users->jk_user }}</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Kelas</label>
                                    <select class="form-select" aria-label="Default select example" name="kelas_user">
                                        <option value="{{ $users->kelas_user }}" selected>{{ $users->kelas_user }}</option>
                                        @foreach ($kelas as $kelas)
                                            <option
                                                value="{{ $kelas->kelas }} {{ $kelas->jurusan_kelas }} {{ $kelas->prodi_kelas }}">
                                                {{ $kelas->kelas }} {{ $kelas->jurusan_kelas }} {{ $kelas->prodi_kelas }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Tahun Akademik</label>
                                    <select class="form-select" aria-label="Default select example"
                                        name="tahun_akademik_user">
                                        @foreach ($tahunakademik as $tahunakademik)
                                            <option value="{{ $users->tahun_akademik_user }}" selected>
                                                {{ $users->tahun_akademik_user }}</option>
                                            <option
                                                value="({{ $tahunakademik->tanggal_awal }}) - ({{ $tahunakademik->tanggal_akhir }})">
                                                ({{ $tahunakademik->tanggal_awal }})
                                                - ({{ $tahunakademik->tanggal_akhir }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Bidang User</label>
                                    <select class="form-select" aria-label="Default select example" name="bidang_user">
                                        <option value="{{ $users->bidang_user }}" selected>{{ $users->bidang_user }}
                                        </option>
                                        @foreach ($prodi as $prodi)
                                            <option value="{{ $prodi->prodi }}">{{ $prodi->prodi }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <a href="{{ url('/superadmin/pengguna') }}" class="btn btn-primary"><i
                                        class="fa fa-arrow-left"></i>
                                    Kembali</a>
                                <button class="btn btn-success"><i class="fa fa-plus"></i>Tambah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
