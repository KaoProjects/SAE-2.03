-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 07 avr. 2024 à 17:03
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bd_histoire`
--

-- --------------------------------------------------------

--
-- Structure de la table `histoire`
--

CREATE TABLE `histoire` (
  `id_histoire` int(11) NOT NULL,
  `id_participant` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `résumé` text NOT NULL,
  `url_son` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `histoire`
--

INSERT INTO `histoire` (`id_histoire`, `id_participant`, `titre`, `résumé`, `url_son`) VALUES
(1, 1, 'Escapade en Bretagne', 'Un souvenir de vacances et de jeunesse plein de fraîcheur', '<iframe width=\"100%\" height=\"166\" scrolling=\"no\" frameborder=\"no\" allow=\"autoplay\" src=\"https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/1775682714%3Fsecret_token%3Ds-m3qlUqllMMz&color=%230066cc&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true\"></iframe><div style=\"font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;\"><a href=\"https://soundcloud.com/bernadette-chaulet\" title=\"Bernadette.chaulet\" target=\"_blank\" style=\"color: #cccccc; text-decoration: none;\">Bernadette.chaulet</a> · <a href=\"https://soundcloud.com/bernadette-chaulet/escapadeenbretagnemp3/s-m3qlUqllMMz\" title=\"EscapadeEnBretagneMP3\" target=\"_blank\" style=\"color: #cccccc; text-decoration: none;\">EscapadeEnBretagneMP3</a></div>'),
(2, 2, 'Le début de la guerre', 'Quant les premiers bombardements ', '<iframe width=\"100%\" height=\"166\" scrolling=\"no\" frameborder=\"no\" allow=\"autoplay\" src=\"https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/1775682714%3Fsecret_token%3Ds-m3qlUqllMMz&color=%230066cc&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true\"></iframe><div style=\"font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;\"><a href=\"https://soundcloud.com/bernadette-chaulet\" title=\"Bernadette.chaulet\" target=\"_blank\" style=\"color: #cccccc; text-decoration: none;\">Bernadette.chaulet</a> · <a href=\"https://soundcloud.com/bernadette-chaulet/escapadeenbretagnemp3/s-m3qlUqllMMz\" title=\"EscapadeEnBretagneMP3\" target=\"_blank\" style=\"color: #cccccc; text-decoration: none;\">EscapadeEnBretagneMP3</a></div>'),
(4, 1, 'le bombardement sur la gare d\'Angoulême', 'C\'était le 6 juin 1940. on travaillait dans les champs', '<iframe width=\"100%\" height=\"166\" scrolling=\"no\" frameborder=\"no\" allow=\"autoplay\" src=\"https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/1775682714%3Fsecret_token%3Ds-m3qlUqllMMz&color=%230066cc&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true\"></iframe><div style=\"font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;\"><a href=\"https://soundcloud.com/bernadette-chaulet\" title=\"Bernadette.chaulet\" target=\"_blank\" style=\"color: #cccccc; text-decoration: none;\">Bernadette.chaulet</a> · <a href=\"https://soundcloud.com/bernadette-chaulet/escapadeenbretagnemp3/s-m3qlUqllMMz\" title=\"EscapadeEnBretagneMP3\" target=\"_blank\" style=\"color: #cccccc; text-decoration: none;\">EscapadeEnBretagneMP3</a></div>');

-- --------------------------------------------------------

--
-- Structure de la table `participant`
--

CREATE TABLE `participant` (
  `id_participant` int(11) NOT NULL,
  `prénom` varchar(50) NOT NULL,
  `année_naissance` int(11) NOT NULL,
  `genre` char(1) NOT NULL,
  `photo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `participant`
--

INSERT INTO `participant` (`id_participant`, `prénom`, `année_naissance`, `genre`, `photo`) VALUES
(1, 'Monique', 1945, 'F', 'mami.jpg'),
(2, 'Marcel', 1933, 'H', 'papi.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `login` varchar(15) NOT NULL,
  `mot_de_passe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `login`, `mot_de_passe`) VALUES
(1, 'admin', '123'),
(2, 'syst', '123');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `histoire`
--
ALTER TABLE `histoire`
  ADD PRIMARY KEY (`id_histoire`),
  ADD KEY `FK_id_participant` (`id_participant`);

--
-- Index pour la table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`id_participant`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `histoire`
--
ALTER TABLE `histoire`
  MODIFY `id_histoire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `participant`
--
ALTER TABLE `participant`
  MODIFY `id_participant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `histoire`
--
ALTER TABLE `histoire`
  ADD CONSTRAINT `FK_id_participant` FOREIGN KEY (`id_participant`) REFERENCES `participant` (`id_participant`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
