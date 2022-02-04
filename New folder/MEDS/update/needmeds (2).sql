-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2022 at 01:15 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `needmeds`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `D_ID` int(10) NOT NULL,
  `D_NAME` varchar(20) NOT NULL,
  `CLINIC` varchar(20) NOT NULL,
  `GENDER` varchar(10) NOT NULL,
  `PHONE` bigint(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`D_ID`, `D_NAME`, `CLINIC`, `GENDER`, `PHONE`, `email`, `password`) VALUES
(44, 'shrikanth', 'RAM', 'female', 557, 'shrikanth@gmail.com', 'b8b4b727d6f5d1b61fff7be687f7970f'),
(45, 'SWAROOP', 'sharadah', 'MALE', 95556232, 'sharadhameds@gmail.com', 'b8b4b727d6f5d1b61fff7be687f7970f'),
(46, 'Shubham ', 'HR', 'MALE', 4444212, 'shubham@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(48, 'Srivatsa', 'Kankanadi Hospital', 'Male', 108, 'srivatsa420@gmail.com', 'b8b4b727d6f5d1b61fff7be687f7970f'),
(49, 'JAGANATH', 'aj hos', 'Male', 96644551, 'jag@gmail.com', 'b8b4b727d6f5d1b61fff7be687f7970f');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `E_ID` int(10) NOT NULL,
  `E_NAME` varchar(20) NOT NULL,
  `GENDER` varchar(10) NOT NULL,
  `PHONE` bigint(200) NOT NULL,
  `SALARY` int(100) NOT NULL,
  `P_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `PAT_ID` int(10) NOT NULL,
  `PAT_NAME` varchar(20) NOT NULL,
  `AGE` int(10) NOT NULL,
  `GENDER` varchar(10) NOT NULL,
  `PAT_LOCATION` varchar(20) NOT NULL,
  `PHONE` bigint(10) NOT NULL,
  `D_ID` int(10) DEFAULT NULL,
  `P_ID` int(10) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`PAT_ID`, `PAT_NAME`, `AGE`, `GENDER`, `PAT_LOCATION`, `PHONE`, `D_ID`, `P_ID`, `email`, `password`) VALUES
(9, ' KIRA', 16, 'Male', 'VAKANDA', 665654, 44, 26, 'kira@gmail.com', 'b8b4b727d6f5d1b61fff7be687f7970f'),
(10, ' sam', 98, 'Male', 'VAKANDA', 857, 49, 26, 'sam@gmail.com', 'b8b4b727d6f5d1b61fff7be687f7970f'),
(11, ' sdd', 18, 'MALE', 'KADRI', 5444, NULL, NULL, 'sdd@gmail.com', 'b8b4b727d6f5d1b61fff7be687f7970f');

--
-- Triggers `patient`
--
DELIMITER $$
CREATE TRIGGER `PAT_LOCATION` BEFORE INSERT ON `patient` FOR EACH ROW SET NEW.PAT_LOCATION=UPPER(NEW.PAT_LOCATION)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy`
--

CREATE TABLE `pharmacy` (
  `P_ID` int(10) NOT NULL,
  `P_NAME` varchar(20) NOT NULL,
  `P_LOCATION` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `PHONE` bigint(10) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharmacy`
--

INSERT INTO `pharmacy` (`P_ID`, `P_NAME`, `P_LOCATION`, `email`, `PHONE`, `password`) VALUES
(26, 'SRIVASA MEDICALS', 'VAKANDA', 'srivasa@gamil.com', 108, 'b8b4b727d6f5d1b61fff7be687f7970f'),
(28, 'dd', 'KADRI', 'as@gmail.com', 545, 'b8b4b727d6f5d1b61fff7be687f7970f');

--
-- Triggers `pharmacy`
--
DELIMITER $$
CREATE TRIGGER `P_LOCATION` BEFORE INSERT ON `pharmacy` FOR EACH ROW SET NEW.P_LOCATION=UPPER(NEW.P_LOCATION)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `PR_ID` int(10) NOT NULL,
  `D_ID` int(10) NOT NULL,
  `PAT_ID` int(10) NOT NULL,
  `M_NAME1` varchar(100) DEFAULT NULL,
  `DOSAGE1` varchar(100) DEFAULT NULL,
  `M_NAME2` varchar(100) DEFAULT NULL,
  `DOSAGE2` varchar(100) DEFAULT NULL,
  `M_NAME3` varchar(100) DEFAULT NULL,
  `DOSAGE3` varchar(100) DEFAULT NULL,
  `P_ID` int(10) NOT NULL,
  `PR_DATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`PR_ID`, `D_ID`, `PAT_ID`, `M_NAME1`, `DOSAGE1`, `M_NAME2`, `DOSAGE2`, `M_NAME3`, `DOSAGE3`, `P_ID`, `PR_DATE`) VALUES
(22, 44, 9, 'para', 'fs', 'ff', 'fs', 'para', 'fs', 26, '2022-01-21');

--
-- Triggers `prescription`
--
DELIMITER $$
CREATE TRIGGER `PRESCRIPTION_DATE` BEFORE INSERT ON `prescription` FOR EACH ROW SET NEW.PR_DATE=CURRENT_DATE
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `P_ID` int(10) NOT NULL,
  `S_ID` varchar(100) NOT NULL,
  `M_ID` varchar(100) NOT NULL,
  `M_NAME` varchar(100) NOT NULL,
  `QUANTITY` varchar(100) NOT NULL,
  `BASE_PRICE` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`P_ID`, `S_ID`, `M_ID`, `M_NAME`, `QUANTITY`, `BASE_PRICE`) VALUES
(26, 'S26', 'M1', 'ASP20', '200mg', 200);

--
-- Triggers `stocks`
--
DELIMITER $$
CREATE TRIGGER `MEDICINE` BEFORE INSERT ON `stocks` FOR EACH ROW SET 
 NEW.M_NAME=UPPER(NEW.M_NAME)
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`D_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`E_ID`),
  ADD KEY `TEST` (`P_ID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`PAT_ID`),
  ADD KEY `dd` (`P_ID`),
  ADD KEY `Y` (`D_ID`);

--
-- Indexes for table `pharmacy`
--
ALTER TABLE `pharmacy`
  ADD PRIMARY KEY (`P_ID`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`PR_ID`),
  ADD KEY `A1` (`PAT_ID`),
  ADD KEY `A2` (`D_ID`),
  ADD KEY `A3` (`P_ID`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`P_ID`,`M_ID`,`S_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `D_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `E_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `PAT_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pharmacy`
--
ALTER TABLE `pharmacy`
  MODIFY `P_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `PR_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `TEST` FOREIGN KEY (`P_ID`) REFERENCES `pharmacy` (`P_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `Y` FOREIGN KEY (`D_ID`) REFERENCES `doctor` (`D_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dd` FOREIGN KEY (`P_ID`) REFERENCES `pharmacy` (`P_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `A1` FOREIGN KEY (`PAT_ID`) REFERENCES `patient` (`PAT_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `A2` FOREIGN KEY (`D_ID`) REFERENCES `doctor` (`D_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `A3` FOREIGN KEY (`P_ID`) REFERENCES `pharmacy` (`P_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `sss` FOREIGN KEY (`P_ID`) REFERENCES `pharmacy` (`P_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
