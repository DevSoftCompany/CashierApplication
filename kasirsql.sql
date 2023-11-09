-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for siswa_smk
CREATE DATABASE IF NOT EXISTS `siswa_smk` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `siswa_smk`;

-- Dumping structure for table siswa_smk.kategori
CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table siswa_smk.kategori: ~9 rows (approximately)
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
	(1, 'menu paket'),
	(2, 'aneka kuah'),
	(3, 'aneka kukusan'),
	(4, 'aneka ayam'),
	(5, 'aneka bakaran'),
	(6, 'aneka snack'),
	(7, 'nasi dan mie'),
	(8, 'aneka minuman panas'),
	(9, 'aneka minuman dingin');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;

-- Dumping structure for table siswa_smk.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(100) NOT NULL DEFAULT '0',
  `harga` int(11) NOT NULL DEFAULT '0',
  `kategori_id` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

-- Dumping data for table siswa_smk.menu: ~0 rows (approximately)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`id_menu`, `nama_menu`, `harga`, `kategori_id`, `status`) VALUES
	(1, 'nasi telur geprek + teh / es teh', 15000, 1, 0),
	(2, 'nasi pecel telur ceplok + tempe mendoan + teh / es teh', 15000, 1, 0),
	(3, 'nasi oseng godong kates + telur balado + teh / es teh', 15000, 1, 0),
	(4, 'nasi goreng + teh / es teh', 16000, 1, 0),
	(5, 'nasi ayam popcorn + teh / es teh', 18000, 1, 0),
	(6, 'chicken steak + teh / es teh', 18000, 1, 0),
	(7, 'nasi ayam geprek + teh / es teh', 18000, 1, 0),
	(8, 'nasi urap + ayam goreng + tempe mendoan + teh / es teh', 18000, 1, 0),
	(9, 'nasi oseng godong kates + ayam goreng + tempe mendoan + teh / es teh', 18000, 1, 0),
	(10, 'nasi ayam goreng + teh / es teh', 23000, 1, 0),
	(11, 'nasi ayam bakar + teh / es teh', 23000, 1, 0),
	(12, 'nasi ikan bakar + teh / es teh', 28000, 1, 0),
	(13, 'sup matahari', 10000, 2, 0),
	(14, 'sup galantin', 10000, 2, 0),
	(15, 'selat kuah segar', 15000, 2, 0),
	(16, 'nasi pepes tahu', 12000, 3, 0),
	(17, 'nasi pepes pindang', 12000, 3, 0),
	(18, 'nasi pepes bandeng', 15000, 3, 0),
	(19, 'nasi pepes nila', 20000, 3, 0),
	(20, 'nasi bothok telur asin', 15000, 3, 0),
	(21, 'nasi kepala ayam', 10000, 4, 0),
	(22, 'nasi ati ayam', 10000, 4, 0),
	(23, 'nasi kulit ayam', 10000, 4, 0),
	(24, 'nasi ayam geprek fillet', 10000, 4, 0),
	(25, 'nasi ayam popcorn', 15000, 4, 0),
	(26, 'chicken steak', 15000, 4, 0),
	(27, 'nasi chicken katsu asam manis', 15000, 4, 0),
	(28, 'nasi chicken katsu sambal matah', 15000, 4, 0),
	(29, 'nasi ayam goreng', 20000, 4, 0),
	(30, 'nasi ayam geprek', 20000, 4, 0),
	(31, 'nasi ayam goreng jawa', 30000, 4, 0),
	(32, 'nasi ayam bakar', 20000, 5, 0),
	(33, 'nasi ikan bakar', 25000, 5, 0),
	(34, 'nasi ayam bakar jawa', 30000, 5, 0),
	(35, 'paket mendoan', 5000, 6, 0),
	(36, 'sosis crispy', 6000, 6, 0),
	(37, 'kulit ayam crispy', 7000, 6, 0),
	(38, 'tahu crispy', 10000, 6, 0),
	(39, 'paket snack (tahu bakso, prastel, sosis basah)', 10000, 6, 0),
	(40, 'nasi putih ', 4000, 7, 0),
	(41, 'nasi goreng', 13000, 7, 0),
	(42, 'bakmie goreng jawa', 13000, 7, 0),
	(43, 'bakmie godok jawa', 13000, 7, 0),
	(44, 'teh', 4000, 8, 0),
	(45, 'teh krampul', 5000, 8, 0),
	(46, 'jeruk', 5000, 8, 0),
	(47, 'kopi hitam', 5000, 8, 0),
	(48, 'kopi susu', 10000, 8, 0),
	(49, 'beras kencur', 12000, 8, 0),
	(50, 'gula asem', 12000, 8, 0),
	(51, 'teh tarik', 12000, 8, 0),
	(52, 'hot cappucino', 15000, 8, 0),
	(53, 'hot chocolate', 15000, 8, 0),
	(54, 'es teh', 4000, 9, 0),
	(55, 'es teh krampul', 5000, 9, 0),
	(56, 'es jeruk', 5000, 9, 0),
	(57, 'es kopi hitam', 7000, 9, 0),
	(58, 'es kopi susu', 10000, 9, 0),
	(59, 'es beras kencur', 10000, 9, 0),
	(60, 'es gula asem', 10000, 9, 0),
	(61, 'es teh tarik', 12000, 9, 0),
	(62, 'aren coffee', 15000, 9, 0),
	(63, 'ice mocca', 15000, 9, 0),
	(64, 'cappucino', 15000, 9, 0),
	(65, 'chocolate', 15000, 9, 0),
	(66, 'sunset berry', 15000, 9, 0),
	(67, 'melon squash', 15000, 9, 0);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

-- Dumping structure for table siswa_smk.pelanggan
CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pelanggan` varchar(50) DEFAULT '',
  `no_hp` varchar(15) DEFAULT '',
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table siswa_smk.pelanggan: ~0 rows (approximately)
/*!40000 ALTER TABLE `pelanggan` DISABLE KEYS */;
/*!40000 ALTER TABLE `pelanggan` ENABLE KEYS */;

-- Dumping structure for table siswa_smk.siswa
CREATE TABLE IF NOT EXISTS `siswa` (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(10) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `foto_siswa` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table siswa_smk.siswa: ~2 rows (approximately)
/*!40000 ALTER TABLE `siswa` DISABLE KEYS */;
INSERT INTO `siswa` (`id_siswa`, `nis`, `nama_siswa`, `jenis_kelamin`, `foto_siswa`, `alamat`) VALUES
	(1, '8001', 'Andi Wijaya', 'Laki-laki', '', 'Wonogiri'),
	(2, '8002', 'Anita Larasati', 'Perempuan', '', 'Solo'),
	(7, '8003', 'Desy Ratna', 'Perempuan', '', 'Boyolali'),
	(8, '17058', 'Mentari Dwi Prastiwi', 'Perempuan', 'ð–¤â‹†â˜†â‹†â˜….jpeg', 'abvdbvabvjfagvf');
/*!40000 ALTER TABLE `siswa` ENABLE KEYS */;

-- Dumping structure for table siswa_smk.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table siswa_smk.user: ~0 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
	(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
	(2, 'mentari', '12345');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
