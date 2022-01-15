-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2022 at 03:19 PM
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
  `PHONE` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`D_ID`, `D_NAME`, `CLINIC`, `GENDER`, `PHONE`, `email`, `password`) VALUES
(43, 'srivatsa', 'Kankanadi Hospital', 'MALE', 9552656, 'srivatsa420@gmail.com', '94e629cff23dabe71bb1d1033a5bf27e'),
(44, 'shrikanth', 'RAM', 'female', 557, 'shrikanth@gmail.com', 'ad1d2c58ac80da44a06a591d1c505cef'),
(45, 'SWAROOP', 'sharadah', 'MALE', 95556232, 'sharadhameds@gmail.com', 'b8b4b727d6f5d1b61fff7be687f7970f'),
(46, 'Shubham ', 'HR', 'MALE', 4444212, 'shubham@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

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
(19, 'Rachel', 'female', 108, 25000, 18),
(20, '', 'male', 9353365, 0, 18),
(21, '', 'male', 9353365, 0, 18);

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
  `PHONE` int(10) NOT NULL,
  `D_ID` int(10) DEFAULT NULL,
  `P_ID` int(10) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`PAT_ID`, `PAT_NAME`, `AGE`, `GENDER`, `PAT_LOCATION`, `PHONE`, `D_ID`, `P_ID`, `email`, `password`) VALUES
(5, ' Ashish', 18, 'MALE', 'manglore', 214242, NULL, NULL, 'srivatsa420@gmail.com', 'b8b4b727d6f5d1b61fff7be687f7970f');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy`
--

CREATE TABLE `pharmacy` (
  `P_ID` int(10) NOT NULL,
  `P_NAME` varchar(20) NOT NULL,
  `P_LOCATION` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `PHONE` int(10) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharmacy`
--

INSERT INTO `pharmacy` (`P_ID`, `P_NAME`, `P_LOCATION`, `email`, `PHONE`, `password`) VALUES
(18, 'SHARADHA MEDS', 'Belthangady', 'sharadhameds@gmail.com', 95556232, 'b8b4b727d6f5d1b61fff7be687f7970f'),
(20, 'Swaroop Medicals ', 'Belthangady', 'swaoop@gmail.com', 108, '1e9410d4e3f4a370f0ad132ae48bee5f');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `PR_ID` int(10) NOT NULL,
  `MED_NAME` varchar(20) NOT NULL,
  `PAT_ID` int(10) NOT NULL,
  `D_ID` int(10) NOT NULL,
  `DOSAGE` text NOT NULL,
  `TOTAL_AMT` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(18, 'S18', 'M1', ' Pantakind ', ' 200mg ', 250),
(20, 'S20', 'M4', 'PARCIDE', '200mg', 360);

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
  ADD KEY `dd` (`P_ID`);

--
-- Indexes for table `pharmacy`
--
ALTER TABLE `pharmacy`
  ADD PRIMARY KEY (`P_ID`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`PR_ID`,`MED_NAME`),
  ADD KEY `TES` (`D_ID`),
  ADD KEY `Z` (`PAT_ID`);

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
  MODIFY `D_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `E_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `PAT_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pharmacy`
--
ALTER TABLE `pharmacy`
  MODIFY `P_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  ADD CONSTRAINT `dd` FOREIGN KEY (`P_ID`) REFERENCES `pharmacy` (`P_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `TES` FOREIGN KEY (`D_ID`) REFERENCES `doctor` (`D_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Z` FOREIGN KEY (`PAT_ID`) REFERENCES `patient` (`PAT_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `sss` FOREIGN KEY (`P_ID`) REFERENCES `pharmacy` (`P_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
