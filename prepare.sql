-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2023 at 02:34 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+08:00";

--
-- Database: `adetech`
--
DROP DATABASE adetech;

CREATE DATABASE IF NOT EXISTS `adetech` ;

USE `adetech`;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_fname` varchar(100) DEFAULT NULL,
  `emp_lname` varchar(100) DEFAULT NULL,
  `emp_username` varchar(100) DEFAULT NULL,
  `emp_password` varchar(100) DEFAULT NULL,
  `app_role` smallint(6) DEFAULT NULL,
   PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_fname`, `emp_lname`, `emp_username`, `emp_password`, `app_role`) VALUES
(0, 'Admin', 'Admin', 'admin', 'Admin123!', 1),
(1, 'Employee', 'Cashier 1', 'cashier1', 'Cashier123!', 2),
(2, 'Employee', 'Cashier 2', 'cashier2', 'Cashier987!', 3),
(3, 'Human', 'Resource', 'humrec', 'Humrec123!', 4);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_type` VARCHAR(25),
  `item_name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `item_desc` text NOT NULL,
  `price` float NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `last_updated` datetime NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_type`, `item_name`, `image`, `item_desc`, `price`, `date_added`, `last_updated`) VALUES
(1, 'single', 'Polo Shirt Black', 'img/ps-black.png', 'Polo Shirt Black', 250, '2022-12-01 15:57:54', '0000-00-00 00:00:00'),
(2, 'single', 'Polo Shirt Blue', 'img/ps-blue.png', 'Polo Shirt Blue', 250, '2022-12-01 15:57:54', '0000-00-00 00:00:00'),
(3, 'single', 'Polo Shirt Brown', 'img/ps-brown.png', 'Polo Shirt Brown', 250, '2022-12-01 15:57:54', '0000-00-00 00:00:00'),
(4, 'single', 'Polo Shirt Pink', 'img/ps-pink.png', 'Polo Shirt Pink', 250, '2022-12-01 15:57:54', '0000-00-00 00:00:00'),
(5, 'single', 'Polo Shirt Red', 'img/ps-red.png', 'Polo Shirt Red', 250, '2022-12-01 15:57:54', '0000-00-00 00:00:00'),
(6, 'single', 'Polo Shirt Violet', 'img/ps-violet.png', 'Polo Shirt Violet', 250, '2022-12-01 15:57:54', '0000-00-00 00:00:00'),
(7, 'single', 'Polo Shirt White', 'img/ps-white.png', 'Polo Shirt White', 250, '2022-12-01 15:57:54', '0000-00-00 00:00:00'),
(8, 'single', 'Round Shirt Black', 'img/rn-black.png', 'Round Shirt Black', 200, '2022-12-01 15:57:54', '0000-00-00 00:00:00'),
(9, 'single', 'Round Shirt Blue', 'img/rn-blue.png', 'Round Shirt Blue', 200, '2022-12-01 15:57:54', '0000-00-00 00:00:00'),
(10, 'single', 'Round Shirt Green', 'img/rn-green.png', 'Round Shirt Green', 200, '2022-12-01 15:57:55', '0000-00-00 00:00:00'),
(11, 'single', 'Round Shirt Orange', 'img/rn-orange.png', 'Round Shirt Orange', 200, '2022-12-01 15:57:55', '0000-00-00 00:00:00'),
(12, 'single', 'Round Shirt Red', 'img/rn-red.png', 'Round Shirt Red', 200, '2022-12-01 15:57:55', '0000-00-00 00:00:00'),
(13, 'single', 'Round Shirt White', 'img/rn-white.png', 'Round Shirt White', 200, '2022-12-01 15:57:55', '0000-00-00 00:00:00'),
(14, 'single', 'Round Shirt Yellow', 'img/rn-yellow.png', 'Round Shirt Yellow', 170, '2022-12-01 15:57:55', '0000-00-00 00:00:00'),
(15, 'single', 'V-neck Black', 'img/vn-black.png', 'V-neck Black', 200, '2022-12-01 15:57:55', '0000-00-00 00:00:00'),
(16, 'single', 'V-neck Blue', 'img/vn-blue.png', 'V-neck Blue', 200, '2022-12-01 15:57:55', '0000-00-00 00:00:00'),
(17, 'single', 'V-neck Green', 'img/vn-green.png', 'V-neck Green', 200, '2022-12-01 15:57:55', '0000-00-00 00:00:00'),
(18, 'single', 'V-neck Orange', 'img/vn-orange.png', 'V-neck Orange', 200, '2022-12-01 15:57:55', '0000-00-00 00:00:00'),
(19, 'single', 'V-neck Red', 'img/vn-red.png', 'V-neck Red', 200, '2022-12-01 15:57:55', '0000-00-00 00:00:00'),
(20, 'single', 'V-neck Violet', 'img/vn-violet.png', 'V-neck Violet', 200, '2022-12-01 15:57:55', '0000-00-00 00:00:00'),
(21, 'single', 'V-neck White', 'img/vn-white.png', 'V-neck White', 200, '2022-12-01 15:57:55', '0000-00-00 00:00:00'),

(22, 'bundle1', '10pcs Black PS', 'img/b1-black.png', '10pcs Black PS', 2000, '2022-12-01 15:57:55', '0000-00-00 00:00:00'),
(23, 'bundle1', '10pcs Blue PS', 'img/b1-blue.png', '10pcs Blue PS', 2000, '2022-12-01 15:57:55', '0000-00-00 00:00:00'),
(24, 'bundle1', '10pcs Brown PS', 'img/b1-brown.png', '10pcs Brown PS', 2000, '2022-12-01 15:57:55', '0000-00-00 00:00:00'),
(25, 'bundle1', '10pcs PS Pink', 'img/b1-pink.png', '10pcs PS Pink', 2000, '2022-12-01 15:57:55', '0000-00-00 00:00:00'),
(26, 'bundle1', '10pcs Red PS', 'img/b1-red.png', '10pcs Red PS', 2000, '2022-12-01 15:57:55', '0000-00-00 00:00:00'),
(27, 'bundle1', '10pcs Violet PS', 'img/b1-violet.png', '10pcs Violet PS', 2000, '2022-12-01 15:57:55', '0000-00-00 00:00:00'),
(28, 'bundle1', '10pcs White PS', 'img/b1-white.png', '10pcs White PS', 2000, '2022-12-01 15:57:55', '0000-00-00 00:00:00'),

(29, 'bundle2', '10pcs Black RS', 'img/b2-black.png', '10pcs Black RS', 1750, '2022-12-01 15:57:55', '0000-00-00 00:00:00'),
(30, 'bundle2', '10pcs Blue RS', 'img/b2-blue.png', '10pcs Blue RS', 1750, '2022-12-01 15:57:55', '0000-00-00 00:00:00'),
(31, 'bundle2', '10pcs Green RS', 'img/b2-green.png', '10pcs Green RS', 1750, '2022-12-01 15:57:55', '0000-00-00 00:00:00'),
(32, 'bundle2', '10pcs Orange RS', 'img/b2-orange.png', '10pcs Orange RS', 1750, '2022-12-01 15:57:55', '0000-00-00 00:00:00'),
(33, 'bundle2', '10pcs Red RS', 'img/b2-red.png', '10pcs Red RS', 1750, '2022-12-01 15:57:55', '0000-00-00 00:00:00'),
(34, 'bundle2', '10pcs White RS', 'img/b2-white.png', '10pcs White RS', 1750, '2022-12-01 15:57:55', '0000-00-00 00:00:00'),
(35, 'bundle2', '10pcs Yellow RS', 'img/b2-yellow.png', '10pcs Yellow RS', 1750, '2022-12-01 15:57:55', '0000-00-00 00:00:00'),

(36, 'bundle3', '10pcs Black VN', 'img/b3-black.png', '10pcs Black VN', 1700, '2022-12-01 15:57:55', '0000-00-00 00:00:00'),
(37, 'bundle3', '10pcs Blue VN', 'img/b3-blue.png', '10pcs Blue VN', 1700, '2022-12-01 15:57:55', '0000-00-00 00:00:00'),
(38, 'bundle3', '10pcs Green VN', 'img/b3-green.png', '10pcs Green VN', 1700, '2022-12-01 15:57:55', '0000-00-00 00:00:00'),
(39, 'bundle3', '10pcs Orange VN', 'img/b3-orange.png', '10pcs Orange VN', 1700, '2022-12-01 15:57:55', '0000-00-00 00:00:00'),
(40, 'bundle3', '10pcs Red VN', 'img/b3-red.png', '10pcs Red VN', 1700, '2022-12-01 15:57:55', '0000-00-00 00:00:00'),
(41, 'bundle3', '10pcs Violet VN', 'img/b3-violet.png', '10pcs Violet VN', 1700, '2022-12-01 15:57:55', '0000-00-00 00:00:00'),
(42, 'bundle3', '10pcs White VN', 'img/b3-white.png', '10pcs White VN', 1700, '2022-12-01 15:57:55', '0000-00-00 00:00:00')


;

-- --------------------------------------------------------

--
-- Table structure for table `items_list`
--

CREATE TABLE IF NOT EXISTS `items_list` (
  `items_id` int(11) NOT NULL,
  `total_item_qty` int(11) NOT NULL,
  `discount` FLOAT NOT NULL,
  `tax_rate` FLOAT NOT NULL,
  KEY `fk_item_id` (`items_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items_list`
--

INSERT INTO `items_list` (`items_id`, `total_item_qty`, `discount`, `tax_rate`) VALUES
(1, 10, 0, 12),
(2, 10, 0, 12),
(3, 10, 0, 12),
(4, 10, 0, 12),
(5, 10, 0, 12),
(6, 10, 0, 12),
(7, 10, 0, 12),
(8, 10, 0, 12),
(9, 10, 0, 12),
(10, 10, 0, 12),
(11, 10, 0, 12),
(12, 10, 0, 12),
(13, 10, 0, 12),
(14, 10, 0, 12),
(15, 10, 0, 12),
(16, 10, 0, 12),
(17, 10, 0, 12),
(18, 10, 0, 12),
(19, 10, 0, 12),
(20, 10, 0, 12),
(21, 10, 0, 12),
(22, 10, 0, 12),
(23, 10, 0, 12),
(24, 10, 0, 12),
(25, 10, 0, 12),
(26, 10, 0, 12),
(27, 10, 0, 12),
(28, 10, 0, 12),
(29, 10, 0, 12),
(30, 10, 0, 12),
(31, 10, 0, 12),
(32, 10, 0, 12),
(33, 10, 0, 12),
(34, 10, 0, 12),
(35, 10, 0, 12),
(36, 10, 0, 12),
(37, 10, 0, 12),
(38, 10, 0, 12),
(39, 10, 0, 12),
(40, 10, 0, 12),
(41, 10, 0, 12),
(42, 10, 0, 12)
;
--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `paid_amt` FLOAT NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `fk_orders_emp` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE IF NOT EXISTS `orders_detail` (
  `orders_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `discount` FLOAT NOT NULL,
  `tax_rate` FLOAT NOT NULL,
  `item_id` int(11) NOT NULL,
  `order_qty` int(11) NOT NULL,
  `transaction_date` datetime NOT NULL,
  PRIMARY KEY (`orders_detail_id`),
  KEY `fk_od_orders` (`order_id`),
  KEY `fk_item_ord` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_detail`
--
--
-- Constraints for dumped tables
--

--
-- Constraints for table `items_list`
--
ALTER TABLE `items_list`
  ADD CONSTRAINT `fk_item_id` FOREIGN KEY (`items_id`) REFERENCES `items` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_emp` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD CONSTRAINT `fk_item_ord` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_od_orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;



