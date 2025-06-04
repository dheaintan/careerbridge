-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2025 at 05:31 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `careerbridge`
--

-- --------------------------------------------------------

--
-- Table structure for table `apply_job`
--

CREATE TABLE `apply_job` (
  `ID_apply` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `ID_job` int(11) NOT NULL,
  `created_at` date DEFAULT curdate(),
  `status_lamaran` enum('buka','tutup') NOT NULL DEFAULT 'buka'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apply_job`
--

INSERT INTO `apply_job` (`ID_apply`, `ID_user`, `ID_job`, `created_at`, `status_lamaran`) VALUES
(1, 12, 16, '2025-05-28', 'buka'),
(2, 12, 17, '2025-05-28', ''),
(3, 26, 12, '2025-06-01', ''),
(4, 23, 14, '2025-06-01', ''),
(5, 26, 3, '2025-06-02', ''),
(6, 27, 9, '2025-06-02', '');

-- --------------------------------------------------------

--
-- Table structure for table `detail_user`
--

CREATE TABLE `detail_user` (
  `ID_user` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `alamat` text NOT NULL,
  `pendidikan_terakhir` enum('SMA/SMK','D3','S1','S2','S3') NOT NULL,
  `jenis_kelamin` enum('P','L') NOT NULL,
  `CV` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_user`
--

INSERT INTO `detail_user` (`ID_user`, `nama_lengkap`, `no_telp`, `alamat`, `pendidikan_terakhir`, `jenis_kelamin`, `CV`) VALUES
(11, 'Anggrek', '081234285350', 'Jl. Mawar', 'S1', 'P', ''),
(12, 'Dhey', '081233197248', 'jalan kanan', 'SMA/SMK', 'P', 'cv_12_1747395514.pdf'),
(26, 'Meong', '082144285358', 'Jl. Balai Desa Taman', 'S1', 'P', ''),
(27, 'Haniya Harum Pertiwi Ramadhan', '081357938303', 'Jl. Mawar no.09', 'S2', 'P', '');

-- --------------------------------------------------------

--
-- Table structure for table `login_signup`
--

CREATE TABLE `login_signup` (
  `ID_user` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role` enum('pelamar','perusahaan','admin','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_signup`
--

INSERT INTO `login_signup` (`ID_user`, `email`, `password`, `last_login`, `role`) VALUES
(9, 'perusahaanku@gmail.com', '$2y$10$e0OW5vz60JBYOx9fSzsCl.5TdlRl6sQgv7TasPwyc8lFOCPvRK56e', '2025-05-15 08:02:45', 'perusahaan'),
(10, 'perusahaanku2@gmail.com', '$2y$10$Mx8CeoenL29NSg5YmaOPWeM606dcZnTVrBpEOgHVDcn2WQB89nuoW', '2025-06-02 08:02:17', 'perusahaan'),
(11, 'akunbaru@gmail.com', '$2y$10$J7mE0hQ.tZEHc.BBHJCwZOYXr6iLRE4N81Uz7B06YwdZKtY4u55EO', '2025-06-01 08:40:57', 'pelamar'),
(12, 'pelamar1@gmail.com', '$2y$10$r6EM6OD3UdCOtReWSGrdyuhCVVaTmDmzqIUCadiGEVUzyUZNc5sYW', '2025-05-28 03:54:43', 'pelamar'),
(13, 'admincareerbridge@gmail.com', '$2y$10$z5xlVYtU8lBMgmBoKyzs1.JSnrzxd5XqV9NrcszOeabnNFs6NhU0i', '2025-05-18 11:28:01', 'admin'),
(14, 'hr@digitalinovasi.co.id', '$2y$10$csh4NN/YMAJ/Ni8efAbm9O4yG3tv/3eqHIZ/.0RZ8sgLxH9niOQ8y', '2025-05-21 05:49:47', 'perusahaan'),
(15, 'cs@pelitajaya.com', '$2y$10$7PDoPEhVGpHbTHct3vTks.eLH2/uBNJgXhbGlt7xAYAc2KjcVxKMK', '2025-06-02 06:27:12', 'perusahaan'),
(16, 'career@maxyacademy.com', '$2y$10$RCL1iFIkYp.4bLeXoA/FOOMGFqj0OV/U.UDNQGMCTfrgrNubyFUUS', '2025-05-29 17:57:16', 'perusahaan'),
(17, 'info@kreasivisual.id', '$2y$10$PzJm5/kAeFDjVPAvRu0jzezjlwM7h1YkD2X3jDIyi5r/G91zo/kJm', '2025-05-21 06:17:07', 'perusahaan'),
(18, 'jobs@literasidigital.com', '$2y$10$xCcCV8EYwccjndARiTl7Ou5RbgbMXnL.fxXYiaItfLRCbJiPK8GLO', '2025-05-21 06:27:25', 'perusahaan'),
(19, 'design@technovastudio.com', '$2y$10$l9bFvUv//vEiXhbdQn3Y8ujWuRJacudN69vpvoy.K5RSaYvDFDbKq', '2025-06-02 15:50:46', 'perusahaan'),
(20, 'marketing@citranig.co.id', '$2y$10$L578tX8NEcDlrY3sM2MAN.GV9IlSq0ZL9NIlFbQGPMcww8oZOXFJu', '2025-05-21 06:31:45', 'perusahaan'),
(21, 'careers@innovatech.com', '$2y$10$oTKqC9YE1lwpf0YCQjEjcOX1X/Kp6ML53VIDjrKAL.B9Ij5s3CcxW', '2025-06-04 09:36:18', 'perusahaan'),
(22, 'hr@mshebat.co.id', '$2y$10$ujbb0HBPxMbT5e2.zzmUguocEYeA.ooFz68QllEwZ15tCrAEPo05G', '2025-06-01 08:42:03', 'perusahaan'),
(23, 'pm@proyekunggul.co.id', '$2y$10$SkYVGi/cwlQbtbO3TJQ63.Jv.D7caneU97gjeSx4YAg6oGtc1DeTK', '2025-06-01 08:49:47', 'perusahaan'),
(24, 'edit@produksikreatif.com', '$2y$10$25lia7nMcQbIp8FlZfAfrO0EWYUsmO2TC6QBBXdbZjBLQaufmM22.', '2025-05-21 06:48:34', 'perusahaan'),
(25, 'research@risetmedika.org', '$2y$10$Wm9FubqNnblydDm0pBmF..jfmXhhe6RwIpe2J8DV44iqK1tfPkRIm', '2025-06-04 09:16:26', 'perusahaan'),
(26, 'mengcantik@gmail.com', '$2y$10$FC.i2S2FXfrnB5zT9BbUY.eWpYTqqbLibs7dimm1UxRMgqhHbQRva', '2025-06-02 06:55:20', 'pelamar'),
(27, 'haniya.harumpr@gmail.com', '$2y$10$VBXji2fl.LEqdBm6OrRqnu7fy4mpM8Oouir5Gfiaa3EXjtev1vAYC', '2025-06-03 07:38:01', 'pelamar');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `ID_Perusahaan` int(11) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `deskripsi_perusahaan` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `ID_user` int(11) DEFAULT NULL,
  `logo_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`ID_Perusahaan`, `nama_perusahaan`, `deskripsi_perusahaan`, `email`, `lokasi`, `ID_user`, `logo_url`) VALUES
(1, 'Dimsummer', 'Toko yang menjual dimsum, risol, es teh, dan cendol', 'perusahaanku2@gmail.com', 'Jl. Keboansikep Sidoarjo', 10, NULL),
(2, 'PT. Inovasi Digital Nusantara', 'Perusahaan teknologi yang fokus pada pengembangan solusi perangkat lunak dan transformasi digital untuk perusahaan skala menengah hingga besar di Indonesia.', 'hr@digitalinovasi.co.id', 'Jakarta Selatan', 14, NULL),
(3, 'CV. Pelita Jaya', 'Startup kreatif yang bergerak di bidang desain grafis, digital marketing, dan produksi konten visual untuk berbagai brand lokal.', 'cs@pelitajaya.com', 'Surabaya', 15, NULL),
(4, 'Maxy Academy', 'Platform pendidikan digital yang menawarkan program magang dan pelatihan di bidang teknologi, bisnis, dan data untuk mahasiswa dan fresh graduate.', 'career@maxyacademy.com', 'Bandung', 16, 'logo_4_1748541561.png'),
(5, 'CV. Kreasi Visual', 'Agensi desain kreatif yang menyediakan layanan visual branding, desain iklan, dan media sosial dengan gaya yang modern dan komunikatif.', 'info@kreasivisual.id', 'Yogyakarta', 17, NULL),
(6, 'PT. Literasi Digital', 'Perusahaan konten digital yang berfokus pada edukasi publik melalui artikel blog, konten SEO, dan kampanye literasi digital.', 'jobs@literasidigital.com', 'Semarang', 18, NULL),
(7, 'Technova Studio', 'Studio desain interaktif yang mengkhususkan diri pada pembuatan prototipe aplikasi, desain UI/UX, serta riset pengguna untuk produk digital.', 'design@technovastudio.com', 'Jakarta', 19, NULL),
(8, 'PT. Citra Niaga', 'Perusahaan perdagangan dan pemasaran yang bergerak dalam penyusunan strategi bisnis dan pengembangan kerja sama dengan mitra usaha.', 'marketing@citranig.co.id', 'Bekasi', 20, NULL),
(9, 'Innovatech Global', 'Startup teknologi yang fokus pada pengembangan sistem backend, aplikasi skala besar, serta solusi teknologi berbasis cloud untuk industri.', 'careers@innovatech.com', 'Jakarta Selatan', 21, 'logo_9_1749029792.png'),
(10, 'PT. Media Sosial Hebat', 'Perusahaan digital yang mengelola konten media sosial berbagai brand dan perusahaan, dengan strategi pemasaran berbasis kreativitas.', 'hr@mshebat.co.id', 'Malang', 22, NULL),
(11, 'PT. Proyek Unggul', 'Perusahaan manajemen proyek yang menangani pelaksanaan dan pengawasan berbagai proyek berskala nasional, dari tahap perencanaan hingga eksekusi.', 'pm@proyekunggul.co.id', 'Jakarta Barat', 23, NULL),
(12, 'CV. Produksi Kreatif', 'Studio produksi konten multimedia yang berfokus pada pengeditan video untuk keperluan promosi, media sosial, dan kanal YouTube.', 'edit@produksikreatif.com', 'Surakarta', 24, NULL),
(13, 'Lembaga Riset Medika', 'Lembaga penelitian kesehatan yang melakukan studi dan analisis tren kesehatan masyarakat sebagai dasar penyusunan kebijakan dan publikasi ilmiah.', 'research@risetmedika.org', 'Depok', 25, 'logo_13_1749028607.png');

-- --------------------------------------------------------

--
-- Table structure for table `posting_job`
--

CREATE TABLE `posting_job` (
  `ID_job` int(11) NOT NULL,
  `ID_Perusahaan` int(11) NOT NULL,
  `posisi` varchar(100) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `tipe_pekerjaan` enum('Full Time','Part Time') NOT NULL,
  `jenjang_pendidikan` enum('SMA/SMK','D3','S1','S2','S3') NOT NULL,
  `level_pekerjaan` varchar(20) NOT NULL,
  `gaji_min` int(11) NOT NULL,
  `gaji_max` int(11) NOT NULL,
  `tanggal_posting` date NOT NULL,
  `deskripsi_loker` text NOT NULL,
  `status_lowongan` enum('buka','tutup') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posting_job`
--

INSERT INTO `posting_job` (`ID_job`, `ID_Perusahaan`, `posisi`, `nama_perusahaan`, `lokasi`, `tipe_pekerjaan`, `jenjang_pendidikan`, `level_pekerjaan`, `gaji_min`, `gaji_max`, `tanggal_posting`, `deskripsi_loker`, `status_lowongan`) VALUES
(2, 1, 'Jaga Outlet', 'Dimsummer', 'Gedangan', 'Part Time', 'SMA/SMK', 'Entry Level', 1000000, 2000000, '2025-05-19', 'Menjaga Kebersihan Outlet', 'buka'),
(3, 1, 'Content Creator', 'Dimsummer', 'Gedangan', 'Part Time', 'SMA/SMK', 'Entry Level', 1000000, 2000000, '2025-05-20', 'Membuat konten yang relevan', 'buka'),
(4, 2, 'Frontend Developer', 'PT. Inovasi Digital Nusantara', 'Jakarta', 'Full Time', 'S1', 'Entry Level', 5000000, 8000000, '2025-05-21', 'Membangun antarmuka web responsif menggunakan React/Vue.', 'buka'),
(5, 3, 'Customer Service', 'CV. Pelita Jaya', 'Surabaya', 'Full Time', 'SMA/SMK', 'Junior', 3500000, 5000000, '2025-05-21', 'Melayani pelanggan melalui telepon dan email dengan ramah.', 'buka'),
(6, 4, 'Data Analyst Intern', 'Maxy Academy', 'Bandung', 'Full Time', 'S1', 'Entry Level', 1500000, 2500000, '2025-05-21', 'Membantu tim dalam analisis data bisnis dan pembuatan laporan.', 'buka'),
(7, 5, 'Graphic Designer', 'CV. Kreasi Visual', 'Yogyakarta', 'Full Time', 'D3', 'Entry Level', 4000000, 6000000, '2025-05-21', 'Mendesain materi promosi untuk sosial media dan kampanye iklan.', 'buka'),
(8, 6, 'Content Writer', 'PT. Literasi Digital', 'Semarang', 'Full Time', 'S1', 'Junior', 2000000, 4000000, '2025-05-21', 'Menulis konten SEO-friendly untuk blog dan website.', 'buka'),
(9, 7, 'UI/UX Designer', 'Technova Studio', 'Jakarta', 'Full Time', 'S1', 'Mid', 6000000, 9000000, '2025-05-21', 'Mendesain prototipe aplikasi dan melakukan user research.', 'buka'),
(10, 8, 'Marketing Executive', 'PT. Citra Niaga', 'Bekasi', 'Full Time', 'D3', 'Junior', 4000000, 7000000, '2025-05-21', 'Menyusun strategi pemasaran dan menjalin kerja sama dengan klien.', 'buka'),
(11, 9, 'Software Engineer', 'Innovatech Global', 'Jakarta Selatan', 'Full Time', 'S1', 'Mid', 7000000, 11000000, '2025-05-21', 'Membangun dan memelihara sistem backend perusahaan.', 'buka'),
(12, 10, 'Social Media Specialist', 'PT. Media Sosial Hebat', 'Malang', 'Full Time', 'S1', 'Junior', 4500000, 6000000, '2025-05-21', 'Mengelola dan mengembangkan konten media sosial perusahaan.', 'buka'),
(13, 11, 'Project Manager', 'PT. Proyek Unggul', 'Jakarta Barat', 'Full Time', 'S2', 'Senior', 10000000, 15000000, '2025-05-21', 'Mengatur jalannya proyek dari awal hingga akhir dan memastikan hasil.', 'buka'),
(14, 12, 'Video Editor', 'CV. Produksi Kreatif', 'Surakarta', 'Full Time', 'SMA/SMK', 'Entry Level', 2000000, 3500000, '2025-05-21', 'Mengedit video iklan dan konten YouTube.', 'buka'),
(15, 13, 'Peneliti Data Kesehatan', 'Lembaga Riset Medika', 'Depok', 'Full Time', 'S3', 'Senior', 12000000, 18000000, '2025-05-21', 'Meneliti tren kesehatan masyarakat untuk bahan publikasi ilmiah.', 'buka'),
(16, 1, 'Penjaga Outlet', 'Dimsummer', 'Wage', 'Part Time', 'SMA/SMK', 'Entry Level', 1000000, 1200000, '2025-05-21', 'Menjaga outlet dan bersedia bekerja sendirian', 'buka'),
(17, 1, 'Content Creator', 'Dimsummer', 'Wage', 'Part Time', 'SMA/SMK', 'Entry Level', 1000000, 1200000, '2025-05-21', 'Membuat konten untuk diposting di instagram dan tiktok', 'buka'),
(18, 3, 'Cleaning Service', 'CV. Pelita Jaya', 'Surabaya', 'Full Time', 'SMA/SMK', 'Junior', 3500000, 4000000, '2025-05-23', 'Bertugas menjaga kebersihan dan membersihkan kantor', 'buka');

-- --------------------------------------------------------

--
-- Table structure for table `simpan_loker`
--

CREATE TABLE `simpan_loker` (
  `ID_simpan` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `ID_job` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `simpan_loker`
--

INSERT INTO `simpan_loker` (`ID_simpan`, `ID_user`, `ID_job`, `created_at`) VALUES
(2, 26, 14, '2025-06-01 08:48:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apply_job`
--
ALTER TABLE `apply_job`
  ADD PRIMARY KEY (`ID_apply`);

--
-- Indexes for table `detail_user`
--
ALTER TABLE `detail_user`
  ADD PRIMARY KEY (`ID_user`);

--
-- Indexes for table `login_signup`
--
ALTER TABLE `login_signup`
  ADD PRIMARY KEY (`ID_user`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`ID_Perusahaan`);

--
-- Indexes for table `posting_job`
--
ALTER TABLE `posting_job`
  ADD PRIMARY KEY (`ID_job`);

--
-- Indexes for table `simpan_loker`
--
ALTER TABLE `simpan_loker`
  ADD PRIMARY KEY (`ID_simpan`),
  ADD UNIQUE KEY `uniq_user_job` (`ID_user`,`ID_job`),
  ADD KEY `ID_job` (`ID_job`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apply_job`
--
ALTER TABLE `apply_job`
  MODIFY `ID_apply` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login_signup`
--
ALTER TABLE `login_signup`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `ID_Perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `posting_job`
--
ALTER TABLE `posting_job`
  MODIFY `ID_job` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `simpan_loker`
--
ALTER TABLE `simpan_loker`
  MODIFY `ID_simpan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `simpan_loker`
--
ALTER TABLE `simpan_loker`
  ADD CONSTRAINT `simpan_loker_ibfk_1` FOREIGN KEY (`ID_user`) REFERENCES `login_signup` (`ID_user`),
  ADD CONSTRAINT `simpan_loker_ibfk_2` FOREIGN KEY (`ID_job`) REFERENCES `posting_job` (`ID_job`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
