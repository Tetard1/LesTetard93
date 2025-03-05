-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 05, 2025 at 07:47 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rmr_cinema`
--

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

DROP TABLE IF EXISTS `films`;
CREATE TABLE IF NOT EXISTS `films` (
  `id_films` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `description` varchar(999) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `durée` int NOT NULL,
  `affiche` text NOT NULL,
  PRIMARY KEY (`id_films`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id_films`, `titre`, `description`, `genre`, `durée`, `affiche`) VALUES
(52, 'Star Wars', 'Star Wars raconte la lutte entre le bien et le mal dans une galaxie lointaine. Luke Skywalker, un jeune fermier, découvre son destin de Jedi en affrontant l\'Empire dirigé par Dark Vador. Aidé par Obi-Wan Kenobi, la princesse Leia, Han Solo et Chewbacca, il rejoint la Rébellion pour détruire l’Étoile de la Mort et rétablir la paix. La Force, un pouvoir mystique, guide son aventure.', 'Action', 543, 'https://www.onrembobine.fr/wp-content/uploads/2016/12/Star-Wars-Darth-Vader-Dark-Vador-1200x1798.jpg'),
(53, 'Avengers', 'Avengers suit un groupe de super-héros, dont Iron Man, Captain America, Thor, Hulk, Black Widow et Hawkeye, réunis par Nick Fury pour affronter Loki, qui menace la Terre avec une armée extraterrestre. Malgré leurs différences, ils unissent leurs forces pour protéger l’humanité et empêcher l’invasion. Ce film marque le début d’une alliance légendaire contre de puissantes menaces.', 'Science-fiction', 345, 'https://fr.web.img3.acsta.net/medias/nmedia/18/85/31/58/20042068.jpg'),
(54, 'Barbie', 'Barbie, une jeune exploratrice passionnée, découvre une île cachée remplie de merveilles et de secrets oubliés. Accompagnée de son fidèle ami Max, un aventurier intrépide et rusé, elle se lance dans une quête pour retrouver un trésor légendaire censé protéger l\'équilibre de la nature. Entre énigmes anciennes, créatures magiques et pièges mystérieux, Barbie et Max devront unir leurs forces pour surmonter les défis et sauver l’île d’une menace grandissante. Une aventure palpitante mêlant courage, amitié et magie !', 'Action', 127, 'https://www.modalova.fr/zine/wp-content/uploads/2023/07/robe-rose-vichy-barbie.jpg'),
(57, 'Charlie et la chocolaterie', 'Charlie et la Chocolaterie suit Charlie Bucket, un garçon pauvre qui gagne un billet d\'or pour visiter la fabrique de chocolat magique de Willy Wonka. Avec quatre autres enfants gâtés, il découvre un monde fantastique rempli d’inventions sucrées et de surprises. Chaque enfant subit les conséquences de ses défauts, tandis que Charlie, humble et gentil, prouve qu’il mérite une récompense exceptionnelle.', 'Aventure', 114, 'https://media.vogue.fr/photos/602fd329217f50801ab16cff/2:3/w_2560%2Cc_limit/076_Charlie_et_la_chocolaterie_08.jpg'),
(58, 'La reine des neiges', 'La Reine des Neiges suit Anna, une jeune princesse courageuse, qui part en quête pour retrouver sa sœur Elsa, dont les pouvoirs glacés ont plongé le royaume d’Arendelle dans un hiver éternel. Accompagnée de Kristoff, Sven et Olaf, elle affronte de nombreux défis. Anna découvre que seul un acte d’amour véritable peut briser la malédiction et réconcilier les deux sœurs.', 'Aventure', 135, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQEzwkBb1Qez2QPQGPBgVVSzmlBgpJY_rPx8w&s');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
