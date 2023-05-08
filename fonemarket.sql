-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 08 mai 2023 à 16:05
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `fonemarket`
--

DELIMITER $$
--
-- Procédures
--
DROP PROCEDURE IF EXISTS `get_total_items_cart`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_total_items_cart` (IN `id_user` INT)  SELECT SUM(QUANTITE) AS total_article FROM panier WHERE ID_UTILISATEUR = id_user$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Numero_commande` varchar(10) NOT NULL,
  `ID_UTILISATEUR` int(11) NOT NULL,
  `Date_commande` date NOT NULL,
  `Expediteur` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `utiliind` (`ID_UTILISATEUR`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9440 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`ID`, `Numero_commande`, `ID_UTILISATEUR`, `Date_commande`, `Expediteur`) VALUES
(1561, '#1561u', 22, '2023-04-14', 'FoneMarket'),
(2501, '#2501u', 22, '2023-04-14', 'FoneMarket'),
(2836, '#2836A', 16, '2023-05-08', 'FoneMarket'),
(3053, '#3053A', 16, '2023-04-13', 'FoneMarket'),
(3876, '#3876u', 22, '2023-04-14', 'FoneMarket'),
(4005, '#4005A', 16, '2023-05-08', 'FoneMarket'),
(4137, '#4137A', 16, '2023-05-08', 'FoneMarket'),
(4213, '#4213C', 20, '2023-03-03', 'FoneMarket'),
(4409, '#4409C', 20, '2023-03-03', 'FoneMarket'),
(4718, '#4718A', 16, '2023-04-21', 'FoneMarket'),
(5276, '#5276A', 17, '2023-03-03', 'FoneMarket'),
(5851, '#5851A', 16, '2023-04-13', 'FoneMarket'),
(5999, '#5999C', 20, '2023-03-03', 'FoneMarket'),
(6178, '#6178C', 20, '2023-03-03', 'FoneMarket'),
(6276, '#6276A', 16, '2023-04-14', 'FoneMarket'),
(7393, '#7393t', 23, '2023-04-21', 'FoneMarket'),
(7522, '#7522C', 20, '2023-03-03', 'FoneMarket'),
(9076, '#9076Y', 18, '2023-04-13', 'FoneMarket'),
(9439, '#9439K', 21, '2023-03-03', 'FoneMarket');

-- --------------------------------------------------------

--
-- Structure de la table `couleur`
--

DROP TABLE IF EXISTS `couleur`;
CREATE TABLE IF NOT EXISTS `couleur` (
  `ID_COULEUR` int(11) NOT NULL AUTO_INCREMENT,
  `COULEUR` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_COULEUR`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `couleur`
--

INSERT INTO `couleur` (`ID_COULEUR`, `COULEUR`) VALUES
(1, 'Mauve'),
(2, 'Noir'),
(3, 'Blanc'),
(4, 'Vert'),
(5, 'Bleu '),
(6, 'Rouge '),
(7, 'Rose'),
(8, 'Lumière stellaire'),
(9, 'Argent'),
(10, 'Noir Carbone'),
(11, 'Gris Océan '),
(12, 'Minuit');

-- --------------------------------------------------------

--
-- Structure de la table `detail_commande`
--

DROP TABLE IF EXISTS `detail_commande`;
CREATE TABLE IF NOT EXISTS `detail_commande` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Commande` int(10) NOT NULL,
  `Qte` int(11) NOT NULL,
  `ID_Article` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `idcomind` (`ID_Commande`),
  KEY `idqmarcom` (`ID_Article`)
) ENGINE=InnoDB AUTO_INCREMENT=177 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `detail_commande`
--

INSERT INTO `detail_commande` (`ID`, `ID_Commande`, `Qte`, `ID_Article`) VALUES
(130, 7129, 2, 23),
(131, 1358, 1, 21),
(132, 1358, 1, 20),
(133, 4316, 2, 25),
(134, 4928, 32, 21),
(135, 4928, 38, 20),
(136, 4928, 14, 22),
(137, 4928, 6, 23),
(138, 4928, 16, 25),
(139, 9276, 3, 21),
(140, 8703, 1, 20),
(141, 3419, 1, 20),
(142, 3419, 1, 22),
(143, 3419, 1, 23),
(144, 3419, 1, 25),
(145, 3419, 1, 21),
(146, 4600, 1, 21),
(147, 9672, 14, 31),
(148, 7037, 1, 39),
(149, 8882, 1, 21),
(150, 4600, 1, 28),
(151, 2756, 1, 39),
(152, 4492, 1, 21),
(153, 5304, 1, 26),
(154, 6185, 1, 21),
(155, 9160, 1, 28),
(156, 2234, 1, 21),
(157, 6870, 1, 20),
(158, 7522, 1, 21),
(159, 4409, 1, 21),
(160, 6178, 1, 21),
(161, 4213, 1, 21),
(162, 5999, 1, 21),
(163, 9439, 1, 23),
(164, 5276, 13, 30),
(165, 3053, 1, 43),
(166, 5851, 1, 43),
(167, 9076, 1, 44),
(168, 6276, 1, 25),
(169, 1561, 1, 38),
(170, 3876, 1, 23),
(171, 2501, 1, 25),
(172, 4718, 1, 47),
(173, 7393, 1, 34),
(174, 4137, 2, 26),
(175, 2836, 1, 20),
(176, 4005, 1, 20);

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

DROP TABLE IF EXISTS `historique`;
CREATE TABLE IF NOT EXISTS `historique` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Numero_commande` varchar(10) NOT NULL,
  `Date_commande` date NOT NULL,
  `Acheteur` varchar(100) NOT NULL,
  `Montant` double NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `historique`
--

INSERT INTO `historique` (`ID`, `Numero_commande`, `Date_commande`, `Acheteur`, `Montant`) VALUES
(24, '#7129Y', '2025-05-22', '18', 2196.2),
(25, '#1358Y', '2025-05-22', '18', 2438),
(26, '#4316Y', '2025-05-22', '18', 2196.2),
(27, '#4928Y', '2025-05-22', '18', 115358.6),
(28, '#9276Y', '2025-05-22', '18', 3284.3),
(29, '#8703Y', '2025-05-22', '18', 1108.1),
(30, '#3419A', '2026-05-22', '17', 5460.5),
(31, '#4600Y', '2014-06-22', '18', 1108.1),
(32, '#9672A', '2017-06-22', '16', 8420),
(33, '#7037A', '2024-02-23', '16', 1080),
(34, '#8882A', '2024-02-23', '16', 624.5),
(35, '#4600A', '2003-03-23', '16', 829),
(36, '#2756A', '2003-03-23', '16', 20),
(37, '#4492A', '2003-03-23', '17', 20),
(38, '#5304A', '2003-03-23', '17', 424.5),
(39, '#6185A', '2003-03-23', '17', 20),
(40, '#9160A', '2003-03-23', '17', 829),
(41, '#2234A', '2023-03-03', '17', 1229),
(42, '#6870A', '2023-03-03', '17', 1229),
(43, '#5999C', '2023-03-03', '20', 1229),
(44, '#9439K', '2023-03-03', '21', 1229),
(45, '#5276A', '2023-03-03', '17', 7820),
(46, '#3053A', '2023-04-13', '16', 920),
(47, '#5851A', '2023-04-13', '16', 920),
(48, '#9076Y', '2023-04-13', '18', 830),
(49, '#6276A', '2023-04-14', '16', 20),
(50, '#1561u', '2023-04-14', '22', 20),
(51, '#3876u', '2023-04-14', '22', 1229),
(52, '#2501u', '2023-04-14', '22', 1229),
(53, '#4718A', '2023-04-21', '16', 240),
(54, '#7393t', '2023-04-21', '23', 298.1),
(55, '#4137A', '2023-05-08', '16', 1476.2),
(56, '#2836A', '2023-05-08', '16', 20),
(57, '#4005A', '2023-05-08', '16', 1229);

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

DROP TABLE IF EXISTS `marque`;
CREATE TABLE IF NOT EXISTS `marque` (
  `ID_MARQUE` int(11) NOT NULL AUTO_INCREMENT,
  `MARQUE` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_MARQUE`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `marque`
