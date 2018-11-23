-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2018 at 03:44 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `icu_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `ser_no` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`ser_no`, `name`, `email`) VALUES
(1, 'Mufti Mahmud', 'mahmud8176@gmail.com'),
(4, 'Dr. Pappu', 'abrarzahinrabbi@gmail.com'),
(5, 'Shadman Shahriar', 'rarzahin@gmail.com'),
(6, 'Dr. shahrukh', 'shahrukh@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `ser_no` int(11) NOT NULL,
  `pid` varchar(100) NOT NULL,
  `medicine` text NOT NULL,
  `dosase` text NOT NULL,
  `duration` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`ser_no`, `pid`, `medicine`, `dosase`, `duration`) VALUES
(2, '468735135', 'paracitamol', '1-1-1', '10'),
(21, 'B271757383318224', 'napa xtra', '1-0-1', '10 days'),
(39, 'R31', 'zimax', '0-0-1', '2 days'),
(40, 'k-11', 'napa', '0-1-0', '5 days'),
(42, '468735135', 'finix', '1-0-1', '10 month'),
(43, 'B54610-24', 'finix', '1-1-1', '15 days');

-- --------------------------------------------------------

--
-- Table structure for table `old_medicine`
--

CREATE TABLE `old_medicine` (
  `ser_no` int(11) NOT NULL,
  `pid` varchar(100) NOT NULL,
  `medicine` text NOT NULL,
  `dosase` text NOT NULL,
  `duration` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `old_patient_info`
--

CREATE TABLE `old_patient_info` (
  `id` varchar(100) NOT NULL,
  `name` text NOT NULL,
  `height` text NOT NULL,
  `weight` text NOT NULL,
  `gender` text NOT NULL,
  `date` text NOT NULL,
  `problem` text NOT NULL,
  `doctor` text NOT NULL,
  `mail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `old_patient_info`
--

