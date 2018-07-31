-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Lun 30 Juillet 2018 à 13:11
-- Version du serveur :  5.7.22-0ubuntu0.17.10.1
-- Version de PHP :  7.1.17-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `chez_pupuce`
--

-- --------------------------------------------------------

--
-- Structure de la table `pupuce_client`
--

CREATE TABLE `pupuce_client` (
  `pupuce_client_id` int(11) NOT NULL,
  `pupuce_client_nom` char(30) COLLATE utf8_bin NOT NULL COMMENT 'encrypted',
  `pupuce_client_prenom` char(30) COLLATE utf8_bin NOT NULL COMMENT 'encrypted',
  `pupuce_client_mail` char(255) COLLATE utf8_bin NOT NULL COMMENT 'encrypted',
  `pupuce_client_adresse` char(255) COLLATE utf8_bin NOT NULL COMMENT 'encrypted',
  `pupuce_client_cp` char(10) COLLATE utf8_bin NOT NULL,
  `pupuce_client_ville` char(30) COLLATE utf8_bin NOT NULL,
  `pupuce_client_naissance` date NOT NULL,
  `pupuce_client_creation` date NOT NULL,
  `pupuce_client_pass` char(255) COLLATE utf8_bin NOT NULL COMMENT 'encrypted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `pupuce_commande`
--

CREATE TABLE `pupuce_commande` (
  `pupuce_commande_id` int(11) NOT NULL,
  `pupuce_commande_client_id` int(11) NOT NULL,
  `pupuce_commande_date_commande` date NOT NULL,
  `pupuce_commande_date_livraison` date NOT NULL,
  `pupuce_commande_num_panier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `pupuce_employe`
--

CREATE TABLE `pupuce_employe` (
  `pupuce_employe_id` int(11) NOT NULL,
  `pupuce_employe_nom` char(30) COLLATE utf8_bin NOT NULL COMMENT 'encrypted',
  `pupuce_employe_prenom` char(30) COLLATE utf8_bin NOT NULL COMMENT 'encrypted',
  `pupuce_employe_mail` char(255) COLLATE utf8_bin NOT NULL COMMENT 'encrypted',
  `pupuce_employe_adresse` char(255) COLLATE utf8_bin NOT NULL COMMENT 'encrypted',
  `pupuce_employe_cp` char(10) COLLATE utf8_bin NOT NULL,
  `pupuce_employe_ville` char(30) COLLATE utf8_bin NOT NULL,
  `pupuce_employe_naissance` date NOT NULL,
  `pupuce_employe_fonction` char(70) COLLATE utf8_bin NOT NULL DEFAULT 'Employé',
  `pupuce_employe_salaire` int(11) NOT NULL DEFAULT '1300' COMMENT 'encrypted',
  `pupuce_employe_id_boss` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `pupuce_fournisseur`
--

CREATE TABLE `pupuce_fournisseur` (
  `pupuce_fournisseur_id` int(11) NOT NULL,
  `pupuce_fournisseur_nom` char(30) COLLATE utf8_bin NOT NULL COMMENT 'encrypted',
  `pupuce_fournisseur_prenom` char(30) COLLATE utf8_bin NOT NULL COMMENT 'encrypted',
  `pupuce_fournisseur_mail` char(255) COLLATE utf8_bin NOT NULL COMMENT 'encrypted',
  `pupuce_fournisseur_adresse` char(255) COLLATE utf8_bin NOT NULL COMMENT 'encrypted',
  `pupuce_fournisseur_cp` char(10) COLLATE utf8_bin NOT NULL,
  `pupuce_fournisseur_ville` char(30) COLLATE utf8_bin NOT NULL,
  `pupuce_fournisseur_naissance` date NOT NULL,
  `pupuce_fournisseur_code_compt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `pupuce_produit`
--

CREATE TABLE `pupuce_produit` (
  `pupuce_produit_id` int(11) NOT NULL,
  `pupuce_produit_nom` char(100) COLLATE utf8_bin NOT NULL,
  `pupuce_produit_description` char(255) COLLATE utf8_bin NOT NULL,
  `pupuce_produit_image` char(255) COLLATE utf8_bin NOT NULL,
  `pupuce_produit_prix` int(11) NOT NULL,
  `pupuce_produit_stock` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `pupuce_produit_fournisseur`
--

CREATE TABLE `pupuce_produit_fournisseur` (
  `pupuce_produit_id` int(11) NOT NULL,
  `pupuce_fournisseur_id` int(11) NOT NULL,
  `pupuce_produit_quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `pupuce_client`
--
ALTER TABLE `pupuce_client`
  ADD PRIMARY KEY (`pupuce_client_id`);

--
-- Index pour la table `pupuce_commande`
--
ALTER TABLE `pupuce_commande`
  ADD PRIMARY KEY (`pupuce_commande_id`),
  ADD KEY `cle_etrangere_commande_client` (`pupuce_commande_client_id`);

--
-- Index pour la table `pupuce_employe`
--
ALTER TABLE `pupuce_employe`
  ADD PRIMARY KEY (`pupuce_employe_id`);

--
-- Index pour la table `pupuce_fournisseur`
--
ALTER TABLE `pupuce_fournisseur`
  ADD PRIMARY KEY (`pupuce_fournisseur_id`);

--
-- Index pour la table `pupuce_produit`
--
ALTER TABLE `pupuce_produit`
  ADD KEY `cle_etrangere_produit_produit` (`pupuce_produit_id`);

--
-- Index pour la table `pupuce_produit_fournisseur`
--
ALTER TABLE `pupuce_produit_fournisseur`
  ADD PRIMARY KEY (`pupuce_produit_id`),
  ADD KEY `cle_etrangere_produit_fournisseur` (`pupuce_fournisseur_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `pupuce_client`
--
ALTER TABLE `pupuce_client`
  MODIFY `pupuce_client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT pour la table `pupuce_commande`
--
ALTER TABLE `pupuce_commande`
  MODIFY `pupuce_commande_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `pupuce_produit_fournisseur`
--
ALTER TABLE `pupuce_produit_fournisseur`
  MODIFY `pupuce_produit_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `pupuce_commande`
--
ALTER TABLE `pupuce_commande`
  ADD CONSTRAINT `cle_etrangere_commande_client` FOREIGN KEY (`pupuce_commande_client_id`) REFERENCES `pupuce_client` (`pupuce_client_id`);

--
-- Contraintes pour la table `pupuce_produit`
--
ALTER TABLE `pupuce_produit`
  ADD CONSTRAINT `cle_etrangere_produit_produit` FOREIGN KEY (`pupuce_produit_id`) REFERENCES `pupuce_produit_fournisseur` (`pupuce_produit_id`);

--
-- Contraintes pour la table `pupuce_produit_fournisseur`
--
ALTER TABLE `pupuce_produit_fournisseur`
  ADD CONSTRAINT `cle_etrangere_produit_fournisseur` FOREIGN KEY (`pupuce_fournisseur_id`) REFERENCES `pupuce_fournisseur` (`pupuce_fournisseur_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
