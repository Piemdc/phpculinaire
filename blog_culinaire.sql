-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 07 sep. 2021 à 09:22
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog_culinaire`
--
CREATE DATABASE IF NOT EXISTS `blog_culinaire` DEFAULT CHARACTER SET utf16 COLLATE utf16_general_ci;
USE `blog_culinaire`;

-- --------------------------------------------------------

--
-- Structure de la table `t_commentaire`
--

DROP TABLE IF EXISTS `t_commentaire`;
CREATE TABLE IF NOT EXISTS `t_commentaire` (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `com_auteur` varchar(255) NOT NULL,
  `com_contenu` text NOT NULL,
  `id_rec` int(11) NOT NULL,
  PRIMARY KEY (`com_id`),
  KEY `FK_recette_commentaire` (`id_rec`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Structure de la table `t_recette`
--

DROP TABLE IF EXISTS `t_recette`;
CREATE TABLE IF NOT EXISTS `t_recette` (
  `rec_id` int(11) NOT NULL AUTO_INCREMENT,
  `rec_nom` varchar(255) NOT NULL,
  `rec_resume` text NOT NULL,
  `rec_temps` varchar(255) NOT NULL,
  `rec_difficulte` varchar(255) NOT NULL,
  `rec_budget` varchar(255) NOT NULL,
  `rec_ingredients` text NOT NULL,
  `rec_image` varchar(255) NOT NULL,
  `rec_preparation` text NOT NULL,
  `rec_categorie` varchar(255) NOT NULL,
  PRIMARY KEY (`rec_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_commentaire`
--
ALTER TABLE `t_commentaire`
  ADD CONSTRAINT `FK_recette_commentaire` FOREIGN KEY (`id_rec`) REFERENCES `t_recette` (`rec_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


INSERT INTO t_recette (rec_nom , rec_resume , rec_temps , rec_difficulte , rec_budget , rec_ingredients , rec_preparation , rec_categorie) VALUES 
('Oeuf cocotte en fromage' , 'Oeuf cocotte en fromage, pour une haleine de chacal' , '30 min' , 'Très facile' , 'Bon marché' , 'Ingrédients (4 oeufs) : 4 traches de jambon , 4 oeufs , 4 neufchâtel , sel , poivre , ciboulette',"ÉTAPE 1
A l'aide d'un emporte pièce, faire un trou au centre du fromage. Attention à ne pas traverser le fromage !

ÉTAPE 2
Déposer des lamelles de jambon au fond du trou, y casser un oeuf, saler et poivrer.

ÉTAPE 3
Parsemer de ciboulette ciselée.

ÉTAPE 4
Déposer sur une plaque recouverte de papier sulfurisé et enfourner 15 minutes.

ÉTAPE 5
Déguster bien chaud !", 'entrée'),

('Pâte à crêpes' , 'Pâte à crêpes, pour avoir quelque chose à sauter' , '30 min' , 'Facile' , 'Bon marché' , ' 15 crêpes : 300 g farine , 3 cas de sucre , 2 cas huile , 60 cl de lait , 5 cl de rhum , 3 oeufs entiers , 50 g de beurre fondu' , "ÉTAPE 1
Mettre la farine dans une terrine et former un puits.

ÉTAPE 2
Y déposer les oeufs entiers, le sucre, l'huile et le beurre.

ÉTAPE 3
Mélanger délicatement avec un fouet en ajoutant au fur et à mesure le lait. La pâte ainsi obtenue doit avoir une consistance d'un liquide légèrement épais.

ÉTAPE 4
Parfumer de rhum.

ÉTAPE 5
Faire chauffer une poêle antiadhésive et la huiler très légèrement. Y verser une louche de pâte, la répartir dans la poêle puis attendre qu'elle soit cuite d'un côté avant de la retourner. Cuire ainsi toutes les crêpes à feu doux.
" , 'dessert');