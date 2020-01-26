-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 26-Jan-2020 às 23:57
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `checkAvailability` (IN `userCheck` INT(30), IN `passwordCheck` VARCHAR(32))  select user_id, user FROM user where user = userCheck and password = md5(passwordCheck)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `checkUser` (IN `userAlready` VARCHAR(32))  SELECT user
from user 
where user = userAlready$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `contactSend` (IN `contactName` VARCHAR(30), IN `emailUser` VARCHAR(50), IN `reasonUser` TEXT)  INSERT INTO contact(name,email ,reason) VALUES(contactName, emailUser, reasonUser)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `createFeedback` (IN `nameInput` VARCHAR(30), IN `feedbackInput` TEXT, IN `ratingInput` INT(1))  INSERT INTO feedbacks(name,feedback, ratings) VALUES(nameInput, feedbackInput, ratingInput)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `loginCreation` (IN `userName` VARCHAR(30), IN `passName` VARCHAR(32))  Insert into user(user, password)
values (userName, md5(passName))$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `runFeedbacks` ()  SELECT * FROM feedbacks 
ORDER BY id DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectCart` ()  NO SQL
SELECT * FROM cart_products$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectProduct` (IN `idProduct` INT)  SELECT * FROM cart_products 
WHERE product_id = idProduct$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cart_products`
--

CREATE TABLE `cart_products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_quantity` int(99) NOT NULL,
  `product_img` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cart_products`
--

INSERT INTO `cart_products` (`product_id`, `product_name`, `product_description`, `product_price`, `product_quantity`, `product_img`) VALUES
(3, 'Lamborghini Aventador', 'One of the best cars in the world could be yours.', '899999.00', 99, 'aventador.jpg'),
(4, 'Ferrari ', 'Ferrari is a classic, buy it from us.', '222299.00', 99, 'ferrari.jpg'),
(5, 'Yatch', 'You could own an yatch within a click of a button!', '58889.00', 99, 'yatch.jpg'),
(9, 'Scooter', 'Scooters are way better than bicycles, aren\'t they??? No?? Am I the only one?? nevermind.', '5000.00', 99, 'scooter.jpg'),
(10, 'Jet', 'Best way to travel, buy yourself a jet for cheap!', '4999999.99', 99, 'jet.jpeg'),
(11, 'House', 'A really nice house in a perfect neighbourhood, you will be living next to Bill Gates and Jeff Bezos.', '4999999.99', 99, 'house.jpg'),
(12, 'Vancouver', 'Buy yourself a whole city in a click of a button, whats not to like? Vancouver is one of the most beautiful cities out there and it could be yours.', '299.99', 99, 'vancouver.jpg'),
(13, 'Water Bottle', 'Hot day, I guess you deserve a gourmet water bottle.', '699.99', 99, 'water.jpg'),
(14, 'Flip Flops', 'I don\'t really like them.', '1.99', 99, 'flip.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contact`
--

CREATE TABLE `contact` (
  `name` varchar(30) NOT NULL,
  `reason` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contact`
--

INSERT INTO `contact` (`name`, `reason`, `email`, `id`) VALUES
('Test', 'This is a test mail. ', 'Test@hotmail.com', 22);

-- --------------------------------------------------------

--
-- Estrutura da tabela `feedbacks`
--

CREATE TABLE `feedbacks` (
  `name` varchar(30) COLLATE utf8_swedish_ci NOT NULL,
  `feedback` text COLLATE utf8_swedish_ci NOT NULL,
  `id` int(11) NOT NULL,
  `ratings` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `feedbacks`
--

INSERT INTO `feedbacks` (`name`, `feedback`, `id`, `ratings`) VALUES
('Linda', ' I meant 5 stars btw ', 102, 5),
('Linda', ' Perfect :) ', 101, 1),
('eae', ' aeae', 98, 2),
('oioi', 'oioi ', 99, 5),
('Barack Obama', ' Very nice! Great for my research work :) Keep it up <3 ', 100, 5),
('Gabriel Henrique', 'Hello, welcome to my website! I hope you enjoy it! :D ', 97, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `message` varchar(300) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `messages`
--

INSERT INTO `messages` (`id`, `name`, `message`, `time`, `ip`) VALUES
(71, 'Gabriel', 'Hello! Welcome to my chat :d', '18:53:14', NULL),
(72, 'Henrique', 'I hope you enjoy! :D', '18:53:42', NULL),
(73, 'Valencia', 'It works finally.', '18:54:10', NULL),
(74, 'Valencia', 'ae', '21:54:49', NULL),
(75, 'Valencia', 'e', '11:38:36', NULL),
(76, 'Valencia', 'qwe', '11:38:38', NULL),
(77, 'Valencia', 'qwe', '11:38:38', NULL),
(78, 'Valencia', 'e', '11:38:39', NULL),
(79, 'Valencia', 'w', '11:38:39', NULL),
(80, 'Valencia', 'q', '11:38:40', NULL),
(81, 'Ruski Supreet', 'hello', '11:43:51', NULL),
(82, 'gab', 'eae', '17:54:15', NULL),
(83, 'Ruski Supreet', 'helooooooo', '02:21:38', NULL),
(84, 'Ruski Supreet', 'mY NAME is prince of belair', '02:21:54', NULL),
(85, 'Ruski Supreet', 'hellop', '02:21:56', NULL),
(86, 'Ruski Supreet', ':)', '02:21:58', NULL),
(87, 'TheLastOfLindan', 'oh well', '02:22:37', NULL),
(88, 'TheLastOfLindan', 'i forgot the k', '02:22:41', NULL),
(89, 'TheLastOfLindan', 'for lindank', '02:22:46', NULL),
(90, 'TheLastOfLindan', ':\'(', '02:22:48', NULL),
(91, 'gab', 'qwe', '15:48:47', NULL),
(92, 'gab', 'ewq', '15:48:48', NULL),
(93, 'gab', 'rqwrqwr', '15:48:48', NULL),
(94, 'gab', 'qw', '15:48:49', NULL),
(95, 'gab', 'qwe', '15:48:50', NULL),
(96, 'sup', 'sup', '11:57:40', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `user_id` int(15) NOT NULL,
  `user` varchar(30) NOT NULL,
  `money` double(6,2) DEFAULT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`user_id`, `user`, `money`, `password`) VALUES
(154, 'gabriel', NULL, '647431b5ca55b04fdf3c2fce31ef1915'),
(155, 'admin', NULL, '21232f297a57a5a743894a0e4a801fc3'),
(156, 'TheLastOfLindank', NULL, '8cfb6e3623a4e556b7f331e1f08ae781'),
(157, 'gab', NULL, '647431b5ca55b04fdf3c2fce31ef1915'),
(158, 'admin2', NULL, 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_products`
--
ALTER TABLE `cart_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user` (`user`),
  ADD UNIQUE KEY `user_2` (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_products`
--
ALTER TABLE `cart_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
