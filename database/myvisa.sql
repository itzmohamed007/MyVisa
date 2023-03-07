-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 07 mars 2023 à 21:25
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
-- Base de données : `myvisa`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `nom_complet` varchar(255) NOT NULL,
  `naissance` date NOT NULL,
  `nationalite` varchar(255) NOT NULL,
  `situation` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `type_visa` varchar(255) NOT NULL,
  `date_depart` date NOT NULL,
  `date_arriver` date NOT NULL,
  `type_document` varchar(255) NOT NULL,
  `numero_document` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `token`, `nom_complet`, `naissance`, `nationalite`, `situation`, `address`, `type_visa`, `date_depart`, `date_arriver`, `type_document`, `numero_document`) VALUES
(120, '6406fc5a078c8', 'mohamed bourra', '2004-07-30', 'moroccan', 'single', 'itzmohamed007@gmail.com', 'long stay visa', '2023-03-07', '2023-03-09', 'CIN', 123456789),
(121, '6407174fe8261', 'omar bourra', '2004-07-30', 'moroccan', 'single', 'obourra@gmail.com', 'long stay visa', '2023-03-07', '2023-03-09', 'CIN', 123456789),
(122, '64071b7eb98d0', 'ahmed bourra', '2004-07-30', 'moroccan', 'single', 'ahmed@gmail.com', 'long stay visa', '2023-03-07', '2023-03-09', 'CIN', 123456789);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `id_client`, `date`) VALUES
(1, 120, '2023-03-15 00:00:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_client` (`id_client`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
