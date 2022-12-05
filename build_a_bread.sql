-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 05, 2022 at 06:09 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `build_a_bread`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` varchar(36) NOT NULL,
  `order_id` int(11) NOT NULL,
  `comment_field` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `order_id`, `comment_field`) VALUES
('082ce584-74bf-11ed-9b2c-00155dfe09cd', 22, 'Optional '),
('13048192-74c0-11ed-9b2c-00155dfe09cd', 24, 'Mikes comment'),
('30c15bbb-74ab-11ed-a7d3-00155dd9c290', 15, 'This is a test order'),
('31ec726d-74bf-11ed-9b2c-00155dfe09cd', 23, 'This comment has been deemed unsafe by an admin'),
('3364e275-74c4-11ed-9b2c-00155dfe09cd', 31, 'Optional comment'),
('4a439a64-74ab-11ed-a7d3-00155dd9c290', 16, 'This comment has been deemed unsafe by an admin'),
('52ee1bf7-74c0-11ed-9b2c-00155dfe09cd', 26, 'This comment has been deemed unsafe by an admin'),
('54474562-74ae-11ed-a7d3-00155dd9c290', 21, 'This comment has been deemed unsafe by an admin'),
('6e2454c0-74c0-11ed-9b2c-00155dfe09cd', 27, 'comment test'),
('724a1ad1-74c4-11ed-9b2c-00155dfe09cd', 32, 'Comment from Reed'),
('891e4957-74c0-11ed-9b2c-00155dfe09cd', 28, 'Admin order'),
('95804995-74c0-11ed-9b2c-00155dfe09cd', 29, 'It works'),
('b3ead019-74c0-11ed-9b2c-00155dfe09cd', 30, 'Running'),
('eac1baa1-74ab-11ed-a7d3-00155dd9c290', 19, 'Todays bread');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` varchar(36) NOT NULL,
  `item_inventory` int(11) NOT NULL,
  `item_price` float DEFAULT NULL,
  `item_name` varchar(30) NOT NULL,
  `item_description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_inventory`, `item_price`, `item_name`, `item_description`) VALUES
('1', 100, 8.79, 'tuscan grilled cheese', 'provolone, basil, spinach, tomato, pesto, grilled sourdough'),
('10', 100, 1.5, 'potato chips', 'No longer available'),
('11', 100, 1.5, 'jalepeno chips', ''),
('12', 100, 1, 'water', ''),
('13', 100, 1, 'sprite', ''),
('14', 100, 1, 'coca cola', ''),
('15', 100, 1, 'fanta', 'No longer available'),
('2', 100, 9.89, 'club', 'turkey, bacon, cheddar, tomato, mayonnaise, grilled sourdough'),
('3', 100, 9.89, 'chiecken pomodori ', 'grilled chicken, provolone, basil, spinach, tomato, pesto, grilled sourdough'),
('4', 100, 8, 'tomato mozarella', 'fresh mozzarella, red pepper, arugula, basil, balsamic vinaigrette, baguette'),
('5', 100, 9.5, 'chicken pesto', 'grilled chicken, tomato, arugula, pesto, house vinaigrette, baguette'),
('53a7df67-7266-11ed-8d66-00155dfe09cd', 700, 200, 'final test', 'No longer available'),
('6', 100, 9.89, 'avocado BLT', 'bacon, lettuce, tomatoes, avocado, mayo, salt, and pepper, grilled sourdough'),
('7', 100, 9.89, 'BBQ chicken sandwich', 'chicken, BBQ sauce, red onions, white cheddar, and frizzled onions, white miche'),
('788befa8-74ae-11ed-a7d3-00155dd9c290', 300, 10, 'Test Bread', 'No longer available'),
('8', 100, 2, 'chocolate chip cookie', ''),
('8164d7a1-74bf-11ed-9b2c-00155dfe09cd', 2, 3, 'Good bread', 'No longer available'),
('9', 100, 2, 'oatmeal raisin cookie', ''),
('a929ce36-74c4-11ed-9b2c-00155dfe09cd', 30, 12, 'Great Bread', 'No longer available'),
('c1379e8b-726d-11ed-8d66-00155dfe09cd', 11, 3, 'good', 'No longer available'),
('d040c0f3-726d-11ed-8d66-00155dfe09cd', 500, 10, 'good one', 'No longer available'),
('daa17643-726d-11ed-8d66-00155dfe09cd', 200, 50, 'testers bread', 'No longer available');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `price_total` float NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `profile_id` varchar(36) NOT NULL,
  `order_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `price_total`, `schedule_id`, `profile_id`, `order_status`) VALUES
(15, 11.39, 12, '4', 2),
(16, 11.39, 13, '4', 2),
(19, 10.89, 16, '6', 1),
(20, 9.89, 17, '6', 3),
(21, 10.5, 18, '6', 2),
(22, 11.29, 19, '4', 3),
(23, 1, 20, '6', 2),
(24, 18.89, 21, '6', 1),
(26, 1, 22, '6', 2),
(27, 19.78, 23, '6', 3),
(28, 9.89, 24, '4', 3),
(29, 11.89, 25, '4', 1),
(30, 19.78, 26, '4', 1),
(31, 10.29, 27, '56b691d0-74c3-11ed-9b2c-00155dfe09cd', 2),
(32, 11.29, 28, '56b691d0-74c3-11ed-9b2c-00155dfe09cd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_lines`
--

