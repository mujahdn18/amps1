-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2021 at 07:17 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengelolaan_bpdashl`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_absen`
--

CREATE TABLE `tb_absen` (
  `id_absen` int(11) NOT NULL,
  `kode_absen` varchar(50) NOT NULL,
  `tgl_absen` date NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `masuk` int(5) DEFAULT NULL,
  `telat` int(5) DEFAULT NULL,
  `izin` int(5) DEFAULT NULL,
  `sakit` int(5) DEFAULT NULL,
  `lembur` int(5) DEFAULT NULL,
  `jml_masuk` int(11) NOT NULL,
  `jml_telat` int(11) NOT NULL,
  `jml_izin` int(11) NOT NULL,
  `jml_sakit` int(11) NOT NULL,
  `jml_lembur` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_absen`
--

INSERT INTO `tb_absen` (`id_absen`, `kode_absen`, `tgl_absen`, `id_pegawai`, `masuk`, `telat`, `izin`, `sakit`, `lembur`, `jml_masuk`, `jml_telat`, `jml_izin`, `jml_sakit`, `jml_lembur`, `total`) VALUES
(2, '001', '2020-06-09', 3, 29, 0, 1, 0, 7, 435000, 0, 5000, 0, 70000, 510000),
(3, '002', '2020-06-18', 4, 23, 4, 2, 1, 4, 345000, 28000, 10000, 6000, 40000, 429000),
(4, '003', '2020-06-23', 6, 30, 0, 0, 0, 5, 450000, 0, 0, 0, 50000, 500000),
(6, '004', '2020-07-21', 8, 12, 12, 6, 0, 0, 180000, 84000, 30000, 0, 0, 294000),
(7, '005', '2020-07-23', 7, 28, 0, 2, 0, 5, 420000, 0, 10000, 0, 50000, 480000),
(9, '006', '2020-08-29', 5, 22, 6, 1, 0, 4, 330000, 42000, 5000, 0, 40000, 417000),
(10, '010', '2020-08-29', 15, 28, 1, 1, 0, 7, 420000, 7000, 5000, 0, 70000, 502000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggaran`
--

CREATE TABLE `tb_anggaran` (
  `id_anggaran` int(11) NOT NULL,
  `no_anggaran` varchar(50) NOT NULL,
  `jumlah_uangpl` double NOT NULL,
  `jumlah_uangnonpl` double NOT NULL,
  `id_ppk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_anggaran`
--

INSERT INTO `tb_anggaran` (`id_anggaran`, `no_anggaran`, `jumlah_uangpl`, `jumlah_uangnonpl`, `id_ppk`) VALUES
(5, '2137', 200000, 500000, 4),
(6, '3563', 12, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id_berita` int(11) NOT NULL,
  `judul_berita` varchar(200) NOT NULL,
  `tgl_berita` date NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `isi_berita` text NOT NULL,
  `foto_berita` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_berita`
--

INSERT INTO `tb_berita` (`id_berita`, `judul_berita`, `tgl_berita`, `id_pegawai`, `isi_berita`, `foto_berita`) VALUES
(1, 'MENGARUSUTAMAKAN PENGELOLAAN DAS GUNA MENDUKUNG REVOLUSI HIJAU BANUA DI PROVINSI KALIMANTAN SELATAN', '2020-06-25', 11, 'Di tempat hotel HBI Kota Banjarmasin, pada hari Kamis hingga Jumat tanggal 23 dan 24 Februari 2017, Balai Pengelolaan DAS Hutan Lindung Barito menyelenggarakan Rapat Koordinasi Pengelolaan DAS dan Hutan Lindung untuk lingkup Wilayah Kerja DAS Barito yang meliputi Kalimantan Selatan (45,5%) dan Kalimantan Tengah (54%) serta sedikit di Kalimantan Barat (0,3%) dan Kalimantan Timur (0,17%). Luas keseluruhan DAS Barito yaitu pada kisaran 8,1 juta hektar yang membentang dari utara (Pegunungan Muller, Pegunungan Schwaner) hingga selatan (Pegunungan Meratus, dataran fluvial, dataran gambut, dataran pantai, perbukitan karst). Adapun wilayah administrasi yang masuk dalam cakupan DAS Barito meliputi 17 kab/kota, baik di Prov. Kalimantan Selatan maupun Prov. Kalimantan Tengah.\r\n            Pada acara tersebut dirangkai dengan penandatanganan dokumen Perjanjian Kerjasama (PKS) dengan beberapa pihak yaitu Dinas Kehutanan (Dishut) Prop. Kalimantan Selatan, Dinas Pendidikan dan Kebudayaan (Disdikbud) Prop. Kalimantan Selatan, Kanwil Kementerian Agama (Kanwil Kemenag) Prop. Kalimantan Selatan dan Fakultas Kehutanan (Fahutan) ULM. Adapun PKS tersebut guna percepatan program Penanaman Pohon Oleh Para Pihak yang selaras dengan kebijakan Gubernur Kalimantan Selatan yaitu Revolusi Hijau. Sasaran PKS penanaman pohon tersebut meliputi Pemangku Wilayah Kesatuan Pengelolaan Hutan (KPH), baik Hutan Lindung maupun Hutan Produksi; para peserta didik, tenaga pendidik maupun tenaga kependidikan Tingkat SMA; para calon pengantin dan pegawai KUA; serta para mahasiswa maupun tenaga pengajar di Fahutan ULM. Diharapkan lahan tanam telah dipersiapkan oleh para pihak berikut pemeliharaan pohonnya sedangkan bibit pohon disediakan oleh BPDASHL Barito melalui Persemaian Permanen yang berada di Banjarbaru, Kotabaru dan Kandangan.\r\n            Sedangkan operasional ketiga Persemaian Permanen tersebut melalui Perjanjian Kerjasama pula antara BPDASHL Barito dengan pihak Balai Penelitian dan Pengembangan Lingkungan Hidup dan Kehutanan (BP2LHK) Banjarbaru, Dinas Lingkungan Hidup (DLH) Kab. Kotabaru dan Sekretariat Daerah (Setda) Kab. Hulu Sungai Selatan. Kapasitas produksi bibit pohon untuk tahun 2017 ini ditargetkan sejumlah +2,25 juta batang yang melayani berbagai pihak termasuk masyarakat luas. BPDASHL Barito juga bertugas menjamin ketersediaan bibit yang berkualitas sebagai prasyarat keberhasilan pembangunan hutan tanaman, baik untuk aktivitas produksi maupun rehabilitasi hutan/lahan. Bibit yang bermutu tinggi mempunyai daya adaptasi lebih, meningkatkan kualitas tegakan, tahan terhadap hama penyakit serta memperpendek daur pemanenan.\r\n            Sesuai arahan Direktur Perbenihan Tanaman Hutan Ditjen PDASHL KemenLHK bahwa lahan kritis di wilayah kerja BPDASHL Barito seluas +1,2 juta ha  diupayakan untuk dikendalikan. Penanaman pohon diharapkan dapat menghambat laju degradasi lahan pada DAS Barito untuk peningkatan kesehatan DAS, peningkatan mutu lingkungan dan menambah ekonomi masyarakat, misalnya dengan pemanfaatan hasil tanaman berupa buah, bunga, biji, kayu, oksigen, air dan estetikanya (ekowisata). Budaya menanam dan pelihara pohon perlu selalu ditumbuhkan dan dibina guna mendukung kegiatan rehabilitasi hutan/lahan pada tiap propinsi, khususnya Prop. Kalimantan Selatan melalui Gerakan Penanaman Pohon “Revolusi Hijau, Menanam dan Menanam Untuk Anak Cucu Kita”.\r\n            Adapun kesimpulan dari Rapat Koordinasi Pengelolaan DAS Hutan Lindung tersebut adalah :\r\n            1. Keberhasilan tanaman ditentukan oleh kualitas jenis bibit tanaman serta tingkat kesesuaian jenis tanaman, baik di dalam maupun di luar kawasan hutan; yang mempertimbangkan ekosistem, jenis tanah dan kondisi vegetasi awal sebagai unsur-unsur penyusun ekoregion setempat. Kualitas jenis bibit tanaman dapat didukung dengan penyediaan benih yang memadai melalui kultur jaringan, kebun benih, areal sumberdaya genetik serta kebun pangkas. Keberhasilan tanaman dengan usaha menjaga kualitas jenis bibit pada lahan yang sesuai diharapkan dapat menjadi pemasukan yang optimal bagi masyarakat sehingga dapat meningkatkan perekonomian setempat, bahkan meluas hingga kab/kota/provinsi setempat.\r\n            2. Tata kelola KPHL memiliki 4 pilar yaitu tata kelola hutan, tata kelola lingkungan, tata kelola sosial dan tata kelola usaha yang didukung dengan beberapa kegiatan BPDASHL meliputi fasilitasi pembangunan sarana prasarana, pembangungan resort, pembangunan sipil teknis (Bangunan Konservasi Tanah), mediasi resolusi konfliks, fasilitasi penyusunan/pengembangan bisnis komoditi, invent-ident hasil hutan bukan kayu dan pencegahan kebakaran hutan. Implementasi keempat tata kelola KPHL tersebut saat ini masih menemui kendala yang cukup signifikan dengan variasi permasalahannya namun para pengelola KPHL rata-rata memiliki semangat yang tinggi dalam berkarya demi terwujudnya pengelolaan KPHL yang ideal.\r\n            3. Revolusi Hijau yang telah dicanangkan Gubernur Kalimantan Selatan diharapkan dapat mengendalikan laju ekskalasi lahan kritis di wilayah DAS Barito dengan mengoptimalkan peran koordinasi Forum DAS Provinsi Kalimantan Selatan yang mencakup hampir seluruh SKPD Tingkat Provinsi Kalimantan Selatan, khususnya BAPPEDA Prov. Kalimantan Selatan, yang dapat diawali dengan penyusunan Pedoman selanjutnya Juklak, Juknis hingga Manual bagi instansi pemerintah, swasta, kelompok masyarakat, lembaga swadaya hingga perorangan.', '15782_highres.jpg'),
(4, 'CAPAIAN BAIK BAGI GUBERNUR KALIMANTAN SELATAN, WALIKOTA BANJARBARU DAN PT. TUNAS INTI ABADI DALAM GIAT HMPI NASIONAL 9 DESEMBER 2017 DI YOGYAKARTA', '2020-06-22', 4, 'Pengelolaan sumberdaya alam seringkali dibatasi oleh batas-batas yang bersifat politis/administratif, padahal proses-proses alam seperti banjir, tanah longsor, serta degradasi lingkungan seperti erosi dan sedimentasi tidak mengenal batas-batas politis, tetapi berlangsung mengikuti batas-batas Daerah Aliran Sungai (DAS).  Disamping itu kegiatan pengelolaan sumber daerah hilir.  Dengan demikian Pengelolaan DAS harus dilakukan melalui pendekatan ekosistem, berdasarkan prinsip “one river, one plan, and one management atau satu sungai, satu rencana, dan satu pengelolaan” yang artinya Satu sungai (dalam arti DAS) merupakan kesatuan wilayah hidrologi yang dapat mencakup beberapa wilayah administratif yang ditetapkan sebagai satu kesatuan wilayah pengelolaan yang tidak dapat dipisah-pisahkan.\r\n            Rusaknya sumberdaya hutan yang telah terjadi hingga saat ini menimbulkan dampak yang cukup luas, meliputi aspek lingkungan, ekonomi, kelembagaan dan sosial politik.  Aktivitas perambahan dan penyerobotan lahan hutan, akan menyebabkan deforestasi dan memacu terjadinya bencana alam. Oleh sebab itu, Pengelolaan sumberdaya alam harus memperhatikan prinsip-prinsip dasar dalam Pengelolaan Daerah Aliran Sungai (DAS).\r\n            Berdasarkan hasil updating data lahan kritis tahun 2003, luas lahan kritis di Provinsi Kalimantan Selatan tercatat seluas 555.983 Ha, dimana seluas 364,850.72 berada di Dalam Kawasan Hutan dan 191,132.28 Ha berada di Luar Kawasan Hutan.  Selanjutnya hasil updating pada tahun 2009, luas lahan kritis di Kalimantan Selatan meningkat menjadi 761,042.6 Ha.\r\n            Luasan lahan kritis di Indonesia berdasarkan Penetapan Peta Dan Data Hutan Dan Lahan Kritis Tahun 2011 yang ditetapkan dengan Keputusan Menteri Kehutanan RI Nomor SK. 781/Menhut-II/2012 adalah seluas 27.290.000 Ha yaitu terdiri dari 22.020.000 Ha dengan kategori kritis sampai dengan sangat kritis dan 5.270.000 Ha dengan kategori agak kritis.  Lahan kritis tersebut tersebar disemua fungsi kawasan hutan yang menjadi ancaman yang cukup serius bagi daya dukung DAS baik fungsinya sebagai penyangga kehidupan maupun fungsi hidrologis DAS.\r\n            Untuk 4 (empat) Kabupaten di Provinsi Kalimantan Tengah yaitu Kab. Barito Timur, Barito Selatan, Barito Utara dan Murung Raya, berdasarkan hasil review Lahan kritis tahun 2007, luas lahan yang termasuk kategori kritis tercatat seluas 296.545 ha, sedangkan pada tahun 2009 luas lahan kritis di wilayah Kalimantan Tengah ini meningkat menjadi seluas 464.958,7 ha.\r\n            Peningkatan kualitas Daerah Aliran Sungai (DAS) dapat dilakukan antara lain melalui program Rehabilitasi Hutan dan Lahan (RHL). Program RHL terlaksana dengan baik apabila informasi obyektif kondisi hutan dan lahan sasaran RHL teridentifikasi secara menyeluruh. Maka ketersediaan informasi mengenai jumlah dan distribusi lahan kritis yang akurat dan informatif mempunyai arti yang sangat penting. Sebagai bagian dari konsistensi pelaksanaan tugas pokok dan fungsi tersebut, maka updating data lahan kritis tersebut akan terus menerus dilakukan, dengan mengacu kepada kriteria dan standar baku penetapan dan pengolahan data lahan kritis.', 'media-persemaian.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cuti`
--

CREATE TABLE `tb_cuti` (
  `id_cuti` int(11) NOT NULL,
  `tgl_cuti` date NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `jangka_hari` int(5) NOT NULL,
  `dari_tgl` date NOT NULL,
  `sampai_tgl` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_cuti`
--

INSERT INTO `tb_cuti` (`id_cuti`, `tgl_cuti`, `perihal`, `id_pegawai`, `jangka_hari`, `dari_tgl`, `sampai_tgl`, `keterangan`) VALUES
(2, '2020-09-10', 'Cuti Bersalin', 5, 3, '2020-09-28', '2020-09-30', 'Cuti Bersalin Anak ke dua'),
(3, '2020-10-11', 'Cuti Sakit', 6, 7, '2020-09-17', '2020-09-21', 'Sakit Radang Tenggorokan'),
(4, '2020-09-12', 'Cuti karena alasan penting', 4, 5, '2020-09-19', '2020-09-24', 'Melaksanakan umroh');

-- --------------------------------------------------------

--
-- Table structure for table `tb_eselon`
--

CREATE TABLE `tb_eselon` (
  `id_eselon` int(11) NOT NULL,
  `eselon` varchar(50) NOT NULL,
  `tunjangan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_eselon`
--

INSERT INTO `tb_eselon` (`id_eselon`, `eselon`, `tunjangan`) VALUES
(1, 'I A', 5500000),
(2, 'I B', 4375000),
(3, 'II A', 3250000),
(4, 'II B', 2025000),
(5, 'III A', 1260000),
(6, 'III B', 980000),
(7, 'IV A', 540000),
(8, 'IV B', 490000),
(9, 'V A', 360000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_gaji`
--

CREATE TABLE `tb_gaji` (
  `id_gaji` int(11) NOT NULL,
  `tgl_gaji` date NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tj_istri` int(11) NOT NULL,
  `tj_anak` int(11) NOT NULL,
  `jml_1` int(11) NOT NULL,
  `tj_beras` int(11) NOT NULL,
  `tj_pajak` int(11) NOT NULL,
  `jml_kotor` int(11) NOT NULL,
  `pot_pajak` int(11) NOT NULL,
  `pot_iwp` int(11) NOT NULL,
  `pot_taperum` int(11) NOT NULL,
  `jml_pot` int(11) NOT NULL,
  `total_gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_gaji`
--

INSERT INTO `tb_gaji` (`id_gaji`, `tgl_gaji`, `id_pegawai`, `tj_istri`, `tj_anak`, `jml_1`, `tj_beras`, `tj_pajak`, `jml_kotor`, `pot_pajak`, `pot_iwp`, `pot_taperum`, `jml_pot`, `total_gaji`) VALUES
(12, '2020-08-01', 3, 344720, 551552, 4343472, 275776, 34472, 10153720, 34472, 344720, 10000, 389192, 9764528),
(13, '2020-08-01', 4, 330730, 264584, 3902614, 264584, 33073, 5180271, 33073, 330730, 10000, 373803, 4806468),
(16, '2020-09-01', 3, 344720, 551552, 4343472, 275776, 34472, 10153720, 34472, 344720, 10000, 389192, 9764528),
(17, '2020-09-01', 4, 330730, 264584, 3902614, 264584, 33073, 5180271, 33073, 330730, 10000, 373803, 4806468),
(19, '2020-09-02', 7, 211880, 254256, 2584936, 169504, 21188, 7150628, 21188, 211880, 10000, 243068, 6907560),
(20, '2020-09-03', 6, 317310, 507696, 3998106, 253848, 31731, 5263685, 31731, 317310, 10000, 359041, 4904644),
(21, '2020-08-29', 16, 0, 0, 2802300, 224184, 28023, 3594507, 28023, 280230, 10000, 318253, 3276254);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelurahan`
--

CREATE TABLE `tb_kelurahan` (
  `nik` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `keperluan` varchar(100) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_mata_air`
--

CREATE TABLE `tb_mata_air` (
  `id_mata_air` int(11) NOT NULL,
  `nama_mata_air` varchar(50) NOT NULL,
  `ph_air` varchar(50) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `jarak` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mata_air`
--

INSERT INTO `tb_mata_air` (`id_mata_air`, `nama_mata_air`, `ph_air`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `jarak`) VALUES
(1, 'haratai', '9', 'Haratai', 'Loksado', 'Hulu Sungai Selatan', 'Kalimantan Selatan', '50 Km'),
(2, 'Pulau Laut Timur', '8.5', 'Pulau Laut Timur', 'Pulau Laut', 'Kotabaru gg', 'Kalimantan Selatan', '45 Km');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pangkat`
--

CREATE TABLE `tb_pangkat` (
  `id_pangkat` int(11) NOT NULL,
  `pangkat` varchar(50) NOT NULL,
  `gapok` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pangkat`
--

INSERT INTO `tb_pangkat` (`id_pangkat`, `pangkat`, `gapok`) VALUES
(1, 'Juru Muda / Ia', 1660800),
(2, 'Pengatur Muda / IIa', 2118800),
(3, 'Penata Muda / IIIa', 2579400),
(4, 'Pembina / IVa', 3044300),
(6, 'Juru Muda Tingkat I / Ib', 1704500),
(7, 'Pengatur Muda Tingkat I / IIb', 2208400),
(8, 'Penata Muda Tingkat I / IIIb', 2688500),
(9, 'Pembina Tingkat I / IVb', 3173100),
(10, 'Juru / Ic', 1776600),
(11, 'Pengatur / IIc', 2301800),
(12, 'Penata / IIIc', 2802300),
(13, 'Pembina Utama Muda / IVc', 3307300),
(14, 'Juru Tingkat I / Id', 1851800),
(15, 'Pengatur Tingkat I / IId', 2399200),
(16, 'Penata Tingkat I / IIId', 2920800),
(17, 'Pembina Utama / IVd', 3447200);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `status_nikah` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `negara` varchar(20) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `id_pangkat` int(11) NOT NULL,
  `seksi` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(200) NOT NULL,
  `istri` int(5) NOT NULL,
  `anak` int(5) NOT NULL,
  `id_eselon` int(5) NOT NULL,
  `id_sd` int(11) NOT NULL,
  `id_smp` int(11) NOT NULL,
  `id_sma` int(11) NOT NULL,
  `id_pt1` int(11) NOT NULL,
  `id_pt2` int(11) NOT NULL,
  `id_pt3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id_pegawai`, `nip`, `nama_pegawai`, `tgl_lahir`, `status_nikah`, `email`, `negara`, `jenis_kelamin`, `jabatan`, `id_pangkat`, `seksi`, `no_hp`, `alamat`, `foto`, `istri`, `anak`, `id_eselon`, `id_sd`, `id_smp`, `id_sma`, `id_pt1`, `id_pt2`, `id_pt3`) VALUES
(3, '19710927 199803 1 005', 'Dr. M. Zainal Arifin, S.Hut. M.Si', '1975-02-11', 'Menikah', 'mzainalarifin1102@gmail.com', 'Indonesia', 'Laki-laki', 'Ketua Balai', 17, 'Tata Usaha', '085732762345', 'Sungai Ulin Banjarbaru', 'Untitled.png', 1, 4, 1, 2, 1, 1, 4, 2, 2),
(4, '19710927 200103 1 012', 'Fauzi, S.Hut. M.Hut', '1980-05-15', 'Menikah', 'fauziaja@gmail.com', 'Indonesia', 'Laki-laki', 'Ketua Tata Usaha', 13, 'Tata Usaha', '081233653289', 'Ratu Elok Banjarbaru', 'Untitled2.png', 1, 2, 6, 3, 2, 2, 5, 3, 1),
(5, '19710927 200224 1 001', 'Nuning, S.Hut. M.Hut', '1977-07-21', 'Menikah', 'nuningimutzz@gmail.com', 'Indonesia', 'Perempuan', 'Ketua Keuangan', 4, 'Keuangan', '082267451267', 'Loktabat Selatan Banjarbaru', 'Untitled3.png', 1, 3, 7, 6, 5, 5, 8, 6, 1),
(6, '19670997 199901 1 022', 'Bambang Angkoso, S.Hut. M.Hut', '1981-09-29', 'Menikah', 'bbng0345@yahoo.com', 'Indonesia', 'Laki-laki', 'Ketua Program', 9, 'Program', '088765325170', 'Balitan Banjarbaru', 'Untitled5.png', 1, 4, 6, 4, 3, 3, 6, 4, 1),
(7, '18710927 199576 1 004', 'Rahmat Mustafa, S.Hut. M.Hut', '0000-00-00', '', '', '', 'Laki-laki', 'Ketua RHL', 2, 'RHL', '085687543209', 'Cindai Alus', 'Untitled6.png', 1, 3, 2, 0, 0, 0, 0, 0, 0),
(8, '19810027 199901 1 027', 'Nolianto Subadri, S.Hut. M.Hut', '0000-00-00', '', '', '', 'Laki-laki', 'Ketua Evaluasi', 2, 'Evaluasi', '081287436519', 'Martapura', 'Untitled8.png', 1, 1, 2, 0, 0, 0, 0, 0, 0),
(9, '19784327 200203 1 015', 'Abdul Gofur, S.Hut', '0000-00-00', '', '', '', 'Laki-laki', 'Kelengkapan Tata Usaha', 4, 'Tata Usaha', '087865433787', 'Gambut', 'Untitled7.png', 1, 2, 4, 0, 0, 0, 0, 0, 0),
(10, '19752967 199903 1 011', 'Wahyu Ikhwani, S.Hut', '0000-00-00', '', '', '', 'Laki-laki', 'Pejabat Penanggung Jawab Tata Usaha', 3, 'Tata Usaha', '082147483647', 'Karang Intan', 'Untitled10.png', 1, 2, 3, 0, 0, 0, 0, 0, 0),
(11, '19910525 198843 1 112', 'Ayu Lestari, S.Hut', '0000-00-00', '', '', '', 'Perempuan', 'Pejabat Penanggung Jawab Program', 3, 'Program', '082287439087', 'Cempaka', 'Untitled11.png', 1, 2, 3, 0, 0, 0, 0, 0, 0),
(12, '19740827 199721 1 000', 'Arum Julianti, S.Hut', '0000-00-00', '', '', '', 'Perempuan', 'Pejabat Penanggung Jawab Evaluasi', 3, 'Evaluasi', '085787900723', 'Jl. Panglima Batur', 'Untitled9.png', 1, 3, 3, 0, 0, 0, 0, 0, 0),
(15, '19710927 199803 1 005', 'Widya Azka Dina S.Kom', '2020-08-04', 'Belum Menikah', 'bbng0345@yahoo.com', 'Indonesia', 'Perempuan', 'Pejabat Pertanggung Jawab', 12, 'Tata Usaha', '23123131', 'BJB', 'Untitled11.png', 0, 0, 5, 7, 6, 6, 9, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pejabat`
--

CREATE TABLE `tb_pejabat` (
  `id_pejabat` int(11) NOT NULL,
  `nama_pejabat` varchar(50) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `seksi_pejabat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pejabat`
--

INSERT INTO `tb_pejabat` (`id_pejabat`, `nama_pejabat`, `nip`, `jabatan`, `seksi_pejabat`) VALUES
(1, 'Widyaningsih S.Hut', '19529867 266413 1 134', 'Pejabat Penanggung Jawab', 'Seksi Program'),
(2, 'Lili suherman S.Hut', '19609127 200533 1 220', 'Pejabat Pertanggung Jawab', 'Seksi Evaluasi'),
(3, 'M. Deffan  S.Hut', '19678927 200781 1 109', 'Pejabat Pertanggung Jawab', 'Seksi RHL'),
(4, 'Aryani Novita Sari S.M', '20200764 202003 1 088', 'Pejabat Pertanggung Jawab', 'Keuangan'),
(5, 'Susi Rosana S.H', '20190955 201923 1 227', 'Pejabat Pertanggung Jawab', 'Tata Usaha');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pimpinan`
--

CREATE TABLE `tb_pimpinan` (
  `id_pimpinan` int(11) NOT NULL,
  `nama_pimpinan` varchar(50) NOT NULL,
  `nip_pimpinan` varchar(50) NOT NULL,
  `id_pangkat` int(11) NOT NULL,
  `alamat_pimpinan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pimpinan`
--

INSERT INTO `tb_pimpinan` (`id_pimpinan`, `nama_pimpinan`, `nip_pimpinan`, `id_pangkat`, `alamat_pimpinan`) VALUES
(6, 'Gustian', '123123', 2, 'Marabahan'),
(7, 'Beni', '121323', 3, 'Rantau'),
(8, 'Akbar', '12345', 9, 'BJB');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ppk`
--

CREATE TABLE `tb_ppk` (
  `id_ppk` int(11) NOT NULL,
  `nama_ppk` varchar(50) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `seksi_ppk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ppk`
--

INSERT INTO `tb_ppk` (`id_ppk`, `nama_ppk`, `nip`, `seksi_ppk`) VALUES
(1, 'Fauzi, S.Hut. M.Hut', '19710927 200103 1 012', 'Seksi Tata Usaha'),
(2, 'Bambang Angkoso, S.Hut. M.Hut', '19670997 199901 1 022', 'Seksi Program'),
(3, 'Nolianto Subadri, S.Hut. M.Hut', '19810027 199901 1 027', 'Seksi Evaluasi'),
(4, 'Rahmat Mustafa, S.Hut. M.Hut', '18710927 199576 1 004', 'Seksi RHL');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rppt1`
--

CREATE TABLE `tb_rppt1` (
  `id_pt1` int(11) NOT NULL,
  `namaorg_pt1` varchar(50) NOT NULL,
  `dthn_pt1` varchar(4) NOT NULL,
  `sthn_pt1` varchar(4) NOT NULL,
  `noijazah_pt1` varchar(50) NOT NULL,
  `nama_pt1` varchar(100) NOT NULL,
  `kota_pt1` varchar(50) NOT NULL,
  `fileijazah_pt1` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rppt1`
--

INSERT INTO `tb_rppt1` (`id_pt1`, `namaorg_pt1`, `dthn_pt1`, `sthn_pt1`, `noijazah_pt1`, `nama_pt1`, `kota_pt1`, `fileijazah_pt1`) VALUES
(1, '- Tidak Ada -', '-', '-', '-', '-', '-', '-'),
(4, 'M. Zainal Arifin, S.Hut', '1994', '1998', '76349867321', 'Universitas Lambung Mangkurat', 'Banjarmasin', 'ijazahPT.pdf'),
(5, 'Fauzi S.Hut', '1999', '2003', '54678712097', 'Universitas Lambung Mangkurat', 'Banjarbaru', 'ijazahPT.pdf'),
(6, 'Bambang Angkoso S.Hut', '2000', '2004', '65230956431', 'Universitas Lambung Mangkurat', 'Banjarbaru', 'ijazahPT.pdf'),
(7, 'Rahmat Mustafa S.Hut', '1993', '1997', '09678756879', 'Universitas Lambung Mangkurat', 'Banjarmasin', 'ijazahPT.pdf'),
(8, 'Nuning S.Hut', '1997', '2001', '54238765431', 'Universitas Lambung Mangkurat', 'Banjarmasin', 'ijazahPT.pdf'),
(9, 'muja s.kom', '2012', '2016', '7457323746', 'uniska', 'banjarbaru', 'ijazahPT.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rppt2`
--

CREATE TABLE `tb_rppt2` (
  `id_pt2` int(11) NOT NULL,
  `namaorg_pt2` varchar(50) NOT NULL,
  `dthn_pt2` varchar(4) NOT NULL,
  `sthn_pt2` varchar(4) NOT NULL,
  `noijazah_pt2` varchar(50) NOT NULL,
  `nama_pt2` varchar(100) NOT NULL,
  `kota_pt2` varchar(50) NOT NULL,
  `fileijazah_pt2` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rppt2`
--

INSERT INTO `tb_rppt2` (`id_pt2`, `namaorg_pt2`, `dthn_pt2`, `sthn_pt2`, `noijazah_pt2`, `nama_pt2`, `kota_pt2`, `fileijazah_pt2`) VALUES
(1, '- Tidak Ada -', '-', '-', '-', '-', '-', '-'),
(2, 'M. Zainal Arifin, S.Hut. M.Hut', '1998', '2000', '14343267090', 'Universitas Gajah Mada', 'Yogyakarta', 'ijazahPT.pdf'),
(3, 'Fauzi, S.Hut. M.Hut', '2003', '2005', '16756387980', 'Universitas Mulawarman', 'Samarinda', 'ijazahPT.pdf'),
(4, 'Bambang Angkoso, S.Hut. M.Hut', '2006', '2008', '12095409870', 'Universitas Gajah Mada', 'Yogyakarta', 'ijazahPT.pdf'),
(5, 'Rahmat Mustafa, S.Hut. M.Hut', '2000', '2002', '10984532785', 'Universitas Gajah Mada', 'Yogyakarta', 'ijazahPT.pdf'),
(6, 'Nuning, S.Hut. M.Hut', '2002', '2005', '10984532897', 'Universitas Mulawarman', 'Samarinda', 'ijazahPT.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rppt3`
--

CREATE TABLE `tb_rppt3` (
  `id_pt3` int(11) NOT NULL,
  `namaorg_pt3` varchar(50) NOT NULL,
  `dthn_pt3` varchar(4) NOT NULL,
  `sthn_pt3` varchar(4) NOT NULL,
  `noijazah_pt3` varchar(50) NOT NULL,
  `nama_pt3` varchar(100) NOT NULL,
  `kota_pt3` varchar(50) NOT NULL,
  `fileijazah_pt3` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rppt3`
--

INSERT INTO `tb_rppt3` (`id_pt3`, `namaorg_pt3`, `dthn_pt3`, `sthn_pt3`, `noijazah_pt3`, `nama_pt3`, `kota_pt3`, `fileijazah_pt3`) VALUES
(1, '- Tidak Ada -', '-', '-', '-', '-', '-', '-'),
(2, 'Dr. M. Zainal Arifin, S.Hut. M.Si', '2000', '2002', '567645', 'UNINDRA', 'Indramayu', 'ijazahPT.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rpsd`
--

CREATE TABLE `tb_rpsd` (
  `id_sd` int(11) NOT NULL,
  `namaorg_sd` varchar(50) NOT NULL,
  `dthn_sd` varchar(4) NOT NULL,
  `sthn_sd` varchar(4) NOT NULL,
  `noijazah_sd` varchar(50) NOT NULL,
  `nama_sd` varchar(100) NOT NULL,
  `kota_sd` varchar(50) NOT NULL,
  `fileijazah_sd` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rpsd`
--

INSERT INTO `tb_rpsd` (`id_sd`, `namaorg_sd`, `dthn_sd`, `sthn_sd`, `noijazah_sd`, `nama_sd`, `kota_sd`, `fileijazah_sd`) VALUES
(2, 'M. Zainal Arifin', '1982', '1988', '67646543437', 'SDN 1 Loktabat', 'Banjarbaru', 'ijazahSD.pdf'),
(3, 'Fauzi', '1987', '1993', '35373574346', 'SDN 5 Mataraman', 'Banjar', 'ijazahSD.pdf'),
(4, 'Bambang Angkoso', '1988', '1994', '34537635246', 'SDN 2 Cempaka', 'Banjarbaru', 'ijazahSD.pdf'),
(5, 'Rahmat Mustafa', '1981', '1987', '45456765432', 'SDN 1 Martapura', 'Banjar', 'ijazahSD.pdf'),
(6, 'Nuning', '1985', '1991', '85632864322', 'SDN 3 Martapura', 'Banjar', 'ijazahSD.pdf'),
(7, 'muja', '2000', '2006', '7632341541', 'SDN sungkai Baru', 'Banjar', 'ijazahSD.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rpsma`
--

CREATE TABLE `tb_rpsma` (
  `id_sma` int(11) NOT NULL,
  `namaorg_sma` varchar(50) NOT NULL,
  `dthn_sma` varchar(4) NOT NULL,
  `sthn_sma` varchar(4) NOT NULL,
  `noijazah_sma` varchar(50) NOT NULL,
  `nama_sma` varchar(100) NOT NULL,
  `kota_sma` varchar(50) NOT NULL,
  `fileijazah_sma` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rpsma`
--

INSERT INTO `tb_rpsma` (`id_sma`, `namaorg_sma`, `dthn_sma`, `sthn_sma`, `noijazah_sma`, `nama_sma`, `kota_sma`, `fileijazah_sma`) VALUES
(1, 'M. Zainal Arifin', '1991', '1994', '3454', 'SMA 1 Loktabat', 'Banjarbaru', 'ijazahSMA.pdf'),
(2, 'Fauzi', '1996', '1999', '45672801458', 'SMA 1 Martapura', 'Banjar', 'ijazahSMA.pdf'),
(3, 'Bambang Angkoso', '1997', '2000', '0967542389', 'SMA 3 Banjarbaru', 'Banjarbaru', 'ijazahSMA.pdf'),
(4, 'Rahmat Mustafa', '1990', '1994', '21346578098', 'SMA 2 Martapura', 'Banjar', 'ijazahSMA.pdf'),
(5, 'Nuning', '1994', '1997', '65230967541', 'SMA 1 Martapura', 'Banjar', 'ijazahSMA.pdf'),
(6, 'muja', '2009', '2001', '5123512735', 'MAN 2 Rantau', 'Rantau', 'ijazahSMA.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rpsmp`
--

CREATE TABLE `tb_rpsmp` (
  `id_smp` int(11) NOT NULL,
  `namaorg_smp` varchar(50) NOT NULL,
  `dthn_smp` varchar(4) NOT NULL,
  `sthn_smp` varchar(4) NOT NULL,
  `noijazah_smp` varchar(50) NOT NULL,
  `nama_smp` varchar(100) NOT NULL,
  `kota_smp` varchar(50) NOT NULL,
  `fileijazah_smp` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rpsmp`
--

INSERT INTO `tb_rpsmp` (`id_smp`, `namaorg_smp`, `dthn_smp`, `sthn_smp`, `noijazah_smp`, `nama_smp`, `kota_smp`, `fileijazah_smp`) VALUES
(1, 'M. Zainal Arifin', '1988', '1991', '56239087321', 'SMP 1 Loktabat', 'Banjarbaru', 'ijazahSMP.pdf'),
(2, 'Fauzi', '1993', '1996', '54643981456', 'SMP 2 Mataraman', 'Banjar', 'ijazahSMP.pdf'),
(3, 'Bambang Angkoso', '1994', '1997', '43982190674', 'SMP 1 Cempaka', 'Banjarbaru', 'ijazahSMP.pdf'),
(4, 'Rahmat Mustafa', '1987', '1990', '97370361945', 'SMP 3 Martapura', 'Banjar', 'ijazahSMP.pdf'),
(5, 'Nuning', '1991', '1994', '50726792709', 'SMP 3 Martapura', 'Banjar', 'ijazahSMP.pdf'),
(6, 'muja', '2006', '2009', '651326751', 'MTS Datu Aling', 'Rantau', 'ijazahSMP.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sk`
--

CREATE TABLE `tb_sk` (
  `id_sk` int(11) NOT NULL,
  `no_surat_sk` varchar(50) NOT NULL,
  `tgl_surat` date NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `perihal` text NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `klasifikasi_arsip` varchar(50) NOT NULL,
  `unit_pengolah` varchar(50) NOT NULL,
  `dt_surat_masuk` varchar(50) NOT NULL,
  `eselon` varchar(50) NOT NULL,
  `filepdf` varchar(200) NOT NULL,
  `sifat_surat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sk`
--

INSERT INTO `tb_sk` (`id_sk`, `no_surat_sk`, `tgl_surat`, `id_pegawai`, `tujuan`, `perihal`, `jenis_surat`, `klasifikasi_arsip`, `unit_pengolah`, `dt_surat_masuk`, `eselon`, `filepdf`, `sifat_surat`) VALUES
(2, 'S.653/BPDASHL.BRT/EV/OTL.2/10/2020', '2020-06-09', 6, 'KEMENKUM HAM', 'perkelahian', 'Surat Khusus', 'RRM', 'BPDASHL Barito', 'Tidak', 'III', 'ijazahPT.pdf', 'Penting'),
(3, 'S.375/BPDASHL.BRT/TU/KEU.1/10/2020', '2020-06-10', 8, 'Kota Baru', 'penanaman mangrove', 'Surat Biasa', 'RRM', 'BPDASHL Barito', 'Tidak', 'II', 'SLIP GAJI.pdf', 'Rahasia'),
(5, 'S.112/BPDASHL.BRT////', '2020-08-29', 10, 'Banjarmasin', 'Pengecekan lahan', 'BA - BERITA ACARA', 'OTL.0-Organisasi', 'Program', 'Ya', 'IV', 'ijazahPT.pdf', 'Biasa'),
(7, 'S.1213213/BPDASHL.BRT////', '2020-09-11', 8, 'Banjarmasin', 'GG', 'LP - LAPORAN', 'OTL.2-Tata Laksana', 'Evaluasi', 'Tidak', 'IV', 'ijazahSD.pdf', 'Rahasia');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sm`
--

CREATE TABLE `tb_sm` (
  `id_sm` int(11) NOT NULL,
  `no_agenda` varchar(50) NOT NULL,
  `tgl_agenda` date NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `kode_surat` varchar(50) NOT NULL,
  `asal_surat` varchar(50) NOT NULL,
  `kelompok_asal` varchar(50) NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `tgl_surat` date NOT NULL,
  `perihal` text NOT NULL,
  `filepdf` varchar(200) NOT NULL,
  `lampiran` int(5) NOT NULL,
  `sifat_surat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sm`
--

INSERT INTO `tb_sm` (`id_sm`, `no_agenda`, `tgl_agenda`, `id_pegawai`, `kode_surat`, `asal_surat`, `kelompok_asal`, `tujuan`, `no_surat`, `tgl_surat`, `perihal`, `filepdf`, `lampiran`, `sifat_surat`) VALUES
(1, '120/BPDASHL.BRT/2019', '2020-09-11', 6, 'DAS', 'Hulu Sungai Selatan', 'Kandangan', 'Seksi RHL', '543/HAM.KDG/2019', '2020-06-10', 'minta bibit tanaman', 'ijazahPT.pdf', 3, 'Biasa'),
(2, '264/BPDASHL.BRT/2020', '2020-09-11', 8, 'DAS', 'Binuang', 'hatungun', 'Seksi Program', '656/BPOM.BGM/2020', '2020-06-09', 'minta bibit pohon karet', 'ijazahSMA.pdf', 2, 'Penting'),
(7, '123/BPDASHL.BRT/2020', '2020-09-11', 5, 'KEU', 'Hulu Sungai Selatan', 'Instansi Swasta', 'Keuangan', '123/KEU', '2020-08-31', 'Sosialisasi Kantor', 'ijazahSMP.pdf', 2, 'Rahasia'),
(9, '12309/BPDASHL.BRT/', '2020-09-11', 3, 'KAP', 'Hulu Sungai Selatan', 'Masyarakat', 'Keuangan', '37678', '2020-09-30', 'jj', 'ijazahPT.pdf', 3, 'Biasa'),
(10, '14123/BPDASHL.BRT/', '2020-09-11', 11, 'DTN', 'Binuang', 'Instansi Swasta', 'Evaluasi', '1999', '2020-09-07', 'GG', 'ijazahPT.pdf', 2, 'Rahasia'),
(11, '123/BPDASHL.BRT/', '2020-07-15', 11, 'HPL', 'binuang', 'Instansi Pemerintah', 'Keuangan', '656/BPOM.BGM/2020', '2020-07-09', 'jalan jalan', 'ijazahPT.pdf', 3, 'Penting'),
(12, '100/BPDASHL.BRT/', '2020-09-15', 11, 'DIK', 'binuang', 'Instansi Swasta', 'Program', '656', '2020-09-09', 'Rapat', 'ijazahPT.pdf', 3, 'Rahasia');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sp`
--

CREATE TABLE `tb_sp` (
  `id_sp` int(11) NOT NULL,
  `no_sp` varchar(50) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `tgl_sp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sp`
--

INSERT INTO `tb_sp` (`id_sp`, `no_sp`, `id_pegawai`, `keterangan`, `tgl_sp`) VALUES
(1, '25/HRD/III/2020', 7, 'Tidak masuk tanpa keterangan selama 2 minnggu berturut-turut', '2020-09-10'),
(3, '12/HRD//', 10, 'Tidak masuk selama 2 minggu tanpa alasan', '2020-10-11');

-- --------------------------------------------------------

--
-- Table structure for table `tb_spd`
--

CREATE TABLE `tb_spd` (
  `id_spd` int(11) NOT NULL,
  `no_surat_spd` varchar(50) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tingkat_biaya` varchar(5) NOT NULL,
  `id_spt` varchar(50) NOT NULL,
  `transportasi` varchar(50) NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `akun` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `tgl_surat_spd` date NOT NULL,
  `id_ppk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_spd`
--

INSERT INTO `tb_spd` (`id_spd`, `no_surat_spd`, `id_pegawai`, `tingkat_biaya`, `id_spt`, `transportasi`, `tujuan`, `akun`, `keterangan`, `tgl_surat_spd`, `id_ppk`) VALUES
(6, 'S.99/BPDASHL.Brt-1//SPD/', 11, 'B', '1e5eecb3-3863-4e2d-aaec-ee1b72c4054c', 'Mobil', 'Banjarbaru', '16735276352', 'Lancar', '2020-09-24', 2),
(7, 'S.88/BPDASHL.Brt-1//SPD/', 10, 'B', 'c3c0573e-13f5-4ae3-b5d5-6fde378d1915', 'Motor', 'Tanjung', '89764432354', '-', '2020-08-14', 1),
(8, 'S.120/BPDASHL.Brt-1//SPD/', 6, 'B', 'c4bdeba8-1876-4479-bce9-f28e2369f9c0', 'Mobil', 'Banjarmasin', '16735276352', 'Pengecekan lahan', '2020-08-29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_spj`
--

CREATE TABLE `tb_spj` (
  `id_spj` int(11) NOT NULL,
  `no_surat_spj` varchar(50) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_spt` varchar(50) NOT NULL,
  `id_ppk` int(11) NOT NULL,
  `id_pejabat` int(11) NOT NULL,
  `mak` varchar(50) NOT NULL,
  `jumlah_uang` double NOT NULL,
  `tgl_surat_spj` date NOT NULL,
  `id_spd` int(11) NOT NULL,
  `u_harian` double NOT NULL,
  `total_u_harian` double NOT NULL,
  `u_transportasi` double NOT NULL,
  `u_penginapan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_spj`
--

INSERT INTO `tb_spj` (`id_spj`, `no_surat_spj`, `id_pegawai`, `id_spt`, `id_ppk`, `id_pejabat`, `mak`, `jumlah_uang`, `tgl_surat_spj`, `id_spd`, `u_harian`, `total_u_harian`, `u_transportasi`, `u_penginapan`) VALUES
(6, '5162/UP//', 5, 'c3c0573e-13f5-4ae3-b5d5-6fde378d1915', 1, 1, '832488374 (RM) 99', 122121299, '2020-06-18', 0, 0, 0, 0, 0),
(7, '2133/UP//', 8, '1e5eecb3-3863-4e2d-aaec-ee1b72c4054c', 1, 1, '565465 (RM)', 1500000, '2020-06-19', 0, 0, 0, 0, 0),
(8, '12/UP//', 4, 'cc29a847-c2aa-45d9-8d91-ff9866e1ea3d', 3, 2, '565465 (RM)', 1000000, '2020-06-20', 0, 0, 0, 0, 0),
(12, '555/UP//', 6, '072da35d-bc7c-4367-8dd6-46b79a1a54cb', 1, 2, '832488374 (RM)', 1620000, '2020-06-27', 5, 360000, 720000, 600000, 300000),
(13, '1111/UP//', 8, '072da35d-bc7c-4367-8dd6-46b79a1a54cb', 2, 2, '565465 (RM)', 1850000, '2020-07-10', 5, 200000, 1400000, 150000, 300000),
(14, '4654/UP//', 8, '1e5eecb3-3863-4e2d-aaec-ee1b72c4054c', 2, 1, '832488374 (RM)', 81, '2020-07-10', 3, 12, 60, 11, 10),
(15, '8888/UP//', 4, '072da35d-bc7c-4367-8dd6-46b79a1a54cb', 1, 3, '565465 (RM)', 1600000, '2020-07-10', 5, 100000, 700000, 300000, 600000),
(16, '1/UP//', 6, '072da35d-bc7c-4367-8dd6-46b79a1a54cb', 1, 3, '545655 (XL)', 1250000, '2020-07-21', 7, 100000, 700000, 250000, 300000),
(17, '2/UP//', 4, '1e5eecb3-3863-4e2d-aaec-ee1b72c4054c', 3, 2, '2375427(RM)', 2050000, '2020-07-29', 6, 150000, 750000, 300000, 1000000),
(18, '4/UP//', 11, 'c3c0573e-13f5-4ae3-b5d5-6fde378d1915', 2, 1, '545655 (RM)', 500000, '2020-08-14', 7, 75000, 150000, 150000, 200000),
(19, '3/UP//', 11, 'c3c0573e-13f5-4ae3-b5d5-6fde378d1915', 2, 1, '2375427(RM)', 450000, '2020-08-14', 7, 50000, 100000, 100000, 250000),
(20, '12112/UP//', 3, 'cc29a847-c2aa-45d9-8d91-ff9866e1ea3d', 1, 2, '832488374 (RM)', 1350000, '2020-08-28', 7, 175000, 350000, 500000, 500000),
(21, '133/UP/07/20', 15, 'c4bdeba8-1876-4479-bce9-f28e2369f9c0', 1, 5, '565465 (RM)', 750000, '2020-08-29', 8, 100000, 300000, 250000, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_spjls`
--

CREATE TABLE `tb_spjls` (
  `id_spjls` int(11) NOT NULL,
  `id_spt` varchar(50) NOT NULL,
  `no_spm` varchar(50) NOT NULL,
  `tgl_spm` date NOT NULL,
  `seksi` varchar(50) NOT NULL,
  `jumlah_uang` double NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_spjls`
--

INSERT INTO `tb_spjls` (`id_spjls`, `id_spt`, `no_spm`, `tgl_spm`, `seksi`, `jumlah_uang`, `ket`) VALUES
(2, 'c3c0573e-13f5-4ae3-b5d5-6fde378d1915', '7832/6343625/2354', '2020-06-07', 'Tata Usaha', 6000000, 'ttd ppk tu'),
(3, '072da35d-bc7c-4367-8dd6-46b79a1a54cb', '25645/533/34782', '2020-06-09', 'Seksi Program', 3000000, 'ttd pkk program, ttd aldha');

-- --------------------------------------------------------

--
-- Table structure for table `tb_spjup`
--

CREATE TABLE `tb_spjup` (
  `id_spjup` int(11) NOT NULL,
  `no_kuitansi` varchar(50) NOT NULL,
  `no_drpp` varchar(50) NOT NULL,
  `seksi` varchar(50) NOT NULL,
  `keg` text NOT NULL,
  `jumlah_uang` double NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_spjup`
--

INSERT INTO `tb_spjup` (`id_spjup`, `no_kuitansi`, `no_drpp`, `seksi`, `keg`, `jumlah_uang`, `ket`) VALUES
(3, '2163', 'DRPP.3521/BPDASHL.Brt-1/6/2020', 'Seksi Program', 'pengecekan hutan mangrove', 3000000, 'ttd ppk program, ttd prgram evaluasi'),
(4, '32434', 'DRPP./BPDASHL.Brt-1//222', 'Keuangan', 'ftdgdfc', 1212121, 'sfdsdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_spt`
--

CREATE TABLE `tb_spt` (
  `id_spt` varchar(50) NOT NULL,
  `no_surat_spt` varchar(50) NOT NULL,
  `perihal` text NOT NULL,
  `jangka_waktu` int(5) NOT NULL,
  `dari_tgl` date NOT NULL,
  `sampai_tgl` date NOT NULL,
  `tgl_surat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_spt`
--

INSERT INTO `tb_spt` (`id_spt`, `no_surat_spt`, `perihal`, `jangka_waktu`, `dari_tgl`, `sampai_tgl`, `tgl_surat`) VALUES
('072da35d-bc7c-4367-8dd6-46b79a1a54cb', 'ST.23/BPDASHL.Brt-1/06/20209', 'pengecekan hutan mangrove kotabaru', 7, '2020-06-15', '2020-06-27', '2020-06-11'),
('1e5eecb3-3863-4e2d-aaec-ee1b72c4054c', 'ST.25/BPDASHL.Brt-1/6/2020', 'rapat kabalai', 5, '2020-06-20', '2020-06-25', '2020-06-15'),
('c3c0573e-13f5-4ae3-b5d5-6fde378d1915', 'ST.27/BPDASHL.Brt-1/09/2020', 'penanaman serentak bibit pohon cemara', 2, '2020-09-22', '2020-09-23', '2020-09-16'),
('c4bdeba8-1876-4479-bce9-f28e2369f9c0', 'ST.208/BPDASHL.Brt-1/07/20', 'Perjaanan dinas ke banjarmasin', 3, '2020-09-01', '2020-09-03', '2020-08-29'),
('cc29a847-c2aa-45d9-8d91-ff9866e1ea3d', 'ST.76/BPDASHL.Brt-1//', 'perjlanan dinas ke tanjung', 2, '2020-06-22', '2020-06-24', '2020-06-20'),
('e935b511-70a9-49fc-b170-ff204a7a812a', 'ST.123/BPDASHL.Brt-1//', 'Perjalanan dinas ke kotabaru', 2, '2020-09-10', '2020-09-11', '2020-09-07');

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat_pegawai`
--

CREATE TABLE `tb_surat_pegawai` (
  `id` int(11) NOT NULL,
  `id_spt` varchar(50) NOT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_surat_pegawai`
--

INSERT INTO `tb_surat_pegawai` (`id`, `id_spt`, `id_pegawai`) VALUES
(45, '072da35d-bc7c-4367-8dd6-46b79a1a54cb', 6),
(46, '072da35d-bc7c-4367-8dd6-46b79a1a54cb', 8),
(47, 'c3c0573e-13f5-4ae3-b5d5-6fde378d1915', 6),
(48, 'c3c0573e-13f5-4ae3-b5d5-6fde378d1915', 4),
(49, 'c3c0573e-13f5-4ae3-b5d5-6fde378d1915', 8),
(50, 'c3c0573e-13f5-4ae3-b5d5-6fde378d1915', 5),
(51, '1e5eecb3-3863-4e2d-aaec-ee1b72c4054c', 3),
(52, 'cc29a847-c2aa-45d9-8d91-ff9866e1ea3d', 6),
(53, 'cc29a847-c2aa-45d9-8d91-ff9866e1ea3d', 8),
(54, 'cc29a847-c2aa-45d9-8d91-ff9866e1ea3d', 7),
(55, 'c4bdeba8-1876-4479-bce9-f28e2369f9c0', 9),
(56, 'c4bdeba8-1876-4479-bce9-f28e2369f9c0', 12),
(57, 'c4bdeba8-1876-4479-bce9-f28e2369f9c0', 6),
(58, 'c4bdeba8-1876-4479-bce9-f28e2369f9c0', 15),
(63, 'e935b511-70a9-49fc-b170-ff204a7a812a', 9),
(64, 'e935b511-70a9-49fc-b170-ff204a7a812a', 12),
(65, 'e935b511-70a9-49fc-b170-ff204a7a812a', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `no_bukti` varchar(50) NOT NULL,
  `jenis_transaksi` varchar(50) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `penerima` varchar(50) NOT NULL,
  `keg` text NOT NULL,
  `jumlah_uang` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `no_bukti`, `jenis_transaksi`, `tgl_transaksi`, `penerima`, `keg`, `jumlah_uang`) VALUES
(1, '4546', 'Bayar UM', '2020-06-11', 'SPBU', 'spt tabalong', 200000),
(2, '2135', 'Kuitansi UM', '2020-06-12', 'Bengkel Ari Motor', 'Service Motor Dinas DA 1245 BG', 250000),
(3, '1542', 'Bayar Kuitansi', '2020-06-09', 'Bengkel Mobil Berkat Sabar', 'Service Mobil Dinas DA 8886 AC', 700000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
(6, 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin'),
(7, 'user', 'user', '12dea96fec20593566ab75692c9949596833adc9', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_absen`
--
ALTER TABLE `tb_absen`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `tb_anggaran`
--
ALTER TABLE `tb_anggaran`
  ADD PRIMARY KEY (`id_anggaran`),
  ADD KEY `id_pegawai` (`id_ppk`);

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `tb_cuti`
--
ALTER TABLE `tb_cuti`
  ADD PRIMARY KEY (`id_cuti`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `tb_eselon`
--
ALTER TABLE `tb_eselon`
  ADD PRIMARY KEY (`id_eselon`);

--
-- Indexes for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD PRIMARY KEY (`id_gaji`),
  ADD KEY `nip` (`id_pegawai`);

--
-- Indexes for table `tb_kelurahan`
--
ALTER TABLE `tb_kelurahan`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `tb_mata_air`
--
ALTER TABLE `tb_mata_air`
  ADD PRIMARY KEY (`id_mata_air`);

--
-- Indexes for table `tb_pangkat`
--
ALTER TABLE `tb_pangkat`
  ADD PRIMARY KEY (`id_pangkat`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `id_pangkat` (`id_pangkat`),
  ADD KEY `id_eselon` (`id_eselon`),
  ADD KEY `id_sd` (`id_sd`),
  ADD KEY `id_smp` (`id_smp`),
  ADD KEY `id_sma` (`id_sma`),
  ADD KEY `id_pt1` (`id_pt1`),
  ADD KEY `id_pt2` (`id_pt2`),
  ADD KEY `id_pt3` (`id_pt3`);

--
-- Indexes for table `tb_pejabat`
--
ALTER TABLE `tb_pejabat`
  ADD PRIMARY KEY (`id_pejabat`);

--
-- Indexes for table `tb_pimpinan`
--
ALTER TABLE `tb_pimpinan`
  ADD PRIMARY KEY (`id_pimpinan`);

--
-- Indexes for table `tb_ppk`
--
ALTER TABLE `tb_ppk`
  ADD PRIMARY KEY (`id_ppk`);

--
-- Indexes for table `tb_rppt1`
--
ALTER TABLE `tb_rppt1`
  ADD PRIMARY KEY (`id_pt1`);

--
-- Indexes for table `tb_rppt2`
--
ALTER TABLE `tb_rppt2`
  ADD PRIMARY KEY (`id_pt2`);

--
-- Indexes for table `tb_rppt3`
--
ALTER TABLE `tb_rppt3`
  ADD PRIMARY KEY (`id_pt3`);

--
-- Indexes for table `tb_rpsd`
--
ALTER TABLE `tb_rpsd`
  ADD PRIMARY KEY (`id_sd`);

--
-- Indexes for table `tb_rpsma`
--
ALTER TABLE `tb_rpsma`
  ADD PRIMARY KEY (`id_sma`);

--
-- Indexes for table `tb_rpsmp`
--
ALTER TABLE `tb_rpsmp`
  ADD PRIMARY KEY (`id_smp`);

--
-- Indexes for table `tb_sk`
--
ALTER TABLE `tb_sk`
  ADD PRIMARY KEY (`id_sk`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `tb_sm`
--
ALTER TABLE `tb_sm`
  ADD PRIMARY KEY (`id_sm`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `tb_sp`
--
ALTER TABLE `tb_sp`
  ADD PRIMARY KEY (`id_sp`);

--
-- Indexes for table `tb_spd`
--
ALTER TABLE `tb_spd`
  ADD PRIMARY KEY (`id_spd`),
  ADD KEY `id_spt` (`id_spt`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_ppk` (`id_ppk`);

--
-- Indexes for table `tb_spj`
--
ALTER TABLE `tb_spj`
  ADD PRIMARY KEY (`id_spj`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_spt` (`id_spt`),
  ADD KEY `ppk` (`id_pejabat`),
  ADD KEY `id_pejabat` (`id_ppk`),
  ADD KEY `id_spd` (`id_spd`);

--
-- Indexes for table `tb_spjls`
--
ALTER TABLE `tb_spjls`
  ADD PRIMARY KEY (`id_spjls`),
  ADD KEY `id_spt` (`id_spt`);

--
-- Indexes for table `tb_spjup`
--
ALTER TABLE `tb_spjup`
  ADD PRIMARY KEY (`id_spjup`);

--
-- Indexes for table `tb_spt`
--
ALTER TABLE `tb_spt`
  ADD PRIMARY KEY (`id_spt`);

--
-- Indexes for table `tb_surat_pegawai`
--
ALTER TABLE `tb_surat_pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_spt` (`id_spt`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_spt_2` (`id_spt`),
  ADD KEY `id_pegawai_2` (`id_pegawai`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_absen`
--
ALTER TABLE `tb_absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_anggaran`
--
ALTER TABLE `tb_anggaran`
  MODIFY `id_anggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_cuti`
--
ALTER TABLE `tb_cuti`
  MODIFY `id_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_eselon`
--
ALTER TABLE `tb_eselon`
  MODIFY `id_eselon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_kelurahan`
--
ALTER TABLE `tb_kelurahan`
  MODIFY `nik` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_mata_air`
--
ALTER TABLE `tb_mata_air`
  MODIFY `id_mata_air` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pangkat`
--
ALTER TABLE `tb_pangkat`
  MODIFY `id_pangkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_pejabat`
--
ALTER TABLE `tb_pejabat`
  MODIFY `id_pejabat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pimpinan`
--
ALTER TABLE `tb_pimpinan`
  MODIFY `id_pimpinan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_ppk`
--
ALTER TABLE `tb_ppk`
  MODIFY `id_ppk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_rppt1`
--
ALTER TABLE `tb_rppt1`
  MODIFY `id_pt1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_rppt2`
--
ALTER TABLE `tb_rppt2`
  MODIFY `id_pt2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_rppt3`
--
ALTER TABLE `tb_rppt3`
  MODIFY `id_pt3` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_rpsd`
--
ALTER TABLE `tb_rpsd`
  MODIFY `id_sd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_rpsma`
--
ALTER TABLE `tb_rpsma`
  MODIFY `id_sma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_rpsmp`
--
ALTER TABLE `tb_rpsmp`
  MODIFY `id_smp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_sk`
--
ALTER TABLE `tb_sk`
  MODIFY `id_sk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_sm`
--
ALTER TABLE `tb_sm`
  MODIFY `id_sm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_sp`
--
ALTER TABLE `tb_sp`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_spd`
--
ALTER TABLE `tb_spd`
  MODIFY `id_spd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_spj`
--
ALTER TABLE `tb_spj`
  MODIFY `id_spj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_spjls`
--
ALTER TABLE `tb_spjls`
  MODIFY `id_spjls` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_spjup`
--
ALTER TABLE `tb_spjup`
  MODIFY `id_spjup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_surat_pegawai`
--
ALTER TABLE `tb_surat_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_absen`
--
ALTER TABLE `tb_absen`
  ADD CONSTRAINT `tb_absen_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `tb_pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_surat_pegawai`
--
ALTER TABLE `tb_surat_pegawai`
  ADD CONSTRAINT `tb_surat_pegawai_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `tb_pegawai` (`id_pegawai`),
  ADD CONSTRAINT `tb_surat_pegawai_ibfk_3` FOREIGN KEY (`id_spt`) REFERENCES `tb_spt` (`id_spt`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
