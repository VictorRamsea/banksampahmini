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
                    <h5>Bank Sampah</h5>
                    <a href="/pengguna/banksampah" class="btn btn-primary ml-15"><i class="fa fa-plus"></i>Aktifitas</a>
                    @include('pesan')
                    <div class="panel-body p-20">


                        <div class="table-responsive">
                            <table id="NoButton"
                                class="table star-student table-hover table-center table-bordered table-striped"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Sampah</th>
                                        <th>Jumlah</th>
                                        <th>Total Harga</th>
                                    </tr>
                                </thead>
                                <?php
                            $koneksi = new mysqli('localhost', 'bank8278_bankminitabaru', 'Ranadias3', 'bank8278_bankminitabaru');
                            $nama = $name;
                            $no = 0;
                            $query    = mysqli_query($koneksi, "SELECT * FROM transaksi_sampahff WHERE fullname_sampah = '$nama'");
                            while ($result    = mysqli_fetch_array($query)) {
                                $no++
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $result['username_sampah']; ?></td>
                                    <td><?php echo $result['fullname_sampah']; ?></td>
                                    <td><?php echo $result['tanggal_sampah']; ?></td>
                                    <!-- petugas -->
                                    <td><?php echo $result['barang_sampah']; ?></td>
                                    <td><?php echo $result['jumlah_sampah']; ?></td>
                                    <td><?php echo rupiah($result['total_sampah']); ?></td>
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
@endsection
