-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 23, 2021 at 03:14 PM
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
-- Database: `immobilier`
--

-- --------------------------------------------------------

--
-- Table structure for table `logement`
--

CREATE TABLE `logement` (
  `id_logement` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `cp` varchar(11) NOT NULL,
  `surface` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `photo` text,
  `type` varchar(10) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logement`
--

INSERT INTO `logement` (`id_logement`, `titre`, `adresse`, `ville`, `cp`, `surface`, `prix`, `photo`, `type`, `description`) VALUES
(10, 'Appartement New York', '10 rue des Remparts', 'New York', '33000', 25, 130000, './uploads/logement_1614092462.jfif', 'Vente', 'Très belle vue'),
(11, 'Appartement Paris', '20 rue des cerisiers', 'Paris', '75000', 80, 1400, './uploads/logement_1614092964.jfif', 'Location', 'Pas cher pour Paris. Maecenas eget sodales purus. Mauris blandit, metus a vehicula interdum, massa erat mattis nisi, in condimentum leo ex eu lacus. Nulla euismod ex vitae nisl sodales lobortis. Nam quis finibus erat. Fusce fermentum pharetra massa sed aliquet. Mauris volutpat eros quis urna varius, ac suscipit leo tincidunt. Integer auctor, nisl vel pellentesque placerat, nisi quam eleifend enim, vestibulum porttitor elit nunc a dui. Cras sit amet arcu quis sem convallis rutrum ut sed leo.'),
(12, 'Appartement Bordeaux', 'Rue de l\'inconnu', 'Bordeaux', '33000', 152, 1000252000, NULL, 'Vente', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logement`
--
ALTER TABLE `logement`
  ADD PRIMARY KEY (`id_logement`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logement`
--
ALTER TABLE `logement`
  MODIFY `id_logement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
