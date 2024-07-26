-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2023 at 01:48 PM
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
-- Database: `krisma`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_device`
--

CREATE TABLE `tb_device` (
  `No` int(11) NOT NULL,
  `server_IP` text NOT NULL,
  `server_port` text NOT NULL,
  `device_sn` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_device`
--

INSERT INTO `tb_device` (`No`, `server_IP`, `server_port`, `device_sn`) VALUES
(29, '192.168.xxx.xxx', '8080', '20141022xxxxx');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id_jadwal` int(25) NOT NULL,
  `hari` varchar(255) NOT NULL,
  `id_kelas` int(100) NOT NULL,
  `id_pegawai` int(100) NOT NULL,
  `awal_jam` time NOT NULL,
  `batas_jam` time NOT NULL,
  `keterangan_jam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id_jadwal`, `hari`, `id_kelas`, `id_pegawai`, `awal_jam`, `batas_jam`, `keterangan_jam`) VALUES
(1, 'Senin', 1, 43, '07:30:00', '08:50:00', 'Jam Ke-1, Jam Ke-2'),
(2, 'Senin', 1, 16, '08:50:00', '10:10:00', 'Jam Ke-3, Jam Ke-4'),
(3, 'Senin', 1, 39, '10:25:00', '11:05:00', 'Jam Ke-5'),
(4, 'Senin', 1, 17, '11:05:00', '11:45:00', 'Jam Ke-6'),
(5, 'Senin', 1, 15, '11:45:00', '12:25:00', 'Jam Ke-7'),
(6, 'Senin', 1, 47, '12:25:00', '15:20:00', 'Jam Ke-8, Jam Ke-11'),
(7, 'Selasa', 1, 13, '07:00:00', '08:30:00', 'Jam Ke-1, Jam Ke-2'),
(8, 'Selasa', 1, 22, '08:30:00', '09:15:00', 'Jam Ke-3'),
(9, 'Selasa', 1, 36, '09:15:00', '10:00:00', 'Jam Ke-4'),
(10, 'Selasa', 1, 47, '10:15:00', '12:55:00', 'Jam Ke-5, Jam Ke-8'),
(12, 'Rabu', 1, 47, '07:00:00', '10:00:00', 'Jam Ke-1, Jam Ke-4'),
(13, 'Rabu', 1, 6, '10:15:00', '11:35:00', 'Jam Ke-5, Jam Ke-6'),
(14, 'Rabu', 1, 51, '11:35:00', '12:55:00', 'Jam Ke-7, Jam Ke-8'),
(15, 'Kamis', 1, 19, '07:00:00', '08:30:00', 'Jam Ke-1, Jam Ke-2'),
(16, 'Kamis', 1, 39, '08:30:00', '10:00:00', 'Jam Ke-3, Jam Ke-4'),
(17, 'Kamis', 1, 47, '10:15:00', '12:15:00', 'Jam Ke-5, Jam Ke-7'),
(18, 'Kamis', 1, 34, '12:15:00', '14:00:00', 'Jam Ke-8, Jam Ke-10'),
(19, 'Jumat', 1, 2, '07:00:00', '08:20:00', 'Jam Ke-1, Jam Ke-2'),
(20, 'Jumat', 1, 15, '08:20:00', '09:40:00', 'Jam Ke-3, Jam Ke-4'),
(21, 'Jumat', 1, 17, '09:55:00', '11:15:00', 'Jam Ke-5, Jam Ke-6');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(25) NOT NULL,
  `kodekelas` varchar(255) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `kodekelas`, `kelas`, `keterangan`) VALUES
(1, '10011', 'X TEKNIK KOMPUTER DAN JARINGAN', 'Coba Update'),
(2, '10012', 'X TEKNIK KENDARAAN RINGAN OTOMOTIF', 'Coba'),
(3, '10013', 'X TEKNIK BODI OTOMOTIF', ''),
(4, '10014', 'X TEKNIK BISNIS DAN SEPEDA MOTOR', ''),
(5, '10015', 'X TEKNIK AUDIO VIDEO', ''),
(6, '10021', 'XI TEKNIK KOMPUTER DAN JARINGAN', ''),
(7, '10022', 'XI TEKNIK KENDARAAN RINGAN OTOMOTIF', ''),
(8, '10023', 'XI TEKNIK BODI OTOMOTIF', ''),
(9, '10024', 'XI TEKNIK BISNIS DAN SEPEDA MOTOR', ''),
(10, '10025', 'XI TEKNIK AUDIO VIDEO', ''),
(11, '10031', 'XII TEKNIK KOMPUTER DAN JARINGAN', ''),
(12, '10032', 'XII TEKNIK KENDARAAN RINGAN OTOMOTIF', ''),
(13, '10033', 'XII TEKNIK BODI OTOMOTIF', ''),
(14, '10034', 'XII TEKNIK BISNIS DAN SEPEDA MOTOR', ''),
(15, '10035', 'XII TEKNIK AUDIO VIDEO', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_matapelajaran`
--

