-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 22 jan. 2024 à 11:33
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `agence de voyage`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateurs`
--

CREATE TABLE `administrateurs` (
  `admine_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `administrateurs`
--

INSERT INTO `administrateurs` (`admine_id`, `name`, `password`, `email`) VALUES
(2, 'steve', '$2y$10$hxpf2THAMSKmcf/ZTgD3o.xvhBFK77/eusI5/Gv.Xwl7ON8KTXS0W', 'stivanemaikel@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `destination`
--

CREATE TABLE `destination` (
  `id_Destination` int(11) NOT NULL,
  `Description` text NOT NULL,
  `destination_hotle` varchar(255) NOT NULL,
  `img_src` varchar(1000) NOT NULL,
  `read_more_url` varchar(1000) NOT NULL,
  `pays` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `destination`
--

INSERT INTO `destination` (`id_Destination`, `Description`, `destination_hotle`, `img_src`, `read_more_url`, `pays`) VALUES
(38, 'Au cœur de Paris, La Maison Favart se trouve à quelques minutes de marche du Musée Grévin et de l\'Opéra de Paris. Le Musée du Louvre et la Cathédrale Notre-Dame se trouvent également à proximité', 'LA MAISON FAVART', '../site/uploads/65ac03dfc3775.jpg', 'https://www.tripadvisor.fr/Hotel_Review-g187147-d232552-Reviews-La_Maison_Favart-Paris_Ile_de_France.html', 'paris'),
(39, '\r\nINNSiDE by Meliá is a contemporary hotel brand under the Meliá Hotels International umbrella. Designed with a focus on modern and innovative concepts, INNSiDE hotels aim to provide a dynamic', 'INNSIDE BY MELIÁ', '../site/uploads/65ac043f8386c.jpg', 'https://www.tripadvisor.fr/Hotel_Review-g60763-d8873263-Reviews-INNSiDE_by_Melia_New_York_Nomad-New_York_City_New_York.html', 'U.S.A NEW YORK'),
(40, 'Corinthia London is a luxury five-star hotel located in the heart of London, known for its elegance, sophistication, and top-notch hospitality. Here are some key features and aspects associated with Corinthia London', 'Corinthia London', '../site/uploads/65ac050c3f970.jpg', 'https://www.tripadvisor.fr/Hotel_Review-g186338-d1845678-Reviews-Corinthia_London-London_England.html', 'london'),
(42, 'L\'Hotel Catalonia Park Guell est l\'établissement parfait pour les voyageurs souhaitant se ressourcer lors de leur séjour à Barcelone. Réputé pour son cadre familial et sa proximité de grands restaurants et attractions', 'catalonia park guell', '../site/uploads/65ac0e216c3a5.jpg', 'https://www.tripadvisor.fr/Hotel_Review-g187497-d236194-Reviews-Hotel_Catalonia_Park_Guell-Barcelona_Catalonia.html', 'Barcelone'),
(43, 'Hotel Colosseum est l\'hôtel préféré des voyageurs visitant Rome. Mélange idéal entre rapport qualité/prix et confort, il offre un cadre de charme avec une gamme de services conçus pour les voyageurs comme vous.', 'hotel colosseum', '../site/uploads/65ac0eb86e1cb.jpg', 'https://www.tripadvisor.fr/Hotel_Review-g187791-d230612-Reviews-Hotel_Colosseum-Rome_Lazio.html', 'rome'),
(46, 'Situés à quelques pas des monuments les plus populaires de Dubaï, comme Burj Khalifa - At The Top (0,4 km) et Bastakia Quarter (0,6 km), le The Palace The Old Town Hotel est une destination de choix pour les touristes', 'Palace Downtown', '../site/uploads/65ac11249fdb5.jpg', 'https://www.tripadvisor.fr/Hotel_Review-g295424-d674456-Reviews-Palace_Downtown-Dubai_Emirate_of_Dubai.html', 'dubai'),
(47, 'sadsdasdsadadadasdsadasdsadasdsadasdasdasdasdasdasdas', 'el atlas', '../site/uploads/65ae388d2bdd6.jpg', 'fdf', 'algeria');

-- --------------------------------------------------------

--
-- Structure de la table `reservation_hotels`
--

CREATE TABLE `reservation_hotels` (
  `Hotel_id` int(11) NOT NULL,
  `hname` varchar(100) NOT NULL,
  `Date_Debut` date NOT NULL,
  `Date_fin` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `personnes` varchar(255) NOT NULL,
  `number_de_chambre` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservation_hotels`
--

INSERT INTO `reservation_hotels` (`Hotel_id`, `hname`, `Date_Debut`, `Date_fin`, `user_id`, `personnes`, `number_de_chambre`, `statut`) VALUES
(20, 'LA MAISON FAVART', '2024-01-23', '2024-02-11', 11, '1', '1', '1');

-- --------------------------------------------------------

--
-- Structure de la table `reservation_vol`
--

CREATE TABLE `reservation_vol` (
  `FlightID` int(11) NOT NULL,
  `date_depart` date NOT NULL,
  `date_arrivee` date NOT NULL,
  `nombre_passager` varchar(255) NOT NULL,
  `Destination` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `passeport` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservation_vol`
--

INSERT INTO `reservation_vol` (`FlightID`, `date_depart`, `date_arrivee`, `nombre_passager`, `Destination`, `user_id`, `passeport`, `statut`) VALUES
(190, '2024-01-23', '2024-02-11', '1', '(----paris-----)', 11, '', '1');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `telephone` int(30) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Ville` varchar(100) NOT NULL,
  `Pays` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `code_postal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `nom`, `prenom`, `telephone`, `adresse`, `password`, `Ville`, `Pays`, `email`, `code_postal`) VALUES
(11, 'lakehal', 'amine', 2147483647, '24 fivre deoura', '12345', 'alge', 'Algeria', 'stivanemaikel@gmail.com', '16000'),
(22, 'loubna', 'khramsia', 2147483647, '416 log', '12345', 'alger', 'algerie', 'khramsialoubna@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Structure de la table `vol`
--

CREATE TABLE `vol` (
  `vol_id` int(11) NOT NULL,
  `nom_flight` varchar(50) NOT NULL,
  `le_voyage` varchar(255) NOT NULL,
  `heure_depart_vol` time(6) NOT NULL,
  `heure_arrive_vol` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `vol`
--

INSERT INTO `vol` (`vol_id`, `nom_flight`, `le_voyage`, `heure_depart_vol`, `heure_arrive_vol`) VALUES
(19, 'r34', '(-----london-----)', '07:00:00.000000', '07:01:00.000000'),
(20, 'r34', '(----U.S.A NEW YORK----)', '08:01:00.000000', '08:01:00.000000'),
(21, 'r34', '(----paris-----)', '08:02:00.000000', '07:02:00.000000'),
(22, 'r34', '(---Roma.italy---)', '00:06:00.000000', '23:04:00.000000'),
(24, 'r34', 'france', '15:33:00.000000', '10:39:00.000000');

-- --------------------------------------------------------

--
-- Structure de la table `voyage organise`
--

CREATE TABLE `voyage organise` (
  `ID_Voyage` int(11) NOT NULL,
  `Destination` varchar(255) NOT NULL,
  `Date_Debut` date NOT NULL,
  `Date_Fin` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  ADD PRIMARY KEY (`admine_id`);

--
-- Index pour la table `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`id_Destination`);

--
-- Index pour la table `reservation_hotels`
--
ALTER TABLE `reservation_hotels`
  ADD PRIMARY KEY (`Hotel_id`),
  ADD KEY `reservation_hotels_user_id_foreign` (`user_id`);

--
-- Index pour la table `reservation_vol`
--
ALTER TABLE `reservation_vol`
  ADD PRIMARY KEY (`FlightID`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Index pour la table `vol`
--
ALTER TABLE `vol`
  ADD PRIMARY KEY (`vol_id`);

--
-- Index pour la table `voyage organise`
--
ALTER TABLE `voyage organise`
  ADD PRIMARY KEY (`ID_Voyage`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  MODIFY `admine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `destination`
--
ALTER TABLE `destination`
  MODIFY `id_Destination` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `reservation_hotels`
--
ALTER TABLE `reservation_hotels`
  MODIFY `Hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `reservation_vol`
--
ALTER TABLE `reservation_vol`
  MODIFY `FlightID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `vol`
--
ALTER TABLE `vol`
  MODIFY `vol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `voyage organise`
--
ALTER TABLE `voyage organise`
  MODIFY `ID_Voyage` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation_hotels`
--
ALTER TABLE `reservation_hotels`
  ADD CONSTRAINT `reservation_hotels_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservation_hotels_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Contraintes pour la table `reservation_vol`
--
ALTER TABLE `reservation_vol`
  ADD CONSTRAINT `reservation_vol_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservation_vol_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Contraintes pour la table `voyage organise`
--
ALTER TABLE `voyage organise`
  ADD CONSTRAINT `voyage organise_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
