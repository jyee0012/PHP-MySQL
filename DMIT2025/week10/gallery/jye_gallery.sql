-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 08, 2018 at 03:13 PM
-- Server version: 5.5.60-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jyee12_dmit2025`
--

-- --------------------------------------------------------

--
-- Table structure for table `jye_gallery`
--

CREATE TABLE `jye_gallery` (
  `jye_title` varchar(255) NOT NULL,
  `jye_description` text NOT NULL,
  `jye_filename` varchar(255) NOT NULL,
  `gid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jye_gallery`
--

INSERT INTO `jye_gallery` (`jye_title`, `jye_description`, `jye_filename`, `gid`) VALUES
('Simple Purple Day', 'Anime Picture of a girl under a purple sky', 'simple-purple-day.jpg', 1),
('Shigatsu wa Kimi no Uso Wallpaper', 'Wallpaper from the anime &#34;Shigatsu wa Kimi no Uso&#34; also known as &#34;Your Lie in April&#34;', 'Shigatsu wa Kimi no Uso.jpg', 2),
('Madoka Magica - Akemi', 'A picture of Akemi Homura from the anime Madoka Magica', 'Madoka-Magica.jpg', 3),
('Charlotte - Tomori', 'A picture of Tomori Nao from the anime Charlotte', 'dt3ummH.jpg', 4),
('Blue Earphones Girl', 'Picture I found while listening to Nightcore', 'f99811714164f7bf8f5ff9e79a392baa.jpg', 5),
('Gintama', 'ehehehe', 'Gintama.full.588764.jpg', 15),
('Attack on Titan Phone', 'A phone/portrait sized image from the anime Attack on Titan', 'Attack.on.Titan.full.1417657.jpg', 7),
('Bad Apple', 'Picture from Nightcore', 'Kunishige.Keiichi.full.518845.jpg', 8),
('Ulquiorra & Orihime', 'Picture of Orihime drawing Ulquiorra from Bleach', 'BLEACH.full.1059608.jpg', 9),
('Bleach', 'Cool looking bleach background', 'BLEACH.full.765035.jpg', 10),
('Boku no Hero Academia - Children', 'Cute child forms of the main 3 from Boku no Hero Academia', 'Boku.no.Hero.Academia.full.2011121.jpg', 11),
('Pokemon', 'Reminds me of a church', 'PokÃ©mon.full.1531169.jpg', 12),
('Adventure - BnHA', 'Looks like an adventure with the characters from Boku no Hero Academia', 'Boku.no.Hero.Academia.full.2369037.jpg', 13),
('Shhhh', 'Deku & Todoroki', 'Boku.no.Hero.Academia.full.2189496.jpg', 14),
('Deku 2', '', 'Boku.no.Hero.Academia.full.1990454-5be36b8e451f0.jpg', 19),
('Kagerou Project', 'Cool Wallpaper from Mekakucity Actors', 'Kagerou.Project.full.1703428-5be49df5e2720.jpg', 20),
('Deku', 'Image of Deku', 'Boku.no.Hero.Academia.full.2229047-5be3620b0c7d3.jpg', 18),
('Moar Deku', 'Deku running ahead of others', '689602-5be4b2f9511cb.png', 25),
('Origin of Demons', 'Rin, son of the blue flames', 'Ao.no.Exorcist.full.538786-5be4b37542c09.jpg', 26),
('Demon Siblings', 'from Ao no Exorcist', 'Ao.no.Exorcist.full.1107686-5be4b3977e033.jpg', 27),
('Titan Pizza', 'Attack on Titan advertising Pizza Hut', 'Attack.on.Titan.full.1519438-5be4b3b044207.jpg', 28),
('Bleach Collage', 'Many Photos of characters from Bleach', 'BLEACH.full.352211-5be4b3c1edac0.jpg', 29),
('People from Tempest', 'The Demon Capital from Tensei Shitara Slime datta ken', 'characters-5be4b3eedb1ce.jpg', 30),
('K, Kings Project', 'I believe thats what K stands for', 'K.Project.full.1331238-5be4b40868cd4.jpg', 31),
('Touka', 'Best girl from Tokyo Ghoul', 'Kirishima.Touka.full.1530574-5be4b4190f809.jpg', 32),
('Doggo', 'Random Dog I found', 'Ren.(DMMd).full.1072312-5be4b426327f3.jpg', 33),
('Naruto', 'The Many Great Ninjas from Naruto', 'NARUTO.full.853009-5be4b4493508a.jpg', 34),
('Mikoto', 'Mikoto from K Project', 'Suoh.Mikoto.full.1356700-5be4b481c64d9.jpg', 35),
('Rimuru and Milim', 'I believe its Rimuru aka Blue hair and Milim aka red hair', 'Tensei-Shitara-Slime-Datta-Ken-Wallpapers-1-5be4b49dbf7e9.jpg', 36);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jye_gallery`
--
ALTER TABLE `jye_gallery`
  ADD PRIMARY KEY (`gid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jye_gallery`
--
ALTER TABLE `jye_gallery`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
