-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2024 at 06:16 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galerifoto`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `AlbumID` int(11) NOT NULL,
  `NamaAlbum` varchar(255) NOT NULL,
  `Deksripsi` text NOT NULL,
  `TanggalDibuat` date NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`AlbumID`, `NamaAlbum`, `Deksripsi`, `TanggalDibuat`, `UserID`) VALUES
(26, '', '', '2024-01-31', 0),
(32, 'flora', 'bunga', '2024-02-07', 1),
(33, 'fauna', 'hewan', '2024-02-07', 1),
(34, 'unggas', 'bersayap', '2024-02-11', 1),
(35, 'Motor', 'repsol berknalpot', '2024-02-13', 3),
(36, 'perabot', 'utensil', '2024-02-22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dislikefoto`
--

CREATE TABLE `dislikefoto` (
  `DisLikeID` int(11) NOT NULL,
  `FotoID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `TanggalLike` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dislikefoto`
--

INSERT INTO `dislikefoto` (`DisLikeID`, `FotoID`, `UserID`, `TanggalLike`) VALUES
(8, 0, 1, '0000-00-00'),
(43, 21, 1, '2024-02-13'),
(48, 22, 3, '2024-02-13'),
(59, 19, 1, '2024-02-22'),
(61, 20, 1, '2024-02-22'),
(63, 19, 6, '2024-02-22'),
(65, 21, 6, '2024-02-22'),
(66, 22, 6, '2024-02-22'),
(67, 20, 6, '2024-02-22'),
(68, 23, 1, '2024-02-29');

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `FotoID` int(11) NOT NULL,
  `JudulFoto` varchar(255) NOT NULL,
  `DeskripsiFoto` text NOT NULL,
  `TanggalUnggah` date NOT NULL,
  `LokasiFile` varchar(255) NOT NULL,
  `AlbumID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`FotoID`, `JudulFoto`, `DeskripsiFoto`, `TanggalUnggah`, `LokasiFile`, `AlbumID`, `UserID`) VALUES
(19, 'ikan', 'berenang', '2024-02-07', '660856220-logo.jpg', 33, 1),
(20, 'mawar', 'merah', '2024-02-07', '805628267-hasil.png', 32, 1),
(21, 'ayam', 'bertelur', '2024-02-11', '891912121-WhatsApp Image 2024-02-11 at 13.04.55.jpeg', 34, 1),
(22, 'CBR 150', 'Kereta Zaman Now', '2024-02-13', '2137261592-repsol.jpg', 35, 3),
(23, 'sutil', 'utk memasak', '2024-02-22', '2040327276-WhatsApp Image 2024-02-11 at 13.04.56.jpeg', 36, 1);

-- --------------------------------------------------------

--
-- Table structure for table `komentarfoto`
--

CREATE TABLE `komentarfoto` (
  `KomentarID` int(11) NOT NULL,
  `FotoID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `IsiKomentar` text NOT NULL,
  `TanggalKomentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komentarfoto`
--

INSERT INTO `komentarfoto` (`KomentarID`, `FotoID`, `UserID`, `IsiKomentar`, `TanggalKomentar`) VALUES
(27, 19, 1, 'suka', '2024-02-15'),
(28, 20, 1, 'mau beli dong satu', '2024-02-15'),
(29, 20, 1, 'gg', '2024-02-15'),
(30, 21, 1, 'wah ayam jago', '2024-02-15'),
(31, 22, 1, 'berapa harganya', '2024-02-15'),
(32, 21, 3, 'ada yang tahu jual ayam kampung gak', '2024-02-15'),
(33, 21, 3, 'kak itu betina atau jantan', '2024-02-15'),
(34, 19, 1, 'jeleknya', '2024-02-20'),
(35, 21, 1, 'lucuuu', '2024-02-20'),
(36, 21, 1, 'kaya ayam mati', '2024-02-20'),
(37, 21, 5, 'pussy', '2024-02-20'),
(38, 22, 5, 'arilll', '2024-02-20'),
(39, 19, 5, 'usaha laundry y kk?', '2024-02-20'),
(40, 20, 5, 'mamak keket', '2024-02-20'),
(41, 21, 5, 'nurhayati', '2024-02-20'),
(42, 22, 5, 'motor cw nya angel.', '2024-02-20'),
(43, 23, 1, 'ayam curian ini', '2024-02-29'),
(44, 23, 1, 'ayam kate pendekkk', '2024-03-06');

-- --------------------------------------------------------

--
-- Table structure for table `likefoto`
--

CREATE TABLE `likefoto` (
  `LikeID` int(11) NOT NULL,
  `FotoID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `TanggalLike` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likefoto`
--

INSERT INTO `likefoto` (`LikeID`, `FotoID`, `UserID`, `TanggalLike`) VALUES
(29, 19, 2, '2024-02-11'),
(43, 0, 1, '2024-02-11'),
(57, 19, 3, '2024-02-13'),
(58, 20, 3, '2024-02-13'),
(59, 21, 3, '2024-02-13'),
(68, 22, 3, '2024-02-15'),
(77, 21, 1, '2024-02-20'),
(84, 22, 1, '2024-02-22'),
(93, 19, 6, '2024-02-22'),
(94, 20, 6, '2024-02-22'),
(96, 22, 6, '2024-02-22'),
(97, 21, 6, '2024-02-22'),
(99, 23, 1, '2024-02-29'),
(102, 20, 1, '2024-03-06');

-- --------------------------------------------------------

--
-- Table structure for table `lovefoto`
--

CREATE TABLE `lovefoto` (
  `LoveID` int(11) NOT NULL,
  `FotoID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `TanggalLove` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lovefoto`
--

INSERT INTO `lovefoto` (`LoveID`, `FotoID`, `UserID`, `TanggalLove`) VALUES
(15, 22, 1, '2024-02-21'),
(18, 20, 1, '2024-02-21'),
(26, 19, 1, '2024-02-22'),
(27, 21, 1, '2024-02-22'),
(28, 23, 1, '2024-02-22'),
(31, 19, 6, '2024-02-22'),
(32, 20, 6, '2024-02-22'),
(33, 21, 6, '2024-02-22'),
(34, 22, 6, '2024-02-22');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_telp` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `username`, `password`, `admin_telp`, `admin_email`, `admin_address`) VALUES
(2, 'Irawan', 'irawan', 'adminirawan', '085774137284', 'irawan@gmail.com', 'Jl. Raya Kadu Seungit'),
(3, 'Diana', 'diana', '1234', '085788992919', 'Diana@gmail.com', 'Suka Seneng Cikeusik'),
(4, 'Hazwan', 'hazwan', '123', '085787778811', 'hazwan@gmail.com', 'Cikeusik Pandeglang'),
(5, 'Always_benz', 'beni', '123123', '11211345', 'BEN@MLSDS', 'Jl Binjai Km 10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`) VALUES
(14, 'Perjalanan'),
(15, 'Bawah Air'),
(16, 'Hewan Peliharaan'),
(17, 'Satwa Liar'),
(18, 'Makanan'),
(19, 'Olahraga'),
(20, 'Fashion'),
(21, 'Seni Rupa'),
(22, 'Dokumenter'),
(23, 'Arsitektur');

-- --------------------------------------------------------

--
-- Table structure for table `tb_image`
--

CREATE TABLE `tb_image` (
  `image_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `image_description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `image_status` tinyint(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_image`
--

INSERT INTO `tb_image` (`image_id`, `category_id`, `category_name`, `admin_id`, `admin_name`, `image_name`, `image_description`, `image`, `image_status`, `date_created`) VALUES
(34, 23, 'Arsitektur', 2, 'Irawan', 'Merancang Kota Modern', '<p>Foto ini menggambarkan kegiatan desain perencanaan membuat kota yang modern berdasarkan ramah lingkungan</p>\r\n', 'foto1701141777.jpg', 1, '2023-11-28 04:58:19'),
(35, 23, 'Arsitektur', 2, 'Irawan', 'Merancang Perumahan Elit', '<p>Foto ini menggambarkan kegiatan desain perencanaan membuat Rumah yang modern, nyaman untuk keluarga</p>\r\n', 'foto1701144257.jpg', 1, '2023-11-28 04:04:17'),
(36, 17, 'Satwa Liar', 3, 'Diana', 'Harimau Sumatra', 'Harimau sumatera (Panthera tigris sumatrae) adalah subspesies harimau yang habitat aslinya di pulau Sumatera. Hidup di hutan hujan tropis Sumatera, harimau ini adalah pemakan daging yang ulung. Dengan kecepatan lari hampir 40 mil per jam, mereka adalah predator yang tangguh di alam liar. Kemampuannya berburu, terutama di malam hari, memungkinkan mereka untuk mengintai mangsa dengan diam-diam sebelum menerkam dengan cepat.', 'foto1701147078.jpg', 1, '2023-11-28 04:51:18'),
(37, 17, 'Satwa Liar', 3, 'Diana', 'Badak Jawa', 'Badak Jawa (Rhinoceros sondaicus) adalah jenis satwa langka yang masuk kedalam 25 spesies prioritas utama konservasi Pemerintah Indonesia. Badak Jawa dapat hidup hingga 30-45 tahun di habitat aslinya. Mereka biasa tinggal di hutan hujan dataran rendah, padang rumput basah, dan dataran banjir yang luas. Badak ini merupakan makhluk yang suka menyendiri, kecuali saat pacaran dan saat membesarkan anak.', 'foto1701147926.jpg', 1, '2023-11-28 05:05:26'),
(38, 16, 'Hewan Peliharaan', 3, 'Diana', 'Kucing Angora', 'Anggora adalah kucing dengan ciri khas berbulu panjang yang indah. Anggora memiliki tubuh yang sedang dengan badan berotot yang panjang, ramping, langsing dan elegan. Anggora memiliki hidung yang panjang, kepala yang berbentuk segitiga, serta telinga yang panjang, lebar, dan berbentuk segitiga.', 'foto1701148582.jpg', 1, '2023-11-28 05:16:22'),
(39, 16, 'Hewan Peliharaan', 3, 'Diana', 'Ayam Kampung', 'Ayam kampung adalah kualitas daging nya yang memang lebih unggul di bandingkan dengan daging ayam lain nya, sehingga tidak heran jika rasa nya juga jauh lebih enak di bandingkan ayam lain.', 'foto1701148797.jpg', 1, '2023-11-28 05:19:57'),
(40, 14, 'Perjalanan', 4, 'Hazwan', 'Pantai Carita', 'Pantai Carita merupakan objek wisata yang terletak di Kabupaten Pandeglang. Fasilitas di Pantai Carita cukup lengkap yaitu Banana boat, snorkling, papan seluncur, diving, dan fasilitas lainnya. Banyak juga penginapan-penginapan sepanjang pesisir pantai dan atau rumah-rumah warga yang difungsikan untuk penginapan.', 'foto1701150076.jpg', 1, '2023-11-28 05:41:16'),
(41, 14, 'Perjalanan', 4, 'Hazwan', 'Curug Putri', 'Curug Putri Carita Pandeglang ini unik banget karena terbentuk dari lava yang membeku dan kemudian menjadi aliran sungai dengan batuan cantik.', 'foto1701150304.jpg', 1, '2023-11-28 05:45:04'),
(42, 17, 'Satwa Liar', 3, 'Diana', 'Singa Afrika', 'Singa adalah binatang yang menakutkan , tubuhnya besar, gesit dan garang, buas dan menyeramkan. Singa memiliki taring yang gampang melumatkan mangsanya, punya kuku yang kuat yang mampu menerkam mangsa hingga tak berdaya, dan mencabik- cabiknya. Singa sering digunakan untuk mewakili kekuatan, kegarangan dan kebuasan.', 'foto1701150517.jpg', 1, '2023-11-28 05:48:37');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `NamaLengkap` varchar(255) NOT NULL,
  `Alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Password`, `Email`, `NamaLengkap`, `Alamat`) VALUES
(1, 'benedict', 'd962f58df6dba10b38ae519b52c838f0', 'BEN@ariel', 'benduy sanduy gembul', 'kosmetik'),
(2, 'sandi', '65b8c1d04ece90f124902bfc975a8d00', 'sandi@gmail.com', 'sandi pangestu', 'jl mekar'),
(3, 'ariel', '164179b068bb5156074e9afdfde252a4', 'ariel@gmail.com', 'Ariel Atmaja', 'abdul hamid sempit'),
(4, 'jeno', '2c5a506a135b1806c1eacce2efaeea05', 'jeno@gmail.com', 'jeno', 'korea'),
(5, 'bransma', 'b59c67bf196a4758191e42f76670ceba', 'b@gmail.com', 'bransma_angel', 'abdul hamid sempit'),
(6, 'ani', '18b049cc8d8535787929df716f9f4e68', 'ani@sknn', 'aniiiika', 'japan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`AlbumID`);

--
-- Indexes for table `dislikefoto`
--
ALTER TABLE `dislikefoto`
  ADD PRIMARY KEY (`DisLikeID`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`FotoID`),
  ADD UNIQUE KEY `AlbumID` (`AlbumID`);

--
-- Indexes for table `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD PRIMARY KEY (`KomentarID`);

--
-- Indexes for table `likefoto`
--
ALTER TABLE `likefoto`
  ADD PRIMARY KEY (`LikeID`);

--
-- Indexes for table `lovefoto`
--
ALTER TABLE `lovefoto`
  ADD PRIMARY KEY (`LoveID`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tb_image`
--
ALTER TABLE `tb_image`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `AlbumID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `dislikefoto`
--
ALTER TABLE `dislikefoto`
  MODIFY `DisLikeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `FotoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `komentarfoto`
--
ALTER TABLE `komentarfoto`
  MODIFY `KomentarID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `likefoto`
--
ALTER TABLE `likefoto`
  MODIFY `LikeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `lovefoto`
--
ALTER TABLE `lovefoto`
  MODIFY `LoveID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_image`
--
ALTER TABLE `tb_image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_image`
--
ALTER TABLE `tb_image`
  ADD CONSTRAINT `tb_image_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `tb_admin` (`admin_id`),
  ADD CONSTRAINT `tb_image_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `tb_category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
