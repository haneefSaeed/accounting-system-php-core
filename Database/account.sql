-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2024 at 03:22 PM
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
-- Database: `account`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `customer_email` varchar(100) DEFAULT NULL,
  `customer_phone` int(15) NOT NULL,
  `customer_job` varchar(100) DEFAULT NULL,
  `customer_address` varchar(220) DEFAULT NULL,
  `customer_note` varchar(220) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_email`, `customer_phone`, `customer_job`, `customer_address`, `customer_note`) VALUES
(24, 'James Kingston', 'james@aol.com', 975551550, 'Entrepreneur', 'Manchester, UK', 'No.'),
(25, 'hanif', 'king@king.com', 785555, 'Sales person', 'Dubai', 'No'),
(35, 'Lynda Carry', 'lynda@aol.com', 507291328, 'assistant', 'Downtown, Dubai', 'Notes.'),
(37, 'fsd', 'kljvld@ffggf.com', 34324, 'accountant', 'kabul', 'notesssss'),
(39, 'hanif', 'hanif.sayeedi@gmail.com', 0, 'sales', 'USA', 'good person :)');

-- --------------------------------------------------------

--
-- Table structure for table `inv_trans`
--

CREATE TABLE `inv_trans` (
  `trans_id` int(11) NOT NULL,
  `trans_type` enum('purchase','sale','on Hold','waste') DEFAULT NULL,
  `trans_created_date` date DEFAULT NULL,
  `trans_product_id` int(11) DEFAULT NULL,
  `trans_quantity` int(11) DEFAULT NULL,
  `trans_purchase_order_id` int(11) DEFAULT NULL,
  `trans_sales_order_id` int(11) DEFAULT NULL,
  `trans_comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inv_trans`
--

INSERT INTO `inv_trans` (`trans_id`, `trans_type`, `trans_created_date`, `trans_product_id`, `trans_quantity`, `trans_purchase_order_id`, `trans_sales_order_id`, `trans_comment`) VALUES
(1, 'sale', '2020-01-03', 16, 45, 68, NULL, NULL),
(2, 'purchase', '2020-01-03', 10, 3, 68, NULL, NULL),
(3, 'purchase', '2020-01-03', 7, 6, 67, NULL, NULL),
(4, 'sale', '2020-01-03', 10, 9, 66, NULL, NULL),
(5, 'purchase', '2020-01-03', 10, 9, 66, NULL, NULL),
(6, 'purchase', '2020-01-03', 10, 9, 66, NULL, NULL),
(7, 'purchase', '2020-01-03', 10, 5, 64, NULL, NULL),
(8, 'purchase', '2020-01-03', 10, 5, 64, NULL, NULL),
(9, 'purchase', '2020-01-03', 10, 9, 66, NULL, NULL),
(10, 'purchase', '2020-01-03', 10, 1, 70, NULL, NULL),
(11, 'purchase', '2020-01-03', 4, 20, 71, NULL, NULL),
(12, 'purchase', '2020-01-03', 16, 45, 68, NULL, NULL),
(14, 'purchase', '2020-01-04', 17, 4, 72, NULL, NULL),
(15, 'purchase', '2020-01-04', 4, 45, 72, NULL, NULL),
(16, 'purchase', '2020-01-04', 17, 3, 72, NULL, NULL),
(17, 'purchase', '2020-01-04', 4, 23, 68, NULL, NULL),
(18, 'purchase', '2020-01-05', 7, 33, 74, NULL, NULL),
(19, 'purchase', '2020-01-05', 7, 34, 65, NULL, NULL),
(20, 'purchase', '2020-01-11', 7, 23, 75, NULL, NULL),
(21, 'purchase', '2020-01-12', 4, 10, 76, NULL, NULL),
(22, 'purchase', '2020-01-12', 7, 3, 76, NULL, NULL),
(23, 'purchase', '2020-01-18', 10, 4, 72, NULL, NULL),
(24, 'purchase', '2020-01-19', 7, 2, 81, NULL, NULL),
(25, 'purchase', '2020-01-19', 17, 5, 81, NULL, NULL),
(26, 'purchase', '2022-04-06', 4, 3, 65, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_user_id` int(11) DEFAULT NULL,
  `order_cust_id` int(11) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `order_ship_date` date DEFAULT NULL,
  `order_ship_id` int(11) DEFAULT NULL,
  `order_shipm_name` varchar(220) DEFAULT NULL,
  `order_shipm_address` varchar(220) DEFAULT NULL,
  `order_shipm_phone` int(15) DEFAULT NULL,
  `order_shipm_fee` int(5) DEFAULT NULL,
  `order_pay_type` enum('cash','cheque') DEFAULT NULL,
  `order_pay_date` date NOT NULL,
  `order_pay_note` varchar(255) NOT NULL,
  `order_status` enum('new','invoiced','shipped','closed') DEFAULT NULL,
  `order_notes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_user_id`, `order_cust_id`, `order_date`, `order_ship_date`, `order_ship_id`, `order_shipm_name`, `order_shipm_address`, `order_shipm_phone`, `order_shipm_fee`, `order_pay_type`, `order_pay_date`, `order_pay_note`, `order_status`, `order_notes`) VALUES
