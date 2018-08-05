-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Dim 05 Août 2018 à 23:50
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

--
-- Contenu de la table `pupuce_client`
--

INSERT INTO `pupuce_client` (`pupuce_client_id`, `pupuce_client_nom`, `pupuce_client_prenom`, `pupuce_client_mail`, `pupuce_client_adresse`, `pupuce_client_cp`, `pupuce_client_ville`, `pupuce_client_naissance`, `pupuce_client_creation`, `pupuce_client_pass`) VALUES
(28, 'OAK', 'Blue', 'blue@umbreon.jp', 'Okutama, Nishitama District', '19815', 'Tokyo', '2010-02-03', '2018-08-02', '$2y$10$GucurqYz9LueDHnT3EMf5eRpET9ycyzLMpdjCEsWnxHTftqUFcqfm');

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
  `pupuce_employe_nom` char(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'encrypted',
  `pupuce_employe_prenom` char(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'encrypted',
  `pupuce_employe_mail` char(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'encrypted',
  `pupuce_employe_adresse` char(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'encrypted',
  `pupuce_employe_cp` char(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `pupuce_employe_ville` char(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `pupuce_employe_naissance` date NOT NULL,
  `pupuce_employe_fonction` char(70) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'Employé',
  `pupuce_employe_salaire` int(11) NOT NULL DEFAULT '1300' COMMENT 'encrypted',
  `pupuce_employe_id_boss` int(11) NOT NULL,
  `pupuce_employe_secu` char(15) COLLATE utf32_roman_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_roman_ci;

--
-- Contenu de la table `pupuce_employe`
--

INSERT INTO `pupuce_employe` (`pupuce_employe_id`, `pupuce_employe_nom`, `pupuce_employe_prenom`, `pupuce_employe_mail`, `pupuce_employe_adresse`, `pupuce_employe_cp`, `pupuce_employe_ville`, `pupuce_employe_naissance`, `pupuce_employe_fonction`, `pupuce_employe_salaire`, `pupuce_employe_id_boss`, `pupuce_employe_secu`) VALUES
(25, 'CORDULA', 'Christina', 'ccordula@c-pupuce.net', '67, avenue des églantiers rouges', '06400', 'Cannes', '1997-02-05', 'Cadre', 5000, 2, '297020602940345');

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
  `pupuce_fournisseur_code_compt` char(7) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `pupuce_fournisseur`
--

INSERT INTO `pupuce_fournisseur` (`pupuce_fournisseur_id`, `pupuce_fournisseur_nom`, `pupuce_fournisseur_prenom`, `pupuce_fournisseur_mail`, `pupuce_fournisseur_adresse`, `pupuce_fournisseur_cp`, `pupuce_fournisseur_ville`, `pupuce_fournisseur_naissance`, `pupuce_fournisseur_code_compt`) VALUES
(0, 'VETERINOU', 'PME', 'gblackas@veterinou.se', '33 avenue des bigoudis', '07700', 'Saint-Martin-d\'Ardèche', '2018-08-01', '24456VE'),
(1, 'SOLUTIONS-TOUTOU', 'PME', 'ttouati@s-toutou.in', '34 boulevard Bieber', '09480', 'Tarascon-sur-Ariège', '2018-08-12', '23309ST');

-- --------------------------------------------------------

--
-- Structure de la table `pupuce_panier`
--

CREATE TABLE `pupuce_panier` (
  `pupuce_panier_id` int(11) NOT NULL,
  `pupuce_panier_produits_liste` json NOT NULL,
  `pupuce_panier_client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_roman_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pupuce_produit`
--

CREATE TABLE `pupuce_produit` (
  `pupuce_produit_id` int(11) NOT NULL,
  `pupuce_produit_nom` char(100) COLLATE utf8_bin NOT NULL,
  `pupuce_produit_description` char(255) COLLATE utf8_bin NOT NULL,
  `pupuce_produit_image` varchar(1500) COLLATE utf8_bin NOT NULL,
  `pupuce_produit_prix` float NOT NULL,
  `pupuce_produit_stock` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `pupuce_produit`
--

INSERT INTO `pupuce_produit` (`pupuce_produit_id`, `pupuce_produit_nom`, `pupuce_produit_description`, `pupuce_produit_image`, `pupuce_produit_prix`, `pupuce_produit_stock`) VALUES
(1, 'Croquette', 'Croquette pour chien', 'https://cdn.manomano.fr/pedigree-croquette-pour-chien-au-boeuf-4kg-T-596833-4448264_1.jpg', 32.99, 2),
(2, 'Friandise chien', 'C SUPER BONG', 'https://www.zoomalia.com/blogz/240/s_friandises_chien.jpg', 32.99, 2),
(3, 'Viande gelée chat', 'miam miam', 'https://shop-cdn-m.shpp.ext.zooplus.io/bilder/bozita/bouches/en/gele/x/g/pour/chat/5/200/298490_bozita_hig_viel_huhn_5.jpg', 32.99, 5);

-- --------------------------------------------------------

--
-- Structure de la table `pupuce_produit_fournisseur`
--

CREATE TABLE `pupuce_produit_fournisseur` (
  `pupuce_produit_primary_id` int(11) NOT NULL,
  `pupuce_fournisseur_index_id` int(11) NOT NULL,
  `pupuce_produit_quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `pupuce_produit_fournisseur`
--

INSERT INTO `pupuce_produit_fournisseur` (`pupuce_produit_primary_id`, `pupuce_fournisseur_index_id`, `pupuce_produit_quantite`) VALUES
(1, 1, 9),
(2, 0, 3),
(3, 1, 7);

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
-- Index pour la table `pupuce_panier`
--
ALTER TABLE `pupuce_panier`
  ADD PRIMARY KEY (`pupuce_panier_id`),
  ADD KEY `pupuce_panier_client_id` (`pupuce_panier_client_id`);

--
-- Index pour la table `pupuce_produit`
--
ALTER TABLE `pupuce_produit`
  ADD PRIMARY KEY (`pupuce_produit_id`);

--
-- Index pour la table `pupuce_produit_fournisseur`
--
ALTER TABLE `pupuce_produit_fournisseur`
  ADD PRIMARY KEY (`pupuce_produit_primary_id`),
  ADD KEY `cle_etrangere_produit_fournisseur` (`pupuce_fournisseur_index_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `pupuce_client`
--
ALTER TABLE `pupuce_client`
  MODIFY `pupuce_client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT pour la table `pupuce_commande`
--
ALTER TABLE `pupuce_commande`
  MODIFY `pupuce_commande_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `pupuce_employe`
--
ALTER TABLE `pupuce_employe`
  MODIFY `pupuce_employe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT pour la table `pupuce_panier`
--
ALTER TABLE `pupuce_panier`
  MODIFY `pupuce_panier_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `pupuce_produit_fournisseur`
--
ALTER TABLE `pupuce_produit_fournisseur`
  MODIFY `pupuce_produit_primary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `pupuce_commande`
--
ALTER TABLE `pupuce_commande`
  ADD CONSTRAINT `cle_etrangere_commande_client` FOREIGN KEY (`pupuce_commande_client_id`) REFERENCES `pupuce_client` (`pupuce_client_id`);

--
-- Contraintes pour la table `pupuce_panier`
--
ALTER TABLE `pupuce_panier`
  ADD CONSTRAINT `pupuce_panier_ibfk_1` FOREIGN KEY (`pupuce_panier_client_id`) REFERENCES `pupuce_client` (`pupuce_client_id`);

--
-- Contraintes pour la table `pupuce_produit`
--
ALTER TABLE `pupuce_produit`
  ADD CONSTRAINT `cle_etrangere_produit_produit` FOREIGN KEY (`pupuce_produit_id`) REFERENCES `pupuce_produit_fournisseur` (`pupuce_produit_primary_id`);

--
-- Contraintes pour la table `pupuce_produit_fournisseur`
--
ALTER TABLE `pupuce_produit_fournisseur`
  ADD CONSTRAINT `cle_etrangere_produit_fournisseur` FOREIGN KEY (`pupuce_fournisseur_index_id`) REFERENCES `pupuce_fournisseur` (`pupuce_fournisseur_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
