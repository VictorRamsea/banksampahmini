@extends('template')

@section('main')
    @if (Auth::user()->role == 'superadmin')
        <?php
        
        function rupiah($angka)
        {
            $hasil = 'Rp ' . number_format($angka, 2, ',', '.');
            return $hasil;
        }
        ?>

        <table id="tb_tahunakademik" class="table star-student table-hover table-center table-bordered table-striped"
            cellspacing="0" width="100%">
            <tbody>
                <div class="row">
                    @foreach ($totaltabungan as $ttb)
                        <div class="col-xl-4 col-sm-6 col-12 d-flex">
                            <div class="card bg-comman w-100">
                                <div class="card-body">
                                    <div class="db-widgets d-flex justify-content-between align-items-center">
                                        <div class="db-info">
                                            <h6>{{ $ttb->jenis_penabung }}</h6>
                                            <h3><?php echo rupiah($ttb->tabungan_total); ?></h3>
                                            <hr>
                                            <h3><?php echo rupiah($ttb->penarikan_total); ?></h3>
                                        </div>
                                        <div class="db-icon">
                                            <img src="{{ url('/') }}/assets/img/icons/dash-icon-01.svg"
                                                alt="Dashboard Icon">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-xl-6 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6>Total Tabungan</h6>
                                        <h3>
                                            <?php
                                            $koneksi = new mysqli('localhost', 'bank8278_bankminitabaru', 'Ranadias3', 'bank8278_bankminitabaru');
                                            $data = $koneksi->query('SELECT * From total_tabungan');
                                            $total = 0;
                                            while ($tampil = $data->fetch_array()) {
                                                $total += $tampil['tabungan_total'];
                                            }
                                            
                                            echo rupiah($total);
                                            ?>
                                        </h3>
                                        <!-- count menampilkan jumlah user -->
                                    </div>
                                    <div class="db-icon">
                                        <img src="{{ url('/') }}/assets/img/icons/dash-icon-04.svg"
                                            alt="Dashboard Icon">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6>Petty Cash</h6>
                                        <h3>
                                            @foreach ($patty as $p)
                                                <?php echo rupiah($p->nominal_patty); ?>
                                            @endforeach
                                        </h3>
                                        <!-- count menampilkan jumlah user -->
                                    </div>
                                    <div class="db-icon">
                                        <img src="{{ url('/') }}/assets/img/icons/dash-icon-04.svg"
                                            alt="Dashboard Icon">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </tbody>
        </table>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
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
                        <div class="tab-content profile-tab-cont">
                            <div class="tab-pane fade show active" id="per_details_tab">
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
                                                    <th>Jenis Pengguna</th>

                                                    <th width="200px">
                                                        <center>Aksi</center>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($tabungan as $tb)
                                                    @php $no = 1; @endphp
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>
                                                            {{ $tb->tanggal_tabungan }}
                                                        </td>
                                                        <td>
                                                            {{ $tb->fullname_tabungan }}
                                                        </td>
                                                        <td>
                                                            <?php echo rupiah($tb->nominal_tabungan); ?>
                                                        </td>
                                                        <td>
                                                            {{ $tb->jenis_penabung }}
                                                        </td>
                                                        <td style="min-width: 175px;">
                                                            <center>
                                                                <!-- <div class="btn btn-group"> -->
                                                                <a href="" class="btn btn-warning"><i
                                                                        class="fa-sharp fa-solid fa-pencil"></i></a>
                                                                <form action="" method="post" class="d-inline">
                                                                    <?= csrf_field() ?>
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
                            <div id="password_tab" class="tab-pane fade">

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
                                                    <th>Nominal Penarikan</th>
                                                    <th>Jenis Pengguna</th>

                                                    <th width="200px">
                                                        <center>Aksi</center>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($penarikan as $pn)
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td>
                                                            {{ $pn->tanggal_penarikan }}
                                                        </td>
                                                        <td>
                                                            {{ $pn->fullname_penarikan }}
                                                        </td>
                                                        <td>
                                                            <?php echo rupiah($pn->nominal_penarikan); ?>
                                                        </td>
                                                        <td>
                                                            {{ $pn->jenis_penarikan }}
                                                        </td>
                                                        <td style="min-width: 175px;">
                                                            <center>
                                                                <!-- <div class="btn btn-group"> -->
                                                                <a href="" class="btn btn-warning"><i
                                                                        class="fa-sharp fa-solid fa-pencil"></i></a>
                                                                <form action="" method="post" class="d-inline">
                                                                    <?= csrf_field() ?>
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
            </div>
        </div>
    @endif

    @if (Auth::user()->role == 'admin')
        <?php
        
        function rupiah($angka)
        {
            $hasil = 'Rp ' . number_format($angka, 2, ',', '.');
            return $hasil;
        }
        ?>

        <div class="row">
            <div class="col-xl-6 col-md-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Data Baru</h6>
                                <?php
                                $koneksi = new mysqli('localhost', 'bank8278_bankminitabaru', 'Ranadias3', 'bank8278_bankminitabaru');
                                $no = 1;
                                $jumlah = 0;
                                $query = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE keterangan_transaksi = 'pending'");
                                while ($result = mysqli_fetch_array($query)) {
                                    $jumlah = $jumlah + $no;
                                }
                                ?>
                                <h3><?php echo $jumlah; ?></h3>
                            </div>
                            <div class="db-icon">
                                <img src="{{ url('/') }}/assets/img/icons/lesson-icon-05.svg" alt="Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Data selesai</h6>
                                <?php
                                $koneksi = new mysqli('localhost', 'bank8278_bankminitabaru', 'Ranadias3', 'bank8278_bankminitabaru');
                                $nama = $name;
                                $no = 1;
                                $jumlah = 0;
                                $query = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE petugas_transaksi = '$nama' AND keterangan_transaksi = 'selesai'");
                                while ($result = mysqli_fetch_array($query)) {
                                    $jumlah = $jumlah + $no;
                                }
                                ?>
                                <h3><?php echo $jumlah; ?></h3>
                            </div>
                            <div class="db-icon">
                                <img src="{{ url('/') }}/assets/img/icons/lesson-icon-05.svg" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

                                                    <th width="200px">
                                                        <center>Aksi</center>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <?php
                                        $koneksi = new mysqli('localhost', 'bank8278_bankminitabaru', 'Ranadias3', 'bank8278_bankminitabaru');
                                        $no = 0;
                                        $query    = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE kategori_transaksi = 'tabungan' ORDER BY id_transaksi DESC");
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
                                                <td style="min-width: 175px;">
                                                    <center>
                                                        <a href="/admin/banking_transaksi_tabungan_edit/<?= $result['id_transaksi'] ?>"
                                                            class="btn btn-warning"><i
                                                                class="fa-sharp fa-solid fa-money-check-dollar"></i></a>
                                                        <a href="/admin/aktifitas_banking_tabungan_edit/<?= $result['id_transaksi'] ?>"
                                                            class="btn btn-info"><i
                                                                class="fa-sharp fa-solid fa-file-circle-plus"></i></a>
                                                        <a href="/admin/banking_tabungan_edit/<?= $result['id_transaksi'] ?>"
                                                            class="btn btn-warning"><i
                                                                class="fa-sharp fa-solid fa-pencil"></i></a>
                                                        <form
                                                            action="/admin/banking_transfer_hapus/<?= $result['id_transaksi'] ?>"
                                                            method="post" class="d-inline">
                                                            <?= csrf_field() ?>
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
                                                    <th>Nominal Tabungan</th>
                                                    <th>Kategori</th>
                                                    <th>Proses</th>

                                                    <th width="200px">
                                                        <center>Aksi</center>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <?php
                                        $koneksi = new mysqli('localhost', 'bank8278_bankminitabaru', 'Ranadias3', 'bank8278_bankminitabaru');
                                        $no = 0;
                                        $query    = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE kategori_transaksi = 'penarikan' ORDER BY id_transaksi DESC");
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
                                                <td style="min-width: 175px;">
                                                    <center>
                                                        <a href="/admin/banking_transaksi_penarikan_edit/<?= $result['id_transaksi'] ?>"
                                                            class="btn btn-warning"><i
                                                                class="fa-sharp fa-solid fa-money-check-dollar"></i></a>
                                                        <a href="/admin/aktifitas_banking_penarikan_edit/<?= $result['id_transaksi'] ?>"
                                                            class="btn btn-info"><i
                                                                class="fa-sharp fa-solid fa-file-circle-plus"></i></a>
                                                        <a href="/admin/banking_penarikan_edit/<?= $result['id_transaksi'] ?>"
                                                            class="btn btn-warning"><i
                                                                class="fa-sharp fa-solid fa-pencil"></i></a>
                                                        <form
                                                            action="/admin/banking_transfer_hapus/<?= $result['id_transaksi'] ?>"
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

                                                    <th width="200px">
                                                        <center>Aksi</center>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <?php
                                        $koneksi = new mysqli('localhost', 'bank8278_bankminitabaru', 'Ranadias3', 'bank8278_bankminitabaru');
                                        $no = 0;
                                        $query    = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE kategori_transaksi = 'transfer' ORDER BY id_transaksi DESC");
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
                                                <td style="min-width: 175px;">
                                                    <center>
                                                        <a href="/admin/banking_transaksi_transfer_edit/<?= $result['id_transaksi'] ?>"
                                                            class="btn btn-warning"><i
                                                                class="fa-sharp fa-solid fa-money-check-dollar"></i></a>
                                                        <a href="/admin/aktifitas_banking_transfer_edit/<?= $result['id_transaksi'] ?>"
                                                            class="btn btn-info"><i
                                                                class="fa-sharp fa-solid fa-file-circle-plus"></i></a>
                                                        <a href="/admin/banking_transfer_edit/<?= $result['id_transaksi'] ?>"
                                                            class="btn btn-warning"><i
                                                                class="fa-sharp fa-solid fa-pencil"></i></a>
                                                        <form
                                                            action="/admin/banking_transfer_hapus/<?= $result['id_transaksi'] ?>"
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
    @endif


















    @if (Auth::user()->role == 'user')
        <?php
        
        function rupiah($angka)
        {
            $hasil = 'Rp ' . number_format($angka, 2, ',', '.');
            return $hasil;
        }
        ?>


        <div class="row">
            <div class="col-xl-4 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Tabungan</h6>
                                <h3><?php echo rupiah($userall->tabungan); ?></h3>
                            </div>
                            <div class="db-icon">
                                <img src="{{ url('/') }}/assets/img/icons/dash-icon-01.svg" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Penarikan</h6>
                                <h3><?php echo rupiah($userall->penarikan); ?></h3>
                            </div>
                            <div class="db-icon">
                                <img src="{{ url('/') }}/assets/img/icons/dash-icon-02.svg" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-12 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Saldo Utama</h6>
                                <h3>
                                    <?php
                                    $a = $userall->tabungan;
                                    $b = $userall->penarikan;
                                    $c = $a + $b;
                                    
                                    echo rupiah($c);
                                    
                                    ?>
                                </h3>

                            </div>
                            <div class="db-icon">
                                <img src="{{ url('/') }}/assets/img/icons/dash-icon-03.svg" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12 col-sm-12 col-12">
            <div class="card bg-comman w-100">
                <div class="card-body">
                    <!-- ini yang group untuk yang gede xxl -->
                    <div
                        class="db-widgets text-center align-items-center d-none d-sm-block d-sm-none d-md-block d-md-none d-lg-block">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="/pengguna/transaksi_tabungan"><button type="button"
                                    class="btn btn-primary">Tabung</button></a>
                            <a href="/pengguna/transaksi_penarikan"><button type="button"
                                    class="btn btn-primary">penarikan</button></a>
                            <a href="/pengguna/transaksi_transfer"><button type="button"
                                    class="btn btn-primary">Transfer</button></a>
                        </div>
                    </div>
                    <div class="db-widgets text-center d-lg-none d-xl-block d-xl-none d-xxl-block d-xxl-none">
                        <div class="d-flex justify-content-evenly">
                            <a href="/pengguna/transaksi_tabungan"><button type="button"
                                    class="btn btn-primary">Tabung</button></a>
                            <a href="/pengguna/transaksi_penarikan"><button type="button"
                                    class="btn btn-primary">penarikan</button></a>
                            <a href="/pengguna/transaksi_transfer"><button type="button"
                                    class="btn btn-primary">Transfer</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
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
    @endif
@endsection
