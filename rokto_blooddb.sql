-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 30, 2020 at 07:00 AM
-- Server version: 10.3.22-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rokto_blooddb`
--

-- --------------------------------------------------------

--
-- Table structure for table `city_division`
--

CREATE TABLE `city_division` (
  `city_division_id` int(11) NOT NULL,
  `city_division_type` enum('City','Division') NOT NULL DEFAULT 'City',
  `city_division_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city_division`
--

INSERT INTO `city_division` (`city_division_id`, `city_division_type`, `city_division_name`, `status`) VALUES
(1, 'City', 'Dhaka', 'Active'),
(2, 'City', 'Chittagong', 'Active'),
(3, 'City', 'Sylhet', 'Active'),
(4, 'City', 'Khulna', 'Active'),
(5, 'City', 'Barishal', 'Active'),
(6, 'City', 'Rajshahi', 'Active'),
(7, 'City', 'Rangpur', 'Active'),
(8, 'Division', 'Dhaka Division', 'Active'),
(9, 'Division', 'Chittagong Division', 'Active'),
(10, 'Division', 'Sylhet Division', 'Active'),
(11, 'Division', 'Khulna Division', 'Active'),
(12, 'Division', 'Rajshahi Division', 'Active'),
(13, 'Division', 'Rangpur Division', 'Active'),
(14, 'Division', 'Barisal Division', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `cl_name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `email_address` varchar(200) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `city_division` varchar(11) NOT NULL,
  `location` varchar(11) NOT NULL,
  `term_condition` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `cl_picture` varchar(100) NOT NULL,
  `create_date` varchar(15) NOT NULL,
  `status` enum('Pending','Approve','Reject') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `cl_name`, `email_address`, `contact_number`, `blood_group`, `dob`, `sex`, `city_division`, `location`, `term_condition`, `cl_picture`, `create_date`, `status`) VALUES
