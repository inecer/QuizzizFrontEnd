-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 23 mars 2022 à 09:38
-- Version du serveur : 5.7.36
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bddqcm`
--

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

DROP TABLE IF EXISTS `etudiants`;
CREATE TABLE IF NOT EXISTS `etudiants` (
  `idEtudiant` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(15) NOT NULL,
  `motDePasse` varchar(20) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`idEtudiant`),
  UNIQUE KEY `idEtudiant` (`idEtudiant`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiants`
--

INSERT INTO `etudiants` (`idEtudiant`, `login`, `motDePasse`, `nom`, `prenom`, `email`) VALUES
(1, 'ben', '1234', 'Alison', 'Benjamin', 'alison.benjamin@hotmail.fr'),
(5, 'tof', '1234', 'Gand', 'Christophe', 'gand.christophe@free.fr'),
(6, 'lulu', '1234', 'Gand', 'Lucile', 'gand.lucile@bbox.fr'),
(8, 'NIlian', 'ABCD', 'Ils', 'Ilian', 'Ilian.NECER@ortmontreuil.fr'),
(9, 'NIlian', 'ABCD', 'Ils', 'Ilian', 'Ilian.NECER@ortmontreuil.fr'),
(10, 'NECERI', 'ABCD', 'Ils', 'Ilian', 'iliannecer93@gmail.com'),
(11, 'NECERI', 'ABCD', 'Ils', 'Ilian', 'iliannecer93@gmail.com'),
(12, 'NECERI', 'ABCD', 'Ils', 'Ilian', 'iliannecer93@gmail.com'),
(13, 'NECERI', 'ABCD', 'Ils', 'Ilian', 'iliannecer93@gmail.com'),
(14, 'NECERI', 'ABCD', 'Ils', 'Ilian', 'iliannecer93@gmail.com'),
(15, 'NECERI', 'ABCD', 'Ils', 'Ilian', 'iliannecer93@gmail.com'),
(16, 'NECERI', 'ABCD', 'Ils', 'Ilian', 'iliannecer93@gmail.com'),
(17, 'NECERI', 'ABCD', 'Ils', 'Ilian', 'iliannecer93@gmail.com'),
(18, 'NECERI', 'ABCD', 'Ils', 'Ilian', 'iliannecer93@gmail.com'),
(19, 'Moi', 'MOI', 'Lui', 'Nous', 'iliannecer93@gmail.com'),
(20, 'Moi', 'Nunu', 'Ils', 'Ilian', 'iliannecer93@gmail.com'),
(21, 'Le L', '1234', 'N', 'Louange', 'louange@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `qcmfait`
--

DROP TABLE IF EXISTS `qcmfait`;
CREATE TABLE IF NOT EXISTS `qcmfait` (
  `idEtudiant` int(11) NOT NULL,
  `idQuestionnaire` int(11) NOT NULL,
  `dateFait` varchar(10) NOT NULL,
  `point` int(11) NOT NULL,
  PRIMARY KEY (`idEtudiant`,`idQuestionnaire`),
  KEY `idQuestionnaire` (`idQuestionnaire`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `qcmfait`
--

INSERT INTO `qcmfait` (`idEtudiant`, `idQuestionnaire`, `dateFait`, `point`) VALUES
(1, 1, '06-01-2018', 0),
(1, 2, '07-01-2018', 0),
(5, 1, '07-04-2017', 0),
(5, 2, '07-01-2018', 0),
(5, 3, '2017-03-29', 0);

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `idQuestion` int(11) NOT NULL AUTO_INCREMENT,
  `libelleQuestion` varchar(100) NOT NULL,
  `type` int(11) NOT NULL,
  `nbReponse` int(11) NOT NULL,
  `nbBonneReponse` int(11) NOT NULL,
  PRIMARY KEY (`idQuestion`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`idQuestion`, `libelleQuestion`, `type`, `nbReponse`, `nbBonneReponse`) VALUES
(1, 'Complétez le titre du film \"L\'étrange histoire de ...\"', 1, 4, 1),
(2, 'En quelle année est né Woody Alen ?', 1, 4, 1),
(3, 'Quel est le premier film de Léonardo Di Caprio ?', 1, 4, 1),
(4, 'Qui jouaient dans le film \"Rock N Roll\" ?', 1, 4, 3),
(5, 'Qui est l’entraîneur d\'Arsenal ?', 1, 4, 1),
(6, 'En quelle année Nantes a été champion de Fance ?', 1, 6, 4),
(7, 'Qui est le meilleur buteur de ligue 1 pour l\'année 2015-2016 ?', 1, 3, 1),
(8, 'Quelle est la hauteur de la tour Eiffel ?', 1, 3, 1),
(9, 'Qui a écrit l\'étranger ?', 1, 3, 1),
(10, 'Quelle est la capitale de la Roumanie ?', 1, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `questionnaire`
--

DROP TABLE IF EXISTS `questionnaire`;
CREATE TABLE IF NOT EXISTS `questionnaire` (
  `idQuestionnaire` int(11) NOT NULL,
  `libelleQuestionnaire` varchar(100) NOT NULL,
  PRIMARY KEY (`idQuestionnaire`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `questionnaire`
--

INSERT INTO `questionnaire` (`idQuestionnaire`, `libelleQuestionnaire`) VALUES
(1, 'Cinéma'),
(2, 'Foot'),
(3, 'Culture générale');

-- --------------------------------------------------------

--
-- Structure de la table `questionquestionnaire`
--

DROP TABLE IF EXISTS `questionquestionnaire`;
CREATE TABLE IF NOT EXISTS `questionquestionnaire` (
  `idQuestionnaire` int(11) NOT NULL,
  `idQuestion` int(11) NOT NULL,
  PRIMARY KEY (`idQuestionnaire`,`idQuestion`),
  KEY `idQuestion` (`idQuestion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `questionquestionnaire`
--

INSERT INTO `questionquestionnaire` (`idQuestionnaire`, `idQuestion`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 5),
(2, 6),
(2, 7),
(3, 8),
(3, 9),
(3, 10);

-- --------------------------------------------------------

--
-- Structure de la table `questionreponse`
--

DROP TABLE IF EXISTS `questionreponse`;
CREATE TABLE IF NOT EXISTS `questionreponse` (
  `idQuestion` int(11) NOT NULL,
  `idReponse` int(11) NOT NULL,
  `ordre` int(11) NOT NULL,
  `bonne` int(11) NOT NULL,
  PRIMARY KEY (`idQuestion`,`idReponse`),
  KEY `idReponse` (`idReponse`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `questionreponse`
--

INSERT INTO `questionreponse` (`idQuestion`, `idReponse`, `ordre`, `bonne`) VALUES
(1, 1, 1, 0),
(1, 2, 2, 1),
(1, 3, 3, 0),
(1, 4, 4, 0),
(2, 5, 1, 0),
(2, 6, 2, 1),
(2, 7, 3, 0),
(2, 8, 4, 0),
(3, 9, 1, 0),
(3, 10, 2, 1),
(3, 11, 3, 0),
(4, 12, 1, 1),
(4, 13, 2, 0),
(4, 14, 3, 1),
(4, 15, 4, 1),
(5, 16, 1, 0),
(5, 17, 2, 0),
(5, 18, 3, 1),
(5, 19, 4, 0),
(6, 20, 1, 0),
(6, 21, 2, 1),
(6, 22, 3, 1),
(6, 23, 4, 1),
(6, 24, 5, 0),
(6, 25, 6, 1),
(7, 26, 1, 1),
(7, 27, 2, 0),
(7, 28, 3, 0),
(8, 29, 1, 0),
(8, 30, 2, 1),
(8, 31, 3, 0),
(9, 32, 1, 0),
(9, 33, 2, 0),
(9, 34, 3, 1),
(10, 35, 1, 1),
(10, 36, 2, 0),
(10, 37, 3, 0);

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

DROP TABLE IF EXISTS `reponse`;
CREATE TABLE IF NOT EXISTS `reponse` (
  `idReponse` int(11) NOT NULL AUTO_INCREMENT,
  `valeur` text NOT NULL,
  `cheminImage` varchar(1000) NOT NULL,
  PRIMARY KEY (`idReponse`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reponse`
--

INSERT INTO `reponse` (`idReponse`, `valeur`, `cheminImage`) VALUES
(1, 'Benji', ''),
(2, 'Benjamin Button', ''),
(3, 'Benjamin Gates', ''),
(4, 'Benjamin Constant', ''),
(5, '1930', ''),
(6, '1935', ''),
(7, '1940', ''),
(8, '1945', ''),
(9, 'Piranha 2', ''),
(10, 'Critters 3', ''),
(11, 'Amityville II', ''),
(12, 'Guillaume Canet', ''),
(13, 'Clovis Cornillac', ''),
(14, 'Marion Cotillard', ''),
(15, 'Gilles Lelouche', ''),
(16, 'Raymond Domenech', ''),
(17, 'Elie Baup', ''),
(18, 'Arsène Wenger', ''),
(19, 'José Mourinho', ''),
(20, '1964', ''),
(21, '1965', ''),
(22, '1980', ''),
(23, '1983', ''),
(24, '1986', ''),
(25, '1995', ''),
(26, 'Edinson Cavani', ''),
(27, 'Alexandre Lacazette', ''),
(28, 'Bafetimbi Gomis', ''),
(29, '320', ''),
(30, '324', ''),
(31, '328', ''),
(32, 'Victor Hugo', ''),
(33, 'Boris Vian', ''),
(34, 'Albert Camus', ''),
(35, 'Bucarest', ''),
(36, 'Budapest', ''),
(37, 'Sofia', '');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `qcmfait`
--
ALTER TABLE `qcmfait`
  ADD CONSTRAINT `qcmfait_ibfk_1` FOREIGN KEY (`idQuestionnaire`) REFERENCES `questionnaire` (`idQuestionnaire`),
  ADD CONSTRAINT `qcmfait_ibfk_2` FOREIGN KEY (`idEtudiant`) REFERENCES `etudiants` (`idEtudiant`);

--
-- Contraintes pour la table `questionquestionnaire`
--
ALTER TABLE `questionquestionnaire`
  ADD CONSTRAINT `questionquestionnaire_ibfk_1` FOREIGN KEY (`idQuestionnaire`) REFERENCES `questionnaire` (`idQuestionnaire`),
  ADD CONSTRAINT `questionquestionnaire_ibfk_2` FOREIGN KEY (`idQuestion`) REFERENCES `question` (`idQuestion`);

--
-- Contraintes pour la table `questionreponse`
--
ALTER TABLE `questionreponse`
  ADD CONSTRAINT `questionreponse_ibfk_1` FOREIGN KEY (`idQuestion`) REFERENCES `question` (`idQuestion`),
  ADD CONSTRAINT `questionreponse_ibfk_2` FOREIGN KEY (`idReponse`) REFERENCES `reponse` (`idReponse`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
