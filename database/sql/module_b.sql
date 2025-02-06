-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2025 at 01:17 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `module_b`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `companyId` int(10) UNSIGNED NOT NULL,
  `companyName` varchar(50) NOT NULL,
  `companyAddress` text NOT NULL,
  `companyTelephone` varchar(20) NOT NULL,
  `companyEmail` text NOT NULL,
  `companyStatus` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = active , 0 = deactivate'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`companyId`, `companyName`, `companyAddress`, `companyTelephone`, `companyEmail`, `companyStatus`) VALUES
(1, 'Innovateurs Tech SARL Gay', '123 Boulevard du Silicon 75001 Paris', '+33 1 23 45 67 89', 'info@innovateurstech.fr1', 1),
(2, 'Solutions Vertes SAS', '456 Parc รco 69002 Lyon', '+33 4 56 78 90 12', 'contact@solutionsvertes.fr', 1),
(3, 'Designs Urbains SARL', '789 Avenue Mรฉtropolitaine 13001 Marseille', '+33 4 12 34 56 78', 'support@designsurbains.fr', 1),
(4, 'Cuisine Innovante SARL', '22 Rue de la Cuisine 75005 Paris', '+33 1 40 20 30 40', 'info@cuisineinnovante.fr', 1),
(5, 'รnergies Renouvelables SAS', '15 Chemin Vert 31000 Toulouse', '+33 5 61 23 45 67', 'contact@energiesrenouvelables.fr', 1),
(6, 'Technologie Avancรฉe SARL', '9 Rue de la Science 59800 Lille', '+33 3 20 15 25 35', 'support@technologieavancee.fr', 0),
(7, 'Artisanat Moderne SAS', '28 Avenue de l\'Artisanat 67000 Strasbourg', '+33 3 88 10 20 30', 'info@artisanatmoderne.fr', 0),
(8, 'test1', 'test1', 'test1', 'test1', 0),
(9, 'metmoxy', 'METOXD', '-034r', 'kf@gmail.com', 1),
(10, 'Iammaiiiz', 'chonburi', '0231545648', 'mai@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contactId` int(10) UNSIGNED NOT NULL,
  `contactName` varchar(50) NOT NULL,
  `contactNumber` varchar(20) NOT NULL,
  `contactEmail` text NOT NULL,
  `companyId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contactId`, `contactName`, `contactNumber`, `contactEmail`, `companyId`) VALUES
