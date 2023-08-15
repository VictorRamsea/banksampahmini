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
                        Data Bank Sampah
                    </h5>
                    <a href="/superadmin/banksampah_input" class="btn btn-primary ml-15"><i class="fa fa-plus"></i> Tambah
                        Bank Sampah</a>
                    <br><br>
                    @include('pesan')
                    <div class="panel-body p-20">
                        <div class="table-responsive">
                            <table id="table"
                                class="table star-student table-hover table-center table-bordered table-striped"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Item</th>
                                        <th>Harga</th>
                                        <!-- <th>Tanggal Update</th> -->
                                        <th width="200px">
                                            <center>Aksi</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($banksampah as $bks)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>
                                                {{ $bks->Nama_Item }}
                                            </td>
                                            <td>
                                                <?php echo rupiah($bks->Harga); ?>
                                            </td>

                                            <td style="min-width: 175px;">
                                                <center>
                                                    <!-- <div class="btn btn-group"> -->
                                                    <a href="/superadmin/banksampah_edit/{{ $bks->id_banksampah }}"
                                                        class="btn btn-warning"><i
                                                            class="fa-sharp fa-solid fa-pencil"></i></a>
                                                    <form
                                                        action="/superadmin/banksampah_hapus/{{ $bks->id_banksampah }}"
                                                        method="post" class="d-inline">
                                                        @csrf
                                                        @method('delete')
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
                            </table><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
