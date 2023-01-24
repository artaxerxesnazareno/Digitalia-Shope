-- MariaDB dump 10.19  Distrib 10.5.15-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: ecomerce
-- ------------------------------------------------------
-- Server version	10.5.15-MariaDB-0+deb11u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(90) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'computador'),(2,'telefone'),(3,'auricular'),(4,'smartTv'),(5,'router');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `Pnome` varchar(80) DEFAULT NULL,
  `Unome` varchar(30) NOT NULL,
  `pais` varchar(50) DEFAULT 'Angola',
  `Nempresa` varchar(70) NOT NULL,
  `endereco` varchar(90) NOT NULL,
  `cidade` varchar(70) NOT NULL,
  `condado` varchar(80) NOT NULL,
  `cep` varchar(89) NOT NULL,
  `email` varchar(80) NOT NULL,
  `telefone` varchar(80) NOT NULL,
  KEY `id` (`id`),
  CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (2,'PNOME','UNOME','PAIS','EMPRESA','ENDERECO','CIDADE','CONDADO','CEP','MAIL','TEL'),(2,'Abraao','Castelo','AO','Gtwork','Km 14A','Luanda','Angola','6684556','abraaocastelo14@gmail.com','90000000'),(2,'Abraao','Castelo','AO','Gtwork','Km 14A','Luanda','Angola','6684556','abraaocastelo14@gmail.com','90000000'),(2,'Abraao','Castelo','AO','Gtwork','Km 14A','Luanda','Angola','6684556','abraaocastelo14@gmail.com','90000000'),(2,'Abraao','Castelo','AO','Gtwork','Km 14A','Luanda','Angola','6684556','abraaocastelo14@gmail.com','90000000'),(2,'Francisco','Guilherme','AO','Gtwork','Km 14A','Luanda','Angola','6684557','franciscoaa@gmail.com','9344554');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalhesProduct`
--

DROP TABLE IF EXISTS `detalhesProduct`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalhesProduct` (
  `idPedido` int(11) DEFAULT NULL,
  `produto` varchar(600) DEFAULT NULL,
  `preco` varchar(300) DEFAULT NULL,
  `qtd` varchar(200) DEFAULT NULL,
  KEY `idPedido` (`idPedido`),
  CONSTRAINT `detalhesProduct_ibfk_1` FOREIGN KEY (`idPedido`) REFERENCES `pedido` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalhesProduct`
--

LOCK TABLES `detalhesProduct` WRITE;
/*!40000 ALTER TABLE `detalhesProduct` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalhesProduct` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) DEFAULT NULL,
  `idFuncionario` int(11) DEFAULT NULL,
  `data_pedido` datetime DEFAULT NULL,
  `data_necessaria` datetime DEFAULT NULL,
  `data_envio` date DEFAULT NULL,
  `via_maritima` enum('sim','nao') DEFAULT 'nao',
  `frete` enum('sim','nao') DEFAULT 'nao',
  `nome_navio` enum('sim','nao') DEFAULT 'nao',
  `endereco_navio` enum('sim','nao') DEFAULT 'nao',
  `modo_entrega` varchar(90) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idCliente` (`idCliente`),
  CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(90) DEFAULT NULL,
  `precoUnitario` float DEFAULT NULL,
  `qtd` int(11) DEFAULT NULL,
  `estado` varchar(90) DEFAULT NULL,
  `supplid` int(11) DEFAULT NULL,
  `idCategoria` int(11) DEFAULT NULL,
  `descricao` varchar(289) DEFAULT NULL,
  `imagem` varchar(90) DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  `total` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idCategoria` (`idCategoria`),
  CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` VALUES (4,'PC GAMER - INTEL I7',789000,12,'stock',12332,1,'PC GAMER 8 geração I7, INTEL OOO ','635d2057b16be2022:02:45:11','2022-10-29 14:45:11',9468000),(5,'Computador pichau gamer i3',870000,6,'stock',1232,1,'Computador Pichau Gamer, Conta com Processador Intel i3-10105, Placa de Vídeo GeForce GTX 750 Ti 4GB, Memória Ram 8GB DDR4, Armazenamento SSD 240GB ','635d217637daf2022:02:49:58','2022-10-29 14:49:58',5220000),(6,'Teclado Mecânico Gamer',70000,9,'stock',99,1,'ooooooooooooo oooooooooooo','635d23072842c2022:02:56:39','2022-10-29 14:56:39',630000),(7,'Teclado gamer shoppe',5000,6,'stock',12322,1,' uma experiência de compra online completa e segura graças às garantia Shopee! Baixe o app da Shopee hoje mesmo e compre Teclado Gamer e todos os seus produtos favoritos com todas as vantagens de ser um cliente Shopee.','635d23c8559592022:02:59:52','2022-10-29 14:59:52',30000),(8,'Joy stick usb pc',2500,66,'stock',8778,1,'Joy stick usb pc, games','635d2507d48b72022:03:05:11','2022-10-29 15:05:11',165000),(9,'Roteador AC4 TENDA',98000,4,'stock',888,5,'Conexão sem fio. | Tem uma velocidade de 1167Mbps. | Banda dupla de 2.4 GHz e 5 GHz. | Possui 5 antenas externas. | Tem 4 portas para conectar','635d26846767f2022:03:11:32','2022-10-29 15:11:32',392000),(10,'SMART UHD Televisio',113000,3,'stock',776,4,'SMART UHD Televisio','635d26f55377d2022:03:13:25','2022-10-29 15:13:25',339000),(11,'Comando sem fio xbox 360',12000,44,'stock',76766,1,'Tipo de unidadeGamepadPlataformas gaming suportadasPC,Xbox OneFunï¿½ï¿½es chave de controlo de jogoD-pad,Select,StartTecnologia da conectividadeCom ','635d283ec10472022:03:18:54','2022-10-29 15:18:54',528000),(12,'Auricular OEC',980,12,'stock',9998,3,'Tipo de Produto: Auricular, Marca: Oriamo, Modelo: OEP-3','635d28d53b0422022:03:21:25','2022-10-29 15:21:25',11760),(13,'Cabo vga',1000,55,'stock',123,1,'cabo vga computer','636287cfb839f2022:04:07:59','2022-11-02 16:08:00',55000),(14,'HUB USB',860,33,'stock',333,1,'HUB USB com 4 portas','6362880e848d12022:04:09:02','2022-11-02 16:09:02',28380),(15,'TECNO SPARK 3',65000,221,'stock',1232,2,'rhjkl bbbbbbb vvvvvvvvv ccccccccc','6370e7a8deff72022:01:48:40','2022-11-13 13:48:41',14365000),(16,'qqqqqqqqqqqqq',30000,77,'stock',123,2,'aaaaaaaaaaa','6370e8f74dcce2022:01:54:15','2022-11-13 13:54:15',2310000),(17,'Tv plasma LG',140000,443,'stock',33334,4,'tV PLASMA GHYHJB HJJYHBUJK HBHJB','637744dd5d4932022:09:39:57','2022-11-18 09:39:57',62020000);
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(90) DEFAULT NULL,
  `email` varchar(90) DEFAULT NULL,
  `password` varchar(90) DEFAULT NULL,
  `permissao` enum('admin','cliente','gerente') DEFAULT 'cliente',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (2,'oooooooooo','casteloabraao@gmail.com','aaaaaaaa','cliente'),(3,'Abraao Castelo','abraaocastelo14@gmail.com','142000','admin'),(4,'Eluki Junior','elukijunior@gmail.com','123456','cliente'),(5,'Abílio Dos Santos','abiliobildera@gmail.com','1907','cliente'),(6,'Eluck Baptista','eluckimossi@gmail.com','1234567890','cliente'),(23,'','','','cliente'),(24,'Fernanda Guilherme','gggggggggg@gmail.com','11111','cliente'),(25,'Moisana Castelo','moisanacastelo@gmail.com','16022022','cliente'),(28,'cu','cu@gmail.com','cucucucucu','cliente'),(29,'Francisco Nava','franciscoaa@gmail.com','123456','cliente');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-25  9:41:30
