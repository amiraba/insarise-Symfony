-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2016 at 10:01 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `insarisedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievement`
--

CREATE TABLE `achievement` (
  `id_ach` int(11) UNSIGNED NOT NULL,
  `nom_ach` varchar(50) DEFAULT NULL,
  `description_ach` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `approbation`
--

CREATE TABLE `approbation` (
  `id_mod_ap` int(11) UNSIGNED NOT NULL,
  `id_proj_ap` int(11) UNSIGNED NOT NULL,
  `date_ap` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `candidat`
--

CREATE TABLE `candidat` (
  `id_cand` int(11) UNSIGNED NOT NULL,
  `login_cand` varchar(50) NOT NULL,
  `password_cand` varchar(50) NOT NULL,
  `nom_cand` varchar(50) DEFAULT NULL,
  `prenom_cand` varchar(50) DEFAULT NULL,
  `email_cand` varchar(50) DEFAULT NULL,
  `telephone_cand` varchar(50) DEFAULT NULL,
  `adresse_cand` varchar(255) DEFAULT NULL,
  `type_cand` enum('indiv','club') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidat`
--

INSERT INTO `candidat` (`id_cand`, `login_cand`, `password_cand`, `nom_cand`, `prenom_cand`, `email_cand`, `telephone_cand`, `adresse_cand`, `type_cand`) VALUES
(1, 'lili', 'lili', 'bouriel', 'ilhem', 'ilhem@gmail.com', '93 444 555', 'ariana', 'indiv'),
(2, 'sassou', 'sassou', 'amor', 'sarra', 'sassou@hotmail.com', '40 444 555', 'tunis', 'indiv'),
(3, 'netlinks', 'netlinks', 'net', 'links', 'netlinks@gmail.com', '71 444 555 ', 'insat', 'club'),
(4, 'android', 'android', 'android', 'android', 'android@yahoo.fr', '71 222 555', 'insat_palace', 'club'),
(5, 'mimi', 'mimi', 'marie', 'mmmm', 'matie@gmail.com', '50 222 111 ', 'sfax', 'indiv'),
(6, 'someone', 'someone', 'some', 'one', 'unknown@gmail.com', '92 554 888', 'ariana-tunis', 'indiv');

-- --------------------------------------------------------

--
-- Table structure for table `candidature`
--

CREATE TABLE `candidature` (
  `id_cand_candid` int(10) UNSIGNED NOT NULL,
  `id_proj_candid` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidature`
--

INSERT INTO `candidature` (`id_cand_candid`, `id_proj_candid`) VALUES
(1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `candidat_competence`
--

CREATE TABLE `candidat_competence` (
  `id_cand_ec` int(11) UNSIGNED NOT NULL,
  `id_com_ec` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidat_competence`
--

INSERT INTO `candidat_competence` (`id_cand_ec`, `id_com_ec`) VALUES
(1, 2),
(1, 4),
(1, 8),
(1, 10),
(1, 13),
(1, 15),
(1, 18),
(1, 22),
(2, 1),
(2, 6),
(2, 8),
(2, 9),
(2, 11),
(2, 12),
(3, 1),
(3, 3),
(3, 8),
(3, 16),
(3, 17),
(3, 19),
(4, 4),
(4, 9),
(4, 13),
(4, 14),
(4, 15),
(4, 17),
(4, 18),
(5, 1),
(5, 5),
(5, 12),
(5, 13),
(5, 14),
(5, 15),
(5, 18),
(6, 8),
(6, 10),
(6, 18),
(6, 21),
(6, 22),
(6, 24);

-- --------------------------------------------------------

--
-- Table structure for table `competence`
--

CREATE TABLE `competence` (
  `id_com` int(11) UNSIGNED NOT NULL,
  `nom_com` varchar(50) DEFAULT NULL,
  `description_com` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `competence`
--

INSERT INTO `competence` (`id_com`, `nom_com`, `description_com`) VALUES
(1, 'Wordpress', 'technologie web'),
(2, 'angular js', 'technologie web'),
(3, 'jee', 'architecture java'),
(4, 'java', 'langage de programmation'),
(5, 'linux shell', 'systeme d''exploitation'),
(6, 'node js', 'technologie web'),
(7, 'python', 'langage de programmation'),
(8, 'php', 'langage de programmation'),
(9, 'symfony3', 'framework php'),
(10, 'html5&css3', 'web deseign'),
(11, 'javascript', 'technologie web'),
(12, 'ajax', 'technologie web'),
(13, 'ruby', 'langage de programmation'),
(14, 'ruby on rails', 'framework ruby'),
(15, 'unity', 'jeu video'),
(16, '.net', 'framework c#'),
(17, 'c#', 'langage de programmation'),
(18, 'c++', 'langage de programmation'),
(19, 'andoid', 'os phone'),
(20, 'ios', 'os phone'),
(21, 'MongoDB', 'hhhhhh'),
(22, 'clojure', 'ffff'),
(23, 'web_security', 'fsssx'),
(24, 'jQuery', 'hhhhhhh'),
(25, 'asp.net', 'ggdgssre');

-- --------------------------------------------------------

--
-- Table structure for table `entreprise`
--

CREATE TABLE `entreprise` (
  `id_ent` int(11) UNSIGNED NOT NULL,
  `login_ent` varchar(50) DEFAULT NULL,
  `password_ent` varchar(50) DEFAULT NULL,
  `nom_ent` varchar(50) DEFAULT NULL,
  `nom_responsable_ent` varchar(255) DEFAULT NULL,
  `email_ent` varchar(50) DEFAULT NULL,
  `adresse_ent` varchar(255) DEFAULT NULL,
  `description_ent` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `entreprise`
--

INSERT INTO `entreprise` (`id_ent`, `login_ent`, `password_ent`, `nom_ent`, `nom_responsable_ent`, `email_ent`, `adresse_ent`, `description_ent`) VALUES
(1, 'sungard', 'sungard', 'sungard', 'aaaa', 'sungard@gmail.com', 'tunis', 'SunGard is one of the world’s leading software and technology services companies, with annual revenue of about $2.8 billion. SunGard provides software and processing solutions for financial services, education and the public sector. SunGard serves approximately 16,000 customers in more than 100 countries and has more than 13,000 employees.'),
(2, 'linedata', 'linedata', 'linedata', 'bbbb', 'linedata@gmail.com', 'tunis', 'Linedata est un éditeur de solutions globales, dédiées à la communauté internationale des professionnels de l’asset management, de l’assurance et du crédit'),
(3, 'vermeg', 'vermeg', 'vermeg', 'cccc', 'vermeg@gmail.com', 'tunis', 'At Vermeg, we deliver trusted financial software that allows our clients to focus on their core competencies without worrying about their IT solutions.\r\n\r\nWe are the partner of choice of financial institutions all over Europe and beyond.'),
(4, 'vynd', 'vynd', 'vynd', 'dddd', 'vynd@gmail.com', 'manar_tunis', 'Vynd is a community platform and participatory space for sharing opinions, experiences and information about entreprises and local businesses in Tunisia. Accessible through the website vynd.tn and the mobile application, it is made by and for users. As an urban guide, Vynd is a pledge of confidence between its members and business owners. Its mission is to contribute to improve the services provided by companies and local businesses while highlighting the voice of the customer.'),
(5, 'sofrecom', 'sofrecom', 'sofrecom', 'eeeee', 'sofrecom@yahoo.com', 'lac_tunis', 'Sofrecom, filiale d’Orange, développe depuis 50 ans un savoir-faire unique dans les métiers de l’opérateur, ce qui en fait un leader mondial du conseil et de l’ingénierie télécom.\r\n\r\nSon expérience des marchés matures et des économies émergentes, conjuguée à sa solide connaissance des évolutions structurantes du marché des télécommunications, en font un partenaire incontournable pour les opérateurs, les gouvernements et les investisseurs internationaux.'),
(6, 'ericsson', 'ericsson', 'ericsson', 'ssss', 'ericsson@hotmail.fr', 'lac2-tunis', 'At Ericsson, we strive to connect everyone, wherever they may be. Because by being connected, people can take part in the emerging global collaboration that is the Networked Society - a society in which every person and every industry is empowered to reach their full potential.\r\nOur services, software and infrastructure - especially in mobility, broadband and the cloud - are enabling the communications industry and other sectors to do better business, increase efficiency, improve their users'' experience and capture new opportunities.');

-- --------------------------------------------------------

--
-- Table structure for table `etape`
--

CREATE TABLE `etape` (
  `id_et` int(11) UNSIGNED NOT NULL,
  `id_proj_et` int(11) UNSIGNED NOT NULL,
  `id_ent_et` int(11) UNSIGNED NOT NULL,
  `id_cand_et` int(11) UNSIGNED DEFAULT NULL,
  `nom_et` varchar(50) DEFAULT NULL,
  `description_et` varchar(50) DEFAULT NULL,
  `date_achevement_et` date DEFAULT NULL,
  `datevalidation_et` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `etape`
--

INSERT INTO `etape` (`id_et`, `id_proj_et`, `id_ent_et`, `id_cand_et`, `nom_et`, `description_et`, `date_achevement_et`, `datevalidation_et`) VALUES
(11, 1, 1, NULL, 'Define a Problem', ' he first step is a project management is defining', '2016-05-07', '2016-05-09'),
(12, 1, 1, NULL, 'Plan the Project', 'Devising the project plan is to define the scope o', '2016-05-09', '2016-05-09'),
(13, 1, 1, NULL, 'Execute the Plan', 'Executing is the process that being used to comple', '2016-05-09', '2016-05-09'),
(14, 1, 1, NULL, 'Monitor and Control Progress', 'Potential problems can be identified by monitoring', '2016-05-09', '2016-05-09'),
(15, 1, 1, NULL, 'Close Project', 'Closing is a controlled way to end a project. ', NULL, NULL),
(27, 3, 3, NULL, ' Definition / initiation', '  The first step in the process is defining the ob', '2016-05-09', '2016-05-09'),
(28, 3, 3, NULL, 'Planning', 'Once you’ve defined all the objectives, goals and ', '2016-05-09', '2016-05-09'),
(29, 3, 3, NULL, ' Execution', 'So you’ve got everything planned out, now it’s tim', NULL, NULL),
(30, 3, 3, NULL, ' Control', 'This step is also known as Quality Control and als', NULL, NULL),
(31, 3, 3, NULL, 'Post-Mortem', 'Great, the project is finished, the client is happ', NULL, NULL),
(32, 10, 1, NULL, 'etape1', ' frgggffd', '2016-05-11', '2016-05-11'),
(33, 10, 1, NULL, '', '', NULL, NULL),
(34, 10, 1, NULL, 'etape2', 'd;d,klnssd!lffnmnmf', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gratifie`
--

CREATE TABLE `gratifie` (
  `id_proj` int(11) UNSIGNED NOT NULL,
  `id_ent` int(11) UNSIGNED NOT NULL,
  `id_cand` int(11) UNSIGNED NOT NULL,
  `id_ach` int(11) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id_mes` int(11) UNSIGNED NOT NULL,
  `id_emetteur_mes` int(11) UNSIGNED NOT NULL,
  `type_emetteur_mes` enum('Candidat','entreprise') NOT NULL,
  `id_destinataire_mes` int(11) UNSIGNED NOT NULL,
  `type_destinataire_mes` enum('Candidat','entreprise') NOT NULL,
  `titre_mes` varchar(50) DEFAULT NULL,
  `contenu_mes` text,
  `dateenvoi_mes` date DEFAULT NULL,
  `datelecture_mes` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id_mes`, `id_emetteur_mes`, `type_emetteur_mes`, `id_destinataire_mes`, `type_destinataire_mes`, `titre_mes`, `contenu_mes`, `dateenvoi_mes`, `datelecture_mes`) VALUES
(1, 1, 'Candidat', 3, 'entreprise', 'ggggggggggg', 'ezf ez zfre e ', '2016-05-10', NULL),
(2, 1, 'entreprise', 1, 'Candidat', 'hhhhhhh', 'dsssssssssssss', '2016-05-10', NULL),
(4, 7, 'entreprise', 10, 'Candidat', 'gggggggg', 'hhhhhhhhhhhhhhhh', '2016-05-11', NULL),
(6, 7, 'entreprise', 10, 'Candidat', 'bravoooooooooooooo', 'excellent travail INSARISE ', '2016-05-11', NULL),
(7, 1, 'Candidat', 1, 'entreprise', 'aaaaaaaaaaaa', 'fddddddddddddddd', '2016-05-11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `moderateur`
--

CREATE TABLE `moderateur` (
  `id_mod` int(11) UNSIGNED NOT NULL,
  `login_mod` varchar(50) DEFAULT NULL,
  `password_mod` varchar(50) DEFAULT NULL,
  `nom_mod` varchar(50) DEFAULT NULL,
  `prenom_mod` varchar(50) DEFAULT NULL,
  `email_mod` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `moderateur`
--

INSERT INTO `moderateur` (`id_mod`, `login_mod`, `password_mod`, `nom_mod`, `prenom_mod`, `email_mod`) VALUES
(1, 'mod1', 'mod1', 'nom_mod1', 'prenom_mod2', 'mode@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `projet`
--

CREATE TABLE `projet` (
  `id_proj` int(11) UNSIGNED NOT NULL,
  `id_ent_proj` int(11) UNSIGNED NOT NULL,
  `id_cand_proj` int(11) UNSIGNED DEFAULT NULL,
  `nom_proj` varchar(50) DEFAULT NULL,
  `description_proj` text,
  `statut_proj` enum('non_classé','approuvé','désapprouvé','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projet`
--

INSERT INTO `projet` (`id_proj`, `id_ent_proj`, `id_cand_proj`, `nom_proj`, `description_proj`, `statut_proj`) VALUES
(1, 1, 0, 'site e-commerce', 'le but de ce projet consiste à la création d''un site web e-commerce ', 'non_classé'),
(2, 1, 0, 'application android', 'application android pour la gestion des services hoteliers', 'approuvé'),
(3, 3, 0, 'Landing Page- One page', 'Looking for a simple clean landing page to link to a Facebook add for lead conversion. I will provide some content for the general idea, but will need the freelancer to be creative to possibly add to it and have knowledge of marketing for what works and what doesn''t', 'non_classé'),
(4, 4, 0, 'Wordpress site', ' Our company is looking for Wordpress Theme and Plugin developer to work as freelancer for long term job. Need to have a good portfolio. ', 'non_classé'),
(5, 6, 0, 'Automated Web Browsing on Ubuntu with Java', '''m looking for someone who has experience making Java front-end (UI) applications that run on Ubuntu Linux. It''ll be a high-performance, asynchronous web browsing system, automatically navigating through millions of pages from 40 simultaneous browser frames. Here is the full description: https://www.evernote.com/shard/s5/sh/faaf55e9-a44b-4ef9-94c7-6c8ba2bd675c/acb309796ac26914afe5d49d46ea27c9 To be eligible, in your application please summarize the Evernote file (above) in your own words, and describe the most similar application you''ve ever made (just ONE example of your best, don''t send me a long list of examples).', 'approuvé'),
(6, 6, 0, 'Viral theme site', 'Looking for someone who can: 1. Recommend a wordpress theme of Likes.com and set it up accordingly. 2. The mobile site must be the same as what in the likes.com This is an ongoing project. I would appreciate if you can send me your quotation.', 'approuvé'),
(7, 4, 0, 'Creat website and IOS app for cars sell', 'I would like to creat a websit page and application for IOS software. The site and app will cars sale such as cars.com and autotrader with some changes.', 'approuvé'),
(8, 3, 0, 'Senior Python/Django And React/Angular Developer', 'Looking for an experienced Python + Javascript developer to implement a web-based text data management system. The interface needs to be snappy (asynchronous), attractive, and responsive / mobile-ready, but it does not need fancy graphics. We are interested in the following technologies: Frontend -> React or AngularJS Backend -> Python, Django, PostgreSQL', 'non_classé'),
(9, 3, 0, 'web tool for checking the update on CrunchBase', 'I would like to ask you to make a tool for checking the update on CrunchBase (https://www.crunchbase.com/) focusing in location. The tool should be developed like - For checking how many companies would be added in a period of time on Crunchbase. - I am thinking there is no need to make crawler, but using API provided by them. (https://data.crunchbase.com/) - Using Clojure (of course with some java libraries would be nice) and MongoDB as backend - A frontend (web page) would be very simple (like just listing the updated list with some parameters, like from date and to date) ', 'non_classé'),
(10, 1, 1, 'projet1', 'd jnrn leb kjfndfdfkj nerbn reljnrmk r', 'approuvé');

-- --------------------------------------------------------

--
-- Table structure for table `projet_competence`
--

CREATE TABLE `projet_competence` (
  `id_proj_pc` int(11) UNSIGNED NOT NULL,
  `id_com_pc` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projet_competence`
--

INSERT INTO `projet_competence` (`id_proj_pc`, `id_com_pc`) VALUES
(1, 1),
(1, 8),
(1, 10),
(2, 19),
(3, 8),
(3, 10),
(3, 12),
(4, 1),
(4, 10),
(5, 5),
(5, 9),
(6, 1),
(6, 5),
(6, 10),
(7, 10),
(7, 20),
(8, 7),
(8, 10),
(8, 11),
(10, 1),
(10, 2),
(10, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievement`
--
ALTER TABLE `achievement`
  ADD PRIMARY KEY (`id_ach`);

--
-- Indexes for table `approbation`
--
ALTER TABLE `approbation`
  ADD PRIMARY KEY (`id_mod_ap`,`id_proj_ap`),
  ADD KEY `fk_approbation_projet` (`id_proj_ap`);

--
-- Indexes for table `candidat`
--
ALTER TABLE `candidat`
  ADD PRIMARY KEY (`id_cand`),
  ADD KEY `fk_estdetype` (`type_cand`);

--
-- Indexes for table `candidature`
--
ALTER TABLE `candidature`
  ADD PRIMARY KEY (`id_cand_candid`,`id_proj_candid`),
  ADD KEY `id_proj_candid` (`id_proj_candid`);

--
-- Indexes for table `candidat_competence`
--
ALTER TABLE `candidat_competence`
  ADD PRIMARY KEY (`id_cand_ec`,`id_com_ec`),
  ADD KEY `fk_etudiant_competence2` (`id_com_ec`);

--
-- Indexes for table `competence`
--
ALTER TABLE `competence`
  ADD PRIMARY KEY (`id_com`);

--
-- Indexes for table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id_ent`);

--
-- Indexes for table `etape`
--
ALTER TABLE `etape`
  ADD PRIMARY KEY (`id_et`),
  ADD KEY `fk_etape_projet` (`id_proj_et`),
  ADD KEY `fk_etape_entreprise` (`id_ent_et`),
  ADD KEY `fk_etape_etud` (`id_cand_et`);

--
-- Indexes for table `gratifie`
--
ALTER TABLE `gratifie`
  ADD PRIMARY KEY (`id_proj`,`id_ent`,`id_cand`,`id_ach`),
  ADD KEY `fk_grat_ent` (`id_ent`),
  ADD KEY `fk_grat_etud` (`id_cand`),
  ADD KEY `fk_grat_ach` (`id_ach`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_mes`),
  ADD KEY `fk_emetteur` (`id_emetteur_mes`),
  ADD KEY `fk_destinataire` (`id_destinataire_mes`);

--
-- Indexes for table `moderateur`
--
ALTER TABLE `moderateur`
  ADD PRIMARY KEY (`id_mod`);

--
-- Indexes for table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`id_proj`),
  ADD KEY `fk_projet_ent` (`id_ent_proj`);

--
-- Indexes for table `projet_competence`
--
ALTER TABLE `projet_competence`
  ADD PRIMARY KEY (`id_proj_pc`,`id_com_pc`),
  ADD KEY `fk_projet_competence_comp` (`id_com_pc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievement`
--
ALTER TABLE `achievement`
  MODIFY `id_ach` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `candidat`
--
ALTER TABLE `candidat`
  MODIFY `id_cand` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `competence`
--
ALTER TABLE `competence`
  MODIFY `id_com` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id_ent` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `etape`
--
ALTER TABLE `etape`
  MODIFY `id_et` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id_mes` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `moderateur`
--
ALTER TABLE `moderateur`
  MODIFY `id_mod` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `projet`
--
ALTER TABLE `projet`
  MODIFY `id_proj` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `approbation`
--
ALTER TABLE `approbation`
  ADD CONSTRAINT `fk_approbation_moderateur` FOREIGN KEY (`id_mod_ap`) REFERENCES `moderateur` (`id_mod`),
  ADD CONSTRAINT `fk_approbation_projet` FOREIGN KEY (`id_proj_ap`) REFERENCES `projet` (`id_proj`);

--
-- Constraints for table `candidat_competence`
--
ALTER TABLE `candidat_competence`
  ADD CONSTRAINT `fk_etudiant_competence1` FOREIGN KEY (`id_cand_ec`) REFERENCES `candidat` (`id_cand`),
  ADD CONSTRAINT `fk_etudiant_competence2` FOREIGN KEY (`id_com_ec`) REFERENCES `competence` (`id_com`);

--
-- Constraints for table `etape`
--
ALTER TABLE `etape`
  ADD CONSTRAINT `fk_etape_entreprise` FOREIGN KEY (`id_ent_et`) REFERENCES `entreprise` (`id_ent`),
  ADD CONSTRAINT `fk_etape_etud` FOREIGN KEY (`id_cand_et`) REFERENCES `candidat` (`id_cand`),
  ADD CONSTRAINT `fk_etape_projet` FOREIGN KEY (`id_proj_et`) REFERENCES `projet` (`id_proj`);

--
-- Constraints for table `projet`
--
ALTER TABLE `projet`
  ADD CONSTRAINT `fk_projet_ent` FOREIGN KEY (`id_ent_proj`) REFERENCES `entreprise` (`id_ent`);

--
-- Constraints for table `projet_competence`
--
ALTER TABLE `projet_competence`
  ADD CONSTRAINT `fk_projet_competence_comp` FOREIGN KEY (`id_com_pc`) REFERENCES `competence` (`id_com`),
  ADD CONSTRAINT `fk_projet_competence_projet` FOREIGN KEY (`id_proj_pc`) REFERENCES `projet` (`id_proj`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
