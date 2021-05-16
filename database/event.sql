-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2021 at 11:27 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event`
--

-- --------------------------------------------------------

--
-- Table structure for table `at_place`
--

CREATE TABLE `at_place` (
  `H_Id` varchar(250) NOT NULL,
  `V_Id` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `at_place`
--

INSERT INTO `at_place` (`H_Id`, `V_Id`) VALUES
('1', 'W-2'),
('2', 'W-1'),
('3', 'B-2'),
('4', 'B-3'),
('5', 'A-1');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `D_Id` varchar(250) NOT NULL,
  `D_Head` varchar(50) NOT NULL,
  `D_Name` varchar(50) NOT NULL,
  `O_Id` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`D_Id`, `D_Head`, `D_Name`, `O_Id`) VALUES
('Cat-1', 'Brad', 'Catering', '1'),
('Cat-2', 'Trent', 'Catering', '3'),
('Dec-1', 'Moira', 'Decorations', '2'),
('FM-1', 'Heira', 'Finance and Marketing', '2'),
('Mus-1', 'Seinna', 'Music', '3');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `E_Id` varchar(250) NOT NULL,
  `Budget` float NOT NULL,
  `E_Type` varchar(50) NOT NULL,
  `E_Time` time NOT NULL,
  `E_Date` date NOT NULL,
  `H_Id` varchar(250) NOT NULL,
  `O_Id` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`E_Id`, `Budget`, `E_Type`, `E_Time`, `E_Date`, `H_Id`, `O_Id`) VALUES
('101', 30000000, 'Wedding', '10:00:00', '2020-08-03', '2', '1'),
('102', 400000, 'Birthday', '19:15:00', '2020-09-10', '3', '2'),
('103', 100000, 'Birthday', '20:30:00', '2020-12-23', '4', '3'),
('104', 200000, 'Anniversary', '18:45:00', '2020-01-15', '5', '3'),
('105', 25000000, 'Wedding', '11:00:00', '2020-02-11', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `G_Id` varchar(50) NOT NULL,
  `G_Name` varchar(50) NOT NULL,
  `H_Id` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`G_Id`, `G_Name`, `H_Id`) VALUES
('1g1', 'Riss', '1'),
('1g2', 'Hannah', '2'),
('1g3', 'Zack', '3'),
('1g4', 'Tim', '4'),
('1g5', 'Max', '5'),
('2g1', 'Grayson', '1'),
('2g2', 'Tina', '2'),
('2g3', 'Sam', '3'),
('2g4', 'Simmy', '4'),
('2g5', 'Bray', '5'),
('3g1', 'Frank', '1'),
('3g2', 'Mark', '2'),
('3g3', 'Harper', '3'),
('3g4', 'Ginny', '4'),
('3g5', 'Rita', '5'),
('4g1', 'James', '1'),
('4g2', 'Tom', '2'),
('4g3', 'Brynn', '3'),
('4g5', 'Yolav', '5');

-- --------------------------------------------------------

--
-- Table structure for table `host`
--

CREATE TABLE `host` (
  `H_Id` varchar(50) NOT NULL,
  `Bill` varchar(50) NOT NULL,
  `H_Name` varchar(50) NOT NULL,
  `H_Ph` int(10) NOT NULL,
  `H_Mail` varchar(250) NOT NULL,
  `H_DOB` date NOT NULL,
  `H_Add` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `host`
--

INSERT INTO `host` (`H_Id`, `Bill`, `H_Name`, `H_Ph`, `H_Mail`, `H_DOB`, `H_Add`) VALUES
('1', '24500000', 'Margaret', 908378472, 'mg@mail.com', '1990-05-02', 'l-22, vista park avenue,sec-11,street-12,la'),
('2', '29900000', 'Jessica S', 987774443, 'js@mail.com', '1995-07-03', '244, winstor community, street-55, nyc'),
('3', '360000', 'Joseph N.', 984764123, 'jn@mail.com', '1980-12-12', 'r-12,lava street,22,dc'),
('4', '980000', 'William T.', 787145623, 'wt@mail.com', '1960-11-22', 'lit street-2, stranberg'),
('5', '193250', 'Diana Barbara', 81174232, 'dbr@mail.com', '1978-08-20', 'apt-24,brin steet ,nyc');

-- --------------------------------------------------------

--
-- Table structure for table `organizer`
--

CREATE TABLE `organizer` (
  `O_Id` varchar(250) NOT NULL,
  `O_Sal` float NOT NULL,
  `Ph_No` int(10) NOT NULL,
  `O_Mail` varchar(250) NOT NULL,
  `O_DOB` date NOT NULL,
  `O_Name` varchar(150) NOT NULL,
  `address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organizer`
--

INSERT INTO `organizer` (`O_Id`, `O_Sal`, `Ph_No`, `O_Mail`, `O_DOB`, `O_Name`, `address`) VALUES
('1', 135000, 922874211, 'dbryg@mail.com', '1990-06-01', 'Debora Yang', 'l-123, tulip society, nyc'),
('2', 19000, 917636322, 'kk@mail.com', '2000-06-11', 'Keisha Mel', 'hanging gardens'),
('3', 200000, 917636322, 'mrd@mail.com', '1990-06-01', 'Maria Debson', 'pr street soceity-24, plot-156,nyc'),
('4', 123000, 922074211, 'smts@mail.com', '1969-12-28', 'Sandra Martins', '12-serington gardens,street 4, DH'),
('5', 161000, 901766554, 'xrh@mail.com', '1989-04-14', 'Xara H.', 'sixth avenues-45, flemm street, TRY'),
('6', 136000, 98717216, 'mcda@mail.com', '1997-11-24', 'Marcus DeCosta', 'lmn-98, Denton Society, DNR');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`) VALUES
(1, 'update', 'update the database'),
(2, 'delete', 'delete record or column'),
(3, 'insert', 'add new record');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `role_id`, `permission_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'Admin', 'Can access all aspects of database and website'),
(2, 'Editor ', 'Can edit the tables'),
(5, 'Organizer', 'Can access host table data');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `S_Id` varchar(50) NOT NULL,
  `S_Name` varchar(50) NOT NULL,
  `S_DOB` date NOT NULL,
  `S_Ph` int(10) NOT NULL,
  `S_Sal` float NOT NULL,
  `D_Id` varchar(50) NOT NULL,
  `S_Add` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `email`, `password`, `profile_picture`, `created_at`, `updated_at`) VALUES
(1, NULL, 'sr', 'sr@eg.com', '$2y$10$BWogsoiQH5Vn/bpLuL6mm.0OqH2APr7vqQi2BXhoenpnNeA3Uef/a', NULL, '2020-05-10 09:43:10', '2020-05-10 13:13:10'),
(2, NULL, 'np', 'np@eg.com', '$2y$10$1mwGUahZBc1auehhoaxXW.VbgRH4XNR.NBRFLeEFeyviebQ1RFAy2', NULL, '2020-05-16 09:50:47', '2020-05-16 09:50:47'),
(3, NULL, 'ab', 'ab@eg.com', '$2y$10$xXoEHRUjb/qi3tebO4qK1.aoucME5Ihc73jpQy1Dh..WjryfwQdGq', NULL, '2020-06-07 15:23:36', '2020-05-16 09:51:00'),
(5, 1, 'lmn', 'lmn@eg.com', '$2y$10$sJ4ZqwMPB070hftGPLUNHeXVZklYQ2ftNm/2omQbQDyCkDVhmyj3K', NULL, '2020-06-06 13:09:55', '2020-05-16 10:08:24');

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `V_Id` varchar(250) NOT NULL,
  `Capacity` float NOT NULL,
  `V_Add` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`V_Id`, `Capacity`, `V_Add`) VALUES
('A-1', 25, 'Serena Halls,Ly Street-24, CHI'),
('A-2', 30, 'Kaita Halls, Krip Street, 24, NYC'),
('B-1', 85, 'PQR Banquets and Cterers, Street-2, LA'),
('B-2', 30, 'CNT Banquets, Street-4, NUY'),
('B-3', 100, 'Fleurs Hall, Dep Street-55, CAL'),
('W-1', 150, 'Princess Park,London'),
('W-2', 100, 'Autumn Gardens, NYC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `at_place`
--
ALTER TABLE `at_place`
  ADD KEY `fgn_f` (`H_Id`),
  ADD KEY `fgn_g` (`V_Id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`D_Id`),
  ADD KEY `fgn_a` (`O_Id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`E_Id`),
  ADD KEY `fgn_c` (`H_Id`),
  ADD KEY `fgn_d` (`O_Id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`G_Id`),
  ADD KEY `fgn_e` (`H_Id`);

