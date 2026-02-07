-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2024 at 06:35 PM
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
-- Database: `db_futsal`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insert_ekstra` (IN `nama_ekstra` VARCHAR(225), IN `stok_ekstra` INT, IN `harga_ekstra` INT)   BEGIN
	INSERT INTO ekstra VALUES ('', nama_ekstra, stok_ekstra, harga_ekstra);
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insert_lapangan` (IN `nama_lapangan` VARCHAR(225), IN `fasilitas_tambahan` VARCHAR(255), IN `foto_lapangan` VARCHAR(225), IN `harga_lapangan` VARCHAR(255))   BEGIN
	INSERT INTO lapangan VALUES ('', nama_lapangan, fasilitas_tambahan, foto_lapangan, harga_lapangan);
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insert_pegawai` (IN `nama_pegawai` VARCHAR(225), IN `kontak_pegawai` VARCHAR(255), IN `email` VARCHAR(225), IN `password_` VARCHAR(255))   BEGIN
	INSERT INTO pegawai VALUES ('', nama_pegawai, kontak_pegawai, email, password_, '');
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insert_pelanggan` (IN `nama_pelanggan` VARCHAR(225), IN `kontak_pelanggan` VARCHAR(255), IN `email` VARCHAR(225), IN `password_` VARCHAR(255))   BEGIN
	INSERT INTO pelanggan VALUES ('', nama_pelanggan, kontak_pelanggan, email, password_, '');
 END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `sf_jumlah_transaksi_tertentu` (`kode_pelanggan` INT(11)) RETURNS INT(11)  BEGIN
	DECLARE Jumlah INT(11);
	SET Jumlah = 0;

	SELECT COUNT(id_sewa) INTO Jumlah 
	FROM sewa WHERE id_pelanggan = kode_pelanggan;

 	RETURN Jumlah;
 END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ekstra`
--

CREATE TABLE `ekstra` (
  `id_ekstra` int(11) NOT NULL,
  `nama_ekstra` varchar(255) NOT NULL,
  `stok_ekstra` int(11) NOT NULL,
  `harga_ekstra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `ekstra`
--

INSERT INTO `ekstra` (`id_ekstra`, `nama_ekstra`, `stok_ekstra`, `harga_ekstra`) VALUES
(1, 'Rompi', 50, 2000),
(2, 'Cone', 150, 1000);

--
-- Triggers `ekstra`
--
DELIMITER $$
CREATE TRIGGER `tr_warning_ekstra` BEFORE INSERT ON `ekstra` FOR EACH ROW BEGIN
 	IF new.nama_ekstra = ''
    THEN
		SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Nama tidak boleh kosong !';
    ELSEIF new.stok_ekstra = '' 
    THEN
    	SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Stok tidak boleh kosong !';
    ELSEIF new.harga_ekstra = ''
    THEN
    	SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Harga tidak boleh kosong !';
    END IF;
 END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `lapangan`
--