CREATE TABLE `tb_matapelajaran` (
  `id_matapelajaran` int(20) NOT NULL,
  `kodematapelajaran` varchar(255) NOT NULL,
  `namamatapelajaran` varchar(255) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_matapelajaran`
--

INSERT INTO `tb_matapelajaran` (`id_matapelajaran`, `kodematapelajaran`, `namamatapelajaran`, `status`) VALUES
(1, '20022', 'Jaringan Komputer', 1),
(2, '20023', 'Database', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id_pegawai` int(20) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp_guru` varchar(20) NOT NULL,
  `email_guru` varchar(100) NOT NULL,
  `golongan` varchar(100) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `id_matapelajaran` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id_pegawai`, `nip`, `nama_pegawai`, `agama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_hp_guru`, `email_guru`, `golongan`, `pendidikan`, `jabatan`, `id_matapelajaran`, `password`, `status`) VALUES
(1, '01', 'Drs. Putut Kustriatmo, M.Pd', '', '', '', '0000-00-00', '', '', '', '', '', 'gurumatapelajaran', '', '81dc9bdb52d04dc20036dbd8313ed055', ''),
(2, '02', 'Elisabet Annatasia, S.Pd, M.M.', '', '', '', '0000-00-00', '', '', '', '', '', 'gurumatapelajaran', '2', '', ''),
(3, '03', 'Joko Slamet Prasetya, S.Pd. MPd', '', '', '', '0000-00-00', '', '', '', '', '', 'gurumatapelajaran', '3', '', ''),
(4, '04', 'Drs. Susanto Dwi Mulyono', '', '', '', '0000-00-00', '', '', '', '', '', 'gurumatapelajaran', '4', '', ''),
(5, '05', 'Dra. Supriati', '', '', '', '0000-00-00', '', '', '', '', '', 'gurumatapelajaran', '5', '', ''),
(6, '06', 'Dra. Retno Wresti Kristianti', '', '', '', '0000-00-00', '', '', '', '', '', 'gurumatapelajaran', '6', '', ''),
(7, '07', 'Sugeng Hatmaka,S.Pd', '', '', '', '0000-00-00', '', '', '', '', '', 'gurumatapelajaran', '7', '', ''),
(8, '08', 'Sulistyo Nurdijati Atmaja, S.Pd', '', '', '', '0000-00-00', '', '', '', '', '', 'gurumatapelajaran', '8', '', ''),
(9, '09', 'Abraham Tri Wibowo, S.Pd.T', '', '', '', '0000-00-00', '', '', '', '', '', 'gurumatapelajaran', '9', '', ''),
(10, '10', 'Tri Wahyudi, S.Pd', '', '', '', '0000-00-00', '', '', '', '', '', 'gurumatapelajaran', '10', '', ''),
(11, '11', 'Ig. Dwi Inpreswanto,ST', '', '', '', '0000-00-00', '', '', '', '', '', 'gurumatapelajaran', '11', '', ''),
(12, '12', 'Y. Sri Handoko, S.PAK', '', '', '', '0000-00-00', '', '', '', '', '', 'gurumatapelajaran', '12', '', ''),
(13, '13', 'Tulus Raharjo, S.Pd', '', '', '', '0000-00-00', '', '', '', '', '', 'gurumatapelajaran', '13', '', ''),
(15, '15', 'Tiwi Kristianti, S.Pd', '', '', '', '0000-00-00', '', '', '', '', '', 'gurumatapelajaran', '15', '', ''),
(16, '16', 'Yuli Porwaningsih, S.S', '', '', '', '0000-00-00', '', '', '', '', '', 'gurumatapelajaran', '4', '', ''),
(17, '17', 'Ika Mustikawati, S.S', '', '', '', '0000-00-00', '', '', '', '', '', 'gurumatapelajaran', '17', '', ''),
(19, '19', 'YF Wahyuni, S.Pd', '', '', '', '0000-00-00', '', '', '', '', '', 'gurumatapelajaran', '19', '', ''),
(22, '22', 'Agustin Tri Susilowati, S.Psi.', '', '', '', '0000-00-00', '', '', '', '', '', 'gurumatapelajaran', '22', '', ''),
(34, '34', 'Bernadinus Arif Dwi Nugraha, S.Pd', '', '', '', '0000-00-00', '', '', '', '', '', 'gurumatapelajaran', '34', '', ''),
(36, '36', 'Fabianus Candra Kurniawan, S.Pd', '', '', '', '0000-00-00', '', '', '', '', '', 'gurumatapelajaran', '36', '', ''),
(39, '39', 'Juliningsih Eko Saputro, S.Pd', '', '', '', '0000-00-00', '', '', '', '', '', 'gurumatapelajaran', '39', '', ''),
(43, '43', 'Tuhu Suseno, S.Pd', '', '', '', '0000-00-00', '', '', '', '', '', 'gurumatapelajaran', '43', '', ''),
(47, '47', 'Filipus Ryan Prasetya A.S, S.Kom', '', '', '', '0000-00-00', '', '', '', '', '', 'gurumatapelajaran', '47', '', ''),
(51, 'AG01', 'Guru Agama', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', ''),
(99, '1111', 'Sinung Agung Cahyono', 'Kristen Protestan', 'Laki-laki', 'Tangerang', '2021-11-30', 'Puri', '08192010292', 'sinung@gmail.com', 'Golongan III/a', 'Sarjana 1', 'tatausaha', '1', 'b59c67bf196a4758191e42f76670ceba', '1'),
(100, '2222', 'Sinung Purnama Aji Saputra', 'Kristen Protestan', 'Laki-laki', 'Tangerang', '1999-03-08', 'Puri serpong', '9213032103', 'sinungpurnama@ti.ukdw.ac.id', 'Golongan III/a', 'Sarjana 1', 'kepalasekolah', '2', '49f4402396fd18bac8e690b4f9ab1878', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_presensi`
--

CREATE TABLE `tb_presensi` (
  `id_presensi` int(25) NOT NULL,
  `tanggal_presensi` date NOT NULL,
  `id_siswa` varchar(255) NOT NULL,
  `id_jadwal` varchar(100) NOT NULL,
  `kehadiran` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_scanlog`
--

CREATE TABLE `tb_scanlog` (
  `sn` text NOT NULL,
  `scan_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pin` text NOT NULL,
  `verifymode` int(11) NOT NULL,
  `iomode` int(11) NOT NULL,
  `workcode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_scanlog`
--

INSERT INTO `tb_scanlog` (`sn`, `scan_date`, `pin`, `verifymode`, `iomode`, `workcode`) VALUES
('2014102200009', '2016-10-31 07:02:27', '1', 1, 0, 0),
('2014102200009', '2016-10-31 07:02:34', '2', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_semester`
--

CREATE TABLE `tb_semester` (
  `id_semester` int(11) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `id_tahun_ajaran` varchar(255) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_semester`
--

INSERT INTO `tb_semester` (`id_semester`, `semester`, `id_tahun_ajaran`, `status`) VALUES
(1, 'Ganjil', '1', 1),
(2, 'Genap', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nomor_induk_siswa` varchar(255) DEFAULT NULL,
  `nama_siswa` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `nomor_hp_siswa` varchar(20) DEFAULT NULL,
  `email_siswa` varchar(255) DEFAULT NULL,
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
  `id_kelas` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nomor_induk_siswa`, `nama_siswa`, `tempat_lahir`, `tanggal_lahir`, `nomor_hp_siswa`, `email_siswa`, `alamat_tinggal`, `agama`, `golongan_darah`, `jenis_kelamin`, `kewarganegaraan`, `tahun_masuk`, `nomor_hp_orangtua`, `nama_ayah`, `pekerjaan_ayah`, `nama_ibu`, `pekerjaan_ibu`, `id_kelas`) VALUES
(1, '71170214', 'Sinung Purnama Aji Saputra', 'Tangerang Selatan', '1999-08-30', '081229301341', 'sinung.purnama@ti.ukdw.ac.id', 'Jl. Dr. Wahidin Sudirohusodo No.5-25, Kotabaru, Kec. Gondokusuman, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55224', 'Kristen Protestan', 'B', 'Laki - laki', 'WNI', '2023-05-17', '081229301341', 'Sukisno', 'Bengkel', 'Tumiyem', 'Ibu Rumah Tangga', '15'),
(2, '72201920', 'Jefrison Banni', 'Dumai', '2023-05-17', '12432143', 'jeki@gmail.com', 'dumai', 'Kristen Protestan', 'B', 'Laki - laki', 'WNI', '1999-07-01', '', '', '', '', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_status`
--

INSERT INTO `tb_status` (`id_status`, `status`) VALUES
(0, 'Tidak Aktif'),
(1, 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tahunajaran`
--

CREATE TABLE `tb_tahunajaran` (
  `id_tahun_ajaran` int(100) NOT NULL,
  `tahunajaran` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tahunajaran`
--

INSERT INTO `tb_tahunajaran` (`id_tahun_ajaran`, `tahunajaran`, `status`) VALUES
(1, '2020/2021', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_template`
--

CREATE TABLE `tb_template` (
  `pin` text NOT NULL,
  `finger_idx` int(11) NOT NULL,
  `alg_ver` int(11) NOT NULL,
  `template` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_template`
--

INSERT INTO `tb_template` (`pin`, `finger_idx`, `alg_ver`, `template`) VALUES
('1', 0, 19, '04:13:0F:00:95:E2:87:14:83:07:00:00:49:7B:88:20:03:06:00:00:51:63:87:21:45:07:00:00:BD:BB:86:29:46:07:00:00:59:6A:89:17:83:07:00:00:0D:5C:89:2C:82:06:00:00:51:3C:88:2E:03:07:00:00:A9:DC:88:A8:03:06:00:00:6D:3A:87:83:03:C8:0C:00:F1:D2:85:06:08:76:0C:00:E6:9C:87:43:89:D8:0C:00:1A:3D:86:B7:05:D6:0C:00:1D:75:86:42:04:D5:0C:00:9A:2D:8A:9C:92:D8:0C:00:DE:D3:89:9D:04:C6:0C:00:9A:9D:8A:96:92:6A:FA:8F:A9:45:89:9C:09:A7:FF:0F:DA:4D:8A:96:09:08:00:10:E1:C5:8A:0B:09:1A:00:10:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:57:32:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:E0:32:'),
('1', 1, 19, '04:20:10:00:71:92:E8:81:02:C6:0E:00:E5:12:E8:09:03:26:60:EC:31:6B:E9:83:C2:35:60:02:79:C3:A6:6D:47:26:5C:03:8D:1B:EA:16:85:76:64:C2:BD:7B:85:5F:86:06:00:00:C6:5B:E8:7D:05:57:68:47:0D:DC:E6:67:C7:57:70:85:31:CC:E8:82:88:79:7C:05:29:54:E9:1B:87:89:98:C7:3D:44:85:51:0A:07:00:00:65:4C:E7:5A:8C:79:98:88:8D:04:B6:4D:88:C7:98:87:AD:74:E7:48:12:89:78:8C:BE:4C:99:95:CD:2B:91:88:C5:2C:E6:45:88:D6:BC:12:CD:B4:A9:35:CA:8A:68:CD:51:15:E7:36:46:A9:AC:88:21:1C:85:D6:0C:08:00:00:05:05:EB:3C:45:68:94:CA:0D:C2:B8:83:C2:56:84:46:B5:B5:85:B4:85:06:00:00:CA:25:B7:2B:46:57:80:86:35:0A:B7:7C:84:28:6C:45:31:1A:B8:09:01:46:88:C2:29:83:84:E4:02:77:0C:00:6E:63:84:65:09:98:0C:00:A5:DB:84:E1:87:B7:0C:00:35:44:84:4F:87:58:0C:00:5E:8C:84:CC:02:27:FF:9F:D2:4C:AB:38:C9:69:74:05:99:95:7B:44:84:18:60:84:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:64:6D:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:35:6E:'),
('2', 0, 19, '04:1C:10:00:4D:EA:89:05:44:07:00:00:6D:EA:88:04:45:06:00:00:AD:C2:89:7F:C2:06:00:00:BD:F2:B7:EB:C4:07:14:00:25:6B:B8:04:86:46:7C:40:AD:1B:B8:6F:07:67:68:C4:BD:73:89:7C:C6:06:00:00:C1:83:B7:E8:C5:77:70:86:CD:0B:89:07:46:06:00:00:E6:13:B8:01:08:57:7C:07:F5:D3:89:14:85:07:00:00:11:C4:8A:1D:C4:06:00:00:21:74:8A:8B:C4:06:00:00:4E:BC:B5:D4:46:89:70:C5:46:14:8A:19:43:08:00:00:59:5B:8A:12:C3:06:00:00:C5:03:B5:55:45:67:94:08:21:A2:B7:E6:04:58:74:46:3D:FA:88:77:83:07:00:00:B6:0A:8B:83:42:09:00:00:B9:6C:85:3E:C8:09:00:00:A9:94:8A:27:08:07:00:00:69:F4:84:C9:07:87:EF:8F:55:BD:8A:33:04:19:00:10:AD:E5:89:3E:03:18:00:10:CA:5D:8A:3B:03:17:00:10:41:CC:42:CD:08:3A:08:00:95:8C:44:4F:83:77:08:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:C2:4E:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:D2:4F:');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `email_admin` varchar(255) NOT NULL,
  `foto_admin` varchar(255) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `level`, `email_admin`, `foto_admin`, `status`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'admin', 'admin@gmail.com', '', 1),
(2, 'admintes', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', 'admin1@gmail.com', 'test.jpg', 1),
(3, 'admin123', 'ec6a6536ca304edf844d1d248a4f08dc', 'admin', 'admin1234@gmail.com', 'apa.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_device`
--
ALTER TABLE `tb_device`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_matapelajaran`
--
ALTER TABLE `tb_matapelajaran`
  ADD PRIMARY KEY (`id_matapelajaran`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `tb_presensi`
--
ALTER TABLE `tb_presensi`
  ADD PRIMARY KEY (`id_presensi`);

--
-- Indexes for table `tb_semester`
--
ALTER TABLE `tb_semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tb_tahunajaran`
--
ALTER TABLE `tb_tahunajaran`
  ADD PRIMARY KEY (`id_tahun_ajaran`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_device`
--
ALTER TABLE `tb_device`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id_jadwal` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_matapelajaran`
--
ALTER TABLE `tb_matapelajaran`
  MODIFY `id_matapelajaran` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id_pegawai` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_presensi`
--
ALTER TABLE `tb_presensi`
  MODIFY `id_presensi` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_semester`
--
ALTER TABLE `tb_semester`
  MODIFY `id_semester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_tahunajaran`
--
ALTER TABLE `tb_tahunajaran`
  MODIFY `id_tahun_ajaran` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
