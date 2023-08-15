@extends('template')

@section('main')
    <?php
    
    function rupiah($angka)
    {
        $hasil = 'Rp ' . number_format($angka, 2, ',', '.');
        return $hasil;
    }
    ?>


    <div class="card">

        <div class="card-body">
            <table class="table">
                <?php
                $koneksi = new mysqli('localhost', 'root', '', 'bankminita');
                $nama = $name;
                $no = 0;
                $query = mysqli_query($koneksi, "SELECT * FROM aktifitas WHERE penerima_aktifitas = '$nama' AND kegiatan_aktifitas = 'transfer' ORDER BY id_aktifitas DESC");
                $result = mysqli_fetch_array($query);
                
                ?>
                <tr>
                    <td class="col-2">Tanggal</td>
                    <td class="col-1">:</td>
                    <td><?= $akt['tanggal_aktifitas'] ?></td>
                </tr>
                <tr>
                    <td>Sumber Dana</td>
                    <td>:</td>
                    <td><?= $akt['nama_pengguna_aktifitas'] ?></td>
                </tr>
                <tr>
                    <td>Jenis Transaksi</td>
                    <td>:</td>
                    <td><?= $akt['kegiatan_aktifitas'] ?></td>
                </tr>
                <tr>
                    <td>Nama Tujuan</td>
                    <td>:</td>
                    <td><?= $akt['penerima_aktifitas'] ?></td>
                </tr>
                <tr>
                    <td>Catatan</td>
                    <td>:</td>
                    <td><?= $akt['imbuhan_aktifitas'] ?></td>
                </tr>
                <tr>
                    <td class="fs-5">Nominal</td>
                    <td>:</td>
                    <td class="fs-5"><?php echo rupiah($akt['nominal_aktifitas']); ?></td>
                </tr>
            </table>
        </div>
    </div>
@endsection
