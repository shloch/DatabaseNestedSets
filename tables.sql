-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 12, 2021 at 02:54 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nested_sets`
--
CREATE DATABASE IF NOT EXISTS `nested_sets` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `nested_sets`;

-- --------------------------------------------------------

--
-- Table structure for table `node_tree`
--

DROP TABLE IF EXISTS `node_tree`;
CREATE TABLE `node_tree` (
  `idNode` smallint(6) NOT NULL,
  `level` smallint(6) NOT NULL,
  `iLeft` smallint(6) NOT NULL,
  `iRight` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `node_tree_names`
--

DROP TABLE IF EXISTS `node_tree_names`;
CREATE TABLE `node_tree_names` (
  `idNode` smallint(6) NOT NULL,
  `language` varchar(300) NOT NULL,
  `nodeName` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `node_tree`
--
ALTER TABLE `node_tree`
  ADD PRIMARY KEY (`idNode`);

--
-- Indexes for table `node_tree_names`
--
ALTER TABLE `node_tree_names`
  ADD KEY `idNode` (`idNode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `node_tree`
--
ALTER TABLE `node_tree`
  MODIFY `idNode` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `node_tree_names`
--
ALTER TABLE `node_tree_names`
  ADD CONSTRAINT `idNode` FOREIGN KEY (`idNode`) REFERENCES `node_tree` (`idNode`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
