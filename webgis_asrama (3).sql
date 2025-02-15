-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2025 at 02:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webgis_asrama`
--

-- --------------------------------------------------------

--
-- Table structure for table `asrama`
--

CREATE TABLE `asrama` (
  `id_asrama` int(11) NOT NULL,
  `nama_asrama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_asrama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `jumlah_kamar` int(11) NOT NULL,
  `id_kapasitas` int(11) NOT NULL,
  `kapasitas_asrama` int(11) NOT NULL,
  `harga_sewa` varchar(125) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `foto_asrama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(125) NOT NULL,
  `telephone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_asrama` float(9,6) NOT NULL,
  `latt_asrama` float(9,6) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `asrama`
--

INSERT INTO `asrama` (`id_asrama`, `nama_asrama`, `alamat_asrama`, `id_provinsi`, `id_jenis`, `jumlah_kamar`, `id_kapasitas`, `kapasitas_asrama`, `harga_sewa`, `deskripsi`, `foto_asrama`, `instagram`, `telephone`, `long_asrama`, `latt_asrama`, `created_at`, `updated_at`) VALUES
(17, 'Asrama Mahasiswa Kalimantan Barat ', 'Alamat: Jl.Kapten Laut Samadikun, No.10 Yogyakarta', 61, 1, 22, 0, 0, '50.000', 'Asrama Mahasiswa Kalimantan Barat Rahadi Osman 1 Yogyakarta  sebagai sarana tempat tinggal bagi mahasiswa Kalimantan Barat yang menempuh pendidikan di Yogyakarta', '1739307798_Asrama_Rahadi_Osman_1_Jogja_3.jpg,1739307798_Asrama_Rahadi_Osman_1_Jogja_2.jpg,1739307798_Asrama_Rahadi_Osman_1_Jogja.jpg', '', '085928360887 ', 110.371666, -7.802937, '2025-02-13 05:21:55', '2025-02-13 05:21:55'),
(18, 'Asrama Mahasiswa Kalimantan Barat Oevaang Oeray', 'Asrama Mahasiswa Kalimantan Barat J.C Oevaang Oeray Yogyakarta', 61, 1, 18, 0, 0, '65.000', 'Asrama Mahasiswa Kalimantan Barat Oevaang Oeray Yogyakarta ini berdiri sebagai sarana tempat tinggal bagi mahasiswa Kalimantan Barat yang menempuh pendidikan di Yogyakarta yang kemudian hingga kini sudah berkembang menjadi suatu tempat yang tak hanya seba', '1739308793_Asrama Putra Kalimantan Barat J.C. Oevaang Oeray_7.jpg,1739308793_Asrama Putra Kalimantan Barat J.C. Oevaang Oeray_6.jpg,1739308793_Asrama Putra Kalimantan Barat J.C. Oevaang Oeray_5.jpg,1739308793_Asrama Putra Kalimantan Barat J.C. Oevaang Oer', '', '082314342994', 110.384628, -7.782220, '2025-02-13 05:21:55', '2025-02-13 05:21:55'),
(19, 'Asrama Mahasiswi Dara Djuanti Yogyakarta', 'Jalan Bintaran Kidul  No.19 Yogyakarta ', 61, 2, 19, 2, 38, '50.000', 'Asrama Mahasiswi Dara Djuanti Yogyakarta dibangun  sebagai sarana tempat tinggal bagi mahasiswi putri Kalimantan Barat yang menempuh pendidikan di Yogyakarta', '1739310815_Asrama Putri Dara Djuanti_4.jpg,1739310815_Asrama Putri Dara Djuanti_3.jpg,1739310815_Asrama Putri Dara Djuanti_2.jpg,1739310815_Asrama Putri Dara Djuanti_1.jpg', '', '082314342994', 110.374107, -7.803374, '2025-02-13 05:21:55', '2025-02-13 05:21:55'),
(22, 'Asrama Mahasiswa Kalimantan Timur ', 'Jl. Hayam Wuruk No.10, Bausasran, Kec. Danurejan, Kota Yogyakarta, Daerah Istimewa Yogyakarta', 64, 1, 20, 2, 40, '160.000 - 200.000', 'Asrama Mahasiswa Kalimantan Timur \" Kersik Luwai \" dibangun sebagai sarana tempat tinggal bagi mahasiswa putra Kalimantan Timur yang menempuh pendidikan di Yogyakarta', '1739311914_Asrama Mahasiswa Kalimantan Timur  Kersik Luwai_1.jpg', '', '081328805401', 110.370193, -7.796072, '2025-02-13 05:21:55', '2025-02-13 05:21:55'),
(23, 'Asrama Mahasiswa Kaltim Mangkaliat', 'Jl. Pakuningratan no. 47, JT. II, RT. 13, RW. 03, Kel. Cokrodiningratan,, Jetis, Yogyakarta, Indonesia', 64, 1, 10, 2, 20, '60.000', 'Asrama Mahasiswa Kalimantan Timur \" Kersik Luwai \" dibangun sebagai sarana tempat tinggal bagi mahasiswa putra Kalimantan Timur yang menempuh pendidikan di Yogyakarta', '1739314982_Asrama Mahasiswa Kaltim Mangkaliat_6.jpg,1739314982_Asrama Mahasiswa Kaltim Mangkaliat_5.jpg,1739314982_Asrama Mahasiswa Kaltim Mangkaliat_4.jpg,1739314982_Asrama Mahasiswa Kaltim Mangkaliat_3.jpg,1739314982_Asrama Mahasiswa Kaltim Mangkaliat_2', '', '081348394398', 110.362396, -7.780195, '2025-02-13 05:21:55', '2025-02-13 05:21:55'),
(24, 'Asrama Putra Kabupaten Nunukan, Provinsi Kalimantan Utara (BALOY TAKA)', 'Baciro, Kec. Gondokusuman, Kota Yogyakarta, Daerah Istimewa Yogyakarta', 65, 1, 14, 2, 28, '75.000', 'Asrama Mahasiswa Kalimantan Timur \" Kersik Luwai \" dibangun sebagai sarana tempat tinggal bagi mahasiswa putra Kalimantan Utara yang menempuh pendidikan di Yogyakarta', '1739315368_Asrama Putra Kabupaten Nunukan Provinsi Kalimantan Utara BALOY TAKA_4.jpg,1739315368_Asrama Putra Kabupaten Nunukan Provinsi Kalimantan Utara BALOY TAKA_3.jpg,1739315368_Asrama Putra Kabupaten Nunukan Provinsi Kalimantan Utara BALOY TAKA_2.jpg,', '', '082253454220', 110.392349, -7.790822, '2025-02-13 05:21:55', '2025-02-13 05:21:55'),
(25, 'AMKT RUHUI RAHAYU YOGYAKARTA', 'Jalan Kantil nomor 10 kelurahan gondokusuman kecamatan baciro DIY, Yogyakarta', 64, 2, 10, 2, 20, '0', 'Asrama Mahasiswa Kalimantan Timur \" Kersik Luwai \" dibangun sebagai sarana tempat tinggal bagi mahasiswa putri Kalimantan Utara yang menempuh pendidikan di Yogyakarta', '1739316492_AMKT RUHUI RAHAYU YOGYAKARTA_6.JPG,1739316492_AMKT RUHUI RAHAYU YOGYAKARTA_4.JPG,1739316492_AMKT RUHUI RAHAYU YOGYAKARTA_2.jpg,1739316492_AMKT RUHUI RAHAYU YOGYAKARTA.jpg,1739316492_AMKT RUHUI RAHAYU YOGYAKARTA_1.jpeg', '', '082153507474 ', 110.378723, -7.791827, '2025-02-13 05:21:55', '2025-02-13 05:21:55'),
(26, 'Asrama Mahasiswa Kalimantan Selatan Lambung Mangkurat', 'Jl. A.M Sangaji No.66, Cokrodiningratan, Kec. Jetis, Kota Yogyakarta', 63, 1, 14, 7, 21, '70.000', 'Asrama Mahasiswa Kalimantan Selatan Lambung Mangkurat dibangun sebagai sarana tempat tinggal bagi mahasiswa Putra Kalimantan Selatan yang menempuh pendidikan di Yogyakarta', '1739316962_Asrama Mahasiswa Kalimantan Selatan Lambung Mangkurat_2.jpg,1739316962_Asrama Mahasiswa Kalimantan Selatan Lambung Mangkurat.jpg,1739316962_Asrama Mahasiswa Kalimantan Selatan Lambung Mangkurat_5.jpg', '', '', 110.365707, -7.775010, '2025-02-13 05:21:55', '2025-02-13 05:21:55'),
(27, 'Asrama Pangeran Hidayatullah Kalimantan Selatan', 'Jl. Krasak No.1, Kotabaru, Kec. Gondokusuman, Kota Yogyakarta, Daerah Istimewa Yogyakarta', 63, 1, 7, 2, 14, '70.000', 'Asrama Pangeran Hidayatullah Kalimantan Selatan dibangun sebagai sarana tempat tinggal bagi mahasiswa Putra Kalimantan Selatan yang menempuh pendidikan di Yogyakarta', '1739317216_Asrama Pangeran Hidayatullah Kalimantan Selatan_3.jpg,1739317216_Asrama Pangeran Hidayatullah Kalimantan Selatan_2.jpg,1739317216_Asrama Pangeran Hidayatullah Kalimantan Selatan_1.jpg', '', '085950022600', 110.372185, -7.788711, '2025-02-13 05:21:55', '2025-02-13 05:21:55'),
(28, 'Asrama Mahasiswa Bersujud IKMA Tanah Bumbu', ' Komplek polri gowok, Jl. Bhayangkara No.22 Blok F, RT.13/RW.RT 05, Ambarukmo, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta', 63, 1, 12, 2, 24, '50.000', 'Asrama Mahasiswa Bersujud IKMA Tanah Bumbu dibangun sebagai sarana tempat tinggal bagi mahasiswa Putra Kalimantan Selatan yang menempuh pendidikan di Yogyakarta', '1739317436_Asrama Mahasiswa Bersujud IKMA Tanah Bumbu_2.jpg,1739317436_Asrama Mahasiswa Bersujud IKMA Tanah Bumbu.jpg', '', '081347525077', 110.396576, -7.785932, '2025-02-13 05:21:55', '2025-02-13 05:21:55'),
(29, 'Asrama Mahasiswa Kalimantan Selatan Pangeran Antasari', 'Jl. Samironobaru No.46, Samirono, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta', 63, 1, 10, 2, 40, '50.000', 'Asrama Mahasiswa Kalimantan Selatan Pangeran Antasari dibangun sebagai sarana tempat tinggal bagi mahasiswa Putra Kalimantan Selatan yang menempuh pendidikan di Yogyakarta', '1739317615_Asrama Mahasiswa Kalimantan Selatan Pangeran Antasari_4.jpg,1739317615_Asrama Mahasiswa Kalimantan Selatan Pangeran Antasari_3.jpg,1739317615_Asrama Mahasiswa Kalimantan Selatan Pangeran Antasari_1.jpg,1739317615_Asrama Mahasiswa Kalimantan Sel', '', '081349032882', 110.386719, -7.778848, '2025-02-13 03:54:01', '2025-02-13 03:54:01'),
(30, 'Asrama Pangeran Suriansyah', 'Jl. Gambut No. 4 Baciro Yogyakarta', 63, 1, 9, 2, 18, '150.000', 'Asrama Pangeran Suriansyaht dibangun sebagai sarana tempat tinggal bagi mahasiswa Putra Kalimantan Selatan yang menempuh pendidikan di Yogyakarta', '', '', '-', 110.382950, -7.791440, '2025-02-13 05:21:55', '2025-02-13 05:21:55'),
(33, 'Asrama Mahasiswa Putri Kalimantan Tengah', 'Asrama Mahasiswa Putri Kalimantan Tengah  dibangun sebagai sarana tempat tinggal bagi mahasiswa Putri Kalimantan Tengah yang menempuh pendidikan di Yogyakarta', 62, 2, 6, 2, 12, '150.000', 'Asrama Mahasiswa Putri Kalimantan Tengah  dibangun sebagai sarana tempat tinggal bagi mahasiswa Putri Kalimantan Tengah yang menempuh pendidikan di Yogyakarta', '1739462395_Asrama Mahasiswa Putri Kalimantan Tengah_1.jpg,1739462395_Asrama Mahasiswa Putri Kalimantan Tengah_2.jpg,1739462395_Asrama Mahasiswa Putri Kalimantan Tengah_3.jpg', '', '085248009088', 0.000000, 0.000000, '2025-02-13 16:59:55', '2025-02-13 16:59:55'),
(34, 'Asrama Mahasiswa Provinsi Sulawesi Selatan Wisma Sawerigading Yogyakarta', 'Jl. Sultan Agung No.18 Mergangsan, Yogyakarta', 73, 1, 21, 1, 21, '150.000', '', '1739463165_Asrama Mahasiswa Provinsi Sulawesi Selatan Wisma Sawerigading Yogyakarta_1.jpg,1739463165_Asrama Mahasiswa Provinsi Sulawesi Selatan Wisma Sawerigading Yogyakarta_2.jpg,1739463165_Asrama Mahasiswa Provinsi Sulawesi Selatan Wisma Sawerigading Yo', '', '081280253825', 110.373871, -7.801610, '2025-02-13 17:12:45', '2025-02-13 17:12:45'),
(35, 'Asrama Sulawesi Selatan \"Wisma Bawakaraeng\"', 'Jl. Krasak No. 5, Gondokusuman, Yogyakarta', 73, 1, 9, 2, 18, '150.000', 'Asrama Sulawesi Selatan \"Wisma Bawakaraeng\" dibangun sebagai sarana tempat tinggal bagi mahasiswa Putra Sulawesi Selatan yang menempuh pendidikan di Yogyakarta', '1739464203_Asrama Sulawesi Selatan Wisma Bawakaraeng_1.jpg,1739464203_Asrama Sulawesi Selatan Wisma Bawakaraeng_2.jpg,1739464203_Asrama Sulawesi Selatan Wisma Bawakaraeng_3.jpg,1739464203_Asrama Sulawesi Selatan Wisma Bawakaraeng_4.jpg', 'https://www.instagram.com/wismabawakaraeng/', '087760062299', 110.372467, -7.788490, '2025-02-13 17:30:03', '2025-02-13 17:30:03'),
(36, 'Asrama PERHIPLA SULSEL', 'Wirogunan, Kec. Mergangsan, Kota Yogyakarta, Daerah Istimewa Yogyakarta', 73, 1, 10, 2, 20, '100.000', 'Asrama PERHIPLA SULSEL dibangun sebagai sarana tempat tinggal bagi mahasiswa Sulawesi Selatan yang menempuh pendidikan di Yogyakarta', '1739464634_Asrama PERHIPLA SULSEL_1.jpg,1739464634_Asrama PERHIPLA SULSEL_2.jpg', 'https://www.instagram.com/perhiplajogja_', '081343831357', 110.378464, -7.807701, '2025-02-13 17:37:14', '2025-02-13 17:37:14'),
(37, 'Wisma Merapi Empat', 'Jl. Sunaryo No. 4 kota baru Yogyakarta', 73, 1, 8, 2, 16, '100.000', 'Wisma Merapi Empat dibangun sebagai sarana tempat tinggal bagi mahasiswa Putra Sulawesi Selatan yang menempuh pendidikan di Yogyakarta', '1739465265_wismamerapiempat_1.png,1739465265_wismamerapiempat_2.jpg', 'https://www.instagram.com/wismamerapiempat/', '08114447849', 110.370155, -7.785951, '2025-02-13 17:47:45', '2025-02-13 17:47:45'),
(38, 'Asrama Putra Lasinrang', 'Jl.Nologaten Gg.Temuireng No.27A, Kel.Caturtunggal, Kec.Depok Kab.Sleman D.I Yogyakarta', 73, 0, 11, 2, 22, '50.000', 'Asrama Putra Lasinrang dibangun sebagai sarana tempat tinggal bagi mahasiswa Putra Sulawesi Selatan yang menempuh pendidikan di Yogyakarta', '1739465783_Asrama Putra Lasinrang_1.jpg,1739465783_Asrama Putra Lasinrang_3.jpg', 'https://www.instagram.com/asramaputralasinrangyk/', '081903888089', 110.399376, -7.774965, '2025-02-13 17:56:23', '2025-02-13 17:56:23'),
(39, 'Asrama Putri Andi Depu Sulbar Yogyakarta', 'Jl. Persatuan Gg, Larasati, Uh 3/538 RT/RW 20/05, Tahunan, Umbulharjo, Yogyakarta', 76, 2, 11, 2, 22, '150.000', 'Asrama Putri Andi Depu Sulbar Yogyakarta dibangun sebagai sarana tempat tinggal bagi mahasiswa Putri Sulawesi Barat yang menempuh pendidikan di Yogyakarta', '1739467050_Asrama Putri Sulawesi Barat_1.jpg', 'https://www.instagram.com/aspuri_andidepu_sulbar/', '', 110.386627, -7.807086, '2025-02-13 18:17:30', '2025-02-13 18:17:30'),
(40, 'Asrama Todilaling', 'Jl.Tamsis, Gg Brojohito, MG 11/12 14  , Yogyakarta', 0, 1, 15, 2, 30, '100.000', 'Asrama Todilaling dibangun sebagai sarana tempat tinggal bagi mahasiswa Putra Sulawesi Barat yang menempuh pendidikan di Yogyakarta', '1739467477_Asrama Todilaling_1.jpg,1739467477_Asrama Todilaling_2.jpg,1739467477_Asrama Todilaling_3.jpg', 'https://www.instagram.com/todilaling_yogyakarta/', '083893656041', 110.376266, -7.810968, '2025-02-13 18:24:37', '2025-02-13 18:24:37'),
(41, 'Asrama Putra Bungolang', 'jln.Angga Jaya II No(105)c.Condong catur ,Depok ,Sleman Yogyakarta', 72, 1, 10, 2, 20, '150.000', 'Asrama Putra Bungolang dibangun sebagai sarana tempat tinggal bagi mahasiswa Putra Sulawesi Tengah yang menempuh pendidikan di Yogyakarta', '1739467886_Asrama Putra Bungolang_1.jpg,1739467886_Asrama Putra Bungolang_2.jpg,1739467886_Asrama Putra Bungolang_4.jpg', 'https://www.instagram.com/official_asramaputratolitoli/', '082259716157', 110.400032, -7.752820, '2025-02-13 18:31:26', '2025-02-13 18:31:26'),
(42, 'ASRAMA MAHASISWA SULTRA', 'Jl. Beo No.42, RW.02, Mrican, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta ', 71, 1, 21, 2, 41, '50.000', 'ASRAMA MAHASISWA SULTRA dibangun sebagai sarana tempat tinggal bagi mahasiswa Putra Sulawesi Utara yang menempuh pendidikan di Yogyakarta', '1739468258_ASRAMA MAHASISWA SULTRA_1.jpg,1739468258_ASRAMA MAHASISWA SULTRA_2.jpg', 'https://www.instagram.com/asrama_sultra/', '085352767688', 110.394943, -7.774285, '2025-02-13 18:37:38', '2025-02-13 18:37:38'),
(43, 'Asrama Mahasiswa Muna Sulawesi Tenggara', 'Jl. Timoho, Muja Muju, Kec. Umbulharjo, Kota Yogyakarta, Daerah Istimewa Yogyakarta', 74, 0, 7, 7, 12, '50.000', 'Asrama Mahasiswa Muna Sulawesi Tenggara dibangun sebagai sarana tempat tinggal bagi mahasiswa Putra Sulawesi Tenggara yang menempuh pendidikan di Yogyakarta', '1739468916_Asrama Mahasiswa Muna Sulawesi Tenggara_1.jpg', 'https://www.instagram.com/asmunjogja/', '081354584960', 110.388725, -7.795593, '2025-02-13 18:48:36', '2025-02-13 18:48:36'),
(44, 'ASRAMA PAPUA SERUI', 'Jl. Beo, Mrican, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta', 94, 1, 24, 2, 40, '150.000', 'ASRAMA PAPUA SERUI dibangun sebagai sarana tempat tinggal bagi mahasiswa Putra Papua yang menempuh pendidikan di Yogyakarta', '1739470453_ASRAMA PAPUA SERUI_1.jpg', '-', '082323724009', 110.394958, -7.774666, '2025-02-13 19:14:13', '2025-02-13 19:14:13'),
(45, 'Asrama Mahasiswa Kabupaten Dogiyai, Provinsi Papua', 'Karang Wuni, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta', 91, 1, 28, 2, 56, '50.000', 'Asrama Mahasiswa Kabupaten Dogiyai, Provinsi Papua dibangun sebagai sarana tempat tinggal bagi mahasiswa Putra Papua Barat yang menempuh pendidikan di Yogyakarta', '1739470520_Asrama Mahasiswa Kabupaten Dogiyai, Provinsi Papua_2.jpg,1739470520_Asrama Mahasiswa Kabupaten Dogiyai, Provinsi Papua_3.jpg', 'https://www.instagram.com/ipmado_joglo/', '0', 110.384018, -7.764269, '2025-02-13 19:15:20', '2025-02-13 19:15:20'),
(46, 'Asrama Mahasiswa Kabupaten Raja Ampat Papua Barat', 'Santren, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta', 91, 1, 8, 2, 16, '50.000', 'Asrama Mahasiswa Kabupaten Raja Ampat Papua Barat dibangun sebagai sarana tempat tinggal bagi mahasiswa Papua Barat yang menempuh pendidikan di Yogyakarta', '1739471017_Asrama Mahasiswa Kabupaten Raja Ampat Papua Barat_1.jpg,1739471017_Asrama Mahasiswa Kabupaten Raja Ampat Papua Barat_2.jpg', 'https://www.instagram.com/ipmaram_diy_jateng/', '082193630051', 110.390381, -7.772719, '2025-02-13 19:23:37', '2025-02-13 19:23:37');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `nama_fasilitas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `nama_fasilitas`) VALUES
(1, 'Kamar Tidur (Kasur, Bantal & Guling, Ranjang, Lemari, Meja Belajar, Kursi)'),
(2, 'Ruang Tamu'),
(3, 'Ruang TV'),
(4, 'Ruang Belajar'),
(5, 'Aula'),
(6, 'Dapur Umum'),
(7, 'Lapangan Olahraga'),
(8, 'Wifi'),
(9, 'Kulkas'),
(10, 'Lemari Makan'),
(11, 'Tempat Tidur Besi'),
(12, 'Sofa'),
(13, 'Kipas Angin'),
(14, 'Televisi'),
(15, 'Tiang Bendera'),
(16, 'Mesin Pompa Air'),
(17, 'Kursi Susun'),
(18, 'Papan Nama'),
(19, 'Ruang Multipurpose'),
(20, 'Basement Parkir'),
(21, 'Tempat Jemuran'),
(22, 'Mesin Cuci'),
(23, 'CCTV'),
(24, 'Musholla'),
(25, 'Ruang Makan'),
(26, 'Printer'),
(27, 'Proyektor'),
(28, 'Sound System'),
(29, 'Perpustakaan'),
(30, 'Taman Kebun'),
(31, 'Fasilitas Olahraga'),
(32, 'Security 24 Jam'),
(33, 'Komputer Umum'),
(34, 'Rak Buku'),
(35, 'Parkiran'),
(36, 'Dapur Bersama'),
(37, 'Kamar Mandi Dalam');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_asrama`
--

CREATE TABLE `fasilitas_asrama` (
  `id_asrama` int(11) NOT NULL,
  `id_fasilitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fasilitas_asrama`
--

INSERT INTO `fasilitas_asrama` (`id_asrama`, `id_fasilitas`) VALUES
(17, 1),
(17, 2),
(17, 3),
(17, 4),
(17, 5),
(17, 6),
(17, 7),
(17, 8),
(18, 1),
(18, 3),
(18, 8),
(18, 12),
(18, 13),
(18, 16),
(18, 17),
(19, 1),
(19, 2),
(19, 4),
(19, 5),
(19, 6),
(19, 7),
(19, 8),
(19, 9),
(22, 1),
(22, 3),
(22, 6),
(22, 8),
(22, 19),
(22, 20),
(22, 21),
(22, 22),
(23, 1),
(23, 2),
(23, 3),
(23, 6),
(23, 8),
(23, 9),
(23, 22),
(23, 23),
(24, 1),
(24, 6),
(24, 7),
(24, 8),
(24, 9),
(24, 22),
(25, 1),
(25, 6),
(25, 8),
(25, 9),
(25, 20),
(25, 22),
(25, 24),
(25, 25),
(26, 1),
(26, 2),
(26, 8),
(26, 9),
(26, 21),
(26, 22),
(26, 23),
(26, 24),
(26, 25),
(26, 27),
(26, 28),
(27, 1),
(27, 3),
(27, 6),
(27, 8),
(27, 22),
(28, 1),
(28, 6),
(28, 7),
(28, 8),
(28, 22),
(29, 1),
(29, 2),
(29, 6),
(29, 8),
(29, 13),
(29, 22),
(30, 1),
(30, 6),
(30, 8),
(33, 1),
(33, 8),
(33, 22),
(34, 1),
(34, 6),
(34, 7),
(34, 8),
(34, 24),
(34, 29),
(34, 30),
(35, 1),
(35, 2),
(35, 6),
(35, 8),
(35, 22),
(35, 29),
(35, 31),
(36, 1),
(36, 3),
(36, 6),
(36, 8),
(36, 22),
(36, 27),
(37, 1),
(37, 6),
(37, 8),
(37, 22),
(38, 1),
(38, 2),
(38, 3),
(38, 6),
(38, 8),
(38, 22),
(39, 1),
(39, 6),
(39, 8),
(40, 1),
(40, 5),
(40, 6),
(40, 8),
(40, 29),
(41, 1),
(41, 6),
(41, 8),
(42, 1),
(42, 6),
(42, 7),
(42, 8),
(43, 1),
(43, 2),
(43, 3),
(43, 6),
(43, 35),
(44, 1),
(44, 6),
(44, 7),
(44, 8),
(44, 22),
(45, 1),
(45, 6),
(45, 7),
(45, 35),
(46, 1),
(46, 2),
(46, 3),
(46, 6),
(46, 22);

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_user_input`
--

