-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 06, 2025 at 09:51 AM
-- Server version: 5.5.16
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webmi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'kelompok_1@gmail.com', '001,014,031', 'kelompok_1');

-- --------------------------------------------------------

--
-- Table structure for table `gallery2022`
--

CREATE TABLE `gallery2022` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uploaded_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery2022`
--

INSERT INTO `gallery2022` (`id`, `file_name`, `caption`, `uploaded_on`) VALUES
(1, '22022.jpeg', '1', '2024-12-23 09:06:00'),
(2, '32022.jpeg', '2', '2024-12-23 09:06:34'),
(3, '42022.jpeg', '3', '2024-12-23 09:06:57'),
(4, '12022.jpeg', '4', '2024-12-23 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gallery2023`
--

CREATE TABLE `gallery2023` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uploaded_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery2023`
--

INSERT INTO `gallery2023` (`id`, `file_name`, `caption`, `uploaded_on`) VALUES
(1, 'gambar-event-1.jpg', '1', '2025-01-06 06:41:44'),
(2, 'gambar-event-3.jpg', '2', '2025-01-06 06:42:13'),
(3, 'gambar-event-5.jpg', '3', '2025-01-06 06:42:23'),
(4, 'IMG_5090.jpg', '4', '2025-01-06 06:42:39'),
(5, 'Kelas A.jpg', '5', '2025-01-06 06:42:58'),
(6, 'WhatsApp Image 2024-10-15 at 11.26.01.jpeg', '6', '2025-01-06 06:43:17'),
(7, 'WhatsApp Image 2024-10-15 at 11.27.21.jpeg', '7', '2025-01-06 06:43:44'),
(8, 'IMG_5091.jpg', '8', '2025-01-06 06:44:04'),
(9, 'IMG_5092.jpg', '9', '2025-01-06 06:44:26'),
(10, 'WhatsApp Image 2024-10-17 at 16.26.11 (1).jpeg', '10', '2025-01-06 06:45:14'),
(11, 'WhatsApp Image 2024-10-17 at 16.26.11.jpeg', '11', '2025-01-06 06:45:34'),
(12, 'WhatsApp Image 2024-10-17 at 16.26.12 (1).jpeg', '12', '2025-01-06 06:45:56'),
(13, 'WhatsApp Image 2024-10-17 at 16.26.12 (2).jpeg', '13', '2025-01-06 06:46:17'),
(14, 'WhatsApp Image 2024-10-17 at 16.26.12.jpeg', '14', '2025-01-06 06:46:34'),
(15, 'WhatsApp Image 2024-10-17 at 16.26.13 (1).jpeg', '15', '2025-01-06 06:46:49'),
(16, 'WhatsApp Image 2024-10-17 at 16.26.13.jpeg', '16', '2025-01-06 06:47:04'),
(17, 'Kelas D.jpeg', '17', '2025-01-06 06:47:30'),
(18, 'WhatsApp Image 2024-10-15 at 11.25.06.jpeg', '18', '2025-01-06 06:47:43'),
(19, 'WhatsApp Image 2024-10-15 at 11.30.31.jpeg', '19', '2025-01-06 06:48:09'),
(20, 'WhatsApp Image 2024-10-15 at 11.31.38.jpeg', '20', '2025-01-06 06:48:27'),
(21, 'WhatsApp Image 2024-10-15 at 11.33.12 (1).jpeg', '21', '2025-01-06 06:48:44'),
(22, 'WhatsApp Image 2024-10-15 at 11.33.12 (2).jpeg', '22', '2025-01-06 06:49:07'),
(23, 'WhatsApp Image 2024-10-15 at 11.33.12.jpeg', '23', '2025-01-06 06:49:30'),
(24, 'WhatsApp Image 2024-10-16 at 16.16.19.jpeg', '24', '2025-01-06 06:50:02'),
(25, 'WhatsApp Image 2024-10-16 at 16.16.53.jpeg', '25', '2025-01-06 06:50:25'),
(26, 'WhatsApp Image 2024-10-16 at 16.17.25.jpeg', '26', '2025-01-06 06:50:38'),
(27, 'WhatsApp Image 2024-10-16 at 16.17.46.jpeg', '27', '2025-01-06 06:51:31'),
(28, 'WhatsApp Image 2024-10-16 at 16.18.09.jpeg', '28', '2025-01-06 06:51:46'),
(29, 'WhatsApp Image 2024-10-16 at 16.18.54.jpeg', '29', '2025-01-06 06:51:59'),
(30, '1.jpeg', '30', '2025-01-06 06:53:41'),
(31, 'WhatsApp Image 2024-10-15 at 12.47.56.jpeg', '31', '2025-01-06 06:56:56'),
(32, 'WhatsApp Image 2024-10-15 at 12.46.57.jpeg', '32', '2025-01-06 06:57:09'),
(33, 'Kelas F.jpeg', '33', '2025-01-06 06:57:56'),
(34, 'Kelas E.jpeg', '34', '2025-01-06 06:58:14'),
(35, 'kelas C.jpeg', '35', '2025-01-06 06:58:44'),
(36, 'kelas B.jpeg', '36', '2025-01-06 06:59:08'),
(37, 'gambar-event-4.jpg', '37', '2025-01-06 06:59:50'),
(38, 'gambar-event-2.jpg', '38', '2025-01-06 07:00:13'),
(39, '11.jpeg', '39', '2025-01-06 07:00:53'),
(40, '10.jpeg', '40', '2025-01-06 07:01:11'),
(41, '8.jpeg', '41', '2025-01-06 07:01:31'),
(42, '5.jpeg', '42', '2025-01-06 07:01:48');

-- --------------------------------------------------------

--
-- Table structure for table `gallery2024`
--

CREATE TABLE `gallery2024` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uploaded_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery2024`
--

