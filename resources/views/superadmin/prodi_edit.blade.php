@extends('template')

@section('main')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Ubah Jurusan
                    </h5>

                    <div class="panel">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body p-20">
                            <form action="/superadmin/prodi_update/{{ $prodi->id_prodi }}" method="POST">
                                <?= csrf_field() ?>
                                <!-- agar form ini hanya dapat diinput via halaman ini saja , Cross side riger forcary-->
                                <input type="hidden" name="id_prodi" value="<?= $prodi['id_prodi'] ?>">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Jurusan</label>
                                    <input type="text" class="form-control" id="prodi" name="prodi"
                                        value="{{ $prodi->prodi }}">
                                </div>
                                <a href="{{ url('superadmin/prodi') }}" class="btn btn-primary"><i
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
