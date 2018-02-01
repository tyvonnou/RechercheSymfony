# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Hôte: 127.0.0.1 (MySQL 5.7.20)
# Base de données: symfonyTest
# Temps de génération: 2018-02-01 11:18:40 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Affichage de la table domaine
# ------------------------------------------------------------

DROP TABLE IF EXISTS `domaine`;

CREATE TABLE `domaine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nom_domaine` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `structure_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_78AF0ACC2534008B` (`structure_id`),
  CONSTRAINT `FK_78AF0ACC2534008B` FOREIGN KEY (`structure_id`) REFERENCES `structure` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `domaine` WRITE;
/*!40000 ALTER TABLE `domaine` DISABLE KEYS */;

INSERT INTO `domaine` (`id`, `code`, `nom_domaine`, `structure_id`)
VALUES
	(1,'DSCSW','SiteClient1.fr',2),
	(3,'CSQZA','SiteClient2.fr',3),
	(4,'AQWXD','SiteClient3.fr',4);

/*!40000 ALTER TABLE `domaine` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table hebergement
# ------------------------------------------------------------

DROP TABLE IF EXISTS `hebergement`;

CREATE TABLE `hebergement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `projet_id` int(11) NOT NULL,
  `serveur_id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nom_hebergement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4852DD9CC18272` (`projet_id`),
  KEY `IDX_4852DD9CB8F06499` (`serveur_id`),
  CONSTRAINT `FK_4852DD9CB8F06499` FOREIGN KEY (`serveur_id`) REFERENCES `serveur` (`id`),
  CONSTRAINT `FK_4852DD9CC18272` FOREIGN KEY (`projet_id`) REFERENCES `projet` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `hebergement` WRITE;
/*!40000 ALTER TABLE `hebergement` DISABLE KEYS */;

INSERT INTO `hebergement` (`id`, `projet_id`, `serveur_id`, `code`, `nom_hebergement`, `url`, `version`)
VALUES
	(4,2,1,'SEREZ','HebergementClient1','www.SiteClient1.fr','1'),
	(5,3,2,'ERZSD','HebergementClient2','www.SiteClient2.fr','2'),
	(6,4,2,'FGTRE','HebergementClient3','www.SiteClient3.fr','4'),
	(7,2,1,'FEDXW','HebergementClient1Sousdm','Sousdm.SiteClient1.fr','1');

/*!40000 ALTER TABLE `hebergement` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table projet
# ------------------------------------------------------------

DROP TABLE IF EXISTS `projet`;

CREATE TABLE `projet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `structure_id` int(11) NOT NULL,
  `type_projet_id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nom_projet` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_50159CA92534008B` (`structure_id`),
  KEY `IDX_50159CA9B407C362` (`type_projet_id`),
  CONSTRAINT `FK_50159CA92534008B` FOREIGN KEY (`structure_id`) REFERENCES `structure` (`id`),
  CONSTRAINT `FK_50159CA9B407C362` FOREIGN KEY (`type_projet_id`) REFERENCES `typeProjet` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `projet` WRITE;
/*!40000 ALTER TABLE `projet` DISABLE KEYS */;

INSERT INTO `projet` (`id`, `structure_id`, `type_projet_id`, `code`, `nom_projet`)
VALUES
	(2,2,19,'DEZRT','Projet1'),
	(3,3,20,'ERDSF','Projet2'),
	(4,4,21,'ERTFS','Projet3');

/*!40000 ALTER TABLE `projet` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table serveur
# ------------------------------------------------------------

DROP TABLE IF EXISTS `serveur`;

CREATE TABLE `serveur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nom_serveur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `serveur` WRITE;
/*!40000 ALTER TABLE `serveur` DISABLE KEYS */;

INSERT INTO `serveur` (`id`, `code`, `nom_serveur`)
VALUES
	(1,'234','OVH21'),
	(2,'342','OVH22'),
	(3,'321','OVH23');

/*!40000 ALTER TABLE `serveur` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table sousdomaine
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sousdomaine`;

CREATE TABLE `sousdomaine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `domaine_id` int(11) NOT NULL,
  `projet_id` int(11) NOT NULL,
  `hebergement_id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nom_projet` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_51831FB84272FC9F` (`domaine_id`),
  KEY `IDX_51831FB8C18272` (`projet_id`),
  KEY `IDX_51831FB823BB0F66` (`hebergement_id`),
  CONSTRAINT `FK_51831FB823BB0F66` FOREIGN KEY (`hebergement_id`) REFERENCES `hebergement` (`id`),
  CONSTRAINT `FK_51831FB84272FC9F` FOREIGN KEY (`domaine_id`) REFERENCES `domaine` (`id`),
  CONSTRAINT `FK_51831FB8C18272` FOREIGN KEY (`projet_id`) REFERENCES `projet` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `sousdomaine` WRITE;
/*!40000 ALTER TABLE `sousdomaine` DISABLE KEYS */;

INSERT INTO `sousdomaine` (`id`, `domaine_id`, `projet_id`, `hebergement_id`, `code`, `nom_projet`)
VALUES
	(4,1,2,4,'FGTRE','Sousdm'),
	(5,3,3,5,'SCDVC','WWW'),
	(6,4,4,6,'XSQFE','WWW'),
	(8,1,2,4,'ERSEL','WWW');

/*!40000 ALTER TABLE `sousdomaine` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table structure
# ------------------------------------------------------------

DROP TABLE IF EXISTS `structure`;

CREATE TABLE `structure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nom_structure` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `structure` WRITE;
/*!40000 ALTER TABLE `structure` DISABLE KEYS */;

INSERT INTO `structure` (`id`, `code`, `nom_structure`)
VALUES
	(2,'AZERTY','Client1'),
	(3,'QWERTY','Client2'),
	(4,'ZQSDW','Client3');

/*!40000 ALTER TABLE `structure` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table typeProjet
# ------------------------------------------------------------

DROP TABLE IF EXISTS `typeProjet`;

CREATE TABLE `typeProjet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nom_projet_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `typeProjet` WRITE;
/*!40000 ALTER TABLE `typeProjet` DISABLE KEYS */;

INSERT INTO `typeProjet` (`id`, `code`, `nom_projet_type`, `version`)
VALUES
	(19,'1235','Wordpress','2'),
	(20,'1236','Drupal','3'),
	(21,'1237','Symfony','4'),
	(22,'','','');

/*!40000 ALTER TABLE `typeProjet` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