--
-- Indexes for table `host`
--
ALTER TABLE `host`
  ADD PRIMARY KEY (`H_Id`);

--
-- Indexes for table `organizer`
--
ALTER TABLE `organizer`
  ADD PRIMARY KEY (`O_Id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `permission_id` (`permission_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`S_Id`),
  ADD KEY `fgn_b` (`D_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `users_ibfk_1` (`role_id`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`V_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `at_place`
--
ALTER TABLE `at_place`
  ADD CONSTRAINT `fgn_f` FOREIGN KEY (`H_Id`) REFERENCES `host` (`H_Id`),
  ADD CONSTRAINT `fgn_g` FOREIGN KEY (`V_Id`) REFERENCES `venue` (`V_Id`);

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `fgn_a` FOREIGN KEY (`O_Id`) REFERENCES `organizer` (`O_Id`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `fgn_c` FOREIGN KEY (`H_Id`) REFERENCES `host` (`H_Id`),
  ADD CONSTRAINT `fgn_d` FOREIGN KEY (`O_Id`) REFERENCES `organizer` (`O_Id`);

--
-- Constraints for table `guest`
--
ALTER TABLE `guest`
  ADD CONSTRAINT `fgn_e` FOREIGN KEY (`H_Id`) REFERENCES `host` (`H_Id`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `fgn_b` FOREIGN KEY (`D_Id`) REFERENCES `department` (`D_Id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
