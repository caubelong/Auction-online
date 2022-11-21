-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.10-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for project1
DROP DATABASE IF EXISTS `project1`;
CREATE DATABASE IF NOT EXISTS `project1` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `project1`;

-- Dumping structure for table project1.admin
DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) NOT NULL,
  `Password` varchar(50) NOT NULL DEFAULT '',
  `Email` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table project1.admin: ~4 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `Name`, `Password`, `Email`) VALUES
	(22, 'long.lv', '$2y$10$t9gnFsjMB0g2HKDMUbEby.1TbJMGsWhoNsgbc9TpbwR', '22222@gmail.com'),
	(23, 'sss', '$2y$10$JQsNywnVa3cFigiYOoYax.WEpOaKU/b1TjLefhY0LxM', 'vanlong123@gmail.com'),
	(24, 'okbr', '$2y$10$sv9EUdDRcPtceZI8F7H4iu4hdSEfy95ZQzshlLmatHK', 'okbro@gmail.com'),
	(25, 'vanlong', '$2y$10$Z91De89QAu0eo6BYsUvIP.ivXT0T0i09Cmh8yrECsb6', 'dqd2k1@gmail.com'),
	(26, 'sss', '$2y$10$LJKOQ7gU5v82sQ1rCL/.5uVCgpEVmuUQIMqiO2Mpv.4', 'vanlong123@gmail.com'),
	(27, 'ssss', '$2y$10$uLfQkURp4rBVToJ4x4aJzuH4SQEoAlACjciDPRGkmUg', 'vanlong123@gmail.com'),
	(32, 'ssssssssssssss2609', '$2y$10$fuPF2Cg48KuxQa6A0ScCN.Egivqm1HmHp/MIlESKsu5', 'ssss2609@gmail.com'),
	(35, 'long.lv222222609', '$2y$10$qv/N1sbi4Pnm/28yqp7mW.33fpLEEoiKcJoWdfLAeqF', 'vanlong123@gmail.com'),
	(39, 'caubelong', '$2y$10$7P3hyyY0oTzDVJZsJ6dopeS1XeK5r6NLtmdr99q9qGO', 'vanlong2609@gmail.com'),
	(40, 'caubelong2609', '$2y$10$Y5EqItPlU29qUvbzEjt5Ou6GydYp8mm.gspI02Blr77', 'vanlong2609@aptech.com'),
	(41, 'caubelong99', 'vanlong12345', 'vanlong1999@gmail.com');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table project1.auction
DROP TABLE IF EXISTS `auction`;
CREATE TABLE IF NOT EXISTS `auction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price_auction` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_PRODUCT_ID` (`id_product`),
  KEY `FK_USER_ID` (`user_id`),
  CONSTRAINT `FK_PRODUCT_ID` FOREIGN KEY (`id_product`) REFERENCES `product` (`ProductId`),
  CONSTRAINT `FK_USER_ID` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table project1.auction: ~2 rows (approximately)
/*!40000 ALTER TABLE `auction` DISABLE KEYS */;
INSERT INTO `auction` (`id`, `id_product`, `user_id`, `price_auction`) VALUES
	(3, 149, 2, 35000000),
	(7, 137, 2, 1500),
	(9, 171, 2, 1252220);
/*!40000 ALTER TABLE `auction` ENABLE KEYS */;

-- Dumping structure for table project1.category
DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `CategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `Cat_Name` varchar(255) NOT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table project1.category: ~5 rows (approximately)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`CategoryID`, `Cat_Name`) VALUES
	(1, 'Antique'),
	(2, 'Jewelry'),
	(3, 'Electronice device'),
	(4, 'Furniture'),
	(5, 'Vehicle');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Dumping structure for table project1.images_product
