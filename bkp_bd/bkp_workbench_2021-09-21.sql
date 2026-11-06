-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bd_biblioteca
-- ------------------------------------------------------
-- Server version	8.0.26

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
-- Table structure for table `assunto`
--

DROP TABLE IF EXISTS `assunto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assunto` (
  `id_assunto` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  PRIMARY KEY (`id_assunto`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assunto`
--

LOCK TABLES `assunto` WRITE;
/*!40000 ALTER TABLE `assunto` DISABLE KEYS */;
INSERT INTO `assunto` VALUES (1,'Engenharia de Software',1),(2,'Redes de Computadores',1);
/*!40000 ALTER TABLE `assunto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `autor`
--

DROP TABLE IF EXISTS `autor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `autor` (
  `id_autor` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  PRIMARY KEY (`id_autor`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autor`
--

LOCK TABLES `autor` WRITE;
/*!40000 ALTER TABLE `autor` DISABLE KEYS */;
INSERT INTO `autor` VALUES (1,'Roger Pressman',0),(2,'Ian J Sommerville',1),(3,'Andrew S. Tanenbaum',1),(4,'Paul Deitel',0),(5,'Rick Riordan',1),(6,'David S. Patterson',1);
/*!40000 ALTER TABLE `autor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `editora`
--

DROP TABLE IF EXISTS `editora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `editora` (
  `id_editora` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  PRIMARY KEY (`id_editora`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `editora`
--

LOCK TABLES `editora` WRITE;
/*!40000 ALTER TABLE `editora` DISABLE KEYS */;
INSERT INTO `editora` VALUES (1,'McGraw Hill Brasil',1);
/*!40000 ALTER TABLE `editora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emprestimo`
--

DROP TABLE IF EXISTS `emprestimo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `emprestimo` (
  `id_emprestimo` int NOT NULL AUTO_INCREMENT,
  `data_emprestimo` date DEFAULT NULL,
  `date_prev_devolucao` date DEFAULT NULL,
  `data_devolucao` date DEFAULT NULL,
  `id_usu_emprestimo` int NOT NULL,
  `id_usu_funcionario` int NOT NULL,
  `id_status_emprestimo` int NOT NULL,
  PRIMARY KEY (`id_emprestimo`),
  KEY `fk_emprestimo_usuario1_idx` (`id_usu_emprestimo`),
  KEY `fk_emprestimo_usuario2_idx` (`id_usu_funcionario`),
  KEY `fk_emprestimo_status_emprestimo1_idx` (`id_status_emprestimo`),
  CONSTRAINT `fk_emprestimo_status_emprestimo1` FOREIGN KEY (`id_status_emprestimo`) REFERENCES `status_emprestimo` (`id_status_emprestimo`),
  CONSTRAINT `fk_emprestimo_usuario1` FOREIGN KEY (`id_usu_emprestimo`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `fk_emprestimo_usuario2` FOREIGN KEY (`id_usu_funcionario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emprestimo`
--

LOCK TABLES `emprestimo` WRITE;
/*!40000 ALTER TABLE `emprestimo` DISABLE KEYS */;
/*!40000 ALTER TABLE `emprestimo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exemplar`
--

DROP TABLE IF EXISTS `exemplar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `exemplar` (
  `id_exemplar` int NOT NULL AUTO_INCREMENT,
  `data_aquisicao` date DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `id_livro` int NOT NULL,
  PRIMARY KEY (`id_exemplar`),
  KEY `fk_exemplar_livro1_idx` (`id_livro`),
  CONSTRAINT `fk_exemplar_livro1` FOREIGN KEY (`id_livro`) REFERENCES `livro` (`id_livro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exemplar`
--

LOCK TABLES `exemplar` WRITE;
/*!40000 ALTER TABLE `exemplar` DISABLE KEYS */;
/*!40000 ALTER TABLE `exemplar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exemplar_has_emprestimo`
--

DROP TABLE IF EXISTS `exemplar_has_emprestimo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `exemplar_has_emprestimo` (
  `id_exemplar` int NOT NULL,
  `id_emprestimo` int NOT NULL,
  PRIMARY KEY (`id_exemplar`,`id_emprestimo`),
  KEY `fk_exemplar_has_emprestimo_emprestimo1_idx` (`id_emprestimo`),
  KEY `fk_exemplar_has_emprestimo_exemplar1_idx` (`id_exemplar`),
  CONSTRAINT `fk_exemplar_has_emprestimo_emprestimo1` FOREIGN KEY (`id_emprestimo`) REFERENCES `emprestimo` (`id_emprestimo`),
  CONSTRAINT `fk_exemplar_has_emprestimo_exemplar1` FOREIGN KEY (`id_exemplar`) REFERENCES `exemplar` (`id_exemplar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exemplar_has_emprestimo`
--

LOCK TABLES `exemplar_has_emprestimo` WRITE;
/*!40000 ALTER TABLE `exemplar_has_emprestimo` DISABLE KEYS */;
/*!40000 ALTER TABLE `exemplar_has_emprestimo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livro`
--

DROP TABLE IF EXISTS `livro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `livro` (
  `id_livro` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) DEFAULT NULL,
  `edicao` int DEFAULT NULL,
  `ano` int DEFAULT NULL,
  `id_assunto` int NOT NULL,
  `id_editora` int NOT NULL,
  PRIMARY KEY (`id_livro`),
  KEY `fk_livro_assunto1_idx` (`id_assunto`),
  KEY `fk_livro_editora1_idx` (`id_editora`),
  CONSTRAINT `fk_livro_assunto1` FOREIGN KEY (`id_assunto`) REFERENCES `assunto` (`id_assunto`),
  CONSTRAINT `fk_livro_editora1` FOREIGN KEY (`id_editora`) REFERENCES `editora` (`id_editora`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livro`
--

LOCK TABLES `livro` WRITE;
/*!40000 ALTER TABLE `livro` DISABLE KEYS */;
INSERT INTO `livro` VALUES (1,'Engenharia de Software',8,2016,1,1);
/*!40000 ALTER TABLE `livro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livro_has_autor`
--

DROP TABLE IF EXISTS `livro_has_autor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `livro_has_autor` (
  `id_livro` int NOT NULL,
  `id_autor` int NOT NULL,
  PRIMARY KEY (`id_livro`,`id_autor`),
  KEY `fk_livro_has_autor_autor1_idx` (`id_autor`),
  KEY `fk_livro_has_autor_livro1_idx` (`id_livro`),
  CONSTRAINT `fk_livro_has_autor_autor1` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id_autor`),
  CONSTRAINT `fk_livro_has_autor_livro1` FOREIGN KEY (`id_livro`) REFERENCES `livro` (`id_livro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livro_has_autor`
--

LOCK TABLES `livro_has_autor` WRITE;
/*!40000 ALTER TABLE `livro_has_autor` DISABLE KEYS */;
/*!40000 ALTER TABLE `livro_has_autor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil`
--

DROP TABLE IF EXISTS `perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `perfil` (
  `id_perfil` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil`
--

LOCK TABLES `perfil` WRITE;
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_emprestimo`
--

DROP TABLE IF EXISTS `status_emprestimo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status_emprestimo` (
  `id_status_emprestimo` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  PRIMARY KEY (`id_status_emprestimo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_emprestimo`
--

LOCK TABLES `status_emprestimo` WRITE;
/*!40000 ALTER TABLE `status_emprestimo` DISABLE KEYS */;
/*!40000 ALTER TABLE `status_emprestimo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `status` tinyint DEFAULT '1',
  `id_perfil` int NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_usuario_perfil1_idx` (`id_perfil`),
  CONSTRAINT `fk_usuario_perfil1` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-09-21  9:41:05
