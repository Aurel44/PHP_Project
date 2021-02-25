-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 25 fév. 2021 à 09:14
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `project1`
--

-- --------------------------------------------------------

--
-- Structure de la table `blog_article`
--

DROP TABLE IF EXISTS `blog_article`;
CREATE TABLE IF NOT EXISTS `blog_article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_text` text NOT NULL,
  `article_author` varchar(100) NOT NULL,
  `article_date` datetime NOT NULL,
  PRIMARY KEY (`article_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(4) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cart`
--

INSERT INTO `cart` (`cart_id`, `product_id`, `product_quantity`, `user_id`) VALUES
(52, 3, 3, 1),
(51, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Vapotes'),
(2, 'Papeterie'),
(3, 'Café/Thé'),
(4, 'Bonbons'),
(5, 'Cigares'),
(6, 'Briquets');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `active` int(11) NOT NULL DEFAULT '0',
  `comment_text` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`comment_id`, `active`, `comment_text`, `user_id`, `product_id`) VALUES
(5, 1, 'Super Article !!!!', 1, 2),
(4, 1, 'Super Article !!!!', 1, 1),
(7, 0, 'Super Article !!!!', 1, 4),
(8, 0, 'Super Article !!!!', 1, 5),
(9, 0, 'Super Article !!!!', 1, 6),
(10, 0, 'Super Article !!!!', 1, 7),
(11, 1, 'Super Article !!!!', 1, 8),
(12, 1, 'Super Article !!!!', 1, 9),
(13, 1, 'Super Article !!!!', 1, 10),
(14, 1, 'Super Article !!!!', 1, 11),
(15, 1, 'Super Article !!!!', 1, 12),
(16, 1, 'Super Article !!!!', 1, 13),
(17, 1, 'Super Article !!!!', 1, 14),
(18, 1, 'Super Article !!!!', 1, 15),
(19, 1, 'Super Article !!!!', 1, 16),
(20, 1, 'Super Article !!!!', 1, 17),
(21, 1, 'Super Article !!!!', 1, 18),
(22, 1, 'Super Article !!!!', 1, 19),
(23, 1, 'Super Article !!!!', 1, 20),
(24, 1, 'Super Article !!!!', 1, 21),
(25, 1, 'Super Article !!!!', 1, 22),
(26, 1, 'Super Article !!!!', 1, 23),
(27, 1, 'Super Article !!!!', 1, 24),
(28, 1, 'Super Article !!!!', 1, 25),
(29, 1, 'Super Article !!!!', 1, 26);

-- --------------------------------------------------------

--
-- Structure de la table `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(50) NOT NULL,
  `reclam_id` int(11) NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `pics`
--

DROP TABLE IF EXISTS `pics`;
CREATE TABLE IF NOT EXISTS `pics` (
  `pic_id` int(11) NOT NULL AUTO_INCREMENT,
  `pic_name` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`pic_id`)
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pics`
--

INSERT INTO `pics` (`pic_id`, `pic_name`, `product_id`) VALUES
(3, '600e8f5d2d34c.jpg', 1),
(4, '600e8f61a1d99.jpg', 1),
(5, '600e8f65a4a24.jpg', 1),
(6, '600e8f6987290.jpg', 1),
(9, '600e90216cfba.jpg', 2),
(11, '600e902b03881.jpg', 2),
(12, '600e902e55527.jpg', 2),
(13, '600e93aba4aae.jpg', 3),
(14, '600e93b1ce7e8.jpg', 3),
(15, '600e93b6265e8.jpg', 3),
(16, '600e9436159c8.jpg', 4),
(17, '600e94395c726.jpg', 4),
(18, '600e943cb65f5.jpg', 4),
(19, '600e94614c447.jpg', 5),
(20, '600e9465583bf.jpg', 5),
(21, '600e9468cdfda.jpg', 5),
(22, '600e9490f2d0a.jpg', 6),
(23, '600e9494bf1a8.jpg', 6),
(24, '600e949859b19.jpg', 6),
(25, '600e949c17303.jpg', 6),
(26, '600e950a9ada9.jpg', 7),
(27, '600e950f2157b.jpg', 7),
(28, '600e954d669b4.jpg', 8),
(29, '600e95525b85a.jpg', 8),
(30, '600e96098fc6b.jpg', 9),
(31, '600e96319ba36.jpg', 10),
(32, '600e96356ad2d.jpg', 10),
(33, '600e96ab7b3d1.jpg', 11),
(34, '600e96b054fb2.jpg', 11),
(35, '600e96b4d3fcc.jpg', 11),
(36, '600e96b83ba96.jpg', 11),
(37, '600e97656c300.png', 12),
(38, '600e97a3d9ddb.jpg', 13),
(39, '600e97d3d3164.jpg', 13),
(40, '600e97d8e146f.jpg', 13),
(41, '600e9825b1a84.jpg', 14),
(42, '600e983981dee.jpg', 14),
(43, '600e9884e6853.jpg', 15),
(44, '600e98885bd7f.jpg', 15),
(45, '600e988c9a300.jpg', 15),
(46, '600e98db19bfd.jpg', 16),
(47, '600e98deda5aa.jpg', 16),
(48, '600e98e248eee.jpg', 16),
(49, '600e994243366.jpg', 17),
(50, '600e994574fb9.jpg', 17),
(51, '600e9948adae3.jpg', 17),
(52, '600e99731b43c.jpg', 18),
(53, '600e998caeb4d.jpg', 19),
(54, '600e999f316b7.jpg', 20),
(55, '600e99f926178.jpg', 21),
(56, '600e99fd67031.jpg', 21),
(57, '600e9a9e0c404.jpg', 22),
(58, '600e9aa1ca6fe.jpg', 22),
(59, '600e9aa551dde.jpg', 22),
(60, '600e9af2c3e49.jpg', 23),
(61, '600e9af7038b3.jpg', 23),
(62, '600e9b3a37cd3.jpg', 24),
(63, '600e9b3e1ac20.jpg', 24),
(64, '600e9b4183cbf.jpg', 24),
(65, '600e9b44e3046.jpg', 24),
(66, '600e9b481397e.jpg', 24),
(67, '600e9b4c01d9e.jpg', 24),
(68, '600e9b9ba776c.jpg', 25),
(69, '600e9b9f208ec.jpg', 25),
(70, '600e9ba29060c.jpg', 25),
(71, '600e9ba6a33bd.jpg', 25),
(72, '600e9ba9cc690.jpg', 25),
(73, '600e9bae8e488.jpg', 25),
(74, '600e9bb214fdc.jpg', 25),
(75, '600e9c08b422d.jpg', 26),
(76, '600e9c0c37369.jpg', 26),
(77, '600e9c0f95e3c.jpg', 26),
(78, '600e9c12ddf28.jpg', 26),
(79, '600e9c1641078.jpg', 26),
(80, '600e9c19b62c5.jpg', 26),
(81, '600e9c1e1dcc9.jpg', 26),
(82, '600e9c22308fd.jpg', 26),
(83, '600e9c25ae946.jpg', 26),
(84, '600e9c2a3f389.jpg', 26);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(200) NOT NULL,
  `product_description` text NOT NULL,
  `product_price` float NOT NULL,
  `product_stock` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_price`, `product_stock`, `category_id`) VALUES
(1, 'Kit Aegis Solo 100W', 'Le KIT AEGIS SOLO est robuste, étanche, résistant à la poussière, à la rouille, et au choc. Compact, variable en puissance jusqu\'à 100 watts, fonctionne avec un accu 18650, classé IP 67. Une connexion de 27mm de diamètre permet d\'utiliser la totalité des atomiseurs du marché. Trés polyvalente, cette box offre plusieurs fonctions et modes de Vape accompagné du clearomiseur Zeus Sub-Ohm qui  aspire à une vape puissante, sans pour autant mettre de côté les saveurs qui seront embellies grâce aux résistances en mesh, prévues spécialement pour lui.\r\nFabriqué par GEEK VAPE.\r\n\r\nGeek Vape est un fabricant de cigarette électronique fondé en 2015. Il s’est fait connaitre début 2016 grâce au Tsunami, un dripper en double coil dédié au power vaping.\r\n\r\nDepuis, Geek Vape a enchaîné les succès avec les atomiseurs Ammit, Avocado et  Griffin ou encore la box AEGIS. Aujourd’hui, Geek Vape propose une large gamme de produits qui couvre les box Mods, les Mods méca, les drippers et atomiseurs reconstructibles, mais aussi des fils résistifs et des accessoires en tous genres.', 29.9, 99, 1),
(2, 'Kit Istick P100', 'Puissant, design et compact, le kit iStick P100 est le dernier kit signé Eleaf. Parfaitement conçu, il peut développer jusqu\'a 100W de puissance et intègre les modes VW et Smart. Son plus grand atout est sûrement son excellente batterie intégrée de 3400 mAh qui permet de ne jamais tomber en panne ! Côté cartouche, l\'iStick P100 possède un réservoir de 4,5 ml et fonctionne avec toutes les résistances GZ d\'Eleaf !\r\nMais l\'on peut également y inséré un adaptateur pour ensuite venir visé un cléromiseur !\r\n\r\n\r\n\r\n\r\nEleaf est une marque spécialisée dans la conception et la distribution de cigarettes électroniques et d’accessoires.\r\nPionnière sur ce marché aujourd’hui en pleine essor, elle fait partie des leaders et se place bien souvent dans les premiers choix des consommateurs. Retrouvez de nombreuses références dans nos magasins kiosques Vapote-Moi dont le fameux Istick en différentes versions. Istick ,c’est la e-cigarette best seller de la marque, elle est particulièrement adoptée pour sa taille et son design. Elle a tout d’un accessoire à la pointe des dernières tendances.\r\nEleaf prête une importance toute singulière au look des produits qu’elle commercialise, de quoi séduire un large public.', 49.9, 99, 1),
(3, 'Kit Istick S80', 'Equipée d\'une batterie intégrée de 1800 mah rechargeable par USB-C, la box iStick S80 perpétue la tradition des iStick ! Le mod électronique d\'Eleaf jouit de superbes finitions et d\'une ergonomie qui tutoie la perfection. A l\'image des autres iStick, cette box S80 se montre particulièrement compacte et offre une utilisation intuitive : l\'expérience n\'en est que meilleure !\r\n\r\n\r\nSur le haut de la iStick S80 trône le clearomiseur Gzeno. D\'une contenance de 3 ml, ce tank propose un remplissage top-fill sûr et s\'équipe d\'un airflow réglable d\'une précision redoutable. Imaginé pour les amateurs de vape indirecte, le GZeno d\'Eleaf est un clearomiseur MTL qui peut se vanter, grâce aux résistances GZ MTL, de restituer avec fidélité les saveurs des eliquides.\r\n\r\nEleaf est une marque spécialisée dans la conception et la distribution de cigarettes électroniques et d’accessoires.\r\nPionnière sur ce marché aujourd’hui en pleine essor, elle fait partie des leaders et se place bien souvent dans les premiers choix des consommateurs. Retrouvez de nombreuses références dans nos magasins kiosques Vapote-Moi dont le fameux Istick en différentes versions. Istick ,c’est la e-cigarette best seller de la marque, elle est particulièrement adoptée pour sa taille et son design. Elle a tout d’un accessoire à la pointe des dernières tendances.\r\nEleaf prête une importance toute singulière au look des produits qu’elle commercialise, de quoi séduire un large public.', 61.9, 99, 1),
(4, 'Kit Istick Compaq', 'Les connaisseurs reconnaîtront le design propre aux boxs iStick : Sur le haut du Pod on retrouve le fameux bouchon qui permet de fermer la trappe à accu. Cette dernière sert de logement pour un accu au format 18650.\r\n\r\nCapable d\'envoyer une puissance maximale de 60 watts, l\'iStick Pico Compaq d\'Eleaf se dote d\'un écran Oled qui donne une batterie d\'informations lors de la vape. Compatible avec les résistances GT, le Pod iStick Pico Compaq reçoit une cartouche de 3.8 ml de contenance. Protégé par un capuchon, aussi design qu\'utile, le réservoir se démarque par sa grande robustesse et son remplissage ultra-simplifié.\r\n\r\n \r\n\r\n\r\nA travers ce Pod iStick Pico Compaq, Eleaf s\'adresse à l\'ensemble des vapoteurs. Les utilisateurs peu expérimentés comme les plus avertis seront sous le charme de ce nouvel arrivant !\r\n\r\nEleaf est une marque spécialisée dans la conception et la distribution de cigarettes électroniques et d’accessoires.\r\nPionnière sur ce marché aujourd’hui en pleine essor, elle fait partie des leaders et se place bien souvent dans les premiers choix des consommateurs. Retrouvez de nombreuses références dans nos magasins kiosques Vapote-Moi dont le fameux Istick en différentes versions. Istick ,c’est la e-cigarette best seller de la marque, elle est particulièrement adoptée pour sa taille et son design. Elle a tout d’un accessoire à la pointe des dernières tendances.\r\nEleaf prête une importance toute singulière au look des produits qu’elle commercialise, de quoi séduire un large public.', 34.9, 99, 1),
(5, 'Kit Istick Rim C', 'Voici la nouvelle version du kit iStick Rim... la iStick Rim C !\r\n\r\nLa iStick Rim C n\'a pas de batterie intégrée, elle fonctionne avec un accumulateur de type 18650.\r\n\r\nAutonomie et puissance sont les points forts de cette e-cigarette revisitée au goût du jour. Le clearomiseur Melo 5 accompagne la box istick Rim C à la perfection. Les mots d\'ordres sont simples : saveurs et vapeur.\r\n\r\nProfitez d\'une vape plus aérienne que jamais et personnalisez votre vape à souhait avec les airflows réglables.\r\nQue vous fassiez vos premiers pas dans la vape ou que vous soyez un expert, le kit iStick Rim C vous fera passer des moments vape hors du commun.\r\n\r\nEleaf est une marque spécialisée dans la conception et la distribution de cigarettes électroniques et d’accessoires.\r\nPionnière sur ce marché aujourd’hui en pleine essor, elle fait partie des leaders et se place bien souvent dans les premiers choix des consommateurs. Retrouvez de nombreuses références dans nos magasins kiosques Vapote-Moi dont le fameux Istick en différentes versions. Istick ,c’est la e-cigarette best seller de la marque, elle est particulièrement adoptée pour sa taille et son design. Elle a tout d’un accessoire à la pointe des dernières tendances.\r\nEleaf prête une importance toute singulière au look des produits qu’elle commercialise, de quoi séduire un large public.', 65.9, 99, 1),
(7, '  agenda à spirale 2021 - multilingue nuit', 'Petit agenda multilingue pour l’année 2021, en néerlandais, français et anglais. Sur la solide couverture en carton, on peut voir un ciel nocturne et le texte ‘two thousand twenty one\'. L’agenda a une spirale rose doré, un marque-page en plastique bleu et un élastique de fermeture. L’agenda contient aussi des calendriers 2021 et 2022, un aperçu des vacances et des jours fériés et des plannings mensuels. Il offre également de la place pour prendre des notes et inscrire des adresses. L’agenda couvre la période du lundi 7 décembre 2020 au 16 janvier 2022 inclus.\r\n\r\nHEMA s’engage pour la protection de la forêt tropicale. Par conséquent, tout le papier ou bois utilisé pour nos articles portera de préférence la certification FSC® pour la gestion responsable des forêts.\r\n\r\nreliure: spirale\r\n*: Mélange FSC\r\nlongueur (cm): 15\r\nlargeur (cm): 10,5\r\nformat papier: A6', 3.25, 99, 2),
(8, 'agenda 2021 avec pochette perforée bleu foncé', 'Agenda pour l’année 2021 avec une couverture souple munie d\'une pochette perforée transparente. La pochette contient une carte noire avec des taches rose doré. L\'agenda est maintenu par une spirale rose doré et contient un marque-page, un élastique, une feuille d\'autocollants, des intercalaires et des pochettes pour y insérer des photos, par exemple. L’agenda multilingue contient de l’espace pour des informations personnelles, des notes, des listes d’adresses, un planificateur annuel pour les anniversaires et un aperçu annuel des vacances et jours fériés. L’agenda couvre la période du lundi 7 décembre 2020 au mercredi 12 janvier 2022 inclus.\r\n\r\nHEMA s’engage pour la protection de la forêt tropicale. Par conséquent, tout le papier ou bois utilisé pour nos articles portera de préférence la certification FSC® pour la gestion responsable des forêts.\r\n\r\nreliure: spirale\r\n*: Mélange FSC\r\nlongueur (cm): 16,5\r\nlargeur (cm): 14,5', 7.9, 99, 2),
(9, ' 500 feuilles papier imprimante A4', 'Paquet contenant 500 feuilles de papier imprimante blanc.\r\n\r\ngrammage papier (g/m2): 75 g/m²\r\nformat papier: A4\r\nquantité: 500', 3.5, 99, 2),
(10, 'images3 cahiers A5 - lignés', 'Lot de trois cahiers de format A5 avec 80 pages lignées. Le lot contient trois cahiers avec différents motifs dans les tons vert foncé, noir et blanc. Les cahiers ont un dos cousu, ils sont donc très résistants.\r\n\r\nHEMA s’engage pour la protection de la forêt tropicale. Par conséquent, tout le papier ou bois utilisé pour nos articles portera de préférence la certification FSC® pour la gestion responsable des forêts.\r\n\r\nmotif: à fleurs, imprimé, graphique\r\nreliure: cousu\r\nnombre de pages: 80\r\n*: Mélange FSC\r\ngrammage papier (g/m2): 80 g/m²\r\nlongueur (cm): 21\r\nlargeur (cm): 14,5\r\nformat papier: A5\r\nréglure: ligné', 2.99, 99, 2),
(11, '3 cahiers A6 - lignés', 'Lot de trois cahiers de format A6 avec 80 pages lignées. Le lot contient trois cahiers avec différents motifs et couleurs. Les cahiers ont un dos cousu, ils sont donc très résistants et grâce à leur petit format, ils sont faciles à emporter.\r\n\r\nHEMA s’engage pour la protection de la forêt tropicale. Par conséquent, tout le papier ou bois utilisé pour nos articles portera de préférence la certification FSC® pour la gestion responsable des forêts.\r\n\r\nmotif: à fleurs, graphique, avec texte\r\nreliure: cousu\r\nnombre de pages: 80\r\n*: Mélange FSC\r\ngrammage papier (g/m2): 80 g/m²\r\nlongueur (cm): 14,5\r\nlargeur (cm): 10\r\nformat papier: A6\r\nréglure: ligné', 1.9, 99, 2),
(12, 'Café en grains Pellini Top - 1kg', '100% Arabica (naturellement doux en caféine)\r\nNotes de chocolat et de fruits à coque\r\nLe café italien le plus doux du marché\r\nTorréfaction italienne\r\n1kg\r\nCafé\r\nÉQUILIBRÉ', 18.9, 99, 3),
(13, 'Café en grains Terres de café The Full Monkeys (Exclu MaxiCoffee) - 1Kg - Terres de Café', 'Café du Meilleur Torréfacteur de France 2015 (Exclusivité MaxiCoffee !)\r\n100% Arabica (Brésil, Guatemala, Ethiopie)\r\nCafé équilibré, subtil et aromatique\r\nTorréfié artisanalement en France\r\n1Kg\r\nExiste aussi en 250g\r\nCafé\r\nÉQUILIBRÉ', 24.9, 99, 3),
(14, 'Café en grains Perleo Espresso Arabica Purissima - 1kg', '100% Arabica\r\nNotes noisette, pain grillé, vanille et cacao\r\nTorréfaction italienne\r\n1Kg\r\n', 17.9, 99, 3),
(15, 'Thé noir en vrac Vanille - 100g - Dammann', 'Thé noir gourmand\r\nNote : vanille, morceaux de gousses de vanille, pétales de fleurs\r\nIdéal : avec du lait\r\nA consommer : en journée\r\nProvenance : Chine Ceylan\r\nConditionnement : sachet de 100 g\r\nThé NOIR\r\nAromatisé\r\n', 5.5, 99, 3),
(16, 'Thé Blanc - Blanc Comme Rose - 100g - Comptoir Francais du Thé', 'Infusion fruitée & florale\r\nNotes : Rose et framboise\r\nÀ consommer : journée\r\nConditionnement : sachet hermétique de 100 g\r\nThé BLANC', 8.5, 99, 3),
(17, 'Rooibush en vrac African Vanille Bio - 100g - Comptoir Français du Thé', 'Rooibos gourmand\r\nNote : vanille\r\nIssu de l\'Agriculture Biologique\r\nProvenance : Afrique du Sud\r\nA consommer : soirée\r\nIdéal : glacé, pour les enfants\r\nConditionnement : sachet de 100 g\r\nRooibos\r\nAromatisé\r\nThé\r\nSANS THÉINE', 5.5, 99, 3),
(18, 'Purple Cola Pik Sachet vrac 2kg', 'Succombez aux délicieux bonbons Purple Cola Pik !\r\n\r\nChaque couleur possède un parfum spécial.\r\nSaurez-vous deviner les 3 goûts mystères des bonbons Purple Cola Pik ?\r\n\r\nCe sachet contient 2kg de Purple Cola Pik HARIBO en vrac.\r\n\r\nCraquez pour ces bonbons bouteilles Cola aux goûts renversants !', 13, 99, 4),
(19, 'Dragibus Soft Sachet vrac 2kg', 'Recouvert de sa célébrissime dragée, le Dragibus Soft renferme un coeur délicieusement fruité.\r\nEncore plus gourmand, c\'est un bonbon HARIBO tout doux pour les fans de Dragibus. Impossible d\'y résister !\r\n\r\nCe sachet contient 2 kg de Dragibus Soft HARIBO en vrac.\r\n\r\nLe saviez-vous ? Les bonbons Dragibus Soft conviennent aux végétariens.', 12, 99, 4),
(20, 'Banan\'s Sachet vrac 1,5kg', 'Retrouvez le mythique bonbon banane HARIBO dans un sachet grand format !\r\nAvec sa couleur inimitable et sa texture unique, les bonbons bananes régalent les appétits des grands et des petits depuis de nombreuses années.\r\n\r\nCe sachet comprend 1,5kg de bonbons Banan\'s HARIBO vrac.\r\n\r\nUn vrai délice !', 9.95, 99, 4),
(21, 'Arturo Fuente Destino Al Siglo, Siglo de Amistad', 'Arturo Fuente Destino Al Siglo – Siglo de Amistad, publié à l’occasion de son centenaire, est un opus X à tirage limité et témoigne sans aucun doute de la qualité et du savoir-faire de Fuente. Le Destino al Siglo est un cigare extrêmement rare doté d’un profil puissant. Le Destino al Siglo a été retenu pendant un an pour que la famille Fuente puisse mieux le vieillir avant sa sortie. Le cigare a une forte présence poivrée accompagné de notes de chocolat noir, de cuir, de cacao et d’un léger terreux. Cette sélection très rare de la famille Fuente ne sera disponible que pendant une courte période et vous devrez attendre encore 100 ans pour avoir la chance d’essayer la suivante.\r\n\r\nBoîte contenant 13 cigares.', 438.1, 20, 5),
(22, 'Arturo Fuente Don Carlos Edicion de Aniversario 30th Anniversary', 'L’assortiment Arturo Fuente Don Carlos Edicion de Aniversario contient tous les formats classiques du célèbre Don Carlos Edicion de Aniversario. Une ligne qui célèbre le 30e anniversaire (30th Anniversary) de la gamme de cigares Don Carlos mondialement connue. La boîte contient 10 doubles Robusto, 10 Toros et 10 Robustos. Ceci est un assortiment spectaculaire et le meilleur cadeau de cigares pour toute occasion.', 1200, 2, 5),
(23, 'Cohiba Coronas Especiales BN', 'Le cigare Cohiba Coronas Especiales est un panetela de belle présentation, roulé dans une cape colorado. Il délivre à cru une rondeur et une subtilité intéressante avec toutefois un peu d’amertume. La vitole s’embrasse facilement. La fumée ample s’enrichit d’arômes de bois et de fruits secs. La puissance est raisonnable sans être toutefois parfaitement bien maîtrisée. Le deuxième tiers évolue sur des senteurs de bois et de noisette.', 799.9, 10, 5),
(24, 'Briquet arc électrique Plasma Belflam', 'Briquet arc électrique sans flamme : Le briquet du futur\r\nEn plus d’être stylé, le briquet arc électrique est une bonne alternative écologique et surtout économique par rapport à un briquet classique.\r\n\r\nBeau et original, le briquet arc électrique Plasma possède une bonne autonomie et résiste par tous les temps! Fini la galère pour allumer sa cigarette par vent violent, avec le briquet arc électrique c’est possible et sans contraintes!\r\n\r\nRechargé en moins de 1h30, le briquet sans flamme à arc électrique vous fournira pas moins de 200 allumages.\r\n\r\nPlus onéreux qu’un briquet classique, le briquet arc électrique possède cependant l’avantage de ne consommer aucun gaz ni essence et vous durera dans le temps. Contrairement à un briquet jetable, votre briquet plasma sera très vite amorti!\r\n\r\nUtile et durable, ce briquet arc électrique livré dans un coffret est idéal pour offrir.\r\n\r\nCâble USB inclus.', 24.9, 50, 6),
(25, 'Briquet essence The Bulldog Amsterdam\r\n', 'Briquet essence The Bulldog\r\nBriquet essence de la marque The Bulldog Amsterdam. Briquet simple, élégant et d’une excellente qualité. 3 coloris disponibles : noir, bleu et argent.\r\n\r\nGrossiste buraliste\r\nMistersmoke est le distributeur officiel de la marque The Bulldog en France. Vous êtes buraliste et vous souhaitez acheter en gros ce briquet essence pour les proposer à votre clientèle ? Inscrivez-vous sur notre espace pro et bénéficiez de nos tarifs revendeurs.', 5.9, 99, 6),
(26, 'Briquet tempête Amsterdam', 'Briquet tempête flamme verte\r\nBeau design pour ce briquet tempête Amsterdam. Décoré d’une plaque en métal Amsterdam XXX, blason de la ville d’Amsterdam, ce briquet tempête en métal est rechargeable en gaz et sa flamme verte est réglable en intensité.\r\n\r\nIdéal pour une utilisation en extérieur, le briquet tempête flamme verte est résistant face aux caprices de la météo et ne s’éteint pas face aux rafales de vent.\r\n\r\nRecommandé pour l’allumage de vos cigarettes, cigares ou même blunt, le briquet tempête flamme verte Amsterdam est également muni d’une diode LED s’allumant à chaque ouverture du briquet et vous permettant d’allumer vos cigarettes même dans le noir!\r\n\r\nAttention! Le filament permettant l’émission de la flamme verte est une partie très fragile! Pour préserver votre briquet, veillez à ne jamais mettre en contact direct votre cigarette et le filament.', 9.9, 50, 6);

-- --------------------------------------------------------

--
-- Structure de la table `reclamations`
--

DROP TABLE IF EXISTS `reclamations`;
CREATE TABLE IF NOT EXISTS `reclamations` (
  `reclam_id` int(11) NOT NULL AUTO_INCREMENT,
  `reclam_text` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `reclam_category_id` int(11) NOT NULL,
  PRIMARY KEY (`reclam_id`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reclam_categories`
--

DROP TABLE IF EXISTS `reclam_categories`;
CREATE TABLE IF NOT EXISTS `reclam_categories` (
  `reclam_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `reclam_category_name` varchar(50) NOT NULL,
  PRIMARY KEY (`reclam_category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reclam_categories`
--

INSERT INTO `reclam_categories` (`reclam_category_id`, `reclam_category_name`) VALUES
(1, 'Demands'),
(2, 'Reclams'),
(3, 'Transports'),
(4, 'Commercial'),
(5, 'Compta');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `user_firstname` varchar(50) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_address` text NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_role` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_firstname`, `user_password`, `user_address`, `user_email`, `user_role`) VALUES
(1, 'Eon', 'Patrice', 'patrice', '25rue de l ecole', 'patrice@gmail.com', 1),
(3, 'aurelien', 'chetanneau', 'aurelien', 'zdefegfh', 'aurelien@hotmail.fr', 1),
(2, 'aurelien', 'chetanneau', 'password', '142 bbgrbr', 'aurelien@yahoo.fr', 5),
(47, 'aurelien', 'chetanneau', 'dsmsfkbg', 'szdsfgbhnj', 'aurelien@hotmail.Fr', 1),
(46, 'aurelien', 'chetanneau', 'dsmsfkbg', 'szdsfgbhnj', 'aurelien@hotmail.Fr', 1),
(45, 'aurelien', 'chetanneau', 'dsmsfkbg', 'szdsfgbhnj', 'aurelien@hotmail.Fr', 1),
(44, 'aurelien', 'chetanneau', 'dsmsfkbg', 'szdsfgbhnj', 'aurelien@hotmail.Fr', 1),
(43, 'aurelien', 'chetanneau', 'aurelien', 'sdfghg', 'aurelien@hotmail.Fr', 1),
(42, 'aurelien', 'chetanneau', 'aurelien', 'zsdefrgtyhujikolpm', 'aurelien@hotmail.Fr', 1),
(41, 'aurelien', 'chetanneau', 'aurelien', 'zsdefrgtyhujikolpm', 'aurelien@hotmail.Fr', 1),
(40, 'aurelien', 'chetanneau', 'aurelien', 'zdefgf', 'aurelien@hotmail.Fr', 1),
(39, 'aurelien', 'chetanneau', 'aurelien', 'fretyth', 'aurelien@hotmail.Fr', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
