-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 11 mai 2023 à 18:29
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdd_sae`
--

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

CREATE TABLE `materiel` (
  `reference` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `materiel`
--

INSERT INTO `materiel` (`reference`, `nom`, `type`, `description`) VALUES
('ABCDEF', 'caméra_hd_24', 'camera', 'Ceci est une caméra'),
('rubenlebtp', 'brique pt', 'light', 'la brique pt'),
('thomas', 'Henry', 'camera', 'Thomas est une caméra\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `email` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `autorisation` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birth` date NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`email`, `first_name`, `last_name`, `password`, `birth`, `admin`) VALUES
('jerome.fabre77@gmail.com', 'Jérôme', 'Fabre', 'a46104d5a0ebe0e22751012f24a3399e8a3ff1c6bbf5c8835d0673990cd464a4', '2004-11-07', 1),
('rurularue@gmail.com', 'Ruben', 'De abreu', '5f4228da604ee492b53c8694e849ad78ff9628e761beb2c5ab80e2455cb6bc65', '2004-12-04', 1),
('test@gmail.com', 'Test', 'Test', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', '2004-11-07', 0),
('thomas.henry@gmail.com', 'Thomas', 'Henry', 'a46104d5a0ebe0e22751012f24a3399e8a3ff1c6bbf5c8835d0673990cd464a4', '2004-11-07', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `materiel`
--
ALTER TABLE `materiel`
  ADD PRIMARY KEY (`reference`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD KEY `email` (`email`),
  ADD KEY `reference` (`reference`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`reference`) REFERENCES `materiel` (`reference`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
