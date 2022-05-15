-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: absen
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.13-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `baak`
--

DROP TABLE IF EXISTS `baak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `baak` (
  `id` int(11) NOT NULL,
  `baak` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `baak`
--

LOCK TABLES `baak` WRITE;
/*!40000 ALTER TABLE `baak` DISABLE KEYS */;
/*!40000 ALTER TABLE `baak` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dosen`
--

DROP TABLE IF EXISTS `dosen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dosen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dosen` varchar(45) DEFAULT NULL,
  `ctddate` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dosen`
--

LOCK TABLES `dosen` WRITE;
/*!40000 ALTER TABLE `dosen` DISABLE KEYS */;
INSERT INTO `dosen` VALUES (1,'Agus ',NULL),(2,'Hilman',NULL),(3,'Pak Hilmi',NULL);
/*!40000 ALTER TABLE `dosen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `izin`
--

DROP TABLE IF EXISTS `izin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `izin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jm_id` int(11) DEFAULT NULL,
  `mahasiswa_id` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `alasan` text DEFAULT NULL,
  `approve` char(1) DEFAULT NULL,
  `approve_by` int(11) DEFAULT NULL COMMENT 'BAAK => Approve',
  `matkul_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `izin`
--

LOCK TABLES `izin` WRITE;
/*!40000 ALTER TABLE `izin` DISABLE KEYS */;
INSERT INTO `izin` VALUES (1,1,1,'2020-07-25','Izin keluar kota karena ada urusan dari kantor','1',NULL,NULL),(2,3,1,'2020-07-25','Mohon izin pak','0',NULL,NULL);
/*!40000 ALTER TABLE `izin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jadwal_matkul`
--

DROP TABLE IF EXISTS `jadwal_matkul`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jadwal_matkul` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matkul_id` int(11) DEFAULT NULL,
  `dosen_id` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_akhir` time DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jadwal_matkul`
--

LOCK TABLES `jadwal_matkul` WRITE;
/*!40000 ALTER TABLE `jadwal_matkul` DISABLE KEYS */;
INSERT INTO `jadwal_matkul` VALUES (1,1,1,'2020-07-25','08:00:00','10:00:00','1'),(2,2,2,'2020-07-25','11:00:00','13:00:00','1'),(3,3,3,'2020-07-25','15:00:00','16:00:00','1');
/*!40000 ALTER TABLE `jadwal_matkul` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mahasiswa`
--

DROP TABLE IF EXISTS `mahasiswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(35) DEFAULT NULL,
  `nik` varchar(12) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mahasiswa`
--

LOCK TABLES `mahasiswa` WRITE;
/*!40000 ALTER TABLE `mahasiswa` DISABLE KEYS */;
INSERT INTO `mahasiswa` VALUES (1,'Sahrul Rizal','1122','c4ca4238a0b923820dcc509a6f75849b');
/*!40000 ALTER TABLE `mahasiswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matkul`
--

DROP TABLE IF EXISTS `matkul`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `matkul` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matkul` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matkul`
--

LOCK TABLES `matkul` WRITE;
/*!40000 ALTER TABLE `matkul` DISABLE KEYS */;
INSERT INTO `matkul` VALUES (1,'Web Security'),(2,'Pemrograman Visual'),(3,'TPPL');
/*!40000 ALTER TABLE `matkul` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notif`
--

DROP TABLE IF EXISTS `notif`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pesan` varchar(175) DEFAULT NULL,
  `to` int(11) DEFAULT NULL,
  `ctddate` date DEFAULT NULL,
  `type` char(1) DEFAULT '1' COMMENT '0 => Perseorangan\n1 => Semua',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notif`
--

LOCK TABLES `notif` WRITE;
/*!40000 ALTER TABLE `notif` DISABLE KEYS */;
INSERT INTO `notif` VALUES (1,'Pengajuan izin Web Security diterima',1,'2020-07-25','0'),(2,'Mohon maaf pengajuan izin TPPL ditolak',1,'2020-07-25','0'),(3,'Ada perubahan jadwal hari ini, silahkan periksa jadwal hari ini',0,'2020-07-25','1');
/*!40000 ALTER TABLE `notif` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-15 15:34:39
