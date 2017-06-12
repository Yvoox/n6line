-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 08 Juin 2017 à 13:44
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `n6line`
--

-- --------------------------------------------------------

--
-- Structure de la table `actualite`
--

CREATE TABLE `actualite` (
  `id` int(11) NOT NULL,
  `titre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contenu` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fichier` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `mkgroup` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `actualite`
--

INSERT INTO `actualite` (`id`, `titre`, `contenu`, `position`, `fichier`, `date`, `mkgroup`) VALUES
(34, 'gzegergez', 'gergez', '', '', '2017-06-03 14:20:57', 0),
(35, 'vetvevfd', 'vdfvdfvd', '', '', '2017-06-03 14:23:33', 0),
(36, 'bbfgbsdsd', 'bdbds', '', '', '2017-06-03 14:24:25', 0),
(37, 'bbfgbsdsd', 'bdbds', '', '', '2017-06-03 14:25:21', 0),
(38, 'bbfgbsdsd', 'bdbds', '', '', '2017-06-03 14:25:38', 0),
(39, 'bbfgbsdsd', 'bdbds', '', '', '2017-06-03 14:26:19', 0),
(40, 'bbfgbsdsd', 'bdbds', '', '', '2017-06-03 14:27:19', 0),
(41, 'bbfgbsdsd', 'bdbds', '', '', '2017-06-03 14:28:41', 0),
(42, 'bbfgbsdsd', 'bdbds', '', '', '2017-06-03 14:29:12', 0),
(43, 'bbfgbsdsd', 'bdbds', '', '', '2017-06-03 14:29:28', 0),
(44, 'vdvqsvsqdv', 'sqvsqdvq', '', '', '2017-06-03 14:30:25', 0),
(45, 'vaezrvfeqvfdvfd', 'vfdsvfdvvdfs', '', '', '2017-06-03 14:30:37', 0),
(46, 'vsvqvqvsv', 'vsdfvds', '', '', '2017-06-03 14:31:08', 0),
(47, 'vsvqvqvsv', 'vsdfvds', '', '', '2017-06-03 14:31:26', 0),
(48, 'vvdsfvdsfv', 'vdsfvdsf', '', '', '2017-06-03 14:33:24', 0),
(49, 'verrve', 'veververv', '', '', '2017-06-03 14:33:46', 0),
(78, 'fvgfgdfgdsg', 'sdgdsfgdsfg', 'sdgsdfgsdfg', '', '2017-06-06 14:03:55', 0),
(33, 'bggdbdfgbd', 'bfgdbfdg', '', '', '2017-06-03 14:20:10', 0),
(32, 'vqfdfsvfvsdfv', 'dsfvdsvds', '', '', '2017-06-03 14:17:35', 0),
(31, 'bgdbgfbdgfbgfd', 'bfdbfdgbfdg', '', '', '2017-06-03 14:14:50', 0),
(67, 'salut ca va', 'heho', 'ballersdorf', '', '2017-06-05 09:12:28', 0),
(77, 'vfvqvdsfvsdvfsdv', 'sdfvdsfv', 'dfvdsvfv', '', '2017-06-06 14:03:49', 0),
(82, 'gros test', 'je merge', 'mulhouse', '', '2017-06-07 11:27:10', 0),
(86, 'freferfer', 'ferfer', 'ferferfe', '', '2017-06-07 11:58:18', 1000),
(83, 'gros test', 'je merge', 'mulhouse', '', '2017-06-07 11:29:57', 0),
(84, 'gros test', 'je merge', 'mulhouse', '', '2017-06-07 11:30:11', 0),
(87, 'salut', 'publie bien cool ;)', 'mulhouse', '', '2017-06-07 11:58:35', 0),
(88, 'brgbtb', 'brtbrt', 'rbrtbrt', '', '2017-06-07 13:11:07', 0),
(89, 'fdsfgdsfgdsfg', 'dsfgsdfgdsgf', 'sdgdsfgdsfg', '', '2017-06-07 13:11:19', 0),
(90, 'je dois reconnaitre', 'arzerz', 'arze', '', '2017-06-07 13:11:44', 0),
(92, 'berberberb', 'brebrebret', 'retbretb', '', '2017-06-07 21:06:21', 0),
(93, 'aaaaa', 'aaaa', 'aaaa', '', '2017-06-07 21:10:21', 0),
(94, 'v zer bvvrtz', 'vezrgzezg', 'vzerzegegrz', '', '2017-06-07 21:13:20', 0),
(95, 'test 08-06-2017', 'ceci est un test pour 08-06', '', '', '2017-06-08 07:40:44', 0),
(98, 'test depuis le profil', ' azeeaz e', 'azeaz eaz', '', '2017-06-08 07:45:04', 0),
(99, 'test depuis le groupe', 'dzekhfzke', 'sur le groupe', '', '2017-06-08 07:47:30', 23),
(100, 'test depuis le groupe', 'dzekhfzke', 'sur le groupe', '', '2017-06-08 07:48:36', 23),
(101, 'test depuis le groupe', 'dzekhfzke', 'sur le groupe', '', '2017-06-08 07:50:04', 23),
(102, 'tereqtrg', 'qergqregqe', 'tqrgrgg', '', '2017-06-08 07:50:11', 23),
(103, 'vqvsdvqsv', 'vqsdvsqdv', 'sqvvqsdvsq', '', '2017-06-08 07:54:50', 23),
(104, 'test depuis le groupe', 'test', 'test', '', '2017-06-08 07:55:03', 23),
(105, 'geqrggqerg', 'gezgze', 'ergegzegez', '', '2017-06-08 09:09:06', 0),
(107, 'fzefzef', 'fzefze', 'fzefzefz', '', '2017-06-08 12:17:22', 2);

-- --------------------------------------------------------

--
-- Structure de la table `administration`
--

CREATE TABLE `administration` (
  `id` int(11) NOT NULL,
  `fonction` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `administration`
--

INSERT INTO `administration` (`id`, `fonction`) VALUES
(456, 'Secretaire'),
(456, 'Secretaire');

-- --------------------------------------------------------

--
-- Structure de la table `appartient`
--

CREATE TABLE `appartient` (
  `idUtil` int(11) NOT NULL,
  `idGroup` int(11) NOT NULL,
  `admin` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `appartient`
--

INSERT INTO `appartient` (`idUtil`, `idGroup`, `admin`) VALUES
(24535, 1, 0),
(1, 1, 0),
(456, 2, 0),
(2, 18, 1),
(2, 19, 1),
(2, 20, 1),
(2, 21, 1),
(2, 22, 1),
(2, 23, 1),
(2, 24, 1),
(2, 25, 1),
(456, 23, 0);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `idutil` int(11) NOT NULL,
  `contenu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `idutil`, `contenu`, `date`) VALUES