INSERT INTO `old_patient_info` (`id`, `name`, `height`, `weight`, `gender`, `date`, `problem`, `doctor`, `mail`) VALUES
('162682717744192', 'hello', '44', '44', 'Male', '12/05/2018', 'headche', 'Dr. Mahmud', 'mahmud8176@gmail.com'),
('955892784443328', 'abc', '', '', '', '', '', '', ''),
('c-11', 'hafiz pappu', '167', '82', 'Male', '18/9/18', 'sudden cardiac arrest', 'Dr. Mahmud', 'abrarzahinrabbi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `old_test_report`
--

CREATE TABLE `old_test_report` (
  `serial` int(11) NOT NULL,
  `pid` varchar(100) NOT NULL,
  `name` text NOT NULL,
  `date` text NOT NULL,
  `spo2` text NOT NULL,
  `hr` text NOT NULL,
  `temp` text NOT NULL,
  `urine` text NOT NULL,
  `ph` text NOT NULL,
  `pco2` text NOT NULL,
  `hco3` text NOT NULL,
  `na` text NOT NULL,
  `k` text NOT NULL,
  `cl` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `old_test_report`
--

INSERT INTO `old_test_report` (`serial`, `pid`, `name`, `date`, `spo2`, `hr`, `temp`, `urine`, `ph`, `pco2`, `hco3`, `na`, `k`, `cl`) VALUES
(7, '162682717744192', 'MD. Kashem Uddin', '12/05/2018', '33', '10', '87', '45', '4', '78', '35', '3.6', '26', '24'),
(8, '162682717744192', 'MD. Kashem Uddin', '12/05/2018', '33', '0', '87', '45', '4', '78', '35', '3.6', '26', '24'),
(9, 'c-11', 'hafiz pappu', '18/9/8', '156', '120', '100', '100', '7', '720', '99', '97', '99', '109');

-- --------------------------------------------------------

--
-- Table structure for table `patient_info`
--

CREATE TABLE `patient_info` (
  `id` varchar(100) NOT NULL,
  `name` text NOT NULL,
  `height` text NOT NULL,
  `weight` text NOT NULL,
  `gender` text NOT NULL,
  `date` text NOT NULL,
  `problem` text NOT NULL,
  `doctor` text NOT NULL,
  `mail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_info`
--

INSERT INTO `patient_info` (`id`, `name`, `height`, `weight`, `gender`, `date`, `problem`, `doctor`, `mail`) VALUES
('468735135', 'Mufti Mahmud', '150', '80', 'Male', '25/01/2018', 'Lung', 'Dr. shadman shahriar', 'rarzahin@gmail.com'),
('564466848', 'MD. Kashem Ali', '165', '56', 'Male', '07/07/2018', 'Heart Problem', 'Dr. Pappu', 'abrarzahinrabbi@gmail.com'),
('B271757383318224', 'why man', '258', '45', 'Male', '03/09/2018', 'headche', 'Dr. Mahmud', 'prantasarkar01@yahoo.com'),
('B54610-24', 'Nasirul Amin', '164', '60', 'Male', '22/10/2018', 'sudden cardiac arrest', 'Mufti Mahmud', 'mahmud8176@gmail.com'),
('k-11', 'anik', '170', '70', 'Male', '12/05/2018', 'sudden cardiac arrest', 'Dr. Mahmud', 'abrarzahinrabbi@gmail.com'),
('k-15', 'rooney', '156', '76', 'Male', '2/10/19', '', '', ''),
('k-19', 'cr7', '170', '70', 'Male', '2/10/18', 'knee problem', 'Mufti Mahmud', 'mahmud8176@gmail.com'),
('R31', 'mahmud', '167', '86', 'Male', '20/11/90', 'sudden cardiac arrest', 'Dr. abu', 'abrarzahinrabbi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `patient_record`
--

CREATE TABLE `patient_record` (
  `name` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `spo2` text NOT NULL,
  `hr` text NOT NULL,
  `abp_s` text NOT NULL,
  `abp_d` text NOT NULL,
  `abp_m` text NOT NULL,
  `temp` text NOT NULL,
  `cvp` text NOT NULL,
  `ph` text NOT NULL,
  `pco2` text NOT NULL,
  `po2` text NOT NULL,
  `hco3` text NOT NULL,
  `be` text NOT NULL,
  `hb` text NOT NULL,
  `na` text NOT NULL,
  `k` text NOT NULL,
  `cl` text NOT NULL,
  `total_intale` text NOT NULL,
  `totale_balance` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_record`
--

INSERT INTO `patient_record` (`name`, `date`, `spo2`, `hr`, `abp_s`, `abp_d`, `abp_m`, `temp`, `cvp`, `ph`, `pco2`, `po2`, `hco3`, `be`, `hb`, `na`, `k`, `cl`, `total_intale`, `totale_balance`) VALUES
('MD. Kashem Uddin', '12/05/2018', '33', '11.2', '43', '54', '23', '87', '3', '4', '2', '24', '35', '22.4', '34', '3.6', '24', '24', '3545', '45'),
('Mufti Mahmud', '03/09/2018', '34', '45', '23', '5', '98', '99', '11', '4', '78', '56', '32', '91', '97', '3.8', '26', '91', '435', '435');

-- --------------------------------------------------------

--
-- Table structure for table `suggestion`
--

CREATE TABLE `suggestion` (
  `ser` int(11) NOT NULL,
  `pid` varchar(100) NOT NULL,
  `name` text NOT NULL,
  `suggestion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suggestion`
--

INSERT INTO `suggestion` (`ser`, `pid`, `name`, `suggestion`) VALUES
(2, '468735135', 'Mufti Mahmud', 'skip paracitamol\r\ngive 3 bela napa'),
(3, 'k-19', 'cr7', 'just die ......u aladeen...why did u leave Real Madrid???'),
(4, 'k-19', 'cr7', 'add saline ');

-- --------------------------------------------------------

--
-- Table structure for table `test_report`
--

CREATE TABLE `test_report` (
  `serial` int(11) NOT NULL,
  `pid` varchar(100) NOT NULL,
  `name` text NOT NULL,
  `date` text NOT NULL,
  `spo2` text NOT NULL,
  `hr` text NOT NULL,
  `temp` text NOT NULL,
  `urine` text NOT NULL,
  `ph` text NOT NULL,
  `pco2` text NOT NULL,
  `hco3` text NOT NULL,
  `na` text NOT NULL,
  `k` text NOT NULL,
  `cl` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_report`
--

INSERT INTO `test_report` (`serial`, `pid`, `name`, `date`, `spo2`, `hr`, `temp`, `urine`, `ph`, `pco2`, `hco3`, `na`, `k`, `cl`) VALUES
(2, '468735135', 'Mufti Mahmud', '13/05/2018', '33', '0', '87', '45', '4', '78', '35', '3.6', '26', '24'),
(3, '468735135', 'MD. Kashem Uddin', '12/05/2018', '33', '0', '87', '45', '4', '78', '35', '3.6', '26', '24'),
(4, '564466848', 'MD. Kashem Ali', '12/05/2018', '33', '0', '87', '45', '4', '78', '35', '3.6', '26', '24'),
(6, '564466848', 'MD. Kashem Uddin', '12/05/2018', '33', '0', '87', '45', '4', '78', '35', '3.6', '26', '24'),
(7, '564466848', 'MD. Kashem Uddin', '12/05/2018', '33', '0', '87', '45', '4', '78', '35', '3.6', '26', '24'),
(8, '', 'MD. Kashem Uddin', '12/05/2018', '33', '0', '87', '45', '4', '78', '35', '3.6', '26', '24'),
(9, '', 'MD. Kashem Uddin', '12/09/2018', '33', '0', '87', '45', '4', '78', '35', '3.6', '26', '24'),
(10, 'B271757383318224', 'why man', '03/09/2018', '34', '25', '98', '50', '37.8', '78', '32', '3.6', '24', '91'),
(12, 'B271757383318224', 'why man', '03/09/2018', '156', '56', '87', '50', '37.8', '123', '35', '56.4', '24', '24'),
(13, '468735135', 'Mufti Mahmud', '03/09/2018', '33', '25', '102', '50', '37.8', '78', '25.9', '3.6', '26', '91'),
(14, 'B271757383318224', 'why man', '03/09/2018', '33', '25', '102', '50', '37.8', '2', '25.9', '56.4', '24', '91'),
(15, 'R31', 'mahmud', '18/9/2018', '120', '120', '100', '1', '7', '400', '766', '90', '99', '91'),
(16, 'k-11', 'anik', '12/05/2018', '33', '2', '3', '4', '6', '12', '5', '90', '80', '60'),
(18, '468735135', 'Mufti Mahmud', '30/09/2018', '124', '185', '102', '100', '93.21', '21.5', '63.5', '28.2', '109.2', '23.6'),
(19, 'k-11', 'anik', '30/09/2018', '156', '120', '98', '100', '37.8', '2', '25.9', '3.6', '55.2', '32.5'),
(20, 'k-11', 'anik', '03/09/2018', '33', '120', '3', '45', '37.8', '720', '99', '3.6', '24', '24'),
(21, '564466848', 'MD. Kashem Ali', '03/09/2018', '33', '120', '98', '50', '37.8', '12', '35', '3.6', '26', '109'),
(22, '564466848', 'MD. Kashem Ali', '03/09/2018', '33', '120', '98', '50', '37.8', '12', '35', '3.6', '26', '109'),
(23, '468735135', 'Mufti Mahmud', '', '', '', '', '', '', '', '', '', '', ''),
(24, '468735135', 'Mufti Mahmud', '', '', '', '', '', '', '', '', '', '', ''),
(25, '468735135', 'Mufti Mahmud', '', '', '', '', '', '', '', '', '', '', ''),
(26, '564466848', 'MD. Kashem Ali', '03/09/2018', '156', '120', '99', '45', '37.8', '400', '32', '3.6', '26', '60'),
(27, '564466848', 'MD. Kashem Ali', '03/09/2018', '156', '120', '99', '45', '37.8', '400', '32', '3.6', '26', '60'),
(28, '564466848', 'MD. Kashem Ali', '01/10/2018', '156', '25', '100', '45', '4', '12', '35', '3.6', '26', '23.6'),
(29, 'k-19', 'cr7', '2/10/18', '100', '190', '100', '100', '14', '90', '99', '97', '90', '87'),
(30, 'k-19', 'cr7', '5/05/2018', '200', '400', '100', '600', '7', '67', '89', '90', '98', '99'),
(31, 'k-19', 'cr7', '11/08/18', '100', '160', '100', '67', '14', '98', '65', '97', '75', '39'),
(32, 'B54610-24', 'Nasirul Amin', '22/10/2018', '98', '94', '100', '45', '37.5', '2.6', '12.9', '87', '54', '25.9'),
(33, '468735135', 'Mufti Mahmud', '22/10/2018', '33', '87', '100', '45', '37.5', '25.6', '12.6', '89', '45', '13');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `status`) VALUES
(1, 'google', 'google@mailer.com', 'google', 2),
(2, 'abrar', 'rarzahin@gmail.com', 'abrar', 1),
(3, 'HELLO', 'HELLO@GMAIL.COM', 'hello', 2),
(4, 'alfaz karim', 'ldemocritas@gmail.com', '1234', 2),
(5, 'shadman', 'shadmananik@gmail.com', 'shadmananik', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`ser_no`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`ser_no`);

--
-- Indexes for table `old_medicine`
--
ALTER TABLE `old_medicine`
  ADD PRIMARY KEY (`ser_no`);

--
-- Indexes for table `old_patient_info`
--
ALTER TABLE `old_patient_info`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `old_test_report`
--
ALTER TABLE `old_test_report`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `patient_info`
--
ALTER TABLE `patient_info`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `suggestion`
--
ALTER TABLE `suggestion`
  ADD PRIMARY KEY (`ser`);

--
-- Indexes for table `test_report`
--
ALTER TABLE `test_report`
  ADD UNIQUE KEY `serial` (`serial`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `ser_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `ser_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `old_medicine`
--
ALTER TABLE `old_medicine`
  MODIFY `ser_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `old_test_report`
--
ALTER TABLE `old_test_report`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `suggestion`
--
ALTER TABLE `suggestion`
  MODIFY `ser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `test_report`
--
ALTER TABLE `test_report`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