(1, 4, 25, '2019-12-15', '2019-12-16', 2, 'Mr John doe', 'Microrayan 4, Kabul-Afghanistan', 299999392, 0, 'cash', '0000-00-00', '', 'new', 'Special delivery');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `od_id` int(11) NOT NULL,
  `od_order_id` int(11) DEFAULT NULL,
  `od_product_id` int(11) DEFAULT NULL,
  `od_quantity` int(10) DEFAULT NULL,
  `od_unit_price` int(10) DEFAULT NULL,
  `od_discount` int(10) DEFAULT NULL,
  `od_status_id` enum('None','allocated','invoiced','shipped','On order','no stock') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`od_id`, `od_order_id`, `od_product_id`, `od_quantity`, `od_unit_price`, `od_discount`, `od_status_id`) VALUES
(1, 1, 1, 1, 1000, 20, 'invoiced');

-- --------------------------------------------------------

--
-- Table structure for table `po_details`
--

CREATE TABLE `po_details` (
  `pod_id` int(11) NOT NULL,
  `pod_po_id` int(11) DEFAULT NULL,
  `pod_product_id` int(11) DEFAULT NULL,
  `pod_quantity` int(11) DEFAULT NULL,
  `pod_unit_cost` int(11) DEFAULT NULL,
  `pod_date_rec` date DEFAULT NULL,
  `pod_is_posted` enum('1','0') DEFAULT NULL,
  `pod_inventory_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `po_details`
--

INSERT INTO `po_details` (`pod_id`, `pod_po_id`, `pod_product_id`, `pod_quantity`, `pod_unit_cost`, `pod_date_rec`, `pod_is_posted`, `pod_inventory_id`) VALUES
(11, 1, 4, 2, 1000, NULL, NULL, NULL),
(12, 1, 7, 3, 144, NULL, NULL, NULL),
(13, 1, 4, 2, 1000, NULL, NULL, NULL),
(14, 1, 7, 3, 144, NULL, NULL, NULL),
(15, 5, 4, 23, 1000, NULL, NULL, NULL),
(27, 21, 4, 2, 1000, NULL, NULL, NULL),
(28, 21, 7, 3, 144, NULL, NULL, NULL),
(29, 21, 10, 4, 23, NULL, NULL, NULL),
(31, 25, 4, 5, 1000, NULL, NULL, NULL),
(32, 25, 16, 5, 34, NULL, NULL, NULL),
(36, 33, 4, 2, 1000, NULL, NULL, NULL),
(37, 33, 10, 3, 23, NULL, NULL, NULL),
(45, 49, 4, 2, 1000, NULL, NULL, NULL),
(50, 60, 4, 2, 1000, NULL, NULL, NULL),
(51, 60, 16, 3, 34, NULL, NULL, NULL),
(54, 63, 4, 1, 1000, NULL, NULL, NULL),
(55, 63, 7, 3, 144, NULL, NULL, NULL),
(56, 64, 4, 2, 1000, NULL, '1', NULL),
(57, 64, 10, 5, 23, NULL, NULL, NULL),
(58, 65, 7, 34, 144, '2020-01-05', '1', 19),
(59, 65, 4, 3, 1000, '2022-04-06', '1', 26),
(60, 66, 4, 9, 1000, NULL, NULL, NULL),
(61, 66, 10, 9, 23, '2020-01-03', '1', 9),
(62, 67, 7, 6, 144, NULL, '1', NULL),
(64, 68, 4, 23, 1000, '2020-01-04', '1', 17),
(65, 68, 10, 3, 23, NULL, NULL, NULL),
(66, 68, 16, 45, 34, '2020-01-03', '1', 12),
(67, 69, 19, 3, 10, '2020-01-04', '1', 13),
(68, 70, 10, 1, 23, '2020-01-03', '1', 10),
(69, 71, 4, 20, 1000, '2020-01-03', '1', 11),
(70, 72, 4, 32, 1000, NULL, NULL, NULL),
(71, 72, 7, 3, 144, NULL, NULL, NULL),
(72, 72, 10, 4, 23, '2020-01-18', '1', 23),
(73, 72, 4, 45, 4, '2020-01-04', '1', 15),
(74, 72, 17, 3, 200, '2020-01-04', '1', 16),
(75, 72, 17, 4, 0, NULL, NULL, NULL),
(76, 72, 17, 4, 0, '2020-01-04', '1', 14),
(78, 73, 4, 2, 1000, NULL, NULL, NULL),
(79, 73, 19, 23, 10, NULL, NULL, NULL),
(80, 74, 7, 33, 144, '2020-01-05', '1', 18),
(81, 74, 19, 3, 10, NULL, NULL, NULL),
(82, 75, 7, 23, 144, '2020-01-11', '1', 20),
(83, 75, 4, 5, 1000, NULL, NULL, NULL),
(84, 76, 4, 10, 1000, '2020-01-12', '1', 21),
(85, 76, 7, 3, 144, '2020-01-12', '1', 22),
(89, 80, 4, 1, 1000, NULL, NULL, NULL),
(90, 81, 7, 2, 144, '2020-01-19', '1', 24),
(91, 81, 17, 5, 200, '2020-01-19', '1', 25),
(92, 82, 7, 2, 144, NULL, NULL, NULL),
(93, 83, 7, 1, 144, NULL, NULL, NULL),
(94, 83, 10, 2, 23, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(222) DEFAULT NULL,
  `product_price` int(11) DEFAULT NULL,
  `product_supplier_id` int(11) NOT NULL,
  `product_category_id` int(11) DEFAULT NULL,
  `product_unit` varchar(22) DEFAULT NULL,
  `product_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_supplier_id`, `product_category_id`, `product_unit`, `product_description`) VALUES
(4, 'James Bond', 1000, 2, 5, 'TV', 'dskfa'),
(7, 'Dish Washer', 144, 2, 11, '', 'Washing machine'),
(10, 'Dress', 23, 2, 18, '12', 'dkfad'),
(16, 's7', 34, 4, 9, '', 'dsf\r\n'),
(17, 'Dell Laptop', 200, 5, 6, 'Box', '15inch\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `pro_category`
--

CREATE TABLE `pro_category` (
  `category_id` int(11) NOT NULL,
  `category_parent_id` int(11) DEFAULT NULL,
  `category_name` varchar(222) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pro_category`
--

INSERT INTO `pro_category` (`category_id`, `category_parent_id`, `category_name`) VALUES
(1, 0, 'All Records'),
(2, 0, 'Electronics'),
(3, 0, 'Smartphones'),
(4, 0, 'Household'),
(5, 2, 'Televisions'),
(6, 2, 'Computers'),
(9, 3, 'Galaxy'),
(11, 4, 'Kitchen ware'),
(12, 4, 'Garage Tools'),
(16, 0, 'Fashion'),
(17, 16, 'Mans Fashion'),
(18, 16, 'Woman Fashion'),
(20, 3, 'Apple'),
(21, 0, 'Bags'),
(22, 21, 'Travel Bags'),
(23, 0, 'Watches'),
(24, 23, 'Hublot'),
(25, 2, 'laptops'),
(26, 2, 'Tablets');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_orders`
--

CREATE TABLE `purchase_orders` (
  `po_id` int(11) NOT NULL,
  `po_supplier_id` int(11) DEFAULT NULL,
  `po_submitted_by` int(11) DEFAULT NULL,
  `po_submitted_date` date DEFAULT NULL,
  `po_status` enum('New','Submitted','Approved','Closed') DEFAULT NULL,
  `po_payment_date` date DEFAULT NULL,
  `po_payment_method` enum('cash','cheque','bank') DEFAULT NULL,
  `po_approved_by` int(11) DEFAULT NULL,
  `po_approved_date` date DEFAULT NULL,
  `po_notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_orders`
--

INSERT INTO `purchase_orders` (`po_id`, `po_supplier_id`, `po_submitted_by`, `po_submitted_date`, `po_status`, `po_payment_date`, `po_payment_method`, `po_approved_by`, `po_approved_date`, `po_notes`) VALUES
(51, 2, 4, '2019-12-31', 'Closed', '2019-12-31', '', 4, '2020-01-02', ''),
(52, 2, 4, '2019-12-31', 'Closed', '2019-12-31', '', 4, '2020-01-02', ''),
(53, 2, 4, '2019-12-31', 'Closed', '2019-12-31', '', 4, '2020-01-03', ''),
(54, 2, 4, '2019-12-31', 'Closed', '2019-12-31', '', 4, '0000-00-00', ''),
(55, 2, 4, '2019-12-31', 'Closed', '2019-12-31', '', 4, '2020-01-03', ''),
(56, 2, 4, '2019-12-31', 'Closed', '2019-12-31', '', 4, '2020-01-02', ''),
(57, 2, 4, '2019-12-31', 'Closed', '2019-12-31', '', 4, '2020-01-03', ''),
(58, 2, 4, '2019-12-31', 'Closed', '2019-12-31', '', 4, '2020-01-03', ''),
(59, 2, 4, '2019-12-31', 'Closed', '2019-12-31', '', 4, '2020-01-02', ''),
(60, 2, 4, '2019-12-31', 'Closed', '2019-12-31', 'cheque', 4, '2020-01-02', 'Order 60 2 products'),
(61, 2, 4, '2019-12-31', 'Closed', '2019-12-31', '', 4, '2020-01-02', ''),
(62, 2, 4, '2019-12-31', 'Closed', '2019-12-31', '', 4, '2019-12-31', ''),
(63, 2, 4, '2019-12-31', 'Approved', '2019-12-31', 'cash', 4, '2020-01-03', 'King on order 63 2 products\r\ncash payment'),
(64, 4, 4, '2020-01-01', 'Approved', '2020-01-01', 'cheque', 4, '2020-01-01', 'sdkfskdljf order 64'),
(65, 4, 2, '2020-01-02', 'Approved', '2020-01-02', 'cash', 4, '2020-01-05', 'dsfad'),
(66, 4, 4, '2020-01-03', 'Approved', '2020-01-14', 'cheque', 4, '2020-01-03', 'hjjkhkj'),
(67, 4, 2, '2020-01-03', 'Approved', NULL, NULL, 4, '2020-01-03', NULL),
(68, 4, 4, '2020-01-03', 'Approved', NULL, NULL, 4, '2020-01-03', NULL),
(69, 2, 4, '2020-01-03', 'Approved', NULL, NULL, 4, '2020-01-04', NULL),
(70, 4, 2, '2020-01-03', 'Closed', NULL, NULL, 4, '2020-01-03', NULL),
(71, 4, 4, '2020-01-03', 'Approved', NULL, NULL, 4, '2020-01-03', NULL),
(72, 5, 4, '2020-01-04', 'Approved', NULL, NULL, 4, '2020-01-04', NULL),
(73, 2, 4, '2020-01-05', 'Closed', NULL, NULL, NULL, '0000-00-00', NULL),
(74, 4, 2, '2020-01-05', 'Approved', NULL, NULL, 4, '2020-01-05', NULL),
(75, 5, 2, '2020-01-11', 'Approved', NULL, NULL, 4, '2020-01-11', NULL),
(76, 4, 2, '2020-01-12', 'Approved', NULL, NULL, 4, '2020-01-12', NULL),
(77, 2, 4, '2020-01-16', 'New', NULL, NULL, NULL, '0000-00-00', NULL),
(78, 2, 4, '2020-01-16', 'New', NULL, NULL, NULL, '0000-00-00', NULL),
(79, 2, 4, '2020-01-16', 'New', NULL, NULL, NULL, '0000-00-00', NULL),
(80, 2, 4, '2020-01-16', 'New', NULL, NULL, NULL, '0000-00-00', NULL),
(81, 4, 4, '2020-01-19', 'Closed', NULL, NULL, 4, '2020-01-19', NULL),
(82, 2, 2, '2022-02-07', 'New', NULL, NULL, NULL, '0000-00-00', NULL),
(83, 4, 2, '2022-04-06', 'New', NULL, NULL, NULL, '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `Set_ID` int(11) NOT NULL,
  `Set_Company_name` varchar(222) NOT NULL,
  `Set_Currency` varchar(5) NOT NULL,
  `Set_Currency_Symbol` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`Set_ID`, `Set_Company_name`, `Set_Currency`, `Set_Currency_Symbol`) VALUES
(1, 'My Company', 'USD', '$');

-- --------------------------------------------------------

--
-- Table structure for table `shipper`
--

CREATE TABLE `shipper` (
  `shipper_id` int(11) NOT NULL,
  `shipper_company` varchar(200) DEFAULT NULL,
  `shipper_name` varchar(200) DEFAULT NULL,
  `shipper_email` varchar(220) DEFAULT NULL,
  `shipper_job` varchar(220) DEFAULT NULL,
  `shipper_phone` int(15) DEFAULT NULL,
  `shipper_address` varchar(222) DEFAULT NULL,
  `shipper_note` varchar(222) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipper`
--

INSERT INTO `shipper` (`shipper_id`, `shipper_company`, `shipper_name`, `shipper_email`, `shipper_job`, `shipper_phone`, `shipper_address`, `shipper_note`) VALUES
(1, 'Farman Mehran Shipping', 'Mehran', 'farman@cargo.co', 'Manager', 2147483647, 'Bur Dubai', '-'),
(2, 'Sea Knot ', 'Mr. Kamran', 'kamran@seaknot.com', 'Manager', 394800342, 'Bur Dubai', '');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(100) DEFAULT NULL,
  `supplier_email` varchar(100) DEFAULT NULL,
  `supplier_phone` int(15) DEFAULT NULL,
  `supplier_job` varchar(220) DEFAULT NULL,
  `supplier_company` varchar(220) DEFAULT NULL,
  `supplier_address` varchar(220) DEFAULT NULL,
  `supplier_note` varchar(222) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `supplier_email`, `supplier_phone`, `supplier_job`, `supplier_company`, `supplier_address`, `supplier_note`) VALUES
