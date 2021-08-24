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
-- Table structure for table `tb_aluno`
--

DROP TABLE IF EXISTS `tb_aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_aluno` (
  `id_aluno` int(10) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(10) NOT NULL,
  `id_classe` int(10) NOT NULL,
  PRIMARY KEY (`id_aluno`),
  KEY `tb_aluno_id_usuario_tb_usuario_id_usuario` (`id_usuario`),
  KEY `tb_aluno_id_classe_tb_classe_id_classe` (`id_classe`),
  CONSTRAINT `tb_aluno_id_classe_tb_classe_id_classe` FOREIGN KEY (`id_classe`) REFERENCES `tb_classe` (`id_classe`),
  CONSTRAINT `tb_aluno_id_usuario_tb_usuario_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_aluno`
--

LOCK TABLES `tb_aluno` WRITE;
/*!40000 ALTER TABLE `tb_aluno` DISABLE KEYS */;
INSERT INTO `tb_aluno` VALUES (6,25,3),(7,26,3);
/*!40000 ALTER TABLE `tb_aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_classe`
--

DROP TABLE IF EXISTS `tb_classe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_classe` (
  `id_classe` int(10) NOT NULL AUTO_INCREMENT,
  `nome_classe` varchar(45) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_classe`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_classe`
--

LOCK TABLES `tb_classe` WRITE;
/*!40000 ALTER TABLE `tb_classe` DISABLE KEYS */;
INSERT INTO `tb_classe` VALUES (1,'1º Ano - Ensino Médio',1),(2,'2º Ano - Ensino Médio',1),(3,'3º Ano - Ensino Médio',1);
/*!40000 ALTER TABLE `tb_classe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_disciplina`
--

DROP TABLE IF EXISTS `tb_disciplina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_disciplina` (
  `id_disciplina` int(10) NOT NULL AUTO_INCREMENT,
  `nome_disciplina` varchar(45) NOT NULL DEFAULT '45',
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_disciplina`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_disciplina`
--

LOCK TABLES `tb_disciplina` WRITE;
/*!40000 ALTER TABLE `tb_disciplina` DISABLE KEYS */;
INSERT INTO `tb_disciplina` VALUES (1,'Matemática',1),(2,'Português',1),(3,'Biologia',1),(4,'Física',1),(5,'Química',1);
/*!40000 ALTER TABLE `tb_disciplina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_nota`
--

DROP TABLE IF EXISTS `tb_nota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_nota` (
  `id_nota` int(10) NOT NULL AUTO_INCREMENT,
  `nota1` float(2,1) DEFAULT NULL,
  `nota2` float(2,1) DEFAULT NULL,
  `nota3` float(2,1) DEFAULT NULL,
  `nota4` float(2,1) DEFAULT NULL,
  `media` float(2,1) DEFAULT NULL,
  `id_disciplina` int(10) NOT NULL,
  `id_aluno` int(10) NOT NULL,
  PRIMARY KEY (`id_nota`),
  KEY `tb_nota_id_disciplina_tb_disciplina_id_disciplina` (`id_disciplina`),
  KEY `tb_nota_id_aluno_tb_aluno_id_aluno` (`id_aluno`),
  CONSTRAINT `tb_nota_id_aluno_tb_aluno_id_aluno` FOREIGN KEY (`id_aluno`) REFERENCES `tb_aluno` (`id_aluno`),
  CONSTRAINT `tb_nota_id_disciplina_tb_disciplina_id_disciplina` FOREIGN KEY (`id_disciplina`) REFERENCES `tb_disciplina` (`id_disciplina`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_nota`
--

LOCK TABLES `tb_nota` WRITE;
/*!40000 ALTER TABLE `tb_nota` DISABLE KEYS */;
INSERT INTO `tb_nota` VALUES (3,0.0,0.0,0.0,0.0,0.0,5,6),(4,0.0,0.0,0.0,0.0,0.0,5,7),(5,0.0,0.0,0.0,0.0,0.0,4,6),(6,0.0,0.0,0.0,0.0,0.0,4,7);
/*!40000 ALTER TABLE `tb_nota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_professor`
--

DROP TABLE IF EXISTS `tb_professor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_professor` (
  `id_professor` int(10) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(10) NOT NULL,
  `id_classe` int(10) NOT NULL,
  `id_disciplina` int(10) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_professor`),
  KEY `tb_professor_id_usuario_tb_usuario_id_usuario` (`id_usuario`),
  KEY `tb_professor_id_classe_tb_classe_id_classe` (`id_classe`),
  KEY `tb_professor_id_disciplina_tb_disciplina_id_disciplina` (`id_disciplina`),
  CONSTRAINT `tb_professor_id_classe_tb_classe_id_classe` FOREIGN KEY (`id_classe`) REFERENCES `tb_classe` (`id_classe`),
  CONSTRAINT `tb_professor_id_disciplina_tb_disciplina_id_disciplina` FOREIGN KEY (`id_disciplina`) REFERENCES `tb_disciplina` (`id_disciplina`),
  CONSTRAINT `tb_professor_id_usuario_tb_usuario_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_professor`
--

LOCK TABLES `tb_professor` WRITE;
/*!40000 ALTER TABLE `tb_professor` DISABLE KEYS */;
INSERT INTO `tb_professor` VALUES (8,27,3,4,1),(9,28,3,5,1);
/*!40000 ALTER TABLE `tb_professor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_usuario`
--

DROP TABLE IF EXISTS `tb_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_usuario` (
  `id_usuario` int(10) NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(100) NOT NULL,
  `email_usuario` varchar(100) NOT NULL,
  `senha_usuario` varchar(45) NOT NULL,
  `nivel` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_usuario`
--

LOCK TABLES `tb_usuario` WRITE;
/*!40000 ALTER TABLE `tb_usuario` DISABLE KEYS */;
INSERT INTO `tb_usuario` VALUES (19,'Tawan Carvalho','tawcesar26@hotmail.com','123',1,1),(24,'Administrador','admin@admin.com','123',1,1),(25,'Aluno 1','aluno1@aluno.com','123',3,1),(26,'Aluno 2','aluno2@aluno.com','123',3,1),(27,'Professor 1','professor1@professor.com','123',2,1),(28,'Professor 2','professor2@professor.com','123',2,1);
/*!40000 ALTER TABLE `tb_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'ciescola'
--

--
-- Dumping routines for database 'ciescola'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-08-20 15:38:25
