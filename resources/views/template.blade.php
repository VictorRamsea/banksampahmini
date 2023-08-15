<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>SMK N 7 Bandar Lampung</title>

    <link rel="shortcut icon" href="{{ url('/') }}/img/bg/favicon.png">

    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/feather/feather.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/icons/flags/flags.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
    <script src="https://kit.fontawesome.com/a96498589b.js" crossorigin="anonymous"></script>

</head>

<body>

    <div class="main-wrapper">

        <div class="header">

            <div class="header-left">
                <a href="/" class="logo">
                    <img src="{{ url('/') }}/img/bg/sidebar.png" alt="Logo">
                </a>
                <a href="/" class="logo logo-small">
                    <img src="{{ url('/') }}/img/bg/logo.png" alt="Logo" width="30" height="30">
                </a>
            </div>
            <div class="menu-toggle">
                <a href="javascript:void(0);" id="toggle_btn">
                    <i class="fas fa-bars"></i>
                </a>
            </div>

            <div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="Search here">
                    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <a class="mobile_btn" id="mobile_btn">
                <i class="fas fa-bars"></i>
            </a>
            <ul class="nav user-menu">

                <li class="nav-item zoom-screen me-2">
                    <a href="#" class="nav-link header-nav-list win-maximize">
                        <img src="{{ url('/') }}/assets/img/icons/header-icon-04.svg" alt="">
                    </a>
                </li>
                @if (Auth::user()->role == 'user')
                    <li>
                        <div class="dropdown">
                            <button class="dropdown-toggle" style="height: 35px; width: 35px; border-radius: 100px;"
                                type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-bell"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <?php
                                $koneksi = new mysqli('localhost', 'bank8278_bankminitabaru', 'Ranadias3', 'bank8278_bankminitabaru');
                                $nama = $name;
                                $no = 0;
                                $query = mysqli_query($koneksi, "SELECT * FROM aktifitas WHERE penerima_aktifitas = '$nama' AND kegiatan_aktifitas = 'transfer' ORDER BY id_aktifitas DESC");
                                $result = mysqli_fetch_array($query);
                                ?>
                                <?php

                            foreach ($query as $us) : ?>
                                <li class="d-flex justify-content-start">
                                    <a
                                        href="/pengguna/aktifitas_detail/<?= $us['id_aktifitas'] ?>"><?= $us['transfer_aktifitas'] ?></a>
                                </li>
                                <hr>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </li>
                @endif

                <li class="nav-item dropdown has-arrow new-user-menus">
                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <span class="user-img">
                            <img class="rounded-circle" src="{{ url('/') }}/img/profile/default.jpg"
                                width="31" alt="Soeng Souy">
                            <div class="user-text">
                                <h6>{{ $name }}</h6>
                                <p class="text-muted mb-0">{{ $usernama }}</p>
                            </div>
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        @if (Auth::user()->role == 'user')
                            <a class="dropdown-item" href="/home/profile">My Profile</a>
                        @endif
                        <a class="dropdown-item" href="/logout">Logout</a>
                    </div>
                </li>
            </ul>
        </div>



        @include('sidebar')
        {{-- @include('pesan') --}}

        <div class="page-wrapper">
            <div class="content container-fluid">
                @yield('main')

            </div>
        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="{{ url('/') }}/assets/js/jquery-3.6.0.min.js"></script>
    <script src="{{ url('/') }}/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('/') }}/assets/js/feather.min.js"></script>
    <script src="{{ url('/') }}/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="{{ url('/') }}/assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>
    {{-- nt --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    {{-- <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script> --}}
    {{-- endnt --}}

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap5.min.css">

    <script>
        $(document).ready(function() {
            var table = $('#table').DataTable({
                buttons: ['copy', 'excel', 'print', 'pdf', 'colvis'],
                dom: "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                    "<'row'<'col-md-12'tr>>" +
                    "<'row'<'col-md-5'i><'col-md-7'p>>",
                lengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"]
                ]
            });

            table.buttons().container()
                .appendTo('#table_wrapper .col-md-5:eq(0)');
        });
    </script>

    <script>
        $(document).ready(function() {
            var table = $('#Tpenarikan').DataTable({
                buttons: ['copy', 'excel', 'print', 'pdf', 'colvis'],
                dom: "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                    "<'row'<'col-md-12'tr>>" +
                    "<'row'<'col-md-5'i><'col-md-7'p>>",
                lengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"]
                ]
            });

            table.buttons().container()
                .appendTo('#Tpenarikan_wrapper .col-md-5:eq(0)');
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#NoButton').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#NoButton2').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#NoButton3').DataTable();
        });
    </script>

    <script>
        const myModal = document.getElementById('myModal')
        const myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', () => {
            myInput.focus()
        })
    </script>

    <script>
        function aktifitas_memilih() {
            var selectedOption = document.getElementById("aktifitas_pil").value;
            var inputField = document.getElementById("sasaran_pil");
            var inputFielddua = document.getElementById("transfer_aktifitas");
            var inputFieldtiga = document.getElementById("imbuhan_aktifitas");

            if (selectedOption === "transfer") {
                inputField.readOnly = false;
                inputFielddua.readOnly = false;
                inputFieldtiga.readOnly = false;
            } else {
                inputField.readOnly = true;
                inputFielddua.readOnly = true;
                inputFieldtiga.readOnly = true;
            }
        }
    </script>

    <script>
        function printContent(el) /*el di sini sebagai perwakilan dari id-id di bawah */ {
            var restorepage = document.body.innerHTML;
            var printcontent = document.getElementById(el).innerHTML;
            document.body.innerHTML = printcontent;
            window.print(); /*fungsi untuk mencetak*/
            document.body.innerHTML = restorepage;
        }
    </script>

    <script>
        function updateOption2() {
            var option1 = document.getElementById("option1");
            var option2 = document.getElementById("option2");

            if (option1.value === "Selesai") {
                option2.value = "success";
            } else if (option1.value === "Pending") {
                option2.value = "warning";
            } else if (option1.value === "Gagal") {
                option2.value = "danger";
            }
        }
    </script>

    {{-- Password Generate --}}
    <script>
        function generatePassword() {
            // Ambil nilai panjang password dari elemen dengan id "length"
            var passwordLength = parseInt(document.getElementById('length').value);
            var charset =
                "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+<>?/:{}[]|"; // Daftar karakter yang akan digunakan

            var generatedPassword = "";
            for (var i = 0; i < passwordLength; i++) {
                // Ambil karakter acak dari charset dan tambahkan ke generatedPassword
                generatedPassword += charset.charAt(Math.floor(Math.random() * charset.length));
            }

            // Isi nilai password yang dihasilkan ke input dengan id "password"
            document.getElementById('password').value = generatedPassword;
        }

        function togglePasswordVisibility() {
            var passwordInput = document.getElementById('password');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        }
    </script>

    {{-- BANK SAMPAH --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Membuat variabel untuk menyimpan daftar barang yang akan ditampilkan pada textarea daftarBarang
            let cartItems = [];
            let totalJumlahKeranjang = 0;
            let totalHargaKeranjang = 0;

            // Mendapatkan elemen-elemen yang dibutuhkan
            const daftarItem = document.getElementById('daftarItem');
            const hargaItem = document.getElementById('hargaItem');
            const jumlah = document.getElementById('jumlah');
            const totalHarga = document.getElementById('totalHarga');
            const tambahKeranjang = document.getElementById('tambahKeranjang');
            const daftarBarang = document.getElementById('daftarBarang');
            const jumlahDiKeranjang = document.getElementById('jumlahDiKeranjang');
            const totalHargaDiKeranjang = document.getElementById('totalHargaDiKeranjang');

            // Event listener ketika daftarItem dipilih
            daftarItem.addEventListener('change', function() {
                // Mengambil harga dari atribut data-harga pada opsi yang dipilih
                const selectedOption = daftarItem.options[daftarItem.selectedIndex];
                const harga = selectedOption.getAttribute('data-harga');

                // Menampilkan harga pada input hargaItem
                hargaItem.value = harga;
            });

            // Event listener ketika jumlah diinputkan
            jumlah.addEventListener('input', function() {
                // Menghitung total harga
                const harga = parseFloat(hargaItem.value);
                const jumlahBarang = parseFloat(jumlah.value);
                const total = harga * jumlahBarang;

                // Menampilkan total harga pada input totalHarga
                totalHarga.value = isNaN(total) ? '' : total;
            });

            // Event listener ketika tombol tambahKeranjang diklik
            tambahKeranjang.addEventListener('click', function() {
                // Mendapatkan informasi barang dari inputan
                const barang = daftarItem.options[daftarItem.selectedIndex].text;
                const jumlahBarang = parseFloat(jumlah.value);
                const hargaBarang = parseFloat(totalHarga.value);

                // Menambahkan informasi barang ke dalam array cartItems
                cartItems.push(`${barang} (${jumlahBarang} - ${hargaBarang})`);

                // Menampilkan daftar barang pada textarea daftarBarang dengan pemisah koma
                daftarBarang.value = cartItems.join(', ');

                // Menghitung total jumlah dan total harga di keranjang
                totalJumlahKeranjang += jumlahBarang;
                totalHargaKeranjang += isNaN(hargaBarang) ? 0 : hargaBarang;

                // Menampilkan total jumlah dan total harga di keranjang
                jumlahDiKeranjang.value = totalJumlahKeranjang;
                totalHargaDiKeranjang.value = isNaN(totalHargaKeranjang) ? '' : totalHargaKeranjang;
            });
        });
    </script>

</body>

</html>