(2, 'David Mcready', 'david@clag.info', 239432423, 'Sales Manager', 'Clag Barot', 'Illinios, Chicago, USA', 'Paper industry'),
(4, 'Mr. James Kingston', 'james@apple.com', 34343, 'Sales Manager', 'Apple', 'USA', ''),
(5, 'Mobin', 'email@emil.co', 32423, 'asdkjf', 'Dell', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_Id` int(3) NOT NULL,
  `User_Name` varchar(200) NOT NULL,
  `User_Email` varchar(200) NOT NULL,
  `User_Password` varchar(255) NOT NULL,
  `User_type` enum('Admin','User') NOT NULL,
  `User_Register_Date` date NOT NULL,
  `User_Last_Login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_Id`, `User_Name`, `User_Email`, `User_Password`, `User_type`, `User_Register_Date`, `User_Last_Login`) VALUES
(2, 'admin', 'admin@admin.com', '$2y$10$.pSHoEF1eaIZq3MQBN6wW.IOLNgbDBlUJpK4EHKQKie8YgEyIHvke', 'User', '2019-12-13', '2024-04-29 03:02:12'),
(4, 'Sabine', 'sabine@saby.com', '$2y$10$.pSHoEF1eaIZq3MQBN6wW.IOLNgbDBlUJpK4EHKQKie8YgEyIHvke', 'Admin', '2019-12-13', '2022-04-08 11:33:37'),
(10, '', '', '', '', '0000-00-00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `inv_trans`
--
ALTER TABLE `inv_trans`
  ADD PRIMARY KEY (`trans_id`),
  ADD KEY `trans_sales_order_id` (`trans_sales_order_id`),
  ADD KEY `trans_product_id` (`trans_product_id`),
  ADD KEY `trans_purchase_order_id` (`trans_purchase_order_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_cust_id` (`order_cust_id`),
  ADD KEY `order_ship_id` (`order_ship_id`),
  ADD KEY `order_user_id` (`order_user_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`od_id`),
  ADD KEY `od_order_id` (`od_order_id`),
  ADD KEY `od_product_id` (`od_product_id`);