CREATE TABLE emp_list (
    id INT(4) UNSIGNED ZEROFILL PRIMARY KEY AUTO_INCREMENT NOT NULL,
    emp_name VARCHAR(100),
    gender VARCHAR(50),
    bday DATE,
    natl VARCHAR(100),
    c_status VARCHAR(50),
    dept VARCHAR(100),
    desg VARCHAR(100),
    emp_status VARCHAR(100),
    date_added DATETIME DEFAULT CURRENT_TIMESTAMP,
    emp_img VARCHAR(100),
    last_updated DATETIME,
    tax_status VARCHAR(10)
);

INSERT INTO emp_list (id, emp_name, gender, bday, natl, c_status, dept, desg, emp_status, emp_img, tax_status) 
VALUES ('0001', 'Svet Jazmine Dio', 'female', '	2002-06-20', 'Philippine, Filipino', 'single', 'IT', 'Lead Developer', 'Regular', 'img/emp_image/pic.jpg', 'S');


CREATE TABLE IF NOT EXISTS `emp_payroll` (
  `payroll_id` INT NOT NULL AUTO_INCREMENT,
  `emp_id` INT(11) NOT NULL,
  `pay_date` DATETIME NULL,
  `bi_rate` FLOAT NULL,
  `bi_hrpercutoff` FLOAT NULL,
  `hi_rate` FLOAT NULL,
  `hi_hrpercutoff` FLOAT NULL,
  `oi_rate` FLOAT NULL,
  `oi_hrpercutoff` FLOAT NULL,
  `sss_contrib` FLOAT NULL,
  `philhealth_contrib` FLOAT NULL,
  `pagibig_contrib` FLOAT NULL,
  `income_tax` FLOAT NULL,
  `sss_loan` FLOAT NULL,
  `fsd` FLOAT NULL,
  `salary_loan` FLOAT NULL,
  `pagibig_loan` FLOAT NULL,
  `fsl` FLOAT NULL,
  `other_loans` FLOAT NULL,
  PRIMARY KEY (`payroll_id`),
  UNIQUE INDEX `UQ_emp_payroll_emp` (`emp_id` ASC, `pay_date` ASC)
)
ENGINE = InnoDB;

COMMIT;