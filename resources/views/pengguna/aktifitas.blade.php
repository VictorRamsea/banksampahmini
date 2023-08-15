@extends('template')

@section('main')

<?php

function rupiah($angka)
{
    $hasil = 'Rp ' . number_format($angka, 2, ",", ".");
    return $hasil;
}
?>

<style>
    a {
        color: black;
    }
</style>


<div class="profile-menu">
    <ul class="nav nav-tabs nav-tabs-solid">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#tabungan">Tabungan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#penarikan">Penarikan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#tf1">Transfer</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#tf2">Terima Transfer</a>
        </li>
    </ul>
</div>
<div class="tab-content profile-tab-cont">
    <div class="tab-pane fade show active" id="tabungan">
        <div class="row g-3">
            <?php
            $koneksi = new mysqli('localhost', 'root', '', 'bankminita');
            $nama = $name;
            $no = 0;
            $query    = mysqli_query($koneksi, "SELECT * FROM aktifitas WHERE nama_pengguna_aktifitas = '$nama' AND kegiatan_aktifitas = 'tabungan' ORDER BY id_aktifitas DESC");
            ?>
            <?php

            foreach ($query as $us) : ?>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card-deck">

                        <div class="card">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6><?= $us['tanggal_aktifitas']; ?></h6>
                                        <table>
                                            <tr>
                                                <td>Nama</td>
                                                <td>&nbsp;&nbsp;:</td>
                                                <td>&nbsp;&nbsp;<?= $us['nama_pengguna_aktifitas']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Transaksi</td>
                                                <td>&nbsp;&nbsp;:</td>
                                                <td>&nbsp;&nbsp;<?= $us['kegiatan_aktifitas']; ?> <?= $us['penerima_aktifitas']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Petugas</td>
                                                <td>&nbsp;&nbsp;:</td>
                                                <td>&nbsp;&nbsp;<?= $us['nama_admin_aktifitas']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nominal</td>
                                                <td>&nbsp;&nbsp;:</td>
                                                <td>&nbsp;&nbsp;<?php echo rupiah($us['nominal_aktifitas']); ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="tab-pane fade" id="penarikan">
        <div class="row g-3">
            <?php
            $koneksi = new mysqli('localhost', 'root', '', 'bankminita');
            $nama = $name;
            $no = 0;
            $query    = mysqli_query($koneksi, "SELECT * FROM aktifitas WHERE nama_pengguna_aktifitas = '$nama' AND kegiatan_aktifitas = 'penarikan' ORDER BY id_aktifitas DESC");

            ?>
            <?php

            foreach ($query as $us) : ?>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card-deck">
                        <div class="card">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6><?= $us['tanggal_aktifitas']; ?></h6>
                                        <table>
                                            <tr>
                                                <td>Nama</td>
                                                <td>&nbsp;&nbsp;:</td>
                                                <td>&nbsp;&nbsp;<?= $us['nama_pengguna_aktifitas']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Transaksi</td>
                                                <td>&nbsp;&nbsp;:</td>
                                                <td>&nbsp;&nbsp;<?= $us['kegiatan_aktifitas']; ?> <?= $us['penerima_aktifitas']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Petugas</td>
                                                <td>&nbsp;&nbsp;:</td>
                                                <td>&nbsp;&nbsp;<?= $us['nama_admin_aktifitas']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nominal</td>
                                                <td>&nbsp;&nbsp;:</td>
                                                <td>&nbsp;&nbsp;<?php echo rupiah($us['nominal_aktifitas']); ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div id="tf1" class="tab-pane fade">
        <!-- yang ngirim -->
        <div class="row g-3">
            <?php
            $koneksi = new mysqli('localhost', 'root', '', 'bankminita');
            $nama = $name;
            $no = 0;
            $query    = mysqli_query($koneksi, "SELECT * FROM aktifitas WHERE nama_pengguna_aktifitas = '$nama' AND kegiatan_aktifitas = 'transfer' ORDER BY id_aktifitas DESC");

            ?>
            <?php

            foreach ($query as $us) : ?>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card-deck">
                        <a href="/pengguna/aktifitas_detail/<?= $us['id_aktifitas']; ?>">
                            <div class="card">
                                <div class="card-body">
                                    <div class="db-widgets d-flex justify-content-between align-items-center">
                                        <div class="db-info">
                                            <h6><?= $us['tanggal_aktifitas']; ?></h6>
                                            <table>
                                                <tr>
                                                    <td>Nama</td>
                                                    <td>&nbsp;&nbsp;:</td>
                                                    <td>&nbsp;&nbsp;<?= $us['nama_pengguna_aktifitas']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Transaksi</td>
                                                    <td>&nbsp;&nbsp;:</td>
                                                    <td>&nbsp;&nbsp;<?= $us['kegiatan_aktifitas']; ?> ke <?= $us['penerima_aktifitas']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Petugas</td>
                                                    <td>&nbsp;&nbsp;:</td>
                                                    <td>&nbsp;&nbsp;<?= $us['nama_admin_aktifitas']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Nominal</td>
                                                    <td>&nbsp;&nbsp;:</td>
                                                    <td>&nbsp;&nbsp;<?php echo rupiah($us['nominal_aktifitas']); ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div id="tf2" class="tab-pane fade">
        <!-- terima transfer -->
        <div class="row g-3">
            <?php
            $koneksi = new mysqli('localhost', 'root', '', 'bankminita');
            $nama = $name;
            $no = 0;
            $query    = mysqli_query($koneksi, "SELECT * FROM aktifitas WHERE penerima_aktifitas  = '$nama' AND kegiatan_aktifitas = 'transfer' ORDER BY id_aktifitas DESC");

            ?>
            <?php

            foreach ($query as $us) : ?>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card-deck">
                        <a href="/pengguna/aktifitas_detail/<?= $us['id_aktifitas']; ?>">
                            <div class="card">
                                <div class="card-body">
                                    <div class="db-widgets d-flex justify-content-between align-items-center">
                                        <div class="db-info">
                                            <h6><?= $us['tanggal_aktifitas']; ?></h6>
                                            <table>
                                                <tr>
                                                    <td>Nama</td>
                                                    <td>&nbsp;&nbsp;:</td>
                                                    <td>&nbsp;&nbsp;<?= $us['penerima_aktifitas']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Transaksi</td>
                                                    <td>&nbsp;&nbsp;:</td>
                                                    <td>&nbsp;&nbsp;<?= $us['kegiatan_aktifitas']; ?> dari <?= $us['nama_pengguna_aktifitas']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Petugas</td>
                                                    <td>&nbsp;&nbsp;:</td>
                                                    <td>&nbsp;&nbsp;<?= $us['nama_admin_aktifitas']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Nominal</td>
                                                    <td>&nbsp;&nbsp;:</td>
                                                    <td>&nbsp;&nbsp;<?php echo rupiah($us['nominal_aktifitas']); ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>




@endsection