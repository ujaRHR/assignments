-- Adminer 4.8.1 MySQL 8.0.35-0ubuntu0.20.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `Categories`;
CREATE TABLE `Categories` (
  `category_id` int DEFAULT NULL,
  `category_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `Categories` (`category_id`, `category_name`) VALUES
(1,	'Food'),
(2,	'Clothing'),
(3,	'Home Decor'),
(4,	'Art and Crafts'),
(5,	'Plants');

DROP TABLE IF EXISTS `Customers`;
CREATE TABLE `Customers` (
  `customer_id` int NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `customer_email` varchar(255) DEFAULT NULL,
  `customer_location` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `Customers` (`customer_id`, `customer_name`, `customer_email`, `customer_location`) VALUES
(1,	'Md. Hasan',	'mdhasan@gmail.com',	'Dhaka'),
(2,	'Nusrat Rahman',	'nusrat@yahoo.com',	'Chittagong'),
(3,	'Amina Khan',	'amina@yahoo.com',	'Sylhet'),
(4,	'Rahim Ali',	'rahim@gmail.com',	'Khulna'),
(5,	'Farida Begum',	'farida@hotmail.com',	'Rajshahi'),
(6,	'Kabir Ahmed',	'kabir@gmail.com',	'Barisal'),
(7,	'Sadia Islam',	'sadia@gmail.com',	'Comilla'),
(8,	'Tariqul Islam',	'tariqul@email.com',	'Narayanganj'),
(9,	'Anika Akter',	'anika@yahoo.com',	'Mymensingh'),
(10,	'Rafiqul Hasan',	'rafiqul@outlook.com',	'Rangpur');

DROP TABLE IF EXISTS `Order_Items`;
CREATE TABLE `Order_Items` (
  `item_id` int NOT NULL,
  `order_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `product_quantity` int DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `Order_Items` (`item_id`, `order_id`, `product_id`, `product_quantity`, `unit_price`) VALUES
(1,	3,	3,	2,	14.99),
(2,	1,	7,	1,	12.99),
(3,	3,	2,	3,	14.99),
(4,	2,	3,	1,	29.75),
(5,	7,	5,	1,	39.99),
(6,	1,	1,	4,	5.99),
(7,	8,	6,	2,	7.99),
(8,	9,	10,	1,	49.99),
(9,	4,	9,	5,	4.99),
(10,	5,	2,	2,	14.99);

DROP TABLE IF EXISTS `Orders`;
CREATE TABLE `Orders` (
  `order_id` int NOT NULL,
  `customer_id` int DEFAULT NULL,
  `order_date` varchar(255) DEFAULT NULL,
  `total_amount` float DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `Orders` (`order_id`, `customer_id`, `order_date`, `total_amount`) VALUES
(1,	2,	'2023-11-02',	36.95),
(2,	2,	'2023-11-03',	19.99),
(3,	2,	'2023-11-04',	44.97),
(4,	3,	'2023-11-03',	29.75),
(5,	1,	'2023-11-02',	39.99),
(6,	8,	'2023-11-01',	23.96),
(7,	9,	'2023-11-05',	15.98),
(8,	6,	'2023-11-06',	49.99),
(9,	10,	'2023-11-03',	24.95),
(10,	5,	'2023-11-04',	29.98);

DROP TABLE IF EXISTS `Products`;
CREATE TABLE `Products` (
  `product_id` int NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_description` varchar(255) DEFAULT NULL,
  `product_price` float DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `Products` (`product_id`, `product_name`, `product_description`, `product_price`, `category_id`) VALUES
(1,	'Green Tea',	'Premium Asian green tea leaves.',	5.99,	1),
(2,	'Sushi Set',	'Assorted sushi rolls and sashimi.',	14.99,	1),
(3,	'Kimono Fabric',	'Traditional Japanese kimono fabric.',	29.99,	2),
(4,	'Chinese Calligraphy Set',	'Complete set for calligraphy enthusiasts.',	19.99,	4),
(5,	'Bonsai Tree',	'Miniature Asian bonsai tree.',	39.99,	5),
(6,	'Thai Curry Sauce',	'Authentic Thai curry sauce.',	7.99,	1),
(7,	'Indian Spices Collection',	'Assortment of aromatic Indian spices.',	12.99,	5),
(8,	'Asian Lantern',	'Decorative Chinese lantern.',	8.99,	4),
(9,	'Miso Soup Mix',	'Instant miso soup mix.',	4.99,	1),
(10,	'Tibetan Singing Bowl',	'Handcrafted Tibetan singing bowl.',	49.99,	3);

-- 2023-11-06 17:24:13
