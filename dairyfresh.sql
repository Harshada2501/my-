-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2026 at 02:57 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dairyfresh`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) DEFAULT 1,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) DEFAULT 1,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_method` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_name`, `price`, `quantity`, `user_id`, `created_at`, `payment_method`) VALUES
(1, 'Blue Cheese', '280.00', 1, NULL, '2026-02-21 14:03:39', NULL),
(2, 'Butter', '120.00', 1, NULL, '2026-02-21 14:03:49', NULL),
(3, 'Cheese & Butter', '150.00', 1, NULL, '2026-02-21 14:04:47', NULL),
(4, 'Curd', '40.00', 1, NULL, '2026-02-21 14:04:50', NULL),
(5, 'Dairy Chocolates', '120.00', 1, NULL, '2026-02-21 14:04:53', NULL),
(6, 'Khoa (Mawa)', '250.00', 1, NULL, '2026-02-21 14:04:55', NULL),
(7, 'Ice Creams', '100.00', 1, NULL, '2026-02-21 14:04:58', NULL),
(8, 'Ghee', '500.00', 1, NULL, '2026-02-21 14:05:00', NULL),
(9, 'Fresh Cream', '80.00', 1, NULL, '2026-02-21 14:05:02', NULL),
(10, 'Eggs (Dozen)', '70.00', 1, NULL, '2026-02-21 14:05:04', NULL),
(11, 'Lassi', '50.00', 1, NULL, '2026-02-21 14:05:07', NULL),
(12, 'Milk', '50.00', 1, NULL, '2026-02-21 14:05:10', NULL),
(13, 'Mozzarella', '180.00', 1, NULL, '2026-02-21 14:05:12', NULL),
(14, 'Organic Honey', '300.00', 1, NULL, '2026-02-21 14:05:14', NULL),
(15, 'Paneer', '200.00', 1, NULL, '2026-02-21 14:05:16', NULL),
(16, 'Yogurt & Curd', '60.00', 1, NULL, '2026-02-21 14:05:20', NULL),
(17, 'Blue Cheese', '280.00', 1, NULL, '2026-02-21 14:06:52', NULL),
(18, 'Blue Cheese', '280.00', 1, NULL, '2026-02-21 14:07:29', NULL),
(19, 'Blue Cheese', '280.00', 1, NULL, '2026-02-21 14:08:11', NULL),
(20, 'Blue Cheese', '280.00', 1, NULL, '2026-02-21 14:12:07', NULL),
(21, 'Blue Cheese', '280.00', 1, NULL, '2026-02-21 14:13:05', NULL),
(22, 'Blue Cheese', '280.00', 1, NULL, '2026-02-21 14:14:29', NULL),
(23, 'Blue Cheese', '280.00', 1, NULL, '2026-02-21 14:14:53', NULL),
(24, 'Blue Cheese', '280.00', 1, NULL, '2026-03-14 06:04:52', NULL),
(25, 'Blueberry Scoop', '150.00', 1, NULL, '2026-03-21 18:50:20', NULL),
(26, 'Brownie Sundae', '180.00', 1, NULL, '2026-04-01 17:51:38', NULL),
(27, 'Blueberry Scoop', '150.00', 1, NULL, '2026-04-01 18:36:53', NULL),
(28, 'Brownie Sundae', '180.00', 1, NULL, '2026-04-01 18:36:53', NULL),
(29, 'Brownie Sundae', '150.00', 1, NULL, '2026-04-01 18:36:53', NULL),
(30, 'Blueberry Scoop', '150.00', 1, NULL, '2026-04-01 18:46:26', 'Cash on Delivery'),
(31, 'Blueberry Scoop', '150.00', 1, NULL, '2026-04-01 18:47:10', 'Online Payment'),
(32, 'Vanilla Ice Cream', '80.00', 1, NULL, '2026-04-01 18:47:10', 'Online Payment'),
(33, 'Chocolate Ice Cream', '100.00', 1, NULL, '2026-04-01 18:49:51', 'Cash on Delivery'),
(34, 'Blueberry Scoop', '150.00', 1, NULL, '2026-04-01 18:57:49', 'Online Payment'),
(35, 'Blueberry Scoop', '150.00', 1, NULL, '2026-04-01 19:00:46', 'Cash on Delivery'),
(36, 'Dry Fruit Ice Cream', '165.00', 1, NULL, '2026-04-01 19:08:51', 'Cash on Delivery'),
(37, 'Brownie Sundae', '180.00', 1, NULL, '2026-04-08 06:30:45', 'Cash on Delivery');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `stock`, `category`, `image`) VALUES
(1, 'Vanilla Ice Cream', '80.00', 50, 'Classic', 'vanilla.jpg'),
(2, 'Chocolate Ice Cream', '100.00', 40, 'Classic', 'chocolate.jpg'),
(3, 'Strawberry Ice Cream', '90.00', 45, 'Classic', 'strawberry.jpg'),
(4, 'Mango Ice Cream', '50.00', 35, 'Seasonal', 'mango.jpg'),
(5, 'Butterscotch Ice Cream', '80.00', 30, 'Classic', 'butterscotch.jpg'),
(6, 'Kulfi', '60.00', 60, 'Traditional', 'kulfi.jpg'),
(7, 'Ice Cream Sundae', '50.00', 25, 'Sundae', 'sundae.jpg'),
(8, 'Chocolate Cone', '70.00', 55, 'Cone', 'choco-cone.jpg'),
(9, 'Black Currant Ice Cream', '140.00', 30, 'Premium', 'blackcurrant.jpg'),
(10, 'Oreo Sundae', '150.00', 20, 'Sundae', 'oreo-sundae.jpg'),
(11, 'Pista Ice Cream', '120.00', 25, 'Premium', 'pista.jpg'),
(12, 'Blueberry Scoop', '150.00', 20, 'Premium', 'blueberry.jpg'),
(13, 'Brownie Sundae', '180.00', 15, 'Sundae', 'brownie-sundae.jpg'),
(14, 'Caramel Crunch Ice Cream', '170.00', 18, 'Premium', 'caramel-crunch.jpg'),
(15, 'Fruit Delight Sundae', '90.00', 14, 'Sundae', 'fruit-delight.jpg'),
(16, 'Cold Coffee Float', '80.00', 22, 'Beverage', 'cold-coffee-float.jpg'),
(17, 'Rajbhog', '155.00', 22, 'Traditional', 'rajbhog.jpg'),
(19, 'Dry Fruit Ice Cream', '160.00', 22, 'Classic', 'dryfruiticecream.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `created_at`) VALUES
(1, 'Harshada Shinde', 'harshada.shinde0125@gmail.com', '$2y$10$UJEx5Rqw00yhnvYPzBNqNODCPLmk34Lhjjkb7Byyf55nW/uY//ZbG', '2026-02-15 12:51:06'),
(3, 'mamata', 'Mamata@gmail.com', '$2y$10$zolmPQyfu01VdCUFGvgZveXIH2JOhCQ8vWxrPMxlRpczzlTuvK3FS', '2026-03-11 17:35:46'),
(4, 'saloni', 'saloni@gmail.com', '$2y$10$qqmlmGOYnVIlQ48BzVsnveuQYT6Jt8ag.ZA.4.6xstwcO4tnhY3dK', '2026-03-19 11:54:51'),
(5, 'mira', 'mira@gmail.com', '$2y$10$X5e0xJpwEe6/oezG4bp7Kuzb.3cFG.gnZaMCvL3tVppks//KjM7FS', '2026-03-19 11:56:22'),
(7, 'mamata', 'M@gmail.com', '$2y$10$ZbfuowZiOrJ4yCpwROahBed.RGhwXbKw3rdtSWGLUrQ7X3nCdYAYu', '2026-03-19 11:57:21'),
(8, 'siddhi', 'siddhi@gmail.com', '$2y$10$O85yXpYg9NXiFGqqn0Do0uXaPHK.d7XKtYy2vF9rbBixpdl5ppRdy', '2026-04-08 07:54:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