DROP TABLE IF EXISTS `images_product`;
CREATE TABLE IF NOT EXISTS `images_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) NOT NULL,
  `images` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_PRODUCT_ID` (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=187 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table project1.images_product: ~69 rows (approximately)
/*!40000 ALTER TABLE `images_product` DISABLE KEYS */;
INSERT INTO `images_product` (`id`, `id_product`, `images`) VALUES
	(75, 137, '10044646_MAY-ANH_CANON_EOS-M200-EF-M15-45-BK_01 (1).jpg'),
	(76, 137, '10044646_MAY-ANH_CANON_EOS-M200-EF-M15-45-BK_01.jpg'),
	(77, 137, '10044646_MAY-ANH_CANON_EOS-M200-EF-M15-45-BK_03.jpg'),
	(78, 137, '10044646_MAY-ANH_CANON_EOS-M200-EF-M15-45-BK_04.jpg'),
	(79, 138, 'samsung-vc18m21m0vn-sv-n-251320-101301-364.jpg'),
	(80, 138, 'samsung-vc18m21m0vn-sv-n-251320-101312-165.jpg'),
	(81, 138, 'samsung-vc18m21m0vn-sv-n-251320-101321-957.jpg'),
	(82, 139, 'apple-watch-s5-40mm-vien-nhom-day-cao-su3.jpg'),
	(83, 139, 'apple-watch-s5-40mm-vien-nhom-day-cao-su-10.jpg'),
	(84, 139, 'apple-watch-s5-40mm-vien-nhom-day-cao-su10-2.jpg'),
	(85, 139, 'apple-watch-s5-40mm-vien-nhom-day-cao-su-11.jpg'),
	(86, 140, 'ccc_800x450.jpg'),
	(87, 140, 'dd_800x420.jpg'),
	(88, 140, 'eee_800x450.jpg'),
	(89, 140, 'photo-1-159247024578088935953.png'),
	(90, 141, 'ipad11inch-3.jpg'),
	(91, 141, 'ipad11inch-7.jpg'),
	(92, 141, 'ipad11inch-8.jpg'),
	(93, 141, 'ipad-pro-11-2020-1.jpg'),
	(95, 143, 'product_10746_1.png'),
	(96, 143, 'product_10746_3.png'),
	(97, 143, 'product_10746_4.png'),
	(98, 143, 'product_10746_5.png'),
	(99, 144, 'product_12379_1.png'),
	(100, 144, 'product_12379_3.png'),
	(101, 144, 'product_12379_4.png'),
	(102, 144, 'product_12379_5.png'),
	(103, 145, 'ban-phan-ns0291-1.jpg'),
	(104, 145, 'ban-phan-ns0291-2.jpg'),
	(105, 145, 'product_11146_1.png'),
	(106, 146, 'trường huế vai lật (6).jpg'),
	(107, 146, 'trường huế vai lật (10).jpg'),
	(108, 146, 'trường huế vai lật (11).jpg'),
	(109, 146, 'trường huế vai lật (12).jpg'),
	(110, 147, '19020985731.jpg'),
	(111, 147, '19020985732.jpg'),
	(112, 147, '23969284700.jpg'),
	(113, 148, 'bach-tuoc-mang-chuong.jpg'),
	(114, 148, 'bao-gao.jpg'),
	(115, 148, 'chuong-chua.jpg'),
	(116, 148, 'cuoi-rua.jpg'),
	(117, 149, 'eropi-Lắc_tay_bạc_ngọc_trai_Akoya_xám_8_9mm_Xiem-14.jpg'),
	(118, 149, 'eropi-Lắc_tay_bạc_ngọc_trai_Akoya_xám_8_9mm_Xiem-15.jpg'),
	(119, 149, 'eropi-Lắc_tay_bạc_ngọc_trai_Akoya_xám_8_9mm_Xiem-33.jpg'),
	(120, 150, 'eropi-Lắc_tay_vàng_18k_ngọc_trai_ngọt_4_9mm_Kient-31.jpg'),
	(121, 150, 'eropi-Lắc_tay_vàng_18k_ngọc_trai_ngọt_4_9mm_Kient-33.jpg'),
	(122, 150, 'eropi-Lắc_tay_vàng_18k_ngọc_trai_ngọt_4_9mm_Kient-34.jpg'),
	(123, 150, 'eropi-Lắc_tay_vàng_18k_ngọc_trai_ngọt_4_9mm_Kient-35.jpg'),
	(124, 151, 'sh-mode-2021-3.jpg'),
	(125, 151, 'sh-mode-2021-4.jpg'),
	(126, 151, 'sh-mode-2021-5.jpg'),
	(127, 151, 'sh-mode-2021-7.jpg'),
	(128, 142, 'tu-lanh-hitachi-r-fg560pgv8x-550x550.jpg'),
	(129, 142, 'tu-lanh-hitachi-r-w660pgv3-gbw-2-org.jpg'),
	(130, 152, 'bLxZ0aSGA4.jpg'),
	(131, 152, 'ekwtdqGoN5.jpg'),
	(132, 152, 'Jv7jD7cXQR.jpg'),
	(133, 152, 'McHLUFka2i.jpg'),
	(134, 153, 'mercedes-benz-c300-amg-11.jpg'),
	(135, 153, 'mercedes-benz-c300-amg-13.jpg'),
	(136, 153, 'mercedes-benz-c300-amg-14.jpg'),
	(137, 153, 'mercedes-benz-c300-amg-banner.jpg.asset.bvT0fwZ1JdF9qFJ5MHo_JqJc0X89--7vlyQHeA5FFEU.jpg'),
	(138, 154, 'apple-macbook-air-2020-122920-102933-375.jpg'),
	(139, 154, 'apple-macbook-air-2020-290720-0215180.jpg'),
	(140, 154, 'apple-macbook-air-2020-290720-0217230.jpg'),
	(141, 154, '-apple-macbook-air-2020-bàn-phím.jpg'),
	(178, 171, 'ipad-air-105-inch-wifi-2019-gold-400x460.png'),
	(179, 171, 'ipad-wifi-cellular-32g-2018-33397-thietke.jpg'),
	(180, 171, 'ipad-wifi-cellular-32g-2018-gold-400x460.png');
/*!40000 ALTER TABLE `images_product` ENABLE KEYS */;

-- Dumping structure for table project1.product
DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `ProductId` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(50) NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `Price` double NOT NULL,
  `Picture` text NOT NULL,
  PRIMARY KEY (`ProductId`),
  KEY `CategoryID` (`CategoryID`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table project1.product: ~0 rows (approximately)
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`ProductId`, `NAME`, `DESCRIPTION`, `CategoryID`, `Price`, `Picture`) VALUES
	(137, ' Canon camera', ' The Canon EOS 200D Mark II has a similar appearance to the Canon EOS 200D and features almost the same as the Canon M50 mirrorless camera, the new Canon EOS 200D Mark II is considered a DSLR camera with a screen the most compact flip on', 3, 12590000, '10044646_MAY-ANH_CANON_EOS-M200-EF-M15-45-BK_01 (1).jpg'),
	(138, ' vacuum cleaner', 'Samsung vacuum cleaner designed with luxurious black blue, noble, large power 1800 W helps to clean dust quickly', 3, 1950000, 'samsung-vc18m21m0vn-sv-n-1-org.jpg'),
	(139, 'apple watch 5', ' Pink Apple Watch S5 is undoubtedly one of the most modern smart watches to own today. It has a built-in Always-on display, syncs music with Apple Music, a compass feature.', 3, 9500000, 'apple-watch-s5-40mm-vien-nhom-day-cao-su10-2-1-600x600.jpg'),
	(140, 'galaxy note 20', ' The Galaxy Note20 series released on August 5 is expected to have a new camera, upgraded configuration, a large battery and a red Spen pen.', 3, 29000000, 'dd_800x420.jpg'),
	(141, 'ipad pro', 'The 11-inch iPad Pro 2020 is the latest iPad model that Apple just launched on March 18, with an almost unchanged design compared to the previous generation, mainly an upgrade from the A12Z chip for powerful performance and clusters. The camera has a new ', 3, 15000000, 'ipad11inch-1.jpg'),
	(142, ' toshiba refrigerator', ' Toshiba refrigerator of 30 liters capacity. Super-fast cooling, super speed deodorant. Larger capacity than the previous generation for your comfort', 3, 12500000, 'tu-lanh-samsung-rt38k5982bs-sv-1-5-org.jpg'),
	(143, ' black sofa', 'Sofa bed is very popular with many families, it is suitable for simple architecture and modern home design style but extremely luxurious and make the most of the living space of each family.', 4, 4500000, 'product_10746_1.png'),
	(144, ' wardrobe', 'The sliding wardrobe is made from treated MDF wood, anti-warped, termite-proof, the entire cabinet surface is painted high-quality, natural color to protect the product long-term in different climatic conditions. Smooth cabinet surface, thoroughly treated', 4, 33000000, 'product_12379_1.png'),
	(145, ' makeup table', 'White chalkboard is made from durable industrial wood. High-quality wood has undergone meticulous treatment, giving absolute resistance to termites and mold moisture, and at the same time has good impact, helping to increase the life of the product.', 4, 8900000, 'product_11146_1.png'),
	(146, 'wooden furniture', ' When the work is raised to a new level to express the artistic value and material value, the player is satisfied with passion and the person who is creative and free to follow the soul. Once again, the craftsmanship and meticulousness of Hu craftsmen', 1, 45900000, 'trường huế vai lật (5).jpg'),
	(147, 'ancient couplet', ' A pair of rare and intoxicating object sentences - the couplets are made of two 11cm thick wooden planks cut to create the heart of the mo - with soft curves framing the specifications - the couplings are tightly cut with lemon flower motifs - On being t', 1, 25000000, '667729330049.jpg'),
	(148, ' Japanese antique paintings', 'This is a picture of Tawara Tōda, a hero in Japanese fairy tales, on the Fujiwara faction around the 10th century. Once crossing the river in Omi province near the capital, Tawara Tōda came across a barrier dragon. across the bridge. He just walked past t', 1, 56000000, 'chuong-chua.jpg'),
	(149, ' pearl bracelets', 'Silver Akoya Sea Pearl Bracelets 8-9mm Xiem color new, gentle for ladies.', 2, 39500000, 'eropi-Lắc_tay_bạc_ngọc_trai_Akoya_xám_8_9mm_Xiem-31.jpg'),
	(150, 'Gold bracelets', ' Bangles 18k gold pearls 4-9mm Kient pearls freesize, elegant and feminine.', 2, 10800000, 'eropi-Lắc_tay_vàng_18k_ngọc_trai_ngọt_4_9mm_Kient-32.jpg'),
	(151, 'honda sh 150', 'The reason Honda SH mode 2021 is creating a "craze" for consumers is that thanks to the new generation, the car is significantly upgraded on the exterior with a modern and eye-catching 2-stage LED headlight cluster.', 5, 121000000, 'sh-mode-2021-1.jpg'),
	(152, 'bmw 750i', ' The most striking feature on the BMW 750Li is the "super huge" grille cluster, which comes with adjustments to the new design of headlights and front bumper assembly. According to the manufacturer, the grille size is up to 40% larger than the previous ve', 5, 7500000000, 'WQ2zSh64Cd.jpg'),
	(153, 'mercedes 300', 'Mercedes-Benz officially launched upgrades of the C-Class 2019 in February. In particular, the Mercedes-Benz C 300 AMG version is considered to have become a true sports car with many new improvements.', 5, 2400000000, 'mercedes-benz-c300-amg-12.jpg'),
	(154, 'macbook air 2020', 'Apple\'s Macbook with strong configuration is always welcomed by users. The 2020 MacBook Air version is no exception. The MacBook Air 13 2020 has a beautiful design and powerful configuration with many attractive features. This thin, high-profile laptop pr', 3, 30000000, 'apple-macbook-air-2020-vântay-220173-600x600.jpg'),
	(171, 'ipad 2017', ' Features of 32GB Wifi Wifi (2017)  looking for more information looking for more information looking for more information iPad Wifi 32GB (2017) is a light upgrade of the iPad Air 2 that has been launched since 2014 with some changes in appearance and mor', 3, 7600000, 'ipad-wifi-cellular-32g-2018-gold-400x460.png');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

-- Dumping structure for table project1.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table project1.user: ~0 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`user_id`, `full_name`, `user_name`, `email`, `password`) VALUES
	(2, 'lê văn long', 'caubelong', 'vanlong123@gmail.com', 'vanlong12345'),
	(3, 'lê văn long', 'vanlong', 'vanlong123@gmail.com', 'vanlong');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
