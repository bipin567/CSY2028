-- Adminer 4.8.1 MySQL 5.5.5-10.11.2-MariaDB-1:10.11.2+maria~ubu2204 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `username` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `admin` (`username`, `email`, `password`) VALUES
('bipin',	'bipinbasnet@gmail.com',	'123');

DROP TABLE IF EXISTS `auction`;
CREATE TABLE `auction` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `enddate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `auction` (`id`, `title`, `description`, `category`, `enddate`) VALUES
(1,	'Lawn Mower',	'Used to cut grass.',	'home&garden',	'14/7/2023'),
(2,	'Samsung Tv',	'curved display with 4k resoluation.',	'Electronics',	'12/6/2023'),
(4,	'Band-Aid Brand Flexible Fabric Adhesive Bandages for Wound Care and First Aid',	'Made with Memory Weave fabric for comfort and flexibility, these first aid bandages stretch, bend, and flex with your skin as you move, and include a Quilt-Aid Comfort Pad designed to cushion & protect painful wounds which may help prevent reinjury',	'Health',	'14/9/2023'),
(5,	'WWE Ultimate Edition Hulk Hogan Action Figure',	'​Recreate favorite WWE Hulk Hogan moments from entrance to finisher -- the Ultimate Edition action figure comes with swappable heads, interchangeable hands, and WWE Championship!',	'Toys',	'14/2/2023'),
(6,	'Honda Civic Type R',	' The new-generation Civic Type R uses the same turbocharged four-cylinder as the last model but with output dialed up to 315 horsepower and 310 pound-feet of torque.',	'Motors',	'22/3/2023'),
(8,	'IPHONE 12 pro max',	'Made BY APPLE',	'Electronics',	'2023-05-15'),
(9,	'Vacumm Cleaner',	'CG vacumm cleaner',	'Electronics',	'6/6/2023'),
(10,	'LEGO Star Wars OBI-Wan Kenobi\'s Jedi Starfighter 75333 Building Toy Set',	'ump Into Action - With this brick-built model of Obi-Wan Kenobi’s Jedi Starfighter (75333), fans can relive epic Star Wars: Attack of the Clones scenes as they build and play with this LEGO Star Wars Starfighter',	'Toys',	'20/6/2023'),
(7,	'Cricket bat',	'Height and Width: Jaspo Slog Cricket Bat having 34 inches height, 4.5 “inches width and 2.2 inches thickness',	'Sport',	'2023-05-12'),
(3,	'Tshirt',	'Nike Tshirt with different colors and size',	'fashion',	'');

DROP TABLE IF EXISTS `bid`;
CREATE TABLE `bid` (
  `id` int(11) NOT NULL,
  `bidamount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `bid` (`id`, `bidamount`) VALUES
(3,	255),
(3,	12),
(7,	700);

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `category` (`id`, `title`) VALUES
(4,	'nami');

DROP TABLE IF EXISTS `register`;
CREATE TABLE `register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `register` (`id`, `username`, `email`, `password`) VALUES
(1,	'bipin',	'bipinbasnet567@gmail.com',	'1234'),
(2,	'User1',	'user@gmail.com',	'user'),
(3,	'bipin',	'bipinbasnet567@gmail.com',	'123'),
(4,	'bipin',	'bipinbasnet567@gmail.com',	'123');

DROP TABLE IF EXISTS `review`;
CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `review` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `review` (`id`, `review`) VALUES
(3,	'nice'),
(7,	'1313'),
(7,	'very nicccccccccccccccccccccce product');

-- 2023-05-15 03:21:14