(68, 2, 'fsefdsqf', '2017-06-08 12:29:34');

-- --------------------------------------------------------

--
-- Structure de la table `commente`
--

CREATE TABLE `commente` (
  `id` int(11) NOT NULL,
  `idact` int(11) NOT NULL,
  `idcom` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `commente`
--

INSERT INTO `commente` (`id`, `idact`, `idcom`) VALUES
(41, 105, 68);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id` int(11) NOT NULL,
  `promotion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `filiere` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `promotion`, `filiere`) VALUES
(1, '2016/2019', '1A-IR');

-- --------------------------------------------------------

--
-- Structure de la table `fonction`
--

CREATE TABLE `fonction` (
  `idUtil` int(11) NOT NULL,
  `idEtudiant` int(11) NOT NULL,
  `idAdmi` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `fonction`
--

INSERT INTO `fonction` (`idUtil`, `idEtudiant`, `idAdmi`) VALUES
(1, 1, 0),
(456, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(5000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`id`, `nom`, `description`) VALUES
(1, 'Amoureux des fleurs', ''),
(2, 'Amoureux des fleurs', ''),
(3, 'Amoureux des Bryans', ''),
(4, 'tp mathlab', 'Pour partager nos conaissances en mathlab'),
(5, 'tp mathlab', 'Pour partager nos conaissances en mathlab'),
(6, 'gerger', 'gerger'),
(7, 'gfgfd', 'gfdgdf'),
(8, 'fdsvgsffg', 'gdfgdf'),
(9, 'ggdhhfgb', 'fgbfgbfg'),
(10, 'bfgbfgb', 'bfgbfgbf'),
(11, 'eggrerge', 'egrger'),
(12, 'ggregrger', 'gergerger'),
(13, 'gergerge', 'tjtyjty'),
(14, 'aze', 'azee'),
(15, 'test final', 'test test'),
(16, 'zzgegezgezr', 'gergerzgze'),
(17, 'e&ée&éé"&"é"&é', '"&é"&é"&'),
(18, 'tentative \' ', 'aez  \' razz '),
(19, 'Super groupe', 'Ceci est un super groupe'),
(20, 'le nouveau groupe', 'comme le nom l\'indique'),
(21, 'gezrgzrgzer', 'gzergzer'),
(22, 'fzefzefzef', 'zefzefzefz'),
(23, 'last groupe', 'Le dernier et le meilleur'),
(24, 'trop marre', 'ca marche pas'),
(25, 'dernière tentative', 'après j\'arrête');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `contenu` text COLLATE utf8_unicode_ci NOT NULL,
  `fichier` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id`, `contenu`, `fichier`, `date`) VALUES
(1, 'ghshghdhgdf', '', '2017-06-21 04:16:46'),
(2, 'nregndfnfgnfd', '', '2017-06-20 08:25:29'),
(3, 'bgbsgsbs', '', '2017-06-21 00:00:00'),
(4, 'message', '', '2017-06-21 00:00:00'),
(5, 'brgbgrf', '', '2017-06-01 15:07:39'),
(6, 'hdgfhdfghfdghdfgh', '', '2017-06-01 15:12:08'),
(7, 'gsgdfgsfd', '', '2017-06-01 16:23:02'),
(8, 'gsdfgsdf', '', '2017-06-01 16:23:07'),
(9, 'sgdfgsfdgsd', '', '2017-06-01 16:23:11'),
(10, 'salut', '', '2017-06-01 16:23:54'),
(11, 'Coucou\r\n', '', '2017-06-01 16:24:16'),
(12, 'Coucou tes la\r\n', '', '2017-06-01 16:27:20'),
(13, 'coucou', '', '2017-06-01 16:27:41'),
(14, 'ca marche ?', '', '2017-06-01 16:27:53'),
(15, 'hey', '', '2017-06-01 16:31:27'),
(16, 'CA MARCHE', '', '2017-06-01 16:32:00'),
(17, 'Coucou tes la ?', '', '2017-06-01 16:33:44'),
(18, 'Oui ! Jsuis la\r\nComment ca va ?', '', '2017-06-01 16:34:00'),
(19, 'Yo mec !', '', '2017-06-02 07:13:19'),
(20, 'Salut ca va ?\r\n', '', '2017-06-02 08:19:25'),
(21, 'Oui et toi ?', '', '2017-06-02 08:19:36'),
(22, 'tu es la ?', '', '2017-06-05 09:03:51'),
(23, ';)', '', '2017-06-06 08:21:30'),
(24, ':)', '', '2017-06-06 08:21:41'),
(25, 'test', '', '2017-06-06 09:00:38'),
(26, 'test', '', '2017-06-06 09:01:32'),
(27, 'test', '', '2017-06-06 09:01:50'),
(28, 'nsgnfg', '', '2017-06-06 09:06:40'),
(29, 'ggst', '', '2017-06-06 09:07:21'),
(30, 'efbsdbdsbf', '', '2017-06-06 09:09:24'),
(31, 'fzefe', '', '2017-06-06 09:10:25'),
(32, 'test', '', '2017-06-06 09:10:52'),
(33, 'tentative', '', '2017-06-06 09:11:01'),
(34, 'test', '', '2017-06-06 09:11:08'),
(35, 'fzefe', '', '2017-06-06 09:11:16'),
(36, 'salouti', '', '2017-06-06 09:11:24'),
(37, 'tentative', '', '2017-06-06 09:11:43'),
(38, 'tesst', '', '2017-06-06 09:12:55'),
(39, 'teest', '', '2017-06-06 09:15:36'),
(40, 'teeest', '', '2017-06-06 09:15:56'),
(41, ';)', '', '2017-06-06 11:47:11'),
(42, 'Ceci est un test', '', '2017-06-06 13:22:33'),
(43, 'je tente un test', '', '2017-06-06 13:24:40'),
(44, 'bonne nuit\r\n', '', '2017-06-06 19:55:09'),
(45, 'bonne nuit', '', '2017-06-06 19:55:18'),
(46, 'test', '', '2017-06-06 19:55:28'),
(47, 'coucou\r\n', '', '2017-06-07 08:22:06'),
(48, 'coucou', '', '2017-06-07 08:22:11'),
(49, 'Coucou', '', '2017-06-07 08:22:15'),
(50, 'gsgdfsfd', '', '2017-06-07 08:22:31'),
(51, 'gsgdfgsfd', '', '2017-06-07 08:22:46'),
(52, 'coucou', '', '2017-06-07 08:25:28'),
(53, ';)\r\n', '', '2017-06-07 12:27:33'),
(54, 'zergezg', '', '2017-06-08 10:23:50'),
(55, 'gzegzegzgez', '', '2017-06-08 10:23:51'),
(56, 'azdasdsda', '', '2017-06-08 10:23:53');

-- --------------------------------------------------------

--
-- Structure de la table `messtrans`
--

CREATE TABLE `messtrans` (
  `idexp` int(11) NOT NULL,
  `iddesti` int(11) NOT NULL,
  `idmessage` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `messtrans`
--

INSERT INTO `messtrans` (`idexp`, `iddesti`, `idmessage`) VALUES
(2, 1, 5),
(2, 1, 6),
(2, 1, 8),
(2, 1, 11),
(2, 2, 7),
(2, 2, 11),
(2, 2, 13),
(2, 2, 50),
(2, 456, 9),
(2, 456, 10),
(2, 456, 18),
(2, 456, 19),
(2, 456, 21),
(2, 456, 22),
(2, 456, 23),
(2, 456, 25),
(2, 456, 28),
(2, 456, 29),
(2, 456, 30),
(2, 456, 31),
(2, 456, 33),
(2, 456, 36),
(2, 456, 38),
(2, 456, 39),
(2, 456, 40),
(2, 456, 42),
(2, 456, 43),
(2, 456, 44),
(2, 456, 45),
(2, 456, 53),
(2, 456, 54),
(2, 456, 55),
(2, 456, 56),
(275, 2752, 2757),
(456, 1, 13),
(456, 1, 14),
(456, 1, 15),
(456, 2, 12),
(456, 2, 16),
(456, 2, 17),
(456, 2, 20),
(456, 456, 23),
(456, 456, 24);

-- --------------------------------------------------------

--
-- Structure de la table `notificationmessage`
--

CREATE TABLE `notificationmessage` (
  `idutil` int(11) NOT NULL,
  `idmess` int(11) NOT NULL,
  `vu` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `notificationmessage`
--

INSERT INTO `notificationmessage` (`idutil`, `idmess`, `vu`) VALUES
(456, 40, 1),
(456, 23, 1),
(456, 42, 1),
(456, 43, 1),
(456, 44, 1),
(456, 45, 1),
(456, 25, 1),
(2, 11, 1),
(2, 13, 1),
(2, 13, 1),
(2, 50, 1),
(2, 7, 1),
(2, 13, 1),
(456, 53, 1),
(456, 54, 1),
(456, 55, 1),
(456, 56, 1);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `iduti` int(11) NOT NULL,
  `idact` int(11) NOT NULL,
  `idgroup` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `post`
--

INSERT INTO `post` (`iduti`, `idact`, `idgroup`) VALUES
(2, 48, 0),
(2, 50, 0),
(456, 87, 0),
(456, 86, 0),
(2, 79, 0),
(2, 78, 0),
(456, 71, 0),
(2, 62, 0),
(2, 67, 0),
(2, 49, 0),
(2, 77, 0),
(2, 51, 0),
(2, 92, 0),
(2, 93, 0),
(2, 94, 0),
(2, 95, 0),
(2, 98, 0),
(2, 103, 0),
(2, 104, 0),
(2, 105, 0),
(456, 107, 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `uha` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `@xmpp` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `adresse` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mdp` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `connecte` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `uha`, `@xmpp`, `nom`, `prenom`, `age`, `adresse`, `description`, `mdp`, `connecte`) VALUES
(1, 'alexandre@uha.fr', 'alexandre@xmpp.fr', 'colicchio', 'alexandre', 23, '19 rue des VERGERS 68100 Mulhouse', '', 'gfbfds45gs26', 0),
(456, 'jean@uha.fr', 'jean@xmpp.fr', 'fdqbfsfd', 'jean', 23, '58 rue des VERGERS 68100 Mulhouse', 'ydwhdgfhxfhg', 'wvdf57', 1),
(2, 'alexandre.colicchio@uha.fr', 'alexandre.colicchio@xmpp.fr', 'colicchio', 'Alexandre', 23, '18 rue de l\'économie 68200 mulhouse', 'gsfqgqsgsdgsdq', 'azerty', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `actualite`
--
ALTER TABLE `actualite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `appartient`
--
ALTER TABLE `appartient`
  ADD PRIMARY KEY (`idUtil`,`idGroup`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commente`
--
ALTER TABLE `commente`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fonction`
--
ALTER TABLE `fonction`
  ADD PRIMARY KEY (`idUtil`,`idEtudiant`,`idAdmi`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messtrans`
--
ALTER TABLE `messtrans`
  ADD PRIMARY KEY (`idexp`,`iddesti`,`idmessage`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`iduti`,`idact`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `actualite`
--
ALTER TABLE `actualite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT pour la table `commente`
--
ALTER TABLE `commente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