CREATE TABLE `order_lines` (
  `orderline_id` int(11) NOT NULL,
  `item_id` varchar(36) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_name` varchar(36) NOT NULL,
  `quantity_ordered` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_lines`
--

INSERT INTO `order_lines` (`orderline_id`, `item_id`, `order_id`, `item_name`, `quantity_ordered`) VALUES
(1, '2', 15, 'club', 1),
(2, '11', 15, 'jalepeno chips', 2),
(3, '2', 16, 'club', 2),
(4, '11', 16, 'jalepeno chips', 1),
(9, '7', 19, 'BBQ chicken sandwich', 1),
(10, '12', 19, 'water', 1),
(11, '2', 20, 'club', 1),
(12, '5', 21, 'chicken pesto', 1),
(13, '13', 21, 'sprite', 1),
(14, '1', 22, 'tuscan grilled cheese', 1),
(15, '11', 22, 'jalepeno chips', 1),
(16, '12', 22, 'water', 2),
(17, '12', 23, 'water', 1),
(18, '3', 24, 'chiecken pomodori ', 1),
(19, '4', 24, 'tomato mozarella', 1),
(20, '12', 24, 'water', 1),
(23, '13', 26, 'sprite', 3),
(24, '6', 27, 'avocado BLT', 1),
(25, '3', 27, 'chiecken pomodori ', 1),
(26, '3', 28, 'chiecken pomodori ', 4),
(27, '6', 29, 'avocado BLT', 1),
(28, '8', 29, 'chocolate chip cookie', 1),
(29, '2', 30, 'club', 1),
(30, '3', 30, 'chiecken pomodori ', 1),
(31, '1', 31, 'tuscan grilled cheese', 2),
(32, '11', 32, 'jalepeno chips', 1),
(33, '1', 32, 'tuscan grilled cheese', 1),
(34, '12', 32, 'water', 1);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `profile_id` varchar(36) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(64) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `user_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`profile_id`, `first_name`, `last_name`, `username`, `password`, `email`, `phone_number`, `user_type`) VALUES
('1', 'sona', 'shah', 'sona', '12345', 'sona@tamu.edu', '9728976760', 3),
('1dc8fa2b-7038-11ed-8b10-00155dfe09cd', 'Johnathan', 'Grimesathan', 'testing', 'tester123', 'testing@mail.com', '7132456321', 3),
('2', 'nathanel', 'goza', 'nathanel', '12345', 'test@gmail.com', '3462086816', 1),
('2e932d47-74c3-11ed-9b2c-00155dfe09cd', 'Doug', 'Tim', 'doug12', 'password', 'doug@gmail.com', '1234567890', 2),
('3', 'nathan', 'groeschol', 'nathan', '12345', 'test@gmail.com', '8326488454', 3),
('4', 'john', 'grimes', 'john', '12345', 'test@gmail.com', '7137253613', 3),
('5', 'christopher', 'lanclos', 'christopher', '12345', 'test@gmail.com', '1234567890', 2),
('565f4682-74be-11ed-9b2c-00155dfe09cd', 'Tim', 'Doug', 'timothy', 'password', 'tim@gmail.com', '5558976543', 2),
('56b691d0-74c3-11ed-9b2c-00155dfe09cd', 'Reed', 'Walter', 'reed12', 'swordfish', 'reeed@gmail.com', '7134567896', 1),
('6', 'mike', 'wazowski', 'mike', '12345', 'test@gmail.com', '2345678901', 1),
('7', 'james ', 'sullivan', 'james', '12345', 'test@gmail.com', '3456789012', 2),
('7bd9b144-74ba-11ed-9b2c-00155dfe09cd', 'Tom', 'Smith', 'tman223', 'swordfish', 'tom.smith@tamu.edu', '8264891237', 2);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `schedule_id` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`schedule_id`, `start_time`, `end_time`) VALUES
(12, '2022-12-15 17:30:00', '2022-12-15 18:30:00'),
(13, '2023-03-29 13:00:00', '2023-03-29 14:00:00'),
(15, '2022-12-06 13:00:00', '2022-12-06 14:00:00'),
(17, '2022-12-05 11:30:00', '2022-12-05 00:30:00'),
(18, '2022-12-30 18:00:00', '2022-12-30 19:00:00'),
(19, '2022-12-06 15:30:00', '2022-12-06 16:30:00'),
(20, '2022-12-31 03:30:00', '2022-12-31 04:30:00'),
(22, '2023-01-06 12:00:00', '2023-01-06 13:00:00'),
(23, '2022-12-07 15:00:00', '2022-12-07 16:00:00'),
(24, '2022-12-07 17:00:00', '2022-12-07 18:00:00'),
(25, '2022-12-07 13:00:00', '2022-12-07 14:00:00'),
(26, '2022-12-07 17:00:00', '2022-12-07 17:30:00'),
(27, '2022-12-14 15:30:00', '2022-12-14 16:30:00'),
(28, '2022-12-13 15:30:00', '2022-12-13 16:30:00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_login`
-- (See below for the actual view)
--
CREATE TABLE `view_login` (
`username` varchar(20)
,`password` varchar(20)
,`profile_id` varchar(36)
,`user_type` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_orders`
-- (See below for the actual view)
--
CREATE TABLE `view_orders` (
`order_id` int(11)
,`price_total` float
,`profile_id` varchar(36)
,`order_status` int(11)
,`item_name` varchar(36)
,`quantity_ordered` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_profiles`
-- (See below for the actual view)
--
CREATE TABLE `view_profiles` (
`profile_id` varchar(36)
,`first_name` varchar(20)
,`last_name` varchar(20)
,`username` varchar(20)
,`email` varchar(64)
,`phone_number` varchar(20)
,`user_type` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_schedules`
-- (See below for the actual view)
--
CREATE TABLE `view_schedules` (
`order_id` int(11)
,`start_time` datetime
,`end_time` datetime
,`order_status` int(11)
,`profile_id` varchar(36)
);

-- --------------------------------------------------------

--
-- Structure for view `view_login`
--
DROP TABLE IF EXISTS `view_login`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_login`  AS SELECT `profiles`.`username` AS `username`, `profiles`.`password` AS `password`, `profiles`.`profile_id` AS `profile_id`, `profiles`.`user_type` AS `user_type` FROM `profiles``profiles`  ;

-- --------------------------------------------------------

--
-- Structure for view `view_orders`
--
DROP TABLE IF EXISTS `view_orders`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_orders`  AS SELECT `a`.`order_id` AS `order_id`, `a`.`price_total` AS `price_total`, `a`.`profile_id` AS `profile_id`, `a`.`order_status` AS `order_status`, `b`.`item_name` AS `item_name`, `b`.`quantity_ordered` AS `quantity_ordered` FROM (`orders` `a` join `order_lines` `b`) WHERE (`a`.`order_id` = `b`.`order_id`)  ;

-- --------------------------------------------------------

--
-- Structure for view `view_profiles`
--
DROP TABLE IF EXISTS `view_profiles`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_profiles`  AS SELECT `profiles`.`profile_id` AS `profile_id`, `profiles`.`first_name` AS `first_name`, `profiles`.`last_name` AS `last_name`, `profiles`.`username` AS `username`, `profiles`.`email` AS `email`, `profiles`.`phone_number` AS `phone_number`, `profiles`.`user_type` AS `user_type` FROM `profiles``profiles`  ;

-- --------------------------------------------------------

--
-- Structure for view `view_schedules`
--
DROP TABLE IF EXISTS `view_schedules`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_schedules`  AS SELECT `a`.`order_id` AS `order_id`, `b`.`start_time` AS `start_time`, `b`.`end_time` AS `end_time`, `a`.`order_status` AS `order_status`, `a`.`profile_id` AS `profile_id` FROM (`orders` `a` join `schedules` `b`) WHERE (`a`.`schedule_id` = `b`.`schedule_id`)  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `index_items_id` (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_lines`
--
ALTER TABLE `order_lines`
  ADD PRIMARY KEY (`orderline_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`profile_id`),
  ADD UNIQUE KEY `index_profile_id` (`profile_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`schedule_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `order_lines`
--
ALTER TABLE `order_lines`
  MODIFY `orderline_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