--
-- Indexes for table `po_details`
--
ALTER TABLE `po_details`
  ADD PRIMARY KEY (`pod_id`),
  ADD KEY `pod_product_id` (`pod_product_id`),
  ADD KEY `pod_inventory_id` (`pod_inventory_id`),
  ADD KEY `pod_po_id` (`pod_po_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_category_id` (`product_category_id`),
  ADD KEY `product_supplier_id` (`product_supplier_id`);

--
-- Indexes for table `pro_category`
--
ALTER TABLE `pro_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD PRIMARY KEY (`po_id`),
  ADD KEY `purchase_orders_ibfk_3` (`po_approved_by`),
  ADD KEY `Supplier_fk` (`po_supplier_id`),
  ADD KEY `submit_fk` (`po_submitted_by`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`Set_ID`);

--
-- Indexes for table `shipper`
--
ALTER TABLE `shipper`
  ADD PRIMARY KEY (`shipper_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_Id`),
  ADD UNIQUE KEY `User_Name` (`User_Name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `inv_trans`
--
ALTER TABLE `inv_trans`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `od_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `po_details`
--
ALTER TABLE `po_details`
  MODIFY `pod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pro_category`
--
ALTER TABLE `pro_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  MODIFY `po_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `shipper`
--
ALTER TABLE `shipper`
  MODIFY `shipper_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inv_trans`
--
ALTER TABLE `inv_trans`
  ADD CONSTRAINT `inv_trans_ibfk_1` FOREIGN KEY (`trans_sales_order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `inv_trans_ibfk_2` FOREIGN KEY (`trans_sales_order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `inv_trans_ibfk_3` FOREIGN KEY (`trans_product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `inv_trans_ibfk_4` FOREIGN KEY (`trans_purchase_order_id`) REFERENCES `purchase_orders` (`po_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`order_user_id`) REFERENCES `users` (`User_Id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`order_cust_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`order_ship_id`) REFERENCES `shipper` (`shipper_id`),
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`order_user_id`) REFERENCES `users` (`User_Id`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`od_order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`od_order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_detail_ibfk_3` FOREIGN KEY (`od_product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `po_details`
--
ALTER TABLE `po_details`
  ADD CONSTRAINT `po_details_ibfk_2` FOREIGN KEY (`pod_product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `po_details_ibfk_3` FOREIGN KEY (`pod_inventory_id`) REFERENCES `inv_trans` (`trans_id`),
  ADD CONSTRAINT `po_details_ibfk_4` FOREIGN KEY (`pod_po_id`) REFERENCES `purchase_orders` (`po_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`product_category_id`) REFERENCES `pro_category` (`category_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`product_supplier_id`) REFERENCES `supplier` (`supplier_id`);

--
-- Constraints for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD CONSTRAINT `Supplier_fk` FOREIGN KEY (`po_supplier_id`) REFERENCES `supplier` (`supplier_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `submit_fk` FOREIGN KEY (`po_submitted_by`) REFERENCES `users` (`User_Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
