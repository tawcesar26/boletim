CREATE DATABASE  IF NOT EXISTS `ciescola` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `ciescola`;
-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: ciescola
-- ------------------------------------------------------
-- Server version	5.6.49-log

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
-- Table structure for table `tb_adm`
--

DROP TABLE IF EXISTS `tb_adm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_adm` (
  `idusuario` int(3) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_adm`
--

LOCK TABLES `tb_adm` WRITE;
/*!40000 ALTER TABLE `tb_adm` DISABLE KEYS */;
INSERT INTO `tb_adm` VALUES (6,'Tawan Carvalho','tawcesar26@hotmail.com','emilia109',1),(7,'Admin 2','admin@admin.com','admin',1),(8,'Thiago Faustino','thiago@email.com','123',0);
/*!40000 ALTER TABLE `tb_adm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_aluno`
--

DROP TABLE IF EXISTS `tb_aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_aluno` (
  `id_aluno` int(11) NOT NULL AUTO_INCREMENT,
  `nome_aluno` varchar(100) NOT NULL,
  `email_aluno` varchar(100) NOT NULL,
  `senha_aluno` varchar(20) NOT NULL,
  `status` int(1) NOT NULL,
  `tb_classe_id_classe` int(11) NOT NULL,
  PRIMARY KEY (`id_aluno`),
  KEY `fk_tb_aluno_tb_turma1_idx` (`tb_classe_id_classe`),
  CONSTRAINT `fk_tb_aluno_tb_turma1` FOREIGN KEY (`tb_classe_id_classe`) REFERENCES `ci`.`tb_classe` (`id_classe`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=264 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_aluno`
--

LOCK TABLES `tb_aluno` WRITE;
/*!40000 ALTER TABLE `tb_aluno` DISABLE KEYS */;
INSERT INTO `tb_aluno` VALUES (111,'Aluno 150','aluno150@aluno.com','123',1,3),(112,'Aluno 0','aluno0@aluno.com','123',1,1),(113,'Aluno 1','aluno1@aluno.com','123',1,1),(114,'Aluno 2','aluno2@aluno.com','123',1,1),(115,'Aluno 3','aluno3@aluno.com','123',1,1),(116,'Aluno 4','aluno4@aluno.com','123',1,1),(117,'Aluno 5','aluno5@aluno.com','123',1,1),(118,'Aluno 6','aluno6@aluno.com','123',1,1),(119,'Aluno 7','aluno7@aluno.com','123',1,1),(120,'Aluno 8','aluno8@aluno.com','123',1,1),(121,'Aluno 9','aluno9@aluno.com','123',1,1),(122,'Aluno 10','aluno10@aluno.com','123',1,1),(123,'Aluno 11','aluno11@aluno.com','123',1,1),(124,'Aluno 12','aluno12@aluno.com','123',1,1),(125,'Aluno 13','aluno13@aluno.com','123',1,1),(126,'Aluno 14','aluno14@aluno.com','123',1,1),(127,'Aluno 15','aluno15@aluno.com','123',1,1),(128,'Aluno 16','aluno16@aluno.com','123',1,1),(129,'Aluno 17','aluno17@aluno.com','123',1,1),(130,'Aluno 18','aluno18@aluno.com','123',1,1),(131,'Aluno 19','aluno19@aluno.com','123',1,1),(132,'Aluno 20','aluno20@aluno.com','123',1,1),(133,'Aluno 21','aluno21@aluno.com','123',1,1),(134,'Aluno 22','aluno22@aluno.com','123',1,1),(135,'Aluno 23','aluno23@aluno.com','123',1,1),(136,'Aluno 24','aluno24@aluno.com','123',1,1),(137,'Aluno 25','aluno25@aluno.com','123',1,1),(138,'Aluno 26','aluno26@aluno.com','123',1,1),(139,'Aluno 27','aluno27@aluno.com','123',1,1),(140,'Aluno 28','aluno28@aluno.com','123',1,1),(141,'Aluno 29','aluno29@aluno.com','123',1,1),(142,'Aluno 30','aluno30@aluno.com','123',1,1),(143,'Aluno 31','aluno31@aluno.com','123',1,1),(144,'Aluno 32','aluno32@aluno.com','123',1,1),(145,'Aluno 33','aluno33@aluno.com','123',1,1),(146,'Aluno 34','aluno34@aluno.com','123',1,1),(147,'Aluno 35','aluno35@aluno.com','123',1,1),(148,'Aluno 36','aluno36@aluno.com','123',1,1),(149,'Aluno 37','aluno37@aluno.com','123',1,1),(150,'Aluno 38','aluno38@aluno.com','123',1,1),(151,'Aluno 39','aluno39@aluno.com','123',1,1),(152,'Aluno 40','aluno40@aluno.com','123',1,1),(153,'Aluno 41','aluno41@aluno.com','123',1,1),(154,'Aluno 42','aluno42@aluno.com','123',1,1),(155,'Aluno 43','aluno43@aluno.com','123',1,1),(156,'Aluno 44','aluno44@aluno.com','123',1,1),(157,'Aluno 45','aluno45@aluno.com','123',1,1),(158,'Aluno 46','aluno46@aluno.com','123',1,2),(159,'Aluno 47','aluno47@aluno.com','123',1,2),(160,'Aluno 48','aluno48@aluno.com','123',1,2),(161,'Aluno 49','aluno49@aluno.com','123',1,2),(162,'Aluno 50','aluno50@aluno.com','123',1,2),(163,'Aluno 51','aluno51@aluno.com','123',1,2),(164,'Aluno 52','aluno52@aluno.com','123',1,2),(165,'Aluno 53','aluno53@aluno.com','123',1,2),(166,'Aluno 54','aluno54@aluno.com','123',1,2),(167,'Aluno 55','aluno55@aluno.com','123',1,2),(168,'Aluno 56','aluno56@aluno.com','123',1,2),(169,'Aluno 57','aluno57@aluno.com','123',1,2),(170,'Aluno 58','aluno58@aluno.com','123',1,2),(171,'Aluno 59','aluno59@aluno.com','123',1,2),(172,'Aluno 60','aluno60@aluno.com','123',1,2),(173,'Aluno 61','aluno61@aluno.com','123',1,2),(174,'Aluno 62','aluno62@aluno.com','123',1,2),(175,'Aluno 63','aluno63@aluno.com','123',1,2),(176,'Aluno 64','aluno64@aluno.com','123',1,2),(177,'Aluno 65','aluno65@aluno.com','123',1,2),(178,'Aluno 66','aluno66@aluno.com','123',1,2),(179,'Aluno 67','aluno67@aluno.com','123',1,2),(180,'Aluno 68','aluno68@aluno.com','123',1,2),(181,'Aluno 69','aluno69@aluno.com','123',1,2),(182,'Aluno 70','aluno70@aluno.com','123',1,2),(183,'Aluno 71','aluno71@aluno.com','123',1,2),(184,'Aluno 72','aluno72@aluno.com','123',1,2),(185,'Aluno 73','aluno73@aluno.com','123',1,2),(186,'Aluno 74','aluno74@aluno.com','123',1,2),(187,'Aluno 75','aluno75@aluno.com','123',1,2),(188,'Aluno 76','aluno76@aluno.com','123',1,2),(189,'Aluno 77','aluno77@aluno.com','123',1,2),(190,'Aluno 78','aluno78@aluno.com','123',1,2),(191,'Aluno 79','aluno79@aluno.com','123',1,2),(192,'Aluno 80','aluno80@aluno.com','123',1,2),(193,'Aluno 81','aluno81@aluno.com','123',1,2),(194,'Aluno 82','aluno82@aluno.com','123',1,2),(195,'Aluno 83','aluno83@aluno.com','123',1,2),(196,'Aluno 84','aluno84@aluno.com','123',1,2),(197,'Aluno 85','aluno85@aluno.com','123',1,2),(198,'Aluno 86','aluno86@aluno.com','123',1,2),(199,'Aluno 87','aluno87@aluno.com','123',1,2),(200,'Aluno 88','aluno88@aluno.com','123',1,2),(201,'Aluno 89','aluno89@aluno.com','123',1,2),(202,'Aluno 90','aluno90@aluno.com','123',1,2),(203,'Aluno 91','aluno91@aluno.com','123',1,2),(204,'Aluno 92','aluno92@aluno.com','123',1,2),(205,'Aluno 93','aluno93@aluno.com','123',1,2),(206,'Aluno 94','aluno94@aluno.com','123',1,2),(207,'Aluno 95','aluno95@aluno.com','123',1,2),(208,'Aluno 96','aluno96@aluno.com','123',1,2),(209,'Aluno 97','aluno97@aluno.com','123',1,2),(210,'Aluno 98','aluno98@aluno.com','123',1,2),(211,'Aluno 99','aluno99@aluno.com','123',1,2),(212,'Aluno 100','aluno100@aluno.com','123',1,2),(213,'Aluno 101','aluno101@aluno.com','123',1,3),(214,'Aluno 102','aluno102@aluno.com','123',1,3),(215,'Aluno 103','aluno103@aluno.com','123',1,3),(216,'Aluno 104','aluno104@aluno.com','123',1,3),(217,'Aluno 105','aluno105@aluno.com','123',1,3),(218,'Aluno 106','aluno106@aluno.com','123',1,3),(219,'Aluno 107','aluno107@aluno.com','123',1,3),(220,'Aluno 108','aluno108@aluno.com','123',1,3),(221,'Aluno 109','aluno109@aluno.com','123',1,3),(222,'Aluno 110','aluno110@aluno.com','123',1,3),(223,'Aluno 111','aluno111@aluno.com','123',1,3),(224,'Aluno 112','aluno112@aluno.com','123',1,3),(225,'Aluno 113','aluno113@aluno.com','123',1,3),(226,'Aluno 114','aluno114@aluno.com','123',1,3),(227,'Aluno 115','aluno115@aluno.com','123',1,3),(228,'Aluno 116','aluno116@aluno.com','123',1,3),(229,'Aluno 117','aluno117@aluno.com','123',1,3),(230,'Aluno 118','aluno118@aluno.com','123',1,3),(231,'Aluno 119','aluno119@aluno.com','123',1,3),(232,'Aluno 120','aluno120@aluno.com','123',1,3),(233,'Aluno 121','aluno121@aluno.com','123',1,3),(234,'Aluno 122','aluno122@aluno.com','123',1,3),(235,'Aluno 123','aluno123@aluno.com','123',1,3),(236,'Aluno 124','aluno124@aluno.com','123',1,3),(237,'Aluno 125','aluno125@aluno.com','123',1,3),(238,'Aluno 126','aluno126@aluno.com','123',1,3),(239,'Aluno 127','aluno127@aluno.com','123',1,3),(240,'Aluno 128','aluno128@aluno.com','123',1,3),(241,'Aluno 129','aluno129@aluno.com','123',1,3),(242,'Aluno 130','aluno130@aluno.com','123',1,3),(243,'Aluno 131','aluno131@aluno.com','123',1,3),(244,'Aluno 132','aluno132@aluno.com','123',1,3),(245,'Aluno 133','aluno133@aluno.com','123',1,3),(246,'Aluno 134','aluno134@aluno.com','123',1,3),(247,'Aluno 135','aluno135@aluno.com','123',1,3),(248,'Aluno 136','aluno136@aluno.com','123',1,3),(249,'Aluno 137','aluno137@aluno.com','123',1,3),(250,'Aluno 138','aluno138@aluno.com','123',1,3),(251,'Aluno 139','aluno139@aluno.com','123',1,3),(252,'Aluno 140','aluno140@aluno.com','123',1,3),(253,'Aluno 141','aluno141@aluno.com','123',1,3),(254,'Aluno 142','aluno142@aluno.com','123',1,3),(255,'Aluno 143','aluno143@aluno.com','123',1,3),(256,'Aluno 144','aluno144@aluno.com','123',1,3),(257,'Aluno 145','aluno145@aluno.com','123',1,3),(258,'Aluno 146','aluno146@aluno.com','123',1,3),(259,'Aluno 147','aluno147@aluno.com','123',1,3),(260,'Aluno 148','aluno148@aluno.com','123',1,3),(261,'Aluno 149','aluno149@aluno.com','123',1,3);
/*!40000 ALTER TABLE `tb_aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_classe`
--

DROP TABLE IF EXISTS `tb_classe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_classe` (
  `id_classe` int(11) NOT NULL AUTO_INCREMENT,
  `nome_classe` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_classe`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_classe`
--

LOCK TABLES `tb_classe` WRITE;
/*!40000 ALTER TABLE `tb_classe` DISABLE KEYS */;
INSERT INTO `tb_classe` VALUES (1,'1º Ano - Ensino Médio',1),(2,'2º Ano - Ensino Médio',1),(3,'3º Ano - Ensino Médio',1),(4,'2º Ano - Fundamental',1);
/*!40000 ALTER TABLE `tb_classe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_disciplina`
--

DROP TABLE IF EXISTS `tb_disciplina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_disciplina` (
  `id_disciplina` int(11) NOT NULL AUTO_INCREMENT,
  `nome_disciplina` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_disciplina`)
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_disciplina`
--

LOCK TABLES `tb_disciplina` WRITE;
/*!40000 ALTER TABLE `tb_disciplina` DISABLE KEYS */;
INSERT INTO `tb_disciplina` VALUES (101,'Matematica',1),(102,'Portugues',1),(103,'Biologia',1),(104,'Quimica',1),(120,'Teste',0),(121,'Geografia',1),(124,'Física',1),(125,'História',1),(126,'teste',1);
/*!40000 ALTER TABLE `tb_disciplina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_nota`
--

DROP TABLE IF EXISTS `tb_nota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_nota` (
  `id_nota` int(11) NOT NULL AUTO_INCREMENT,
  `id_aluno_nota` int(11) NOT NULL,
  `id_disciplina_nota` int(11) DEFAULT NULL,
  `nota1` float DEFAULT NULL,
  `nota2` float DEFAULT NULL,
  `nota3` float DEFAULT NULL,
  `nota4` float DEFAULT NULL,
  PRIMARY KEY (`id_nota`)
) ENGINE=InnoDB AUTO_INCREMENT=153 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_nota`
--

LOCK TABLES `tb_nota` WRITE;
/*!40000 ALTER TABLE `tb_nota` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_nota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_professor`
--

DROP TABLE IF EXISTS `tb_professor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_professor` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_professor` varchar(100) NOT NULL,
  `email_professor` varchar(100) NOT NULL,
  `senha_professor` varchar(20) NOT NULL,
  `status` int(1) NOT NULL,
  `tb_disciplina_id_disciplina` int(11) NOT NULL,
  `tb_classe_id_classe` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_tb_professor_tb_disciplina_idx` (`tb_disciplina_id_disciplina`),
  KEY `fk_tb_professor_tb_classe_idx` (`tb_classe_id_classe`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_professor`
--

LOCK TABLES `tb_professor` WRITE;
/*!40000 ALTER TABLE `tb_professor` DISABLE KEYS */;
INSERT INTO `tb_professor` VALUES (1,'Professor 1','professor1@professor.com','123',1,102,3),(2,'Professor 2','professor2@professor.com','123',1,102,1),(3,'Professor 3','professor3@professor.com','123',1,103,3),(4,'Professor 4','professor4@professor.com','123',1,104,1),(24,'Professor 5','professor5@professor.com','123',1,125,4);
/*!40000 ALTER TABLE `tb_professor` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-08-19 15:16:36
