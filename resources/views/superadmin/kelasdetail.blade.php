@extends('template')

@section('main')
    <?php
    
    function rupiah($angka)
    {
        $hasil = 'Rp ' . number_format($angka, 2, ',', '.');
        return $hasil;
    }
    ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">
                        Detail Kelas
                    </h4>
                    <p class="text-center">{{ $kelasd->kelas }} {{ $kelasd->prodi_kelas }} {{ $kelasd->jurusan_kelas }}
                    </p>
                </div>
                <div class="container">
                    <div class="profile-menu">
                        <ul class="nav nav-tabs nav-tabs-solid">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#per_details_tab">Tabungan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#password_tab">Penarikan</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content profile-tab-cont">
                    <div class="tab-pane fade show active" id="per_details_tab">
                        <div class="panel-body p-20">
                            <div class="table-responsive">
                                <table id="table"
                                    class="table star-student table-hover table-center table-bordered table-striped"
                                    cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Nominal Tabungan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $koneksi = new mysqli('localhost', 'bank8278_bankminita', 'arre007A', 'bank8278_bankminita');
                                        $jurusan = $kelas->jurusan_kelas;
                                        $prodi = $kelasd->prodi_kelas;
                                        $kelas = $kelasd->kelas;
                                        $total = [];
                                        $query = mysqli_query($koneksi, "SELECT * FROM users WHERE kelas_user = '$kelas $jurusan $prodi'");
                                        $uwi = $query;
                                        while ($data = mysqli_fetch_array($query)) {
                                            $total[] = $data['tabungan'];
                                        }
                                        $semua = array_sum($total);
                                        ?>
                                        <h5>Total Tabungan = <?php echo rupiah($semua); ?></h5>
                                        @php $no = 1; @endphp
                                        <?php foreach ($query as $us) : ?>
                                        <br>
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td><?= $us['name'] ?></td>
                                            <td><?php echo rupiah($us['tabungan']); ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div id="password_tab" class="tab-pane fade">
                        <div class="panel-body p-20">
                            <div class="table-responsive">
                                <table id="Tpenarikan"
                                    class="table star-student table-hover table-center table-bordered table-striped"
                                    cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Nominal Penarikan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $koneksi = new mysqli('localhost', 'bank8278_bankminita', 'arre007A', 'bank8278_bankminita');
                                        $total2 = [];
                                        $query = mysqli_query($koneksi, "SELECT * FROM users WHERE kelas_user = '$kelas $jurusan $prodi'");
                                        while ($data = mysqli_fetch_array($query)) {
                                            // looping atribut jumlah dan harga
                                            $total2[] = $data['penarikan'];
                                        }
                                        $semua2 = array_sum($total2);
                                        ?>
                                        <h5>Total Penarikan = <?php echo rupiah($semua2); ?></h5>
                                        @php $no = 1; @endphp
                                        <?php foreach ($query as $us) : ?>
                                        <br>
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td><?= $us['name'] ?></td>
                                            <td><?php echo rupiah($us['penarikan']); ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
