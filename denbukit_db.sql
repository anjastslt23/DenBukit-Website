-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Nov 2023 pada 12.13
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `denbukit_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` char(36) NOT NULL,
  `email_admin` varchar(100) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `asal_desa` enum('Desa Tengalinggah','Desa Wanagiri','Desa Ambengan','Desa Baktiseraga','Desa Panji','Desa Panjianom','Desa Sambangan','Desa Selat') NOT NULL,
  `telp_admin` text NOT NULL,
  `password` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `email_admin`, `nama_admin`, `asal_desa`, `telp_admin`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
('c8035825-8606-11ee-a1e3-54ee7562927e', 'tester@gmail.com', 'Tester', 'Desa Wanagiri', '', '$2y$10$gB9Am4kSafpQE.JfF1rpU.iewpCrjSZi1tfa9ny/XI9JMQY1iBvXS', '2023-11-18 12:36:21', NULL, NULL),
('ca8d90dc-7ee9-11ee-9867-54ee7562927e', 'anjastatarigan02@gmail.com', 'Anjasta Bagus Tarigan', 'Desa Selat', '081322222221', '$2y$10$tEFCfAS9CUWnWmqsr3yg1Ok8I1cdRcLQDlIhl8Z8qQvIj/m0rj81W', '2023-11-09 11:20:48', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi_wisata`
--

CREATE TABLE `lokasi_wisata` (
  `id_lokasi` char(36) NOT NULL,
  `nama_lokasi` varchar(100) NOT NULL,
  `alamat_lokasi` varchar(100) NOT NULL,
  `foto_lokasi` text DEFAULT NULL,
  `harga` text DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `tag_lokasi` text NOT NULL,
  `telp_admin` text NOT NULL,
  `prioritas` enum('Ya','Tidak') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `lokasi_wisata`
--

INSERT INTO `lokasi_wisata` (`id_lokasi`, `nama_lokasi`, `alamat_lokasi`, `foto_lokasi`, `harga`, `deskripsi`, `tag_lokasi`, `telp_admin`, `prioritas`, `created_at`, `updated_at`, `deleted_at`) VALUES
('4b5e5b8f-58c9-4b50-b57b-1a2c87acbe98', 'air terjun jembong ', 'Desa Ambengan ', '1700485076_6af4e79aa9ccd04782ee.png', '15000', '<p>jembong mk</p>', 'Desa Selat', '', 'Tidak', '2023-11-20 12:57:56', '2023-11-22 00:24:46', NULL),
('516b3a0a-1a0b-47e0-a16b-1cda20823d06', 'Danau Kristal', 'Jl kristal no 5', '1701147489_58f13f0fc89693bebfc7.png', 'Gratis', '<p>lorem ipsum akfgfaf alwiefebql fafeiwfbbe aekwkyfew alkwafw iuankrgrv vewviwlb</p>', 'Desa Selat', '081322222221', 'Ya', '2023-11-28 04:58:09', '2023-11-28 04:58:09', NULL),
('54834fb5-7b5b-47b5-9dee-df34b301f695', 'tevyat', 'tevyat', '1700307703_5c8eea200c09f7eb8163.jpg', 'Gratis', '<p>tevyat is best worl intewod</p>', 'Desa Wanagiri', '', 'Tidak', '2023-11-18 11:41:43', '2023-11-18 11:41:43', NULL),
('7fd8b458-882e-47d7-9e85-fa8d377bd38f', 'Air Terjun 7 Warna', 'Tanyakan pada masyarakat setempat', '1700304401_0ba595e892cf28319191.jpg', 'Gratis', '<p style=\"text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer vel elit sapien. Mauris ut fermentum justo. Nam aliquam commodo imperdiet. Fusce ultrices tempus ipsum ut suscipit. Nulla et dui velit. Praesent at erat nisl. Nulla facilisi. Integer interdum turpis non diam ullamcorper tempor. Morbi nec interdum velit, sit amet faucibus metus. Donec vel porta mi. Integer molestie semper erat, eget porttitor nulla euismod congue.</p>\r\n<p style=\"text-align: justify;\">Etiam vitae sem eu dui hendrerit consequat. Vestibulum aliquet justo quis ex accumsan, non luctus magna malesuada. Nunc quis odio quis tellus feugiat finibus non ac justo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse aliquam odio elit, non rutrum urna dictum sit amet. Aliquam ipsum lectus, scelerisque nec urna vel, aliquet dapibus arcu. Curabitur consectetur vestibulum erat in facilisis. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>\r\n<p style=\"text-align: justify;\">Cras diam eros, facilisis ac ornare non, egestas non ligula. Cras non viverra quam, suscipit malesuada quam. Mauris vehicula rhoncus bibendum. Quisque tempus fringilla malesuada. Etiam rutrum felis nisl, ut gravida massa mattis eu. Sed eu leo consectetur, lobortis sem sed, sollicitudin ligula. Ut eros sem, pulvinar nec leo non, fermentum congue neque. In fermentum libero id sodales sodales. Ut malesuada, metus vitae sollicitudin porttitor, nunc neque accumsan ex, a vehicula nulla turpis eget massa. Vivamus vel erat id purus feugiat blandit nec eu elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sit amet facilisis sapien.</p>', 'Desa Selat', '', 'Tidak', '2023-11-18 10:46:41', '2023-11-20 14:16:17', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `asal_desa` (`asal_desa`);

--
-- Indeks untuk tabel `lokasi_wisata`
--
ALTER TABLE `lokasi_wisata`
  ADD PRIMARY KEY (`id_lokasi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
