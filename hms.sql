-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2024 at 03:09 PM
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
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'admin', 'Karthi@19', '26-01-2024 08:41:10 AM');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `doctorSpecialization` varchar(255) DEFAULT NULL,
  `doctorId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `consultancyFees` int(11) DEFAULT NULL,
  `appointmentDate` varchar(255) DEFAULT NULL,
  `appointmentTime` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `userStatus` int(11) DEFAULT NULL,
  `doctorStatus` int(11) DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `doctorSpecialization`, `doctorId`, `userId`, `consultancyFees`, `appointmentDate`, `appointmentTime`, `postingDate`, `userStatus`, `doctorStatus`, `updationDate`) VALUES
(1, 'ENT', 1, 1, 500, '2022-11-10', '12:45 PM', '2022-11-06 12:21:48', 1, 0, '2022-11-06 12:23:35'),
(2, 'ENT', 1, 2, 500, '2022-11-17', '7:00 PM', '2022-11-06 13:16:18', 1, 1, NULL),
(3, 'Dental Care', 13, 4, 1000, '2024-01-26', '8:30 AM', '2024-01-26 02:56:17', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) DEFAULT NULL,
  `doctorName` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `docFees` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `docEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `specilization`, `doctorName`, `address`, `docFees`, `contactno`, `docEmail`, `password`, `creationDate`, `updationDate`) VALUES
