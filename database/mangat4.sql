-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2023 at 05:53 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mangat4`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwalpelajaran`
--

CREATE TABLE `jadwalpelajaran` (
  `id_jadwalpelajaran` int(11) NOT NULL,
  `hari` date NOT NULL,
  `semester` varchar(100) NOT NULL,
  `tahunajaran` varchar(100) NOT NULL,
  `jammasukpelajaran` time NOT NULL,
  `pegawai` varchar(255) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `totalsesi` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwalpelajaran`
--

INSERT INTO `jadwalpelajaran` (`id_jadwalpelajaran`, `hari`, `semester`, `tahunajaran`, `jammasukpelajaran`, `pegawai`, `kelas`, `totalsesi`, `status`) VALUES
(1, '2023-05-08', '1', '1', '10:00:00', '1', '1', '2', '');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `kodejurusan` varchar(255) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `kodejurusan`, `jurusan`, `keterangan`) VALUES
(1, '1101', 'TEKNIK KOMPUTER DAN JARINGAN', 'Coba'),
(2, '1102', 'TEKNIK KENDARAAN RINGAN OTOMOTIF', 'Coba'),
(3, '1103', 'TEKNIK BODI OTOMOTIF', ''),
(4, '1104', 'TEKNIK BISNIS DAN SEPEDA MOTOR', ''),
(5, '1105', 'TEKNIK AUDIO VIDEO', '');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kodekelas` varchar(255) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kodekelas`, `kelas`, `jurusan`, `keterangan`) VALUES
(1, '10011', 'X', '1', 'Coba Update'),
(2, '10012', 'X', '2', 'Coba'),
(3, '10013', 'X', '3', ''),
(4, '10014', 'X', '4', ''),
(5, '10015', 'X', '5', ''),
(6, '10021', 'XI', '1', ''),
(7, '10022', 'XI', '2', ''),
(8, '10023', 'XI', '3', ''),
(9, '10024', 'XI', '4', ''),
(10, '10025', 'XI', '5', ''),
(11, '10031', 'XII', '1', ''),
(12, '10032', 'XII', '2', ''),
(13, '10033', 'XII', '3', ''),
(14, '10034', 'XII', '4', ''),
(15, '10035', 'XII', '5', ''),
(16, '1000', 'COBA', '2', '');

-- --------------------------------------------------------

--
-- Table structure for table `matapelajaran`
--

CREATE TABLE `matapelajaran` (
  `id_matapelajaran` int(11) NOT NULL,
  `kodematapelajaran` varchar(255) NOT NULL,
  `namamatapelajaran` varchar(255) NOT NULL,
  `sesi` varchar(50) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matapelajaran`
--

INSERT INTO `matapelajaran` (`id_matapelajaran`, `kodematapelajaran`, `namamatapelajaran`, `sesi`, `keterangan`) VALUES
(1, '2005', 'Jaringan Komputer', '3', 'Coba Update');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp_guru` varchar(20) NOT NULL,
  `email_guru` varchar(100) NOT NULL,
  `golongan` varchar(100) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `guru_mata_pelajaran` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nip`, `nama_pegawai`, `agama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_hp_guru`, `email_guru`, `golongan`, `pendidikan`, `jabatan`, `guru_mata_pelajaran`, `password`, `status`) VALUES
