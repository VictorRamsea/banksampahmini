-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jun 2023 pada 14.54
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bankminita`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aktifitas`
--

CREATE TABLE `aktifitas` (
  `id_aktifitas` int(11) NOT NULL,
  `nama_admin_aktifitas` varchar(255) NOT NULL,
  `nama_pengguna_aktifitas` varchar(255) NOT NULL,
  `kegiatan_aktifitas` varchar(255) NOT NULL,
  `nominal_aktifitas` int(255) NOT NULL,
  `tanggal_aktifitas` date NOT NULL,
  `penerima_aktifitas` varchar(255) NOT NULL,
  `transfer_aktifitas` varchar(255) NOT NULL,
  `imbuhan_aktifitas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `aktifitas`
--

INSERT INTO `aktifitas` (`id_aktifitas`, `nama_admin_aktifitas`, `nama_pengguna_aktifitas`, `kegiatan_aktifitas`, `nominal_aktifitas`, `tanggal_aktifitas`, `penerima_aktifitas`, `transfer_aktifitas`, `imbuhan_aktifitas`) VALUES
(1, 'Dimas', 'Rengganis Eva', 'tabungan', 10000, '2023-05-26', ' ', ' ', ' '),
(2, 'Dimas', 'Arre pangestu', 'tabungan', 4000, '2023-05-26', ' ', ' ', ' '),
(3, 'Dimas', 'Rengganis Eva', 'penarikan', 2000, '2023-05-26', ' ', ' ', ' '),
(4, 'Dimas', 'Rengganis Eva', 'transfer', 3000, '2023-05-26', 'Arre Pangestu', 'Rengganis Eva mengirim 3000 rupiah', 'ini dari eva'),
(5, 'admin', 'Adrian Paulin', 'tabungan', 30000, '2023-05-27', ' ', ' ', ' '),
(6, 'admin', 'Adrian Paulin', 'penarikan', 5000, '2023-05-27', ' ', ' ', ' '),
(7, 'admin', 'Adrian Paulin', 'transfer', 10000, '2023-05-27', 'Siti Rahmawati', 'Adrian Paulin melakukan transfer kepada anda sebesar 10000 rupiah', 'ini dari adrian paw ke siti'),
(8, 'admin', 'Arre pangestu', 'tabungan', 5000, '2023-05-29', ' ', ' ', ' ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `jurusan_kelas` varchar(255) NOT NULL,
  `prodi_kelas` varchar(255) NOT NULL,
  `aktif_kelas` enum('aktif','tidak aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`, `jurusan_kelas`, `prodi_kelas`, `aktif_kelas`) VALUES
