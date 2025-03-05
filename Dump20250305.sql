-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: tiendamvc
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `address`
--

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` VALUES (2,'Balaidos',36210,'Vigo','España',NULL,NULL,NULL,1),(3,'640730410',36210,'vigo','España','2025-02-26 16:40:27','2025-02-26 16:40:27',NULL,2),(6,'Gran via',38410,'Madrid','España','2025-02-28 16:53:27','2025-02-28 16:53:27',NULL,4);
/*!40000 ALTER TABLE `address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'ropa','ropa nieve','0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'calzado','calzado nieve','0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'deporte','ropa deportiva','0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'zapatillas','zapatilla runing','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'pablo',NULL,NULL),(2,'Natividad Hermida Altamar','2025-02-26 16:40:27','2025-02-26 16:40:27'),(4,'Yair Hermida Altamar','2025-02-28 16:53:27','2025-02-28 16:53:27');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES (1,'2025-02-28 20:06:31',9.99,'2025-02-28 19:06:31','2025-02-28 19:06:31',1);
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `order_has_product`
--

LOCK TABLES `order_has_product` WRITE;
/*!40000 ALTER TABLE `order_has_product` DISABLE KEYS */;
INSERT INTO `order_has_product` VALUES (1,35,'1',50.00,'2025-02-28 19:10:10','2025-02-28 19:10:10');
/*!40000 ALTER TABLE `order_has_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `phone`
--

LOCK TABLES `phone` WRITE;
/*!40000 ALTER TABLE `phone` DISABLE KEYS */;
INSERT INTO `phone` VALUES (1,'616780712',NULL,NULL,NULL,1),(2,'640730410','2025-02-26 16:40:27','2025-02-26 16:40:27',NULL,2),(5,'661223135','2025-02-28 16:53:27','2025-02-28 16:53:27',NULL,4);
/*!40000 ALTER TABLE `phone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (35,'abrigo largo','abrigo otroñal',NULL,10,45.00,'2025-02-28 18:00:25','2025-02-28 18:00:25',1,7),(38,'pantalon nieve','ropa nieve',NULL,15,30.00,'2025-03-03 15:06:00','2025-03-03 15:06:00',3,7),(39,'sudadera','sport',NULL,40,40.00,'2025-03-03 15:06:59','2025-03-03 15:06:59',3,7),(40,'abrigo largo','abrigo otroñal',NULL,10,45.00,'2025-03-05 15:14:44','2025-03-05 15:14:44',1,4),(41,'abrigo largo','abrigo otroñal',NULL,10,45.00,'2025-03-05 15:16:23','2025-03-05 15:16:23',1,4);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `provider`
--

LOCK TABLES `provider` WRITE;
/*!40000 ALTER TABLE `provider` DISABLE KEYS */;
INSERT INTO `provider` VALUES (4,'proveedor3','sports.com','2025-02-28 15:05:17','2025-02-28 15:05:17'),(7,'turopagalicia',NULL,'2025-02-28 15:45:19','2025-02-28 15:45:19'),(8,'calzadodeportivo',NULL,'2025-02-28 16:54:57','2025-02-28 16:54:57');
/*!40000 ALTER TABLE `provider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'pepe','$2y$10$B6YsvS9cCVNNyvJjtDDXIe5UKbocqOwIgHO2Nx23W8lMMnSFUAYha','2025-02-24 17:10:47','2025-02-24 17:10:47');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-05 17:13:49
