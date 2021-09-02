-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2020 at 08:38 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `site-e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `idc` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(30) NOT NULL,
  PRIMARY KEY (`idc`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`idc`, `categorie`) VALUES
(1, 'tricot'),
(2, 'chapeau'),
(3, 'djellaba'),
(4, 'babouche'),
(5, 'bonnet'),
(6, 'montre'),
(7, 'pantalon'),
(8, 't-shirt');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `idcomm` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(10) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `adresse` text NOT NULL,
  `produit` varchar(255) NOT NULL,
  `quantite` int(11) NOT NULL,
  `frais_de_port` float NOT NULL,
  `total` float NOT NULL,
  `datec` date NOT NULL,
  PRIMARY KEY (`idcomm`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`idcomm`, `pseudo`, `nom`, `adresse`, `produit`, `quantite`, `frais_de_port`, `total`, `datec`) VALUES
(4, 'ami1998', 'amine kasismi', 'Boulvard Hassan 2  Rue assalam  N 56  Errachidia ', 'prod7, prod2, ', 1, 20, 253, '2019-07-06'),
(5, 'ami1998', 'amine kasismi', 'Boulvard Hassan 2  Rue assalam  N 56  Errachidia ', 'prod7, prod2, ', 1, 20, 253, '2019-07-06'),
(6, 'ami1998', 'amine kasismi', 'Boulvard Hassan 2  Rue assalam  N 56  Errachidia ', 'prod7, prod2, ', 1, 20, 253, '2019-07-06'),
(7, 'ami1998', 'amine kasismi', 'Boulvard Hassan 2  Rue assalam  N 56  Errachidia ', 'prod7, prod2, ', 1, 20, 253, '2019-07-06');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `idm` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`idm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `productsh`
--

CREATE TABLE IF NOT EXISTS `productsh` (
  `id` int(10) NOT NULL,
  `titre` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `categorie` varchar(30) NOT NULL,
  `prix` float NOT NULL,
  `TVA` int(11) NOT NULL,
  `genre` varchar(30) NOT NULL,
  `weight` int(255) NOT NULL,
  `shipping` int(11) NOT NULL,
  `prix_final` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productsh`
--

INSERT INTO `productsh` (`id`, `titre`, `description`, `categorie`, `prix`, `TVA`, `genre`, `weight`, `shipping`, `prix_final`, `stock`) VALUES
(2, 'prod2', 'jscbuofbyhuvbouzulbcuoebub', 'tricot', 150, 10, 'enfant', 100, 10, 176, 50),
(7, 'prod7', 'nzeufboazbxuyaoulbuehoubuoezbhufbhoebuhbouboueabfuuzf', 't-shirt', 80, 10, 'homme', 100, 10, 99, 50),
(1, 'prod1', 'jkruozbfbubnezbfoubnuofzennbnbzrfuonbzenbujzebvoz', 'bonnet', 50, 10, 'enfant', 100, 10, 66, 50),
(3, 'prod3', 'heuzfyizboudbaiyfbzueonpfmnpaubufapni', 't-shirt', 100, 10, 'enfant', 100, 10, 121, 50),
(4, 'prod4', 'jebfubzuocbuobieboucbaoubuouaebueboiab', 'montre', 60, 10, 'enfant', 100, 10, 77, 50),
(5, 'prod5', 'dksnvjqbupcoaheoboupeibiuqhbuvhirpvnzsvbpvs', 'chapeau', 60, 10, 'enfant', 100, 10, 77, 50),
(6, 'prod6', 'Pantalon rouge  /                                       \r\n \r\nMarque: la toile /                                   \r\n\r\nFabrique par :StyleFashion  /                          \r\n\r\nPaye:Maroc  /                                          \r\n                                                    \r\nlongueur:0.5 m  /                                      \r\n\r\nlargeur:0.2 m                         \r\n', 'pantalon', 150, 10, 'enfant', 100, 10, 176, 50);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `pseudo` varchar(10) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(11) NOT NULL,
  `adresse` text NOT NULL,
  PRIMARY KEY (`pseudo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`pseudo`, `nom`, `email`, `password`, `adresse`) VALUES
('ami1998', 'amine kasismi', 'MonEmail@gmail.com', '123456789', 'Boulvard Hassan 2  Rue assalam  N 56  Errachidia ');

-- --------------------------------------------------------

--
-- Table structure for table `weights`
--

CREATE TABLE IF NOT EXISTS `weights` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `weight` int(255) NOT NULL,
  `shipping` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `weights`
--

INSERT INTO `weights` (`id`, `weight`, `shipping`) VALUES
(8, 200, 20),
(6, 100, 10),
(10, 300, 30),
(13, 1000, 100);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
