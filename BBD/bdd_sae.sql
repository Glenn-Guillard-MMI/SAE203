-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 30 mai 2023 à 07:43
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
('BENRO', 'TRÉPIED BENRO SLIM ALUMINIUM avec support smartphone et tablette', 'Trépied', 'Idéal pour la fixation de la caméra 360° ou d&amp;amp;amp;amp;#039;un smartphone/tablette.\r\n\r\n\r\nCharge maximale : 4 kg\r\n\r\nCorps de trépied en magnésium avec 3 positions de réglage \r\n\r\nHauteur max (24°) avec colonne dépliée : 57.6 cm\r\n\r\nHauteur max (24°) avec colonne repliée : 48.4 cm\r\n\r\nHauteur min : 15.7 cm\r\n\r\nHauteur max : 57.6 cm\r\n\r\nTaille replié : 20.1 cm\r\n\r\nSystème de verrouillage : bague à vis\r\n\r\nTête rotule amovible \r\n\r\nPlateau rapide en aluminium anodisé \r\n\r\nDiamètre colonne centrale : 20 mm\r\n\r\nNiveau à bulle \r\n\r\nAvec housse de transport\r\n\r\nPoids : 2.6 kg'),
('DELL_1', 'Les PC de gaming Del', 'Caméra', 'Disque dur:            1To SSD M2 NVME \r\n\r\nRAM:                      64 Go DDR4\r\n\r\nCarte Graphique:    Nvidia Quadro RTX 4000 8Go\r\n\r\nProcesseur:            Intel Xeon Silver 4210'),
('HYPERX_1', 'Microphone de gaming HYPERX QUADCAST à quatre diagrammes polaires', 'Micro', 'Pour enregistrer des sons lors du développement de jeux vidéos.\r\n\r\n\r\nSélection entre quatre diagrammes polaires\r\n\r\nPied amortisseur contre les vibrations\r\n\r\nCapteur de fonction mute par pression et témoin LED\r\n\r\nMolette de réglage du contrôle de gain pratique\r\n\r\nFiltre anti-pop interne\r\n\r\nPrise casque intégrée\r\n\r\nCompatibilité multi-dispositif et chat\r\n\r\nContient un adaptateur de pied'),
('Oculus_1', 'Les casques Oculus Quest ', 'Casque', 'Casque de réalité virtuelle tout-en-un, utilisable avec ou sans fil.\r\n\r\nStockage:              256 Go\r\n\r\nRAM:                     6 Go\r\n\r\nProcesseur:           Qualcomm Snapdragon XR2\r\n\r\nécran LCD :           Résolution de 1832 x 1920 pixels par oeil\r\n\r\nHaut-parleurs:       intégrés pour une immersion à 360°\r\n\r\nAngle de vision:    120° (horizontal)\r\n\r\n\r\nChaque casque est accompagné de:\r\n\r\n2 manettes Touch\r\n\r\nCâble de chargement\r\n\r\nAdaptateur secteur\r\n\r\nEspacement pour lunettes\r\n\r\nCâble Oculus Link (pour le lier au PC, pratique pour le développement)');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `email` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `autorisation` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`email`, `reference`, `numero`, `date_debut`, `date_fin`, `autorisation`) VALUES
('jerome.fabre77@gmail.com', 'DELL_1', 22, '2000-02-20', '2200-02-02', 1),
('jerome.fabre77@gmail.com', 'Oculus_1', 23, '2023-05-08', '2023-05-13', 0),
('jerome.fabre77@gmail.com', 'Oculus_1', 24, '2023-05-03', '2023-05-31', 0),
('jerome.fabre77@gmail.com', 'Oculus_1', 25, '2023-05-01', '2023-08-31', 0);

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
('glenn.guillard@gmail.com', 'Glenn', 'Guillard', 'e69e86d752d6cf55a13b01a61625e1f6535b7987c93c2041dc642bbd146ad98f', '2004-01-30', 0),
('jerome.fabre77@gmail.com', 'Jérôme', 'Fabre', 'a46104d5a0ebe0e22751012f24a3399e8a3ff1c6bbf5c8835d0673990cd464a4', '2004-11-07', 1),
('test@gmail.com', 'Test', 'Test', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', '2004-11-07', 0),
('thomashenry7750@gmail.com', 'Henry', 'Thomas', '35c46e43e947ddea38d543777af5812f4e2f64b09d94b055f882953d7c528464', '0000-00-00', 1);

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
  ADD PRIMARY KEY (`numero`,`reference`,`email`),
  ADD KEY `email` (`email`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `numero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
