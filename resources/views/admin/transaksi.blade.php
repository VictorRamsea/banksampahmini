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
                    <h5 class="card-title">
                        Data Transaksi
                    </h5>
                    <a href="/admin/tabungan_input" class="btn btn-primary ml-15"><i class="fa fa-plus"></i> Tabungan</a>
                    <a href="/admin/penarikan_input" class="btn btn-primary ml-15"><i class="fa fa-plus"></i> Penarikan</a>
                    <br><br>


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
                            @include('pesan')
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
                                            @php $no = 1; @endphp
                                            @foreach ($tabungan as $tabungan)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>
                                                        {{ $tabungan->tanggal_tabungan }}
                                                    </td>
                                                    <td>
                                                        {{ $tabungan->fullname_tabungan }}
                                                    </td>
                                                    <td>
                                                        <?php echo rupiah($tabungan->nominal_tabungan); ?>
                                                    </td>
                                                    <td>
                                                        {{ $tabungan->jenis_penabung }}
                                                    </td>
                                                    <td style="min-width: 175px;">
                                                        <center>
                                                            <!-- <div class="btn btn-group"> -->
                                                            <a href="/admin/tabungan_edit/{{ $tabungan->id_tabungan }}"
                                                                class="btn btn-warning"><i
                                                                    class="fa-sharp fa-solid fa-pencil"></i></a>
                                                            <form
                                                                action="/admin/tabungan_hapus/{{ $tabungan->id_tabungan }}"
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
                                            @php $no = 1; @endphp
                                            @foreach ($penarikan as $penarikan)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>
                                                        {{ $penarikan->tanggal_penarikan }}
                                                    </td>
                                                    <td>
                                                        {{ $penarikan->fullname_penarikan }}
                                                    </td>
                                                    <td>
                                                        <?php echo rupiah($penarikan->nominal_penarikan); ?>
                                                    </td>
                                                    <td>
                                                        {{ $penarikan->jenis_penarikan }}
                                                    </td>
                                                    <td style="min-width: 175px;">
                                                        <center>
                                                            <!-- <div class="btn btn-group"> -->
                                                            <a href="/admin/penarikan_edit/{{ $penarikan->id_penarikan }}"
                                                                class="btn btn-warning"><i
                                                                    class="fa-sharp fa-solid fa-pencil"></i></a>
                                                            <form
                                                                action="/admin/penarikan_hapus/{{ $penarikan->id_penarikan }}"
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
        </div>
    </div>
@endsection
