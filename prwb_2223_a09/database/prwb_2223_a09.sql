-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 23 mars 2023 à 13:01
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `prwb_2223_a09`
--

-- --------------------------------------------------------

--
-- Structure de la table `operations`
--

CREATE TABLE `operations` (
  `id` int(11) NOT NULL,
  `title` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `tricount` int(11) NOT NULL,
  `amount` double NOT NULL,
  `operation_date` date NOT NULL,
  `initiator` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `operations`
--

INSERT INTO `operations` (`id`, `title`, `tricount`, `amount`, `operation_date`, `initiator`, `created_at`) VALUES
(1, 'Colruyt', 4, 100, '2022-10-13', 2, '2022-10-13 19:09:18'),
(2, 'Plein essence', 4, 75, '2022-10-13', 1, '2022-10-13 20:10:41'),
(3, 'Grosses courses LIDL', 4, 212.47, '2022-10-13', 3, '2022-10-13 21:23:49'),
(4, 'Apéros', 4, 31.897456217, '2022-10-13', 1, '2022-10-13 23:51:20'),
(5, 'Boucherie', 4, 25.5, '2022-10-26', 2, '2022-10-26 09:59:56'),
(6, 'Loterie', 4, 35, '2022-10-26', 1, '2022-10-26 10:02:24');

-- --------------------------------------------------------

--
-- Structure de la table `repartitions`
--

CREATE TABLE `repartitions` (
  `operation` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `repartitions`
--

INSERT INTO `repartitions` (`operation`, `user`, `weight`) VALUES
(1, 1, 1),
(1, 2, 1),
(2, 1, 1),
(2, 2, 1),
(3, 1, 2),
(3, 2, 1),
(3, 3, 1),
(4, 1, 1),
(4, 2, 2),
(4, 3, 3),
(5, 1, 2),
(5, 2, 1),
(5, 3, 1),
(6, 1, 1),
(6, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `repartition_templates`
--

CREATE TABLE `repartition_templates` (
  `id` int(11) NOT NULL,
  `title` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `tricount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `repartition_templates`
--

INSERT INTO `repartition_templates` (`id`, `title`, `tricount`) VALUES
(2, 'Benoit ne paye rien', 4),
(1, 'Boris paye double', 4);

-- --------------------------------------------------------

--
-- Structure de la table `repartition_template_items`
--

CREATE TABLE `repartition_template_items` (
  `user` int(11) NOT NULL,
  `repartition_template` int(11) NOT NULL,
  `weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `repartition_template_items`
--

INSERT INTO `repartition_template_items` (`user`, `repartition_template`, `weight`) VALUES
(1, 1, 2),
(1, 2, 1),
(2, 1, 1),
(3, 1, 1),
(3, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `tricount` int(11) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `subscriptions`
--

INSERT INTO `subscriptions` (`tricount`, `user`) VALUES
(1, 1),
(2, 1),
(2, 2),
(4, 1),
(4, 2),
(4, 3);

-- --------------------------------------------------------

--
-- Structure de la table `tricounts`
--

CREATE TABLE `tricounts` (
  `id` int(11) NOT NULL,
  `title` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `creator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `tricounts`
--

INSERT INTO `tricounts` (`id`, `title`, `description`, `created_at`, `creator`) VALUES
(1, 'Gers 2022', NULL, '2022-10-10 18:42:24', 1),
(2, 'Resto badminton', NULL, '2022-10-10 19:25:10', 1),
(4, 'Vacances', 'A la mer du nord', '2022-10-10 19:31:09', 1),
(13, 'testest', 'ccccc', '2023-02-04 17:13:50', 2),
(15, 'lhuuuu', '', '2023-02-05 00:16:54', 2),
(16, 'test de nuit', 'desc de nuit', '2023-02-05 23:57:02', 2),
(17, 'ccc ', 'bababa', '2023-02-05 23:57:24', 2),
(18, 'cava', 'cava', '2023-02-06 00:04:35', 2),
(21, 'tasatasa', 'tasani', '2023-02-06 00:10:09', 2),
(22, 'der test', 'test pour rien', '2023-02-06 00:11:34', 2),
(23, 'testttttt ', 'tessssttttt', '2023-02-06 00:12:48', 2),
(24, 'medmed', 'med', '2023-02-06 00:15:17', 2),
(26, 'meddddd', 'meddd', '2023-02-06 00:16:03', 2),
(27, 'yasin', 'yasin', '2023-02-06 00:17:32', 2),
(28, 'gagag', 'gagga', '2023-02-06 01:28:25', 2),
(29, 'test ecole', 'test 1', '2023-02-06 12:23:23', 2),
(30, 'test trie', 'test desc', '2023-03-09 16:12:56', 2),
(31, 'test auj', 'test auj', '2023-03-23 12:38:03', 2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `mail` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `hashed_password` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('user','admin') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `iban` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `mail`, `hashed_password`, `full_name`, `role`, `iban`) VALUES
(1, 'boverhaegen@epfc.eu', '56ce92d1de4f05017cf03d6cd514d6d1', 'Boris', 'user', NULL),
(2, 'bepenelle@epfc.eu', '87535fa83d80a95377d6ebf3378a58b1', 'testname', 'user', 'BE73 3771 2675 2260'),
(3, 'xapigeolet@epfc.eu', '56ce92d1de4f05017cf03d6cd514d6d1', 'Xavier', 'user', NULL),
(4, 'mamichel@epfc.eu', '56ce92d1de4f05017cf03d6cd514d6d1', 'Marc', 'user', '1234'),
(5, 'errahmani61@gmail.com', '56ce92d1de4f05017cf03d6cd514d6d1', 'yuu', 'user', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `operations`
--
ALTER TABLE `operations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Initiator` (`initiator`),
  ADD KEY `Tricount` (`tricount`);

--
-- Index pour la table `repartitions`
--
ALTER TABLE `repartitions`
  ADD PRIMARY KEY (`operation`,`user`),
  ADD KEY `User` (`user`);

--
-- Index pour la table `repartition_templates`
--
ALTER TABLE `repartition_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Title` (`title`,`tricount`),
  ADD KEY `Tricount` (`tricount`);

--
-- Index pour la table `repartition_template_items`
--
ALTER TABLE `repartition_template_items`
  ADD PRIMARY KEY (`user`,`repartition_template`),
  ADD KEY `Distribution` (`repartition_template`);

--
-- Index pour la table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`tricount`,`user`),
  ADD KEY `User` (`user`);

--
-- Index pour la table `tricounts`
--
ALTER TABLE `tricounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Title` (`title`,`creator`),
  ADD KEY `Creator` (`creator`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Mail` (`mail`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `operations`
--
ALTER TABLE `operations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `repartition_templates`
--
ALTER TABLE `repartition_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tricounts`
--
ALTER TABLE `tricounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `operations`
--
ALTER TABLE `operations`
  ADD CONSTRAINT `operations_ibfk_1` FOREIGN KEY (`initiator`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `operations_ibfk_2` FOREIGN KEY (`tricount`) REFERENCES `tricounts` (`id`);

--
-- Contraintes pour la table `repartitions`
--
ALTER TABLE `repartitions`
  ADD CONSTRAINT `repartitions_ibfk_1` FOREIGN KEY (`operation`) REFERENCES `operations` (`id`),
  ADD CONSTRAINT `repartitions_ibfk_2` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `repartition_templates`
--
ALTER TABLE `repartition_templates`
  ADD CONSTRAINT `repartition_templates_ibfk_1` FOREIGN KEY (`tricount`) REFERENCES `tricounts` (`id`);

--
-- Contraintes pour la table `repartition_template_items`
--
ALTER TABLE `repartition_template_items`
  ADD CONSTRAINT `repartition_template_items_ibfk_1` FOREIGN KEY (`repartition_template`) REFERENCES `repartition_templates` (`id`),
  ADD CONSTRAINT `repartition_template_items_ibfk_2` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_ibfk_1` FOREIGN KEY (`tricount`) REFERENCES `tricounts` (`id`),
  ADD CONSTRAINT `subscriptions_ibfk_2` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `tricounts`
--
ALTER TABLE `tricounts`
  ADD CONSTRAINT `tricounts_ibfk_1` FOREIGN KEY (`creator`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
