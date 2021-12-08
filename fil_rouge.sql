-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 06 déc. 2021 à 22:48
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `fil_rouge`
--

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE `auteur` (
  `id_auteur` int(11) NOT NULL,
  `nom_auteur` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`id_auteur`, `nom_auteur`) VALUES
(1, 'Honoré de Balzac'),
(2, 'Molière'),
(3, 'Albert Camus'),
(4, 'Guillaume Musso'),
(5, 'Voltaire'),
(6, 'Victor Hugo'),
(7, 'Alfred de Musset'),
(8, 'Jules Verne'),
(9, 'Emile zola'),
(10, 'Guy de Maupassant'),
(11, 'Marc Levy');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_user`
--

CREATE TABLE `categorie_user` (
  `id_categorie_user` int(11) NOT NULL,
  `nom_categorie_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie_user`
--

INSERT INTO `categorie_user` (`id_categorie_user`, `nom_categorie_user`) VALUES
(1, 'admin'),
(2, 'etudiant'),
(3, 'professeur');

-- --------------------------------------------------------

--
-- Structure de la table `editeur`
--

CREATE TABLE `editeur` (
  `id_editeur` int(11) NOT NULL,
  `raison_sociale_editeur` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `editeur`
--

INSERT INTO `editeur` (`id_editeur`, `raison_sociale_editeur`) VALUES
(1, 'Gallimard '),
(2, 'Flammarion '),
(3, 'Milan '),
(4, 'Baudelaire '),
(5, 'Hachette '),
(6, 'Le léopard masqué'),
(7, 'Allary'),
(8, 'Julliard');

-- --------------------------------------------------------

--
-- Structure de la table `emprunter`
--

CREATE TABLE `emprunter` (
  `id_livre` varchar(255) NOT NULL,
  `uniqueId_user` varchar(50) NOT NULL,
  `date_emprunt_livre` date NOT NULL,
  `date_retour_livre` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `id_livre` varchar(255) NOT NULL,
  `titre_livre` varchar(50) NOT NULL,
  `disponibilite_livre` varchar(50) NOT NULL,
  `date_parution_livre` date NOT NULL,
  `id_theme` int(11) NOT NULL,
  `id_auteur` int(11) NOT NULL,
  `id_editeur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`id_livre`, `titre_livre`, `disponibilite_livre`, `date_parution_livre`, `id_theme`, `id_auteur`, `id_editeur`) VALUES
('LAF111202', 'LA FILLE DE PAP', 'Non', '2021-11-29', 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

CREATE TABLE `theme` (
  `id_theme` int(11) NOT NULL,
  `nom_theme` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `theme`
--

INSERT INTO `theme` (`id_theme`, `nom_theme`) VALUES
(1, 'amour'),
(2, 'aventure'),
(3, 'policier'),
(4, 'fantastique'),
(5, 'science-fiction'),
(6, 'fantasy'),
(7, 'animaux'),
(8, 'nature'),
(9, 'histoire'),
(10, 'sport');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `uniqueId_user` varchar(50) NOT NULL,
  `nom_user` varchar(50) NOT NULL,
  `prenom_user` varchar(50) NOT NULL,
  `adresse_user` varchar(255) NOT NULL,
  `telephone_user` varchar(50) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `date_inscription_user` date DEFAULT NULL,
  `id_categorie_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`uniqueId_user`, `nom_user`, `prenom_user`, `adresse_user`, `telephone_user`, `email_user`, `password_user`, `date_inscription_user`, `id_categorie_user`) VALUES
('ETUUSE002', 'ETUDIANT', 'USER', '2 fake adresse - 75000 paris', '0601020304', 'etudiant@gmail.com', '$2y$10$tvGpfQdpmIbwCi0iWAzGI.3Z12YBlY9.U/oiPIoaYntM5E0ocl6XW', '2021-12-03', 2),
('KONREN001', 'KONE', 'RENE', '9 rue marc seguin - 94000 creteil', '0651298966', 'mystic865@hotmail.fr', '$2y$10$GZTsq7dneZhSGMnwIgJMQek29d843OMfbWAPiqF3XdfA63uCMpXda', '2021-12-03', 1),
('PROUSE003', 'PROFESSEUR', 'USER', '52 fake rue - 75000 paris', '0604030201', 'professeur@gmail.com', '$2y$10$Z27ddzpJ/qHuaCjEstIdCeYgMH3D6PUMWgBdvm6/KTggiZFI3kVsq', '2021-12-03', 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`id_auteur`);

--
-- Index pour la table `categorie_user`
--
ALTER TABLE `categorie_user`
  ADD PRIMARY KEY (`id_categorie_user`);

--
-- Index pour la table `editeur`
--
ALTER TABLE `editeur`
  ADD PRIMARY KEY (`id_editeur`);

--
-- Index pour la table `emprunter`
--
ALTER TABLE `emprunter`
  ADD PRIMARY KEY (`id_livre`,`uniqueId_user`),
  ADD KEY `emprunter_user0_FK` (`uniqueId_user`);

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`id_livre`),
  ADD KEY `livre_theme_FK` (`id_theme`),
  ADD KEY `livre_auteur0_FK` (`id_auteur`),
  ADD KEY `livre_editeur1_FK` (`id_editeur`);

--
-- Index pour la table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id_theme`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uniqueId_user`),
  ADD KEY `user_categorie_user_FK` (`id_categorie_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `auteur`
--
ALTER TABLE `auteur`
  MODIFY `id_auteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `categorie_user`
--
ALTER TABLE `categorie_user`
  MODIFY `id_categorie_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `editeur`
--
ALTER TABLE `editeur`
  MODIFY `id_editeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `theme`
--
ALTER TABLE `theme`
  MODIFY `id_theme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `emprunter`
--
ALTER TABLE `emprunter`
  ADD CONSTRAINT `emprunter_livre_FK` FOREIGN KEY (`id_livre`) REFERENCES `livre` (`id_livre`),
  ADD CONSTRAINT `emprunter_user0_FK` FOREIGN KEY (`uniqueId_user`) REFERENCES `user` (`uniqueId_user`);

--
-- Contraintes pour la table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `livre_auteur0_FK` FOREIGN KEY (`id_auteur`) REFERENCES `auteur` (`id_auteur`),
  ADD CONSTRAINT `livre_editeur1_FK` FOREIGN KEY (`id_editeur`) REFERENCES `editeur` (`id_editeur`),
  ADD CONSTRAINT `livre_theme_FK` FOREIGN KEY (`id_theme`) REFERENCES `theme` (`id_theme`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_categorie_user_FK` FOREIGN KEY (`id_categorie_user`) REFERENCES `categorie_user` (`id_categorie_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
