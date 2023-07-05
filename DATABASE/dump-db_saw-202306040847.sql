-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: db_saw
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.26-MariaDB-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_data_saw`
--

DROP TABLE IF EXISTS `tbl_data_saw`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_data_saw` (
  `id_data` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `id_usia` int(11) DEFAULT NULL,
  `id_hobi` int(11) DEFAULT NULL,
  `id_lokasi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_data`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_data_saw`
--

LOCK TABLES `tbl_data_saw` WRITE;
/*!40000 ALTER TABLE `tbl_data_saw` DISABLE KEYS */;
INSERT INTO `tbl_data_saw` VALUES (1,2,500000,NULL,NULL,NULL),(2,1,700000,NULL,NULL,NULL),(3,2,1000000,3,NULL,NULL);
/*!40000 ALTER TABLE `tbl_data_saw` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_finansial`
--

DROP TABLE IF EXISTS `tbl_finansial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_finansial` (
  `id_fin` int(11) NOT NULL AUTO_INCREMENT,
  `fin_min` int(11) DEFAULT NULL,
  `fin_max` int(11) DEFAULT NULL,
  `bobot_fin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_fin`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_finansial`
--

LOCK TABLES `tbl_finansial` WRITE;
/*!40000 ALTER TABLE `tbl_finansial` DISABLE KEYS */;
INSERT INTO `tbl_finansial` VALUES (1,0,499999,1),(2,500000,999999,2),(3,1000000,1999999,2),(4,2000000,2999999,2),(5,3000000,4999999,3);
/*!40000 ALTER TABLE `tbl_finansial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_hasil_saw`
--

DROP TABLE IF EXISTS `tbl_hasil_saw`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_hasil_saw` (
  `id_saw` int(11) NOT NULL AUTO_INCREMENT,
  `id_data` int(11) DEFAULT NULL,
  `id_wisata` int(11) DEFAULT NULL,
  `hasil_saw` float DEFAULT NULL,
  PRIMARY KEY (`id_saw`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_hasil_saw`
--

LOCK TABLES `tbl_hasil_saw` WRITE;
/*!40000 ALTER TABLE `tbl_hasil_saw` DISABLE KEYS */;
INSERT INTO `tbl_hasil_saw` VALUES (1,1,98,1.03333),(2,1,97,0.816667),(3,1,75,0.771429),(4,1,96,0.838095),(5,1,69,1.27143),(6,2,71,1.02),(7,2,95,0.786667),(8,2,86,0.986667),(9,2,98,1.03333),(10,2,97,0.816667),(11,3,98,1.17778),(12,3,69,1.42857),(13,3,84,1.02857),(14,3,68,1.2),(15,3,99,1);
/*!40000 ALTER TABLE `tbl_hasil_saw` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_hobi`
--

DROP TABLE IF EXISTS `tbl_hobi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_hobi` (
  `id_hobi` int(11) NOT NULL AUTO_INCREMENT,
  `hobi` varchar(50) DEFAULT NULL,
  `bobot_hobi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_hobi`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_hobi`
--

LOCK TABLES `tbl_hobi` WRITE;
/*!40000 ALTER TABLE `tbl_hobi` DISABLE KEYS */;
INSERT INTO `tbl_hobi` VALUES (1,'BERENANG',2),(2,'MENDAKI',2),(3,'MAKAN',2),(4,'FOTOGRAFI',3),(5,'SEJARAH & BUDAYA',1);
/*!40000 ALTER TABLE `tbl_hobi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_kriteria`
--

DROP TABLE IF EXISTS `tbl_kriteria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_kriteria` (
  `id_kriteria` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kriteria` varchar(50) DEFAULT NULL,
  `kriteria_type` enum('COST','BENEFIT') DEFAULT 'COST',
  `bobot` float DEFAULT NULL,
  PRIMARY KEY (`id_kriteria`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_kriteria`
--

LOCK TABLES `tbl_kriteria` WRITE;
/*!40000 ALTER TABLE `tbl_kriteria` DISABLE KEYS */;
INSERT INTO `tbl_kriteria` VALUES (1,'USIA','BENEFIT',0.1),(2,'HOBI','BENEFIT',0.2),(3,'FINANSIAL','COST',0.4),(4,'LOKASI','COST',0.3);
/*!40000 ALTER TABLE `tbl_kriteria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_lokasi`
--

DROP TABLE IF EXISTS `tbl_lokasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_lokasi` (
  `id_lokasi` int(11) NOT NULL AUTO_INCREMENT,
  `lokasi` varchar(50) DEFAULT NULL,
  `bobot_lokasi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_lokasi`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_lokasi`
--

LOCK TABLES `tbl_lokasi` WRITE;
/*!40000 ALTER TABLE `tbl_lokasi` DISABLE KEYS */;
INSERT INTO `tbl_lokasi` VALUES (1,'SURABAYA',1),(2,'BANDUNG',2),(3,'LOMBOK',2),(4,'YOGYAKARTA',2),(5,'MALANG',3);
/*!40000 ALTER TABLE `tbl_lokasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_normalisasi_saw`
--

DROP TABLE IF EXISTS `tbl_normalisasi_saw`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_normalisasi_saw` (
  `id_normal` int(11) NOT NULL AUTO_INCREMENT,
  `id_data` int(11) DEFAULT NULL,
  `id_wisata` int(11) DEFAULT NULL,
  `hitung_harga` float DEFAULT NULL,
  `hitung_usia` float DEFAULT NULL,
  `hitung_hobi` float DEFAULT NULL,
  `hitung_lokasi` float DEFAULT NULL,
  PRIMARY KEY (`id_normal`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_normalisasi_saw`
--

LOCK TABLES `tbl_normalisasi_saw` WRITE;
/*!40000 ALTER TABLE `tbl_normalisasi_saw` DISABLE KEYS */;
INSERT INTO `tbl_normalisasi_saw` VALUES (1,1,98,0.333333,0.75,1,0.5),(2,1,97,0.375,0.5,0.666667,0.5),(3,1,75,0.428571,0.5,0.666667,0.333333),(4,1,96,0.428571,0.5,0.666667,0.5),(5,1,69,0.428571,0.75,1,1),(6,2,71,0.3,0.25,1,1),(7,2,95,0.3,0.5,0.666667,0.5),(8,2,86,0.3,1,0.666667,0.5),(9,2,98,0.333333,0.75,1,0.5),(10,2,97,0.375,0.5,0.666667,0.5),(11,3,98,0.444444,1,1,0.5),(12,3,69,0.571429,1,1,1),(13,3,84,0.571429,1,0.666667,0.333333),(14,3,68,0.666667,1,0.333333,1),(15,3,99,0.666667,1,0.333333,0.5);
/*!40000 ALTER TABLE `tbl_normalisasi_saw` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` enum('USER','ADMIN') DEFAULT 'USER',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` VALUES (1,'admin','admin','admin','ADMIN'),(2,'user','user','user','USER');
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_usia`
--

DROP TABLE IF EXISTS `tbl_usia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_usia` (
  `id_usia` int(11) NOT NULL AUTO_INCREMENT,
  `usia` varchar(50) DEFAULT NULL,
  `bobot_usia` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usia`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_usia`
--

LOCK TABLES `tbl_usia` WRITE;
/*!40000 ALTER TABLE `tbl_usia` DISABLE KEYS */;
INSERT INTO `tbl_usia` VALUES (1,'Anak',1),(2,'Remaja',2),(3,'Dewasa',3),(4,'Semua Umur',4);
/*!40000 ALTER TABLE `tbl_usia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_wisata`
--

DROP TABLE IF EXISTS `tbl_wisata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_wisata` (
  `id_wisata` int(11) NOT NULL AUTO_INCREMENT,
  `nama_wisata` varchar(200) DEFAULT NULL,
  `harga_paket` int(11) DEFAULT NULL,
  `fasilitas` text DEFAULT NULL,
  `id_usia` int(11) DEFAULT NULL,
  `id_hobi` int(11) DEFAULT NULL,
  `id_lokasi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_wisata`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_wisata`
--

LOCK TABLES `tbl_wisata` WRITE;
/*!40000 ALTER TABLE `tbl_wisata` DISABLE KEYS */;
INSERT INTO `tbl_wisata` VALUES (1,'Pantai Indah',1500000,' Penginapan, restoran, kolam renang',4,1,3),(65,' Paket Wisata Kota Tua Surabaya ',250000,' Fasilitas: Transportasi, Makan Siang, Tiket Masuk',4,5,1),(66,' Paket Wisata Taman Bungkul ',150000,' Fasilitas: Transportasi, Makan Siang, Tiket Masuk',4,4,1),(67,' Paket Wisata Museum Mpu Tantular ',200000,' Fasilitas: Transportasi, Makan Siang, Tiket Masuk',4,5,1),(68,' Paket Wisata House of Sampoerna ',300000,' Fasilitas: Transportasi, Makan Siang, Tiket Masuk, Souvenir',3,5,1),(69,' Paket Wisata Suramadu Bridge ',350000,' Fasilitas: Transportasi, Makan Siang, Tiket Masuk, Souvenir',3,4,1),(70,' Paket Wisata Monumen Kapal Selam ',200000,' Fasilitas: Transportasi, Makan Siang, Tiket Masuk',3,5,1),(71,' Paket Wisata Taman Safari Prigen ',500000,' Fasilitas: Transportasi, Makan Siang, Tiket Masuk, Safari Park',1,4,1),(72,' Paket Wisata Gunung Bromo ',750000,' Fasilitas: Transportasi, Makan Siang, Tiket Masuk, Penginapan',2,2,1),(73,' Paket Wisata Kawah Ijen ',800000,' Fasilitas: Transportasi, Makan Siang, Tiket Masuk, Penginapan',2,2,1),(74,' Paket Wisata Pantai Kenjeran ',200000,' Fasilitas: Transportasi, Makan Siang, Tiket Masuk.',1,1,1),(75,' Paket Bromo Sunrise ',350000,' Jeep, Tiket Masuk, Guide',2,2,5),(76,' Paket Batu Night Spectacular ',150000,' Tiket Masuk, Transportasi',2,4,5),(77,' Paket Jatim Park 1 ',200000,' Tiket Masuk, Transportasi',2,4,5),(78,' Paket Jatim Park 2 ',250000,' Tiket Masuk, Transportasi',3,4,5),(79,' Paket Eco Green Park ',150000,' Tiket Masuk, Transportasi',1,2,5),(80,' Paket Coban Rondo Waterfall ',250000,' Tiket Masuk, Transportasi, Guide',3,1,5),(81,' Paket Selecta Recreational Park ',200000,' Tiket Masuk, Transportasi',4,2,5),(82,' Paket Taman Langit ',150000,' Tiket Masuk, Transportasi',4,5,5),(83,' Paket Museum Angkut ',250000,' Tiket Masuk, Transportasi',1,5,5),(84,' Paket Rafting Sungai Brantas ',350000,' Peralatan Rafting, Guide, Transportasi.',3,1,5),(85,' Paket Wisata Jogja 1 Hari ',250000,' Transportasi, Tiket Masuk, Makan Siang',4,1,4),(86,' Paket Wisata Jogja 2 Hari 1 Malam ',500000,' Transportasi, Tiket Masuk, Penginapan, Makan Siang & Malam',4,2,4),(87,' Paket Wisata Jogja 3 Hari 2 Malam ',750000,' Transportasi, Tiket Masuk, Penginapan, Makan Siang & Malam',1,3,4),(88,' Paket Wisata Jogja 4 Hari 3 Malam ',1000000,' Transportasi, Tiket Masuk, Penginapan, Makan Siang & Malam',1,4,4),(89,' Paket Wisata Jogja 5 Hari 4 Malam ',1250000,' Transportasi, Tiket Masuk, Penginapan, Makan Siang & Malam',2,5,4),(90,' Paket Wisata Jogja 6 Hari 5 Malam ',1500000,' Transportasi, Tiket Masuk, Penginapan, Makan Siang & Malam',2,1,4),(91,' Paket Wisata Jogja 7 Hari 6 Malam ',1750000,' Transportasi, Tiket Masuk, Penginapan, Makan Siang & Malam',2,2,4),(92,' Paket Wisata Jogja 8 Hari 7 Malam ',2000000,' Transportasi, Tiket Masuk, Penginapan, Makan Siang & Malam',3,3,4),(93,' Paket Wisata Jogja 9 Hari 8 Malam ',2250000,' Transportasi, Tiket Masuk, Penginapan, Makan Siang & Malam',3,4,4),(94,' Paket Wisata Jogja 10 Hari 9 Malam ',2500000,' Transportasi, Tiket Masuk, Penginapan, Makan Siang & Malam',3,5,4),(95,' Paket Wisata Lembang ',500000,' Fasilitas: Transportasi, Tiket Masuk Objek Wisata, Makan Siang, Guide',2,1,2),(96,' Paket Wisata Kawah Putih ',350000,' Fasilitas: Transportasi, Tiket Masuk Objek Wisata, Makan Siang, Guide',2,2,2),(97,' Paket Wisata Tangkuban Perahu ',400000,' Fasilitas: Transportasi, Tiket Masuk Objek Wisata, Makan Siang, Guide',2,3,2),(98,' Paket Wisata Ciwidey ',450000,' Fasilitas: Transportasi, Tiket Masuk Objek Wisata, Makan Siang, Guide',3,4,2),(99,' Paket Wisata Kampung Gajah ',300000,' Fasilitas: Transportasi, Tiket Masuk Objek Wisata, Makan Siang, Guide',3,5,2),(100,' Paket Wisata Farmhouse Lembang ',250000,' Fasilitas: Transportasi, Tiket Masuk Objek Wisata, Makan Siang, Guide',3,1,2),(101,' Paket Wisata Dago Dream Park ',200000,' Fasilitas: Transportasi, Tiket Masuk Objek Wisata, Makan Siang, Guide',1,2,2),(102,' Paket Wisata Trans Studio Bandung ',350000,' Fasilitas: Transportasi, Tiket Masuk Objek Wisata, Makan Siang, Guide',4,3,2),(103,' Paket Wisata Saung Angklung Udjo ',300000,' Fasilitas: Transportasi, Tiket Masuk Objek Wisata, Makan Siang, Guide',1,4,2),(104,' Paket Wisata Floating Market Lembang ',200000,' Fasilitas: Transportasi, Tiket Masuk Objek Wisata, Makan Siang, Guide',4,5,2),(105,' Paket Gili Trawangan ',1500000,' Fasilitas: penginapan, makan, snorkeling, dan transportasi',4,1,3),(106,' Paket Pantai Kuta ',1200000,' Fasilitas: penginapan, makan, dan transportasi',4,2,3),(107,' Paket Gunung Rinjani ',2500000,' Fasilitas: penginapan, makan, dan pendakian',4,3,3),(108,' Paket Pantai Senggigi ',1000000,' Fasilitas: penginapan, makan, dan transportasi',1,4,3),(109,' Paket Gili Meno ',1800000,' Fasilitas: penginapan, makan, snorkeling, dan transportasi',1,5,3),(110,' Paket Pantai Selong Belanak ',1300000,' Fasilitas: penginapan, makan, dan transportasi',1,1,3),(111,' Paket Pantai Tanjung Aan ',1400000,' Fasilitas: penginapan, makan, dan transportasi',3,2,3),(112,' Paket Pantai Mawun ',1200000,' Fasilitas: penginapan, makan, dan transportasi',3,3,3),(113,' Paket Pantai Seger ',1100000,' Fasilitas: penginapan, makan, dan transportasi',2,4,3),(114,' Paket Pantai Pink ',1500000,' Fasilitas: penginapan, makan, dan transportasi',2,5,3);
/*!40000 ALTER TABLE `tbl_wisata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'db_saw'
--

--
-- Dumping routines for database 'db_saw'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-04  8:47:27
