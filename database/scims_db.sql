-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2022 at 08:44 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scims_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_qualification`
--

CREATE TABLE `academic_qualification` (
  `acdm_qual_Id` bigint(10) NOT NULL COMMENT 'Academic Qualification''s ID',
  `title` varchar(100) NOT NULL COMMENT 'Academic Qualification''s Name',
  `univ_Id` bigint(10) DEFAULT NULL COMMENT 'Qualification''s EducationLevel',
  `sub_Id` int(10) DEFAULT NULL COMMENT 'Subject of Academic Qualification',
  `session` varchar(255) DEFAULT NULL COMMENT 'Passing Year of degree',
  `grade_Id` int(10) DEFAULT NULL COMMENT 'Grade of qualification',
  `acdm_Gpa` varchar(255) DEFAULT NULL COMMENT 'GPA of Applicant',
  `user_id` int(11) DEFAULT NULL,
  `type` enum('1','2') NOT NULL DEFAULT '1' COMMENT '1= acedmic , 2=professional'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `academic_qualification`
--

INSERT INTO `academic_qualification` (`acdm_qual_Id`, `title`, `univ_Id`, `sub_Id`, `session`, `grade_Id`, `acdm_Gpa`, `user_id`, `type`) VALUES
(4, 'dsa', 1, 7, '323', 1, '333', 24, '1'),
(5, 'dsa', 2, 0, '12222', 0, '', 24, '2');

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE `account_type` (
  `acc_type_Id` int(10) NOT NULL,
  `acc_Type` varchar(255) NOT NULL,
  `acc_type_Code` int(10) NOT NULL,
  `acc_Desc` varchar(255) NOT NULL,
  `nature_of_account` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`acc_type_Id`, `acc_Type`, `acc_type_Code`, `acc_Desc`, `nature_of_account`) VALUES
(1, 'Income', 1000, 'Use the income to track income from normal business operations.', 'credit'),
(2, 'Expense', 2000, 'Use the expenses to track expenses from normal business operations.', 'debit'),
(3, 'Asset', 3000, 'Use the asset to track assets of normal business operations.', 'debit'),
(4, 'Liability', 4000, 'Use the liability to track payables from normal business operations.', 'credit'),
(5, 'Equity', 5000, 'Use the equity to track the owner\'s share in the business.', 'credit');

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `adm_No` bigint(100) NOT NULL COMMENT 'Admission number of student',
  `adm_Number` varchar(255) NOT NULL,
  `adm_Date` date NOT NULL COMMENT 'Date of student admission',
  `adm_Session` varchar(255) NOT NULL COMMENT 'Year of admission session',
  `reg_no` varchar(255) DEFAULT NULL,
  `nadra_b` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`adm_No`, `adm_Number`, `adm_Date`, `adm_Session`, `reg_no`, `nadra_b`) VALUES
(1, 'APS-2021-12', '2021-04-20', '2021', '136-KUIIT-2021', '1420299999999'),
(2, 'APS-2021-2', '2021-04-20', '2021', '122-KUIIT-2021', '1420288888888'),
(3, 'APS-2021-3', '2021-04-26', '2021', NULL, '1460565656565'),
(4, 'APS-2021-4', '2021-04-29', '2021', NULL, '14202123243245'),
(5, 'APS-2021-5', '2021-06-28', '2021', NULL, '500050005000'),
(6, 'APS-2021-6', '2021-07-12', '2021', NULL, '9123654987123'),
(7, 'ADM-APS-2021-1', '2021-07-12', '2021', '1234', '222222222255555'),
(8, 'APS-2021-8', '2021-08-25', '2021', '32', '12'),
(9, 'APS-2021-9', '2021-08-25', '2021', '32', '12'),
(10, 'APS-2021-10', '2021-08-25', '2021', '32', '12'),
(11, 'APS-2021-11', '2021-08-25', '2021', '32', '12'),
(12, 'APS-2021-12', '2021-09-23', '2012', '231', '2112'),
(13, 'APS-2021-13', '2021-09-23', '2012', '231', '211223'),
(14, 'APS-2021-14', '2021-09-23', '2012', '231', '211223'),
(15, 'APS-2021-15', '2021-09-23', '2012', '231', '211223'),
(16, 'APS-2021-16', '2021-09-23', '2012', '231', '211223'),
(17, 'APS-2021-17', '2021-09-23', '2012', '231', '211223'),
(18, 'APS-2021-18', '2021-09-23', '2012', '231', '211223'),
(19, 'APS-2021-19', '2021-09-23', '2012', '231', '211223'),
(20, 'APS-2021-20', '2021-09-24', '2012', '231', '2112'),
(21, 'APS-2021-21', '2021-09-24', '2012', '231', '2112'),
(22, 'ADM-APS-2021-22', '2021-12-10', '2021-2022', '231', '3436346456243144'),
(23, 'ADM-APS-2021-23', '2021-12-13', '2021-2022', '231', '211212212121');

-- --------------------------------------------------------

--
-- Table structure for table `advance_salary`
--

CREATE TABLE `advance_salary` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `advance_amount` varchar(255) NOT NULL,
  `Installments` int(11) NOT NULL,
  `amount_per_pay_peroid` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `total_amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `advance_salary`
--

INSERT INTO `advance_salary` (`id`, `emp_id`, `advance_amount`, `Installments`, `amount_per_pay_peroid`, `status`, `total_amount`) VALUES
(11, 59, '1666.66', 1, '1666.67', 0, '5000');

-- --------------------------------------------------------

--
-- Table structure for table `assign_subjects`
--

CREATE TABLE `assign_subjects` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `cls_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `lecture_per_week` int(11) NOT NULL,
  `type` enum('Theory','Lab') NOT NULL,
  `subject_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assign_subjects`
--

INSERT INTO `assign_subjects` (`id`, `subject_id`, `cls_id`, `section_id`, `teacher_id`, `lecture_per_week`, `type`, `subject_name`) VALUES
(8, 11, 1, 8, 11, 5, 'Theory', 'English'),
(9, 9, 1, 19, 9, 5, 'Theory', 'Islamiat'),
(10, 11, 1, 19, 9, 5, 'Theory', 'English'),
(14, 9, 2, 7, 18, 5, 'Theory', 'Islamiat'),
(15, 11, 1, 20, 49, 5, 'Theory', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_type`
--

CREATE TABLE `attendance_type` (
  `att_typ_Id` int(10) NOT NULL COMMENT 'Attendance type''s ID',
  `att_typ_Name` varchar(20) NOT NULL COMMENT 'Attendance type''s name',
  `att_typ_Status` enum('Active','Inactive') NOT NULL COMMENT 'Status of attendance type'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance_type`
--

INSERT INTO `attendance_type` (`att_typ_Id`, `att_typ_Name`, `att_typ_Status`) VALUES
(1, 'Attendance', 'Active'),
(2, 'Behaviour', 'Active'),
(3, 'Achievement', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE `attendence` (
  `id` bigint(20) NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `in_time` time DEFAULT NULL,
  `out_time` time DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `no_of_hours_worked` float NOT NULL,
  `comments` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendence`
--

INSERT INTO `attendence` (`id`, `employee_id`, `in_time`, `out_time`, `date`, `status`, `created_at`, `updated_at`, `no_of_hours_worked`, `comments`) VALUES
(65, 40, '21:29:00', '18:33:00', '2022-02-07', NULL, NULL, NULL, 0, NULL),
(66, 48, '12:29:00', '18:35:00', '2022-01-06', NULL, NULL, NULL, 0, NULL),
(67, 49, '00:24:00', '00:24:00', '2022-01-03', NULL, NULL, NULL, 0, NULL),
(68, 23, '21:29:00', '18:33:00', '2022-01-05', NULL, NULL, NULL, 0, NULL),
(69, 27, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(70, 26, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(71, 24, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(72, 19, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(73, 18, '02:12:10', '14:10:03', '2022-02-07', NULL, NULL, NULL, 0, NULL),
(74, 17, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(75, 16, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(76, 15, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `auth_Id` bigint(10) NOT NULL COMMENT 'Author ID',
  `auth_Name` varchar(255) NOT NULL COMMENT 'Author Name'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`auth_Id`, `auth_Name`) VALUES
(2, 'Author Gulzar Ahmad'),
(3, 'Author Muhammad Rafy'),
(4, 'Author Sofi Tabbasam'),
(7, 'Author Test');

-- --------------------------------------------------------

--
-- Table structure for table `blood_group`
--

CREATE TABLE `blood_group` (
  `bg_Id` int(10) NOT NULL COMMENT 'Blood Group ID',
  `blood_group` varchar(20) NOT NULL COMMENT 'Name of the blood group'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_group`
--

INSERT INTO `blood_group` (`bg_Id`, `blood_group`) VALUES
(3, 'A+'),
(4, 'A-'),
(5, 'B+'),
(6, 'B-'),
(7, 'AB+'),
(8, 'AB-'),
(9, 'O+'),
(10, 'O-');

-- --------------------------------------------------------

--
-- Table structure for table `boards`
--

CREATE TABLE `boards` (
  `pk_board_Id` int(10) NOT NULL COMMENT 'Board ID',
  `board_Name` varchar(255) DEFAULT NULL COMMENT 'Board Name'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `boards`
--

INSERT INTO `boards` (`pk_board_Id`, `board_Name`) VALUES
(1, 'BISE, Kohat'),
(2, 'BISE, Rawalpindi'),
(4, 'FBISE, Islamabad');

-- --------------------------------------------------------

--
-- Table structure for table `cast`
--

CREATE TABLE `cast` (
  `cast_Id` int(10) NOT NULL COMMENT 'Cast ID',
  `cast` varchar(255) NOT NULL COMMENT 'Cast name of someone'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cast`
--

INSERT INTO `cast` (`cast_Id`, `cast`) VALUES
(1, 'Abbasi'),
(2, 'Abidi'),
(3, 'Abro'),
(4, 'Achakzai'),
(5, 'Afridi'),
(6, 'Agha'),
(7, 'Akakhel'),
(8, 'Alizai'),
(9, 'Alpial'),
(10, 'Alvi'),
(11, 'Ansari'),
(12, 'Arain'),
(13, 'Askari'),
(14, 'Aulakh'),
(15, 'Awan'),
(16, 'Badrashi'),
(17, 'Bahmani'),
(18, 'Bahrani?tribe'),
(19, 'Baig'),
(20, 'Bajwa'),
(21, 'Bangash'),
(22, 'Bangial'),
(23, 'Bangulzai tribe'),
(24, 'Banuchi'),
(25, 'Baqri'),
(26, 'Barlas'),
(27, 'Barsar'),
(28, 'Basra'),
(29, 'Batwal'),
(30, 'Bettani'),
(31, 'Bhabra'),
(32, 'Bhait'),
(33, 'Bhati'),
(34, 'Bhatia'),
(35, 'Bhutto'),
(36, 'Bizenjo'),
(37, 'Bosan'),
(38, 'Bukhari'),
(39, 'Buledi'),
(40, 'Bulfati'),
(41, 'Burki'),
(42, 'Butt'),
(43, 'Buttar'),
(44, 'Buzdar'),
(45, 'Chachar'),
(46, 'Chamkanni'),
(47, 'Chandio'),
(48, 'Chandio?(Baloch)'),
(49, 'Chatha'),
(50, 'Chaudhry'),
(51, 'Chauhan'),
(52, 'Chhalgari'),
(53, 'Chishti'),
(54, 'Chughtai'),
(55, 'Damanis'),
(56, 'Dar'),
(57, 'Darzada'),
(58, 'Dashti'),
(59, 'Daulat Khel'),
(60, 'Davi'),
(61, 'Dawar'),
(62, 'Dehwar'),
(63, 'Derawal'),
(64, 'Dewala'),
(65, 'Dhanial'),
(66, 'Dhariwal'),
(67, 'Dhillon'),
(68, 'Dilazak'),
(69, 'Dogar'),
(70, 'Domki'),
(71, 'Duggal'),
(72, 'Durrani'),
(73, 'Effendi'),
(74, 'Ehsan'),
(75, 'Fareedi'),
(76, 'Farooqi'),
(77, 'Firdausi'),
(78, 'Gabol'),
(79, 'Gadhi'),
(80, 'Gakhar'),
(81, 'Gandapur'),
(82, 'Gardezi'),
(83, 'Gashkori'),
(84, 'Ghazali'),
(85, 'Ghazini'),
(86, 'Gilani'),
(87, 'Gill'),
(88, 'Golo'),
(89, 'Gujjar'),
(90, 'Gul'),
(91, 'Gurmani'),
(92, 'Hamadani'),
(93, 'Hameed'),
(94, 'Hashmi'),
(95, 'Hasni'),
(96, 'Hassan'),
(97, 'Hingora'),
(98, 'Hingorja'),
(99, 'Hussain'),
(100, 'Hussaini'),
(101, 'Hyderi'),
(102, 'Ibrahim'),
(103, 'Idrisi'),
(104, 'Indra'),
(105, 'Iqbal'),
(106, 'Isa Khel'),
(107, 'Isfahani'),
(108, 'Jadgal'),
(109, 'Jadoon'),
(110, 'Jafari'),
(111, 'Jagirani'),
(112, 'Jalali'),
(113, 'Jalbani'),
(114, 'Jamali'),
(115, 'Jamshidi'),
(116, 'Janjua'),
(117, 'Jarwar'),
(118, 'Jaspal'),
(119, 'Jatoi'),
(120, 'Jatt'),
(121, 'Jhalawan'),
(122, 'Jiskani'),
(123, 'Jogezai'),
(124, 'Jogi'),
(125, 'Johiya'),
(126, 'Junejo'),
(127, 'Jutt'),
(128, 'Kahloon'),
(129, 'Kakakhel'),
(130, 'Kakar'),
(131, 'Kakazai'),
(132, 'Kalhoro'),
(133, 'Kalmati'),
(134, 'Kalpar'),
(135, 'Kalwar'),
(136, 'Kambarzahi'),
(137, 'Kamboh'),
(138, 'Kashani'),
(139, 'Kashmiri Shaikh'),
(140, 'Kasi'),
(141, 'Kathia'),
(142, 'Kazmi'),
(143, 'Kenagzai'),
(144, 'Kermani'),
(145, 'Khagga'),
(146, 'Khakwani'),
(147, 'Khalil (tribe)'),
(148, 'Khalol'),
(149, 'Khan'),
(150, 'Khandowa'),
(151, 'Khan-e-Qalat'),
(152, 'Khara'),
(153, 'Kharal'),
(154, 'Kharoti'),
(155, 'Khaskheli'),
(156, 'Khattak'),
(157, 'Khawaja'),
(158, 'Khetran'),
(159, 'Khizarkhel'),
(160, 'Khokhar'),
(161, 'Khudiadadzai'),
(162, 'Khuhro'),
(163, 'Khulozai'),
(164, 'Khushk'),
(165, 'Khushk?(Baloch)'),
(166, 'Kirmani'),
(167, 'Korai'),
(168, 'Kuchis'),
(169, 'Kumbhar'),
(170, 'Kundi'),
(171, 'Kurd'),
(172, 'Laar'),
(173, 'Lakhani'),
(174, 'Langhani'),
(175, 'Lango'),
(176, 'Langra'),
(177, 'Langrial'),
(178, 'Lanjwani'),
(179, 'Lau'),
(180, 'Leel'),
(181, 'Lehri'),
(182, 'Lodhi'),
(183, 'Lohani?(Rohani)'),
(184, 'Loharani'),
(185, 'Loharani?(khel)'),
(186, 'Lone'),
(187, 'Longi'),
(188, 'Lund'),
(189, 'Machi'),
(190, 'Maghdud Khel'),
(191, 'Magsi'),
(192, 'Mahar'),
(193, 'Mahesar'),
(194, 'Mahmud Khel'),
(195, 'Mahsud'),
(196, 'Mahtam'),
(197, 'Makhdoom'),
(198, 'Malik'),
(199, 'Malik clan (Kashmir)'),
(200, 'Mamund'),
(201, 'Mandokhel'),
(202, 'Marri'),
(203, 'Marwat'),
(204, 'Mashwani'),
(205, 'Masood'),
(206, 'Mazari'),
(207, 'Meghwar'),
(208, 'Memon'),
(209, 'Memon people'),
(210, 'Mengal'),
(211, 'Meo'),
(212, 'Mian'),
(213, 'Miana'),
(214, 'Mighiana'),
(215, 'Minhas'),
(216, 'Mir'),
(217, 'Mirani'),
(218, 'Mirbahar'),
(219, 'Mirwani'),
(220, 'Mirza'),
(221, 'Montazeri'),
(222, 'Mousavi'),
(223, 'Mughal'),
(224, 'Mugheri'),
(225, 'Mugheri?(Baloch)'),
(226, 'Muhammad Shahi'),
(227, 'Muker'),
(228, 'Musakhel'),
(229, 'Muslim Khatris'),
(230, 'Najafi'),
(231, 'Nanda'),
(232, 'Naqvi'),
(233, 'Niazi'),
(234, 'Nishapuri'),
(235, 'Noon'),
(236, 'Noorani'),
(237, 'Noorzai'),
(238, 'Nothazai'),
(239, 'Orakzai'),
(240, 'Osmani'),
(241, 'Panni?(Balailzai)'),
(242, 'Panwar'),
(243, 'Paracha'),
(244, 'Parihar'),
(245, 'Pasha[8]'),
(246, 'Passi'),
(247, 'Patel'),
(248, 'Pirzada'),
(249, 'Pitafi'),
(250, 'Popalzai'),
(251, 'Qadiri'),
(252, 'Qaisrani'),
(253, 'Qazi'),
(254, 'Qizilbash'),
(255, 'Qureshi'),
(256, 'Rahija'),
(257, 'Rahmanzai'),
(258, 'Raisani'),
(259, 'Raja[4][5]'),
(260, 'Rajput'),
(261, 'Ranjha'),
(262, 'Raronjah'),
(263, 'Ravani'),
(264, 'Razavi'),
(265, 'Reza'),
(266, 'Rind'),
(267, 'Rind?(Baloch)'),
(268, 'Rizvi'),
(269, 'Rodini'),
(270, 'Rouhani'),
(271, 'Roy'),
(272, 'Sadat'),
(273, 'Sadduzai'),
(274, 'Sadozai'),
(275, 'Saeed'),
(276, 'Sahi clan'),
(277, 'Sahni'),
(278, 'Saifi'),
(279, 'Sajjadi'),
(280, 'Salarzai'),
(281, 'Salehi'),
(282, 'Samma'),
(283, 'Sandhu'),
(284, 'Sangha'),
(285, 'Sanghera'),
(286, 'Sanjrani'),
(287, 'Sarbani'),
(288, 'Sarpara'),
(289, 'Sasooli'),
(290, 'Satti'),
(291, 'Sayyid'),
(292, 'sehgal'),
(293, 'Sethi'),
(294, 'Sethwi'),
(295, 'Shah'),
(296, 'Shahwani'),
(297, 'Shaikh'),
(298, 'Shambhani'),
(299, 'Shanzay'),
(300, 'Shar'),
(301, 'Sheedi'),
(302, 'sheikh'),
(303, 'Sheikh (Punjabi)'),
(304, 'Sherzai'),
(305, 'Shilmani'),
(306, 'Shirani'),
(307, 'Sial'),
(308, 'Siddiqui'),
(309, 'Sidhu'),
(310, 'Singh'),
(311, 'Sipra'),
(312, 'Sirki'),
(313, 'Sistani'),
(314, 'Siyal'),
(315, 'Soomro'),
(316, 'sukhera'),
(317, 'Sulemani'),
(318, 'Sulemankhel'),
(319, 'Sumalani'),
(320, 'Suri'),
(321, 'Swati'),
(322, 'Syed'),
(323, 'Talpur'),
(324, 'Tangwani'),
(325, 'Tanoli/Tani'),
(326, 'Taqvi'),
(327, 'Tarar'),
(328, 'Tareen'),
(329, 'Tarkani'),
(330, 'Thingani'),
(331, 'Tirmizi'),
(332, 'Tiwana'),
(333, 'Tokhi'),
(334, 'Turabi'),
(335, 'Turkhel'),
(336, 'Umarzai'),
(337, 'Umrani'),
(338, 'Usmani'),
(339, 'Uthman khel'),
(340, 'Uzair'),
(341, 'Virk'),
(342, 'Wadeyla'),
(343, 'Wagon'),
(344, 'Wani'),
(345, 'Warraich'),
(346, 'Wasti'),
(347, 'Wazir'),
(348, 'Wur'),
(349, 'Yazdani'),
(350, 'Yousafzai'),
(351, 'Yusaf Khel'),
(352, 'Zaidi'),
(353, 'Zain'),
(354, 'Zand'),
(355, 'Zardari'),
(356, 'Zimri'),
(357, 'Zubairi');

-- --------------------------------------------------------

--
-- Table structure for table `chartofaccounts`
--

CREATE TABLE `chartofaccounts` (
  `acc_Id` int(10) NOT NULL,
  `acc_type_Id` int(10) NOT NULL,
  `acc_Name` varchar(255) NOT NULL,
  `acc_Code` int(10) NOT NULL,
  `acc_Balance` bigint(10) DEFAULT NULL,
  `acc_Date` date NOT NULL,
  `acc_parent` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `description` varchar(255) DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chartofaccounts`
--

INSERT INTO `chartofaccounts` (`acc_Id`, `acc_type_Id`, `acc_Name`, `acc_Code`, `acc_Balance`, `acc_Date`, `acc_parent`, `created_at`, `description`, `level`) VALUES
(1, 1, 'Fees earned', 1100, NULL, '2021-10-19', 0, '2021-10-21 04:16:12', 'Revenue earned from the schooling services', 1),
(2, 1, 'Tuition Fee', 1101, 5400, '2021-10-19', 1, '2021-10-21 04:16:12', 'Tuition is a fee paid for instruction or teaching', 1),
(3, 1, 'Admission Fee', 1102, NULL, '2021-10-19', 1, '2021-10-21 04:16:12', 'The fee charged for admission in an organization', 1),
(4, 4, 'Security fee', 4206, 15000, '2021-10-19', 1, '2021-10-21 04:16:12', 'The amount charged as a security for collection of any outstanding balances owed', 1),
(5, 1, 'Application Fee', 1104, 400, '2021-10-19', 1, '2021-10-21 04:16:12', 'The fee charged for an admission application form.', 1),
(6, 1, 'Annual Fee', 1105, 10000, '2021-10-19', 1, '2021-10-21 04:16:12', 'Annual charges taken when the child is promoted and admitted to next class in the same school.', 1),
(7, 1, 'Hostel Fee', 1106, NULL, '2021-10-19', 1, '2021-10-21 04:16:12', 'The fee charged against the accommodation provided by  an organization', 1),
(8, 1, 'Transport Fee', 1107, NULL, '2021-10-19', 1, '2021-10-21 04:16:12', 'The fee charged for transportation provided by an organization', 1),
(9, 1, 'Examination Fee', 1108, NULL, '2021-10-19', 1, '2021-10-21 04:16:12', 'The fee charged to sit an examination', 1),
(10, 1, 'Stationary Charges', 1109, NULL, '2021-10-19', 1, '2021-10-21 04:16:12', 'The price charged for providing stationary items', 1),
(11, 1, 'Fine', 1110, NULL, '2021-10-19', 1, '2021-10-21 04:16:12', 'Penalty money an organization decides has to be paid as punishment for an offense.', 1),
(12, 2, 'Discount Allowed', 2123, NULL, '2021-10-20', 1, '2021-10-21 04:16:12', 'a deduction from the usual cost of something.', 1),
(13, 3, 'Current Assets', 3100, NULL, '2021-10-19', 0, '2021-10-21 04:16:12', 'Current assets include cash, cash equivalents, accounts receivable, stock inventory, marketable securities, pre-paid liabilities, and other liquid assets', 1),
(14, 3, 'Fixed Assets', 3200, NULL, '2021-10-19', 0, '2021-10-21 04:16:12', 'A fixed asset is a long-term tangible asset that a firm owns and uses to produce income and is not expected to be used or sold within a year.', 1),
(15, 3, 'Cash on Hand', 3101, NULL, '2021-10-19', 18, '2021-10-21 04:16:12', 'The Cash on Hand KPI refers to the amount of money that your business has immediately available on the last day of the reporting period.', 1),
(16, 3, 'Cash at Bank', 3102, NULL, '2021-10-19', 18, '2021-10-21 04:16:12', 'The total amount of money held at the bank by a person or company', 1),
(17, 3, 'Account Receivables (AR)', 3103, -61110, '2021-10-19', 18, '2021-10-21 04:16:12', 'Accounts receivable (AR) is the balance of money due to a firm for goods or services delivered or used but not yet paid for by customers. Accounts receivables are listed on the balance sheet as a current asset. AR is any amount of money owed by custo', 1),
(18, 3, 'Inventory (Stock)', 3104, NULL, '2021-10-19', 18, '2021-10-21 04:16:12', 'Inventory or stock refers to the goods and materials that a business holds for the ultimate goal of resale, production or utilization.', 1),
(19, 3, 'Vehicles', 3202, NULL, '2021-10-19', 19, '2021-10-21 04:16:12', 'A means of conveyance or transport: a motor vehicle; a conveyance moving on wheels, runners, tracks, or the like, as a cart, sled, automobile, or tractor.', 1),
(20, 3, 'PP&E', 3203, 28700, '2021-10-19', 19, '2021-10-21 04:16:12', 'Property, plant, and equipment (PP&E) are a company\'s physical or tangible long-term assets that typically have a life of more than one year.', 1),
(21, 3, 'Trademarks', 3204, NULL, '2021-10-19', 19, '2021-10-21 04:16:12', 'A type of intellectual property consisting of a recognizable sign, design, or expression which identifies products or services of a particular source from those of others', 1),
(22, 1, 'Software Fee', 1112, 50, '2021-10-29', 1, '2021-10-21 04:16:12', 'Fees charged against the MIS  facility provided by the organization: means costs associated (including applicable license fees) with procuring software, software maintenance, software upgrades and other software payments made to the software developm', 1),
(23, 4, 'Current liabilities', 4100, NULL, '2021-10-20', 0, '2021-10-21 04:16:12', 'Current liabilities are a company\'s debts or obligations that are due to be paid to creditors within one year.', 1),
(24, 4, 'Non Current liabilities', 4200, NULL, '2021-10-27', 0, '2021-10-21 04:16:12', 'The non-current liabilities definition refers to any debts or other financial obligations that can be paid after a year.', 1),
(25, 4, 'Accounts Payable (AP)', 4101, 837973, '2021-10-27', 29, '2021-10-21 04:16:12', 'Accounts payable (AP) are amounts due to vendors or suppliers for goods or services received that have not yet been paid for..', 1),
(26, 4, 'Dividends Payable', 4102, NULL, '2021-10-13', 29, '2021-10-21 04:16:12', 'Dividends Payable is the amount of the after tax profit a company has formally authorized to distribute to its shareholders, but has not yet paid in cash. In accounting, dividends Payable is a liability on the company\'s balance sheet.', 1),
(27, 4, 'Notes payable (NP)', 4103, NULL, '2021-10-21', 29, '2021-10-21 04:16:12', 'Notes payable are written agreements (promissory notes) in which one party agrees to pay the other party a certain amount of cash. Alternatively put, a note payable is a loan between two parties.', 1),
(28, 4, 'Deferred Revenue', 4104, NULL, '2021-10-24', 29, '2021-10-21 04:16:12', 'Deferred revenue, also known as unearned revenue, refers to advance payments a company receives for products or services that are to be delivered or performed in the future.', 1),
(29, 4, 'Income Tax Payable', 4105, 1500, '2021-10-20', 29, '2021-10-21 04:16:12', 'The tax that governments impose on income generated by businesses and individuals within their jurisdiction', 1),
(30, 4, 'Debentures', 4201, NULL, '2021-10-20', 30, '2021-10-21 04:16:12', 'A debenture is a medium- to long-term debt instrument used by large companies to borrow money, at a fixed rate of interest.', 1),
(31, 4, 'Pension Benefit Obligations', 4202, NULL, '2021-10-20', 30, '2021-10-21 04:16:12', 'A pension benefit obligation is the present value of retirement benefits earned by employees.', 1),
(32, 4, 'Long-Term Debts', 4203, NULL, '2021-10-20', 30, '2021-10-21 04:16:12', 'The debts a company owes third-party creditors that are payable beyond 12 months.', 1),
(33, 4, 'Employee Provident Fund', 4204, NULL, '2021-10-20', 30, '2021-10-21 04:16:12', 'EPF is a retirement benefit plan where both employer and employee contribute a certain percentage of the salary.', 1),
(34, 4, 'Gratuity', 4205, NULL, '2021-10-20', 30, '2021-10-21 04:16:12', 'Gratuity is a lump sum amount paid by the employer to the employee as a token of appreciation for the services they have provided towards the company.', 1),
(35, 3, 'Prepaid Expenses', 3105, NULL, '2021-10-20', 18, '2021-10-21 04:16:12', 'A prepaid expense is a type of asset on the balance sheet that results from a business making advanced payments for goods or services to be received in the future.', 1),
(36, 2, 'Operating Expenses', 2100, NULL, '2021-10-20', 0, '2021-10-21 04:16:12', 'An operating expense is an expense a business incurs through its normal business operations.', 1),
(37, 2, 'Non-operating Expenses', 2200, NULL, '2021-10-13', 0, '2021-10-21 04:16:12', 'Non-operating expense, like its name implies, is an accounting term used to describe expenses that occur outside of a company\'s day-to-day activities. These types of expenses include monthly charges like interest payments on debt and can also include', 1),
(38, 2, 'Interest Paid', 2201, NULL, '2021-10-28', 43, '2021-10-21 04:16:12', 'Use Interest paid for all types of interest you pay, including mortgage interest, finance charges on credit cards, or interest on loans.', 1),
(39, 2, 'Advertising Expenses', 2101, NULL, '2021-10-22', 42, '2021-10-21 04:16:12', 'Use Advertising/promotional to track money spent promoting your company.', 1),
(40, 2, 'Bad Debts', 2102, 126506, '2021-10-21', 42, '2021-10-21 04:16:12', 'Bad debt refers to outstanding balances owed that are no longer deemed recoverable and must be written off.', 1),
(41, 2, 'Bank Charges', 2103, NULL, '2021-10-15', 42, '2021-10-21 04:16:12', 'Use Bank charges for any fees you pay to financial institutions.', 1),
(42, 2, 'Charitable Contributions', 2104, NULL, '2021-10-14', 42, '2021-10-21 04:16:12', 'Use Charitable contributions to track gifts to charity.', 1),
(43, 2, 'Commissions and Fees', 2105, NULL, '2021-10-20', 42, '2021-10-21 04:16:12', 'Use Commissions and fees to track amounts paid to agents (such as brokers) in order for them to execute a trade.', 1),
(44, 2, 'Cost of Labour', 2106, NULL, '2021-10-14', 42, '2021-10-21 04:16:12', 'The cost of labour is the amount of all salaries paid to the workers.', 1),
(45, 2, 'Dues and Subscriptions', 2107, NULL, '2021-10-28', 42, '2021-10-21 04:16:12', 'Use Dues and subscriptions to track dues and subscriptions related to running your business.', 1),
(46, 2, 'Equipment rental', 2108, NULL, '2021-10-21', 42, '2021-10-21 04:16:12', 'Use Equipment rental to track the cost of renting equipment to produce products or services.', 1),
(47, 2, 'Income Tax Expense', 2109, NULL, '2021-10-22', 42, '2021-10-21 04:16:12', 'Use Income tax expense to track income taxes that the company has paid to meet their tax obligations.', 1),
(48, 2, 'Insurance', 2110, NULL, '2021-10-29', 42, '2021-10-21 04:16:12', 'Use Insurance to track insurance payments.', 1),
(49, 2, 'Management Compensation', 2111, NULL, '2021-10-28', 42, '2021-10-21 04:16:12', 'Use Management compensation to track remuneration paid to Management, Executives and non-Executives. For example, salary, fees, and benefits.', 1),
(50, 2, 'Meals and Entertainment', 2112, NULL, '2021-10-29', 42, '2021-10-21 04:16:12', 'Use Meals and entertainment to track how much you spend on dining with your employees.', 1),
(51, 2, 'Other Miscellaneous Service Cost', 2113, NULL, '2021-10-27', 42, '2021-10-21 04:16:12', 'Use Other miscellaneous service cost to track costs related to providing services that don’t fall into another Expense type.', 1),
(52, 2, 'Rent or Lease of Buildings', 2116, NULL, '2021-10-22', 42, '2021-10-21 04:16:12', 'Use Rent or lease of buildings to track rent payments you make.', 1),
(53, 2, 'Repair and Maintenance', 2117, NULL, '2021-10-28', 42, '2021-10-21 04:16:12', 'Use Repair and maintenance to track any repairs and periodic maintenance fees.', 1),
(54, 2, 'Shipping and Delivery Expense', 2118, NULL, '2021-10-20', 42, '2021-10-21 04:16:12', 'Use Shipping and delivery expense to track the cost of shipping and delivery of goods to customers.', 1),
(55, 2, 'Supplies & Materials', 2119, NULL, '2021-10-27', 42, '2021-10-21 04:16:12', 'Use Supplies & materials to track the cost of raw goods and parts used or consumed when producing a product or providing a service.', 1),
(56, 2, 'Taxes Paid', 2120, NULL, '2021-10-21', 42, '2021-10-21 04:16:12', 'Use Taxes paid to track taxes you pay.', 1),
(57, 2, 'Travel Expenses', 2121, NULL, '2021-10-21', 42, '2021-10-21 04:16:12', 'Use Travel expenses to track travelling costs', 1),
(58, 2, 'Utilities', 2122, NULL, '2021-10-28', 42, '2021-10-21 04:16:12', 'Use Utilities to track utility payments. You may want different accounts of this type to track different types of utility payments (gas and electric, telephone, water, and so on).', 1),
(59, 2, 'Payroll Expenses', 2300, 837973, '2021-10-29', 0, '2021-10-29 22:06:31', 'Use Payroll expenses to track payroll expenses. You may want different accounts of this type for things like: Compensation of officers Guaranteed payments Workers compensation Salaries and wages Payroll taxes', 1),
(60, 2, 'Basic salary', 2301, 926780, '2022-02-07', 59, '2022-02-07 15:04:39', 'Basic salary', 1),
(61, 2, 'Over Time', 2302, 1154, '2022-02-07', 59, '2022-02-07 15:10:22', 'Over Time', 1),
(62, 2, 'Vacation Pay', 2303, 0, '2022-02-07', 59, '2022-02-07 15:11:06', 'Vacation Pay', 1),
(63, 2, 'Bonus', 2304, 0, '2022-02-07', 59, '2022-02-07 15:12:20', 'Bonus', 1),
(64, 2, 'Commission', 2305, 0, '2022-02-07', 59, '2022-02-07 15:13:12', 'Commission', 1),
(65, 2, 'Medical Allowance', 2306, 0, '2022-02-07', 59, '2022-02-07 15:13:55', 'Medical Allowance', 1),
(66, 2, 'House Allowance', 2307, 0, '2022-02-07', 59, '2022-02-07 15:14:24', 'House Allowance', 1),
(67, 2, 'Conveyance Allowance', 2308, 0, '2022-02-07', 59, '2022-02-07 15:14:58', 'Conveyance Allowance', 1),
(68, 2, 'Education Allowance', 2309, 0, '2022-02-07', 59, '2022-02-07 15:15:33', 'Education Allowance', 1),
(69, 2, 'Utility Allowance', 2310, 69, '2022-02-07', 59, '2022-02-07 15:16:00', 'Utility Allowance', 1),
(70, 2, 'Arrears', 2311, 1539, '2022-02-07', 59, '2022-02-07 15:16:27', 'Arrears', 1),
(71, 2, 'Dearness Allowance', 2312, 0, '2022-02-07', 59, '2022-02-07 15:16:58', 'Dearness Allowance', 1),
(72, 2, 'Advance Salary', 3104, 55659, '2022-02-07', 17, '2022-02-07 15:28:56', 'Advance Salary', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `pk_city_id` int(11) NOT NULL,
  `city_name` varchar(400) NOT NULL,
  `dom_id` int(11) NOT NULL,
  `zip_code` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`pk_city_id`, `city_name`, `dom_id`, `zip_code`) VALUES
(1, 'Abbottabad', 33, '22010'),
(2, 'Havelian', 33, '22500'),
(3, 'Attock', 58, '43600'),
(4, 'Fateh Jang', 58, '43350'),
(5, 'Hassan Abdal', 58, '43730'),
(6, 'Hazro', 58, '43440'),
(7, 'Jand', 58, '43100'),
(8, 'Pindi Gheb', 58, '43260'),
(9, 'Awaran', 1, ''),
(10, 'Gishkore', 1, ''),
(11, 'Jhal Jao', 1, ''),
(12, 'Mashkai', 1, ''),
(13, 'Badin', 94, '72200'),
(14, 'Golarchiy', 94, '72010'),
(15, 'Matli', 94, '72010'),
(16, 'Talhar', 94, '72100'),
(17, 'Tando Bago', 94, '72120'),
(18, 'Bahawalnagar', 59, '62300'),
(19, 'Chishtian', 59, '62350'),
(20, 'Fort Abbas', 59, '62020'),
(21, 'Haroonabad', 59, '62100'),
(22, 'Minchinabad', 59, '62230'),
(23, 'Ahmadpur East', 60, '63350'),
(24, 'Bahawalpur City', 60, '63100'),
(25, 'Bahawalpur Saddar', 60, '63080'),
(26, 'Hasilpur', 60, '63000'),
(27, 'Khairpur Tamewali', 60, '63060'),
(28, 'Yazman', 60, '63210'),
(29, 'Barang', 119, '18650'),
(30, 'Bar Chamer Kand', 119, '18650'),
(31, 'Khar Bajaur', 119, '18650'),
(32, 'Mamund', 119, '18650'),
(33, 'Nawagai', 119, '18650'),
(34, 'Salarzai', 119, '18650'),
(35, 'Utmankhel?', 119, '18650'),
(36, 'Bannu', 34, '28100'),
(37, 'Domel', 34, '28010'),
(38, 'Barkhan', 2, '84400'),
(39, 'Allai', 35, '21040'),
(40, 'Batagram', 35, '21040'),
(41, 'Bhakkar', 61, '30000'),
(42, 'Darya Khan', 61, '30100'),
(43, 'Kalur Kot', 61, '30140'),
(44, 'Mankera', 61, '30060'),
(45, 'Daggar Buner', 36, '19290'),
(46, 'Gagra', 36, '19290'),
(47, 'Khado Khel', 36, '19290'),
(48, 'Mandanr', 36, '19290'),
(49, 'Chagai', 4, '95100'),
(50, 'Dalbandin', 4, '95100'),
(51, 'Nokundi', 4, '95050'),
(52, 'Taftan', 4, '95000'),
(53, 'Chakwal', 62, '48800'),
(54, 'Choa Saidan Shah', 62, '48320'),
(55, 'Kallar Kahar', 62, '48530'),
(56, 'Lawa', 62, '48250'),
(57, 'Talagang', 62, '48100'),
(58, 'Charsadda', 37, '24420'),
(59, 'Shabqadar', 37, '24630'),
(60, 'Tangi', 37, '24540'),
(61, 'Bhawana', 63, '35350'),
(62, 'Chiniot', 63, '35400'),
(63, 'Lalian', 63, '35470'),
(64, 'Chitral', 38, '17200'),
(65, 'Mastuj', 38, '17020'),
(66, 'Dadu', 95, '76200'),
(67, 'Johi', 95, '76190'),
(68, 'Khairpur Nathan Shah', 95, '76260'),
(69, 'Mehar', 95, '76330'),
(70, 'Baiker', 5, '80100'),
(71, 'Dera Bugti', 5, '80100'),
(72, 'Loti', 5, '80100'),
(73, 'Malam', 5, ''),
(74, 'Phelawagh', 5, ''),
(75, 'Pir Koh', 5, '80101'),
(76, 'Sangsillah', 5, ''),
(77, 'Sui', 5, '80000'),
(78, 'De excluded area of Dera Ghazi Khan', 64, '32200'),
(79, 'Dera Ghazi Khan', 64, '32200'),
(80, 'Kot Chutta', 64, '32350'),
(81, 'Taunsa', 64, '32100'),
(82, 'Daraban', 39, '29310'),
(83, 'Dera Ismail Khan', 39, '29050'),
(84, 'Kulachi', 39, '29350'),
(85, 'Paharpur', 39, '29160'),
(86, 'Paroa', 39, '29230'),
(87, 'Chak Jhumra', 65, '37700'),
(88, 'Faisalabad City', 65, '38000'),
(89, 'Faisalabad Saddar', 65, '38000'),
(90, 'Jaranwala', 65, ''),
(91, 'Samundri', 65, '37300'),
(92, 'Tandlianwala', 65, '37150'),
(93, 'Frontier Region Bannu', 126, '28100'),
(94, 'Frontier Region Dera Ismail Khan', 127, '29050'),
(95, 'Frontier Region Kohat', 128, '26111'),
(96, 'Frontier Region Lakki Marwat', 129, ''),
(97, 'Frontier Region Peshawar', 130, ''),
(98, 'Frontier Region Tank', 131, ''),
(99, 'Daharki', 96, '65010'),
(100, 'Ghotki', 96, '65110'),
(101, 'Khangarh', 96, '34350'),
(102, 'Mirpur Mathelo', 96, '65040'),
(103, 'Ubauro', 96, '65030'),
(104, 'Gujranwala City', 66, '52250'),
(105, 'Gujranwala Saddar', 66, '52230'),
(106, 'Kamoki', 66, '50661'),
(107, 'Nowshera Virkan', 66, '52370'),
(108, 'Wazirabad', 66, '52000'),
(109, 'Gujrat', 67, '50700'),
(110, 'Kharian', 67, '50090'),
(111, 'Sarai Alamgir', 67, '50000'),
(112, 'Gwadar', 6, '91200'),
(113, 'Jiwani', 6, '91100'),
(114, 'Ormara', 6, '91400'),
(115, 'Pasni', 6, '91300'),
(116, 'Suntsar', 6, ''),
(117, 'Hafizabad', 68, ''),
(118, 'Pindi Bhattian', 68, '52180'),
(119, 'Hangu', 40, '26190'),
(120, 'Tall', 40, '18001'),
(121, 'Ghazi', 41, '22861'),
(122, 'Haripur', 41, '22620'),
(123, 'Harnai', 7, '82300'),
(124, 'Khoast', 7, '82401'),
(125, 'Shahrig', 7, ''),
(126, 'Hyderabad', 97, '71000'),
(127, 'Hyderabad City', 97, '71500'),
(128, 'Latifabad', 97, '71800'),
(129, 'Qasimabad', 97, '71100'),
(130, 'Islamabad', 152, '44000'),
(131, 'Garhi Khairo', 98, '79050'),
(132, 'Jacobabad', 98, '79000'),
(133, 'Thul', 98, '79100'),
(134, 'Gandhaka', 8, ''),
(135, 'Jhat Pat', 8, ''),
(136, 'Usta Muhammad', 8, ''),
(137, 'Kotri', 99, '76000'),
(138, 'Manjhand', 99, ''),
(139, 'Sehwan', 99, '76140'),
(140, 'Thano Bula Khan', 99, '76050'),
(141, 'Gandawa', 9, '81050'),
(142, 'Jhal Magsi', 9, '81100'),
(143, 'Mirpur', 9, '10250'),
(144, '18 Hazari', 69, '35180'),
(145, 'Ahmadpur Sial', 69, '35090'),
(146, 'Jhang', 69, '35200'),
(147, 'Shorkot', 69, '35010'),
(148, 'Dina', 70, '49400'),
(149, 'Jhelum', 70, '49600'),
(150, 'Pind Dadan Khan', 70, '49040'),
(151, 'Sohawa', 70, '49320'),
(152, 'Balanari', 3, ''),
(153, 'Dhadar', 3, '81400'),
(154, 'Khattan', 3, '89170'),
(155, 'Mach', 3, ''),
(156, 'Sanni', 3, ''),
(157, 'Gazg', 10, ''),
(158, 'Johan', 10, ''),
(159, 'Kalat', 10, ''),
(160, 'Mangochar', 10, ''),
(161, 'Surab', 10, ''),
(162, 'Gulberg', 101, '75950'),
(163, 'Liaquatabad', 101, '74600'),
(164, 'Nazimabad', 101, '74600'),
(165, 'New Karachi', 101, '75850'),
(166, 'North Nazimabad', 101, '74600'),
(167, 'Faisal Cantonment', 100, '75230'),
(168, 'Ferozabad', 100, ''),
(169, 'Gulshan-e-Iqbal', 100, '75300'),
(170, 'Gulzar-e-Hijri', 100, '75330'),
(171, 'Jamshed Quarters', 100, '74800'),
(172, 'Aram Bagh', 100, '75700?'),
(173, 'Civil Line', 100, '75530'),
(174, 'Clifton Cantonment', 100, '75600'),
(175, 'Garden', 100, '74550'),
(176, 'Karachi Cantonment', 100, '75530'),
(177, 'Lyari', 100, '74660'),
(178, 'Saddar', 100, '74400'),
(179, 'Baldia', 100, '75760'),
(180, 'Harbour', 100, ''),
(181, 'Mango Pir', 100, '75890?'),
(182, 'Manora Cantonment', 100, '75640'),
(183, 'Mauripur', 100, '74780'),
(184, 'Mominabad', 100, '62380'),
(185, 'Orangi', 100, '75800'),
(186, 'Sindh Industrial Trading Estate', 100, '75600'),
(187, 'Banda Daud Shah', 42, '26400'),
(188, 'Karak', 42, '27200'),
(189, 'Takht-e-Nasriti', 42, '27400'),
(190, 'Kandhkot', 102, '79160'),
(191, 'Kashmore', 102, '79200'),
(192, 'Tangwani', 102, '79150'),
(193, 'Chunian', 71, '55220'),
(194, 'Kasur', 71, '55050'),
(195, 'Kot Radha Kishan', 71, '55180'),
(196, 'Pattoki', 71, '55300'),
(197, 'Balnigor', 11, ''),
(198, 'Buleda', 11, '92800'),
(199, 'Dasht', 11, ''),
(200, 'Hoshab', 11, ''),
(201, 'Kech?(Turbat)', 11, ''),
(202, 'Mand', 11, ''),
(203, 'Tump', 11, ''),
(204, 'Zamuran', 11, ''),
(205, 'Faiz Ganj', 103, '66070'),
(206, 'Gambat', 103, ''),
(207, 'Khairpur', 103, ''),
(208, 'Kingri', 103, ''),
(209, 'Kot Diji', 103, ''),
(210, 'Mirwah', 103, '66150'),
(211, 'Nara', 103, ''),
(212, 'SOBHO DERA', 103, '66110'),
(213, 'Piryalo', 72, '66000'),
(214, 'Kabirwala', 72, ''),
(215, 'Khanewal', 72, ''),
(216, 'Mian Channu', 72, '58000'),
(217, 'Kharan', 12, ''),
(218, 'Sar Kharan', 12, ''),
(219, 'Tohumulk', 12, ''),
(220, 'KHUSHAB G.P.O.', 73, ''),
(221, 'HUSSAIN ABAD', 73, '41010'),
(222, 'Girote', 73, '41020'),
(223, 'Khura', 73, '41022'),
(224, 'Chowk Girote', 14, '41024'),
(225, 'Padhrar', 14, '41060'),
(226, 'Mastung Road', 14, '88100'),
(227, 'Mastung', 14, '88200'),
(228, 'Kalat', 14, '88300'),
(229, 'Nichara', 14, '88350'),
(230, 'Zehri', 14, '88450'),
(231, 'Wadh', 14, '89250'),
(232, 'Pidran', 14, '88360'),
(233, 'Bara Fort', 120, '24800'),
(234, 'Jamrud', 120, '24730'),
(235, 'Landi Kotal', 120, '24740'),
(236, 'Warsak Colony', 120, '24680'),
(237, 'Musa Zai', 15, '24360'),
(238, 'Daud Zai', 15, '24400'),
(239, 'Chamkani', 15, '24350'),
(240, 'Killa Abdullah', 15, ''),
(241, 'Baddini', 16, ''),
(242, 'Kan Mehtarzai', 16, ''),
(243, 'Killa Saifullah', 16, ''),
(244, 'Loiband', 16, ''),
(245, 'Muslim Bagh', 16, ''),
(246, 'Shinki', 16, ''),
(247, 'Kohat', 43, '26000'),
(248, 'Lachi', 43, '26360'),
(249, 'Dassu', 44, ''),
(250, 'Kandia', 44, ''),
(251, 'Palas', 44, ''),
(252, 'Pattan', 44, ''),
(253, 'Grisani', 13, ''),
(254, 'Kahan', 13, ''),
(255, 'Kohlu', 13, ''),
(256, 'Mawand', 13, ''),
(257, 'Tamboo', 13, ''),
(258, 'Korangi G.P.O.', 101, '74900'),
(259, 'Port Qasim', 101, '75020'),
(260, 'Malir City', 101, '75050'),
(261, 'Malir Colony', 101, '75070'),
(262, 'Central Kurram Frontier Region', 121, ''),
(263, 'Lower Kurram', 121, ''),
(264, 'Upper Kurram', 121, ''),
(265, 'Lahore Cantt. G.P.O.', 74, '54810'),
(266, 'LAHORE G.P.O', 74, '54000'),
(267, 'Model Town', 74, '54700'),
(268, 'Riawand', 74, '55150'),
(269, 'Shalimar', 74, ''),
(270, 'Lakki Marwat Hpo', 45, '28420'),
(271, 'Sarai Naurang', 45, '28350'),
(272, 'Bakrani Village', 104, '77110'),
(273, 'Dokri', 104, '77060'),
(274, 'Larkana', 104, '77150'),
(275, 'Rato Dera', 104, '77380'),
(276, 'Bela', 17, ''),
(277, 'Dureji', 17, ''),
(278, 'Gadani', 17, ''),
(279, 'Hub', 17, ''),
(280, 'Kanraj', 17, ''),
(281, 'Lakhra', 17, ''),
(282, 'Liari', 17, ''),
(283, 'Sonmiani Winder', 17, ''),
(284, 'Uthal', 17, ''),
(285, 'Chaubara', 75, '31500'),
(286, 'Karor', 75, '31100'),
(287, 'Layyah', 75, '31200'),
(288, 'Bhag', 31, ''),
(289, 'Lehri', 31, ''),
(290, 'Dunyapur', 76, ''),
(291, 'Kahror Pacca', 76, ''),
(292, 'Lodhran', 76, ''),
(293, 'Murgha', 18, '85100'),
(294, 'Dukki', 18, '84200'),
(295, 'Loralai', 18, '84800'),
(296, 'Zhob', 18, '85200'),
(297, 'Adenzai', 46, ''),
(298, 'Lal Qilla', 46, '18350'),
(299, 'Samarbagh', 46, '18600'),
(300, 'Timergara', 46, '18300'),
(301, 'Sam Ranizai', 47, ''),
(302, 'Swat Ranizai', 47, ''),
(303, 'Airport', 101, ''),
(304, 'Bin Qasim', 101, ''),
(305, 'Gadap', 101, ''),
(306, 'Ibrahim Hyderi', 101, ''),
(307, 'Korangi Creek Cantonment', 101, '75190'),
(308, 'Malir Cantonment', 101, '75070'),
(309, 'Murad Memon Goth (Kp-974)', 101, '75040'),
(310, 'Shah Mureed', 101, ''),
(311, 'Malakwal', 77, ''),
(312, 'Mandi Bahauddin G. P. O.', 77, '50400'),
(313, 'Phalia', 77, '50430'),
(314, 'Balakot', 48, '21230'),
(315, 'Mansehra', 48, '21300'),
(316, 'Oghi', 48, '21400'),
(317, 'Katlang', 49, '23240'),
(318, 'Mardan', 49, '23200'),
(319, 'Mastuge', 49, '17020'),
(320, 'Dasht', 19, ''),
(321, 'Khad Koocha', 19, ''),
(322, 'Kirdgap', 19, ''),
(323, 'Mastung', 19, '88200'),
(324, 'Hala', 105, '70120'),
(325, 'Matiari', 105, '70150'),
(326, 'Saeedabad', 105, ''),
(327, 'Isakhel', 78, '42430'),
(328, 'Mianwali', 78, '42200'),
(329, 'Piplan', 78, ''),
(330, 'Digri', 106, '69330'),
(331, 'Hussain Bux Mari', 106, ''),
(332, 'Jhudo', 106, '69310'),
(333, 'Kot Ghulam Muhammad', 106, '69340'),
(334, 'Mirpur Khas', 106, '69000'),
(335, 'Shujaabad', 106, '59220'),
(336, 'Tabhri', 106, '69091'),
(337, 'Halimzai', 122, ''),
(338, 'Pindiali', 122, ''),
(339, 'Pringhar', 122, ''),
(340, 'Safi', 122, ''),
(341, 'Upper Mohmand', 122, ''),
(342, 'Utman Khely', 122, ''),
(343, 'Yake Ghund', 122, ''),
(344, 'Jalalpur Pirwala', 79, '59250'),
(345, 'Multan City', 79, '60000'),
(346, 'Multan Saddar', 79, ''),
(347, 'Shujabad', 79, '59220'),
(348, 'Drug', 20, ''),
(349, 'Kingri', 20, ''),
(350, 'Musakhel', 20, '42210'),
(351, 'Alipur', 80, '34450'),
(352, 'Jatoi', 80, '34430'),
(353, 'Kot Addu', 80, '34050'),
(354, 'Muzaffargarh', 80, '34200'),
(355, 'Nankana Sahib', 82, ''),
(356, 'Sangla Hill', 82, ''),
(357, 'Shahkot', 82, ''),
(358, 'Narowal', 81, '51600'),
(359, 'Shakargarh', 81, '51800'),
(360, 'Zafarwal', 81, '51670'),
(361, 'Baba Kot', 21, ''),
(362, 'Chattar', 21, ''),
(363, 'D.M. Jamali', 21, ''),
(364, 'Tamboo', 21, ''),
(365, 'Bhiria', 107, ''),
(366, 'Kandiaro', 107, ''),
(367, 'Mehrabpur', 107, ''),
(368, 'Moro', 107, ''),
(369, 'Naushahro Feroze', 107, ''),
(370, 'Datta Khel', 123, ''),
(371, 'Dossali', 123, ''),
(372, 'Garyum', 123, ''),
(373, 'Ghulam Khan', 123, ''),
(374, 'Mir Ali', 123, ''),
(375, 'Miran Shah', 123, ''),
(376, 'Razmak', 123, ''),
(377, 'Shewa', 123, ''),
(378, 'Spinwam', 123, ''),
(379, 'Jehangira', 50, ''),
(380, 'Nowshera', 50, '24100'),
(381, 'Pabbi', 50, '24210'),
(382, 'Nushki', 22, ''),
(383, 'Depalpur', 83, '56180'),
(384, 'Okara', 83, '56300'),
(385, 'Renala Khurd', 83, '56130'),
(386, 'Central', 124, ''),
(387, 'Ismailzai', 124, ''),
(388, 'Lower', 124, ''),
(389, 'Upper', 124, ''),
(390, 'Arifwala', 84, ''),
(391, 'Pakpattan', 84, ''),
(392, 'Gichk', 23, ''),
(393, 'Gowargo', 23, ''),
(394, 'Panjgur', 23, ''),
(395, 'Parome', 23, ''),
(396, 'Peshawar', 51, '25000'),
(397, 'Barshore', 24, ''),
(398, 'Hurramzai', 24, ''),
(399, 'Karezat', 24, ''),
(400, 'Pishin', 24, ''),
(401, 'Saranan', 24, ''),
(402, 'Kambar Ali Khan', 109, ''),
(403, 'Miro Khan', 109, ''),
(404, 'Nasirabad', 109, ''),
(405, 'Qubo Saeed Khan', 109, ''),
(406, 'Shahdadkot', 109, ''),
(407, 'Sujawal Junejo', 109, ''),
(408, 'Warah', 109, ''),
(409, 'Panj Pai', 25, ''),
(410, 'Quetta City', 25, '87300'),
(411, 'Quetta Sadar', 25, ''),
(412, 'Khanpur', 85, ''),
(413, 'Liaquatpur', 85, ''),
(414, 'Rahim Yar Khan', 85, ''),
(415, 'Sadiqabad', 85, ''),
(416, 'De excluded area of Rajanpur', 86, ''),
(417, 'Jampur', 86, ''),
(418, 'Rajanpur', 86, ''),
(419, 'Rojhan', 86, ''),
(420, 'Gujar Khan', 87, ''),
(421, 'Kahuta', 87, '47330'),
(422, 'Kallar Sayyedan', 87, '47520'),
(423, 'Kotli Sattian', 87, '47260'),
(424, 'Murree Brewary', 87, '46120'),
(425, 'Rawalpindi', 87, '46000'),
(426, 'Taxila', 87, ''),
(427, 'Chichawatni', 88, '57200'),
(428, 'Sahiwal', 88, '57000'),
(429, 'Jam Nawaz Ali', 110, '68070'),
(430, 'Khipro', 110, '68330'),
(431, 'Sanghar', 110, '68100'),
(432, 'Shahdadpur', 110, '68030'),
(433, 'Sinjhoro', 110, '68220'),
(434, 'Tando Adam', 110, '68050'),
(435, 'Bhalwal', 89, '40410'),
(436, 'Bhera', 89, '40540'),
(437, 'Kot Momin', 89, ''),
(438, 'Sahiwal', 89, '57000'),
(439, 'Sargodha', 89, '40100'),
(440, 'Shahpur', 89, ''),
(441, 'Sillanwali', 89, ''),
(442, 'Daur', 153, ''),
(443, 'Kazi Ahmedy', 153, ''),
(444, 'Nawabshah', 153, ''),
(445, 'Sakrand', 153, ''),
(446, 'Alpuri', 52, ''),
(447, 'Besham', 52, ''),
(448, 'Puran', 52, ''),
(449, 'Sheeraniy', 26, ''),
(450, 'Ferozewala', 90, ''),
(451, 'Muridke', 90, ''),
(452, 'Safdarabad', 90, '39540'),
(453, 'Sharkpur', 90, ''),
(454, 'Sheikhupura', 90, ''),
(455, 'Garhi Yasin', 112, ''),
(456, 'Khanpur', 112, ''),
(457, 'Lakhi', 112, ''),
(458, 'Shikarpur', 112, ''),
(459, 'Daska', 91, ''),
(460, 'Pasrur', 91, ''),
(461, 'Sambrial', 91, ''),
(462, 'Sialkot', 91, ''),
(463, 'Kotmandai', 27, ''),
(464, 'Sangan', 27, ''),
(465, 'Sibi', 27, ''),
(466, 'Faridabad', 32, ''),
(467, 'Sanhri', 32, ''),
(468, 'Sohbatpur', 32, ''),
(469, 'Birmal', 125, ''),
(470, 'Ladha', 125, ''),
(471, 'Makin? Charlai', 125, ''),
(472, 'Sararogha', 125, ''),
(473, 'Sarwekai', 125, ''),
(474, 'Tiarza', 125, ''),
(475, 'Toi Khullah', 125, ''),
(476, 'Wana', 125, ''),
(477, 'Jati', 111, ''),
(478, 'Kharo Chan', 111, ''),
(479, 'Mirpur Bathoro', 111, ''),
(480, 'Shah Bunder', 111, ''),
(481, 'Sujawal', 111, ''),
(482, 'New Sukkur', 113, ''),
(483, 'Pano Aqil', 113, ''),
(484, 'Rohri', 113, ''),
(485, 'Salehpat', 113, ''),
(486, 'Sukkur City', 113, ''),
(487, 'Lahor', 53, ''),
(488, 'Rzzar', 53, ''),
(489, 'Swabi', 53, ''),
(490, 'Topi', 53, ''),
(491, 'Babuzai', 54, ''),
(492, 'Bari Kot', 54, ''),
(493, 'Behrain', 54, ''),
(494, 'Charbagh', 54, ''),
(495, 'Kabal', 54, ''),
(496, 'Khawaza Khela', 54, ''),
(497, 'Matta', 54, ''),
(498, 'Chamber', 114, ''),
(499, 'Jhando Mari', 114, ''),
(500, 'Tando Allahyar', 114, ''),
(501, 'Bulri Shah Karim', 115, ''),
(502, 'Tando Ghulam Hyder', 115, ''),
(503, 'Tando Muhammad Khan', 115, ''),
(504, 'Tank', 55, ''),
(505, 'Chachro', 116, ''),
(506, 'Dahli', 116, ''),
(507, 'Diplo', 116, ''),
(508, 'Islamkot', 116, ''),
(509, 'Kaloi', 116, ''),
(510, 'Mithi', 116, ''),
(511, 'Nagar Parkar', 116, ''),
(512, 'Ghorabari', 117, ''),
(513, 'Keti Bunder', 117, ''),
(514, 'Mirpur Sakro', 117, ''),
(515, 'Thatta', 117, ''),
(516, 'Gojra', 92, ''),
(517, 'Kamalia', 92, ''),
(518, 'Pir Mahal', 92, ''),
(519, 'Toba Tek Singh', 92, ''),
(520, 'Judba', 56, ''),
(521, 'Khander', 56, ''),
(522, 'Kunri', 118, ''),
(523, 'Pithoro', 118, ''),
(524, 'Samaro', 118, ''),
(525, 'Umerkot', 118, ''),
(526, 'Dir', 57, ''),
(527, 'Shringal', 57, ''),
(528, 'Wari', 57, ''),
(529, 'Burewala', 93, ''),
(530, 'Mailsi', 93, ''),
(531, 'Vehari', 93, ''),
(532, 'Besima', 28, ''),
(533, 'Musakhel', 28, ''),
(534, 'Nag', 28, ''),
(535, 'Shahoo Garhi', 28, ''),
(536, 'Washuk', 28, ''),
(537, 'Ashwat', 29, ''),
(538, 'Kashatoo', 29, ''),
(539, 'Qamar Din Karez', 29, ''),
(540, 'Sambaza', 29, ''),
(541, 'Zhob', 29, ''),
(542, 'Sinjawi', 30, ''),
(543, 'Ziarat', 30, '');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `cls_Id` int(10) NOT NULL COMMENT 'Class Id',
  `class` varchar(30) NOT NULL COMMENT 'Class Name',
  `numeric_name` varchar(255) NOT NULL,
  `no_of_period` varchar(255) NOT NULL,
  `tuition_fee` varchar(255) NOT NULL,
  `sub_Id` int(10) DEFAULT NULL COMMENT 'Subjects assigned to a class',
  `subject` varchar(255) NOT NULL,
  `sc_sec_Id` int(10) NOT NULL COMMENT 'School Section Id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`cls_Id`, `class`, `numeric_name`, `no_of_period`, `tuition_fee`, `sub_Id`, `subject`, `sc_sec_Id`) VALUES
(1, 'One', '1', '4', '2000', NULL, '9,11,12,13', 10),
(2, 'Two3', '2', '4', '2500', NULL, '9,11,12,13', 10),
(4, 'Four', '4', '6', '3500', NULL, '9,11,12,13,16', 10),
(5, 'Five', '5', '5', '4000', NULL, '9,11,12,13,18', 10),
(6, 'Six', '6', '6', '5000', NULL, '8,11,12,13,16,18', 4),
(7, 'Seven', '7', '6', '5500', NULL, '8,9,10,11,12,13', 4),
(8, 'Eight', '8', '8', '5000', NULL, '7,8,9,10,11,12,13,15', 4),
(12, 'Nine', '9', '8', '2000', NULL, '7,9,11,12,13,16,17,18', 3),
(13, 'Ten', '10', '8', '6000', NULL, '7,8,9,10,11,12,13,15', 3),
(14, 'Pre', '0', '5', '2000', NULL, '7,8', 3),
(15, 'Three', '3', '5', '2000', NULL, '8,12', 10);

-- --------------------------------------------------------

--
-- Table structure for table `class-rep`
--

CREATE TABLE `class-rep` (
  `crep_Id` int(10) NOT NULL COMMENT 'Class Rep Id',
  `std_Id` int(10) DEFAULT NULL COMMENT 'Student Id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `classsched`
--

CREATE TABLE `classsched` (
  `id` int(10) NOT NULL,
  `cls_Id` int(10) DEFAULT NULL,
  `c_section_Id` int(10) DEFAULT NULL,
  `session` varchar(765) DEFAULT NULL,
  `status` varchar(765) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classsched`
--

INSERT INTO `classsched` (`id`, `cls_Id`, `c_section_Id`, `session`, `status`) VALUES
(9, 2, 7, NULL, NULL),
(10, 1, 20, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `classsched_days`
--

CREATE TABLE `classsched_days` (
  `id` int(11) NOT NULL,
  `classsched_id` int(10) DEFAULT NULL,
  `day` int(11) NOT NULL,
  `peroid` int(11) NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `emp_Id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classsched_days`
--

INSERT INTO `classsched_days` (`id`, `classsched_id`, `day`, `peroid`, `time_start`, `time_end`, `emp_Id`, `subject_id`) VALUES
(53, 9, 1, 1, '09:10:00', '09:30:00', 18, 9),
(54, 9, 2, 1, '09:10:00', '09:30:00', 18, 9),
(55, 9, 3, 1, '09:10:00', '09:30:00', 18, 9),
(56, 9, 4, 1, '09:10:00', '09:30:00', 18, 9),
(57, 9, 5, 1, '09:10:00', '09:30:00', 18, 9),
(58, 10, 1, 1, '09:10:00', '09:30:00', 49, 11),
(59, 10, 2, 1, '09:10:00', '09:30:00', 49, 11),
(60, 10, 1, 2, '09:30:00', '10:00:00', 49, 11);

-- --------------------------------------------------------

--
-- Table structure for table `classwise_achievement`
--

CREATE TABLE `classwise_achievement` (
  `id` bigint(100) NOT NULL,
  `att_typ_Id` int(10) DEFAULT NULL COMMENT 'Attendance type''s ID',
  `cls_Id` int(10) DEFAULT NULL COMMENT 'Class ID',
  `c_section_Id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `std_Id` int(11) DEFAULT NULL,
  `achievement_type` int(11) DEFAULT NULL,
  `activities_id` int(11) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classwise_achievement`
--

INSERT INTO `classwise_achievement` (`id`, `att_typ_Id`, `cls_Id`, `c_section_Id`, `date`, `std_Id`, `achievement_type`, `activities_id`, `comments`) VALUES
(10, 3, 2, 7, '2021-10-04', 25, 1, 1, 'dsadsada'),
(11, 3, 2, 7, '2021-10-08', 25, 1, 1, 'achemenet'),
(12, 3, 2, 7, '2021-11-11', 25, 1, 2, 'sasa');

-- --------------------------------------------------------

--
-- Table structure for table `classwise_attendace`
--

CREATE TABLE `classwise_attendace` (
  `cls_att_Id` bigint(100) NOT NULL COMMENT 'Classwise Attendance ID',
  `att_typ_Id` int(10) DEFAULT NULL COMMENT 'Attendance type''s ID',
  `cls_Id` int(10) DEFAULT NULL COMMENT 'Class ID',
  `c_section_Id` int(11) DEFAULT NULL,
  `date_register` date DEFAULT NULL,
  `std_Id` int(11) DEFAULT NULL,
  `attendance` text DEFAULT NULL,
  `sub_Id` int(10) DEFAULT NULL COMMENT 'Subjectwise attendance ID',
  `cls_att_Status` enum('Active','Inactive') DEFAULT NULL COMMENT 'Status of class attendance'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classwise_attendace`
--

INSERT INTO `classwise_attendace` (`cls_att_Id`, `att_typ_Id`, `cls_Id`, `c_section_Id`, `date_register`, `std_Id`, `attendance`, `sub_Id`, `cls_att_Status`) VALUES
(156, 1, 2, 7, '2021-09-27', 28, 'A', NULL, NULL),
(157, 1, 2, 7, '2021-09-27', 25, 'A', NULL, NULL),
(158, 1, 2, 7, '2021-09-28', 28, 'P', NULL, NULL),
(160, 1, 2, 7, '2021-09-28', 25, 'A', NULL, NULL),
(163, 1, 2, 7, '2021-09-29', 28, 'H', NULL, NULL),
(164, 1, 2, 7, '2021-09-29', 25, 'A', NULL, NULL),
(172, 1, 2, 7, '2021-10-01', 25, 'P', NULL, NULL),
(173, 1, 2, 7, '2021-10-01', 28, 'H', NULL, NULL),
(176, 1, 2, 7, '2021-10-04', 25, 'P', NULL, NULL),
(177, 1, 2, 7, '2021-10-08', 25, 'P', NULL, NULL),
(179, 1, 2, 7, '2021-10-08', 28, 'H', NULL, NULL),
(180, 1, 2, 7, '2021-11-11', 25, 'A', NULL, NULL),
(182, 1, 2, 7, '2021-11-11', 28, 'A', NULL, NULL),
(183, 1, 1, 19, '2021-11-22', 6, 'A', NULL, NULL),
(184, 1, 1, 19, '2021-12-14', 6, 'A', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `classwise_behaviour`
--

CREATE TABLE `classwise_behaviour` (
  `id` bigint(100) NOT NULL,
  `att_typ_Id` int(10) DEFAULT NULL COMMENT 'Attendance type''s ID',
  `cls_Id` int(10) DEFAULT NULL COMMENT 'Class ID',
  `c_section_Id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `std_Id` int(11) DEFAULT NULL,
  `behaviour_type` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 0 COMMENT 'Status of class Bevahour',
  `activities_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classwise_behaviour`
--

INSERT INTO `classwise_behaviour` (`id`, `att_typ_Id`, `cls_Id`, `c_section_Id`, `date`, `std_Id`, `behaviour_type`, `status`, `activities_id`, `location_id`, `comments`) VALUES
(52, 2, 2, 7, '2021-09-29', 25, 1, 1, 1, 1, NULL),
(58, 2, 2, 7, '2021-10-01', 25, 1, 1, 1, 1, NULL),
(59, 2, 2, 7, '2021-10-01', 28, 1, 1, 1, 1, NULL),
(65, 2, 2, 7, '2021-10-04', 25, 1, 1, 1, 1, 'sasasa'),
(66, 2, 2, 7, '2021-10-08', 25, 1, 1, 1, 1, 'teacher'),
(73, 2, 2, 7, '2021-11-11', 25, 1, 1, 2, 2, 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `class_section`
--

CREATE TABLE `class_section` (
  `c_section_Id` int(10) NOT NULL COMMENT 'Section ID',
  `class_section_name` varchar(10) NOT NULL COMMENT 'Name of the class section',
  `crep_Id` int(11) DEFAULT NULL,
  `students` varchar(255) DEFAULT NULL,
  `cls_Id` int(10) NOT NULL,
  `no_of_student` varchar(50) DEFAULT '0',
  `emp_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_section`
--

INSERT INTO `class_section` (`c_section_Id`, `class_section_name`, `crep_Id`, `students`, `cls_Id`, `no_of_student`, `emp_Id`) VALUES
(7, 'A', NULL, '2,3,5', 2, '2', 18),
(8, 'z', NULL, '', 1, '1', 17),
(11, 'A', 7, '7', 4, '1', 12),
(12, 'F', 2, '2', 2, '1', 16),
(16, 'D', 2, '2', 2, '1', 14),
(17, 'Z', 5, '5', 2, '1', 13),
(18, 'F', 25, '25', 2, '1', 7),
(19, 'Z', 6, '6', 1, '1', 9),
(20, 'A', 48, '48', 1, '1', 49);

-- --------------------------------------------------------

--
-- Table structure for table `datesheet`
--

CREATE TABLE `datesheet` (
  `dsheet_Id` bigint(100) NOT NULL,
  `exam_Id` bigint(100) DEFAULT NULL,
  `date_sheet` text NOT NULL,
  `date` date DEFAULT NULL,
  `cls_Id` int(10) DEFAULT NULL,
  `sub_Id` int(10) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `room_Id` int(10) DEFAULT NULL,
  `emp_Id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datesheet`
--

INSERT INTO `datesheet` (`dsheet_Id`, `exam_Id`, `date_sheet`, `date`, `cls_Id`, `sub_Id`, `start_time`, `end_time`, `room_Id`, `emp_Id`) VALUES
(16, 13, '', '2021-12-07', 1, 9, '15:26:00', '18:29:00', NULL, NULL),
(17, 13, '', '2021-12-08', 1, 11, '15:26:00', '18:29:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Monday', '2021-09-16 04:36:13', '2021-09-29 04:36:13'),
(2, 'Tuesday', '2021-09-16 04:36:13', '2021-09-29 04:36:13'),
(3, 'Wednesday', '2021-09-16 04:36:13', '2021-09-29 04:36:13'),
(4, 'Thursday', '2021-09-16 04:36:13', '2021-09-29 04:36:13'),
(5, 'Friday', '2021-09-16 04:36:13', '2021-09-29 04:36:13'),
(6, 'Saturday', '2021-09-16 04:36:13', '2021-09-29 04:36:13');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `desig_Id` int(10) NOT NULL COMMENT 'Designation ID',
  `designation` varchar(255) DEFAULT NULL COMMENT 'Designation Name',
  `desig_Status` enum('Active','Inactive') NOT NULL COMMENT 'Designation Status',
  `emp_typ_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`desig_Id`, `designation`, `desig_Status`, `emp_typ_Id`) VALUES
(1, 'accountant', 'Active', 2),
(2, 'actor', 'Active', 2),
(3, 'actuary', 'Active', 2),
(4, 'adhesive bonding machine tender', 'Active', 2),
(5, 'adjudicator', 'Active', 2),
(6, 'administrative assistant', 'Active', 2),
(7, 'administrative services manager', 'Active', 2),
(8, 'adult education teacher', 'Active', 1),
(9, 'advertising manager', 'Active', 2),
(10, 'advertising sales agent', 'Active', 2),
(11, 'aerobics instructor', 'Active', 2),
(12, 'aerospace engineer', 'Active', 2),
(13, 'aerospace engineering technician', 'Active', 2),
(14, 'agent', 'Active', 2),
(15, 'agricultural engineer', 'Active', 2),
(16, 'agricultural equipment operator', 'Active', 2),
(17, 'agricultural grader', 'Active', 2),
(18, 'agricultural inspector', 'Active', 2),
(19, 'agricultural manager', 'Active', 2),
(20, 'agricultural sciences teacher', 'Active', 1),
(21, 'agricultural sorter', 'Active', 2),
(22, 'agricultural technician', 'Active', 2),
(23, 'agricultural worker', 'Active', 2),
(24, 'air conditioning installer', 'Active', 2),
(25, 'air conditioning mechanic', 'Active', 2),
(26, 'air traffic controller', 'Active', 2),
(27, 'aircraft cargo handling supervisor', 'Active', 2),
(28, 'aircraft mechanic', 'Active', 2),
(29, 'aircraft service technician', 'Active', 2),
(30, 'airline copilot', 'Active', 2),
(31, 'airline pilot', 'Active', 2),
(32, 'ambulance dispatcher', 'Active', 2),
(33, 'ambulance driver', 'Active', 2),
(34, 'amusement machine servicer', 'Active', 2),
(35, 'anesthesiologist', 'Active', 2),
(36, 'animal breeder', 'Active', 2),
(37, 'animal control worker', 'Active', 2),
(38, 'animal scientist', 'Active', 2),
(39, 'animal trainer', 'Active', 2),
(40, 'animator', 'Active', 2),
(41, 'answering service operator', 'Active', 2),
(42, 'anthropologist', 'Active', 2),
(43, 'apparel patternmaker', 'Active', 2),
(44, 'apparel worker', 'Active', 2),
(45, 'arbitrator', 'Active', 2),
(46, 'archeologist', 'Active', 2),
(47, 'architect', 'Active', 2),
(48, 'architectural drafter', 'Active', 2),
(49, 'architectural manager', 'Active', 2),
(50, 'archivist', 'Active', 2),
(51, 'art director', 'Active', 2),
(52, 'art teacher', 'Active', 1),
(53, 'artist', 'Active', 2),
(54, 'assembler', 'Active', 2),
(55, 'astronomer', 'Active', 2),
(56, 'athlete', 'Active', 2),
(57, 'athletic trainer', 'Active', 2),
(58, 'ATM machine repairer', 'Active', 2),
(59, 'atmospheric scientist', 'Active', 2),
(60, 'attendant', 'Active', 2),
(61, 'audio and video equipment technician', 'Active', 2),
(62, 'audio-visual and multimedia collections specialist', 'Active', 2),
(63, 'audiologist', 'Active', 2),
(64, 'auditor', 'Active', 2),
(65, 'author', 'Active', 2),
(66, 'auto damage insurance appraiser', 'Active', 2),
(67, 'automotive and watercraft service attendant', 'Active', 2),
(68, 'automotive glass installer', 'Active', 2),
(69, 'automotive mechanic', 'Active', 2),
(70, 'avionics technician', 'Active', 2),
(71, 'baggage porter', 'Active', 2),
(72, 'bailiff', 'Active', 2),
(73, 'baker', 'Active', 2),
(74, 'barback', 'Active', 2),
(75, 'barber', 'Active', 2),
(76, 'bartender', 'Active', 2),
(77, 'basic education teacher', 'Active', 1),
(78, 'behavioral disorder counselor', 'Active', 2),
(79, 'bellhop', 'Active', 2),
(80, 'bench carpenter', 'Active', 2),
(81, 'bicycle repairer', 'Active', 2),
(82, 'bill and account collector', 'Active', 2),
(83, 'billing and posting clerk', 'Active', 2),
(84, 'biochemist', 'Active', 2),
(85, 'biological technician', 'Active', 2),
(86, 'biomedical engineer', 'Active', 2),
(87, 'biophysicist', 'Active', 2),
(88, 'blaster', 'Active', 2),
(89, 'blending machine operator', 'Active', 2),
(90, 'blockmason', 'Active', 2),
(91, 'boiler operator', 'Active', 2),
(92, 'boilermaker', 'Active', 2),
(93, 'bookkeeper', 'Active', 2),
(94, 'boring machine tool tender', 'Active', 2),
(95, 'brazer', 'Active', 2),
(96, 'brickmason', 'Active', 2),
(97, 'bridge and lock tender', 'Active', 2),
(98, 'broadcast news analyst', 'Active', 2),
(99, 'broadcast technician', 'Active', 2),
(100, 'brokerage clerk', 'Active', 2),
(101, 'budget analyst', 'Active', 2),
(102, 'building inspector', 'Active', 2),
(103, 'bus mechanic', 'Active', 2),
(104, 'butcher', 'Active', 2),
(105, 'buyer', 'Active', 2),
(106, 'cabinetmaker', 'Active', 2),
(107, 'cafeteria attendant', 'Active', 2),
(108, 'cafeteria cook', 'Active', 2),
(109, 'camera operator', 'Active', 2),
(110, 'camera repairer', 'Active', 2),
(111, 'cardiovascular technician', 'Active', 2),
(112, 'cargo agent', 'Active', 2),
(113, 'carpenter', 'Active', 2),
(114, 'carpet installer', 'Active', 2),
(115, 'cartographer', 'Active', 2),
(116, 'cashier', 'Active', 2),
(117, 'caster', 'Active', 2),
(118, 'ceiling tile installer', 'Active', 2),
(119, 'cellular equipment installer', 'Active', 2),
(120, 'cement mason', 'Active', 2),
(121, 'channeling machine operator', 'Active', 2),
(122, 'chauffeur', 'Active', 2),
(123, 'checker', 'Active', 2),
(124, 'chef', 'Active', 2),
(125, 'chemical engineer', 'Active', 2),
(126, 'chemical plant operator', 'Active', 2),
(127, 'chemist', 'Active', 2),
(128, 'chemistry teacher', 'Active', 1),
(129, 'chief executive', 'Active', 2),
(130, 'child social worker', 'Active', 2),
(131, 'childcare worker', 'Active', 2),
(132, 'chiropractor', 'Active', 2),
(133, 'choreographer', 'Active', 2),
(134, 'civil drafter', 'Active', 2),
(135, 'civil engineer', 'Active', 2),
(136, 'civil engineering technician', 'Active', 2),
(137, 'claims adjuster', 'Active', 2),
(138, 'claims examiner', 'Active', 2),
(139, 'claims investigator', 'Active', 2),
(140, 'cleaner', 'Active', 2),
(141, 'clinical laboratory technician', 'Active', 2),
(142, 'clinical laboratory technologist', 'Active', 2),
(143, 'clinical psychologist', 'Active', 2),
(144, 'coating worker', 'Active', 2),
(145, 'coatroom attendant', 'Active', 2),
(146, 'coil finisher', 'Active', 2),
(147, 'coil taper', 'Active', 2),
(148, 'coil winder', 'Active', 2),
(149, 'coin machine servicer', 'Active', 2),
(150, 'commercial diver', 'Active', 2),
(151, 'commercial pilot', 'Active', 2),
(152, 'commodities sales agent', 'Active', 2),
(153, 'communications equipment operator', 'Active', 2),
(154, 'communications teacher', 'Active', 1),
(155, 'community association manager', 'Active', 2),
(156, 'community service manager', 'Active', 2),
(157, 'compensation and benefits manager', 'Active', 2),
(158, 'compliance officer', 'Active', 2),
(159, 'composer', 'Active', 2),
(160, 'computer hardware engineer', 'Active', 2),
(161, 'computer network architect', 'Active', 2),
(162, 'computer operator', 'Active', 2),
(163, 'computer programmer', 'Active', 2),
(164, 'computer science teacher', 'Active', 1),
(165, 'computer support specialist', 'Active', 2),
(166, 'computer systems administrator', 'Active', 2),
(167, 'computer systems analyst', 'Active', 2),
(168, 'concierge', 'Active', 2),
(169, 'conciliator', 'Active', 2),
(170, 'concrete finisher', 'Active', 2),
(171, 'conservation science teacher', 'Active', 1),
(172, 'conservation scientist', 'Active', 2),
(173, 'conservation worker', 'Active', 2),
(174, 'conservator', 'Active', 2),
(175, 'construction inspector', 'Active', 2),
(176, 'construction manager', 'Active', 2),
(177, 'construction painter', 'Active', 2),
(178, 'construction worker', 'Active', 2),
(179, 'continuous mining machine operator', 'Active', 2),
(180, 'convention planner', 'Active', 2),
(181, 'conveyor operator', 'Active', 2),
(182, 'cook', 'Active', 2),
(183, 'cooling equipment operator', 'Active', 2),
(184, 'copy marker', 'Active', 2),
(185, 'correctional officer', 'Active', 2),
(186, 'correctional treatment specialist', 'Active', 2),
(187, 'correspondence clerk', 'Active', 2),
(188, 'correspondent', 'Active', 2),
(189, 'cosmetologist', 'Active', 2),
(190, 'cost estimator', 'Active', 2),
(191, 'costume attendant', 'Active', 2),
(192, 'counseling psychologist', 'Active', 2),
(193, 'counselor', 'Active', 2),
(194, 'courier', 'Active', 2),
(195, 'court reporter', 'Active', 2),
(196, 'craft artist', 'Active', 2),
(197, 'crane operator', 'Active', 2),
(198, 'credit analyst', 'Active', 2),
(199, 'credit checker', 'Active', 2),
(200, 'credit counselor', 'Active', 2),
(201, 'criminal investigator', 'Active', 2),
(202, 'criminal justice teacher', 'Active', 1),
(203, 'crossing guard', 'Active', 2),
(204, 'curator', 'Active', 2),
(205, 'custom sewer', 'Active', 2),
(206, 'customer service representative', 'Active', 2),
(207, 'cutter', 'Active', 2),
(208, 'cutting machine operator', 'Active', 2),
(209, 'dancer', 'Active', 2),
(210, 'data entry keyer', 'Active', 2),
(211, 'database administrator', 'Active', 2),
(212, 'decorating worker', 'Active', 2),
(213, 'delivery services driver', 'Active', 2),
(214, 'demonstrator', 'Active', 2),
(215, 'dental assistant', 'Active', 2),
(216, 'dental hygienist', 'Active', 2),
(217, 'dental laboratory technician', 'Active', 2),
(218, 'dentist', 'Active', 2),
(219, 'derrick operator', 'Active', 2),
(220, 'designer', 'Active', 2),
(221, 'desktop publisher', 'Active', 2),
(222, 'detective', 'Active', 2),
(223, 'diagnostic medical sonographer', 'Active', 2),
(224, 'die maker', 'Active', 2),
(225, 'diesel engine specialist', 'Active', 2),
(226, 'dietetic technician', 'Active', 2),
(227, 'dietitian', 'Active', 2),
(228, 'dinkey operator', 'Active', 2),
(229, 'director', 'Active', 2),
(230, 'dishwasher', 'Active', 2),
(231, 'dispatcher', 'Active', 2),
(232, 'door-to-door sales worker', 'Active', 2),
(233, 'drafter', 'Active', 2),
(234, 'dragline operator', 'Active', 2),
(235, 'drama teacher', 'Active', 1),
(236, 'dredge operator', 'Active', 2),
(237, 'dressing room attendant', 'Active', 2),
(238, 'dressmaker', 'Active', 2),
(239, 'drier operator', 'Active', 2),
(240, 'drilling machine tool operator', 'Active', 2),
(241, 'dry-cleaning worker', 'Active', 2),
(242, 'drywall installer', 'Active', 2),
(243, 'dyeing machine operator', 'Active', 2),
(244, 'earth driller', 'Active', 2),
(245, 'economics teacher', 'Active', 1),
(246, 'economist', 'Active', 2),
(247, 'editor', 'Active', 2),
(248, 'education administrator', 'Active', 2),
(249, 'electric motor repairer', 'Active', 2),
(250, 'electrical electronics drafter', 'Active', 2),
(251, 'electrical engineer', 'Active', 2),
(252, 'electrical equipment assembler', 'Active', 2),
(253, 'electrical installer', 'Active', 2),
(254, 'electrical power-line installer', 'Active', 2),
(255, 'electrician', 'Active', 2),
(256, 'electro-mechanical technician', 'Active', 2),
(257, 'elementary school teacher', 'Active', 1),
(258, 'elevator installer', 'Active', 2),
(259, 'elevator repairer', 'Active', 2),
(260, 'embalmer', 'Active', 2),
(261, 'emergency management director', 'Active', 2),
(262, 'emergency medical technician', 'Active', 2),
(263, 'engine assembler', 'Active', 2),
(264, 'engineer', 'Active', 2),
(265, 'engineering manager', 'Active', 2),
(266, 'engineering teacher', 'Active', 1),
(267, 'english language teacher', 'Active', 1),
(268, 'engraver', 'Active', 2),
(269, 'entertainment attendant', 'Active', 2),
(270, 'environmental engineer', 'Active', 2),
(271, 'environmental science teacher', 'Active', 1),
(272, 'environmental scientist', 'Active', 2),
(273, 'epidemiologist', 'Active', 2),
(274, 'escort', 'Active', 2),
(275, 'etcher', 'Active', 2),
(276, 'event planner', 'Active', 2),
(277, 'excavating operator', 'Active', 2),
(278, 'executive administrative assistant', 'Active', 2),
(279, 'executive secretary', 'Active', 2),
(280, 'exhibit designer', 'Active', 2),
(281, 'expediting clerk', 'Active', 2),
(282, 'explosives worker', 'Active', 2),
(283, 'extraction worker', 'Active', 2),
(284, 'fabric mender', 'Active', 2),
(285, 'fabric patternmaker', 'Active', 2),
(286, 'fabricator', 'Active', 2),
(287, 'faller', 'Active', 2),
(288, 'family practitioner', 'Active', 2),
(289, 'family social worker', 'Active', 2),
(290, 'family therapist', 'Active', 2),
(291, 'farm advisor', 'Active', 2),
(292, 'farm equipment mechanic', 'Active', 2),
(293, 'farm labor contractor', 'Active', 2),
(294, 'farmer', 'Active', 2),
(295, 'farmworker', 'Active', 2),
(296, 'fashion designer', 'Active', 2),
(297, 'fast food cook', 'Active', 2),
(298, 'fence erector', 'Active', 2),
(299, 'fiberglass fabricator', 'Active', 2),
(300, 'fiberglass laminator', 'Active', 2),
(301, 'file clerk', 'Active', 2),
(302, 'filling machine operator', 'Active', 2),
(303, 'film and video editor', 'Active', 2),
(304, 'financial analyst', 'Active', 2),
(305, 'financial examiner', 'Active', 2),
(306, 'financial manager', 'Active', 2),
(307, 'financial services sales agent', 'Active', 2),
(308, 'fine artist', 'Active', 2),
(309, 'fire alarm system installer', 'Active', 2),
(310, 'fire dispatcher', 'Active', 2),
(311, 'fire inspector', 'Active', 2),
(312, 'fire investigator', 'Active', 2),
(313, 'firefighter', 'Active', 2),
(314, 'fish and game warden', 'Active', 2),
(315, 'fish cutter', 'Active', 2),
(316, 'fish trimmer', 'Active', 2),
(317, 'fisher', 'Active', 2),
(318, 'fitness studies teacher', 'Active', 1),
(319, 'fitness trainer', 'Active', 2),
(320, 'flight attendant', 'Active', 2),
(321, 'floor finisher', 'Active', 2),
(322, 'floor layer', 'Active', 2),
(323, 'floor sander', 'Active', 2),
(324, 'floral designer', 'Active', 2),
(325, 'food batchmaker', 'Active', 2),
(326, 'food cooking machine operator', 'Active', 2),
(327, 'food preparation worker', 'Active', 2),
(328, 'food science technician', 'Active', 2),
(329, 'food scientist', 'Active', 2),
(330, 'food server', 'Active', 2),
(331, 'food service manager', 'Active', 2),
(332, 'food technologist', 'Active', 2),
(333, 'foreign language teacher', 'Active', 1),
(334, 'foreign literature teacher', 'Active', 1),
(335, 'forensic science technician', 'Active', 2),
(336, 'forest fire inspector', 'Active', 2),
(337, 'forest fire prevention specialist', 'Active', 2),
(338, 'forest worker', 'Active', 2),
(339, 'forester', 'Active', 2),
(340, 'forestry teacher', 'Active', 1),
(341, 'forging machine setter', 'Active', 2),
(342, 'foundry coremaker', 'Active', 2),
(343, 'freight agent', 'Active', 2),
(344, 'freight mover', 'Active', 2),
(345, 'fundraising manager', 'Active', 2),
(346, 'funeral attendant', 'Active', 2),
(347, 'funeral director', 'Active', 2),
(348, 'funeral service manager', 'Active', 2),
(349, 'furnace operator', 'Active', 2),
(350, 'furnishings worker', 'Active', 2),
(351, 'furniture finisher', 'Active', 2),
(352, 'gaming booth cashier', 'Active', 2),
(353, 'gaming cage worker', 'Active', 2),
(354, 'gaming change person', 'Active', 2),
(355, 'gaming dealer', 'Active', 2),
(356, 'gaming investigator', 'Active', 2),
(357, 'gaming manager', 'Active', 2),
(358, 'gaming surveillance officer', 'Active', 2),
(359, 'garment mender', 'Active', 2),
(360, 'garment presser', 'Active', 2),
(361, 'gas compressor', 'Active', 2),
(362, 'gas plant operator', 'Active', 2),
(363, 'gas pumping station operator', 'Active', 2),
(364, 'general manager', 'Active', 2),
(365, 'general practitioner', 'Active', 2),
(366, 'geographer', 'Active', 2),
(367, 'geography teacher', 'Active', 1),
(368, 'geological engineer', 'Active', 2),
(369, 'geological technician', 'Active', 2),
(370, 'geoscientist', 'Active', 2),
(371, 'glazier', 'Active', 2),
(372, 'government program eligibility interviewer', 'Active', 2),
(373, 'graduate teaching assistant', 'Active', 1),
(374, 'graphic designer', 'Active', 2),
(375, 'groundskeeper', 'Active', 2),
(376, 'groundskeeping worker', 'Active', 2),
(377, 'gynecologist', 'Active', 2),
(378, 'hairdresser', 'Active', 2),
(379, 'hairstylist', 'Active', 2),
(380, 'hand grinding worker', 'Active', 2),
(381, 'hand laborer', 'Active', 2),
(382, 'hand packager', 'Active', 2),
(383, 'hand packer', 'Active', 2),
(384, 'hand polishing worker', 'Active', 2),
(385, 'hand sewer', 'Active', 2),
(386, 'hazardous materials removal worker', 'Active', 2),
(387, 'head cook', 'Active', 2),
(388, 'health and safety engineer', 'Active', 2),
(389, 'health educator', 'Active', 2),
(390, 'health information technician', 'Active', 2),
(391, 'health services manager', 'Active', 2),
(392, 'health specialties teacher', 'Active', 1),
(393, 'healthcare social worker', 'Active', 2),
(394, 'hearing officer', 'Active', 2),
(395, 'heat treating equipment setter', 'Active', 2),
(396, 'heating installer', 'Active', 2),
(397, 'heating mechanic', 'Active', 2),
(398, 'heavy truck driver', 'Active', 2),
(399, 'highway maintenance worker', 'Active', 2),
(400, 'historian', 'Active', 2),
(401, 'history teacher', 'Active', 1),
(402, 'hoist and winch operator', 'Active', 2),
(403, 'home appliance repairer', 'Active', 2),
(404, 'home economics teacher', 'Active', 1),
(405, 'home entertainment installer', 'Active', 2),
(406, 'home health aide', 'Active', 2),
(407, 'home management advisor', 'Active', 2),
(408, 'host', 'Active', 2),
(409, 'hostess', 'Active', 2),
(410, 'hostler', 'Active', 2),
(411, 'hotel desk clerk', 'Active', 2),
(412, 'housekeeping cleaner', 'Active', 2),
(413, 'human resources assistant', 'Active', 2),
(414, 'human resources manager', 'Active', 2),
(415, 'human service assistant', 'Active', 2),
(416, 'hunter', 'Active', 2),
(417, 'hydrologist', 'Active', 2),
(418, 'illustrator', 'Active', 2),
(419, 'industrial designer', 'Active', 2),
(420, 'industrial engineer', 'Active', 2),
(421, 'industrial engineering technician', 'Active', 2),
(422, 'industrial machinery mechanic', 'Active', 2),
(423, 'industrial production manager', 'Active', 2),
(424, 'industrial truck operator', 'Active', 2),
(425, 'industrial-organizational psychologist', 'Active', 2),
(426, 'information clerk', 'Active', 2),
(427, 'information research scientist', 'Active', 2),
(428, 'information security analyst', 'Active', 2),
(429, 'information systems manager', 'Active', 2),
(430, 'inspector', 'Active', 2),
(431, 'instructional coordinator', 'Active', 2),
(432, 'instructor', 'Active', 2),
(433, 'insulation worker', 'Active', 2),
(434, 'insurance claims clerk', 'Active', 2),
(435, 'insurance sales agent', 'Active', 2),
(436, 'insurance underwriter', 'Active', 2),
(437, 'intercity bus driver', 'Active', 2),
(438, 'interior designer', 'Active', 2),
(439, 'internist', 'Active', 2),
(440, 'interpreter', 'Active', 2),
(441, 'interviewer', 'Active', 2),
(442, 'investigator', 'Active', 2),
(443, 'jailer', 'Active', 2),
(444, 'janitor', 'Active', 2),
(445, 'jeweler', 'Active', 2),
(446, 'judge', 'Active', 2),
(447, 'judicial law clerk', 'Active', 2),
(448, 'kettle operator', 'Active', 2),
(449, 'kiln operator', 'Active', 2),
(450, 'kindergarten teacher', 'Active', 1),
(451, 'laboratory animal caretaker', 'Active', 2),
(452, 'landscape architect', 'Active', 2),
(453, 'landscaping worker', 'Active', 2),
(454, 'lathe setter', 'Active', 2),
(455, 'laundry worker', 'Active', 2),
(456, 'law enforcement teacher', 'Active', 1),
(457, 'law teacher', 'Active', 1),
(458, 'lawyer', 'Active', 2),
(459, 'layout worker', 'Active', 2),
(460, 'leather worker', 'Active', 2),
(461, 'legal assistant', 'Active', 2),
(462, 'legal secretary', 'Active', 2),
(463, 'legislator', 'Active', 2),
(464, 'librarian', 'Active', 2),
(465, 'library assistant', 'Active', 2),
(466, 'library science teacher', 'Active', 1),
(467, 'library technician', 'Active', 2),
(468, 'licensed practical nurse', 'Active', 2),
(469, 'licensed vocational nurse', 'Active', 2),
(470, 'life scientist', 'Active', 2),
(471, 'lifeguard', 'Active', 2),
(472, 'light truck driver', 'Active', 2),
(473, 'line installer', 'Active', 2),
(474, 'literacy teacher', 'Active', 1),
(475, 'literature teacher', 'Active', 1),
(476, 'loading machine operator', 'Active', 2),
(477, 'loan clerk', 'Active', 2),
(478, 'loan interviewer', 'Active', 2),
(479, 'loan officer', 'Active', 2),
(480, 'lobby attendant', 'Active', 2),
(481, 'locker room attendant', 'Active', 2),
(482, 'locksmith', 'Active', 2),
(483, 'locomotive engineer', 'Active', 2),
(484, 'locomotive firer', 'Active', 2),
(485, 'lodging manager', 'Active', 2),
(486, 'log grader', 'Active', 2),
(487, 'logging equipment operator', 'Active', 2),
(488, 'logistician', 'Active', 2),
(489, 'machine feeder', 'Active', 2),
(490, 'machinist', 'Active', 2),
(491, 'magistrate judge', 'Active', 2),
(492, 'magistrate', 'Active', 2),
(493, 'maid', 'Active', 2),
(494, 'mail clerk', 'Active', 2),
(495, 'mail machine operator', 'Active', 2),
(496, 'mail superintendent', 'Active', 2),
(497, 'maintenance painter', 'Active', 2),
(498, 'maintenance worker', 'Active', 2),
(499, 'makeup artist', 'Active', 2),
(500, 'management analyst', 'Active', 2),
(501, 'manicurist', 'Active', 2),
(502, 'manufactured building installer', 'Active', 2),
(503, 'mapping technician', 'Active', 2),
(504, 'marble setter', 'Active', 2),
(505, 'marine engineer', 'Active', 2),
(506, 'marine oiler', 'Active', 2),
(507, 'market research analyst', 'Active', 2),
(508, 'marketing manager', 'Active', 2),
(509, 'marketing specialist', 'Active', 2),
(510, 'marriage therapist', 'Active', 2),
(511, 'massage therapist', 'Active', 2),
(512, 'material mover', 'Active', 2),
(513, 'materials engineer', 'Active', 2),
(514, 'materials scientist', 'Active', 2),
(515, 'mathematical science teacher', 'Active', 1),
(516, 'mathematical technician', 'Active', 2),
(517, 'mathematician', 'Active', 2),
(518, 'maxillofacial surgeon', 'Active', 2),
(519, 'measurer', 'Active', 2),
(520, 'meat cutter', 'Active', 2),
(521, 'meat packer', 'Active', 2),
(522, 'meat trimmer', 'Active', 2),
(523, 'mechanical door repairer', 'Active', 2),
(524, 'mechanical drafter', 'Active', 2),
(525, 'mechanical engineer', 'Active', 2),
(526, 'mechanical engineering technician', 'Active', 2),
(527, 'mediator', 'Active', 2),
(528, 'medical appliance technician', 'Active', 2),
(529, 'medical assistant', 'Active', 2),
(530, 'medical equipment preparer', 'Active', 2),
(531, 'medical equipment repairer', 'Active', 2),
(532, 'medical laboratory technician', 'Active', 2),
(533, 'medical laboratory technologist', 'Active', 2),
(534, 'medical records technician', 'Active', 2),
(535, 'medical scientist', 'Active', 2),
(536, 'medical secretary', 'Active', 2),
(537, 'medical services manager', 'Active', 2),
(538, 'medical transcriptionist', 'Active', 2),
(539, 'meeting planner', 'Active', 2),
(540, 'mental health counselor', 'Active', 2),
(541, 'mental health social worker', 'Active', 2),
(542, 'merchandise displayer', 'Active', 2),
(543, 'messenger', 'Active', 2),
(544, 'metal caster', 'Active', 2),
(545, 'metal patternmaker', 'Active', 2),
(546, 'metal pickling operator', 'Active', 2),
(547, 'metal pourer', 'Active', 2),
(548, 'metal worker', 'Active', 2),
(549, 'metal-refining furnace operator', 'Active', 2),
(550, 'metal-refining furnace tender', 'Active', 2),
(551, 'meter reader', 'Active', 2),
(552, 'microbiologist', 'Active', 2),
(553, 'middle school teacher', 'Active', 1),
(554, 'milling machine setter', 'Active', 2),
(555, 'millwright', 'Active', 2),
(556, 'mine cutting machine operator', 'Active', 2),
(557, 'mine shuttle car operator', 'Active', 2),
(558, 'mining engineer', 'Active', 2),
(559, 'mining safety engineer', 'Active', 2),
(560, 'mining safety inspector', 'Active', 2),
(561, 'mining service unit operator', 'Active', 2),
(562, 'mixing machine setter', 'Active', 2),
(563, 'mobile heavy equipment mechanic', 'Active', 2),
(564, 'mobile home installer', 'Active', 2),
(565, 'model maker', 'Active', 2),
(566, 'model', 'Active', 2),
(567, 'molder', 'Active', 2),
(568, 'mortician', 'Active', 2),
(569, 'motel desk clerk', 'Active', 2),
(570, 'motion picture projectionist', 'Active', 2),
(571, 'motorboat mechanic', 'Active', 2),
(572, 'motorboat operator', 'Active', 2),
(573, 'motorboat service technician', 'Active', 2),
(574, 'motorcycle mechanic', 'Active', 2),
(575, 'multimedia artist', 'Active', 2),
(576, 'museum technician', 'Active', 2),
(577, 'music director', 'Active', 2),
(578, 'music teacher', 'Active', 1),
(579, 'musical instrument repairer', 'Active', 2),
(580, 'musician', 'Active', 2),
(581, 'natural sciences manager', 'Active', 2),
(582, 'naval architect', 'Active', 2),
(583, 'network systems administrator', 'Active', 2),
(584, 'new accounts clerk', 'Active', 2),
(585, 'news vendor', 'Active', 2),
(586, 'nonfarm animal caretaker', 'Active', 2),
(587, 'nuclear engineer', 'Active', 2),
(588, 'nuclear medicine technologist', 'Active', 2),
(589, 'nuclear power reactor operator', 'Active', 2),
(590, 'nuclear technician', 'Active', 2),
(591, 'nursing aide', 'Active', 2),
(592, 'nursing instructor', 'Active', 2),
(593, 'nursing teacher', 'Active', 1),
(594, 'nutritionist', 'Active', 2),
(595, 'obstetrician', 'Active', 2),
(596, 'occupational health and safety specialist', 'Active', 2),
(597, 'occupational health and safety technician', 'Active', 2),
(598, 'occupational therapist', 'Active', 2),
(599, 'occupational therapy aide', 'Active', 2),
(600, 'occupational therapy assistant', 'Active', 2),
(601, 'offbearer', 'Active', 2),
(602, 'office clerk', 'Active', 2),
(603, 'office machine operator', 'Active', 2),
(604, 'operating engineer', 'Active', 2),
(605, 'operations manager', 'Active', 2),
(606, 'operations research analyst', 'Active', 2),
(607, 'ophthalmic laboratory technician', 'Active', 2),
(608, 'optician', 'Active', 2),
(609, 'optometrist', 'Active', 2),
(610, 'oral surgeon', 'Active', 2),
(611, 'order clerk', 'Active', 2),
(612, 'order filler', 'Active', 2),
(613, 'orderly', 'Active', 2),
(614, 'ordnance handling expert', 'Active', 2),
(615, 'orthodontist', 'Active', 2),
(616, 'orthotist', 'Active', 2),
(617, 'outdoor power equipment mechanic', 'Active', 2),
(618, 'oven operator', 'Active', 2),
(619, 'packaging machine operator', 'Active', 2),
(620, 'painter ', 'Active', 2),
(621, 'painting worker', 'Active', 2),
(622, 'paper goods machine setter', 'Active', 2),
(623, 'paperhanger', 'Active', 2),
(624, 'paralegal', 'Active', 2),
(625, 'paramedic', 'Active', 2),
(626, 'parking enforcement worker', 'Active', 2),
(627, 'parking lot attendant', 'Active', 2),
(628, 'parts salesperson', 'Active', 2),
(629, 'paving equipment operator', 'Active', 2),
(630, 'payroll clerk', 'Active', 2),
(631, 'pediatrician', 'Active', 2),
(632, 'pedicurist', 'Active', 2),
(633, 'personal care aide', 'Active', 2),
(634, 'personal chef', 'Active', 2),
(635, 'personal financial advisor', 'Active', 2),
(636, 'pest control worker', 'Active', 2),
(637, 'pesticide applicator', 'Active', 2),
(638, 'pesticide handler', 'Active', 2),
(639, 'pesticide sprayer', 'Active', 2),
(640, 'petroleum engineer', 'Active', 2),
(641, 'petroleum gauger', 'Active', 2),
(642, 'petroleum pump system operator', 'Active', 2),
(643, 'petroleum refinery operator', 'Active', 2),
(644, 'petroleum technician', 'Active', 2),
(645, 'pharmacist', 'Active', 2),
(646, 'pharmacy aide', 'Active', 2),
(647, 'pharmacy technician', 'Active', 2),
(648, 'philosophy teacher', 'Active', 1),
(649, 'photogrammetrist', 'Active', 2),
(650, 'photographer', 'Active', 2),
(651, 'photographic process worker', 'Active', 2),
(652, 'photographic processing machine operator', 'Active', 2),
(653, 'physical therapist aide', 'Active', 2),
(654, 'physical therapist assistant', 'Active', 2),
(655, 'physical therapist', 'Active', 2),
(656, 'physician assistant', 'Active', 2),
(657, 'physician', 'Active', 2),
(658, 'physicist', 'Active', 2),
(659, 'physics teacher', 'Active', 1),
(660, 'pile-driver operator', 'Active', 2),
(661, 'pipefitter', 'Active', 2),
(662, 'pipelayer', 'Active', 2),
(663, 'planing machine operator', 'Active', 2),
(664, 'planning clerk', 'Active', 2),
(665, 'plant operator', 'Active', 2),
(666, 'plant scientist', 'Active', 2),
(667, 'plasterer', 'Active', 2),
(668, 'plastic patternmaker', 'Active', 2),
(669, 'plastic worker', 'Active', 2),
(670, 'plumber', 'Active', 2),
(671, 'podiatrist', 'Active', 2),
(672, 'police dispatcher', 'Active', 2),
(673, 'police officer', 'Active', 2),
(674, 'policy processing clerk', 'Active', 2),
(675, 'political science teacher', 'Active', 1),
(676, 'political scientist', 'Active', 2),
(677, 'postal service clerk', 'Active', 2),
(678, 'postal service mail carrier', 'Active', 2),
(679, 'postal service mail processing machine operator', 'Active', 2),
(680, 'postal service mail processor', 'Active', 2),
(681, 'postal service mail sorter', 'Active', 2),
(682, 'postmaster', 'Active', 2),
(683, 'postsecondary teacher', 'Active', 1),
(684, 'poultry cutter', 'Active', 2),
(685, 'poultry trimmer', 'Active', 2),
(686, 'power dispatcher', 'Active', 2),
(687, 'power distributor', 'Active', 2),
(688, 'power plant operator', 'Active', 2),
(689, 'power tool repairer', 'Active', 2),
(690, 'precious stone worker', 'Active', 2),
(691, 'precision instrument repairer', 'Active', 2),
(692, 'prepress technician', 'Active', 2),
(693, 'preschool teacher', 'Active', 1),
(694, 'priest', 'Active', 2),
(695, 'print binding worker', 'Active', 2),
(696, 'printing press operator', 'Active', 2),
(697, 'private detective', 'Active', 2),
(698, 'probation officer', 'Active', 2),
(699, 'procurement clerk', 'Active', 2),
(700, 'producer', 'Active', 2),
(701, 'product promoter', 'Active', 2),
(702, 'production clerk', 'Active', 2),
(703, 'production occupation', 'Active', 2),
(704, 'proofreader', 'Active', 2),
(705, 'property manager', 'Active', 2),
(706, 'prosthetist', 'Active', 2),
(707, 'prosthodontist', 'Active', 2),
(708, 'psychiatric aide', 'Active', 2),
(709, 'psychiatric technician', 'Active', 2),
(710, 'psychiatrist', 'Active', 2),
(711, 'psychologist', 'Active', 2),
(712, 'psychology teacher', 'Active', 1),
(713, 'public relations manager', 'Active', 2),
(714, 'public relations specialist', 'Active', 2),
(715, 'pump operator', 'Active', 2),
(716, 'purchasing agent', 'Active', 2),
(717, 'purchasing manager', 'Active', 2),
(718, 'radiation therapist', 'Active', 2),
(719, 'radio announcer', 'Active', 2),
(720, 'radio equipment installer', 'Active', 2),
(721, 'radio operator', 'Active', 2),
(722, 'radiologic technician', 'Active', 2),
(723, 'radiologic technologist', 'Active', 2),
(724, 'rail car repairer', 'Active', 2),
(725, 'rail transportation worker', 'Active', 2),
(726, 'rail yard engineer', 'Active', 2),
(727, 'rail-track laying equipment operator', 'Active', 2),
(728, 'railroad brake operator', 'Active', 2),
(729, 'railroad conductor', 'Active', 2),
(730, 'railroad police', 'Active', 2),
(731, 'rancher', 'Active', 2),
(732, 'real estate appraiser', 'Active', 2),
(733, 'real estate broker', 'Active', 2),
(734, 'real estate manager', 'Active', 2),
(735, 'real estate sales agent', 'Active', 2),
(736, 'receiving clerk', 'Active', 2),
(737, 'receptionist', 'Active', 2),
(738, 'record clerk', 'Active', 2),
(739, 'recreation teacher', 'Active', 1),
(740, 'recreation worker', 'Active', 2),
(741, 'recreational therapist', 'Active', 2),
(742, 'recreational vehicle service technician', 'Active', 2),
(743, 'recyclable material collector', 'Active', 2),
(744, 'referee', 'Active', 2),
(745, 'refractory materials repairer', 'Active', 2),
(746, 'refrigeration installer', 'Active', 2),
(747, 'refrigeration mechanic', 'Active', 2),
(748, 'refuse collector', 'Active', 2),
(749, 'regional planner', 'Active', 2),
(750, 'registered nurse', 'Active', 2),
(751, 'rehabilitation counselor', 'Active', 2),
(752, 'reinforcing iron worker', 'Active', 2),
(753, 'reinforcing rebar worker', 'Active', 2),
(754, 'religion teacher', 'Active', 1),
(755, 'religious activities director', 'Active', 2),
(756, 'religious worker', 'Active', 2),
(757, 'rental clerk', 'Active', 2),
(758, 'repair worker', 'Active', 2),
(759, 'reporter', 'Active', 2),
(760, 'residential advisor', 'Active', 2),
(761, 'resort desk clerk', 'Active', 2),
(762, 'respiratory therapist', 'Active', 2),
(763, 'respiratory therapy technician', 'Active', 2),
(764, 'retail buyer', 'Active', 2),
(765, 'retail salesperson', 'Active', 2),
(766, 'revenue agent', 'Active', 2),
(767, 'rigger', 'Active', 2),
(768, 'rock splitter', 'Active', 2),
(769, 'rolling machine tender', 'Active', 2),
(770, 'roof bolter', 'Active', 2),
(771, 'roofer', 'Active', 2),
(772, 'rotary drill operator', 'Active', 2),
(773, 'roustabout', 'Active', 2),
(774, 'safe repairer', 'Active', 2),
(775, 'sailor', 'Active', 2),
(776, 'sales engineer', 'Active', 2),
(777, 'sales manager', 'Active', 2),
(778, 'sales representative', 'Active', 2),
(779, 'sampler', 'Active', 2),
(780, 'sawing machine operator', 'Active', 2),
(781, 'scaler', 'Active', 2),
(782, 'school bus driver', 'Active', 2),
(783, 'school psychologist', 'Active', 2),
(784, 'school social worker', 'Active', 2),
(785, 'scout leader', 'Active', 2),
(786, 'sculptor', 'Active', 2),
(787, 'secondary education teacher', 'Active', 1),
(788, 'secondary school teacher', 'Active', 1),
(789, 'secretary', 'Active', 2),
(790, 'securities sales agent', 'Active', 2),
(791, 'security guard', 'Active', 2),
(792, 'security system installer', 'Active', 2),
(793, 'segmental paver', 'Active', 2),
(794, 'self-enrichment education teacher', 'Active', 1),
(795, 'semiconductor processor', 'Active', 2),
(796, 'septic tank servicer', 'Active', 2),
(797, 'set designer', 'Active', 2),
(798, 'sewer pipe cleaner', 'Active', 2),
(799, 'sewing machine operator', 'Active', 2),
(800, 'shampooer', 'Active', 2),
(801, 'shaper', 'Active', 2),
(802, 'sheet metal worker', 'Active', 2),
(803, 'sheriff\'s patrol officer', 'Active', 2),
(804, 'ship captain', 'Active', 2),
(805, 'ship engineer', 'Active', 2),
(806, 'ship loader', 'Active', 2),
(807, 'shipmate', 'Active', 2),
(808, 'shipping clerk', 'Active', 2),
(809, 'shoe machine operator', 'Active', 2),
(810, 'shoe worker', 'Active', 2),
(811, 'short order cook', 'Active', 2),
(812, 'signal operator', 'Active', 2),
(813, 'signal repairer', 'Active', 2),
(814, 'singer', 'Active', 2),
(815, 'ski patrol', 'Active', 2),
(816, 'skincare specialist', 'Active', 2),
(817, 'slaughterer', 'Active', 2),
(818, 'slicing machine tender', 'Active', 2),
(819, 'slot supervisor', 'Active', 2),
(820, 'social science research assistant', 'Active', 2),
(821, 'social sciences teacher', 'Active', 1),
(822, 'social scientist', 'Active', 2),
(823, 'social service assistant', 'Active', 2),
(824, 'social service manager', 'Active', 2),
(825, 'social work teacher', 'Active', 1),
(826, 'social worker', 'Active', 2),
(827, 'sociologist', 'Active', 2),
(828, 'sociology teacher', 'Active', 1),
(829, 'software developer', 'Active', 2),
(830, 'software engineer', 'Active', 2),
(831, 'soil scientist', 'Active', 2),
(832, 'solderer', 'Active', 2),
(833, 'sorter', 'Active', 2),
(834, 'sound engineering technician', 'Active', 2),
(835, 'space scientist', 'Active', 2),
(836, 'special education teacher', 'Active', 1),
(837, 'speech-language pathologist', 'Active', 2),
(838, 'sports book runner', 'Active', 2),
(839, 'sports entertainer', 'Active', 2),
(840, 'sports performer', 'Active', 2),
(841, 'stationary engineer', 'Active', 2),
(842, 'statistical assistant', 'Active', 2),
(843, 'statistician', 'Active', 2),
(844, 'steamfitter', 'Active', 2),
(845, 'stock clerk', 'Active', 2),
(846, 'stock mover', 'Active', 2),
(847, 'stonemason', 'Active', 2),
(848, 'street vendor', 'Active', 2),
(849, 'streetcar operator', 'Active', 2),
(850, 'structural iron worker', 'Active', 2),
(851, 'structural metal fabricator', 'Active', 2),
(852, 'structural metal fitter', 'Active', 2),
(853, 'structural steel worker', 'Active', 2),
(854, 'stucco mason', 'Active', 2),
(855, 'substance abuse counselor', 'Active', 2),
(856, 'substance abuse social worker', 'Active', 2),
(857, 'subway operator', 'Active', 2),
(858, 'surfacing equipment operator', 'Active', 2),
(859, 'surgeon', 'Active', 2),
(860, 'surgical technologist', 'Active', 2),
(861, 'survey researcher', 'Active', 2),
(862, 'surveying technician', 'Active', 2),
(863, 'surveyor', 'Active', 2),
(864, 'switch operator', 'Active', 2),
(865, 'switchboard operator', 'Active', 2),
(866, 'tailor', 'Active', 2),
(867, 'tamping equipment operator', 'Active', 2),
(868, 'tank car loader', 'Active', 2),
(869, 'taper', 'Active', 2),
(870, 'tax collector', 'Active', 2),
(871, 'tax examiner', 'Active', 2),
(872, 'tax preparer', 'Active', 2),
(873, 'taxi driver', 'Active', 2),
(874, 'teacher assistant', 'Active', 1),
(875, 'teacher', 'Active', 1),
(876, 'team assembler', 'Active', 2),
(877, 'technical writer', 'Active', 2),
(878, 'telecommunications equipment installer', 'Active', 2),
(879, 'telemarketer', 'Active', 2),
(880, 'telephone operator', 'Active', 2),
(881, 'television announcer', 'Active', 2),
(882, 'teller', 'Active', 2),
(883, 'terrazzo finisher', 'Active', 2),
(884, 'terrazzo worker', 'Active', 2),
(885, 'tester', 'Active', 2),
(886, 'textile bleaching operator', 'Active', 2),
(887, 'textile cutting machine setter', 'Active', 2),
(888, 'textile knitting machine setter', 'Active', 2),
(889, 'textile presser', 'Active', 2),
(890, 'textile worker', 'Active', 2),
(891, 'therapist', 'Active', 2),
(892, 'ticket agent', 'Active', 2),
(893, 'ticket taker', 'Active', 2),
(894, 'tile setter', 'Active', 2),
(895, 'timekeeping clerk', 'Active', 2),
(896, 'timing device assembler', 'Active', 2),
(897, 'tire builder', 'Active', 2),
(898, 'tire changer', 'Active', 2),
(899, 'tire repairer', 'Active', 2),
(900, 'title abstractor', 'Active', 2),
(901, 'title examiner', 'Active', 2),
(902, 'title searcher', 'Active', 2),
(903, 'tobacco roasting machine operator', 'Active', 2),
(904, 'tool filer', 'Active', 2),
(905, 'tool grinder', 'Active', 2),
(906, 'tool maker', 'Active', 2),
(907, 'tool sharpener', 'Active', 2),
(908, 'tour guide', 'Active', 2),
(909, 'tower equipment installer', 'Active', 2),
(910, 'tower operator', 'Active', 2),
(911, 'track switch repairer', 'Active', 2),
(912, 'tractor operator', 'Active', 2),
(913, 'tractor-trailer truck driver', 'Active', 2),
(914, 'traffic clerk', 'Active', 2),
(915, 'traffic technician', 'Active', 2),
(916, 'training and development manager', 'Active', 2),
(917, 'training and development specialist', 'Active', 2),
(918, 'transit police', 'Active', 2),
(919, 'translator', 'Active', 2),
(920, 'transportation equipment painter', 'Active', 2),
(921, 'transportation inspector', 'Active', 2),
(922, 'transportation security screener', 'Active', 2),
(923, 'transportation worker', 'Active', 2),
(924, 'trapper', 'Active', 2),
(925, 'travel agent', 'Active', 2),
(926, 'travel clerk', 'Active', 2),
(927, 'travel guide', 'Active', 2),
(928, 'tree pruner', 'Active', 2),
(929, 'tree trimmer', 'Active', 2),
(930, 'trimmer', 'Active', 2),
(931, 'truck loader', 'Active', 2),
(932, 'truck mechanic', 'Active', 2),
(933, 'tuner', 'Active', 2),
(934, 'turning machine tool operator', 'Active', 2),
(935, 'typist', 'Active', 2),
(936, 'umpire', 'Active', 2),
(937, 'undertaker', 'Active', 2),
(938, 'upholsterer', 'Active', 2),
(939, 'urban planner', 'Active', 2),
(940, 'usher', 'Active', 2),
(941, 'valve installer', 'Active', 2),
(942, 'vending machine servicer', 'Active', 2),
(943, 'veterinarian', 'Active', 2),
(944, 'veterinary assistant', 'Active', 2),
(945, 'veterinary technician', 'Active', 2),
(946, 'vocational counselor', 'Active', 2),
(947, 'vocational education teacher', 'Active', 1),
(948, 'waiter', 'Active', 2),
(949, 'waitress', 'Active', 2),
(950, 'watch repairer', 'Active', 2),
(951, 'water treatment plant operator', 'Active', 2),
(952, 'weaving machine setter', 'Active', 2),
(953, 'web developer', 'Active', 2),
(954, 'weigher', 'Active', 2),
(955, 'welder', 'Active', 2),
(956, 'wellhead pumper', 'Active', 2),
(957, 'wholesale buyer', 'Active', 2),
(958, 'wildlife biologist', 'Active', 2),
(959, 'window trimmer', 'Active', 2),
(960, 'wood patternmaker', 'Active', 2),
(961, 'woodworker', 'Active', 2),
(962, 'word processor', 'Active', 2),
(963, 'writer', 'Active', 2),
(964, 'yardmaster', 'Active', 2);

-- --------------------------------------------------------

--
-- Table structure for table `diary`
--

CREATE TABLE `diary` (
  `pk_diary_Id` bigint(20) NOT NULL COMMENT 'diary ID',
  `fk_diary_type_Id` int(10) NOT NULL COMMENT 'Diary Type',
  `due_Date` date DEFAULT NULL COMMENT 'Due Date',
  `fk_cls_Id` int(10) DEFAULT NULL COMMENT 'Class ID',
  `fk_c_section_Id` int(10) NOT NULL COMMENT 'Class Section',
  `fk_sub_Id` int(10) NOT NULL COMMENT 'Subject',
  `fk_std_Id` bigint(20) DEFAULT NULL COMMENT 'Student Id',
  `diary_Note` text DEFAULT NULL COMMENT 'Notes',
  `diary_File` varchar(255) DEFAULT NULL COMMENT 'Helping document',
  `diary_Status` enum('Acknowledge','Not Acknowledge','Open','Closed') DEFAULT 'Not Acknowledge' COMMENT 'Diary Status',
  `audience` varchar(255) NOT NULL,
  `student` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `top` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diary`
--

INSERT INTO `diary` (`pk_diary_Id`, `fk_diary_type_Id`, `due_Date`, `fk_cls_Id`, `fk_c_section_Id`, `fk_sub_Id`, `fk_std_Id`, `diary_Note`, `diary_File`, `diary_Status`, `audience`, `student`, `user_id`, `top`) VALUES
(4, 1, '2021-12-10', 2, 7, 9, NULL, 'dgfdgfdgfg', 'rafaqat.jpg', 'Open', 'Whole Class', NULL, 18, 0),
(26, 4, '2021-12-09', 2, 7, 9, NULL, 'sgdherrhre', '4606 (1).jpg', 'Open', 'Whole Class', NULL, 18, 0),
(39, 4, '2021-12-09', 2, 7, 9, 28, 'sgdherrhre', '4606 (1).jpg', 'Acknowledge', 'Whole Class', NULL, 18, 26),
(40, 4, '2021-12-09', 2, 7, 9, 25, 'sgdherrhre', '4606 (1).jpg', 'Acknowledge', 'Whole Class', NULL, 18, 26),
(48, 1, '2021-12-10', 2, 7, 9, 28, 'dgfdgfdgfg', 'rafaqat.jpg', 'Not Acknowledge', 'Whole Class', NULL, 18, 4),
(49, 1, '2021-12-10', 2, 7, 9, 25, 'dgfdgfdgfg', 'rafaqat.jpg', 'Acknowledge', 'Whole Class', NULL, 18, 4);

-- --------------------------------------------------------

--
-- Table structure for table `diary_type`
--

CREATE TABLE `diary_type` (
  `pk_diary_type_Id` int(10) NOT NULL COMMENT 'Diary type ID',
  `diary_type_Name` varchar(50) NOT NULL COMMENT 'Diary Type'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diary_type`
--

INSERT INTO `diary_type` (`pk_diary_type_Id`, `diary_type_Name`) VALUES
(1, 'Homework'),
(2, 'Notification'),
(3, 'Achievement'),
(4, 'Behaviour');

-- --------------------------------------------------------

--
-- Table structure for table `disable`
--

CREATE TABLE `disable` (
  `disable_Id` int(10) NOT NULL COMMENT 'Disable ID',
  `disable_status` enum('Yes','No') NOT NULL,
  `disability` varchar(255) DEFAULT NULL COMMENT 'Disability Name'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `disable`
--

INSERT INTO `disable` (`disable_Id`, `disable_status`, `disability`) VALUES
(1, 'Yes', 'Eye Site is Weak'),
(3, 'No', 'No Disable Status');

-- --------------------------------------------------------

--
-- Table structure for table `discount_type`
--

CREATE TABLE `discount_type` (
  `dis_typ_Id` int(10) NOT NULL COMMENT 'Discount Type ID',
  `dis_Name` varchar(50) NOT NULL COMMENT 'Discount type Name',
  `dis_Percent` int(10) NOT NULL COMMENT 'Percentage of discount type'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `domicile`
--

CREATE TABLE `domicile` (
  `dom_Id` int(10) NOT NULL COMMENT 'Domicile ID',
  `dom_District` varchar(255) NOT NULL COMMENT 'Name of the domicile',
  `state_Id` int(11) NOT NULL,
  `nation_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `domicile`
--

INSERT INTO `domicile` (`dom_Id`, `dom_District`, `state_Id`, `nation_Id`) VALUES
(1, 'Awaran', 2, 156),
(2, 'Barkhan', 2, 156),
(3, 'Kachi (Bolan)', 2, 156),
(4, 'Chagai', 2, 156),
(5, 'Dera Bugti', 2, 156),
(6, 'Gwadar', 2, 156),
(7, 'Harnai', 2, 156),
(8, 'Jafarabad', 2, 156),
(9, 'Jhal Magsi', 2, 156),
(10, 'Kalat', 2, 156),
(11, 'Kech (Turbat)', 2, 156),
(12, 'Kharan', 2, 156),
(13, 'Kohlu', 2, 156),
(14, 'Khuzdar', 2, 156),
(15, 'Killa Abdullah', 2, 156),
(16, 'Killa Saifullah', 2, 156),
(17, 'Lasbela', 2, 156),
(18, 'Loralai', 2, 156),
(19, 'Mastung', 2, 156),
(20, 'Musakhel', 2, 156),
(21, 'Nasirabad', 2, 156),
(22, 'Nushki', 2, 156),
(23, 'Panjgur', 2, 156),
(24, 'Pishin', 2, 156),
(25, 'Quetta', 2, 156),
(26, 'Sheerani (Sherani)', 2, 156),
(27, 'Sibi', 2, 156),
(28, 'Washuk', 2, 156),
(29, 'Zhob', 2, 156),
(30, 'Ziarat', 2, 156),
(31, 'Lehri', 2, 156),
(32, 'Sohbatpur', 2, 156),
(33, 'Abbottabad', 5, 156),
(34, 'Bannu', 5, 156),
(35, 'Battagram', 5, 156),
(36, 'Buner', 5, 156),
(37, 'Charsadda', 5, 156),
(38, 'Chitral', 5, 156),
(39, 'Dera Ismail Khan', 5, 156),
(40, 'Hangu', 5, 156),
(41, 'Haripur', 5, 156),
(42, 'Karak', 5, 156),
(43, 'Kohat', 5, 156),
(44, 'Kohistan', 5, 156),
(45, 'Lakki Marwat', 5, 156),
(46, 'Lower Dir', 5, 156),
(47, 'Malakand', 5, 156),
(48, 'Mansehra', 5, 156),
(49, 'Mardan', 5, 156),
(50, 'Nowshera', 5, 156),
(51, 'Peshawar', 5, 156),
(52, 'Shangla', 5, 156),
(53, 'Swabi', 5, 156),
(54, 'Swat', 5, 156),
(55, 'Tank', 5, 156),
(56, 'Tor Ghar (Kala Dhaka)', 5, 156),
(57, 'Upper Dir', 5, 156),
(58, 'Attock', 6, 156),
(59, 'Bahawalnagar', 6, 156),
(60, 'Bahawalpur', 6, 156),
(61, 'Bhakkar', 6, 156),
(62, 'Chakwal', 6, 156),
(63, 'Chiniot', 6, 156),
(64, 'Dera Ghazi Khan', 6, 156),
(65, 'Faisalabad', 6, 156),
(66, 'Gujranwala', 6, 156),
(67, 'Gujrat', 6, 156),
(68, 'Hafizabad', 6, 156),
(69, 'Jhang', 6, 156),
(70, 'Jhelum', 6, 156),
(71, 'Kasur', 6, 156),
(72, 'Khanewal', 6, 156),
(73, 'Khushab', 6, 156),
(74, 'Lahore', 6, 156),
(75, 'Layyah', 6, 156),
(76, 'Lodhran', 6, 156),
(77, 'Mandi Bahauddin', 6, 156),
(78, 'Mianwali', 6, 156),
(79, 'Multan', 6, 156),
(80, 'Muzaffargarh', 6, 156),
(81, 'Narowal', 6, 156),
(82, 'Nankana Sahib', 6, 156),
(83, 'Okara', 6, 156),
(84, 'Pakpattan', 6, 156),
(85, 'Rahim Yar Khan', 6, 156),
(86, 'Rajanpur', 6, 156),
(87, 'Rawalpindi', 6, 156),
(88, 'Sahiwal', 6, 156),
(89, 'Sargodha', 6, 156),
(90, 'Sheikhupura', 6, 156),
(91, 'Sialkot', 6, 156),
(92, 'Toba Tek Singh', 6, 156),
(93, 'Vehari', 6, 156),
(94, 'Badin', 7, 156),
(95, 'Dadu', 7, 156),
(96, 'Ghotki', 7, 156),
(97, 'Hyderabad', 7, 156),
(98, 'Jacobabad', 7, 156),
(99, 'Jamshoro', 7, 156),
(100, 'KARACHI (East, West, South)', 7, 156),
(101, 'Karachi (Central, Malir, Korangi)', 7, 156),
(102, 'Kashmore', 7, 156),
(103, 'Khairpur', 7, 156),
(104, 'Larkana', 7, 156),
(105, 'Matiari', 7, 156),
(106, 'Mirpur khas', 7, 156),
(107, 'Naushahro Feroze', 7, 156),
(108, 'Shaheed Benazirabad', 7, 156),
(109, 'Qambar Shahdadkot', 7, 156),
(110, 'Sanghar', 7, 156),
(111, 'Sujawal', 7, 156),
(112, 'Shikarpur', 7, 156),
(113, 'Sukkur', 7, 156),
(114, 'Tando Allahyar', 7, 156),
(115, 'Tando Muhammad Khan', 7, 156),
(116, 'Tharparkar', 7, 156),
(117, 'Thatta', 7, 156),
(118, 'Umerkot', 7, 156),
(119, 'Bajaur', 5, 156),
(120, 'Khyber ', 5, 156),
(121, 'Kurram', 5, 156),
(122, 'Mohmand', 5, 156),
(123, 'North Waziristan', 5, 156),
(124, 'Orakzai', 5, 156),
(125, 'South Waziristan', 5, 156),
(126, 'FR Bannu', 5, 156),
(127, 'FR Dera Ismail Khan', 5, 156),
(128, 'FR Kohat', 5, 156),
(129, 'FR Lakki Marwat', 5, 156),
(130, 'FR Peshawar', 5, 156),
(131, 'FR Tank', 5, 156),
(132, 'Muzaffarabad', 1, 156),
(133, 'Hattian', 1, 156),
(134, 'Neelum', 1, 156),
(135, 'Mirpur', 1, 156),
(136, 'Bhimber', 1, 156),
(137, 'Kotli', 1, 156),
(138, 'Poonch', 1, 156),
(139, 'Bagh', 1, 156),
(140, 'Haveli', 1, 156),
(141, 'Sudhnati', 1, 156),
(142, 'Astore', 3, 156),
(143, 'Diamer', 3, 156),
(144, 'Ghizer', 3, 156),
(145, 'Ghanche', 3, 156),
(146, 'Gilgit', 3, 156),
(147, 'Hunza-Nagar', 3, 156),
(148, 'Roundu', 3, 156),
(149, 'Skardu', 3, 156),
(150, 'Shigar', 3, 156),
(152, 'Islamabad', 4, 156),
(153, 'Shaheed Benazir Abad (Nawabshah)', 7, 156),
(155, 'Kabul', 10, 1),
(156, 'Kabul City', 10, 1),
(157, 'Kandhar', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `edu_department`
--

CREATE TABLE `edu_department` (
  `pk_reg_Id` int(20) NOT NULL COMMENT 'REgistration Id',
  `reg_No` varchar(50) DEFAULT NULL COMMENT 'REgistratoin No',
  `reg_department` varchar(50) DEFAULT NULL COMMENT 'REgistration Department'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `emergency_contact`
--

CREATE TABLE `emergency_contact` (
  `emer_cnt_Id` int(10) NOT NULL COMMENT 'Student Emergency ID',
  `emer_cont_Name` varchar(255) NOT NULL COMMENT 'Emergency contact person name',
  `emer_cont_No` varchar(20) NOT NULL COMMENT 'Emergency contact Number',
  `fk_emer_relat_Id` int(20) NOT NULL COMMENT 'Relation of emergency contact with pupil',
  `other_relation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emergency_contact`
--

INSERT INTO `emergency_contact` (`emer_cnt_Id`, `emer_cont_Name`, `emer_cont_No`, `fk_emer_relat_Id`, `other_relation`) VALUES
(1, 'Muhammad Ismail', '03339654236', 1, NULL),
(2, 'Muhammad Sultan', '03339654236', 1, NULL),
(3, 'Muhammad Shafi', '03339654236', 4, 'NA'),
(4, 'Sultan Aziz', '03339654236', 1, 'NA'),
(5, 'Muhammad Rafaqat', '03339654236', 1, NULL),
(6, 'Muhammad Rafaqat', '03339654236', 1, NULL),
(7, '123456789', '12345678', 1, 'Na'),
(8, '123456789', '12345678', 1, 'Na'),
(9, 'Abdul Kareem', '03339654236', 1, 'Na'),
(10, 'Abdul Kareem', '03339654236', 1, 'Na'),
(11, 'Abdul Kareem', '03339654236', 1, 'Na'),
(12, 'Abdul Kareem', '03339654236', 1, 'Na'),
(13, 'Abdul Kareem', '03339654236', 1, 'Na'),
(14, 'Abdul Kareem', '03339654236', 1, 'Na'),
(15, 'Abdul Kareem', '03339654236', 1, 'Na'),
(16, 'Muhammad Zaman', '03339654236', 1, 'Na'),
(17, 'Muhammad Zaman', '03339654236', 1, 'Na'),
(18, 'Muhammad Zaman', '03339654236', 1, 'Na'),
(19, 'Muhammad Hashir', '03339654236', 1, 'Na'),
(20, 'Muhammad Zaman', '03339654236', 1, 'Na'),
(21, 'Example Father', '03339654236', 1, 'Na'),
(22, 'Example Father', '03339654236', 1, 'Na'),
(23, 'Example Father', '03339654236', 1, 'Na'),
(24, 'Example Father', '03339654236', 1, 'Na'),
(25, 'Example Father', '03339654236', 1, 'Na'),
(26, '03339654236', '03339654236', 1, 'Na'),
(27, '03339654236', '03339654236', 1, 'Na'),
(28, 'def', '03339654236', 1, 'Na'),
(29, 'Aameer Hamza', '03339654236', 1, 'Na'),
(30, '03339654236', '03339654236', 1, 'Na'),
(31, 'Muhammad Iqbal', '03339654236', 1, NULL),
(32, 'Muhammad Ismail', '03339654236', 1, NULL),
(33, 'islam', '03353443510', 3, NULL),
(34, 'islam', '03353443510', 3, NULL),
(35, 'islam', '03353443510', 3, NULL),
(36, 'islam', '03353443510', 3, NULL),
(37, 'islam', '03353443510', 3, 'ea'),
(38, 'islam', '03353443510', 3, 'ea'),
(39, 'islam', '03353443510', 3, 'ea'),
(40, 'islam', '03353443510', 3, 'ea'),
(41, '03339654236', '03339654236', 1, 'rtt'),
(42, 'islam', '03353443510', 2, 'rtt'),
(43, 'islam', '111', 2, NULL),
(44, 'islam', '111', 4, NULL),
(45, 'islam', '111', 4, NULL),
(46, 'islam', '111', 4, NULL),
(47, 'islam', '111', 4, NULL),
(48, 'islam', '111', 4, NULL),
(49, 'islam', '111', 4, NULL),
(50, 'islam', '111', 4, NULL),
(51, 'islam', '111', 4, NULL),
(52, 'islam', '111', 4, NULL),
(53, 'islam', '111', 4, NULL),
(54, '0352542555', '0352542555', 5, 'is'),
(55, 'Zeeshan Khan Father', '99999999999', 4, NULL),
(56, 'Umer Baz Khan', '99999999999', 4, 'NA'),
(57, 'tahir', '22222222', 1, NULL),
(58, 'islam', '03353443510', 4, 'rtt'),
(59, 'islam', '03353443510', 3, 'rtt');

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendance`
--

CREATE TABLE `employee_attendance` (
  `emp_att_Id` bigint(100) NOT NULL COMMENT 'Employee Attendance ID',
  `emp_Id` bigint(20) NOT NULL COMMENT 'Employee ID',
  `emp_att_Date` date NOT NULL COMMENT 'Date of Attendance',
  `att_typ_Id` int(10) NOT NULL COMMENT 'ID of Attendance Type',
  `tot_on_Days` bigint(10) DEFAULT NULL COMMENT 'Total days school was open',
  `tot_present_Days` bigint(10) DEFAULT NULL COMMENT 'Total days a employee was present',
  `tot_absentee_Days` bigint(10) DEFAULT NULL COMMENT 'Total days a employee was Absent',
  `tot_sickLv_Days` bigint(10) DEFAULT NULL COMMENT 'Total days an employee was on sick leave',
  `tot_casualLv_Days` bigint(10) DEFAULT NULL COMMENT 'Total casual leave days of an employee',
  `tot_paidLv_Days` bigint(10) DEFAULT NULL COMMENT 'Total Paid Leaves days of an employee',
  `tot_present_Att` bigint(10) DEFAULT NULL COMMENT 'Total present attendance of employee',
  `tot_absentee_Att` bigint(10) DEFAULT NULL COMMENT 'Total absent Attendance of employee',
  `tot_casualLv_Att` bigint(10) DEFAULT NULL COMMENT 'Total casual leave attendance of an employee',
  `tot_sickLv_Att` bigint(10) DEFAULT NULL COMMENT 'Total sick leave attendance of an employee',
  `tot_paidLv_Att` bigint(10) DEFAULT NULL COMMENT 'Total paid Leaves in Attendance of an employee',
  `emp_tot_att` bigint(10) DEFAULT NULL COMMENT 'Total Obtained attendance of employee',
  `emp_arr_Time` time NOT NULL COMMENT 'Arrival Time',
  `emp_dep_Time` time NOT NULL COMMENT 'Departure from school',
  `emp_purp_Lv` varchar(100) DEFAULT NULL COMMENT 'Purpose of leave when an employee is on leave',
  `emp_att_Status` enum('Active','Inactive') NOT NULL COMMENT 'Employee Attendance Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee_contact`
--

CREATE TABLE `employee_contact` (
  `emp_cnt_Id` bigint(10) NOT NULL COMMENT 'Employee contact table Id',
  `emp_mob_Ph` bigint(100) DEFAULT NULL COMMENT 'Employee mobile',
  `emp_home_Ph` bigint(100) DEFAULT NULL COMMENT 'Employee home phone',
  `emp_Email` varchar(100) DEFAULT NULL COMMENT 'Employee Email Address',
  `emp_mail_Add` varchar(200) DEFAULT NULL COMMENT 'Employee mailing address',
  `emp_pmt_Add` varchar(200) DEFAULT NULL COMMENT 'Employee permanent address',
  `emp_District` varchar(20) DEFAULT NULL COMMENT 'Employee District',
  `emp_City` varchar(20) DEFAULT NULL COMMENT 'Employee City',
  `zip_Code` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_contact`
--

INSERT INTO `employee_contact` (`emp_cnt_Id`, `emp_mob_Ph`, `emp_home_Ph`, `emp_Email`, `emp_mail_Add`, `emp_pmt_Add`, `emp_District`, `emp_City`, `zip_Code`) VALUES
(1, 3339654236, 3339654236, 'Zulkarnain@gmail.com', 'Near HBL Bank Shamsabad Rawalpindi', 'Near HBL Bank Shamsabad Rawalpindi\r\nNBC Plaza', '152', '130', '44000'),
(2, 3339654236, 3339654236, 'fakhar@gmail.com', 'Near HBL Bank Shamsabad Rawalpindi\r\nNBC Plaza', 'Near HBL Bank Shamsabad Rawalpindi\r\nNBC Plaza', '152', '130', '44000'),
(3, 123456789, 123456789, 'abc@gmail.com', 'Shamsabad NBC Plaza', 'As Above', '87', '425', '46000'),
(4, 123456789, 123456789, 'abc@gmail.com', 'F-8 Markaz', 'As Above', '152', '130', '44000'),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, NULL, NULL, NULL, 'F-8 Markaz', NULL, '33', '1', '22010'),
(16, NULL, NULL, NULL, 'F-8 Markaz', NULL, '33', '1', '22010'),
(17, NULL, NULL, NULL, 'F-8 Markaz', NULL, '33', '1', '22010'),
(18, NULL, NULL, NULL, 'F-8 Markaz', NULL, '33', '1', '22010'),
(19, NULL, NULL, NULL, 'F-8 Markaz', NULL, '33', '1', '22010'),
(20, NULL, NULL, NULL, 'F-8 Markaz', NULL, '33', '1', '22010'),
(21, NULL, NULL, NULL, 'F-8 Markaz', NULL, '33', '1', '22010'),
(22, NULL, NULL, NULL, 'F-8 Markaz', NULL, '33', '1', '22010'),
(23, 3339654236, 3339654236, 'abdulmanan@gmail.com', 'Karak CIty', 'Karak CIty', '42', '188', '27200'),
(24, 3339654236, 3339654236, 'abdulmanan@gmail.com', 'Karak CIty', 'Karak CIty', '42', '188', '27200'),
(25, 3339654236, 3339654236, 'abdulmanan@gmail.com', 'Karak CIty', 'Karak CIty', '42', '188', '27200'),
(26, 3339654236, 3339654236, 'abdulmanan@gmail.com', 'Karak CIty', 'Karak CIty', '42', '188', '27200'),
(27, 3339654236, 3339654236, 'abdulmanan@gmail.com', 'Karak CIty', 'Karak CIty', '42', '188', '27200'),
(28, 3339654236, 3339654236, 'abdulmanan@gmail.com', 'Karak CIty', 'Karak CIty', '42', '188', '27200'),
(29, 3339654236, 3339654236, 'zaman@gmail.com', 'F-8 Markaz', 'Ab above', '42', '188', '27200'),
(30, 3339654236, 3339654236, 'zaman@gmail.com', 'F-8 Markaz', 'Ab above', '42', '188', '27200'),
(31, 3339654236, 3339654236, 'zaman@gmail.com', 'F-8 Markaz', 'Ab above', '42', '188', '27200'),
(32, 3339654236, 3339654236, 'zaman@gmail.com', 'F-8 Markaz', 'Ab above', '42', '188', '27200'),
(33, 3339654236, 3339654236, 'hasher@gmail.com', 'Karak CIty', 'Bannu City', '34', '36', '28100'),
(34, 3339654236, 3339654236, 'example@gmail.com', 'Karak City', 'Karak City', '42', '188', '27200'),
(35, 3339654236, 3339654236, 'example@gmail.com', 'Karak City', 'Karak City', '42', '188', '27200'),
(36, 3339654236, 3339654236, 'example@gmail.com', 'Karak City', 'Karak City', '42', '188', '27200'),
(37, 3339654236, 3339654236, 'abc@gmail.com', 'Karak City', 'Karak City', '42', '188', '27200'),
(38, 3339654236, 3339654236, 'example@gmail.com', 'Karak City', 'Karak City', '42', '188', '27200'),
(39, 3339654236, 3339654236, 'example@gmail.com', 'Karak City', 'Karak City', '42', '188', '27200'),
(40, 3339654236, 3339654236, 'musadiq@gmail.com', 'Karak City', 'Karak City', '42', '188', '27200'),
(41, 3339654236, 3339654236, 'musadiq@gmail.com', 'Karak City', 'Karak City', '42', '188', '27200'),
(42, 3339654236, 3339654236, 'abc@gmail.com', 'Karak City', 'Karak City', '42', '188', '27200'),
(43, 3339654236, 3339654236, 'hamza@gmail.com', 'Karak City', 'Karak City', '42', '188', '27200'),
(44, 3339654236, 3339654236, 'hamza@gmail.com', 'Karak City', 'Karak City', '42', '188', '27200'),
(45, 3353443510, 3353443510, 'islam.gulshan@gmail.com', 'khana pull', 'khana pull', '152', '130', '44000'),
(46, 3353443510, 3353443510, 'islam.gulshan@gmail.com', 'khana pull', 'khana pull', '152', '130', '44000'),
(47, 3353443510, 3353443510, 'islam.gulshan@gmail.com', 'khana pull', 'khana pull', '152', '130', '44000'),
(48, 3353443510, 3353443510, 'islam.gulshan@gmail.com', 'khana pull', 'khana pull', '152', '130', '44000'),
(49, 352542555, 352542555, 'islam.gulshan@gmail.com', 'das', 'test', '3', '152', '440000'),
(50, 99999999999, 99999999999, 'umerbazkhan@gmail.com', 'F-11 Islamabad', 'F-11 Islamabad', '152', '130', '44000'),
(51, 3353443510, 3353443510, 'islam.gulshan@gmail.com', 'khana pull', 'khana pull', '152', '130', '44000'),
(52, 3353443510, 3353443510, 'islam.gulshan@gmail.com', 'khana pull', 'khana pull', '152', '130', '44000');

-- --------------------------------------------------------

--
-- Table structure for table `employee_info`
--

CREATE TABLE `employee_info` (
  `emp_Id` bigint(20) NOT NULL COMMENT 'Employee ID',
  `emp_Cnic` bigint(20) NOT NULL COMMENT 'Employee National ID Card Number',
  `emp_Img` varchar(255) DEFAULT NULL COMMENT 'Employee Image',
  `emp_NTN` int(20) DEFAULT NULL COMMENT 'National Tax Number',
  `emp_given_name` varchar(150) DEFAULT NULL COMMENT 'Employee First Name',
  `emp_surname` varchar(150) DEFAULT NULL COMMENT 'Employee Middle Name',
  `emp_fat_Name` varchar(50) NOT NULL COMMENT 'Employee Father Name',
  `emp_Dob` date NOT NULL COMMENT 'Employee Birth Date',
  `gnd_Id` int(10) NOT NULL COMMENT 'Employee Gender',
  `emp_marital_Status` enum('Single','Married','Divorced','Separated','Widowed') NOT NULL COMMENT 'Employee Marital Status',
  `nation_Id` int(10) NOT NULL COMMENT 'Nationality of Employee',
  `country_Id` int(11) NOT NULL,
  `state_Id` int(11) NOT NULL,
  `dom_Id` int(10) NOT NULL COMMENT 'Domicile Id',
  `city_Id` int(11) DEFAULT NULL,
  `cast_Id` int(10) DEFAULT NULL COMMENT 'Cast ID',
  `relig_Id` int(10) DEFAULT NULL COMMENT 'Religion ID',
  `bg_Id` int(10) DEFAULT NULL COMMENT 'Blood Group ID',
  `emp_typ_Id` int(10) DEFAULT NULL COMMENT 'Employee Type Id',
  `sub_Id` int(10) DEFAULT NULL COMMENT 'Subject ID',
  `disable_Id` int(10) DEFAULT NULL COMMENT 'Disability of employee',
  `emp_cnt_Id` bigint(10) DEFAULT NULL COMMENT 'Employee contact Infomation Id',
  `empt_Id` bigint(10) DEFAULT NULL COMMENT 'Employment Info ID',
  `emer_cnt_Id` int(10) DEFAULT NULL COMMENT 'Emergency contact ID',
  `salary_Id` bigint(10) DEFAULT NULL COMMENT 'Salary ID',
  `user_Id` int(11) DEFAULT NULL,
  `emp_Status` enum('Active','Inactive') NOT NULL COMMENT 'Active or Inactive status',
  `desig_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_info`
--

INSERT INTO `employee_info` (`emp_Id`, `emp_Cnic`, `emp_Img`, `emp_NTN`, `emp_given_name`, `emp_surname`, `emp_fat_Name`, `emp_Dob`, `gnd_Id`, `emp_marital_Status`, `nation_Id`, `country_Id`, `state_Id`, `dom_Id`, `city_Id`, `cast_Id`, `relig_Id`, `bg_Id`, `emp_typ_Id`, `sub_Id`, `disable_Id`, `emp_cnt_Id`, `empt_Id`, `emer_cnt_Id`, `salary_Id`, `user_Id`, `emp_Status`, `desig_Id`) VALUES
(1, 14202555555555, 'emp1618986588.png', NULL, 'Zulkarnain', 'Haider', 'Muhammmad Shafi', '1988-01-01', 1, 'Single', 156, 156, 2, 2, 0, 1, 13, 3, 1, NULL, NULL, 1, 1, 3, NULL, 9, 'Active', NULL),
(21, 123444, NULL, NULL, NULL, NULL, 'khan', '2020-11-20', 1, 'Married', 156, 156, 4, 3, NULL, 3, 1, 3, 2, NULL, NULL, 47, 27, 41, NULL, 24, 'Active', 5),
(23, 123444234, NULL, NULL, NULL, NULL, 'khan', '2021-08-29', 1, 'Married', 156, 156, 4, 2, NULL, 2, 1, 4, 1, NULL, NULL, 48, 28, 42, NULL, 27, 'Active', 2),
(24, 22122312341, NULL, NULL, NULL, NULL, 'khan', '2021-10-06', 1, 'Married', 156, 156, 2, 4, NULL, 4, 16, 6, 1, NULL, NULL, 49, 29, 54, NULL, 18, 'Active', 3),
(26, 6856234552523422, NULL, NULL, NULL, NULL, 'Umar Baz Khan', '2001-01-01', 1, 'Single', 156, 156, 4, 39, NULL, 3, 13, 3, 1, NULL, NULL, 50, 30, 56, NULL, 49, 'Active', 52),
(27, 12344423, NULL, NULL, NULL, NULL, 'khan', '2000-01-25', 1, 'Married', 156, 156, 4, 152, NULL, 4, 7, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, 52, 'Active', 52),
(28, 1234442344, NULL, NULL, NULL, NULL, 'khan', '2000-01-25', 1, 'Married', 156, 156, 4, 152, NULL, 4, 7, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, 53, 'Active', 52),
(29, 12344423443, NULL, NULL, NULL, NULL, 'khan', '2000-01-25', 1, 'Married', 156, 156, 4, 152, NULL, 4, 7, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, 54, 'Active', 52),
(30, 123444234434, NULL, NULL, NULL, NULL, 'khan', '2000-01-25', 1, 'Married', 156, 156, 4, 152, NULL, 4, 7, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, 55, 'Active', 52),
(31, 1234442344342, NULL, NULL, NULL, NULL, 'khan', '2000-01-25', 1, 'Married', 156, 156, 4, 152, NULL, 4, 7, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, 56, 'Active', 52),
(32, 12344423443422, NULL, NULL, NULL, NULL, 'khan', '2000-01-25', 1, 'Married', 156, 156, 4, 152, NULL, 4, 7, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, 57, 'Active', 52),
(33, 123424423443422, NULL, NULL, NULL, NULL, 'khan', '2000-01-25', 1, 'Married', 156, 156, 4, 152, NULL, 4, 7, 4, 1, NULL, NULL, 51, 31, 58, NULL, 58, 'Active', 52),
(34, 222083232, NULL, NULL, NULL, NULL, 'umer baz', '1988-04-12', 1, 'Married', 156, 156, 4, 3, NULL, 4, 5, 3, 1, NULL, NULL, 52, 32, 59, NULL, 59, 'Active', 52);

-- --------------------------------------------------------

--
-- Table structure for table `employee_type`
--

CREATE TABLE `employee_type` (
  `emp_typ_Id` int(10) NOT NULL COMMENT 'Employee type''s ID',
  `emp_Type` enum('Teaching','None Teaching') NOT NULL COMMENT 'Employee type''s name',
  `desig_Id` int(10) NOT NULL COMMENT 'Designation ID of employee'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_type`
--

INSERT INTO `employee_type` (`emp_typ_Id`, `emp_Type`, `desig_Id`) VALUES
(1, 'Teaching', 1),
(2, 'None Teaching', 2);

-- --------------------------------------------------------

--
-- Table structure for table `employment_info`
--

CREATE TABLE `employment_info` (
  `empt_Id` bigint(10) NOT NULL COMMENT 'Employment table ID',
  `personal_No` varchar(255) DEFAULT NULL COMMENT 'Personal No',
  `appt_Date` date DEFAULT NULL COMMENT 'Apointment Date',
  `adjust_Date` date DEFAULT NULL COMMENT 'Adjustment Date',
  `tot_Service` varchar(50) DEFAULT NULL COMMENT 'Duration of service',
  `empt_Status` enum('Full Time','Part Time') DEFAULT NULL COMMENT 'Employment Status',
  `contract_Type` enum('Permanent','Contract') DEFAULT NULL COMMENT 'Contract Type',
  `contract_Duration` int(10) DEFAULT NULL COMMENT 'contract duration'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employment_info`
--

INSERT INTO `employment_info` (`empt_Id`, `personal_No`, `appt_Date`, `adjust_Date`, `tot_Service`, `empt_Status`, `contract_Type`, `contract_Duration`) VALUES
(1, '571798400', '2021-04-20', '2021-04-30', NULL, 'Full Time', 'Permanent', 1),
(2, '270315921', '2021-04-20', '2021-04-30', NULL, 'Full Time', 'Permanent', 1),
(3, '163658229', '2021-06-03', '2021-09-30', NULL, 'Full Time', 'Contract', 1),
(4, '164771234', '2021-07-11', '2021-09-30', NULL, 'Full Time', 'Contract', 1),
(5, '476293001', '2021-07-12', '2022-07-12', NULL, 'Full Time', 'Contract', 1),
(6, '445168289', '2021-07-12', '2022-07-12', NULL, 'Full Time', 'Contract', 1),
(7, '910668158', '2021-07-12', '2022-07-12', NULL, 'Full Time', 'Contract', 1),
(8, '913687226', '2021-07-12', '2022-07-12', NULL, 'Full Time', 'Contract', 1),
(9, '418675208', '2021-07-12', '2022-07-12', NULL, 'Full Time', 'Contract', 1),
(10, '230543511', '2021-07-12', '2022-07-12', NULL, 'Full Time', 'Contract', 1),
(11, '954958183', '2021-07-12', '2022-07-12', NULL, 'Full Time', 'Contract', 1),
(12, '651784198', '2021-07-12', '2022-07-12', NULL, 'Full Time', 'Contract', 1),
(13, '310428167', '2021-07-12', '2022-07-12', NULL, 'Full Time', 'Contract', 1),
(14, '972399825', '2021-07-12', '2022-07-12', NULL, 'Full Time', 'Contract', 1),
(15, '771050260', '2021-07-12', '2022-07-12', NULL, 'Full Time', 'Permanent', 1),
(16, '485045041', '2021-07-12', '2022-07-12', NULL, 'Full Time', 'Permanent', 1),
(17, '219319487', '2021-07-12', '2021-07-12', NULL, 'Full Time', 'Contract', 1),
(18, '709409943', '2021-07-12', '2021-07-12', NULL, 'Full Time', 'Contract', 1),
(19, '458956465', '2021-07-12', '2021-07-12', NULL, 'Full Time', 'Contract', 1),
(20, '981826352', '2021-07-12', '2021-07-12', NULL, 'Full Time', 'Contract', 1),
(21, '966280158', '2021-07-12', '2021-07-12', NULL, 'Full Time', 'Contract', 1),
(22, '824525999', '2021-07-12', '2021-07-12', NULL, 'Full Time', 'Contract', 1),
(23, '270415479', '2021-07-12', '2021-07-12', NULL, 'Full Time', 'Contract', 1),
(24, '990201143', '2021-07-12', '2022-07-12', NULL, 'Full Time', 'Contract', 1),
(25, '672771714', '2021-07-12', '2022-07-12', NULL, 'Full Time', 'Contract', 1),
(26, '645815384', '2021-07-12', '2021-07-12', NULL, 'Full Time', 'Contract', 1),
(27, 'HR-APS-21-30', '2021-11-26', '2021-11-26', NULL, 'Full Time', 'Contract', 1),
(28, NULL, '2021-08-29', '2021-08-29', NULL, 'Full Time', 'Permanent', 123),
(29, NULL, '2021-10-06', '2021-10-06', NULL, 'Full Time', 'Permanent', 23),
(30, 'HR-APS-21-31', '2021-12-09', '2022-12-12', NULL, 'Part Time', 'Contract', 1),
(31, 'HR-APS-22-31', '2022-02-01', '2022-03-11', NULL, 'Full Time', 'Permanent', 2),
(32, 'HR-APS-22-32', '2022-02-01', '2022-02-25', NULL, 'Full Time', 'Permanent', 123);

-- --------------------------------------------------------

--
-- Table structure for table `entity_type`
--

CREATE TABLE `entity_type` (
  `ent_typ_Id` int(10) NOT NULL COMMENT 'Entity Type ID',
  `ent_typ_Name` enum('General','Library') NOT NULL COMMENT 'Entity Type Name'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entity_type`
--

INSERT INTO `entity_type` (`ent_typ_Id`, `ent_typ_Name`) VALUES
(1, 'General'),
(2, 'Library');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start`, `end`, `created_at`, `updated_at`) VALUES
(24, 'fsdgfgsrg', '2021-12-15', '2021-12-16', '2021-12-14 06:31:14', '2021-12-14 06:31:14'),
(25, 'ewerwerw', '2021-12-17', '2021-12-18', '2021-12-14 06:31:17', '2021-12-14 06:31:17'),
(26, 'ewerewrew', '2021-12-14', '2021-12-15', '2021-12-14 06:31:20', '2021-12-14 06:31:20'),
(27, 'ewrewrewrew', '2021-12-18', '2021-12-19', '2021-12-14 06:31:24', '2021-12-14 06:31:24'),
(28, 'erwrewrew', '2021-12-19', '2021-12-20', '2021-12-14 06:31:26', '2021-12-14 06:31:26'),
(29, 'erwerwer', '2021-12-20', '2021-12-21', '2021-12-14 06:31:28', '2021-12-14 06:31:28'),
(30, 'erewrewrrewrewrew', '2021-12-21', '2021-12-22', '2021-12-14 06:31:33', '2021-12-14 06:31:33'),
(31, 'eeeeeeeeeeeeeeeeeeeeeeeee', '2021-12-22', '2021-12-23', '2021-12-14 06:31:36', '2021-12-14 06:31:36'),
(32, 'eeeeeeeeeeeeeeeeeeeeeeeeeee', '2021-12-23', '2021-12-24', '2021-12-14 06:31:39', '2021-12-14 06:31:39'),
(33, 'ewrwrewrewwwwwwwwwwwwwww', '2021-12-24', '2021-12-25', '2021-12-14 06:31:43', '2021-12-14 06:31:43'),
(34, 'Ssfasdfsdgsdd', '2021-12-25', '2021-12-26', '2021-12-24 08:25:03', '2021-12-24 08:25:03'),
(36, 'New Baby', '2022-06-06', '2022-06-07', '2022-01-03 02:59:44', '2022-01-03 02:59:44'),
(37, 'adsaffwt', '2021-12-28', '2021-12-29', '2022-01-04 02:24:19', '2022-01-04 02:24:19'),
(38, 'new', '2022-01-31', '2022-02-01', '2022-02-18 08:47:17', '2022-02-18 08:47:17');

-- --------------------------------------------------------

--
-- Table structure for table `examination`
--

CREATE TABLE `examination` (
  `exm_Id` bigint(100) NOT NULL COMMENT 'Exam ID',
  `std_Id` bigint(20) NOT NULL COMMENT 'Student''s ID',
  `exm_Date` date NOT NULL COMMENT 'Exam Date',
  `exm_typ_Id` int(10) NOT NULL COMMENT 'Exma Type''s ID',
  `b-univ_Regno` double(10,2) DEFAULT NULL COMMENT 'Board or EducationLevel Reg No',
  `sub_OMks` float(10,2) NOT NULL COMMENT 'Subject''s Obtained Marks',
  `sub_pass_Status` enum('Pass','Fail') NOT NULL COMMENT 'Subject''s Pass or Fail',
  `MT_CM` float(10,2) DEFAULT NULL COMMENT 'Monthly test Credit Marks',
  `mid_CM` float(10,2) DEFAULT NULL COMMENT 'Mid term Credit Marks',
  `att_CM` float(10,2) DEFAULT NULL COMMENT 'Attendance Credit Marks {(std_tot_att)/(tot_on_Days)*50}',
  `exm_tot_Mks` float(10,2) NOT NULL COMMENT 'Exam Total Marks',
  `exm_obt_Mks` float(10,2) NOT NULL COMMENT 'Exam Obtained Marks',
  `exm_obt_Percent` float(10,2) NOT NULL COMMENT 'Exam Obtained Percentage',
  `exm_pass_Status` enum('Pass','Fail') NOT NULL COMMENT 'Exam Pass or Fail Status',
  `grade_Id` int(10) NOT NULL COMMENT 'Grade achieved in Exam',
  `exm_std_Behav` varchar(100) DEFAULT NULL COMMENT 'Pupil''s Behaviour',
  `sub_Id` int(10) NOT NULL COMMENT 'Subject''s ID',
  `exm_Remark` varchar(100) DEFAULT NULL COMMENT 'Exam related Remarks by Controller of Exam or Teacher'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `exam_Id` bigint(100) NOT NULL,
  `exm_typ_Id` int(10) NOT NULL,
  `sc_sec_Id` int(10) DEFAULT NULL,
  `school_section` varchar(255) NOT NULL,
  `exam_Name` varbinary(255) NOT NULL,
  `exam_Start` date NOT NULL,
  `exam_End` date NOT NULL,
  `exam_Comment` varbinary(255) NOT NULL,
  `exam_Status` enum('Active','Inactive') NOT NULL,
  `top` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`exam_Id`, `exm_typ_Id`, `sc_sec_Id`, `school_section`, `exam_Name`, `exam_Start`, `exam_End`, `exam_Comment`, `exam_Status`, `top`) VALUES
(13, 1, NULL, '3,4', 0x6d6964647465727373, '2021-12-07', '2021-12-29', 0x73617373737373, 'Active', 0),
(14, 1, 3, '', 0x6d6964647465727373, '2021-12-07', '2021-12-29', 0x73617373737373, 'Active', 13),
(15, 1, 4, '', 0x6d6964647465727373, '2021-12-07', '2021-12-29', 0x73617373737373, 'Active', 13),
(16, 1, 7, '', 0x6d6964647465727373, '2021-12-07', '2021-12-29', 0x73617373737373, 'Active', 13),
(17, 1, 9, '', 0x6d6964647465727373, '2021-12-07', '2021-12-29', 0x73617373737373, 'Active', 13),
(18, 1, 10, '', 0x6d6964647465727373, '2021-12-07', '2021-12-29', 0x73617373737373, 'Active', 13);

-- --------------------------------------------------------

--
-- Table structure for table `exam_paper`
--

CREATE TABLE `exam_paper` (
  `exampaper_Id` bigint(10) NOT NULL,
  `exam_Id` bigint(100) DEFAULT NULL,
  `cls_Id` int(10) DEFAULT NULL,
  `sub_Id` int(10) DEFAULT NULL,
  `paper_File` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `exam_type`
--

CREATE TABLE `exam_type` (
  `exm_typ_Id` int(10) NOT NULL COMMENT 'Exam Type''s ID',
  `exm_typ_Name` varchar(50) NOT NULL COMMENT 'Exam Type''s Name',
  `exm_typ_Status` enum('Active','Inactive') NOT NULL COMMENT 'Exam Type Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_type`
--

INSERT INTO `exam_type` (`exm_typ_Id`, `exm_typ_Name`, `exm_typ_Status`) VALUES
(1, 'Weekly', 'Active'),
(2, 'Monthly', 'Active'),
(3, 'Daily', 'Active'),
(4, 'Annually', 'Active'),
(6, 'Others', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

CREATE TABLE `fee` (
  `fee_Id` int(10) NOT NULL COMMENT 'Fee ID',
  `fee_Name` varchar(50) NOT NULL COMMENT 'Fee Name',
  `fee_Amount` double(10,2) NOT NULL COMMENT 'Fee Amount',
  `cls_Id` int(10) NOT NULL COMMENT 'Class ID',
  `fee_Status` enum('Active','Inactive') NOT NULL COMMENT 'Fee Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fee_schedule`
--

CREATE TABLE `fee_schedule` (
  `fee_sch_Id` int(10) NOT NULL COMMENT 'PK',
  `std_Id` bigint(20) NOT NULL COMMENT 'student ID',
  `bill_Freq` enum('Monthly','Quarterly','Annualy') NOT NULL COMMENT 'Frequency of Bill generation',
  `payment_Mode` int(11) NOT NULL COMMENT 'Payment Method',
  `acc_Id` int(10) NOT NULL COMMENT 'deposit_Account',
  `issue_date` date DEFAULT NULL,
  `due_Date` date DEFAULT NULL,
  `fine_due_Date` double(10,2) DEFAULT NULL,
  `payable_by_due_date` decimal(10,2) DEFAULT NULL,
  `accounts` text NOT NULL,
  `fee_month` date NOT NULL DEFAULT current_timestamp(),
  `payable_after_due_date` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fee_schedule`
--

INSERT INTO `fee_schedule` (`fee_sch_Id`, `std_Id`, `bill_Freq`, `payment_Mode`, `acc_Id`, `issue_date`, `due_Date`, `fine_due_Date`, `payable_by_due_date`, `accounts`, `fee_month`, `payable_after_due_date`) VALUES
(10, 6, 'Monthly', 1, 20, '2022-03-01', '2022-03-06', 100.00, '5866.00', '[{\"\'id\'\":\"2\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"2000\"},{\"\'id\'\":\"3\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"200\"},{\"\'id\'\":\"4\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"200\"},{\"\'id\'\":\"5\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"200\"},{\"\'id\'\":\"6\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"200\"},{\"\'id\'\":\"7\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"200\"},{\"\'id\'\":\"8\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"2000\"},{\"\'id\'\":\"9\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"200\"},{\"\'id\'\":\"10\",\"\'bill_Freq\'\":\"2\",\"\'amount\'\":\"33\"},{\"\'id\'\":\"11\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"200\"},{\"\'id\'\":\"12\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"233\"},{\"\'id\'\":\"22\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"200\"}]', '2022-03-01', 5966.00);

-- --------------------------------------------------------

--
-- Table structure for table `fine`
--

CREATE TABLE `fine` (
  `fine_Id` bigint(10) NOT NULL COMMENT 'Fine Id',
  `fine_Name` varchar(30) DEFAULT NULL COMMENT 'Fine Name',
  `fine_Amount` double(10,2) DEFAULT NULL COMMENT 'Fine Amount',
  `cls_Id` int(10) DEFAULT NULL COMMENT 'Class Id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `gnd_Id` int(10) NOT NULL COMMENT 'Gender ID',
  `gender` enum('Male','Female','Transgender') NOT NULL COMMENT 'Name of Gender'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`gnd_Id`, `gender`) VALUES
(1, 'Male'),
(2, 'Female'),
(3, 'Transgender');

-- --------------------------------------------------------

--
-- Table structure for table `general_entity`
--

CREATE TABLE `general_entity` (
  `gent_Code` bigint(20) NOT NULL COMMENT 'General Enity Code',
  `gent_Name` varchar(255) NOT NULL COMMENT 'General Entity Name',
  `gent_single_Price` double(10,2) DEFAULT NULL COMMENT 'Single Entity Price',
  `gent_Quantity` bigint(10) NOT NULL COMMENT 'General Entity Quantity',
  `gent_tot_Price` double(10,2) NOT NULL COMMENT 'Price of the entity',
  `gent_Discount` double(10,2) DEFAULT NULL COMMENT 'Discount on General Entity',
  `supp_Id` bigint(10) DEFAULT NULL COMMENT 'Supplier ID of the entity'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `general_entity`
--

INSERT INTO `general_entity` (`gent_Code`, `gent_Name`, `gent_single_Price`, `gent_Quantity`, `gent_tot_Price`, `gent_Discount`, `supp_Id`) VALUES
(1, 'Entity 1', 450.00, 3, 1200.00, 50.00, 1),
(2, 'Entity 2', 500.00, 1, 550.00, 50.00, 2),
(3, 'Entity 3', 500.00, 1, 550.00, 50.00, 2);

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `grade_Id` int(10) NOT NULL COMMENT 'Grade ID',
  `exam_Id` bigint(100) NOT NULL,
  `exam_grade` text NOT NULL,
  `grade_Name` varchar(10) DEFAULT NULL COMMENT 'Name of grade',
  `grade_st_Per` float(10,2) DEFAULT NULL COMMENT 'Grade Starting marks range',
  `grade_end_Per` float(10,2) DEFAULT NULL COMMENT 'Grade ending marks range',
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`grade_Id`, `exam_Id`, `exam_grade`, `grade_Name`, `grade_st_Per`, `grade_end_Per`, `comment`) VALUES
(67, 1, '', 'A', 40.00, 46.00, 'dsadasda'),
(68, 3, '', 'A', 70.00, 79.00, 'A'),
(69, 3, '', 'B', 60.00, 69.00, 'B'),
(70, 3, '', 'C', 50.00, 59.00, 'C '),
(71, 3, '', 'D', 40.00, 49.00, 'd devision'),
(72, 3, '', 'F', 1.00, 39.00, 'Fail'),
(94, 13, '', 'A', 80.00, 90.00, 'dsadasda'),
(95, 13, '', 'B', 41.00, 50.00, 'as'),
(96, 13, '', 'C', 60.00, 69.00, 'sa'),
(97, 13, '', 'F', 0.00, 59.00, 'sa');

-- --------------------------------------------------------

--
-- Table structure for table `grade_general`
--

CREATE TABLE `grade_general` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grade_general`
--

INSERT INTO `grade_general` (`id`, `name`) VALUES
(1, 'A'),
(2, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `last_school`
--

CREATE TABLE `last_school` (
  `lsch_Id` int(10) NOT NULL COMMENT 'Last school Id',
  `lsch_class_Passed` bigint(20) DEFAULT NULL COMMENT 'Class passed from last school',
  `lsch_Name` varchar(100) DEFAULT NULL COMMENT 'Last school Name',
  `lsch_lv_Date` date DEFAULT NULL COMMENT 'Last school leaving date',
  `lsch_Comments` varchar(100) DEFAULT NULL COMMENT 'Last school comments',
  `lsch_slc_img` varchar(255) DEFAULT NULL COMMENT 'Last school SLc',
  `lsch_contact_No` varchar(20) DEFAULT NULL COMMENT 'Last SchoolNo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `last_school`
--

INSERT INTO `last_school` (`lsch_Id`, `lsch_class_Passed`, `lsch_Name`, `lsch_lv_Date`, `lsch_Comments`, `lsch_slc_img`, `lsch_contact_No`) VALUES
(13, 1, 'PAF', '2021-04-20', 'good Moral charachter', 'document1618914943.jpg', '5555555'),
(14, 1, 'PAF', '2021-04-20', 'good moral charachter', 'document1618915339.docx', '5555555'),
(15, 1, 'PAF', '2021-04-26', 'Having Good moral Character', 'document1619427428.jpg', '5555555'),
(16, 2, 'Abc', '2021-04-29', 'Good Charachter', 'document1619677545.pdf', '11111111'),
(17, 1, 'Paf', '2020-07-12', 'Having Good Moral Character', 'document1626088957.pdf', '022233333'),
(19, 2, 'das', '2021-08-04', 'dsa', 'document1629961651.jpg', '12222'),
(20, 2, 'das', '2021-08-04', 'dsa', 'document1629961697.jpg', '12222'),
(21, 2, 'das', '2021-08-04', 'dsa', 'document1629961734.jpg', '12222'),
(22, 2, 'das', '2021-08-04', 'dsa', 'document1629961850.jpg', '12222'),
(25, 1, 'Pafss', '2021-07-12', 'Having Good Moral Charachter', NULL, '03339654236'),
(26, 1, 'Pafss', '2021-07-12', 'Having Good Moral Charachter', NULL, '03339654236'),
(27, 1, 'Pafss', '2021-07-12', 'Having Good Moral Charachter', NULL, '03339654236'),
(28, 1, 'Pafss', '2021-07-12', 'Having Good Moral Charachter', NULL, '03339654236'),
(29, 1, 'Pafss', '2021-07-12', 'Having Good Moral Charachter', NULL, '03339654236'),
(30, 1, 'Pafss', '2021-07-12', 'Having Good Moral Charachter', NULL, '03339654236'),
(31, 1, 'ad', '2021-09-22', 'dsadasd', NULL, '12121'),
(32, 1, 'ad', '2021-09-22', 'dsadasd', NULL, '12121'),
(33, 1, 'ad', '2021-09-23', 'd', NULL, '12121'),
(34, 1, 'ad', '2021-09-23', 'd', NULL, '12121'),
(35, 1, 'ad', '2021-09-23', 'd', NULL, '12121'),
(36, 1, 'ad', '2021-09-23', 'd', NULL, '12121'),
(37, 1, 'ad', '2021-09-23', 'd', NULL, '12121'),
(38, 1, 'ad', '2021-09-23', 'd', NULL, '12121'),
(39, 1, 'ad', '2021-09-23', 'sa', NULL, '12121'),
(40, 2, 'ad', '2021-09-23', 'ds', NULL, '12121'),
(41, 2, 'ad', '2021-09-23', 'ds', NULL, '12121'),
(42, 2, 'ad', '2021-09-23', 'ds', NULL, '12121'),
(43, 2, 'ad', '2021-09-23', 'ds', NULL, '12121'),
(44, 2, 'ad', '2021-09-23', 'ds', NULL, '12121'),
(45, 2, 'ad', '2021-09-23', 'ds', NULL, '12121'),
(46, 2, 'ad', '2021-09-23', 'ds', NULL, '12121'),
(47, 1, 'ad', '2021-09-24', 'sa', 'D:\\xampp\\tmp\\php14EF.tmp', '12121'),
(48, 1, 'ad', '2021-09-24', 'sa', 'D:\\xampp\\tmp\\php8629.tmp', '12121'),
(49, 14, 'Wisdom Public School', NULL, 'Having Good Moral Character', 'document1639046961.png', '5345426346'),
(50, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `library_entity`
--

CREATE TABLE `library_entity` (
  `lent_Code` bigint(20) NOT NULL COMMENT 'Library Entity Code',
  `pub_Id` bigint(10) DEFAULT NULL COMMENT 'Publishe ID',
  `auth_Id` bigint(10) DEFAULT NULL COMMENT 'Author ID',
  `edition_Id` int(10) DEFAULT NULL COMMENT 'Edition Id',
  `gent_Code` bigint(20) DEFAULT NULL COMMENT 'General Entity Code'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `library_entity`
--

INSERT INTO `library_entity` (`lent_Code`, `pub_Id`, `auth_Id`, `edition_Id`, `gent_Code`) VALUES
(1, 1, 2, 1, 1),
(2, 1, 2, 1, 2),
(4, 1, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `library_floor`
--

CREATE TABLE `library_floor` (
  `floor_Id` int(10) NOT NULL COMMENT 'Library Floor ID',
  `floor_Name` varchar(30) NOT NULL COMMENT 'Library Floor Name',
  `shelf_Id` int(10) NOT NULL COMMENT 'Floor''s Shelf ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `library_floor`
--

INSERT INTO `library_floor` (`floor_Id`, `floor_Name`, `shelf_Id`) VALUES
(1, 'Ground', 1),
(2, '1st', 2),
(3, '2nd', 4),
(4, '3rd', 1),
(5, '4th', 1),
(6, '5th', 2),
(7, '6th', 2),
(8, '7th', 1),
(9, '8th', 3),
(10, '9th', 2),
(11, '10th', 2);

-- --------------------------------------------------------

--
-- Table structure for table `library_info`
--

CREATE TABLE `library_info` (
  `library_Id` bigint(20) NOT NULL COMMENT 'Stationary ID',
  `lent_Code` bigint(20) NOT NULL COMMENT 'Library Entity Code',
  `stat_categ_Id` int(10) NOT NULL COMMENT 'Stationary Category (Book, Magzine, Newspaper)',
  `pub_Id` bigint(10) DEFAULT NULL COMMENT 'Publisher ID',
  `auth_Id` bigint(10) DEFAULT NULL COMMENT 'Authors Id',
  `edition_Id` int(10) DEFAULT NULL COMMENT 'Edition Id',
  `supp_Id` bigint(10) DEFAULT NULL COMMENT 'Supplier ID',
  `floor_Id` int(10) DEFAULT NULL COMMENT 'Library Floor ID',
  `stat_iss_Date` date DEFAULT NULL COMMENT 'Stationary issue date',
  `stat_ret_Date` date DEFAULT NULL COMMENT 'Stationary return Date',
  `stat_alert_Type` enum('0','1') NOT NULL COMMENT 'Stationary alert status for return time',
  `stat_ret_Condition` enum('Ok','Damaged','Lost') NOT NULL COMMENT 'Stationary condition at return',
  `std_Id` bigint(20) DEFAULT NULL COMMENT 'Student ID from student_info Table',
  `emp_Id` bigint(20) DEFAULT NULL COMMENT 'Employee ID from employee_info'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `library_info`
--

INSERT INTO `library_info` (`library_Id`, `lent_Code`, `stat_categ_Id`, `pub_Id`, `auth_Id`, `edition_Id`, `supp_Id`, `floor_Id`, `stat_iss_Date`, `stat_ret_Date`, `stat_alert_Type`, `stat_ret_Condition`, `std_Id`, `emp_Id`) VALUES
(2, 1, 3, 1, 2, 1, 3, 2, '2021-08-10', '2021-08-30', '1', 'Ok', 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `library_rack`
--

CREATE TABLE `library_rack` (
  `rack_Id` int(10) NOT NULL COMMENT 'Library Shelf Rack ID',
  `rack_No` int(10) NOT NULL COMMENT 'Shelf''s Rack Number'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `library_rack`
--

INSERT INTO `library_rack` (`rack_Id`, `rack_No`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7);

-- --------------------------------------------------------

--
-- Table structure for table `library_shelf`
--

CREATE TABLE `library_shelf` (
  `shelf_Id` int(10) NOT NULL COMMENT 'Library Shelf ID',
  `shelf_No` int(10) NOT NULL COMMENT 'Library Shelf No',
  `rack_Id` int(10) NOT NULL COMMENT 'Shelf Rack ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `library_shelf`
--

INSERT INTO `library_shelf` (`shelf_Id`, `shelf_No`, `rack_Id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 2),
(4, 4, 3),
(8, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `marital_status`
--

CREATE TABLE `marital_status` (
  `pk_marital_id` int(11) NOT NULL,
  `marital_status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marital_status`
--

INSERT INTO `marital_status` (`pk_marital_id`, `marital_status`) VALUES
(1, 'Single'),
(2, 'Married'),
(3, 'Divorced'),
(5, 'Separated'),
(6, 'Widow');

-- --------------------------------------------------------

--
-- Table structure for table `marks_obtain`
--

CREATE TABLE `marks_obtain` (
  `id` int(11) NOT NULL,
  `exam_Id` int(11) NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `sub_Id` int(11) DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `Writing` varchar(50) NOT NULL,
  `Nazra` varchar(20) NOT NULL,
  `Practical` varchar(20) NOT NULL,
  `Reading` varchar(20) NOT NULL,
  `Speaking` varchar(20) NOT NULL,
  `Listening` varchar(20) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `Theory` varchar(255) NOT NULL,
  `Attendance` varchar(50) NOT NULL,
  `NoteBook` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marks_obtain`
--

INSERT INTO `marks_obtain` (`id`, `exam_Id`, `subject_id`, `sub_Id`, `date`, `Writing`, `Nazra`, `Practical`, `Reading`, `Speaking`, `Listening`, `comment`, `Theory`, `Attendance`, `NoteBook`) VALUES
(25, 3, 9, 25, '2021-07-03', '20', '20', '20', '20', '20', '', 'comment aaded', '23', '', ''),
(26, 3, 9, 28, '2021-07-03', '20', '20', '20', '20', '20', '', 'coomend', '23', '', ''),
(28, 3, 11, 6, '2021-07-02', '21', '20', '20', '8', '20', '', 'sa ', '23', '', ''),
(29, 3, 9, 25, '2021-07-03', '20', '20', '20', '20', '20', '', 'comment aaded', '23', '', ''),
(30, 3, 9, 28, '2021-07-03', '20', '20', '20', '20', '20', '', 'coomend', '23', '', ''),
(31, 3, 11, 6, '2021-07-02', '21', '20', '20', '8', '20', '', 'sa ', '23', '', ''),
(32, 3, 9, 25, '2021-07-03', '20', '20', '20', '20', '20', '', 'comment aaded', '23', '', ''),
(33, 3, 9, 28, '2021-07-03', '20', '20', '20', '20', '20', '', 'coomend', '23', '', ''),
(34, 3, 11, 6, '2021-07-02', '21', '20', '20', '8', '20', '', 'sa ', '23', '', ''),
(35, 3, 9, 25, '2021-07-03', '20', '20', '20', '20', '20', '', 'comment aaded', '23', '', ''),
(36, 3, 9, 28, '2021-07-03', '20', '20', '20', '20', '20', '', 'coomend', '23', '', ''),
(37, 3, 11, 6, '2021-07-02', '21', '20', '20', '8', '20', '', 'sa ', '23', '', ''),
(38, 3, 9, 25, '2021-07-03', '20', '20', '20', '20', '20', '', 'comment aaded', '23', '', ''),
(39, 3, 9, 28, '2021-07-03', '20', '20', '20', '20', '20', '', 'coomend', '23', '', ''),
(40, 3, 11, 6, '2021-07-02', '21', '20', '20', '8', '20', '', 'sa ', '23', '', ''),
(41, 3, 9, 25, '2021-07-03', '20', '20', '20', '20', '20', '', 'comment aaded', '23', '', ''),
(42, 3, 9, 28, '2021-07-03', '20', '20', '20', '20', '20', '', 'coomend', '23', '', ''),
(43, 3, 11, 6, '2021-07-02', '21', '20', '20', '8', '20', '', 'sa ', '23', '', ''),
(44, 3, 9, 25, '2021-07-03', '20', '20', '20', '20', '20', '', 'comment aaded', '23', '', ''),
(45, 3, 9, 28, '2021-07-03', '20', '20', '20', '20', '20', '', 'coomend', '23', '', ''),
(46, 3, 11, 6, '2021-07-02', '21', '20', '20', '8', '20', '', 'sa ', '23', '', ''),
(47, 3, 9, 25, '2021-07-03', '20', '20', '20', '20', '20', '', 'comment aaded', '23', '', ''),
(48, 3, 9, 28, '2021-07-03', '20', '20', '20', '20', '20', '', 'coomend', '23', '', ''),
(49, 3, 11, 6, '2021-07-02', '21', '20', '20', '8', '20', '', 'sa ', '23', '', ''),
(50, 13, 11, 6, '2021-12-08', '', '', '', '50', '', '', NULL, '', '', ''),
(51, 13, 9, 6, '2021-12-07', '', '', '3', '', '', '40', NULL, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_08_17_124029_create_permission_tables', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 2),
(1, 'App\\Models\\User', 3),
(1, 'App\\Models\\User', 4),
(1, 'App\\Models\\User', 5),
(1, 'App\\Models\\User', 7),
(1, 'App\\Models\\User', 8),
(1, 'App\\Models\\User', 9),
(1, 'App\\Models\\User', 11),
(1, 'App\\Models\\User', 12),
(1, 'App\\Models\\User', 13),
(1, 'App\\Models\\User', 14),
(1, 'App\\Models\\User', 15),
(1, 'App\\Models\\User', 16),
(1, 'App\\Models\\User', 17),
(1, 'App\\Models\\User', 18),
(1, 'App\\Models\\User', 22),
(1, 'App\\Models\\User', 23),
(1, 'App\\Models\\User', 49),
(1, 'App\\Models\\User', 52),
(1, 'App\\Models\\User', 53),
(1, 'App\\Models\\User', 54),
(1, 'App\\Models\\User', 55),
(1, 'App\\Models\\User', 56),
(1, 'App\\Models\\User', 57),
(1, 'App\\Models\\User', 58),
(1, 'App\\Models\\User', 59),
(2, 'App\\Models\\User', 24),
(2, 'App\\Models\\User', 26),
(2, 'App\\Models\\User', 27),
(2, 'App\\Models\\User', 40),
(4, 'App\\Models\\User', 10),
(5, 'App\\Models\\User', 19),
(6, 'App\\Models\\User', 1),
(7, 'App\\Models\\User', 21),
(9, 'App\\Models\\User', 6),
(9, 'App\\Models\\User', 25),
(9, 'App\\Models\\User', 28),
(9, 'App\\Models\\User', 29),
(9, 'App\\Models\\User', 30),
(9, 'App\\Models\\User', 48),
(9, 'App\\Models\\User', 50),
(10, 'App\\Models\\User', 39),
(10, 'App\\Models\\User', 41),
(10, 'App\\Models\\User', 42),
(10, 'App\\Models\\User', 45),
(10, 'App\\Models\\User', 46),
(10, 'App\\Models\\User', 47),
(10, 'App\\Models\\User', 51);

-- --------------------------------------------------------

--
-- Table structure for table `nationality`
--

CREATE TABLE `nationality` (
  `nation_Id` int(10) NOT NULL COMMENT 'Nationality ID',
  `nationality` varchar(50) NOT NULL COMMENT 'Name of the Nationality',
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nationality`
--

INSERT INTO `nationality` (`nation_Id`, `nationality`, `country`) VALUES
(1, 'Afghan', 'Afghanistan'),
(2, 'Albanian', 'Albania'),
(3, 'Algerian', 'Algeria'),
(4, 'American', 'America'),
(5, 'Andorran', 'Andorra'),
(6, 'Angolan', 'Angola'),
(7, 'Anguillan', 'Anguilla'),
(8, 'Argentine', 'Argentina'),
(9, 'Armenian', 'Armenia'),
(10, 'Australian', 'Australia'),
(11, 'Austrian', 'Austria'),
(12, 'Azerbaijani', 'Azerbaijan'),
(13, 'Bahamian', 'Bahamas'),
(14, 'Bahraini', 'Bahrain'),
(15, 'Bangladeshi', 'Bangladesh'),
(16, 'Barbadian', 'Barbados'),
(17, 'Belarusian', 'Belarus'),
(18, 'Belgian', 'Belgium'),
(19, 'Belizean', 'Belize'),
(20, 'Beninese', 'Benin'),
(21, 'Bermudian', 'Bermuda'),
(22, 'Bhutanese', 'Bhutan'),
(23, 'Bolivian', 'Bolivia'),
(24, 'Botswanan', 'Botswana'),
(25, 'Brazilian', 'Brazil'),
(26, 'British', 'United Kingdom'),
(27, 'British Virgin Islander', 'British Virgin Islands'),
(28, 'Bruneian', 'Brunei'),
(29, 'Bulgarian', 'Bulgaria'),
(30, 'Burkinan', 'Burkina Faso'),
(31, 'Burmese', 'Myanmar (Burma)'),
(32, 'Burundian', 'Burundi'),
(33, 'Cambodian', 'Cambodia'),
(34, 'Cameroonian', 'Cameroon'),
(35, 'Canadian', 'Canada'),
(36, 'Cape Verdean', 'Cape Verde'),
(37, 'Cayman Islander', 'Cayman Islands'),
(38, 'Central African', 'Central African Republic'),
(39, 'Chadian', 'Chad'),
(40, 'Chilean', 'Chile'),
(41, 'Chinese', 'China'),
(42, 'Citizen of Antigua and Barbuda', 'Antigua and Barbuda'),
(43, 'Citizen of Bosnia and Herzegovina', 'Bosnia and Herzegovina'),
(44, 'Citizen of Guinea-Bissau', 'Guinea-Bissau'),
(45, 'Citizen of Kiribati', 'Kiribati'),
(46, 'Citizen of Seychelles', 'Seychelles'),
(47, 'Citizen of the Dominican Republic', 'Dominican Republic'),
(48, 'Citizen of Vanuatu ', 'Vanuatu'),
(49, 'Colombian', 'Colombia'),
(50, 'Comoran', 'Comoros'),
(51, 'Congolese (Congo)', 'Republic of the Congo'),
(52, 'Congolese (DRC)', 'Democratic Republic of the Congo'),
(53, 'Cook Islander', 'Cook Islands'),
(54, 'Costa Rican', 'Costa Rica'),
(55, 'Croatian', 'Croatia'),
(56, 'Cuban', 'Cuba'),
(57, 'Cymraes', 'Wales'),
(58, 'Cymro', 'Cymry'),
(59, 'Cypriot', 'Cyprus'),
(60, 'Czech', 'Czechia'),
(61, 'Danish', 'Denmark'),
(62, 'Djiboutian', 'Djibouti'),
(63, 'Dominican', 'Dominican Republic'),
(64, 'Dutch', 'Netherlands'),
(65, 'East Timorese', 'Timor-Leste'),
(66, 'Ecuadorean', 'Ecuador'),
(67, 'Egyptian', 'Egypt'),
(68, 'Emirati', 'United Arab Emirates'),
(69, 'English', 'England'),
(70, 'Equatorial Guinean', 'Equatorial Guinea'),
(71, 'Eritrean', 'Eritrea'),
(72, 'Estonian', 'Estonia'),
(73, 'Ethiopian', 'Ethiopia'),
(74, 'Faroese', 'Faroe Islands'),
(75, 'Fijian', 'Fiji'),
(76, 'Filipino', 'Philippines'),
(77, 'Finnish', 'Finland'),
(78, 'French', 'France'),
(79, 'Gabonese', 'Gabon'),
(80, 'Gambian', 'Gambia'),
(81, 'Georgian', 'Georgia'),
(82, 'German', 'Germany'),
(83, 'Ghanaian', 'Ghana'),
(84, 'Gibraltarian', 'Gibraltar'),
(85, 'Greek', 'Greece'),
(86, 'Greenlandic', 'Greenland'),
(87, 'Grenadian', 'Grenada'),
(88, 'Guamanian', 'Guam'),
(89, 'Guatemalan', 'Guatemala'),
(90, 'Guinean', 'Guinea'),
(91, 'Guyanese', 'Guyana'),
(92, 'Haitian', 'Haiti'),
(93, 'Honduran', 'Honduras'),
(94, 'Hong Konger', 'Hong Kong'),
(95, 'Hungarian', 'Hungary'),
(96, 'Icelandic', 'Iceland'),
(97, 'Indian', 'India'),
(98, 'Indonesian', 'Indonesia'),
(99, 'Iranian', 'Iran'),
(100, 'Iraqi', 'Iraq'),
(101, 'Irish', 'Ireland'),
(102, 'Israeli', 'Israel'),
(103, 'Italian', 'Italy'),
(104, 'Ivorian', 'Cote d\'Ivoire'),
(105, 'Jamaican', 'Jamaica'),
(106, 'Japanese', 'Japan'),
(107, 'Jordanian', 'Jordan'),
(108, 'Kazakh', 'Kazakhstan'),
(109, 'Kenyan', 'Kenya'),
(110, 'Kittitian', 'Saint Kitts and Nevis'),
(111, 'Kosovan', 'Kosovo'),
(112, 'Kuwaiti', 'Kuwait'),
(113, 'Kyrgyz', 'Kyrgyzstan'),
(114, 'Lao', 'Laos'),
(115, 'Latvian', 'Latvia'),
(116, 'Lebanese', 'Lebanon'),
(117, 'Liberian', 'Liberia'),
(118, 'Libyan', 'Libya'),
(119, 'Liechtenstein citizen', 'Liechtenstein'),
(120, 'Lithuanian', 'Lithuania'),
(121, 'Luxembourger', 'Luxembourg'),
(122, 'Macanese', 'Macao'),
(123, 'Macedonian', 'Macedonia'),
(124, 'Malagasy', 'Madagascar'),
(125, 'Malawian', 'Malawi'),
(126, 'Malaysian', 'Malaysia'),
(127, 'Maldivian', 'Maldives'),
(128, 'Malian', 'Mali'),
(129, 'Maltese', 'Malta'),
(130, 'Marshallese', 'Marshall Islands'),
(131, 'Martiniquais', 'Martinique'),
(132, 'Mauritanian', 'Mauritania'),
(133, 'Mauritian', 'Mauritius'),
(134, 'Mexican', 'Mexico'),
(135, 'Micronesian', 'Federated States of Micronesia'),
(136, 'Moldovan', 'Moldova'),
(137, 'Monegasque', 'Monaco'),
(138, 'Mongolian', 'Mongolia'),
(139, 'Montenegrin', 'Montenegro'),
(140, 'Montserratian', 'Montserrat'),
(141, 'Moroccan', 'Morocco'),
(142, 'Mosotho', 'Kingdom of Lesotho'),
(143, 'Mozambican', 'Mozambique'),
(144, 'Namibian', 'Namibia'),
(145, 'Nauruan', 'Republic of Nauru'),
(146, 'Nepalese', 'Nepal'),
(147, 'New Zealander', 'New Zealand'),
(148, 'Nicaraguan', 'Nicaragua'),
(150, 'Nigerien', 'Nigeria'),
(151, 'Niuean', 'Niue'),
(152, 'North Korean', 'North Korea'),
(153, 'Northern Irish', 'Northern Ireland'),
(154, 'Norwegian', 'Norway'),
(155, 'Omani', 'Oman'),
(156, 'Pakistani', 'Pakistan'),
(157, 'Palauan', 'Palau'),
(158, 'Palestinian', 'Palestine'),
(159, 'Panamanian', 'Panama'),
(160, 'Papua New Guinean', 'Papua New Guinea'),
(161, 'Paraguayan', 'Paraguay'),
(162, 'Peruvian', 'Peru'),
(163, 'Pitcairn Islander', 'Pitcairn Islands'),
(164, 'Polish', 'Poland'),
(165, 'Portuguese', 'Portugal '),
(166, 'Prydeinig', ''),
(167, 'Puerto Rican', 'Puerto Rico'),
(168, 'Qatari', 'Qatar'),
(169, 'Romanian', 'Romania'),
(170, 'Russian', 'Russia'),
(171, 'Rwandan', 'Rwanda'),
(172, 'Salvadorean', 'Republic of El Salvador'),
(173, 'Sammarinese', 'San Marino'),
(174, 'Samoan', 'Samoa'),
(175, 'Sao Tomean', 'Saint Thomas and Prince'),
(176, 'Saudi Arabian', 'Saudi Arabia'),
(177, 'Scottish', 'Scotland'),
(178, 'Senegalese', 'Senegal'),
(179, 'Serbian', 'Serbia'),
(180, 'Sierra Leonean', 'Sierra Leone'),
(181, 'Singaporean', 'Singapore'),
(182, 'Slovak', 'Slovakia'),
(183, 'Slovenian', 'Slovenia'),
(184, 'Solomon Islander', 'Solomon Islands'),
(185, 'Somali', 'Somalia'),
(186, 'South African', 'South Africa'),
(187, 'South Korean', 'South Korea'),
(188, 'South Sudanese', 'South Sudan'),
(189, 'Spanish', 'Spain'),
(190, 'Sri Lankan', 'Sri Lanka'),
(191, 'St Helenian', 'Saint Helena'),
(192, 'St Lucian', 'Saint Lucia'),
(193, 'Stateless', 'Stateless Nation'),
(194, 'Sudanese', 'Sudan'),
(195, 'Surinamese', 'Suriname'),
(196, 'Swazi', 'Kingdom of Swaziland | eSwatini'),
(197, 'Swedish', 'Sweden'),
(198, 'Swiss', 'Switzerland'),
(199, 'Syrian', 'Syria'),
(200, 'Taiwanese', 'Taiwan'),
(201, 'Tajik', 'Tajikistan'),
(202, 'Tanzanian', 'Tanzania'),
(203, 'Thai', 'Thailand'),
(204, 'Togolese', 'Togo'),
(205, 'Tongan', 'Tonga'),
(206, 'Trinidadian', 'Trinidad and Tobago'),
(207, 'Tristanian', 'Tristan da Cunha'),
(208, 'Tunisian', 'Tunisia'),
(209, 'Turkish', 'Turkey'),
(210, 'Turkmen', 'Turkmenistan'),
(211, 'Turks and Caicos Islander', 'Turks and Caicos Islands'),
(212, 'Tuvaluan', 'Tuvalu'),
(213, 'Ugandan', 'Uganda'),
(214, 'Ukrainian', 'Ukrain'),
(215, 'Uruguayan', 'Uruguay'),
(216, 'Uzbek', 'Uzbekistan'),
(217, 'Vatican citizen', 'Vatican City'),
(218, 'Venezuelan', 'Venezuela'),
(219, 'Vietnamese', 'Vietnam'),
(220, 'Vincentian', 'Saint Vincent and the Grenadines'),
(221, 'Wallisian', 'Wallis and Futuna'),
(222, 'Welsh', 'Welsh '),
(223, 'Yemeni', 'Yemen'),
(224, 'Zambian', 'Zambia'),
(225, 'Zimbabwean', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `occupation`
--

CREATE TABLE `occupation` (
  `occup_Id` int(10) NOT NULL COMMENT 'Occupation ID',
  `occup_Name` varchar(50) NOT NULL COMMENT 'Profession Name'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `occupation`
--

INSERT INTO `occupation` (`occup_Id`, `occup_Name`) VALUES
(1, 'Accountant'),
(2, 'Accounts Assistant'),
(3, 'Accounts Clerk'),
(4, 'Accounts Manager'),
(5, 'Accounts Staff'),
(6, 'Acoustic Engineer'),
(7, 'Actor'),
(8, 'Actress'),
(9, 'Actuary'),
(10, 'Acupuncturist'),
(11, 'Adjustor'),
(12, 'Administration Assistant'),
(13, 'Administration Clerk'),
(14, 'Administration Manager'),
(15, 'Administration Staff'),
(16, 'Administrator'),
(17, 'Advertising Agent'),
(18, 'Advertising Assistant'),
(19, 'Advertising Clerk'),
(20, 'Advertising Contractor'),
(21, 'Advertising Executive'),
(22, 'Advertising Manager'),
(23, 'Advertising Staff'),
(24, 'Aerial Erector'),
(25, 'Aerobic Instructor'),
(26, 'Aeronautical Engineer'),
(27, 'Agent'),
(28, 'Air Traffic Controller'),
(29, 'Aircraft Designer'),
(30, 'Aircraft Engineer'),
(31, 'Aircraft Maintenance Engineer'),
(32, 'Aircraft Surface Finisher'),
(33, 'Airman'),
(34, 'Airport Controller'),
(35, 'Airport Manager'),
(36, 'Almoner'),
(37, 'Ambulance Controller'),
(38, 'Ambulance Crew'),
(39, 'Ambulance Driver'),
(40, 'Amusement Arcade Worker'),
(41, 'Anaesthetist'),
(42, 'Analyst'),
(43, 'Analytical Chemist'),
(44, 'Animal Breeder'),
(45, 'Anthropologist'),
(46, 'Antique Dealer'),
(47, 'Applications Engineer'),
(48, 'Applications Programmer'),
(49, 'Arbitrator'),
(50, 'Arborist'),
(51, 'Archaeologist'),
(52, 'Architect'),
(53, 'Archivist'),
(54, 'Area Manager'),
(55, 'Armourer'),
(56, 'Aromatherapist'),
(57, 'Art Critic'),
(58, 'Art Dealer'),
(59, 'Art Historian'),
(60, 'Art Restorer'),
(61, 'Artexer'),
(62, 'Artist'),
(63, 'Arts'),
(64, 'Assembly Worker'),
(65, 'Assessor'),
(66, 'Assistant'),
(67, 'Assistant Caretaker'),
(68, 'Assistant Cook'),
(69, 'Assistant Manager'),
(70, 'Assistant Nurse'),
(71, 'Assistant Teacher'),
(72, 'Astrologer'),
(73, 'Astronomer'),
(74, 'Attendant'),
(75, 'Au Pair'),
(76, 'Auction Worker'),
(77, 'Auctioneer'),
(78, 'Audiologist'),
(79, 'Audit Clerk'),
(80, 'Audit Manager'),
(81, 'Auditor'),
(82, 'Auto Electrician'),
(83, 'Auxiliary Nurse'),
(84, 'Bacon Curer'),
(85, 'Baggage Handler'),
(86, 'Bailiff'),
(87, 'Baker'),
(88, 'Bakery Assistant'),
(89, 'Bakery Manager'),
(90, 'Bakery Operator'),
(91, 'Balloonist'),
(92, 'Bank Clerk'),
(93, 'Bank Manager'),
(94, 'Bank Messenger'),
(95, 'Baptist Minister'),
(96, 'Bar Manager'),
(97, 'Bar Steward'),
(98, 'Barber'),
(99, 'Barmaid'),
(100, 'Barman'),
(101, 'Barrister'),
(102, 'Beautician'),
(103, 'Beauty Therapist'),
(104, 'Betting Shop'),
(105, 'Bill Poster'),
(106, 'Bingo Caller'),
(107, 'Biochemist'),
(108, 'Biologist'),
(109, 'Blacksmith'),
(110, 'Blind Assembler'),
(111, 'Blind Fitter'),
(112, 'Blinds Installer'),
(113, 'Boat Builder'),
(114, 'Body Fitter'),
(115, 'Bodyguard'),
(116, 'Bodyshop'),
(117, 'Book Binder'),
(118, 'Book Seller'),
(119, 'Book-Keeper'),
(120, 'Booking Agent'),
(121, 'Booking Clerk'),
(122, 'Bookmaker'),
(123, 'Botanist'),
(124, 'Branch Manager'),
(125, 'Breeder'),
(126, 'Brewer'),
(127, 'Brewery Manager'),
(128, 'Brewery Worker'),
(129, 'Bricklayer'),
(130, 'Broadcaster'),
(131, 'Builder'),
(132, 'Builders Labourer'),
(133, 'Building Advisor'),
(134, 'Building Control'),
(135, 'Building Engineer'),
(136, 'Building Estimator'),
(137, 'Building Foreman'),
(138, 'Building Inspector'),
(139, 'Building Manager'),
(140, 'Building Surveyor'),
(141, 'Bursar'),
(142, 'Bus Company'),
(143, 'Bus Conductor'),
(144, 'Bus Driver'),
(145, 'Bus Mechanic'),
(146, 'Bus Valeter'),
(147, 'Business Consultant'),
(148, 'Business Proprietor'),
(149, 'Butcher'),
(150, 'Butchery Manager'),
(151, 'Butler'),
(152, 'Buyer'),
(153, 'Cab Driver'),
(154, 'Cabinet Maker'),
(155, 'Cable Contractor'),
(156, 'Cable Jointer'),
(157, 'Cable TV Installer'),
(158, 'Cafe Owner'),
(159, 'Cafe Staff'),
(160, 'Cafe Worker'),
(161, 'Calibration Manager'),
(162, 'Camera Repairer'),
(163, 'Cameraman'),
(164, 'Car Dealer'),
(165, 'Car Delivery Driver'),
(166, 'Car Park Attendant'),
(167, 'Car Salesman'),
(168, 'Car Valet'),
(169, 'Car Wash Attendant'),
(170, 'Care Assistant'),
(171, 'Care Manager'),
(172, 'Careers Advisor'),
(173, 'Careers Officer'),
(174, 'Caretaker'),
(175, 'Cargo Operator'),
(176, 'Carpenter'),
(177, 'Carpet Cleaner'),
(178, 'Carpet Fitter'),
(179, 'Carpet Retailer'),
(180, 'Carphone Fitter'),
(181, 'Cartographer'),
(182, 'Cartoonist'),
(183, 'Cashier'),
(184, 'Casual Worker'),
(185, 'Caterer'),
(186, 'Catering Consultant'),
(187, 'Catering Manager'),
(188, 'Catering Staff'),
(189, 'Caulker'),
(190, 'Ceiling Contractor'),
(191, 'Ceiling Fixer'),
(192, 'Cellarman'),
(193, 'Chambermaid'),
(194, 'Chandler'),
(195, 'Chaplain'),
(196, 'Charge Hand'),
(197, 'Charity Worker'),
(198, 'Chartered'),
(199, 'Chartered Accountant'),
(200, 'Chauffeur'),
(201, 'Chef'),
(202, 'Chemist'),
(203, 'Chicken Chaser'),
(204, 'Child Minder'),
(205, 'Childminder'),
(206, 'Chimney Sweep'),
(207, 'China Restorer'),
(208, 'Chiropodist'),
(209, 'Chiropractor'),
(210, 'Choreographer'),
(211, 'Church Officer'),
(212, 'Church Warden'),
(213, 'Cinema Manager'),
(214, 'Circus Proprietor'),
(215, 'Circus Worker'),
(216, 'Civil Engineer'),
(217, 'Civil Servant'),
(218, 'Claims Adjustor'),
(219, 'Claims Assessor'),
(220, 'Claims Manager'),
(221, 'Clairvoyant'),
(222, 'Classroom Aide'),
(223, 'Cleaner'),
(224, 'Clergyman'),
(225, 'Cleric'),
(226, 'Clerk'),
(227, 'Commissioned'),
(228, 'Consultant'),
(229, 'Coroner'),
(230, 'Councillor'),
(231, 'Counsellor'),
(232, 'Dealer'),
(233, 'Decorator'),
(234, 'Delivery Driver'),
(235, 'Doctor'),
(236, 'Driver'),
(237, 'Economist'),
(238, 'Editor'),
(239, 'Employee'),
(240, 'Employment'),
(241, 'Engineer'),
(242, 'English Teacher'),
(243, 'Entertainer'),
(244, 'Envoy'),
(245, 'Executive'),
(246, 'Farmer'),
(247, 'Fireman'),
(248, 'Floor Layer'),
(249, 'Floor Manager'),
(250, 'Florist'),
(251, 'Flour Miller'),
(252, 'Flower Arranger'),
(253, 'Flying Instructor'),
(254, 'Foam Convertor'),
(255, 'Food Processor'),
(256, 'Footballer'),
(257, 'Foreman'),
(258, 'Forensic Scientist'),
(259, 'Forest Ranger'),
(260, 'Forester'),
(261, 'Fork Lift Truck Driver'),
(262, 'Forwarding Agent'),
(263, 'Foster Parent'),
(264, 'Foundry Worker'),
(265, 'Fraud Investigator'),
(266, 'French Polisher'),
(267, 'Fruiterer'),
(268, 'Fuel Merchant'),
(269, 'Fund Raiser'),
(270, 'Funeral Director'),
(271, 'Funeral Furnisher'),
(272, 'Furnace Man'),
(273, 'Furniture Dealer'),
(274, 'Furniture Remover'),
(275, 'Furniture Restorer'),
(276, 'Furrier'),
(277, 'Gallery Owner'),
(278, 'Gambler'),
(279, 'Gamekeeper'),
(280, 'Gaming Board Inspector'),
(281, 'Gaming Club Manager'),
(282, 'Gaming Club Proprietor'),
(283, 'Garage Attendant'),
(284, 'Garage Foreman'),
(285, 'Garage Manager'),
(286, 'Garda'),
(287, 'Garden Designer'),
(288, 'Gardener'),
(289, 'Gas Fitter'),
(290, 'Gas Mechanic'),
(291, 'Gas Technician'),
(292, 'Gate Keeper'),
(293, 'Genealogist'),
(294, 'General Practitioner'),
(295, 'Geologist'),
(296, 'Geophysicist'),
(297, 'Gilder'),
(298, 'Glass Worker'),
(299, 'Glazier'),
(300, 'Goldsmith'),
(301, 'Golf Caddy'),
(302, 'Golf Club Professional'),
(303, 'Golfer'),
(304, 'Goods Handler'),
(305, 'Governor'),
(306, 'Granite Technician'),
(307, 'Graphic Designer'),
(308, 'Graphologist'),
(309, 'Grave Digger'),
(310, 'Gravel Merchant'),
(311, 'Green Keeper'),
(312, 'Greengrocer'),
(313, 'Grocer'),
(314, 'Groom'),
(315, 'Ground Worker'),
(316, 'Groundsman'),
(317, 'Guest House Owner'),
(318, 'Guest House Proprietor'),
(319, 'Gun Smith'),
(320, 'Gynaecologist'),
(321, 'HGV Driver'),
(322, 'HGV Mechanic'),
(323, 'Hairdresser'),
(324, 'Handyman'),
(325, 'Hardware Dealer'),
(326, 'Haulage Contractor'),
(327, 'Hawker'),
(328, 'Health Advisor'),
(329, 'Health And Safety'),
(330, 'Health Care Assistant'),
(331, 'Health Consultant'),
(332, 'Health Nurse'),
(333, 'Health Planner'),
(334, 'Health Service'),
(335, 'Health Therapist'),
(336, 'Health Visitor'),
(337, 'Hearing Therapist'),
(338, 'Heating Engineer'),
(339, 'Herbalist'),
(340, 'Highway Inspector'),
(341, 'Hire Car Driver'),
(342, 'Historian'),
(343, 'History Teacher'),
(344, 'Hod Carrier'),
(345, 'Home Economist'),
(346, 'Home Help'),
(347, 'Homecare Manager'),
(348, 'Homeopath'),
(349, 'Homeworker'),
(350, 'Hop Merchant'),
(351, 'Horse Breeder'),
(352, 'Horse Dealer'),
(353, 'Horse Riding Instructor'),
(354, 'Horse Trader'),
(355, 'Horse Trainer'),
(356, 'Horticultural Consultant'),
(357, 'Horticulturalist'),
(358, 'Hosiery Mechanic'),
(359, 'Hosiery Worker'),
(360, 'Hospital Consultant'),
(361, 'Hospital Doctor'),
(362, 'Hospital Manager'),
(363, 'Hospital Orderly'),
(364, 'Hospital Technician'),
(365, 'Hospital Warden'),
(366, 'Hospital Worker'),
(367, 'Hostess'),
(368, 'Hot Foil Printer'),
(369, 'Hotel Consultant'),
(370, 'Hotel Worker'),
(371, 'Hotelier'),
(372, 'Househusband'),
(373, 'Housekeeper'),
(374, 'Housewife'),
(375, 'Housing Assistant'),
(376, 'Housing Officer'),
(377, 'Housing Supervisor'),
(378, 'Hygienist'),
(379, 'Hypnotherapist'),
(380, 'Hypnotist'),
(381, 'IT Consultant'),
(382, 'IT Manager'),
(383, 'IT Trainer'),
(384, 'Ice Cream Vendor'),
(385, 'Illustrator'),
(386, 'Immigration Officer'),
(387, 'Import Consultant'),
(388, 'Importer'),
(389, 'Independent Means'),
(390, 'Induction Moulder'),
(391, 'Industrial Chemist'),
(392, 'Industrial Consultant'),
(393, 'Injection Moulder'),
(394, 'Inspector'),
(395, 'Instructor'),
(396, 'Instrument Engineer'),
(397, 'Instrument Maker'),
(398, 'Instrument Supervisor'),
(399, 'Instrument Technician'),
(400, 'Insurance Agent'),
(401, 'Insurance Assessor'),
(402, 'Insurance Broker'),
(403, 'Insurance Consultant'),
(404, 'Insurance Inspector'),
(405, 'Insurance Staff'),
(406, 'Interior Decorator'),
(407, 'Interior Designer'),
(408, 'Interpreter'),
(409, 'Interviewer'),
(410, 'Inventor'),
(411, 'Investigator'),
(412, 'Investment Advisor'),
(413, 'Investment Banker'),
(414, 'Investment Manager'),
(415, 'Investment Strategist'),
(416, 'Ironmonger'),
(417, 'Janitor'),
(418, 'Jazz Composer'),
(419, 'Jeweller'),
(420, 'Jewellery'),
(421, 'Jockey'),
(422, 'Joiner'),
(423, 'Joinery Consultant'),
(424, 'Journalist'),
(425, 'Judge'),
(426, 'Keep Fit Instructor'),
(427, 'Kennel Hand'),
(428, 'Kitchen Worker'),
(429, 'Knitter'),
(430, 'Labelling Operator'),
(431, 'Laboratory Analyst'),
(432, 'Labourer'),
(433, 'Laminator'),
(434, 'Lampshade Maker'),
(435, 'Land Agent'),
(436, 'Land Surveyor'),
(437, 'Landlady'),
(438, 'Landlord'),
(439, 'Landowner'),
(440, 'Landworker'),
(441, 'Lathe Operator'),
(442, 'Laundry Staff'),
(443, 'Laundry Worker'),
(444, 'Lavatory Attendant'),
(445, 'Law Clerk'),
(446, 'Lawn Mower'),
(447, 'Lawyer'),
(448, 'Leaflet Distributor'),
(449, 'Leather Worker'),
(450, 'Lecturer'),
(451, 'Ledger Clerk'),
(452, 'Legal Advisor'),
(453, 'Legal Assistant'),
(454, 'Legal Executive'),
(455, 'Legal Secretary'),
(456, 'Letting Agent'),
(457, 'Liaison Officer'),
(458, 'Librarian'),
(459, 'Library Manager'),
(460, 'Licensed Premises'),
(461, 'Licensee'),
(462, 'Licensing'),
(463, 'Lifeguard'),
(464, 'Lift Attendant'),
(465, 'Lift Engineer'),
(466, 'Lighterman'),
(467, 'Lighthouse Keeper'),
(468, 'Lighting Designer'),
(469, 'Lighting Technician'),
(470, 'Lime Kiln Attendant'),
(471, 'Line Manager'),
(472, 'Line Worker'),
(473, 'Lineman'),
(474, 'Linguist'),
(475, 'Literary Agent'),
(476, 'Literary Editor'),
(477, 'Lithographer'),
(478, 'Litigation Manager'),
(479, 'Loans Manager'),
(480, 'Local Government'),
(481, 'Lock Keeper'),
(482, 'Locksmith'),
(483, 'Locum Pharmacist'),
(484, 'Log Merchant'),
(485, 'Lorry Driver'),
(486, 'Loss Adjustor'),
(487, 'Loss Assessor'),
(488, 'Lumberjack'),
(489, 'Machine Fitters'),
(490, 'Machine Minder'),
(491, 'Machine Operator'),
(492, 'Machine Setter'),
(493, 'Machine Tool'),
(494, 'Machine Tool Fitter'),
(495, 'Machinist'),
(496, 'Magician'),
(497, 'Magistrate'),
(498, 'Magistrates Clerk'),
(499, 'Maid'),
(500, 'Maintenance Fitter'),
(501, 'Make Up Artist'),
(502, 'Manicurist'),
(503, 'Manufacturing'),
(504, 'Map Mounter'),
(505, 'Marble Finisher'),
(506, 'Marble Mason'),
(507, 'Marine Broker'),
(508, 'Marine Consultant'),
(509, 'Marine Electrician'),
(510, 'Marine Engineer'),
(511, 'Marine Geologist'),
(512, 'Marine Pilot'),
(513, 'Marine Surveyor'),
(514, 'Market Gardener'),
(515, 'Market Research'),
(516, 'Market Researcher'),
(517, 'Market Trader'),
(518, 'Marketing Agent'),
(519, 'Marketing Assistant'),
(520, 'Marketing Coordinator'),
(521, 'Marketing Director'),
(522, 'Marketing Manager'),
(523, 'Marquee Erector'),
(524, 'Massage Therapist'),
(525, 'Masseur'),
(526, 'Masseuse'),
(527, 'Master Mariner'),
(528, 'Materials Controller'),
(529, 'Materials Manager'),
(530, 'Mathematician'),
(531, 'Maths Teacher'),
(532, 'Matron'),
(533, 'Mattress Maker'),
(534, 'Meat Inspector'),
(535, 'Meat Wholesaler'),
(536, 'Mechanic'),
(537, 'Medal Dealer'),
(538, 'Medical Advisor'),
(539, 'Medical Assistant'),
(540, 'Medical Consultant'),
(541, 'Medical Officer'),
(542, 'Medical Physicist'),
(543, 'Medical Practitioner'),
(544, 'Medical Researcher'),
(545, 'Medical Secretary'),
(546, 'Medical Student'),
(547, 'Medical Supplier'),
(548, 'Medical Technician'),
(549, 'Merchandiser'),
(550, 'Merchant'),
(551, 'Merchant Banker'),
(552, 'Merchant Seaman'),
(553, 'Messenger'),
(554, 'Metal Dealer'),
(555, 'Metal Engineer'),
(556, 'Metal Polisher'),
(557, 'Metal Worker'),
(558, 'Metallurgist'),
(559, 'Meteorologist'),
(560, 'Meter Reader'),
(561, 'Microbiologist'),
(562, 'Midwife'),
(563, 'Military Leader'),
(564, 'Milklady'),
(565, 'Milkman'),
(566, 'Mill Operator'),
(567, 'Mill Worker'),
(568, 'Miller'),
(569, 'Milliner'),
(570, 'Millwright'),
(571, 'Miner'),
(572, 'Mineralologist'),
(573, 'Minibus Driver'),
(574, 'Minicab Driver'),
(575, 'Mining Consultant'),
(576, 'Mining Engineer'),
(577, 'Money Broker'),
(578, 'Moneylender'),
(579, 'Mooring Contractor'),
(580, 'Mortgage Broker'),
(581, 'Mortician'),
(582, 'Motor Dealer'),
(583, 'Motor Engineer'),
(584, 'Motor Fitter'),
(585, 'Motor Mechanic'),
(586, 'Motor Racing'),
(587, 'Motor Trader'),
(588, 'Museum Assistant'),
(589, 'Museum Attendant'),
(590, 'Music Teacher'),
(591, 'Musician'),
(592, 'Nanny'),
(593, 'Navigator'),
(594, 'Negotiator'),
(595, 'Neurologist'),
(596, 'Newsagent'),
(597, 'Night Porter'),
(598, 'Night Watchman'),
(599, 'Nuclear Scientist'),
(600, 'Nun'),
(601, 'Nurse'),
(602, 'Nursery Assistant'),
(603, 'Nursery Nurse'),
(604, 'Nursery Worker'),
(605, 'Nurseryman'),
(606, 'Nursing Assistant'),
(607, 'Nursing Auxiliary'),
(608, 'Nursing Manager'),
(609, 'Nursing Sister'),
(610, 'Nutritionist'),
(611, 'Off Shore'),
(612, 'Office Manager'),
(613, 'Office Worker'),
(614, 'Oil Broker'),
(615, 'Oil Rig Crew'),
(616, 'Opera Singer'),
(617, 'Operations'),
(618, 'Operative'),
(619, 'Operator'),
(620, 'Optical'),
(621, 'Optical Advisor'),
(622, 'Optical Assistant'),
(623, 'Optician'),
(624, 'Optometrist'),
(625, 'Orchestral'),
(626, 'Organiser'),
(627, 'Organist'),
(628, 'Ornamental'),
(629, 'Ornithologist'),
(630, 'Orthopaedic'),
(631, 'Orthoptist'),
(632, 'Osteopath'),
(633, 'Outdoor Pursuits'),
(634, 'Outreach Worker'),
(635, 'Packaging'),
(636, 'Packer'),
(637, 'Paediatrician'),
(638, 'Paint Consultant'),
(639, 'Painter'),
(640, 'Palaeobotanist'),
(641, 'Palaeontologist'),
(642, 'Pallet Maker'),
(643, 'Panel Beater'),
(644, 'Paramedic'),
(645, 'Park Attendant'),
(646, 'Park Keeper'),
(647, 'Park Ranger'),
(648, 'Partition Erector'),
(649, 'Parts Man'),
(650, 'Parts Manager'),
(651, 'Parts Supervisor'),
(652, 'Party Planner'),
(653, 'Pasteuriser'),
(654, 'Pastry Chef'),
(655, 'Patent Agent'),
(656, 'Patent Attorney'),
(657, 'Pathologist'),
(658, 'Patrolman'),
(659, 'Pattern Cutter'),
(660, 'Pattern Maker'),
(661, 'Pattern Weaver'),
(662, 'Pawnbroker'),
(663, 'Payroll Assistant'),
(664, 'Payroll Clerk'),
(665, 'Payroll Manager'),
(666, 'Payroll Supervisor'),
(667, 'Personnel Officer'),
(668, 'Pest Controller'),
(669, 'Pet Minder'),
(670, 'Pharmacist'),
(671, 'Philatelist'),
(672, 'Photographer'),
(673, 'Physician'),
(674, 'Physicist'),
(675, 'Physiologist'),
(676, 'Physiotherapist'),
(677, 'Piano Teacher'),
(678, 'Piano Tuner'),
(679, 'Picture Editor'),
(680, 'Picture Framer'),
(681, 'Picture Reseacher'),
(682, 'Pig Man'),
(683, 'Pig Manager'),
(684, 'Pilot'),
(685, 'Pipe Fitter'),
(686, 'Pipe Inspector'),
(687, 'Pipe Insulator'),
(688, 'Pipe Layer'),
(689, 'Planning Engineer'),
(690, 'Planning Manager'),
(691, 'Planning Officer'),
(692, 'Planning Technician'),
(693, 'Plant Attendant'),
(694, 'Plant Driver'),
(695, 'Plant Engineer'),
(696, 'Plant Fitter'),
(697, 'Plant Manager'),
(698, 'Plant Operator'),
(699, 'Plasterer'),
(700, 'Plastics Consultant'),
(701, 'Plastics Engineer'),
(702, 'Plate Layer'),
(703, 'Plater'),
(704, 'Playgroup Assistant'),
(705, 'Playgroup Leader'),
(706, 'Plumber'),
(707, 'Podiatrist'),
(708, 'Police Officer'),
(709, 'Polisher'),
(710, 'Pool Attendant'),
(711, 'Pools Collector'),
(712, 'Porter'),
(713, 'Portfolio Manager'),
(714, 'Post Sorter'),
(715, 'Postman'),
(716, 'Postmaster'),
(717, 'Postwoman'),
(718, 'Potter'),
(719, 'Practice Manager'),
(720, 'Preacher'),
(721, 'Precision Engineer'),
(722, 'Premises'),
(723, 'Premises Security'),
(724, 'Press Officer'),
(725, 'Press Operator'),
(726, 'Press Setter'),
(727, 'Presser'),
(728, 'Priest'),
(729, 'Print Finisher'),
(730, 'Printer'),
(731, 'Prison Chaplain'),
(732, 'Prison Officer'),
(733, 'Private Investigator'),
(734, 'Probation Officer'),
(735, 'Probation Worker'),
(736, 'Procurator Fiscal'),
(737, 'Produce Supervisor'),
(738, 'Producer'),
(739, 'Product Installer'),
(740, 'Product Manager'),
(741, 'Production Engineer'),
(742, 'Production Hand'),
(743, 'Production Manager'),
(744, 'Production Planner'),
(745, 'Professional Boxer'),
(746, 'Professional Racing'),
(747, 'Professional Wrestler'),
(748, 'Progress Chaser'),
(749, 'Progress Clerk'),
(750, 'Project Co-ordinator'),
(751, 'Project Engineer'),
(752, 'Project Leader'),
(753, 'Project Manager'),
(754, 'Project Worker'),
(755, 'Projectionist'),
(756, 'Promoter'),
(757, 'Proof Reader'),
(758, 'Property Buyer'),
(759, 'Property Dealer'),
(760, 'Property Developer'),
(761, 'Property Manager'),
(762, 'Property Valuer'),
(763, 'Proprietor'),
(764, 'Psychiatrist'),
(765, 'Psychoanalyst'),
(766, 'Psychologist'),
(767, 'Psychotherapist'),
(768, 'Public House Manager'),
(769, 'Public Relations Of?cer'),
(770, 'Publican'),
(771, 'Publicity Manager'),
(772, 'Publisher'),
(773, 'Publishing Manager'),
(774, 'Purchase Clerk'),
(775, 'Purchase Ledger Clerk'),
(776, 'Purchasing Assistant'),
(777, 'Purchasing Manager'),
(778, 'Purser'),
(779, 'Quality Controller'),
(780, 'Quality Engineer'),
(781, 'Quality Inspector'),
(782, 'Quality Manager'),
(783, 'Quality Technician'),
(784, 'Quantity Surveyor'),
(785, 'Quarry Worker'),
(786, 'Racehorse Groom'),
(787, 'Racing Organiser'),
(788, 'Radio Controller'),
(789, 'Radio Director'),
(790, 'Radio Engineer'),
(791, 'Radio Operator'),
(792, 'Radio Presenter'),
(793, 'Radio Producer'),
(794, 'Radiographer'),
(795, 'Radiologist'),
(796, 'Rally Driver'),
(797, 'Receptionist'),
(798, 'Recorder'),
(799, 'Records Supervisor'),
(800, 'Recovery Vehicle Coordinator'),
(801, 'Recreational'),
(802, 'Recruitment Consultant'),
(803, 'Rector'),
(804, 'Reflexologist'),
(805, 'Refractory Engineer'),
(806, 'Refrigeration Engineer'),
(807, 'Refuse Collector'),
(808, 'Registrar'),
(809, 'Regulator'),
(810, 'Relocation Agent'),
(811, 'Remedial Therapist'),
(812, 'Rent Collector'),
(813, 'Rent Offcer'),
(814, 'Repair Man'),
(815, 'Repairer'),
(816, 'Reporter'),
(817, 'Representative'),
(818, 'Reprographic Assistant'),
(819, 'Research Analyst'),
(820, 'Research Consultant'),
(821, 'Research Director'),
(822, 'Research Scientist'),
(823, 'Research Technician'),
(824, 'Researcher'),
(825, 'Resin Caster'),
(826, 'Restaurant Manager'),
(827, 'Restaurateur'),
(828, 'Restorer'),
(829, 'Retired'),
(830, 'Revenue Clerk'),
(831, 'Revenue Officer'),
(832, 'Riding Instructor'),
(833, 'Rig Worker'),
(834, 'Rigger'),
(835, 'Riveter'),
(836, 'Road Safety Officer'),
(837, 'Road Sweeper'),
(838, 'Road Worker'),
(839, 'Roadworker'),
(840, 'Roof Tiler'),
(841, 'Roofer'),
(842, 'Rose Grower'),
(843, 'Royal Marine'),
(844, 'Rug Maker'),
(845, 'Saddler'),
(846, 'Safety Officer'),
(847, 'Sail Maker'),
(848, 'Sales Administrator'),
(849, 'Sales Assistant'),
(850, 'Sales Director'),
(851, 'Sales Engineer'),
(852, 'Sales Executive'),
(853, 'Sales Manager'),
(854, 'Sales Representative'),
(855, 'Sales Support'),
(856, 'Salesman'),
(857, 'Saleswoman'),
(858, 'Sand Blaster'),
(859, 'Saw Miller'),
(860, 'Scaffolder'),
(861, 'School Crossing'),
(862, 'School Inspector'),
(863, 'Scientific Officer'),
(864, 'Scientist'),
(865, 'Scrap Dealer'),
(866, 'Screen Printer'),
(867, 'Screen Writer'),
(868, 'Script Writer'),
(869, 'Sculptor'),
(870, 'Seaman'),
(871, 'Seamstress'),
(872, 'Secretary'),
(873, 'Security Consultant'),
(874, 'Security Controller'),
(875, 'Security Guard'),
(876, 'Security Officer'),
(877, 'Servant'),
(878, 'Service Engineer'),
(879, 'Service Manager'),
(880, 'Share Dealer'),
(881, 'Sheet Metal Worker'),
(882, 'Shelf Filler'),
(883, 'Shelter Warden'),
(884, 'Shepherd'),
(885, 'Sheriff'),
(886, 'Sheriff Clerk'),
(887, 'Sheriff Principal'),
(888, 'Shift Controller'),
(889, 'Ship Broker'),
(890, 'Ship Builder'),
(891, 'Shipping Clerk'),
(892, 'Shipping Officer'),
(893, 'Shipwright'),
(894, 'Shipyard Worker'),
(895, 'Shoe Maker'),
(896, 'Shoe Repairer'),
(897, 'Shooting Instructor'),
(898, 'Shop Assistant'),
(899, 'Shop Fitter'),
(900, 'Shop Keeper'),
(901, 'Shop Manager'),
(902, 'Shop Proprietor'),
(903, 'Shot Blaster'),
(904, 'Show Jumper'),
(905, 'Showman'),
(906, 'Shunter'),
(907, 'Sign Maker'),
(908, 'Signalman'),
(909, 'Signwriter'),
(910, 'Site Agent'),
(911, 'Site Engineer'),
(912, 'Skipper'),
(913, 'Slater'),
(914, 'Slaughterman'),
(915, 'Smallholder'),
(916, 'Social Worker'),
(917, 'Software Consultant'),
(918, 'Software Engineer'),
(919, 'Soldier'),
(920, 'Solicitor'),
(921, 'Song Writer'),
(922, 'Sound Artist'),
(923, 'Sound Engineer'),
(924, 'Sound Technician'),
(925, 'Special Constable'),
(926, 'Special Needs'),
(927, 'Speech Therapist'),
(928, 'Sports Administrator'),
(929, 'Sports Coach'),
(930, 'Sports Commentator'),
(931, 'Sportsman'),
(932, 'Sportsperson'),
(933, 'Sportswoman'),
(934, 'Spring Maker'),
(935, 'Stable Hand'),
(936, 'Staff Nurse'),
(937, 'Stage Director'),
(938, 'Stage Hand'),
(939, 'Stage Manager'),
(940, 'Stage Mover'),
(941, 'Station Manager'),
(942, 'Stationer'),
(943, 'Statistician'),
(944, 'Steel Erector'),
(945, 'Steel Worker'),
(946, 'Steeplejack'),
(947, 'Stenographer'),
(948, 'Steward'),
(949, 'Stewardess'),
(950, 'Stock Controller'),
(951, 'Stock Manager'),
(952, 'Stockbroker'),
(953, 'Stockman'),
(954, 'Stocktaker'),
(955, 'Stone Cutter'),
(956, 'Stone Sawyer'),
(957, 'Stonemason'),
(958, 'Store Detective'),
(959, 'Storeman'),
(960, 'Storewoman'),
(961, 'Street Entertainer'),
(962, 'Street Trader'),
(963, 'Stud Hand'),
(964, 'Student'),
(965, 'Student Nurse'),
(966, 'Student Teacher'),
(967, 'Studio Manager'),
(968, 'Sub-Postmaster'),
(969, 'Sub-Postmistress'),
(970, 'Supervisor'),
(971, 'Supply Teacher'),
(972, 'Surgeon'),
(973, 'Surveyor'),
(974, 'Systems Analyst'),
(975, 'Systems Engineer'),
(976, 'Systems Manager'),
(977, 'TV Editor'),
(978, 'Tachograph Analyst'),
(979, 'Tacker'),
(980, 'Tailor'),
(981, 'Tank Farm Operative'),
(982, 'Tanker Driver'),
(983, 'Tanner'),
(984, 'Tattooist'),
(985, 'Tax Advisor'),
(986, 'Tax Analyst'),
(987, 'Tax Assistant'),
(988, 'Tax Consultant'),
(989, 'Tax Inspector'),
(990, 'Tax Manager'),
(991, 'Tax Officer'),
(992, 'Taxi Controller'),
(993, 'Taxi Driver'),
(994, 'Taxidermist'),
(995, 'Tea Blender'),
(996, 'Tea Taster'),
(997, 'Teacher'),
(998, 'Teachers Assistant'),
(999, 'Technical Advisor'),
(1000, 'Technical Analyst'),
(1001, 'Technical Assistant'),
(1002, 'Technical Author'),
(1003, 'Technical Clerk'),
(1004, 'Technical Co-ordinator'),
(1005, 'Technical Director'),
(1006, 'Technical Editor'),
(1007, 'Technical Engineer'),
(1008, 'Technical Illustrator'),
(1009, 'Technical Instructor'),
(1010, 'Technical Liaison'),
(1011, 'Technical Manager'),
(1012, 'Technician'),
(1013, 'Telecommunication'),
(1014, 'Telecommunications'),
(1015, 'Telegraphist'),
(1016, 'Telemarketeer'),
(1017, 'Telephone Engineer'),
(1018, 'Telephonist'),
(1019, 'Telesales Person'),
(1020, 'Television Director'),
(1021, 'Television Engineer'),
(1022, 'Television Presenter'),
(1023, 'Television Producer'),
(1024, 'Telex Operator'),
(1025, 'Temperature Time'),
(1026, 'Tennis Coach'),
(1027, 'Textile Consultant'),
(1028, 'Textile Engineer'),
(1029, 'Textile Technician'),
(1030, 'Textile Worker'),
(1031, 'Thatcher'),
(1032, 'Theatre Manager'),
(1033, 'Theatre Technician'),
(1034, 'Theatrical Agent'),
(1035, 'Therapist'),
(1036, 'Thermal Engineer'),
(1037, 'Thermal Insulator'),
(1038, 'Ticket Agent'),
(1039, 'Ticket Inspector'),
(1040, 'Tiler'),
(1041, 'Timber Inspector'),
(1042, 'Timber Worker'),
(1043, 'Tobacconist'),
(1044, 'Toll Collector'),
(1045, 'Tool Maker'),
(1046, 'Tour Agent'),
(1047, 'Tour Guide'),
(1048, 'Town Clerk'),
(1049, 'Town Planner'),
(1050, 'Toy Maker'),
(1051, 'Toy Trader'),
(1052, 'Track Worker'),
(1053, 'Tractor Driver'),
(1054, 'Tractor Mechanic'),
(1055, 'Trade Mark Agent'),
(1056, 'Trade Union Official'),
(1057, 'Trading Standards'),
(1058, 'Traffic Warden'),
(1059, 'Train Driver'),
(1060, 'Trainee Manager'),
(1061, 'Training Advisor'),
(1062, 'Training Assistant'),
(1063, 'Training Co-ordinator'),
(1064, 'Training Consultant'),
(1065, 'Training Instructor'),
(1066, 'Training Manager'),
(1067, 'Training Officer'),
(1068, 'Transcriber'),
(1069, 'Translator'),
(1070, 'Transport Clerk'),
(1071, 'Transport Consultant'),
(1072, 'Transport Controller'),
(1073, 'Transport Engineer'),
(1074, 'Transport Manager'),
(1075, 'Transport Officer'),
(1076, 'Transport Planner'),
(1077, 'Travel Agent'),
(1078, 'Travel Clerk'),
(1079, 'Travel Consultant'),
(1080, 'Travel Courier'),
(1081, 'Travel Guide'),
(1082, 'Travel Guide Writer'),
(1083, 'Travel Representative'),
(1084, 'Travelling Showman'),
(1085, 'Treasurer'),
(1086, 'Tree Feller'),
(1087, 'Tree Surgeon'),
(1088, 'Trichologist'),
(1089, 'Trinity House Pilot'),
(1090, 'Trout Farmer'),
(1091, 'Tug Skipper'),
(1092, 'Tunneller'),
(1093, 'Turf Accountant'),
(1094, 'Turkey Farmer'),
(1095, 'Turner'),
(1096, 'Tutor'),
(1097, 'Typesetter'),
(1098, 'Typewriter Engineer'),
(1099, 'Typist'),
(1100, 'Tyre Builder'),
(1101, 'Tyre Fitter'),
(1102, 'Tyre Inspector'),
(1103, 'Tyre Technician'),
(1104, 'Undertaker'),
(1105, 'Underwriter'),
(1106, 'Upholsterer'),
(1107, 'Valuer'),
(1108, 'Valve Technician'),
(1109, 'Van Driver'),
(1110, 'Vehicle Assessor'),
(1111, 'Vehicle Body Worker'),
(1112, 'Vehicle Engineer'),
(1113, 'Vehicle Technician'),
(1114, 'Ventriloquist'),
(1115, 'Verger'),
(1116, 'Veterinary Surgeon'),
(1117, 'Vicar'),
(1118, 'Video Artist'),
(1119, 'Violin Maker'),
(1120, 'Violinist'),
(1121, 'Voluntary Worker'),
(1122, 'Wages Clerk'),
(1123, 'Waiter'),
(1124, 'Waitress'),
(1125, 'Warden'),
(1126, 'Warehouse Manager'),
(1127, 'Warehouseman'),
(1128, 'Warehousewoman'),
(1129, 'Watchmaker'),
(1130, 'Weaver'),
(1131, 'Weighbridge Clerk'),
(1132, 'Weighbridge Operator'),
(1133, 'Welder'),
(1134, 'Welfare Assistant'),
(1135, 'Welfare Officer'),
(1136, 'Welfare Rights Officer'),
(1137, 'Wheel Clamper'),
(1138, 'Wholesale Newspaper'),
(1139, 'Window Cleaner'),
(1140, 'Window Dresser'),
(1141, 'Windscreen Fitter'),
(1142, 'Wine Merchant'),
(1143, 'Wood Carver'),
(1144, 'Wood Cutter'),
(1145, 'Wood Worker'),
(1146, 'Word Processing Operator'),
(1147, 'Works Manager'),
(1148, 'Writer'),
(1149, 'Yacht Master'),
(1150, 'Yard Manager'),
(1151, 'Youth Hostel Warden'),
(1152, 'Youth Worker'),
(1153, 'Zoo Keeper'),
(1154, 'Zoo Manager'),
(1155, 'Zoologist');

-- --------------------------------------------------------

--
-- Table structure for table `parent_employer`
--

CREATE TABLE `parent_employer` (
  `pnt_empy_Id` bigint(10) NOT NULL COMMENT 'Employer ID',
  `pnt_Employer` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Employer Name',
  `pnt_emp_Add` varchar(300) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Employer Address',
  `pnt_emp_Cnt` int(20) DEFAULT NULL COMMENT 'Employer contact'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `parent_info`
--

CREATE TABLE `parent_info` (
  `pnt_Id` bigint(20) NOT NULL COMMENT 'Parent ID',
  `gnd_Id` int(10) DEFAULT NULL COMMENT 'Gender from Gen Table',
  `occup_Id` int(10) DEFAULT NULL COMMENT 'Parent Profession',
  `std_Id` bigint(20) DEFAULT NULL COMMENT 'Student ID from Student Info Table',
  `fk_relat_Id` int(20) DEFAULT NULL COMMENT 'Relationship with pupil',
  `pnt_empy_Id` bigint(10) DEFAULT NULL COMMENT 'Parent employer ID',
  `desig_Id` int(10) DEFAULT NULL COMMENT 'Parent Designation ID',
  `pnt_marital_Status` enum('Divorced','Separated','Widow','Married') DEFAULT NULL,
  `prnt_employer_name` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `pnt_Cnic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parent_info`
--

INSERT INTO `parent_info` (`pnt_Id`, `gnd_Id`, `occup_Id`, `std_Id`, `fk_relat_Id`, `pnt_empy_Id`, `desig_Id`, `pnt_marital_Status`, `prnt_employer_name`, `user_id`, `pnt_Cnic`) VALUES
(7, 1, 3, NULL, 3, NULL, 3, NULL, 'wes', 39, NULL),
(8, 2, 1, NULL, 10, NULL, 1, 'Separated', 'NAB', 45, '3252352532352321'),
(9, 1, 1, NULL, 4, NULL, 1, 'Widow', 'NAB', 46, NULL),
(10, 1, 1, NULL, 10, NULL, 1, 'Separated', 'NAB', 47, '65464575432534'),
(11, 1, 1, NULL, 1, NULL, 1, 'Married', 'NAB', 51, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_mode`
--

CREATE TABLE `payment_mode` (
  `PM_Id` int(10) NOT NULL COMMENT 'Payment Mode ID',
  `PM_Name` varchar(20) NOT NULL COMMENT 'Mode of the payment'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pay_schedule`
--

CREATE TABLE `pay_schedule` (
  `pay_sch_Id` int(10) NOT NULL COMMENT 'PK',
  `emp_Id` bigint(20) NOT NULL COMMENT 'student ID',
  `bill_Freq` int(11) NOT NULL COMMENT 'Frequency of Bill generation',
  `payment_Mode` int(11) NOT NULL COMMENT 'Payment Method',
  `acc_Id` int(10) NOT NULL COMMENT 'deposit_Account',
  `issue_date` date DEFAULT NULL,
  `due_Date` date DEFAULT NULL,
  `pay_total` double(10,2) DEFAULT NULL,
  `basic_pay` decimal(10,2) DEFAULT NULL,
  `allowances` text DEFAULT NULL,
  `deductions` text DEFAULT NULL,
  `billing_rate` varchar(255) DEFAULT NULL,
  `working_hours` varchar(255) DEFAULT NULL,
  `no_of_days` varchar(255) DEFAULT NULL,
  `incr_rate` varchar(255) DEFAULT NULL,
  `pay_month` date NOT NULL DEFAULT current_timestamp(),
  `next_pay_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pay_schedule`
--

INSERT INTO `pay_schedule` (`pay_sch_Id`, `emp_Id`, `bill_Freq`, `payment_Mode`, `acc_Id`, `issue_date`, `due_Date`, `pay_total`, `basic_pay`, `allowances`, `deductions`, `billing_rate`, `working_hours`, `no_of_days`, `incr_rate`, `pay_month`, `next_pay_date`) VALUES
(18, 59, 3, 0, 20, '2022-03-02', '2022-03-02', 16554.00, '18220.00', '[]', '{\"advance_amount\":1666.6599999999999,\"Installments\":\"2\",\"amount_per_pay_peroid\":\"1666.67\",\"advance_total\":\"5000\",\"advance\":\"advance\",\"advance_id\":\"11\",\"advance_account\":72}', '4555', '2', '2', '2', '2022-03-01', '2022-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `periods`
--

CREATE TABLE `periods` (
  `id` int(11) NOT NULL,
  `period` varchar(255) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(225) NOT NULL,
  `orders` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `periods`
--

INSERT INTO `periods` (`id`, `period`, `start_time`, `end_time`, `orders`) VALUES
(1, 'Period 1', '09:10', '09:30', 1),
(2, 'Period 2', '09:30', '10:00', 2),
(3, 'Period 3', '10:00', '10:30', 3),
(4, 'Period 4', '10:30', '11:00', 4),
(5, 'Period 5', '11:00', '11:30', 5),
(6, 'Period 6', '11:30', '12:00', 6),
(7, 'Period 7', '12:00', '12:30', 7),
(8, 'Period 8', '12:30', '01:00', 8),
(9, 'bell', '7:30', '7:30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'role-list', 'web', NULL, NULL),
(3, 'role-create', 'web', NULL, NULL),
(4, 'role-edit', 'web', NULL, NULL),
(5, 'role-delete', 'web', NULL, NULL),
(6, 'view-students', 'web', NULL, NULL),
(7, 'add-admission', 'web', NULL, NULL),
(8, 'withdraw-admission', 'web', NULL, NULL),
(9, 'edit-student', 'web', NULL, NULL),
(10, 'add-staff', 'web', NULL, NULL),
(11, 'edit-staff', 'web', NULL, NULL),
(12, 'withdraw-staff', 'web', NULL, NULL),
(13, 'view-staff', 'web', NULL, NULL),
(14, 'view-schedule', 'web', NULL, NULL),
(15, 'add-schedule', 'web', NULL, NULL),
(16, 'edit-schedule', 'web', NULL, NULL),
(17, 'delete-schedule', 'web', NULL, NULL),
(18, 'examiner', 'web', NULL, NULL),
(22, 'view-library', 'web', NULL, NULL),
(23, 'add-library', 'web', NULL, NULL),
(24, 'edit-library', 'web', NULL, NULL),
(25, 'delete-library', 'web', NULL, NULL),
(26, 'teacher', 'web', NULL, NULL),
(27, 'view-users', 'web', NULL, NULL),
(28, 'add-user', 'web', NULL, NULL),
(29, 'edit-user', 'web', NULL, NULL),
(30, 'delete-user', 'web', NULL, NULL),
(31, 'reset-password-user', 'web', NULL, NULL),
(32, 'view-examiner', 'web', NULL, NULL),
(33, 'add-examiner', 'web', NULL, NULL),
(34, 'edit-examiner', 'web', NULL, NULL),
(35, 'delete-examiner', 'web', NULL, NULL),
(38, 'view-school', 'web', NULL, NULL),
(39, 'add-school', 'web', NULL, NULL),
(40, 'edit-school', 'web', NULL, NULL),
(41, 'delete-school', 'web', NULL, NULL),
(42, 'view-accountant', 'web', NULL, NULL),
(43, 'add-accountant', 'web', NULL, NULL),
(44, 'edit-accountant\r\n', 'web', NULL, NULL),
(45, 'delete-accountant', 'web', NULL, NULL),
(46, 'parents', 'web', NULL, NULL),
(47, 'Accounts', 'web', NULL, NULL),
(48, 'Attendance', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prev_experience`
--

CREATE TABLE `prev_experience` (
  `prev_exper_Id` int(10) NOT NULL COMMENT 'Prev Experience ID',
  `prev_exper_Org` varchar(100) DEFAULT NULL COMMENT 'Prev Organisation Name',
  `prev_exper_Position` varchar(255) DEFAULT NULL COMMENT 'Prev Position',
  `prev_exper_Role` varchar(255) DEFAULT NULL COMMENT 'Prev Role',
  `prev_Frmdate` varchar(255) DEFAULT NULL COMMENT 'Prev Experience From Date',
  `prev_Todate` varchar(255) DEFAULT NULL COMMENT 'Prev Experience To Date',
  `emp_curr_Org` varchar(255) DEFAULT NULL COMMENT 'Current Organisation Name',
  `prev_exper_Status` enum('Active','Inactive') DEFAULT NULL COMMENT 'Prev Experience Status',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prev_experience`
--

INSERT INTO `prev_experience` (`prev_exper_Id`, `prev_exper_Org`, `prev_exper_Position`, `prev_exper_Role`, `prev_Frmdate`, `prev_Todate`, `emp_curr_Org`, `prev_exper_Status`, `user_id`) VALUES
(1, 'APS,PAF', 'Science Teacher,IT Teacher', 'Form Master,Teaching', '2015-04-13,2018-06-01', '2018-04-13,2021-03-31', NULL, NULL, 0),
(2, 'Ibex Solution', 'Science Teacher', 'Form Master', '2019-04-15', '2021-04-15', NULL, NULL, 0),
(3, 'Ibex Solution Ibex SolutionIbex Solution', 'Science Teacher', 'Form Master', '20-04-2015', '20-04-2015', NULL, NULL, 24),
(4, 'sa', 'sa', 'sass', '20-11-2020', '20-11-2020', NULL, NULL, 24),
(5, 'sasa', 'sasa', 'sasa', '20-11-2020', '20-11-2020', NULL, NULL, 24);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `pub_Id` bigint(10) NOT NULL COMMENT 'Publisher ID',
  `pub_Name` varchar(255) NOT NULL COMMENT 'Publisher Name',
  `pub_Contact` bigint(20) DEFAULT NULL COMMENT 'Publisher Contact',
  `pub_Status` enum('Active','Inactive') NOT NULL COMMENT 'Publisher status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`pub_Id`, `pub_Name`, `pub_Contact`, `pub_Status`) VALUES
(1, 'Publisher 1', 11111111111, 'Active'),
(2, 'Publisher 2', 22222222222, 'Active'),
(3, 'Publisher 3', 33333333333, 'Active'),
(4, 'Test Publisher', 444444444444, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_account`
--

CREATE TABLE `purchase_account` (
  `purch_Id` bigint(20) NOT NULL COMMENT 'Purchase ID',
  `purch_Date` date NOT NULL COMMENT 'Date of the purchase',
  `ent_typ_Id` int(10) NOT NULL COMMENT 'Type of purchase',
  `PM_Id` int(10) NOT NULL COMMENT 'Mode of payment ID',
  `purch_Payadv` double(10,2) NOT NULL COMMENT 'Payment in advance',
  `purch_Payable` double(10,2) NOT NULL COMMENT 'Payable amount',
  `purch_Remark` varchar(100) DEFAULT NULL COMMENT 'Remarks by the accountant',
  `gent_Code` bigint(20) NOT NULL COMMENT 'General Entity Code',
  `lent_Code` bigint(20) DEFAULT NULL COMMENT 'Library Entity Code'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `relationship`
--

CREATE TABLE `relationship` (
  `pk_relat_Id` int(20) NOT NULL COMMENT 'Relationship ID',
  `relation_Name` varchar(255) NOT NULL COMMENT 'RElationship'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `relationship`
--

INSERT INTO `relationship` (`pk_relat_Id`, `relation_Name`) VALUES
(1, 'Brother'),
(2, 'Cousin Brother'),
(3, 'Cousin Sister'),
(4, 'Father'),
(5, 'Husband'),
(6, 'Maternal Aunt'),
(7, 'Maternal  Unlce'),
(8, 'Maternal Grandfather'),
(9, 'Maternal Grandmother'),
(10, 'Mother'),
(11, 'Paternal Aunt'),
(12, 'Paternal  Unlce'),
(13, 'Paternal Grandfather'),
(14, 'Paternal Grandmother'),
(15, 'Wife');

-- --------------------------------------------------------

--
-- Table structure for table `religion`
--

CREATE TABLE `religion` (
  `relig_Id` int(10) NOT NULL COMMENT 'Religion ID',
  `religion` varchar(50) NOT NULL COMMENT 'Name of the religion'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `religion`
--

INSERT INTO `religion` (`relig_Id`, `religion`) VALUES
(1, 'Atheists'),
(2, 'Agnostics'),
(3, 'Bahais'),
(4, 'Buddhists'),
(5, 'Chinese folk-religionists'),
(6, 'Christians'),
(7, 'Confucianists'),
(8, 'Daoists'),
(9, 'Ethnoreligionists'),
(10, 'Hindus'),
(11, 'Jains'),
(12, 'Jews'),
(13, 'Muslims'),
(14, 'New Religionists'),
(15, 'Shintoists'),
(16, 'Sikhs'),
(17, 'Spiritists'),
(18, 'Zoroastrians');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Teacher', 'web', NULL, NULL),
(2, 'Accountant', 'web', NULL, NULL),
(4, 'Examiner', 'web', NULL, NULL),
(5, 'Librarian', 'web', NULL, NULL),
(6, 'Admin', 'web', NULL, NULL),
(7, 'Super Admin', 'web', NULL, NULL),
(9, 'Student', 'web', NULL, NULL),
(10, 'parents', 'web', '2021-10-08 14:41:52', '2021-10-08 14:41:52');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(2, 6),
(2, 7),
(2, 10),
(3, 6),
(3, 7),
(4, 6),
(4, 7),
(5, 6),
(5, 7),
(6, 6),
(6, 7),
(7, 6),
(7, 7),
(8, 6),
(8, 7),
(9, 6),
(9, 7),
(10, 6),
(10, 7),
(11, 6),
(11, 7),
(12, 6),
(12, 7),
(13, 6),
(13, 7),
(14, 6),
(14, 7),
(15, 6),
(15, 7),
(16, 6),
(16, 7),
(17, 6),
(17, 7),
(18, 4),
(18, 6),
(18, 7),
(22, 5),
(22, 6),
(22, 7),
(23, 5),
(23, 6),
(23, 7),
(24, 5),
(24, 6),
(24, 7),
(25, 5),
(25, 6),
(25, 7),
(26, 1),
(26, 7),
(27, 6),
(28, 6),
(29, 6),
(30, 6),
(31, 6),
(32, 4),
(32, 6),
(33, 4),
(33, 6),
(34, 4),
(34, 6),
(35, 4),
(35, 6),
(38, 6),
(39, 6),
(40, 6),
(41, 6),
(42, 6),
(43, 6),
(44, 6),
(45, 6),
(46, 6),
(47, 2),
(48, 6);

-- --------------------------------------------------------

--
-- Table structure for table `salary_account`
--

CREATE TABLE `salary_account` (
  `sal_Id` bigint(20) NOT NULL COMMENT 'Salary ID',
  `emp_Id` bigint(20) NOT NULL COMMENT 'Employee ID',
  `sal_Month` date DEFAULT NULL COMMENT 'Salary for the month of',
  `sal_voucher_No` bigint(20) DEFAULT NULL COMMENT 'Voucher No on Pay Slip',
  `sal_Basic` double(10,2) NOT NULL COMMENT 'Basic Pay',
  `medical_Allow` double(10,2) DEFAULT NULL COMMENT 'Medical Allowence',
  `house_Allow` double(10,2) DEFAULT NULL COMMENT 'House Allowence',
  `utility_Allow` double(10,2) DEFAULT NULL COMMENT 'Utilities Allowence',
  `education_Allow` double(10,2) DEFAULT NULL COMMENT 'Education Allowence',
  `conveyance_Allow` double(10,2) DEFAULT NULL COMMENT 'Conveyance Allowence',
  `sal_Bonus` double(10,2) DEFAULT NULL COMMENT 'Bonuses given',
  `sal_Gross` double(10,2) DEFAULT NULL COMMENT 'Total Gross Salary',
  `sal_tax_Percent` double(10,2) DEFAULT NULL,
  `PF_emp_Cont` double(10,2) DEFAULT NULL COMMENT '12% of basic salary',
  `tax_Deduct` double(10,2) DEFAULT NULL COMMENT 'Tax Deductions (sal_Gross/100*sal_tax_Percent)',
  `other_Deduct` double(10,2) DEFAULT NULL COMMENT 'Other deductions',
  `tot_Deduct` double(10,2) DEFAULT NULL COMMENT 'Total deductions',
  `sal_Net` double(10,2) DEFAULT NULL COMMENT 'Total Net Salary',
  `sal_Paid` double(10,2) NOT NULL COMMENT 'Paid Salary',
  `sal_Payable` double(10,2) DEFAULT NULL COMMENT 'Salary due',
  `PM_Id` int(10) DEFAULT NULL COMMENT 'Payment Mode of Salary',
  `PFund_empy_Cont` double(10,2) DEFAULT NULL COMMENT '3.67% of basic salary',
  `GP_fund_Balance` double(10,2) DEFAULT NULL COMMENT 'Total General Provident Fund collected',
  `EPS_empy_Cont` double(10,2) DEFAULT NULL COMMENT '8.33% of basic salary, Emp Pension Scheme',
  `EPS_Balance` double(10,2) DEFAULT NULL COMMENT 'EPS Balance tll date',
  `gratuity_Balance` double(10,2) DEFAULT NULL COMMENT 'Total Gratuity balance',
  `sal_Remark` varchar(100) DEFAULT NULL COMMENT 'Salary Remarks'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `pk_school_Id` int(10) NOT NULL COMMENT 'School ID',
  `school_Name` varchar(255) NOT NULL COMMENT 'School Name',
  `school_abbreviation` varchar(255) DEFAULT NULL,
  `principal_Name` varchar(255) DEFAULT NULL COMMENT 'Principal Name',
  `affiliation_No` varchar(255) DEFAULT NULL,
  `board_Id` int(10) DEFAULT NULL COMMENT 'Board of Affiliation',
  `registration` varchar(255) DEFAULT NULL COMMENT 'Registration Department',
  `registered_with` varchar(255) NOT NULL,
  `dom_Id` int(10) DEFAULT NULL COMMENT 'District Name',
  `city_Id` int(10) DEFAULT NULL COMMENT 'City Name',
  `primary_Contact` varchar(20) NOT NULL COMMENT 'Primary contact no',
  `secondary_Contact` varchar(20) DEFAULT NULL COMMENT 'Secondary Contact',
  `school_Add` varchar(255) NOT NULL COMMENT 'Address',
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `school_logo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`pk_school_Id`, `school_Name`, `school_abbreviation`, `principal_Name`, `affiliation_No`, `board_Id`, `registration`, `registered_with`, `dom_Id`, `city_Id`, `primary_Contact`, `secondary_Contact`, `school_Add`, `email`, `website`, `school_logo`) VALUES
(2, 'Army Public School', 'APS', 'Shafiq', 'FBISE Rawalpindi', 2, '136-APS-2021', 'Education Department Punjab', 4, 2, '55555555', '555555555', '7th Road', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `school_section`
--

CREATE TABLE `school_section` (
  `sc_sec_Id` int(11) NOT NULL,
  `sc_sec_name` varchar(100) NOT NULL COMMENT 'School Section Name'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_section`
--

INSERT INTO `school_section` (`sc_sec_Id`, `sc_sec_name`) VALUES
(3, 'High'),
(4, 'Middle'),
(7, 'Higher Secondary'),
(9, 'Pre Primary'),
(10, 'Primary');

-- --------------------------------------------------------

--
-- Table structure for table `setsubjectmarks`
--

CREATE TABLE `setsubjectmarks` (
  `submarks_Id` int(10) NOT NULL,
  `exam_Id` bigint(100) NOT NULL,
  `sc_sec_Id` int(10) NOT NULL,
  `sub_Id` int(10) NOT NULL,
  `set_marks` text DEFAULT NULL,
  `exam_Module` enum('Theory','Practical','Reading','Writing','Speaking','Listening','Nazra') DEFAULT NULL,
  `set_Total` int(10) DEFAULT NULL,
  `set_pass_Per` float(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setsubjectmarks`
--

INSERT INTO `setsubjectmarks` (`submarks_Id`, `exam_Id`, `sc_sec_Id`, `sub_Id`, `set_marks`, `exam_Module`, `set_Total`, `set_pass_Per`) VALUES
(45, 13, 4, 8, NULL, 'Theory', 23, 10.00),
(47, 13, 10, 11, NULL, 'Reading', 50, 25.00),
(48, 13, 10, 12, NULL, 'Writing', 50, 25.00),
(51, 13, 10, 9, NULL, 'Practical', 5, 2.00),
(52, 13, 10, 9, NULL, 'Listening', 50, 25.00);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_Id` int(11) NOT NULL,
  `state_name` varchar(255) NOT NULL,
  `nation_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_Id`, `state_name`, `nation_Id`) VALUES
(1, 'Azad Jammu and Kashmir', 156),
(2, 'Balochistan', 156),
(3, 'Gilgit-Baltistan', 156),
(4, 'Islamabad Capital Territory', 156),
(5, 'Khyber Pakhtunkhwa', 156),
(6, 'Punjab', 156),
(7, 'Sindh', 156),
(10, 'Kabul State', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stationary_category`
--

CREATE TABLE `stationary_category` (
  `stat_categ_Id` int(10) NOT NULL COMMENT 'Stationary category ID',
  `stat_categ_Name` varchar(50) NOT NULL COMMENT 'Stationary category name (Book, Magzine)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stationary_category`
--

INSERT INTO `stationary_category` (`stat_categ_Id`, `stat_categ_Name`) VALUES
(2, 'News Paper'),
(3, 'Book'),
(4, 'Magzine');

-- --------------------------------------------------------

--
-- Table structure for table `stationary_edition`
--

CREATE TABLE `stationary_edition` (
  `edition_Id` int(10) NOT NULL COMMENT 'Book edition ID',
  `edition_N0` varchar(10) NOT NULL COMMENT 'Book edition Number'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stationary_edition`
--

INSERT INTO `stationary_edition` (`edition_Id`, `edition_N0`) VALUES
(1, '1st'),
(2, '2nd'),
(3, '3rd'),
(4, '4th'),
(5, '5th'),
(6, '6th'),
(7, '7th'),
(8, '8th'),
(9, '9th'),
(10, '10th');

-- --------------------------------------------------------

--
-- Table structure for table `student_account`
--

CREATE TABLE `student_account` (
  `std_acc_Id` bigint(20) NOT NULL COMMENT 'Student Account ID',
  `std_voucher_No` bigint(20) NOT NULL COMMENT 'Student Voucher No',
  `std_reciept_Date` date NOT NULL COMMENT 'Date of fee recieved',
  `fee_Id` int(10) NOT NULL COMMENT 'Fee ID',
  `tot_Fee` double(10,2) DEFAULT NULL COMMENT 'Total Fee',
  `dis_typ_Id` int(10) DEFAULT NULL COMMENT 'Discount Type ID',
  `tot_fee_Dis` double(10,2) DEFAULT NULL COMMENT 'Total Discount',
  `fine_Id` bigint(10) DEFAULT NULL COMMENT 'Fine Id',
  `std_tot_Fine` double(10,2) DEFAULT NULL,
  `fee_Recievable` double(10,2) NOT NULL COMMENT 'Total Fee',
  `fee_Recieved` double(10,2) DEFAULT NULL COMMENT 'Recieved Fee',
  `fee_Due` double(10,2) DEFAULT NULL COMMENT 'Fee Due',
  `std_Id` bigint(20) NOT NULL COMMENT 'Student ID from student_info Table',
  `fee_Status` enum('0','1') DEFAULT NULL COMMENT 'To check if the pupil has paid all due or not'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `std_att_Id` bigint(100) NOT NULL COMMENT 'Student Attendance ID',
  `std_att_Date` date NOT NULL COMMENT 'Date of Attendance',
  `att_typ_Id` int(10) NOT NULL COMMENT 'ID of Attendance Type',
  `tot_on_Days` bigint(10) NOT NULL COMMENT 'Total days school was open',
  `tot_present_Days` bigint(10) NOT NULL COMMENT 'Total days a pupil was present',
  `tot_absentee_Days` bigint(10) DEFAULT NULL COMMENT 'Total days a pupil was Absent',
  `tot_halfLv_Days` bigint(10) DEFAULT NULL COMMENT 'Total days a pupil was on half leave',
  `tot_Lv_Days` bigint(10) DEFAULT NULL COMMENT 'Total other leaves',
  `tot_late_Days` bigint(10) DEFAULT NULL COMMENT 'Total days a pupil got late',
  `tot_present_Att` bigint(10) DEFAULT NULL COMMENT 'Total present attendance of pupil',
  `tot_absentee_Att` bigint(10) DEFAULT NULL COMMENT 'Total absent Attendance of pupil',
  `tot_halfLv_Att` bigint(10) DEFAULT NULL COMMENT 'Total Halfday Attendance of pupil',
  `tot_Lv_Att` bigint(10) DEFAULT NULL COMMENT 'Total Leaves in Attendance of a pupil',
  `tot_late_Att` bigint(10) DEFAULT NULL COMMENT 'Total Late attendance of a pupil',
  `std_tot_att` bigint(10) DEFAULT NULL COMMENT 'Total Obtained attendance of pupil',
  `std_time_Late` varchar(10) DEFAULT NULL COMMENT 'Lateness time used when a pupil is late',
  `std_time_Lv` time DEFAULT NULL COMMENT 'Time of Leave used when Half Leave is selected',
  `std_purp_Lv` varchar(100) DEFAULT NULL COMMENT 'Purpose of leave when a pupil is on leave',
  `std_Id` bigint(20) NOT NULL COMMENT 'Student ID from student_info Table',
  `cls_att_Id` bigint(100) DEFAULT NULL COMMENT 'Class Attendance ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_category`
--

CREATE TABLE `student_category` (
  `std_cat_Id` int(20) NOT NULL COMMENT 'Category ID',
  `student_category_name` varchar(100) NOT NULL COMMENT 'Category of the student such as Military or Civilian'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_category`
--

INSERT INTO `student_category` (`std_cat_Id`, `student_category_name`) VALUES
(1, 'Army'),
(3, 'Civil'),
(4, 'PAF'),
(5, 'Navy'),
(6, 'Police');

-- --------------------------------------------------------

--
-- Table structure for table `student_contact`
--

CREATE TABLE `student_contact` (
  `pnt_cnt_Id` bigint(10) NOT NULL COMMENT 'parent contact table id',
  `pnt_mob_Ph` bigint(20) NOT NULL COMMENT 'parent mob number',
  `pnt_home_Ph` bigint(20) DEFAULT NULL COMMENT 'parent home phone',
  `pnt_off_Ph` bigint(20) DEFAULT NULL COMMENT 'parent office phone',
  `pnt_Email` varchar(50) DEFAULT NULL COMMENT 'parent email address',
  `pnt_mail_Add` varchar(200) DEFAULT NULL COMMENT 'parent mailing address',
  `pnt_pmt_Add` varchar(200) DEFAULT NULL COMMENT 'parent permanent address',
  `pnt_City` varchar(20) DEFAULT NULL COMMENT 'parent City',
  `pnt_District` varchar(20) DEFAULT NULL COMMENT 'parent District',
  `zip_No` varchar(255) NOT NULL,
  `mother_mobile` varchar(255) NOT NULL,
  `mother_office_phone` varchar(255) DEFAULT NULL,
  `mother_home_phone` varchar(255) DEFAULT NULL,
  `mother_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_contact`
--

INSERT INTO `student_contact` (`pnt_cnt_Id`, `pnt_mob_Ph`, `pnt_home_Ph`, `pnt_off_Ph`, `pnt_Email`, `pnt_mail_Add`, `pnt_pmt_Add`, `pnt_City`, `pnt_District`, `zip_No`, `mother_mobile`, `mother_office_phone`, `mother_home_phone`, `mother_email`) VALUES
(1, 3339654236, 3339654236, 3339654236, 'example@father.com', 'Near HBL Bank Shamsabad Karak\r\nNBC Plaza', 'NBC Plaza', '2', '2', '27200', '03339654236', '03339654236', '03339654236', 'example@mother.com'),
(2, 3339654236, 3339654236, 3339654236, 'father@father.com', 'Near HBL Bank Shamsabad Karak\r\nNBC Plaza', 'NBC Plaza', '2', NULL, '46000', '03339654236', '03339654236', '03339654236', 'mother@mother.com'),
(3, 3339654236, 3339654236, 3339654236, 'example@father.com', 'Near HBL Bank Shamsabad Rawalpindi  ss', 'NBC Plaza', '2', '4', '46000', '03339654236', '03339654236', '03339654236', 'example@mother.com'),
(4, 9999999, 77777777, 888888, 'example@father.com', 'Near HBL Bank Shamsabad Rawalpindi Address Updated', 'NBC Plaza', '2', '4', '46000', '6666666', '555555555', '44444444', 'example@mother.com'),
(5, 3339654236, 3339654236, 3339654236, 'mother@gmail.com', 'F-8 Markaz', 'F-8 Markaz', '188', '42', '44000', '03339654236', '03339654236', '03339654236', 'father@gmail.com'),
(6, 3339654236, 3339654236, 3339654236, 'Fatther@gmail.com', 'F-8 Markaz', 'F-8 Markaz', '130', '152', '44000', '03339654236', '03339654236', '03339654236', 'Mother@gmail.com'),
(7, 3353443510, 3353443510, 3353443510, 'islam.gulshan@gmail.com', 'khana pull', 'khana pull', '155', '3', '44000', '03353443510', '03353443510', '03353443510', 'islam.gulshan@gmail.com'),
(8, 3353443510, 3353443510, 3353443510, 'islam.gulshan@gmail.com', 'khana pull', 'khana pull', '155', '3', '44000', '03353443510', '03353443510', '03353443510', 'islam.gulshan@gmail.com'),
(9, 3353443510, 3353443510, 3353443510, 'islam.gulshan@gmail.com', 'khana pull', 'khana pull', '155', '3', '44000', '03353443510', '03353443510', '03353443510', 'islam.gulshan@gmail.com'),
(10, 3353443510, 3353443510, 3353443510, 'islam.gulshan@gmail.com', 'khana pull', 'khana pull', '155', '3', '44000', '03353443510', '03353443510', '03353443510', 'islam.gulshan@gmail.com'),
(11, 3353443510, NULL, NULL, 'islam.gulshan@gmail.com', 'das', 'das', '1', '2', '44000', '03353443510', '03353443510', '03353443510', 'islam.gulshan@gmail.com'),
(12, 3353443510, NULL, NULL, 'islam.gulshan@gmail.com', 'khana pull', 'khana pull', '4', '2', '44000', '03353443510', '03353443510', '03353443510', 'islam.gulshan@gmail.com'),
(13, 3353443510, NULL, NULL, 'islam.gulshan@gmail.com', 'khana pull', 'khana pull', '4', '3', '44000', '03353443510', '03353443510', '03353443510', 'islam.gulshan@gmail.com'),
(14, 3353443510, NULL, NULL, 'islam.gulshan@gmail.com', 'khana pull', 'khana pull', '1', '2', '44000', '03353443510', '03353443510', '03353443510', 'islam.gulshan@gmail.com'),
(15, 3353443510, NULL, NULL, 'islam.gulshan@gmail.com', 'khana pull', 'khana pull', '1', '2', '44000', '03353443510', '03353443510', '03353443510', 'islam.gulshan@gmail.com'),
(16, 3353443510, NULL, NULL, 'islam.gulshan@gmail.com', 'khana pull', 'khana pull', '1', '2', '44000', '03353443510', '03353443510', '03353443510', 'islam.gulshan@gmail.com'),
(17, 3353443510, NULL, NULL, 'islam.gulshan@gmail.com', 'khana pull', 'khana pull', '1', '2', '44000', '03353443510', '03353443510', '03353443510', 'islam.gulshan@gmail.com'),
(18, 3353443510, NULL, NULL, 'islam.gulshan@gmail.com', 'khana pull', 'khana pull', '1', '2', '44000', '03353443510', '03353443510', '03353443510', 'islam.gulshan@gmail.com'),
(19, 3353443510, NULL, NULL, 'islam.gulshan@gmail.com', 'khana pull', 'khana pull', '1', '2', '44000', '03353443510', '03353443510', '03353443510', 'islam.gulshan@gmail.com'),
(20, 3353443510, NULL, NULL, 'islam.gulshan@gmail.com', 'khana pull', 'khana pull', '1', '1', '44000', '03353443510', '03353443510', '03353443510', 'islam.gulshan@gmail.com'),
(21, 3353443510, NULL, NULL, 'islam.gulshan@gmail.com', 'khana pull', 'khana pull', '1', '1', '44000', '03353443510', '03353443510', '03353443510', 'islam.gulshan@gmail.com'),
(22, 99999999999, NULL, NULL, 'zakirkhan@gmail.com', 'Karak CIty', 'Karak CIty', '188', '42', '27200', '99999999999', '99999999999', '99999999999', 'zakirakhan@gmail.com'),
(23, 3353443510, NULL, NULL, 'islam.gulshan@gmail.com', 'khana pull', 'karack', '188', '42', '27200', '03353443510', '03353443510', '03353443510', 'islam.gulshan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `std_Id` bigint(20) NOT NULL COMMENT 'This is the student''s ID that will be used in Admission No as well',
  `gnd_Id` int(10) NOT NULL COMMENT 'Student''s Gender from Gender Table',
  `std_Dob` date NOT NULL COMMENT 'Student''s DOB',
  `std_Age` float DEFAULT NULL COMMENT 'Student Age Auto Calculated from DOB',
  `nation_Id` int(10) NOT NULL COMMENT 'Nationality from Nation Table',
  `dom_Id` int(10) NOT NULL COMMENT 'Domicile from dom Table',
  `cast_Id` int(10) NOT NULL COMMENT 'Student Cast/Tribe',
  `bg_Id` int(10) NOT NULL COMMENT 'Blood Group from BG Table',
  `relig_Id` int(10) NOT NULL COMMENT 'Religion from Rel Table',
  `std_cat_Id` int(20) NOT NULL COMMENT 'Profession Category of pupil''s Father',
  `disable_Id` int(10) NOT NULL COMMENT 'Dasability Status Disable Table',
  `lsch_Id` int(10) DEFAULT NULL COMMENT 'Last School Attended',
  `emer_cnt_Id` int(10) NOT NULL COMMENT 'Student Emergency contact ID',
  `adm_No` bigint(100) NOT NULL COMMENT 'Pupil admission no',
  `cls_Id` int(10) NOT NULL COMMENT 'Class in which enrolles',
  `parent_ids` varchar(255) DEFAULT NULL,
  `father_id` int(11) NOT NULL,
  `mother_id` int(11) NOT NULL,
  `fk_pnt_cnt_Id` bigint(10) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `stddisable` varchar(255) DEFAULT NULL,
  `role_number` int(11) DEFAULT NULL,
  `last_school_checked` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`std_Id`, `gnd_Id`, `std_Dob`, `std_Age`, `nation_Id`, `dom_Id`, `cast_Id`, `bg_Id`, `relig_Id`, `std_cat_Id`, `disable_Id`, `lsch_Id`, `emer_cnt_Id`, `adm_No`, `cls_Id`, `parent_ids`, `father_id`, `mother_id`, `fk_pnt_cnt_Id`, `user_id`, `section_id`, `stddisable`, `role_number`, `last_school_checked`) VALUES
(1, 1, '2015-04-20', 6, 156, 2, 1, 3, 1, 1, 3, 13, 1, 1, 2, '1,3', 0, 0, 1, 1, 15, '', NULL, NULL),
(2, 1, '2015-04-20', 6, 1, 2, 1, 3, 1, 1, 3, 14, 2, 2, 2, '1,3', 0, 0, 2, 2, 16, '', NULL, NULL),
(3, 1, '2015-04-26', 6, 1, 4, 1, 3, 1, 1, 3, 15, 5, 3, 2, '1,3', 0, 0, 3, 3, NULL, '', NULL, NULL),
(4, 1, '2015-04-29', 6, 156, 2, 1, 3, 1, 1, 3, 16, 6, 4, 3, '4,3', 0, 0, 4, 4, NULL, '', NULL, NULL),
(5, 1, '2014-07-12', 7, 156, 42, 1, 5, 13, 3, 3, 17, 31, 6, 2, '1,3', 0, 0, 5, 5, 17, '', NULL, NULL),
(6, 1, '2015-07-12', 6, 13, 42, 1, 5, 13, 3, 1, 30, 3, 7, 1, '4,3', 39, 39, 3, 6, 19, '', 34, NULL),
(7, 2, '2016-01-04', 5, 3, 2, 3, 5, 3, 1, 1, 22, 1, 11, 2, '4,3', 0, 0, 1, 25, 7, '', 1, NULL),
(8, 1, '2021-09-23', 0, 3, 4, 4, 3, 4, 5, 3, 46, 51, 19, 2, '1,3', 0, 0, 19, NULL, NULL, '', NULL, NULL),
(9, 1, '2021-09-24', 0, 3, 4, 1, 5, 3, 3, 3, 48, 3, 21, 2, '1,3', 46, 45, 3, 28, 7, NULL, 2, 0),
(10, 1, '2016-01-03', 5, 13, 42, 156, 3, 13, 4, 3, 49, 4, 22, 1, NULL, 46, 45, 4, 48, 20, NULL, NULL, 0),
(11, 1, '2000-01-08', 21, 156, 42, 156, 5, 13, 3, 3, 50, 57, 23, 1, NULL, 46, 45, 23, 50, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `study_material`
--

CREATE TABLE `study_material` (
  `pk_study_material_Id` bigint(20) NOT NULL COMMENT 'Study material ID',
  `due_Date` date DEFAULT NULL COMMENT 'Due Date',
  `fk_cls_Id` int(10) DEFAULT NULL COMMENT 'Class ID',
  `fk_c_section_Id` int(10) NOT NULL COMMENT 'Class Section',
  `fk_sub_Id` int(10) NOT NULL COMMENT 'Subject',
  `fk_std_Id` bigint(20) DEFAULT NULL COMMENT 'Student Id',
  `study_Note` text DEFAULT NULL COMMENT 'Notes',
  `study_File` varchar(255) DEFAULT NULL COMMENT 'Helping document',
  `study_Status` enum('Open','Closed') DEFAULT NULL COMMENT 'Study Status',
  `audience` varchar(255) NOT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `student` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `top` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `study_material`
--

INSERT INTO `study_material` (`pk_study_material_Id`, `due_Date`, `fk_cls_Id`, `fk_c_section_Id`, `fk_sub_Id`, `fk_std_Id`, `study_Note`, `study_File`, `study_Status`, `audience`, `topic`, `student`, `user_id`, `top`) VALUES
(1, '2021-07-23', 1, 1, 11, NULL, 'This topic is for whole class one.', 'user-male-shape.png', NULL, 'Whole Class', 'Kashmir day1', '1', NULL, 0),
(4, '2021-11-11', 2, 7, 9, NULL, 'saad', 'logomediation.png', NULL, 'Whole Class', 'as', '25,28', 18, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sub_Id` int(10) NOT NULL COMMENT 'Subject''s ID',
  `subject` varchar(50) NOT NULL COMMENT 'Subjects''s Name',
  `sub_Code` varchar(100) DEFAULT NULL COMMENT 'Course Code',
  `sub_th_Mks` float(10,2) DEFAULT NULL COMMENT 'Subject''s Theory Marks',
  `sub_prac_Mks` float(10,2) DEFAULT NULL COMMENT 'Subject''s Practical Marks',
  `sub_tot_Mks` float(10,2) DEFAULT NULL COMMENT 'Subject''s Total Marks',
  `sub_pass_Mks` float(10,2) DEFAULT NULL COMMENT 'Subject''s Passing Marks'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_Id`, `subject`, `sub_Code`, `sub_th_Mks`, `sub_prac_Mks`, `sub_tot_Mks`, `sub_pass_Mks`) VALUES
(7, 'History', 'History-001', 100.00, 0.00, 100.00, 40.00),
(8, 'Physics', 'Physics-001', 75.00, 25.00, 100.00, 40.00),
(9, 'Islamiat', 'Islamiat-001', 50.00, 25.00, 75.00, 40.00),
(10, 'Chemistry', 'chemistry-0033', 100.00, 25.00, 100.00, 40.00),
(11, 'English', 'english-022', NULL, NULL, NULL, NULL),
(12, 'Urdu', 'urdu-022', NULL, NULL, NULL, NULL),
(13, 'Maths', 'Math-099', NULL, NULL, NULL, NULL),
(14, 'Drawing', 'Drawing-011', NULL, NULL, NULL, NULL),
(15, 'Biology', 'Biology-998', NULL, NULL, NULL, NULL),
(16, 'Computer', 'Computer-852', NULL, NULL, NULL, NULL),
(17, 'Economics', 'Economics-666', NULL, NULL, NULL, NULL),
(18, 'General Science', 'General-Science-0122', NULL, NULL, NULL, NULL),
(19, 'Gulshan Islam', '59421', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supp_Id` bigint(10) NOT NULL COMMENT 'Supplier ID',
  `supp_Name` varchar(255) NOT NULL COMMENT 'Supplier Name',
  `supp_Contact` bigint(20) DEFAULT NULL COMMENT 'Supplier Contact No',
  `supp_Add` varchar(255) DEFAULT NULL COMMENT 'Supplier Address',
  `supp_Status` enum('Active','Inactive') NOT NULL COMMENT 'Supplier Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supp_Id`, `supp_Name`, `supp_Contact`, `supp_Add`, `supp_Status`) VALUES
(1, 'Supplier 1', 11111111111, 'Supplier 1 address', 'Active'),
(2, 'Supplier 2', 22222222222, 'Supplier 2 address ', 'Active'),
(3, 'Supplier 3', 33333333333, 'Supplier  address ', 'Active'),
(4, 'Test Supplier 1', 888888888888, 'Test Supplier Address 1', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `syllabus`
--

CREATE TABLE `syllabus` (
  `syllabus_Id` int(10) NOT NULL,
  `exam_Id` bigint(100) NOT NULL,
  `cls_Id` int(10) NOT NULL,
  `sub_Id` int(10) NOT NULL,
  `syllabus_docs` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `syllabus`
--

INSERT INTO `syllabus` (`syllabus_Id`, `exam_Id`, `cls_Id`, `sub_Id`, `syllabus_docs`) VALUES
(47, 1, 6, 9, '1603364976855.jpg'),
(48, 1, 6, 9, 'file.png'),
(49, 1, 12, 9, 'islamiat syllabus for 8 class.png'),
(50, 13, 2, 9, 'rafaqat.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `tr_Id` bigint(20) NOT NULL,
  `tr_Type` varchar(255) NOT NULL COMMENT '1 = bill , 2 = payments',
  `tr_Date` datetime NOT NULL DEFAULT current_timestamp(),
  `acc_Id` varchar(255) NOT NULL,
  `dr_Amt` double(10,2) NOT NULL,
  `cr_Amt` double(10,2) NOT NULL,
  `bl_Amt` double(10,2) DEFAULT NULL,
  `tr_Status` varchar(255) NOT NULL,
  `std_Id` bigint(20) DEFAULT NULL,
  `emp_Id` bigint(20) DEFAULT NULL,
  `supp_Id` bigint(10) DEFAULT NULL,
  `month` date NOT NULL DEFAULT current_timestamp(),
  `schedule_id` int(11) DEFAULT NULL,
  `Vtype` varchar(255) DEFAULT NULL,
  `Narration` varchar(250) DEFAULT NULL,
  `char_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`tr_Id`, `tr_Type`, `tr_Date`, `acc_Id`, `dr_Amt`, `cr_Amt`, `bl_Amt`, `tr_Status`, `std_Id`, `emp_Id`, `supp_Id`, `month`, `schedule_id`, `Vtype`, `Narration`, `char_id`) VALUES
(89, '1', '2022-03-01 12:00:00', '2', 0.00, 2000.00, 0.00, 'Open', 6, NULL, NULL, '2022-03-09', 10, 'Fee Generated', 'Fees generated form student id 6', 0),
(90, '1', '2022-03-01 12:00:00', '3', 0.00, 200.00, 0.00, 'Open', 6, NULL, NULL, '2022-03-09', 10, 'Fee Generated', 'Fees generated form student id 6', 0),
(91, '1', '2022-03-01 12:00:00', '4', 0.00, 200.00, 0.00, 'Open', 6, NULL, NULL, '2022-03-09', 10, 'Fee Generated', 'Fees generated form student id 6', 0),
(92, '1', '2022-03-01 12:00:00', '5', 0.00, 200.00, 0.00, 'Open', 6, NULL, NULL, '2022-03-09', 10, 'Fee Generated', 'Fees generated form student id 6', 0),
(93, '1', '2022-03-01 12:00:00', '6', 0.00, 200.00, 0.00, 'Open', 6, NULL, NULL, '2022-03-09', 10, 'Fee Generated', 'Fees generated form student id 6', 0),
(94, '1', '2022-03-01 12:00:00', '7', 0.00, 200.00, 0.00, 'Open', 6, NULL, NULL, '2022-03-09', 10, 'Fee Generated', 'Fees generated form student id 6', 0),
(95, '1', '2022-03-01 12:00:00', '8', 0.00, 2000.00, 0.00, 'Open', 6, NULL, NULL, '2022-03-09', 10, 'Fee Generated', 'Fees generated form student id 6', 0),
(96, '1', '2022-03-01 12:00:00', '9', 0.00, 200.00, 0.00, 'Open', 6, NULL, NULL, '2022-03-09', 10, 'Fee Generated', 'Fees generated form student id 6', 0),
(97, '1', '2022-03-01 12:00:00', '10', 0.00, 33.00, 0.00, 'Open', 6, NULL, NULL, '2022-03-09', 10, 'Fee Generated', 'Fees generated form student id 6', 0),
(98, '1', '2022-03-01 12:00:00', '11', 0.00, 200.00, 0.00, 'Open', 6, NULL, NULL, '2022-03-09', 10, 'Fee Generated', 'Fees generated form student id 6', 0),
(99, '1', '2022-03-01 12:00:00', '12', 0.00, 233.00, 0.00, 'Open', 6, NULL, NULL, '2022-03-09', 10, 'Fee Generated', 'Fees generated form student id 6', 0),
(100, '1', '2022-03-01 12:00:00', '22', 0.00, 200.00, 0.00, 'Open', 6, NULL, NULL, '2022-03-09', 10, 'Fee Generated', 'Fees generated form student id 6', 0),
(101, '1', '2022-03-01 12:00:00', '3103', 5866.00, 0.00, 0.00, 'Open', 6, NULL, NULL, '2022-03-09', 10, 'Fee Generated', 'Fees generated form student id 6', 0),
(102, '1', '2022-03-01 12:00:00', '6', 5866.00, 0.00, 4866.00, 'Partial', 6, NULL, NULL, '2022-03-01', 10, 'Fee Generated', 'Fees generated form student id 6', 1),
(103, '2', '2022-03-09 12:00:00', '3103', 0.00, 1000.00, 0.00, 'Close', 6, NULL, NULL, '2022-03-09', 10, 'Fees payment', 'Fees payment for student 6', 0),
(104, '2', '2022-03-09 12:00:00', '20', 1000.00, 0.00, 0.00, 'Close', 6, NULL, NULL, '2022-03-09', 10, 'Fees payment', 'Fees payment for student 6', 0),
(105, '2', '2022-03-09 12:00:00', '6', 0.00, 1000.00, 4866.00, 'Close', 6, NULL, NULL, '2022-03-09', 10, 'Fees payment', 'Fees payment for student 6', 1);

-- --------------------------------------------------------

--
-- Table structure for table `university_list`
--

CREATE TABLE `university_list` (
  `univ_Id` bigint(10) NOT NULL COMMENT 'EducationLevel ID',
  `univ_Name` varchar(255) NOT NULL COMMENT 'Name of EducationLevel'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `university_list`
--

INSERT INTO `university_list` (`univ_Id`, `univ_Name`) VALUES
(1, 'Kohat EducationLevel of Science & Technology');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `user_image`, `email`, `phone`, `user_type`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Refaqat', 'admin', 'user1629697265.jpg', 'refaqatkhattak88@gmail.com', '03339654236', '', 'Active', NULL, '$2y$10$hohxZMHXui58RWegIaPixuJSK3DZoLi57Q4L.byFWGDNDs1NNiKp2', NULL, '2021-02-18 01:55:55', '2021-08-25 15:02:56'),
(2, 'Muhammad Rafi', 'refaqat88', NULL, 'rafi@gmail.com', NULL, '2', 'Active', NULL, '$2y$10$i07ZqS7Q/AxDvUSSri0WRelleyGYQtNrNRQ2FRzOYWwXiyicDGhoy', NULL, '2021-02-17 07:04:19', '2021-08-24 02:20:12'),
(3, 'Muhammad Ijaz', 'Ijaz', NULL, 'mijaz@gmail.com', NULL, '2', 'Active', NULL, '$2y$10$tpriH4cBGjL.dzdn8zIvHOpUcv.ZRaimf1bV2870MxetHpHePMR3y', NULL, '2021-02-17 07:10:55', '2022-03-01 02:29:03'),
(4, 'Muhammad', '2423523152315', NULL, 'muhammmd@gmail.com', NULL, '2', 'Active', NULL, '$2y$10$9oLeBY.rjgi2crACMIICA.zK2Sguub2p.E.DHfJdRnMPyNS.7GSju', NULL, '2021-04-16 05:05:13', '2021-08-24 02:19:06'),
(5, 'Rukhsana Khatoon', '14202333333333', NULL, 'rukhsana@gmail.com', NULL, '2', 'Active', NULL, '$2y$10$WIV5QxiWCP2Ut3oxa7d5w.z5/25rODsvSmoqgWva4fZXaG1Q41Sm2', NULL, '2021-04-16 05:20:03', '2021-08-24 02:18:32'),
(6, 'Muhammad Yasir', '142028585858585', 'user1632234999.PNG', 'yasir@gmail.com', NULL, '2', 'Active', NULL, '$2y$10$vdi4sjnfeeU.KDh.sl/aT.TbwuNSIVPK7Er/b7SjcJZMMi0Qsto5u', NULL, '2021-04-20 03:16:59', '2021-11-23 07:27:48'),
(7, 'Zulkarnain', '14202555555555', NULL, 'zulkarnain@gmail.com', NULL, '2', 'Active', NULL, '$2y$10$.mKJv.IsrfDcJoARdnynX.XfeLqecseN7RpXHVAWZysonEFSGGVei', NULL, '2021-04-20 05:49:21', '2021-08-24 02:15:30'),
(8, 'Fakhar', '600060006000', NULL, 'fakhar@gmail.com', '3339654236', '2', 'Active', NULL, '$2y$10$.mKJv.IsrfDcJoARdnynX.XfeLqecseN7RpXHVAWZysonEFSGGVei', NULL, '2021-04-20 06:03:05', '2021-08-17 03:48:18'),
(9, 'Muhammad saboor Khan', 'teacher1', NULL, 'muhmmadsaboor@gmail.com', NULL, '2', 'Active', NULL, '$2y$10$hohxZMHXui58RWegIaPixuJSK3DZoLi57Q4L.byFWGDNDs1NNiKp2', NULL, '2021-06-03 08:29:09', '2021-08-24 02:17:36'),
(10, 'Gul Zaman', '999999999999', 'emp1629984463.jpg', 'examiner@gmail.com', '3333333333', '6', 'Active', NULL, '$2y$10$P7ndYPZEWFHTI9qBdnli8e8GDQCORyJwYFvJPzVuSxQR.Iu59RY3m', NULL, '2021-06-08 05:23:54', '2021-08-26 20:27:43'),
(11, 'Muhammad Ijaz', '144414441444', NULL, 'ijaz@gmail.com', NULL, '2', 'Active', NULL, '$2y$10$2cWEqX09NydiHZKOsZw61.ZZAq3TbadfpqC1EmfsGezSlCMNv3ymG', NULL, '2021-06-22 04:27:39', '2022-03-01 02:30:05'),
(12, 'Abdul Manan', '70009999100000', NULL, 'abdulmanan@gmail.com', NULL, '2', 'Active', NULL, '$2y$10$xFOJml5xY2RvMUVK6VhW1ODZS2xTRzrR48Q7/tMlnvCtBP384yNpC', NULL, '2021-07-12 04:28:50', '2021-08-24 01:59:58'),
(13, 'Abdul Saboor', '8888886666661235', NULL, 'abdulsaboor@gmail.com', NULL, '2', 'Active', NULL, '$2y$10$hohxZMHXui58RWegIaPixuJSK3DZoLi57Q4L.byFWGDNDs1NNiKp2', NULL, '2021-07-12 04:32:45', '2021-08-24 02:15:59'),
(14, 'Gul Zaman', '14505123456789', NULL, 'gulzaman@gmail.com', NULL, '2', 'Active', NULL, '$2y$10$xwho6niucDeakeQX7.LkVecR9fjlp4HTAWpibj0lScUlUnwAvcLuC', NULL, '2021-07-12 04:47:20', '2021-08-24 02:16:25'),
(15, 'Example2', '1940288887777232', 'emp1629985044.jpg', 'example@gmail.com', NULL, '2', 'Active', NULL, '$2y$10$nJZwQoawxSgiPzKXLopFl.8kjwnfgULQLWOd1USCiAnI1BJIVhRcm', NULL, '2021-07-12 05:16:53', '2021-08-26 20:37:24'),
(16, 'Ali Hasher', '1490112345678', '333.jpg', 'asher@gmail.com', NULL, '2', 'Active', NULL, '$2y$10$v4FAIPsqB9r.pulXP/eFpO84YsEymlkNxHZW/nRdSeDlRV4chlKhS', NULL, '2021-07-26 05:41:08', '2021-08-24 02:11:44'),
(17, 'Abc a', '1940288887777232', 'emp1629985560.jpg', 'abc@gmail.com', NULL, '2', 'Active', NULL, '$2y$10$J0Yd0TEtUX7DdJ8KRX8d7uuER1C1HeltuRecFLb9pSKBOxyPetE42', NULL, '2021-07-26 05:43:49', '2022-03-01 02:26:08'),
(18, 'Humza Khan2', '22122312341', 'emp1629985264.jpg', 'islam.gulshan@gmail.com', '352542555', '2', 'Active', NULL, '$2y$10$hohxZMHXui58RWegIaPixuJSK3DZoLi57Q4L.byFWGDNDs1NNiKp2', NULL, '2021-07-26 05:45:08', '2021-11-11 06:15:25'),
(19, 'Librarian', '55555555555555', '4234.jg', 'librarian@gmail.com', NULL, '7', 'Active', NULL, '$2y$10$f0dFy4mfOPjpShqp0Upxv.pnVZcFkmEFiXjNrXZAPpmDZBheF.8Tq', NULL, '2021-08-12 00:57:22', '2021-08-24 01:23:12'),
(21, 'Super admin', 'super', 'user1629799113.jpg', 'superadmin@gmail.com', '03339654236', 'Super Admin', 'Active', NULL, '$2y$10$hohxZMHXui58RWegIaPixuJSK3DZoLi57Q4L.byFWGDNDs1NNiKp2', NULL, '2021-02-18 01:55:55', '2021-08-24 04:58:33'),
(24, 'Muzamil Malik', '123444', 'emp1630067818.jpg', 'islam.gulshan@gmail.com', '3353443510', NULL, 'Active', NULL, '$2y$10$9X5xbmnQFSZ0DuYC5obZEOmipsquLM6VkzJ/2Lk0LJmH9jMVCA2Iy', NULL, '2021-08-25 16:29:54', '2021-11-25 06:55:03'),
(25, 'islam gesf sdea', '4643643634636', NULL, NULL, NULL, NULL, 'Active', NULL, '$2y$10$hohxZMHXui58RWegIaPixuJSK3DZoLi57Q4L.byFWGDNDs1NNiKp2', NULL, '2021-08-26 14:10:50', '2021-09-23 17:04:15'),
(26, 'gulshan', '123444', 'emp1630304537.jpg', NULL, NULL, NULL, 'Inactive', NULL, '$2y$10$5KLKv/xnCjD0xvn9Z/Uug.8KPCSLMBDW7hbeLwufHKJzj3f7sz6be', NULL, '2021-08-30 13:22:17', '2021-08-30 13:22:17'),
(27, 'gulshan', '123444234', 'emp1630304569.jpg', NULL, NULL, NULL, 'Inactive', NULL, '$2y$10$6/GyHVqzb6wtIgvkLHCEo.AVu.cFqJ/jpEJ5zL8XkDoiqJq/seuVa', NULL, '2021-08-30 13:22:49', '2021-08-30 13:22:49'),
(28, 'gulshan', NULL, NULL, NULL, NULL, NULL, 'Active', NULL, '', NULL, '2021-09-22 18:50:11', '2021-12-10 08:08:06'),
(36, 'gulshan islam', '12234212', 'user1633678581.PNG', NULL, NULL, NULL, 'Active', NULL, '$2y$10$vh/yeRSm5fr/hQ/MHF7R6O8FB/4.cRg3aqmOfYSX.TlJXPduFULGq', NULL, '2021-10-08 14:36:21', '2021-10-08 14:36:21'),
(37, 'gulshan islam', '123332323232', 'user1633678724.PNG', NULL, NULL, NULL, 'Active', NULL, '$2y$10$cy5IoX1f8pfTpzQLIEJYI.aGtzwV/VZoUhDtNNtmbaDnXrC1GYnxK', NULL, '2021-10-08 14:38:44', '2021-10-08 14:38:44'),
(38, 'gulshan islam', '12330876544', 'user1633678811.PNG', NULL, NULL, NULL, 'Active', NULL, '$2y$10$MqzEG16h0MzprPBlVQih6O5DlnyYxFIAoQEze5aQwSSz1kuPeCg3a', NULL, '2021-10-08 14:40:11', '2021-10-08 14:40:11'),
(39, 'gulshan islam', '1233087623544', 'user1633678944.PNG', NULL, NULL, NULL, 'Active', NULL, '$2y$10$RqBX/PSASBaBf.wmbqSQoeIadLpYU.6MpzXOuNycoe8uISFu/Hib2', NULL, '2021-10-08 14:42:24', '2021-12-29 01:52:09'),
(40, 'Refaqat', 'account', NULL, NULL, NULL, NULL, 'Active', NULL, '$2y$10$ENFHi7WWTJ5Zj7vxQxVhneeGORoO8XtrAc45T9S.imUiZL4stOowG', NULL, '2021-10-11 19:39:34', '2021-10-11 19:39:34'),
(41, 'Abida Khanum', '3645764375234345', 'user1639045058.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$/1x.WZxrPW2N55cNe.h4/.27aDT5N9XVaW8oMc88/QBBYYwWYyX3W', NULL, '2021-12-09 05:17:38', '2021-12-09 05:17:38'),
(42, 'Abida Khanum', '36452312524246', 'user1639045085.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$unrvestpl/0h.DyJBIy2guVeuMPdToy6UpYi4GVrTitYDOeT6o2JS', NULL, '2021-12-09 05:18:05', '2021-12-09 05:18:05'),
(43, 'Abida Khanum', '74745363151125', 'user1639045768.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$evbkIHJ6opgtnofHU0KBruSwCGGnGT0rN9oLuq/GGdLiw2cLKDxtC', NULL, '2021-12-09 05:29:28', '2021-12-09 05:29:28'),
(44, 'Nasreen Khan', '342344214232131', 'user1639045891.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$0vdBKCpPIRSNExKbKPvovODglWUd3fJ/XQLUKhXKHyZbSCephkKQm', NULL, '2021-12-09 05:31:31', '2021-12-09 05:31:31'),
(45, 'Gulzar Begum', '3252352532352321', 'user1639569491.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$pVYWn41x6gwLBosBPy4BCeD6xSS1c0RJloPZwYt5iZcKukRXNzyKO', NULL, '2021-12-09 05:34:57', '2021-12-15 07:43:44'),
(46, 'Zakir Khan', '55436547412334123', 'user1639569691.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$lrzsZKFq.JmCPq21bQ.P2e6LPYsHuaGJAsplmSrpbU03QV1g8GS.G', NULL, '2021-12-09 05:44:33', '2021-12-15 07:49:25'),
(47, 'Zakira Khan', '65464575432534', 'user1639046740.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$5/xf8RxmKJl1IPAZkkfjU.cAOGzunBr4xMzFt8drZuukx2WTcczWW', NULL, '2021-12-09 05:45:40', '2021-12-10 08:47:19'),
(48, 'Zeeshan Khan', '3436346456243144', 'user1639046961.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$3dSChC.TBE0b16BTfXFRJuH9ojjNAFhkNJbSxujMLbW5snqaHO6ua', NULL, '2021-12-09 05:49:21', '2021-12-09 05:49:21'),
(49, 'Umer Khan', '6856234552523422', 'user1639392597.png', 'umerbazkhan@gmail.com', '99999999999', NULL, 'Active', NULL, '$2y$10$hohxZMHXui58RWegIaPixuJSK3DZoLi57Q4L.byFWGDNDs1NNiKp2', NULL, '2021-12-09 07:00:38', '2021-12-13 05:49:57'),
(50, 'Fakhar', '211212212121', 'user1639383804.jpeg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$Q3P3d1FuLINMaI6LF.TycOUIS4sMm5HgZxXH0qhzdAIOzxqcR7iAa', NULL, '2021-12-13 08:23:24', '2021-12-13 08:23:24'),
(51, 'Zakir Khan', '32523525323523', 'user1642687805.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$a1tDZqeoUnANUM1GMkK6x.08hQ9n0OgbO/BWjQMCgapgV8sksWLkm', NULL, '2022-01-20 09:10:05', '2022-01-20 09:10:05'),
(52, 'gulshan', '12344423', 'emp1643715196.png', 'islam.gulshan@gmail.com', NULL, NULL, 'Inactive', NULL, '$2y$10$onx/dHRqxodckGRrIjtiSu7m32UiNZnfEJmFjFAH6wQhpwXrsspFO', NULL, '2022-02-01 06:33:16', '2022-02-01 06:33:16'),
(53, 'gulshan', '1234442344', 'emp1643715260.png', 'islam.gulshan@gmail.com', NULL, NULL, 'Inactive', NULL, '$2y$10$nVZUQj1onYYTn.dnSbvdcO.d4nbiQtNnEQ7iwalQU2EAIrPRZug22', NULL, '2022-02-01 06:34:20', '2022-02-01 06:34:20'),
(54, 'gulshan', '12344423443', 'emp1643715345.png', 'islam.gulshan@gmail.com', NULL, NULL, 'Inactive', NULL, '$2y$10$27LiqugJAKDkhPM0Ev.V..ETBaoG.h1S5m.HTDSVszDZztkbtVPi.', NULL, '2022-02-01 06:35:45', '2022-02-01 06:35:45'),
(55, 'gulshan', '123444234434', 'emp1643715549.png', 'islam.gulshan@gmail.com', NULL, NULL, 'Inactive', NULL, '$2y$10$gn/c77HpiuibEyHiwbPLW.9WZvbxQY8qd/okeRsdNJVgyGaD1HQSy', NULL, '2022-02-01 06:39:09', '2022-02-01 06:39:09'),
(56, 'gulshan', '1234442344342', 'emp1643715600.png', 'islam.gulshan@gmail.com', NULL, NULL, 'Inactive', NULL, '$2y$10$Ls3qSXcqcxv2FANO.SrIvOkA1gd0K26VUlaSwZ5gNPQkFOlZ6MZlq', NULL, '2022-02-01 06:40:00', '2022-02-01 06:40:00'),
(57, 'gulshan', '12344423443422', 'emp1643715645.png', 'islam.gulshan@gmail.com', NULL, NULL, 'Inactive', NULL, '$2y$10$.qYQluJPG7bBFdzk1a3Xue0JVYsBt2LkvQSAWcKV31bC9s0sAouje', NULL, '2022-02-01 06:40:45', '2022-02-01 06:40:45'),
(58, 'gulshan', '123424423443422', 'emp1643715843.png', 'islam.gulshan@gmail.com', NULL, NULL, 'Inactive', NULL, '$2y$10$C7b7BV/Bc3oqrG/E4zJp3ug8pHOfiltQBbp8uhnkHtXvTLvXaeR6W', NULL, '2022-02-01 06:44:03', '2022-02-01 06:44:03'),
(59, 'gulshan afridi', '222083232', 'emp1643718098.png', 'islam.gulshan@gmail.com', NULL, NULL, 'Inactive', NULL, '$2y$10$nDMB3EYABZESEZg6kNooP.40LtbMAKOFhoATjKipB849OA1fCEPx.', NULL, '2022-02-01 07:21:38', '2022-02-01 07:21:38');

-- --------------------------------------------------------

--
-- Table structure for table `user_role_id`
--

CREATE TABLE `user_role_id` (
  `user_role_Id` int(10) NOT NULL COMMENT 'User Role',
  `user_role_Name` varchar(20) NOT NULL COMMENT 'User Role',
  `user_right_Id` int(10) NOT NULL COMMENT 'User Rights'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `user_type_Id` int(11) NOT NULL,
  `user_type_Name` varchar(150) NOT NULL COMMENT 'User type'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_type_Id`, `user_type_Name`) VALUES
(1, 'Admin'),
(2, 'Teacher'),
(3, 'Accountant'),
(5, 'Parent'),
(6, 'Examiner'),
(7, 'Librarian');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawl_student`
--

CREATE TABLE `withdrawl_student` (
  `with_Id` bigint(20) NOT NULL COMMENT 'Withdrawl ID',
  `withdrawl_Date` date NOT NULL COMMENT 'Date of Withdrawl',
  `with_Reason` varchar(100) DEFAULT NULL COMMENT 'Reason of withdrawl',
  `with_Remark` varchar(100) NOT NULL COMMENT 'Remarks by the school on withdrawl',
  `std_Id` bigint(20) NOT NULL COMMENT 'Student Id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `withdrawl_student`
--

INSERT INTO `withdrawl_student` (`with_Id`, `withdrawl_Date`, `with_Reason`, `with_Remark`, `std_Id`) VALUES
(1, '2021-04-22', NULL, 'gggggggggggggggggggggggggggggggggggggg', 1),
(2, '2021-04-22', NULL, 'Gul saba is withrawal', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_qualification`
--
ALTER TABLE `academic_qualification`
  ADD PRIMARY KEY (`acdm_qual_Id`);

--
-- Indexes for table `account_type`
--
ALTER TABLE `account_type`
  ADD PRIMARY KEY (`acc_type_Id`);

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`adm_No`);

--
-- Indexes for table `advance_salary`
--
ALTER TABLE `advance_salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_type`
--
ALTER TABLE `attendance_type`
  ADD PRIMARY KEY (`att_typ_Id`);

--
-- Indexes for table `attendence`
--
ALTER TABLE `attendence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`auth_Id`);

--
-- Indexes for table `blood_group`
--
ALTER TABLE `blood_group`
  ADD PRIMARY KEY (`bg_Id`);

--
-- Indexes for table `boards`
--
ALTER TABLE `boards`
  ADD PRIMARY KEY (`pk_board_Id`);

--
-- Indexes for table `cast`
--
ALTER TABLE `cast`
  ADD PRIMARY KEY (`cast_Id`);

--
-- Indexes for table `chartofaccounts`
--
ALTER TABLE `chartofaccounts`
  ADD PRIMARY KEY (`acc_Id`),
  ADD KEY `acctypeid` (`acc_type_Id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`pk_city_id`),
  ADD KEY `foreign key dom id` (`dom_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`cls_Id`),
  ADD KEY `class_subfk` (`sub_Id`),
  ADD KEY `class_scsec_fk` (`sc_sec_Id`);

--
-- Indexes for table `class-rep`
--
ALTER TABLE `class-rep`
  ADD PRIMARY KEY (`crep_Id`),
  ADD KEY `std_fk` (`std_Id`);

--
-- Indexes for table `classsched`
--
ALTER TABLE `classsched`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classsched_days`
--
ALTER TABLE `classsched_days`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_schudle` (`classsched_id`);

--
-- Indexes for table `classwise_achievement`
--
ALTER TABLE `classwise_achievement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classwise_attendace`
--
ALTER TABLE `classwise_attendace`
  ADD PRIMARY KEY (`cls_att_Id`),
  ADD KEY `classwise_attendace_clsfk` (`cls_Id`),
  ADD KEY `classwise_attendace_subfk` (`sub_Id`),
  ADD KEY `classwise_attendace_atttypefk` (`att_typ_Id`);

--
-- Indexes for table `classwise_behaviour`
--
ALTER TABLE `classwise_behaviour`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_section`
--
ALTER TABLE `class_section`
  ADD PRIMARY KEY (`c_section_Id`);

--
-- Indexes for table `datesheet`
--
ALTER TABLE `datesheet`
  ADD PRIMARY KEY (`dsheet_Id`),
  ADD KEY `fkdsheetexam_Id` (`exam_Id`),
  ADD KEY `fkdsheetclass_Id` (`cls_Id`),
  ADD KEY `fkdsheetsub_Id` (`sub_Id`),
  ADD KEY `fkdsheetemp_Id` (`emp_Id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`desig_Id`);

--
-- Indexes for table `diary`
--
ALTER TABLE `diary`
  ADD PRIMARY KEY (`pk_diary_Id`),
  ADD KEY `fk_diary_type` (`fk_diary_type_Id`);

--
-- Indexes for table `diary_type`
--
ALTER TABLE `diary_type`
  ADD PRIMARY KEY (`pk_diary_type_Id`);

--
-- Indexes for table `disable`
--
ALTER TABLE `disable`
  ADD PRIMARY KEY (`disable_Id`);

--
-- Indexes for table `discount_type`
--
ALTER TABLE `discount_type`
  ADD PRIMARY KEY (`dis_typ_Id`);

--
-- Indexes for table `domicile`
--
ALTER TABLE `domicile`
  ADD PRIMARY KEY (`dom_Id`);

--
-- Indexes for table `edu_department`
--
ALTER TABLE `edu_department`
  ADD PRIMARY KEY (`pk_reg_Id`);

--
-- Indexes for table `emergency_contact`
--
ALTER TABLE `emergency_contact`
  ADD PRIMARY KEY (`emer_cnt_Id`),
  ADD KEY `emer_relatoinfk` (`fk_emer_relat_Id`);

--
-- Indexes for table `employee_attendance`
--
ALTER TABLE `employee_attendance`
  ADD PRIMARY KEY (`emp_att_Id`),
  ADD KEY `employee_empfk` (`emp_Id`),
  ADD KEY `employee_attendance_typefk` (`att_typ_Id`);

--
-- Indexes for table `employee_contact`
--
ALTER TABLE `employee_contact`
  ADD PRIMARY KEY (`emp_cnt_Id`);

--
-- Indexes for table `employee_info`
--
ALTER TABLE `employee_info`
  ADD PRIMARY KEY (`emp_Id`),
  ADD UNIQUE KEY `emp_Cnic` (`emp_Cnic`),
  ADD UNIQUE KEY `emp_NTN` (`emp_NTN`),
  ADD KEY `employee_info_domfk` (`dom_Id`),
  ADD KEY `employee_info_nationfk` (`nation_Id`),
  ADD KEY `employee_info_subfk` (`sub_Id`),
  ADD KEY `employee_info_castfk` (`cast_Id`),
  ADD KEY `employee_info_bgfk` (`bg_Id`),
  ADD KEY `employee_info_relfk` (`relig_Id`),
  ADD KEY `employee_info_gndfk` (`gnd_Id`),
  ADD KEY `employee_info_disablefk` (`disable_Id`),
  ADD KEY `employee_info_emptypefk` (`emp_typ_Id`),
  ADD KEY `employee_info_cntfk` (`emp_cnt_Id`),
  ADD KEY `employee_info_emptfk` (`empt_Id`),
  ADD KEY `employee_info_emerfk` (`emer_cnt_Id`);

--
-- Indexes for table `employee_type`
--
ALTER TABLE `employee_type`
  ADD PRIMARY KEY (`emp_typ_Id`),
  ADD KEY `employee_type_desigfk` (`desig_Id`);

--
-- Indexes for table `employment_info`
--
ALTER TABLE `employment_info`
  ADD PRIMARY KEY (`empt_Id`);

--
-- Indexes for table `entity_type`
--
ALTER TABLE `entity_type`
  ADD PRIMARY KEY (`ent_typ_Id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examination`
--
ALTER TABLE `examination`
  ADD PRIMARY KEY (`exm_Id`),
  ADD UNIQUE KEY `b-univ_Regno` (`b-univ_Regno`),
  ADD KEY `examination_gradefk` (`grade_Id`),
  ADD KEY `examination_exmtypefk` (`exm_typ_Id`),
  ADD KEY `examination_subfk` (`sub_Id`),
  ADD KEY `examination_stdfk` (`std_Id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`exam_Id`),
  ADD UNIQUE KEY `exam_Id_2` (`exam_Id`),
  ADD KEY `exam_Id` (`exam_Id`),
  ADD KEY `exam_Id_3` (`exam_Id`);

--
-- Indexes for table `exam_paper`
--
ALTER TABLE `exam_paper`
  ADD PRIMARY KEY (`exampaper_Id`),
  ADD KEY `fkexam_Id` (`exam_Id`),
  ADD KEY `fkcls_Id` (`cls_Id`),
  ADD KEY `fksub_Id` (`sub_Id`);

--
-- Indexes for table `exam_type`
--
ALTER TABLE `exam_type`
  ADD PRIMARY KEY (`exm_typ_Id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fee`
--
ALTER TABLE `fee`
  ADD PRIMARY KEY (`fee_Id`),
  ADD KEY `fee_clsfk` (`cls_Id`);

--
-- Indexes for table `fee_schedule`
--
ALTER TABLE `fee_schedule`
  ADD PRIMARY KEY (`fee_sch_Id`);

--
-- Indexes for table `fine`
--
ALTER TABLE `fine`
  ADD PRIMARY KEY (`fine_Id`),
  ADD KEY `fine_clsfk` (`cls_Id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`gnd_Id`);

--
-- Indexes for table `general_entity`
--
ALTER TABLE `general_entity`
  ADD PRIMARY KEY (`gent_Code`),
  ADD KEY `general_entity_suppfk` (`supp_Id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`grade_Id`);

--
-- Indexes for table `grade_general`
--
ALTER TABLE `grade_general`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `last_school`
--
ALTER TABLE `last_school`
  ADD PRIMARY KEY (`lsch_Id`);

--
-- Indexes for table `library_entity`
--
ALTER TABLE `library_entity`
  ADD PRIMARY KEY (`lent_Code`),
  ADD KEY `library_entity_gentfk` (`gent_Code`),
  ADD KEY `library_entity_pubfk` (`pub_Id`),
  ADD KEY `library_entity_authfk` (`auth_Id`),
  ADD KEY `library_entity_editionfk` (`edition_Id`);

--
-- Indexes for table `library_floor`
--
ALTER TABLE `library_floor`
  ADD PRIMARY KEY (`floor_Id`),
  ADD KEY `library_floor_shelffk` (`shelf_Id`);

--
-- Indexes for table `library_info`
--
ALTER TABLE `library_info`
  ADD PRIMARY KEY (`library_Id`),
  ADD KEY `library_info_floorfk` (`floor_Id`),
  ADD KEY `library_info_lentfk` (`lent_Code`),
  ADD KEY `library_info_categfk` (`stat_categ_Id`),
  ADD KEY `library_info_pubfk` (`pub_Id`),
  ADD KEY `library_info_authfk` (`auth_Id`),
  ADD KEY `library_info_editionfk` (`edition_Id`),
  ADD KEY `library_info_suppfk` (`supp_Id`),
  ADD KEY `library_info_stdfk` (`std_Id`),
  ADD KEY `library_info_empfk` (`emp_Id`);

--
-- Indexes for table `library_rack`
--
ALTER TABLE `library_rack`
  ADD PRIMARY KEY (`rack_Id`);

--
-- Indexes for table `library_shelf`
--
ALTER TABLE `library_shelf`
  ADD PRIMARY KEY (`shelf_Id`),
  ADD KEY `library_shelf_rackfk` (`rack_Id`);

--
-- Indexes for table `marital_status`
--
ALTER TABLE `marital_status`
  ADD PRIMARY KEY (`pk_marital_id`);

--
-- Indexes for table `marks_obtain`
--
ALTER TABLE `marks_obtain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `nationality`
--
ALTER TABLE `nationality`
  ADD PRIMARY KEY (`nation_Id`);

--
-- Indexes for table `occupation`
--
ALTER TABLE `occupation`
  ADD PRIMARY KEY (`occup_Id`);

--
-- Indexes for table `parent_employer`
--
ALTER TABLE `parent_employer`
  ADD PRIMARY KEY (`pnt_empy_Id`);

--
-- Indexes for table `parent_info`
--
ALTER TABLE `parent_info`
  ADD PRIMARY KEY (`pnt_Id`),
  ADD KEY `parent_info_stdfk` (`std_Id`),
  ADD KEY `parent_info_gndfk` (`gnd_Id`),
  ADD KEY `parent_info_occupfk` (`occup_Id`),
  ADD KEY `parent_info_empyfk` (`pnt_empy_Id`),
  ADD KEY `parent_info_desigfk` (`desig_Id`),
  ADD KEY `parent_info_relatfk` (`fk_relat_Id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_mode`
--
ALTER TABLE `payment_mode`
  ADD PRIMARY KEY (`PM_Id`);

--
-- Indexes for table `pay_schedule`
--
ALTER TABLE `pay_schedule`
  ADD PRIMARY KEY (`pay_sch_Id`);

--
-- Indexes for table `periods`
--
ALTER TABLE `periods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `prev_experience`
--
ALTER TABLE `prev_experience`
  ADD PRIMARY KEY (`prev_exper_Id`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`pub_Id`);

--
-- Indexes for table `purchase_account`
--
ALTER TABLE `purchase_account`
  ADD PRIMARY KEY (`purch_Id`),
  ADD KEY `purchase_enttypfk` (`ent_typ_Id`),
  ADD KEY `purchase_gentfk` (`gent_Code`),
  ADD KEY `purchase_lentfk` (`lent_Code`),
  ADD KEY `purchase_PMfk` (`PM_Id`);

--
-- Indexes for table `relationship`
--
ALTER TABLE `relationship`
  ADD PRIMARY KEY (`pk_relat_Id`);

--
-- Indexes for table `religion`
--
ALTER TABLE `religion`
  ADD PRIMARY KEY (`relig_Id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `salary_account`
--
ALTER TABLE `salary_account`
  ADD PRIMARY KEY (`sal_Id`),
  ADD KEY `salary_account_empfk` (`emp_Id`),
  ADD KEY `salary_account_PMfk` (`PM_Id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`pk_school_Id`),
  ADD KEY `board_fk` (`board_Id`);

--
-- Indexes for table `school_section`
--
ALTER TABLE `school_section`
  ADD PRIMARY KEY (`sc_sec_Id`);

--
-- Indexes for table `setsubjectmarks`
--
ALTER TABLE `setsubjectmarks`
  ADD PRIMARY KEY (`submarks_Id`),
  ADD KEY `fksubmarksexam_Id` (`exam_Id`),
  ADD KEY `fksubmarkssub_Id` (`sub_Id`),
  ADD KEY `fksubmarkssec_Id` (`sc_sec_Id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_Id`);

--
-- Indexes for table `stationary_category`
--
ALTER TABLE `stationary_category`
  ADD PRIMARY KEY (`stat_categ_Id`);

--
-- Indexes for table `stationary_edition`
--
ALTER TABLE `stationary_edition`
  ADD PRIMARY KEY (`edition_Id`);

--
-- Indexes for table `student_account`
--
ALTER TABLE `student_account`
  ADD PRIMARY KEY (`std_acc_Id`),
  ADD KEY `student_account_distypefk` (`dis_typ_Id`),
  ADD KEY `student_account_feefk` (`fee_Id`),
  ADD KEY `student_account_stdfk` (`std_Id`),
  ADD KEY `student_account_finefk` (`fine_Id`);

--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`std_att_Id`),
  ADD KEY `student_attendance_typefk` (`att_typ_Id`),
  ADD KEY `student_stdfk` (`std_Id`),
  ADD KEY `student_clsattfk` (`cls_att_Id`);

--
-- Indexes for table `student_category`
--
ALTER TABLE `student_category`
  ADD PRIMARY KEY (`std_cat_Id`);

--
-- Indexes for table `student_contact`
--
ALTER TABLE `student_contact`
  ADD PRIMARY KEY (`pnt_cnt_Id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`std_Id`),
  ADD KEY `student_info_catfk` (`std_cat_Id`),
  ADD KEY `student_info_castfk` (`cast_Id`),
  ADD KEY `student_info_bgfk` (`bg_Id`),
  ADD KEY `student_info_relfk` (`relig_Id`),
  ADD KEY `student_info_nationfk` (`nation_Id`),
  ADD KEY `student_info_gndfk` (`gnd_Id`),
  ADD KEY `student_info_domfk` (`dom_Id`),
  ADD KEY `student_info_disablefk` (`disable_Id`),
  ADD KEY `student_info_emerfk` (`emer_cnt_Id`),
  ADD KEY `student_info_admfk` (`adm_No`),
  ADD KEY `student_info_clsfk` (`cls_Id`),
  ADD KEY `student_info_lschfk` (`lsch_Id`);

--
-- Indexes for table `study_material`
--
ALTER TABLE `study_material`
  ADD PRIMARY KEY (`pk_study_material_Id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_Id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supp_Id`);

--
-- Indexes for table `syllabus`
--
ALTER TABLE `syllabus`
  ADD PRIMARY KEY (`syllabus_Id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`tr_Id`);

--
-- Indexes for table `university_list`
--
ALTER TABLE `university_list`
  ADD PRIMARY KEY (`univ_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`user_type_Id`);

--
-- Indexes for table `withdrawl_student`
--
ALTER TABLE `withdrawl_student`
  ADD PRIMARY KEY (`with_Id`),
  ADD KEY `withdrawl_student_stdfk` (`std_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_qualification`
--
ALTER TABLE `academic_qualification`
  MODIFY `acdm_qual_Id` bigint(10) NOT NULL AUTO_INCREMENT COMMENT 'Academic Qualification''s ID', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `account_type`
--
ALTER TABLE `account_type`
  MODIFY `acc_type_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `adm_No` bigint(100) NOT NULL AUTO_INCREMENT COMMENT 'Admission number of student', AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `advance_salary`
--
ALTER TABLE `advance_salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `attendance_type`
--
ALTER TABLE `attendance_type`
  MODIFY `att_typ_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Attendance type''s ID', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attendence`
--
ALTER TABLE `attendence`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `auth_Id` bigint(10) NOT NULL AUTO_INCREMENT COMMENT 'Author ID', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blood_group`
--
ALTER TABLE `blood_group`
  MODIFY `bg_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Blood Group ID', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `boards`
--
ALTER TABLE `boards`
  MODIFY `pk_board_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Board ID', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cast`
--
ALTER TABLE `cast`
  MODIFY `cast_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Cast ID', AUTO_INCREMENT=358;

--
-- AUTO_INCREMENT for table `chartofaccounts`
--
ALTER TABLE `chartofaccounts`
  MODIFY `acc_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `pk_city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=544;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `cls_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Class Id', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `classsched`
--
ALTER TABLE `classsched`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `classsched_days`
--
ALTER TABLE `classsched_days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `classwise_achievement`
--
ALTER TABLE `classwise_achievement`
  MODIFY `id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `classwise_attendace`
--
ALTER TABLE `classwise_attendace`
  MODIFY `cls_att_Id` bigint(100) NOT NULL AUTO_INCREMENT COMMENT 'Classwise Attendance ID', AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `classwise_behaviour`
--
ALTER TABLE `classwise_behaviour`
  MODIFY `id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `class_section`
--
ALTER TABLE `class_section`
  MODIFY `c_section_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Section ID', AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `datesheet`
--
ALTER TABLE `datesheet`
  MODIFY `dsheet_Id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `desig_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Designation ID', AUTO_INCREMENT=965;

--
-- AUTO_INCREMENT for table `diary`
--
ALTER TABLE `diary`
  MODIFY `pk_diary_Id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'diary ID', AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `diary_type`
--
ALTER TABLE `diary_type`
  MODIFY `pk_diary_type_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Diary type ID', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `disable`
--
ALTER TABLE `disable`
  MODIFY `disable_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Disable ID', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `discount_type`
--
ALTER TABLE `discount_type`
  MODIFY `dis_typ_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Discount Type ID';

--
-- AUTO_INCREMENT for table `domicile`
--
ALTER TABLE `domicile`
  MODIFY `dom_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Domicile ID', AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `edu_department`
--
ALTER TABLE `edu_department`
  MODIFY `pk_reg_Id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'REgistration Id';

--
-- AUTO_INCREMENT for table `emergency_contact`
--
ALTER TABLE `emergency_contact`
  MODIFY `emer_cnt_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Student Emergency ID', AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `employee_attendance`
--
ALTER TABLE `employee_attendance`
  MODIFY `emp_att_Id` bigint(100) NOT NULL AUTO_INCREMENT COMMENT 'Employee Attendance ID';

--
-- AUTO_INCREMENT for table `employee_contact`
--
ALTER TABLE `employee_contact`
  MODIFY `emp_cnt_Id` bigint(10) NOT NULL AUTO_INCREMENT COMMENT 'Employee contact table Id', AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `employee_info`
--
ALTER TABLE `employee_info`
  MODIFY `emp_Id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Employee ID', AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `employee_type`
--
ALTER TABLE `employee_type`
  MODIFY `emp_typ_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Employee type''s ID', AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `employment_info`
--
ALTER TABLE `employment_info`
  MODIFY `empt_Id` bigint(10) NOT NULL AUTO_INCREMENT COMMENT 'Employment table ID', AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `entity_type`
--
ALTER TABLE `entity_type`
  MODIFY `ent_typ_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Entity Type ID', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `examination`
--
ALTER TABLE `examination`
  MODIFY `exm_Id` bigint(100) NOT NULL AUTO_INCREMENT COMMENT 'Exam ID';

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `exam_Id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `exam_paper`
--
ALTER TABLE `exam_paper`
  MODIFY `exampaper_Id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `exam_type`
--
ALTER TABLE `exam_type`
  MODIFY `exm_typ_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Exam Type''s ID', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee`
--
ALTER TABLE `fee`
  MODIFY `fee_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Fee ID';

--
-- AUTO_INCREMENT for table `fee_schedule`
--
ALTER TABLE `fee_schedule`
  MODIFY `fee_sch_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'PK', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `gnd_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Gender ID', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `general_entity`
--
ALTER TABLE `general_entity`
  MODIFY `gent_Code` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'General Enity Code', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `grade_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Grade ID', AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `grade_general`
--
ALTER TABLE `grade_general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `last_school`
--
ALTER TABLE `last_school`
  MODIFY `lsch_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Last school Id', AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `library_entity`
--
ALTER TABLE `library_entity`
  MODIFY `lent_Code` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Library Entity Code', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `library_floor`
--
ALTER TABLE `library_floor`
  MODIFY `floor_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Library Floor ID', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `library_info`
--
ALTER TABLE `library_info`
  MODIFY `library_Id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Stationary ID', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `library_rack`
--
ALTER TABLE `library_rack`
  MODIFY `rack_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Library Shelf Rack ID', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `library_shelf`
--
ALTER TABLE `library_shelf`
  MODIFY `shelf_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Library Shelf ID', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `marital_status`
--
ALTER TABLE `marital_status`
  MODIFY `pk_marital_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `marks_obtain`
--
ALTER TABLE `marks_obtain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nationality`
--
ALTER TABLE `nationality`
  MODIFY `nation_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Nationality ID', AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT for table `occupation`
--
ALTER TABLE `occupation`
  MODIFY `occup_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Occupation ID', AUTO_INCREMENT=1156;

--
-- AUTO_INCREMENT for table `parent_info`
--
ALTER TABLE `parent_info`
  MODIFY `pnt_Id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Parent ID', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payment_mode`
--
ALTER TABLE `payment_mode`
  MODIFY `PM_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Payment Mode ID';

--
-- AUTO_INCREMENT for table `pay_schedule`
--
ALTER TABLE `pay_schedule`
  MODIFY `pay_sch_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'PK', AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `periods`
--
ALTER TABLE `periods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `prev_experience`
--
ALTER TABLE `prev_experience`
  MODIFY `prev_exper_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Prev Experience ID', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `pub_Id` bigint(10) NOT NULL AUTO_INCREMENT COMMENT 'Publisher ID', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchase_account`
--
ALTER TABLE `purchase_account`
  MODIFY `purch_Id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Purchase ID';

--
-- AUTO_INCREMENT for table `relationship`
--
ALTER TABLE `relationship`
  MODIFY `pk_relat_Id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'Relationship ID', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `religion`
--
ALTER TABLE `religion`
  MODIFY `relig_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Religion ID', AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `salary_account`
--
ALTER TABLE `salary_account`
  MODIFY `sal_Id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Salary ID';

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `pk_school_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'School ID', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `school_section`
--
ALTER TABLE `school_section`
  MODIFY `sc_sec_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `setsubjectmarks`
--
ALTER TABLE `setsubjectmarks`
  MODIFY `submarks_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `stationary_category`
--
ALTER TABLE `stationary_category`
  MODIFY `stat_categ_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Stationary category ID', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stationary_edition`
--
ALTER TABLE `stationary_edition`
  MODIFY `edition_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Book edition ID', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student_account`
--
ALTER TABLE `student_account`
  MODIFY `std_acc_Id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Student Account ID';

--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `std_att_Id` bigint(100) NOT NULL AUTO_INCREMENT COMMENT 'Student Attendance ID';

--
-- AUTO_INCREMENT for table `student_category`
--
ALTER TABLE `student_category`
  MODIFY `std_cat_Id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'Category ID', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_contact`
--
ALTER TABLE `student_contact`
  MODIFY `pnt_cnt_Id` bigint(10) NOT NULL AUTO_INCREMENT COMMENT 'parent contact table id', AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `std_Id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'This is the student''s ID that will be used in Admission No as well', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `study_material`
--
ALTER TABLE `study_material`
  MODIFY `pk_study_material_Id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Study material ID', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `sub_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Subject''s ID', AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supp_Id` bigint(10) NOT NULL AUTO_INCREMENT COMMENT 'Supplier ID', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `syllabus`
--
ALTER TABLE `syllabus`
  MODIFY `syllabus_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `tr_Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `university_list`
--
ALTER TABLE `university_list`
  MODIFY `univ_Id` bigint(10) NOT NULL AUTO_INCREMENT COMMENT 'EducationLevel ID', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `user_type_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `withdrawl_student`
--
ALTER TABLE `withdrawl_student`
  MODIFY `with_Id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Withdrawl ID', AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chartofaccounts`
--
ALTER TABLE `chartofaccounts`
  ADD CONSTRAINT `acctypeid` FOREIGN KEY (`acc_type_Id`) REFERENCES `account_type` (`acc_type_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `foreign key dom id` FOREIGN KEY (`dom_id`) REFERENCES `domicile` (`dom_Id`);

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_subfk` FOREIGN KEY (`sub_Id`) REFERENCES `subject` (`sub_Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `class-rep`
--
ALTER TABLE `class-rep`
  ADD CONSTRAINT `std_fk` FOREIGN KEY (`std_Id`) REFERENCES `student_info` (`std_cat_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `classsched_days`
--
ALTER TABLE `classsched_days`
  ADD CONSTRAINT `fk_schudle` FOREIGN KEY (`classsched_id`) REFERENCES `classsched` (`id`);

--
-- Constraints for table `classwise_attendace`
--
ALTER TABLE `classwise_attendace`
  ADD CONSTRAINT `classwise_attendace_atttypefk` FOREIGN KEY (`att_typ_Id`) REFERENCES `attendance_type` (`att_typ_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `classwise_attendace_clsfk` FOREIGN KEY (`cls_Id`) REFERENCES `class` (`cls_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `classwise_attendace_subfk` FOREIGN KEY (`sub_Id`) REFERENCES `subject` (`sub_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `datesheet`
--
ALTER TABLE `datesheet`
  ADD CONSTRAINT `fkdsheetclass_Id` FOREIGN KEY (`cls_Id`) REFERENCES `class` (`cls_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkdsheetemp_Id` FOREIGN KEY (`emp_Id`) REFERENCES `employee_info` (`emp_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkdsheetexam_Id` FOREIGN KEY (`exam_Id`) REFERENCES `exams` (`exam_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkdsheetsub_Id` FOREIGN KEY (`sub_Id`) REFERENCES `subject` (`sub_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `diary`
--
ALTER TABLE `diary`
  ADD CONSTRAINT `fk_diary_type` FOREIGN KEY (`fk_diary_type_Id`) REFERENCES `diary_type` (`pk_diary_type_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `emergency_contact`
--
ALTER TABLE `emergency_contact`
  ADD CONSTRAINT `emer_relatoinfk` FOREIGN KEY (`fk_emer_relat_Id`) REFERENCES `relationship` (`pk_relat_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_attendance`
--
ALTER TABLE `employee_attendance`
  ADD CONSTRAINT `employee_attendance_typefk` FOREIGN KEY (`att_typ_Id`) REFERENCES `attendance_type` (`att_typ_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_empfk` FOREIGN KEY (`emp_Id`) REFERENCES `employee_info` (`emp_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_info`
--
ALTER TABLE `employee_info`
  ADD CONSTRAINT `employee_info_bgfk` FOREIGN KEY (`bg_Id`) REFERENCES `blood_group` (`bg_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_info_castfk` FOREIGN KEY (`cast_Id`) REFERENCES `cast` (`cast_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_info_cntfk` FOREIGN KEY (`emp_cnt_Id`) REFERENCES `employee_contact` (`emp_cnt_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_info_disablefk` FOREIGN KEY (`disable_Id`) REFERENCES `disable` (`disable_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_info_domfk` FOREIGN KEY (`dom_Id`) REFERENCES `domicile` (`dom_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_info_emerfk` FOREIGN KEY (`emer_cnt_Id`) REFERENCES `emergency_contact` (`emer_cnt_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_info_emptfk` FOREIGN KEY (`empt_Id`) REFERENCES `employment_info` (`empt_Id`),
  ADD CONSTRAINT `employee_info_gndfk` FOREIGN KEY (`gnd_Id`) REFERENCES `gender` (`gnd_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_info_nationfk` FOREIGN KEY (`nation_Id`) REFERENCES `nationality` (`nation_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_info_religfk` FOREIGN KEY (`relig_Id`) REFERENCES `religion` (`relig_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_info_subfk` FOREIGN KEY (`sub_Id`) REFERENCES `subject` (`sub_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_type`
--
ALTER TABLE `employee_type`
  ADD CONSTRAINT `employee_type_desigfk` FOREIGN KEY (`desig_Id`) REFERENCES `designation` (`desig_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `examination`
--
ALTER TABLE `examination`
  ADD CONSTRAINT `examination_stdfk` FOREIGN KEY (`std_Id`) REFERENCES `student_info` (`std_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `examination_subfk` FOREIGN KEY (`sub_Id`) REFERENCES `subject` (`sub_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exam_paper`
--
ALTER TABLE `exam_paper`
  ADD CONSTRAINT `fkcls_Id` FOREIGN KEY (`cls_Id`) REFERENCES `class` (`cls_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkexam_Id` FOREIGN KEY (`exam_Id`) REFERENCES `exams` (`exam_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fksub_Id` FOREIGN KEY (`sub_Id`) REFERENCES `subject` (`sub_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fee`
--
ALTER TABLE `fee`
  ADD CONSTRAINT `fee_clsfk` FOREIGN KEY (`cls_Id`) REFERENCES `class` (`cls_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fine`
--
ALTER TABLE `fine`
  ADD CONSTRAINT `fine_clsfk` FOREIGN KEY (`cls_Id`) REFERENCES `class` (`cls_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `general_entity`
--
ALTER TABLE `general_entity`
  ADD CONSTRAINT `general_entity_suppfk` FOREIGN KEY (`supp_Id`) REFERENCES `supplier` (`supp_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `library_entity`
--
ALTER TABLE `library_entity`
  ADD CONSTRAINT `library_entity_authfk` FOREIGN KEY (`auth_Id`) REFERENCES `author` (`auth_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `library_entity_editionfk` FOREIGN KEY (`edition_Id`) REFERENCES `stationary_edition` (`edition_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `library_entity_gentfk` FOREIGN KEY (`gent_Code`) REFERENCES `general_entity` (`gent_Code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `library_entity_pubfk` FOREIGN KEY (`pub_Id`) REFERENCES `publisher` (`pub_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `library_floor`
--
ALTER TABLE `library_floor`
  ADD CONSTRAINT `library_floor_shelffk` FOREIGN KEY (`shelf_Id`) REFERENCES `library_shelf` (`shelf_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `library_info`
--
ALTER TABLE `library_info`
  ADD CONSTRAINT `library_info_authfk` FOREIGN KEY (`auth_Id`) REFERENCES `author` (`auth_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `library_info_categfk` FOREIGN KEY (`stat_categ_Id`) REFERENCES `stationary_category` (`stat_categ_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `library_info_editionfk` FOREIGN KEY (`edition_Id`) REFERENCES `stationary_edition` (`edition_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `library_info_empfk` FOREIGN KEY (`emp_Id`) REFERENCES `employee_info` (`emp_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `library_info_floorfk` FOREIGN KEY (`floor_Id`) REFERENCES `library_floor` (`floor_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `library_info_lentfk` FOREIGN KEY (`lent_Code`) REFERENCES `library_entity` (`lent_Code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `library_info_pubfk` FOREIGN KEY (`pub_Id`) REFERENCES `publisher` (`pub_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `library_info_stdfk` FOREIGN KEY (`std_Id`) REFERENCES `student_info` (`std_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `library_info_suppfk` FOREIGN KEY (`supp_Id`) REFERENCES `supplier` (`supp_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `library_shelf`
--
ALTER TABLE `library_shelf`
  ADD CONSTRAINT `library_shelf_rackfk` FOREIGN KEY (`rack_Id`) REFERENCES `library_rack` (`rack_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `parent_info`
--
ALTER TABLE `parent_info`
  ADD CONSTRAINT `parent_info_desigfk` FOREIGN KEY (`desig_Id`) REFERENCES `designation` (`desig_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parent_info_empyfk` FOREIGN KEY (`pnt_empy_Id`) REFERENCES `parent_employer` (`pnt_empy_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parent_info_gndfk` FOREIGN KEY (`gnd_Id`) REFERENCES `gender` (`gnd_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parent_info_occupfk` FOREIGN KEY (`occup_Id`) REFERENCES `occupation` (`occup_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parent_info_relatfk` FOREIGN KEY (`fk_relat_Id`) REFERENCES `relationship` (`pk_relat_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parent_info_stdfk` FOREIGN KEY (`std_Id`) REFERENCES `student_info` (`std_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchase_account`
--
ALTER TABLE `purchase_account`
  ADD CONSTRAINT `purchase_PMfk` FOREIGN KEY (`PM_Id`) REFERENCES `payment_mode` (`PM_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_enttypfk` FOREIGN KEY (`ent_typ_Id`) REFERENCES `entity_type` (`ent_typ_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_gentfk` FOREIGN KEY (`gent_Code`) REFERENCES `general_entity` (`gent_Code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_lentfk` FOREIGN KEY (`lent_Code`) REFERENCES `library_entity` (`lent_Code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `salary_account`
--
ALTER TABLE `salary_account`
  ADD CONSTRAINT `salary_account_PMfk` FOREIGN KEY (`PM_Id`) REFERENCES `payment_mode` (`PM_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `salary_account_empfk` FOREIGN KEY (`emp_Id`) REFERENCES `employee_info` (`emp_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schools`
--
ALTER TABLE `schools`
  ADD CONSTRAINT `board_fk` FOREIGN KEY (`board_Id`) REFERENCES `boards` (`pk_board_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_account`
--
ALTER TABLE `student_account`
  ADD CONSTRAINT `student_account_distypefk` FOREIGN KEY (`dis_typ_Id`) REFERENCES `discount_type` (`dis_typ_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_account_feefk` FOREIGN KEY (`fee_Id`) REFERENCES `fee` (`fee_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_account_finefk` FOREIGN KEY (`fine_Id`) REFERENCES `fine` (`fine_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_account_stdfk` FOREIGN KEY (`std_Id`) REFERENCES `student_info` (`std_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD CONSTRAINT `student_attendance_typefk` FOREIGN KEY (`att_typ_Id`) REFERENCES `attendance_type` (`att_typ_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_clsattfk` FOREIGN KEY (`cls_att_Id`) REFERENCES `classwise_attendace` (`cls_att_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_stdfk` FOREIGN KEY (`std_Id`) REFERENCES `student_info` (`std_Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
