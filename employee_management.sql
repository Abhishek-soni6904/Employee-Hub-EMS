-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2025 at 05:25 PM
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
-- Database: `employee_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2b$12$ZUXh3ZgX8aaFaQ3o8LzI2.PzUmg1QxNtmPAP4HyGpOurIGCNiIQ9m');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `hire_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `role`, `department`, `salary`, `hire_date`) VALUES
(16, 'Michael Martine', 'mmartinez@company.com', 'Sales', 'Marketing', 96015.00, '2024-05-21'),
(17, 'James Martinez', 'jmartinez@company.com', 'Sales', 'Marketing', 64000.00, '2022-07-14'),
(18, 'Lisa Brown', 'lbrown@company.com', 'HR', 'Engineering', 44500.00, '2024-11-01'),
(19, 'Michael Rodriguez', 'mrodriguez@company.com', 'Manager', 'Finance', 91500.00, '2023-08-17'),
(20, 'Michael Brown', 'mbrown@company.com', 'Support', 'HR', 34500.00, '2023-09-15'),
(21, 'John Garcia', 'jgarcia@company.com', 'Developer', 'Marketing', 90500.00, '2022-07-10'),
(22, 'James Brown', 'jbrown@company.com', 'Manager', 'HR', 106500.00, '2020-07-18'),
(23, 'David Garcia', 'dgarcia@company.com', 'HR', 'Finance', 81500.00, '2020-08-31'),
(24, 'Michael Brown', 'mbrown@company.com', 'Sales', 'Sales', 78500.00, '2022-04-19'),
(25, 'Lisa Williams', 'lwilliams@company.com', 'Developer', 'Finance', 67500.00, '2023-03-01'),
(26, 'Lisa Brown', 'lbrown@company.com', 'Sales', 'Finance', 110500.00, '2021-08-07'),
(27, 'David Davis', 'ddavis@company.com', 'Manager', 'Engineering', 114500.00, '2023-01-26'),
(28, 'Lisa Rodriguez', 'lrodriguez@company.com', 'Sales', 'Engineering', 36500.00, '2022-03-10'),
(29, 'Jane Garcia', 'jgarcia@company.com', 'HR', 'HR', 48500.00, '2024-11-13'),
(30, 'Emily Rodriguez', 'erodriguez@company.com', 'Sales', 'Marketing', 59000.00, '2023-02-24'),
(31, 'Emily Jones', 'ejones@company.com', 'Developer', 'HR', 52000.00, '2021-09-23'),
(32, 'James Jones', 'jjones@company.com', 'HR', 'Marketing', 111000.00, '2021-06-28'),
(33, 'Lisa Smith', 'lsmith@company.com', 'Sales', 'Sales', 71500.00, '2020-11-25'),
(34, 'John Davis', 'jdavis@company.com', 'Manager', 'Sales', 76500.00, '2023-08-24'),
(35, 'James Davis', 'jdavis@company.com', 'Support', 'Marketing', 43500.00, '2023-02-25'),
(36, 'John Brown', 'jbrown@company.com', 'Sales', 'Engineering', 56500.00, '2023-11-13'),
(37, 'Robert Martinez', 'rmartinez@company.com', 'HR', 'Finance', 106000.00, '2024-04-04'),
(38, 'Jane Jones', 'jjones@company.com', 'Support', 'Finance', 94500.00, '2020-12-05'),
(39, 'Michael Garcia', 'mgarcia@company.com', 'Developer', 'HR', 59000.00, '2021-02-23'),
(40, 'David Davis', 'ddavis@company.com', 'Manager', 'Marketing', 40500.00, '2022-12-24'),
(41, 'Jane Smith', 'jsmith@company.com', 'HR', 'Sales', 33000.00, '2023-04-26'),
(42, 'John Martinez', 'jmartinez@company.com', 'Support', 'Marketing', 105500.00, '2020-10-16'),
(43, 'Lisa Williams', 'lwilliams@company.com', 'Developer', 'Sales', 81000.00, '2022-04-15'),
(44, 'David Garcia', 'dgarcia@company.com', 'Support', 'Finance', 75000.00, '2022-01-23'),
(45, 'James Williams', 'jwilliams@company.com', 'Developer', 'Marketing', 100000.00, '2021-02-16'),
(46, 'David Jones', 'djones@company.com', 'Support', 'Sales', 48000.00, '2022-05-15'),
(47, 'Lisa Williams', 'lwilliams@company.com', 'HR', 'Marketing', 83000.00, '2021-09-11'),
(48, 'Michael Williams', 'mwilliams@company.com', 'HR', 'Sales', 108000.00, '2023-12-18'),
(49, 'Robert Jones', 'rjones@company.com', 'Developer', 'HR', 99000.00, '2022-04-06'),
(50, 'Jane Garcia', 'jgarcia@company.com', 'Support', 'Marketing', 110500.00, '2021-07-09'),
(51, 'James Williams', 'jwilliams@company.com', 'Support', 'Finance', 76000.00, '2020-10-19'),
(52, 'Michael Martinez', 'mmartinez@company.com', 'Manager', 'Sales', 70000.00, '2022-04-27'),
(53, 'Lisa Williams', 'lwilliams@company.com', 'Manager', 'Engineering', 64500.00, '2021-07-26'),
(54, 'Jane Miller', 'jmiller@company.com', 'HR', 'Sales', 94500.00, '2024-12-10'),
(55, 'Michael Jones', 'mjones@company.com', 'Sales', 'Sales', 34000.00, '2023-10-23'),
(56, 'Jane Garcia', 'jgarcia@company.com', 'Support', 'Finance', 59000.00, '2023-07-20'),
(57, 'Sarah Martinez', 'smartinez@company.com', 'Developer', 'Finance', 41500.00, '2023-05-09'),
(58, 'Robert Brown', 'rbrown@company.com', 'HR', 'Finance', 84500.00, '2023-02-07'),
(59, 'Michael Martinez', 'mmartinez@company.com', 'HR', 'HR', 48000.00, '2023-11-05'),
(60, 'Emma Davis', 'edavis@company.com', 'Manager', 'Sales', 68500.00, '2020-12-03'),
(61, 'Jane Martinez', 'jmartinez@company.com', 'HR', 'Engineering', 61500.00, '2021-01-15'),
(62, 'Michael Rodriguez', 'mrodriguez@company.com', 'Developer', 'HR', 50500.00, '2020-11-16'),
(63, 'Emily Johnson', 'ejohnson@company.com', 'Manager', 'HR', 105000.00, '2021-03-27'),
(64, 'James Brown', 'jbrown@company.com', 'Manager', 'Finance', 43000.00, '2020-10-04'),
(65, 'Robert Rodriguez', 'rrodriguez@company.com', 'Developer', 'Sales', 47500.00, '2020-12-01'),
(66, 'David Garcia', 'dgarcia@company.com', 'Sales', 'Engineering', 36000.00, '2020-08-08'),
(67, 'Robert Martinez', 'rmartinez@company.com', 'Sales', 'Finance', 63000.00, '2022-12-19'),
(68, 'Jane Smith', 'jsmith@company.com', 'Support', 'Finance', 93500.00, '2020-06-10'),
(69, 'Michael Jones', 'mjones@company.com', 'Developer', 'Sales', 115000.00, '2021-10-01'),
(70, 'Sarah Miller', 'smiller@company.com', 'Support', 'Finance', 31500.00, '2024-01-17'),
(71, 'Emily Jones', 'ejones@company.com', 'HR', 'Engineering', 71000.00, '2020-04-15'),
(72, 'Lisa Brown', 'lbrown@company.com', 'Manager', 'Engineering', 114500.00, '2023-08-04'),
(73, 'Emma Davis', 'edavis@company.com', 'Manager', 'HR', 114000.00, '2024-06-14'),
(74, 'James Davis', 'jdavis@company.com', 'Manager', 'HR', 84000.00, '2020-02-08'),
(75, 'Emma Jones', 'ejones@company.com', 'Sales', 'Marketing', 57000.00, '2024-01-15'),
(76, 'Michael Smith', 'msmith@company.com', 'Developer', 'HR', 112000.00, '2023-05-04'),
(77, 'Emma Martinez', 'emartinez@company.com', 'Sales', 'Marketing', 69500.00, '2020-05-16'),
(78, 'Lisa Brown', 'lbrown@company.com', 'Developer', 'Sales', 100500.00, '2022-03-18'),
(79, 'Emily Johnson', 'ejohnson@company.com', 'Developer', 'Sales', 102000.00, '2021-07-17'),
(80, 'Lisa Brown', 'lbrown@company.com', 'Developer', 'Sales', 85500.00, '2020-03-31'),
(81, 'James Martinez', 'jmartinez@company.com', 'Support', 'Finance', 73500.00, '2023-02-24'),
(82, 'David Williams', 'dwilliams@company.com', 'Developer', 'Sales', 97000.00, '2023-05-17'),
(83, 'Emma Rodriguez', 'erodriguez@company.com', 'Sales', 'Finance', 76500.00, '2023-08-28'),
(84, 'James Jones', 'jjones@company.com', 'Developer', 'Finance', 75000.00, '2023-03-02'),
(85, 'Emily Jones', 'ejones@company.com', 'Manager', 'Marketing', 85000.00, '2025-01-28'),
(86, 'Emily Brown', 'ebrown@company.com', 'Sales', 'HR', 116000.00, '2022-12-22'),
(87, 'Michael Martinez', 'mmartinez@company.com', 'Support', 'HR', 88500.00, '2024-10-25'),
(88, 'Jane Garcia', 'jgarcia@company.com', 'Manager', 'Sales', 81500.00, '2023-11-10'),
(89, 'James Williams', 'jwilliams@company.com', 'Sales', 'Marketing', 112500.00, '2024-08-07'),
(90, 'David Brown', 'dbrown@company.com', 'HR', 'Sales', 118000.00, '2020-04-13'),
(91, 'Michael Smith', 'msmith@company.com', 'Support', 'Sales', 62500.00, '2021-03-25'),
(92, 'Jane Brown', 'jbrown@company.com', 'Developer', 'HR', 120000.00, '2024-11-02'),
(93, 'John Garcia', 'jgarcia@company.com', 'Manager', 'Marketing', 78000.00, '2021-08-18'),
(94, 'John Brown', 'jbrown@company.com', 'Sales', 'Finance', 44000.00, '2021-08-04'),
(95, 'David Johnson', 'djohnson@company.com', 'Manager', 'Sales', 117500.00, '2024-01-07'),
(96, 'John Williams', 'jwilliams@company.com', 'Sales', 'Marketing', 34000.00, '2024-02-25'),
(97, 'Lisa Martinez', 'lmartinez@company.com', 'Developer', 'Marketing', 78000.00, '2024-09-22'),
(98, 'Sarah Williams', 'swilliams@company.com', 'Support', 'Marketing', 86500.00, '2024-12-18'),
(99, 'James Williams', 'jwilliams@company.com', 'Support', 'Engineering', 70500.00, '2023-09-23'),
(100, 'Sarah Davis', 'sdavis@company.com', 'Manager', 'Marketing', 45500.00, '2022-07-07'),
(101, 'Robert Williams', 'rwilliams@company.com', 'Sales', 'Finance', 39500.00, '2022-07-14'),
(102, 'Jane Davis', 'jdavis@company.com', 'Support', 'Engineering', 30500.00, '2020-12-25'),
(103, 'Michael Johnson', 'mjohnson@company.com', 'HR', 'HR', 41500.00, '2023-05-25'),
(104, 'Emma Smith', 'esmith@company.com', 'Support', 'Finance', 63000.00, '2023-04-25'),
(105, 'Lisa Williams', 'lwilliams@company.com', 'Support', 'Sales', 56000.00, '2020-07-20'),
(106, 'David Brown', 'dbrown@company.com', 'Developer', 'Sales', 77000.00, '2024-05-10'),
(107, 'Sarah Davis', 'sdavis@company.com', 'Support', 'HR', 99500.00, '2020-06-30'),
(108, 'John Jones', 'jjones@company.com', 'Developer', 'Engineering', 106500.00, '2022-08-06'),
(109, 'Michael Rodriguez', 'mrodriguez@company.com', 'HR', 'HR', 55000.00, '2023-09-13'),
(110, 'James Brown', 'jbrown@company.com', 'HR', 'Sales', 116000.00, '2023-09-26'),
(111, 'James Davis', 'jdavis@company.com', 'Manager', 'HR', 96000.00, '2020-09-13'),
(112, 'Michael Smith', 'msmith@company.com', 'Developer', 'Finance', 116000.00, '2024-10-31'),
(113, 'David Jones', 'djones@company.com', 'HR', 'Engineering', 49500.00, '2023-04-29'),
(114, 'Emma Jones', 'ejones@company.com', 'Sales', 'Marketing', 113000.00, '2022-03-26'),
(124, 'Alex Carter', 'alex.carter@company.com', 'Developer', 'Engineering', 50000.00, '2025-02-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
