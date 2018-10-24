-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 24 Octobre 2018 à 13:12
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `gestionecole`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `login` varchar(50) NOT NULL,
  `mdp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`login`, `mdp`) VALUES
('admin', '123');

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE IF NOT EXISTS `classe` (
  `id_classe` int(11) NOT NULL AUTO_INCREMENT,
  `nomClasse` varchar(100) NOT NULL,
  PRIMARY KEY (`id_classe`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `classe`
--

INSERT INTO `classe` (`id_classe`, `nomClasse`) VALUES
(3, 'Terminale S2'),
(4, 'PrÃ©miÃ¨re S1'),
(5, 'PrÃ©miÃ¨re G'),
(6, 'Terminale L1'),
(7, 'Terminale L2');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id_eleve` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(150) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `classe` varchar(100) NOT NULL,
  `status_eleve` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  PRIMARY KEY (`id_eleve`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id_eleve`, `nom`, `prenom`, `telephone`, `adresse`, `email`, `classe`, `status_eleve`) VALUES
(71, 'Diallo', 'mariama', '775486932', 'Dakar', 'maria@gmail.com', 'Terminale G', 'Inscrit'),
(72, 'Djigo', 'Mamadou', '775896321', 'Louga', 'djigo@edacy.com', 'Terminale S1', 'Inscrit'),
(73, 'SÃ¨ne', 'Ndiate', '772561247', 'Dakar', 'ndite@gmail.com', 'Terminale S2', 'Inscrit');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
