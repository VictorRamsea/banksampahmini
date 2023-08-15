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
                    <a href="/superadmin/tabungan_input" class="btn btn-primary ml-15"><i class="fa fa-plus"></i> Tabungan</a>
                    <a href="/superadmin/penarikan_input" class="btn btn-primary ml-15"><i class="fa fa-plus"></i>
                        Penarikan</a>
                    <br><br>


                    <div class="profile-menu">
                        <ul class="nav nav-tabs nav-tabs-solid">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#tabungan">Tabungan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#penarikan">Penarikan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#petty">Patty Cash</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content profile-tab-cont">
                        <div class="tab-pane fade show active" id="tabungan">
                            @include('pesan')
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
                                                            <a href="/superadmin/tabungan_edit/{{ $tabungan->id_tabungan }}"
                                                                class="btn btn-warning"><i
                                                                    class="fa-sharp fa-solid fa-pencil"></i></a>
                                                            <a href="/superadmin/sliptabungan/{{ $tabungan->id_tabungan }}"
                                                                class="btn btn-info"><i class="fa-solid fa-print"></i></a>
                                                            <form
                                                                action="/superadmin/tabungan_hapus/{{ $tabungan->id_tabungan }}"
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
                        <div id="penarikan" class="tab-pane fade">
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
                                                            <a href="/superadmin/penarikan_edit/{{ $penarikan->id_penarikan }}"
                                                                class="btn btn-warning"><i
                                                                    class="fa-sharp fa-solid fa-pencil"></i></a>
                                                            <a href="/superadmin/slippenarikan/{{ $penarikan->id_penarikan }}"
                                                                class="btn btn-info"><i class="fa-solid fa-print"></i></a>
                                                            <form
                                                                action="/superadmin/penarikan_hapus/{{ $penarikan->id_penarikan }}"
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
                        <div id="petty" class="tab-pane fade">
                            <div class="panel-body p-20">
                                <div class="table-responsive">
                                    <table id="table"
                                        class="table star-student table-hover table-center table-bordered table-striped"
                                        cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nominal Petty Cash</th>
                                                <th width="200px">
                                                    <center>Aksi</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 1; @endphp
                                            @foreach ($patty as $patty)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>
                                                        <?php echo rupiah($patty->nominal_patty); ?>
                                                    </td>
                                                    <td style="min-width: 175px;">
                                                        <center>
                                                            <a href="/superadmin/patty_edit/{{ $patty->id_patty }}"
                                                                class="btn btn-warning"><i
                                                                    class="fa-sharp fa-solid fa-pencil"></i></a>
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
