-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2022 at 10:19 PM
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
-- Database: `needmed`
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
(50, 'DR.JAGANATH', 'SDM HOSPITAL', 'male', 9874563215, 'srivatsa@gmail.com', 'b8b4b727d6f5d1b61fff7be687f7970f'),
(51, 'Swaroop', 'Puttur', 'male', 8745632199, 'swaroop@gmail.com', 'b8b4b727d6f5d1b61fff7be687f7970f'),
(52, 'Shrikanth', 'Mangalore', 'male', 9874563256, 'shrikanth@gmail.com', 'b8b4b727d6f5d1b61fff7be687f7970f'),
(53, 'Pratheek', 'Bangalore', 'male', 9869863214, 'pratheek@gmail.com', 'b8b4b727d6f5d1b61fff7be687f7970f');

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

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`E_ID`, `E_NAME`, `GENDER`, `PHONE`, `SALARY`, `P_ID`) VALUES
(25, 'Peter parker', 'Male', 9555623254, 30, 33);

--
-- Triggers `employee`
--
DELIMITER $$
CREATE TRIGGER `SalaryEMP` BEFORE INSERT ON `employee` FOR EACH ROW BEGIN 
  IF NEW.SALARY<0 THEN 
   SIGNAL SQLSTATE '45000'
   SET MESSAGE_TEXT ="ERROR:SALARY MUST BE POSITIVE NUMBER!";
  END IF;
END
$$
DELIMITER ;

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
(12, ' Ramesh', 16, 'Male', 'MANGLORE', 664654, NULL, NULL, 'ramesh@gmail.com', 'b8b4b727d6f5d1b61fff7be687f7970f'),
(14, ' Suresh', 18, 'Male', 'KADRI', 664654, 50, 31, 'suresh@gmail.com', 'b8b4b727d6f5d1b61fff7be687f7970f'),
(15, ' Ganesh', 20, 'Male', 'BANGLORE', 6578, NULL, NULL, 'ganesh@gmail.com', 'b8b4b727d6f5d1b61fff7be687f7970f'),
(16, ' Ramesh', 18, 'MALE', 'MANGLORE', 95556232, NULL, NULL, 'apollo108@gmail.com', 'c88e203d6f00b4b56b6b1130b516348c'),
(34, ' Sudeep', 25, 'Male', 'BELTHANGADY', 9449903231, 52, 29, 'sudeep@gmail.com', '9afd82e87621dc7667dfb4be277e98f0');

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
(29, 'SHARADHA MEDS', 'BELTHANGADY', 'sharadhameds@gmail.com', 214242, 'b8b4b727d6f5d1b61fff7be687f7970f'),
(31, 'AJ Medicals', 'KADRI', 'aj@gmail.com', 8989898, 'b8b4b727d6f5d1b61fff7be687f7970f'),
(32, 'Pooja Medicals', 'BANGLORE', 'pooja@gmail.com', 8989898, 'b8b4b727d6f5d1b61fff7be687f7970f'),
(33, 'RK Medicals', 'BELTHANGADY', 'rk@gmail.com', 8989898, 'b8b4b727d6f5d1b61fff7be687f7970f');

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
(23, 50, 14, 'paracetamol', '111', 'acetone', '111', 'paracetamol', '111', 31, '2022-01-31'),
(40, 52, 34, 'Para', '1-0-1', '', '', '', '', 29, '2022-02-03');

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
(31, 'S31', 'M2', 'BOAT32', '100mg', 100),
(31, 'S31', 'M3', ' PETA108 ', ' 103mg ', 51),
(31, 'S31', 'M4', 'META', '100mg', 100),
(31, 'S31', 'M6', 'COBALT100', '100MG', 100),
(32, 'S32', 'M2', 'META', '300mg', 200),
(33, 'S33', 'M2', 'META', '100mg', 150),
(33, 'S33', 'M3', ' PETA108 ', ' 103mg ', 51);

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
  MODIFY `D_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `E_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `PAT_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `pharmacy`
--
ALTER TABLE `pharmacy`
  MODIFY `P_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `PR_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
  ADD CONSTRAINT `prescription_ibfk_1` FOREIGN KEY (`P_ID`) REFERENCES `pharmacy` (`P_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `sss` FOREIGN KEY (`P_ID`) REFERENCES `pharmacy` (`P_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