CREATE TABLE `lapangan` (
  `id_lapangan` int(11) NOT NULL,
  `nama_lapangan` varchar(255) NOT NULL,
  `fasilitas_tambahan` varchar(255) NOT NULL,
  `foto_lapangan` varchar(255) NOT NULL,
  `harga_lapangan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `lapangan`
--

INSERT INTO `lapangan` (`id_lapangan`, `nama_lapangan`, `fasilitas_tambahan`, `foto_lapangan`, `harga_lapangan`) VALUES
(1, 'Lapangan 1', 'Gratis dipinjamkan untuk bola', 'lapangan1.jpg', 150000),
(2, 'Lapangan 2', 'Gratis dipinjamkan untuk bola', 'lapangan2.jpg', 150000),
(3, 'Lapangan 3', 'Gratis dipinjamkan untuk Bola', 'lapangan3.jpg', 150000);

--
-- Triggers `lapangan`
--
DELIMITER $$
CREATE TRIGGER `tr_warning_lapangan` BEFORE INSERT ON `lapangan` FOR EACH ROW BEGIN
 	IF new.nama_lapangan = ''
    THEN
		SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Nama tidak boleh kosong !';
    ELSEIF new.fasilitas_tambahan = '' 
    THEN
    	SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Fasilitas tidak boleh kosong !';
    ELSEIF new.harga_lapangan = ''
    THEN
    	SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Harga tidak boleh kosong !';
    END IF;
 END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `kontak_pegawai` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Triggers `pegawai`
--
DELIMITER $$
CREATE TRIGGER `tr_warning_pegawai` BEFORE INSERT ON `pegawai` FOR EACH ROW BEGIN
 	IF new.nama_pegawai = ''
    THEN
		SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Nama tidak boleh kosong !';
    ELSEIF new.kontak_pegawai = '' 
    THEN
    	SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Kontak tidak boleh kosong !';
    ELSEIF new.email = '' 
    THEN
    	SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Email tidak boleh kosong !';
    ELSEIF new.password = ''
    THEN
    	SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Password tidak boleh kosong !';
    END IF;
 END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `kontak_pelanggan` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Create_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `kontak_pelanggan`, `email`, `password`, `Create_at`) VALUES
(1, 'Jokowi', '789657841', 'jokowi@gmail.com', '$2y$10$dZSPWoPPL6hi4BxcsLZh.eRlLm6qbbRiQAu4PVp/ut78BbzA93Tu.', '2024-06-12 12:41:36');

--
-- Triggers `pelanggan`
--
DELIMITER $$
CREATE TRIGGER `tr_warning_pelanggan` BEFORE INSERT ON `pelanggan` FOR EACH ROW BEGIN
 	IF new.nama_pelanggan = ''
    THEN
		SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Nama tidak boleh kosong !';
    ELSEIF new.kontak_pelanggan = '' 
    THEN
    	SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Kontak tidak boleh kosong !';
    ELSEIF new.email = '' 
    THEN
    	SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Email tidak boleh kosong !';
    ELSEIF new.password = ''
    THEN
    	SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Password tidak boleh kosong !';
    END IF;
 END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `id_sewa` int(11) NOT NULL,
  `tanggal_sewa` date NOT NULL,
  `jam_awal` time NOT NULL,
  `jam_akhir` time NOT NULL,
  `metode_bayar` varchar(255) NOT NULL,
  `jumlah_stok` int(11) NOT NULL,
  `id_lapangan` int(11) DEFAULT NULL,
  `id_ekstra` int(11) DEFAULT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_voucher` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Triggers `sewa`
--
DELIMITER $$
CREATE TRIGGER `tr_Cek_Waktu_Booking` BEFORE INSERT ON `sewa` FOR EACH ROW BEGIN
	
    DECLARE tanggal DATE;
    DECLARE surface INT;
    DECLARE awal TIME;
    DECLARE akhir TIME;
    
    DECLARE price_lapangan INT;
    DECLARE price_ekstra INT;
    DECLARE price_voucher INT;
    
    SET tanggal = NEW.tanggal_sewa;
    SET awal = NEW.jam_awal;
    SET akhir = NEW.jam_akhir;
    SET surface = NEW.id_lapangan;
    
    -- Periksa apakah id_bayar ada dalam tabel sewa_pembayaran
    IF EXISTS (SELECT sewa.tanggal_sewa, sewa.jam_awal, sewa.jam_akhir, sewa.id_lapangan FROM sewa
    WHERE sewa.tanggal_sewa = tanggal AND sewa.jam_awal = awal AND sewa.jam_akhir = akhir AND sewa.id_lapangan = surface AND awal = akhir)
    THEN
       	SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Waktu tidak boleh Sama !';
    ELSEIF (TIMEDIFF(akhir, awal) < '10:00:00' AND NEW.id_voucher IS NOT NULL) THEN
    	SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Voucher tidak boleh diisi apabila waktu main kurang dari 10 jam !';
    ELSEIF (TIMEDIFF(akhir, awal) >= '10:00:00' AND NEW.id_voucher IS NULL) THEN
    	SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Tolong Isi nilai Voucher (Diisikan sesuai dengan id_pelanggan) !';
    ELSEIF ((akhir > '23:00:00' OR akhir < '07:00:00') OR (awal > '23:00:00' OR awal < '07:00:00' )) THEN
    	SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Tolong Isi waktu dengan rentang diantara pukul 07:00:00 - 23:00:00 !';
    END IF;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_Isi_Pembayaran` AFTER INSERT ON `sewa` FOR EACH ROW BEGIN
    DECLARE awal TIME;
    DECLARE akhir TIME;
    
    DECLARE current_hour TIME;
    DECLARE total_hours INT DEFAULT 0;
    DECLARE sum_harga INT DEFAULT 0;
    
    DECLARE price_lapangan INT DEFAULT 0;
    DECLARE price_ekstra INT DEFAULT 0;
    DECLARE price_diskon INT DEFAULT 0;
    
    SET awal = NEW.jam_awal;
    SET akhir = NEW.jam_akhir;
    
    -- Mengambil harga_lapangan, jika NULL set ke 0
    SELECT COALESCE(lapangan.harga_lapangan, 0) INTO price_lapangan
    FROM lapangan 
    WHERE lapangan.id_lapangan = NEW.id_lapangan;

    -- Mengambil harga_ekstra, jika NULL set ke 0
    SELECT COALESCE(ekstra.harga_ekstra, 0) INTO price_ekstra
    FROM ekstra 
    WHERE ekstra.id_ekstra = NEW.id_ekstra;
    
    -- Mengambil harga_lapangan, jika NULL set ke 0
    SELECT COALESCE(voucher_diskon.diskon, 0) INTO price_diskon
    FROM voucher_diskon 
    WHERE voucher_diskon.id_voucher = NEW.id_voucher;

    -- Menghitung total harga berdasarkan durasi sewa dan aturan harga
    SET current_hour = awal;
    WHILE current_hour < akhir DO
        IF current_hour >= '07:00:00' AND current_hour < '16:00:00' THEN
            SET sum_harga = sum_harga + (price_lapangan - 60000);
        ELSEIF current_hour >= '16:00:00' AND current_hour < '23:00:00' THEN
            SET sum_harga = sum_harga + price_lapangan;
        END IF;
        
        SET current_hour = ADDTIME(current_hour, '01:00:00');
        SET total_hours = total_hours + 1;
    END WHILE;
    
    -- Tambahkan harga lapangan dan harga ekstra ke total harga
    SET sum_harga = sum_harga + (price_ekstra * NEW.jumlah_stok) - price_diskon;
    
    -- Periksa apakah id_sewa ada dalam tabel sewa_pembayaran
    IF NOT EXISTS (SELECT * FROM sewa_pembayaran WHERE sewa_pembayaran.id_sewa = NEW.id_sewa) THEN
        -- Jika tidak ada, lakukan INSERT
        INSERT INTO sewa_pembayaran (id_sewa, durasi_sewa, total_harga, status_pembayaran) VALUES
        (NEW.id_sewa, TIMEDIFF(akhir, awal), sum_harga, 'pending');
    END IF;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sewa_pembayaran`
--

CREATE TABLE `sewa_pembayaran` (
  `id_bayar` int(11) NOT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `durasi_sewa` time DEFAULT NULL,
  `status_pembayaran` varchar(255) DEFAULT NULL,
  `transaksi_timestamp` timestamp NULL DEFAULT current_timestamp(),
  `id_sewa` int(11) DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `voucher_diskon`
--

CREATE TABLE `voucher_diskon` (
  `id_voucher` int(11) NOT NULL,
  `diskon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `voucher_diskon`
--

INSERT INTO `voucher_diskon` (`id_voucher`, `diskon`) VALUES
(1, 50000),
(2, 50000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ekstra`
--
ALTER TABLE `ekstra`
  ADD PRIMARY KEY (`id_ekstra`);

--
-- Indexes for table `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`id_lapangan`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `id_lapangan` (`id_lapangan`),
  ADD KEY `id_ekstra` (`id_ekstra`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_voucher` (`id_voucher`);

--
-- Indexes for table `sewa_pembayaran`
--
ALTER TABLE `sewa_pembayaran`
  ADD PRIMARY KEY (`id_bayar`),
  ADD KEY `id_sewa` (`id_sewa`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `voucher_diskon`
--
ALTER TABLE `voucher_diskon`
  ADD PRIMARY KEY (`id_voucher`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ekstra`
--
ALTER TABLE `ekstra`
  MODIFY `id_ekstra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lapangan`
--
ALTER TABLE `lapangan`
  MODIFY `id_lapangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sewa`
--
ALTER TABLE `sewa`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sewa_pembayaran`
--
ALTER TABLE `sewa_pembayaran`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `voucher_diskon`
--
ALTER TABLE `voucher_diskon`
  MODIFY `id_voucher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sewa`
--
ALTER TABLE `sewa`
  ADD CONSTRAINT `sewa_ibfk_1` FOREIGN KEY (`id_lapangan`) REFERENCES `lapangan` (`id_lapangan`),
  ADD CONSTRAINT `sewa_ibfk_2` FOREIGN KEY (`id_ekstra`) REFERENCES `ekstra` (`id_ekstra`),
  ADD CONSTRAINT `sewa_ibfk_3` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `sewa_ibfk_4` FOREIGN KEY (`id_voucher`) REFERENCES `voucher_diskon` (`id_voucher`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sewa_pembayaran`
--
ALTER TABLE `sewa_pembayaran`
  ADD CONSTRAINT `sewa_pembayaran_ibfk_1` FOREIGN KEY (`id_sewa`) REFERENCES `sewa` (`id_sewa`),
  ADD CONSTRAINT `sewa_pembayaran_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
