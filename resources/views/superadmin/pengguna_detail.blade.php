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
                        Detail Pengguna
                    </h4>
                    <br><br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-heading">
                                </div>
                                <div class="panel-body p-20">
                                    <table class="table">
                                        <tr>
                                            <td class="col-2">Nama Lengkap</td>
                                            <td class="col-1">:</td>
                                            <td>{{ $users->name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="col-2">Username</td>
                                            <td class="col-1">:</td>
                                            <td>{{ $users->username }}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>:</td>
                                            <td>{{ $users->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td>:</td>
                                            <td>{{ $users->jk_user }}</td>
                                        </tr>
                                        <tr>
                                            <td>Kelas</td>
                                            <td>:</td>
                                            <td>{{ $users->kelas_user }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tahun Akademik</td>
                                            <td>:</td>
                                            <td>{{ $users->tahun_akademik_user }}</td>
                                        </tr>
                                        <tr>
                                            <td>Bidang</td>
                                            <td>:</td>
                                            <td>{{ $users->bidang_user }}</td>
                                        </tr>
                                        <tr>
                                            <td>Total Tabungan</td>
                                            <td>:</td>
                                            <td><?php echo rupiah($users->tabungan); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Total Penarikan</td>
                                            <td>:</td>
                                            <td><?php echo rupiah($users->penarikan); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Total Saldo</td>
                                            <td>:</td>
                                            <?php
                                            $a = $users->tabungan;
                                            $b = $users->penarikan;
                                            $c = $a + $b;
                                            
                                            ?>
                                            <td><?php echo rupiah($c); ?></td>
                                        </tr>
                                    </table>
                                    <div class="panel-body p-20">
                                        <a href="{{ url('/superadmin/pengguna') }}" class="btn btn-primary"><i
                                                class="fa fa-arrow-left"></i> Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                            <th>Tanggal Input</th>
                                            <th>Nama</th>
                                            <th>Nominal Tabungan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $koneksi = new mysqli('localhost', 'bank8278_bankminita', 'arre007A', 'bank8278_bankminita');
                                        $nama = $users->username;
                                        $id = $userid;
                                        $query = mysqli_query($koneksi, "SELECT * FROM tabungan WHERE username_tabungan = '$nama'");
                                        $result = mysqli_fetch_array($query);
                                        ?>

                                        <?php
                                    $no = 1;

                                    foreach ($query as $us) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $us['tanggal_tabungan'] ?></td>
                                            <td><?= $us['fullname_tabungan'] ?></td>
                                            <td><?php echo rupiah($us['nominal_tabungan']); ?></td>
                                            <td style="min-width: 175px;">
                                                <center>
                                                    <!-- <div class="btn btn-group"> -->
                                                    <a href="/superadmin/sliptabungan/<?= $us['id_tabungan'] ?>" class="btn btn-info"><i class="fa-solid fa-print"></i></a>
                                                </center>
                                            </td>
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
                                            <th>Tanggal Input</th>
                                            <th>Nama</th>
                                            <th>Nominal Penarikan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $koneksi = new mysqli('localhost', 'bank8278_bankminita', 'arre007A', 'bank8278_bankminita');
                                        $nama = $users->username;
                                        $query = mysqli_query($koneksi, "SELECT * FROM penarikan WHERE username_penarikan = '$nama'");
                                        $result = mysqli_fetch_array($query);
                                        ?>


                                        <?php
                                    $no = 1;

                                    foreach ($query as $us) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $us['tanggal_penarikan'] ?></td>
                                            <td><?= $us['fullname_penarikan'] ?></td>
                                            <td><?php echo rupiah($us['nominal_penarikan']); ?></td>
                                            <td style="min-width: 175px;">
                                                <center>
                                                    <!-- <div class="btn btn-group"> -->
                                                    <a href="/superadmin/slippenarikan/<?= $us['id_penarikan'] ?>" class="btn btn-info"><i class="fa-solid fa-print"></i></a>
                                                </center>
                                            </td>
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
