-- Super Games database structure (tables only, no data).
-- Create an empty database first (the site expects "Project", see config.php), then import this file into it.
-- There are no DROP TABLE statements, so running it on an existing database fails instead of deleting data.

-- MySQL dump 10.13  Distrib 5.7.31, for Win64 (x86_64)
--
-- Host: localhost    Database: Project
-- ------------------------------------------------------
-- Server version	5.7.31

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
-- Table structure for table `cart`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `cyberpunk` tinyint(4) DEFAULT NULL,
  `borderlands` tinyint(4) DEFAULT NULL,
  `gta` tinyint(4) DEFAULT NULL,
  `witcher` tinyint(4) DEFAULT NULL,
  `zombie` tinyint(4) DEFAULT NULL,
  `maneater` tinyint(4) DEFAULT NULL,
  `odyssey` tinyint(4) DEFAULT NULL,
  `anno` tinyint(4) DEFAULT NULL,
  `starwarsB` tinyint(4) DEFAULT NULL,
  `starwarsJ` tinyint(4) DEFAULT NULL,
  `doom` tinyint(4) DEFAULT NULL,
  `ghost` tinyint(4) DEFAULT NULL,
  `control` tinyint(4) DEFAULT NULL,
  `satisfactory` tinyint(4) DEFAULT NULL,
  `tetris` tinyint(4) DEFAULT NULL,
  `snowrunner` tinyint(4) DEFAULT NULL,
  `reddead` tinyint(4) DEFAULT NULL,
  KEY `id` (`id`),
  CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `library`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `library` (
  `id` int(11) NOT NULL,
  `cyberpunk` tinyint(4) DEFAULT NULL,
  `borderlands` tinyint(4) DEFAULT NULL,
  `gta` tinyint(4) DEFAULT NULL,
  `witcher` tinyint(4) DEFAULT NULL,
  `zombie` tinyint(4) DEFAULT NULL,
  `maneater` tinyint(4) DEFAULT NULL,
  `odyssey` tinyint(4) DEFAULT NULL,
  `anno` tinyint(4) DEFAULT NULL,
  `starwarsB` tinyint(4) DEFAULT NULL,
  `starwarsJ` tinyint(4) DEFAULT NULL,
  `doom` tinyint(4) DEFAULT NULL,
  `ghost` tinyint(4) DEFAULT NULL,
  `control` tinyint(4) DEFAULT NULL,
  `satisfactory` tinyint(4) DEFAULT NULL,
  `tetris` tinyint(4) DEFAULT NULL,
  `snowrunner` tinyint(4) DEFAULT NULL,
  `reddead` tinyint(4) DEFAULT NULL,
  KEY `id` (`id`),
  CONSTRAINT `library_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `login_attempts`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `ip` varchar(45) NOT NULL,
  `attempted_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `ip_time` (`ip`,`attempted_at`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping events for database 'Project'
--

--
-- Dumping routines for database 'Project'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed
