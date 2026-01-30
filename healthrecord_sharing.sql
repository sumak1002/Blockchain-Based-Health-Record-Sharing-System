-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 18, 2024 at 05:32 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `healthrecord_sharing`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `ID` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`ID`, `name`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `appointmenttb`
--

CREATE TABLE IF NOT EXISTS `appointmenttb` (
  `pid` int(11) NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `doctor` varchar(30) NOT NULL,
  `docFees` int(5) NOT NULL,
  `appdate` date NOT NULL,
  `apptime` time NOT NULL,
  `userStatus` int(5) NOT NULL,
  `doctorStatus` int(5) NOT NULL,
  `meeting_link` varchar(999) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `appointmenttb`
--

INSERT INTO `appointmenttb` (`pid`, `ID`, `fname`, `lname`, `gender`, `email`, `contact`, `doctor`, `docFees`, `appdate`, `apptime`, `userStatus`, `doctorStatus`, `meeting_link`) VALUES
(17, 42, 'pet', 'pet', 'male', 'pet@gmail.com', '9890546711', 'anurag', 550, '2023-02-14', '11:30:00', 1, 1, 'my dog sneeze a lot');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `name` varchar(30) NOT NULL,
  `email` text NOT NULL,
  `contact` varchar(10) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `email`, `contact`, `message`) VALUES
('Anu', 'anu@gmail.com', '7896677554', 'Hey Admin'),
(' Viki', 'viki@gmail.com', '9899778865', 'Good Job, Pal'),
('Ananya', 'ananya@gmail.com', '9997888879', 'How can I reach you?'),
('Aakash', 'aakash@gmail.com', '8788979967', 'Love your site'),
('Mani', 'mani@gmail.com', '8977768978', 'Want some coffee?'),
('Karthick', 'karthi@gmail.com', '9898989898', 'Good service'),
('Abbis', 'abbis@gmail.com', '8979776868', 'Love your service'),
('Asiq', 'asiq@gmail.com', '9087897564', 'Love your service. Thank you!'),
('Jane', 'jane@gmail.com', '7869869757', 'I love your service!');

-- --------------------------------------------------------

--
-- Table structure for table `doctb`
--

CREATE TABLE IF NOT EXISTS `doctb` (
  `ID` int(111) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `spec` varchar(50) NOT NULL,
  `docFees` int(10) NOT NULL,
  `images` varchar(999) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `qr` varchar(999) NOT NULL,
  `certi` varchar(999) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `doctb`
--

INSERT INTO `doctb` (`ID`, `username`, `password`, `email`, `spec`, `docFees`, `images`, `status`, `qr`, `certi`) VALUES
(1, 'ram', 'ram123', 'ram@gmail.com', 'Dog', 500, 'doctor-2.jpg', 1, 'ram.png', ''),
(2, 'sham', 'sham123', 'sham@gmail.com', 'Cat', 600, 'doctor3-1.jpg', 1, 'sham.png', ''),
(3, 'chetan', 'chetan123', 'chetan@gmail.com', 'Cat', 700, 'doctor-9.jpg', 1, 'chetan.jpg', ''),
(4, 'anurag', 'anurag123', 'anurag@gmail.com', 'Cow / Buffalo', 550, 'images.jpg', 1, 'anurag.png', ''),
(5, 'tushar', 'tushar123', 'tushar@gmail.com', 'Cat', 800, 'smiling-doctor-work-19524898.jpg', 1, 'tushar.webp', ''),
(6, 'amol', 'amol123', 'amol@gmail.com', 'Dog', 1000, 'doc-doctor-veterinary-veterinarian.jpg', 1, 'amol.png', ''),
(7, 'pravin', 'pravin123', 'pravin@gmail.com', 'Dog', 1500, 'service_image.png', 1, 'pravin.png', ''),
(8, 'kunal', 'kunal123', 'kunal@gmail.com', 'Cat', 450, 'images (1).jpg', 1, 'kunal.png', ''),
(9, 'vidur', 'vidur123', 'vidur@dfgdf.gh', 'Dog', 3434, 'images (2).jpg', 1, 'vidur.jpg', ''),
(10, 'sadfdaf', 'piyush123', 'Piyushasd@gmail.com', 'asdasd', 500, '360_F_412795848_AgopgLHiKRYqfm7HrRsMJzxtWF6fr5Ds.jpg', 1, '360_F_412795848_AgopgLHiKRYqfm7HrRsMJzxtWF6fr5Ds.jpg', '360_F_412795848_AgopgLHiKRYqfm7HrRsMJzxtWF6fr5Ds.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `files_with_case`
--

CREATE TABLE IF NOT EXISTS `files_with_case` (
  `ID` int(111) NOT NULL AUTO_INCREMENT,
  `case_id` varchar(999) NOT NULL,
  `files` varchar(999) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `files_with_case`
--

INSERT INTO `files_with_case` (`ID`, `case_id`, `files`, `dt`) VALUES
(1, '1', '01222023192310-Untitled.png', '2023-02-22 22:47:29'),
(2, '2', '01222023192310-Untitled.png', '2023-02-24 10:00:03'),
(3, '2', 'college.jpg', '2023-02-24 10:00:03'),
(4, '3', '01222023192310-Untitled.png', '2023-02-24 11:29:06'),
(5, '3', 'college.jpg', '2023-02-24 11:29:06'),
(6, '4', '01222023192310-Untitled.png', '2023-02-24 11:29:34'),
(7, '4', 'college.jpg', '2023-02-24 11:29:34'),
(8, '5', '01222023192310-Untitled.png', '2023-02-24 11:29:37'),
(9, '5', 'college.jpg', '2023-02-24 11:29:37'),
(10, '6', '01222023192310-Untitled.png', '2023-02-24 11:29:59'),
(11, '6', 'college.jpg', '2023-02-24 11:29:59'),
(12, '7', '01222023192310-Untitled.png', '2023-02-24 11:30:01'),
(13, '7', 'college.jpg', '2023-02-24 11:30:01'),
(14, '8', '01222023192310-Untitled.png', '2023-02-24 11:30:27'),
(15, '9', 'autosave.jpg', '2023-03-03 17:17:28'),
(16, '10', 'Desert.jpg', '2023-03-03 18:47:26'),
(17, '10', 'Hydrangeas.jpg', '2023-03-03 18:47:26'),
(18, '11', 'Desert.jpg', '2023-03-08 11:56:25'),
(19, '12', 'Jellyfish.jpg', '2023-03-09 13:09:46'),
(20, '12', 'Koala.jpg', '2023-03-09 13:09:46'),
(21, '12', 'Lighthouse.jpg', '2023-03-09 13:09:46'),
(22, '12', 'Penguins.jpg', '2023-03-09 13:09:46'),
(23, '12', 'Tulips.jpg', '2023-03-09 13:09:47'),
(24, '13', 'Penguins.jpg', '2023-03-12 15:10:06'),
(25, '13', 'Tulips.jpg', '2023-03-12 15:10:06'),
(26, '14', 'Penguins.jpg', '2023-03-12 15:10:06'),
(27, '14', 'Tulips.jpg', '2023-03-12 15:10:06'),
(28, '15', 'Penguins.jpg', '2023-03-12 15:10:07'),
(29, '15', 'Tulips.jpg', '2023-03-12 15:10:07'),
(30, '16', 'Desert.jpg', '2023-03-12 15:11:06'),
(31, '17', 'Desert.jpg', '2023-03-18 01:09:57'),
(32, '18', 'Chrysanthemum.jpg', '2023-03-18 13:39:51'),
(33, '18', 'Desert.jpg', '2023-03-18 13:39:51'),
(34, '18', 'Hydrangeas.jpg', '2023-03-18 13:39:52'),
(35, '19', 'Chrysanthemum.jpg', '2023-03-26 17:32:56'),
(36, '19', 'Desert.jpg', '2023-03-26 17:32:56'),
(37, '19', 'Hydrangeas.jpg', '2023-03-26 17:32:56'),
(38, '20', '1Home Page.png', '2023-04-01 17:09:20'),
(39, '20', '2Agent Login.png', '2023-04-01 17:09:20'),
(40, '20', '3State Admin Login.png', '2023-04-01 17:09:20'),
(41, '20', '4garbage.jpg', '2023-04-01 17:09:20'),
(42, '21', 'Koala.jpg', '2023-04-08 16:22:12'),
(43, '21', 'Lighthouse.jpg', '2023-04-08 16:22:12'),
(44, '21', 'Penguins.jpg', '2023-04-08 16:22:13'),
(45, '22', 'Tulips.jpg', '2023-04-20 12:34:33'),
(46, '23', 'Desert.jpg', '2023-04-23 20:29:07'),
(47, '24', 'Desert.jpg', '2023-04-23 20:37:32'),
(48, '25', 'Desert.jpg', '2024-02-21 20:09:00'),
(49, '26', 'Lighthouse.jpg', '2024-02-21 20:27:44'),
(50, '26', 'Penguins.jpg', '2024-02-21 20:27:44'),
(51, '26', 'Tulips.jpg', '2024-02-21 20:27:44'),
(52, '27', 'Desert.jpg', '2024-03-18 09:53:35');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE IF NOT EXISTS `hospital` (
  `ID` int(111) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(999) NOT NULL,
  `contact` varchar(999) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(999) NOT NULL,
  `location` varchar(999) NOT NULL,
  `patient_img` varchar(999) NOT NULL,
  `treatment` text NOT NULL,
  `specialization` varchar(999) NOT NULL,
  `doctors_list` varchar(999) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`ID`, `full_name`, `contact`, `email`, `password`, `location`, `patient_img`, `treatment`, `specialization`, `doctors_list`, `dt`) VALUES
(5, 'Axo Hospital', '9890546711', 'axon@gmail.com', 'axon2020', 'Shivaji Nagar Amravati', 'Participation-Certificates-for-Employee-Training.jpg', 'Heart Surgery, Piles, Neurosurgeon, Artho treatment', '', '', '2021-05-02 17:28:37'),
(6, 'Get Life Hospital', '91-9890546711', 'Getlife@gmail.com', 'etlife123', 'Rukmini Nagar, Main road Amravati', 'campus-Riverside-Ottawa-The-Hospital-Ont.jpg', 'Heart Surgery, Piles, Neurosurgeon', '', '', '2021-05-02 17:28:37'),
(7, 'Sanjivani Multispeciality Hospital', '9898989898', 'Sanjivani@gmail.com', 'd0821bea9fc0626e9b1cb6c2f3c3a4de', 'Rukmini Nagar Amravati', '123.jpg', 'Artho, General Physician, Oral', '', '', '2023-03-03 18:39:37'),
(8, 'Keche Hospital', '9898989898', 'keche@gmail.com', 'keche123', 'Rukmini Nagar Amravati', 'Lighthouse.jpg', 'Dental, Artho, Spine', '', '', '2023-04-01 16:58:29'),
(9, 'kushaldhole@hotmail.com', '9890546711', 'poorval@gmail.com', '3d82e2d89baa2686142bcbc5671a47f5', 'farshi stop', 'Hydrangeas.jpg', 'heart arto', 'wewe', 'Dr. Sham, Dr. Ram', '2023-04-20 10:11:23');

-- --------------------------------------------------------

--
-- Table structure for table `miners`
--

CREATE TABLE IF NOT EXISTS `miners` (
  `ID` int(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `miners`
--

INSERT INTO `miners` (`ID`, `username`, `password`) VALUES
(1, 'admin', 'miners');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `ID` int(111) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(999) NOT NULL,
  `age` varchar(999) NOT NULL,
  `height` varchar(999) NOT NULL,
  `blood_group` varchar(999) NOT NULL,
  `gender` varchar(999) NOT NULL,
  `contact` varchar(999) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(999) NOT NULL,
  `location` varchar(999) NOT NULL,
  `patient_img` varchar(999) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`ID`, `full_name`, `age`, `height`, `blood_group`, `gender`, `contact`, `email`, `password`, `location`, `patient_img`, `dt`) VALUES
(16, 'Piyush', '3', '1', 'B+', 'male', '9890546711', 'Piyush@gmail.com', 'piyush123', 'Farshi Stop Amravati', 'Koala.jpg', '2023-04-23 20:51:18'),
(17, 'Parimal', '2', '2 inch', 'B+', 'male', '9890546711', 'pet@gmail.com', '7eae3e48cf88f80737fdd71d25a2e7b9', 'farshi stop', 'Koala.jpg', '2023-03-03 17:15:04'),
(18, 'kushal', '30', '5.9', 'O RhD positive (O+)', 'male', '9890546711', 'kushaldhole@gmail.com', '6347e156a4da2275c25453a49bb1a8fe', 'FARSHI STOP AMRAVATI', 'Desert.jpg', '2023-02-22 17:48:08'),
(19, 'Gagan', '30', '5.7', 'B RhD positive (B+)', 'male', '9898989898', 'Gagan@gmail.com', '206316531d2a924ac7e75a7a8a6701b3', 'Ram Nagar', 'images.png', '2023-03-03 18:41:14'),
(20, 'sham1234', '24', '5.5', 'A RhD negative (A-)', 'male', '9890546711', 'sham@gmail.com', '8f381a0c9539c7d88bc6315ab914b4ee', 'Farshi Stop Amravati', 'Koala.jpg', '2023-03-12 15:06:18'),
(21, 'Ram', '21', '5.5', 'O RhD negative (O-)', 'male', '9890546711', 'ram@gmail.com', 'ram123', 'Farshi stop ', '16786147424972824973838367417746.jpg', '2023-03-12 15:22:47'),
(22, 'Pratik Zamre', '21', '5.7', 'O RhD positive (O+)', 'male', '989898098', 'pratik@gmail.com', 'pratik123', 'Farshi Stop', 'Penguins.jpg', '2023-04-01 16:56:11'),
(23, 'Neha Muley', '20', '5.4', 'B RhD positive (B+)', 'female', '9890546711', 'neha@gmail.com', 'neha123', 'farshistop', 'Penguins.jpg', '2023-04-08 16:10:42'),
(24, 'pravin', '33', '5.5', 'B RhD positive (B+)', 'male', '9898989898', 'pravin@gmail.com', 'pravin', 'Farshi Stop', '1077114.png', '2024-02-21 20:03:31'),
(25, 'krishna', '23', '5.7', 'B RhD negative (B-)', 'male', '09890546711', 'krishna@gmail.com', 'krishna123', 'Farshi Stop Amravati\r\nrrtyty', '1077114.png', '2024-02-21 20:21:02');

-- --------------------------------------------------------

--
-- Table structure for table `patient_cases`
--

CREATE TABLE IF NOT EXISTS `patient_cases` (
  `ID` int(111) NOT NULL AUTO_INCREMENT,
  `hospital_id` varchar(999) NOT NULL,
  `patient_id` varchar(999) NOT NULL,
  `dr_name` varchar(999) NOT NULL,
  `patient_problem` text NOT NULL,
  `symptoms` text NOT NULL,
  `BP` text NOT NULL,
  `glucose` text NOT NULL,
  `next_appointment` varchar(999) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `current_hash` varchar(999) NOT NULL,
  `previous_hash` varchar(999) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `patient_cases`
--

INSERT INTO `patient_cases` (`ID`, `hospital_id`, `patient_id`, `dr_name`, `patient_problem`, `symptoms`, `BP`, `glucose`, `next_appointment`, `dt`, `current_hash`, `previous_hash`) VALUES
(6, '5', '16', '', 'sdfsdfadasdasd', 'sdf', 'no', 'no', '', '2023-04-01 16:18:24', 'e8c4344e0b677eb604fc295796b9c832c7d9dec9', 'e8c4344e0b677eb604fc295796b9c832c7d9dec9'),
(7, '5', '16', '', 'sdfsdfzxzsa', 'sdf', 'no', 'no', '', '2023-02-25 06:59:38', 'e8c4344e0b677eb604fc295796b9c832c7d9dec9', 'e8c4344e0b677eb604fc295796b9c832c7d9dec9'),
(8, '5', '16', '', 'sdf', 'sdf', 'sdf', 'sdf', '', '2023-02-24 11:30:27', 'a1c8d54c3afc1374bc1597a3d8353d33b77acafd', 'e8c4344e0b677eb604fc295796b9c832c7d9dec9'),
(9, '5', '18', '', 'Patient has backpain', 'backpain and stressed', 'no', 'no', '', '2023-03-03 17:17:28', 'd505ed37eedba6b8bc831d4e2eb8f99e7ae1d365', 'a1c8d54c3afc1374bc1597a3d8353d33b77acafd'),
(10, '7', '19', '', 'Backpain', 'back pain and stresse', 'NO', 'NO', '', '2023-03-05 14:35:39', '3d05a6e5685ac351db7809e4d8b7e5f795d21845', 'd505ed37eedba6b8bc831d4e2eb8f99e7ae1d365'),
(11, '7', '16', '', 'Backpain', 'headache', 'No', 'No', '', '2023-03-08 11:56:25', 'c52843d5cf4ad4236622a22bda7a807ae481f495', '3d05a6e5685ac351db7809e4d8b7e5f795d21845'),
(12, '6', '19', '', 'Headachea', 'Fever', 'Normal', 'normal', '', '2023-03-12 14:23:04', '28ae097c15303800548313ecf2064721f415655d', 'c52843d5cf4ad4236622a22bda7a807ae481f495'),
(13, '5', '20', '', 'Headache', 'Pain in mucles', 'No', 'No', '', '2023-03-12 15:10:06', '5aae65ff36ab96941037930c8ddcda97722301e5', '28ae097c15303800548313ecf2064721f415655d'),
(14, '5', '20', '', 'Headache', 'Pain in mucles', 'No', 'No', '', '2023-03-12 15:10:06', '5aae65ff36ab96941037930c8ddcda97722301e5', '5aae65ff36ab96941037930c8ddcda97722301e5'),
(15, '5', '20', '', 'Headache', 'Pain in mucles', 'No', 'No', '', '2023-03-12 15:10:07', '5aae65ff36ab96941037930c8ddcda97722301e5', '5aae65ff36ab96941037930c8ddcda97722301e5'),
(16, '5', '20', '', 'backpain', 'backpain, sdfs sdfsd', 'no', 'no', '', '2023-03-12 15:14:15', 'c4c8f5d5b58baba09cdd692087e1ddfe1c624094', '5aae65ff36ab96941037930c8ddcda97722301e5'),
(17, '5', '21', '', 'fever', 'feversdsd', 'no', 'no', '', '2023-03-18 01:11:19', '71d3b969e079d7c88388438e0bf79002a9d38870', 'c4c8f5d5b58baba09cdd692087e1ddfe1c624094'),
(18, '7', '16', '', 'Fever', 'Headache and ', '120 -95', '120', '', '2023-03-18 13:41:56', 'c4c1bad5205a7aeeecc959fe798563088f7821d3', '71d3b969e079d7c88388438e0bf79002a9d38870'),
(19, '5', '21', '', 'fever', 'backpain', '90-120', '110', '', '2023-03-26 17:32:56', 'da1df2f8f554618735a8d9a32495f1d8a3a61672', 'c4c1bad5205a7aeeecc959fe798563088f7821d3'),
(20, '8', '22', '', 'Root Canel', 'pain in back  2 teeths', '160', '200', '', '2023-04-01 17:30:27', 'd7a58b0363cb5ee5b2e1b5c321270c9ba09f64d5', 'da1df2f8f554618735a8d9a32495f1d8a3a61672'),
(21, '8', '23', '', 'headache', 'headache', 'high', 'low', '', '2023-04-08 16:31:36', '9a29b5668be4617d18d76a0c6605fd473ca3742a', 'd7a58b0363cb5ee5b2e1b5c321270c9ba09f64d5'),
(22, '9', '21', 'dr.Ram', 'nothing', 'nothing', 'normal', 'normal', '', '2023-04-20 12:34:33', '450ae21656154f9de25d987550b1cb3484685818', '9a29b5668be4617d18d76a0c6605fd473ca3742a'),
(23, '5', '18', '', 'high bp\r\n', 'headache', 'normal', 'normal', '', '2023-05-06 20:15:24', '0e5e0ce94157e552ef92abe25d02f281882eee4d', '450ae21656154f9de25d987550b1cb3484685818'),
(24, '5', '23', '', 'feverss', 'headache,backpain', 'normal', 'normal', '', '2023-05-02 17:24:26', '97c6b56097116f375fef7ade6d2c2c3e387007d6', '0e5e0ce94157e552ef92abe25d02f281882eee4d'),
(25, '6', '24', '', 'General feverz', 'fever', 'no', 'no', '', '2024-02-21 20:10:45', '95dffd488e5aaf5b3e43b4e1927ef59c0bb1db3e', '97c6b56097116f375fef7ade6d2c2c3e387007d6'),
(26, '6', '25', '', 'Fever', 'Headache,constipation', 'No', 'No', '', '2024-02-21 20:30:34', '50a80c6c3d2cd83a32eb842df77a0363d9fdff4d', '95dffd488e5aaf5b3e43b4e1927ef59c0bb1db3e'),
(27, '9', '21', '', 'fever', 'headache', 'no', 'no', '2024-03-29T14:58', '2024-03-18 09:53:34', '8debd9776df16e232b31b4dd7b787ed0ffb386b8', '50a80c6c3d2cd83a32eb842df77a0363d9fdff4d');

-- --------------------------------------------------------

--
-- Table structure for table `patient_records`
--

CREATE TABLE IF NOT EXISTS `patient_records` (
  `ID` int(111) NOT NULL AUTO_INCREMENT,
  `hospital_id` varchar(999) NOT NULL,
  `treatment_about` varchar(999) NOT NULL,
  `patient_condition` varchar(999) NOT NULL,
  `patient_BP` varchar(999) NOT NULL,
  `patient_prescription` varchar(999) NOT NULL,
  `treatment_description` text NOT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `patient_records`
--


-- --------------------------------------------------------

--
-- Table structure for table `patreg`
--

CREATE TABLE IF NOT EXISTS `patreg` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `password` varchar(30) NOT NULL,
  `cpassword` varchar(30) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `patreg`
--

INSERT INTO `patreg` (`pid`, `fname`, `lname`, `gender`, `email`, `contact`, `password`, `cpassword`) VALUES
(1, 'Ram', 'Kumar', 'Male', 'ram@gmail.com', '9876543210', 'ram123', 'ram123'),
(2, 'Alia', 'Bhatt', 'Female', 'alia@gmail.com', '8976897689', 'alia123', 'alia123'),
(3, 'Shahrukh', 'khan', 'Male', 'shahrukh@gmail.com', '8976898463', 'shahrukh123', 'shahrukh123'),
(4, 'Kishan', 'Lal', 'Male', 'kishansmart0@gmail.com', '8838489464', 'kishan123', 'kishan123'),
(5, 'Gautam', 'Shankararam', 'Male', 'gautam@gmail.com', '9070897653', 'gautam123', 'gautam123'),
(6, 'Sushant', 'Singh', 'Male', 'sushant@gmail.com', '9059986865', 'sushant123', 'sushant123'),
(7, 'Nancy', 'Deborah', 'Female', 'nancy@gmail.com', '9128972454', 'nancy123', 'nancy123'),
(8, 'Kenny', 'Sebastian', 'Male', 'kenny@gmail.com', '9809879868', 'kenny123', 'kenny123'),
(9, 'William', 'Blake', 'Male', 'william@gmail.com', '8683619153', 'william123', 'william123'),
(10, 'Peter', 'Norvig', 'Male', 'peter@gmail.com', '9609362815', 'peter123', 'peter123'),
(11, 'Shraddha', 'Kapoor', 'Female', 'shraddha@gmail.com', '9768946252', 'shraddha123', 'shraddha123');

-- --------------------------------------------------------

--
-- Table structure for table `prestb`
--

CREATE TABLE IF NOT EXISTS `prestb` (
  `doctor` varchar(50) NOT NULL,
  `pid` int(11) NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `appdate` date NOT NULL,
  `apptime` time NOT NULL,
  `disease` varchar(250) NOT NULL,
  `allergy` varchar(250) NOT NULL,
  `prescription` varchar(1000) NOT NULL,
  `lab_test` varchar(999) NOT NULL,
  `lab_selected` varchar(111) NOT NULL,
  `report_uploaded` varchar(999) NOT NULL,
  `payment_receipt` varchar(999) NOT NULL,
  `total_amount` varchar(999) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `prestb`
--

INSERT INTO `prestb` (`doctor`, `pid`, `ID`, `fname`, `lname`, `appdate`, `apptime`, `disease`, `allergy`, `prescription`, `lab_test`, `lab_selected`, `report_uploaded`, `payment_receipt`, `total_amount`) VALUES
('ram', 16, 34, 'Piyush', 'Piyush', '2022-04-19', '10:00:00', 'Rabies', 'etching, weakness', 'Itâ€™s the disease that took Old Yeller. Rabies is caused by the rabies virus, spread by a bite or saliva from an infected animal, and fatal once an animal gets it and starts showing symptoms. Due to its severity and that itâ€™s easily spread to humans, many cities, states, parks and groomers require dogs to have the vaccine.', '', '', '', '360_F_412795848_AgopgLHiKRYqfm7HrRsMJzxtWF6fr5Ds.jpg', '500'),
('ram', 16, 39, 'Piyush', 'Piyush', '2022-04-26', '10:00:00', 'demo', 'demo', 'demo Prescription', '', '', '', '360_F_412795848_AgopgLHiKRYqfm7HrRsMJzxtWF6fr5Ds.jpg', '500'),
('ram', 16, 41, 'Piyush', 'Piyush', '2023-02-22', '12:30:00', 'j', 'j', 'jj', '', '', '', '', ''),
('anurag', 17, 42, 'pet', 'pet', '2023-02-14', '11:30:00', 'para', 'para', 'para', '', '', '', 'Desert.jpg', '550');

-- --------------------------------------------------------

--
-- Table structure for table `proof_of_work`
--

CREATE TABLE IF NOT EXISTS `proof_of_work` (
  `ID` int(111) NOT NULL AUTO_INCREMENT,
  `blockchain_id` int(111) NOT NULL,
  `miners_id` varchar(111) NOT NULL,
  `patient_id` int(111) NOT NULL,
  `hospital_id` int(111) NOT NULL,
  `status` int(111) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=75 ;

--
-- Dumping data for table `proof_of_work`
--

INSERT INTO `proof_of_work` (`ID`, `blockchain_id`, `miners_id`, `patient_id`, `hospital_id`, `status`) VALUES
(28, 8, '0', 16, 5, 1),
(29, 8, '0', 16, 5, 1),
(30, 7, '0', 16, 5, 1),
(31, 6, '0', 16, 5, 1),
(32, 7, '0', 16, 5, 0),
(33, 8, '0', 16, 5, 1),
(34, 8, '0', 16, 5, 1),
(35, 6, '0', 16, 5, 1),
(36, 6, 'admin', 16, 5, 1),
(37, 8, 'admin', 16, 5, 1),
(38, 8, 'admin', 16, 5, 1),
(39, 6, 'admin', 16, 5, 1),
(40, 10, 'admin', 19, 7, 1),
(41, 6, 'admin', 16, 5, 1),
(42, 8, 'admin', 16, 5, 1),
(43, 10, 'admin', 19, 7, 0),
(44, 9, 'admin', 18, 5, 1),
(45, 12, 'admin', 19, 6, 1),
(46, 12, 'admin', 19, 6, 0),
(47, 16, 'admin', 20, 5, 1),
(48, 15, 'admin', 20, 5, 1),
(49, 16, 'admin', 20, 5, 0),
(50, 6, 'admin', 16, 5, 1),
(51, 6, 'admin', 16, 5, 1),
(52, 17, 'admin', 21, 5, 0),
(53, 18, 'admin', 16, 7, 0),
(54, 14, 'admin', 20, 5, 1),
(55, 6, 'admin', 16, 5, 0),
(56, 20, 'admin', 22, 8, 1),
(57, 20, 'admin', 22, 8, 1),
(58, 19, 'admin', 21, 5, 1),
(59, 20, 'admin', 22, 8, 1),
(60, 20, 'admin', 22, 8, 0),
(61, 8, 'admin', 16, 5, 1),
(62, 21, 'admin', 23, 8, 1),
(63, 21, 'admin', 23, 8, 1),
(64, 21, 'admin', 23, 8, 0),
(65, 24, 'admin', 23, 5, 1),
(66, 23, 'admin', 18, 5, 1),
(67, 22, 'admin', 21, 9, 1),
(68, 9, 'admin', 18, 5, 1),
(69, 24, 'admin', 23, 5, 0),
(70, 25, 'admin', 24, 6, 1),
(71, 25, 'admin', 24, 6, 0),
(72, 26, 'admin', 25, 6, 1),
(73, 26, 'admin', 25, 6, 1),
(74, 26, 'admin', 25, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `view_permission`
--

CREATE TABLE IF NOT EXISTS `view_permission` (
  `ID` int(111) NOT NULL AUTO_INCREMENT,
  `patient_id` varchar(999) NOT NULL,
  `hospital_id` varchar(999) NOT NULL,
  `status` int(11) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `view_permission`
--

INSERT INTO `view_permission` (`ID`, `patient_id`, `hospital_id`, `status`, `dt`) VALUES
(9, '2', '5', 1, '2021-04-24 09:48:27'),
(10, '2', '5', 0, '2021-04-30 18:18:15'),
(11, '5', '5', 1, '2021-04-30 18:20:02'),
(12, '8', '5', 1, '2021-05-02 20:56:55'),
(13, '8', '6', 1, '2021-05-02 21:04:29'),
(14, '9', '5', 1, '2021-05-02 22:46:39'),
(15, '9', '6', 1, '2021-05-02 22:52:15'),
(16, '18', '6', 1, '2023-02-22 17:52:40'),
(18, '18', '5', 1, '2023-02-22 22:49:37'),
(19, '16', '5', 1, '2023-02-23 18:28:59'),
(20, '17', '5', 0, '2023-02-24 09:59:29'),
(21, '18', '5', 1, '2023-03-03 17:16:01'),
(22, '19', '7', 1, '2023-03-03 18:45:08'),
(23, '19', '5', 1, '2023-03-03 18:51:34'),
(24, '16', '7', 1, '2023-03-08 11:54:19'),
(25, '19', '6', 1, '2023-03-09 13:08:51'),
(26, '20', '5', 1, '2023-03-12 15:08:27'),
(27, '21', '5', 1, '2023-03-18 01:08:56'),
(28, '21', '7', 1, '2023-03-18 13:44:43'),
(29, '21', '6', 1, '2023-03-26 17:34:45'),
(30, '22', '8', 1, '2023-04-01 17:05:49'),
(31, '22', '5', 1, '2023-04-01 17:14:06'),
(32, '23', '8', 1, '2023-04-08 16:19:35'),
(33, '23', '6', 1, '2023-04-08 16:25:30'),
(34, '21', '8', 1, '2023-04-20 10:15:44'),
(35, '21', '9', 1, '2023-04-20 10:16:02'),
(36, '23', '5', 1, '2023-04-23 20:36:20'),
(37, '24', '6', 1, '2024-02-21 20:07:39'),
(38, '25', '6', 1, '2024-02-21 20:26:24'),
(39, '23', '7', 0, '2024-03-07 00:46:26');
