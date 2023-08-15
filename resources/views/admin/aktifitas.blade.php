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
                    <h5>Aktifitas</h5>
                    <a href="/admin/aktifitas_input" class="btn btn-primary ml-15"><i class="fa fa-plus"></i>Aktifitas</a>
                    @include('pesan')
                    <div class="panel-body p-20">
                        <div class="table-responsive">
                            <table id="NoButton"
                                class="table star-student table-hover table-center table-bordered table-striped"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Transaksi</th>
                                        <th>Petugas</th>
                                        <th>Nominal</th>

                                        <th width="200px">
                                            <center>Aksi</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($aktifitas as $akt)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>
                                                {{ $akt->nama_pengguna_aktifitas }}
                                            </td>
                                            <td>
                                                {{ $akt->kegiatan_aktifitas }} {{ $akt->penerima_aktifitas }}
                                            </td>
                                            <td>
                                                {{ $akt->nama_admin_aktifitas }}
                                            </td>
                                            <td>
                                                <?php echo rupiah($akt->nominal_aktifitas); ?>
                                            </td>
                                            <td style="min-width: 175px;">
                                                <center>
                                                    <!-- <div class="btn btn-group"> -->
                                                    <a href="/admin/aktifitas_edit/{{ $akt->id_aktifitas }}"
                                                        class="btn btn-warning"><i
                                                            class="fa-sharp fa-solid fa-pencil"></i></a>
                                                    <form action="/admin/aktifitas_hapus/{{ $akt->id_aktifitas }}"
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
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
