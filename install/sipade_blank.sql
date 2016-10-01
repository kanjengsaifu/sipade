-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 09, 2014 at 05:17 
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sipade_blank`
--

-- --------------------------------------------------------

--
-- Table structure for table `arsip_agama`
--

CREATE TABLE IF NOT EXISTS `arsip_agama` (
  `id_agama` int(5) NOT NULL AUTO_INCREMENT,
  `agama` varchar(50) NOT NULL,
  PRIMARY KEY (`id_agama`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `arsip_agama`
--

INSERT INTO `arsip_agama` (`id_agama`, `agama`) VALUES
(1, 'Islam'),
(2, 'Kristen'),
(3, 'Katholik'),
(4, 'Hindu'),
(5, 'Budha'),
(6, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `arsip_alamat`
--

CREATE TABLE IF NOT EXISTS `arsip_alamat` (
  `id_alamat` int(5) NOT NULL AUTO_INCREMENT,
  `alamat` varchar(50) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kabupaten_kota` varchar(50) NOT NULL,
  `kode_pos` int(10) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  PRIMARY KEY (`id_alamat`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `arsip_goldar`
--

CREATE TABLE IF NOT EXISTS `arsip_goldar` (
  `id_goldar` int(5) NOT NULL AUTO_INCREMENT,
  `goldar` varchar(10) NOT NULL,
  PRIMARY KEY (`id_goldar`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `arsip_goldar`
--

INSERT INTO `arsip_goldar` (`id_goldar`, `goldar`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'AB'),
(4, 'O'),
(5, 'A+'),
(6, 'A-'),
(7, 'B'),
(8, 'B-'),
(9, 'AB+'),
(10, 'AB-'),
(11, '0+'),
(12, '0'),
(13, '-');

-- --------------------------------------------------------

--
-- Table structure for table `arsip_kelamin`
--

CREATE TABLE IF NOT EXISTS `arsip_kelamin` (
  `id_kelamin` int(5) NOT NULL AUTO_INCREMENT,
  `kelamin` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kelamin`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `arsip_kelamin`
--

INSERT INTO `arsip_kelamin` (`id_kelamin`, `kelamin`) VALUES
(1, 'Laki-laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `arsip_kewarganegaraan`
--

CREATE TABLE IF NOT EXISTS `arsip_kewarganegaraan` (
  `id_kewarganegaraan` int(5) NOT NULL AUTO_INCREMENT,
  `kewarganegaraan` varchar(50) NOT NULL,
  `kewarganegaraan_panjang` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kewarganegaraan`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `arsip_kewarganegaraan`
--

INSERT INTO `arsip_kewarganegaraan` (`id_kewarganegaraan`, `kewarganegaraan`, `kewarganegaraan_panjang`) VALUES
(1, 'WNI', 'Indonesia'),
(2, 'WNA', '');

-- --------------------------------------------------------

--
-- Table structure for table `arsip_pekerjaan`
--

CREATE TABLE IF NOT EXISTS `arsip_pekerjaan` (
  `id_pekerjaan` int(5) NOT NULL AUTO_INCREMENT,
  `pekerjaan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pekerjaan`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=90 ;

--
-- Dumping data for table `arsip_pekerjaan`
--

INSERT INTO `arsip_pekerjaan` (`id_pekerjaan`, `pekerjaan`) VALUES
(1, 'Belum/Tidak Bekerja'),
(2, 'Mengurus Rumah Tangga'),
(3, 'Pelajar/Mahasiswa'),
(4, 'Pensiunan'),
(5, 'Pegawai Negeri Sipil (PNS)'),
(6, 'Tentara Nasional Indonesia (TNI)'),
(7, 'Kepolisian (POLRI)'),
(8, 'Perdagangan'),
(9, 'Petani/Pekebun'),
(10, 'Peternak'),
(11, 'Nelayan/Perikanan'),
(12, 'Industri'),
(13, 'Konstruksi'),
(14, 'Transportasi'),
(15, 'Karyawan Swasta'),
(16, 'Karyawan BUMN'),
(17, 'Karyawan BUMD'),
(18, 'Karyawan Honorer'),
(19, 'Buruh Harian Lepas'),
(20, 'Buruh Tani/Perkebunan'),
(21, 'Buruh Nelayan/Perikanan'),
(22, 'Buruh Peternakan'),
(23, 'Pembantu Rumah Tangga'),
(24, 'Tukang Cukur'),
(25, 'Tukang Listrik'),
(26, 'Tukang Batu'),
(27, 'Tukang Kayu'),
(28, 'Tukang Sol Sepatu'),
(29, 'Tukang Las/Pandai Besi'),
(30, 'Tukang Jahit'),
(31, 'Tukang Gigi'),
(32, 'Penata Rias'),
(33, 'Penata Busana'),
(34, 'Penata Rambut'),
(35, 'Mekanik'),
(36, 'Seniman'),
(37, 'Tabib'),
(38, 'Paraji'),
(39, 'Perancang Busana'),
(40, 'Penterjemah'),
(41, 'Imam Masjid'),
(42, 'Pendeta'),
(43, 'Pastor'),
(44, 'Wartawan'),
(45, 'Ustadz/Mubaligh'),
(46, 'Juru Masak'),
(47, 'Promotor Acara'),
(48, 'Anggota DPR-RI'),
(49, 'Anggota DPD'),
(50, 'Anggota BPK'),
(51, 'Presiden'),
(52, 'Wakil Presiden'),
(53, 'Anggota Mahkamah Konstitusi'),
(54, 'Anggota Kabinet/Kementrian'),
(55, 'Duta Besar'),
(56, 'Gubernur'),
(57, 'Wakil Gubernur'),
(58, 'Bupati'),
(59, 'Wakil Bupati'),
(60, 'Walikota'),
(61, 'Wakil Walikota'),
(62, 'Anggota DPRD Prop'),
(63, 'Anggota DPRD Kab Kota PROPESI LAIN SELAIN PEGAWAI '),
(64, 'Dosen'),
(65, 'Guru'),
(66, 'Pilot'),
(67, 'Pengacara'),
(68, 'Notaris'),
(69, 'Arsitek'),
(70, 'Akuntan'),
(71, 'Konsultan'),
(72, 'Dokter'),
(73, 'Bidan'),
(74, 'Perawat'),
(75, 'Apoteker'),
(76, 'Psikiater/Psikolog'),
(77, 'Penyiar Televisi'),
(78, 'Penyiar Radio'),
(79, 'Pelaut'),
(80, 'Peneliti'),
(81, 'Sopir'),
(82, 'Pialang'),
(83, 'Paranormal'),
(84, 'Pedagang'),
(85, 'Perangkat Desa'),
(86, 'Kepala Desa'),
(87, 'Biarawati'),
(88, 'Wiraswasta'),
(89, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `arsip_pendidikan`
--

CREATE TABLE IF NOT EXISTS `arsip_pendidikan` (
  `id_pendidikan` int(5) NOT NULL AUTO_INCREMENT,
  `pendidikan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pendidikan`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `arsip_pendidikan`
--

INSERT INTO `arsip_pendidikan` (`id_pendidikan`, `pendidikan`) VALUES
(1, 'Tidak/Belum Sekolah'),
(2, 'Tamat SD/Sederajat'),
(3, 'SLTP/Sederajat'),
(4, 'SLTA/Sederajat'),
(5, 'Diploma I/II'),
(6, 'Akademi/Diploma III /Sarjana Muda'),
(7, 'Diploma IV/Strata I'),
(8, 'Strata II'),
(9, 'Strata III');

-- --------------------------------------------------------

--
-- Table structure for table `arsip_p_cacat`
--

CREATE TABLE IF NOT EXISTS `arsip_p_cacat` (
  `id_p_cacat` int(5) NOT NULL AUTO_INCREMENT,
  `p_cacat` varchar(50) NOT NULL,
  PRIMARY KEY (`id_p_cacat`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `arsip_p_cacat`
--

INSERT INTO `arsip_p_cacat` (`id_p_cacat`, `p_cacat`) VALUES
(1, 'Cacat Fisik'),
(2, 'Cacat Netra/Buta'),
(3, 'Cacat Rungu/Wicara'),
(4, 'Cacat Mental/Jiwa'),
(5, 'Cacat Fisik dan Mental'),
(6, 'Cacat Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `arsip_rt`
--

CREATE TABLE IF NOT EXISTS `arsip_rt` (
  `id_rt` int(5) NOT NULL AUTO_INCREMENT,
  `id_rw` varchar(3) NOT NULL,
  `rt` varchar(3) NOT NULL,
  `nama_ketua_rt` varchar(50) NOT NULL,
  PRIMARY KEY (`id_rt`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `arsip_rw`
--

CREATE TABLE IF NOT EXISTS `arsip_rw` (
  `id_rw` int(5) NOT NULL AUTO_INCREMENT,
  `rw` varchar(3) NOT NULL,
  `nama_ketua_rw` varchar(50) NOT NULL,
  PRIMARY KEY (`id_rw`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `arsip_status`
--

CREATE TABLE IF NOT EXISTS `arsip_status` (
  `id_status` int(5) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `arsip_status`
--

INSERT INTO `arsip_status` (`id_status`, `status`) VALUES
(1, 'Belum Kawin'),
(2, 'Kawin'),
(3, 'Cerai Hidup'),
(4, 'Cerai Mati');

-- --------------------------------------------------------

--
-- Table structure for table `arsip_status_hdk`
--

CREATE TABLE IF NOT EXISTS `arsip_status_hdk` (
  `id_status_hdk` int(5) NOT NULL AUTO_INCREMENT,
  `status_hdk` varchar(50) NOT NULL,
  PRIMARY KEY (`id_status_hdk`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `arsip_status_hdk`
--

INSERT INTO `arsip_status_hdk` (`id_status_hdk`, `status_hdk`) VALUES
(1, 'Kepala Keluarga'),
(2, 'Suami'),
(3, 'Isteri'),
(4, 'Anak'),
(5, 'Menantu'),
(6, 'Cucu'),
(7, 'Orang Tua'),
(8, 'Mertua'),
(9, 'Famili Lain'),
(10, 'Pembantu'),
(11, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `arsip_surat`
--

CREATE TABLE IF NOT EXISTS `arsip_surat` (
  `id_surat` int(5) NOT NULL AUTO_INCREMENT,
  `nama_surat` varchar(200) NOT NULL,
  `singkat_surat` varchar(50) NOT NULL,
  `ket_surat` varchar(500) NOT NULL,
  `jw` varchar(5) NOT NULL,
  `jenis` enum('K','F','P') NOT NULL DEFAULT 'K',
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_surat`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `arsip_surat`
--

INSERT INTO `arsip_surat` (`id_surat`, `nama_surat`, `singkat_surat`, `ket_surat`, `jw`, `jenis`, `aktif`) VALUES
(1, 'Resi (KTP Sementara)', 'RESI', 'RESI : Pengganti sementara waktu KTP (regular) yang sedang dalam proses pembuatan.', '1', 'K', 'Y'),
(2, 'Domisili', 'SKD', 'SKD : Menerangkan bahwa seseorang berdomisili di desa (ini).', '1', 'K', 'Y'),
(3, 'Usaha', 'SKU', 'SKU : Menerangkan kegiatan usaha seseorang di desa (ini).', '6', 'K', 'Y'),
(4, 'Domisili Usaha', 'SKDU', 'SKDU : Menerangkan informasi domisili usaha seseorang di desa (ini), berikut data lainnya.', '0', 'K', 'Y'),
(5, 'Tidak Mampu', 'SKTM', 'SKTM : menerangkan bahwa seseorang tercatat dalam data penduduk berekonomi lemah di desa (ini).', '0', 'K', 'Y'),
(6, 'Keluarga Miskin', 'SKKM', 'SKKM : Menerangkan bahwa seseorang/keluargga  tercatat dalam data keluargga berekonomi lemah di desa (ini)', '0', 'K', 'Y'),
(7, 'Kelakuan Baik', 'SKKB', 'SKKB : Menerangkan bahwa seseorang yang berdomisili di desa (ini) dan berkelakuan baik.', '0', 'K', 'Y'),
(8, 'Kelahiran', 'SKK', 'SKK : Menerangkan informasi kelahiran seseorang, serta beberapa data lain menyangkut peristiwa kelahirannya.', '0', 'K', 'Y'),
(9, 'Kegiatan Keramaian', 'SKKK', 'SKKK : Menerangkan bahwa pemerintah desa menyetujui kegiatan yang akan diadakan oleh seseorang.', '0', 'K', 'Y'),
(10, 'Kematian', 'SKW', 'SKW : Menerangkan kapan dan sebab meninggalnya seseorang', '0', 'K', 'Y'),
(11, 'Pindah Datang', 'SKPD', 'SKPD : Surat pengantar pengurusan mutasi penduduk (Pindah)', '0', 'K', 'Y'),
(12, 'Kartu Tanda Penduduk', 'KTP', 'KTP : Formulir Kartu Tanda Penduduk', '0', 'F', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `kk`
--

CREATE TABLE IF NOT EXISTS `kk` (
  `id_kk` int(10) NOT NULL AUTO_INCREMENT,
  `no_kk` varchar(50) NOT NULL,
  `alamat` int(10) NOT NULL,
  `rt` int(3) NOT NULL,
  `rw` int(3) NOT NULL,
  `catatan` varchar(500) NOT NULL,
  PRIMARY KEY (`id_kk`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pejabat`
--

CREATE TABLE IF NOT EXISTS `pejabat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  `nama_cap` varchar(200) NOT NULL,
  `jabatan` varchar(200) NOT NULL,
  `ket` varchar(200) NOT NULL,
  `teken` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `pejabat`
--

INSERT INTO `pejabat` (`id`, `nama`, `nama_cap`, `jabatan`, `ket`, `teken`) VALUES
(1, 'Gumilar Suteja', 'GUMILAR SUTEJA', '1', 'Kepala Desa', 'Y'),
(2, 'Sopian Iswandi', 'SOPIAN ISWANDI', '2', 'Sekretaris Desa', 'Y'),
(3, 'Dana', 'DANA', '3', 'Kaur. Pem', 'Y'),
(4, 'Selly Sawaludin', 'SELLY SAWALUDIN', '4', 'Kaur. Pembangunan', 'N'),
(5, 'Ade Arwan Setiawan', 'ADE ARWAN SETIAWAN', '5', 'Kaur. Ekonomi', 'N'),
(6, 'Alin Yulianti', 'ALIN YULIANTI', '6', 'Bendahara', 'N'),
(7, 'Suhendi', 'SUHENDI', '7', 'Kaur. Umum', 'N'),
(8, 'Julfi Qurahman', 'JULFI QURAHMAN', '8', 'Kaur. Kesra', 'N'),
(9, 'Endah Mulyani', 'ENDAH MULYANI', '9', 'Kaur. Keuangan', 'N'),
(10, 'Ichwan Budiman', 'ICHWAN BUDIMAN', '10', 'Register Kependudukan', 'N'),
(11, 'Rosmiati', 'ROSMIATI', '11', 'Staf', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `pelayanan`
--

CREATE TABLE IF NOT EXISTS `pelayanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no` varchar(50) NOT NULL,
  `no_pen` varchar(50) NOT NULL,
  `tgl` date NOT NULL,
  `jam` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nl` varchar(200) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `jk` varchar(30) NOT NULL,
  `agm` varchar(50) NOT NULL,
  `kerja` varchar(50) NOT NULL,
  `almt` varchar(500) NOT NULL,
  `js` varchar(100) NOT NULL,
  `ket` varchar(500) NOT NULL,
  `uname` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE IF NOT EXISTS `penduduk` (
  `id_pen` int(10) NOT NULL AUTO_INCREMENT,
  `no_kk_pen` varchar(50) NOT NULL,
  `no_pen` varchar(50) NOT NULL,
  `nama_pen` varchar(100) NOT NULL,
  `kelamin_pen` int(1) NOT NULL DEFAULT '1',
  `goldar_pen` int(2) NOT NULL,
  `tempat_lahir_pen` varchar(50) NOT NULL,
  `tanggal_lahir_pen` date NOT NULL,
  `agama_pen` int(5) NOT NULL,
  `pendidikan_pen` int(5) NOT NULL,
  `pekerjaan_pen` int(5) NOT NULL,
  `status_pen` int(3) NOT NULL,
  `status_hdk_pen` int(3) NOT NULL,
  `kewarganegaraan_pen` int(10) NOT NULL,
  `paspor_pen` int(20) NOT NULL,
  `kitas_kitap_pen` int(20) NOT NULL,
  `ayah_pen` varchar(50) NOT NULL,
  `ibu_pen` varchar(50) NOT NULL,
  `alamat_pen` int(10) NOT NULL,
  `rt_pen` int(3) NOT NULL,
  `rw_pen` int(3) NOT NULL,
  `wafat` enum('Y','N') NOT NULL DEFAULT 'N',
  `statusnya` enum('0','1','2','3') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_pen`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE IF NOT EXISTS `pengaturan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desa` varchar(200) NOT NULL,
  `kecamatan` varchar(200) NOT NULL,
  `kabupaten` varchar(200) NOT NULL,
  `provinsi` varchar(200) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `kodepos` varchar(200) NOT NULL,
  `kodedesa` varchar(200) NOT NULL,
  `kodekab` varchar(10) NOT NULL,
  `kepaladesa` varchar(200) NOT NULL,
  `install` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `alamat`, `kodepos`, `kodedesa`, `kodekab`, `kepaladesa`, `install`) VALUES
(1, 'TAMANSARI', 'TAMANSARI', 'BOGOR', 'JAWA BARAT', 'JL. TAMAN NO14', '16610', '2004', '320131', 'GUMILAR SUTEJA', 'N'),
(2, 'Tamansari', 'Tamansari', 'Bogor', 'Jawa Barat', 'Jl. Taman No14', '16610', '2004', '320131', 'Gumilar Suteja', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `statistik`
--

CREATE TABLE IF NOT EXISTS `statistik` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `data` varchar(10) NOT NULL,
  `tipe` enum('umur','surat','wajibktp','lainnya') NOT NULL DEFAULT 'lainnya',
  `aktif` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `statistik`
--

INSERT INTO `statistik` (`id`, `data`, `tipe`, `aktif`) VALUES
(1, '0-4', 'umur', 'Y'),
(2, '5-9', 'umur', 'Y'),
(3, '10-14', 'umur', 'Y'),
(4, '15-19', 'umur', 'Y'),
(5, '20-24', 'umur', 'Y'),
(6, '25-29', 'umur', 'Y'),
(7, '30-34', 'umur', 'Y'),
(8, '35-39', 'umur', 'Y'),
(9, '40-44', 'umur', 'Y'),
(10, '45-49', 'umur', 'Y'),
(11, '50-54', 'umur', 'Y'),
(12, '55-59', 'umur', 'Y'),
(13, '60-64', 'umur', 'Y'),
(14, '65-69', 'umur', 'Y'),
(15, '70-100', 'umur', 'Y'),
(16, '17-150', 'wajibktp', 'Y'),
(17, 'RESI', 'surat', 'Y'),
(18, 'DOMISILI', 'surat', 'Y'),
(19, 'SKU', 'surat', 'Y'),
(20, 'SKDU', 'surat', 'Y'),
(21, 'SKTM', 'surat', 'Y'),
(22, 'SKKM', 'surat', 'Y'),
(23, 'SKKB', 'surat', 'Y'),
(24, 'KELAHIRAN', 'surat', 'Y'),
(25, 'SKW', 'surat', 'Y'),
(26, 'SKPD', 'surat', 'Y'),
(27, 'KTP', 'surat', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('0','1','2') NOT NULL DEFAULT '0',
  `uname` varchar(50) NOT NULL,
  `nama_lengkap` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_session` varchar(500) NOT NULL,
  `log_akhir` varchar(19) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `uname`, `nama_lengkap`, `password`, `id_session`, `log_akhir`) VALUES
(1, '0', 'admin', 'Kepala Operator', '21232f297a57a5a743894a0e4a801fc3', 'bublr8n1m13g8bgddr92t8kk54', '2014-12-09 09:22:44'),
(2, '1', 'operator', 'Staf Operator', '21232f297a57a5a743894a0e4a801fc3', 'n446nlrhtb157u19vuc3klvss2', '2014-09-08 09:51:45');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
