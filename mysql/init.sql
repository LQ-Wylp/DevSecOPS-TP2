-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 17 mars 2024 à 16:37
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_cadeau`
--

-- --------------------------------------------------------

--
-- Structure de la table `cadeau`
--

DROP TABLE IF EXISTS `cadeau`;
CREATE TABLE IF NOT EXISTS `cadeau` (
  `id` int NOT NULL AUTO_INCREMENT,
  `prix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cadeau`
--

INSERT INTO `cadeau` (`id`, `prix`, `nom`) VALUES
(3, '10', 'Composant'),
(4, '20', 'Composant2');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20240305090611', '2024-03-05 09:37:17', 309),
('DoctrineMigrations\\Version20240305102805', '2024-03-05 10:28:17', 43);

-- --------------------------------------------------------

--
-- Structure de la table `liste_cadeau`
--

DROP TABLE IF EXISTS `liste_cadeau`;
CREATE TABLE IF NOT EXISTS `liste_cadeau` (
  `id` int NOT NULL AUTO_INCREMENT,
  `finish` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `liste_cadeau`
--

INSERT INTO `liste_cadeau` (`id`, `finish`) VALUES
(2, 0);

-- --------------------------------------------------------

--
-- Structure de la table `liste_cadeau_cadeau`
--

DROP TABLE IF EXISTS `liste_cadeau_cadeau`;
CREATE TABLE IF NOT EXISTS `liste_cadeau_cadeau` (
  `liste_cadeau_id` int NOT NULL,
  `cadeau_id` int NOT NULL,
  PRIMARY KEY (`liste_cadeau_id`,`cadeau_id`),
  KEY `IDX_5301C71484A12BDD` (`liste_cadeau_id`),
  KEY `IDX_5301C714D9D5ED84` (`cadeau_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `liste_cadeau_cadeau`
--
ALTER TABLE `liste_cadeau_cadeau`
  ADD CONSTRAINT `FK_5301C71484A12BDD` FOREIGN KEY (`liste_cadeau_id`) REFERENCES `liste_cadeau` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_5301C714D9D5ED84` FOREIGN KEY (`cadeau_id`) REFERENCES `cadeau` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
