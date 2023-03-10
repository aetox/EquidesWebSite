-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 13, 2023 at 03:07 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tqbjsdmportfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `adresse`
--

CREATE TABLE `adresse` (
  `id_adresse` int(11) NOT NULL,
  `numeroRue_adresse` int(11) DEFAULT NULL,
  `rue_adresse` varchar(50) DEFAULT NULL,
  `ville_adresse` varchar(50) DEFAULT NULL,
  `codePostale_adresse` int(11) DEFAULT NULL,
  `pays_adresse` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adresse`
--

INSERT INTO `adresse` (`id_adresse`, `numeroRue_adresse`, `rue_adresse`, `ville_adresse`, `codePostale_adresse`, `pays_adresse`) VALUES
(1, 54, 'rue de la Mouette XV', 'Toulouse', 33000, 'France'),
(2, 4, 'avenue Belle Vue', 'Marseille', 13000, 'France'),
(3, 13, 'boulvard Henri IV', 'Nancy', 54000, 'France');

-- --------------------------------------------------------

--
-- Table structure for table `corps`
--

CREATE TABLE `corps` (
  `id_corps` int(11) NOT NULL,
  `equide` int(11) DEFAULT NULL,
  `tete_corps` varchar(50) DEFAULT NULL,
  `antG_corps` varchar(50) DEFAULT NULL,
  `antD_corps` varchar(50) DEFAULT NULL,
  `postG_corps` varchar(50) DEFAULT NULL,
  `postD_corps` varchar(50) DEFAULT NULL,
  `marques_corps` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `corps`
--

INSERT INTO `corps` (`id_corps`, `equide`, `tete_corps`, `antG_corps`, `antD_corps`, `postG_corps`, `postD_corps`, `marques_corps`) VALUES
(1, 1, 'tache sur le nez', NULL, NULL, NULL, NULL, 'tr??s bonne marque rep??re'),
(2, 2, 'tache sur l\'oeil', NULL, NULL, 'tache jaune', NULL, NULL),
(3, 3, NULL, 'cicatrice', NULL, NULL, NULL, 'marqu?? au fer');

-- --------------------------------------------------------

--
-- Table structure for table `detenteur`
--

CREATE TABLE `detenteur` (
  `id_detenteur` int(11) NOT NULL,
  `sire` int(11) NOT NULL,
  `equide` int(11) DEFAULT NULL,
  `nom_detenteur` varchar(50) DEFAULT NULL,
  `prenom_detenteur` varchar(50) DEFAULT NULL,
  `mail_detenteur` varchar(50) DEFAULT NULL,
  `password_detenteur` varchar(255) DEFAULT NULL,
  `nbEquide_detenteur` int(11) DEFAULT NULL,
  `adresse_detenteur` int(11) DEFAULT NULL,
  `nationalite_detenteur` varchar(50) DEFAULT NULL,
  `signature_detenteur` varchar(50) DEFAULT NULL,
  `dateEnregistrement_detenteur` date DEFAULT NULL,
  `cachetOrganisation_detenteur` varchar(50) DEFAULT NULL,
  `signatureOrganisation_detenteur` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detenteur`
--

INSERT INTO `detenteur` (`id_detenteur`, `sire`, `equide`, `nom_detenteur`, `prenom_detenteur`, `mail_detenteur`, `password_detenteur`, `nbEquide_detenteur`, `adresse_detenteur`, `nationalite_detenteur`, `signature_detenteur`, `dateEnregistrement_detenteur`, `cachetOrganisation_detenteur`, `signatureOrganisation_detenteur`) VALUES
(1, 0, 1, 'Vador', 'Dark', 'vadordark@mail.com', 'mdp', 2, 1, 'Fran??ais', 'img/signature_detenteur/1', '2022-04-05', 'img/cachet/1', 'img/signature_organisation/1'),
(2, 0, 3, 'Malfoix', 'Daglas', 'dagloo@mail.com', 'mdp', 5, 3, 'Fran??ais', 'img/signature_detenteur/2', '2021-05-24', 'img/cachet/2', 'img/signature_organisation/2'),
(3, 0, 2, 'Damso', 'Emilien', 'thevie@mail.fr', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1, 2, 'Fran??ais', 'img/signature_detenteur/3', '2022-02-24', 'img/cachet/3', 'img/signature_organisation/3'),
(10, 66666, NULL, 'Kapolas', 'Dimitri', 'dimitri@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 7384, NULL, 'Kapolas', 'Dimitri', 'dimitri.kapolas@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 77777, NULL, 'Andr??', 'No??', 'no??@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `equide`
--

CREATE TABLE `equide` (
  `numSIRE` int(11) NOT NULL,
  `numUELN` int(11) NOT NULL,
  `id_detenteur` int(11) NOT NULL,
  `nom_equide` varchar(100) DEFAULT NULL,
  `dateNaissance_equide` date DEFAULT NULL,
  `lieuNaissance_equide` varchar(50) DEFAULT NULL,
  `race_equide` varchar(50) DEFAULT NULL,
  `stud_equide` varchar(50) DEFAULT NULL,
  `lieuElevage_equide` varchar(50) DEFAULT NULL,
  `sexe_equide` varchar(10) DEFAULT NULL,
  `robe_equide` varchar(50) DEFAULT NULL,
  `naisseurVeterinaire_equide` varchar(50) DEFAULT NULL,
  `pere_equide` int(11) DEFAULT NULL,
  `mere_equide` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `equide`
--

INSERT INTO `equide` (`numSIRE`, `numUELN`, `id_detenteur`, `nom_equide`, `dateNaissance_equide`, `lieuNaissance_equide`, `race_equide`, `stud_equide`, `lieuElevage_equide`, `sexe_equide`, `robe_equide`, `naisseurVeterinaire_equide`, `pere_equide`, `mere_equide`) VALUES
(1, 1, 0, 'equide1', '2023-02-24', 'France', 'Brun de Neully', 'Equitile_stud', 'Paname', 'M??le', 'robe brune', 'Gilles le naisseur', 2, 3),
(2, 2333443, 3, 'equide2', '2023-02-23', 'France', 'Blonde Heaven', 'Equitile_stud', 'Nancy', 'M??le', 'robe blonde', 'Pierre le naisseur', 2, 3),
(3, 34443, 3, 'equide3', '2023-02-22', 'France', 'Rousse de Tyse', 'Equitile_stud', 'Paris', 'Femelle', 'robe rousse', 'Edouard le naisseur', 2, 3),
(6132165, 65131, 12, 'Benjamin  Cheval', '2023-03-16', 'Metz', 'a', 'a', 'a', 'M', 'a', 'a', 1, 1),
(123456789, 454545, 12, 'Cheval  Dimitri', '2023-03-09', 'Metz', 'Bleu', 'a', 'a', 'M', 'a', 'a', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fiche_transport`
--

CREATE TABLE `fiche_transport` (
  `id_deplacement` int(11) NOT NULL,
  `entree_transport` date DEFAULT NULL,
  `lieuEntree_transport` varchar(50) DEFAULT NULL,
  `motifEntree_transport` varchar(200) DEFAULT NULL,
  `depart_transport` date DEFAULT NULL,
  `lieuDepart_transport` varchar(50) DEFAULT NULL,
  `motifDepart_transport` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fiche_transport`
--

INSERT INTO `fiche_transport` (`id_deplacement`, `entree_transport`, `lieuEntree_transport`, `motifEntree_transport`, `depart_transport`, `lieuDepart_transport`, `motifDepart_transport`) VALUES
(1, '2023-02-24', 'Porte de Saint-Ouen', 'Prise d\'Otage', '2023-02-28', 'Porte de Saint-Ouen', 'Rendu au terro');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `img` varchar(1000) NOT NULL,
  `id_equide` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `img`, `id_equide`) VALUES
(74, '1678219743cheval-mustang.jpg', 12346),
(75, '1678221844870x489_origines-equides-cheval.jpg', 653215),
(89, '1678479217BQXU5816.JPG', 7384),
(90, '1678616581fond ecran 1.png', 123456789),
(91, '1678694325fond_d_ecran_licorne_humour.jpg', 6132165),
(92, '16787024191631230674905.jfif', 77777);

-- --------------------------------------------------------

--
-- Table structure for table `lieudetention`
--

CREATE TABLE `lieudetention` (
  `id_lieuDetention` int(11) NOT NULL,
  `adresse_lieuDetention` int(11) DEFAULT NULL,
  `typeActivite_lieuDetention` varchar(50) DEFAULT NULL,
  `detenteur` int(11) DEFAULT NULL,
  `numSIRET` int(11) DEFAULT NULL,
  `espece_lieuDetention` varchar(50) DEFAULT NULL,
  `race_lieuDetention` varchar(50) DEFAULT NULL,
  `veterinaireTraitant_lieuDetention` int(11) DEFAULT NULL,
  `veterinaireSanitaire_lieuDetention` int(11) DEFAULT NULL,
  `organismeSanitaire` int(11) DEFAULT NULL,
  `marechalFerrant` int(11) DEFAULT NULL,
  `equide` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lieudetention`
--

INSERT INTO `lieudetention` (`id_lieuDetention`, `adresse_lieuDetention`, `typeActivite_lieuDetention`, `detenteur`, `numSIRET`, `espece_lieuDetention`, `race_lieuDetention`, `veterinaireTraitant_lieuDetention`, `veterinaireSanitaire_lieuDetention`, `organismeSanitaire`, `marechalFerrant`, `equide`) VALUES
(1, 1, 'Elevage', 1, 44334, 'espece ?? robe courte', 'race royal', 1, 1, 1, 1, 1),
(2, 2, 'Elevage pour coridda', 3, 45, 'espece ?? robe longue', 'race majestieuse', 2, 2, 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE `list` (
  `id_list` int(11) NOT NULL,
  `nom_list` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`id_list`, `nom_list`) VALUES
(1, 'Syst??mes et R??seaux'),
(2, 'Developpement');

-- --------------------------------------------------------

--
-- Table structure for table `marechalferrant`
--

CREATE TABLE `marechalferrant` (
  `id_marechal` int(11) NOT NULL,
  `nom_marechal` varchar(50) DEFAULT NULL,
  `prenom_marechal` varchar(50) DEFAULT NULL,
  `telephone_marechal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marechalferrant`
--

INSERT INTO `marechalferrant` (`id_marechal`, `nom_marechal`, `prenom_marechal`, `telephone_marechal`) VALUES
(1, 'La dune', 'Paul', 601020304),
(2, 'Crimi', 'Kalash', 606060606),
(3, 'Doumams', 'Gilbert', 712345678);

-- --------------------------------------------------------

--
-- Table structure for table `organismesanitaire`
--

CREATE TABLE `organismesanitaire` (
  `id_organismeSanitaire` int(11) NOT NULL,
  `nom_organismeSanitaire` varchar(50) DEFAULT NULL,
  `adresse_organismeSanitaire` int(11) DEFAULT NULL,
  `telephone_organismeSanitaire` int(11) DEFAULT NULL,
  `website_OrganisleSanitaire` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organismesanitaire`
--

INSERT INTO `organismesanitaire` (`id_organismeSanitaire`, `nom_organismeSanitaire`, `adresse_organismeSanitaire`, `telephone_organismeSanitaire`, `website_OrganisleSanitaire`) VALUES
(1, 'Organisme de chevaux', 3, 504030201, 'aimelescheveuaux@mail.fr'),
(2, 'We Love Hoes', 1, NULL, 'brosbeforehoes@mail.fr');

-- --------------------------------------------------------

--
-- Table structure for table `projet`
--

CREATE TABLE `projet` (
  `id_projet` int(11) NOT NULL,
  `nom_projet` varchar(50) NOT NULL,
  `img_projet` varchar(100) NOT NULL,
  `id_list` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projet`
--

INSERT INTO `projet` (`id_projet`, `nom_projet`, `img_projet`, `id_list`) VALUES
(1, 'Administrer et maintenir un parc informatique', 'images/aemupi.jpg', 1),
(2, 'Administrer les syst??mes serveurs Windows', 'images/alssw.jpg', 1),
(3, 'Administrer les syst??mes serveurs Linux', 'images/alssl.jpg', 1),
(4, 'Mettre en place et g??rer un r??seau', 'images/meegur.jpg', 1),
(5, 'Installer et configurer des applications', 'images/iecda.jpg', 1),
(6, 'Assurer la s??curit?? et la haute disponibilit??', 'images/alselhd.jpg', 1),
(7, 'Cr??ation de mon Portfolio', 'images/cdmp.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `registre`
--

CREATE TABLE `registre` (
  `id_registre` int(11) NOT NULL,
  `equide` int(11) DEFAULT NULL,
  `fiche_transport` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registre`
--

INSERT INTO `registre` (`id_registre`, `equide`, `fiche_transport`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `registreelevage`
--

CREATE TABLE `registreelevage` (
  `lieuDetention` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registreelevage`
--

INSERT INTO `registreelevage` (`lieuDetention`) VALUES
(1),
(2);

-- --------------------------------------------------------

--
-- Table structure for table `traitement`
--

CREATE TABLE `traitement` (
  `id_traitement` int(11) NOT NULL,
  `molecule_traitement` varchar(50) DEFAULT NULL,
  `reference_traitement` varchar(50) DEFAULT NULL,
  `date_traitement` date DEFAULT NULL,
  `commentaire_traitement` varchar(255) DEFAULT NULL,
  `equide` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `traitement`
--

INSERT INTO `traitement` (`id_traitement`, `molecule_traitement`, `reference_traitement`, `date_traitement`, `commentaire_traitement`, `equide`) VALUES
(1, 'Molecule H2O', 'H20 reference', '2023-02-25', 'tr??s bon traitement contre l\'eau', 1),
(2, 'Molecule DF65', 'DF65 reference', '2023-02-27', 'traitement super bien', 2),
(3, 'Molecule YYTT', 'YYTT reference', '2022-07-04', 'traitement pas ouf', 3);

-- --------------------------------------------------------

--
-- Table structure for table `vaccin`
--

CREATE TABLE `vaccin` (
  `id_vaccin` int(11) NOT NULL,
  `nom_vaccin` varchar(50) DEFAULT NULL,
  `numLot_vaccin` int(11) DEFAULT NULL,
  `numUELN` int(11) DEFAULT NULL,
  `maladieConcernees_vaccin` varchar(50) DEFAULT NULL,
  `dateInjection_vaccin` date DEFAULT NULL,
  `lieu_vaccin` varchar(50) DEFAULT NULL,
  `veterinaire` int(11) DEFAULT NULL,
  `signature_vaccin` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaccin`
--

INSERT INTO `vaccin` (`id_vaccin`, `nom_vaccin`, `numLot_vaccin`, `numUELN`, `maladieConcernees_vaccin`, `dateInjection_vaccin`, `lieu_vaccin`, `veterinaire`, `signature_vaccin`) VALUES
(1, 'Vaccin anti cochon', 1, 4435, 'maladie attrape cochon', '2023-02-24', 'Nice', 1, '/img/signature_vaccin/1');

-- --------------------------------------------------------

--
-- Table structure for table `vermifuge`
--

CREATE TABLE `vermifuge` (
  `id_vermifuge` int(11) NOT NULL,
  `nom_vermifuge` varchar(50) DEFAULT NULL,
  `reference_vermifuge` varchar(50) DEFAULT NULL,
  `commentaire_vermifuge` varchar(255) DEFAULT NULL,
  `date_vermifuge` date DEFAULT NULL,
  `equide` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vermifuge`
--

INSERT INTO `vermifuge` (`id_vermifuge`, `nom_vermifuge`, `reference_vermifuge`, `commentaire_vermifuge`, `date_vermifuge`, `equide`) VALUES
(1, 'Super VERMIFUGE', 'reference vermifuge', 'super le vermifufu', '2023-01-28', 1),
(2, 'Super VERMIFUGE Bois??', 'reference vermifuge2', 'super le vermifufu', '2023-01-01', 3);

-- --------------------------------------------------------

--
-- Table structure for table `veterinaire`
--

CREATE TABLE `veterinaire` (
  `id_veterinaire` int(11) NOT NULL,
  `nom_veterinaire` varchar(50) DEFAULT NULL,
  `prenom_veterinaire` varchar(50) DEFAULT NULL,
  `habilitationDDCSPP_veterinaire` tinyint(1) DEFAULT NULL,
  `equide` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `veterinaire`
--

INSERT INTO `veterinaire` (`id_veterinaire`, `nom_veterinaire`, `prenom_veterinaire`, `habilitationDDCSPP_veterinaire`, `equide`) VALUES
(1, 'Majdid', 'Bruce', 1, 1),
(2, 'Nikol', 'H??l??ne', 0, 2),
(3, 'Zidane', 'Zinedine', 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`id_adresse`);

--
-- Indexes for table `corps`
--
ALTER TABLE `corps`
  ADD PRIMARY KEY (`id_corps`),
  ADD KEY `equide` (`equide`);

--
-- Indexes for table `detenteur`
--
ALTER TABLE `detenteur`
  ADD PRIMARY KEY (`id_detenteur`),
  ADD KEY `equide` (`equide`),
  ADD KEY `adresse_detenteur` (`adresse_detenteur`);

--
-- Indexes for table `equide`
--
ALTER TABLE `equide`
  ADD PRIMARY KEY (`numSIRE`);

--
-- Indexes for table `fiche_transport`
--
ALTER TABLE `fiche_transport`
  ADD PRIMARY KEY (`id_deplacement`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lieudetention`
--
ALTER TABLE `lieudetention`
  ADD PRIMARY KEY (`id_lieuDetention`),
  ADD KEY `adresse_lieuDetention` (`adresse_lieuDetention`),
  ADD KEY `detenteur` (`detenteur`),
  ADD KEY `equide` (`equide`),
  ADD KEY `veterinaireSanitaire_lieuDetention` (`veterinaireSanitaire_lieuDetention`),
  ADD KEY `veterinaireTraitant_lieuDetention` (`veterinaireTraitant_lieuDetention`),
  ADD KEY `organismeSanitaire` (`organismeSanitaire`),
  ADD KEY `marechalFerrant` (`marechalFerrant`);

--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`id_list`);

--
-- Indexes for table `marechalferrant`
--
ALTER TABLE `marechalferrant`
  ADD PRIMARY KEY (`id_marechal`);

--
-- Indexes for table `organismesanitaire`
--
ALTER TABLE `organismesanitaire`
  ADD PRIMARY KEY (`id_organismeSanitaire`),
  ADD KEY `adresse_organismeSanitaire` (`adresse_organismeSanitaire`);

--
-- Indexes for table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`id_projet`),
  ADD KEY `id_list` (`id_list`);

--
-- Indexes for table `registre`
--
ALTER TABLE `registre`
  ADD PRIMARY KEY (`id_registre`),
  ADD KEY `equide` (`equide`),
  ADD KEY `fiche_transport` (`fiche_transport`);

--
-- Indexes for table `registreelevage`
--
ALTER TABLE `registreelevage`
  ADD KEY `lieuDetention` (`lieuDetention`);

--
-- Indexes for table `traitement`
--
ALTER TABLE `traitement`
  ADD PRIMARY KEY (`id_traitement`),
  ADD KEY `equide` (`equide`);

--
-- Indexes for table `vaccin`
--
ALTER TABLE `vaccin`
  ADD PRIMARY KEY (`id_vaccin`),
  ADD KEY `veterinaire` (`veterinaire`);

--
-- Indexes for table `vermifuge`
--
ALTER TABLE `vermifuge`
  ADD PRIMARY KEY (`id_vermifuge`),
  ADD KEY `equide` (`equide`);

--
-- Indexes for table `veterinaire`
--
ALTER TABLE `veterinaire`
  ADD PRIMARY KEY (`id_veterinaire`),
  ADD KEY `equide` (`equide`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `id_adresse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `corps`
--
ALTER TABLE `corps`
  MODIFY `id_corps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `detenteur`
--
ALTER TABLE `detenteur`
  MODIFY `id_detenteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `fiche_transport`
--
ALTER TABLE `fiche_transport`
  MODIFY `id_deplacement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `lieudetention`
--
ALTER TABLE `lieudetention`
  MODIFY `id_lieuDetention` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `list`
--
ALTER TABLE `list`
  MODIFY `id_list` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `marechalferrant`
--
ALTER TABLE `marechalferrant`
  MODIFY `id_marechal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `organismesanitaire`
--
ALTER TABLE `organismesanitaire`
  MODIFY `id_organismeSanitaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `projet`
--
ALTER TABLE `projet`
  MODIFY `id_projet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `registre`
--
ALTER TABLE `registre`
  MODIFY `id_registre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `traitement`
--
ALTER TABLE `traitement`
  MODIFY `id_traitement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vaccin`
--
ALTER TABLE `vaccin`
  MODIFY `id_vaccin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vermifuge`
--
ALTER TABLE `vermifuge`
  MODIFY `id_vermifuge` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `veterinaire`
--
ALTER TABLE `veterinaire`
  MODIFY `id_veterinaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `corps`
--
ALTER TABLE `corps`
  ADD CONSTRAINT `corps_ibfk_1` FOREIGN KEY (`equide`) REFERENCES `equide` (`numSIRE`);

--
-- Constraints for table `detenteur`
--
ALTER TABLE `detenteur`
  ADD CONSTRAINT `detenteur_ibfk_1` FOREIGN KEY (`equide`) REFERENCES `equide` (`numSIRE`),
  ADD CONSTRAINT `detenteur_ibfk_2` FOREIGN KEY (`equide`) REFERENCES `equide` (`numSIRE`),
  ADD CONSTRAINT `detenteur_ibfk_3` FOREIGN KEY (`adresse_detenteur`) REFERENCES `adresse` (`id_adresse`);

--
-- Constraints for table `lieudetention`
--
ALTER TABLE `lieudetention`
  ADD CONSTRAINT `lieuDetention_ibfk_1` FOREIGN KEY (`adresse_lieuDetention`) REFERENCES `adresse` (`id_adresse`),
  ADD CONSTRAINT `lieuDetention_ibfk_2` FOREIGN KEY (`detenteur`) REFERENCES `detenteur` (`id_detenteur`),
  ADD CONSTRAINT `lieuDetention_ibfk_3` FOREIGN KEY (`equide`) REFERENCES `equide` (`numSIRE`),
  ADD CONSTRAINT `lieuDetention_ibfk_4` FOREIGN KEY (`veterinaireSanitaire_lieuDetention`) REFERENCES `veterinaire` (`id_veterinaire`),
  ADD CONSTRAINT `lieuDetention_ibfk_5` FOREIGN KEY (`veterinaireTraitant_lieuDetention`) REFERENCES `veterinaire` (`id_veterinaire`),
  ADD CONSTRAINT `lieuDetention_ibfk_6` FOREIGN KEY (`organismeSanitaire`) REFERENCES `organismesanitaire` (`id_organismeSanitaire`),
  ADD CONSTRAINT `lieuDetention_ibfk_7` FOREIGN KEY (`marechalFerrant`) REFERENCES `marechalferrant` (`id_marechal`);

--
-- Constraints for table `organismesanitaire`
--
ALTER TABLE `organismesanitaire`
  ADD CONSTRAINT `organismeSanitaire_ibfk_1` FOREIGN KEY (`adresse_organismeSanitaire`) REFERENCES `adresse` (`id_adresse`);

--
-- Constraints for table `projet`
--
ALTER TABLE `projet`
  ADD CONSTRAINT `projet_ibfk_1` FOREIGN KEY (`id_list`) REFERENCES `list` (`id_list`);

--
-- Constraints for table `registre`
--
ALTER TABLE `registre`
  ADD CONSTRAINT `registre_ibfk_1` FOREIGN KEY (`equide`) REFERENCES `equide` (`numSIRE`),
  ADD CONSTRAINT `registre_ibfk_2` FOREIGN KEY (`fiche_transport`) REFERENCES `fiche_transport` (`id_deplacement`);

--
-- Constraints for table `registreelevage`
--
ALTER TABLE `registreelevage`
  ADD CONSTRAINT `registreElevage_ibfk_1` FOREIGN KEY (`lieuDetention`) REFERENCES `lieudetention` (`id_lieuDetention`);

--
-- Constraints for table `traitement`
--
ALTER TABLE `traitement`
  ADD CONSTRAINT `traitement_ibfk_1` FOREIGN KEY (`equide`) REFERENCES `equide` (`numSIRE`);

--
-- Constraints for table `vaccin`
--
ALTER TABLE `vaccin`
  ADD CONSTRAINT `vaccin_ibfk_1` FOREIGN KEY (`veterinaire`) REFERENCES `veterinaire` (`id_veterinaire`);

--
-- Constraints for table `vermifuge`
--
ALTER TABLE `vermifuge`
  ADD CONSTRAINT `vermifuge_ibfk_1` FOREIGN KEY (`equide`) REFERENCES `equide` (`numSIRE`);

--
-- Constraints for table `veterinaire`
--
ALTER TABLE `veterinaire`
  ADD CONSTRAINT `veterinaire_ibfk_1` FOREIGN KEY (`equide`) REFERENCES `equide` (`numSIRE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
