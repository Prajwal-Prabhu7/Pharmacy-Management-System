-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2022 at 07:44 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacyms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin login`
--

CREATE TABLE `admin login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin login`
--

INSERT INTO `admin login` (`username`, `password`) VALUES
('user', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bid` int(5) NOT NULL,
  `bamt` int(50) NOT NULL,
  `bqtt` int(50) NOT NULL,
  `mdid` int(5) NOT NULL,
  `did` int(5) NOT NULL,
  `pid` int(5) NOT NULL,
  `sid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bid`, `bamt`, `bqtt`, `mdid`, `did`, `pid`, `sid`) VALUES
(41256, 7000, 5, 48957, 89654, 98564, 96789),
(52496, 2000, 5, 47859, 45678, 25607, 65894),
(75986, 10000, 6, 54789, 58964, 58964, 47856),
(85964, 5000, 3, 63598, 65236, 85602, 58964),
(89654, 9000, 6, 65894, 256847, 63568, 98564),
(96589, 12000, 3, 65894, 56412, 96358, 58964);

--
-- Triggers `bill`
--
DELIMITER $$
CREATE TRIGGER `billdelete` BEFORE DELETE ON `bill` FOR EACH ROW INSERT INTO billtrigger VALUES(OLD.bid,old.bamt,old.bqtt,"DELETED",NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updatebil` BEFORE UPDATE ON `bill` FOR EACH ROW INSERT INTO billtrigger
VALUES(OLD.bid,OLD.bamt,OLD.bqtt,"UPDATED",NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `billtrigger`
--

CREATE TABLE `billtrigger` (
  `bid` int(5) NOT NULL,
  `bamt` int(50) NOT NULL,
  `bqtt` int(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billtrigger`
--

INSERT INTO `billtrigger` (`bid`, `bamt`, `bqtt`, `action`, `date`) VALUES
(85964, 5000, 2, 'UPDATED', '2022-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `did` int(5) NOT NULL,
  `dname` varchar(50) NOT NULL,
  `dcontact` bigint(10) NOT NULL,
  `hname` varchar(50) NOT NULL,
  `pid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`did`, `dname`, `dcontact`, `hname`, `pid`) VALUES
(45678, 'Dr.Raman', 9585647585, 'AJ Hospital', 25607),
(56412, 'Dr.Mithun', 9353847577, 'Apollo Hospital', 96358),
(58964, 'Dr.Lalit', 9356847859, 'Ashwini Multispeciality Clinic', 58964),
(65236, 'Dr.Reshma', 96685784, 'SDM Multi-Speciality Hospital Ujire', 85602),
(89654, 'Dr.Kabir', 6985986984, 'Nanavati Hospital', 98564),
(256847, 'Dr.Sharan', 6698597485, 'Manipal Hospital Banglore', 63568);

--
-- Triggers `doctor`
--
DELIMITER $$
CREATE TRIGGER `docdelete` BEFORE DELETE ON `doctor` FOR EACH ROW INSERT INTO doctrigger VALUES(OLD.did,OLD.dname,OLD.dcontact,"DELETED",NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `udoctor` BEFORE UPDATE ON `doctor` FOR EACH ROW INSERT INTO doctrigger
VALUES(OLD.did,OLD.dname,OLD.dcontact,"UPDATED",NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `doctrigger`
--

CREATE TABLE `doctrigger` (
  `did` int(5) NOT NULL,
  `dname` varchar(50) NOT NULL,
  `dcontact` bigint(10) NOT NULL,
  `action` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctrigger`
--

INSERT INTO `doctrigger` (`did`, `dname`, `dcontact`, `action`, `date`) VALUES
(56412, 'Dr.Mithun', 9353847577, 'UPDATED', '2022-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `hid` int(5) NOT NULL,
  `hname` varchar(50) NOT NULL,
  `hloc` varchar(50) NOT NULL,
  `hpin` int(6) NOT NULL,
  `did` int(5) NOT NULL,
  `pid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`hid`, `hname`, `hloc`, `hpin`, `did`, `pid`) VALUES
(36589, 'Manipal Hospital', 'Banglore', 589647, 256847, 63568),
(59684, 'SDM Multi-Speciality Hospital Ujire', 'Ujire,Dakshina Kannada', 568975, 65236, 85602),
(63584, 'Apollo Hospitals', 'Banglore', 526847, 56412, 96358),
(68594, 'Ashwini Multispeciality Clinic', 'Manglore,Kankanadi', 574243, 58964, 58964),
(89756, 'AJ Hospital', 'Manglore,Kankanadi', 574240, 45678, 25607),
(96584, 'Nanavati Hospital', 'Kaiga,Karwar', 695847, 89654, 98564);

--
-- Triggers `hospital`
--
DELIMITER $$
CREATE TRIGGER `hospdelete` BEFORE DELETE ON `hospital` FOR EACH ROW INSERT INTO hosptrigger VALUES(OLD.hid,old.hname,old.hloc,"DELETED",NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `uhospital` BEFORE UPDATE ON `hospital` FOR EACH ROW INSERT INTO hosptrigger
VALUES(OLD.hid,OLD.hname,OLD.hloc,"UPDATED",NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `hosptrigger`
--

CREATE TABLE `hosptrigger` (
  `hid` int(5) NOT NULL,
  `hname` varchar(50) NOT NULL,
  `hloc` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hosptrigger`
--

INSERT INTO `hosptrigger` (`hid`, `hname`, `hloc`, `action`, `date`) VALUES
(68594, 'Ashwini Multispeciality Clinic', 'Manglore,Kankanadi', 'UPDATED', '2022-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `sid` int(5) NOT NULL,
  `mdid` int(5) NOT NULL,
  `mdate` date NOT NULL,
  `mqtt` int(50) NOT NULL,
  `mprice` int(50) NOT NULL,
  `mmanf` varchar(50) NOT NULL,
  `mexd` date NOT NULL,
  `pid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`sid`, `mdid`, `mdate`, `mqtt`, `mprice`, `mmanf`, `mexd`, `pid`) VALUES
(65894, 45678, '2021-03-02', 3, 2000, 'Dr. Reddy\'s Laboratories Ltd.', '2022-03-02', 25607),
(98564, 56412, '2021-06-26', 2, 8000, 'Sun Pharmaceutical Industries Ltd', '2022-05-20', 96358),
(47856, 58964, '2020-03-01', 6, 10200, 'Aurobindo Pharma', '2022-08-24', 58964),
(58964, 65236, '2021-02-09', 2, 5000, 'Divi\'s Laboratories', '2022-02-08', 85602),
(96789, 89654, '2020-10-07', 5, 5000, 'Torrent Pharmaceuticals', '2022-05-26', 98564),
(98564, 89655, '2021-11-03', 6, 4000, 'Zydus Cadila Healthcare', '2022-04-08', 63568);

--
-- Triggers `medicine`
--
DELIMITER $$
CREATE TRIGGER `meddelete` BEFORE DELETE ON `medicine` FOR EACH ROW INSERT INTO medtrigger VALUES(OLD.mdid,old.mdate,old.mexd,"DELETED",NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `umedicine` BEFORE UPDATE ON `medicine` FOR EACH ROW INSERT INTO medtrigger
VALUES(OLD.mdid,OLD.mdate,OLD.mexd,"UPDATED",NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `medtrigger`
--

CREATE TABLE `medtrigger` (
  `mdid` int(5) NOT NULL,
  `mdate` date NOT NULL,
  `mexd` date NOT NULL,
  `action` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medtrigger`
--

INSERT INTO `medtrigger` (`mdid`, `mdate`, `mexd`, `action`, `date`) VALUES
(45678, '2021-03-02', '2022-03-02', 'UPDATED', '2022-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `pid` int(5) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `pgender` varchar(7) NOT NULL,
  `paddress` varchar(50) NOT NULL,
  `pcontact` bigint(10) NOT NULL,
  `pdetails` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`pid`, `pname`, `pgender`, `paddress`, `pcontact`, `pdetails`) VALUES
(25607, 'Pavan Kumar', 'Male', 'Honnavar,PrabhatNagar', 9359847488, 'Slight headache with breathing problem'),
(25698, 'pavitra', 'Female', 'banglore', 9449126977, 'cough'),
(58964, 'Varun Desai', 'Male', 'Bantwal,Manglore', 9685784859, 'Leg Fracture,Head Injury\r\n'),
(63568, 'Raghav Rai', 'Male', 'Banashankari,Banglore', 8559647859, 'Eye Pain,Teeth ache'),
(96358, 'Kumar P', 'Male', 'Belthangady', 9449185689, 'Covid'),
(98564, 'Simran Dubey', 'Female', 'KL road,Karwar', 8564758965, 'Head ache');

--
-- Triggers `patient`
--
DELIMITER $$
CREATE TRIGGER `patdelete` BEFORE DELETE ON `patient` FOR EACH ROW INSERT INTO pattrigger VALUES(OLD.pid,old.pname,old.pcontact,"DELETED",NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updatepat` BEFORE UPDATE ON `patient` FOR EACH ROW INSERT INTO pattrigger
VALUES(OLD.pid,OLD.pname,OLD.pcontact,"UPDATED",NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pattrigger`
--

CREATE TABLE `pattrigger` (
  `pid` int(5) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `pcontact` bigint(10) NOT NULL,
  `action` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pattrigger`
--

INSERT INTO `pattrigger` (`pid`, `pname`, `pcontact`, `action`, `date`) VALUES
(25607, 'Pavan', 9359847488, 'UPDATED', '2022-03-27'),
(85602, 'Kaira', 65892525, 'DELETED', '2022-03-27'),
(25698, 'Pavitra', 9354874588, 'DELETED', '2022-03-31'),
(25698, 'Pavitra', 9354874588, 'UPDATED', '2022-03-31'),
(56985, 'pavitra', 2569856985, 'DELETED', '2022-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy`
--

CREATE TABLE `pharmacy` (
  `sid` int(5) NOT NULL,
  `pstate` varchar(50) NOT NULL,
  `pcity` varchar(50) NOT NULL,
  `ploc` varchar(50) NOT NULL,
  `ppin` int(6) NOT NULL,
  `psname` varchar(50) NOT NULL,
  `hid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharmacy`
--

INSERT INTO `pharmacy` (`sid`, `pstate`, `pcity`, `ploc`, `ppin`, `psname`, `hid`) VALUES
(47856, 'Karnataka', 'Honnavar', 'Prabhatnagar', 581361, 'JP Drug House', 68594),
(58964, 'Karnataka', 'Ujire', 'Siddhavana', 574240, 'Karan Pharm House', 59684),
(63589, 'Karnataka', 'Rajajinagar', 'RL Street', 581368, 'AJ Drug Store', 63584),
(65894, 'Karnataka', 'Honnavar', 'Prabhatnagar', 581361, 'Marsh Drug House', 89756),
(96789, 'Karnataka', 'Kaiga', 'Kl Street', 598748, 'Young Drug Store', 96584),
(98564, 'Karnataka', 'Honnavar', 'Kl Street', 581361, 'KK Store', 36589);

--
-- Triggers `pharmacy`
--
DELIMITER $$
CREATE TRIGGER `pharmdelete` BEFORE DELETE ON `pharmacy` FOR EACH ROW INSERT INTO pharmtrigger VALUES(OLD.sid,old.psname,old.ploc,"DELETED",NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `upharmacy` BEFORE UPDATE ON `pharmacy` FOR EACH ROW INSERT INTO pharmtrigger
VALUES(OLD.sid,OLD.psname,OLD.ploc,"UPDATED",NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pharmtrigger`
--

CREATE TABLE `pharmtrigger` (
  `sid` int(5) NOT NULL,
  `psname` varchar(50) NOT NULL,
  `ploc` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharmtrigger`
--

INSERT INTO `pharmtrigger` (`sid`, `psname`, `ploc`, `action`, `date`) VALUES
(65894, 'Marsh Drug Store', 'Prabhatnagar', 'UPDATED', '2022-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`username`, `email`, `password`) VALUES
('Kishan', 'kish@gmail.com', 'kish@1235'),
('Pallavi ', 'pall@gmail.com', 'Pallu@1236'),
('Pavitra', 'pavi@gmail.com', '123@pavi'),
('pp', 'pp@gmail.com', '1234'),
('Prabhu', 'prabhu@gmail.com', 'P@1234'),
('Prajwal', 'Prajwal@gmail.com', 'prajwal@45'),
('Pranav', 'pranav@gmail.com', 'pra4526'),
('Rohan', 'rohan@gmail.com', 'rohan@8596'),
('Saketh', 'saketh@gmail.com', 'sak@123'),
('Sanskar', 'sanskar@gmail.com', 'san@5678'),
('Sumanth', 'sum@gmail.com', 'sum@8569'),
('User', 'user@gmail.com', '1234'),
('Yuvaraj', 'yuv@gmail.com', '58996@p');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `bid` int(5) NOT NULL,
  `spid` int(5) NOT NULL,
  `suname` varchar(50) NOT NULL,
  `sucity` varchar(50) NOT NULL,
  `suloc` varchar(50) NOT NULL,
  `supin` int(6) NOT NULL,
  `suqprice` int(50) NOT NULL,
  `sid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`bid`, `spid`, `suname`, `sucity`, `suloc`, `supin`, `suqprice`, `sid`) VALUES
(96589, 25634, 'Murali Divi', 'Mumbai', 'Goregaon', 896524, 10000, 89654),
(52496, 52698, 'Dilip Shanghvi', 'Mumbai', 'Goregaon', 562489, 1900, 65894),
(85964, 56984, 'Murali Divi', 'Mumbai', 'RK Street', 562486, 4000, 58964),
(89654, 59612, 'Kishore Kumar', 'Gadhinagar', 'RT Road', 896524, 3000, 98564),
(41256, 59864, 'Arvind S', 'Banglore', 'Rajajinagar', 695896, 3000, 96789),
(75986, 69856, 'Rakesh Sharma', 'Haryana', 'Rali Valley', 78954, 80000, 47856);

--
-- Triggers `supplier`
--
DELIMITER $$
CREATE TRIGGER `supdelete` BEFORE DELETE ON `supplier` FOR EACH ROW INSERT INTO suptrigger VALUES(OLD.spid,old.suname,old.suloc,"DELETED",NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `usupplier` BEFORE UPDATE ON `supplier` FOR EACH ROW INSERT INTO suptrigger
VALUES(OLD.spid,OLD.suname,OLD.suloc,"UPDATED",NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `suptrigger`
--

CREATE TABLE `suptrigger` (
  `spid` int(5) NOT NULL,
  `suname` varchar(50) NOT NULL,
  `suloc` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suptrigger`
--

INSERT INTO `suptrigger` (`spid`, `suname`, `suloc`, `action`, `date`) VALUES
(56984, 'Murali Divi', 'RK road', 'UPDATED', '2022-03-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `doctrigger`
--
ALTER TABLE `doctrigger`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`hid`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`mdid`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `pharmacy`
--
ALTER TABLE `pharmacy`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`spid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96590;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `did` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256848;

--
-- AUTO_INCREMENT for table `doctrigger`
--
ALTER TABLE `doctrigger`
  MODIFY `did` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56413;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `hid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96585;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `spid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69857;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