(1, 'Bob Martin1', '?????????', 'bob.martin@innovateurstech.fr1', 1),
(2, 'Tom Dubois', '+33 6 87 65 43 21', 'tom.dubois@solutionsvertes.fr', 2),
(3, 'Emily Moreau', '+33 6 54 32 10 98', 'emily.moreau@designsurbains.fr', 3),
(4, 'Chloe Dubois', '+33 6 55 44 33 22', 'chloe.dubois@cuisineinnovante.fr', 4),
(5, 'Paul Leroy', '+33 6 66 77 88 99', 'paul.leroy@energiesrenouvelables.fr', 5),
(6, 'Isabelle Thomas', '+33 6 44 55 66 77', 'isabelle.thomas@technologieavancee.fr', 6),
(7, 'Julien Rousseau', '+33 6 77 66 55 44', 'julien.rousseau@artisanatmoderne.fr', 7),
(8, 'test1', 'test1', 'test1', 8),
(9, 'jiramet', '0914', 'jiramet@gmail.com', 9),
(10, 'mai', '0231545648', 'mai@gmail.com', 10);

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `ownerId` int(10) UNSIGNED NOT NULL,
  `ownerName` varchar(50) NOT NULL,
  `ownerNumber` varchar(20) NOT NULL,
  `ownerEmail` text NOT NULL,
  `companyId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`ownerId`, `ownerName`, `ownerNumber`, `ownerEmail`, `companyId`) VALUES
(1, 'Alice Dupont1', '+33 6 12 34 56 781', 'alice.dupont@ixxx.org', 1),
(2, 'Sarah Lefevre', '+33 6 23 45 67 89', 'sarah.lefevre@solutionsvertes.fr', 2),
(3, 'Michael Petit', '+33 6 34 56 78 90', 'michael.petit@designsurbains.fr', 3),
(4, 'Jean Martin', '+33 6 11 22 33 44', 'jean.martin@cuisineinnovante.fr', 4),
(5, 'Louise Garnier', '+33 6 77 88 99 00', 'louise.garnier@energiesrenouvelables.fr', 5),
(6, 'Luc Bernard', '+33 6 33 44 55 66', 'luc.bernard@technologieavancee.fr', 6),
(7, 'Emma Morel', '+33 6 22 33 44 55', 'emma.morel@artisanatmoderne.fr', 7),
(8, 'test1', 'test1', 'test1', 8),
(9, 'jiramet', '0934', 'kioratr@gmail.com', 9),
(10, 'mai', '0231545648', 'mai@gmail.com', 10);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productId` int(10) UNSIGNED NOT NULL,
  `productNameEnglish` varchar(50) NOT NULL,
  `productNameFrance` varchar(50) NOT NULL,
  `productDescriptionEnglish` text NOT NULL,
  `productDescriptionFrance` text NOT NULL,
  `GTIN` varchar(14) NOT NULL,
  `productBrandName` varchar(30) NOT NULL,
  `productCountryOfOrigin` varchar(30) NOT NULL,
  `productGross` float NOT NULL,
  `productNet` float NOT NULL,
  `productUnit` varchar(10) NOT NULL,
  `productImage` text DEFAULT NULL,
  `productStatus` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = show , 0 = hide',
  `companyId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productId`, `productNameEnglish`, `productNameFrance`, `productDescriptionEnglish`, `productDescriptionFrance`, `GTIN`, `productBrandName`, `productCountryOfOrigin`, `productGross`, `productNet`, `productUnit`, `productImage`, `productStatus`, `companyId`) VALUES
