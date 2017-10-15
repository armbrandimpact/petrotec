-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2017 at 11:56 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petrotec`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachment`
--

CREATE TABLE `attachment` (
  `id` int(11) NOT NULL,
  `refid` int(11) NOT NULL,
  `type` enum('cv','contract','product') NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attachment`
--

INSERT INTO `attachment` (`id`, `refid`, `type`, `url`) VALUES
(3, 1, 'contract', 'logo-06.png'),
(4, 1, 'cv', 'logo-10.png'),
(5, 2, 'cv', 'logo-08.png'),
(6, 2, 'product', 'Arena.png');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryname` text NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryname`, `parent`) VALUES
(1, 'cat1', 0),
(2, 'sub_cat1', 3),
(3, 'cat2', 0),
(4, 'sucat2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` text NOT NULL,
  `company_phone` varchar(255) NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `company_logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`, `company_phone`, `company_address`, `company_logo`) VALUES
(1, 'company1', '', '', ''),
(2, 'company2', '', '', ''),
(3, 'company3', '', '', ''),
(4, 'company4', '', '', ''),
(5, 'company5', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `title` varchar(10) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `fax` text NOT NULL,
  `company` text NOT NULL,
  `mobile` text NOT NULL,
  `billingaddress` text NOT NULL,
  `notes` text NOT NULL,
  `city` text NOT NULL,
  `country` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `title`, `fname`, `lname`, `email`, `phone`, `fax`, `company`, `mobile`, `billingaddress`, `notes`, `city`, `country`) VALUES
(2, 'Mr.', 'asd', 'dsa', 'asd@as.com', '1231', '213', 'asda', '123', 'asdjkll', 'dasdasd', 'dubai', 'uae'),
(3, 'Mr.', 'second Customer', 'second', 'asd@as.com', '23223232', '213', 'asda', '123', 'asdjkll', 'dasdasd', 'dubai', 'uae');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `companyid` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `visa_status` text NOT NULL,
  `emirates_id` int(11) NOT NULL,
  `designation` text NOT NULL,
  `department` text NOT NULL,
  `employeecode` text NOT NULL,
  `dob` date NOT NULL,
  `emirates_expiry` date NOT NULL,
  `address` text NOT NULL,
  `drivinglisence` text NOT NULL,
  `drivinglisence_expiry` date NOT NULL,
  `passport_no` text NOT NULL,
  `passport_expiration` date NOT NULL,
  `allowance` text NOT NULL,
  `visa_expiry` date NOT NULL,
  `sick_leaves` int(11) NOT NULL,
  `paid_leaves` int(11) NOT NULL,
  `annual_leaves` int(11) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `maternity_leaves` int(11) NOT NULL,
  `notice_period` int(11) NOT NULL,
  `joining_date` date NOT NULL,
  `status` enum('hiring','shortlist','hired') NOT NULL,
  `salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `companyid`, `title`, `firstname`, `lastname`, `email`, `phone`, `visa_status`, `emirates_id`, `designation`, `department`, `employeecode`, `dob`, `emirates_expiry`, `address`, `drivinglisence`, `drivinglisence_expiry`, `passport_no`, `passport_expiration`, `allowance`, `visa_expiry`, `sick_leaves`, `paid_leaves`, `annual_leaves`, `gender`, `maternity_leaves`, `notice_period`, `joining_date`, `status`, `salary`) VALUES
(1, 1, 'mr.', 'fname', 'lname', 'email', '12332121312', 'visit', 0, '', 'dep', 'empcode', '2017-08-09', '2017-08-23', 'adress', '', '0000-00-00', 'passport', '2017-08-07', '0', '2017-08-07', 123, 43, 36, 'female', 0, 0, '2017-08-22', 'shortlist', 2017),
(2, 3, '', 'Ali', 'Raza', '', '', 'visit', 0, 'Engineer', 'Software', '123', '1991-05-04', '0000-00-00', 'asdjlajdklasd', '', '0000-00-00', 'bp012321', '2017-08-29', '0', '2017-08-31', 3, 5, 30, 'male', 30, 0, '2017-08-30', 'hiring', 50000),
(3, 1, 'mr.', 'fname2', 'lname2', 'email2', '123321213122', 'visit', 0, '', 'dep', 'empcode', '2017-08-09', '2017-08-23', 'adress', '', '0000-00-00', 'passport', '2017-08-07', '0', '2017-08-07', 123, 43, 36, 'female', 0, 0, '2017-08-22', 'shortlist', 2017),
(4, 2, '', 'Michael', 'Jordan', '', '', 'visit', 0, 'Engineer', 'Software', '123', '1991-05-04', '0000-00-00', 'asdjlajdklasd', '', '0000-00-00', 'bp012321', '2017-08-29', '0', '2017-08-31', 3, 5, 30, 'male', 30, 0, '2017-08-30', 'hiring', 50000),
(5, 5, '', 'test', 'test', 'test', '23423', 'employeed', 0, 'test', 'test', 't32', '1991-04-21', '2019-03-13', 'Address 33', 'test322', '0000-00-00', 'ssr233', '2019-06-14', '0', '2019-01-05', 0, 0, 0, 'male', 1, 0, '2017-12-15', 'shortlist', 3333);

-- --------------------------------------------------------

--
-- Table structure for table `installment`
--

CREATE TABLE `installment` (
  `id` int(11) NOT NULL,
  `salesid` int(11) NOT NULL,
  `paid` int(11) NOT NULL,
  `date` date NOT NULL,
  `next_installment` date NOT NULL,
  `status` enum('pending','finish') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `installment`
--

INSERT INTO `installment` (`id`, `salesid`, `paid`, `date`, `next_installment`, `status`) VALUES
(4, 7, 18, '2017-10-07', '0000-00-00', 'finish'),
(5, 8, 17, '2017-10-06', '2017-10-07', 'pending'),
(6, 9, 2000, '2017-10-10', '0000-00-00', 'finish'),
(7, 10, 9, '2017-10-17', '0000-00-00', 'finish'),
(8, 12, 24, '2017-10-11', '0000-00-00', 'pending'),
(9, 13, 34, '2017-10-12', '0000-00-00', 'finish'),
(10, 14, 20, '2017-10-07', '2017-10-21', 'pending'),
(11, 15, 15, '2017-10-14', '2017-10-28', 'pending'),
(12, 20, 50, '2017-10-10', '2017-10-25', 'pending'),
(13, 82, 50, '2017-10-15', '2017-10-22', 'pending'),
(14, 83, 66, '2017-10-19', '2017-10-21', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `companyid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `productid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `companyid`, `qty`, `productid`) VALUES
(1, 1, 91, 1),
(2, 2, 100, 2),
(3, 3, 100, 1),
(4, 4, 100, 1),
(5, 5, 100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `created_date` date NOT NULL,
  `code` int(11) NOT NULL,
  `note` text NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `pcatid` int(11) NOT NULL,
  `ccatid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `created_date`, `code`, `note`, `supplier_id`, `pcatid`, `ccatid`) VALUES