INSERT INTO `gallery2024` (`id`, `file_name`, `caption`, `uploaded_on`) VALUES
(23423423, 'angkatan 24.jpeg', 'sdfds', '2024-12-28 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `seminar`
--

CREATE TABLE `seminar` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wa` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proof` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poster` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seminar`
--

INSERT INTO `seminar` (`id`, `name`, `wa`, `proof`, `poster`, `title`, `description`) VALUES
(1, 'babi', '09099909', 'Screenshot 2024-12-23 221630.png', 'Screenshot 2024-12-23 214233.png', 'sadasd', 'asda'),
(2, 'pepe', '0000000', 'ceperlan,+JIUP+Vol+8.+No.+3+September+2023+-+Cover.jpg', 'Screenshot_2024-12-10_164843-removebg-preview.png', 'asfasdasd', 'asdasdas'),
(4, 'fsdfsd', '456456456', 'gambar unesa 1.jpg', 'gambar unesa 1.jpg', 'sdfsdf', 'sdfsdf'),
(5, 'asdsad', 'asdasd', 'Bela Negara.jpeg', 'Bela Negara.jpeg', 'asdasd', 'sadasd'),
(6, 'arfian Putra ', '082257806068', 'uploads/Bela Negara.jpeg', 'uploads/Bela Negara.jpeg', 'tidak tahu', 'tidak tahu'),
(7, 'arfian Putra ', '082257806068', 'uploads/Bela Negara.jpeg', 'uploads/Bela Negara.jpeg', 'tidak tahu', 'tidak tahu'),
(8, '2', '98989898', 'uploads/gambar unesa 1.jpg', 'uploads/Bela Negara.jpeg', 'Webinar Bela Negara 2024', 'Tantangan Generasi Muda di Kehidupan Masyarakat Multikultural Dalam Mempertahankan Kebhinekaan Pada Era Industri 5.0'),
(9, 'adit', '888888', 'uploads/gambar unesa 1.jpg', 'uploads/seminar2.jpeg', 'seminar', 'seminar'),
(10, 'fina', '77777777', 'uploads/Momic.jpeg', 'uploads/Momic.jpeg', 'epepe', 'pepep'),
(11, 'gaga', '666666', 'uploads/download (1).jpeg', 'uploads/Screenshot 2024-12-23 221630.png', 'hhi', 'hihi'),
(12, 'asdasd', '09585858', 'uploads/download (1).jpeg', 'uploads/Screenshot 2024-12-23 214233.png', 'oioioi', 'iooioi'),
(13, 'arfian', '0877777777', 'uploads/download (1).jpeg', 'uploads/Screenshot 2024-12-23 221630.png', 'fian', 'fian'),
(14, 'pian', '676767676', 'uploads/download (1).jpeg', 'uploads/Screenshot 2024-12-23 221630.png', 'oioioi', 'ioioio'),
(15, 'asdas', 'asda', 'uploads/download (1).jpeg', 'uploads/Screenshot 2024-12-23 214233.png', 'asdsa', 'asdas'),
(16, 'huhuhuh', 'uhuhuh', 'uploads/download (1).jpeg', 'uploads/Screenshot 2024-12-23 214233.png', 'huhu', 'huhuh'),
(17, 'fian', '8768476534', 'uploads/download (1).jpeg', 'uploads/Screenshot 2024-12-23 221630.png', 'sdfsd', 'dsfds'),
(18, 'arfian putra pratama', '483658743675634', 'uploads/download (1).jpeg', 'uploads/Screenshot 2024-12-23 221630.png', 'coba coba ', 'Istilah deskripsi memang sudah tidak asing lagi. Jenis teks deskripsi ini bisa ditemukan di mana-mana. Ada banyak jenis-jenis teks di dalam sebuah  tulisan. Pada dasarnya, deskripsi adalah menjabarkan tentang sesuatu. Namun bagaimana dengan penerapannya pada tulisan? apa yang membedakannya dengan jenis teks lainnya? Berikut adalah penjelasan lebih lanjut tentang teks deskripsi beserta contohnya.'),
(19, 'ferdy', '876278683465', 'uploads/download (1).jpeg', 'uploads/Desain tanpa judul.png', 'hkhkh', 'khkhjh'),
(20, 'memem', '987987877', 'uploads/download (1).jpeg', 'uploads/Screenshot 2024-12-23 214233.png', 'sdfsdfs', 'sdfsdfs'),
(21, 'adit', '97668989', 'uploads/download (1).jpeg', 'uploads/ceperlan,+JIUP+Vol+8.+No.+3+September+2023+-+Cover.jpg', 'khjkhkjhkjhk', 'khhkjhkjhkh'),
(22, 'jojoo', '873468273', 'uploads/download (1).jpeg', 'uploads/download (1).jpeg', 'jojo', 'jojo'),
(23, 'asdas', '435345', 'uploads/download (1).jpeg', 'uploads/Screenshot 2024-12-23 214233.png', 'pipip', 'pipip'),
(24, 'Arfian Putra Pratama', '082257806068', 'uploads/download (1).jpeg', 'uploads/Momic.jpeg', 'ðŸŽ® Mobile Legend MI Competition (MOMIC) 2024 ðŸŽ®', 'Halo Para Gamers! ðŸ‘‹ðŸ» Himpunan Mahasiswa Manajemen Informatika Universitas Negeri Surabaya dengan bangga mempersembahkan Mobile Legend MI Competition 2024 (MOMIC).Yuk, tunggu apa lagi! Daftarkan tim kamu sekarang juga dan buktikan bahwa kamu adalah yang terbaik di MOMIC 2024'),
(25, 'Arfian Putra Pratama ', '082257806068', 'uploads/11111png.png', 'uploads/php46D1.tmp', 'UKM KEWIRAUSAHAAN UNESA ', 'Halo teman-teman semua!ðŸ‘‹ðŸ»\r\nYuk ikut serta dalam acara Studi Wirausaha dengan tema Fundamental dalam menghadapi tuntutan dunia bisnis yang akan dilaksanakan pada :'),
(26, 'sdf', '56456', 'uploads/001_Arfian Putra Pratama.png', 'uploads/001_Arfian Putra Pratama.png', 'sdfsd', 'dsfsdf'),
(27, 'sadasd', 'sadas', 'uploads/012_Charely Bhisma.jpg', 'uploads/012_Charely Bhisma.jpg', 'asdasd', 'sadasd'),
(28, 'sdfsdf', 'dsdfds', 'uploads/014_Cholifah Labiba.png', 'uploads/014_Cholifah Labiba.png', 'ssadasd', 'sadasd'),
(29, 'fian', '082257806068', 'uploads/download (1).jpeg', 'uploads/Himesco.jpeg', 'asdas', 'asdas'),
(30, 'asd', 'sadas', 'uploads/2.jpeg', 'uploads/2.jpeg', 'dasd', 'asdasd'),
(31, 'sadas', '082257806068', 'uploads/6666.png', 'uploads/6666.png', 'asdas', 'asdas'),
(32, 'asdas', 'asdas', 'uploads/22022.jpeg', 'uploads/22022.jpeg', 'aasdas', 'asdsa'),
(33, 'asdas', 'sdas', 'uploads/enhanced_image.png', 'uploads/enhanced_image.png', 'asdas', 'asdas'),
(34, 'asdas', 'sadas', 'uploads/angkatan 24.jpeg', 'uploads/angkatan 24.jpeg', 'sdasd', 'asdsa'),
(35, 'asds', '082257806068', 'uploads/gambar-event-2.jpg', 'uploads/gambar-event-2.jpg', 'sdasd', 'sadasd'),
(36, 'asssadas', '082257806068', 'uploads/gambar-event-5.jpg', 'uploads/gambar-event-5.jpg', 'sadsa', 'asdasd'),
(37, 'sdasd', 'asdas', 'uploads/22023.jpeg', 'uploads/22023.jpeg', 'asdas', 'adasd'),
(38, 'asdas', '082257806068', 'uploads/gambar-event-4.jpg', 'uploads/gambar-event-4.jpg', 'sadas', 'asdas'),
(39, 'asdsa', 'asdas', 'uploads/2.jpeg', 'uploads/2.jpeg', 'asdsad', 'sadasd'),
(40, 'sdasd', 'sadas', 'uploads/2.jpeg', 'uploads/2.jpeg', 'sadas', 'sadsad'),
(41, 'sdasd', 'sdasd', 'uploads/22023.jpeg', 'uploads/22023.jpeg', 'sdad', 'sadas'),
(42, 'sadsa', 'asdas', 'uploads/6666.png', 'uploads/6666.png', 'sadas', 'sdad'),
(43, 'asdasd', 'adsada', 'uploads/2.jpeg', 'uploads/2.jpeg', 'sdasd', 'asdasda'),
(44, 'fian', '082257806068', 'uploads/upscaled_image_4k.png', 'uploads/upscaled_image_4k.png', 'fian', 'fian'),
(45, 'pian', '082257806068', 'uploads/pngtree-teacher-illustration-carrying-a-book-png-image_15456679.png', 'uploads/pngtree-teacher-illustration-carrying-a-book-png-image_15456679.png', 'pian', 'pian');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `created_at`) VALUES
(15, 'kiki', 'kiki', 'kiki.@gmail.com', '$2y$10$r3hF9G/vqUhWaaROCHqkKOFvIDfmn.Os0HY18CLnMmCtYG2xAam6u', '2024-12-17 10:14:37'),
(16, 'kiko', 'kiko', 'kiko.@gmail.com', '$2y$10$OCTB5DR5CrpmIN4gY4Mk6u1d04iL2Badusepot6yPPYqxIWFN3nke', '2024-12-17 13:02:35'),
(18, 'Arfian Putra', 'Pratama', 'arfian.23001@mhs.unesa.ac.id', '$2y$10$0gf2PB9TSFPOuH8kY9qg0uip9rF6A6NMPDvFyR/pTzvXqaRLb6wZ2', '2024-12-23 13:42:51'),
(19, 'ferd', 'y', 'fersy.1@gmail.com', '$2y$10$S/iU1XOC8zyMoSsMoQcsEeAusAGtXmbi4czanJjqthteOizV.2NxW', '2024-12-23 18:00:37'),
(20, 'pian', 'pian', 'pian@gmail.com', '$2y$10$QNd/woIyMXMf35FNAZAsA.iHzl/Qa9WTNG91/tJHlYNg2HCUwT1g2', '2025-01-03 13:39:07'),
(21, 'windy', 'windy', 'windy@gmail.com', '$2y$10$D14xoAIEIUR4V829jamVtOQCtzDnMBfMUpB3fVtoGO2Tf9tVMMp7S', '2025-01-05 10:51:10');

