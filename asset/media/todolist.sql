-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 25 mars 2024 à 14:28
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `todolist`
--

-- --------------------------------------------------------

--
-- Structure de la table `tdl_appartenir`
--

DROP TABLE IF EXISTS `tdl_appartenir`;
CREATE TABLE IF NOT EXISTS `tdl_appartenir` (
  `Id_tache` int NOT NULL,
  `Id_categorie` int NOT NULL,
  PRIMARY KEY (`Id_tache`,`Id_categorie`),
  KEY `Appartenir_Categorie0_FK` (`Id_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tdl_appartenir`
--

INSERT INTO `tdl_appartenir` (`Id_tache`, `Id_categorie`) VALUES
(79, 1),
(80, 1),
(86, 1),
(80, 2),
(81, 2),
(83, 2),
(87, 2),
(79, 3),
(83, 3),
(79, 4),
(81, 4),
(86, 4),
(87, 4),
(83, 5);

-- --------------------------------------------------------

--
-- Structure de la table `tdl_categorie`
--

DROP TABLE IF EXISTS `tdl_categorie`;
CREATE TABLE IF NOT EXISTS `tdl_categorie` (
  `Id_categorie` int NOT NULL AUTO_INCREMENT,
  `Nom_categorie` varchar(255) NOT NULL,
  PRIMARY KEY (`Id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tdl_categorie`
--

INSERT INTO `tdl_categorie` (`Id_categorie`, `Nom_categorie`) VALUES
(1, 'Travail'),
(2, 'Personnel'),
(3, 'Amis'),
(4, 'Famille'),
(5, 'Sport');

-- --------------------------------------------------------

--
-- Structure de la table `tdl_priorite`
--

DROP TABLE IF EXISTS `tdl_priorite`;
CREATE TABLE IF NOT EXISTS `tdl_priorite` (
  `Id_priorite` int NOT NULL AUTO_INCREMENT,
  `Nom_priorite` varchar(255) NOT NULL,
  PRIMARY KEY (`Id_priorite`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tdl_priorite`
--

INSERT INTO `tdl_priorite` (`Id_priorite`, `Nom_priorite`) VALUES
(1, 'Normal'),
(2, 'Important'),
(3, 'Urgent');

-- --------------------------------------------------------

--
-- Structure de la table `tdl_tache`
--

DROP TABLE IF EXISTS `tdl_tache`;
CREATE TABLE IF NOT EXISTS `tdl_tache` (
  `Id_tache` int NOT NULL AUTO_INCREMENT,
  `Titre` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `Id_user` int NOT NULL,
  `Id_priorite` int NOT NULL,
  PRIMARY KEY (`Id_tache`),
  KEY `Tache_User_FK` (`Id_user`),
  KEY `Tache_Priorite0_FK` (`Id_priorite`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tdl_tache`
--

INSERT INTO `tdl_tache` (`Id_tache`, `Titre`, `Description`, `Date`, `Id_user`, `Id_priorite`) VALUES
(79, 'Finir le brief', 'C\'est bientôt la fin', '2024-03-22', 11, 1),
(80, 'Rendre le brief', 'C\'est la fin !!!!!', '2024-03-25', 11, 3),
(81, 'Dormiiiiir', 'zzzzzzzzzzzzzzzzz', '2024-03-26', 11, 1),
(83, 'Travail', 'Va falloir finir le brief !!', '2024-03-24', 22, 3),
(84, 'Finir le biref', 'Ou pas ', '2024-03-25', 22, 3),
(86, 'Faire fonctionner le message', 'J\'aimerais qu\'il s\'affiche', '2024-03-22', 22, 1),
(87, 'Toujours ce message', 'J\'en ai marre', '2024-03-23', 22, 2);

-- --------------------------------------------------------

--
-- Structure de la table `tdl_user`
--

DROP TABLE IF EXISTS `tdl_user`;
CREATE TABLE IF NOT EXISTS `tdl_user` (
  `Id_user` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Mot_de_passe` varchar(255) NOT NULL,
  PRIMARY KEY (`Id_user`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tdl_user`
--

INSERT INTO `tdl_user` (`Id_user`, `Nom`, `Prenom`, `Email`, `Mot_de_passe`) VALUES
(11, 'admin', 'admin', 'admin@admin.com', '$2y$10$hcXiIhFmMjPQtDX.BJN53eGEBho.JxkYrWzA2JqXR95hVv9IzvWkm'),
(22, 'Grienay', 'Elodie', 'elodie.grienay@free.fr', '$2y$10$rfsSaGAO7nHqM7mChHduh.kAGQ/J8XtB696bmLoI4IK5X8FICjQMq');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tdl_appartenir`
--
ALTER TABLE `tdl_appartenir`
  ADD CONSTRAINT `Appartenir_Categorie0_FK` FOREIGN KEY (`Id_categorie`) REFERENCES `tdl_categorie` (`Id_categorie`),
  ADD CONSTRAINT `Appartenir_Tache_FK` FOREIGN KEY (`Id_tache`) REFERENCES `tdl_tache` (`Id_tache`);

--
-- Contraintes pour la table `tdl_tache`
--
ALTER TABLE `tdl_tache`
  ADD CONSTRAINT `Tache_Priorite0_FK` FOREIGN KEY (`Id_priorite`) REFERENCES `tdl_priorite` (`Id_priorite`),
  ADD CONSTRAINT `Tache_User_FK` FOREIGN KEY (`Id_user`) REFERENCES `tdl_user` (`Id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
