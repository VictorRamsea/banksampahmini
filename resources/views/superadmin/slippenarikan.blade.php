@extends('template')

@section('main')
    <style>
        @media print {
            .content {
                margin-bottom: 20px;
                border: 1px solid black;
                /* Tambahkan border hitam */
                padding: 10px;
                /* Tambahkan padding */
            }

            .no-print {
                display: none;
            }
        }
    </style>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="content" id="konten2">
                        <div class="panel-body p-20">
                            <div class="table-responsive">
                                <h4 class="text-center">SEVEN MINI BANK</h4>
                                <h4 class="text-center"">SMK NEGERI 7 BANDAR LAMPUNG</h3>
                                    <h6 class="text-center"">SLIP PENARIKAN</h6><br><br>
                                    <table id="dwa" cellspacing="0" width="100%">
                                        <tr>
                                            <td class="col-2">Nomor Rekening</td>
                                            <td class="col-1">:</td>
                                            <td>{{ $users->username_penarikan }}</td>
                                        </tr>
                                        <tr>
                                            <td class="col-2">Nama</td>
                                            <td class="col-1">:</td>
                                            <td>{{ $users->fullname_penarikan }}</td>
                                        </tr>
                                        <tr>
                                            <td class="col-2">Mata Uang</td>
                                            <td class="col-1">:</td>
                                            <td>Rupiah</td>
                                        </tr>
                                        <tr>
                                            <td>Penyetor</td>
                                            <td>:</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah</td>
                                            <td>:</td>
                                            <td>{{ $users->nominal_penarikan }}</td>
                                        </tr>
                                        <tr>
                                            <td>Terbilang</td>
                                            <td>:</td>
                                            <td></td>
                                        </tr>
                                    </table><br><br>
                                    <p style="text-align: right;">Bandar Lampung, {{ $users->tanggal_penarikan }}</p>
                                    <br><br>

                                    <div class="d-flex flex-row justify-content-around">
                                        <p>Petugas</p>
                                        <p>Penyetor</p>
                                    </div><br><br><br>

                                    <div class="d-flex flex-row justify-content-around">
                                        <p><span style="color:rgba(255, 255, 255, 0)"
                                                class="no-print">dda</span>{{ $users->keterangan_penarikan }}</p>
                                        <p><span style="color:rgba(255, 255, 255, 0)"
                                                class="no-print">ddwa</span>{{ $users->fullname_penarikan }}</p>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <button onclick="printContent('konten2')">Cetak</button>
            </div>
        </div>
    </div>
@endsection
