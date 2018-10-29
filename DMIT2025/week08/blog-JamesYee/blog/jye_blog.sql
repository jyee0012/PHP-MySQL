-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 25, 2018 at 07:25 PM
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
-- Table structure for table `jye_blog`
--

CREATE TABLE `jye_blog` (
  `jye_title` varchar(50) NOT NULL,
  `jye_message` text NOT NULL,
  `jye_timedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jye_blog`
--

INSERT INTO `jye_blog` (`jye_title`, `jye_message`, `jye_timedate`, `bid`) VALUES
('More Kumagawa Quotes', 'ã€ŒI just like itã€ã€ŒWith thrill and risk I sharpen my nerves. I&#39;m someone who would bet even under the worst circumstancesã€ã€ŒOnce again, I couldn&#39;t winã€\r\nâ€”Kumagawa Misogi\r\n\r\nã€ŒIt&#39;s meaningless to attack a visionary witch with physical or real attacksã€ ã€ŒAn eye for an eye, a tooth for a tooth and a figment for a figmentã€ ã€ŒThat&#39;s right. Try to imagine, in a tangible way. Try to picture what I will tell youã€\r\nã€Œ Try to imagine the person you like naked ã€ ã€Œ Try to imagine the misfortune of the people you hate ã€ ã€Œ Try to imagine the failure of a successful person ã€ ã€Œ Imagine a sword that kills magical beasts ã€\r\nâ€”Kumagawa Misogi, when faced with Megusuno&#39;s imaginative challenge.', '2018-10-25 20:42:46', 47),
('Loads of Emotes', ':cry:  :cry:  :cry:  :cry: :rooGift:  :rooGift:  :rooGift:  :rooGift:  :rooGift:  :rooGift:  :rooGift: :rooBooli:  :rooDab:  :rooDuck:  :rooPog:  :rooVV:  :rooWhat:  :rooVV:  :rooVV:  :rooVV:  :rooVV:  :rooVV:  :rooVV:  :rooVV:  :rooVV:  :rooVV:  :rooVV:  :rooWhat:  :rooWut:  :rooYAHAHA:  :rooThink:  :rooSip:  :rooPog:  :rooSip:  :rooNap:  :rooLurk:  :rooLove:  :rooHype:  :rooGift:  :rooDuck:  :rooDerp:  :rooDab:  :rooCop:  :rooBooli:  :rooBonk:  :rooBlush:  :rooBlind:  :rooBlank:  :rooBaka:  :wink:  :twisted:  :surprise:  :sad:  :rolleyes:  :blush:  :razz:  :question:  :mad:  :lol:  :idea:  :exclaim:  :evil:  :eek:  :cool:  :cry:  :confused:  :left-arrow:  :grin:  :smile:', '2018-10-23 15:13:15', 9),
('Check out my previous works', 'Heres some stuff I worked on for previous labs\r\nFictional Character Database: http://jyee12.dmitstudent.ca/dmit2025/week05/characters/\r\nContacts Database: http://jyee12.dmitstudent.ca/dmit2025/week07/contacts/', '2018-10-25 20:39:54', 45),
('The place you go for the roo Emotes', 'https://www.twitch.tv/admiralbahroo :rooDuck:  :rooDuck:  :rooDuck:  :rooDuck:  :rooDuck:  :rooDuck:\r\nThis is one of the few streamers/content creators that I enjoy', '2018-10-24 18:22:37', 33),
('Here&#39;s a present', ':rooGift:  :rooGift:  :rooGift:  :rooGift:  :rooGift:  :rooGift:  :rooGift:  :rooGift:  :rooGift:  :rooGift:  :rooGift:  :rooGift:  :rooGift: :rooGift:  :rooGift:  :rooGift:  :rooGift:  :rooGift:', '2018-10-24 18:42:58', 34),
('Kumagawa Quote', '&#34;I want to beat them! Even if I&#39;m not cool, or strong, or beautiful, or cute, or pretty. I want to beat the cool, strong, just, beautiful, cute and pretty people. Even though I wasn&#39;t blessed with talent, even though I&#39;m stupid and have a bad personality, have bad grades, am misguided and am a good for nothing. I want to beat the talented, smart, likable, over-achieving people. I want to beat those with friends when I can&#39;t have friends. I want to beat the people who work hard when I can&#39;t work hard. I want to beat the victorious when I can&#39;t win. I want to beat the happy people when I&#39;m miserable. \r\nEven if i&#39;m hated! Even if I&#39;m despised! Even if I&#39;m useless! I want to prove that I&#39;m better than the main characters!!&#34;\r\nâ€”Kumagawa Misogi', '2018-10-25 20:41:23', 46),
('Tired at the moment', 'No idea why, but I&#39;m really tired it even though I got plenty of rest.\r\nIt may be because I have spent most of my time recently just working on assignments and projects.\r\nI should take a break, but I don&#39;t have the time to\r\nI even have an assignment I haven&#39;t start but is due in a week\r\n\r\n:rooNap:  :rooNap:  :rooNap:  :rooNap:  :rooNap:  :rooNap:  :rooNap:  :rooNap:  :rooNap:  :rooNap: :rooNap:  :rooNap:  :rooNap:  :rooNap:  :rooPog:  :rooNap:  :rooNap:  :rooNap:  :rooNap:  :rooNap:  :rooNap:  :rooNap:', '2018-10-25 19:23:47', 36),
('New Emotes', 'Some emotes i pulled from a discord server I&#39;m in.\r\n\r\n:aJaePeek:  :aJaePeek:  :challenge_accepted:  :GWcorsairNomNomNom:  :GWcorsairNomNomNom:  :GWcorsairNomNomNom:  :RemHmpf:  :tuturu:  :RimuruJump:  :wup:  :GWowoKannaBear:  :GWnanamiRamFive:  :GWczonRemPeace:  :RemHmpf:  :rikka:  :happuchinu:  :GWupuChitogeCry:  :Z2smug:', '2018-10-25 19:36:01', 37),
('Watching Bahroo', 'Today I was watching bahroo play some DbD (Dead by Daylight) and his character was wearing a roo shirt which looked amazing  :rooDuck: \r\nYo can check him out over here https://www.twitch.tv/admiralbahroo', '2018-10-25 19:51:15', 38),
('New Update for LHTranslations', 'There was a new update on a couple series that I read. I was very pleased with the new chapter  :RimuruJump: \r\nIf you wish to read them as well check them out here! http://lhtranslation.net/', '2018-10-25 19:52:27', 39),
('Previous problem with blogs', 'I had an issue where my delete button would by default set its value to the latest blog post, so I lost some content.\r\nI shall slowly but surely refill with more content, but I will not be writing those posts again  :rooBooli:', '2018-10-25 20:44:07', 48),
('A show I enjoy', 'Check out Tensei Slime: https://myanimelist.net/anime/37430/Tensei_shitara_Slime_Datta_Ken\r\nIt&#39;s really good, and currently airing. I&#39;ve read the novel and I&#39;m currently at chapter 222/244 that are translated\r\nI&#39;m looking forward to how to show will depict how Rimuru will attain the Unique Deadly Sin Skill: [Gluttony]', '2018-10-25 20:48:42', 49),
('A place filled with novels', 'This is where I read my web novels : https://www.novelupdates.com/\r\nI&#39;m currently reading something called Second Summon.\r\nIt&#39;s about a guy who was summoned to another for the second time, and he will enjoy the world leisurely.   :wup:', '2018-10-25 20:50:24', 50),
('Today In Code Assets', 'We made and almost finalized a game that......involves....baby shark...... :rooWut:  :rooWut:  :rooWut:  :rooWut: \r\nI don&#39;t know what else to say about it :rooDerp:', '2018-10-25 22:33:31', 51),
('Updates', 'I may or may not keep this blog updated. This depends on how I feel about constantly posting blogs. :rooVV:  :rooVV:', '2018-10-25 22:39:27', 52),
('Emote Update', 'I haven&#39;t added any new emotes, but I now have titles for the emotes so you can see what emote is what by just hover your mouse over it. :rooDab:  :rooDab: \r\nHere are some emotes you can try this on :rooVV:  :rooVV:  :rooLurk:  :rooHype:  :rooDerp:  :rooBlank:  :Z2smug:  :Z2smug:', '2018-10-25 22:41:42', 53);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jye_blog`
--
ALTER TABLE `jye_blog`
  ADD PRIMARY KEY (`bid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jye_blog`
--
ALTER TABLE `jye_blog`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
