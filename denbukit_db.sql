-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Des 2023 pada 05.39
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
  `asal_desa` enum('Desa Tengalinggah','Desa Wanagiri','Desa Ambengan','Desa Baktiseraga','Desa Panji','Desa Panjianom','Desa Sambangan','Desa Selat','Admin 1','Admin 2','Admin 3','Admin 4','Admin 5') NOT NULL,
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
('2551ed8e-8f75-11ee-ae58-54ee7562927e', 'kantor.desa.ambengan19@gmail.com', 'Putu Essy Yuliana Dewi', 'Desa Ambengan', '083122687202', '$2y$10$JG/WJVCr/ACQWGx3Lzp/Ie55JK9fOhbLFF57sIjcaUJ2GzOuwT.9i', '2023-11-30 12:36:44', NULL, NULL),
('2561af62-8f75-11ee-ae58-54ee7562927e', 'desapanjibll@gmail.com', 'Komang Mudiarta', 'Desa Panji', '081999909776', '$2y$10$L8w0UGxTuB9eiypnIw2EU.qv8uB3Vl7g9xxC6iNXCNaGGlBOMFU3a', '2023-11-30 12:36:44', NULL, NULL),
('539793f2-8f74-11ee-ae58-54ee7562927e', 'pemdesbaktiseraga@gmail.com', 'Kadek Dwinda Yudha Pratama', 'Desa Baktiseraga', '082144493540', '$2y$10$sP4hKv1fStGPqw0nNMiqMuuMFuhAMQTBvWwxyMFGvcd5YqzentM6W', '2023-11-30 12:32:20', NULL, NULL),
('8cd939e8-6d35-499f-999b-753000696cbb', 'anjastatarigan02@gmail.com', 'Anjasta Bagus Tarigan', 'Desa Sambangan', '081370262072', '$2y$10$aVRLRtXNV0Oyg1qVj66k/uGUK9HsCWH00hmCg1Amd93WtyYqFuRiO', '2023-12-02 09:54:02', '2023-12-02 09:54:02', NULL),
('d80fc591-8f75-11ee-ae58-54ee7562927e', 'indah.rahma@undiksha.ac.id', 'Putu Indah', 'Admin 1', '087765310940', '$2y$10$upbFZLga7l7jxEXYPQL2QesQd4FrNfz8QTWcvOqf2YK/Awta4.dUC', '2023-11-30 12:41:42', NULL, NULL),
('d81ee7a9-8f75-11ee-ae58-54ee7562927e', 'desawanagiri243@gmail.com', 'I Made Darsana', 'Desa Wanagiri', '082146551834', '$2y$10$1a4WNHhPjKao2WjHXUpYFebfk6wy7BbQbw/orXQYxqS1TRe7g.Vga', '2023-11-30 12:41:42', NULL, NULL),
('fbded0cf-900c-11ee-ae58-54ee7562927e', 'tengallinggah@gmail.com', 'admin tengallinggah', 'Desa Tengalinggah', '081372727289', '$2y$10$TezvKW5nS6AHk/0FzWSd5.NRwsMErLea0j2crzBao.M64Hpr8huva', '2023-12-01 06:45:32', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `event_wisata`
--

CREATE TABLE `event_wisata` (
  `id_event` char(36) NOT NULL,
  `nama_event` varchar(50) NOT NULL,
  `alamat_event` varchar(100) NOT NULL,
  `penyelenggara` varchar(50) NOT NULL,
  `tag_admin` text NOT NULL,
  `foto_event` text DEFAULT NULL,
  `video_event` text DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `tgl_selesai` datetime DEFAULT NULL,
  `biaya_masuk` text DEFAULT NULL,
  `telp_admin` text NOT NULL,
  `cp_1` text DEFAULT NULL,
  `cp_2` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `event_wisata`
--

INSERT INTO `event_wisata` (`id_event`, `nama_event`, `alamat_event`, `penyelenggara`, `tag_admin`, `foto_event`, `video_event`, `deskripsi`, `tgl_mulai`, `tgl_selesai`, `biaya_masuk`, `telp_admin`, `cp_1`, `cp_2`, `created_at`, `updated_at`, `deleted_at`) VALUES
('4b3baf8e-d20c-4a80-8e5f-90bdae6f1b56', 'Estafet Jurang', 'Singaraja, Bali, Indonesia', 'UNICEF', 'Desa Sambangan', '1701663558_11f4c1a75d7b0cb1b62e.png,1701663558_db1774595a6411bd8fb5.png,1701663558_418f435b35e2d7189e0b.png,1701663558_cc92ad0b6202279d40f7.png,1701663558_492e3bc8080dd3c38384.png,1701663558_0a7d54926f52e8441f7c.png', NULL, '<p>fafhlfa</p>', '2023-12-07 00:00:00', '0000-00-00 00:00:00', '12000', '', '081277655432', '087799876654', '2023-12-04 04:19:18', '2023-12-04 04:19:18', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi_wisata`
--

CREATE TABLE `lokasi_wisata` (
  `id_lokasi` char(36) NOT NULL,
  `nama_lokasi` varchar(100) NOT NULL,
  `alamat_lokasi` varchar(100) NOT NULL,
  `foto_lokasi` text DEFAULT NULL,
  `video_lokasi` text DEFAULT NULL,
  `harga` text DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `tag_lokasi` text NOT NULL,
  `telp_admin` text NOT NULL,
  `cp_1` text DEFAULT NULL,
  `cp_2` text DEFAULT NULL,
  `prioritas` enum('Ya','Tidak') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `lokasi_wisata`
--

INSERT INTO `lokasi_wisata` (`id_lokasi`, `nama_lokasi`, `alamat_lokasi`, `foto_lokasi`, `video_lokasi`, `harga`, `deskripsi`, `tag_lokasi`, `telp_admin`, `cp_1`, `cp_2`, `prioritas`, `created_at`, `updated_at`, `deleted_at`) VALUES
('174db0df-31fb-4868-bb02-6f7b9fadcb4d', 'Napak Kulkas', 'Desa Pernantin, Kec. Juhar, Kab. Karo, Sumatera Utara, 22163', '1701525931_b9508ccf8523422d0b70.png,1701525931_40dfdca453d0fc41ff25.png,1701525931_c4c7570e258fc41b2714.png,1701525931_85336a2f27a4253884dc.png,1701525931_ef1d5d9dd89904a35261.png,1701525931_aeed8871d8a9f9791bd2.png', NULL, '10000', '<p>adadadda</p>', 'Desa Sambangan', '081370262072', NULL, NULL, 'Ya', '2023-12-02 14:05:31', '2023-12-02 14:05:31', NULL),
('fecd67c9-39a3-411b-b047-de4c74c2e492', 'Danau Kristal', 'Singaraja, Bali, Indonesia', '1701536231_7dc2c4197be666c3c083.png,1701536231_b4cd021406a36b74e5a9.png,1701536231_6697254058dd752426b4.png,1701536231_8b1740cf864b57b6244f.png,1701536231_320ee1e2be335769b2e9.png', '1701536231_77a8b6cff232a7698f45.mp4', '10000', '<p>dadadk&nbsp; akdakd adksd adad</p>', 'Desa Sambangan', '081370262072', '081277655432', '087799876654', 'Ya', '2023-12-02 16:57:11', '2023-12-02 16:57:11', NULL);

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
-- Indeks untuk tabel `event_wisata`
--
ALTER TABLE `event_wisata`
  ADD PRIMARY KEY (`id_event`);

--
-- Indeks untuk tabel `lokasi_wisata`
--
ALTER TABLE `lokasi_wisata`
  ADD PRIMARY KEY (`id_lokasi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
