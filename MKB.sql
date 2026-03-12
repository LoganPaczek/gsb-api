-- phpMyAdmin SQL Dump
-- version 5.2.1deb1+deb12u1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 12 mars 2026 à 14:12
-- Version du serveur : 10.11.14-MariaDB-0+deb12u2
-- Version de PHP : 8.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `MKB`
--

-- --------------------------------------------------------

--
-- Structure de la table `attribuer`
--

CREATE TABLE `attribuer` (
  `id_visiteur` int(11) NOT NULL,
  `id_vehicule` int(11) NOT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `saisie_hebdo`
--

CREATE TABLE `saisie_hebdo` (
  `id` int(11) NOT NULL,
  `date_` date DEFAULT NULL,
  `km_journee` int(11) DEFAULT NULL,
  `id_visiteur` int(11) NOT NULL,
  `id_vehicule` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `saisie_jour`
--

CREATE TABLE `saisie_jour` (
  `id` int(11) NOT NULL,
  `date_` date DEFAULT NULL,
  `km_journee` int(11) DEFAULT NULL,
  `id_visiteur` int(11) NOT NULL,
  `id_vehicule` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `vehicules`
--

CREATE TABLE `vehicules` (
  `id` int(11) NOT NULL,
  `immatriculation` varchar(10) DEFAULT NULL,
  `marque` varchar(30) DEFAULT NULL,
  `modele` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `visiteurs`
--

CREATE TABLE `visiteurs` (
  `id` int(11) NOT NULL,
  `login` varchar(20) DEFAULT NULL,
  `password_hash` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `attribuer`
--
ALTER TABLE `attribuer`
  ADD PRIMARY KEY (`id_visiteur`,`id_vehicule`),
  ADD KEY `id_vehicule` (`id_vehicule`);

--
-- Index pour la table `saisie_hebdo`
--
ALTER TABLE `saisie_hebdo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_visiteur` (`id_visiteur`),
  ADD KEY `id_vehicule` (`id_vehicule`);

--
-- Index pour la table `saisie_jour`
--
ALTER TABLE `saisie_jour`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_visiteur` (`id_visiteur`),
  ADD KEY `id_vehicule` (`id_vehicule`);

--
-- Index pour la table `vehicules`
--
ALTER TABLE `vehicules`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `visiteurs`
--
ALTER TABLE `visiteurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `saisie_hebdo`
--
ALTER TABLE `saisie_hebdo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `saisie_jour`
--
ALTER TABLE `saisie_jour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `vehicules`
--
ALTER TABLE `vehicules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `visiteurs`
--
ALTER TABLE `visiteurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `attribuer`
--
ALTER TABLE `attribuer`
  ADD CONSTRAINT `attribuer_ibfk_1` FOREIGN KEY (`id_visiteur`) REFERENCES `visiteurs` (`id`),
  ADD CONSTRAINT `attribuer_ibfk_2` FOREIGN KEY (`id_vehicule`) REFERENCES `vehicules` (`id`);

--
-- Contraintes pour la table `saisie_hebdo`
--
ALTER TABLE `saisie_hebdo`
  ADD CONSTRAINT `saisie_hebdo_ibfk_1` FOREIGN KEY (`id_visiteur`) REFERENCES `visiteurs` (`id`),
  ADD CONSTRAINT `saisie_hebdo_ibfk_2` FOREIGN KEY (`id_vehicule`) REFERENCES `vehicules` (`id`);

--
-- Contraintes pour la table `saisie_jour`
--
ALTER TABLE `saisie_jour`
  ADD CONSTRAINT `saisie_jour_ibfk_1` FOREIGN KEY (`id_visiteur`) REFERENCES `visiteurs` (`id`),
  ADD CONSTRAINT `saisie_jour_ibfk_2` FOREIGN KEY (`id_vehicule`) REFERENCES `vehicules` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