CREATE TABLE `fasilitas_user_input` (
  `id_input` int(11) NOT NULL,
  `id_fasilitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_asrama`
--

CREATE TABLE `jenis_asrama` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_asrama`
--

INSERT INTO `jenis_asrama` (`id_jenis`, `nama_jenis`) VALUES
(1, 'Putra'),
(2, 'Putri');

-- --------------------------------------------------------

--
-- Table structure for table `kapasitas_asrama`
--

CREATE TABLE `kapasitas_asrama` (
  `id_kapasitas` int(11) NOT NULL,
  `jumlah_kapasitas` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kapasitas_asrama`
--

INSERT INTO `kapasitas_asrama` (`id_kapasitas`, `jumlah_kapasitas`) VALUES
(1, '1 Orang/Kamar'),
(7, '1-3 Orang/Kamar'),
(2, '2 Orang/Kamar'),
(5, '2-3 Orang/Kamar'),
(6, '2-4 Orang/Kamar'),
(3, '3 Orang/Kamar'),
(4, '4 Orang/Kamar');

-- --------------------------------------------------------

--
-- Table structure for table `pending_asrama`
--

CREATE TABLE `pending_asrama` (
  `id_pending` int(11) NOT NULL,
  `id_asrama` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `action` enum('create','update') NOT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `nama_asrama` varchar(255) DEFAULT NULL,
  `alamat_asrama` text DEFAULT NULL,
  `id_provinsi` int(11) DEFAULT NULL,
  `id_kapasitas` int(11) DEFAULT NULL,
  `kapasitas_asrama` int(11) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `id_jenis` int(11) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `jumlah_kamar` int(11) DEFAULT NULL,
  `harga_sewa` decimal(10,2) DEFAULT NULL,
  `latt_asrama` varchar(255) DEFAULT NULL,
  `long_asrama` varchar(255) DEFAULT NULL,
  `foto_asrama` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pending_fasilitas`
--

CREATE TABLE `pending_fasilitas` (
  `id_pending_fasilitas` int(11) NOT NULL,
  `id_pending` int(11) DEFAULT NULL,
  `id_fasilitas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peraturan`
--

CREATE TABLE `peraturan` (
  `id_peraturan` int(60) NOT NULL,
  `peraturan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` int(12) NOT NULL,
  `nama_provinsi` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
(11, 'ACEH'),
(12, 'SUMATERA UTARA'),
(13, 'SUMATERA BARAT'),
(14, 'RIAU'),
(15, 'JAMBI'),
(16, 'SUMATERA SELATAN'),
(17, 'BENGKULU'),
(18, 'LAMPUNG'),
(19, 'KEPULAUAN BANGKA BELITUNG'),
(21, 'KEPULAUAN RIAU'),
(31, 'DKI JAKARTA'),
(32, 'JAWA BARAT'),
(33, 'JAWA TENGAH'),
(34, 'DI YOGYAKARTA'),
(35, 'JAWA TIMUR'),
(36, 'BANTEN'),
(51, 'BALI'),
(52, 'NUSA TENGGARA BARAT'),
(53, 'NUSA TENGGARA TIMUR'),
(61, 'KALIMANTAN BARAT'),
(62, 'KALIMANTAN TENGAH'),
(63, 'KALIMANTAN SELATAN'),
(64, 'KALIMANTAN TIMUR'),
(65, 'KALIMANTAN UTARA'),
(71, 'SULAWESI UTARA'),
(72, 'SULAWESI TENGAH'),
(73, 'SULAWESI SELATAN'),
(74, 'SULAWESI TENGGARA'),
(75, 'GORONTALO'),
(76, 'SULAWESI BARAT'),
(81, 'MALUKU'),
(82, 'MALUKU UTARA'),
(91, 'PAPUA BARAT'),
(94, 'PAPUA');

-- --------------------------------------------------------

--
-- Table structure for table `submit_user`
--

CREATE TABLE `submit_user` (
  `id_submit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(150) NOT NULL,
  `power` enum('Admin','User') NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `power`) VALUES
(1, 'admin', '$2y$10$oNX.X8jgLhNclHBeI8ytT.1vODlml8.AN1Ieb.rSIChhCa1e7cS0S', 'Admin'),
(2, 'user', '$2y$10$oNX.X8jgLhNclHBeI8ytT.1vODlml8.AN1Ieb.rSIChhCa1e7cS0S', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user_input_asrama`
--

CREATE TABLE `user_input_asrama` (
  `id_input` int(11) NOT NULL,
  `nama_asrama` varchar(125) NOT NULL,
  `alamat_asrama` varchar(255) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_kapasitas` int(11) NOT NULL,
  `jumlah_kamar` int(11) NOT NULL,
  `kapasitas_asrama` int(11) NOT NULL,
  `harga_sewa` varchar(125) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `foto_asrama` varchar(255) NOT NULL,
  `telephone` int(11) NOT NULL,
  `long_asrama` float(9,6) NOT NULL,
  `latt_asrama` float(9,6) NOT NULL,
  `status` enum('pending','diterima','ditolak','') NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_input_asrama`
--

INSERT INTO `user_input_asrama` (`id_input`, `nama_asrama`, `alamat_asrama`, `id_provinsi`, `id_jenis`, `id_kapasitas`, `jumlah_kamar`, `kapasitas_asrama`, `harga_sewa`, `deskripsi`, `foto_asrama`, `telephone`, `long_asrama`, `latt_asrama`, `status`, `created_at`, `updated_at`) VALUES
(1, 'test 1', 'test 1', 11, 1, 1, 68, 12, 'test 1', 'test 1', '1739418445_test 1.png', 2147483647, 114.809181, -7.834248, 'ditolak', '2025-02-13 04:47:25', '2025-02-13 20:00:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asrama`
--
ALTER TABLE `asrama`
  ADD PRIMARY KEY (`id_asrama`),
  ADD KEY `id_provinsi_asrama` (`id_provinsi`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_kapasitas` (`id_kapasitas`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `fasilitas_asrama`
--
ALTER TABLE `fasilitas_asrama`
  ADD PRIMARY KEY (`id_asrama`,`id_fasilitas`),
  ADD KEY `id_fasilitas` (`id_fasilitas`);

--
-- Indexes for table `fasilitas_user_input`
--
ALTER TABLE `fasilitas_user_input`
  ADD PRIMARY KEY (`id_input`,`id_fasilitas`),
  ADD KEY `id_fasilitas` (`id_fasilitas`);

--
-- Indexes for table `jenis_asrama`
--
ALTER TABLE `jenis_asrama`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `kapasitas_asrama`
--
ALTER TABLE `kapasitas_asrama`
  ADD PRIMARY KEY (`id_kapasitas`),
  ADD KEY `jumlah_kapasitas` (`jumlah_kapasitas`);

--
-- Indexes for table `pending_asrama`
--
ALTER TABLE `pending_asrama`
  ADD PRIMARY KEY (`id_pending`);

--
-- Indexes for table `pending_fasilitas`
--
ALTER TABLE `pending_fasilitas`
  ADD PRIMARY KEY (`id_pending_fasilitas`),
  ADD KEY `id_pending` (`id_pending`);

--
-- Indexes for table `peraturan`
--
ALTER TABLE `peraturan`
  ADD PRIMARY KEY (`id_peraturan`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD KEY `provinces_id_index` (`id_provinsi`);

--
-- Indexes for table `submit_user`
--
ALTER TABLE `submit_user`
  ADD PRIMARY KEY (`id_submit`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_input_asrama`
--
ALTER TABLE `user_input_asrama`
  ADD PRIMARY KEY (`id_input`),
  ADD KEY `id_provinsi` (`id_provinsi`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_kapasitas` (`id_kapasitas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asrama`
--
ALTER TABLE `asrama`
  MODIFY `id_asrama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `jenis_asrama`
--
ALTER TABLE `jenis_asrama`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kapasitas_asrama`
--
ALTER TABLE `kapasitas_asrama`
  MODIFY `id_kapasitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pending_asrama`
--
ALTER TABLE `pending_asrama`
  MODIFY `id_pending` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pending_fasilitas`
--
ALTER TABLE `pending_fasilitas`
  MODIFY `id_pending_fasilitas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peraturan`
--
ALTER TABLE `peraturan`
  MODIFY `id_peraturan` int(60) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `submit_user`
--
ALTER TABLE `submit_user`
  MODIFY `id_submit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_input_asrama`
--
ALTER TABLE `user_input_asrama`
  MODIFY `id_input` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fasilitas_asrama`
--
ALTER TABLE `fasilitas_asrama`
  ADD CONSTRAINT `fasilitas_asrama_ibfk_1` FOREIGN KEY (`id_asrama`) REFERENCES `asrama` (`id_asrama`) ON DELETE CASCADE,
  ADD CONSTRAINT `fasilitas_asrama_ibfk_2` FOREIGN KEY (`id_fasilitas`) REFERENCES `fasilitas` (`id_fasilitas`);

--
-- Constraints for table `fasilitas_user_input`
--
ALTER TABLE `fasilitas_user_input`
  ADD CONSTRAINT `fasilitas_user_input_ibfk_1` FOREIGN KEY (`id_fasilitas`) REFERENCES `fasilitas` (`id_fasilitas`),
  ADD CONSTRAINT `fasilitas_user_input_ibfk_2` FOREIGN KEY (`id_input`) REFERENCES `user_input_asrama` (`id_input`);

--
-- Constraints for table `pending_fasilitas`
--
ALTER TABLE `pending_fasilitas`
  ADD CONSTRAINT `pending_fasilitas_ibfk_1` FOREIGN KEY (`id_pending`) REFERENCES `pending_asrama` (`id_pending`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
