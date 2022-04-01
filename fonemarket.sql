-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 17 mars 2022 à 13:26
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

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

-- --------------------------------------------------------

--
-- Structure de la table `couleur`
--

DROP TABLE IF EXISTS `couleur`;
CREATE TABLE IF NOT EXISTS `couleur` (
  `ID_COULEUR` int(11) NOT NULL AUTO_INCREMENT,
  `COULEUR` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_COULEUR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

DROP TABLE IF EXISTS `marque`;
CREATE TABLE IF NOT EXISTS `marque` (
  `ID_MARQUE` int(11) NOT NULL AUTO_INCREMENT,
  `MARQUE` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_MARQUE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `ID` int(11) NOT NULL,
  `ID_UTILISATEUR` int(11) NOT NULL,
  `QUANTITE` int(11) NOT NULL,
  PRIMARY KEY (`ID`,`ID_UTILISATEUR`),
  KEY `PANIER_UTILISATEUR0_FK` (`ID_UTILISATEUR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `smartphone`
--

DROP TABLE IF EXISTS `smartphone`;
CREATE TABLE IF NOT EXISTS `smartphone` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPTION` text NOT NULL,
  `PRIX` decimal(15,3) NOT NULL,
  `NOM` varchar(50) NOT NULL,
  `SYSTEME_D_EXPLOITATION` varchar(50) NOT NULL,
  `STOCKAGE` int(11) NOT NULL,
  `RESEAU` int(11) NOT NULL,
  `DOUBLE_SIM` tinyint(1) NOT NULL,
  `APP_PHOTO` float NOT NULL,
  `TAILLE_ECRAN` float NOT NULL,
  `ID_MARQUE` int(11) NOT NULL,
  `ID_COULEUR` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `SMARTPHONE_MARQUE_FK` (`ID_MARQUE`),
  KEY `SMARTPHONE_COULEUR0_FK` (`ID_COULEUR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID_UTILISATEUR` int(11) NOT NULL AUTO_INCREMENT,
  `ROLE` varchar(50) NOT NULL,
  `PRENOM` varchar(50) NOT NULL,
  `NOM` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `DATE_BIRTH` date NOT NULL,
  `MDP` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_UTILISATEUR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `PANIER_SMARTPHONE_FK` FOREIGN KEY (`ID`) REFERENCES `smartphone` (`ID`),
  ADD CONSTRAINT `PANIER_UTILISATEUR0_FK` FOREIGN KEY (`ID_UTILISATEUR`) REFERENCES `utilisateur` (`ID_UTILISATEUR`);

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
