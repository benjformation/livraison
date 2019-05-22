-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2019 at 04:06 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `livraisonstarare`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `nom` varchar(63) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `email` varchar(63) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `adresse`, `email`) VALUES
(1, 'Carine', '00000 adresse Carine', 'carine@gmail.com'),
(2, 'Rod', '11111 adresse Rod', 'rod@gmail.com'),
(3, 'Michèle', '22222 adresse Michèle', 'michele@gmail.com'),
(4, 'Vincent', '33333 adresse Vincent', 'vincent@gmail.com'),
(5, 'Jahid', '44444 adresse Jahid', 'jahid@gmail.com'),
(6, 'Dalila', '55555 adresse Dalila', 'dalila@gmail.com'),
(7, 'Philippe', '66666 adresse Philippe', 'philippe@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `colis`
--

CREATE TABLE `colis` (
  `numero` int(11) NOT NULL,
  `expediteur` int(11) NOT NULL,
  `destinataire` int(11) NOT NULL,
  `tarif` int(11) NOT NULL,
  `livraison_en_depot` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `depots`
--

CREATE TABLE `depots` (
  `id` int(11) NOT NULL,
  `nom` varchar(64) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `type_depot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `depots`
--

INSERT INTO `depots` (`id`, `nom`, `adresse`, `type_depot`) VALUES
(1, 'Villefranche 24', 'Rue Skof, Villefranche', 1),
(2, 'Bellevile 44', 'Rue Paite, Belleville', 2),
(3, 'Tarare 56', 'Chemin dans le sac, Tarare', 3),
(4, 'Belleville 22', 'Impasse moi le sel, Belleville', 1);

-- --------------------------------------------------------

--
-- Table structure for table `statut_colis`
--

CREATE TABLE `statut_colis` (
  `id` int(11) NOT NULL,
  `nom` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statut_colis`
--

INSERT INTO `statut_colis` (`id`, `nom`) VALUES
(1, 'DEPOSE'),
(2, 'TRANSIT'),
(3, 'DEPOT'),
(4, 'ATTENTE_RETRAIT'),
(5, 'DELIVRE');

-- --------------------------------------------------------

--
-- Table structure for table `suivi`
--

CREATE TABLE `suivi` (
  `id` int(11) NOT NULL,
  `instant` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `colis` int(11) NOT NULL,
  `depot` int(11) NOT NULL,
  `statut_colis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tarifs`
--

CREATE TABLE `tarifs` (
  `id` int(11) NOT NULL,
  `nom` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tarifs`
--

INSERT INTO `tarifs` (`id`, `nom`) VALUES
(1, 'Base normal'),
(2, 'Base avec assurance'),
(3, 'Colis carton'),
(4, 'Gros carton'),
(5, 'Colis recommandé');

-- --------------------------------------------------------

--
-- Table structure for table `types_depot`
--

CREATE TABLE `types_depot` (
  `id` int(11) NOT NULL,
  `nom` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types_depot`
--

INSERT INTO `types_depot` (`id`, `nom`) VALUES
(1, 'INTERNE'),
(2, 'PRESTATAIRE'),
(3, 'RELAIS_COLIS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colis`
--
ALTER TABLE `colis`
  ADD PRIMARY KEY (`numero`),
  ADD KEY `colis_clients_fk` (`expediteur`),
  ADD KEY `colis_clients_fk_1` (`destinataire`),
  ADD KEY `colis_tarifs_fk` (`tarif`),
  ADD KEY `colis_depots_fk` (`livraison_en_depot`);

--
-- Indexes for table `depots`
--
ALTER TABLE `depots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `depots_types_depot_id_fk` (`type_depot`);

--
-- Indexes for table `statut_colis`
--
ALTER TABLE `statut_colis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suivi`
--
ALTER TABLE `suivi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `suivi_colis_fk` (`colis`),
  ADD KEY `suivi_depots_fk` (`depot`);

--
-- Indexes for table `tarifs`
--
ALTER TABLE `tarifs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types_depot`
--
ALTER TABLE `types_depot`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `colis`
--
ALTER TABLE `colis`
  MODIFY `numero` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `depots`
--
ALTER TABLE `depots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `statut_colis`
--
ALTER TABLE `statut_colis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `suivi`
--
ALTER TABLE `suivi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tarifs`
--
ALTER TABLE `tarifs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `types_depot`
--
ALTER TABLE `types_depot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `colis`
--
ALTER TABLE `colis`
  ADD CONSTRAINT `colis_clients_fk` FOREIGN KEY (`expediteur`) REFERENCES `clients` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `colis_clients_fk_1` FOREIGN KEY (`destinataire`) REFERENCES `clients` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `colis_depots_fk` FOREIGN KEY (`livraison_en_depot`) REFERENCES `depots` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `colis_tarifs_fk` FOREIGN KEY (`tarif`) REFERENCES `tarifs` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `depots`
--
ALTER TABLE `depots`
  ADD CONSTRAINT `depots_types_depot_id_fk` FOREIGN KEY (`type_depot`) REFERENCES `types_depot` (`id`);

--
-- Constraints for table `suivi`
--
ALTER TABLE `suivi`
  ADD CONSTRAINT `suivi_colis_fk` FOREIGN KEY (`colis`) REFERENCES `colis` (`numero`) ON UPDATE CASCADE,
  ADD CONSTRAINT `suivi_depots_fk` FOREIGN KEY (`depot`) REFERENCES `depots` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `suivi_statut_colis_fk` FOREIGN KEY (`id`) REFERENCES `statut_colis` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
