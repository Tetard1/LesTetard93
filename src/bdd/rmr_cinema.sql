-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 14 fév. 2025 à 10:43
-- Version du serveur : 5.7.36
-- Version de PHP : 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `rmr_cinema`
--

-- --------------------------------------------------------

--
-- Structure de la table `films`
--

CREATE TABLE `films` (
  `id_films` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `description` varchar(999) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `duree` varchar(11) NOT NULL,
  `affiche` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `films`
--

INSERT INTO `films` (`id_films`, `titre`, `description`, `genre`, `duree`, `affiche`) VALUES
(1, 'L’épée de vérité Tome 1', 'test', 'test', '1.02.14', '');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id_reservation` int(11) NOT NULL,
  `nb_place_reserver` varchar(50) NOT NULL,
  `ref_seance` int(11) NOT NULL,
  `ref_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `id_salle` int(11) NOT NULL,
  `nom_salle` varchar(50) NOT NULL,
  `place_totale` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`id_salle`, `nom_salle`, `place_totale`) VALUES
(4, 'Emeraude', 50),
(5, 'Ruby', 50),
(8, 'tetard2', 50),
(9, 'z', 1);

-- --------------------------------------------------------

--
-- Structure de la table `seance`
--

CREATE TABLE `seance` (
  `id_seance` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure` time(6) NOT NULL,
  `nb_place_dispo` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `ref_films` int(11) NOT NULL,
  `ref_salle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `seance`
--

INSERT INTO `seance` (`id_seance`, `date`, `heure`, `nb_place_dispo`, `prix`, `ref_films`, `ref_salle`) VALUES
(1, '2025-02-15', '12:45:00.000000', 50, 3, 1, 5),
(2, '2022-03-03', '12:56:00.000000', 50, 345, 1, 8),
(3, '4222-05-09', '22:22:00.000000', 1, 3, 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL,
  `role` varchar(11) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `mdp`, `email`, `role`) VALUES
(1, 'Metayer', 'Ruth', 'Ruth12345', 'R.Metayer@lprs.fr', 'admin'),
(2, 'langui', 'thomas', 'thomas', 't.langui@lprs.fr', 'admin'),
(5, 'linguini', 'thomas', '$2y$10$R9spANX1SU3CLHy4J6Qn9uxir6zA/gOqij0XHKTAu.3lTedwAdVWG', 'thomas@puce.com', 'user'),
(6, 'paul', 'paul', '$2y$10$fSclFBPCPBlvRX3IbVMMuOeF7LsEMA9APt1plVmTiTO7pt7Jzy.de', 'paul@paul.fr', 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id_films`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `fk_reservation_seance` (`ref_seance`),
  ADD KEY `fr_reservation_utilisateur` (`ref_utilisateur`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id_salle`);

--
-- Index pour la table `seance`
--
ALTER TABLE `seance`
  ADD PRIMARY KEY (`id_seance`),
  ADD KEY `fk_seance_films` (`ref_films`),
  ADD KEY `fk_seance_salle` (`ref_salle`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `films`
--
ALTER TABLE `films`
  MODIFY `id_films` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `id_salle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `seance`
--
ALTER TABLE `seance`
  MODIFY `id_seance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