-- --------------------------------------------------------

--
-- Table structure for table `webinar_1`
--

CREATE TABLE `webinar_1` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wa` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `proof_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poster_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `webinar_1`
--

INSERT INTO `webinar_1` (`id`, `name`, `wa`, `title`, `description`, `proof_path`, `poster_path`, `created_at`, `status`) VALUES
(1, '1', '082257806068', '[ECONOMY DISCUSSION 2024]', 'Webinar &amp;amp;amp;amp;amp;amp; Call For Article Economy Discussion 2024 hadir menjawab kebingungan terkait trend bisnis masa kini? Kalian juga bisa menuangkan ide dan opini melalui pembuatan artikel loh?', 'uploads/Economy Discusion.jpeg', 'Economy Discusion.jpeg', '2024-12-25 12:30:03', 'approved'),
(2, '2', '98989898', 'Webinar Bela Negara 2024', 'Tantangan Generasi Muda di Kehidupan Masyarakat Multikultural Dalam Mempertahankan Kebhinekaan Pada Era Industri 5.0', 'uploads/gambar unesa 1.jpg', 'Bela Negara.jpeg', '2024-12-25 13:39:53', 'approved'),
(3, 'Arfian Putra Pratama ', '082257806068', 'ðŸŽ® Mobile Legend MI Competition (MOMIC) 2024 ðŸŽ®', 'Halo Para Gamers! ðŸ‘‹ðŸ» Himpunan Mahasiswa Manajemen Informatika Universitas Negeri Surabaya dengan bangga mempersembahkan Mobile Legend MI Competition 2024 (MOMIC).\r\n\r\nYuk, tunggu apa lagi! Daftarkan tim kamu sekarang juga dan buktikan bahwa kamu adalah yang terbaik di MOMIC 2024', 'uploads/download (1).jpeg', 'Momic.jpeg', '2024-12-30 04:06:55', 'approved'),
(4, 'Arfian Putra Pratama ', '082257806068', 'UKM KEWIRAUSAHAAN UNESA ', 'Halo teman-teman semua!ðŸ‘‹ðŸ»\r\nYuk ikut serta dalam acara Studi Wirausaha dengan tema Fundamental dalam menghadapi tuntutan dunia bisnis yang akan dilaksanakan pada :', 'uploads/11111png.png', 'Saha.jpeg', '2024-12-30 10:15:32', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `webinar_2`
--

CREATE TABLE `webinar_2` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_pendaftaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `htm` decimal(10,2) DEFAULT NULL,
  `metode_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail_akun` text COLLATE utf8mb4_unicode_ci,
  `gambar_poster` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `webinar_2`
--

INSERT INTO `webinar_2` (`id`, `judul`, `deskripsi`, `tanggal`, `waktu`, `tempat`, `link_pendaftaran`, `htm`, `metode_pembayaran`, `detail_akun`, `gambar_poster`, `status`, `created_at`) VALUES
(1, '? [ECONOMY DISCUSSION 2024 EXTENDED] ?', 'Webinar &amp; Call For Article Economy Discussion 2024 hadir menjawab kebingungan terkait trend bisnis masa kini? Kalian juga bisa menuangkan ide dan opini melalui pembuatan artikel loh?', '2024-12-25', '19:20:00', 'Online (Zoom Meeting)', 'https://docs.google.com/forms/d/e/1FAIpQLSf7MVmKK3S6FCP305yqmXhJnatk355YvD-BUQ5wLY9gfJbkxQ/closedform', '10.00', 'bii', 'paimen', 'Economy Discusion.jpeg', 'approved', '0000-00-00 00:00:00'),
(2, 'Webinar Bela Negara 2024', 'Tantangan Generasi Muda di Kehidupan Masyarakat Multikultural Dalam Mempertahankan Kebhinekaan Pada Era Industri 5.0', '2024-12-25', '20:39:00', 'asdas', 'https://docs.google.com/forms/d/e/1FAIpQLSf7MVmKK3S6FCP305yqmXhJnatk355YvD-BUQ5wLY9gfJbkxQ/closedform', '10.00', 'asdas', 'asdasd', 'uploads/Bela Negara.jpeg', 'approved', '0000-00-00 00:00:00'),
(3, 'ðŸŽ® Mobile Legend MI Competition (MOMIC) 2024 ðŸŽ®', 'Halo Para Gamers! ðŸ‘‹ðŸ» Himpunan Mahasiswa Manajemen Informatika Universitas Negeri Surabaya dengan bangga mempersembahkan Mobile Legend MI Competition 2024 (MOMIC).\r\n\r\nYuk, tunggu apa lagi! Daftarkan tim kamu sekarang juga dan buktikan bahwa kamu adalah yang terbaik di MOMIC 2024', '2024-12-30', '10:59:00', 'surabaya', 'https://unesa.me/Momic2024', '0.40', 'BCA: 2160871302 a.n Mellani Silvia Prameswari, BRI: 8074 0101 0837 535 a.n Chaterina Fatma ,  Spay: 081252587836 a.n Mellanivia', 'unesa', 'uploads/Momic.jpeg', 'approved', '2024-12-29 21:10:44'),
(4, 'UKM KEWIRAUSAHAAN UNESA ', 'Halo teman-teman semua!ðŸ‘‹ðŸ»\r\nYuk ikut serta dalam acara Studi Wirausaha dengan tema Fundamental dalam menghadapi tuntutan dunia bisnis yang akan dilaksanakan pada :', '2024-12-30', '17:14:00', 'surabaya', 'https://bit.ly/PENDAFTARSAHA2024', '15000.00', 'Seanbank : 901667384920 (a.n. NABILLA AZAHRA)', 'unesa', 'uploads/Saha.jpeg', 'approved', '2024-12-30 03:18:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `gallery2022`
--
ALTER TABLE `gallery2022`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery2023`
--
ALTER TABLE `gallery2023`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery2024`
--
ALTER TABLE `gallery2024`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seminar`
--
ALTER TABLE `seminar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `webinar_1`
--
ALTER TABLE `webinar_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webinar_2`
--
ALTER TABLE `webinar_2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gallery2022`
--
ALTER TABLE `gallery2022`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gallery2023`
--
ALTER TABLE `gallery2023`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `gallery2024`
--
ALTER TABLE `gallery2024`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23423424;

--
-- AUTO_INCREMENT for table `seminar`
--
ALTER TABLE `seminar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `webinar_1`
--
ALTER TABLE `webinar_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `webinar_2`
--
ALTER TABLE `webinar_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
