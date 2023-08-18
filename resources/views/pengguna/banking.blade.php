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
                    <div class="profile-menu">
                        <ul class="nav nav-tabs nav-tabs-solid">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#tabungan_tab">Tabungan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#penarikan_tab">Penarikan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#transfer_tab">Transfer</a>
                            </li>
                        </ul>
                    </div>
                    @include('pesan')
                    <div class="tab-content profile-tab-cont">
                        <div class="tab-pane fade show active" id="tabungan_tab">
                            <div class="panel-body p-20">
                                <div class="table-responsive">
                                    <table id="NoButton"
                                        class="table star-student table-hover table-center table-bordered table-striped"
                                        cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal Input</th>
                                                <th>Nama</th>
                                                <th>Nominal Tabungan</th>
                                                <th>Kategori</th>
                                                <th>Proses</th>
                                            </tr>
                                        </thead>
                                        <?php
                                    $koneksi = new mysqli('localhost', 'bank8278_bankminitabaru', 'Ranadias3', 'bank8278_bankminitabaru');
                                    $nama = $name;
                                    $no = 0;
                                    $query    = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE fullname_transaksi = '$nama' AND kategori_transaksi = 'tabungan'");
                                    while ($result    = mysqli_fetch_array($query)) {
                                        $no++
                                    ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $result['tanggal_transaksi']; ?></td>
                                            <td><?php echo $result['fullname_transaksi']; ?></td>
                                            <td><?php echo rupiah($result['tabungan_transaksi']); ?></td>
                                            <td><?php echo $result['kategori_transaksi']; ?></td>
                                            <td><button type="button" class="btn btn-<?php echo $result['warna_transaksi']; ?>"
                                                    disabled><?php echo $result['keterangan_transaksi']; ?></button></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="penarikan_tab" class="tab-pane fade">
                            <div class="panel-body p-20">
                                <div class="table-responsive">
                                    <table id="NoButton2"
                                        class="table star-student table-hover table-center table-bordered table-striped"
                                        cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal Input</th>
                                                <th>Nama</th>
                                                <th>Nominal penarikan</th>
                                                <th>Kategori</th>
                                                <th>Proses</th>
                                            </tr>
                                        </thead>
                                        <?php
                                    $koneksi = new mysqli('localhost', 'bank8278_bankminitabaru', 'Ranadias3', 'bank8278_bankminitabaru');
                                    $nama = $name;
                                    $no = 0;
                                    $query    = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE fullname_transaksi = '$nama' AND kategori_transaksi = 'penarikan'");
                                    while ($result    = mysqli_fetch_array($query)) {
                                        $no++
                                    ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $result['tanggal_transaksi']; ?></td>
                                            <td><?php echo $result['fullname_transaksi']; ?></td>
                                            <td><?php echo rupiah($result['penarikan_transaksi']); ?></td>
                                            <td><?php echo $result['kategori_transaksi']; ?></td>
                                            <td><button type="button" class="btn btn-<?php echo $result['warna_transaksi']; ?>"
                                                    disabled><?php echo $result['keterangan_transaksi']; ?></button></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="transfer_tab" class="tab-pane fade">
                            <div class="panel-body p-20">
                                <div class="table-responsive">
                                    <table id="NoButton3"
                                        class="table star-student table-hover table-center table-bordered table-striped"
                                        cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal Input</th>
                                                <th>Nama</th>
                                                <th>Nominal Tabungan</th>
                                                <th>Kategori</th>
                                                <th>Proses</th>
                                            </tr>
                                        </thead>
                                        <?php
                                    $koneksi = new mysqli('localhost', 'bank8278_bankminitabaru', 'Ranadias3', 'bank8278_bankminitabaru');
                                    $nama = $name;
                                    $no = 0;
                                    $query    = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE fullname_transaksi = '$nama' AND kategori_transaksi = 'transfer'");
                                    while ($result    = mysqli_fetch_array($query)) {
                                        $no++
                                    ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $result['tanggal_transaksi']; ?></td>
                                            <td><?php echo $result['fullname_transaksi']; ?></td>
                                            <td><?php echo rupiah($result['transfer_transaksi']); ?></td>
                                            <td><?php echo $result['kategori_transaksi']; ?></td>
                                            <td><button type="button" class="btn btn-<?php echo $result['warna_transaksi']; ?>"
                                                    disabled><?php echo $result['keterangan_transaksi']; ?></button></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
