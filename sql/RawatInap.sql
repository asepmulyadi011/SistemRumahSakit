-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11 Mar 2016 pada 08.05
-- Versi Server: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rsmh`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_ulang_irj`
--

CREATE TABLE IF NOT EXISTS `daftar_ulang_irj` (
  `no_register` varchar(10) NOT NULL DEFAULT '',
  `no_medrec` varchar(10) DEFAULT NULL,
  `tgl_kunjungan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jns_kunj` varchar(10) DEFAULT NULL,
  `ublnrj` int(11) DEFAULT '0',
  `uharirj` int(11) DEFAULT '0',
  `umurrj` int(11) DEFAULT '0',
  `cara_kunj` varchar(50) DEFAULT NULL,
  `asal_rujukan` varchar(100) DEFAULT NULL,
  `no_rujukan` varchar(20) DEFAULT NULL,
  `kelas_pasien` varchar(10) DEFAULT NULL,
  `cara_bayar` varchar(50) DEFAULT NULL,
  `id_kontraktor` varchar(10) DEFAULT NULL,
  `id_poli` varchar(5) DEFAULT NULL,
  `kd_ruang` varchar(10) DEFAULT NULL,
  `biayadaftar` int(11) DEFAULT '0',
  `nama_penjamin` varchar(100) DEFAULT NULL,
  `hubungan` varchar(100) DEFAULT NULL,
  `vtot` int(11) DEFAULT '0',
  `status` char(1) DEFAULT '0',
  `tgl_pulang` date DEFAULT NULL,
  `ket_pulang` varchar(50) DEFAULT NULL,
  `no_sep` varchar(20) DEFAULT NULL,
  `cetak_kwitansi` char(1) DEFAULT '0',
  `ket_tambahan` varchar(50) DEFAULT NULL,
  `xupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `xuser` varchar(100) DEFAULT NULL,
  `xterminal` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `daftar_ulang_irj`
--

INSERT INTO `daftar_ulang_irj` (`no_register`, `no_medrec`, `tgl_kunjungan`, `jns_kunj`, `ublnrj`, `uharirj`, `umurrj`, `cara_kunj`, `asal_rujukan`, `no_rujukan`, `kelas_pasien`, `cara_bayar`, `id_kontraktor`, `id_poli`, `kd_ruang`, `biayadaftar`, `nama_penjamin`, `hubungan`, `vtot`, `status`, `tgl_pulang`, `ket_pulang`, `no_sep`, `cetak_kwitansi`, `ket_tambahan`, `xupdate`, `xuser`, `xterminal`) VALUES
('RJ16000001', '0000000001', '2016-03-10 20:11:28', 'BARU', 6, 13, 37, 'DIKIRIM DOKTER', '', '', 'III', 'ASKIN', '', 'BB04', 'B2.05', 8000, 'Agus', 'Ayah', 8000, '0', NULL, NULL, '', '0', NULL, '2016-03-10 20:14:57', NULL, NULL),
('RJ16000002', '0000000002', '2016-03-10 20:12:20', 'BARU', 7, 0, 57, 'RUJUKAN POLI', 'Puskesmas', '1200000', 'VIP', 'UMUM LUAR', '', 'BB05', 'B2.06', 3000, 'Aminah', 'Ibu', 3000, '0', NULL, NULL, '', '0', NULL, '2016-03-10 20:12:20', NULL, NULL),
('RJ16000003', '0000000007', '2016-03-10 20:13:05', 'BARU', 10, 3, 17, 'RUJUKAN PUSKESMAS', 'RSUD', '110000000', 'III', 'ASKES MANDIRI', '', 'BA00', 'B2.03', 2000, 'Brad Pitt', 'Paman', 2000, '0', NULL, NULL, '', '0', NULL, '2016-03-10 20:13:05', NULL, NULL),
('RJ16000004', '0000000012', '2016-03-10 20:13:54', 'BARU', 5, 28, 16, 'KONSUL RAWAT JALAN', 'Klinik Mandiri', '18000000', 'III', 'ASKES MANDIRI', '', 'BB07', 'B2.10', 2000, 'Angelina', 'Bibi', 2000, '0', NULL, NULL, '', '0', NULL, '2016-03-10 20:13:54', NULL, NULL),
('RJ16000005', '0000000006', '2016-03-10 20:14:47', 'BARU', 4, 23, 50, 'PASIEN LUAR RSMH', 'RSUD', '34000000', 'I', 'ASKES', '', 'BD04', 'B3.04', 10000, 'Mira', 'Ibu', 10000, '0', NULL, NULL, '', '0', NULL, '2016-03-10 20:14:47', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pasien`
--

CREATE TABLE IF NOT EXISTS `data_pasien` (
  `no_medrec` varchar(10) NOT NULL DEFAULT '',
  `jenis_identitas` varchar(10) DEFAULT NULL,
  `no_identitas` varchar(20) DEFAULT NULL,
  `jenis_kartu` varchar(10) DEFAULT NULL,
  `no_kartu` varchar(20) DEFAULT NULL,
  `tgl_daftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nama` varchar(100) DEFAULT NULL,
  `sex` char(1) DEFAULT NULL,
  `tmpt_lahir` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `agama` varchar(10) DEFAULT NULL,
  `wnegara` varchar(10) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `rt` varchar(5) DEFAULT NULL,
  `rw` varchar(5) DEFAULT NULL,
  `id_kelurahandesa` varchar(10) DEFAULT NULL,
  `kelurahandesa` varchar(100) DEFAULT NULL,
  `id_kecamatan` varchar(7) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `id_kotakabupaten` varchar(4) DEFAULT NULL,
  `kotakabupaten` varchar(100) DEFAULT NULL,
  `id_provinsi` varchar(2) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `kodepos` varchar(10) DEFAULT NULL,
  `pendidikan` varchar(20) DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `no_telp_kantor` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `goldarah` varchar(2) DEFAULT NULL,
  `bahasa` varchar(50) DEFAULT NULL,
  `sukubangsa` varchar(50) DEFAULT NULL,
  `nm_ayah_suami` varchar(100) DEFAULT NULL,
  `pekerjaan_ayah_suami` varchar(100) DEFAULT NULL,
  `nm_ibu_istri` varchar(100) DEFAULT NULL,
  `pekerjaan_ibu_istri` varchar(100) DEFAULT NULL,
  `kartusdhdicetak` char(1) DEFAULT '0',
  `tglcetakkartu` date DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `xupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `xuser` varchar(100) DEFAULT NULL,
  `xterminal` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_pasien`
--

INSERT INTO `data_pasien` (`no_medrec`, `jenis_identitas`, `no_identitas`, `jenis_kartu`, `no_kartu`, `tgl_daftar`, `nama`, `sex`, `tmpt_lahir`, `tgl_lahir`, `agama`, `wnegara`, `status`, `alamat`, `rt`, `rw`, `id_kelurahandesa`, `kelurahandesa`, `id_kecamatan`, `kecamatan`, `id_kotakabupaten`, `kotakabupaten`, `id_provinsi`, `provinsi`, `kodepos`, `pendidikan`, `pekerjaan`, `no_telp`, `no_hp`, `no_telp_kantor`, `email`, `goldarah`, `bahasa`, `sukubangsa`, `nm_ayah_suami`, `pekerjaan_ayah_suami`, `nm_ibu_istri`, `pekerjaan_ibu_istri`, `kartusdhdicetak`, `tglcetakkartu`, `foto`, `xupdate`, `xuser`, `xterminal`) VALUES
('0000000001', 'KTP', '1671044909780000', 'BPJS', '0000026976025', '2016-03-11 03:30:49', 'ANIS SYAWALI', 'P', 'PALEMBANG', '1978-09-09', 'ISLAM', 'WNI', 'K', 'Soekarno Hatta 1', '1', '15', '1112030007', 'GEULUMPANG PAYONG', '1112030', 'BLANG PIDIE', '1112', 'KABUPATEN ACEH BARAT DAYA', '11', 'ACEH', '30001', 'SMA', 'PNS', '0221234567', '081234567890', '00211000000', 'anis@gmail.com', 'A', '', '', '', '', 'Anisa', '', '1', NULL, 'pasien_irj1.png', '2016-03-11 03:30:49', '', ''),
('0000000002', 'KTP', '1671076808580000', 'BPJS', '0000026976014', '2016-03-11 03:30:49', 'ANGGRAINI DEWI', 'P', 'PALEMBANG', '1958-08-28', 'ISLAM', 'WNI', 'K', 'Soekarno Hatta 2', '2', '14', '6405040001', 'PEGAT', '6405040', 'PULAU DERAWAN', '6405', 'KABUPATEN BERAU', '64', 'KALIMANTAN TIMUR', '30002', 'SD', 'Pelajar', '0221234568', '081234567890', '00211000001', 'anggraini@gmail.com', 'B', '', '', '', '', 'Aminah', '', '0', NULL, 'pasien_irj2.png', '2016-03-11 03:30:49', '', ''),
('0000000003', 'KTP', '1671074804010010', 'BPJS', '0000026975992', '2016-03-11 03:30:49', 'NADIA APRIYANI', 'P', 'PALEMBANG', '2001-04-08', 'ISLAM', 'WNI', 'K', 'Soekarno Hatta 3', '3', '13', '3171070003', 'TEGAL PARANG', '3171070', 'MAMPANG PRAPATAN', '3171', 'KOTA JAKARTA SELATAN', '31', 'DKI JAKARTA', '30003', 'S2', 'Dokter', '0221234569', '081234567890', '00211000002', 'nadia@gmail.com', 'AB', '', '', '', '', 'Anggun', '', '1', NULL, 'pasien_irj3.png', '2016-03-11 03:30:49', '', ''),
('0000000004', 'KTP', '1671075708990010', 'BPJS', '0000026975981', '2016-03-11 03:30:49', 'NURAINI FITRIYAH', 'P', 'PALEMBANG', '1999-08-17', 'ISLAM', 'WNI', 'K', 'Soekarno Hatta 4', '4', '12', '3401100006', 'KEMBANG', '3401100', 'NANGGULAN', '3401', 'KABUPATEN KULON PROGO', '34', 'DI YOGYAKARTA', '30004', 'S1', 'Guru', '0221234570', '081234567890', '00211000003', 'nuraini@gmail.com', 'O', '', '', '', '', 'Beta', '', '0', NULL, 'pasien_irj4.png', '2016-03-11 03:30:49', '', ''),
('0000000005', 'KTP', '1671072906710000', 'BPJS', '0000026975968', '2016-03-11 03:30:49', 'ANDRY MAYANTO', 'L', 'PALEMBANG', '1971-06-29', 'ISLAM', 'WNI', 'K', 'Soekarno Hatta 5', '5', '11', '3601050001', 'BANYUASIH', '3601050', 'CIGEULIS', '3601', 'KABUPATEN PANDEGLANG', '36', 'BANTEN', '30005', 'S2', 'Insinyur', '0221234571', '081234567890', '00211000004', 'andry@gmail.com', 'A', '', '', '', '', 'Sari', '', '1', NULL, 'unknown.png', '2016-03-11 03:30:49', '', ''),
('0000000006', 'KTP', '1607100111650000', 'BPJS', '0000026975924', '2016-03-11 03:30:49', 'ANDI SUPARNO', 'L', 'PALEMBANG', '1965-11-01', 'ISLAM', 'WNI', 'K', 'Soekarno Hatta 6', '6', '10', '3404160004', 'PAKEM BINANGUN', '3404160', 'PAKEM', '3404', 'KABUPATEN SLEMAN', '34', 'DI YOGYAKARTA', '30006', 'S3', 'Dosen', '0221234572', '081234567890', '00211000005', 'andi@gmail.com', 'B', '', '', '', '', 'Mira', '', '0', NULL, 'unknown.png', '2016-03-11 03:30:49', '', ''),
('0000000007', 'KTP', '1671091705980000', 'BPJS', '0000026975834', '2016-03-11 03:30:49', 'M.REDO AMIN PRATAMA', 'L', 'PALEMBANG', '1998-05-17', 'ISLAM', 'WNI', 'K', 'Soekarno Hatta 7', '7', '9', '6504150004', 'BUKIT HARAPAN', '6504150', 'SEBATIK TENGAH', '6504', 'KABUPATEN NUNUKAN', '65', 'KALIMANTAN UTARA', '30007', 'SMA', 'PNS', '0221234573', '081234567890', '00211000006', 'redo@gmail.com', 'AB', '', '', '', '', 'Alisa', '', '1', NULL, 'unknown.png', '2016-03-11 03:30:49', '', ''),
('0000000008', 'KTP', '1671090709610000', 'BPJS', '0000026975766', '2016-03-11 03:30:49', 'AMINUDDIN', 'L', 'PALEMBANG', '1961-09-07', 'ISLAM', 'WNI', 'K', 'Soekarno Hatta 8', '8', '8', '3404070002', 'MAGUWOHARJO', '3404070', 'DEPOK', '3404', 'KABUPATEN SLEMAN', '34', 'DI YOGYAKARTA', '30008', 'S1', 'Peg BUMN', '0221234574', '081234567890', '00211000007', 'aminuddin@gmail.com', 'O', '', '', '', '', 'Elise', '', '0', NULL, 'unknown.png', '2016-03-11 03:30:49', '', ''),
('0000000009', 'KTP', '1671105887368020', 'BPJS', '0000026975744', '2016-03-11 03:30:49', 'AMINAH', 'P', 'PALEMBANG', '1968-12-11', 'ISLAM', 'WNI', 'K', 'Soekarno Hatta 9', '9', '7', '1703054006', 'LUBUK PENDAM', '1703054', 'TANJUNG AGUNG PALIK', '1703', 'KABUPATEN BENGKULU UTARA', '17', 'BENGKULU', '30009', 'S2', 'Dokter', '0221234575', '081234567890', '00211000008', 'aminah@gmail.com', 'A', '', '', '', '', 'Angelina', '', '1', NULL, 'unknown.png', '2016-03-11 03:30:49', '', ''),
('0000000010', 'KTP', '1601141706070000', 'BPJS', '0001960815881', '2016-03-11 03:30:49', 'AL RASYA JUANDA PRATAMA', 'L', 'PALEMBANG', '2007-06-17', 'ISLAM', 'WNI', 'K', 'Soekarno Hatta 10', '10', '6', '3173020002', 'PEGANGSAAN', '3173020', 'MENTENG', '3173', 'KOTA JAKARTA PUSAT', '31', 'DKI JAKARTA', '30010', 'S1', 'Guru', '0221234576', '081234567890', '00211000009', 'rasya@gmail.com', 'B', '', '', '', '', 'Putri', '', '0', NULL, 'unknown.png', '2016-03-11 03:30:49', '', ''),
('0000000011', 'KTP', '1671144912150000', 'BPJS', '0001960174372', '2016-03-11 03:30:49', 'KEYSHA AZZAHRA', 'P', 'PALEMBANG', '2015-12-09', 'ISLAM', 'WNI', 'K', 'Soekarno Hatta 11', '11', '5', '3171020007', 'PEJATEN TIMUR', '3171020', 'PASAR MINGGU', '3171', 'KOTA JAKARTA SELATAN', '31', 'DKI JAKARTA', '30011', 'S3', 'Insinyur', '0221234577', '081234567890', '00211000010', 'keysha@gmail.com', 'AB', '', '', '', '', 'Sari', '', '0', NULL, 'unknown.png', '2016-03-11 03:30:49', '', ''),
('0000000012', 'KTP', '1671071909990010', 'BPJS', '0001959576309', '2016-03-11 03:30:49', 'DIKI ANWARI', 'L', 'PALEMBANG', '1999-09-19', 'ISLAM', 'WNI', 'K', 'Soekarno Hatta 12', '12', '4', '3171080004', 'PANCORAN', '3171080', 'PANCORAN', '3171', 'KOTA JAKARTA SELATAN', '31', 'DKI JAKARTA', '30012', 'S1', 'Peg BUMN', '0221234578', '081234567890', '00211000011', 'diki@gmail.com', 'O', '', '', '', '', 'Kartika', '', '0', NULL, 'unknown.png', '2016-03-11 03:30:49', '', ''),
('0000000013', 'KTP', '1671082911150000', 'BPJS', '0001907797781', '2016-03-11 03:30:49', 'TSANY ABQORY RAJENDRA', 'L', 'PALEMBANG', '2015-11-29', 'ISLAM', 'WNI', 'K', 'Soekarno Hatta 13', '13', '3', '', 'undefined', '1507011', 'MERLUNG', '1507', 'KABUPATEN TANJUNG JABUNG BARAT', '15', 'JAMBI', '30013', 'SMA', 'PNS', '0221234579', '081234567890', '00211000012', 'tsany@gmail.com', 'A', '', '', '', '', 'Dyah', '', '1', NULL, 'unknown.png', '2016-03-11 03:30:49', '', ''),
('0000000014', 'KTP', '1871111801910000', 'BPJS', '0001226510335', '2016-03-11 03:30:49', 'GILANG BINA PRIAWAN', 'L', 'PALEMBANG', '1991-01-18', 'ISLAM', 'WNI', 'K', 'Soekarno Hatta 14', '14', '2', '3171070003', 'TEGAL PARANG', '3171070', 'MAMPANG PRAPATAN', '3171', 'KOTA JAKARTA SELATAN', '31', 'DKI JAKARTA', '30014', 'SD', 'Kasir', '0221234580', '081234567890', '00211000013', 'gilang@gmail.com', 'B', '', '', '', '', 'Nura', '', '0', NULL, 'unknown.png', '2016-03-11 03:30:49', '', ''),
('0000000015', 'KTP', '1671111909740000', 'BPJS', '0000172428669', '2016-03-11 03:30:49', 'MUHAMAD SOLIHIN', 'L', 'PALEMBANG', '1974-09-19', 'ISLAM', 'WNI', 'K', 'Soekarno Hatta 15', '15', '1', '3404040007', 'SIDOMOYO', '3404040', 'GODEAN', '3404', 'KABUPATEN SLEMAN', '34', 'DI YOGYAKARTA', '30015', 'S3', 'Dokter', '0221234581', '081234567890', '00211000014', 'solihin@gmail.com', 'AB', '', '', '', '', 'Fenti', '', '1', NULL, 'unknown.png', '2016-03-11 03:30:49', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `irna_antrian`
--

CREATE TABLE IF NOT EXISTS `irna_antrian` (
  `noreservasi` varchar(20) NOT NULL,
  `ruangpilih` varchar(10) DEFAULT NULL,
  `no_cm` varchar(10) DEFAULT NULL,
  `tglreserv` date DEFAULT NULL,
  `bed` int(11) DEFAULT NULL,
  `confirm` char(1) DEFAULT NULL,
  `lewat` varchar(7) DEFAULT NULL,
  `batal` char(1) DEFAULT NULL,
  `kelas` varchar(7) DEFAULT NULL,
  `poliasal` varchar(50) DEFAULT NULL,
  `dokter` varchar(10) DEFAULT NULL,
  `diagnosa` varchar(100) DEFAULT NULL,
  `tglrencanamasuk` date DEFAULT NULL,
  `tglsprawat` date DEFAULT NULL,
  `prioritas` varchar(20) DEFAULT NULL,
  `statusantrian` char(1) DEFAULT NULL,
  `bed_approve` varchar(10) DEFAULT NULL,
  `tgl_approve` date DEFAULT NULL,
  `jam_approve` varchar(5) DEFAULT NULL,
  `user_approve` varchar(25) DEFAULT NULL,
  `tgl_finish` date DEFAULT NULL,
  `jam_finis` varchar(5) DEFAULT NULL,
  `user_finish` varchar(25) DEFAULT NULL,
  `no_register` varchar(10) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `kelas_approve` varchar(7) DEFAULT NULL,
  `ruang_approve` varchar(10) DEFAULT NULL,
  `tppri` varchar(30) DEFAULT NULL,
  `telp` varchar(30) DEFAULT NULL,
  `hp` varchar(30) DEFAULT NULL,
  `id_poli` varchar(4) DEFAULT NULL,
  `id_dokter` varchar(10) DEFAULT NULL,
  `no_register_asal` varchar(10) DEFAULT NULL,
  `rujukan` varchar(30) DEFAULT NULL,
  `alasan_batal` varchar(50) DEFAULT NULL,
  `infeksi` char(1) DEFAULT NULL,
  `pilihan_prioritas` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `irna_antrian`
--

INSERT INTO `irna_antrian` (`noreservasi`, `ruangpilih`, `no_cm`, `tglreserv`, `bed`, `confirm`, `lewat`, `batal`, `kelas`, `poliasal`, `dokter`, `diagnosa`, `tglrencanamasuk`, `tglsprawat`, `prioritas`, `statusantrian`, `bed_approve`, `tgl_approve`, `jam_approve`, `user_approve`, `tgl_finish`, `jam_finis`, `user_finish`, `no_register`, `keterangan`, `kelas_approve`, `ruang_approve`, `tppri`, `telp`, `hp`, `id_poli`, `id_dokter`, `no_register_asal`, `rujukan`, `alasan_batal`, `infeksi`, `pilihan_prioritas`) VALUES
('20160310-1', '201', '0000000001', '2016-03-10', NULL, NULL, NULL, 'N', 'II', 'Klinik Mata Terpadu', 'Mila Pradi', 'Penyakit Maag!', '2016-03-01', '2016-03-02', 'high', 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sakit Parah', NULL, NULL, 'rawatjalan', '(021) 234567', '085624652525', 'BH01', 'DK00000001', 'RJ00000001', 'regional', NULL, 'Y', 'KEMO'),
('20160310-2', '201', '0000000001', '2016-03-10', NULL, NULL, NULL, 'N', 'II', 'Klinik Mata Terpadu', 'Mila Pradi', 'Penyakit Maag!', '2016-03-01', '2016-03-09', 'high', 'N', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sakit', NULL, NULL, 'rawatjalan', '(021) 234567', '085624652525', 'BH01', 'DK00000001', 'RJ00000001', 'regional', NULL, 'Y', 'KEMO'),
('20160311-1', '104', '0000000001', '2016-03-11', NULL, NULL, NULL, 'N', 'II', '-', '-', '-', '2016-03-01', '2016-03-02', 'high', 'N', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sakit Parah', NULL, NULL, 'ruangrawat', '-', '-', '-', '-', 'RI00000001', 'regional', NULL, 'Y', 'IRD');

-- --------------------------------------------------------

--
-- Struktur dari tabel `irna_sliptindakan`
--

CREATE TABLE IF NOT EXISTS `irna_sliptindakan` (
  `noslipt` varchar(12) NOT NULL,
  `tglslipt` date DEFAULT NULL,
  `tglrealt` date DEFAULT NULL,
  `byumum` int(14) DEFAULT NULL,
  `bydijamin` int(14) DEFAULT NULL,
  `bycshare` int(14) DEFAULT NULL,
  `bypaket` int(14) DEFAULT NULL,
  `kelompok` varchar(5) DEFAULT NULL,
  `dokter` varchar(11) DEFAULT NULL,
  `no_ipd` char(10) DEFAULT NULL,
  `idrg` char(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien_ird`
--

CREATE TABLE IF NOT EXISTS `pasien_ird` (
  `no_reg` varchar(11) NOT NULL,
  `no_cm` varchar(11) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `jenis_kelamin` char(1) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `hp` varchar(15) DEFAULT NULL,
  `id_dokter` varchar(11) DEFAULT NULL,
  `dokter` varchar(30) DEFAULT NULL,
  `diagnosa` varchar(50) DEFAULT NULL,
  `id_poli` varchar(10) DEFAULT NULL,
  `poliasal` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien_ird`
--

INSERT INTO `pasien_ird` (`no_reg`, `no_cm`, `nama`, `jenis_kelamin`, `tanggal_lahir`, `telp`, `hp`, `id_dokter`, `dokter`, `diagnosa`, `id_poli`, `poliasal`) VALUES
('RD00000001', '0000000001', 'Asep Mulyadi', 'L', '1993-08-24', '(021) 234567', '085624652525', 'DK00000001', 'Mila Pradini', 'Penyakit Maag!', 'BH01', 'Klinik Mata Terpadu'),
('RD00000002', '0000000002', 'Aksan Maulana', 'L', '1993-03-24', '(021) 234568', '085624652536', 'DK00000002', 'Ahmad Ramdani', 'Penyakit Kulit!', 'BH01', 'Klinik Mata Terpadu'),
('RD00000003', '0000000003', 'Iip', 'L', '1993-05-24', '(021) 234569', '085624652547', 'DK00000003', 'Tommy Putra', 'Penyakit Flu!', 'BH01', 'Klinik Mata Terpadu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien_iri`
--

CREATE TABLE IF NOT EXISTS `pasien_iri` (
  `no_ipd` varchar(10) NOT NULL,
  `idrg` varchar(3) DEFAULT NULL,
  `tgldaftarri` date DEFAULT NULL,
  `no_cm` varchar(10) DEFAULT NULL,
  `noregasal` varchar(10) DEFAULT NULL,
  `id_smf` varchar(4) DEFAULT NULL,
  `procmasuk` varchar(3) DEFAULT NULL,
  `carabayar` varchar(15) DEFAULT NULL,
  `umurri` int(3) DEFAULT NULL,
  `ublniri` int(2) DEFAULT NULL,
  `uhariiri` int(2) DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `triwulan` int(1) DEFAULT NULL,
  `klsiri` varchar(7) DEFAULT NULL,
  `nopembayarri` varchar(30) DEFAULT NULL,
  `id_kontraktor` varchar(3) DEFAULT NULL,
  `nmpembayatri` varchar(30) DEFAULT NULL,
  `ketpembayarri` varchar(15) DEFAULT NULL,
  `golpembayarri` varchar(5) DEFAULT NULL,
  `nmpjawabri` varchar(30) DEFAULT NULL,
  `alamatpjawabri` varchar(75) DEFAULT NULL,
  `kartuidpjawab` varchar(6) DEFAULT NULL,
  `noidpjawab` varchar(20) DEFAULT NULL,
  `id_dokter` varchar(11) DEFAULT NULL,
  `kesimpulandr` varchar(2000) DEFAULT NULL,
  `anamnesa` varchar(100) DEFAULT NULL,
  `drpengirim` varchar(30) DEFAULT NULL,
  `drkonsulen` varchar(30) DEFAULT NULL,
  `innoso` char(1) DEFAULT NULL,
  `norakiri` varchar(10) DEFAULT NULL,
  `jatahklsiri` varchar(7) DEFAULT NULL,
  `carapulang` varchar(15) DEFAULT NULL,
  `keadaanpulang` varchar(20) DEFAULT NULL,
  `penyebabpenyakit` varchar(6) DEFAULT NULL,
  `pokumur` varchar(10) DEFAULT NULL,
  `flagpoli` char(1) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `norekom` char(7) DEFAULT NULL,
  `modbayarri` varchar(15) DEFAULT NULL,
  `nokkredit` varchar(20) DEFAULT NULL,
  `nofaktur` varchar(12) DEFAULT NULL,
  `totaldpri` int(16) DEFAULT NULL,
  `totalbiaya` int(16) DEFAULT NULL,
  `totalcshare` int(16) DEFAULT NULL,
  `totaldijamin` int(16) DEFAULT NULL,
  `totalsubsidi` int(16) DEFAULT NULL,
  `totalselisih` int(16) DEFAULT NULL,
  `totalbebas` int(16) DEFAULT NULL,
  `totalbyrpenjamin` int(16) DEFAULT NULL,
  `nokws` char(10) DEFAULT NULL,
  `nokwfinal` char(10) DEFAULT NULL,
  `noslipbank` char(10) DEFAULT NULL,
  `lunas` char(1) DEFAULT NULL,
  `tgl_lunas` date DEFAULT NULL,
  `oprtrlunas` varchar(15) DEFAULT NULL,
  `xuser` varchar(15) DEFAULT NULL,
  `xupdate` date DEFAULT NULL,
  `xterminal` varchar(15) DEFAULT NULL,
  `naikkls` varchar(7) DEFAULT NULL,
  `bed` varchar(7) DEFAULT NULL,
  `jlhcicilan` int(16) DEFAULT NULL,
  `jlhbyrpasien` int(16) DEFAULT NULL,
  `jlhbypaketyan` int(12) DEFAULT NULL,
  `jlhreturum` int(14) DEFAULT NULL,
  `pulang` char(1) DEFAULT NULL,
  `totalpaket` int(16) DEFAULT NULL,
  `totalluarpaket` int(16) DEFAULT NULL,
  `lnspasien` char(1) DEFAULT NULL,
  `lnspenjamin` char(1) DEFAULT NULL,
  `bylabswasta` int(14) DEFAULT NULL,
  `nosjp` varchar(30) DEFAULT NULL,
  `nosetoran_b` varchar(10) DEFAULT NULL,
  `newborn` char(1) DEFAULT NULL,
  `verif` char(1) DEFAULT NULL,
  `veriftime` date DEFAULT NULL,
  `verifuser` varchar(15) DEFAULT NULL,
  `blacklist` char(1) DEFAULT NULL,
  `lnspjamintime` date DEFAULT NULL,
  `lnsjaminop` varchar(15) DEFAULT NULL,
  `lnsjaminsrt` varchar(30) DEFAULT NULL,
  `hubpjawabri` varchar(10) DEFAULT NULL,
  `pilihdr` char(1) DEFAULT NULL,
  `jnskebijakan` char(4) DEFAULT NULL,
  `batal` char(1) DEFAULT NULL,
  `byobat` int(14) DEFAULT NULL,
  `nosrtaskes` varchar(20) DEFAULT NULL,
  `nosrtpers` varchar(20) DEFAULT NULL,
  `fkomum` char(1) DEFAULT NULL,
  `tgltagihan` date DEFAULT NULL,
  `totaljasar` int(14) DEFAULT NULL,
  `totaljasars` int(14) DEFAULT NULL,
  `totaljasop` int(14) DEFAULT NULL,
  `subsidijasar` int(14) DEFAULT NULL,
  `subsidijasars` int(14) DEFAULT NULL,
  `subsidijasop` int(14) DEFAULT NULL,
  `tgltransaksi` date DEFAULT NULL,
  `xcarabayar` varchar(15) DEFAULT NULL,
  `pemfisik` varchar(50) DEFAULT NULL,
  `pngobatan` varchar(50) DEFAULT NULL,
  `prognosis` varchar(50) DEFAULT NULL,
  `lanjutan` varchar(50) DEFAULT NULL,
  `anjuran` varchar(50) DEFAULT NULL,
  `dtime` date DEFAULT NULL,
  `novoucher_pp_kasjamin` varchar(10) DEFAULT NULL,
  `novoucher_pp_subsidi` varchar(10) DEFAULT NULL,
  `noipdlama` varchar(15) DEFAULT NULL,
  `notlppjawab` varchar(20) DEFAULT NULL,
  `lamabaru` char(4) DEFAULT NULL,
  `rawatke` int(3) DEFAULT NULL,
  `brtlahir` int(11) DEFAULT NULL,
  `pjglahir` int(11) DEFAULT NULL,
  `keadaaanlhr` varchar(20) DEFAULT NULL,
  `nmayah` varchar(30) DEFAULT NULL,
  `penolong` varchar(30) DEFAULT NULL,
  `diagmasuk` varchar(6) DEFAULT NULL,
  `tglvoucher_pp_kasjamin` date DEFAULT NULL,
  `tglvoucher_pp_subsidi` date DEFAULT NULL,
  `anamakwitansi` varchar(100) DEFAULT NULL,
  `dokter` varchar(11) DEFAULT NULL,
  `catatan` varchar(10) DEFAULT NULL,
  `nokwitagihan` varchar(15) DEFAULT NULL,
  `ket_tagihan` varchar(50) DEFAULT NULL,
  `tgl_bayar_tagihan` date DEFAULT NULL,
  `tgl_cetak_bon` date DEFAULT NULL,
  `tgl_lunas_pers` date DEFAULT NULL,
  `nokwlunaspers` varchar(12) DEFAULT NULL,
  `ketlunaspers` varchar(50) DEFAULT NULL,
  `rsmhpers` int(11) DEFAULT NULL,
  `obatpers` int(11) DEFAULT NULL,
  `labswastapers` int(11) DEFAULT NULL,
  `bebaspers` int(12) DEFAULT NULL,
  `rubahdata` date DEFAULT NULL,
  `tglbatal` date DEFAULT NULL,
  `userbatal` varchar(25) DEFAULT NULL,
  `novoucher_p_bayar` varchar(10) DEFAULT NULL,
  `tglvoucher_p_bayar` date DEFAULT NULL,
  `usercoucher_p_bayar` varchar(55) DEFAULT NULL,
  `novoucher_bebaspers` varchar(10) DEFAULT NULL,
  `tglvoucher_bebaspers` date DEFAULT NULL,
  `totalbiayadrg` int(15) DEFAULT NULL,
  `biayaalat` int(15) DEFAULT NULL,
  `verifjamkesmas` char(1) DEFAULT NULL,
  `uverifjamkesmas` varchar(20) DEFAULT NULL,
  `wverifjamkesmas` date DEFAULT NULL,
  `tgl_bebas_umu` date DEFAULT NULL,
  `tgl_bebas_perusahaan` date DEFAULT NULL,
  `penghpusan_piutang` int(15) DEFAULT NULL,
  `tgl_penghapusan` date DEFAULT NULL,
  `bebas_umum` int(12) DEFAULT NULL,
  `posjasadokter` date DEFAULT NULL,
  `jlhcicilpers` int(20) DEFAULT NULL,
  `noskp` varchar(23) DEFAULT NULL,
  `vtot` char(1) DEFAULT NULL,
  `ketpiutang` char(30) DEFAULT NULL,
  `flag_jasa` char(1) DEFAULT NULL,
  `no_sep` varchar(20) DEFAULT NULL,
  `proses_reservasi` char(1) DEFAULT NULL,
  `ruang_reservasi` varchar(10) DEFAULT NULL,
  `klas_reservasi` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien_iri`
--

INSERT INTO `pasien_iri` (`no_ipd`, `idrg`, `tgldaftarri`, `no_cm`, `noregasal`, `id_smf`, `procmasuk`, `carabayar`, `umurri`, `ublniri`, `uhariiri`, `tgl_masuk`, `tgl_keluar`, `triwulan`, `klsiri`, `nopembayarri`, `id_kontraktor`, `nmpembayatri`, `ketpembayarri`, `golpembayarri`, `nmpjawabri`, `alamatpjawabri`, `kartuidpjawab`, `noidpjawab`, `id_dokter`, `kesimpulandr`, `anamnesa`, `drpengirim`, `drkonsulen`, `innoso`, `norakiri`, `jatahklsiri`, `carapulang`, `keadaanpulang`, `penyebabpenyakit`, `pokumur`, `flagpoli`, `nama`, `norekom`, `modbayarri`, `nokkredit`, `nofaktur`, `totaldpri`, `totalbiaya`, `totalcshare`, `totaldijamin`, `totalsubsidi`, `totalselisih`, `totalbebas`, `totalbyrpenjamin`, `nokws`, `nokwfinal`, `noslipbank`, `lunas`, `tgl_lunas`, `oprtrlunas`, `xuser`, `xupdate`, `xterminal`, `naikkls`, `bed`, `jlhcicilan`, `jlhbyrpasien`, `jlhbypaketyan`, `jlhreturum`, `pulang`, `totalpaket`, `totalluarpaket`, `lnspasien`, `lnspenjamin`, `bylabswasta`, `nosjp`, `nosetoran_b`, `newborn`, `verif`, `veriftime`, `verifuser`, `blacklist`, `lnspjamintime`, `lnsjaminop`, `lnsjaminsrt`, `hubpjawabri`, `pilihdr`, `jnskebijakan`, `batal`, `byobat`, `nosrtaskes`, `nosrtpers`, `fkomum`, `tgltagihan`, `totaljasar`, `totaljasars`, `totaljasop`, `subsidijasar`, `subsidijasars`, `subsidijasop`, `tgltransaksi`, `xcarabayar`, `pemfisik`, `pngobatan`, `prognosis`, `lanjutan`, `anjuran`, `dtime`, `novoucher_pp_kasjamin`, `novoucher_pp_subsidi`, `noipdlama`, `notlppjawab`, `lamabaru`, `rawatke`, `brtlahir`, `pjglahir`, `keadaaanlhr`, `nmayah`, `penolong`, `diagmasuk`, `tglvoucher_pp_kasjamin`, `tglvoucher_pp_subsidi`, `anamakwitansi`, `dokter`, `catatan`, `nokwitagihan`, `ket_tagihan`, `tgl_bayar_tagihan`, `tgl_cetak_bon`, `tgl_lunas_pers`, `nokwlunaspers`, `ketlunaspers`, `rsmhpers`, `obatpers`, `labswastapers`, `bebaspers`, `rubahdata`, `tglbatal`, `userbatal`, `novoucher_p_bayar`, `tglvoucher_p_bayar`, `usercoucher_p_bayar`, `novoucher_bebaspers`, `tglvoucher_bebaspers`, `totalbiayadrg`, `biayaalat`, `verifjamkesmas`, `uverifjamkesmas`, `wverifjamkesmas`, `tgl_bebas_umu`, `tgl_bebas_perusahaan`, `penghpusan_piutang`, `tgl_penghapusan`, `bebas_umum`, `posjasadokter`, `jlhcicilpers`, `noskp`, `vtot`, `ketpiutang`, `flag_jasa`, `no_sep`, `proses_reservasi`, `ruang_reservasi`, `klas_reservasi`) VALUES
('RI00000001', NULL, '2016-03-10', '0000000001', 'RJ00000001', '', NULL, '', NULL, NULL, NULL, '2016-03-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DK00000001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Santi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '20160310-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mila Pradi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien_irj`
--

CREATE TABLE IF NOT EXISTS `pasien_irj` (
  `no_reg` varchar(11) NOT NULL,
  `no_cm` varchar(11) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `jenis_kelamin` char(1) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `hp` varchar(15) DEFAULT NULL,
  `id_dokter` varchar(11) DEFAULT NULL,
  `dokter` varchar(30) DEFAULT NULL,
  `diagnosa` varchar(50) DEFAULT NULL,
  `id_poli` varchar(10) DEFAULT NULL,
  `poliasal` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien_irj`
--

INSERT INTO `pasien_irj` (`no_reg`, `no_cm`, `nama`, `jenis_kelamin`, `tanggal_lahir`, `telp`, `hp`, `id_dokter`, `dokter`, `diagnosa`, `id_poli`, `poliasal`) VALUES
('RJ00000001', '0000000001', 'Santi', 'P', '1993-08-24', '(021) 234567', '085624652525', 'DK00000001', 'Mila Pradini', 'Penyakit Maag!', 'BH01', 'Klinik Mata Terpadu'),
('RJ00000002', '0000000002', 'Aksan Maulana', 'L', '1993-03-24', '(021) 234568', '085624652536', 'DK00000002', 'Ahmad Ramdani', 'Penyakit Kulit!', 'BH02', 'Klini Kaki Terpadu'),
('RJ00000003', '0000000003', 'Iip', 'L', '1993-05-24', '(021) 234569', '085624652547', 'DK00000003', 'Tommy Putra', 'Penyakit Flu!', 'BH03', 'Klinik Hati Terpadu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelayanan_iri`
--

CREATE TABLE IF NOT EXISTS `pelayanan_iri` (
  `tgl_layanan` date DEFAULT NULL,
  `id_jns_layanan` char(6) DEFAULT NULL,
  `no_ipd` char(10) DEFAULT NULL,
  `idrg` varchar(3) DEFAULT NULL,
  `kelas` varchar(7) DEFAULT NULL,
  `noslipt` varchar(12) DEFAULT NULL,
  `nomederec` char(10) DEFAULT NULL,
  `qtyyanri` int(3) DEFAULT NULL,
  `jasarinap` int(4) DEFAULT NULL,
  `jasarsinap` int(14) DEFAULT NULL,
  `jasaopinap` int(14) DEFAULT NULL,
  `tumuminap` int(16) DEFAULT NULL,
  `dijamininap` int(20) DEFAULT NULL,
  `cshareinap` int(14) DEFAULT NULL,
  `selisihinap` int(12) DEFAULT NULL,
  `subsidiinap` int(12) DEFAULT NULL,
  `pokaskes` varchar(12) DEFAULT NULL,
  `kategori` varchar(9) DEFAULT NULL,
  `idoprtr` varchar(11) DEFAULT NULL,
  `pokoprtr` varchar(7) DEFAULT NULL,
  `nosetoran_b` varchar(10) DEFAULT NULL,
  `nosetoran_c` varchar(10) DEFAULT NULL,
  `xuser` varchar(15) DEFAULT NULL,
  `xupdate` date DEFAULT NULL,
  `xterminal` varchar(15) DEFAULT NULL,
  `verif` char(1) DEFAULT NULL,
  `veriftime` date DEFAULT NULL,
  `verifuser` varchar(15) DEFAULT NULL,
  `jasaaneinap` int(14) DEFAULT NULL,
  `novoucher_pdp` varchar(10) DEFAULT NULL,
  `tglvoucher` date DEFAULT NULL,
  `novoucher_koreksi` varchar(10) DEFAULT NULL,
  `tglvoucherkoreksi` date DEFAULT NULL,
  `xmodif` date DEFAULT NULL,
  `batal` char(1) DEFAULT NULL,
  `tglvoucher_pdp` date DEFAULT NULL,
  `penurang_op` char(1) DEFAULT NULL,
  `pengurang_op` char(1) DEFAULT NULL,
  `kurang_dr` char(1) DEFAULT NULL,
  `novoucher` varchar(10) DEFAULT NULL,
  `tglentry` date DEFAULT NULL,
  `novoucher_pers` varchar(10) DEFAULT NULL,
  `tglvoucher_pers` date DEFAULT NULL,
  `vtot` char(1) DEFAULT NULL,
  `nomor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang`
--

CREATE TABLE IF NOT EXISTS `ruang` (
  `idrg` varchar(3) NOT NULL,
  `nmruang` varchar(30) DEFAULT NULL,
  `pokruang` varchar(20) DEFAULT NULL,
  `pokrgtarif` varchar(25) DEFAULT NULL,
  `tipebt` char(1) DEFAULT NULL,
  `kodebt` varchar(10) DEFAULT NULL,
  `id_dept` varchar(4) DEFAULT NULL,
  `koderg` varchar(5) DEFAULT NULL,
  `idf` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ruang`
--

INSERT INTO `ruang` (`idrg`, `nmruang`, `pokruang`, `pokrgtarif`, `tipebt`, `kodebt`, `id_dept`, `koderg`, `idf`) VALUES
('104', 'Pav. Lematang Indah 1', NULL, NULL, NULL, NULL, NULL, 'II', NULL),
('105', 'Pav. Lematang Indah 2', NULL, NULL, NULL, NULL, NULL, 'II', NULL),
('106', 'Pav. Musi Elok (Lantai 2)', NULL, NULL, NULL, NULL, NULL, 'II', NULL),
('107', 'Non Aktif-Pav.Melati (MJD 511)', NULL, NULL, NULL, NULL, NULL, 'II', NULL),
('108', 'Intermediate', NULL, NULL, NULL, NULL, NULL, 'II', NULL),
('201', 'Obgyn B (Anggrek Lt. 1)', NULL, NULL, NULL, NULL, NULL, 'II', NULL),
('202', 'Bayi (Anggrek Lt.1 & 2)', NULL, NULL, NULL, NULL, NULL, 'II', NULL),
('203', 'Obgyn C (Anggrek Lt. 2)', NULL, NULL, NULL, NULL, NULL, 'II', NULL),
('301', 'Neonatus (Kemuning Lt.2)', NULL, NULL, NULL, NULL, NULL, 'II', NULL),
('303', 'Non Aktif-NICU (MJD 603)', NULL, NULL, NULL, NULL, NULL, 'II', NULL),
('304', 'Non Aktif PICU (MJD 604)', NULL, NULL, NULL, NULL, NULL, 'II', NULL),
('401', 'Kenanga A (RKB A)', NULL, NULL, NULL, NULL, NULL, 'II', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang_iri`
--

CREATE TABLE IF NOT EXISTS `ruang_iri` (
  `idrgiri` int(11) NOT NULL,
  `no_ipd` char(10) DEFAULT NULL,
  `idrg` varchar(3) DEFAULT NULL,
  `kelas` varchar(7) DEFAULT NULL,
  `tglmasukrg` date DEFAULT NULL,
  `bed` varchar(9) DEFAULT NULL,
  `nomederec` char(10) DEFAULT NULL,
  `statmasukrg` varchar(8) DEFAULT NULL,
  `tglkeluarrg` date DEFAULT NULL,
  `statkeluarrg` varchar(20) DEFAULT NULL,
  `hrawatrg` int(3) DEFAULT NULL,
  `jasarrg` int(14) DEFAULT NULL,
  `dijaminrg` int(12) DEFAULT NULL,
  `csharerg` int(12) DEFAULT NULL,
  `selisihrg` int(12) DEFAULT NULL,
  `subsidirg` int(12) DEFAULT NULL,
  `pokaskes` varchar(12) DEFAULT NULL,
  `id_dokter` varchar(11) DEFAULT NULL,
  `naikkls` varchar(7) DEFAULT NULL,
  `nosetoran_a` varchar(10) DEFAULT NULL,
  `nosetoran_b` varchar(10) DEFAULT NULL,
  `nosetoran_c` varchar(10) DEFAULT NULL,
  `xuser` varchar(15) DEFAULT NULL,
  `xupdate` date DEFAULT NULL,
  `xterminal` varchar(15) DEFAULT NULL,
  `verif` char(1) DEFAULT NULL,
  `veriftime` date DEFAULT NULL,
  `verifuser` varchar(15) DEFAULT NULL,
  `byrpenjamin` int(12) DEFAULT NULL,
  `tumumrg` int(14) DEFAULT NULL,
  `novoucher_pdp` varchar(10) DEFAULT NULL,
  `tglvoucher_pdp` date DEFAULT NULL,
  `jasapelrg` int(12) DEFAULT NULL,
  `jasatotrg` int(12) DEFAULT NULL,
  `jasarsrg` int(12) DEFAULT NULL,
  `jasaoprg` int(12) DEFAULT NULL,
  `novoucher` varchar(10) DEFAULT NULL,
  `tglvoucher` date DEFAULT NULL,
  `novoucher_pers` varchar(10) DEFAULT NULL,
  `tglvoucher_pers` date DEFAULT NULL,
  `vtot` char(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ruang_iri`
--

INSERT INTO `ruang_iri` (`idrgiri`, `no_ipd`, `idrg`, `kelas`, `tglmasukrg`, `bed`, `nomederec`, `statmasukrg`, `tglkeluarrg`, `statkeluarrg`, `hrawatrg`, `jasarrg`, `dijaminrg`, `csharerg`, `selisihrg`, `subsidirg`, `pokaskes`, `id_dokter`, `naikkls`, `nosetoran_a`, `nosetoran_b`, `nosetoran_c`, `xuser`, `xupdate`, `xterminal`, `verif`, `veriftime`, `verifuser`, `byrpenjamin`, `tumumrg`, `novoucher_pdp`, `tglvoucher_pdp`, `jasapelrg`, `jasatotrg`, `jasarsrg`, `jasaoprg`, `novoucher`, `tglvoucher`, `novoucher_pers`, `tglvoucher_pers`, `vtot`) VALUES
(5, 'RI00000001', '104', 'II', '2016-03-01', '303', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_ulang_irj`
--
ALTER TABLE `daftar_ulang_irj`
  ADD PRIMARY KEY (`no_register`), ADD KEY `no_medrec` (`no_medrec`);

--
-- Indexes for table `data_pasien`
--
ALTER TABLE `data_pasien`
  ADD PRIMARY KEY (`no_medrec`), ADD UNIQUE KEY `no_identitas` (`no_identitas`), ADD UNIQUE KEY `no_kartu` (`no_kartu`);

--
-- Indexes for table `irna_antrian`
--
ALTER TABLE `irna_antrian`
  ADD PRIMARY KEY (`noreservasi`), ADD KEY `fk_ruangpilih` (`ruangpilih`);

--
-- Indexes for table `irna_sliptindakan`
--
ALTER TABLE `irna_sliptindakan`
  ADD PRIMARY KEY (`noslipt`), ADD KEY `fk_idrg_irna_sliptindakan` (`idrg`), ADD KEY `fk_no_ipd_irna_sliptindakan` (`no_ipd`);

--
-- Indexes for table `pasien_ird`
--
ALTER TABLE `pasien_ird`
  ADD PRIMARY KEY (`no_reg`);

--
-- Indexes for table `pasien_iri`
--
ALTER TABLE `pasien_iri`
  ADD PRIMARY KEY (`no_ipd`), ADD KEY `fk_idrg_pasien_iri` (`idrg`);

--
-- Indexes for table `pasien_irj`
--
ALTER TABLE `pasien_irj`
  ADD PRIMARY KEY (`no_reg`);

--
-- Indexes for table `pelayanan_iri`
--
ALTER TABLE `pelayanan_iri`
  ADD KEY `fk_no_ipd_pelayanan_iri` (`no_ipd`), ADD KEY `fk_idrg_pelayanan_iri` (`idrg`), ADD KEY `fk_noslipt_pelayanan_iri` (`noslipt`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`idrg`);

--
-- Indexes for table `ruang_iri`
--
ALTER TABLE `ruang_iri`
  ADD PRIMARY KEY (`idrgiri`), ADD KEY `fk_no_ipd` (`no_ipd`), ADD KEY `fk_idrg_ruang_iri` (`idrg`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ruang_iri`
--
ALTER TABLE `ruang_iri`
  MODIFY `idrgiri` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `daftar_ulang_irj`
--
ALTER TABLE `daftar_ulang_irj`
ADD CONSTRAINT `daftar_ulang_irj_ibfk_1` FOREIGN KEY (`no_medrec`) REFERENCES `data_pasien` (`no_medrec`);

--
-- Ketidakleluasaan untuk tabel `irna_antrian`
--
ALTER TABLE `irna_antrian`
ADD CONSTRAINT `fk_ruangpilih` FOREIGN KEY (`ruangpilih`) REFERENCES `ruang` (`idrg`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `irna_sliptindakan`
--
ALTER TABLE `irna_sliptindakan`
ADD CONSTRAINT `fk_idrg_irna_sliptindakan` FOREIGN KEY (`idrg`) REFERENCES `ruang` (`idrg`) ON DELETE CASCADE,
ADD CONSTRAINT `fk_no_ipd_irna_sliptindakan` FOREIGN KEY (`no_ipd`) REFERENCES `pasien_iri` (`no_ipd`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pasien_iri`
--
ALTER TABLE `pasien_iri`
ADD CONSTRAINT `fk_idrg_pasien_iri` FOREIGN KEY (`idrg`) REFERENCES `ruang` (`idrg`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pelayanan_iri`
--
ALTER TABLE `pelayanan_iri`
ADD CONSTRAINT `fk_idrg_pelayanan_iri` FOREIGN KEY (`idrg`) REFERENCES `ruang` (`idrg`) ON DELETE CASCADE,
ADD CONSTRAINT `fk_no_ipd_pelayanan_iri` FOREIGN KEY (`no_ipd`) REFERENCES `pasien_iri` (`no_ipd`) ON DELETE CASCADE,
ADD CONSTRAINT `fk_noslipt_pelayanan_iri` FOREIGN KEY (`noslipt`) REFERENCES `irna_sliptindakan` (`noslipt`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ruang_iri`
--
ALTER TABLE `ruang_iri`
ADD CONSTRAINT `fk_idrg_ruang_iri` FOREIGN KEY (`idrg`) REFERENCES `ruang` (`idrg`) ON DELETE CASCADE,
ADD CONSTRAINT `fk_no_ipd` FOREIGN KEY (`no_ipd`) REFERENCES `pasien_iri` (`no_ipd`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