(1, 'X', '1', 'Teknik Komputer dan Jaringan', 'aktif'),
(2, 'XI', '1', 'Teknik Komputer dan Jaringan', 'aktif'),
(3, 'XII', '1', 'Teknik Komputer dan Jaringan', 'aktif'),
(4, 'X', '1', 'Multimedia', 'aktif'),
(5, 'XI', '1', 'Multimedia', 'aktif'),
(6, 'XII', '1', 'Multimedia', 'aktif'),
(7, 'X', '1', 'Rekayasa Perangkat Lunak', 'aktif'),
(8, 'XI', '1', 'Rekayasa Perangkat Lunak', 'aktif'),
(10, 'X', '1', 'Guru', 'aktif'),
(11, 'X', '1', 'Staff', 'aktif'),
(13, 'X', '1', 'Satpam', 'aktif'),
(14, 'XII', '1', 'LULUS', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pattycash`
--

CREATE TABLE `pattycash` (
  `id_patty` int(11) NOT NULL,
  `jenis_patty` varchar(255) NOT NULL,
  `nominal_patty` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pattycash`
--

INSERT INTO `pattycash` (`id_patty`, `jenis_patty`, `nominal_patty`) VALUES
(1, 'patty', 80000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penarikan`
--

CREATE TABLE `penarikan` (
  `id_penarikan` int(11) NOT NULL,
  `username_penarikan` varchar(255) NOT NULL,
  `fullname_penarikan` varchar(255) NOT NULL,
  `nominal_penarikan` int(255) NOT NULL,
  `jenis_penarikan` varchar(255) NOT NULL,
  `tanggal_penarikan` date NOT NULL,
  `keterangan_penarikan` varchar(255) NOT NULL,
  `vue_penarikan` int(11) NOT NULL DEFAULT 1,
  `jenis_patty_tarik` varchar(255) NOT NULL DEFAULT 'patty'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penarikan`
--

INSERT INTO `penarikan` (`id_penarikan`, `username_penarikan`, `fullname_penarikan`, `nominal_penarikan`, `jenis_penarikan`, `tanggal_penarikan`, `keterangan_penarikan`, `vue_penarikan`, `jenis_patty_tarik`) VALUES
(1, '118140128', 'Rengganis Eva', 2000, 'siswa_total', '2023-05-26', 'Dimas', 1, 'patty'),
(2, '118140128', 'Rengganis Eva', 3000, 'siswa_total', '2023-05-26', 'Dimas', 1, 'patty'),
(3, 'adrianpaww', 'Adrian Paulin', 5000, 'guru_total', '2023-05-27', 'admin', 1, 'patty'),
(4, '118140129', 'arre pangestu', 10000, 'guru_total', '2023-05-27', 'admin', 1, 'patty');

--
-- Trigger `penarikan`
--
DELIMITER $$
CREATE TRIGGER `dtarikpetty` AFTER DELETE ON `penarikan` FOR EACH ROW BEGIN
	UPDATE pattycash set pattycash.nominal_patty =  pattycash.nominal_patty + OLD.nominal_penarikan
    WHERE  pattycash.jenis_patty = OLD.jenis_penarikan;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `dtariktotal` AFTER DELETE ON `penarikan` FOR EACH ROW BEGIN
	UPDATE total_tabungan set total_tabungan.penarikan_total = total_tabungan.penarikan_total + OLD.nominal_penarikan
    WHERE total_tabungan.jenis_penabung = OLD.jenis_penarikan;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `dtarikuser` AFTER DELETE ON `penarikan` FOR EACH ROW BEGIN
	UPDATE users set users.penarikan = users.penarikan + OLD.nominal_penarikan
    WHERE users.name = OLD.fullname_penarikan;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tarikpetty` AFTER INSERT ON `penarikan` FOR EACH ROW BEGIN
	UPDATE pattycash set nominal_patty = nominal_patty - NEW.nominal_penarikan
    WHERE jenis_patty = NEW.jenis_patty_tarik;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tariktotal` AFTER INSERT ON `penarikan` FOR EACH ROW BEGIN
	UPDATE total_tabungan set penarikan_total = penarikan_total - NEW.nominal_penarikan
    WHERE jenis_penabung = NEW.jenis_penarikan;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tarikuser` AFTER INSERT ON `penarikan` FOR EACH ROW BEGIN
	UPDATE users set penarikan = penarikan - NEW.nominal_penarikan
    WHERE name = NEW.fullname_penarikan;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `utarikpetty` AFTER UPDATE ON `penarikan` FOR EACH ROW BEGIN
	UPDATE pattycash set nominal_patty = (nominal_patty + OLD.nominal_penarikan) - NEW.nominal_penarikan
    WHERE jenis_patty = NEW.jenis_patty_tarik;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `utariktotal` AFTER UPDATE ON `penarikan` FOR EACH ROW BEGIN
	UPDATE total_tabungan set penarikan_total = (penarikan_total + OLD.nominal_penarikan) - NEW.nominal_penarikan
    WHERE jenis_penabung = NEW.jenis_penarikan;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `utarikuser` BEFORE UPDATE ON `penarikan` FOR EACH ROW BEGIN
	UPDATE users set penarikan = (penarikan + OLD.nominal_penarikan) - NEW.nominal_penarikan
    WHERE name = NEW.fullname_penarikan;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `prodi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `prodi`) VALUES
(1, 'Teknik Komputer dan Jaringan'),
(2, 'Multimedia'),
(3, 'Rekayasa Perangkat Lunak'),
(4, 'Teknik Kendaraan Ringan Otomotif'),
(5, 'Teknik Sepeda Motor'),
(6, 'Farmasi Klinis dan Komunitas'),
(7, 'Keperawatan'),
(8, 'Akuntasi dan Keuangan Lembaga'),
(9, 'Pemasaran'),
(11, 'Satpam'),
(12, 'Guru'),
(13, 'Staff'),
(14, 'LULUS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabungan`
--

CREATE TABLE `tabungan` (
  `id_tabungan` int(11) NOT NULL,
  `username_tabungan` varchar(255) NOT NULL,
  `fullname_tabungan` varchar(255) NOT NULL,
  `nominal_tabungan` int(255) NOT NULL,
  `jenis_penabung` varchar(255) NOT NULL,
  `tanggal_tabungan` date NOT NULL,
  `keterangan_tabungan` varchar(255) NOT NULL,
  `vue_tabungan` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabungan`
--

INSERT INTO `tabungan` (`id_tabungan`, `username_tabungan`, `fullname_tabungan`, `nominal_tabungan`, `jenis_penabung`, `tanggal_tabungan`, `keterangan_tabungan`, `vue_tabungan`) VALUES
(1, '118140128', 'Rengganis Eva', 10000, 'siswa_total', '2023-05-26', 'Dimas', 1),
(2, '118140129', 'Arre pangestu', 4000, 'siswa_total', '2023-05-26', 'DImas', 1),
(3, '118140129', 'Arre pangestu', 3000, 'siswa_total', '2023-05-26', 'siswa_total', 1),
(4, 'adrianpaww', 'Adrian Paulin', 30000, 'guru_total', '2023-05-27', 'admin', 1),
(5, 'SitiRahma', 'Siti Rahmawati', 10000, 'guru_total', '2023-05-27', 'guru_total', 1),
(6, '118140129', 'Arre pangestu', 5000, 'siswa_total', '2023-05-30', 'admin', 1),
(7, '118140132', 'Manarul Hidayat', 5000, 'siswa_total', '2023-05-29', 'admin', 1);

--
-- Trigger `tabungan`
--
DELIMITER $$
CREATE TRIGGER `dtabungantotal` AFTER DELETE ON `tabungan` FOR EACH ROW BEGIN
	UPDATE total_tabungan set total_tabungan.tabungan_total = total_tabungan.tabungan_total - OLD.nominal_tabungan
    WHERE total_tabungan.jenis_penabung = OLD.jenis_penabung;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `dtabunganuser` AFTER DELETE ON `tabungan` FOR EACH ROW BEGIN
	UPDATE users set users.tabungan = users.tabungan - OLD.nominal_tabungan
    WHERE users.name = OLD.fullname_tabungan;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tabungantotal` AFTER INSERT ON `tabungan` FOR EACH ROW BEGIN
	UPDATE total_tabungan set tabungan_total = tabungan_total + NEW.nominal_tabungan WHERE jenis_penabung = NEW.jenis_penabung;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tabunganuser` AFTER INSERT ON `tabungan` FOR EACH ROW BEGIN
	UPDATE users set tabungan = tabungan + NEW.nominal_tabungan 	WHERE users.name = NEW.fullname_tabungan;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `utabungantotal` AFTER UPDATE ON `tabungan` FOR EACH ROW BEGIN
	UPDATE total_tabungan set tabungan_total = (tabungan_total - OLD.nominal_tabungan) + NEW.nominal_tabungan
    WHERE jenis_penabung = NEW.jenis_penabung;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `utabunganuser` AFTER UPDATE ON `tabungan` FOR EACH ROW BEGIN
	UPDATE users set tabungan = (tabungan - OLD.nominal_tabungan) + NEW.nominal_tabungan
    WHERE users.name = NEW.fullname_tabungan;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahunakademik`
--

CREATE TABLE `tahunakademik` (
  `id_tahunakademik` int(11) NOT NULL,
  `tanggal_awal` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tahunakademik`
--

INSERT INTO `tahunakademik` (`id_tahunakademik`, `tanggal_awal`, `tanggal_akhir`, `deleted_at`) VALUES
(1, '2023-01-01', '2023-12-31', '2023-05-20 13:59:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `total_tabungan`
--

CREATE TABLE `total_tabungan` (
  `id_totab` int(11) NOT NULL,
  `jenis_penabung` varchar(255) NOT NULL,
  `tabungan_total` int(255) NOT NULL,
  `penarikan_total` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `total_tabungan`
--

INSERT INTO `total_tabungan` (`id_totab`, `jenis_penabung`, `tabungan_total`, `penarikan_total`) VALUES
(1, 'guru_total', 40000, -15000),
(2, 'staff_total', 0, 0),
(3, 'siswa_total', 27000, -5000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `username_transaksi` varchar(255) NOT NULL,
  `fullname_transaksi` varchar(255) NOT NULL,
  `tabungan_transaksi` int(255) NOT NULL,
  `penarikan_transaksi` int(255) NOT NULL,
  `jenis_transaksi` varchar(255) NOT NULL,
  `keterangan_transaksi` varchar(255) NOT NULL,
  `warna_transaksi` varchar(255) NOT NULL,
  `transfer_transaksi` int(255) NOT NULL,
  `kategori_transaksi` varchar(255) NOT NULL,
  `rekening_transaksi` varchar(255) NOT NULL,
  `petugas_transaksi` varchar(255) NOT NULL,
  `imbuhan_transaksi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tanggal_transaksi`, `username_transaksi`, `fullname_transaksi`, `tabungan_transaksi`, `penarikan_transaksi`, `jenis_transaksi`, `keterangan_transaksi`, `warna_transaksi`, `transfer_transaksi`, `kategori_transaksi`, `rekening_transaksi`, `petugas_transaksi`, `imbuhan_transaksi`) VALUES
(1, '2023-05-26', '118140128', 'Rengganis Eva', 10000, 0, 'belum ada', 'Selesai', 'success', 0, 'tabungan', '1234', 'admin', 'belum ada'),
(2, '2023-05-26', '118140128', 'Rengganis Eva', 0, 2000, 'belom ada', 'Selesai', 'success', 0, 'penarikan', '1234', 'admin', 'belum ada'),
(3, '2023-05-26', '118140128', 'Rengganis Eva', 0, 0, 'belum ada', 'Selesai', 'success', 3000, 'transfer', 'Arre Pangestu', 'admin', 'ini dari eva'),
(4, '2023-05-26', '118140129', 'Arre pangestu', 4000, 0, 'belum ada', 'Selesai', 'success', 0, 'tabungan', '1234', 'admin', 'belum ada'),
(6, '2023-05-27', '118140111', 'Ahmad Sangaji', 0, 5000, 'belom ada', 'pending', 'warning', 0, 'penarikan', '1234', 'belum ada', 'belum ada'),
(7, '2023-05-27', '118140111', 'Ahmad Sangaji', 0, 0, 'belum ada', 'pending', 'warning', 7000, 'transfer', '118140132', 'belum ada', 'ini dari sangaji ke manarul'),
(8, '2023-05-27', 'adrianpaww', 'Adrian Paulin', 30000, 0, 'belum ada', 'Selesai', 'success', 0, 'tabungan', '1234', 'admin', 'belum ada'),
(9, '2023-05-27', 'adrianpaww', 'Adrian Paulin', 0, 5000, 'belom ada', 'Selesai', 'success', 0, 'penarikan', '1234', 'admin', 'belum ada'),
(10, '2023-05-27', 'adrianpaww', 'Adrian Paulin', 0, 0, 'belum ada', 'Selesai', 'success', 10000, 'transfer', 'Siti Rahmawati', 'admin', 'ini dari adrian paw ke siti'),
(11, '2023-05-29', '118140129', 'Arre pangestu', 5000, 0, 'belum ada', 'Gagal', 'danger', 0, 'tabungan', '1234', 'admin', 'belum ada'),
(13, '2023-05-29', '118140132', 'Manarul Hidayat', 0, 0, 'belum ada', 'pending', 'warning', 2000, 'transfer', '118140129', 'belum ada', 'ini dari manarul');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('superadmin','admin','user') CHARACTER SET utf8mb4 NOT NULL DEFAULT 'user',
  `profile` varchar(11) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'default.jpg',
  `tabungan` int(255) NOT NULL,
  `penarikan` int(255) NOT NULL,
  `jk_user` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `kelas_user` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `tahun_akademik_user` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `bidang_user` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `role`, `profile`, `tabungan`, `penarikan`, `jk_user`, `kelas_user`, `tahun_akademik_user`, `bidang_user`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'superadminnn', 'superadmin@gmail.com', NULL, '$2y$10$ghs36qf4/6/8Y6eQuvdC2.PAtoULQyRSWgZUypeJOkGiZzapMOgx.', 'superadmin', 'default.jpg', 0, 0, '', '', '', '', NULL, '2023-05-18 17:18:35', '2023-05-25 18:41:00'),
(2, 'admin', 'adminnn', 'admin@gmail.com', NULL, '$2y$10$f15/LGRGJL928CszWqgNy.M0f3VN1HPI6.IW7vpfhL2LxmBU/0NJS', 'admin', 'default.jpg', 0, 0, '', '', '', '', NULL, '2023-05-18 17:18:36', '2023-05-18 17:18:36'),
(3, 'user', 'penggunaa', 'user@gmail.com', NULL, '$2y$10$lbwVzyirjGE2Cw5SXTsjIOyJ2lJWZfYrxtEv4cXrl4lNWgTYeXX9O', 'user', 'default.jpg', 0, 0, '', '', '', '', NULL, '2023-05-18 17:18:36', '2023-05-18 17:18:36'),
(5, 'Arre pangestu', '118140129', 'arre@gmail.com', NULL, '$2y$10$8VbmcrsQO8NVQfBMrE9oDufGYdQDjjdI7a5E5wJfkBLXOniP1uWVW', 'user', 'default.jpg', 12000, 0, 'Laki-Laki', 'X 1 Teknik Komputer dan Jaringan', '(2023-01-01) - (2023-12-31)', 'Teknik Komputer dan Jaringan', NULL, '2023-05-20 07:36:30', '2023-05-25 19:02:27'),
(6, 'Rengganis Eva', '118140128', 'eva@gmail.com', NULL, '$2y$10$/h933WQZVUSCKn9EWcoEj.ZY5XrfO.htnWQk0q3wLitZ7Wuzrxr7W', 'user', 'default.jpg', 10000, -5000, 'Perempuan', 'X 1 Multimedia', '(2023-01-01) - (2023-12-31)', 'Multimedia', NULL, '2023-05-20 07:37:16', '2023-05-20 07:37:16'),
(7, 'Ahmad Sangaji', '118140111', 'sangaji12@gmail.com', NULL, '$2y$10$XzH6km2VxEQr2XI9rtMoKe32x7oXuhwPHsr7ddDk06.M/Hjw9Ck4.', 'user', 'default.jpg', 0, 0, 'Laki-Laki', 'XI 1 Rekayasa Perangkat Lunak', '(2023-01-01) - (2023-12-31)', 'Rekayasa Perangkat Lunak', NULL, '2023-05-25 17:46:18', '2023-05-25 17:46:18'),
(8, 'Manarul Hidayat', '118140132', 'manaslur@gmail.com', NULL, '$2y$10$tNz6A2pju5juEgKz4tozludCu9fGXAURvJTnvxEuu5MPsjN6ES2va', 'user', 'default.jpg', 5000, 0, 'Laki-Laki', 'X 1 Multimedia', '(2023-01-01) - (2023-12-31)', 'Multimedia', NULL, '2023-05-25 17:47:01', '2023-05-25 17:47:01'),
(9, 'Rahmat Setiawan', '118140122', 'mats23@gmail.com', NULL, '$2y$10$RvSbMJ3K.RqE9XKXDKxLkOeko7ZrZbN9hAYgOIrW1EnvXoziZJ9QC', 'user', 'default.jpg', 0, 0, 'Laki-Laki', 'XII 1 LULUS', '(2023-01-01) - (2023-12-31)', 'LULUS', NULL, '2023-05-25 17:47:32', '2023-05-27 22:19:52'),
(10, 'Adrian Paulin', 'adrianpaww', 'Adpaw@gmail.com', NULL, '$2y$10$y8T/g5fm/vCIX.LF8prrA.by8IA1HGw05QDggRoh.9r71c5ezYY.2', 'user', 'default.jpg', 30000, -15000, 'Laki-Laki', 'X 1 Guru', '(2023-01-01) - (2023-12-31)', 'Guru', NULL, '2023-05-25 17:49:57', '2023-05-25 17:53:07'),
(11, 'Siti Rahmawati', 'SitiRahma', 'sitwrah@gmail.com', NULL, '$2y$10$YPofbekIsgvj8h9Kg.J3WetbCOxVZAF9e90C2nNDiybRhDc6wdKIK', 'user', 'default.jpg', 10000, 0, 'Perempuan', 'X 1 Guru', '(2023-01-01) - (2023-12-31)', 'Guru', NULL, '2023-05-25 17:50:26', '2023-05-25 17:50:26'),
(12, 'Nur CAhyani', 'nurcahyani', 'nurca23@gmail.com', NULL, '$2y$10$QM4zM.sFEHkSGhpZO9Y.b.GwajRvacthabmfPVIrL7VgeNeSMpciq', 'user', 'default.jpg', 0, 0, 'Perempuan', 'X 1 Staff', '(2023-01-01) - (2023-12-31)', 'Staff', NULL, '2023-05-25 17:52:54', '2023-05-25 17:52:54');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aktifitas`
--
ALTER TABLE `aktifitas`
  ADD PRIMARY KEY (`id_aktifitas`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pattycash`
--
ALTER TABLE `pattycash`
  ADD PRIMARY KEY (`id_patty`);

--
-- Indeks untuk tabel `penarikan`
--
ALTER TABLE `penarikan`
  ADD PRIMARY KEY (`id_penarikan`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indeks untuk tabel `tabungan`
--
ALTER TABLE `tabungan`
  ADD PRIMARY KEY (`id_tabungan`);

--
-- Indeks untuk tabel `tahunakademik`
--
ALTER TABLE `tahunakademik`
  ADD PRIMARY KEY (`id_tahunakademik`);

--
-- Indeks untuk tabel `total_tabungan`
--
ALTER TABLE `total_tabungan`
  ADD PRIMARY KEY (`id_totab`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aktifitas`
--
ALTER TABLE `aktifitas`
  MODIFY `id_aktifitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pattycash`
--
ALTER TABLE `pattycash`
  MODIFY `id_patty` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `penarikan`
--
ALTER TABLE `penarikan`
  MODIFY `id_penarikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tabungan`
--
ALTER TABLE `tabungan`
  MODIFY `id_tabungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tahunakademik`
--
ALTER TABLE `tahunakademik`
  MODIFY `id_tahunakademik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `total_tabungan`
--
ALTER TABLE `total_tabungan`
  MODIFY `id_totab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
