@extends('template')

@section('main')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Edit Kelas
                    </h5>
                    @include('pesan')
                    <div class="panel">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body p-20">
                            <form action="/superadmin/kelas_update/<?= $kelas['id_kelas'] ?>" method="POST">
                                <?= csrf_field() ?>
                                <!-- agar form ini hanya dapat diinput via halaman ini saja , Cross side riger forcary-->
                                <input type="hidden" name="id_kelas" value="<?= $kelas['id_kelas'] ?>">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Kelas</label>
                                    <select class="form-select" aria-label="Default select example" name="kelas">
                                        <option value="<?= $kelas['kelas'] ?>" selected><?= $kelas['kelas'] ?></option>
                                        <option value="-">-</option>
                                        <option value="X">X</option>
                                        <option value="XI">XI</option>
                                        <option value="XII">XII</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Prodi</label>
                                    <select class="form-select" aria-label="Default select example" name="prodi_kelas">
                                        <option value="<?= $kelas['prodi_kelas'] ?>" selected><?= $kelas['prodi_kelas'] ?>
                                        </option>
                                        <?php foreach ($prodi as $pr) : ?>
                                        <option value="<?= $pr['prodi'] ?>"><?= $pr['prodi'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Rombel</label>
                                    <select class="form-select" aria-label="Default select example" name="jurusan_kelas">
                                        <option value="<?= $kelas['jurusan_kelas'] ?>" selected>
                                            <?= $kelas['jurusan_kelas'] ?></option>
                                        <option value="-">-</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                
                                <a href="{{ url('superadmin/kelas') }}" class="btn btn-primary"><i
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
