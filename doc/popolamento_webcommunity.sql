-- MySQL dump 10.13  Distrib 5.5.52, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: webcommunity
-- ------------------------------------------------------
-- Server version	5.5.52-0+deb7u1

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
-- Table structure for table `Artisti`
--

DROP TABLE IF EXISTS `Artisti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Artisti` (
  `IDArtista` int(11) NOT NULL AUTO_INCREMENT,
  `Denominazione` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IDArtista`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Artisti`
--

LOCK TABLES `Artisti` WRITE;
/*!40000 ALTER TABLE `Artisti` DISABLE KEYS */;
INSERT INTO `Artisti` VALUES (1,'Cantante'),(2,'Comico'),(3,'Ballerino'),(4,'Mago');
/*!40000 ALTER TABLE `Artisti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Categorie`
--

DROP TABLE IF EXISTS `Categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Categorie` (
  `IDCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `Descrizione` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IDCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Categorie`
--

LOCK TABLES `Categorie` WRITE;
/*!40000 ALTER TABLE `Categorie` DISABLE KEYS */;
INSERT INTO `Categorie` VALUES (1,'Concerto'),(2,'Teatro'),(3,'Danza'),(4,'Spettacolo');
/*!40000 ALTER TABLE `Categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Commenti`
--

DROP TABLE IF EXISTS `Commenti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Commenti` (
  `FKEvento` int(11) NOT NULL DEFAULT '0',
  `FKUtente` int(11) NOT NULL DEFAULT '0',
  `Post` varchar(100) DEFAULT NULL,
  `Pdata` date DEFAULT NULL,
  `Voto` int(11) DEFAULT NULL,
  PRIMARY KEY (`FKEvento`,`FKUtente`),
  KEY `FKUtente` (`FKUtente`),
  CONSTRAINT `Commenti_ibfk_1` FOREIGN KEY (`FKEvento`) REFERENCES `Eventi` (`IDEvento`),
  CONSTRAINT `Commenti_ibfk_2` FOREIGN KEY (`FKUtente`) REFERENCES `Utenti` (`IDUtente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Commenti`
--

LOCK TABLES `Commenti` WRITE;
/*!40000 ALTER TABLE `Commenti` DISABLE KEYS */;
INSERT INTO `Commenti` VALUES (1,2,'Grandissima serata in compagnia della musica del nostro Franchino','2017-01-17',8),(2,1,'Grandi risate con il trio comico più famoso d\'Italia','2017-02-21',9),(3,3,'Grande esibizione di Bolle','2017-03-04',7),(4,4,'Non benissimo','2017-03-12',5),(5,8,'Pensavo meglio','2017-03-22',6),(6,6,'Grande esibizione di Checco','2017-01-22',8),(7,5,'Un applauso a Gianni Morandi','2017-03-22',7),(8,7,'Grandi risate con Forest','2017-02-13',8);
/*!40000 ALTER TABLE `Commenti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Eventi`
--

DROP TABLE IF EXISTS `Eventi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Eventi` (
  `IDEvento` int(11) NOT NULL AUTO_INCREMENT,
  `FKCategoria` int(11) DEFAULT NULL,
  `FKUtente` int(11) DEFAULT NULL,
  `FKLuogo` int(11) DEFAULT NULL,
  `Titolo` varchar(50) DEFAULT NULL,
  `Data` date DEFAULT NULL,
  PRIMARY KEY (`IDEvento`),
  KEY `FKCategoria` (`FKCategoria`),
  KEY `FKUtente` (`FKUtente`),
  KEY `FKLuogo` (`FKLuogo`),
  CONSTRAINT `Eventi_ibfk_1` FOREIGN KEY (`FKCategoria`) REFERENCES `Categorie` (`IDCategoria`),
  CONSTRAINT `Eventi_ibfk_2` FOREIGN KEY (`FKUtente`) REFERENCES `Utenti` (`IDUtente`),
  CONSTRAINT `Eventi_ibfk_3` FOREIGN KEY (`FKLuogo`) REFERENCES `Luoghi` (`IDLuogo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Eventi`
--

LOCK TABLES `Eventi` WRITE;
/*!40000 ALTER TABLE `Eventi` DISABLE KEYS */;
INSERT INTO `Eventi` VALUES (1,1,2,3,'Concerto Franchino','2017-01-16'),(2,2,1,4,'Spettacolo di Aldo,Giovanni e Giacomo','2017-02-19'),(3,4,4,3,'Esibizione Bolle','2017-03-01'),(4,3,3,4,'Esibizione Mago Silvan','2017-03-11'),(5,1,8,2,'Concerto Madonna','2017-03-20'),(6,2,6,2,'Spettacolo Checco Zalone','2017-01-19'),(7,1,5,1,'Concerto Gianni Morandi','2017-03-21'),(8,1,7,2,'Esibizione Mago Forest','2017-02-11');
/*!40000 ALTER TABLE `Eventi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Luoghi`
--

DROP TABLE IF EXISTS `Luoghi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Luoghi` (
  `IDLuogo` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(30) DEFAULT NULL,
  `FKProvincia` char(2) DEFAULT NULL,
  PRIMARY KEY (`IDLuogo`),
  KEY `FKProvincia` (`FKProvincia`),
  CONSTRAINT `Luoghi_ibfk_1` FOREIGN KEY (`FKProvincia`) REFERENCES `Province` (`IDProvincia`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Luoghi`
--

LOCK TABLES `Luoghi` WRITE;
/*!40000 ALTER TABLE `Luoghi` DISABLE KEYS */;
INSERT INTO `Luoghi` VALUES (1,'Arena di Verona','VR'),(2,'Area verde Gressan','AO'),(3,'Area Expo','MI'),(4,'Duomo Milano','MI'),(5,'Cittadella','AO'),(6,'Discoteca Chalet','TO'),(7,'Discoteca Cocorico\'','RN'),(8,'Teatro Augusteo','NA');
/*!40000 ALTER TABLE `Luoghi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Partecipanti`
--

DROP TABLE IF EXISTS `Partecipanti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Partecipanti` (
  `FKEvento` int(11) NOT NULL DEFAULT '0',
  `FKArtista` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`FKEvento`,`FKArtista`),
  KEY `FKArtista` (`FKArtista`),
  CONSTRAINT `Partecipanti_ibfk_1` FOREIGN KEY (`FKEvento`) REFERENCES `Eventi` (`IDEvento`),
  CONSTRAINT `Partecipanti_ibfk_2` FOREIGN KEY (`FKArtista`) REFERENCES `Artisti` (`IDArtista`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Partecipanti`
--

LOCK TABLES `Partecipanti` WRITE;
/*!40000 ALTER TABLE `Partecipanti` DISABLE KEYS */;
/*!40000 ALTER TABLE `Partecipanti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Preferenze`
--

DROP TABLE IF EXISTS `Preferenze`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Preferenze` (
  `FKUtente` int(11) NOT NULL DEFAULT '0',
  `FKCategoria` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`FKUtente`,`FKCategoria`),
  KEY `FKCategoria` (`FKCategoria`),
  CONSTRAINT `Preferenze_ibfk_1` FOREIGN KEY (`FKUtente`) REFERENCES `Utenti` (`IDUtente`),
  CONSTRAINT `Preferenze_ibfk_2` FOREIGN KEY (`FKCategoria`) REFERENCES `Categorie` (`IDCategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Preferenze`
--

LOCK TABLES `Preferenze` WRITE;
/*!40000 ALTER TABLE `Preferenze` DISABLE KEYS */;
/*!40000 ALTER TABLE `Preferenze` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Province`
--

DROP TABLE IF EXISTS `Province`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Province` (
  `IDProvincia` char(2) NOT NULL,
  `Nome` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`IDProvincia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Province`
--

LOCK TABLES `Province` WRITE;
/*!40000 ALTER TABLE `Province` DISABLE KEYS */;
INSERT INTO `Province` VALUES ('AG','Agrigento'),('AL','Alessandria'),('AN','Ancona'),('AO','Aosta'),('AP','Ascoli Piceno'),('AQ','L\'Aquila'),('AR','Arezzo'),('AT','Asti'),('AV','Avellino'),('BA','Bari'),('BG','Bergamo'),('BI','Biella'),('BL','Belluno'),('BN','Benevento'),('BO','Bologna'),('BR','Brindisi'),('BS','Brescia'),('BT','Barletta-Andria-Trani'),('BZ','Bolzano'),('CA','Cagliari'),('CB','Campobasso'),('CE','Caserta'),('CH','Chieti'),('CI','Carbonia-Iglesias'),('CL','Caltanissetta'),('CN','Cuneo'),('CO','Como'),('CR','Cremona'),('CS','Cosenza'),('CT','Catania'),('CZ','Catanzaro'),('EN','Enna'),('FC','ForlÃ¬-Cesena'),('FE','Ferrara'),('FG','Foggia'),('FI','Firenze'),('FM','Fermo'),('FR','Frosinone'),('GE','Genova'),('GO','Gorizia'),('GR','Grosseto'),('IM','Imperia'),('IS','Isernia'),('KR','Crotone'),('LC','Lecco'),('LE','Lecce'),('LI','Livorno'),('LO','Lodi'),('LT','Latina'),('LU','Lucca'),('MB','Monza e Brianza'),('MC','Macerata'),('ME','Messina'),('MI','Milano'),('MN','Mantova'),('MO','Modena'),('MS','Massa e Carrara'),('MT','Matera'),('NA','Napoli'),('NO','Novara'),('NU','Nuoro'),('OG','Ogliastra'),('OR','Oristano'),('OT','Olbia-Tempio'),('PA','Palermo'),('PC','Piacenza'),('PD','Padova'),('PE','Pescara'),('PG','Perugia'),('PI','Pisa'),('PN','Pordenone'),('PO','Prato'),('PR','Parma'),('PT','Pistoia'),('PU','Pesaro e Urbino'),('PV','Pavia'),('PZ','Potenza'),('RA','Ravenna'),('RC','Reggio Calabria(metropolitana)'),('RE','Reggio Emilia'),('RG','Ragusa'),('RI','Rieti'),('RM','Roma'),('RN','Rimini'),('RO','Rovigo'),('SA','Salerno'),('SI','Siena'),('SO','Sondrio'),('SP','La Spezia'),('SR','Siracusa'),('SS','Sassari'),('SV','Savona'),('TA','Taranto'),('TE','Teramo'),('TN','Trento'),('TO','Torino'),('TP','Trapani'),('TR','Terni'),('TS','Trieste'),('TV','Treviso'),('UD','Udine'),('VA','Varese'),('VB','Verbano-Cusio-Ossola'),('VC','Vercelli'),('VE','Venezia'),('VI','Vicenza'),('VR','Verona'),('VS','Medio Campidano'),('VT','Viterbo'),('VV','Vibo Valentia');
/*!40000 ALTER TABLE `Province` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Utenti`
--

DROP TABLE IF EXISTS `Utenti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Utenti` (
  `IDUtente` int(11) NOT NULL AUTO_INCREMENT,
  `FKLuogo` int(11) DEFAULT NULL,
  `Nick` varchar(10) DEFAULT NULL,
  `Nome` varchar(20) DEFAULT NULL,
  `Cognome` varchar(20) DEFAULT NULL,
  `Address` varchar(30) DEFAULT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `Pass` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`IDUtente`),
  KEY `FKLuogo` (`FKLuogo`),
  CONSTRAINT `Utenti_ibfk_1` FOREIGN KEY (`FKLuogo`) REFERENCES `Luoghi` (`IDLuogo`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Utenti`
--

LOCK TABLES `Utenti` WRITE;
/*!40000 ALTER TABLE `Utenti` DISABLE KEYS */;
INSERT INTO `Utenti` VALUES (1,3,'m.rossi','Mario','Rossi','Via Torino','m.rossi@gmail.com','passwd'),(2,4,'a.bianchi','Andrea','Bianchi','Via Porta','a.bianchi@gmail.com','passwdcriptata'),(3,2,'franco.ner','Franco','Neri','Via Roma','f.neri@gmail.com','pass'),(4,1,'marco.verd','Marco','Verdi','Via Edelweiss','marco.verdi@gmail.co','passwdmarco'),(5,5,'v.br','Vincezo','Brunet','Via Caduti','v.brunet@gmail.com','ciao'),(6,3,'s.nap','Saverio','Napoli','Via Duca','s.napoli@gmail.com','svnap'),(7,3,'l.toscan','Ludovico','Toscano','Via Entreves','l.tosc@gmail.com','dsadsa'),(8,1,'stefano.ve','Stefano','Verdi','Via Edelweiss','stefano.verdi@gmail.','ste98'),(9,4,'stefano.ga','Stefano','Gatto','Via Brombeis','ste.gatto@gmail.com','gatto'),(10,5,'v.br','Vincenzo','Brunet','Via Caduti','v.brunet@gmail.com','ciao'),(11,3,'s.nap','Saverio','Napoli','Via Duca','s.napoli@gmail.com','svnap'),(12,3,'l.toscan','Ludovico','Toscano','Via Entreves','l.tosc@gmail.com','dsadsa'),(13,1,'stefano.ve','Stefano','Verdi','Via Edelweiss','stefano.verdi@gmail.','ste98');
/*!40000 ALTER TABLE `Utenti` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-04 13:15:36
