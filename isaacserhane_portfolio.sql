-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-isaacserhane.alwaysdata.net
-- Generation Time: Apr 04, 2024 at 01:41 PM
-- Server version: 10.6.16-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isaacserhane_portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `project_langages` varchar(255) NOT NULL,
  `project_description` text DEFAULT NULL,
  `project_image` varchar(255) NOT NULL,
  `project_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_langages`, `project_description`, `project_image`, `project_link`) VALUES
(1, 'Python (SQLite3) / JavaScript / HTML / CSS', 'Form on Commuting Mobility at the Lycée Louis Armand in Eaubonne...', '../assets/imgs/louis-armand.jpg', 'https://github.com/Isaac955/Mobilites-pendulaires'),
(2, 'PHP / SQL / HTML / CSS', 'Development of a website for the University of Cergy-Pontoise...', '../assets/imgs/IUT.jpg', 'https://sae203mmi.alwaysdata.net/'),
(3, 'JavaScript / HTML / CSS', 'This program calculates your click speed with your mouse over a given time...', '../assets/imgs/Souris_clic_gauche.svg.png', 'https://isaac955.github.io/CPS-Test/'),
(4, 'Python (Pillow)', 'This program generates the Julia set, named after the French mathematician Gaston Julia...', '../assets/imgs/julia.png', 'https://github.com/Isaac955/Julia'),
(5, 'Python (Pillow)', 'This project involves generating the Mandelbrot set, a famous fractal in mathematics...', '../assets/imgs/mandelbrot.png', 'https://github.com/Isaac955/Mandelbrot'),
(6, 'PHP / SQL / HTML / CSS / JavaScript', 'This project is a website portfolio made to present my computer science projects ...', '../assets/imgs/308331386-56f50b68-bba7-4b33-a159-87676cc267d6.png', 'https://github.com/Isaac955/Portfolio'),
(7, 'Premiere Pro / FL Studio', 'Audio podcast at the heart of the full stack developer\'s job ...', '../assets/imgs/podcast.PNG', 'https://www.youtube.com/watch?v=xqpYhu-5A6A'),
(8, 'Python (Tkinter)', 'Creating the Olympic rings on a graphical interface ...', '../assets/imgs/png-clipart-2016-summer-olympics-olympic-games-2018-winter-olympics-2024-summer-olympics-2014-winter-olympics-olympic-project-text-logo-removebg-preview.png', 'https://github.com/Isaac955/Jeux-Olympiques'),
(9, 'Python', 'This project consisted in implementing a simple hangman game.', '../assets/imgs/pendu-jeu.jpg', 'https://github.com/Isaac955/Pendu');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `icon_class` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `name`, `icon_class`, `url`) VALUES
(2, 'GitHub', 'ti-github', 'https://github.com/Isaac955'),
(3, 'LinkedIn', 'ti-linkedin', 'http://www.linkedin.com/in/isaac-serhane-168375256'),
(4, 'Mail', 'ti-email', 'mailto:isaacserhane95@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