--

INSERT INTO `marque` (`ID_MARQUE`, `MARQUE`) VALUES
(1, 'Apple'),
(2, 'Samsung'),
(3, 'Xiaomi'),
(4, 'Huawei'),
(5, 'Google'),
(6, 'OnePlus'),
(7, 'Oppo');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_UTILISATEUR` int(11) NOT NULL,
  `QUANTITE` int(11) NOT NULL,
  `ID_PRODUIT` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `PANIER_UTILISATEUR0_FK` (`ID_UTILISATEUR`),
  KEY `PanierSmart` (`ID_PRODUIT`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`ID`, `ID_UTILISATEUR`, `QUANTITE`, `ID_PRODUIT`) VALUES
(3, 18, 1, 29);

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

DROP TABLE IF EXISTS `promotion`;
CREATE TABLE IF NOT EXISTS `promotion` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PROMOTION` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `promotion`
--

INSERT INTO `promotion` (`ID`, `PROMOTION`) VALUES
(10, 10);

-- --------------------------------------------------------

--
-- Structure de la table `smartphone`
--

DROP TABLE IF EXISTS `smartphone`;
CREATE TABLE IF NOT EXISTS `smartphone` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NEUF` tinyint(4) NOT NULL,
  `PHOTO` varchar(50) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `PRIX` int(11) NOT NULL,
  `NOM` varchar(50) NOT NULL,
  `SYSTEME_D_EXPLOITATION` varchar(50) NOT NULL,
  `STOCKAGE` int(11) NOT NULL,
  `RESEAU` varchar(11) NOT NULL,
  `DOUBLE_SIM` tinyint(1) NOT NULL,
  `APP_PHOTO` float NOT NULL,
  `TAILLE_ECRAN` float NOT NULL,
  `ID_MARQUE` int(11) NOT NULL,
  `ID_COULEUR` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `SMARTPHONE_MARQUE_FK` (`ID_MARQUE`),
  KEY `SMARTPHONE_COULEUR0_FK` (`ID_COULEUR`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `smartphone`
--

INSERT INTO `smartphone` (`ID`, `NEUF`, `PHOTO`, `DESCRIPTION`, `PRIX`, `NOM`, `SYSTEME_D_EXPLOITATION`, `STOCKAGE`, `RESEAU`, `DOUBLE_SIM`, `APP_PHOTO`, `TAILLE_ECRAN`, `ID_MARQUE`, `ID_COULEUR`) VALUES
(20, 0, '/FoneMarket/media/produit/iPhone13_minuit.jpg', 'L\'iPhone 13 est un smartphone haut de gamme signé Apple et compatible 5G. Décliné en cinq couleurs, il embarque le processeur A15 Bionic, 128 Go de stockage au minimum et un double module caméra avec grand-angle et ultra grand-angle. Son écran OLED mesure 6,1 pouces et est compatible HDR Dolby Vision.', 1209, 'iPhone 13', 'iOS', 512, '5G', 0, 12, 6.1, 1, 12),
(21, 1, '/FoneMarket/media/produit/iPhone13_vert.jpg', '6,1″ Écran Super Retina XDR - Double appareil photo arrière 12 Mpx (grand‑angle et ultra grand‑angle) - Caméra avant TrueDepth 12 Mpx - Face ID - Puce A15 Bionic Nouveau CPU 6 cœurs avec 2 cœurs de performance et 4 cœurs à haute efficacité énergétique - Indice de protection IP68 (jusqu’à 6 mètres de profondeur pendant 30 minutes maximum) défini par la norme 60529 de la CEI - Lecture vidéo : Jusqu’à 19 heures, Streaming vidéo : Jusqu’à 15 heures, Lecture audio : Jusqu’à 75 heures, Capacité de recharge rapide, Jusqu’à 50 % de charge en 30 minutes12 avec un adaptateur 20 W ou plus (disponible séparément)', 1209, 'iPhone 13', 'iOS', 512, '5G', 0, 12, 6.1, 1, 4),
(22, 1, '/FoneMarket/media/produit/iPhone13_bleu.jpg', '6,1″ Écran Super Retina XDR - Double appareil photo arrière 12 Mpx (grand‑angle et ultra grand‑angle) - Caméra avant TrueDepth 12 Mpx - Face ID - Puce A15 Bionic Nouveau CPU 6 cœurs avec 2 cœurs de performance et 4 cœurs à haute efficacité énergétique - Indice de protection IP68 (jusqu’à 6 mètres de profondeur pendant 30 minutes maximum) défini par la norme 60529 de la CEI - Lecture vidéo : Jusqu’à 19 heures, Streaming vidéo : Jusqu’à 15 heures, Lecture audio : Jusqu’à 75 heures, Capacité de recharge rapide, Jusqu’à 50 % de charge en 30 minutes12 avec un adaptateur 20 W ou plus (disponible séparément)', 1209, 'iPhone 13', 'iOS', 512, '5G', 0, 12, 6.1, 1, 5),
(23, 1, '/FoneMarket/media/produit/iPhone13_lstellaire.jpg', '6,1″ Écran Super Retina XDR - Double appareil photo arrière 12 Mpx (grand‑angle et ultra grand‑angle) - Caméra avant TrueDepth 12 Mpx - Face ID - Puce A15 Bionic Nouveau CPU 6 cœurs avec 2 cœurs de performance et 4 cœurs à haute efficacité énergétique - Indice de protection IP68 (jusqu’à 6 mètres de profondeur pendant 30 minutes maximum) défini par la norme 60529 de la CEI - Lecture vidéo : Jusqu’à 19 heures, Streaming vidéo : Jusqu’à 15 heures, Lecture audio : Jusqu’à 75 heures, Capacité de recharge rapide, Jusqu’à 50 % de charge en 30 minutes12 avec un adaptateur 20 W ou plus (disponible séparément)', 1209, 'iPhone 13', 'iOS', 512, '5G', 0, 12, 6.1, 1, 8),
(24, 1, '/FoneMarket/media/produit/iPhone12_bleu.jpg', 'Puce A14 Bionic, la plus rapide sur smartphone. Écran OLED bord à bord. Et mode Nuit sur chaque appareil photo.Le meilleur écran d’iPhone jamais conçu, pour un contraste irréprochable et une résolution impressionnante. Doté du Ceramic Shield, qui multiplie par quatre la résistance aux chutes◊.Vitesses LTE jusqu’à 2 Gbit/s. Téléchargez des séries, publiez des photos et faites du streaming vidéo de haute qualité plus facilement que jamais. Avec plus de bandes LTE et 5G que tout autre smartphone, il est déjà prêt pour la 5G ultra-rapide◊.La puce A14 Bionic est la plus rapide des puces de smartphone. Avec son Neural Engine 16 cœurs, elle abat des milliers de milliards d’opérations à la seconde. Et comme elle est extrêmement économe en énergie, elle vous offre une formidable autonomie◊.Disponible sur l’ensemble des appareils photo, le mode Nuit donne un nouveau niveau de détail à vos photos nocturnes – y compris vos selfies.Avec l’iPhone 12, vous pouvez tourner, monter et visionner des vidéos en Dolby Vision. Utilisez AirPlay pour les diffuser sur votre Apple TV ou votre téléviseur connecté◊.', 809, 'iPhone 12', 'IOS', 64, '5G', 0, 12, 6.1, 1, 5),
(25, 1, '/FoneMarket/media/produit/iPhone13_rose.jpg', '6,1″ Écran Super Retina XDR - Double appareil photo arrière 12 Mpx (grand‑angle et ultra grand‑angle) - Caméra avant TrueDepth 12 Mpx - Face ID - Puce A15 Bionic Nouveau CPU 6 cœurs avec 2 cœurs de performance et 4 cœurs à haute efficacité énergétique - Indice de protection IP68 (jusqu’à 6 mètres de profondeur pendant 30 minutes maximum) défini par la norme 60529 de la CEI - Lecture vidéo : Jusqu’à 19 heures, Streaming vidéo : Jusqu’à 15 heures, Lecture audio : Jusqu’à 75 heures, Capacité de recharge rapide, Jusqu’à 50 % de charge en 30 minutes12 avec un adaptateur 20 W ou plus (disponible séparément)', 1209, 'iPhone 13', 'iOS', 512, '5G', 0, 12, 6.1, 1, 7),
(26, 1, '/FoneMarket/media/produit/iPhone12_blanc.jpg', 'Puce A14 Bionic, la plus rapide sur smartphone. Écran OLED bord à bord. Et mode Nuit sur chaque appareil photo.Le meilleur écran d’iPhone jamais conçu, pour un contraste irréprochable et une résolution impressionnante. Doté du Ceramic Shield, qui multiplie par quatre la résistance aux chutes◊.Vitesses LTE jusqu’à 2 Gbit/s. Téléchargez des séries, publiez des photos et faites du streaming vidéo de haute qualité plus facilement que jamais. Avec plus de bandes LTE et 5G que tout autre smartphone, il est déjà prêt pour la 5G ultra-rapide◊.La puce A14 Bionic est la plus rapide des puces de smartphone. Avec son Neural Engine 16 cœurs, elle abat des milliers de milliards d’opérations à la seconde. Et comme elle est extrêmement économe en énergie, elle vous offre une formidable autonomie◊.Disponible sur l’ensemble des appareils photo, le mode Nuit donne un nouveau niveau de détail à vos photos nocturnes – y compris vos selfies.Avec l’iPhone 12, vous pouvez tourner, monter et visionner des vidéos en Dolby Vision. Utilisez AirPlay pour les diffuser sur votre Apple TV ou votre téléviseur connecté◊.', 809, 'iPhone 12', 'IOS', 64, '5G', 0, 12, 6.1, 1, 3),
(27, 1, '/FoneMarket/media/produit/iPhone12_vert.jpg', 'Puce A14 Bionic, la plus rapide sur smartphone. Écran OLED bord à bord. Et mode Nuit sur chaque appareil photo.Le meilleur écran d’iPhone jamais conçu, pour un contraste irréprochable et une résolution impressionnante. Doté du Ceramic Shield, qui multiplie par quatre la résistance aux chutes◊.Vitesses LTE jusqu’à 2 Gbit/s. Téléchargez des séries, publiez des photos et faites du streaming vidéo de haute qualité plus facilement que jamais. Avec plus de bandes LTE et 5G que tout autre smartphone, il est déjà prêt pour la 5G ultra-rapide◊.La puce A14 Bionic est la plus rapide des puces de smartphone. Avec son Neural Engine 16 cœurs, elle abat des milliers de milliards d’opérations à la seconde. Et comme elle est extrêmement économe en énergie, elle vous offre une formidable autonomie◊.Disponible sur l’ensemble des appareils photo, le mode Nuit donne un nouveau niveau de détail à vos photos nocturnes – y compris vos selfies.Avec l’iPhone 12, vous pouvez tourner, monter et visionner des vidéos en Dolby Vision. Utilisez AirPlay pour les diffuser sur votre Apple TV ou votre téléviseur connecté◊.', 809, 'iPhone 12', 'IOS', 64, '5G', 0, 12, 6.1, 1, 4),
(28, 1, '/FoneMarket/media/produit/iPhone12_noir.jpg', 'Puce A14 Bionic, la plus rapide sur smartphone. Écran OLED bord à bord. Et mode Nuit sur chaque appareil photo.Le meilleur écran d’iPhone jamais conçu, pour un contraste irréprochable et une résolution impressionnante. Doté du Ceramic Shield, qui multiplie par quatre la résistance aux chutes◊.Vitesses LTE jusqu’à 2 Gbit/s. Téléchargez des séries, publiez des photos et faites du streaming vidéo de haute qualité plus facilement que jamais. Avec plus de bandes LTE et 5G que tout autre smartphone, il est déjà prêt pour la 5G ultra-rapide◊.La puce A14 Bionic est la plus rapide des puces de smartphone. Avec son Neural Engine 16 cœurs, elle abat des milliers de milliards d’opérations à la seconde. Et comme elle est extrêmement économe en énergie, elle vous offre une formidable autonomie◊.Disponible sur l’ensemble des appareils photo, le mode Nuit donne un nouveau niveau de détail à vos photos nocturnes – y compris vos selfies.Avec l’iPhone 12, vous pouvez tourner, monter et visionner des vidéos en Dolby Vision. Utilisez AirPlay pour les diffuser sur votre Apple TV ou votre téléviseur connecté◊.', 809, 'iPhone 12', 'IOS', 64, '5G', 0, 12, 6.1, 1, 2),
(29, 1, '/FoneMarket/media/produit/iPhone11_noir.jpg', 'Six superbes couleurs. Un somptueux écran LCD Liquid Retina bord à bord de 6,1 pouces2. Et la résistance à l’eau jusqu’à 2 mètres de profondeur pendant 30 minutes maximum.Ultra grand-angle (13 mm). Champ de vision de 120° pour une image quatre fois plus vaste.Grand-angle (26 mm). 100 % de Focus Pixels pour une mise au point automatique jusqu’à trois fois plus rapide en conditions de faible éclairage.\r\nVidéo 4K à 60 i/s sur chaque appareil photo. Ultra grand-angle pour une image quatre fois plus vaste. Et la possibilité de faire pivoter, recadrer ou appliquer des filtres aussi facilement qu’avec vos photos.Dîner aux chandelles, feu de camp sur la plage... Dans les conditions de faible éclairage, le nouveau mode Nuit produit automatiquement des photos au rendu très naturel.Batterie et puce\r\nDe l’énergie du matin au soir.  \r\nAutonomie d’une journée1. Puce A13 Bionic, la plus rapide des puces de smartphone. Et capacité de recharge rapide avec un adaptateur de 18 W (vendu séparément).Respect de la vie privée\r\nConfidentialité de série.  \r\nFace ID est la méthode d’authentification faciale la plus sûre sur smartphone. Elle ne sauvegarde et ne partage pas votre photo. Et elle est plus sûre que Touch ID.', 600, 'iPhone 11', 'IOS', 64, '4G', 0, 12, 6.1, 1, 2),
(30, 1, '/FoneMarket/media/produit/iPhone11_blanc.jpg', 'Six superbes couleurs. Un somptueux écran LCD Liquid Retina bord à bord de 6,1 pouces2. Et la résistance à l’eau jusqu’à 2 mètres de profondeur pendant 30 minutes maximum.Ultra grand-angle (13 mm). Champ de vision de 120° pour une image quatre fois plus vaste.Grand-angle (26 mm). 100 % de Focus Pixels pour une mise au point automatique jusqu’à trois fois plus rapide en conditions de faible éclairage.\r\nVidéo 4K à 60 i/s sur chaque appareil photo. Ultra grand-angle pour une image quatre fois plus vaste. Et la possibilité de faire pivoter, recadrer ou appliquer des filtres aussi facilement qu’avec vos photos.Dîner aux chandelles, feu de camp sur la plage... Dans les conditions de faible éclairage, le nouveau mode Nuit produit automatiquement des photos au rendu très naturel.Batterie et puce\r\nDe l’énergie du matin au soir.  \r\nAutonomie d’une journée1. Puce A13 Bionic, la plus rapide des puces de smartphone. Et capacité de recharge rapide avec un adaptateur de 18 W (vendu séparément).Respect de la vie privée\r\nConfidentialité de série.  \r\nFace ID est la méthode d’authentification faciale la plus sûre sur smartphone. Elle ne sauvegarde et ne partage pas votre photo. Et elle est plus sûre que Touch ID.', 600, 'Iphone 11', 'IOS', 64, '4G', 0, 12, 6.1, 1, 3),
(31, 1, '/FoneMarket/media/produit/iPhone11_rouge.jpg', 'Six superbes couleurs. Un somptueux écran LCD Liquid Retina bord à bord de 6,1 pouces2. Et la résistance à l’eau jusqu’à 2 mètres de profondeur pendant 30 minutes maximum.Ultra grand-angle (13 mm). Champ de vision de 120° pour une image quatre fois plus vaste.Grand-angle (26 mm). 100 % de Focus Pixels pour une mise au point automatique jusqu’à trois fois plus rapide en conditions de faible éclairage.\r\nVidéo 4K à 60 i/s sur chaque appareil photo. Ultra grand-angle pour une image quatre fois plus vaste. Et la possibilité de faire pivoter, recadrer ou appliquer des filtres aussi facilement qu’avec vos photos.Dîner aux chandelles, feu de camp sur la plage... Dans les conditions de faible éclairage, le nouveau mode Nuit produit automatiquement des photos au rendu très naturel.Batterie et puce\r\nDe l’énergie du matin au soir.  \r\nAutonomie d’une journée1. Puce A13 Bionic, la plus rapide des puces de smartphone. Et capacité de recharge rapide avec un adaptateur de 18 W (vendu séparément).Respect de la vie privée\r\nConfidentialité de série.  \r\nFace ID est la méthode d’authentification faciale la plus sûre sur smartphone. Elle ne sauvegarde et ne partage pas votre photo. Et elle est plus sûre que Touch ID.', 600, 'Iphone 11', 'IOS', 64, '4G', 0, 12, 6.1, 1, 6),
(32, 1, '/FoneMarket/media/produit/iPhone11_vert.jpg', 'Six superbes couleurs. Un somptueux écran LCD Liquid Retina bord à bord de 6,1 pouces2. Et la résistance à l’eau jusqu’à 2 mètres de profondeur pendant 30 minutes maximum.Ultra grand-angle (13 mm). Champ de vision de 120° pour une image quatre fois plus vaste.Grand-angle (26 mm). 100 % de Focus Pixels pour une mise au point automatique jusqu’à trois fois plus rapide en conditions de faible éclairage.\r\nVidéo 4K à 60 i/s sur chaque appareil photo. Ultra grand-angle pour une image quatre fois plus vaste. Et la possibilité de faire pivoter, recadrer ou appliquer des filtres aussi facilement qu’avec vos photos.Dîner aux chandelles, feu de camp sur la plage... Dans les conditions de faible éclairage, le nouveau mode Nuit produit automatiquement des photos au rendu très naturel.Batterie et puce\r\nDe l’énergie du matin au soir.  \r\nAutonomie d’une journée1. Puce A13 Bionic, la plus rapide des puces de smartphone. Et capacité de recharge rapide avec un adaptateur de 18 W (vendu séparément).Respect de la vie privée\r\nConfidentialité de série.  \r\nFace ID est la méthode d’authentification faciale la plus sûre sur smartphone. Elle ne sauvegarde et ne partage pas votre photo. Et elle est plus sûre que Touch ID.', 600, 'Iphone 11', 'IOS', 64, '4G', 0, 12, 6.1, 1, 4),
(34, 1, '/FoneMarket/media/produit/iPhoneSE_blanc.jpg', 'Puce surpuissante. Autonomie nettement améliorée◊. Appareil photo de génie. Le tout dans un design de poche de 4,7 pouces conçu pour durer.La puce A15 Bionic surpuissante charge les apps à la vitesse de l’éclair, tout en profitant d’une meilleure batterie et d’iOS pour offrir une autonomie prolongée.Une batterie qui permet jusqu’à 15 heures de lecture vidéo◊.Meilleure résistance aux chutes◊.Renvoi aux mentions légales Protection contre les entailles et les rayures. Résistance aux éclaboussures de café, de thé et de soda. Et même à la poussière Grâce à un design robuste fait d’un verre ultra-résistant à l’avant et au dos.Choisissez votre style préféré, comme Chaud ou Froid, et il s’applique à chaque cliché grâce aux Styles photographiques. Puis admirez le résultat sur un superbe écran de 4,7 pouces.Choisissez votre style préféré, comme Chaud ou Froid, et il s’applique à chaque cliché grâce aux Styles photographiques. Puis admirez le résultat sur un superbe écran de 4,7 pouces.', 309, 'Iphone SE', 'IOS', 64, '4G', 0, 12, 4.7, 1, 3),
(35, 1, '/FoneMarket/media/produit/iPhoneSE_red.jpg', 'Puce surpuissante. Autonomie nettement améliorée◊. Appareil photo de génie. Le tout dans un design de poche de 4,7 pouces conçu pour durer.La puce A15 Bionic surpuissante charge les apps à la vitesse de l’éclair, tout en profitant d’une meilleure batterie et d’iOS pour offrir une autonomie prolongée.Une batterie qui permet jusqu’à 15 heures de lecture vidéo◊.Meilleure résistance aux chutes◊.Renvoi aux mentions légales Protection contre les entailles et les rayures. Résistance aux éclaboussures de café, de thé et de soda. Et même à la poussière Grâce à un design robuste fait d’un verre ultra-résistant à l’avant et au dos.Choisissez votre style préféré, comme Chaud ou Froid, et il s’applique à chaque cliché grâce aux Styles photographiques. Puis admirez le résultat sur un superbe écran de 4,7 pouces.Choisissez votre style préféré, comme Chaud ou Froid, et il s’applique à chaque cliché grâce aux Styles photographiques. Puis admirez le résultat sur un superbe écran de 4,7 pouces.', 400, 'Iphone SE', 'IOS', 128, '4G', 0, 12, 4.7, 1, 6),
(36, 1, '/FoneMarket/media/produit/samsungS22plus_blanc.jpg', 'Le Samsung Galaxy S22+ est équipé d\'un écran Infinity-O Dynamic AMOLED de 6.6\" à résolution Full HD+ 1080 x 2340 pixels, qui sublime la richesse des images tout en vous offrant une immersion spectaculaire. Et avec un taux de rafraichissement adaptatif de 120 Hz, utiliser son smartphone n\'aura jamais été aussi agréable. Par ailleurs, le S22+ intègre un processeur Exynos 2200 Octo-Core cadencé à 2.9 GHz, 8 Go de RAM et 256 Go de capacité afin de vous offrir toute la puissance nécessaire pour profiter au mieux de votre smartphone, même les jeux les plus exigeants en ressources graphiques fonctionnent de manière ultra fluide.\r\n\r\nDual SIM, le Samsung Galaxy S22+ vous permet de gérer efficacement votre vie professionnelle et votre vie personnelle de la meilleure des façons.Prenez des photos très détaillées grâce au Samsung Galaxy S22+ et à son triple capteur photo de 50+12+10 MP. Il intègre notamment un optimiseur de scènes, une reconnaissance automatique de l\'image et un cadrage professionnel intelligent pour vous proposer le meilleur paramétrage et cadrage pour mettre grandement en valeur vos photos. Quant au mode Nuit avancé, vous pouvez prendre encore plus de photos impressionnantes, même la nuit.\r\n\r\nDe plus, réalisez des vidéos à couper le souffle grâce à la possibilité de filmer en 8K 24 fps via la caméra principale ou en 4K 60 fps via la caméra principale et frontale. Cette dernière de 10 MP Dual Pixel, intègre la technologie HDR10+, offre de nombreuses possibilités pour des portraits de qualité studio.Le Samsung Galaxy S22+ vous assure une sécurité sans faille en s\'appuyant sur la reconnaissance faciale ainsi qu\'un lecteur d\'empreinte ultrasonique qui se situe sous l\'écran. Ce dernier, ultrasonique, fonctionne dans toutes les conditions de luminosité, mais également en condition de froid et d\'humidité et dispose d\'une meilleure sécurité. Le Samsung Galaxy S22+ est également équipé d\'une batterie intelligente de 4500 mAh qui apprend de votre usage pour optimiser les performances.\r\n\r\nPlus performant que jamais, le Galaxy S22+ intègre un WiFi plus performant grâce à sa compatibilité avec la nouvelle génération de WiFi 6E afin de vous fournir une vitesse supérieure par rapport à l\'ancienne génération.', 1100, 'Galaxy S22 Plus', 'Android', 128, '5G', 1, 50, 6.1, 2, 3),
(37, 1, '/FoneMarket/media/produit/samsungs22_black.jpg', 'Le Samsung Galaxy S22 est équipé d\'un écran Infinity-O Dynamic AMOLED de 6.1\" à résolution Full HD+ 1080 x 2340 pixels, qui sublime la richesse des images tout en vous offrant une immersion spectaculaire. Et avec un taux de rafraichissement adaptatif de 120 Hz, utiliser son smartphone n\'aura jamais été aussi agréable. Par ailleurs, le S22 intègre un processeur Exynos 2200 Octo-Core cadencé à 2.9 GHz, 8 Go de RAM et 128 Go de capacité afin de vous offrir toute la puissance nécessaire pour profiter au mieux de votre smartphone, même les jeux les plus exigeants en ressources graphiques fonctionnent de manière ultra fluide.\r\n\r\nDual SIM, le Samsung Galaxy S22 vous permet de gérer efficacement votre vie professionnelle et votre vie personnelle de la meilleure des façons.\r\nPrenez des photos très détaillées grâce au Samsung Galaxy S22+ et à son triple capteur photo de 50+12+10 MP. Il intègre notamment un optimiseur de scènes, une reconnaissance automatique de l\'image et un cadrage professionnel intelligent pour vous proposer le meilleur paramétrage et cadrage pour mettre grandement en valeur vos photos. Quant au mode Nuit avancé, vous pouvez prendre encore plus de photos impressionnantes, même la nuit.\r\n\r\nDe plus, réalisez des vidéos à couper le souffle grâce à la possibilité de filmer en 8K 24 fps via la caméra principale ou en 4K 60 fps via la caméra principale et frontale. Cette dernière de 10 MP Dual Pixel, intègre la technologie HDR10+, offre de nombreuses possibilités pour des portraits de qualité studio.Le Samsung Galaxy S22 vous assure une sécurité sans faille en s\'appuyant sur la reconnaissance faciale ainsi qu\'un lecteur d\'empreinte ultrasonique qui se situe sous l\'écran. Ce dernier, ultrasonique, fonctionne dans toutes les conditions de luminosité, mais également en condition de froid et d\'humidité et dispose d\'une meilleure sécurité. Le Samsung Galaxy S22 est également équipé d\'une batterie intelligente de 3700 mAh qui apprend de votre usage pour optimiser les performances.', 900, 'Galaxy S22', 'Android', 128, '5G', 1, 50, 6.1, 2, 2),
(38, 1, '/FoneMarket/media/produit/samsungs22ultra_noir.jpg', 'Le Samsung Galaxy S22 est équipé d\'un écran Infinity-O Dynamic AMOLED de 6.1\" à résolution Full HD+ 1080 x 2340 pixels, qui sublime la richesse des images tout en vous offrant une immersion spectaculaire. Et avec un taux de rafraichissement adaptatif de 120 Hz, utiliser son smartphone n\'aura jamais été aussi agréable. Par ailleurs, le S22 intègre un processeur Exynos 2200 Octo-Core cadencé à 2.9 GHz, 8 Go de RAM et 128 Go de capacité afin de vous offrir toute la puissance nécessaire pour profiter au mieux de votre smartphone, même les jeux les plus exigeants en ressources graphiques fonctionnent de manière ultra fluide.\r\n\r\nDual SIM, le Samsung Galaxy S22 vous permet de gérer efficacement votre vie professionnelle et votre vie personnelle de la meilleure des façons.\r\nPrenez des photos très détaillées grâce au Samsung Galaxy S22+ et à son triple capteur photo de 50+12+10 MP. Il intègre notamment un optimiseur de scènes, une reconnaissance automatique de l\'image et un cadrage professionnel intelligent pour vous proposer le meilleur paramétrage et cadrage pour mettre grandement en valeur vos photos. Quant au mode Nuit avancé, vous pouvez prendre encore plus de photos impressionnantes, même la nuit.\r\n\r\nDe plus, réalisez des vidéos à couper le souffle grâce à la possibilité de filmer en 8K 24 fps via la caméra principale ou en 4K 60 fps via la caméra principale et frontale. Cette dernière de 10 MP Dual Pixel, intègre la technologie HDR10+, offre de nombreuses possibilités pour des portraits de qualité studio.Le Samsung Galaxy S22 vous assure une sécurité sans faille en s\'appuyant sur la reconnaissance faciale ainsi qu\'un lecteur d\'empreinte ultrasonique qui se situe sous l\'écran. Ce dernier, ultrasonique, fonctionne dans toutes les conditions de luminosité, mais également en condition de froid et d\'humidité et dispose d\'une meilleure sécurité. Le Samsung Galaxy S22 est également équipé d\'une batterie intelligente de 3700 mAh qui apprend de votre usage pour optimiser les performances.', 1060, 'Galaxy S22 Ultra', 'Android', 128, '5G', 1, 50, 6.1, 2, 2),
(39, 1, '/FoneMarket/media/produit/samsungs22ultra_red.jpg', 'Le Samsung Galaxy S22 Ultra est équipé d\'un écran Infinity-O Dynamic AMOLED de 6.8\" à résolution Quad HD+ 1440 x 3088 pixels, qui sublime la richesse des images tout en vous offrant une immersion spectaculaire. Et avec un taux de rafraichissement adaptatif de 120 Hz, utiliser son smartphone n\'aura jamais été aussi agréable. Par ailleurs, le S22 Ultra intègre un processeur Exynos 2200 Octo-Core cadencé à 2.9 GHz, 8 Go de RAM et 128 Go de capacité afin de vous offrir toute la puissance nécessaire pour profiter au mieux de votre smartphone, même les jeux les plus exigeants en ressources graphiques fonctionnent de manière ultra fluide.\r\n\r\nDual SIM, le Samsung Galaxy S22 Ultra vous permet de gérer efficacement votre vie professionnelle et votre vie personnelle de la meilleure des façons.Profitez d\'une expérience photo et vidéo la plus aboutie grâce au Samsung Galaxy S22 Ultra et son quadruple capteur photo de 108+12+10+10 MP. Offrant des détails exceptionnels grâce à son capteur 108 MP, il possède également un zoom optique x10 d\'exception pour vous permettre de réaliser des clichés uniques. Quant au Space Zoom x100, il est très utile pour capturer le moindre détail sans altérer la qualité de votre photo.\r\n\r\nDe plus, réalisez des vidéos à couper le souffle grâce à la possibilité de filmer en 8K 24 fps via la caméra principale ou en 4K 60 fps via la caméra principale et frontale. Cette dernière de 40 MP Dual Pixel, intègre la technologie HDR10+, offre de nombreuses possibilités pour des portraits de qualité studio.Le Samsung Galaxy S22 Ultra vous assure une sécurité sans faille en s\'appuyant sur la reconnaissance faciale ainsi qu\'un lecteur d\'empreinte ultrasonique qui se situe sous l\'écran. Ce dernier, ultrasonique, fonctionne dans toutes les conditions de luminosité, mais également en condition de froid et d\'humidité et dispose d\'une meilleure sécurité. Le Samsung Galaxy S22 Ultra est également équipé d\'une batterie intelligente de 5000 mAh qui apprend de votre usage pour optimiser les performances.\r\n\r\nPlus performant que jamais, le Galaxy S22 Ultra intègre un WiFi plus performant grâce à sa compatibilité avec la nouvelle génération de WiFi 6E afin de vous fournir une vitesse supérieure par rapport à l\'ancienne génération.', 1060, 'Galaxy S22 Ultra', 'Android', 128, '5G', 1, 50, 6.1, 2, 6),
(40, 1, '/FoneMarket/media/produit/samsung22ultra_blanc.jpg', 'Le Samsung Galaxy S22 Ultra est équipé d\'un écran Infinity-O Dynamic AMOLED de 6.8\" à résolution Quad HD+ 1440 x 3088 pixels, qui sublime la richesse des images tout en vous offrant une immersion spectaculaire. Et avec un taux de rafraichissement adaptatif de 120 Hz, utiliser son smartphone n\'aura jamais été aussi agréable. Par ailleurs, le S22 Ultra intègre un processeur Exynos 2200 Octo-Core cadencé à 2.9 GHz, 8 Go de RAM et 128 Go de capacité afin de vous offrir toute la puissance nécessaire pour profiter au mieux de votre smartphone, même les jeux les plus exigeants en ressources graphiques fonctionnent de manière ultra fluide.\r\n\r\nDual SIM, le Samsung Galaxy S22 Ultra vous permet de gérer efficacement votre vie professionnelle et votre vie personnelle de la meilleure des façons.Profitez d\'une expérience photo et vidéo la plus aboutie grâce au Samsung Galaxy S22 Ultra et son quadruple capteur photo de 108+12+10+10 MP. Offrant des détails exceptionnels grâce à son capteur 108 MP, il possède également un zoom optique x10 d\'exception pour vous permettre de réaliser des clichés uniques. Quant au Space Zoom x100, il est très utile pour capturer le moindre détail sans altérer la qualité de votre photo.\r\n\r\nDe plus, réalisez des vidéos à couper le souffle grâce à la possibilité de filmer en 8K 24 fps via la caméra principale ou en 4K 60 fps via la caméra principale et frontale. Cette dernière de 40 MP Dual Pixel, intègre la technologie HDR10+, offre de nombreuses possibilités pour des portraits de qualité studio.Le Samsung Galaxy S22 Ultra vous assure une sécurité sans faille en s\'appuyant sur la reconnaissance faciale ainsi qu\'un lecteur d\'empreinte ultrasonique qui se situe sous l\'écran. Ce dernier, ultrasonique, fonctionne dans toutes les conditions de luminosité, mais également en condition de froid et d\'humidité et dispose d\'une meilleure sécurité. Le Samsung Galaxy S22 Ultra est également équipé d\'une batterie intelligente de 5000 mAh qui apprend de votre usage pour optimiser les performances.\r\n\r\nPlus performant que jamais, le Galaxy S22 Ultra intègre un WiFi plus performant grâce à sa compatibilité avec la nouvelle génération de WiFi 6E afin de vous fournir une vitesse supérieure par rapport à l\'ancienne génération.', 1160, 'Galaxy S22 Ultra', 'Android', 258, '5G', 1, 50, 6.1, 2, 3),
(41, 1, '/FoneMarket/media/produit/samsungS22plus_noir.jpg', 'Le Samsung Galaxy S22+ est équipé d\'un écran Infinity-O Dynamic AMOLED de 6.6\" à résolution Full HD+ 1080 x 2340 pixels, qui sublime la richesse des images tout en vous offrant une immersion spectaculaire. Et avec un taux de rafraichissement adaptatif de 120 Hz, utiliser son smartphone n\'aura jamais été aussi agréable. Par ailleurs, le S22+ intègre un processeur Exynos 2200 Octo-Core cadencé à 2.9 GHz, 8 Go de RAM et 256 Go de capacité afin de vous offrir toute la puissance nécessaire pour profiter au mieux de votre smartphone, même les jeux les plus exigeants en ressources graphiques fonctionnent de manière ultra fluide.\r\n\r\nDual SIM, le Samsung Galaxy S22+ vous permet de gérer efficacement votre vie professionnelle et votre vie personnelle de la meilleure des façons.Prenez des photos très détaillées grâce au Samsung Galaxy S22+ et à son triple capteur photo de 50+12+10 MP. Il intègre notamment un optimiseur de scènes, une reconnaissance automatique de l\'image et un cadrage professionnel intelligent pour vous proposer le meilleur paramétrage et cadrage pour mettre grandement en valeur vos photos. Quant au mode Nuit avancé, vous pouvez prendre encore plus de photos impressionnantes, même la nuit.\r\n\r\nDe plus, réalisez des vidéos à couper le souffle grâce à la possibilité de filmer en 8K 24 fps via la caméra principale ou en 4K 60 fps via la caméra principale et frontale. Cette dernière de 10 MP Dual Pixel, intègre la technologie HDR10+, offre de nombreuses possibilités pour des portraits de qualité studio.Le Samsung Galaxy S22+ vous assure une sécurité sans faille en s\'appuyant sur la reconnaissance faciale ainsi qu\'un lecteur d\'empreinte ultrasonique qui se situe sous l\'écran. Ce dernier, ultrasonique, fonctionne dans toutes les conditions de luminosité, mais également en condition de froid et d\'humidité et dispose d\'une meilleure sécurité. Le Samsung Galaxy S22+ est également équipé d\'une batterie intelligente de 4500 mAh qui apprend de votre usage pour optimiser les performances.\r\n\r\nPlus performant que jamais, le Galaxy S22+ intègre un WiFi plus performant grâce à sa compatibilité avec la nouvelle génération de WiFi 6E afin de vous fournir une vitesse supérieure par rapport à l\'ancienne génération', 1250, 'Galaxy S22 Plus', 'Android', 258, '5G', 1, 50, 6.1, 2, 2),
(42, 1, '/FoneMarket/media/produit/samsungs22_blanc.jpg', 'Le Samsung Galaxy S22 est équipé d\'un écran Infinity-O Dynamic AMOLED de 6.1\" à résolution Full HD+ 1080 x 2340 pixels, qui sublime la richesse des images tout en vous offrant une immersion spectaculaire. Et avec un taux de rafraichissement adaptatif de 120 Hz, utiliser son smartphone n\'aura jamais été aussi agréable. Par ailleurs, le S22 intègre un processeur Exynos 2200 Octo-Core cadencé à 2.9 GHz, 8 Go de RAM et 128 Go de capacité afin de vous offrir toute la puissance nécessaire pour profiter au mieux de votre smartphone, même les jeux les plus exigeants en ressources graphiques fonctionnent de manière ultra fluide.\r\n\r\nDual SIM, le Samsung Galaxy S22 vous permet de gérer efficacement votre vie professionnelle et votre vie personnelle de la meilleure des façons.\r\nPrenez des photos très détaillées grâce au Samsung Galaxy S22+ et à son triple capteur photo de 50+12+10 MP. Il intègre notamment un optimiseur de scènes, une reconnaissance automatique de l\'image et un cadrage professionnel intelligent pour vous proposer le meilleur paramétrage et cadrage pour mettre grandement en valeur vos photos. Quant au mode Nuit avancé, vous pouvez prendre encore plus de photos impressionnantes, même la nuit.\r\n\r\nDe plus, réalisez des vidéos à couper le souffle grâce à la possibilité de filmer en 8K 24 fps via la caméra principale ou en 4K 60 fps via la caméra principale et frontale. Cette dernière de 10 MP Dual Pixel, intègre la technologie HDR10+, offre de nombreuses possibilités pour des portraits de qualité studio.Le Samsung Galaxy S22 vous assure une sécurité sans faille en s\'appuyant sur la reconnaissance faciale ainsi qu\'un lecteur d\'empreinte ultrasonique qui se situe sous l\'écran. Ce dernier, ultrasonique, fonctionne dans toutes les conditions de luminosité, mais également en condition de froid et d\'humidité et dispose d\'une meilleure sécurité. Le Samsung Galaxy S22 est également équipé d\'une batterie intelligente de 3700 mAh qui apprend de votre usage pour optimiser les performances.', 1000, 'Galaxy S22', 'Android', 258, '5G', 1, 50, 6.1, 2, 3),
(43, 1, '/FoneMarket/media/produit/xiaomi-12-5-G_noir.jpg', 'Avec un taux de rafraîchissement de 120 Hz et un taux d\'échantillonnage tactile jusqu\'à 480 Hz, l\'écran AMOLED de 6.28\" à résolution Full HD+ de 1080 x 2400 pixels du Xiaomi 12 5G offre une expérience fluide et agréable. En outre, il est capable d\'afficher plus de 68 milliards de couleurs et offre une calibration de professionnel avec TrueColor.\r\n\r\nCompatible Dolby Vision et HDR10+, vous profitez d’images éclatantes renforcées par une luminosité incroyable et un contraste et des couleurs riches en détails. Tout cela en étant certifié faible lumière bleue.Le Xiaomi 12 5G est un smartphone parfait pour tous les usages. En effet, il embarque un processeur Qualcomm Snapdragon 8 Gen 1 Octo-Core cadencé à 3.0 GHz ainsi que 8 Go de mémoire vive pour que vous puissiez profiter pleinement de vos divertissements dans les meilleures conditions. De plus, il bénéficie de 256 Go de mémoire interne, vous n\'aurez jamais à vous soucier du manque de place sur votre téléphone. Le Xiaomi 12 5G est également muni d’un imposant système de refroidissement qui comprend une chambre de condensation extra-large de 2 600mm² et 3 feuilles de graphite pour dissiper la chaleur et assurer des performances fluides et stables.\r\n\r\nEnfin, grâce à la batterie ultra haute capacité de 4500 mAh et de la compatibilité charge rapide 67W en filaire et 50W sans fil, vous êtes libéré du stress de la batterie vide.Le Xiaomi 12 5G est pourvu d’une caméra professionnelle de 50MP, d’un capteur ultra grand angle de 13MP et d’un télémacro de 5MP. Pour parfaire cette configuration, il est aussi doté de la toute dernière IA de Xiaomi donnant accès à tous les outils créatifs, de prise de vue et de retouche professionnels, pour permettre des réalisations cinématographiques dignes des pros. Ces outils incluent le One-click AI cinema et le tout nouveau Xiaomi ProFocus. De plus, le mode Ultra Night Video excelle dans les prises de vue en condition de très basse luminosité et les différents modes portrait permettent de capturer des clichés de qualité studio.\r\n\r\nCôté selfie, retrouvez une caméra avant de 32 MP pour des images incroyables.', 900, 'Xiaomi', 'Android', 256, '5G', 1, 50, 6.28, 3, 2),
(44, 1, '/FoneMarket/media/produit/xiaomi-12-5-G-bleu.jpg', 'Avec un taux de rafraîchissement de 120 Hz et un taux d\'échantillonnage tactile jusqu\'à 480 Hz, l\'écran AMOLED de 6.28\" à résolution Full HD+ de 1080 x 2400 pixels du Xiaomi 12 5G offre une expérience fluide et agréable. En outre, il est capable d\'afficher plus de 68 milliards de couleurs et offre une calibration de professionnel avec TrueColor.\r\n\r\nCompatible Dolby Vision et HDR10+, vous profitez d’images éclatantes renforcées par une luminosité incroyable et un contraste et des couleurs riches en détails. Tout cela en étant certifié faible lumière bleue.Le Xiaomi 12 5G est un smartphone parfait pour tous les usages. En effet, il embarque un processeur Qualcomm Snapdragon 8 Gen 1 Octo-Core cadencé à 3.0 GHz ainsi que 8 Go de mémoire vive pour que vous puissiez profiter pleinement de vos divertissements dans les meilleures conditions. De plus, il bénéficie de 256 Go de mémoire interne, vous n\'aurez jamais à vous soucier du manque de place sur votre téléphone. Le Xiaomi 12 5G est également muni d’un imposant système de refroidissement qui comprend une chambre de condensation extra-large de 2 600mm² et 3 feuilles de graphite pour dissiper la chaleur et assurer des performances fluides et stables.\r\n\r\nEnfin, grâce à la batterie ultra haute capacité de 4500 mAh et de la compatibilité charge rapide 67W en filaire et 50W sans fil, vous êtes libéré du stress de la batterie vide.Le Xiaomi 12 5G est pourvu d’une caméra professionnelle de 50MP, d’un capteur ultra grand angle de 13MP et d’un télémacro de 5MP. Pour parfaire cette configuration, il est aussi doté de la toute dernière IA de Xiaomi donnant accès à tous les outils créatifs, de prise de vue et de retouche professionnels, pour permettre des réalisations cinématographiques dignes des pros. Ces outils incluent le One-click AI cinema et le tout nouveau Xiaomi ProFocus. De plus, le mode Ultra Night Video excelle dans les prises de vue en condition de très basse luminosité et les différents modes portrait permettent de capturer des clichés de qualité studio.\r\n\r\nCôté selfie, retrouvez une caméra avant de 32 MP pour des images incroyables.', 900, 'Xiaomi', 'Android', 256, '5G', 1, 50, 6.28, 3, 5),
(45, 1, '/FoneMarket/media/produit/xiaomi-12-5-G-rose.jpg', 'Avec un taux de rafraîchissement de 120 Hz et un taux d\'échantillonnage tactile jusqu\'à 480 Hz, l\'écran AMOLED de 6.28\" à résolution Full HD+ de 1080 x 2400 pixels du Xiaomi 12 5G offre une expérience fluide et agréable. En outre, il est capable d\'afficher plus de 68 milliards de couleurs et offre une calibration de professionnel avec TrueColor.\r\n\r\nCompatible Dolby Vision et HDR10+, vous profitez d’images éclatantes renforcées par une luminosité incroyable et un contraste et des couleurs riches en détails. Tout cela en étant certifié faible lumière bleue.Le Xiaomi 12 5G est un smartphone parfait pour tous les usages. En effet, il embarque un processeur Qualcomm Snapdragon 8 Gen 1 Octo-Core cadencé à 3.0 GHz ainsi que 8 Go de mémoire vive pour que vous puissiez profiter pleinement de vos divertissements dans les meilleures conditions. De plus, il bénéficie de 256 Go de mémoire interne, vous n\'aurez jamais à vous soucier du manque de place sur votre téléphone. Le Xiaomi 12 5G est également muni d’un imposant système de refroidissement qui comprend une chambre de condensation extra-large de 2 600mm² et 3 feuilles de graphite pour dissiper la chaleur et assurer des performances fluides et stables.\r\n\r\nEnfin, grâce à la batterie ultra haute capacité de 4500 mAh et de la compatibilité charge rapide 67W en filaire et 50W sans fil, vous êtes libéré du stress de la batterie vide.Le Xiaomi 12 5G est pourvu d’une caméra professionnelle de 50MP, d’un capteur ultra grand angle de 13MP et d’un télémacro de 5MP. Pour parfaire cette configuration, il est aussi doté de la toute dernière IA de Xiaomi donnant accès à tous les outils créatifs, de prise de vue et de retouche professionnels, pour permettre des réalisations cinématographiques dignes des pros. Ces outils incluent le One-click AI cinema et le tout nouveau Xiaomi ProFocus. De plus, le mode Ultra Night Video excelle dans les prises de vue en condition de très basse luminosité et les différents modes portrait permettent de capturer des clichés de qualité studio.\r\n\r\nCôté selfie, retrouvez une caméra avant de 32 MP pour des images incroyables.', 900, 'Xiaomi', 'Android', 256, '5G', 1, 50, 6.28, 3, 7),
(46, 1, '/FoneMarket/media/produit/HuaweiP30_noir.jpg', 'Profitez pleinement de vos vidéos avec des couleurs vives et des contrastes saisissants grâce à l\'incroyable écran FullView OLED de 6.1\" du Huawei P30. Avec une résolution Full HD+ de 1080 x 2340 pixels, naviguez sur le net ou regardez vos photos avec un confort exceptionnel, le tout en conservant un rendu et un respect des couleurs impressionnants.\r\n \r\nLe superbe écran du Huawei P30 donne littéralement vie à vos photos et vos vidéos.Propulsé par le processeur Kirin 980 Octo-Core cadencé à 2.6 GHz, le Huawei P30 possède des performances accrues pour répondre à tous vos besoins. Appréciez ses 8 coeurs, sa rapidité d\'exécution et son efficacité appuyée par un NPU dédié. L\'intelligence artificielle optimisera aussi vos moments de jeux en y allouant toutes les ressources disponibles. Son processeur vous assure une expérience de navigation fluide, immersive avec une excellente autonomie.\r\n\r\nCe modèle embarque également 6 Go de RAM et 128 Go d\'espace de stockage (extensible jusqu\'à 256 Go via carte microSDXC) pour une utilisation idéale.Avec Android 9.0 Pie, vous disposez d\'un design revu en profondeur où les transitions animées sont plus fluides mais aussi les notifications. Android 9.0 Pie intègre également la navigation par gestes, un menu multi-tâches plus moderne et esthétique, un mode Picture-in-Picture amélioré ainsi que 157 nouveaux Emojis.\r\n\r\nCôté sécurité, Android 9.0 Pie n\'est pas en reste puisque cette version d\'Android interdit notamment l\'accès au micro et à la caméra à votre insu. Alors que le motif de déverrouillage ne montre plus tout le chemin parcouru par vos doigts. Il vous sera également possible de changer pour un mode sombre afin de donner un look plus ténébreux à votre smartphone.', 220, 'Huawei', 'Android', 128, '4G', 1, 40, 6.1, 4, 2),
(47, 1, '/FoneMarket/media/produit/huaweiP30_bleu.jpg', 'Profitez pleinement de vos vidéos avec des couleurs vives et des contrastes saisissants grâce à l\'incroyable écran FullView OLED de 6.1\" du Huawei P30. Avec une résolution Full HD+ de 1080 x 2340 pixels, naviguez sur le net ou regardez vos photos avec un confort exceptionnel, le tout en conservant un rendu et un respect des couleurs impressionnants.\r\n \r\nLe superbe écran du Huawei P30 donne littéralement vie à vos photos et vos vidéos.Propulsé par le processeur Kirin 980 Octo-Core cadencé à 2.6 GHz, le Huawei P30 possède des performances accrues pour répondre à tous vos besoins. Appréciez ses 8 coeurs, sa rapidité d\'exécution et son efficacité appuyée par un NPU dédié. L\'intelligence artificielle optimisera aussi vos moments de jeux en y allouant toutes les ressources disponibles. Son processeur vous assure une expérience de navigation fluide, immersive avec une excellente autonomie.\r\n\r\nCe modèle embarque également 6 Go de RAM et 128 Go d\'espace de stockage (extensible jusqu\'à 256 Go via carte microSDXC) pour une utilisation idéale.Conçue avec Leica, la triple caméra de 40MP f/1.8 + 16MP f/2.2 + 8MP f/2.4 du Huawei P30, ainsi que ses flous artistiques ajouteront un côté unique à vos clichés. De plus, l\'intelligence artificielle et sa reconnaissance de scènes et d\'objets automatique optimiseront vos photographies pour un rendu professionnel. Avec des modes grand-angle et macro, vous pourrez immortaliser tous vos moments avec une facilité déconcertante et un rendu incroyable.\r\n\r\nQuant à la caméra avant de 32 MP f/2.0, elle vous sera très utile pour vous mettre en valeur lors de vos selfies.', 220, 'Huawei', 'Android', 128, '4G', 1, 40, 6.1, 4, 5);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID_UTILISATEUR` int(11) NOT NULL AUTO_INCREMENT,
  `PRENOM` varchar(50) NOT NULL,
  `NOM` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `DATE_BIRTH` date NOT NULL,
  `MDP` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_UTILISATEUR`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID_UTILISATEUR`, `PRENOM`, `NOM`, `EMAIL`, `DATE_BIRTH`, `MDP`) VALUES
