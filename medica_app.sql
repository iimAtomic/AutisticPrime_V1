-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 03 avr. 2023 à 18:26
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `medica_app`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_880E0D76F85E0677` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `roles`, `password`) VALUES
(1, 'admin@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$t2tpHlYBeP/dQG0Gj.AnkelsM7VzLX78HrZ/xvQEDjOSLh/SDBYde'),
(2, 'user@gmail.com', '[\"ROLE_USER\"]', '$2y$13$TYVCvz7mH1ItJtqGR/PaCe/DcXNWXhsOKc.PsMYG7/wzZVsVgT2Em');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_creation` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `date_modification` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `date_creation`, `date_modification`) VALUES
(1, 'Chaussures', '2023-04-03 06:59:22', NULL),
(2, 'Vetement', '2023-04-03 14:33:08', NULL),
(3, 'Short', '2023-04-03 16:39:49', '2023-04-03 16:40:00'),
(4, 'CHAPEAU', '2023-04-03 18:17:58', '2023-04-03 20:17:00');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230401073126', '2023-04-01 07:31:46', 3728),
('DoctrineMigrations\\Version20230402050621', '2023-04-02 05:06:49', 5472),
('DoctrineMigrations\\Version20230402060513', '2023-04-02 06:05:30', 1082),
('DoctrineMigrations\\Version20230402080421', '2023-04-02 08:05:40', 388),
('DoctrineMigrations\\Version20230403072213', '2023-04-03 07:22:29', 1273),
('DoctrineMigrations\\Version20230403081003', '2023-04-03 08:10:13', 469),
('DoctrineMigrations\\Version20230403082142', '2023-04-03 08:21:47', 1575),
('DoctrineMigrations\\Version20230403082716', '2023-04-03 08:27:26', 517),
('DoctrineMigrations\\Version20230403151941', '2023-04-03 15:19:52', 4355);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `category_id` int NOT NULL,
  `date_creation` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_size` int NOT NULL,
  `date_modification` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D34A04AD12469DE2` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `category_id`, `date_creation`, `image`, `image_size`, `date_modification`, `description`) VALUES
(2, 'Jordan Retro 4', 13000, 1, '2023-04-03 08:28:16', 'sneak1-642a8e20aaaf8135657036.png', 165948, NULL, NULL),
(3, 'Jordan Retro 4  rouge', 1300, 1, '2023-04-03 14:28:25', 'sneak2-642ae289e84aa771246828.png', 212280, NULL, NULL),
(4, 'Jordan Retro 4 vert', 2300, 1, '2023-04-03 14:29:10', 'sneak3-642ae2b66c0df986531735.png', 184376, NULL, NULL),
(5, 'Jordan Retro 4 Violet', 8500, 1, '2023-04-03 14:30:06', 'sneak1-642ae2ee565dc630564893.png', 165948, NULL, NULL),
(6, 'Jordan Retro 4 Noir', 8500, 1, '2023-03-01 14:31:39', 'sneak5-642ae34b95fe8479134061.png', 432294, NULL, NULL),
(7, 'Nike tee shirt Vert', 4500, 2, '2023-04-03 14:33:48', 'tenu1-2-642ae3cc54138120029970.jpeg', 140914, NULL, NULL),
(8, 'Nike tee shirt Rouge', 4500, 2, '2023-04-03 14:34:48', 'tenu4-642ae40830737085285068.jpeg', 127998, NULL, NULL),
(9, 'Nike tee shirt  violet', 4500, 2, '2023-04-03 14:35:54', 'tenu3-642ae44ad284c949688570.jpeg', 150822, NULL, NULL),
(10, 'Nike tee shirt  orange', 4500, 2, '2023-04-03 14:36:32', 'tenu2-642ae470b89a2957223685.jpeg', 152687, NULL, NULL),
(11, 'Jordan Retro 4 Noirr', 8500, 1, '2023-01-01 15:28:41', 'sneak6-642af0a983d19474037774.png', 245697, '2023-04-03 15:28:41', 'La Jordan 4 Retro Noir est une chaussure de basket-ball fabriquée par Nike en collaboration avec le joueur de basket-ball Michael Jordan. La chaussure est également équipée de la marque Jumpman de Michael Jordan sur le talon et la langue, un must-have pou'),
(12, 'Nike tee shirt', 4500, 2, '2023-04-03 16:34:25', 'tenu1-642b00118bc89179300550.jpeg', 132838, '2023-04-03 16:34:25', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_D34A04AD12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
