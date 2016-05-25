-- MySQL dump 10.13  Distrib 5.5.45, for Win64 (x86)
--
-- Host: localhost    Database: ums
-- ------------------------------------------------------
-- Server version	5.5.40

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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `User_ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_Name` varchar(50) DEFAULT NULL,
  `Pass_Word` varchar(50) DEFAULT NULL,
  `SecurityLevel_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`User_ID`),
  KEY `SecurityLevel_ID` (`SecurityLevel_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=gbk;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'administrator','e10adc3949ba59abbe56e057f20f883e',2);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotelinfo`
--

DROP TABLE IF EXISTS `hotelinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotelinfo` (
  `HotelInfo_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Hotel_Name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `Hotel_Rating` float DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `free_room` int(11) DEFAULT NULL,
  PRIMARY KEY (`HotelInfo_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=gbk;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotelinfo`
--

LOCK TABLES `hotelinfo` WRITE;
/*!40000 ALTER TABLE `hotelinfo` DISABLE KEYS */;
INSERT INTO `hotelinfo` VALUES (1,'Coast Coal Harbour Hotel',8.8,'Canada','Vancouver',2),(2,'Rosewood Hotel Georgia',9.4,'Canada','Vancouver',6),(3,'Four Seasons Resort Whistler',9.1,'Canada','Whistler',0),(4,'Grand Hotel & Suites',9.4,'Canada','Toronto',5),(5,'BCMInns-Hinton',8.6,'Canada','Hinton',20),(6,'The Quin',8.7,'USA','New York City',10),(7,'The London NYC',8.5,'USA','New York City',15),(8,'Villas at Pelican Hill',9,'USA','Newport Beach',10),(9,'Sofitel London Heathrow',9,'England','Healthrow',0),(10,'Intercontinental London - The 02',9.4,'England','London',2),(11,'Ennios Boutique Hotel',8.9,'England','Southampton',17),(12,'Black Horse inn',9.2,'England','Northallerton',1),(13,'London Marriott Hotel West India Quay',8.9,'England','London',8),(14,'Judges Court',8.6,'England','York',14),(15,'Montcalm Shoreditch London Tech City',9.1,'England','London',6),(16,'The Three Crowns',8.9,'England','Chagford',2),(17,'Fownes Hotel',8.8,'England','Worcester',2),(18,'The Crown',9.4,'England','Worcester',6),(19,'Premier Inn Worcester City Centre',9.1,'England','Worcester',0),(20,'Ye Olde Talbot Hotel',9.4,'England','Worcester',5),(21,'The Worcester Witehouse Hotel',8.6,'England','Worcester',20),(22,'Severn View Hotel',8.7,'England','Worcester',10),(23,'The Pear Tree Inn&Country Hotel',8.5,'England','Worcester',15),(24,'The Dewdrop Inn',8.8,'England','Worcester',2),(25,'Diglis House Hotel',9.4,'England','Worcester',6),(26,'Pitmaston Apartments',9.1,'England','Worcester',0),(27,'YWalter de Cantelupe Inn',9.4,'England','Worcester',5),(28,'St.Lawrence Hotel',8.6,'England','Worcester',20),(29,'Osborne House',8.7,'England','Worcester',10),(30,'Daybrook House',8.5,'England','Worcester',15),(31,'Holiday Inn Express London Standsted',9.4,'England','Stansted Mountifitchet',5),(32,'Bloc Hotel Gatwick',8.6,'England','Gatwick',20),(33,'The Piccadilly London West End',8.7,'England','London',10),(34,'The Montcalm Marble Arch',8.5,'England','London',15),(35,'Britannia Hotel Birmingham',8.8,'England','Birmingham',2),(36,'Park Regis Birmingham',9.4,'England','Birmingham',6),(37,'Radisson Blu Hotel',9.1,'England','Leeds',0),(38,'Village Hotel Leeds North',9.4,'England','Leeds',5),(39,'Leeds Marriott Hotel',8.6,'England','Leeds',20),(40,'Park Plaza Leeds',8.7,'England','Leeds',10),(41,'Argyll Hotel',8.5,'England','Glasgow',15),(42,'Villas at Pelican Hill',9,'USA','Newport Beach',10);
/*!40000 ALTER TABLE `hotelinfo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-03 16:13:40
