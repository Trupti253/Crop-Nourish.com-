-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2024 at 10:28 AM
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
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(8, 31, 'ABC', 'ABC@GMAIL.COM', '78966666666', 'HI'),
(9, 31, 'Trupti', 'ABC@gmail.com', '88888888888', 'Nice Website');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(12, 31, 'ABC', '888525522', 'ABC@gmail.com', 'paytm', 'flat no. abc wsx pune maharashtra India - 789654', ', Bloom Buddy Organic ( 2 ), Erwon Single ( 1 )', 847, '09-Apr-2024', 'completed'),
(13, 31, 't', '4789652309', 'ABC@gmail.com', 'credit card', 'flat no. ewqa qwer yes Maharashtra india - 47859632', ', Exfert Bio Heaven Complex ( 1 )', 399, '12-Apr-2024', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(20) NOT NULL,
  `details` varchar(500) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `details`, `price`, `image`) VALUES
(34, 'Agricare Duo52', 'inorganic', 'Agricare Duo 52 Green House Soluble Mono Potassium Phosphate 5 kg\r\n', 599, 'Agricare Duo 52 White Crystalline Green House Soluble Mono Potassium Phosphate ....jpg'),
(35, 'Agricare Nitrophos', 'inorganic', 'Agricare Nitrophos 10kg White Crystalline Grade Soluble NP Mono', 399, 'Agricare Nitrophos 25kg White Crystalline Green House Grade Soluble NP Mono ....jpg'),
(36, 'Agriplus Haifa NPK', 'inorganic', 'Agriplus Haifa NPK Water Soluble Fertilizers 5 KG', 349, 'Agriplus Haifa NPK Water Soluble Fertilizers 1 KG.jpg'),
(37, 'GACIL MAP', 'inorganic', 'GACIL Mono Ammonium Phosphate (MAP) Water Soluble Fertilizer 5 kg', 299, 'GACIL Mono Ammonium Phosphate (MAP) Water Soluble Fertilizer 250 g.jpg'),
(38, 'Lagrifarm Rock', 'inorganic', 'Iagrifarm Rock Phosphate Fertilizer Pack Of 5 Kg Fertilizer', 199, 'Iagrifarm Rock Phosphate Fertilizer Pack Of 1 Kg Fertilizer.jpg'),
(39, 'Katyayani NPK', 'inorganic', 'Katyayani NPK Water Soluble Fertilizer 5 Kg', 299, 'Katyayani NPK  Fertilizer 25 kg.jpg'),
(40, 'IFFCO', 'inorganic', 'Mono Ammonium Phosphate (12-61-0) Fertilizer', 1499, 'Mono Ammonium Phosphate (12-61-0) (Copy).jpg'),
(41, 'Sourya NPK 19-19-19', 'inorganic', 'NPK (19-19-19) Water Soluble Fertilizer 5 Kg', 199, 'NPK19-19-19 Water Soluble Fertilizer.jpg'),
(42, 'PRIONS BIOTECH', 'inorganic', 'PRIONS BIOTECH NPK 19-19-19 15 KG Water Soluble', 349, 'PRIONS BIOTECH NPK 19 19 19 25KG Water Soluble.jpg'),
(43, 'Aries MacroFert', 'nitrogen', 'Aries MacroFert HD NPK fully water-soluble Fertilizer', 379, 'Aries MacroFert HD NPK Fertilizer.jpg'),
(46, 'Katyayani Azospirillum', 'nitrogen', 'Katyayani Azospirillum Nitrogen Fixing Bio Fertilizer (1Lx10) ', 1499, 'Katyayani Azospirillum Nitrogen Fixing Bio fertilizer 10 Litre ( 1Litres x 10 ).jpg'),
(47, 'Greenway Nitroform', 'nitrogen', 'Greenway Biotech Nitrogen Fertilizer Brand 5 Pounds', 2999, 'Nitroform Slow Release Nitrogen FertilizerGreenway Biotech Brand 5 Pounds.jpg'),
(48, 'ROM Azospirillum', 'nitrogen', 'ROM Azospirillum Liquid Bio-Fertilizer, Nitrogen Fixing Bacterium', 299, 'ROM Azospirillum Liquid Bio-Fertilizer, Nitrogen Fixing Bacterium.jpg'),
(49, 'YaraTerra Krista K A', 'phosphate', 'YaraTerra Krista K A Fully Water Soluble Nitrogen Fertilizer', 699, 'YaraTerra Krista K A Fully Water Soluble Nitrogen and Potassium Fertilizer.jpg'),
(50, 'Bloom Buddy Organic', 'organic', 'Bloom Buddy Organic Growth Booster 1 kg Fertilizer', 299, 'Bloom Buddy Organic Growth Booster 1 kg.jpg'),
(51, 'Casa De Amor Organic', 'organic', 'Casa De Amor Organic NPK Bio Fertilizer Granules', 449, 'Casa De Amor Organic NPK Bio Fertilizer Granules, Perfect to Use on All Plants and Gardening.jpg'),
(52, 'Exfert Bio Heaven Complex', 'organic', 'Exfert Bio Heaven Complex Organic Fertilizer, 1 Kg', 399, 'Exfert Bio Heaven Complex Organic Fertilizer, 1 Kg.jpg'),
(54, 'Jobes Organics', 'organic', 'Jobes Organics 9826 Fertilizer, 4 lb', 3499, 'Jobes Organics 9826 Fertilizer, 4 lb.jpg'),
(55, 'Nature Plus', 'organic', 'Nature Plus Organic, Chemical Free Fertilizer, Manure', 160, 'Natureplus.jpg'),
(56, 'RCM Harit Sanjivani', 'organic', 'RCM Harit Sanjivani Agriculture Fertilizers Organic (750 G)', 1799, 'RCM Harit Sanjivani Agriculture Fertilizers Organic (750 G).jpg'),
(57, 'Vesicular Arbuscular', 'organic', 'Vesicular Arbuscular Mycorrhiza Bio Fertilizer', 299, 'Vesicular Arbuscular Mycorrhiza Bio Fertilizer.jpg'),
(58, 'WellGrower Garden', 'organic', 'WellGrower Garden Food Organic Fertilizer and Manure 5 KG', 449, 'WellGrower Garden Food Organic Fertilizer and Manure 5 KG.jpg'),
(59, 'Aries FertiMax-PK', 'phosphate', 'Aries FertiMax-PK NPK Mono Potassium Phosphate Fertilizer', 149, 'Aries FertiMax-PK NPK Mono Potassium Phosphate Fertilizer.jpg'),
(60, 'Erwon Single', 'phosphate', 'Erwon Single Super Phosphate Fertilizer Fertilize', 249, 'Erwon Single Super Phosphate Fertilizer Fertilize.jpg'),
(61, 'Rock Phosphate', 'phosphate', 'Organic Nutrient Rich Rock Phosphate Fertilizers', 129, 'Organic Nutrient Rich Rock Phosphate Fertilizers.jpg'),
(62, 'p boost-phosphate', 'fish', 'P BOOST-Phosphate Bio Fertilizer', 279, 'p boost-phosphate bio fertilizer.jpg'),
(63, 'TAK SSP 20', 'fish', 'TAK SSP 20 single superphosphate fertilizer', 799, 'single superphosphate fertilizer.jpg'),
(64, 'Unitedlys Organic', 'fish', 'Unitedlys Organic Rock Phosphate Essential Fertilizer ', 199, 'Unitedlys Organic Rock Phosphate Essential Fertilizer All Purpose Crushed Powder ....jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user',
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`, `image`) VALUES
(31, 'ABC', 'ABC@gmail.com', '902fbdd2b1df0c4f70b4a5d23525e932', 'user', 'Screenshot (4).png'),
(32, 'Admin', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin', 'Screenshot (3).png'),
(33, 'Trupti', 'gunjal.trupti@gmail.com', 'e358efa489f58062f10dd7316b65649e', 'user', 'IMG-20210617-WA0000 (1)-min.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `pid`, `name`, `price`, `image`) VALUES
(51, 31, 35, 'Agricare Nitrophos', 399, 'Agricare Nitrophos 25kg White Crystalline Green House Grade Soluble NP Mono ....jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
