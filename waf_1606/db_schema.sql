-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 21, 2018 at 03:18 PM
-- Server version: 5.7.24-0ubuntu0.16.04.1
-- PHP Version: 7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `corephpadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_accounts`
--

CREATE TABLE `admin_accounts` (
  `id` int(25) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `series_id` varchar(60) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `expires` datetime DEFAULT NULL,
  `admin_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_accounts`
--

INSERT INTO `admin_accounts` (`id`, `user_name`, `passwd`, `series_id`, `remember_token`, `expires`, `admin_type`) VALUES
(3, 'root', '$2y$10$syHHgu.lgAUcLH/p1bJNRuQcLqwBVDNsL5mYnS3uVL4gs7apT1pni', NULL, NULL, NULL, 'admin'),
(4, 'superadmin', '$2y$10$xpZc5KC.aU2XHkcqhuZGFuAnqmtL4Unt8MysOyylceq.19XIyoZpG', 'DJf6u76sLwu3CVpw', '$2y$10$ltxNketjQ7xG.XjwoDIqAOB5TxlUr6QQdzAFqkf6y8UMIKWDHX0Ji', '2018-12-21 15:17:46', 'super'),
(5, 'admin', '$2y$10$12mUh2Gm8whTplS1zqfdRenBp24osPFe7Llli3OKxn2ijYkHuxxve', NULL, NULL, NULL, 'admin'),
(6, 'chetanw', '$2y$10$iJSznl9t/iJmJWW1GcJyS.QJJ/pt8bR.jaixq5eZRzhbmGTW2QMLK', NULL, NULL, NULL, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--


--
-- Indexes for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `customers`
--
