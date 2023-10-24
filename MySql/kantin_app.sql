-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2023 at 01:48 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projek_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembayaran`
--

CREATE TABLE `detail_pembayaran` (
  `id_detail_pembayaran` int(10) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `id_menu` int(10) NOT NULL,
  `id_warung` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_pembayaran`
--

INSERT INTO `detail_pembayaran` (`id_detail_pembayaran`, `id_pembayaran`, `id_menu`, `id_warung`, `qty`, `total`) VALUES
(10, 10, 1, 1, 23, 322000),
(11, 10, 2, 1, 1, 6000),
(12, 10, 3, 2, 1, 7000),
(13, 11, 3, 2, 1, 7000),
(14, 11, 1, 1, 1, 14000),
(15, 11, 5, 2, 45, 720000),
(16, 12, 1, 1, 4, 56000),
(17, 12, 1, 1, 1, 14000),
(18, 13, 3, 2, 4, 28000),
(19, 14, 3, 2, 1, 7000),
(20, 15, 2, 1, 1, 6000),
(21, 15, 1, 1, 1, 14000),
(22, 15, 3, 2, 6, 42000),
(23, 16, 7, 3, 1, 15000),
(24, 17, 2, 1, 69, 414000),
(25, 17, 3, 2, 10, 70000),
(26, 18, 2, 1, 1500, 9000000),
(27, 19, 3, 2, 3, 21000),
(28, 19, 4, 3, 89, 623000),
(29, 20, 2, 1, 19, 114000),
(30, 20, 5, 2, 40, 640000),
(31, 21, 1, 1, 3, 42000),
(32, 22, 1, 1, 1, 14000),
(33, 23, 3, 2, 1, 7000),
(34, 24, 2, 1, 1, 6000),
(35, 24, 7, 3, 1, 15000),
(36, 24, 1, 1, 4, 56000),
(37, 25, 3, 2, 3, 21000),
(38, 25, 5, 2, 1, 16000),
(39, 26, 5, 2, 1, 16000);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(10) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `deskripsi_menu` varchar(100) NOT NULL,
  `gambar` varchar(225) NOT NULL,
  `jenis` enum('makanan','minuman') NOT NULL,
  `id_warung` int(10) NOT NULL,
  `harga` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `deskripsi_menu`, `gambar`, `jenis`, `id_warung`, `harga`) VALUES
