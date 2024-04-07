-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : sql112.byetcluster.com
-- Généré le :  Dim 28 jan. 2024 à 14:10
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP :  7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `epiz_28718908_lib`
--

-- --------------------------------------------------------

--
-- Structure de la table `authors`
--

CREATE TABLE `authors` (
  `authorID` int(11) NOT NULL,
  `Surname` text NOT NULL,
  `Name` text NOT NULL,
  `Comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `authors`
--

INSERT INTO `authors` (`authorID`, `Surname`, `Name`, `Comments`) VALUES
(1, 'Sloan', 'Robin', 'https://www.robinsloan.com/'),
(2, 'Weir', 'Andy', ''),
(3, 'Simsion', 'Graeme', 'www.graemesimsion.com'),
(4, 'Kurson', 'Robert', ''),
(5, 'Tolkien', 'John Ronald Reuel', '');

-- --------------------------------------------------------

--
-- Structure de la table `base`
--

CREATE TABLE `base` (
  `ID` int(11) NOT NULL,
  `Title` text NOT NULL,
  `Author` int(11) NOT NULL,
  `Language` int(11) NOT NULL,
  `Support` int(11) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `Abstract` text NOT NULL,
  `Stars` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `base`
--

INSERT INTO `base` (`ID`, `Title`, `Author`, `Language`, `Support`, `StartDate`, `EndDate`, `Abstract`, `Stars`) VALUES
(1, 'Surdough: A novel', 1, 1, 2, '2022-06-13', '2022-07-09', 'Novela geek sobre masa madre', 4),
(2, 'Artemis', 2, 1, 2, '2022-07-08', '0000-00-00', 'Novela en la luna', 4),
(3, 'Comment trouver la femme idéale ou Le Théorème du homard ', 3, 2, 2, '2022-06-15', '2022-06-29', 'Don Tillman encuentra a Rosie', 4),
(4, 'Pirate Hunters', 4, 1, 2, '2022-06-01', '2022-06-15', 'Busqueda galeon', 4);

-- --------------------------------------------------------

--
-- Structure de la table `languages`
--

CREATE TABLE `languages` (
  `languageID` int(11) NOT NULL,
  `language` text NOT NULL,
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `languages`
--

INSERT INTO `languages` (`languageID`, `language`, `comments`) VALUES
(1, 'English', ''),
(2, 'Français', ''),
(3, 'Español', '');

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `noteID` int(11) NOT NULL,
  `note` text NOT NULL,
  `noteDate` date NOT NULL,
  `elementID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `notes`
--

INSERT INTO `notes` (`noteID`, `note`, `noteDate`, `elementID`) VALUES
(1, 'Nota modificada de nuevo', '2022-08-05', 1),
(2, 'Otra nota para pruebas', '2022-08-05', 1),
(3, 'Nota de prueba en elemento 2', '2022-08-22', 2),
(4, 'Nota de prueba', '2023-11-26', 3);

-- --------------------------------------------------------

--
-- Structure de la table `stars`
--

CREATE TABLE `stars` (
  `starsID` int(11) NOT NULL,
  `stars` int(11) NOT NULL,
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `stars`
--

INSERT INTO `stars` (`starsID`, `stars`, `comments`) VALUES
(1, 1, 'Minimal Interest - Bad'),
(2, 2, 'Pseee'),
(3, 3, 'Decente - Sin mas'),
(4, 4, 'Bastante top'),
(5, 5, 'Me encanta - Favoritos');

-- --------------------------------------------------------

--
-- Structure de la table `supports`
--

CREATE TABLE `supports` (
  `supportID` int(11) NOT NULL,
  `support` text NOT NULL,
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `supports`
--

INSERT INTO `supports` (`supportID`, `support`, `comments`) VALUES
(1, 'Libro', 'Papel'),
(2, 'eBook', 'ePub'),
(3, 'pdf', 'pdf file'),
(4, 'movie', '');

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE `tags` (
  `tagID` int(11) NOT NULL,
  `tag` text NOT NULL,
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tags`
--

INSERT INTO `tags` (`tagID`, `tag`, `comments`) VALUES
(1, 'geek', ''),
(2, 'engineering', ''),
(3, 'novel', ''),
(4, 'science fiction', ''),
(5, 'physics', 's/c');

-- --------------------------------------------------------

--
-- Structure de la table `tags_elements`
--

CREATE TABLE `tags_elements` (
  `tags_elementsID` int(11) NOT NULL,
  `elementID` int(11) NOT NULL,
  `tagID` int(11) NOT NULL,
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tags_elements`
--

INSERT INTO `tags_elements` (`tags_elementsID`, `elementID`, `tagID`, `comments`) VALUES
(1, 1, 1, ''),
(2, 1, 3, ''),
(3, 2, 1, ''),
(4, 2, 3, ''),
(5, 2, 4, ''),
(6, 3, 1, ''),
(7, 3, 3, ''),
(8, 4, 3, '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`authorID`);

--
-- Index pour la table `base`
--
ALTER TABLE `base`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_author` (`Author`) USING BTREE,
  ADD KEY `FK_stars` (`Stars`),
  ADD KEY `FK_support` (`Support`),
  ADD KEY `FK_language` (`Language`) USING BTREE;

--
-- Index pour la table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`languageID`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`noteID`),
  ADD KEY `FK_id` (`elementID`);

--
-- Index pour la table `stars`
--
ALTER TABLE `stars`
  ADD PRIMARY KEY (`starsID`);

--
-- Index pour la table `supports`
--
ALTER TABLE `supports`
  ADD PRIMARY KEY (`supportID`);

--
-- Index pour la table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tagID`);

--
-- Index pour la table `tags_elements`
--
ALTER TABLE `tags_elements`
  ADD PRIMARY KEY (`tags_elementsID`),
  ADD KEY `FK_tagID` (`tagID`),
  ADD KEY `FK_elementID` (`elementID`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `authors`
--
ALTER TABLE `authors`
  MODIFY `authorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `base`
--
ALTER TABLE `base`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `languages`
--
ALTER TABLE `languages`
  MODIFY `languageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
  MODIFY `noteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `stars`
--
ALTER TABLE `stars`
  MODIFY `starsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `supports`
--
ALTER TABLE `supports`
  MODIFY `supportID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `tags`
--
ALTER TABLE `tags`
  MODIFY `tagID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `tags_elements`
--
ALTER TABLE `tags_elements`
  MODIFY `tags_elementsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `base`
--
ALTER TABLE `base`
  ADD CONSTRAINT `base_ibfk_1` FOREIGN KEY (`Author`) REFERENCES `authors` (`authorID`) ON DELETE CASCADE,
  ADD CONSTRAINT `base_ibfk_2` FOREIGN KEY (`Stars`) REFERENCES `stars` (`starsID`) ON DELETE CASCADE,
  ADD CONSTRAINT `base_ibfk_3` FOREIGN KEY (`Language`) REFERENCES `languages` (`languageID`) ON DELETE CASCADE,
  ADD CONSTRAINT `base_ibfk_4` FOREIGN KEY (`Support`) REFERENCES `supports` (`supportID`) ON DELETE CASCADE;

--
-- Contraintes pour la table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`elementID`) REFERENCES `base` (`ID`) ON DELETE CASCADE;

--
-- Contraintes pour la table `tags_elements`
--
ALTER TABLE `tags_elements`
  ADD CONSTRAINT `tags_elements_ibfk_1` FOREIGN KEY (`elementID`) REFERENCES `base` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `tags_elements_ibfk_2` FOREIGN KEY (`tagID`) REFERENCES `tags` (`tagID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
