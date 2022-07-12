-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2022 at 11:01 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sandybest`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_genders`
--

CREATE TABLE `tbl_genders` (
  `gender_id` int(11) NOT NULL,
  `gender_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_genders`
--

INSERT INTO `tbl_genders` (`gender_id`, `gender_name`) VALUES
(1, 'Female'),
(2, 'Male'),
(3, 'Kids'),
(4, 'Unisex');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` int(30) NOT NULL,
  `product_gender` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `product_name`, `product_quantity`, `product_price`, `product_gender`, `product_image`) VALUES
(12, '100% Cotton Sweater', 30, 20, 1, 'sweater.jpg'),
(14, 'Daybreak 01-TS', 20, 550, 1, 'gbarkz-vqKnuG8GaQc-unsplash.jpg'),
(15, 'Mr.Robot Noir Bag', 35, 30, 4, 'nicolas-ladino-silva-e0V16a5jz-s-unsplash.jpg'),
(16, 'Manscape 5O-11', 10, 250, 2, 'austin-wade-d2s8NQ6WD24-unsplash.jpg'),
(17, 'D4C White Coat', 30, 50, 1, 'reza-delkhosh-iRAOJYtPHZE-unsplash.jpg'),
(18, 'Killer Queen', 25, 15, 1, 'alireza-dolati-OVS3rqXq9gg-unsplash (1).jpg'),
(20, 'Potato Blue', 100, 25, 1, 'james-lewis-ohiyigDmlYc-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`role_id`, `role_name`) VALUES
(1, 'User_CLIENT'),
(2, 'User_ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `users_id` int(11) NOT NULL,
  `users_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`users_id`, `users_name`, `user_email`, `user_password`, `user_role`) VALUES
(27, 'brent', 'brent@gmail.com', '$2y$10$sdFff9eGcZA/dbcOBwRu8OaioWGB4.N9EMRrodg0wOreKh.iyy/fq', 1),
(28, 'test', 'test@gmail.com', '$2y$10$.G0ADE7mns05VnaKwScaf.WyuprBUAaqpMN5yTP5vf458NpEHHkb2', 1),
(29, 'SANDIE', 'sandieb@gmail.com', '$2y$10$yg6bPwum2fcEB3SP7NrXCe78kNbdE9E/d5NnjAaAOQfSHYHcQJp02', 1),
(30, 'YEEZY', 'kanyewest@gmail.com', '$2y$10$fAT66QyizENVTFgWD2KplO65eoJWMLNmkLyiGNtIydGiw3z9N834i', 1),
(31, 'marie', 'mariemwangi@gmail.com', '$2y$10$xSq/FIrDMp/aNy95KJXoy.AclChVrMt4WmiteOkcF.Jdyq.Xb2cpG', 1),
(32, 'ADMIN', 'sandyadmin@gmail.com', '$2y$10$rG1fZx.TH4PcA5Om29L3d.cCBPBbgKM5Fa5s2M3Ot7YrxYzkkOltK', 2),
(33, 'ThorFinn', 'thorfinn123@gmail.com', '$2y$10$h.c4LxdgemJWLCxp5SCbrekVN2ZS1gBXvGKWVpZ/UNxtFFVmBdGtO', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_genders`
--
ALTER TABLE `tbl_genders`
  ADD PRIMARY KEY (`gender_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_gender` (`product_gender`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`users_id`),
  ADD KEY `user_role` (`user_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_genders`
--
ALTER TABLE `tbl_genders`
  MODIFY `gender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD CONSTRAINT `tbl_products_ibfk_1` FOREIGN KEY (`product_gender`) REFERENCES `tbl_genders` (`gender_id`);

--
-- Constraints for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `tbl_users_ibfk_1` FOREIGN KEY (`user_role`) REFERENCES `tbl_roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