(4, 'Allergists/Immunologists', 'Vivek', 'Kaveripura Kamakshipalya', '500', 7485963210, 'vivek@gmail.com', 'b6b3278e009d18e777ab00df3f07b35a', '2024-01-26 02:06:29', NULL),
(5, 'Anesthesiologists', 'Sumanth Shetty', '18, 1st Main, Koramangala 1st Block, Jakkasandra Extension', '300', 7452103689, 'sumanth@gmail.com', '3951eef4d6486efb865b6aa12dd83957', '2024-01-26 02:12:38', NULL),
(6, 'Cardiologists', 'Mohan', '111, 4th Main, Landmark: Kalki Dhyana Mandir, Bangalore', '500', 8769412503, 'mohan@gmail.com', '46e7520c8b2e2cdb4b33cba2e1e47fea', '2024-01-26 02:14:33', NULL),
(7, 'Critical Care Medicine Specialists', 'Baswaraj Biradar', 'Number 864, Prakriti, D Block, 60 Feet Road', '400', 9847521603, 'baswaraj@gmail.com', 'd7b110d5d687208c155bb820e5dd6c3a', '2024-01-26 02:16:59', NULL),
(8, 'Dermatologists', 'Shilpa', '157/1, Gaurav Building, Landmark: Manipal County Road', '400', 7475210369, 'shilpa@gmail.com', '176725b568a33f4111a04bb0e6b8e631', '2024-01-26 02:19:46', NULL),
(9, 'Endocrinologists', 'Aditi Garg', 'HSR Layout', '500', 8574960213, 'aditi@gmail.com', '49204a41aaa14b9b16e307736dc98a80', '2024-01-26 02:33:13', NULL),
(10, 'Family Physicians', 'Archana S', '#764/1, Vishal Tower,19th Main, 2nd Sector, HSR Layout', '350', 9988774455, 'archana@gmail.com', 'cbe5803e46c2de9fbcdd33b1e95a23d2', '2024-01-26 02:35:17', NULL),
(11, 'Nephrologists', 'Santosh B S', '157/1, Gaurav Building, Landmark: Manipal County Road', '450', 8574960213, 'santosh@gmail.com', '11953f2acf3bed074f6dea1252d1a00f', '2024-01-26 02:36:50', NULL),
(12, 'Neurologists', 'Chaitra Nayak', '110/4, Rebus Realam ,Neeladri Main Road, Doddathoguru, Bangalore', '700', 8769412503, 'chaitra@gmail.com', 'fd5de215639bc55880e3f8b5b5f0b8a5', '2024-01-26 02:38:37', NULL),
(13, 'Dental Care', 'Karthik', 'Kamakshipalya', '1000', 7483968541, 'karthik@gmail.com', 'caf0d9771459a47169a2fcc45700c430', '2024-01-26 02:48:48', NULL),
(14, 'ENT', 'M J Murali', '545, Binnamangala 1st Stage , CMH Road', '500', 9847521603, 'murali@gmail.com', 'b2b9bd4bf8636e3acaed80c613109044', '2024-01-26 02:51:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctorslog`
--

CREATE TABLE `doctorslog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `doctorslog`
--

INSERT INTO `doctorslog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(27, 4, 'vivek@gmail.com', 0x3a3a3100000000000000000000000000, '2024-01-26 02:07:29', '26-01-2024 08:36:00 AM', 1),
(28, 13, 'karthik@gmail.com', 0x3a3a3100000000000000000000000000, '2024-01-26 02:53:21', NULL, 1),
(29, 13, 'karthik@gmail.com', 0x3a3a3100000000000000000000000000, '2024-01-26 02:56:58', NULL, 1),
(30, 13, 'karthik@gmail.com', 0x3a3a3100000000000000000000000000, '2024-01-26 03:06:17', NULL, 1),
(31, 13, 'karthik@gmail.com', 0x3a3a3100000000000000000000000000, '2024-01-26 03:18:44', '26-01-2024 08:48:48 AM', 1),
(32, 13, 'karthik@gmail.com', 0x3a3a3100000000000000000000000000, '2024-03-01 02:31:53', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctorspecilization`
--

CREATE TABLE `doctorspecilization` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `doctorspecilization`
--

INSERT INTO `doctorspecilization` (`id`, `specilization`, `creationDate`, `updationDate`) VALUES
(18, 'Allergists/Immunologists', '2024-01-26 02:00:43', NULL),
(19, 'Anesthesiologists', '2024-01-26 02:00:52', NULL),
(20, 'Cardiologists', '2024-01-26 02:01:02', NULL),
(21, 'Critical Care Medicine Specialists', '2024-01-26 02:01:24', NULL),
(22, 'Dermatologists', '2024-01-26 02:01:33', NULL),
(23, 'Endocrinologists', '2024-01-26 02:01:47', NULL),
(24, 'Family Physicians', '2024-01-26 02:01:57', NULL),
(25, 'Nephrologists', '2024-01-26 02:02:16', NULL),
(26, 'Neurologists', '2024-01-26 02:02:33', NULL),
(27, 'Dental Care', '2024-01-26 02:03:16', NULL),
(28, 'ENT', '2024-01-26 02:03:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactus`
--

CREATE TABLE `tblcontactus` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(12) DEFAULT NULL,
  `message` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `AdminRemark` mediumtext DEFAULT NULL,
  `LastupdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `IsRead` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcontactus`
--

INSERT INTO `tblcontactus` (`id`, `fullname`, `email`, `contactno`, `message`, `PostingDate`, `AdminRemark`, `LastupdationDate`, `IsRead`) VALUES
(1, 'Anuj kumar', 'anujk30@test.com', 1425362514, 'This is for testing purposes.   This is for testing purposes.This is for testing purposes.This is for testing purposes.This is for testing purposes.This is for testing purposes.This is for testing purposes.This is for testing purposes.This is for testing purposes.', '2022-10-30 16:52:03', NULL, NULL, NULL),
(2, 'Anuj kumar', 'ak@gmail.com', 1111122233, 'This is for testing', '2022-11-06 13:13:41', 'Contact the patient', '2022-11-06 13:13:57', 1),
(3, 'Testing', 'testing@gmail.com', 8596320147, 'This is a message to check ', '2024-03-01 01:50:44', 'Solevd', '2024-03-01 01:51:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblmedicalhistory`
--

CREATE TABLE `tblmedicalhistory` (
  `ID` int(10) NOT NULL,
  `PatientID` int(10) DEFAULT NULL,
  `BloodPressure` varchar(200) DEFAULT NULL,
  `BloodSugar` varchar(200) NOT NULL,
  `Weight` varchar(100) DEFAULT NULL,
  `Temperature` varchar(200) DEFAULT NULL,
  `MedicalPres` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblmedicalhistory`
--

INSERT INTO `tblmedicalhistory` (`ID`, `PatientID`, `BloodPressure`, `BloodSugar`, `Weight`, `Temperature`, `MedicalPres`, `CreationDate`) VALUES
(1, 1, '80/120', '120', '85', '98', 'Test', '2022-11-06 13:19:41'),
(2, 3, '20', '30', '40', '60', 'Normal', '2024-01-26 03:03:22'),
(3, 5, '70/80', '50', '65', '60', 'Normal', '2024-03-01 02:33:24');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` varchar(200) DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT current_timestamp(),
  `OpenningTime` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`, `OpenningTime`) VALUES
(1, 'aboutus', 'About Us', '<ul style=\"padding: 0px; margin-right: 0px; margin-bottom: 1.313em; margin-left: 1.655em;\" times=\"\" new=\"\" roman\";=\"\" font-size:=\"\" 14px;=\"\" text-align:=\"\" center;=\"\" background-color:=\"\" rgb(255,=\"\" 246,=\"\" 246);\"=\"\"><li style=\"text-align: left;\"><font color=\"#000000\">The Hospital Management System (HMS) is designed for Any Hospital to replace their existing manual, paper based system. The new system is to control the following information; patient information, room availability, staff and operating room schedules, and patient invoices. These services are to be provided in an efficient, cost effective manner, with the goal of reducing the time and resources currently required for such tasks.</font></li><li style=\"text-align: left;\"><font color=\"#000000\">A significant part of the operation of any hospital involves the acquisition, management and timely retrieval of great volumes of information. This information typically involves; patient personal information and medical history, staff information, room and ward scheduling, staff scheduling, operating theater scheduling and various facilities waiting lists. All of this information must be managed in an efficient and cost wise fashion so that an institution\'s resources may be effectively utilized HMS will automate the management of the hospital making it more efficient and error free. It aims at standardizing data, consolidating data ensuring data integrity and reducing inconsistencies.&nbsp;</font></li></ul>', NULL, NULL, '2020-05-20 07:21:52', NULL),
(2, 'contactus', 'Contact Details', '#19 12th A cross Kaveripura Kamakshipalya Bangalore 560079', 'HMSinfo@gmail.com', 9841253067, '2020-05-20 07:24:07', '9 am To 8 Pm');

-- --------------------------------------------------------

--
-- Table structure for table `tblpatient`
--

CREATE TABLE `tblpatient` (
  `ID` int(10) NOT NULL,
  `Docid` int(10) DEFAULT NULL,
  `PatientName` varchar(200) DEFAULT NULL,
  `PatientContno` bigint(10) DEFAULT NULL,
  `PatientEmail` varchar(200) DEFAULT NULL,
  `PatientGender` varchar(50) DEFAULT NULL,
  `PatientAdd` mediumtext DEFAULT NULL,
  `PatientAge` int(10) DEFAULT NULL,
  `PatientMedhis` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpatient`
--

INSERT INTO `tblpatient` (`ID`, `Docid`, `PatientName`, `PatientContno`, `PatientEmail`, `PatientGender`, `PatientAdd`, `PatientAge`, `PatientMedhis`, `CreationDate`, `UpdationDate`) VALUES
(2, 13, 'Abhishek', 7485962013, 'abhishek@gmail.com', 'male', 'Kamaksipalya', 21, 'Normal', '2024-01-26 02:54:10', NULL),
(3, 4, 'Raju', 7485120396, 'raju@gmail.com', 'male', 'bangalore', 20, 'Normal', '2024-01-26 03:02:30', NULL),
(4, 4, 'anjan', 7485962013, 'anjan@gmail.com', 'male', 'bangalore', 20, 'normal', '2024-01-26 03:08:08', NULL),
(5, 13, 'Divya', 8596742103, 'divya@gmail.com', 'female', 'Bangalore', 20, 'Nothing', '2024-03-01 02:32:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(5, 1, 'johndoe12@test.com', 0x3a3a3100000000000000000000000000, '2024-01-23 14:52:07', '01-03-2024 08:06:57 AM', 1),
(6, 3, 'Prashanth@gmail.com', 0x3a3a3100000000000000000000000000, '2024-01-23 14:53:50', '23-01-2024 08:24:06 PM', 1),
(7, NULL, 'Prashanth', 0x3a3a3100000000000000000000000000, '2024-01-23 14:54:22', NULL, 0),
(8, 3, 'Prashanth@gmail.com', 0x3a3a3100000000000000000000000000, '2024-01-23 14:54:29', '23-01-2024 08:24:36 PM', 1),
(9, NULL, 'anjan', 0x3a3a3100000000000000000000000000, '2024-01-26 01:47:52', NULL, 0),
(10, 4, 'anjan@gmail.com', 0x3a3a3100000000000000000000000000, '2024-01-26 01:48:11', '26-01-2024 07:19:49 AM', 1),
(11, 5, 'varsha@gmail.com', 0x3a3a3100000000000000000000000000, '2024-01-26 01:53:13', '26-01-2024 07:23:28 AM', 1),
(12, 6, 'pranitha@gmail.com', 0x3a3a3100000000000000000000000000, '2024-01-26 01:56:08', '26-01-2024 07:26:29 AM', 1),
(13, 7, 'girish@gmail.com', 0x3a3a3100000000000000000000000000, '2024-01-26 01:58:10', '26-01-2024 07:28:35 AM', 1),
(14, 4, 'anjan@gmail.com', 0x3a3a3100000000000000000000000000, '2024-01-26 02:55:46', NULL, 1),
(15, 4, 'anjan@gmail.com', 0x3a3a3100000000000000000000000000, '2024-01-26 03:00:32', NULL, 1),
(16, 4, 'anjan@gmail.com', 0x3a3a3100000000000000000000000000, '2024-01-26 03:07:19', '26-01-2024 08:39:56 AM', 1),
(17, 8, 'divya@gmail.com', 0x3a3a3100000000000000000000000000, '2024-03-01 02:34:33', NULL, 1),
(18, 4, 'anjan@gmail.com', 0x3a3a3100000000000000000000000000, '2024-03-02 13:52:52', '02-03-2024 07:23:00 PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `address`, `city`, `gender`, `email`, `password`, `regDate`, `updationDate`) VALUES
(3, 'Prashanth', 'as', 'as', 'male', 'Prashanth@gmail.com', 'd12746246ff39c9f52fc7466cf287dcd', '2024-01-23 14:53:36', NULL),
(4, 'Anjan', 'bangalore', 'bangalore', 'male', 'anjan@gmail.com', '38cd458a5bfb04b036725c17c656f34f', '2024-01-26 01:47:23', NULL),
(5, 'Varsha', 'Mysore', 'Mydore', 'female', 'varsha@gmail.com', '5e275f53a4d937dc890b80e5919e22ab', '2024-01-26 01:50:53', NULL),
(6, 'Pranitha', 'bangalore', 'bangalore', 'female', 'pranitha@gmail.com', '7a8cacb2bf0648cc67407737dfe8a0d3', '2024-01-26 01:55:15', '2024-01-26 01:56:18'),
(7, 'Girish', 'Mysore', 'Mysore', 'male', 'girish@gmail.com', '378153728e9ce3bbc04ab696686cf578', '2024-01-26 01:57:23', '2024-01-26 01:58:28'),
(8, 'Divya', 'bangalore', 'bangalore', 'female', 'divya@gmail.com', 'fb97e10f3c85d8ca84a18d84291366eb', '2024-03-01 02:34:09', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorslog`
--
ALTER TABLE `doctorslog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpatient`
--
ALTER TABLE `tblpatient`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `doctorslog`
--
ALTER TABLE `doctorslog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpatient`
--
ALTER TABLE `tblpatient`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