(1, 'Ayam Laos', 'Ayam yang diolah secara tradisional, dan digoreng dengan sepenih hati', 'https://img.kurio.network/8MULHXwSbPTW1KvlvDzCajGaTDs=/440x440/filters:quality(80)/https://kurio-img.kurioapps.com/21/02/16/46841aa9-8853-4e4b-a4ab-1a884c8afb2a.jpe', 'makanan', 1, 14000),
(2, 'Es Jeruk Peras', 'Dibuat dengan jeruk pilihan, dan diperas menggunakan metode tradisional', 'https://dcostseafood.id/wp-content/uploads/2021/12/ES-JERUK-murni.jpg', 'minuman', 1, 6500),
(3, 'Jus Jambu', 'dipilih dengan jambu pilihan yang dipetik ketika matahari subuh bersinar', 'https://dcostseafood.id/wp-content/uploads/2021/12/JUS-JAMBU-400x400.jpg', 'minuman', 2, 7000),
(4, 'Jus Alpukat', 'alpukat yang masih fresh diambil ketika sudah matang', 'https://dcostseafood.id/wp-content/uploads/2021/12/Jus-Alpukat-400x400.jpg', 'minuman', 3, 7000),
(5, 'Bakmi Goreng', 'bakmi asli yogyakarta dengan resep turun menurun', 'https://dcostseafood.id/wp-content/uploads/2023/04/Bakmi-goreng-spesial-2-400x400.jpg', 'makanan', 2, 16000),
(6, 'Tahu Crispy', 'digoreng dengan kematangan yang pas sehingga crispy yang pas', 'https://dcostseafood.id/wp-content/uploads/2019/04/Tahu-Jepang-saus-Telur-Asin-400x400.jpg', 'makanan', 3, 10000),
(7, 'Soto Ayam Lamongan', 'Soto asli lamongan menggunakan resep rahasia dari nenek moyang terdahulu, Nikmat tiada tara', 'https://assets.unileversolutions.com/recipes-v2/242798.jpg ', 'makanan', 3, 15000),
(11, 'Ayam Laos', 'Ayam Mantap enak sekali, lebih murah dari toko sebelah', 'https://asset.kompas.com/crops/5ipdR3a27VJHl7fhcmnoMOMSDbg=/200x67:1000x600/750x500/data/photo/2022/04/16/625aaa124f267.jpg', 'makanan', 2, 11000),
(12, 'Tahu isi', 'merupakan makanan khas dari perdesaan ', 'https://asset.kompas.com/crops/VSdX_U1CFkOPeYtm4CXERJvD9to=/100x67:900x600/750x500/data/photo/2023/04/01/6427b71555180.jpg', 'makanan', 20, 5500),
(13, 'Bakwan', 'dengan isian yang menggugah selera membuat siapa saja tergoda', 'https://media.sukabumiupdate.com/media/2023/01/20/1674217900_63ca89ac0f895_Ck15X6rBGVyRcdxXu9YC.jpg', 'makanan', 20, 1000),
(14, 'Nutrisari Jeruk', 'minuman jeruk yang tidak pernah membosankan', 'https://img-global.cpcdn.com/recipes/c2790f7f2c04a4c9/680x482cq70/es-nutrisari-yakult-foto-resep-utama.jpg', 'minuman', 20, 2500);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(10) NOT NULL,
  `id_siswa` int(10) NOT NULL,
  `tanggal_pembayaran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_siswa`, `tanggal_pembayaran`) VALUES
(10, 2, '2023-09-12'),
(11, 2, '2023-09-12'),
(12, 2, '2023-09-13'),
(13, 2, '2023-09-13'),
(14, 2, '2023-09-13'),
(15, 1, '2023-09-13'),
(16, 1, '2023-09-13'),
(21, 6, '2023-09-13'),
(22, 7, '2023-09-29'),
(23, 4, '2023-10-09'),
(24, 12, '2023-10-09'),
(25, 4, '2023-10-10'),
(26, 2, '2023-10-11');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(22) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `saldo_siswa` int(100) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('siswa','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama`, `kelas`, `saldo_siswa`, `email`, `password`, `role`) VALUES
(1, 'Asfina Andini', 'XI R 1', 2147483647, 'asfina@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'siswa'),
(2, 'pandhu', 'X R1', 449000, 'pandhu@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'siswa'),
(4, 'admin', 'XI R3', 998234000, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(5, 'member', 'XI R1', 100000, 'member@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin'),
(12, 'Muhammad Dharma Munjalindra', 'X R1', 73000, 'dharma@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'siswa');

-- --------------------------------------------------------

--
-- Table structure for table `warung`
--

CREATE TABLE `warung` (
  `id_warung` int(10) NOT NULL,
  `nama_warung` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `warung`
--

INSERT INTO `warung` (`id_warung`, `nama_warung`, `deskripsi`) VALUES
(1, 'Pak Yoyok', 'Kami menjual berbagai makanan dan minuman khas daerah jawa dengan rempah rempah pilihan'),
(2, 'Bu Latif', 'Menjual masakan dengan bumbu tradisional jawa'),
(20, 'Pak Siswoyo', 'Menjual Aneka Gorengan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pembayaran`
--
ALTER TABLE `detail_pembayaran`
  ADD PRIMARY KEY (`id_detail_pembayaran`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `warung`
--
ALTER TABLE `warung`
  ADD PRIMARY KEY (`id_warung`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pembayaran`
--
ALTER TABLE `detail_pembayaran`
  MODIFY `id_detail_pembayaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `warung`
--
ALTER TABLE `warung`
  MODIFY `id_warung` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
