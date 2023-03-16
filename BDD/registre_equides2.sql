-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 15, 2023 at 09:59 AM
-- Server version: 8.0.32-0ubuntu0.22.04.2
-- PHP Version: 8.1.2-1ubuntu2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registre_equides`
--

-- --------------------------------------------------------

--
-- Table structure for table `Acte`
--

CREATE TABLE `acte` (
  `id_acte` int NOT NULL AUTO_INCREMENT,
  `id_type_acte` int NOT NULL,
  `date` date NOT NULL,
  `details` varchar NOT NULL,
  `id_registre` int NOT NULL,
  `id_equide` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `affectation__Marechal`
--

CREATE TABLE `affectation_marechal` (
  `id_affectation_marechal` int NOT NULL AUTO_INCREMENT,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `id_registre` int NOT NULL,
  `id_marechal` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `affectation_veterinaire`
--

CREATE TABLE `affectation_veterinaire` (
  `id_affectation_veterinaire` int NOT NULL AUTO_INCREMENT,
  `type_veterinaire` enum('Sanitaire','Courant') NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `id_registre` int NOT NULL,
  `id_groupement_veterinaire` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Ascendance`
--

CREATE TABLE `ascendance` (
  `id_ascendance` int NOT NULL AUTO_INCREMENT,
  `type_ascendance` enum('Pere','Mere') NOT NULL,
  `id_equide` int NOT NULL,
  `nom` varchar(100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detenteur`
--

CREATE TABLE `detenteur` (
  `id_detenteur` int NOT NULL AUTO_INCREMENT,
  `sire` int NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `mot_de_passe` varchar(128) NOT NULL,
  `nombre_equides` int NOT NULL,
  `rue` varchar(100) NOT NULL,
  `commune` varchar(100) NOT NULL,
  `code_postal` int(5) NOT NULL,
  `signature_detenteur` varchar(100) NOT NULL,
  `date_enregistrement` date NOT NULL,
  `cachet_organisation` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `En_Pension`
--

CREATE TABLE `en_pension` (
  `id_pension` int NOT NULL AUTO_INCREMENT,
  `id_equide` int NOT NULL,
  `id_registre` int NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `equides`
--

CREATE TABLE `equides` (
  `id_equide` int NOT NULL AUTO_INCREMENT,
  `id_race` int NOT NULL,
  `id_proprietaire` int NOT NULL,
  `sire` int NOT NULL,
  `nom` varchar(100) NOT NULL,
  `date_naissance` date NOT NULL,
  `stud` varchar(100) NOT NULL,
  `lieu_elevage` varchar(100) NOT NULL,
  `sexe` enum('Mâle', 'Femelle') NOT NULL,
  `robe` varchar(100) NOT NULL,
  `ueln` int NOT NULL,
  `tete` varchar(100) NOT NULL,
  `antg` varchar(100) NOT NULL,
  `antd` varchar(100) NOT NULL,
  `postg` varchar(100) NOT NULL,
  `postd` varchar(100) NOT NULL,
  `marques` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `FIche_Transport`
--

CREATE TABLE `fiche_transport` (
  `id_transport` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `id_registre` int NOT NULL,
  `id_equide` int NOT NULL,
  `depart_transport` date NOT NULL,
  `entree_transport` date NOT NULL,
  `lieu_depart` varchar(100) NOT NULL,
  `motif_depart` varchar(100) NOT NULL,
  `motif_entree` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Groupement_Veterinaire`
--

CREATE TABLE `groupement_veterinaire` (
  `id_groupement_veterinaire` int NOT NULL AUTO_INCREMENT,
  `nom_groupement` varchar(100) NOT NULL,
  `clinique` varchar(100) NOT NULL,
  `rue` varchar(100) NOT NULL,
  `commune` varchar(100) NOT NULL,
  `code_postal` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Marechal`
--

CREATE TABLE `marechal` (
  `id_marechal` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `rue` varchar(100) NOT NULL,
  `commune` varchar(100) NOT NULL,
  `code_postal` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Proprietaire`
--

CREATE TABLE `proprietaire` (
  `id_proprietaire` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `rue` varchar(100) NOT NULL,
  `commune` varchar(100) NOT NULL,
  `code_postal` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Race`
--

CREATE TABLE `race` (
  `id_race` int NOT NULL AUTO_INCREMENT,
  `nom_race` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `registre_equides`
--

CREATE TABLE `registre_equides` (
  `id_registre` int NOT NULL AUTO_INCREMENT,
  `rue` varchar(100) NOT NULL,
  `commune` varchar(100) NOT NULL,
  `departement` varchar(50) NOT NULL,
  `code_postal` int(5) NOT NULL,
  `siret` int(14) NOT NULL,
  `espece` varchar(100) NOT NULL,
  `id_detenteur` int NOT NULL,
  `id_affectation_marechal` int NOT NULL,
  `id_affectation_veterinaire` int NOT NULL,
  `id_transport` int NOT NULL,
  `id_pension` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Type_Acte`
--

CREATE TABLE `type_acte` (
  `id_type_acte` int NOT NULL AUTO_INCREMENT,
  `nom_acte` varchar(100) NOT NULL,
  `acte` enum('Ferrage','Veterinaire') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Vaccins`
--

CREATE TABLE `vaccins` (
  `id_vaccin` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Veterinaire`
--

CREATE TABLE `veterinaire` (
  `id_veterinaire` int NOT NULL AUTO_INCREMENT,
  `rue` varchar(100) NOT NULL,
  `commune` varchar(100) NOT NULL,
  `code_postal` int(5) NOT NULL,
  `id_groupement_veterinaire` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Acte`
--
ALTER TABLE `acte`
  ADD PRIMARY KEY (`id_acte`),
  ADD KEY `type_acte` (`id_type_acte`),
  ADD KEY `registre` (`id_registre`),
  ADD KEY `equides` (`id_equide`);

--
-- Indexes for table `affectation__Marechal`
--
ALTER TABLE `affectation_marechal`
  ADD PRIMARY KEY (`id_affectation_marechal`),
  ADD KEY `registre` (`id_registre`),
  ADD KEY `marechal` (`id_marechal`);

--
-- Indexes for table `Affectation_veterinaire`
--
ALTER TABLE `affectation_veterinaire`
  ADD PRIMARY KEY (`id_affectation_veterinaire`),
  ADD KEY `registre` (`id_registre`),
  ADD KEY `grouprement_veterinaire` (`id_groupement_veterinaire`);

--
-- Indexes for table `Ascendance`
--
ALTER TABLE `ascendance`
  ADD PRIMARY KEY (`id_ascendance`),
  ADD KEY `equides` (`id_equide`);

--
-- Indexes for table `detenteur`
--
ALTER TABLE `detenteur`
  ADD PRIMARY KEY (`id_detenteur`);

--
-- Indexes for table `En_Pension`
--
ALTER TABLE `en_pension`
  ADD PRIMARY KEY (`id_pension`),
  ADD KEY `equides` (`id_equide`),
  ADD KEY `registre` (`id_registre`);

--
-- Indexes for table `equides`
--
ALTER TABLE `equides`
  ADD PRIMARY KEY (`id_equide`),
  ADD KEY `race` (`id_race`),
  ADD KEY `proprietaire` (`id_proprietaire`);

--
-- Indexes for table `FIche_Transport`
--
ALTER TABLE `fiche_transport`
  ADD PRIMARY KEY (`id_transport`),
  ADD KEY `registre` (`id_registre`),
  ADD KEY `equides` (`id_equide`);

--
-- Indexes for table `Groupement_veterinaire`
--
ALTER TABLE `groupement_veterinaire`
  ADD PRIMARY KEY (`id_groupement_veterinaire`);

--
-- Indexes for table `Marechal`
--
ALTER TABLE `marechal`
  ADD PRIMARY KEY (`id_marechal`);

--
-- Indexes for table `Proprietaire`
--
ALTER TABLE `proprietaire`
  ADD PRIMARY KEY (`id_proprietaire`);

--
-- Indexes for table `Race`
--
ALTER TABLE `race`
  ADD PRIMARY KEY (`id_race`);

--
-- Indexes for table `registre_equides`
--
ALTER TABLE `registre_equides`
  ADD PRIMARY KEY (`id_registre`),
  ADD KEY `dententeur` (`id_detenteur`),
  ADD KEY `affectation_marechal` (`id_affectation_marechal`),
  ADD KEY `affectation_veterinaire` (`id_affectation_veterinaire`),
  ADD KEY `transport` (`id_transport`),
  ADD KEY `pension` (`id_pension`);

--
-- Indexes for table `type_acte`
--
ALTER TABLE `type_acte`
  ADD PRIMARY KEY (`id_type_acte`);

--
-- Indexes for table `vaccins`
--
ALTER TABLE `vaccins`
  ADD PRIMARY KEY (`id_vaccin`);

--
-- Indexes for table `Veterinaire`
--
ALTER TABLE `veterinaire`
  ADD PRIMARY KEY (`id_veterinaire`),
  ADD KEY `groupement_veterinaire` (`id_groupement_veterinaire`);



--
-- Constraints for table `Acte`
--
ALTER TABLE `acte`
  ADD CONSTRAINT `acte_ibfk_1` FOREIGN KEY (`id_registre`) REFERENCES `registre_equides` (`id_registre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `acte_ibfk_2` FOREIGN KEY (`id_type_acte`) REFERENCES `type_acte` (`id_type_acte`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `affectation__Marechal`
--
ALTER TABLE `affectation__marechal`
  ADD CONSTRAINT `affectation__marechal_ibfk_1` FOREIGN KEY (`id_marechal`) REFERENCES `marechal` (`id_marechal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `affectation__marechal_ibfk_2` FOREIGN KEY (`id_registre`) REFERENCES `registre_equides` (`id_registre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Affectation_veterinaire`
--
ALTER TABLE `affectation_veterinaire`
  ADD CONSTRAINT `affectation_veterinaire_ibfk_1` FOREIGN KEY (`id_groupement_veterinaire`) REFERENCES `groupement_veterinaire` (`id_groupement_veterinaire`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `En_Pension`
--
ALTER TABLE `en_pension`
  ADD CONSTRAINT `en_pension_ibfk_1` FOREIGN KEY (`id_registre`) REFERENCES `registre_equides` (`id_registre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `registre_equides`
--
ALTER TABLE `registre_equides`
  ADD CONSTRAINT `registre_equides_ibfk_1` FOREIGN KEY (`id_detenteur`) REFERENCES `detenteur` (`id_detenteur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registre_equides_ibfk_2` FOREIGN KEY (`id_affectation_marechal`) REFERENCES `affectation__marechal` (`id_affectation_marechal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registre_equides_ibfk_3` FOREIGN KEY (`id_transport`) REFERENCES `fiche_transport` (`id_transport`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Type_Acte`
--
ALTER TABLE `type_acte`
  ADD CONSTRAINT `type_acte_ibfk_1` FOREIGN KEY (`id_type_acte`) REFERENCES `vaccins` (`id_vaccin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Veterinaire`
--
ALTER TABLE `veterinaire`
  ADD CONSTRAINT `veterinaire_ibfk_1` FOREIGN KEY (`id_groupement_veterinaire`) REFERENCES `groupement_veterinaire` (`id_groupement_veterinaire`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
