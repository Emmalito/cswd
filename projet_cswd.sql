-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mar. 09 avr. 2019 à 16:54
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_cswd`
--

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL,
  `titre` text COLLATE utf8_bin NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `forum`
--

INSERT INTO `forum` (`id`, `id_membre`, `titre`, `date`) VALUES
(1, 3, 'Comment faire pour touver le DL de exponentielle ?', '2019-04-02 08:35:14'),
(2, 2, 'Coder une boucle en Python', '2019-04-08 21:48:18'),
(3, 3, 'Equilibre en macroéconomie', '2019-04-06 09:35:00'),
(4, 4, 'Trouver la fonction de vraisemblance', '2019-04-07 11:20:48');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id` int(11) NOT NULL,
  `nom` varchar(70) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(70) COLLATE utf8_bin NOT NULL,
  `pseudo` varchar(70) COLLATE utf8_bin NOT NULL,
  `email` text COLLATE utf8_bin NOT NULL,
  `mdp` text COLLATE utf8_bin NOT NULL,
  `classe` enum('L1','L2','L3') COLLATE utf8_bin NOT NULL,
  `tuteur` int(11) DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id`, `nom`, `prenom`, `pseudo`, `email`, `mdp`, `classe`, `tuteur`, `date`) VALUES
(1, 'delar', 'emmalito', 'emmdelar', 'edelar18@gmail.com', '63a9f0ea7bb98050796b649e85481845', 'L2', NULL, '2019-04-08'),
(2, 'delar', 'emma', 'rftd', 'edelar18@gmail.com', '690721305db8296db95ccdd078c2d35e', 'L1', NULL, '2019-04-08'),
(3, 'arthur', 'rino', 'rino', 'rino@du33.com', '63a9f0ea7bb98050796b649e85481845', 'L1', NULL, '2019-04-09'),
(4, 'trio', 'mino', 'mino', 'mino@ici.lo', '63a9f0ea7bb98050796b649e85481845', 'L3', NULL, '2019-04-09'),
(5, 'zola', 'emile', 'zola', 'ouais@ouais.ouais', '63a9f0ea7bb98050796b649e85481845', 'L2', NULL, '2019-04-09');

-- --------------------------------------------------------

--
-- Structure de la table `message_forum`
--

CREATE TABLE `message_forum` (
  `id` int(11) NOT NULL,
  `id_forum` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL,
  `message` text COLLATE utf8_bin NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `message_forum`
--

INSERT INTO `message_forum` (`id`, `id_forum`, `id_membre`, `message`, `date`) VALUES
(1, 1, 1, 'Il faut que tu regardes ton cours', '2019-04-02 11:07:00'),
(2, 1, 3, 'C\'est fait, mais je n\'ai rien compris', '2019-04-02 11:14:00'),
(3, 1, 2, 'C\'est simple, il faut faire ça', '2019-04-02 13:23:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `message_forum`
--
ALTER TABLE `message_forum`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `message_forum`
--
ALTER TABLE `message_forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
