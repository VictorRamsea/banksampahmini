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
                                <a class="nav-link active" data-bs-toggle="tab" href="#per_details_tab">Tabungan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#password_tab">Penarikan</a>
                            </li>
                        </ul>
                    </div>
                    @include('pesan')
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $koneksi = new mysqli('localhost', 'root', '', 'bankminita');
                                        $nama = $name;
                                        $no = 0;
                                        $query    = mysqli_query($koneksi, "SELECT * FROM tabungan WHERE fullname_tabungan = '$nama' ORDER BY id_tabungan DESC");
                                        while ($result    = mysqli_fetch_array($query)) {
                                            $no++
                                        ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $result['tanggal_tabungan']; ?></td>
                                                <td><?php echo $result['fullname_tabungan']; ?></td>
                                                <td><?php echo rupiah($result['nominal_tabungan']); ?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $koneksi = new mysqli('localhost', 'root', '', 'bankminita');
                                        $nama = $name;
                                        $no = 0;
                                        $query    = mysqli_query($koneksi, "SELECT * FROM penarikan WHERE fullname_penarikan = '$nama' ORDER BY id_penarikan DESC");
                                        while ($result    = mysqli_fetch_array($query)) {
                                            $no++
                                        ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $result['tanggal_penarikan']; ?></td>
                                                <td><?php echo $result['fullname_penarikan']; ?></td>
                                                <td><?php echo rupiah($result['nominal_penarikan']); ?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
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
@endsection
