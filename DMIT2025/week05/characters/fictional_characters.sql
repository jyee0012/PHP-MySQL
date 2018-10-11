-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 11, 2018 at 02:04 PM
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
-- Table structure for table `fictional_characters`
--

CREATE TABLE `fictional_characters` (
  `jye_fname` varchar(50) NOT NULL,
  `jye_lname` varchar(50) NOT NULL,
  `jye_description` text NOT NULL,
  `jye_charinfo` text NOT NULL,
  `jye_series` varchar(100) NOT NULL,
  `jye_source` varchar(100) NOT NULL,
  `fcid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fictional_characters`
--

INSERT INTO `fictional_characters` (`jye_fname`, `jye_lname`, `jye_description`, `jye_charinfo`, `jye_series`, `jye_source`, `fcid`) VALUES
('Misogi', 'Kumagawa', 'Misogi Kumagawa is a senior of Class -13 and its first student. An executive member of Class -13, he is the center of the new Flask Plan, as well as the leader of the new Student Council created to oppose Medaka Kurokami. Kumagawa is the chief antagonist of the Kumagawa Incident Arc. After being defeated and reformed by Medaka, he joins her Student Council as its vice-president. Kumagawa is the protagonist of the Medaka Box sub-series, Good Loser Kumagawa Gaiden.', 'Age: 17\r\nGender: Male\r\nBlood Type: AB', 'Medaka Box', 'http://medakabox.wikia.com/wiki/Misogi_Kumagawa', 1),
('Jack', 'Rakan', 'Jack Rakan (Jacobus Racan on his pactio card as the &#34;k&#34; sound is written with the letter &#34;c&#34; in Latin), also known as &#34;Rakan of the Thousand Blades&#34;, is the large, dark-skinned member of Nagi&#39;s group. He has been referred to several times as the &#39;Ultimate Broken Character&#39;, a reference to RPG characters whose stats and abilities are so powerful that they are almost unbeatable.', 'Alias:\r\nThe Thousand Blades\r\nThe Man Who Cannot Die\r\nThe Ultimate Hard Worker\r\nThe Immortal Fool\r\nThe Human Atomic Bomb\r\nThat Damn Guy Who You Can Stab With Swords All You Like And It Won&#39;t Do A Thing, Dammit\r\nRace: Hellas\r\nGender: Male', 'Mahou Sensei Negima', 'http://negima.wikia.com/wiki/Jack_Rakan', 2),
('Taiga', 'Aisaka', 'Taiga Aisaka is the main female protagonist of the Toradora! series. Due to her often snapping at others in brutal ways and her short stature, she is given the nickname &#34;Palmtop Tiger&#34;. Essentially, Taiga is meant to be a deconstruction of the tsundere, showing rapid mood swings, being emotionally unstable, and making poor decisions based solely on emotions. Her steady progress into becoming sweet and kind defies the &#34;bipolar&#34; stereotype of most tsundere characters, who often switch from moods and show no true character development.', 'Age: 17-18\r\nBirthday: July 27th\r\nGender: Female\r\nHeight: 144.5cm (4&#39;9&#34;)\r\nWeight: 34kg (75lbs)', 'Toradora', 'http://tora-dora.wikia.com/wiki/Taiga_Aisaka#Anime', 3),
('Accelerator', '', 'The Accelerator is the name used to refer to the 1st-ranked Level 5, the strongest esper currently residing in Academy City.\r\nHe is the second protagonist of the Science Side in the Toaru Majutsu no Index series. First appearing chronologically in Toaru Majutsu no Index as an antagonist, he later becomes the male protagonist of the Science Side after being defeated by Kamijou Touma. His journey to a more &#34;heroic&#34; role in the story progresses after meeting and saving Last Order and is forced into an ironic twist of fate where his life now depends on the Sisters, clones he previously killed by the thousands. He is also a major antagonistic character in Toaru Kagaku no Railgun and the protagonist of Toaru Kagaku no Accelerator.\r\nIn his role as a protagonist, he is forced to deal with the cruel Dark Side of Academy City and the secret conspiracies surrounding it. As the most powerful esper of Academy City, his existence and powers are tied to the plans of Aleister Crowley, the founder of Academy City, alongside Kamijou Touma.', 'Status: Alive\r\nAge: 15-16\r\nGender: Male\r\nHeight: 168cm (5&#39;6&#34;)', 'Toaru Kagaku no Accelerator', 'http://toarumajutsunoindex.wikia.com/wiki/Accelerator', 4),
('Meliodas', '', 'Meliodas is the former captain of the Seven Deadly Sins and the Dragon&#39;s Sin of Wrath. He is the owner of the renowned tavern Boar Hat, and the main protagonist of the series. His Sacred Treasure is the Demon Sword Lostvayne and his inherent power is Full Counter. He also once held the Commandment of Love and is the former leader of the Ten Commandments, a former member of Stigma, and the Demon King&#39;s oldest son.', 'Race: Demon\r\nGender: Male\r\nAge: 3000+\r\nStatus: Alive\r\nBirthday: July 25th\r\nHeight: 152cm (5&#39;0&#34;)\r\nWeight: 50kg (110lbs)\r\nHair Color: Blond\r\nEye Color: Green (normal), Black (demon)\r\nBlood Type: B', 'Nanatsu no Taizai', 'http://nanatsu-no-taizai.wikia.com/wiki/Meliodas', 6),
('Rimuru', 'Tempest', '&#34;Great Demon Lord&#34; Rimuru Tempest, formerly known as Mikami Satoru, is the main protagonist of Tensei Shitara Slime Datta Ken.\r\n\r\nHe is the founder and King of the monster country Tempest of the Great Jura Forest and is regarded as one of the strongest Demon Lords among the Mighty Eight Star Demon Lords as well as the only known Great Demon Lord currently. He is also a partner and best friend of the True Dragon Veldora Tempest.\r\n\r\nHe is also known as Sensei to his former students.', 'Species: Ultimate Slime (Viscous Dragonoid Demon God)\r\nPreceding Evolution Path: Demon Slime, Slime\r\nTitle: Great Demon Lord\r\nGender: Androgynous (Identifies as Male)\r\nAge: 3 (Current), 40 (Including Previous Life)\r\nHeight: 150 - 160 cm\r\nHair Color: Bluish Silver\r\nEye Color: Golden\r\nKind: Reincarnated\r\nStatus: Alive', 'Tensei Shitara Slime datta ken', 'http://tensei-shitara-slime-datta-ken.wikia.com/wiki/Rimuru_Tempest', 7),
('Satou', '', 'Suzuki Ichirou is a Programmer who was stuck working on 2 projects during holiday due to his Junior Programmer disappearing right before the game&#39;s release, forcing Ichirou to fix all the bugs and specifications.\r\n\r\nHis director/planner can barely remember his name even though they have been on the same team for half a year at most. He almost called him Satou. He has also been called Satou since his school days.\r\n\r\nHe woke up in a game-like world after falling asleep on his desk for around 30 hours of debugging and checking, causing him to think it was a dream at first.\r\n\r\nHe arrived in a parallel world as a 15-year-old teenager named Satou. His initial attributes were all 10 at level 1. He fainted/collapsed after activating [Meteor Shower] and leveled up from 1 to 310. He is able to change his info, such as name, title, level, skills, etc., at will, but is limited to only those he has obtained, which includes None.', 'Alternative Names: Suzuki Ichirou (Real Name), Satou Pendragon (Noble)\r\nAge: 15 (Debut). 17 (Currently)\r\nPrevious Age: 29\r\nStatus: Alive\r\nGender: Male\r\nRace: Human\r\n', 'Death March kara Hajimaru Isekai Kyusoukyoku', 'http://deathmarch.wikia.com/wiki/Satou#Satou', 8),
('Ainz Ooal Gown', '', 'Ainz Ooal Gown (ã‚¢ã‚¤ãƒ³ã‚ºãƒ»ã‚¦ãƒ¼ãƒ«ãƒ»ã‚´ã‚¦ãƒ³), formerly known as Momonga (ãƒ¢ãƒ¢ãƒ³ã‚¬), is the main protagonist of the Overlord series. He is the guild master of Ainz Ooal Gown, Overlord of the Great Tomb of Nazarick and the creator of Pandora&#39;s Actor. He is regarded as the highest of the Almighty Forty-One Supreme Beings by the NPCs of Nazarick.\r\n\r\nIn the New World, he is the Sorcerer King of the Sorcerer Kingdom and the most powerful magic caster in the world. His other identity is famously known as &#34;Momon,&#34; a dark warrior and leader of Darkness, an adamantite ranked adventurer group of that nation. He is an adamantite class adventurer and the strongest adventurer known in E-Rantel.', 'Gender: Male\r\nHeight: 177cm\r\nRace: Heteromorphic Race, Overlord\r\nAffliation: Ainz Ooal Gown, Darkness, Sorcerer Kingdom\r\nOccupation: Guild Master, Overlord of Nazarick, Adventurer\r\nResidence: Great Tomb of Nazarick, 10th Floor: Throne Room\r\nKarma: Negative 500: Extremely Evil', 'Overlord', 'http://overlordmaruyama.wikia.com/wiki/Ainz_Ooal_Gown', 9),
('Yue', '', 'Yue is a vampire who was imprisoned in the abyss. She was betrayed by her uncle and peers because of her monstrous magic and regeneration. She is Hajime&#39;s lover. Yue is one of the female protagonist&#39;s of the Arifureta series.', 'Hair Color: Blonde\r\nEye Color: Red \r\nHeight: 140cm \r\nRelative: Denreed Gardia Wesperitirio(Uncle), Nagumo Hajime (Husband)\r\nStatus: Alive\r\nRace: Vampire \r\nAffliation: Hajime&#39;s Party', 'Arifureta Shokugyou de Sekai Saikyou', 'http://arifureta-shokugyou-de-sekai-saikyou.wikia.com/wiki/Yue', 10),
('Zaraki', 'Kenpachi', 'Kenpachi Zaraki is the current captain of the 11th Division in the Gotei 13. He is the eleventh Kenpachi to hold the position.[3] His first lieutenant was Yachiru Kusajishi and his current lieutenant is Ikkaku Madarame.', 'Birthday	November 19\r\nGender	Male\r\nHeight	202 cm \r\nWeight	90 kg', 'Bleach', 'http://bleach.wikia.com/wiki/Kenpachi_Zaraki', 11),
('Ranka', 'Lee', 'Ranka Lee is one of the main characters of the Macross Frontier television series and The False Songstress and The Wings of Goodbye movies. Ranka began as a waitress at the Nyan-Nyan Chinese restaurant, but ultimately aspired to become an idol singer like the &#34;Galactic Fairy&#34; Sheryl Nome, whom she looks up to. This led to a professional rivalry between the two that became more personal as they sought the affections of Alto Saotome. Little was initially known about Ranka&#39;s past, as she was too young to understand the tragedy that surrounded her. Ranka is related to Brera Sterne and has pet whom she calls &#34;Ai-kun&#34;.', 'Gender: Female\r\nSpecies: Human, Zentradi\r\nHair Color: Green\r\nBirth Date: April 29', 'Macross Frontier', 'http://macross.wikia.com/wiki/Ranka_Lee', 12),
('Irene', '', 'was Claymore No. 2 of Teresa&#39;s generation. Irene was demoted to No. 3, after Priscilla was promoted in her place. Irene is known for her high-speed sword technique, giving her the nickname &#34;Quicksword Irene&#34; (é«˜é€Ÿå‰£ã®ã‚¤ãƒ¬ãƒ¼ãƒ, KÅsokuken no IrÄ“ne). After Teresa&#39;s death and Priscilla&#39;s Awakening, she faked her own death and deserted the Organization. She emerged from hiding to help Clare. Her death is implied but never confirmed. Rafaela, the enforcer sent to kill her, told her that &#34;for deserting the Organization, your life is forfeit.&#34;. However, it is later revealed that Irene survived as she welcomes Clare and Raki into her home.', 'Gender:	Female\r\nType:	Offensive\r\nTechnique(s):	Quicksword\r\nFate / Status:	Deserted/Alive', 'Claymore', 'http://claymore.wikia.com/wiki/Irene', 13),
('TK', '', 'is a mysterious character who speaks in semi-nonsensical English quoted from pop culture depending on the situation of the scene. He saves the team many times and does know some Japanese but rarely speaks it, and it seems he understands what the others say to him. And he is talented in almost anything (mostly in dancing). He was always seen dancing even though fighting his enemies. His real identity and his name are unknown to characters in the show, even to the SSS, so they identify him as &#34;TK&#34;, a nickname he gave himself. However behind character names in the opening sequence their Romaji name can be seen written in faint letters, and behind &#34;TK&#34; it says &#34;Thei Kai&#34;.', 'Gender Male\r\nIs Living? No\r\nAffiliation/s Afterlife War Front', 'Angel Beats', 'http://angelbeats.wikia.com/wiki/TK', 14),
('Zeref', 'Dragneel', 'Zeref Dragneel (ã‚¼ãƒ¬ãƒ•ãƒ»ãƒ‰ãƒ©ã‚°ãƒ‹ãƒ« Zerefu Doraguniru) was considered to be the strongest, most evil Mage of all time, who possesses extremely dangerous, and powerful Magic. He is the founder and current Emperor of the Alvarez Empire, under the alias of Emperor Spriggan (çš‡å¸ã‚¹ãƒ—ãƒªã‚¬ãƒ³ KÅtei Supurigan), the older brother of Natsu Dragneel and father of August.', 'Race: Human\r\nGender: Male\r\nAge: 400+\r\nHair Color: Black\r\nEye Color: Black', 'Fairy Tail', 'http://fairytail.wikia.com/wiki/Zeref_Dragneel', 15),
('Kazui', 'Kurosaki', 'Kazui Kurosaki (é»’å´Žä¸€å‹‡, Kurosaki Kazui) is a human with Shinigami powers. He is the son of Ichigo Kurosaki and Orihime Inoue.', 'Race	Human\r\nGender	Male\r\nAppearance:\r\nKazui is a small boy with orange hair and large dark orange eyes. His face closely resembles that of his mother&#39;s, having the same shaped eyes and facial curves, while he inherited his father&#39;s spiky hair, though his hair is noticeably smoother than Ichigo&#39;s. He wears a green hoodie. When he transforms into a Shinigami, he wears the standard Shinigami robe, though he retains his hoodie.', 'Bleach', 'http://bleach.wikia.com/wiki/Kazui_Kurosaki', 16),
('Revy', '', 'Rebecca Lee (ãƒ¬ãƒ™ãƒƒã‚«, Rebekka), mainly referred to as Revy (ãƒ¬ãƒ´ã‚£, Revi) and sometimes Two Hands, is the main female protagonist of the Black Lagoon series.\r\n\r\nBackground: \r\nRevy was born in New York City, NY. Few details are known about Revy&#39;s past as what is gathered is from brief flashbacks from both the manga and the anime. Revy was born as Rebecca Lee, a Chinese-American, in the poverty-stricken Chinatown district of New York City and raised by an abusive, alcoholic father. One day, after fleeing from one of her father&#39;s rampages, she was arrested, beaten, and raped by a corrupt police officer. Upon being returned home following this ordeal, Revy shot and killed her father after he callously asked her for another drink, using a pillow as a make-shift silencer.\r\n\r\nIn Vol. 10 (chapter 72), Revy says she dropped out of school during junior high.\r\n\r\nThere were apparently similar incidents between Revy and the police, particularly at the 27th Precinct. Eventually, the assaults resulted in Revy losing her faith in God, leading her to believe that the police abused her because to them she was &#34;just another little ghetto rat with no power and no God.&#34; Revy has alluded to doing time in prison (in Buffalo Hill where itâ€™s mentioned the warden knew her) and it is hinted she is an escaped felon, but it is unknown how she ended up in Roanapur.', 'Gender	Female\r\nAge	25-26\r\nHeight	167cm/5&#39;5â€\r\nWeight	57kg/125lbs\r\nAffiliates	Rock, Dutch, Benny\r\nAffiliation	The Lagoon Company\r\nWeapon	Dual Modified Beretta 92Fs\r\nRace	Chinese-American\r\nStatus	Alive', 'Black Lagoon', 'http://lagooncompany.wikia.com/wiki/Revy', 17),
('Honoka', 'Kosaka', 'Honoka Kosaka is the main protagonist of Love Live!. She is a second-year in Otonokizaka High School. Her image color is orange, though some people represent her with pink. She is also the leader of Printemps, a sub-unit under Âµ&#39;s. Her solo album is called Honnori Honokairo! (ã»ã‚“ã®ã‚Šç©‚ä¹ƒæžœè‰²! lit. Faint Honoka Color!).', 'Year: Second Year\r\nBirthday: August 3 (Leo)\r\nGender: Female\r\nBlood Type: O\r\nHeight: 157 cm\r\nThree Sizes: B 78, W 58, H 82\r\nFavorite Food: Strawberries\r\nDisliked Food: Bell Peppers\r\nCharm Point: Her energetic smile', 'Love Live', 'http://love-live.wikia.com/wiki/Honoka_Kosaka', 18),
('Takumi', 'Usui', 'Takumi Usui (ç¢“æ°· æ‹“æµ·, Usui Takumi) is the main male protagonist of the Kaichou wa Maid-Sama! Manga and anime series. He is amazingly talented at everything and he is the love interest of Misaki Ayuzawa, which then later Misaki becomes his wife as shown in chapter 85.', 'Birthday\r\nApril 27\r\nHoroscope = Taurus\r\n\r\nGender\r\nMale\r\nHeight\r\n186 cm\r\nBlood Type\r\nO', 'Kaichou wa Maid-sama!', 'http://kaichouwamaidsama.wikia.com/wiki/Takumi_Usui', 19),
('Yuno', 'Gasai', 'Yuno Gasai (æˆ‘å¦» ç”±ä¹ƒ, Gasai Yuno) is the main female protagonist of the Future Diary series. She is the Second in the Survival Game and she is the owner of the &#34;Yukiteru Diary/ Diary of future love&#34;.', 'Race: Human, Goddess (Both in 1st world and 3rd world)\r\nBirthday: November 16\r\nSign/Horoscope: Scorpio\r\nBlood Type: O\r\nAge: 14 (14-16 First Yuno)\r\nGender: Female\r\nHeight: 159 cm (5&#39;3&#34;)\r\nWeight: 49 kg (108 lbs.)\r\nEyes: Pink\r\nHair: Pink', 'Mirai Nikki', 'http://futurediary.wikia.com/wiki/Yuno_Gasai', 20),
('Inori', 'Yuzuriha', 'Appearance: \r\nInori was a beautiful girl with light pink hair that ombres into hot pink and is tied into pigtails, she tied her hair using two tubes, and had a small red clip on the left side of her face. Inori had red eyes, she was about 5&#39;5 tall with small glossed lips. She looked very fragile, having a very slender figure and thin legs. Her usual fighting attire is a red leotard with the middle mostly cut out, red-orange spoilers with flowers on the side and high red gloves. She also wears a black short dress with white lining on the bottom and red ribbons on the bottom, which she wears it when she is not fighting. When attending school, she wears the standard school uniform. She also wears a white outfit in place of her red flowery leotard outfit.', 'Birthday: 2013\r\nHeight: 166 cm (5&#39;5&#34;)\r\nWeight: 45 kg (100 lbs.)\r\nAge: 16', 'Guilty Crown', 'http://guiltycrown.wikia.com/wiki/Inori_Yuzuriha', 21);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fictional_characters`
--
ALTER TABLE `fictional_characters`
  ADD PRIMARY KEY (`fcid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fictional_characters`
--
ALTER TABLE `fictional_characters`
  MODIFY `fcid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