(1, 'asd', 'asdas', '0000-00-00', 0, 'dasdas', 1, 1, 4),
(2, 'product 2', 'asdas', '2017-09-29', 123, 'asdasd', 2, 1, 4),
(3, 'product3', 'asdas', '2017-09-29', 1233, 'asdasd3', 2, 1, 4),
(4, 'product 67', 'asdas 2', '0000-00-00', 0, 'dasdas 2', 1, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `today` date NOT NULL,
  `department` varchar(255) NOT NULL,
  `doc_number` varchar(255) NOT NULL,
  `end_user` int(11) NOT NULL,
  `request_name` varchar(255) NOT NULL,
  `request_department` varchar(255) NOT NULL,
  `request_section` varchar(255) NOT NULL,
  `request_employee_initials` varchar(255) NOT NULL,
  `request_job_title` varchar(255) NOT NULL,
  `request_emergency_leave` tinyint(1) NOT NULL,
  `request_maternity_leave` tinyint(1) NOT NULL,
  `request_funeral_leave` tinyint(1) NOT NULL,
  `request_annual_leave` tinyint(1) NOT NULL,
  `request_personal_leave` tinyint(1) NOT NULL,
  `request_other` varchar(255) NOT NULL,
  `request_other_text` varchar(255) NOT NULL,
  `request_from` date NOT NULL,
  `request_to` date NOT NULL,
  `request_number_days` varchar(255) NOT NULL,
  `request_reason` text NOT NULL,
  `request_doctor_yes` tinyint(1) NOT NULL,
  `request_doctor_no` tinyint(1) NOT NULL,
  `request_clinic_name` varchar(255) NOT NULL,
  `request_department_head_clearance_only` tinyint(1) NOT NULL,
  `request_full_clearance_required` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `today`, `department`, `doc_number`, `end_user`, `request_name`, `request_department`, `request_section`, `request_employee_initials`, `request_job_title`, `request_emergency_leave`, `request_maternity_leave`, `request_funeral_leave`, `request_annual_leave`, `request_personal_leave`, `request_other`, `request_other_text`, `request_from`, `request_to`, `request_number_days`, `request_reason`, `request_doctor_yes`, `request_doctor_no`, `request_clinic_name`, `request_department_head_clearance_only`, `request_full_clearance_required`) VALUES