(16, 'Administrateur', 'Administrateur', 'admin@fonemarket.fr', '2022-05-12', '$2y$10$I6/3TvkEt6oZtT4NIGA7GeUURqWrCY4Pw0dXdMd1568aTMhhN5dX6'),
(17, 'Alex', 'SAM-YIN-YANG', 'alex.sam-yin-yang@insta.fr', '2022-05-07', '$2y$10$TFaRsoD/uRoDRskZk0nJ4eFtjfTcWE.immaR/BYOV1lOLvIcbOSxa'),
(18, 'Yvan', 'DUPONT', 'yvan@gmail.com', '1986-09-29', '$2y$10$aJWgo9ExFGIXJ0JlQPDXGO48J1aKl3IF/z48ZQw9nRtDiVElLHz8i'),
(20, 'Cyrik', 'CHEN', 'cyrik.chen@gmail.com', '2001-02-08', '$2y$10$XD/Sl2aG99yL7r.bg1MNsu6mx0pnv7xTXbse4p6uE4GM4wUDPcGni'),
(21, 'Killian', 'ANGELY', 'killian.angely@outlook.fr', '2002-08-17', '$2y$10$BT28qPeNe4og3H7JM2CMA.Q8qUTcHEj32RFvwWSCWQfUwp2Lzp.mu'),
(22, 'user', 'USER', 'user@fonemarket.fr', '1998-07-17', '$2y$10$KrshmTsMc1netwu7lIEKIeK9WdA0N8kXMjH4ESauBVIxLj.1valuG'),
(23, 'test', 'test', 'test@fonemarket.fr', '2002-06-05', '$2y$10$9xzM6RWx5CawszueFYJvxO/XGYZVCdlidYDPQUuaYQ7NSQsuS8wFu'),
(25, 'Alex', 'SAM-YIN-YANG', 'alexsyypro@outlook.fr', '1987-06-10', '$2y$10$IYeC9QLgQ67OmhyjrqwlA.CyrkJSmp7KHd0UPcuWFsx4wuEWd1cTe');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `detail_commande`
--
ALTER TABLE `detail_commande`
  ADD CONSTRAINT `detail_commande_ibfk_1` FOREIGN KEY (`ID_Article`) REFERENCES `smartphone` (`ID`);

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`ID_UTILISATEUR`) REFERENCES `utilisateur` (`ID_UTILISATEUR`),
  ADD CONSTRAINT `panier_ibfk_2` FOREIGN KEY (`ID_PRODUIT`) REFERENCES `smartphone` (`ID`);

--
-- Contraintes pour la table `smartphone`
--
ALTER TABLE `smartphone`
  ADD CONSTRAINT `SMARTPHONE_COULEUR0_FK` FOREIGN KEY (`ID_COULEUR`) REFERENCES `couleur` (`ID_COULEUR`),
  ADD CONSTRAINT `SMARTPHONE_MARQUE_FK` FOREIGN KEY (`ID_MARQUE`) REFERENCES `marque` (`ID_MARQUE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
