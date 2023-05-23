-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 23 mai 2023 à 09:49
-- Version du serveur : 5.7.24
-- Version de PHP : 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbs10369264`
--

-- --------------------------------------------------------

--
-- Structure de la table `acte`
--

CREATE TABLE `acte` (
  `id_acte` int(11) NOT NULL,
  `id_type_acte` int(11) DEFAULT NULL,
  `id_equide` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `acte`
--

INSERT INTO `acte` (`id_acte`, `id_type_acte`, `id_equide`, `date`, `details`) VALUES
(1, 31, 10, '2023-04-05', 'Test 1'),
(2, 32, 10, '2023-04-08', 'Test2');

-- --------------------------------------------------------

--
-- Structure de la table `affectation_marechal`
--

CREATE TABLE `affectation_marechal` (
  `id_affectation_marechal` int(11) NOT NULL,
  `id_marechal` int(11) NOT NULL,
  `id_registre` int(11) DEFAULT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `affectation_marechal`
--

INSERT INTO `affectation_marechal` (`id_affectation_marechal`, `id_marechal`, `id_registre`, `date_debut`, `date_fin`) VALUES
(1, 1, 1, '2023-03-20', '2024-03-20');

-- --------------------------------------------------------

--
-- Structure de la table `affectation_veterinaire`
--

CREATE TABLE `affectation_veterinaire` (
  `id_affectation_veterinaire` int(11) NOT NULL,
  `type_veterinaire` enum('Sanitaire','Courant') NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `id_registre` int(11) NOT NULL,
  `id_veterinaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `affectation_veterinaire`
--

INSERT INTO `affectation_veterinaire` (`id_affectation_veterinaire`, `type_veterinaire`, `date_debut`, `date_fin`, `id_registre`, `id_veterinaire`) VALUES
(1, 'Sanitaire', '2023-02-15', '2023-08-15', 1, 1),
(3, 'Sanitaire', '2023-04-19', '2023-04-28', 1, 2),
(5, 'Courant', '2023-04-11', '2023-04-30', 1, 5),
(6, 'Courant', '2023-04-28', '2023-04-30', 1, 6);

-- --------------------------------------------------------

--
-- Structure de la table `ascendance`
--