(1, '0000-00-00', '', 'HR-DOC-004', 0, 'asd', 'Department', 'Section', 'EI', 'Software', 1, 1, 1, 1, 1, '1', '', '2017-09-07', '2017-09-18', '10', 'reason', 1, 0, '1', 0, 1),
(2, '2017-09-29', 'Software', 'HR-DOC-004', 0, 'Name', 'Department', 'Section', 'EI', 'Software', 0, 0, 0, 0, 0, '0', '', '0000-00-00', '0000-00-00', '', '', 0, 0, '0', 0, 0),
(3, '2017-10-01', 'Software', 'HR-DOC-004', 0, 'test', 'test', 'tests', 'te', 'test', 1, 0, 1, 0, 1, '0', '', '1900-11-16', '1900-12-21', '99', 'test test', 1, 0, 'etssss', 1, 0),
(4, '2017-10-01', 'Software', 'HR-DOC-004', 0, 'John', 'HR', 'Software', 'SE', 'Job Title', 1, 0, 1, 0, 0, '0', '', '2017-10-31', '2017-11-30', '30', 'Test reason', 1, 0, 'Hospital Name', 1, 0),
(5, '2017-10-01', '4', 'HR-DOC-004', 4, '', '', '', '', '', 0, 0, 0, 0, 0, '1', '', '0000-00-00', '0000-00-00', '', '', 0, 0, '', 0, 0),
(6, '2017-10-01', '4', 'HR-DOC-004', 3, 'Test Surname', '', '', 'te', 'Job Title', 0, 0, 0, 0, 0, '0', 'test', '0000-00-00', '0000-00-00', '', '', 1, 0, '', 0, 0),
(7, '2017-10-01', '4', 'HR-DOC-004', 3, 'y', '', '', '', '', 0, 0, 0, 0, 0, '0', '0', '2017-10-02', '2017-10-05', '', '', 0, 0, '', 0, 0),
(8, '2017-10-08', 'dep', 'HR-DOC-003', 3, 'test', 'test', 'ets', 'test', 'test', 1, 0, 1, 0, 1, '0', '0', '2017-10-13', '2017-10-31', '33', 'teset', 1, 0, '', 1, 0),
(9, '2017-10-08', 'dep', 'HR-DOC-003', 5, 'test', 'test', 'ets', 'test', 'test', 1, 0, 1, 0, 1, '0', '0', '2017-10-13', '2017-10-31', '33', 'teset', 1, 0, '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `customerid` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `date` date NOT NULL,
  `updated_date` date NOT NULL,
  `companyid` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`customerid`, `employee_id`, `date_created`, `date`, `updated_date`, `companyid`, `id`) VALUES
(2, 1, '2017-10-05', '2017-10-06', '0000-00-00', 1, 7),
(2, 1, '2017-10-05', '2017-10-05', '0000-00-00', 1, 8),
(3, 1, '2017-10-05', '2017-10-10', '0000-00-00', 1, 9),
(3, 1, '2017-10-05', '2017-10-07', '0000-00-00', 1, 10),
(3, 1, '2017-10-05', '2017-10-11', '0000-00-00', 1, 11),
(3, 1, '2017-10-05', '2017-10-11', '0000-00-00', 1, 12),
(3, 1, '2017-10-05', '2017-10-12', '0000-00-00', 1, 13),
(2, 1, '2017-10-05', '2017-10-06', '0000-00-00', 1, 14),
(3, 3, '2017-10-05', '2017-10-07', '0000-00-00', 1, 15),
(3, 4, '2017-10-06', '2017-10-07', '0000-00-00', 2, 20),
(3, 4, '2017-10-06', '2017-10-07', '0000-00-00', 2, 82),
(2, 3, '2017-10-08', '2017-10-07', '0000-00-00', 1, 83);

-- --------------------------------------------------------

--
-- Table structure for table `sales_history`
--

CREATE TABLE `sales_history` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales_history`
--

INSERT INTO `sales_history` (`id`, `sales_id`, `date`, `amount`) VALUES
(2, 83, '2017-10-09', 5),
(3, 8, '2017-10-09', 1),
(4, 8, '2017-10-09', 1),
(5, 14, '2017-10-11', 5),
(6, 14, '2017-10-11', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sales_item`
--

