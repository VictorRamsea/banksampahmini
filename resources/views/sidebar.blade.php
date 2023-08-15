<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        @if (Auth::user()->role == 'superadmin')
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">
                        <span>Main Menu</span>
                    </li>
                    <li>
                        <a href="/"><i class="feather-grid"></i> <span>Dashboard</span></a>
                    </li>
                    <li>
                        <a href="/superadmin/tahunakademik"><i class="fas fa-graduation-cap"></i> <span>Tahun
                                Akademik</span></a>
                    </li>
                    <li>
                        <a href="/superadmin/prodi"><i class="fa-solid fa-layer-group"></i><span>Prodi</span></a>
                    </li>
                    <li>
                        <a href="/superadmin/kelas"><i class="fa-solid fa-people-roof"></i><span>Kelas</span></a>
                    </li>
                    <li>
                        <a href="/superadmin/daftarkelas"><i class="fa-solid fa-people-group"></i><span>Daftar
                                Kelas</span></a>
                    </li>
                    <li>
                        <a href="/superadmin/pengguna"><i
                                class="fa-sharp fa-solid fa-user-plus"></i><span>Pengguna</span></a>
                    </li>
                    <li>
                        <a href="/superadmin/transaksi"><i
                                class="fa-sharp fa-solid fa-wallet"></i><span>Transaksi</span></a>
                    </li>
                    <li>
                        <a href="/superadmin/aktifitas"><i
                                class="fa-sharp fa-solid fa-file-circle-exclamation"></i><span>Aktifitas</span></a>
                    </li>
                    <li>
                        <a href="/superadmin/banksampah"><i class="fa-regular fa-trash-can"></i><span>Bank
                                Sampah</span></a>
                    </li>

                </ul>
            </div>
        @endif

        @if (Auth::user()->role == 'admin')
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">
                        <span>Main Menu</span>
                    </li>
                    <li>
                        <a href="/"><i class="feather-grid"></i> <span>Dashboard</span></a>
                    </li>
                    <li>
                        <a href="/admin/banking"><i
                                class="fa-sharp fa-solid fa-building-columns"></i><span>Banking</span></a>
                    </li>
                    <li>
                        <a href="/admin/transaksi"><i class="fa-sharp fa-solid fa-wallet"></i>
                            <span>Transaksi</span></a>
                    </li>
                    <li>
                        <a href="/admin/aktifitas"><i
                                class="fa-sharp fa-solid fa-file-circle-exclamation"></i><span>Aktifitas</span></a>
                    </li>
                    <li>
                        <a href="/admin/pilihitem"><i
                                class="fa-sharp fa-solid fa-file-circle-exclamation"></i><span>Pilih Item</span></a>
                    </li>
                </ul>
            </div>
        @endif

        @if (Auth::user()->role == 'user')
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">
                        <span>Main Menu</span>
                    </li>
                    <li>
                        <a href="/"><i class="feather-grid"></i> <span>Dashboard</span></a>
                    </li>
                    <li>
                        <a href="/pengguna/banking"><i class="fas fa-graduation-cap"></i> <span>Banking</span></a>
                    </li>
                    <li>
                        <a href="/pengguna/transaksi"><i
                                class="fa-sharp fa-solid fa-user-plus"></i><span>Transaksi</span></a>
                    </li>
                    <li>
                        <a href="/pengguna/aktifitas"><i
                                class="fa-sharp fa-solid fa-file-circle-exclamation"></i><span>Aktifitas</span></a>
                    </li>
                    <li>
                        <a href="/pengguna/banksampah_pengguna"><i
                                class="fa-sharp fa-solid fa-file-circle-exclamation"></i><span>Bank Sampah</span></a>
                    </li>
                </ul>
            </div>
        @endif
    </div>
</div>