(2, 'Artisanal French Quiche Lorraine Tartlets', 'Artisanal French Quiche Lorraine Tartlets', 'Indulge in the rich flavors of France with our artisanal quiche Lorraine tartlets, featuring a blend of creamy eggs and cheese.', 'Indulge in the rich flavors of France with our artisanal quiche Lorraine tartlets, featuring a blend of creamy eggs and cheese.', '37900123458345', 'Laissez-vous tenter par les ri', 'France', 1.2, 0.8, 'g', NULL, 1, 2),
(3, 'French Lavender and Honey Body Scrub', 'Artisanal French Quiche Lorraine Tartlets', 'Exfoliate your skin with our French lavender and honey body scrub, featuring a soothing blend of fragrant herbs and citrus.', 'Indulge in the rich flavors of France with our artisanal quiche Lorraine tartlets, featuring a blend of creamy eggs and cheese.', '37900123458462', 'Exfoliez votre peau avec notre', 'France', 0.6, 0.5, 'g', NULL, 0, 3),
(4, 'French Apple and Cinnamon Crumble Mix', 'Artisanal French Quiche Lorraine Tartlets', 'Warm up with our French apple and cinnamon crumble mix, featuring a blend of fresh spices perfect for a comforting dessert.', 'Indulge in the rich flavors of France with our artisanal quiche Lorraine tartlets, featuring a blend of creamy eggs and cheese.', '37900123458579', 'Réchauffez-vous avec notre mél', 'France', 0.8, 0.6, 'g', NULL, 0, 4),
(5, 'Artisanal French Creamy Garlic Dip', 'Artisanal French Quiche Lorraine Tartlets', 'Savor the rich flavors of France with our artisanal creamy garlic dip, featuring a blend of fresh herbs and spices.', 'Indulge in the rich flavors of France with our artisanal quiche Lorraine tartlets, featuring a blend of creamy eggs and cheese.', '37900123458696', 'Savourez les riches saveurs de', 'France', 0.6, 0.5, 'g', NULL, 0, 5),
(6, 'French Berry Jam', 'Artisanal French Quiche Lorraine Tartlets', 'Enjoy the sweetness of France with our French berry jam, featuring a blend of juicy fruits.', 'Indulge in the rich flavors of France with our artisanal quiche Lorraine tartlets, featuring a blend of creamy eggs and cheese.', '37900123458713', 'Appréciez la douceur de la Fra', 'France', 0.7, 0.55, 'g', NULL, 0, 6),
(7, 'Artisanal French Feta Cheese', 'Artisanal French Quiche Lorraine Tartlets', 'Savor the rich flavors of Greece in France with our artisanal feta cheese, featuring a blend of creamy milk and herbs.', 'Indulge in the rich flavors of France with our artisanal quiche Lorraine tartlets, featuring a blend of creamy eggs and cheese.', '37900123458830', 'Savourez les riches saveurs de', 'France', 1, 0.85, 'g', NULL, 1, 7),
(9, 'French Apple Tart', 'Artisanal French Quiche Lorraine Tartlets', 'Enjoy the sweetness of France with our French apple tart, featuring a blend of juicy fruits and creamy pastry.', 'Indulge in the rich flavors of France with our artisanal quiche Lorraine tartlets, featuring a blend of creamy eggs and cheese.', '37900123459064', 'Savourez la douceur de la Fran', 'France', 1, 0.85, 'g', NULL, 0, 2),
(10, 'Artisanal French Cream Cheese', 'Artisanal French Quiche Lorraine Tartlets', 'Savor the rich flavors of France with our artisanal cream cheese, featuring a blend of creamy milk and herbs.', 'Indulge in the rich flavors of France with our artisanal quiche Lorraine tartlets, featuring a blend of creamy eggs and cheese.', '37900123459171', 'Savourez les riches saveurs de', 'France', 0.6, 0.5, 'g', NULL, 0, 3),
(11, 'French Herb and Lemon Marmalade', 'Artisanal French Quiche Lorraine Tartlets', 'Enjoy the sweetness of France with our French herb and lemon marmalade, featuring a blend of fragrant herbs and citrus.', 'Indulge in the rich flavors of France with our artisanal quiche Lorraine tartlets, featuring a blend of creamy eggs and cheese.', '37900123459288', 'Savourez la douceur de la Fran', 'France', 0.7, 0.55, 'g', NULL, 0, 4),
(12, 'Artisanal French Goat Cheese', 'Artisanal French Quiche Lorraine Tartlets', 'Savor the rich flavors of France with our artisanal goat cheese, featuring a blend of creamy milk and herbs.', 'Indulge in the rich flavors of France with our artisanal quiche Lorraine tartlets, featuring a blend of creamy eggs and cheese.', '37900123459395', 'Savourez les riches saveurs de', 'France', 1, 0.85, 'g', NULL, 0, 5),
(13, 'French Apple Cider', 'Artisanal French Quiche Lorraine Tartlets', 'Enjoy the sweetness of France with our French apple cider, featuring a blend of juicy fruits and spices.', 'Indulge in the rich flavors of France with our artisanal quiche Lorraine tartlets, featuring a blend of creamy eggs and cheese.', '37900123459412', 'Savourez la douceur de la Fran', 'France', 0.8, 0.6, 'g', NULL, 0, 6),
(14, 'Artisanal French Creamy Cheese Dip', 'Artisanal French Quiche Lorraine Tartlets', 'Savor the rich flavors of France with our artisanal creamy cheese dip, featuring a blend of fresh herbs and spices.', 'Indulge in the rich flavors of France with our artisanal quiche Lorraine tartlets, featuring a blend of creamy eggs and cheese.', '37900123459529', 'Savourez les riches saveurs de', 'France', 0.6, 0.5, 'g', NULL, 0, 7),
(16, 'Artisanal French Cream Cheese Spread', 'Artisanal French Quiche Lorraine Tartlets', 'Savor the rich flavors of France with our artisanal cream cheese spread, featuring a blend of creamy milk and herbs.', 'Indulge in the rich flavors of France with our artisanal quiche Lorraine tartlets, featuring a blend of creamy eggs and cheese.', '37900123459763', 'Savourez les riches saveurs de', 'France', 0.6, 0.5, 'g', NULL, 0, 2),
(17, 'French Apple Compote', 'Artisanal French Quiche Lorraine Tartlets', 'Enjoy the sweetness of France with our French apple compote, featuring a blend of juicy fruits and spices.', 'Indulge in the rich flavors of France with our artisanal quiche Lorraine tartlets, featuring a blend of creamy eggs and cheese.', '37900123459870', 'Savourez la douceur de la Fran', 'France', 0.7, 0.55, 'g', NULL, 0, 3),
(18, 'Eco-Friendly Reusable Water Bottle', 'Artisanal French Quiche Lorraine Tartlets', 'Stay hydrated and reduce plastic waste with our eco-friendly reusable water bottle, featuring a BPA-free design.', 'Indulge in the rich flavors of France with our artisanal quiche Lorraine tartlets, featuring a blend of creamy eggs and cheese.', '37900234567890', 'Restez hydraté et réduisez les', 'USA', 0.3, 0.2, 'g', NULL, 0, 4),
(19, 'Artisanal Handmade Soap Set', 'Artisanal French Quiche Lorraine Tartlets', 'Nourish your skin with our artisanal handmade soap set, featuring a blend of natural ingredients and essential oils.', 'Indulge in the rich flavors of France with our artisanal quiche Lorraine tartlets, featuring a blend of creamy eggs and cheese.', '37900234567907', 'Nourrissez votre peau avec not', 'Italy', 0.6, 0.5, 'g', NULL, 0, 5),
(20, 'French Luxury Candles Set', 'Artisanal French Quiche Lorraine Tartlets', 'Illuminate your space with our French luxury candles set, featuring a collection of scented candles in elegant packaging.', 'Indulge in the rich flavors of France with our artisanal quiche Lorraine tartlets, featuring a blend of creamy eggs and cheese.', '37900234568024', 'Illuminez votre espace avec no', 'France', 1, 0.85, 'g', NULL, 0, 6),
(21, 'Eco-Friendly Bamboo Toothbrush Set', 'Artisanal French Quiche Lorraine Tartlets', 'Brush your teeth and reduce waste with our eco-friendly bamboo toothbrush set, featuring a set of biodegradable toothbrushes and replaceable heads.', 'Indulge in the rich flavors of France with our artisanal quiche Lorraine tartlets, featuring a blend of creamy eggs and cheese.', '37900234568141', 'Brossez-vous les dents et rédu', 'Indonesia', 0.2, 0.1, 'g', NULL, 1, 7),
(23, 'Luxury Essential Oil Diffuser', 'Artisanal French Quiche Lorraine Tartlets', 'Pamper yourself with the scent of luxury essential oils using our luxury essential oil diffuser, featuring a stylish and modern design.', 'Indulge in the rich flavors of France with our artisanal quiche Lorraine tartlets, featuring a blend of creamy eggs and cheese.', '37900234568375', 'Faites-vous plaisir avec le pa', 'Australia', 1, 0.85, 'g', NULL, 0, 2),
(24, 'Eco-Friendly Reusable Shopping Bag Set', 'Artisanal French Quiche Lorraine Tartlets', 'Reduce plastic waste and go green with our eco-friendly reusable shopping bag set, featuring a set of durable cotton bags and recycled material handles.', 'Indulge in the rich flavors of France with our artisanal quiche Lorraine tartlets, featuring a blend of creamy eggs and cheese.', '37900234568492', 'Réduisez les déchets plastique', 'UK', 0.5, 0.4, 'g', NULL, 0, 3),
(25, 'Artisanal Handmade Home Fragrance Spray', 'Artisanal French Quiche Lorraine Tartlets', 'Freshen up your home with our artisanal handmade home fragrance spray, featuring a blend of natural ingredients and essential oils.', 'Indulge in the rich flavors of France with our artisanal quiche Lorraine tartlets, featuring a blend of creamy eggs and cheese.', '37900234568509', 'Rafraîchissez votre maison ave', 'Italy', 0.2, 0.1, 'g', NULL, 0, 4),
(26, 'French Luxury Aromatherapy Set', 'Artisanal French Quiche Lorraine Tartlets', 'Pamper yourself with the scent of luxury aromatherapy using our French luxury aromatherapy set, featuring a collection of scented candles and essential oils.', 'Indulge in the rich flavors of France with our artisanal quiche Lorraine tartlets, featuring a blend of creamy eggs and cheese.', '37900234568626', 'Faites-vous plaisir avec le pa', 'France', 1, 0.85, 'g', NULL, 0, 5),
(27, 'Eco-Friendly Reusable Lunch Box Set', 'Artisanal French Quiche Lorraine Tartlets', 'Pack your lunch in style and reduce waste with our eco-friendly reusable lunch box set, featuring a set of durable cotton bags and recycled material handles.', 'Indulge in the rich flavors of France with our artisanal quiche Lorraine tartlets, featuring a blend of creamy eggs and cheese.', '37900234568733', 'Emballez votre déjeuner avec s', 'UK', 0.5, 0.4, 'g', NULL, 0, 6),
(29, 'Luxury Wall Art Print Setss', 'Artisanal French Quiche Lorraine Tartlets', 'Add some style to your walls with our luxury wall art print set, featuring a collection of high-quality prints from around the world.s', 'Indulge in the rich flavors of France with our artisanal quiche Lorraine tartlets, featuring a blend of creamy eggs and cheese.', '37900234568968', 'Ajoutez du style à vos murs av', 'Canadas', 1, 0.85, 'g', NULL, 0, 1),
(30, 'Eco-Friendly Reusable Phone Case Set', 'Artisanal French Quiche Lorraine Tartlets', 'Protect your phone and reduce waste with our eco-friendly reusable phone case set, featuring a set of durable cotton cases and recycled material inserts.', 'Indulge in the rich flavors of France with our artisanal quiche Lorraine tartlets, featuring a blend of creamy eggs and cheese.', '37900234569084', 'Protégez votre téléphone et ré', 'UK', 0.5, 0.4, 'g', NULL, 0, 2),
(31, 'Artisanal Handmade Bookmarks Set', 'Artisanal French Quiche Lorraine Tartlets', 'Mark your favorite pages in style with our artisanal handmade bookmarks set, featuring a collection of handmade bookmarks and book lights.', 'Indulge in the rich flavors of France with our artisanal quiche Lorraine tartlets, featuring a blend of creamy eggs and cheese.', '37900234569101', 'Marquez vos pages préférées av', 'Mexico', 0.2, 0.1, 'g', NULL, 0, 3),
(32, 'French Luxury Desk Accessory Set', 'Artisanal French Quiche Lorraine Tartlets', 'Elevate your workspace with our French luxury desk accessory set, featuring a collection of scented candles, essential oils, and handmade stationery.', 'Indulge in the rich flavors of France with our artisanal quiche Lorraine tartlets, featuring a blend of creamy eggs and cheese.', '37900234569218', 'Améliorez votre espace de trav', 'France', 1, 0.85, 'g', NULL, 0, 4),
(33, 'Eco-Friendly Reusable Travel Bag Set', 'Artisanal French Quiche Lorraine Tartlets', 'Travel in style and reduce waste with our eco-friendly reusable travel bag set, featuring a set of durable cotton bags and recycled material handles.', 'Indulge in the rich flavors of France with our artisanal quiche Lorraine tartlets, featuring a blend of creamy eggs and cheese.', '37900234569335', 'Voyagez avec style et réduisez', 'UK', 0.5, 0.4, 'g', NULL, 0, 5),
(34, 'Artisanal Handmade Wall Hanging Set', 'Artisanal French Quiche Lorraine Tartlets', 'Add some handmade charm to your walls with our artisanal handmade wall hanging set, featuring a collection of hand-painted ceramics and natural fibers.', 'Indulge in the rich flavors of France with our artisanal quiche Lorraine tartlets, featuring a blend of creamy eggs and cheese.', '37900234569452', 'Ajoutez un peu de charme artis', 'Italy', 1, 0.85, 'g', NULL, 0, 6),
(35, 'French Herb and Lemon Infused Olive Oilcccccccc', 'Artisanal French Quiche Lorraine Tartlets', 'Add a touch of freshness to your dishes with our French herb and lemon infused olive oil, featuring a blend of fragrant herbs and citrus.', 'Indulge in the rich flavors of France with our artisanal quiche Lorraine tartlets, featuring a blend of creamy eggs and cheese.', '35789456123456', 'Ajoutez une touche de fraîcheu', 'France', 0.5, 0.4, 'g', '35789456123456.txt', 1, 1),
(36, 'French Herb and Lemon Infused Olive Oil', 'Artisanal French Quiche Lorraine Tartlets', 'Add a touch of freshness to your dishes with our French herb and lemon infused olive oil, featuring a blend of fragrant herbs and citrus.', 'Indulge in the rich flavors of France with our artisanal quiche Lorraine tartlets, featuring a blend of creamy eggs and cheese.', '12365478914785', 'Ajoutez une touche de fraîcheu', 'France', 0.5, 0.4, 'g', 'null', 1, 1),
(38, 'test1', 'Artisanal French Quiche Lorraine Tartlets', 'test1', 'Indulge in the rich flavors of France with our artisanal quiche Lorraine tartlets, featuring a blend of creamy eggs and cheese.', '12345678901234', 'test1', 'test1', 12, 12, 'test1', NULL, 1, 1),
(39, 'baas', 'Artisanal French Quiche Lorraine Tartlets', 'asdasd', 'Indulge in the rich flavors of France with our artisanal quiche Lorraine tartlets, featuring a blend of creamy eggs and cheese.', '09876543211234', 'ba', 'ba', 12, 12, 'ba', '09876543211234.jpg', 1, 1),
(40, 'h12', 'h12', 'h1h12', 'h1h12', '35789456123856', 'h1h12', 'h1h12', 112, 112, 'h1h12', '35789456123856.png', 1, 10),
(41, 'MahaLnw Met', 'MahaLnw Mai', 'MahaLnw Met', 'MahaLnw Met', '12365478914782', 'h1h1', 'h1', 12, 21, 'g', NULL, 0, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`companyId`),
  ADD UNIQUE KEY `companyId` (`companyId`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contactId`),
  ADD KEY `companyId` (`companyId`),
  ADD KEY `companyId_2` (`companyId`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`ownerId`),
  ADD KEY `companyId` (`companyId`),
  ADD KEY `companyId_2` (`companyId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`),
  ADD UNIQUE KEY `GTIN` (`GTIN`),
  ADD KEY `companyId` (`companyId`),
  ADD KEY `companyId_2` (`companyId`),
  ADD KEY `GTIN_2` (`GTIN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `companyId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contactId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `ownerId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`companyId`) REFERENCES `companies` (`companyId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `owners`
--
ALTER TABLE `owners`
  ADD CONSTRAINT `owners_ibfk_1` FOREIGN KEY (`companyId`) REFERENCES `companies` (`companyId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`companyId`) REFERENCES `companies` (`companyId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
