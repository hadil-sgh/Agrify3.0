-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 14 nov. 2023 à 15:12
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26
/*
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
*/

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `agrify`
--

-- --------------------------------------------------------

--
-- Structure de la table `user`
--
/*
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_nom` varchar(255) NOT NULL,
  `user_prenom` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_telephone` varchar(255) NOT NULL,
  `user_genre` varchar(255) NOT NULL,
  `user_nbrabscence` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `user_nom`, `user_prenom`, `user_email`, `user_telephone`, `user_genre`, `user_nbrabscence`, `username`, `password`, `user_role`) VALUES
(46, 'gheiyth', 'gheiyth', 'gheiyth.tabarki@esprit.tn', '251525654', 'Homme', 2, 'gheiythtba', '$2y$13$BZO.3.4vWrgM7MlWB55oXu7WH0ES.HFX2hhVFmPstt2aG8IoVFxqS', 'Admin');
COMMIT;

the password is gheiyttba

*/
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