(1, '1111', 'Sinung Agung Cahyono', 'Kristen Protestan', 'Laki - laki', 'Tangerang', '2023-05-08', 'Puri Serpong 1', '081293012910', 'sinungagung@gmail.com', 'Golongan III/b', 'Sarjana 1', 'kepalasekolah', 'indonesia', '04f2d2e52a3619368c7dcc008b589a40', '1'),
(2, '2222', 'Sinung Purnama Aji Saputra', '', '', 'Tangerang', '1999-03-08', 'Puri serpong', '9213032103', 'sinungpurnama@ti.ukdw.ac.id', 'Golongan III/a', 'Sarjana 1', 'kepalasekolah', 'matematika', '49f4402396fd18bac8e690b4f9ab1878', '1'),
(3, '4444', 'hhhhh', '', '', '', '0000-00-00', '', '', '', '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id_semester` int(11) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id_semester`, `semester`, `status`) VALUES
(1, 'Ganjil', 1),
(2, 'Genap', 0),
(3, 'Genap', 1),
(4, 'Ganjil', 0),
(5, 'Ganjil', 0),
(6, 'Genap', 1);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nomor_induk_siswa` varchar(255) DEFAULT NULL,
  `nama_siswa` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `nomor_hp_siswa` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alamat_tinggal` varchar(255) DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `golongan_darah` varchar(5) DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `kewarganegaraan` varchar(50) DEFAULT NULL,
  `tahun_masuk` date DEFAULT NULL,
  `nomor_hp_orangtua` varchar(20) DEFAULT NULL,
  `nama_ayah` varchar(255) DEFAULT NULL,
  `pekerjaan_ayah` varchar(255) DEFAULT NULL,
  `nama_ibu` varchar(255) DEFAULT NULL,
  `pekerjaan_ibu` varchar(255) DEFAULT NULL,
  `kelas` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nomor_induk_siswa`, `nama_siswa`, `tempat_lahir`, `tanggal_lahir`, `nomor_hp_siswa`, `email`, `alamat_tinggal`, `agama`, `golongan_darah`, `jenis_kelamin`, `kewarganegaraan`, `tahun_masuk`, `nomor_hp_orangtua`, `nama_ayah`, `pekerjaan_ayah`, `nama_ibu`, `pekerjaan_ibu`, `kelas`) VALUES
(1, '71170214', 'Sinung Purnama Aji Saputra', 'Tangerang Selatan', '1999-08-30', '081229301341', 'sinung.purnama@ti.ukdw.ac.id', 'Jl. Dr. Wahidin Sudirohusodo No.5-25, Kotabaru, Kec. Gondokusuman, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55224', 'Kristen Protestan', 'B', 'Laki - laki', 'WNI', '2023-05-17', '081229301341', 'Sukisno', 'Bengkel', 'Tumiyem', 'Ibu Rumah Tangga', '15'),
(2, '72201920', 'Jefrison Banni', 'Dumai', '1997-05-28', '12432143', 'jeki@gmail.com', 'dumai', 'Kristen Protestan', 'B', 'Laki - laki', 'WNI', '0000-00-00', '', '', '', '', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tahunajaran`
--

CREATE TABLE `tahunajaran` (
  `id_tahunajaran` int(11) NOT NULL,
  `tahunajaran` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahunajaran`
--

INSERT INTO `tahunajaran` (`id_tahunajaran`, `tahunajaran`, `status`) VALUES
(1, '2020/2021', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `email_admin` varchar(100) NOT NULL,
  `foto_admin` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `level`, `email_admin`, `foto_admin`, `status`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'admin', 'admin@gmail.com', '', '1'),
(2, 'admintes', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', 'admin1@gmail.com', 'test.jpg', '1'),
(3, 'admin123', 'ec6a6536ca304edf844d1d248a4f08dc', 'admin', 'admin1234@gmail.com', 'apa.jpg', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwalpelajaran`
--
ALTER TABLE `jadwalpelajaran`
  ADD PRIMARY KEY (`id_jadwalpelajaran`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `matapelajaran`
--
ALTER TABLE `matapelajaran`
  ADD PRIMARY KEY (`id_matapelajaran`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tahunajaran`
--
ALTER TABLE `tahunajaran`
  ADD PRIMARY KEY (`id_tahunajaran`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwalpelajaran`
--
ALTER TABLE `jadwalpelajaran`
  MODIFY `id_jadwalpelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `matapelajaran`
--
ALTER TABLE `matapelajaran`
  MODIFY `id_matapelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id_semester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tahunajaran`
--
ALTER TABLE `tahunajaran`
  MODIFY `id_tahunajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