(47, 'Md. Main Uddin Hasan ', 'mainuddinhasan04@gmail.com', '01620848954', 'Ap', '04/06/1998', 'Male', '1', '9', '', '', '30/03/2020', 'Approve'),
(48, 'Fouzia Rahman Sara', 'sarafouzia35@gmail.com', '01869533114', 'Ap', '06/02/2000', 'Female', '1', '40', '', '', '30/03/2020', 'Approve'),
(49, 'Nowrin Nahar Tushi', 'nowrinnahartushi9@gmail.com', '01775037679', 'Op', '10/01/2000', 'Female', '1', '14', '', '1585563834_170921070.jpeg', '30/03/2020', 'Approve'),
(50, 'Galib', 'Galibashraf333@gmail.com', '01717433597', 'Op', '02/03/1995', 'Male', '1', '39', '', '', '30/03/2020', 'Approve'),
(51, 'Ratul Alam', 'ratulalam96@gmail.com', '01875955705', 'Bp', '21/01/2000', 'Male', '9', '207', '', '1585564014_1492727921.png', '30/03/2020', 'Approve'),
(52, 'Farhan Hossen', 'farhan141549@gmail.com', '01705681815', 'ABp', '27/09/2000', 'Male', '1', '1', '', '', '30/03/2020', 'Approve'),
(53, 'Avinandan Banerjee', 'avinandan.3011@gmail.com', '01928869916', 'Bp', '30/11/2001', 'Male', '1', '23', '', '', '30/03/2020', 'Pending'),
(54, 'Hasnat', 'hasnat123@gmail.com', '01731283938', 'Op', '30/03/1994', 'Male', '1', '8', '', '', '30/03/2020', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `city_division_id` int(11) NOT NULL,
  `location_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `city_division_id`, `location_name`, `status`) VALUES
(1, 1, 'Dhanmondi', 'Active'),
(2, 1, 'Uttara', 'Active'),
(3, 1, 'Mohammadpur', 'Active'),
(4, 1, 'Gulshan', 'Active'),
(5, 1, 'Dhanmondi', 'Active'),
(6, 1, 'Uttara', 'Active'),
(7, 1, 'Mohammadpur', 'Active'),
(8, 1, 'Gulshan', 'Active'),
(9, 1, 'Badda', 'Active'),
(10, 1, 'Banani', 'Active'),
(11, 1, 'Banglamotor', 'Active'),
(12, 1, 'Bangshal', 'Active'),
(13, 1, 'Baridhara', 'Active'),
(14, 1, 'Basundhara', 'Active'),
(15, 1, 'Cantonment', 'Active'),
(16, 1, 'Chaukbazar', 'Active'),
(17, 1, 'Demra', 'Active'),
(18, 1, 'Dhamrai', 'Active'),
(19, 1, 'Dohar', 'Active'),
(20, 1, 'Elephant Road', 'Active'),
(21, 1, 'Hazaribagh', 'Active'),
(22, 1, 'Jatrabari', 'Active'),
(23, 1, 'Kafrul', 'Active'),
(24, 1, 'Kamrangirchar', 'Active'),
(25, 1, 'Kawranbazar', 'Active'),
(26, 1, 'Keraniganj', 'Active'),
(27, 1, 'Khilgaon', 'Active'),
(28, 1, 'Khilkhet', 'Active'),
(29, 1, 'Kotowali', 'Active'),
(30, 1, 'Lalbag', 'Active'),
(31, 1, 'Malibag', 'Active'),
(32, 1, 'Mogbazar', 'Active'),
(33, 1, 'Mohakhali', 'Active'),
(34, 1, 'Motijheel', 'Active'),
(35, 1, 'Nawabganj', 'Active'),
(36, 1, 'New Market', 'Active'),
(37, 1, 'Paltan', 'Active'),
(38, 1, 'Purbachal', 'Active'),
(39, 1, 'Ramna', 'Active'),
(40, 1, 'Rampura', 'Active'),
(41, 1, 'Sabujbag', 'Active'),
(42, 1, 'Savar', 'Active'),
(43, 1, 'Shajahanpur', 'Active'),
(44, 1, 'Sutrapur', 'Active'),
(45, 1, 'Tejgaon', 'Active'),
(46, 1, 'Tongi', 'Active'),
(47, 1, 'Wari', 'Active'),
(48, 2, 'Agrabad', 'Active'),
(49, 2, 'Chawkbazar', 'Active'),
(50, 2, 'Chandgaon', 'Active'),
(51, 2, 'Halishahar', 'Active'),
(52, 2, 'Kotwali', 'Active'),
(53, 2, 'Anderkilla', 'Active'),
(54, 2, 'Anwara', 'Active'),
(55, 2, 'Baizid', 'Active'),
(56, 2, 'Bakoliya', 'Active'),
(57, 2, 'Bandar', 'Active'),
(58, 2, 'Banskhali', 'Active'),
(59, 2, 'Boalkhali', 'Active'),
(60, 2, 'CDA Avenue', 'Active'),
(61, 2, 'Chandanaish', 'Active'),
(62, 2, 'Cornelhat', 'Active'),
(63, 2, 'Double Mooring', 'Active'),
(64, 2, 'Fatikchari', 'Active'),
(65, 2, 'Hathazari', 'Active'),
(66, 2, 'Jamalkhan', 'Active'),
(67, 2, 'Karnafuly', 'Active'),
(68, 2, 'Khulshi', 'Active'),
(69, 2, 'Lalkhan Bazar', 'Active'),
(70, 2, 'Lohagara', 'Active'),
(71, 2, 'Mirsharai', 'Active'),
(72, 2, 'Muradpur', 'Active'),
(73, 2, 'Nasirabad', 'Active'),
(74, 2, 'Pahartali', 'Active'),
(75, 2, 'Panchlaish', 'Active'),
(76, 2, 'Patenga', 'Active'),
(77, 2, 'Patiya', 'Active'),
(78, 2, 'Rangunia', 'Active'),
(79, 2, 'Raozan', 'Active'),
(80, 2, 'Sandwip', 'Active'),
(81, 2, 'Satkania', 'Active'),
(82, 2, 'Sholashahar', 'Active'),
(83, 2, 'Sitakunda', 'Active'),
(84, 3, 'Zinda Bazar', 'Active'),
(85, 3, 'Amber Khana', 'Active'),
(86, 3, 'Uposhohor', 'Active'),
(87, 3, 'South Surma', 'Active'),
(88, 3, 'Shibgonj', 'Active'),
(89, 3, 'Akhalia', 'Active'),
(90, 3, 'Bagh Bari (Baghbari)', 'Active'),
(91, 3, 'Balaganj', 'Active'),
(92, 3, 'Bandar', 'Active'),
(93, 3, 'Beanibazar', 'Active'),
(94, 3, 'Bimanbondor', 'Active'),
(95, 3, 'Bishwanath', 'Active'),
(96, 3, 'Chouhatta', 'Active'),
(97, 3, 'Companiganj', 'Active'),
(98, 3, 'Dargah Mahalla', 'Active'),
(99, 3, 'Fenchuganj', 'Active'),
(100, 3, 'Golapganj', 'Active'),
(101, 3, 'Gowainghat', 'Active'),
(102, 3, 'Jaintapur', 'Active'),
(103, 3, 'Kanaighat', 'Active'),
(104, 3, 'Kumar para', 'Active'),
(105, 3, 'Lama Bazar', 'Active'),
(106, 3, 'Majortila', 'Active'),
(107, 3, 'Nayasarak', 'Active'),
(108, 3, 'Nehari Para', 'Active'),
(109, 3, 'Osmani Nagar', 'Active'),
(110, 3, 'Pathan Tula', 'Active'),
(111, 3, 'Shahi Eidgah', 'Active'),
(112, 3, 'Shahporan', 'Active'),
(113, 3, 'Subhani Ghat', 'Active'),
(114, 3, 'Subid Bazar', 'Active'),
(115, 3, 'Zakiganj', 'Active'),
(116, 4, 'Sonadanga', 'Active'),
(117, 4, 'Khan Jahan Ali', 'Active'),
(118, 4, 'Khalishpur', 'Active'),
(119, 4, 'Rupsa', 'Active'),
(120, 4, 'Daulatpur', 'Active'),
(121, 4, 'Batighata', 'Active'),
(122, 4, 'Boyra Bazar', 'Active'),
(123, 4, 'Dacope', 'Active'),
(124, 4, 'Dighalia', 'Active'),
(125, 4, 'Dumuria', 'Active'),
(126, 4, 'Gollamari', 'Active'),
(127, 4, 'Kotwali', 'Active'),
(128, 4, 'Koyla Ghat', 'Active'),
(129, 4, 'Koyra', 'Active'),
(130, 4, 'Lobon Chora', 'Active'),
(131, 4, 'Pabla', 'Active'),
(132, 4, 'Paikgacha', 'Active'),
(133, 4, 'Phultala', 'Active'),
(134, 4, 'Rayermohol', 'Active'),
(135, 4, 'Terokhada', 'Active'),
(136, 5, 'Sadar Road', 'Active'),
(137, 5, 'Nattullabad', 'Active'),
(138, 5, 'Rupatali', 'Active'),
(139, 5, 'Natun Bazar', 'Active'),
(140, 5, 'Banglabazar', 'Active'),
(141, 5, 'Amtala', 'Active'),
(142, 5, 'Beltola Feri Ghat', 'Active'),
(143, 5, 'Chand Mari', 'Active'),
(144, 5, 'Chawk Bazar', 'Active'),
(145, 5, 'City Gate Barisal (Gorierpar)', 'Active'),
(146, 5, 'Kalizira', 'Active'),
(147, 5, 'Kashipur Bazar', 'Active'),
(148, 5, 'Launch Ghat', 'Active'),
(149, 5, 'Nazirmoholla', 'Active'),
(150, 5, 'Nobogram Road', 'Active'),
(151, 5, 'Puran Bazar', 'Active'),
(152, 5, 'Uttar Alekanda', 'Active'),
(153, 6, 'Shaheb Bazar', 'Active'),
(154, 6, 'Uposahar', 'Active'),
(155, 6, 'Laksimipur', 'Active'),
(156, 6, 'Boalia', 'Active'),
(157, 6, 'Kazla', 'Active'),
(158, 6, 'Baharampur', 'Active'),
(159, 6, 'Bosepara', 'Active'),
(160, 6, 'Chhota Banagram', 'Active'),
(161, 6, 'Hatemkha', 'Active'),
(162, 6, 'Hossainiganj', 'Active'),
(163, 6, 'Kadirgani', 'Active'),
(164, 6, 'Kazihata', 'Active'),
(165, 6, 'Keshabpur', 'Active'),
(166, 6, 'Motihar', 'Active'),
(167, 6, 'Nawdapara', 'Active'),
(168, 6, 'Padma Residental Area', 'Active'),
(169, 6, 'Rajpara', 'Active'),
(170, 6, 'Ramchandrapur', 'Active'),
(171, 6, 'Rani Nagar', 'Active'),
(172, 6, 'Shiroil', 'Active'),
(173, 7, 'Jahaj Company More', 'Active'),
(174, 7, 'Dhap', 'Active'),
(175, 7, 'Lalbag', 'Active'),
(176, 7, 'Shapla Chottor', 'Active'),
(177, 7, 'Pourobazar', 'Active'),
(178, 7, 'Alamdangha', 'Active'),
(179, 7, 'Bodorganj', 'Active'),
(180, 7, 'College Para', 'Active'),
(181, 7, 'Kachari Bazaar', 'Active'),
(182, 7, 'Mahigonj', 'Active'),
(183, 7, 'Mithapukur', 'Active'),
(184, 7, 'Modern More', 'Active'),
(185, 7, 'Paglapir', 'Active'),
(186, 7, 'Shathibari', 'Active'),
(187, 7, 'Shatmatha Chottor', 'Active'),
(188, 7, 'Shatrasta Mor', 'Active'),
(189, 7, 'Tajhat', 'Active'),
(190, 7, 'Vinno Jogot', 'Active'),
(191, 8, 'Gazipur', 'Active'),
(192, 8, 'Narayanganj', 'Active'),
(193, 8, 'Mymensingh', 'Active'),
(194, 8, 'Tangail', 'Active'),
(195, 8, 'Narsingdi', 'Active'),
(196, 8, 'Faridpur', 'Active'),
(197, 8, 'Gopalganj', 'Active'),
(198, 8, 'Jamalpur', 'Active'),
(199, 8, 'Kishoreganj', 'Active'),
(200, 8, 'Madaripur', 'Active'),
(201, 8, 'Manikganj', 'Active'),
(202, 8, 'Munshiganj', 'Active'),
(203, 8, 'Netrokona', 'Active'),
(204, 8, 'Rajbari', 'Active'),
(205, 8, 'Shariatpur', 'Active'),
(206, 8, 'Sherpur', 'Active'),
(207, 9, 'Comilla', 'Active'),
(208, 9, 'Feni', 'Active'),
(209, 9, 'Noakhali', 'Active'),
(210, 9, 'Brahmanbaria', 'Active'),
(211, 9, 'Cox\'s Bazar', 'Active'),
(212, 9, 'Bandarban', 'Active'),
(213, 9, 'Chandpur', 'Active'),
(214, 9, 'Khagrachhari', 'Active'),
(215, 9, 'Lakshmipur', 'Active'),
(216, 9, 'Rangamati', 'Active'),
(217, 9, 'Sitakundo', 'Active'),
(218, 10, 'Maulvi Bazar', 'Active'),
(219, 10, 'Habiganj', 'Active'),
(220, 10, 'Sunamganj', 'Active'),
(221, 11, 'Jessore', 'Active'),
(222, 11, 'Satkhira', 'Active'),
(223, 11, 'Kushtia', 'Active'),
(224, 11, 'Jhenaidah', 'Active'),
(225, 11, 'Bagerhat', 'Active'),
(226, 11, 'Chuadanga', 'Active'),
(227, 11, 'Magura', 'Active'),
(228, 11, 'Meherpur', 'Active'),
(229, 11, 'Narail', 'Active'),
(230, 11, 'Pirojpur', 'Active'),
(231, 12, 'Bogra', 'Active'),
(232, 12, 'Pabna', 'Active'),
(233, 12, 'Natore', 'Active'),
(234, 12, 'Naogaon', 'Active'),
(235, 12, 'Sirajganj', 'Active'),
(236, 12, 'Chapainawabganj', 'Active'),
(237, 12, 'Joypurhat', 'Active'),
(238, 13, 'Bogra', 'Active'),
(239, 13, 'Pabna', 'Active'),
(240, 13, 'Natore', 'Active'),
(241, 13, 'Naogaon', 'Active'),
(242, 13, 'Sirajganj', 'Active'),
(243, 13, 'Chapainawabganj', 'Active'),
(244, 13, 'Joypurhat', 'Active'),
(245, 13, 'Gaibandha', 'Active'),
(246, 13, 'Lalmonirhat', 'Active'),
(247, 13, 'Saidpur', 'Active'),
(248, 14, 'Bhola', 'Active'),
(249, 14, 'Patuakhali', 'Active'),
(250, 14, 'Jhalokati', 'Active'),
(251, 14, 'Pirojpur', 'Active'),
(252, 14, 'Barguna', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `appellor_name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `appellor_email_address` varchar(200) NOT NULL,
  `appellor_contact_number` varchar(15) NOT NULL,
  `issues` varchar(300) NOT NULL,
  `create_date` date NOT NULL,
  `status` enum('Pending','Approve','Reject') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `client_id`, `appellor_name`, `appellor_email_address`, `appellor_contact_number`, `issues`, `create_date`, `status`) VALUES
(12, 8, 'Md. Rubel', 'koreamts26@gmail.com', '01717561270', 'Fake Data', '2015-10-08', 'Pending'),
(13, 12, 'Fayez', 'Fayez@koreamts.com', '0232203', 'problem', '2015-10-19', 'Pending'),
(14, 9, '55', 'jjjk@jjjk.com', '440000', 'Wrong Blood Group', '2015-11-04', 'Pending'),
(15, 15, 'Sazzad', 'Sazz@gmail.com', '013321', 'I don\'t want show my personal data', '2017-04-07', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  `user_type` varchar(15) NOT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `code` varchar(45) DEFAULT NULL,
  `join_date` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `name`, `user_type`, `email_address`, `password`, `status`, `code`, `join_date`) VALUES
(1, 'admin', 'Admin', 'Admin', 'admin@blood.com', '25d55ad283aa400af464c76d713c07ad', '1', NULL, '2014-10-20 18:1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city_division`
--
ALTER TABLE `city_division`
  ADD PRIMARY KEY (`city_division_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city_division`
--
ALTER TABLE `city_division`
  MODIFY `city_division_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