CREATE TABLE `ascendance` (
  `id_ascendance` int(11) NOT NULL,
  `id_equide` int(11) DEFAULT NULL,
  `id_race` int(11) DEFAULT NULL,
  `type_ascendance` enum('Pere','Mere') NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `sire` int(20) DEFAULT NULL,
  `couleur` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ascendance`
--

INSERT INTO `ascendance` (`id_ascendance`, `id_equide`, `id_race`, `type_ascendance`, `nom`, `sire`, `couleur`) VALUES
(1, 10, 1, 'Pere', 'Zakari pere', 123456689, 'Brun'),
(6, 10, 3, 'Mere', 'Mere Zakari', 616618946, 'Brun');

-- --------------------------------------------------------

--
-- Structure de la table `detenteur`
--

CREATE TABLE `detenteur` (
  `id_detenteur` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `sire` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `nombre_equides` int(11) NOT NULL,
  `rue` varchar(100) NOT NULL,
  `commune` varchar(100) NOT NULL,
  `code_postal` int(11) NOT NULL,
  `signature_detenteur` varchar(100) NOT NULL,
  `date_enregistrement` date NOT NULL,
  `nationalite` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `detenteur`
--

INSERT INTO `detenteur` (`id_detenteur`, `id_login`, `sire`, `nom`, `prenom`, `nombre_equides`, `rue`, `commune`, `code_postal`, `signature_detenteur`, `date_enregistrement`, `nationalite`) VALUES
(1, 1, 350542557, 'KAPOLAS', 'Dimitri', 1, '7 allée des bois', 'Thionville', 57100, 'CRoyal', '2023-03-19', 'Français'),
(2, 2, 4551515, 'RAPT', 'Benjamin', 3, '485 rrrr', 'rrerrr', 54250, '', '2023-03-27', 'FRANCE'),
(3, 8, 113456788, 'Kakapolas', 'Dimitri', 1, '1 place du bastion', 'Metz', 57000, 'DK', '2023-04-19', 'Française');

-- --------------------------------------------------------

--
-- Structure de la table `en_pension`
--

CREATE TABLE `en_pension` (
  `id_pension` int(11) NOT NULL,
  `id_equide` int(11) NOT NULL,
  `id_registre` int(11) DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `en_pension`
--

INSERT INTO `en_pension` (`id_pension`, `id_equide`, `id_registre`, `date_debut`, `date_fin`) VALUES
(11, 10, 1, '2023-04-10', '2023-04-29');

-- --------------------------------------------------------

--
-- Structure de la table `equide`
--

CREATE TABLE `equide` (
  `id_equide` int(11) NOT NULL,
  `id_race` int(11) DEFAULT NULL,
  `id_proprietaire` int(11) NOT NULL,
  `sire` int(11) NOT NULL,
  `ueln` bigint(20) DEFAULT NULL,
  `nom` varchar(100) NOT NULL,
  `date_naissance` date NOT NULL,
  `stud` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `lieu_naissance` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `sexe` enum('Mâle','Femelle') NOT NULL,
  `robe` varchar(100) NOT NULL,
  `tete` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `antg` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `antd` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `postg` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `postd` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `marques` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `lieu_elevage` varchar(100) DEFAULT NULL,
  `naisseur` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `equide`
--

INSERT INTO `equide` (`id_equide`, `id_race`, `id_proprietaire`, `sire`, `ueln`, `nom`, `date_naissance`, `stud`, `lieu_naissance`, `sexe`, `robe`, `tete`, `antg`, `antd`, `postg`, `postd`, `marques`, `lieu_elevage`, `naisseur`) VALUES
(10, 2, 1, 684649847, 6464984649844, 'Zakari', '2023-04-05', 'adad', 'Lille', 'Mâle', 'zzz', 'Rien', 'Rien', 'Tâche de 10cm', 'Rien', 'Rien', 'Marque brune sur la jambe droite', 'zzz', 'Jesus');

-- --------------------------------------------------------

--
-- Structure de la table `fiche_transport`
--

CREATE TABLE `fiche_transport` (
  `id_transport` int(11) NOT NULL,
  `id_registre` int(11) NOT NULL,
  `id_equide` int(11) NOT NULL,
  `date_depart` date NOT NULL,
  `date_arrivee` date NOT NULL,
  `lieu_depart` varchar(100) NOT NULL,
  `lieu_arrivee` varchar(100) NOT NULL,
  `motif_deplacement` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fiche_transport`
--

INSERT INTO `fiche_transport` (`id_transport`, `id_registre`, `id_equide`, `date_depart`, `date_arrivee`, `lieu_depart`, `lieu_arrivee`, `motif_deplacement`) VALUES
(1, 1, 10, '2023-04-03', '2023-04-07', 'Metz', 'Paris', 'Concours'),
(2, 1, 10, '2023-04-21', '2023-04-29', 'Metz', 'Paris', 'Concours');

-- --------------------------------------------------------

--
-- Structure de la table `groupement_veterinaire`
--

CREATE TABLE `groupement_veterinaire` (
  `id_groupement_veterinaire` int(11) NOT NULL,
  `id_registre` int(11) DEFAULT NULL,
  `nom_groupement` varchar(100) NOT NULL,
  `rue` varchar(100) NOT NULL,
  `commune` varchar(100) NOT NULL,
  `code_postal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `groupement_veterinaire`
--

INSERT INTO `groupement_veterinaire` (`id_groupement_veterinaire`, `id_registre`, `nom_groupement`, `rue`, `commune`, `code_postal`) VALUES
(1, 1, 'Les amis des Chevaux', '55 rue Jeanne Darc', 'Nancy', 54000),
(2, 1, 'Des equides pour la vie', '21 rue Jean Lamour', 'Nancy', 54000);

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id_image` int(11) NOT NULL,
  `id_equide` int(11) DEFAULT NULL,
  `image` varchar(125) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id_image`, `id_equide`, `image`) VALUES
(4, 10, '1680531134cheval-mustang.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `email` varchar(65) CHARACTER SET utf8mb4 NOT NULL,
  `mot_de_passe` varchar(128) CHARACTER SET utf8mb4 NOT NULL,
  `secret1` varchar(65) DEFAULT NULL,
  `secret2` varchar(65) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`id_login`, `email`, `mot_de_passe`, `secret1`, `secret2`) VALUES
(1, 'dimitri.kapolas@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', NULL, NULL),
(2, 'benji.54000@live.fr', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', NULL, NULL),
(3, 'rapt.benjamin@orange.fr', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', NULL, NULL),
(7, 'dmio@mail.fr', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', NULL, NULL),
(8, 'dimitri.kapolas04@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `marechal`
--

CREATE TABLE `marechal` (
  `id_marechal` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `rue` varchar(100) NOT NULL,
  `commune` varchar(100) NOT NULL,
  `code_postal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `marechal`
--

INSERT INTO `marechal` (`id_marechal`, `nom`, `prenom`, `rue`, `commune`, `code_postal`) VALUES
(1, 'EASTWOOD', 'Clint', '3 rue de limpitoyable', 'Durenque', 12092),
(2, 'MELON', 'Jacques', '21 impasse du bois', 'Liverdun', 54460);

-- --------------------------------------------------------

--
-- Structure de la table `proprietaire`
--

CREATE TABLE `proprietaire` (
  `id_proprietaire` int(11) NOT NULL,
  `id_login` int(11) DEFAULT NULL,
  `id_unique` varchar(8) DEFAULT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `rue` varchar(100) NOT NULL,
  `commune` varchar(100) NOT NULL,
  `code_postal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `proprietaire`
--

INSERT INTO `proprietaire` (`id_proprietaire`, `id_login`, `id_unique`, `nom`, `prenom`, `rue`, `commune`, `code_postal`) VALUES
(1, NULL, NULL, 'KAPOLAS', 'Dimitri', '8 rue de Metz', 'Metz', 57000),
(2, NULL, NULL, 'ANDRE', 'Noé', '6 rue de Metz', 'Metz', 57000),
(3, NULL, NULL, 'RAPT', 'Benjamin', '14 rue de Nancy', 'Nancy', 54000),
(4, NULL, NULL, 'ANASSI', 'Cédric', '10 rue de Pau', 'Pau', 64000),
(5, NULL, NULL, 'CHANTREIN', 'Maxence', '3 Grande Rue', 'Epinal', 88100),
(6, 3, NULL, 'RAPT', 'Benjamin', '14 rue du Dimitri', 'Nancy', 54000),
(7, 7, '2OEBEULV', 'Test', 'Générate', '111', '111', 57000);

-- --------------------------------------------------------

--
-- Structure de la table `race`
--

CREATE TABLE `race` (
  `id_race` int(11) NOT NULL,
  `nom_race` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `race`
--

INSERT INTO `race` (`id_race`, `nom_race`) VALUES
(1, 'Quarter Horse'),
(2, 'Pur-sang Arabe'),
(3, 'Pur-sang Anglais'),
(4, 'Frison'),
(5, 'Mustang');

-- --------------------------------------------------------

--
-- Structure de la table `registre_equide`
--

CREATE TABLE `registre_equide` (
  `id_registre` int(11) NOT NULL,
  `nom_ecurie` varchar(100) NOT NULL,
  `rue` varchar(100) NOT NULL,
  `commune` varchar(100) NOT NULL,
  `code_postal` int(11) NOT NULL,
  `siret` int(11) DEFAULT NULL,
  `espece` varchar(100) DEFAULT NULL,
  `id_detenteur` int(11) NOT NULL,
  `id_affectation_marechal` int(11) DEFAULT NULL,
  `id_affectation_veterinaire` int(11) DEFAULT NULL,
  `cachet_organisation` varchar(100) DEFAULT NULL,
  `signature_organisation` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `registre_equide`
--

INSERT INTO `registre_equide` (`id_registre`, `nom_ecurie`, `rue`, `commune`, `code_postal`, `siret`, `espece`, `id_detenteur`, `id_affectation_marechal`, `id_affectation_veterinaire`, `cachet_organisation`, `signature_organisation`) VALUES
(1, 'Des équides pour la vie', '10 rue de la marmite', 'Metz', 57950, 24520051, 'Equides', 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `traitement`
--

CREATE TABLE `traitement` (
  `id_traitement` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `traitement`
--

INSERT INTO `traitement` (`id_traitement`, `nom`) VALUES
(15, '364645'),
(16, 'E12981');

-- --------------------------------------------------------

--
-- Structure de la table `type_acte`
--

CREATE TABLE `type_acte` (
  `id_type_acte` int(11) NOT NULL,
  `nom_acte` varchar(100) NOT NULL,
  `acte` enum('Ferrage','Veterinaire') NOT NULL,
  `id_vaccin` int(11) DEFAULT NULL,
  `id_traitement` int(11) DEFAULT NULL,
  `id_vermifuge` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_acte`
--

INSERT INTO `type_acte` (`id_type_acte`, `nom_acte`, `acte`, `id_vaccin`, `id_traitement`, `id_vermifuge`) VALUES
(31, 'Rhume', 'Veterinaire', NULL, 15, NULL),
(32, 'Rhume2', 'Veterinaire', NULL, 16, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `vaccin`
--

CREATE TABLE `vaccin` (
  `id_vaccin` int(11) NOT NULL,
  `lieu` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `maladie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `vermifuge`
--

CREATE TABLE `vermifuge` (
  `id_vermifuge` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `veterinaire`
--

CREATE TABLE `veterinaire` (
  `id_veterinaire` int(11) NOT NULL,
  `nom` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `prenom` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `rue` varchar(100) NOT NULL,
  `commune` varchar(100) NOT NULL,
  `code_postal` int(11) NOT NULL,
  `id_groupement_veterinaire` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `veterinaire`
--

INSERT INTO `veterinaire` (`id_veterinaire`, `nom`, `prenom`, `rue`, `commune`, `code_postal`, `id_groupement_veterinaire`) VALUES
(1, 'ROBERT', 'Daniel', '31 rue de la commanderie', 'Nancy', 54000, 1),
(2, 'VALJEAN', 'Jean', '64 rue du Maréchel Juin', 'Nancy', 54000, 2),
(3, 'DURAND', 'Patrick', '13 rue de la biche', 'Metz', 57000, 1),
(5, 'Veto ', 'TESST2', '1 place du bastion', 'Metz', 57000, 2),
(6, 'Veto 2', 'Test', '1 place du bastion', 'Metz', 57000, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `acte`
--
ALTER TABLE `acte`
  ADD PRIMARY KEY (`id_acte`),
  ADD KEY `type_acte` (`id_type_acte`),
  ADD KEY `equide` (`id_equide`);

--
-- Index pour la table `affectation_marechal`
--
ALTER TABLE `affectation_marechal`
  ADD PRIMARY KEY (`id_affectation_marechal`),
  ADD KEY `registre` (`id_registre`),
  ADD KEY `marechal` (`id_marechal`);

--
-- Index pour la table `affectation_veterinaire`
--
ALTER TABLE `affectation_veterinaire`
  ADD PRIMARY KEY (`id_affectation_veterinaire`),
  ADD KEY `registre` (`id_registre`),
  ADD KEY `grouprement_veterinaire` (`id_veterinaire`);

--
-- Index pour la table `ascendance`
--
ALTER TABLE `ascendance`
  ADD PRIMARY KEY (`id_ascendance`),
  ADD KEY `race` (`id_race`),
  ADD KEY `equide` (`id_equide`);

--
-- Index pour la table `detenteur`
--
ALTER TABLE `detenteur`
  ADD PRIMARY KEY (`id_detenteur`),
  ADD KEY `login` (`id_login`);

--
-- Index pour la table `en_pension`
--
ALTER TABLE `en_pension`
  ADD PRIMARY KEY (`id_pension`),
  ADD KEY `equides` (`id_equide`),
  ADD KEY `registre` (`id_registre`);

--
-- Index pour la table `equide`
--
ALTER TABLE `equide`
  ADD PRIMARY KEY (`id_equide`),
  ADD KEY `race` (`id_race`),
  ADD KEY `proprietaire` (`id_proprietaire`);

--
-- Index pour la table `fiche_transport`
--
ALTER TABLE `fiche_transport`
  ADD PRIMARY KEY (`id_transport`),
  ADD KEY `registre` (`id_registre`),
  ADD KEY `equides` (`id_equide`);

--
-- Index pour la table `groupement_veterinaire`
--
ALTER TABLE `groupement_veterinaire`
  ADD PRIMARY KEY (`id_groupement_veterinaire`),
  ADD KEY `registre` (`id_groupement_veterinaire`),
  ADD KEY `registre_ibfk_1` (`id_registre`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `equide` (`id_equide`);

--
-- Index pour la table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`) USING BTREE;

--
-- Index pour la table `marechal`
--
ALTER TABLE `marechal`
  ADD PRIMARY KEY (`id_marechal`);

--
-- Index pour la table `proprietaire`
--
ALTER TABLE `proprietaire`
  ADD PRIMARY KEY (`id_proprietaire`),
  ADD KEY `login` (`id_login`);

--
-- Index pour la table `race`
--
ALTER TABLE `race`
  ADD PRIMARY KEY (`id_race`);

--
-- Index pour la table `registre_equide`
--
ALTER TABLE `registre_equide`
  ADD PRIMARY KEY (`id_registre`),
  ADD KEY `dententeur` (`id_detenteur`),
  ADD KEY `affectation_marechal` (`id_affectation_marechal`),
  ADD KEY `affectation_veterinaire` (`id_affectation_veterinaire`);

--
-- Index pour la table `traitement`
--
ALTER TABLE `traitement`
  ADD PRIMARY KEY (`id_traitement`);

--
-- Index pour la table `type_acte`
--
ALTER TABLE `type_acte`
  ADD PRIMARY KEY (`id_type_acte`),
  ADD KEY `id_traitement` (`id_traitement`),
  ADD KEY `id_vermifuge` (`id_vermifuge`),
  ADD KEY `id_vaccin` (`id_vaccin`) USING BTREE;

--
-- Index pour la table `vaccin`
--
ALTER TABLE `vaccin`
  ADD PRIMARY KEY (`id_vaccin`);

--
-- Index pour la table `vermifuge`
--
ALTER TABLE `vermifuge`
  ADD PRIMARY KEY (`id_vermifuge`);

--
-- Index pour la table `veterinaire`
--
ALTER TABLE `veterinaire`
  ADD PRIMARY KEY (`id_veterinaire`),
  ADD KEY `groupement_veterinaire` (`id_groupement_veterinaire`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `acte`
--
ALTER TABLE `acte`
  MODIFY `id_acte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `affectation_marechal`
--
ALTER TABLE `affectation_marechal`
  MODIFY `id_affectation_marechal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `affectation_veterinaire`
--
ALTER TABLE `affectation_veterinaire`
  MODIFY `id_affectation_veterinaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `ascendance`
--
ALTER TABLE `ascendance`
  MODIFY `id_ascendance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `detenteur`
--
ALTER TABLE `detenteur`
  MODIFY `id_detenteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `en_pension`
--
ALTER TABLE `en_pension`
  MODIFY `id_pension` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `equide`
--
ALTER TABLE `equide`
  MODIFY `id_equide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `fiche_transport`
--
ALTER TABLE `fiche_transport`
  MODIFY `id_transport` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `groupement_veterinaire`
--
ALTER TABLE `groupement_veterinaire`
  MODIFY `id_groupement_veterinaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `marechal`
--
ALTER TABLE `marechal`
  MODIFY `id_marechal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `proprietaire`
--
ALTER TABLE `proprietaire`
  MODIFY `id_proprietaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `race`
--
ALTER TABLE `race`
  MODIFY `id_race` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `registre_equide`
--
ALTER TABLE `registre_equide`
  MODIFY `id_registre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `traitement`
--
ALTER TABLE `traitement`
  MODIFY `id_traitement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `type_acte`
--
ALTER TABLE `type_acte`
  MODIFY `id_type_acte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `vaccin`
--
ALTER TABLE `vaccin`
  MODIFY `id_vaccin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `vermifuge`
--
ALTER TABLE `vermifuge`
  MODIFY `id_vermifuge` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `veterinaire`
--
ALTER TABLE `veterinaire`
  MODIFY `id_veterinaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `acte`
--
ALTER TABLE `acte`
  ADD CONSTRAINT `acte_ibfk_1` FOREIGN KEY (`id_equide`) REFERENCES `equide` (`id_equide`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `acte_ibfk_2` FOREIGN KEY (`id_type_acte`) REFERENCES `type_acte` (`id_type_acte`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `affectation_marechal`
--
ALTER TABLE `affectation_marechal`
  ADD CONSTRAINT `affectation_marechal_ibfk_1` FOREIGN KEY (`id_marechal`) REFERENCES `marechal` (`id_marechal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `affectation_marechal_ibfk_2` FOREIGN KEY (`id_registre`) REFERENCES `registre_equide` (`id_registre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `affectation_veterinaire`
--
ALTER TABLE `affectation_veterinaire`
  ADD CONSTRAINT `affectation_veterinaire_ibfk_1` FOREIGN KEY (`id_veterinaire`) REFERENCES `veterinaire` (`id_veterinaire`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `affectation_veterinaire_ibfk_2` FOREIGN KEY (`id_registre`) REFERENCES `registre_equide` (`id_registre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ascendance`
--
ALTER TABLE `ascendance`
  ADD CONSTRAINT `ascendance_ibfk_1` FOREIGN KEY (`id_race`) REFERENCES `race` (`id_race`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ascendance_ibfk_2` FOREIGN KEY (`id_equide`) REFERENCES `equide` (`id_equide`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `detenteur`
--
ALTER TABLE `detenteur`
  ADD CONSTRAINT `detenteur_ibfk_1` FOREIGN KEY (`id_login`) REFERENCES `login` (`id_login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `en_pension`
--
ALTER TABLE `en_pension`
  ADD CONSTRAINT `en_pension_ibfk_1` FOREIGN KEY (`id_registre`) REFERENCES `registre_equide` (`id_registre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `en_pension_ibfk_2` FOREIGN KEY (`id_equide`) REFERENCES `equide` (`id_equide`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `equide`
--
ALTER TABLE `equide`
  ADD CONSTRAINT `equide_ibfk_1` FOREIGN KEY (`id_proprietaire`) REFERENCES `proprietaire` (`id_proprietaire`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `equide_ibfk_2` FOREIGN KEY (`id_race`) REFERENCES `race` (`id_race`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `fiche_transport`
--
ALTER TABLE `fiche_transport`
  ADD CONSTRAINT `fiche_transport_ibfk_1` FOREIGN KEY (`id_registre`) REFERENCES `registre_equide` (`id_registre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fiche_transport_ibfk_2` FOREIGN KEY (`id_equide`) REFERENCES `equide` (`id_equide`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `groupement_veterinaire`
--
ALTER TABLE `groupement_veterinaire`
  ADD CONSTRAINT `registre_ibfk_1` FOREIGN KEY (`id_registre`) REFERENCES `registre_equide` (`id_registre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`id_equide`) REFERENCES `equide` (`id_equide`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `proprietaire`
--
ALTER TABLE `proprietaire`
  ADD CONSTRAINT `proprietaire_ibfk_1` FOREIGN KEY (`id_login`) REFERENCES `login` (`id_login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `registre_equide`
--
ALTER TABLE `registre_equide`
  ADD CONSTRAINT `registre_equide_ibfk_1` FOREIGN KEY (`id_detenteur`) REFERENCES `detenteur` (`id_detenteur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registre_equide_ibfk_2` FOREIGN KEY (`id_affectation_marechal`) REFERENCES `affectation_marechal` (`id_affectation_marechal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registre_equide_ibfk_3` FOREIGN KEY (`id_affectation_veterinaire`) REFERENCES `affectation_veterinaire` (`id_affectation_veterinaire`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `type_acte`
--
ALTER TABLE `type_acte`
  ADD CONSTRAINT `type_acte_ibfk_1` FOREIGN KEY (`id_vaccin`) REFERENCES `vaccin` (`id_vaccin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `type_acte_ibfk_2` FOREIGN KEY (`id_traitement`) REFERENCES `traitement` (`id_traitement`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `type_acte_ibfk_3` FOREIGN KEY (`id_vermifuge`) REFERENCES `vermifuge` (`id_vermifuge`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `veterinaire`
--
ALTER TABLE `veterinaire`
  ADD CONSTRAINT `veterinaire_ibfk_1` FOREIGN KEY (`id_groupement_veterinaire`) REFERENCES `groupement_veterinaire` (`id_groupement_veterinaire`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
