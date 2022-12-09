-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 09 déc. 2022 à 14:29
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_des_stocks`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'computers', 'description for computers category'),
(2, 'clothes', 'description for clothes category');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `label` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `pdate` date DEFAULT NULL,
  `picture` varchar(2048) DEFAULT NULL,
  `id_category` int(10) DEFAULT NULL,
  `id_owner` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `phone`, `dob`) VALUES
(1, 'ayoub.achak01@gmail.com', '3b37dae1ddb3ac0bbb95684eefd5a70d', 'ayoub', 'achak', NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `fk_id_owner` (`id_owner`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_id_owner` FOREIGN KEY (`id_owner`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