CREATE TABLE `sales_item` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales_item`
--

INSERT INTO `sales_item` (`id`, `sales_id`, `productid`, `qty`, `price`) VALUES
(8, 7, 1, 3, 3),
(9, 7, 2, 3, 3),
(10, 8, 1, 3, 3),
(11, 8, 2, 3, 3),
(12, 9, 1, 10, 100),
(13, 9, 2, 10, 100),
(14, 10, 1, 3, 3),
(15, 10, 2, 3, 3),
(16, 11, 1, 3, 3),
(17, 11, 2, 4, 4),
(18, 12, 1, 3, 3),
(19, 12, 2, 4, 4),
(20, 13, 1, 3, 3),
(21, 13, 2, 3, 3),
(22, 13, 3, 4, 4),
(23, 14, 1, 3, 3),
(24, 14, 2, 3, 3),
(25, 14, 4, 3, 3),
(26, 15, 1, 3, 3),
(27, 15, 2, 3, 3),
(28, 15, 3, 4, 4),
(29, 20, 2, 10, 10),
(30, 82, 2, 10, 10),
(31, 83, 1, 9, 1),
(32, 83, 2, 5, 2),
(33, 83, 3, 9, 5),
(34, 83, 4, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `company` text NOT NULL,
  `shipping_adddress` text NOT NULL,
  `company_address` text NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `title`, `fname`, `lname`, `email`, `phone`, `company`, `shipping_adddress`, `company_address`, `notes`) VALUES
(1, 'Mrs.', 'asds', 'asd', 'asd', 'asd', 'asd', 'asda', 'asds', 'sdasssa'),
(2, '', 'f2', 'f2', 'f2', 'f2', 'f2', '2', 'f', 'as');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `companyid` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` text NOT NULL,
  `visa_status` text NOT NULL,
  `emirates_id` int(11) NOT NULL,
  `designation` text NOT NULL,
  `department` text NOT NULL,
  `employeecode` text NOT NULL,
  `dob` date NOT NULL,
  `emirates_expiry` date NOT NULL,
  `address` text NOT NULL,
  `drivinglisence` text NOT NULL,
  `drivinglisence_expiry` date NOT NULL,
  `passport_no` text NOT NULL,
  `passport_expiration` date NOT NULL,
  `allowance` text NOT NULL,
  `visa_expiry` date NOT NULL,
  `sick_leaves` int(11) NOT NULL,
  `paid_leaves` int(11) NOT NULL,
  `annual_leaves` int(11) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `maternity_leaves` int(11) NOT NULL,
  `notice_period` int(11) NOT NULL,
  `joining_date` date NOT NULL,
  `status` enum('hiring','shortlist','hired') NOT NULL,
  `salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `companyid`, `title`, `firstname`, `lastname`, `email`, `password`, `phone`, `visa_status`, `emirates_id`, `designation`, `department`, `employeecode`, `dob`, `emirates_expiry`, `address`, `drivinglisence`, `drivinglisence_expiry`, `passport_no`, `passport_expiration`, `allowance`, `visa_expiry`, `sick_leaves`, `paid_leaves`, `annual_leaves`, `gender`, `maternity_leaves`, `notice_period`, `joining_date`, `status`, `salary`) VALUES
(1, 1, 'mr.', 'fname', 'lname', 'email', '', '12332121312', 'visit', 0, '', 'dep', 'empcode', '2017-08-09', '2017-08-23', 'adress', '', '0000-00-00', 'passport', '2017-08-07', '0', '2017-08-07', 123, 43, 36, 'female', 0, 0, '2017-08-22', 'shortlist', 2017),
(2, 3, '', 'Ali', 'Raza', '', '', '', 'visit', 0, 'Engineer', 'Software', '123', '1991-05-04', '0000-00-00', 'asdjlajdklasd', '', '0000-00-00', 'bp012321', '2017-08-29', '0', '2017-08-31', 3, 5, 30, 'male', 30, 0, '2017-08-30', 'hiring', 50000),
(4, 1, 'mr.', 'Abakan', 'Marazhapov', 'abakano21@gmail.com', '$2y$10$DIFnk1hekBiuXGgcv4VhS.0VpoFIx8ut4fttxq8qiG6M4N30pyKEu', '0558210420', 'visit', 0, '', 'Software', '', '1991-04-21', '0000-11-30', '', '', '0000-00-00', '', '0000-00-00', '0', '0000-00-00', 0, 0, 0, 'male', 0, 0, '0000-00-00', 'hiring', 5500),
(7, 0, '', 'test', '', 'test@gmail.com', '$2y$10$DIFnk1hekBiuXGgcv4VhS.0VpoFIx8ut4fttxq8qiG6M4N30pyKEu', '', '', 0, '', '', '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', 0, 0, 0, 'male', 0, 0, '0000-00-00', 'hiring', 0),
(8, 0, '', 'test', 'jjj', 'test@gmail.com', '$2y$10$QwBAUetp9m.PEbRwWrekk.1t8LcYBKspjgMMF.Iy/voryNrIFtwsi', '+9966552244', '', 0, '', '', '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', 0, 0, 0, 'male', 0, 0, '0000-00-00', 'hiring', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachment`
--
ALTER TABLE `attachment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `installment`
--
ALTER TABLE `installment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_history`
--
ALTER TABLE `sales_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_item`
--
ALTER TABLE `sales_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attachment`
--
ALTER TABLE `attachment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `installment`
--
ALTER TABLE `installment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `sales_history`
--
ALTER TABLE `sales_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sales_item`
--
ALTER TABLE `sales_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
