-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2022 at 08:25 PM
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
  `univ_Id` bigint(10) DEFAULT NULL COMMENT 'Qualification''s University',
  `sub_Id` int(10) DEFAULT NULL COMMENT 'Subject of Academic Qualification',
  `session` varchar(255) DEFAULT NULL COMMENT 'Passing Year of degree',
  `grade_Id` int(10) DEFAULT NULL COMMENT 'Grade of qualification',
  `acdm_Gpa` varchar(255) DEFAULT NULL COMMENT 'GPA of Applicant',
  `user_id` int(11) DEFAULT NULL,
  `type` enum('1','2') NOT NULL DEFAULT '1' COMMENT '1= acedmic , 2=professional',
  `degree_file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `academic_qualification`
--

INSERT INTO `academic_qualification` (`acdm_qual_Id`, `title`, `univ_Id`, `sub_Id`, `session`, `grade_Id`, `acdm_Gpa`, `user_id`, `type`, `degree_file`) VALUES
(24, 'BA English', 4, 11, '2018', 4, '2.83', 125, '1', NULL),
(25, 'Ms English', 4, 0, '2020', 0, '', 125, '2', NULL),
(26, 'General Science', 1, 16, '2004', 4, '70%', 231, '1', NULL),
(27, 'MS Computer Science', 1, 0, '2006-2010', 0, '', 231, '2', NULL),
(28, 'BS English', 2, 11, '2016-2020', 4, '3.89', 232, '1', NULL),
(29, 'Spoken Language( Tuffle)', 2, 0, '2021', 0, '', 232, '2', NULL),
(30, 'BS Art', 2, 14, '2016-2020', 4, '3.88', 233, '1', NULL),
(31, 'Drama Artist', 2, 0, '2021', 0, '', 233, '2', NULL),
(32, 'Pre-engineering', 2, 10, '2014-2016', 4, '89%', 234, '1', NULL),
(33, 'BS Chemistery', 2, 0, '2016-2020', 0, '', 234, '2', NULL),
(34, 'Geo Graphy', 4, 8, '2014-2016', 4, '3.85', 235, '1', NULL),
(35, 'MS Geography', 4, 0, '2016-2020', 0, '', 235, '2', NULL),
(36, 'Science', 1, 11, '2016-2020', 4, '3.7', 236, '1', NULL),
(37, 'English', 6, 11, '2016-2020', 4, '3.78', 236, '1', NULL),
(38, 'Science', 6, 11, '2016-2020', 4, '3.7', 237, '1', NULL),
(39, 'Intensive Spoken English Course', 6, 0, '2020', 0, '', 237, '2', NULL),
(40, 'Science', 1, 11, '2012-2016', 4, '3.7', 238, '1', NULL),
(41, 'Judge Advocate General', 4, 0, '2017-2021', 0, '', 238, '2', NULL),
(42, 'Communication skills', 4, 0, '2021', 0, '', 236, '2', NULL),
(43, 'BS Economics', 6, 17, '2017-2021', 4, '3.75', 239, '1', NULL),
(44, 'science', 6, 14, '20005-2006', 5, '3.21', 240, '1', NULL),
(45, 'Fsc', 1, 8, '2006-2008', 3, '3.9', 240, '1', NULL),
(46, 'pre Engineering', 2, 0, '2009-2010', 0, '', 240, '2', NULL),
(47, 'Science', 1, 0, '2012-2014', 0, '', 241, '2', NULL),
(48, 'Pre medical', 7, 15, '2014-2018', 4, '3.82', 243, '1', NULL),
(49, 'Mechanical Engineer', 2, 8, '2016-2020', 4, '3.81', 244, '1', NULL),
(50, 'BS economics', 1, 17, '2016-2020', 4, '3.92', 246, '1', NULL),
(51, 'Bs English', 4, 11, '2014-2018', 4, '3.86', 249, '1', NULL),
(52, 'MS English', 4, 0, '2018-2020', 0, '', 249, '2', NULL),
(53, 'SSC', 1, 18, '2004', 5, '66%', 256, '1', NULL),
(54, 'HSSC', 1, 13, '2006', 6, '54%', 256, '1', NULL),
(55, 'BCS', 8, 16, '2010', 5, '68%', 256, '1', NULL),
(56, 'Post Dr', 8, 16, '2015', 3, '70', 256, '1', NULL),
(57, 'DAE', 1, 0, '2011', 0, '', 256, '2', NULL),
(58, 'BCS', 8, 16, '2015', 5, '3.5', 257, '1', NULL),
(59, 'HSSC', 1, 16, '2011', 5, '66%', 257, '1', NULL),
(60, 'SSC', 1, 18, '2009', 5, '70%', 257, '1', NULL),
(61, 'DAE', 1, 0, '2015', 0, '', 257, '2', NULL),
(62, 'MCS', 8, 16, '2015', 5, '68%', 258, '1', NULL),
(63, 'HSSC', 2, 16, '2011', 4, '75%', 258, '1', NULL),
(64, 'SSC', 2, 18, '2009', 3, '85%', 258, '1', NULL),
(65, 'MS Office', 1, 0, '2015', 0, '', 258, '2', NULL),
(66, 'Matric', 1, 18, '2004', 5, '66%', 259, '1', '1647352289.file (29).pdf'),
(67, 'FSC', 1, 13, '2006', 6, '54%', 259, '1', '1647352289.file (30).pdf'),
(68, 'BCS', 8, 16, '2010', 5, '68%', 259, '1', '1647352289.file (31).pdf'),
(69, 'PHD', 8, 16, '2015', 4, '75', 259, '1', '1647411602.file (32).pdf'),
(70, 'DAE', 1, 0, '2011', 0, '', 259, '2', '1647411506.file.pdf'),
(71, 'Matric', 1, 18, '2004', 5, '66%', 263, '1', NULL),
(72, 'FSc', 1, 13, '2006', 6, '54%', 263, '1', NULL),
(73, 'Bsc', 8, 16, '2010', 5, '68%', 263, '1', NULL),
(74, 'CCNA', 8, 0, '2015', 0, '', 263, '2', NULL),
(75, 'Matric', 1, 18, '2004', 5, '66', 266, '1', NULL),
(76, 'FSc', 1, 13, '2006', 6, '2006', 266, '1', NULL),
(77, 'BSc', 8, 16, '2010', 5, '68', 266, '1', NULL),
(78, 'MCSE', 8, 0, '2009', 0, '', 266, '2', NULL),
(79, 'Matric', 1, 18, '2004', 5, '66', 269, '1', '1647425772.Matric Original.jpg'),
(80, 'FSc', 1, 13, '2006', 6, '2006', 269, '1', '1647425772.FSC Certificate.jpg'),
(81, 'BSc', 8, 16, '2010', 5, '68', 269, '1', '1647425772.BCS Degree.jpg'),
(82, 'MCSE', 8, 0, '2009', 0, '', 269, '2', '1647425772.MCSE Certificate.jpg'),
(83, 'Matric', 1, 18, '2001', 3, '67%', 270, '1', '1647427284.file (1).pdf'),
(84, 'Fsc Pre Engineering', 1, 13, '2003', 4, '75', 270, '1', '1647427284.file (2).pdf'),
(85, 'BS', 8, 16, '2007', 4, '80', 270, '1', '1647427284.file (3).pdf'),
(86, 'MS World', 8, 0, '2011', 0, '', 270, '2', '1647427284.file (4).pdf'),
(87, 'Matric', 1, 18, '2004', 5, '66%', 264, '1', '1649073281.dadada.pdf'),
(88, 'CCNA', 1, 0, '2010', 0, '', 264, '2', '1649073281.dadada.pdf');

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
(1, 'ADM-APS-2022-1', '2018-06-27', '2018-2019', '1230987', '09812376523467'),
(2, 'ADM-APS-2022-2', '2022-01-24', '2022-2023', NULL, '3432365474574'),
(3, 'ADM-APS-2022-3', '2022-01-25', '2022-2023', 'REG-APS-1233', '999888777'),
(4, 'ADM-APS-2022-4', '2022-01-24', '2022-2023', '1232323123', '12345678'),
(5, 'ADM-APS-2022-5', '2022-01-24', '2022-2023', 'REG-APS-1234', '474747001'),
(6, 'ADM-APS-2022-6', '2022-01-24', '2022-2023', NULL, '657658548664725315'),
(7, 'ADM-APS-2022-7', '2022-01-24', '2022-2023', '34343434', '45454545'),
(8, 'ADM-APS-2022-8', '2022-01-24', '2022-2023', 'ADM-PSD-1234', '12345654323'),
(9, 'ADM-APS-2022-9', '2022-01-24', '2022-2023', 'ADM-APS-2023', '45454545222'),
(10, 'ADM-APS-2022-10', '2022-01-25', '2022-2023', 'REG-APS-1233', '1420385549146'),
(11, 'ADM-APS-2022-11', '2022-01-18', '2022-2023', 'REG-APS-1234', '1420385549213'),
(12, 'ADM-APS-2022-12', '2021-02-16', '2021-2022', 'REG-APS-1343', '12324654635'),
(13, 'ADM-APS-2022-13', '2019-03-07', '2019-2020', 'REG-APS-1235', '13234565346798'),
(14, 'ADM-APS-2022-14', '2021-06-15', '2021-2022', 'REG-APS-12333', '72345434657689'),
(15, 'ADM-APS-2022-15', '2020-03-05', '2020-2021', 'REG-APS-1236', '988989877245'),
(16, 'ADM-APS-2022-16', '2020-04-04', '2020-2021', 'REG-APS-1237', '768909874563'),
(17, 'ADM-APS-2022-17', '2021-06-23', '2021-2022', 'REG-APS-1238', '1543789078'),
(18, 'ADM-APS-2022-18', '2021-06-14', '2021-2022', '122122', '14202002222'),
(19, 'ADM-APS-2022-19', '2021-11-25', '2021-2022', 'REG-APS-1239', '1234356787654'),
(20, 'ADM-APS-2022-20', '2019-01-01', '2019-2020', 'REG-APS-1240', '113487594109'),
(21, 'ADM-APS-2022-21', '2022-01-25', '2022-2023', 'REG-APS-12341', '225239617354'),
(22, 'ADM-APS-2022-22', '2022-01-04', '2022-2023', 'REG-APS-1242', '6615439845'),
(23, 'ADM-APS-2022-23', '2022-01-26', '2022-2023', '324244343', '142020289485'),
(24, 'ADM-APS-2022-24', '2022-01-26', '2022-2023', '#233432334', '1420202545445'),
(25, 'ADM-APS-2022-25', '2022-01-26', '2022-2023', '#45455', '142035656565656'),
(26, 'ADM-APS-2022-26', '2022-01-26', '2022-2023', '#0156651', '1430389568695'),
(27, 'ADM-APS-2022-27', '2022-01-26', '2022-2023', NULL, '436432634264663'),
(28, 'ADM-APS-2022-28', '2022-01-26', '2022-2023', '#02022343', '1422103434434'),
(29, 'ADM-APS-2022-29', '2022-01-21', '2022-2023', '#0122213', '1450345545855'),
(30, 'ADM-APS-2022-30', '2022-01-26', '2022-2023', '10004334', '1452103434334'),
(31, 'ADM-APS-2022-31', '2022-01-26', '2022-2023', '100098', '1432245589594'),
(32, 'ADM-APS-2022-32', '2022-01-26', '2022-2023', '100788', '142038554988'),
(33, 'ADM-APS-2022-33', '2022-01-26', '2022-2023', '100089', '1420385549434'),
(34, 'ADM-APS-2022-34', '2022-01-26', '2022-2023', '100099', '1420385549881'),
(35, 'ADM-APS-2022-35', '2022-01-26', '2022-2023', '100077', '1420383432288'),
(36, 'ADM-APS-2022-36', '2022-01-26', '2022-2023', '100067', '142038555444988'),
(37, 'ADM-APS-2022-37', '2022-01-26', '2022-2023', '100066', '14203811343225'),
(38, 'ADM-APS-2022-38', '2022-01-26', '2022-2023', '100081', '142038112088'),
(39, 'ADM-APS-2022-39', '2022-01-26', '2022-2023', '100077', '145023132344'),
(40, 'ADM-APS-2022-40', '2022-01-26', '2022-2023', '100072', '1420385003224'),
(41, 'ADM-APS-2022-41', '2022-01-26', '2022-2023', '100023', '143013233441188'),
(42, 'ADM-APS-2022-42', '2022-01-26', '2022-2023', '100034', '14203767555555'),
(43, 'ADM-APS-2022-43', '2022-01-26', '2022-2023', '1000657', '14312354554554'),
(44, 'ADM-APS-2022-44', '2022-01-26', '2022-2023', '100012', '1440230045849'),
(45, 'ADM-APS-2022-45', '2022-01-26', '2022-2023', '100012', '1440123456559'),
(46, 'ADM-APS-2022-46', '2022-01-26', '2022-2023', '45565656', '14332566767'),
(47, 'ADM-APS-2022-47', '2022-01-26', '2022-2023', '100024', '1420226776765'),
(48, 'ADM-APS-2022-48', '2022-01-26', '2022-2023', '100035', '142038006988'),
(49, 'ADM-APS-2022-49', '2022-01-26', '2022-2023', NULL, '73987325233636'),
(50, 'ADM-APS-2022-50', '2022-01-26', '2022-2023', '100056', '142038500023'),
(51, 'ADM-APS-2022-51', '2022-01-26', '2022-2023', '45565656', '144032548984'),
(52, 'ADM-APS-2022-52', '2022-01-26', '2022-2023', '3434343', '14503655656565'),
(53, 'ADM-APS-2022-53', '2022-01-26', '2022-2023', '564454', '14203855000054'),
(54, 'ADM-APS-2022-54', '2022-01-26', '2022-2023', NULL, '9870987654322'),
(55, 'ADM-APS-2022-55', '2022-01-26', '2022-2023', NULL, '78998654651323'),
(56, 'ADM-APS-2022-56', '2022-01-26', '2022-2023', NULL, '656534656432232'),
(57, 'ADM-APS-2022-57', '2022-01-26', '2022-2023', '45545', '14503334883'),
(58, 'ADM-APS-2022-58', '2022-02-02', '2022-2023', NULL, '4373563465798'),
(59, 'ADM-APS-2022-59', '2022-01-26', '2022-2023', '54454345', '1430544859458'),
(60, 'ADM-APS-2022-60', '2022-01-26', '2022-2023', NULL, '54647355367657'),
(61, 'ADM-APS-2022-61', '2022-01-26', '2022-2023', '4545545', '1420385000988'),
(62, 'ADM-APS-2022-62', '2022-01-26', '2022-2023', NULL, '665856856858'),
(63, 'ADM-APS-2022-63', '2022-01-26', '2022-2023', '565665', '1420300967644'),
(64, 'ADM-APS-2022-64', '2022-01-26', '2022-2023', NULL, '464543576435745'),
(65, 'ADM-APS-2022-65', '2022-01-27', '2022-2023', NULL, '645756865856'),
(66, 'ADM-APS-2022-66', '2022-01-27', '2022-2023', NULL, '545645745743342'),
(67, 'ADM-APS-2022-67', '2022-01-27', '2022-2023', NULL, '23401123456789'),
(68, 'ADM-APS-2022-68', '2022-01-27', '2022-2023', NULL, '23401741854789'),
(69, 'ADM-APS-2022-69', '2022-01-27', '2022-2023', NULL, '23401985632478'),
(70, 'ADM-APS-2022-70', '2022-01-27', '2022-2023', NULL, '25401936364328'),
(71, 'ADM-APS-2022-71', '2022-01-27', '2022-2023', NULL, '25401321456987'),
(72, 'ADM-APS-2022-72', '2022-01-27', '2022-2023', NULL, '26401232115648'),
(73, 'ADM-APS-2022-73', '2022-01-27', '2022-2023', NULL, '26401325569774'),
(74, 'ADM-APS-2022-74', '2022-01-27', '2022-2023', NULL, '2640188524698'),
(75, 'ADM-APS-2022-75', '2022-01-27', '2022-2023', NULL, '26501564236587'),
(76, 'ADM-APS-2022-76', '2022-01-27', '2022-2023', NULL, '413015469871254'),
(77, 'ADM-APS-2022-77', '2022-01-27', '2022-2023', NULL, '1430256132897465'),
(78, 'ADM-APS-2022-78', '2022-02-21', '2022-2023', NULL, '543563247857435'),
(79, 'ADM-APS-2022-79', '2022-02-21', '2022-2023', NULL, '78311324564978'),
(80, 'ADM-APS-2022-80', '2022-03-14', '2022-2023', NULL, '1420613131414156'),
(86, 'ADM-APS-2022-86', '2022-03-25', '2022-2023', NULL, '97348283473249823'),
(87, 'ADM-APS-2022-87', '2022-03-25', '2022-2023', NULL, '63422632463422632'),
(88, 'ADM-APS-2022-88', '2022-03-25', '2022-2023', NULL, '44124214214214424'),
(89, 'ADM-APS-2022-89', '2022-04-04', '2022-2023', NULL, '5442525162315215'),
(90, 'ADM-APS-2022-90', '2022-04-05', '2022-2023', NULL, '142035656565656'),
(91, 'ADM-APS-2022-91', '2022-04-05', '2022-2023', NULL, '1430389568695'),
(92, 'ADM-APS-2022-92', '2022-04-08', '2022-2023', '#02022343', '1422103434434'),
(93, 'ADM-APS-2022-93', '2022-04-08', '2022-2023', NULL, '1452103434334'),
(94, 'ADM-APS-2022-94', '2022-04-08', '2022-2023', NULL, '17502797694573536');

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
(9, 235, '10000', 10, '1000.00', 0, '10000'),
(10, 235, '10000', 10, '1000.00', 0, '10000'),
(11, 235, '10000', 10, '1000.00', 0, '10000'),
(12, 235, '10000', 10, '1000.00', 0, '10000');

-- --------------------------------------------------------

--
-- Table structure for table `assign_subjects`
--

CREATE TABLE `assign_subjects` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `cls_id` int(10) NOT NULL,
  `section_id` int(10) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `lecture_per_week` int(11) NOT NULL,
  `type` enum('Theory','Lab') NOT NULL,
  `subject_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assign_subjects`
--

INSERT INTO `assign_subjects` (`id`, `subject_id`, `cls_id`, `section_id`, `teacher_id`, `lecture_per_week`, `type`, `subject_name`) VALUES
(16, 11, 18, 21, 125, 5, 'Theory', 'English'),
(17, 9, 17, 22, 238, 6, 'Theory', 'Islamiat'),
(18, 11, 17, 22, 125, 6, 'Theory', 'English'),
(19, 12, 17, 22, 236, 6, 'Theory', 'Urdu'),
(20, 13, 17, 22, 235, 6, 'Theory', 'Maths'),
(23, 9, 17, 39, 238, 6, 'Theory', 'Islamiat'),
(24, 12, 17, 39, 238, 6, 'Theory', 'Urdu'),
(25, 13, 17, 39, 296, 6, 'Theory', 'Maths'),
(26, 11, 17, 39, 269, 6, 'Theory', 'English');

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
(80, 125, '07:30:00', '02:20:00', '2022-04-11', 'P', NULL, NULL, 0, NULL),
(81, 237, '07:30:00', '02:20:00', '2022-04-11', 'P', NULL, NULL, 0, NULL),
(82, 242, '00:00:00', '00:00:00', '2022-04-10', 'A', NULL, NULL, 0, NULL),
(83, 249, '00:00:00', '00:00:00', '2022-04-10', 'A', NULL, NULL, 0, NULL),
(84, 234, '00:00:00', '00:00:00', '2022-04-10', 'A', NULL, NULL, 0, NULL),
(85, 237, '00:00:00', '00:00:00', '2022-04-10', 'H', NULL, NULL, 0, NULL),
(86, 237, '07:30:00', '02:20:00', '2022-04-01', 'P', NULL, NULL, 0, NULL),
(87, 238, '00:00:00', '00:00:00', '2022-04-01', 'A', NULL, NULL, 0, NULL),
(88, 237, '07:30:00', '02:20:00', '2022-04-02', 'P', NULL, NULL, 0, NULL),
(89, 238, '00:00:00', '00:00:00', '2022-04-02', 'A', NULL, NULL, 0, NULL),
(90, 237, '07:30:00', '02:20:00', '2022-04-04', 'P', NULL, NULL, 0, NULL),
(91, 237, '07:30:00', '02:20:00', '2022-04-05', 'P', NULL, NULL, 0, NULL),
(92, 238, '00:00:00', '00:00:00', '2022-04-05', 'A', NULL, NULL, 0, NULL),
(93, 237, '07:30:00', '02:20:00', '2022-04-06', 'P', NULL, NULL, 0, NULL),
(94, 238, '00:00:00', '00:00:00', '2022-04-06', 'A', NULL, NULL, 0, NULL),
(95, 237, '07:30:00', '02:20:00', '2022-04-07', 'P', NULL, NULL, 0, NULL),
(96, 238, '00:00:00', '00:00:00', '2022-04-07', 'A', NULL, NULL, 0, NULL),
(97, 237, '07:30:00', '02:20:00', '2022-04-08', 'P', NULL, NULL, 0, NULL),
(98, 238, '00:00:00', '00:00:00', '2022-04-08', 'A', NULL, NULL, 0, NULL),
(99, 237, '07:30:00', '02:20:00', '2022-04-09', 'P', NULL, NULL, 0, NULL),
(100, 238, '00:00:00', '00:00:00', '2022-04-09', 'A', NULL, NULL, 0, NULL),
(101, 238, '00:00:00', '00:00:00', '2022-04-10', 'A', NULL, NULL, 0, NULL),
(102, 239, '07:30:00', '02:20:00', '2022-04-19', 'P', NULL, NULL, 0, NULL),
(103, 240, '07:30:00', '02:20:00', '2022-04-19', 'P', NULL, NULL, 0, NULL),
(104, 241, '07:30:00', '02:20:00', '2022-04-19', 'P', NULL, NULL, 0, NULL),
(105, 242, '07:30:00', '02:20:00', '2022-04-19', 'P', NULL, NULL, 0, NULL),
(106, 243, '07:30:00', '02:20:00', '2022-04-19', 'P', NULL, NULL, 0, NULL),
(107, 244, '07:30:00', '02:20:00', '2022-04-19', 'P', NULL, NULL, 0, NULL),
(108, 245, '07:30:00', '02:20:00', '2022-04-19', 'P', NULL, NULL, 0, NULL),
(109, 246, '07:30:00', '02:20:00', '2022-04-19', 'P', NULL, NULL, 0, NULL),
(110, 247, '07:30:00', '02:20:00', '2022-04-19', 'P', NULL, NULL, 0, NULL),
(111, 248, '07:30:00', '02:20:00', '2022-04-19', 'P', NULL, NULL, 0, NULL),
(112, 125, '07:30:00', '02:20:00', '2022-04-19', 'P', NULL, NULL, 0, NULL),
(113, 230, '07:30:00', '02:20:00', '2022-04-19', 'P', NULL, NULL, 0, NULL),
(114, 231, '07:30:00', '02:20:00', '2022-04-19', 'P', NULL, NULL, 0, NULL),
(115, 232, '07:30:00', '02:20:00', '2022-04-19', 'P', NULL, NULL, 0, NULL),
(116, 233, '07:30:00', '02:20:00', '2022-04-19', 'P', NULL, NULL, 0, NULL),
(117, 234, '07:30:00', '02:20:00', '2022-04-19', 'P', NULL, NULL, 0, NULL),
(118, 235, '07:30:00', '02:20:00', '2022-04-19', 'P', NULL, NULL, 0, NULL),
(119, 238, '07:30:00', '02:20:00', '2022-04-19', 'P', NULL, NULL, 0, NULL),
(120, 237, '07:30:00', '02:20:00', '2022-04-19', 'P', NULL, NULL, 0, NULL),
(121, 236, '07:30:00', '02:20:00', '2022-04-19', 'P', NULL, NULL, 0, NULL);

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
-- Table structure for table `bank_account`
--

CREATE TABLE `bank_account` (
  `bank_acc_Id` int(10) NOT NULL,
  `bank_acc_No` varchar(255) DEFAULT NULL,
  `bank_Name` varchar(255) DEFAULT NULL,
  `branch_Code` varchar(255) DEFAULT NULL,
  `branch_Address` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_account`
--

INSERT INTO `bank_account` (`bank_acc_Id`, `bank_acc_No`, `bank_Name`, `branch_Code`, `branch_Address`, `user_id`) VALUES
(1, '43434343434343', 'Meezan Bank', '0803', 'Chandni Chowk Rawalpindi', 296),
(2, '8484848484884', 'Alfalah Bank', '0841', 'Gulzar e Quid Rawalpindi', 270);

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
  `board_Name` varchar(255) DEFAULT NULL COMMENT 'Board Name',
  `education_level` int(11) NOT NULL COMMENT '1 for school and college\r\n2 for University'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `boards`
--

INSERT INTO `boards` (`pk_board_Id`, `board_Name`, `education_level`) VALUES
(1, 'BISE, Kohat', 1),
(2, 'BISE, Rawalpindi', 1),
(4, 'FBISE, Islamabad', 1),
(6, 'BISE, Peshawar', 1),
(7, 'National University', 2),
(8, 'Kohat University', 2);

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
(25, 4, 'Accounts Payable (AP)', 4101, 1116050, '2021-10-27', 29, '2021-10-21 04:16:12', 'Accounts payable (AP) are amounts due to vendors or suppliers for goods or services received that have not yet been paid for..', 1),
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
(59, 2, 'Payroll Expenses', 2300, 1116050, '2021-10-29', 0, '2021-10-29 22:06:31', 'Use Payroll expenses to track payroll expenses. You may want different accounts of this type for things like: Compensation of officers Guaranteed payments Workers compensation Salaries and wages Payroll taxes', 1),
(60, 2, 'Basic salary', 2301, 1155565, '2022-02-07', 59, '2022-02-07 15:04:39', 'Basic salary', 1),
(61, 2, 'Over Time', 2302, 60446, '2022-02-07', 59, '2022-02-07 15:10:22', 'Over Time', 1),
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
(72, 2, 'Advance Salary', 3104, 45659, '2022-02-07', 17, '2022-02-07 15:28:56', 'Advance Salary', 1);

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
(16, 'Junior Montessori', '001', '4', '2000', NULL, '9,11,12,13', 9),
(17, 'Advance Montessori', '002', '4', '2000', NULL, '9,11,12,13', 9),
(18, 'Grade One', '003', '6', '2000', NULL, '7,9,11,12,14,18', 10),
(19, 'Grade Two', '004', '6', '2000', NULL, '7,9,11,12,13,14,16', 10),
(20, 'Grade Three', '005', '6', '2000', NULL, '7,9,11,12,13,14,18', 10),
(21, 'Grade Four', '006', '6', '2000', NULL, '7,9,11,12,13,14,18', 10),
(22, 'Grade Five', '007', '6', '2000', NULL, '7,8,9,11,12,13,14,18', 10),
(23, 'Grade Six', '008', '8', '2500', NULL, '7,8,9,10,11,12,13,14,15,16,18', 4),
(24, 'Grade Seven', '009', '8', '2500', NULL, '7,8,9,10,11,12,13,14,15,16', 4),
(25, 'Grade Eight', '010', '8', '2500', NULL, '7,8,9,10,11,12,13,14,15,16', 4),
(26, 'Grade Nine  Matric', '011', '8', '3000', NULL, '7,8,9,10,11,12,13,14,15,16', 3),
(27, 'Grade Ten Matric', '012', '8', '3000', NULL, '7,8,9,10,11,12,13,15,16', 3),
(28, 'Fsc Pre Medical I', '013', '8', '4000', NULL, '8,9,10,11,12,13,15', 7),
(29, 'Fsc Pre Medical II', '014', '8', '4000', NULL, '8,9,10,11,12,15', 7),
(30, 'Fsc Pre Engineering I', '015', '8', '4000', NULL, '8,9,10,11,12,13', 7),
(31, 'Fsc Pre Engineering II', '016', '8', '4000', NULL, '8,9,10,11,12,13', 7),
(32, 'ICS I', '017', '8', '4000', NULL, '8,9,11,12,13,16', 7),
(33, 'ICS II', '018', '8', '4000', NULL, '8,9,11,12,13,16', 7);

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
(36, 17, 39, NULL, NULL);

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
(848, 36, 1, 1, '08:00:00', '08:40:00', 238, 12),
(849, 36, 2, 1, '08:00:00', '08:40:00', 296, 13),
(850, 36, 3, 1, '08:00:00', '08:40:00', 238, 12),
(851, 36, 1, 2, '08:40:00', '09:20:00', 269, 11),
(852, 36, 2, 2, '08:40:00', '09:20:00', 238, 9),
(853, 36, 3, 2, '08:40:00', '09:20:00', 296, 13),
(855, 36, 2, 3, '09:20:00', '10:00:00', 269, 11),
(856, 36, 3, 3, '09:20:00', '10:00:00', 269, 11),
(857, 36, 1, 4, '10:00:00', '10:40:00', 296, 13),
(858, 36, 2, 4, '10:00:00', '10:40:00', 238, 12),
(859, 36, 3, 4, '10:00:00', '10:40:00', 238, 9),
(860, 36, 1, 5, '10:40:00', '11:20:00', 238, 12),
(861, 36, 2, 5, '10:40:00', '11:20:00', 296, 13),
(862, 36, 3, 5, '10:40:00', '11:20:00', 269, 11),
(863, 36, 1, 6, '11:20:00', '12:00:00', 269, 11),
(864, 36, 2, 6, '11:20:00', '12:00:00', 238, 9),
(865, 36, 3, 6, '11:20:00', '12:00:00', 238, 9),
(866, 36, 1, 18, '12:00:00', '13:00:00', 238, 9),
(867, 36, 2, 18, '12:00:00', '13:00:00', 269, 11),
(868, 36, 1, 19, '13:00:00', '13:40:00', 296, 13),
(869, 36, 2, 19, '13:00:00', '13:40:00', 238, 12),
(870, 36, 1, 20, '13:40:00', '14:20:00', 238, 12),
(871, 36, 2, 20, '13:40:00', '14:20:00', 296, 13);

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
(13, 3, 17, 22, '2022-02-02', 117, 1, 1, 'Very good in english'),
(14, 3, 17, 22, '2022-03-14', 114, 1, 2, 'he is the toper');

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
(1, 1, 17, 22, '2022-03-29', 114, 'P', NULL, NULL),
(2, 1, 17, 22, '2022-03-29', 117, 'P', NULL, NULL),
(3, 1, 17, 22, '2022-03-29', 120, 'P', NULL, NULL),
(4, 1, 17, 22, '2022-03-28', 114, 'P', NULL, NULL),
(5, 1, 17, 22, '2022-03-28', 117, 'P', NULL, NULL),
(6, 1, 17, 22, '2022-03-28', 120, 'P', NULL, NULL),
(109, 1, 17, 22, '2022-03-30', 114, 'A', NULL, NULL),
(111, 1, 17, 22, '2022-03-30', 120, 'A', NULL, NULL),
(113, 1, 17, 22, '2022-03-30', 117, 'H', NULL, NULL),
(114, 1, 17, 22, '2022-04-01', 114, 'P', NULL, NULL),
(115, 1, 17, 22, '2022-04-01', 117, 'A', NULL, NULL),
(119, 1, 17, 22, '2022-04-01', 120, 'H', NULL, NULL),
(120, 1, 17, 22, '2022-04-05', 114, 'P', NULL, NULL),
(121, 1, 17, 22, '2022-04-05', 117, 'A', NULL, NULL),
(122, 1, 17, 22, '2022-04-05', 120, 'P', NULL, NULL),
(123, 1, 17, 22, '2022-04-07', 114, 'P', NULL, NULL),
(126, 1, 17, 22, '2022-04-07', 117, 'H', NULL, NULL),
(127, 1, 17, 22, '2022-04-07', 120, 'L', NULL, NULL),
(128, 1, 17, 22, '2022-04-08', 114, 'P', NULL, NULL),
(129, 1, 17, 22, '2022-04-08', 117, 'A', NULL, NULL),
(130, 1, 17, 22, '2022-04-08', 120, 'L', NULL, NULL),
(131, 1, 18, 21, '2022-04-11', 135, 'P', NULL, NULL),
(132, 1, 18, 21, '2022-04-11', 136, 'A', NULL, NULL),
(133, 1, 18, 21, '2022-04-11', 139, 'L', NULL, NULL),
(134, 1, 17, 22, '2022-04-19', 114, 'A', NULL, NULL),
(135, 1, 17, 22, '2022-04-19', 117, 'P', NULL, NULL),
(136, 1, 17, 22, '2022-04-19', 120, 'P', NULL, NULL);

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
(74, 2, 17, 22, '2022-02-02', 114, 1, 1, 1, 1, 'He is not very well'),
(75, 2, 17, 22, '2022-03-14', 114, 2, 1, 2, 1, 'Quarrel with student during class');

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
(21, 'Geniuses', 135, '135,136,139', 18, '3', 125),
(22, 'Green', 114, '114,117,120', 17, '3', 238),
(27, 'Green', 107, '107,291,289', 19, '3', 234),
(28, 'Green', 152, '150,152,154', 20, '3', 269),
(37, 'Green', 156, '156,157', 21, '2', 265),
(38, 'Green', 290, '252,290,141', 18, '3', 230),
(39, 'Red', 129, '124,129,140', 17, '3', 297);

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
(25, 11, '', '2022-04-15', 17, 9, '09:00:00', '12:00:00', NULL, NULL),
(26, 11, '', '2022-04-16', 17, 11, '09:00:00', '12:00:00', NULL, NULL),
(27, 11, '', '2022-04-17', 17, 12, '09:00:00', '12:00:00', NULL, NULL),
(28, 11, '', '2022-04-18', 17, 13, '09:00:00', '12:00:00', NULL, NULL),
(29, 11, '', '2022-04-15', 16, 9, '09:00:00', '12:00:00', NULL, NULL),
(30, 11, '', '2022-04-16', 16, 11, '09:00:00', '12:00:00', NULL, NULL),
(31, 11, '', '2022-04-17', 16, 12, '09:00:00', '12:00:00', NULL, NULL),
(32, 11, '', '2022-04-18', 16, 13, '09:00:00', '12:00:00', NULL, NULL),
(67, 9, '', '2022-02-08', 17, 9, '00:09:00', '12:00:00', NULL, NULL),
(68, 9, '', '2022-02-09', 17, 12, '00:09:00', '12:00:00', NULL, NULL),
(69, 9, '', '2022-02-10', 17, 11, '00:09:00', '12:00:00', NULL, NULL),
(70, 9, '', '2022-02-11', 17, 13, '00:09:00', '12:00:00', NULL, NULL),
(71, 9, '', '2022-02-08', 16, 13, '00:09:00', '12:00:00', NULL, NULL),
(72, 9, '', '2022-02-09', 16, 11, '00:09:00', '12:00:00', NULL, NULL),
(73, 9, '', '2022-02-10', 16, 12, '00:09:00', '12:00:00', NULL, NULL),
(74, 9, '', '2022-02-11', 16, 9, '00:09:00', '12:00:00', NULL, NULL),
(98, 13, '', '2022-04-01', 17, 9, '09:00:00', '12:00:00', NULL, NULL),
(99, 13, '', '2022-04-01', 16, 9, '09:00:00', '12:00:00', NULL, NULL),
(100, 13, '', '2022-04-01', 18, 9, '09:00:00', '12:00:00', NULL, NULL),
(101, 13, '', '2022-04-01', 19, 9, '09:00:00', '12:00:00', NULL, NULL),
(102, 13, '', '2022-04-01', 20, 9, '09:00:00', '12:00:00', NULL, NULL),
(103, 13, '', '2022-04-01', 21, 9, '09:00:00', '12:00:00', NULL, NULL),
(104, 13, '', '2022-04-01', 22, 9, '09:00:00', '12:00:00', NULL, NULL),
(105, 13, '', '2022-04-01', 23, 9, '09:00:00', '12:00:00', NULL, NULL),
(106, 13, '', '2022-04-01', 24, 9, '09:00:00', '12:00:00', NULL, NULL),
(107, 13, '', '2022-04-01', 25, 9, '09:00:00', '12:00:00', NULL, NULL),
(108, 13, '', '2022-04-01', 26, 9, '09:00:00', '12:00:00', NULL, NULL),
(109, 13, '', '2022-04-01', 27, 9, '09:00:00', '12:00:00', NULL, NULL);

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
(1, 'Monday', '2022-02-02 08:23:56', '2022-02-02 08:23:56'),
(2, 'Tuesday', '2022-02-02 08:23:56', '2022-02-02 08:23:56'),
(3, 'Wednesday', '2022-02-02 08:23:56', '2022-02-02 08:23:56'),
(4, 'Thursday', '2022-02-02 08:23:56', '2022-02-02 08:23:56'),
(5, 'Friday', '2022-02-02 08:23:56', '2022-02-02 08:23:56'),
(6, 'Saturday', '2022-02-02 08:23:56', '2022-02-02 08:23:56');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `desig_Id` int(10) NOT NULL COMMENT 'Designation ID',
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Designation Name',
  `desig_Status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Designation Status',
  `emp_typ_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(500, 'management analyst', 'Active', 2);

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
  `diary_Status` enum('Open','Closed','Not Acknowledge','Acknowledge') DEFAULT NULL COMMENT 'Diary Status',
  `audience` varchar(255) NOT NULL,
  `student` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `top` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diary`
--

INSERT INTO `diary` (`pk_diary_Id`, `fk_diary_type_Id`, `due_Date`, `fk_cls_Id`, `fk_c_section_Id`, `fk_sub_Id`, `fk_std_Id`, `diary_Note`, `diary_File`, `diary_Status`, `audience`, `student`, `user_id`, `top`) VALUES
(12, 1, '2022-02-01', 17, 22, 7, NULL, 'I need it Urgent', '39-397989_digital-marketing-png-transparent-image-digital-marketing-vector.png', 'Open', 'Whole Class', '', 238, 0),
(13, 1, '2022-02-01', 17, 22, 7, 114, 'I need it Urgent', NULL, '', 'Whole Class', '', 238, 12),
(14, 1, '2022-02-01', 17, 22, 7, 117, 'I need it Urgent', NULL, '', 'Whole Class', '', 238, 12),
(15, 1, '2022-02-01', 17, 22, 7, 120, 'I need it Urgent', NULL, '', 'Whole Class', '', 238, 12),
(16, 1, '2022-02-03', 17, 22, 13, NULL, 'This is math Assignment', 'file (6).pdf', 'Open', 'Whole Class', '', 235, 0),
(17, 1, '2022-02-03', 17, 22, 13, NULL, 'This is math Assignment', NULL, 'Open', 'Whole Class', '', 235, 0),
(18, 1, '2022-02-03', 17, 22, 13, NULL, 'This is math Assignment', NULL, 'Open', 'Whole Class', '', 235, 0),
(19, 1, '2022-02-03', 17, 22, 13, NULL, 'This is math Assignment', 'file (6).pdf', 'Open', 'Whole Class', '', 235, 0),
(20, 1, '2022-02-03', 17, 22, 13, 114, 'This is math Assignment', 'file (6).pdf', '', 'Whole Class', '', 235, 16),
(21, 1, '2022-02-03', 17, 22, 13, 114, 'This is math Assignment', 'file (6).pdf', '', 'Whole Class', '', 235, 19),
(22, 1, '2022-02-03', 17, 22, 13, 117, 'This is math Assignment', 'file (6).pdf', '', 'Whole Class', '', 235, 19),
(23, 1, '2022-02-03', 17, 22, 13, 120, 'This is math Assignment', 'file (6).pdf', '', 'Whole Class', '', 235, 19),
(24, 1, '2022-02-03', 17, 22, 13, NULL, 'wetww4ytwyq46t3424', NULL, 'Open', 'Whole Class', '', 235, 0),
(25, 1, '2022-02-03', 17, 22, 13, NULL, 'wetww4ytwyq46t3424', NULL, 'Open', 'Whole Class', '', 235, 0),
(26, 1, '2022-02-03', 17, 22, 13, NULL, 'wetww4ytwyq46t3424', NULL, 'Open', 'Whole Class', '', 235, 0),
(27, 1, '2022-02-03', 17, 22, 13, NULL, 'wetww4ytwyq46t3424', NULL, 'Open', 'Whole Class', '', 235, 0),
(28, 1, '2022-02-03', 17, 22, 13, 117, 'This is math Assignment', 'file (6).pdf', '', 'Whole Class', '', 235, 16),
(29, 1, '2022-02-03', 17, 22, 13, 120, 'This is math Assignment', 'file (6).pdf', '', 'Whole Class', '', 235, 16),
(30, 1, '2022-02-03', 17, 22, 13, NULL, 'dfewqqrqwwerewqe', NULL, 'Open', 'Whole Class', '', 235, 0),
(31, 1, '2022-02-03', 17, 22, 13, NULL, 'dfewqqrqwwerewqe', NULL, 'Open', 'Whole Class', '', 235, 0),
(32, 1, '2022-02-03', 17, 22, 13, NULL, 'dfewqqrqwwerewqe', NULL, 'Open', 'Whole Class', '', 235, 0),
(33, 1, '2022-02-03', 17, 22, 13, NULL, 'dfewqqrqwwerewqe', NULL, 'Open', 'Whole Class', '', 235, 0),
(34, 2, '2022-02-03', 17, 22, 13, NULL, 'etewrtewrewrwe', NULL, 'Open', 'Whole Class', '', 235, 0),
(36, 2, '2022-02-03', 17, 22, 13, 114, 'etewrtewrewrwe', NULL, '', 'Whole Class', '', 235, 34),
(37, 2, '2022-02-03', 17, 22, 13, 117, 'etewrtewrewrwe', NULL, '', 'Whole Class', '', 235, 34),
(38, 2, '2022-02-03', 17, 22, 13, 120, 'etewrtewrewrwe', NULL, '', 'Whole Class', '', 235, 34),
(39, 1, '2022-02-03', 17, 22, 13, NULL, 'sfsdfewrwerewqqrwqerwqerwq', NULL, 'Open', 'Whole Class', '', 235, 0),
(40, 1, '2022-02-03', 17, 22, 13, NULL, 'sfsdfewrwerewqqrwqerwqerwq', NULL, 'Open', 'Whole Class', '', 235, 0),
(41, 1, '2022-02-03', 17, 22, 13, NULL, 'sfsdfewrwerewqqrwqerwqerwq', NULL, 'Open', 'Whole Class', '', 235, 0),
(42, 1, '2022-02-03', 17, 22, 13, NULL, 'sfsdfewrwerewqqrwqerwqerwq', NULL, 'Open', 'Whole Class', '', 235, 0),
(43, 1, '2022-02-03', 17, 22, 13, NULL, 'sfsdfewrwerewqqrwqerwqerwq', NULL, '', 'Whole Class', '', 235, 42),
(44, 1, '2022-02-03', 17, 22, 13, 114, 'sfsdfewrwerewqqrwqerwqerwq', NULL, '', 'Whole Class', '', 235, 42),
(45, 1, '2022-02-03', 17, 22, 13, 117, 'sfsdfewrwerewqqrwqerwqerwq', NULL, '', 'Whole Class', '', 235, 42),
(46, 1, '2022-02-03', 17, 22, 13, 120, 'sfsdfewrwerewqqrwqerwqerwq', NULL, '', 'Whole Class', '', 235, 42),
(47, 2, '2022-02-03', 17, 22, 13, NULL, 'etwetwetrewtrewr', NULL, 'Open', 'Whole Class', '', 235, 0),
(48, 2, '2022-02-03', 17, 22, 13, 114, 'etwetwetrewtrewr', NULL, '', 'Whole Class', '', 235, 47),
(49, 2, '2022-02-03', 17, 22, 13, 117, 'etwetwetrewtrewr', NULL, '', 'Whole Class', '', 235, 47),
(50, 2, '2022-02-03', 17, 22, 13, 120, 'etwetwetrewtrewr', NULL, '', 'Whole Class', '', 235, 47),
(51, 2, '2022-02-04', 17, 22, 7, NULL, 'efrqerqweqweqw', NULL, 'Open', 'Whole Class', '', 238, 0),
(52, 2, '2022-02-04', 17, 22, 7, 114, 'efrqerqweqweqw', NULL, '', 'Whole Class', '', 238, 51),
(53, 2, '2022-02-04', 17, 22, 7, 117, 'efrqerqweqweqw', NULL, '', 'Whole Class', '', 238, 51),
(54, 2, '2022-02-04', 17, 22, 7, 120, 'efrqerqweqweqw', NULL, '', 'Whole Class', '', 238, 51),
(55, 3, '2022-02-04', 17, 22, 7, NULL, 'Iqbal Day all students are appreciated for their performance', NULL, 'Open', 'Whole Class', '', 238, 0),
(56, 3, '2022-02-04', 17, 22, 7, 114, 'Iqbal Day all students are appreciated for their performance', NULL, '', 'Whole Class', '', 238, 55),
(57, 3, '2022-02-04', 17, 22, 7, 117, 'Iqbal Day all students are appreciated for their performance', NULL, '', 'Whole Class', '', 238, 55),
(58, 3, '2022-02-04', 17, 22, 7, 120, 'Iqbal Day all students are appreciated for their performance', NULL, '', 'Whole Class', '', 238, 55),
(59, 3, '2022-02-04', 17, 22, 7, NULL, 'esgwa4erwrewrew', NULL, 'Open', 'Whole Class', '', 238, 0),
(60, 3, '2022-02-04', 17, 22, 7, 114, 'esgwa4erwrewrew', NULL, '', 'Whole Class', '', 238, 59),
(61, 3, '2022-02-04', 17, 22, 7, 117, 'esgwa4erwrewrew', NULL, '', 'Whole Class', '', 238, 59),
(62, 3, '2022-02-04', 17, 22, 7, 120, 'esgwa4erwrewrew', NULL, '', 'Whole Class', '', 238, 59),
(63, 4, '2022-02-04', 17, 22, 7, NULL, 'wfrwetrewrewrewr', NULL, 'Open', 'Individuals', '', 238, 0),
(64, 4, '2022-02-04', 17, 22, 7, NULL, 'wfrwetrewrewrewr', NULL, 'Open', 'Individuals', '', 238, 0),
(65, 4, '2022-02-04', 17, 22, 7, NULL, 'wfrwetrewrewrewr', NULL, 'Open', 'Individuals', '', 238, 0),
(66, 4, '2022-02-04', 17, 22, 7, 117, 'wfrwetrewrewrewr', 'file (4).pdf', '', 'Individuals', '', 238, 65),
(67, 4, '2022-02-04', 17, 22, 7, 120, 'wfrwetrewrewrewr', 'file (4).pdf', '', 'Individuals', '', 238, 65),
(68, 1, '2022-02-04', 17, 22, 7, NULL, 'rqewrq3wrr32e23', NULL, 'Open', 'Individuals', '', 238, 0),
(69, 1, '2022-02-04', 17, 22, 7, 114, 'rqewrq3wrr32e23', 'SCIMS  Add Subject.pdf', '', 'Individuals', '', 238, 68),
(70, 1, '2022-02-04', 17, 22, 7, 117, 'rqewrq3wrr32e23', 'SCIMS  Add Subject.pdf', '', 'Individuals', '', 238, 68),
(71, 1, '2022-02-04', 17, 22, 7, 120, 'rqewrq3wrr32e23', 'SCIMS  Add Subject.pdf', '', 'Individuals', '', 238, 68),
(72, 4, '2022-02-04', 17, 22, 7, NULL, 'erewqqr2343243243', 'SCIMS  Add Subject.pdf', 'Open', 'Individuals', '', 238, 0),
(73, 4, '2022-02-04', 17, 22, 7, 114, 'erewqqr2343243243', 'SCIMS  Add Subject.pdf', '', 'Individuals', '', 238, 72),
(74, 4, '2022-02-04', 17, 22, 7, 117, 'erewqqr2343243243', 'SCIMS  Add Subject.pdf', '', 'Individuals', '', 238, 72),
(75, 4, '2022-02-04', 17, 22, 7, 120, 'erewqqr2343243243', 'SCIMS  Add Subject.pdf', '', 'Individuals', '', 238, 72),
(76, 4, '2022-02-04', 17, 22, 7, NULL, 'tewtwtewtewtw', 'SCIMS  Add Subject.pdf', 'Open', 'Whole Class', '', 238, 0),
(77, 4, '2022-02-04', 17, 22, 7, 114, 'tewtwtewtewtw', 'SCIMS  Add Subject.pdf', 'Not Acknowledge', 'Whole Class', '', 238, 76),
(78, 4, '2022-02-04', 17, 22, 7, 117, 'tewtwtewtewtw', 'SCIMS  Add Subject.pdf', 'Not Acknowledge', 'Whole Class', '', 238, 76),
(79, 4, '2022-02-04', 17, 22, 7, 120, 'tewtwtewtewtw', 'SCIMS  Add Subject.pdf', 'Not Acknowledge', 'Whole Class', '', 238, 76),
(80, 1, '2022-02-10', 17, 22, 11, NULL, 'tstwerwerwer', 'file (21).pdf', 'Open', 'Whole Class', '', 125, 0),
(81, 1, '2022-02-10', 17, 22, 11, 114, 'tstwerwerwer', 'file (21).pdf', 'Not Acknowledge', 'Whole Class', '', 125, 80),
(82, 1, '2022-02-10', 17, 22, 11, 117, 'tstwerwerwer', 'file (21).pdf', 'Not Acknowledge', 'Whole Class', '', 125, 80),
(83, 1, '2022-02-10', 17, 22, 11, 120, 'tstwerwerwer', 'file (21).pdf', 'Not Acknowledge', 'Whole Class', '', 125, 80),
(84, 1, '2022-03-25', 17, 22, 9, NULL, 'asaaaaaaaaaaaa', 'show-date-sheet-table.pdf', 'Open', 'Whole Class', '', 238, 0),
(85, 1, '2022-03-25', 17, 22, 9, 114, 'asaaaaaaaaaaaa', 'show-date-sheet-table.pdf', 'Not Acknowledge', 'Whole Class', '', 238, 84),
(86, 1, '2022-03-25', 17, 22, 9, 117, 'asaaaaaaaaaaaa', 'show-date-sheet-table.pdf', 'Not Acknowledge', 'Whole Class', '', 238, 84),
(88, 1, '2022-03-25', 17, 22, 9, 120, 'asaaaaaaaaaaaa', 'show-date-sheet-table.pdf', 'Not Acknowledge', 'Whole Class', '', 238, 84),
(89, 4, '2022-04-21', 17, 22, 9, NULL, 'This Adeel Raja have good behavior', NULL, 'Open', 'Individuals', '', 238, 0),
(90, 4, '2022-04-21', 17, 22, 9, 114, 'This Adeel Raja have good behavior', NULL, 'Not Acknowledge', 'Individuals', '', 238, 89);

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
-- Table structure for table `education_level`
--

CREATE TABLE `education_level` (
  `edu_level_Id` bigint(10) NOT NULL COMMENT 'University\r\nBorad ',
  `name` varchar(255) NOT NULL COMMENT 'Name of University'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education_level`
--

INSERT INTO `education_level` (`edu_level_Id`, `name`) VALUES
(1, 'School/College'),
(2, 'University');

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
(77, 'Shafiq Ur Rehman', '0988887667', 4, NULL),
(78, 'Shafiq Ur Rehman', '0988887667', 4, NULL),
(79, 'Shafiq Ur Rehman', '0988887667', 4, NULL),
(80, 'Khayal Rehman', '99999999999', 4, NULL),
(81, 'Shafiq Ur Rehman', '03015388827', 4, NULL),
(82, 'Shafiq Ur Rehman', '0988887667', 3, NULL),
(83, 'shafiq rehman', '0988887667', 4, NULL),
(84, 'Shafiq Ur Rehman', '0988887667', 4, NULL),
(85, 'shafiq rehman', '0988887667', 4, NULL),
(86, 'Muhammad Faiz', '0300453445673', 4, NULL),
(87, 'waqas butt', '0321456789876', 4, NULL),
(88, 'Akram jamli', '03210987654346', 4, NULL),
(89, 'Laiq khan', '034390786756', 4, NULL),
(90, 'Shafiq Ur Rehman', '03000077665', 4, NULL),
(91, 'Muhammad Sadiq', '0345698798900', 4, NULL),
(92, 'fakhar khan', '033250141266666', 2, NULL),
(93, 'fakhar khan', '0330931826888888888', 2, NULL),
(94, 'mie shahis', '034565676', 4, NULL),
(95, 'Ali Rehman', '0312569000876', 4, NULL),
(96, 'Laiq khan', '031254444786', 4, NULL),
(97, 'nadeen mailk', '0312456789876', 4, NULL),
(98, 'sheraz butt', '0333234343443', 1, NULL),
(99, 'faizbutt', '033454656656565', 4, NULL),
(100, 'manzoor', '0330455554545', 2, NULL),
(101, 'akram jamil', '032143483946', 4, NULL),
(102, 'Zabit Noor', '33333333333', 4, NULL),
(103, 'zarwali', '0344656596859', 7, NULL),
(104, 'sadia', '03215849854', 10, NULL),
(105, 'alirehman', '0324434356', 4, NULL),
(106, 'sarafaz', '0344548954', 2, NULL),
(107, 'Nabeela', '032254857458', 10, NULL),
(108, 'Mir Shahid', '032154857458', 4, NULL),
(109, 'Nabeel butt', '03232355575', 12, NULL),
(110, 'Ruheela khan', '033376765688', 3, NULL),
(111, 'Ali Akbar', '0341554857458', 1, NULL),
(112, 'Salman Butt', '0301556677998', 2, NULL),
(113, 'Saleem Farhan', '030355667789', 2, NULL),
(114, 'Faizoor', '0303556676769', 2, NULL),
(115, 'Ahmad Ali', '031256677893', 2, NULL),
(116, 'Laiq khan', '03333452330', 1, NULL),
(117, 'Qaisar Ali', '03323400120', 12, NULL),
(118, 'Akram Jamil', '03025511098', 4, NULL),
(119, 'Shabeer Gul', '03125511230', 2, NULL),
(120, 'Shabeer Gul', '03125511230', 2, NULL),
(121, 'Faizullah', '032356677546', 4, NULL),
(122, 'Ameen shah', '03015154452', 2, NULL),
(123, 'Farhan', '03324400054', 1, NULL),
(124, 'Arbaz Gul', '0333123456789', 4, NULL),
(125, 'Mansoor', '03145670089', 4, NULL),
(126, 'Faizullah', '033567788989', 4, NULL),
(127, 'Shabeer', '03233347387', 2, NULL),
(128, 'Sharif Jamil', '03233988747', 2, NULL),
(129, 'Zahid Orakzai', '88888888888', 4, NULL),
(130, 'Abbas Khan', '222222222222', 4, NULL),
(131, 'Abbas Taimoor', '042123456789', 4, NULL),
(132, 'Shah Jahan', '032574857481', 4, NULL),
(133, 'Gulshan Islam', '09220123456789', 4, NULL),
(134, 'Wahid Bahar', '03445676677', 2, NULL),
(135, 'Umar Asad', '74185208965241', 4, NULL),
(136, 'Abbas Abdullah', '032445677801', 4, NULL),
(137, 'Gulshan Islam', '09220123456789', 4, NULL),
(138, 'Javed Khan', '03345569854', 4, NULL),
(139, 'Arbab Taimoor', '042123456789', 4, NULL),
(140, 'Muhammad Ismail', '0927123456789', 4, NULL),
(141, 'Muhammad Ismail', '0927123456789', 4, NULL),
(142, 'Sultan Aziz', '0927123456789', 4, NULL),
(143, 'Sultan Aziz', '0927123456789', 4, NULL),
(144, 'Sultan Aziz', '0927123456789', 4, NULL),
(145, 'Gul Rehman', '0927123456789', 4, NULL),
(146, 'Gul Rehman', '0927123456789', 4, NULL),
(147, 'Abad Gul', '092799999999999', 4, NULL),
(148, 'Abad Gul', '0927123456789', 4, NULL),
(149, 'Abad Gul', '0927123456789', 4, NULL),
(150, 'Abad Gul', '0927123456789', 4, NULL),
(151, 'Tajriat Khan', '0927123456789', 4, NULL),
(152, 'Tajriat Khan', '0927123456789', 4, NULL),
(153, 'Douglas Lawrence', '8888888', 4, NULL),
(154, 'Akhbar Jan', '0334743343435', 4, NULL),
(155, 'Gu Rabi', '033245454470', 4, NULL),
(156, 'Abdurauf', '0300587456576', 2, NULL),
(157, 'Arshid Iqbal', '03313445577', 7, NULL),
(158, 'Maqbool Shah', '0338564735647', 8, NULL),
(159, 'Mujahid', '034845745455', 1, NULL),
(160, 'Mujtaba Ikhlaq', '032134347434', 2, NULL),
(161, 'Irshaad Khaliq', '03324343344', 1, NULL),
(162, 'Jabbar Wali', '03125458006', 4, NULL),
(163, 'Fareed Ullah', '0345654665', 4, NULL),
(164, 'Abdul Manaf', '03325345434', 2, NULL),
(165, 'Rehan Ktk', '03495840822', 4, NULL),
(166, 'Waqas Sheraaz', '031144454586', 4, NULL),
(167, 'Mujtaba Khan', '0332455758', 2, NULL),
(168, 'Mujahid Shakeel', '034496567844', 4, NULL),
(169, 'Abubakar Jan', '0334743343435', 4, NULL),
(170, 'Mujahid Khan', '034845745455', 2, NULL),
(171, 'Maqbool Karim', '03313445577', 4, NULL),
(172, 'Khalid Khan', '0334565676766', 4, NULL),
(173, 'Zafar Habib', '222222222222', 4, NULL),
(174, 'Sultan Aziz', '99999999999', 4, NULL),
(175, 'Sardar Habib', '0420123456789', 4, NULL),
(176, 'Ghulam Khattak', '042123456789', 4, NULL),
(177, 'Muhammad Yaseen', '99999999999', 4, NULL),
(178, 'Muhammad Jibran', '99999999999', 4, 'NA'),
(179, 'Muhammad Nazif', '99999999999', 4, NULL),
(180, 'Muhammad Akmal', '88888888888', 4, NULL),
(181, 'Admin Father', '99999999999', 4, 'NA'),
(182, 'David Smith', '99999999999', 4, NULL),
(183, 'Muhammad Qalam', '99999999999', 4, NULL),
(184, 'Muhammad Shahid Khan', '99999999999', 4, NULL),
(185, 'Muhammad Khan', '99999999999', 4, NULL),
(186, 'Muhammad Arif', '5555555555', 4, NULL),
(187, 'Gul Dad Khan', '03339654236', 4, NULL),
(188, 'Gul Dad Khan', '03339654236', 4, NULL),
(189, 'Gul Dad Khan', '03339654236', 4, NULL),
(190, 'Gul Dad Khan', '03339654236', 4, NULL),
(191, 'Gul Dad Khan', '03339654236', 4, NULL),
(192, 'Gul Dad Khan', '03339654236', 4, NULL),
(193, 'Gul Dad Khan', '03339654236', 4, NULL),
(194, 'Gulzar Ali', '03339654236', 4, NULL),
(195, 'Gul e Rana Father', '99999999999', 4, 'NA'),
(196, 'Waqas Butt', '1111111111111', 4, NULL),
(197, 'Akram Jamali', '222222222222', 4, NULL),
(198, 'Nadeem Malik', '1111111111111', 4, NULL),
(199, 'Ali Rehman', '0324434356', 4, NULL),
(200, 'Ali Zafar', '123456789', 4, NULL),
(201, 'Muhammad Fizan', '99999999999', 4, 'NA'),
(202, 'Albert Tony', '99999999999', 4, 'NA'),
(203, 'Muhammad Zafran', '99999999999', 4, 'NA'),
(204, 'Muhammad  Gulzar', '99999999999', 4, 'NA'),
(205, 'Sher Bahadur', '99999999999', 4, 'NA'),
(206, 'Sardar Habib', '99999999999', 4, 'NA');

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
(57, 33323232323, 33323232323, 'Jerold@test.com', 'I-8, Islamabad', 'i-8, islamabad', '152', '130', '44000'),
(58, 8888888, 1231234567, 'info@123fooddel.com', 'House No,580 Street No,110 I-8-4', 'House No,580 Street No,110 I-8-4', '152', '130', '44000'),
(59, 34606556056, 34606556056, 'majid223ak@gmail.com', 'Amin Abad Near Paracha Town Pindi Road Kohat', 'Amin Abad Near Paracha Town Pindi Road Kohat', '43', '247', '26000'),
(60, 332354565466, 332354565466, 'rabimarwat221@gmail.com', 'Village and Post office Gov Primary School chock, Lakki Marwat', 'Village and Post office Gov Primary School chock, Lakki Marwat', '45', '270', '28420'),
(61, 33244548558, 33244548558, 'test@gmail.com', 'Sector E#9, G11, islamabad', 'Sector E#9, G11, islamabad', '152', '130', '44000'),
(62, 32545547656, 32545547656, 'mdsania@gmail.com', 'Sector E#12 , I-8 islamabad', 'Sector E#12 , I-8 islamabad', '152', '130', '44000'),
(63, 333565768, 333565768, 'test@gmail.com', 'I-9, Islamabad, Islamabad Capital', 'I-9, Islamabad, Islamabad Capital', '152', '130', '44000'),
(64, 34342545554, 34342545554, 'test@gmail.com', 'Sadar bazar near Iqra public school and college, Peshawar', 'Sadar bazar near Iqra public school and college, Peshawar', '51', '396', '25000'),
(65, 3225457454758, 3225457454758, 'test@gmail.com', 'Street NO#22, University road Peshawar', 'Street NO#22, University road Peshawar', '51', '396', '25000'),
(66, 302437438434, 302437438434, 'yasmee223@gmail.com', 'Street No#20 Masjid bilal road, Peshawar', 'Street No#20 Masjid bilal road, Peshawar', '51', '396', '25000'),
(67, 31545474840, 31545474840, 'test@gmail.com', 'University Rd\r\nopposite Khyber Teaching Hospital\r\nRahat Abad, Peshawar, Khyber Pakhtunkhwa\r\nPakistan', 'University Rd\r\nopposite Khyber Teaching Hospital\r\nRahat Abad, Peshawar, Khyber Pakhtunkhwa\r\nPakistan', '51', '396', '25000'),
(68, 3444545464, 3444545464, 'test@gmail.com', '6362+V4H Government degree College No 2 Mardan Khyber Pakhtunkhwa 23200, Pakistan', '6362+V4H Government degree College No 2 Mardan, Khyber Pakhtunkhwa 23200, Pakistan', '49', '318', '23200'),
(69, 3034585594, 30345489545, 'test@gmail.com', 'Hangu Pathak,  Bannu road, Kohat', 'Hangu Pathak,  Bannu road, Kohat', '43', '247', '26000'),
(70, 3383493348, 3383493348, 'test@gmail.com', '73MM+M37 Sartaj Sweets & Bakeries, Gadar, Mardan, Khyber Pakhtunkhwa 23200, Pakistan', '73MM+M37 Sartaj Sweets & Bakeries, Gadar, Mardan, Khyber Pakhtunkhwa 23200, Pakistan', '49', '318', '23200'),
(71, 33756985698, 33756985698, 'test@gmail.com', '6H4C+45V Meraj Palace wedding Hall, Shabqadar, Charsadda, Khyber Pakhtunkhwa, Pakistan', '6H4C+45V Meraj Palace wedding Hall, Shabqadar, Charsadda, Khyber Pakhtunkhwa, Pakistan', '37', '59', '24630'),
(72, 345657985695, 345657985695, 'test@gmail.com', 'TCS Express Center E-11/3 Markaz, Shop No. 6, Lower ground floor, Madina Arcade', 'TCS Express Center E-11/3 Markaz, Shop No. 6, Lower ground floor, Madina Arcade', '152', '130', '44000'),
(73, 333045845948, 333045845948, 'test@gmail.com', 'Kamanghar, Karak, Khyber Pakhtunkhwa, Pakistan', 'Kamanghar, Karak, Khyber Pakhtunkhwa, Pakistan', '42', '188', '27200'),
(74, 32545547656, 32545547656, 'test@gmail.com', 'Mitha Khel, Karak, Khyber Pakhtunkhwa, Pakistan', 'Mitha Khel, Karak, Khyber Pakhtunkhwa, Pakistan', '42', '188', '27200'),
(75, 332354565466, 332354565466, 'test@gmail.com', 'Dheri Katti Khel, Nowshera, Khyber Pakhtunkhwa, Pakistan', 'Dheri Katti Khel, Nowshera, Khyber Pakhtunkhwa, Pakistan', '50', '380', '24100'),
(76, 332354565466, 332354565466, 'test@gmail.com', 'Baddani, Killa Saifullah, Balochistan, Pakistan', 'Baddani, Killa Saifullah, Balochistan, Pakistan', '16', '241', '34500'),
(77, 3224554589, 3224554589, 'm.khalid22114@gmail.com', '37-19 Street 41, F-7/1 F 7/1 F-7, Islamabad, Islamabad Capital Territory, Pakistan', '37-19 Street 41, F-7/1 F 7/1 F-7, Islamabad, Islamabad Capital Territory, Pakistan', '152', '130', '44000'),
(78, 42123456789, 42123456789, 'sardarhabid@gmail.com', 'Lahore', 'Lahore', '74', '267', '54700'),
(79, 42123456789, 42123456789, 'ghulamkhattak@gmail.com', 'Lahore', 'Lahore', '152', '130', '44000'),
(80, 99999999999, 99999999999, 'zainulabidin@gmail.com', 'Rawalpindi', 'Rawalpindi', '87', '425', '46000'),
(81, 88888888888, 88888888888, 'zafranullah@gmail.com', 'Rawalpindi', 'Rawalpindi', '87', '425', '46000'),
(82, 88888888888, 88888888888, 'abdulqadir@gmail.com', 'Rawalpindi City', 'Rawalpindi City', '87', '425', '46000'),
(83, 99999999999, 99999999999, 'admin@gmail.com', 'Rawalpindi City', 'Rawalpindi City', '87', '425', '46000'),
(84, 99999999999, 99999999999, 'johnsmith@gmail.com', 'Islamabad Capital Territory, F11 Markaz', 'Village and Post Office Mandawa, Tehsil and District Karak.', '152', '130', '44000'),
(85, 99999999999, 99999999999, 'muhammadqalam@gmail.com', 'Ara Khel Kohat', 'Ara Khel Kohat', '43', '247', '26000'),
(86, 99999999999, 99999999999, 'muhammadshahidkhan@gmail.com', 'Ara Khel Kohat', 'Ara Khel Kohat', '43', '247', '26000'),
(87, 99999999999, 99999999999, 'muhammadkhan@gmail.com', 'Islamabad', 'Lahore Kalma Chowk', '152', '130', '44000'),
(88, 88888888888, 88888888888, 'gulerana@gmail.com', 'Kohat CIty', 'Kohat CIty', '152', '130', '44000'),
(89, 99999999999, 99999999999, 'muhammadfizan@gmail.com', 'F7 Islamabad', 'F7 Islamabad', '152', '130', '44000'),
(90, 88888888888, 88888888888, 'tonywilling@gmail.com', 'F-11 Markaz Islamabad', 'F-11 Markaz Islamabad', '152', '130', '44000'),
(91, 99999999999, 99999999999, 'gulzarzafran@gmail.com', 'G-9 Markaz Islamabad', 'G-9 Markaz Islamabad', '152', '130', '44000'),
(92, 99999999999, 99999999999, 'zubairgulzar@gmail.com', 'G-9 Markaz Islamabad', 'G-9 Markaz Islamabad, Pakistan', '152', '130', '44000'),
(93, 99999999999, 99999999999, 'shamshad@gmail.com', 'B-17 Islamabad', 'B-17 Islamabad', '152', '130', '44000'),
(94, 99999999999, 99999999999, 'gulhabib@gmail.com', 'Rawalpindi City', 'Rawalpindi City', '87', '425', '46000');

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
  `experience` longtext DEFAULT NULL COMMENT 'Previous Experience ID',
  `academic` longtext DEFAULT NULL COMMENT 'Employee Academic Qualification',
  `professional` longtext DEFAULT NULL COMMENT 'Employee Professional Qualification',
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

INSERT INTO `employee_info` (`emp_Id`, `emp_Cnic`, `emp_Img`, `emp_NTN`, `emp_given_name`, `emp_surname`, `emp_fat_Name`, `emp_Dob`, `gnd_Id`, `emp_marital_Status`, `nation_Id`, `country_Id`, `state_Id`, `dom_Id`, `city_Id`, `cast_Id`, `relig_Id`, `bg_Id`, `emp_typ_Id`, `sub_Id`, `experience`, `academic`, `professional`, `disable_Id`, `emp_cnt_Id`, `empt_Id`, `emer_cnt_Id`, `salary_Id`, `user_Id`, `emp_Status`, `desig_Id`) VALUES
(32, 14202999922291, NULL, NULL, NULL, NULL, 'Britto', '1990-06-14', 1, 'Single', 156, 156, 4, 152, NULL, 4, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, 57, 37, 92, NULL, 125, 'Active', 52),
(33, 1420345768909765, NULL, NULL, NULL, NULL, 'Muhammad Adil', '2000-01-10', 1, 'Married', 156, 156, 4, 87, NULL, 1, 13, 3, 1, NULL, NULL, NULL, NULL, NULL, 58, 38, 153, NULL, 230, 'Active', 164),
(34, 142023340556, NULL, NULL, NULL, NULL, 'Akhbar Jan', '1990-04-11', 1, 'Married', 156, 156, 5, 43, NULL, 156, 13, 6, 1, NULL, NULL, NULL, NULL, NULL, 59, 39, 154, NULL, 231, 'Active', 164),
(35, 1450545453546, NULL, NULL, NULL, NULL, 'Gul Rabi', '1989-07-20', 2, 'Married', 156, 156, 5, 45, NULL, 83, 13, 7, 1, NULL, NULL, NULL, NULL, NULL, 60, 40, 155, NULL, 232, 'Active', 267),
(36, 140453934343, NULL, NULL, NULL, NULL, 'Amjad khan', '1995-07-13', 1, 'Married', 156, 156, 4, 8, NULL, 2, 13, 8, 1, NULL, NULL, NULL, NULL, NULL, 61, 41, 156, NULL, 233, 'Active', 235),
(37, 1504443650454, NULL, NULL, NULL, NULL, 'Khalid Mehboob', '1990-06-21', 2, 'Single', 156, 156, 4, 152, NULL, 16, 13, 5, 1, NULL, NULL, NULL, NULL, NULL, 62, 42, 157, NULL, 234, 'Active', 52),
(38, 13933489846567, NULL, NULL, NULL, NULL, 'Jameel', '1993-03-11', 1, 'Single', 156, 156, 4, 152, NULL, 5, 13, 5, 1, NULL, NULL, NULL, NULL, NULL, 63, 43, 158, NULL, 235, 'Active', 367),
(39, 140594113677565, NULL, NULL, NULL, NULL, 'Khurshid Shah', '1995-01-11', 2, 'Single', 156, 156, 5, 43, NULL, 6, 13, 5, 1, NULL, NULL, NULL, NULL, NULL, 64, 44, 159, NULL, 238, 'Active', 202),
(40, 14305556656687, NULL, NULL, NULL, NULL, 'M Riaz', '1994-02-16', 2, 'Single', 156, 156, 5, 51, NULL, 1, 13, 7, 1, NULL, NULL, NULL, NULL, NULL, 65, 45, 160, NULL, 237, 'Active', 8),
(41, 14030334894383, NULL, NULL, NULL, NULL, 'Amjad Rasheed', '1990-02-13', 2, 'Single', 156, 156, 5, 51, NULL, 1, 13, 4, 1, NULL, NULL, NULL, NULL, NULL, 66, 46, 161, NULL, 236, 'Active', 154),
(42, 143054545677, NULL, NULL, NULL, NULL, 'Sabir Jameel', '1995-10-25', 1, 'Single', 156, 156, 5, 51, NULL, 5, 13, 9, 2, NULL, NULL, NULL, NULL, NULL, 67, 47, 162, NULL, 239, 'Active', 1),
(43, 13004344574845, NULL, NULL, NULL, NULL, 'M Jahangeer', '1996-06-27', 2, 'Single', 156, 156, 5, 49, NULL, 4, 13, 5, 2, NULL, NULL, NULL, NULL, NULL, 68, 48, 163, NULL, 240, 'Active', 53),
(44, 1403343478456, NULL, NULL, NULL, NULL, 'Waheed Gul', '1996-10-25', 1, 'Single', 156, 156, 5, 126, NULL, 24, 13, 5, 2, NULL, NULL, NULL, NULL, NULL, 69, 49, 164, NULL, 241, 'Active', 230),
(45, 1429349889574, NULL, NULL, NULL, NULL, 'Jamal Hamid', '1995-07-20', 1, 'Married', 156, 156, 5, 49, NULL, 2, 13, 5, 2, NULL, NULL, NULL, NULL, NULL, 70, 50, 165, NULL, 242, 'Active', 73),
(46, 1530568569568, NULL, NULL, NULL, NULL, 'M Nawaz', '1992-07-16', 2, 'Married', 156, 156, 5, 102, NULL, 4, 13, 7, 2, NULL, NULL, NULL, NULL, NULL, 71, 51, 166, NULL, 243, 'Active', 38),
(47, 1435234344596, NULL, NULL, NULL, NULL, 'Hamza Waqeel', '1996-06-20', 1, 'Married', 156, 156, 4, 152, NULL, 4, 13, 5, 2, NULL, NULL, NULL, NULL, NULL, 72, 52, 167, NULL, 244, 'Active', 58),
(48, 154330465757865, NULL, NULL, NULL, NULL, 'Sabir Ullah', '1995-06-20', 1, 'Single', 156, 156, 5, 42, NULL, 156, 13, 4, 2, NULL, NULL, NULL, NULL, NULL, 73, 53, 168, NULL, 245, 'Active', 426),
(49, 150445485945, NULL, NULL, NULL, NULL, 'M Jawad', '1998-07-14', 2, 'Single', 156, 156, 5, 42, NULL, 7, 13, 5, 2, NULL, NULL, NULL, NULL, NULL, 74, 54, 169, NULL, 246, 'Active', 82),
(50, 14403348738743, NULL, NULL, NULL, NULL, 'Gul Rabi', '2021-02-10', 1, 'Single', 156, 156, 5, 50, NULL, 8, 13, 5, 2, NULL, NULL, NULL, NULL, NULL, 75, 55, 170, NULL, 247, 'Active', 237),
(51, 143055566566755, NULL, NULL, NULL, NULL, 'Amjad Shah', '1995-06-21', 1, 'Married', 156, 156, 2, 16, NULL, 3, 13, 5, 2, NULL, NULL, NULL, NULL, NULL, 76, 56, 171, NULL, 248, 'Active', 338),
(52, 145034454548004, NULL, NULL, NULL, NULL, 'Khalid Khan', '1992-04-02', 1, 'Single', 156, 156, 4, 152, NULL, 3, 13, 5, 2, NULL, NULL, NULL, NULL, NULL, 77, 57, 172, NULL, 249, 'Active', 248),
(53, 42315324532452, NULL, NULL, NULL, NULL, 'Sardar Habib', '1997-11-26', 1, 'Married', 156, 156, 6, 74, NULL, 42, 13, 5, 1, NULL, NULL, NULL, NULL, NULL, 94, 74, 206, NULL, 254, 'Active', 52),
(54, 43634262345634, NULL, NULL, NULL, NULL, 'Sardar Habib', '1998-04-10', 1, 'Married', 156, 156, 6, 74, NULL, 3, 13, 5, 1, NULL, NULL, NULL, NULL, NULL, 78, 58, 175, NULL, 255, 'Active', 52),
(55, 4634654646356, NULL, NULL, NULL, NULL, 'Ghulam Khattak', '1996-02-21', 1, 'Single', 156, 156, 4, 74, NULL, 2, 13, 5, 1, NULL, NULL, NULL, NULL, NULL, 79, 59, 176, NULL, 256, 'Active', 77),
(56, 15203123456789, NULL, NULL, NULL, NULL, 'Muhammad Yaseen', '2022-03-11', 1, 'Married', 156, 156, 6, 42, NULL, 3, 13, 5, 1, NULL, NULL, NULL, NULL, NULL, 80, 60, 177, NULL, 257, 'Active', 450),
(57, 15203852147963, NULL, NULL, NULL, NULL, 'Muhammad Jibran', '1988-04-10', 1, 'Married', 156, 156, 6, 42, NULL, 156, 13, 5, 1, NULL, NULL, NULL, NULL, NULL, 81, 61, 178, NULL, 258, 'Active', 52),
(58, 1420278654320, NULL, NULL, NULL, NULL, 'Muhammad Nazif', '1995-03-14', 1, 'Married', 156, 156, 6, 87, NULL, 42, 13, 5, 2, NULL, NULL, NULL, NULL, NULL, 82, 62, 179, NULL, 259, 'Active', 464),
(59, 4523452342123422134, NULL, NULL, NULL, NULL, 'Admin Father', '2003-03-14', 1, 'Married', 156, 156, 6, 1, NULL, 2, 13, 4, 2, NULL, NULL, NULL, NULL, NULL, 83, 63, 181, NULL, 1, 'Active', 6),
(60, 152038585274169, NULL, NULL, NULL, NULL, 'David Smith', '2001-03-16', 1, 'Married', 156, 156, 4, 83, NULL, 160, 13, 3, 1, NULL, NULL, NULL, NULL, NULL, 84, 64, 182, NULL, 263, 'Active', 154),
(61, 52133523523152321, NULL, NULL, NULL, NULL, 'Muhammad Qalam', '2022-03-16', 1, 'Married', 156, 156, 5, 43, NULL, 5, 13, 5, 1, NULL, NULL, NULL, NULL, NULL, 85, 65, 183, NULL, 266, 'Active', 466),
(62, 3235324323243343, NULL, NULL, NULL, NULL, 'Muhammad Shahid Khan', '2022-03-16', 1, 'Married', 156, 156, 5, 43, NULL, 5, 13, 5, 1, NULL, NULL, NULL, NULL, NULL, 86, 66, 184, NULL, 269, 'Active', 466),
(63, 155015566449988, NULL, NULL, NULL, NULL, 'Muhammad Khan', '2002-03-16', 2, 'Married', 156, 156, 4, 152, NULL, 2, 13, 5, 2, NULL, NULL, NULL, NULL, NULL, 87, 67, 185, NULL, 270, 'Active', 465),
(64, 324513252135, NULL, NULL, NULL, NULL, 'Zartaj Khan', '2022-04-04', 2, 'Married', 156, 156, 4, 152, NULL, 1, 13, 5, 2, NULL, NULL, NULL, NULL, NULL, 88, 68, 195, NULL, 264, 'Active', 464),
(65, 89456321558882, NULL, NULL, NULL, NULL, 'Muhammad Fizan', '2000-04-13', 2, 'Married', 156, 156, 4, 152, NULL, 2, 13, 5, 1, NULL, NULL, NULL, NULL, NULL, 89, 69, 201, NULL, 296, 'Active', 52),
(66, 3254352346346, NULL, NULL, NULL, NULL, 'Albert Tony', '1999-04-13', 2, 'Married', 156, 156, 4, 152, NULL, 2, 13, 5, 1, NULL, NULL, NULL, NULL, NULL, 90, 70, 202, NULL, 297, 'Active', 52),
(67, 32152315321532, NULL, NULL, NULL, NULL, 'Muhammad Zafran', '1990-04-19', 1, 'Married', 156, 156, 4, 152, NULL, 2, 13, 5, 1, NULL, NULL, NULL, NULL, NULL, 91, 71, 203, NULL, 268, 'Active', 340),
(68, 4362347345754, NULL, NULL, NULL, NULL, 'MUhammad Gulzar', '1980-04-19', 1, 'Married', 156, 156, 4, 152, NULL, 2, 13, 5, 2, NULL, NULL, NULL, NULL, NULL, 92, 72, 204, NULL, 267, 'Active', 1),
(69, 2131421341235254, NULL, NULL, NULL, NULL, 'Sher Bahadur', '2000-04-19', 1, 'Married', 156, 156, 4, 152, NULL, 3, 13, 5, 2, NULL, NULL, NULL, NULL, NULL, 93, 73, 205, NULL, 265, 'Active', 464);

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
(37, 'HR-APS-22-38', '2018-07-19', '2019-10-22', NULL, 'Full Time', 'Permanent', 12),
(38, 'HR-APS-22-39', '2001-02-13', '2005-10-25', NULL, 'Full Time', 'Permanent', 1),
(39, 'HR-APS-22-42', '2020-03-05', '2020-04-15', NULL, 'Full Time', 'Permanent', 15),
(40, 'HR-APS-22-42', '2021-11-04', '2022-01-27', NULL, 'Part Time', 'Contract', 14),
(41, 'HR-APS-22-43', '2021-12-08', '2022-01-12', NULL, 'Full Time', 'Permanent', 8),
(42, 'HR-APS-22-49', '2021-11-05', '2021-12-03', NULL, 'Full Time', 'Permanent', 24),
(43, 'HR-APS-22-43', '2021-02-10', '2021-07-15', NULL, 'Full Time', 'Permanent', 13),
(44, 'HR-APS-22-58', '2021-12-23', '2022-01-19', NULL, 'Full Time', 'Permanent', 12),
(45, 'HR-APS-22-45', '2022-01-03', '2022-01-25', NULL, 'Part Time', 'Contract', 12),
(46, 'HR-APS-22-46', '2022-01-19', '2022-01-25', NULL, 'Part Time', 'Contract', 8),
(47, 'HR-APS-22-47', '2022-01-25', '2022-01-28', NULL, 'Full Time', 'Permanent', 12),
(48, 'HR-APS-22-58', '2022-01-12', '2022-01-19', NULL, 'Part Time', 'Contract', 14),
(49, 'HR-APS-22-49', '2022-01-20', '2022-01-28', NULL, 'Full Time', 'Permanent', 12),
(50, 'HR-APS-22-50', '2022-01-05', '2022-01-12', NULL, 'Full Time', 'Permanent', 12),
(51, 'HR-APS-22-60', '2022-01-11', '2022-01-20', NULL, 'Part Time', 'Contract', 20),
(52, 'HR-APS-22-52', '2022-01-04', '2022-01-10', NULL, 'Full Time', 'Permanent', 12),
(53, 'HR-APS-22-58', '2022-01-26', '2022-01-27', NULL, 'Part Time', 'Contract', 15),
(54, 'HR-APS-22-54', '2022-01-20', '2022-01-29', NULL, 'Full Time', 'Permanent', 12),
(55, 'HR-APS-22-55', '2022-01-03', '2022-01-12', NULL, 'Full Time', 'Permanent', 12),
(56, 'HR-APS-22-56', '2022-01-03', '2022-01-12', NULL, 'Full Time', 'Contract', 12),
(57, 'HR-APS-22-62', '2022-01-24', '2022-01-30', NULL, 'Full Time', 'Permanent', 12),
(58, 'HR-APS-22-58', '2022-02-21', '2022-02-21', NULL, 'Full Time', 'Permanent', 2),
(59, 'HR-APS-22-75', '2022-02-21', '2022-02-21', NULL, 'Full Time', 'Permanent', 2),
(60, 'HR-APS-22-61', '2022-03-11', '2022-03-11', NULL, 'Part Time', 'Contract', 2),
(61, 'HR-APS-22-62', '2022-03-11', '2022-03-11', NULL, 'Full Time', 'Contract', 2),
(62, 'HR-APS-22-64', '2022-03-14', '2022-03-14', NULL, 'Full Time', 'Contract', 2),
(63, 'HR-APS-22-64', '2022-03-14', '2023-01-03', NULL, 'Part Time', 'Contract', 2),
(64, 'HR-APS-22-75', '2022-03-16', '2022-03-16', NULL, 'Full Time', 'Permanent', 1),
(65, 'HR-APS-22-75', '2022-03-16', '2025-03-16', NULL, 'Full Time', 'Contract', 2),
(66, 'HR-APS-22-75', '2022-03-16', '2025-03-16', NULL, 'Full Time', 'Contract', 2),
(67, 'HR-APS-22-70', '2022-03-16', '2026-03-16', NULL, 'Part Time', 'Contract', 4),
(68, 'HR-APS-22-68', '2022-04-04', '2024-04-04', NULL, 'Full Time', 'Contract', 2),
(69, 'HR-APS-22-71', '2022-04-13', '2022-04-13', NULL, 'Full Time', 'Permanent', 1),
(70, 'HR-APS-22-70', '2022-04-13', '2025-04-13', NULL, 'Part Time', 'Contract', 3),
(71, 'HR-APS-22-71', '2022-04-19', '2022-04-19', NULL, 'Full Time', 'Contract', 2),
(72, 'HR-APS-22-72', '2022-04-19', '2025-04-19', NULL, 'Full Time', 'Permanent', 2),
(73, 'HR-APS-22-73', '2022-04-19', '2025-04-19', NULL, 'Full Time', 'Permanent', 2),
(74, 'HR-APS-22-74', '2022-04-19', '2025-04-19', NULL, 'Full Time', 'Permanent', 2);

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
(44, 'teachers day', '2021-12-29', '2021-12-30', '2022-01-25 11:29:15', '2022-01-25 11:29:15'),
(46, 'Bakra Eid Celebration Event', '2022-03-08', '2022-03-09', '2022-03-14 03:08:00', '2022-03-14 03:08:00'),
(47, 'Test Event', '2022-03-02', '2022-03-03', '2022-03-14 06:21:53', '2022-03-14 06:21:53');

-- --------------------------------------------------------

--
-- Table structure for table `examination`
--

CREATE TABLE `examination` (
  `exm_Id` bigint(100) NOT NULL COMMENT 'Exam ID',
  `std_Id` bigint(20) NOT NULL COMMENT 'Student''s ID',
  `exm_Date` date NOT NULL COMMENT 'Exam Date',
  `exm_typ_Id` int(10) NOT NULL COMMENT 'Exma Type''s ID',
  `b-univ_Regno` double(10,2) DEFAULT NULL COMMENT 'Board or University Reg No',
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
(9, 7, NULL, '', 0x507265202031737420436865636b20506f696e74, '2022-02-08', '2022-02-28', 0x5072652031737420436865636b20506f696e74, 'Active', 0),
(10, 7, 9, '', 0x507265202031737420436865636b20506f696e74, '2022-02-08', '2022-02-28', 0x5072652031737420436865636b20506f696e74, 'Active', 9),
(11, 8, NULL, '', 0x50726520326e6420436865636b20506f696e74, '2022-04-14', '2022-04-30', 0x507265205072696d61727920326e6420436865636b20506f696e74, 'Active', 0),
(12, 8, 9, '', 0x50726520326e6420436865636b20506f696e74, '2022-04-14', '2022-04-30', 0x507265205072696d61727920326e6420436865636b20506f696e74, 'Active', 11),
(13, 7, NULL, '', 0x33726420436865636b20506f6e742032303232, '2022-04-01', '2022-04-06', 0x33726420436865636b20506f6e74203230323220666f72207468652077686f6c65207363686f6f6c, 'Active', 0),
(14, 7, 3, '', 0x33726420436865636b20506f6e742032303232, '2022-04-01', '2022-04-06', 0x33726420436865636b20506f6e74203230323220666f72207468652077686f6c65207363686f6f6c, 'Active', 13),
(15, 7, 4, '', 0x33726420436865636b20506f6e742032303232, '2022-04-01', '2022-04-06', 0x33726420436865636b20506f6e74203230323220666f72207468652077686f6c65207363686f6f6c, 'Active', 13),
(16, 7, 7, '', 0x33726420436865636b20506f6e742032303232, '2022-04-01', '2022-04-06', 0x33726420436865636b20506f6e74203230323220666f72207468652077686f6c65207363686f6f6c, 'Active', 13),
(17, 7, 9, '', 0x33726420436865636b20506f6e742032303232, '2022-04-01', '2022-04-06', 0x33726420436865636b20506f6e74203230323220666f72207468652077686f6c65207363686f6f6c, 'Active', 13),
(18, 7, 10, '', 0x33726420436865636b20506f6e742032303232, '2022-04-01', '2022-04-06', 0x33726420436865636b20506f6e74203230323220666f72207468652077686f6c65207363686f6f6c, 'Active', 13);

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

--
-- Dumping data for table `exam_paper`
--

INSERT INTO `exam_paper` (`exampaper_Id`, `exam_Id`, `cls_Id`, `sub_Id`, `paper_File`) VALUES
(9, 9, 17, 9, 'laravel-interview-questions.pdf'),
(10, 11, 17, 9, 'file (22).pdf');

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
(7, '1st Term', 'Active'),
(8, '2nd Term', 'Active'),
(9, '3rd Term', 'Active');

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
  `payable_after_due_date` double(10,2) NOT NULL,
  `account` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fee_schedule`
--

INSERT INTO `fee_schedule` (`fee_sch_Id`, `std_Id`, `bill_Freq`, `payment_Mode`, `acc_Id`, `issue_date`, `due_Date`, `fine_due_Date`, `payable_by_due_date`, `accounts`, `fee_month`, `payable_after_due_date`, `account`) VALUES
(5, 229, 'Monthly', 1, 20, '2022-02-01', '2022-02-06', 500.00, '16240.00', '[{\"\'id\'\":\"2\",\"\'bill_Freq\'\":\"2\",\"\'amount\'\":\"16000\"},{\"\'id\'\":\"3\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"200\"},{\"\'id\'\":\"15\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"10\"},{\"\'id\'\":\"17\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"10\"},{\"\'id\'\":\"28\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"20\"}]', '2022-02-01', 16740.00, NULL),
(6, 108, 'Monthly', 1, 20, '2022-02-01', '2022-02-06', 100.00, '8900.00', '[{\"\'id\'\":\"2\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"2000\"},{\"\'id\'\":\"3\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"1000\"},{\"\'id\'\":\"4\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"3000\"},{\"\'id\'\":\"5\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"200\"},{\"\'id\'\":\"6\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"2000\"},{\"\'id\'\":\"1', '2022-02-01', 9000.00, NULL),
(7, 111, 'Monthly', 1, 20, '2022-01-31', '2022-02-05', 22.00, '9600.00', '[{\"\'id\'\":\"2\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"2000\"},{\"\'id\'\":\"3\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"3000\"},{\"\'id\'\":\"4\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"1500\"},{\"\'id\'\":\"5\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"1000\"},{\"\'id\'\":\"14\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"2000\"},{\"\'id\'\":', '2022-02-01', 9622.00, NULL),
(8, 114, 'Monthly', 2, 20, '2022-02-01', '2022-02-06', 100.00, '5000.00', '[{\"\'id\'\":\"2\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"2000\"},{\"\'id\'\":\"3\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"2000\"},{\"\'id\'\":\"4\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"1000\"}]', '2022-02-01', 5100.00, NULL),
(9, 120, 'Monthly', 1, 20, '2022-02-01', '2022-02-06', 50.00, '5000.00', '[{\"\'id\'\":\"2\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"2000\"},{\"\'id\'\":\"3\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"2000\"},{\"\'id\'\":\"4\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"1000\"}]', '2022-02-01', 5050.00, NULL),
(10, 228, 'Monthly', 1, 20, '2022-03-10', '2022-03-15', 50.00, '4000.00', '[{\"\'id\'\":\"2\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"4000\"}]', '2022-02-01', 4050.00, NULL),
(11, 135, 'Monthly', 1, 20, '2022-02-24', '2022-03-01', 100.00, '41000.00', '[{\"\'id\'\":\"2\",\"\'bill_Freq\'\":null,\"\'amount\'\":\"2000\"},{\"\'id\'\":\"3\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"8000\"},{\"\'id\'\":\"4\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"2000\"},{\"\'id\'\":\"5\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"500\"},{\"\'id\'\":\"6\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"2000\"},{\"\'id\'\":\"', '2022-02-01', 41100.00, NULL),
(12, 136, 'Monthly', 1, 20, '2022-02-25', '2022-03-02', 500.00, '2500.00', '[{\"\'id\'\":\"2\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"2000\"},{\"\'id\'\":\"3\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"500\"}]', '2022-02-01', 3000.00, NULL),
(13, 111, 'Monthly', 1, 20, '2022-03-04', '2022-03-09', 600.00, '15400.00', '[{\"\'id\'\":\"2\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"2000\"},{\"\'id\'\":\"3\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"6000\"},{\"\'id\'\":\"4\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"7000\"},{\"\'id\'\":\"5\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"200\"},{\"\'id\'\":\"6\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"200\"}]', '2022-03-04', 16000.00, NULL),
(14, 135, 'Monthly', 1, 20, '2022-03-01', '2022-03-06', 300.00, '35000.00', '[{\"\'id\'\":\"2\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"24000\"},{\"\'id\'\":\"3\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"3000\"},{\"\'id\'\":\"4\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"3000\"},{\"\'id\'\":\"5\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"3000\"},{\"\'id\'\":\"6\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"2000\"}]', '2022-03-01', 35300.00, NULL),
(15, 141, 'Monthly', 1, 20, '2022-03-01', '2022-03-06', 300.00, '8500.00', '[{\"\'id\'\":\"2\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"2000\"},{\"\'id\'\":\"3\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"3000\"},{\"\'id\'\":\"5\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"2000\"},{\"\'id\'\":\"14\",\"\'bill_Freq\'\":\"2\",\"\'amount\'\":\"300\"},{\"\'id\'\":\"15\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"200\"},{\"\'id\'\":\"28\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"1000\"}]', '2022-03-01', 8800.00, NULL),
(16, 225, 'Monthly', 1, 20, '2022-03-01', '2022-03-06', 200.00, '28190.00', '[{\"\'id\'\":\"2\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"3000\"},{\"\'id\'\":\"3\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"6000\"},{\"\'id\'\":\"4\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"3000\"},{\"\'id\'\":\"5\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"30\"},{\"\'id\'\":\"6\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"3000\"},{\"\'id\'\":\"12\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"6000\"},{\"\'id\'\":\"13\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"2140\"},{\"\'id\'\":\"14\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"2000\"},{\"\'id\'\":\"15\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"1000\"},{\"\'id\'\":\"16\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"2000\"},{\"\'id\'\":\"28\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"20\"}]', '2022-03-01', 28390.00, NULL),
(17, 108, 'Monthly', 1, 20, '2022-03-01', '2022-03-06', 500.00, '29000.00', '[{\"\'id\'\":\"2\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"2000\"},{\"\'id\'\":\"3\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"7000\"},{\"\'id\'\":\"4\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"5000\"},{\"\'id\'\":\"5\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"6000\"},{\"\'id\'\":\"6\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"7000\"},{\"\'id\'\":\"12\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"1000\"},{\"\'id\'\":\"13\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"1000\"}]', '2022-03-01', 29500.00, NULL),
(18, 120, 'Monthly', 1, 20, '2022-03-01', '2022-03-06', 800.00, '3000.00', '[{\"\'id\'\":\"2\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"2000\"},{\"\'id\'\":\"3\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"1000\"}]', '2022-03-01', 3800.00, NULL),
(19, 164, 'Monthly', 1, 20, '2022-03-01', '2022-03-06', 1000.00, '34000.00', '[{\"\'id\'\":\"2\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"24000\"},{\"\'id\'\":\"3\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"1000\"},{\"\'id\'\":\"4\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"1000\"},{\"\'id\'\":\"5\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"1000\"},{\"\'id\'\":\"6\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"1000\"},{\"\'id\'\":\"12\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"6000\"}]', '2022-03-01', 35000.00, NULL),
(20, 152, 'Monthly', 1, 20, '2022-03-01', '2022-03-06', 100.00, '17620.00', '[{\"\'id\'\":\"2\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"2000\"},{\"\'id\'\":\"3\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"6000\"},{\"\'id\'\":\"4\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"2000\"},{\"\'id\'\":\"5\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"100\"},{\"\'id\'\":\"12\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"6000\"},{\"\'id\'\":\"14\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"1500\"},{\"\'id\'\":\"28\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"20\"}]', '2022-03-01', 17720.00, NULL),
(21, 167, 'Monthly', 1, 20, '2022-03-01', '2022-03-06', 100.00, '24150.00', '[{\"\'id\'\":\"2\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"2500\"},{\"\'id\'\":\"3\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"5000\"},{\"\'id\'\":\"4\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"2000\"},{\"\'id\'\":\"5\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"100\"},{\"\'id\'\":\"6\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"1200\"},{\"\'id\'\":\"12\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"6000\"},{\"\'id\'\":\"13\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"3000\"},{\"\'id\'\":\"14\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"2000\"},{\"\'id\'\":\"15\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"2000\"},{\"\'id\'\":\"16\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"30\"},{\"\'id\'\":\"17\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"300\"},{\"\'id\'\":\"28\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"20\"}]', '2022-03-01', 24250.00, NULL),
(22, 143, 'Monthly', 2, 21, '2022-03-01', '2022-03-06', 100.00, '8900.00', '[{\"\'id\'\":\"2\",\"\'bill_Freq\'\":\"2\",\"\'amount\'\":\"8000\"},{\"\'id\'\":\"4\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"300\"},{\"\'id\'\":\"5\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"600\"}]', '2022-03-01', 9000.00, NULL),
(23, 157, 'Monthly', 2, 21, '2022-03-01', '2022-03-06', 100.00, '17000.00', '[{\"\'id\'\":\"2\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"2000\"},{\"\'id\'\":\"3\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"5000\"},{\"\'id\'\":\"4\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"10000\"}]', '2022-03-01', 17100.00, NULL),
(24, 154, 'Monthly', 1, 20, '2022-03-01', '2022-03-06', 100.00, '4000.00', '[{\"\'id\'\":\"2\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"2000\"},{\"\'id\'\":\"4\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"2000\"}]', '2022-03-01', 4100.00, NULL),
(25, 193, 'Monthly', 2, 21, '2022-03-01', '2022-03-06', 100.00, '16220.00', '[{\"\'id\'\":\"2\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"2500\"},{\"\'id\'\":\"3\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"2000\"},{\"\'id\'\":\"4\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"4000\"},{\"\'id\'\":\"5\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"100\"},{\"\'id\'\":\"6\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"1200\"},{\"\'id\'\":\"12\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"1000\"},{\"\'id\'\":\"13\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"1000\"},{\"\'id\'\":\"14\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"2000\"},{\"\'id\'\":\"15\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"2000\"},{\"\'id\'\":\"16\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"200\"},{\"\'id\'\":\"17\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"200\"},{\"\'id\'\":\"28\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"20\"}]', '2022-03-01', 16320.00, NULL),
(26, 129, 'Monthly', 1, 21, '2022-03-01', '2022-03-06', 500.00, '25575.00', '[{\"\'id\'\":\"2\",\"\'amount\'\":\"2000\"},{\"\'id\'\":\"3\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"2555\"},{\"\'id\'\":\"4\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"5000\"},{\"\'id\'\":\"5\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"5000\"},{\"\'id\'\":\"6\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"5000\"},{\"\'id\'\":\"12\",\"\'bill_Freq\'\":\"2\",\"\'amount\'\":\"4000\"},{\"\'id\'\":\"13\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"2000\"},{\"\'id\'\":\"28\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"20\"}]', '2022-03-01', 26075.00, NULL),
(27, 159, 'Monthly', 1, 20, '2022-03-01', '2022-03-06', 20.00, '29220.00', '[{\"\'id\'\":\"2\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"24000\"},{\"\'id\'\":\"6\",\"\'bill_Freq\'\":\"1\",\"\'amount\'\":\"5000\"},{\"\'id\'\":\"17\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"200\"},{\"\'id\'\":\"28\",\"\'bill_Freq\'\":\"3\",\"\'amount\'\":\"20\"}]', '2022-03-01', 29240.00, NULL);

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
(190, 9, '', 'A', 80.00, 100.00, 'A Grade'),
(191, 9, '', 'B', 70.00, 79.00, 'B Grade'),
(192, 9, '', 'C', 60.00, 69.00, 'C Grade'),
(193, 9, '', 'D', 50.00, 59.00, 'D Grade'),
(194, 9, '', 'E', 40.00, 49.00, 'E Grade'),
(195, 9, '', 'Fail', 0.00, 39.00, 'Call Parent'),
(196, 11, '', 'A+', 90.00, 100.00, 'Excellent'),
(197, 11, '', 'A', 70.00, 89.00, 'Very Good'),
(198, 11, '', 'B', 60.00, 69.00, 'Good'),
(199, 11, '', 'C', 50.00, 59.00, 'Standard'),
(200, 11, '', 'D', 40.00, 49.00, 'Satisfactory'),
(201, 11, '', 'E', 30.00, 39.00, 'Unsatisfactory'),
(202, 11, '', 'Fail', 0.00, 29.00, 'Call Parent'),
(203, 13, '', 'A+', 80.00, 100.00, 'A plus Grade'),
(204, 13, '', 'A', 70.00, 79.00, 'A Grade'),
(205, 13, '', 'B', 60.00, 69.00, 'B Grade'),
(206, 13, '', 'C', 50.00, 59.00, 'C Grade'),
(207, 13, '', 'D', 40.00, 49.00, 'D Grade'),
(208, 13, '', 'Fail', 1.00, 39.00, 'Call Parent');

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
(3, 'A+'),
(4, 'A'),
(5, 'B'),
(6, 'C'),
(7, 'D'),
(8, 'E');

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
(51, 17, 'Peshawar modle school', '2022-01-10', 'Vety poor in all subject join jr', 'document1643029950.png', '0912343434'),
(52, 16, 'Wisdom Public School', '2021-01-24', 'having good moral character', 'document1643030928.jpg', '66666666666'),
(53, 18, 'PPC Rawapandi', '2022-01-02', 'Very good at readin', NULL, '0343454545'),
(54, 19, 'Peshawar school', '2022-01-10', 'he is very good in reading', 'document1643033890.jpg', '123423123'),
(55, 16, 'LMS', '2022-01-04', 'very bed in class', 'document1643035000.jpg', '32323234'),
(56, 18, 'Multan Ideal Public School', '2022-01-03', 'Mr Anees is very good in studies', 'document1643051560.png', '030188823123'),
(59, 16, 'Haria Modal school', '2021-01-04', 'very good boy', NULL, '034234545'),
(60, 16, 'Noor acudamy', '2020-02-11', 'She passed Successfully jr', NULL, '05123454345'),
(61, 16, 'modal school faisalabad', '2020-01-06', 'good in all subject', NULL, '0435777898989'),
(62, 16, 'Peshawar Grimmer school', '2021-01-01', 'he is relay good', NULL, '0912356545'),
(63, 17, 'Islamic Public school', '2021-03-04', 'Very good student', NULL, '031256370988'),
(64, 16, 'gulshan public school', '2021-02-03', 'he is very good student', NULL, '092765348617'),
(65, 17, 'star public school mardan', '2021-05-05', 'very good in class', NULL, '0345276865'),
(66, 19, 'PAF', '2022-01-01', 'Having good moral character', 'document1643182110.jpg', '11111111111111'),
(67, 19, 'bright future public school', '2021-05-17', 'very very briallent', 'document1643183039.pdf', '0514545554'),
(68, 20, 'paradise public school rawalipind', '2021-02-14', 'having good moral character', 'document1643183883.pdf', '051473843'),
(69, 19, 'Brialiant future school', '2021-04-09', 'brialliant mind set and having good moral character', 'document1643184487.pdf', '052145458'),
(70, 20, 'Islamia public school', '2021-02-03', 'Good Moral charactor', 'document1643185192.pdf', '0514534545'),
(71, 20, 'the bright future model school', '2021-04-06', 'Mr Farhan is very good in studies and has good moral character', 'document1643191893.pdf', '051453455'),
(72, 20, 'paradise public school rawalipind', '2021-03-03', 'Mr Adeel is very good in studies', 'document1643192414.pdf', '0514534576'),
(73, 20, 'Brialiant future school', '2021-02-03', 'Mr Mehran is very good in studies and also have good moral character', 'document1643192753.jpg', '05145664'),
(74, 21, 'Islamia Model Public school', '2021-07-08', 'Mr  Sabit Mushtaaq is very good in studies and also have good moral character', 'document1643193761.pdf', '051112223'),
(75, 21, 'Beacon House School system', '2021-02-02', 'Mr Mushtaq is very good in studies and also have good moral character', NULL, '0514541114'),
(76, 21, 'Beacon House School system', '2021-09-07', 'Mr Samreen is very good in studies', NULL, '03343534545'),
(77, 21, 'Frobels International School', '2022-01-26', 'Mr have very good moral character', 'document1643195650.pdf', '05145787'),
(78, 21, 'Beacon House School system', '2021-06-08', 'Mr Ashtiaq is very good in studies and also have good moral character', NULL, '051453665'),
(79, 21, 'Schola nova Islamabad', '2021-02-03', 'Miss is very good in studies and also have good moral character', NULL, '051452215'),
(80, 21, 'Schola nova Islamabad', '2021-04-15', 'Mr has very good in studies and also have good moral character', NULL, '032332434343'),
(81, 22, 'paradise public school', '2021-02-25', 'Mr Fazalis very good in studies and also have good moral character', NULL, '03122332434'),
(82, 22, 'Brialiant future school', '2021-02-17', 'Mis Sonia is very good in studies and also have good moral character', NULL, '05122604'),
(83, 22, 'Schola nova Islamabad', '2021-09-08', 'Mr Anees is very good in studies and also have good moral character', NULL, '0514545554'),
(84, 22, 'Schola nova Islamabad', '2021-09-08', 'Mr Anees is very good in studies and also have good moral character', NULL, '0514545554'),
(85, 22, 'Head Start School', '2021-03-24', 'Mr Salman Ali is very good in studies and also have good moral character', NULL, '0514540034'),
(86, 23, 'Schola nova Islamabad', '2021-01-14', 'Mr Anees is very good in studies and also have good moral character', NULL, '0514511123'),
(87, 32, 'Comprehensive Public School', '2022-01-15', 'Having good Moral Character', 'document1643201192.pdf', '05198765365'),
(88, 23, 'Schola nova Islamabad', '2020-03-18', 'Mr Khalid is very good in studies and also have good moral character', NULL, '02332434343'),
(89, 23, 'Brialiant future school', '2021-05-05', 'Mr Furqan is very good in studies and also have good moral character', NULL, '02332434343'),
(90, 23, 'paradise public school rawalipind', '2021-04-15', 'Mr has very good in studies and also have good moral character', NULL, '03365664008'),
(91, 23, 'Beacon House School system', '2021-08-17', 'Mr has very good in studies and also have good moral character', NULL, '052899954'),
(92, 32, 'Wisdom Public School', '2022-01-05', 'Having Good Morak Character', 'document1643203232.pdf', '33333333333'),
(93, 32, 'Wisdom Public School', '2022-01-01', 'Having Good Moral Character', 'document1643203884.pdf', '05198765365'),
(94, 32, 'Comprehensive Public School', '2022-01-05', 'Having Good Moral Character', 'document1643204380.pdf', '33333333333'),
(95, 24, 'Schola nova Islamabad', '2021-10-06', 'Mr  is very good in studies and also have good moral character', NULL, '0514509554'),
(96, 32, 'PAF', '2022-01-02', 'Having Good Moral Character', 'document1643205291.pdf', '092212345678'),
(97, 24, 'Paradise Public School', '2022-01-26', 'Mr Anees is very good in studies and also have good moral character', NULL, '051334554'),
(98, 27, 'Comprehensive Public School', '2021-02-26', 'Good Character', 'document1643206444.pdf', '092212345678'),
(99, 24, 'Beacon House School system', '2021-04-29', 'Mr Ayan is very good in studies and also have good moral character', NULL, '0514545334'),
(100, 27, 'Wisdom Public School', '2022-01-01', 'Having Good Moral Character', 'document1643206695.pdf', '092212345678'),
(101, 24, 'paradise public school rawalipind', '2017-01-05', 'Mr Kamran is very good in studies and also have good moral character', NULL, '051454556'),
(102, 27, 'Comprehensive Public School', '2022-01-01', 'Havving Good Moral Charachter', 'document1643206958.pdf', '04201234585'),
(103, 27, 'Aps Peshawar', '2022-01-01', 'Good Moral Character', 'document1643265045.pdf', '091123456789'),
(104, 27, 'Aps Peshawar', '2022-01-01', 'Good Moral Character', 'document1643265793.pdf', '092212345678'),
(105, 30, 'High School Manadawa', '2022-01-01', 'Having Good Moral Character', 'document1643267696.pdf', '0927123456789'),
(106, 26, 'High School Manadawa', '2022-01-01', 'Having Good Moral Character', 'document1643267978.pdf', '0927123456789'),
(107, 25, 'High School Manadawa', '2022-01-01', 'Having Good Moral Character', 'document1643268266.pdf', '0927123456789'),
(108, 30, 'High School Manadawa', '2022-01-07', 'Having Good Moral Character', 'document1643269164.pdf', '0927123456789'),
(109, 27, 'High School Manadawa', '2022-01-04', 'Having Good Moral Character', 'document1643269479.pdf', '0927123456789'),
(110, 30, 'High School Karak', '2022-01-01', 'Having Good Moral Character', 'document1643272305.pdf', '092799999999'),
(111, 27, 'High School Karak', '2022-01-01', 'Having Good Moral Character', 'document1643275593.pdf', '0927123456789'),
(112, 26, 'High School Karak', '2022-01-01', 'Having Good Moral Character', 'document1643275962.pdf', '0927123456789'),
(113, 25, 'High School Karak', '2022-01-01', 'Having Good Moral Character', 'document1643276239.pdf', '0927123456789'),
(114, 30, 'PAF', '2022-01-01', 'Having Good Moral Character', 'document1643277721.pdf', '0927123456789'),
(115, 27, 'Aps Peshawar', '2022-01-01', 'Having Good Moral Character', 'document1643278122.pdf', '091123456789'),
(116, 20, 'Wisdom Public School', '2021-12-31', 'Having good moral character', 'document1645445315.pdf', '0927123456789'),
(117, 27, 'Comprehensive Public School', '2021-12-31', 'Having Good Moral Character', 'document1647259278.pdf', '092212345678'),
(120, 16, 'Comprehensive Public School', '2022-03-16', 'fewtr2ewtrwer32er32', NULL, '0927123456789'),
(121, 17, 'Comprehensive Public School', '2022-03-31', 'good  moral character in Comprehensive Public School', 'document1648192447.png', '0927123456789'),
(122, 19, 'bright future public school', '2021-05-17', 'very very briallent', 'document1649412901.png', '0514545554'),
(123, 19, 'Brialiant future school', '2021-04-09', 'brilliant mind set and having good moral character', 'document1649413449.png', '052145458');

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
(2, 23),
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
(55, 9, 9, 114, '2022-02-09', '', '', '50', '', '', '', 'A Plus Grade', '50', '', ''),
(56, 9, 9, 117, '2022-02-09', '', '', '30', '', '', '', 'A  Grade', '40', '', ''),
(57, 9, 9, 120, '2022-02-09', '', '', '20', '', '', '', 'B Grade', '40', '', ''),
(64, 13, 12, 114, '2022-05-03', '', '', '35', '', '', '', 'V Good', '35', '2', '2'),
(65, 13, 12, 117, '2022-05-03', '', '', '16', '', '', '', 'Satisfactory', '30', '3', '3'),
(66, 13, 12, 120, '2022-05-03', '', '', '40', '', '', '', 'Excellent', '40', '5', '5'),
(142, 13, 9, 114, '2022-05-03', '', '20', '', '', '', '', NULL, '30', '', ''),
(143, 13, 9, 117, '2022-05-03', '', '25', '', '', '', '', NULL, '30', '', ''),
(144, 13, 9, 120, '2022-05-03', '', '9', '', '', '', '', NULL, '30', '', ''),
(205, 11, 9, 124, '2022-04-15', '', '40', '', '', '', '', 'Excellent', '40', '5', '5'),
(206, 11, 9, 129, '2022-04-15', '', '5', '', '', '', '', 'Call Parent', '10', '5', '5'),
(207, 11, 9, 140, '2022-04-15', '', '30', '', '', '', '', 'Very Good', '30', '5', '5');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'App\\Models\\User', 125),
(1, 'App\\Models\\User', 230),
(1, 'App\\Models\\User', 231),
(1, 'App\\Models\\User', 232),
(1, 'App\\Models\\User', 233),
(1, 'App\\Models\\User', 234),
(1, 'App\\Models\\User', 235),
(1, 'App\\Models\\User', 236),
(1, 'App\\Models\\User', 237),
(1, 'App\\Models\\User', 238),
(1, 'App\\Models\\User', 254),
(1, 'App\\Models\\User', 255),
(1, 'App\\Models\\User', 256),
(1, 'App\\Models\\User', 257),
(1, 'App\\Models\\User', 258),
(1, 'App\\Models\\User', 263),
(1, 'App\\Models\\User', 266),
(1, 'App\\Models\\User', 268),
(1, 'App\\Models\\User', 269),
(1, 'App\\Models\\User', 296),
(1, 'App\\Models\\User', 297),
(2, 'App\\Models\\User', 239),
(2, 'App\\Models\\User', 245),
(2, 'App\\Models\\User', 246),
(2, 'App\\Models\\User', 267),
(4, 'App\\Models\\User', 240),
(4, 'App\\Models\\User', 241),
(4, 'App\\Models\\User', 242),
(4, 'App\\Models\\User', 243),
(4, 'App\\Models\\User', 244),
(4, 'App\\Models\\User', 247),
(4, 'App\\Models\\User', 248),
(4, 'App\\Models\\User', 249),
(5, 'App\\Models\\User', 259),
(5, 'App\\Models\\User', 264),
(5, 'App\\Models\\User', 265),
(5, 'App\\Models\\User', 270),
(6, 'App\\Models\\User', 1),
(7, 'App\\Models\\User', 76),
(9, 'App\\Models\\User', 107),
(9, 'App\\Models\\User', 108),
(9, 'App\\Models\\User', 111),
(9, 'App\\Models\\User', 114),
(9, 'App\\Models\\User', 117),
(9, 'App\\Models\\User', 120),
(9, 'App\\Models\\User', 121),
(9, 'App\\Models\\User', 124),
(9, 'App\\Models\\User', 127),
(9, 'App\\Models\\User', 129),
(9, 'App\\Models\\User', 135),
(9, 'App\\Models\\User', 136),
(9, 'App\\Models\\User', 139),
(9, 'App\\Models\\User', 140),
(9, 'App\\Models\\User', 141),
(9, 'App\\Models\\User', 142),
(9, 'App\\Models\\User', 143),
(9, 'App\\Models\\User', 150),
(9, 'App\\Models\\User', 151),
(9, 'App\\Models\\User', 152),
(9, 'App\\Models\\User', 153),
(9, 'App\\Models\\User', 154),
(9, 'App\\Models\\User', 155),
(9, 'App\\Models\\User', 156),
(9, 'App\\Models\\User', 157),
(9, 'App\\Models\\User', 158),
(9, 'App\\Models\\User', 159),
(9, 'App\\Models\\User', 160),
(9, 'App\\Models\\User', 161),
(9, 'App\\Models\\User', 162),
(9, 'App\\Models\\User', 163),
(9, 'App\\Models\\User', 164),
(9, 'App\\Models\\User', 165),
(9, 'App\\Models\\User', 166),
(9, 'App\\Models\\User', 167),
(9, 'App\\Models\\User', 168),
(9, 'App\\Models\\User', 169),
(9, 'App\\Models\\User', 172),
(9, 'App\\Models\\User', 177),
(9, 'App\\Models\\User', 178),
(9, 'App\\Models\\User', 179),
(9, 'App\\Models\\User', 180),
(9, 'App\\Models\\User', 183),
(9, 'App\\Models\\User', 184),
(9, 'App\\Models\\User', 187),
(9, 'App\\Models\\User', 190),
(9, 'App\\Models\\User', 193),
(9, 'App\\Models\\User', 196),
(9, 'App\\Models\\User', 197),
(9, 'App\\Models\\User', 202),
(9, 'App\\Models\\User', 203),
(9, 'App\\Models\\User', 204),
(9, 'App\\Models\\User', 205),
(9, 'App\\Models\\User', 206),
(9, 'App\\Models\\User', 209),
(9, 'App\\Models\\User', 210),
(9, 'App\\Models\\User', 213),
(9, 'App\\Models\\User', 214),
(9, 'App\\Models\\User', 215),
(9, 'App\\Models\\User', 218),
(9, 'App\\Models\\User', 219),
(9, 'App\\Models\\User', 222),
(9, 'App\\Models\\User', 223),
(9, 'App\\Models\\User', 224),
(9, 'App\\Models\\User', 225),
(9, 'App\\Models\\User', 228),
(9, 'App\\Models\\User', 229),
(9, 'App\\Models\\User', 252),
(9, 'App\\Models\\User', 253),
(9, 'App\\Models\\User', 262),
(9, 'App\\Models\\User', 281),
(9, 'App\\Models\\User', 286),
(9, 'App\\Models\\User', 287),
(9, 'App\\Models\\User', 288),
(9, 'App\\Models\\User', 289),
(9, 'App\\Models\\User', 290),
(9, 'App\\Models\\User', 291),
(10, 'App\\Models\\User', 105),
(10, 'App\\Models\\User', 106),
(10, 'App\\Models\\User', 109),
(10, 'App\\Models\\User', 110),
(10, 'App\\Models\\User', 112),
(10, 'App\\Models\\User', 113),
(10, 'App\\Models\\User', 115),
(10, 'App\\Models\\User', 116),
(10, 'App\\Models\\User', 118),
(10, 'App\\Models\\User', 119),
(10, 'App\\Models\\User', 122),
(10, 'App\\Models\\User', 123),
(10, 'App\\Models\\User', 126),
(10, 'App\\Models\\User', 128),
(10, 'App\\Models\\User', 130),
(10, 'App\\Models\\User', 131),
(10, 'App\\Models\\User', 132),
(10, 'App\\Models\\User', 133),
(10, 'App\\Models\\User', 134),
(10, 'App\\Models\\User', 137),
(10, 'App\\Models\\User', 138),
(10, 'App\\Models\\User', 144),
(10, 'App\\Models\\User', 145),
(10, 'App\\Models\\User', 146),
(10, 'App\\Models\\User', 147),
(10, 'App\\Models\\User', 148),
(10, 'App\\Models\\User', 149),
(10, 'App\\Models\\User', 170),
(10, 'App\\Models\\User', 171),
(10, 'App\\Models\\User', 173),
(10, 'App\\Models\\User', 174),
(10, 'App\\Models\\User', 175),
(10, 'App\\Models\\User', 176),
(10, 'App\\Models\\User', 181),
(10, 'App\\Models\\User', 182),
(10, 'App\\Models\\User', 185),
(10, 'App\\Models\\User', 186),
(10, 'App\\Models\\User', 188),
(10, 'App\\Models\\User', 189),
(10, 'App\\Models\\User', 191),
(10, 'App\\Models\\User', 192),
(10, 'App\\Models\\User', 194),
(10, 'App\\Models\\User', 195),
(10, 'App\\Models\\User', 198),
(10, 'App\\Models\\User', 199),
(10, 'App\\Models\\User', 200),
(10, 'App\\Models\\User', 201),
(10, 'App\\Models\\User', 207),
(10, 'App\\Models\\User', 208),
(10, 'App\\Models\\User', 211),
(10, 'App\\Models\\User', 212),
(10, 'App\\Models\\User', 216),
(10, 'App\\Models\\User', 217),
(10, 'App\\Models\\User', 220),
(10, 'App\\Models\\User', 221),
(10, 'App\\Models\\User', 226),
(10, 'App\\Models\\User', 227),
(10, 'App\\Models\\User', 250),
(10, 'App\\Models\\User', 251),
(10, 'App\\Models\\User', 260),
(10, 'App\\Models\\User', 261),
(10, 'App\\Models\\User', 271),
(10, 'App\\Models\\User', 272),
(10, 'App\\Models\\User', 273),
(10, 'App\\Models\\User', 274),
(10, 'App\\Models\\User', 275),
(10, 'App\\Models\\User', 276),
(10, 'App\\Models\\User', 277),
(10, 'App\\Models\\User', 278),
(10, 'App\\Models\\User', 279),
(10, 'App\\Models\\User', 280),
(10, 'App\\Models\\User', 282),
(10, 'App\\Models\\User', 283),
(10, 'App\\Models\\User', 284),
(10, 'App\\Models\\User', 285),
(10, 'App\\Models\\User', 292),
(10, 'App\\Models\\User', 293),
(10, 'App\\Models\\User', 294),
(10, 'App\\Models\\User', 295);

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
  `pnt_marital_Status` enum('Divorced','Separated','Widow','Married','Single') DEFAULT NULL,
  `working_status` enum('Working Woman','House Wife') DEFAULT NULL,
  `prnt_employer_name` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `pnt_Cnic` varchar(255) DEFAULT NULL,
  `pnt_off_Ph` varchar(255) DEFAULT NULL,
  `pnt_home_Ph` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parent_info`
--

INSERT INTO `parent_info` (`pnt_Id`, `gnd_Id`, `occup_Id`, `std_Id`, `fk_relat_Id`, `pnt_empy_Id`, `desig_Id`, `pnt_marital_Status`, `working_status`, `prnt_employer_name`, `user_id`, `pnt_Cnic`, `pnt_off_Ph`, `pnt_home_Ph`) VALUES
(44, 1, 1, NULL, 4, NULL, 1, 'Married', NULL, 'Point web tech', 105, NULL, '123', '2345'),
(45, 2, 3, NULL, 10, NULL, 1, 'Divorced', 'Working Woman', 'Q Mobile', 106, '1420385549148', '99999999999', '5555555555'),
(46, 1, 3, NULL, 4, NULL, 1, 'Separated', NULL, 'Hair', 109, NULL, NULL, NULL),
(47, 2, NULL, NULL, 10, NULL, NULL, 'Divorced', NULL, NULL, 110, '986745234556', NULL, NULL),
(48, 1, 14, NULL, 4, NULL, 6, 'Married', NULL, 'Lahore Police', 112, NULL, '1111111111111', '1111111111111'),
(49, 2, 5, NULL, 10, NULL, 6, 'Married', NULL, 'Lahore school collage', 113, '1342356545321', NULL, NULL),
(50, 1, 4, NULL, 4, NULL, 1, 'Married', NULL, 'Habib bank ltd', 115, NULL, '22222222222', '22222222222'),
(51, 2, 14, NULL, 10, NULL, 7, 'Separated', 'Working Woman', 'Karachi High Cort', 116, '13452136578987', NULL, NULL),
(52, 1, 147, NULL, 4, NULL, 6, 'Separated', NULL, 'TELENOR', 118, NULL, NULL, NULL),
(53, 2, NULL, NULL, 10, NULL, NULL, 'Divorced', 'House Wife', NULL, 119, '14203445676898', NULL, NULL),
(54, 1, 596, NULL, 4, NULL, 98, 'Divorced', NULL, 'Geo TV', 122, NULL, NULL, NULL),
(55, 2, 184, NULL, 10, NULL, 135, 'Married', NULL, 'civil group', 123, '1457890098006', NULL, NULL),
(56, 1, 1, NULL, 4, NULL, 1, 'Married', NULL, 'Green Line', 126, NULL, NULL, NULL),
(57, 2, NULL, NULL, 10, NULL, NULL, 'Separated', NULL, NULL, 128, '22456789878778', NULL, NULL),
(58, 1, 1, NULL, 4, NULL, 1, 'Married', NULL, 'accountant clerk', 130, NULL, NULL, NULL),
(59, 1, 1, NULL, 4, NULL, 1, 'Divorced', NULL, 'accountant clerk', 131, NULL, NULL, NULL),
(60, 2, NULL, NULL, 10, NULL, NULL, 'Married', 'House Wife', NULL, 132, '1420222289292', NULL, NULL),
(61, 1, 6, NULL, 4, NULL, 12, 'Married', NULL, 'Shell petroleum', 133, NULL, NULL, NULL),
(62, 2, 3, NULL, 10, NULL, 1, 'Married', NULL, 'UBL bank', 134, '375149624801', NULL, NULL),
(63, 1, 52, NULL, 4, NULL, 86, 'Married', NULL, 'Rashma Mail', 137, NULL, '1111111111111', '1111111111111'),
(64, 2, NULL, NULL, 10, NULL, NULL, 'Married', NULL, NULL, 138, '145689065676', NULL, NULL),
(65, 1, 25, NULL, 1, NULL, 11, 'Married', NULL, 'aerobic instructor', 144, NULL, NULL, NULL),
(66, 1, 1, NULL, 4, NULL, 1, 'Married', NULL, 'NAB', 145, NULL, NULL, NULL),
(67, 1, 1, NULL, 1, NULL, 1, 'Married', NULL, 'acountant', 146, NULL, NULL, NULL),
(68, 2, 2, NULL, 10, NULL, 1, 'Divorced', NULL, 'NAB', 147, '5235235323532', NULL, NULL),
(69, 1, 1, NULL, 4, NULL, 1, 'Married', NULL, 'ZTBL', 148, NULL, NULL, NULL),
(70, 2, 2, NULL, 10, NULL, 1, 'Married', NULL, 'ZTBL', 149, '4364576546545', NULL, NULL),
(71, 1, 3, NULL, 1, NULL, 1, 'Married', NULL, 'accountant clerk', 170, NULL, NULL, NULL),
(72, 2, NULL, NULL, 10, NULL, NULL, 'Married', NULL, NULL, 171, '14305660048232', NULL, NULL),
(73, 1, 16, NULL, 4, NULL, 6, 'Married', NULL, 'Ptv', 173, NULL, NULL, NULL),
(74, 2, 2, NULL, 10, NULL, 1, 'Married', NULL, 'National Bank', 174, '2222224555555', NULL, NULL),
(75, 1, 6, NULL, 4, NULL, 7, 'Married', NULL, 'service manager', 175, NULL, NULL, NULL),
(76, 2, NULL, NULL, 10, NULL, NULL, 'Married', NULL, NULL, 176, '1430532323875', NULL, NULL),
(77, 1, 918, NULL, 4, NULL, 163, 'Married', NULL, 'Riphah International University', 181, NULL, NULL, NULL),
(78, 2, 2, NULL, 10, NULL, 1, 'Married', NULL, 'ZTBL', 182, '5436324634643', NULL, NULL),
(79, 1, 12, NULL, 4, NULL, 6, 'Married', NULL, 'NAB', 185, NULL, NULL, NULL),
(80, 2, 2, NULL, 10, NULL, 1, 'Married', NULL, 'Punjab Public School', 186, '4643426345623', NULL, NULL),
(81, 1, 1, NULL, 4, NULL, 1, 'Married', NULL, 'NAB', 188, NULL, NULL, NULL),
(82, 2, 3, NULL, 10, NULL, 1, 'Married', NULL, 'Point Web Tech', 189, '342623576547437', NULL, NULL),
(83, 1, 5, NULL, 4, NULL, 1, 'Married', NULL, 'Accountant Staff', 191, NULL, NULL, NULL),
(84, 2, NULL, NULL, 10, NULL, NULL, 'Married', NULL, NULL, 192, '143033854545', NULL, NULL),
(85, 1, 1, NULL, 4, NULL, 1, 'Married', NULL, 'ZTBL', 194, NULL, NULL, NULL),
(86, 2, 16, NULL, 10, NULL, 6, 'Married', NULL, 'Shaheen Public School', 195, '54657546744564', NULL, NULL),
(87, 1, 242, NULL, 4, NULL, 267, 'Married', NULL, 'NUML', 198, NULL, NULL, NULL),
(88, 2, 216, NULL, 10, NULL, 135, 'Married', NULL, 'FWO', 199, '342343432423', NULL, NULL),
(89, 1, 3, NULL, 4, NULL, 1, 'Married', NULL, 'accountant clerk', 200, NULL, NULL, NULL),
(90, 2, NULL, NULL, 10, NULL, NULL, 'Married', NULL, NULL, 201, '1450344584958', NULL, NULL),
(91, 1, 15, NULL, 4, NULL, 6, 'Married', NULL, 'NAB', 207, NULL, NULL, NULL),
(92, 2, 3, NULL, 10, NULL, 1, 'Married', NULL, 'NAB', 208, '65464536564367', NULL, NULL),
(93, 1, 71, NULL, 4, NULL, 257, 'Married', NULL, 'Elementary School System', 211, NULL, NULL, NULL),
(94, 2, NULL, NULL, 10, NULL, NULL, 'Married', NULL, NULL, 212, '23401789456321', NULL, NULL),
(95, 1, 71, NULL, 4, NULL, 271, 'Married', NULL, 'Mandawa High School', 216, NULL, NULL, NULL),
(96, 2, 374, NULL, 10, NULL, 412, 'Married', NULL, 'NA', 217, '25401965897453', NULL, NULL),
(97, 1, 237, NULL, 4, NULL, 246, 'Married', NULL, 'Secretariat Islamabad', 220, NULL, NULL, NULL),
(98, 2, 542, NULL, 10, NULL, 223, 'Married', NULL, 'PIMS', 221, '2610498745632', NULL, NULL),
(99, 1, 997, NULL, 4, NULL, 52, 'Married', NULL, 'High School Mandawa Karak', 226, NULL, NULL, NULL),
(100, 2, 374, NULL, 10, NULL, 412, 'Married', NULL, 'NA', 227, '413015698745632', NULL, NULL),
(101, 1, 1, NULL, 4, NULL, 1, 'Married', NULL, 'ZTBL', 250, '8977456587965', NULL, NULL),
(102, 2, 2, NULL, 10, NULL, 1, 'Married', NULL, 'National Bank', 251, '85611324412644', NULL, NULL),
(103, 1, 1, NULL, 4, NULL, 1, 'Married', NULL, 'NAB', 260, '1420613136625', NULL, NULL),
(104, 2, 2, NULL, 10, NULL, 1, 'Married', NULL, 'NAB', 261, '1620695874125', NULL, NULL),
(105, 1, 1, NULL, 4, NULL, 1, 'Married', NULL, 'NAB', 271, '16206963852741', '9999999999', '9999999999'),
(106, 1, 1, NULL, 4, NULL, 1, 'Married', 'Working Woman', 'NAB', 272, '25252525252525', '7777777775555', '322222222222'),
(107, 1, 1, NULL, 4, NULL, 1, 'Married', NULL, 'NAB', 273, '6565989874123', '123123123123', '123123123123'),
(108, 2, 2, NULL, 10, NULL, 1, 'Married', 'Working Woman', 'ZTBL', 274, '3523345632463', NULL, NULL),
(109, 2, 2, NULL, 10, NULL, 1, 'Married', 'Working Woman', 'NAB', 275, '951423687258', NULL, NULL),
(110, 2, 2, NULL, 10, NULL, 1, 'Married', 'Working Woman', 'NAB', 276, '43464575467745', '555555555555', '444444444444'),
(111, 2, 997, NULL, 10, NULL, 52, 'Married', 'Working Woman', 'Danish Public School', 277, '72473275347', '1111111222222222', '1111111222222222'),
(112, 1, 1, NULL, 4, NULL, 1, 'Married', NULL, 'Ptv', 278, '6342634225345342', '10101010101010', '10101010101010'),
(113, 1, 1, NULL, 4, NULL, 1, 'Married', NULL, 'NAB', 279, '56478932114785', '5555555555', '5555555555'),
(114, 2, 2, NULL, 10, NULL, 1, 'Married', 'Working Woman', 'Punjab Public School', 280, '542147852369', '88888887777777', '66666666555555'),
(115, 2, NULL, NULL, 10, NULL, NULL, 'Married', 'House Wife', NULL, 282, '3653875328732', NULL, NULL),
(116, 1, 1, NULL, 4, NULL, 1, 'Married', NULL, 'NAB', 283, '56346342264326', '01234567891', '01234567892'),
(117, 1, 1, NULL, 4, NULL, 1, 'Married', NULL, 'Punjab Public School', 284, '123456879546212', '03339654236', '03339654236'),
(118, 2, 1, NULL, 10, NULL, 1, 'Married', 'Working Woman', 'Punjab Public School', 285, '4643266434325435', '03353443510', '03353443510'),
(119, 1, 1, NULL, 4, NULL, 1, 'Married', NULL, 'NAB', 292, '534325346346355', '03339654236', '03339654236'),
(120, 2, 1, NULL, 10, NULL, 1, 'Married', 'Working Woman', 'NAB', 293, '5654747565767', '0519654236', '0519654236'),
(121, 1, 1, NULL, 4, NULL, 1, 'Married', NULL, 'Punjab Public School', 294, '175026456546433', '123456789', '123456789'),
(122, 2, 1, NULL, 10, NULL, 1, 'Married', 'Working Woman', 'ZTBL', 295, '175027956654323', '123456789', '123456789');

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
  `next_pay_date` date DEFAULT NULL,
  `account` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pay_schedule`
--

INSERT INTO `pay_schedule` (`pay_sch_Id`, `emp_Id`, `bill_Freq`, `payment_Mode`, `acc_Id`, `issue_date`, `due_Date`, `pay_total`, `basic_pay`, `allowances`, `deductions`, `billing_rate`, `working_hours`, `no_of_days`, `incr_rate`, `pay_month`, `next_pay_date`, `account`) VALUES
(7, 59, 3, 0, 20, '2022-02-01', '2022-02-28', 20000.00, '20000.00', '{\"arear_total\":\"500\",\"arear\":\"arear\"}', '{\"advance_amount\":\"1000\",\"Installments\":\"2\",\"amount_per_pay_peroid\":\"500\",\"advance\":\"advance\"}', '500', '8', '5', '10', '2022-02-01', '2022-03-05', NULL),
(8, 58, 3, 0, 20, '2022-02-01', '2022-02-28', 5500.00, '6000.00', '{\"arear_total\":\"500\",\"arear\":\"arear\",\"arear_account\":70}', '{\"advance_amount\":\"10000\",\"Installments\":\"10\",\"amount_per_pay_peroid\":\"1000\",\"advance_total\":\"1000\",\"advance\":\"advance\",\"advance_account\":72}', '150', '8', '5', '10', '2022-02-01', '2022-03-05', NULL),
(9, 230, 3, 0, 20, '2022-03-04', '2022-03-04', 12000.00, '12000.00', '[]', '[]', '500', '4', '6', NULL, '2022-03-01', '2022-03-04', NULL),
(10, 232, 3, 0, 21, '2022-03-04', '2022-03-04', 10000.00, '10000.00', '[]', '[]', '500', '4', '5', NULL, '2022-03-01', '2022-03-04', NULL),
(11, 235, 3, 0, 20, '2022-03-01', '2022-03-31', 63000.00, '48000.00', '{\"overtime_rate\":\"50\",\"overtime_hours\":\"10\",\"overtime_total\":\"15000\",\"overtime\":\"overtime\",\"overtime_account\":61,\"overtime_days\":\"30\"}', '[]', '200', '8', '30', '5', '2022-03-01', '2022-04-01', NULL),
(12, 235, 3, 0, 20, '2022-04-01', '2022-04-30', 63000.00, '48000.00', '{\"overtime_rate\":\"50\",\"overtime_hours\":\"10\",\"overtime_total\":\"15000\",\"overtime\":\"overtime\",\"overtime_account\":61,\"overtime_days\":\"30\"}', '[]', '200', '8', '30', '5', '2022-04-01', '2022-05-01', NULL),
(13, 238, 3, 0, 20, '2022-03-01', '2022-03-31', 60000.00, '48000.00', '{\"overtime_rate\":\"50\",\"overtime_hours\":\"8\",\"overtime_total\":\"12000\",\"overtime\":\"overtime\",\"overtime_account\":61,\"overtime_days\":\"30\"}', '[]', '200', '8', '30', '5', '2022-03-01', '2022-04-07', NULL),
(14, 238, 3, 0, 20, '2022-02-01', '2022-02-28', 60000.00, '48000.00', '{\"overtime_rate\":\"50\",\"overtime_hours\":\"8\",\"overtime_total\":\"12000\",\"overtime\":\"overtime\",\"overtime_account\":61,\"overtime_days\":\"30\"}', '[]', '200', '8', '30', '5', '2022-02-01', '2022-03-07', NULL);

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
(1, '1', '08:00', '08:40', 1),
(2, '2', '08:40', '09:20', 2),
(3, '3', '09:20', '10:00', 3),
(4, '4', '10:00', '10:40', 4),
(5, '5', '10:40', '11:20', 5),
(6, '6', '11:20', '12:00', 6),
(18, '7', '12:00', '13:00', 7),
(19, '8', '13:00', '13:40', 8),
(20, '9', '13:40', '14:20', 9);

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
  `exp_file` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prev_experience`
--

INSERT INTO `prev_experience` (`prev_exper_Id`, `prev_exper_Org`, `prev_exper_Position`, `prev_exper_Role`, `prev_Frmdate`, `prev_Todate`, `emp_curr_Org`, `prev_exper_Status`, `exp_file`, `user_id`) VALUES
(10, 'The Mardan Lyceum (School System)', 'English Teacher', 'Teacher', '2022-01-25', '2018-12-30', NULL, NULL, NULL, 125),
(11, 'Comptac Inter College Kohat', 'Computer Instructor', 'Teacher', '2015-10-28', '2014-04-23', NULL, NULL, NULL, 231),
(12, 'Quaid Inter College Kohat', 'Computer Instructor', 'Teacher', '2020-04-23', '2016-02-03', NULL, NULL, NULL, 231),
(13, 'Paradise Public school kohat', 'English', 'Teacher', '2021-10-14', '2022-01-13', NULL, NULL, NULL, 232),
(14, 'Punjab Group of Colleges', 'Chemistry', 'Teacher', '2021-11-12', '2021-02-26', NULL, NULL, NULL, 234),
(15, 'Punjab Group of Colleges', 'Physics Inst', 'Teacher', '2021-01-06', '2021-02-28', NULL, NULL, NULL, 235),
(16, 'Kohat school', 'Teacher', 'teacher', '2018-06-27', '2022-07-21', NULL, NULL, NULL, 240),
(17, 'Pioneer Pets Hospital', 'head', 'surgeon', '2021-02-12', '2022-01-25', NULL, NULL, NULL, 243),
(18, 'APS Rawalpindi', 'Kindergarten', 'Teacher', '2022-01-01', '2022-03-11', NULL, NULL, NULL, 257),
(19, 'PAF School Kohat', 'Computer Teacher', 'Teacher', '2022-03-11', '2017-01-01', NULL, NULL, NULL, 258),
(20, 'Air Indus Pvt Ltd', 'IT Officer', 'Admin', '2013-03-14', '2017-03-14', NULL, NULL, '1647414670.experience.pdf', 259),
(21, 'Air Indus Pvt Ltd', 'IT Officer', 'IT Officer', '2017-03-16', '2013-03-16', NULL, NULL, NULL, 263),
(22, 'Air Indus Pvt Ltd', 'IT Officer', 'IT Officer', '2017-03-23', '2013-03-16', NULL, NULL, NULL, 265),
(23, 'APS DI Khan', 'IT Teacher', 'Teacher', '2013-03-16', '2017-03-16', NULL, NULL, NULL, 266),
(24, 'APS DI Khan', 'IT Teacher', 'Teacher', '2017-03-16', '2013-03-16', NULL, NULL, '1647425772.12.jpg', 269),
(25, 'APS Rawalpindi', 'Librarian', 'Librarian', '2022-03-16', '2010-03-16', NULL, NULL, '1647427284.file (5).pdf', 270),
(26, 'APS DI Khan', 'Librarian', 'Librarian', '2010-04-04', '2020-04-04', NULL, NULL, '1649073281.dadada.pdf', 264);

-- --------------------------------------------------------

--
-- Table structure for table `professional_qualification`
--

CREATE TABLE `professional_qualification` (
  `prof_qual_Id` bigint(10) NOT NULL COMMENT 'Professional Qualification''s ID',
  `prof_qual_Name` varchar(255) NOT NULL COMMENT 'Professional Qualification''s Name (B.Ed,M.ED)',
  `university` varchar(255) NOT NULL,
  `univ_Id` bigint(10) DEFAULT NULL COMMENT 'Qualification''s University',
  `prof_comp_Session` varchar(255) NOT NULL COMMENT 'Session degree completed on'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(13, 'Islam'),
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
(6, 6),
(7, 6),
(8, 6),
(9, 6),
(10, 6),
(11, 6),
(12, 6),
(13, 6),
(14, 6),
(15, 6),
(16, 6),
(17, 6),
(18, 6),
(26, 1),
(26, 6),
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
(42, 2),
(42, 6),
(43, 2),
(43, 6),
(44, 2),
(44, 6),
(45, 2),
(45, 6),
(46, 6),
(47, 2),
(47, 6),
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
  `school_logo` varchar(100) DEFAULT NULL,
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
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`pk_school_Id`, `school_Name`, `school_logo`, `school_abbreviation`, `principal_Name`, `affiliation_No`, `board_Id`, `registration`, `registered_with`, `dom_Id`, `city_Id`, `primary_Contact`, `secondary_Contact`, `school_Add`, `email`, `website`, `start_time`, `end_time`) VALUES
(2, 'Army Public School', 'school1643022507.webp', 'APS', 'Shafiq', 'FBISE Rawalpindi', 2, '136-APS-2021', 'Education Department Punjab', 4, 2, '55555555', '555555555', '7th Road', 'armypub12@gmail.com', 'www.armypublicschool.com', '07:30:00', '14:20:00');

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
  `exam_Module` enum('Theory','Practical','Reading','Writing','Speaking','Listening','Nazra','Attendance','NoteBook') DEFAULT NULL,
  `set_Total` int(10) DEFAULT NULL,
  `set_pass_Per` float(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setsubjectmarks`
--

INSERT INTO `setsubjectmarks` (`submarks_Id`, `exam_Id`, `sc_sec_Id`, `sub_Id`, `set_marks`, `exam_Module`, `set_Total`, `set_pass_Per`) VALUES
(59, 9, 9, 9, NULL, 'Theory', 45, 18.00),
(60, 9, 9, 9, NULL, 'Practical', 45, 18.00),
(61, 9, 9, 9, NULL, 'Attendance', 5, 2.00),
(62, 9, 9, 9, NULL, 'NoteBook', 5, 2.00),
(63, 11, 9, 9, NULL, 'Theory', 45, 18.00),
(64, 11, 9, 9, NULL, 'Nazra', 40, 18.00),
(65, 11, 9, 9, NULL, 'Attendance', 5, 2.00),
(66, 11, 9, 9, NULL, 'NoteBook', 5, 2.00),
(69, 13, 9, 12, NULL, 'Theory', 40, 20.00),
(70, 13, 9, 12, NULL, 'Practical', 40, 20.00),
(71, 13, 9, 12, NULL, 'Attendance', 5, 2.00),
(72, 13, 9, 12, NULL, 'NoteBook', 5, 2.00),
(73, 9, 9, 11, NULL, 'Writing', 50, 20.00),
(78, 13, 10, 9, NULL, 'Theory', 75, 30.00),
(79, 13, 10, 9, NULL, 'Nazra', 25, 10.00),
(80, 13, 9, 9, NULL, 'Theory', 75, 30.00),
(81, 13, 9, 9, NULL, 'Nazra', 25, 10.00);

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
(39, 3014465789, NULL, NULL, 'shafiq1@gmail.com', 'House # 1232, Nai abadi , Nazakath market, Sohan Islamabad', 'House # 1232, Nai abadi , Nazakath market, Sohan Islamabad', '130', '152', '44000', '030155667789', NULL, NULL, 'fazia@gmail.com'),
(40, 12343, 2345, 123, 'admin2322@gmail.com', 'Nai abadi, nazakat market, sohan islamabad', 'Nai abadi, nazakat market, sohan islamabad', '414', '85', '22000', '6333333333333', '555555555555', '444444444444', 'gulazaiwazir@gmail.com'),
(41, 3450987654, NULL, NULL, 'm.faiz@gmail.com', 'House Number 23, Street Number,05, Liaquabad, Rahim year khan, Punjab.', 'House Number 23, Street Number,05, Liaquabad, Rahim year khan, Punjab.', '413', '85', '11000', '034576879809', NULL, NULL, 'm.faiz@gmail.com'),
(42, 32145678900, NULL, NULL, 'waqas.butt@gmail.com', 'House Number 18.Street no 10, DHA block 5, Lahore', 'House Number 18.Street no 10, DHA block 5, Lahore', '267', '74', '54700', '0321345678900', NULL, NULL, 'waqas.butt@gmail.com'),
(43, 321456789098, 321456789098, 321456789098, 'akram.jamil@gmail.com', 'House no#23, Karachi caunt , Karachi', 'House no#23, Karachi caunt , Karachi', '273', '104', '77060', '03214567890987', '321456789098', '321456789098', 'akram.jamil@gmail.com'),
(44, 3436534567878, NULL, NULL, 'laiq.khan@gmail.com', 'House no#23, street 12, sector 4 Khoat', 'House no#23, street 12, sector 4 Khoat', '247', '43', '26000', '03436789098', NULL, NULL, 'hussan.pari@gmail.com'),
(45, 3015388827, NULL, NULL, 'shafiq@gmail.com', 'House number 04, nai abadi , nazakt market, sohan Islamabad', 'House number 04, nai abadi , nazakt market, sohan Islamabad', '130', '152', '44000', '03015388827', NULL, NULL, 'shafiq@gmail.com'),
(46, 345900023400, NULL, NULL, 'm.saqaiq@gmail.com', 'House no# 23, street number 17, New modal town , Faisalabad', 'House no# 23, street number 17, New modal town , Faisalabad', '88', '65', '38000', '034590008003', NULL, NULL, 'amna.sadiq@gmail.com'),
(47, 330931826788888, 330931826788888, 330931826788888, 'faizbutt@gmail.com', 'shah colony ,okara', 'shah colony ,okara', '384', '83', '56300', '0330931826788888', '0330931826788888', '0330931826788888', 'nadiabutt@gmail.com'),
(48, 3425678970, NULL, NULL, 'mir.shahid@gmail.com', 'House number23, street number12, phase 4, Hayat Abad,Peshawar', 'House number23, street number12, phase 4, Hayat Abad,Peshawar', '396', '51', '25000', '032134545654', NULL, NULL, 'sonia@gmail.com'),
(49, 31257689875, NULL, NULL, 'ali.rehman@gmail.com', 'Houser number 45, double Road, main Quetta Bazar', 'Houser number 45, double Road, main Quetta Bazar', '410', '25', '87300', '021356324590', NULL, NULL, 'nabela.ali@gmail.com'),
(50, 31257689875, NULL, 132547932456, 'laiq.khan@gmail.com', 'latamber , district karak', 'latamber , district karak', '188', '42', '46300', '03124568902', NULL, NULL, 'hussan.pari@gmail.com'),
(51, 31256785645, NULL, NULL, 'nadeen.mailk@gmail.com', 'house number 23, street number 3, sector 4, shaikh moltoon town, mardan', 'house number 23, street number 3, sector 4, shaikh moltoon town, mardan', '318', '49', '23200', '0934523456', NULL, NULL, 'tatima.mailk@gmail.com'),
(52, 332898698, 332898698, 332898698, 'rafiullah11@gmail.com', 'village and post office takhti nasrati, karak', 'village and post office takhti nasrati, karak', '188', '42', '27200', '0333234343443', '0333234343443', '0333234343443', 'shaziahassan11@gmail.com'),
(53, 33454656656565, 33454656656565, 33454656656565, 'faizbutt@gmail.com', 'amin abad, paracha town, pindi road kohat', 'amin abad, paracha town, pindi road kohat', '247', '43', '26000', '033555656766', '033555656766', '033555656766', 'nadiabutt@gmail.com'),
(54, 335568569586, 335568569586, 335568569586, 'saleem@gmail.com', 'paracha town pindi road kohat', 'paracha town pindi road kohat', '247', '43', '26000', '0331498545495', '0331498545495', '0331498545495', 'saba@gmail.com'),
(55, 32143483946, 32143483946, 32143483946, 'akramjamil@gmail.com', 'village and post office hangu', 'village and post office hangu', '119', '40', '26190', '0315576767777', '0315576767777', '0315576767777', 'misakram@gmai.com'),
(56, 33333333333, 33333333333, 33333333333, 'zabitnoor@gmail.com', 'F-11 Islamabad', 'F-11 Islamabad', '130', '152', '44000', '44444444444', '4444444444', '4444444444', 'saimakhan@gmail.com'),
(57, 344656596859, 344656596859, 344656596859, 'zarwali@gmail.com', 'shamsabad 6th road, rawalpindi', 'shamsabad 6th road, rawalpindi', '425', '87', '46000', '03456596859', '03456596859', '03456596859', 'sharmeen@gmail.com'),
(58, 3215849854, 3215849854, 3215849854, 'tahirsaddique@gmail.com', 'Sector h-3, G11 islamabad', 'Sector h-3, G11 islamabad', '130', '152', '44000', '03239405490', '03239405490', '03239405490', 'sadia4545@gmail.com'),
(59, 324434356, 324434356, 324434356, 'rehman11@gmail.com', 'sector h-3, i-8 islamabad', 'sector h-3, i-8 islamabad', '130', '152', '44000', '03494598045', '03494598045', '03494598045', 'nabeela@gmail.com'),
(60, 32424545344, 32424545344, 32424545344, 'sarfaz@gmial.com', 'Faisal Colony , golrha morh rawalipind', 'Faisal Colony , golrha morh rawalipind', '425', '87', '46000', '032254857458', '032254857458', '032254857458', 'saima222@gmail.com'),
(61, 32254857458, NULL, NULL, 'shakeelrehaman@gmail.com', 'I-8, Islamabad', 'I-8, Islamabad', '130', '152', '44000', '0322548574455', NULL, NULL, 'nabeela323@gmail.com'),
(62, 32154857458, NULL, NULL, 'shahid33@gmail.com', 'G-13 sector #3, isalmabad', 'G-13 sector #3, isalmabad', '130', '152', '44000', '033254857458', NULL, NULL, 'mirshahid@gmail.com'),
(63, 32254857458, NULL, NULL, 'mrbutt@gmail.com', 'I-8, Islamabad', 'I-8, Islamabad', '130', '152', '44000', '032154857458', NULL, NULL, 'mrbutt@gmail.com'),
(64, 3225485666, NULL, NULL, 'test@gmail.com', 'G-13 sector #34, islamabad', 'G-13 sector #34, islamabad', '130', '152', '44000', '032254823266', NULL, NULL, 'miss@gmail.com'),
(65, 34554857458, NULL, NULL, 'test@gmail.com', 'I-8, Islamabad', 'I-8, Islamabad', '130', '152', '44000', '033554857458', NULL, NULL, 'test@gmail.com'),
(66, 301556677998, NULL, NULL, 'salmabutt@gmail.com', '525 Usman Plaza Main Murree Road Barakahu Islamabad', '525 Usman Plaza Main Murree Road Barakahu Islamabad', '130', '152', '44000', '030100667789', NULL, NULL, 'nadiabutt@gmail.com'),
(67, 30355667789, NULL, NULL, 'saleem22@gmail.com', '85 - East Kamran Center Block F Blue Area Jinnah Avenue Islamabad', '85 - East Kamran Center Block F Blue Area Jinnah Avenue Islamabad', '130', '152', '44000', '030255667789', NULL, NULL, 'miss@gmail.com'),
(68, 30155667711, NULL, NULL, 'faizullah122@gmail.com', 'Al-Riaz Plaza Express Way Service Road Khanna Dak Rawalpindi', 'Al-Riaz Plaza Express Way Service Road Khanna Dak Rawalpindi', '425', '87', '46000', '030355667711', NULL, NULL, 'faiza@gmail.com'),
(69, 30155667009, NULL, NULL, 'test@gmail.com', 'Block 5-C F-10 Markaz Branch Islamabad', 'Block 5-C F-10 Markaz Branch Islamabad', '130', '152', '43600', '030055667789', NULL, NULL, 'test@gmail.com'),
(70, 338551112330, NULL, NULL, 'test@gmail.com', 'Block 5-C F-10 Markaz Branch Islamabad', 'Block 5-C F-10 Markaz Branch Islamabad', '130', '152', '44000', '03385518823', NULL, NULL, 'test@gmail.com'),
(71, 3323434873458, NULL, NULL, 'test@gmail.com', 'Skyways Plaza Plot No. 203 Street No.01 Sector I-10/3 Industrial Area Islamabad', 'Skyways Plaza Plot No. 203 Street No.01 Sector I-10/3 Industrial Area Islamabad', '130', '152', '43600', '03123434873', NULL, NULL, 'test@gmail.com'),
(72, 3025511098, NULL, NULL, 'ikram12@gmail.com', '85 - East Kamran Center Block F Blue Area Jinnah Avenue Islamabad', '85 - East Kamran Center Block F Blue Area Jinnah Avenue Islamabad', '130', '152', '44000', '03029998098', NULL, NULL, 'missakram@gmail.com'),
(73, 3125566756, NULL, NULL, 'test@gmail.com', 'Air Headquarter (inside premises), Shopping Complex, E-9, Islamabad', 'Air Headquarter (inside premises), Shopping Complex, E-9, Islamabad', '130', '152', '43600', '03215566756', NULL, NULL, 'test@gmail.com'),
(74, 3125566756, NULL, NULL, 'test@gmail.com', 'Air Headquarter (inside premises), Shopping Complex, E-9, Islamabad', 'Air Headquarter (inside premises), Shopping Complex, E-9, Islamabad', '130', '152', '43600', '03215566756', NULL, NULL, 'test@gmail.com'),
(75, 33243434436, NULL, NULL, 'test@gmail.com', 'Plot No.12, Asia Plaza, FECHS, E11/2, Islamabad', 'Plot No.12, Asia Plaza, FECHS, E11/2, Islamabad', '130', '152', '43600', '03324343006', NULL, NULL, 'test@gmail.com'),
(76, 30155622311, NULL, NULL, 'test@gmail.com', 'Ahmed Plaza, Taramri Chowk, Lehtrar Road, Islamabad', 'Ahmed Plaza, Taramri Chowk, Lehtrar Road, Islamabad', '425', '87', '43600', '03015563334', NULL, NULL, 'test@gmail.com'),
(77, 3324400054, 3324400054, 3324400054, 'farhan@gmail.com', 'Shop No 1 and 2 Ground Floor Old Sams Building ,The Mall Murree', 'Shop No 1 and 2 Ground Floor Old Sams Building ,The Mall Murree', '425', '87', '46000', '03324405540', '03324405540', '03324405540', 'nabeel22@gmail.com'),
(78, 333123456789, 333123456789, 333123456789, 'arbazgul@gmail.com', 'Saddar Cantt Rawalpindi', 'Saddar Cantt Rawalpindi', '425', '87', '46000', '03000123456789', '03000123456789', '03000123456789', 'saimajana@gmail.com'),
(79, 3145670089, 3145670089, 3145670089, 'mansoor@gmail.com', 'Old Naval Head Quarter Melody Service Block Sector G-6 Islamabad', 'Old Naval Head Quarter Melody Service Block Sector G-6 Islamabad', '130', '152', '43600', '0314560089', '0314560089', '0314560089', 'sararafi@gmail.com'),
(80, 33567788989, 33567788989, 33567788989, 'faizullah122@gmail.com', 'Village and Post office Latember, Karak', 'Village and Post office Latember, Karak', '188', '42', '43600', '03346454654', '03346454654', '03346454654', 'missfaiz@gmail.com'),
(81, 32254857998, 32254857998, 32254857998, 'test@gmail.com', 'Ground Floor, Niazi Plaza, Golra Mor, Opposite Quaid-e-Azam Hospital, Peshawar Road, Rawalpindi', 'Ground Floor, Niazi Plaza, Golra Mor, Opposite Quaid-e-Azam Hospital, Peshawar Road, Rawalpindi', '425', '87', '43600', '032254800158', '032254800158', '032254800158', 'test@gmail.com'),
(82, 3325455567, 3325455567, NULL, 'sharif@gmail.com', 'Old Naval Head Quarter Melody Service Block Sector G-6 Islamabad', 'Old Naval Head Quarter Melody Service Block Sector G-6 Islamabad', '130', '152', '44000', '03325400327', '03325400327', '03325400327', 'amna3444@gmail.com'),
(83, 88888888888, 88888888888, 88888888888, 'zahidorakzai@gmail.com', 'Saddar Rawalpindi', 'Saddar Rawalpindi', '386', '124', '232322', '77777777777', '77777777777', '77777777777', 'nadiaorakzai@gmail.com'),
(84, 222222222222, 222222222222, 222222222222, 'abbaskhan@gmail.com', 'F-11 Markaz Islamabad', 'F-11 Markaz Islamabad', '130', '152', '44000', '555555555555', '555555555555', '555555555555', 'sadiakhan@gmail.com'),
(85, 42123456789, 42123456789, 42123456789, 'abbastaimoor@gmail.com', 'Lahore City', 'Lahore City', '266', '74', '54000', '042123456789', '042123456789', '042123456789', 'sadaftaimoor@gmail.com'),
(86, 32574857481, 32574857481, 32574857481, 'shahjagan@gmail.com', 'Rehmat Centre I-8 Markaz Islamabad', 'Rehmat Centre I-8 Markaz Islamabad', '130', '152', '44000', '03457485748', '03457485748', '03457485748', 'shaista@gmail.com'),
(87, 9220123456789, 9220123456789, 9220123456789, 'gulshanislam@gmail.com', 'Kohat CIty', 'Kohat CIty', '247', '43', '26000', '09220123456789', '09220123456789', '09220123456789', 'guladama@gmail.com'),
(88, 3445676677, 3445676677, 3445676677, 'wahid33@gmail.com', 'Village and Consil Latember, Disttrict and Tehsil Karak', 'Village and Consil Latember, Disttrict and Tehsil Karak', '188', '42', '27200', '0334556677', '0334556677', '0334556677', 'saima2235@gmail.com'),
(89, 74185208965241, 74185208965241, 74185208965241, 'umarasad@gmail.com', 'Gawadar Sindh', 'Gawadar Sindh', '112', '6', '91200', '74185208965241', '74185208965241', '74185208965241', 'sofiaasad@gmail.com'),
(90, 32445677801, 32445677801, 32445677801, 'abbas@gmail.com', 'Chattri Chowk Near Khanna Pull Islamabad Highway Rawalpindi', 'Chattri Chowk Near Khanna Pull Islamabad Highway Rawalpindi', '425', '87', '46000', '031449877801', '031449877801', '031449877801', 'kashafsb@gmail.com'),
(91, 9220123456789, 9220123456789, 9220123456789, 'gulshanislam@gmail.com', 'FR Kohat', 'FR Kohat', '95', '128', '26111', '09220123456789', '09220123456789', '09220123456789', 'guladama@gmail.com'),
(92, 3345569854, 3345569854, 3345569854, 'javedkhan@gmail.com', 'Chattri Chowk Near Khanna Pull Islamabad Highway Rawalpindi', 'Chattri Chowk Near Khanna Pull Islamabad Highway Rawalpindi', '425', '87', '46000', '03215645874', '03215645874', '03215645874', 'kashafsb@gmail.com'),
(93, 42123456789, 42123456789, 42123456789, 'arbabtaimoor@gmail.com', 'Lahore City', 'Lahore City', '266', '74', '54000', '042123456789', '042123456789', '042123456789', 'sadaftaimoor@gmail.com'),
(94, 927123456789, 927123456789, 927123456789, 'muhammadismail@gmail.com', 'Village & Post Office Mandawa Tehsil & District Karak', 'Village & Post Office Mandawa Tehsil & District Karak', '188', '42', '27200', '0927123456789', '0927123456789', '0927123456789', 'zareengul@gmail.com'),
(95, 927123456789, 927123456789, 927123456789, 'muhammadismail@gmail.com', 'Village and Post Office Mandawa Tehsil And District Karak', 'Village and Post Office Mandawa Tehsil And District Karak', '188', '42', '27200', '0927123456789', '0927123456789', '0927123456789', 'zareengul@gmail.com'),
(96, 927123456789, 927123456789, 927123456789, 'sultanaziz@gmail.com', 'Village and Post Office Mandawa Tehsil & District Karak', 'Village and Post Office Mandawa Tehsil & District Karak', '188', '42', '27200', '0927123456789', '0927123456789', '0927123456789', 'fehmidakhattak@gmail.com'),
(97, 927123456789, 927123456789, 927123456789, 'sultanaziz@gmail.com', 'Village and Post Office Mandawa Tehsil and District Karak', 'Village and Post Office Mandawa Tehsil and District Karak', '188', '42', '27200', '0927123456789', '0927123456789', '0927123456789', 'fehmidakhattak@gmail.com'),
(98, 927123456789, 927123456789, 927123456789, 'sultanaziz@gmail.com', 'Village and Post Office Mandawa Tehsil and District Karak', 'Village and Post Office Mandawa Tehsil and District Karak', '188', '42', '27200', '0927123456789', '0927123456789', '0927123456789', 'fehmidakhattak@gmail.com'),
(99, 927123456789, 927123456789, 927123456789, 'gulrehman@gmail.com', 'Village and Post Office Mandawa Tehsil and District Karak', 'Village and Post Office Mandawa Tehsil and District Karak', '187', '42', '26400', '0927123456789', '0927123456789', '0927123456789', 'gushadana@gmail.com'),
(100, 927123456789, 927123456789, 927123456789, 'gulrehman@gmail.com', 'Village and Post Office Mandawa Tehsil and District Karak', 'Village and Post Office Mandawa Tehsil and District Karak', '187', '42', '26400', '0927123456789', '0927123456789', '0927123456789', 'gulshadana@gmail.com'),
(101, 92799999999999, 92799999999999, 92799999999999, 'abadgul@gmail.com', 'Karak City', 'Karak City', '188', '42', '27200', '092799999999999', '092799999999999', '092799999999999', 'nawabjana@gmail.com'),
(102, 927123456789, 927123456789, 927123456789, 'abadgul@gmail.com', 'Karak CIty', 'Karak CIty', '188', '42', '27200', '0927123456789', '0927123456789', '0927123456789', 'nawabjana@gmail.com'),
(103, 927123456789, 927123456789, 927123456789, 'abadgul@gmail.com', 'Karak City', 'Karak City', '188', '42', '27200', '0927123456789', '0927123456789', '0927123456789', 'nawabjana@gmail.com'),
(104, 927123456789, 927123456789, 927123456789, 'abadgul@gmail.com', 'Karack City', 'Karack City', '188', '42', '27200', '092799999999999', '092799999999999', '092799999999999', 'nawabjana@gmail.com'),
(105, 927123456789, 927123456789, 927123456789, 'tajriatkhan@gmail.com', 'Village and Post Office Mandawa Tehsil and District Karak', 'Village and Post Office Mandawa Tehsil and District Karak', '188', '42', '27200', '0927123456789', '0927123456789', '0927123456789', 'zarijaan@gmail.com'),
(106, 927123456789, 927123456789, 927123456789, 'tajriatkhan@gmail.com', 'Village and Post Office Mandawa Tehsil and District Karak', 'Village and Post Office Mandawa Tehsil and District Karak', '188', '42', '27200', '0927123456789', '0927123456789', '0927123456789', 'zarijaan@gmail.com'),
(107, 222222222222, 222222222222, 222222222222, 'zafarhabib@gmail.com', 'Chack Shehzad, Islamabad', 'Village and Post Office Mandawa, Tehsil and District, Karak', '188', '42', '27200', '333333333333', '333333333333', '333333333333', 'raheelarauf@gamil.com'),
(108, 99999999999, 99999999999, 99999999999, 'sultanaziz@gmail.com', 'Chakar Coat Kohat', 'Village and Post Office Mandawa Tehsil and District Karak', '188', '42', '27200', '99999999999', '99999999999', '99999999999', 'fehmidakhattak@gmail.com'),
(109, 99999999999, 99999999999, 99999999999, 'muhammadakmal@gmail.com', 'Viilage and Post Office Mandawa Tehsil and District Kohat', 'Viilage and Post Office Mandawa Tehsil and District Kohat', '247', '43', '26000', '99999999999', '99999999999', '99999999999', 'noreenakmal@gmail.com'),
(110, 3339654236, 3339654236, 3339654236, 'guldadkhan@gmail.com', 'Dhok Syeda Rawalpindi', 'Dhok Syeda Rawalpindi', '425', '87', '46000', '03353443510', '03353443510', '03353443510', 'bibijanana@gmail.com'),
(111, 3339654236, 3339654236, 3339654236, 'guldadkhan@gmail.com', 'Dhok Syeda Rawalpindi', 'Dhok Syeda Rawalpindi', '425', '87', '46000', '03353443510', '03353443510', '03353443510', 'bibijanana@gmail.com'),
(112, 3339654236, 3339654236, 3339654236, 'guldadkhan@gmail.com', 'Dhok Syedan Rawalpindi', 'Dhok Syedan Rawalpindi', '425', '87', '46000', '03353443510', '03353443510', '03353443510', 'bibijanana@gmail.com'),
(113, 3339654236, 3339654236, 3339654236, 'gulzarali@gmail.com', 'Lakki Marwat City', 'Lakki Marwat City', '270', '45', '28420', '0519654236', '0519654236', '0519654236', 'GulzarBegum@gmail.com'),
(114, 1111111111111, 1111111111111, 1111111111111, 'waqasbutt@gmail.com', 'G-11 Markaz', 'G-11 Markaz', '130', '152', '44000', '222222222222', '99999999999', '5555555555', 'fizanoor@gmail.com'),
(115, 222222222222, 222222222222, 222222222222, 'akramjamali@gmail.com', 'village and post office hangu', 'village and post office hangu', '120', '40', '18001', '1111111111111', '1111111111111', '1111111111111', 'missakramjamali@gmail.com'),
(116, 1111111111111, 1111111111111, 1111111111111, 'nadeemmalik@gmail.com', 'shamsabad 6th road, rawalpindi', 'shamsabad 6th road, rawalpindi', '425', '87', '46000', '22222222222', '22222222222', '22222222222', 'sharmeennaaz@gmail.com'),
(117, 324434356, 324434356, 324434356, 'alirehman@gmail.com', 'sector h-3, i-8 islamabad', 'sector h-3, i-8 islamabad', '130', '152', '44000', '03494598045', '03494598045', '03494598045', 'nabelaali@gmail.com'),
(118, 123456789, 123456789, 123456789, 'alizafar@gmail.com', 'DI Khan City', 'DI Khan City', '83', '39', '29050', '123456789', '123456789', '123456789', 'saniazafar@gmail.com');

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
(20, 1, '2015-07-16', 6, 13, 74, 101, 5, 13, 3, 3, 56, 84, 10, 19, NULL, 105, 106, 39, 107, 27, NULL, NULL, 0),
(21, 1, '2015-04-04', 6, 13, 85, 89, 5, 13, 3, 3, 0, 85, 11, 16, NULL, 105, 276, 40, 108, NULL, NULL, NULL, 1),
(22, 1, '2015-07-24', 6, 13, 43, 260, 4, 13, 3, 3, 1, 86, 12, 16, NULL, 109, 110, 41, 111, NULL, NULL, NULL, 1),
(23, 1, '2014-03-13', 7, 13, 74, 42, 6, 13, 6, 3, 120, 87, 13, 17, NULL, 112, 113, 42, 114, 22, NULL, NULL, 0),
(24, 1, '2014-03-20', 7, 13, 104, 114, 8, 13, 3, 3, 119, 88, 14, 17, NULL, 115, 116, 43, 117, 22, NULL, NULL, 1),
(25, 1, '2014-03-06', 7, 156, 43, 156, 7, 13, 3, 3, 59, 89, 15, 17, NULL, 118, 119, 44, 120, 22, NULL, NULL, 0),
(26, 2, '2014-03-13', 7, 13, 152, 156, 5, 13, 3, 3, 60, 90, 16, 17, NULL, 105, 106, 45, 121, NULL, NULL, NULL, 1),
(27, 1, '2014-06-24', 7, 156, 65, 89, 5, 13, 1, 3, 61, 91, 17, 17, NULL, 122, 123, 46, 124, 39, NULL, NULL, 0),
(28, 1, '2013-11-20', 8, 13, 83, 156, 4, 13, 3, 3, NULL, 93, 18, 16, NULL, 112, 113, 47, 127, 21, NULL, 1, 1),
(29, 1, '2014-11-20', 7, 156, 51, 350, 8, 13, 3, 3, 62, 94, 19, 17, NULL, 126, 128, 48, 129, 39, NULL, NULL, 0),
(30, 1, '2013-07-23', 8, 13, 25, 7, 6, 13, 3, 3, 63, 95, 20, 18, NULL, 133, 134, 49, 135, 21, NULL, 1, 0),
(31, 1, '2013-02-06', 8, 156, 42, 156, 5, 13, 1, 3, 64, 96, 21, 18, NULL, 118, 119, 50, 136, 21, NULL, 2, 0),
(32, 2, '2013-06-11', 8, 13, 49, 350, 5, 13, 4, 3, 65, 97, 22, 18, NULL, 137, 138, 51, 139, 21, NULL, 3, 1),
(33, 1, '1997-03-06', 24, 156, 42, 156, 5, 13, 4, 3, 0, 98, 23, 17, NULL, 112, 113, 52, 140, 39, NULL, NULL, 1),
(37, 2, '2014-01-26', 8, 13, 152, 1, 5, 13, 3, 3, 66, 102, 27, 20, NULL, 148, 149, 56, 150, 28, NULL, 1, 1),
(39, 1, '2008-09-16', 13, 156, 87, 6, 5, 13, 3, 1, 68, 104, 29, 20, NULL, 146, 149, 58, 152, 28, 'Heart disease', 2, 0),
(41, 1, '2009-05-18', 12, 156, 42, 156, 6, 13, 5, 3, 70, 106, 31, 20, NULL, 148, 149, 60, 154, 28, NULL, 3, 0),
(42, 1, '2011-01-19', 11, 156, 152, 2, 4, 13, 3, 3, 71, 107, 32, 21, NULL, 144, 134, 61, 155, 34, NULL, NULL, 0),
(43, 1, '2010-10-22', 11, 156, 152, 2, 6, 13, 5, 3, 72, 108, 33, 21, NULL, 126, 119, 62, 156, 37, NULL, NULL, 0),
(44, 1, '2010-07-21', 11, 156, 87, 3, 5, 13, 3, 3, 73, 109, 34, 21, NULL, 112, 113, 63, 157, 37, NULL, NULL, 0),
(45, 1, '2012-06-14', 9, 156, 152, 4, 4, 13, 3, 3, 74, 110, 35, 21, NULL, 105, 106, 64, 158, NULL, NULL, NULL, 0),
(46, 1, '2010-01-22', 12, 156, 152, 3, 5, 13, 4, 3, 75, 111, 36, 22, NULL, 145, 138, 65, 159, NULL, NULL, NULL, 0),
(47, 2, '2011-12-31', 10, 156, 152, 1, 6, 13, 6, 3, 76, 112, 37, 21, NULL, 112, 113, 66, 160, NULL, NULL, NULL, 0),
(48, 1, '2009-07-23', 12, 156, 152, 3, 6, 13, 3, 3, 77, 113, 38, 22, NULL, 131, 149, 67, 161, NULL, NULL, NULL, 0),
(49, 1, '2009-06-24', 12, 156, 87, 7, 6, 13, 3, 3, 78, 114, 39, 22, NULL, 109, 106, 68, 162, NULL, NULL, NULL, 0),
(50, 2, '2009-07-23', 12, 156, 152, 2, 4, 13, 4, 3, 79, 115, 40, 22, NULL, 131, 147, 69, 163, NULL, NULL, NULL, 0),
(51, 1, '2009-07-25', 12, 156, 152, 2, 5, 13, 3, 3, 80, 116, 41, 22, NULL, 122, 123, 70, 164, NULL, NULL, NULL, 0),
(52, 1, '2008-07-26', 13, 156, 152, 4, 6, 13, 4, 3, 81, 117, 42, 23, NULL, 105, 138, 71, 165, NULL, NULL, NULL, 0),
(53, 2, '2008-07-25', 13, 156, 152, 2, 4, 13, 4, 3, 82, 118, 43, 23, NULL, 115, 116, 72, 166, NULL, NULL, NULL, 0),
(54, 1, '2007-07-12', 14, 13, 152, 3, 7, 13, 5, 3, 84, 120, 45, 23, NULL, 126, 128, 74, 168, NULL, NULL, NULL, 1),
(55, 1, '2006-08-24', 15, 156, 152, 2, 5, 13, 4, 3, NULL, 121, 46, 23, NULL, 109, 110, 75, 167, NULL, NULL, NULL, 0),
(56, 1, '2007-07-26', 14, 156, 87, 6, 5, 13, 3, 3, 85, 122, 47, 23, NULL, 126, 128, 76, 169, NULL, NULL, NULL, 0),
(57, 1, '2007-11-29', 14, 13, 87, 6, 6, 13, 6, 3, 86, 123, 48, 24, NULL, 170, 171, 77, 172, NULL, NULL, NULL, 1),
(58, 2, '2005-01-26', 17, 156, 87, 4, 5, 13, 4, 3, 87, 124, 49, 33, NULL, 173, 174, 78, 177, NULL, NULL, NULL, 0),
(59, 1, '2007-06-19', 14, 13, 152, 6, 5, 13, 5, 3, 88, 125, 50, 24, NULL, 175, 176, 79, 178, NULL, NULL, NULL, 1),
(60, 1, '2008-11-20', 13, 13, 42, 156, 5, 13, 1, 3, 89, 126, 51, 24, NULL, 109, 110, 80, 179, NULL, NULL, NULL, 1),
(61, 1, '2008-08-21', 13, 13, 152, 7, 5, 13, 4, 3, 90, 127, 52, 24, NULL, 137, 147, 81, 180, NULL, NULL, NULL, 1),
(62, 1, '2007-07-13', 14, 13, 152, 5, 3, 13, 1, 3, 91, 128, 53, 24, NULL, 118, 123, 82, 183, NULL, NULL, NULL, 1),
(63, 2, '2005-01-22', 17, 156, 87, 239, 5, 13, 3, 3, 92, 129, 54, 33, NULL, 181, 182, 83, 184, NULL, NULL, NULL, 0),
(64, 1, '2005-01-26', 17, 13, 152, 3, 5, 13, 4, 3, 93, 130, 55, 33, NULL, 185, 186, 84, 187, NULL, NULL, NULL, 1),
(65, 1, '2004-01-21', 18, 156, 74, 29, 5, 13, 1, 1, 94, 131, 56, 33, NULL, 188, 189, 85, 190, NULL, 'Eye Sight Week', NULL, 0),
(66, 1, '2005-06-22', 16, 156, 87, 12, 5, 13, 3, 3, 95, 132, 57, 25, NULL, 191, 192, 86, 193, NULL, NULL, NULL, 0),
(67, 2, '2006-01-26', 16, 156, 128, 5, 6, 13, 1, 3, 96, 133, 58, 33, NULL, 194, 195, 87, 196, NULL, NULL, NULL, 0),
(68, 1, '2007-01-16', 15, 156, 42, 156, 6, 13, 3, 3, 97, 134, 59, 25, NULL, 137, 174, 88, 197, NULL, NULL, NULL, 0),
(69, 1, '2007-01-24', 15, 156, 6, 268, 5, 13, 3, 3, 98, 135, 60, 32, NULL, 198, 199, 89, 202, NULL, NULL, NULL, 0),
(70, 1, '2008-07-24', 13, 156, 87, 12, 6, 13, 3, 3, 99, 136, 61, 25, NULL, 200, 201, 90, 203, NULL, NULL, NULL, 0),
(71, 2, '2007-01-26', 15, 156, 128, 5, 6, 13, 3, 3, 100, 137, 62, 32, NULL, 194, 195, 91, 204, NULL, NULL, NULL, 0),
(72, 1, '2006-07-20', 15, 13, 87, 11, 5, 13, 3, 3, 101, 138, 63, 25, NULL, 200, 201, 92, 205, NULL, NULL, NULL, 0),
(73, 1, '2004-01-26', 18, 156, 74, 39, 5, 13, 4, 3, 102, 139, 64, 32, NULL, 188, 189, 93, 206, NULL, NULL, NULL, 0),
(74, 1, '2003-01-27', 19, 156, 42, 156, 5, 13, 1, 3, 103, 140, 65, 32, NULL, 207, 208, 94, 209, NULL, NULL, NULL, 0),
(75, 1, '2004-01-27', 18, 156, 42, 156, 5, 13, 1, 3, 104, 141, 66, 32, NULL, 207, 208, 95, 210, NULL, NULL, NULL, 0),
(76, 1, '2006-01-27', 16, 156, 42, 156, 5, 13, 3, 3, 105, 142, 67, 31, NULL, 211, 212, 96, 213, NULL, NULL, NULL, 0),
(77, 1, '2008-01-27', 14, 156, 42, 156, 5, 13, 1, 3, 106, 143, 68, 27, NULL, 211, 212, 97, 214, NULL, NULL, NULL, 0),
(78, 1, '2009-01-27', 13, 156, 42, 156, 5, 13, 3, 3, 107, 144, 69, 26, NULL, 211, 212, 98, 215, NULL, NULL, NULL, 0),
(79, 2, '2005-01-27', 17, 13, 42, 156, 5, 13, 3, 3, 108, 145, 70, 31, NULL, 216, 217, 99, 218, NULL, NULL, NULL, 1),
(80, 1, '2008-01-27', 14, 156, 42, 156, 5, 13, 3, 3, 109, 146, 71, 30, NULL, 216, 217, 100, 219, NULL, NULL, NULL, 0),
(81, 1, '2005-01-27', 17, 156, 42, 156, 3, 13, 3, 3, 110, 147, 72, 31, NULL, 220, 221, 101, 222, NULL, NULL, NULL, 0),
(82, 2, '2008-01-27', 14, 156, 42, 156, 5, 13, 3, 3, 111, 148, 73, 30, NULL, 220, 221, 102, 223, NULL, NULL, NULL, 0),
(83, 1, '2008-01-26', 14, 156, 42, 156, 4, 13, 3, 3, 112, 149, 74, 27, NULL, 220, 221, 103, 224, NULL, NULL, NULL, 0),
(84, 1, '2009-01-27', 13, 156, 42, 156, 5, 13, 3, 3, 113, 150, 75, 26, NULL, 220, 221, 104, 225, NULL, NULL, NULL, 0),
(85, 1, '2006-01-27', 16, 156, 42, 156, 5, 13, 3, 3, 114, 151, 76, 31, NULL, 226, 227, 105, 228, NULL, NULL, NULL, 0),
(86, 1, '2007-01-24', 15, 156, 42, 156, 5, 13, 3, 3, 115, 152, 77, 30, NULL, 226, 227, 106, 229, NULL, NULL, NULL, 0),
(87, 1, '2016-02-21', 6, 156, 42, 156, 3, 13, 4, 3, 0, 173, 78, 18, NULL, 250, 251, 107, 252, 38, NULL, NULL, 1),
(89, 1, '1988-04-10', 33, 13, 42, 156, 5, 13, 4, 3, 117, 180, 80, 28, NULL, 260, 261, 109, 262, NULL, NULL, NULL, 1),
(90, 1, '2015-03-25', 7, 13, 87, 5, 3, 13, 3, 3, 121, 191, 86, 18, NULL, 284, 285, 110, 290, 38, NULL, NULL, 0),
(91, 1, '2017-01-10', 5, 156, 87, 5, 5, 13, 3, 3, 0, 192, 87, 19, NULL, 284, 285, 111, 291, 27, NULL, NULL, 1),
(92, 1, '2015-03-25', 7, 156, 87, 5, 5, 13, 3, 3, 1, 193, 88, 19, NULL, 284, 285, 112, 289, 27, NULL, NULL, 1),
(93, 1, '2015-04-04', 7, 156, 45, 203, 4, 13, 4, 3, 1, 194, 89, 18, NULL, 292, 293, 113, 141, 38, NULL, NULL, 1),
(94, 1, '2009-08-21', 12, 156, 152, 2, 5, 13, 3, 3, 1, 196, 90, 19, NULL, 112, 106, 114, 142, NULL, NULL, NULL, 1),
(95, 2, '2010-06-22', 11, 156, 40, 2, 3, 13, 4, 3, 1, 197, 91, 19, NULL, 115, 116, 115, 143, NULL, NULL, NULL, 1),
(96, 2, '2011-07-12', 10, 156, 152, 109, 5, 13, 1, 3, 122, 198, 92, 20, NULL, 137, 132, 116, 151, NULL, NULL, NULL, 0),
(97, 1, '2009-06-16', 12, 156, 152, 2, 5, 13, 3, 3, 123, 199, 93, 20, NULL, 133, 134, 117, 153, NULL, NULL, NULL, 0),
(98, 2, '2010-04-08', 12, 156, 39, 3, 5, 13, 4, 3, 1, 200, 94, 19, NULL, 294, 295, 118, 253, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_sessions`
--

CREATE TABLE `student_sessions` (
  `id` int(10) UNSIGNED NOT NULL,
  `session_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `roll` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `optional_subject` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_sessions`
--

INSERT INTO `student_sessions` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `roll`, `optional_subject`, `created_at`, `updated_at`) VALUES
(2, 2022, 262, 28, 0, '', NULL, '2022-03-14 12:01:18', '2022-03-14 12:01:18'),
(3, 2021, 117, 17, 0, '', NULL, '2022-03-16 13:04:12', '2022-03-16 13:04:12'),
(4, 2019, 114, 17, 0, '', NULL, '2022-03-16 13:38:56', '2022-03-16 13:38:56'),
(5, 2022, 107, 19, 0, '', NULL, '2022-03-18 06:12:39', '2022-03-18 06:12:39'),
(6, 2022, 108, 16, 0, '', NULL, '2022-03-18 13:18:25', '2022-03-18 13:18:25'),
(7, 2022, 290, 18, 38, '', NULL, '2022-03-25 07:05:00', '2022-03-25 07:05:00'),
(8, 2022, 291, 19, 0, '', NULL, '2022-03-25 07:22:30', '2022-03-25 07:22:30'),
(9, 2022, 289, 19, 0, '', NULL, '2022-03-25 07:36:01', '2022-03-25 07:36:01'),
(10, 2021, 111, 16, 0, '', NULL, '2022-04-04 05:35:46', '2022-04-04 05:35:46'),
(11, 2022, 150, 20, 28, '', NULL, '2022-04-04 09:35:06', '2022-04-04 09:35:06'),
(12, 2022, 152, 20, 28, '', NULL, '2022-04-04 09:35:06', '2022-04-04 09:35:06'),
(13, 2022, 154, 20, 28, '', NULL, '2022-04-04 09:35:06', '2022-04-04 09:35:06'),
(14, 2022, 151, 20, 33, '', NULL, '2022-04-04 09:56:05', '2022-04-04 09:56:05'),
(15, 2022, 153, 20, 33, '', NULL, '2022-04-04 09:56:05', '2022-04-04 09:56:05'),
(16, 2022, 141, 18, 38, '', NULL, '2022-04-04 10:57:50', '2022-04-04 10:57:50'),
(17, 2022, 142, 19, 0, '', NULL, '2022-04-05 10:16:18', '2022-04-05 10:16:18'),
(18, 2022, 143, 19, 0, '', NULL, '2022-04-05 10:23:31', '2022-04-05 10:23:31'),
(19, 2022, 156, 21, 37, '', NULL, '2022-04-06 07:36:16', '2022-04-06 07:36:16'),
(20, 2022, 157, 21, 37, '', NULL, '2022-04-06 07:36:16', '2022-04-06 07:36:16'),
(21, 2019, 135, 18, 0, '', NULL, '2022-04-08 10:00:13', '2022-04-08 10:00:13'),
(22, 2022, 253, 19, 0, '', NULL, '2022-04-08 10:32:49', '2022-04-08 10:32:49'),
(23, 2022, 252, 18, 38, '', NULL, '2022-04-11 10:12:35', '2022-04-11 10:12:35'),
(24, 2022, 124, 17, 39, '', NULL, '2022-04-14 07:31:59', '2022-04-14 07:31:59'),
(25, 2022, 129, 17, 39, '', NULL, '2022-04-14 07:31:59', '2022-04-14 07:31:59'),
(26, 2022, 140, 17, 39, '', NULL, '2022-04-14 07:31:59', '2022-04-14 07:31:59');

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
(1, '2022-02-10', 17, 22, 11, NULL, 'sdgwatwertewrwe', 'file (21).pdf', NULL, 'Whole Class', 'Test Topic', '114,117,120', 125, 0),
(2, '2022-02-10', 17, 22, 11, 114, 'sdgwatwertewrwe', 'file (21).pdf', NULL, 'Whole Class', 'Test Topic', NULL, 125, 1),
(3, '2022-02-10', 17, 22, 11, 117, 'sdgwatwertewrwe', 'file (21).pdf', NULL, 'Whole Class', 'Test Topic', NULL, 125, 1),
(5, '2022-02-10', 17, 22, 11, 120, 'sdgwatwertewrwe', 'file (21).pdf', '', 'Whole Class', 'Test Topic', NULL, 125, 1),
(10, '2022-12-25', 17, 22, 11, NULL, 'Quad e Azam Day  Speech', 'file (21).pdf', NULL, 'Whole Class', 'Quad e Azam Day', NULL, 125, 0),
(11, '2022-12-25', 17, 22, 11, 114, 'Quad e Azam Day  Speech', 'file (21).pdf', NULL, 'Whole Class', 'Quad e Azam Day', NULL, 125, 10),
(12, '2022-12-25', 17, 22, 11, 117, 'Quad e Azam Day  Speech', 'file (21).pdf', NULL, 'Whole Class', 'Quad e Azam Day', NULL, 125, 10),
(13, '2022-12-25', 17, 22, 11, 120, 'Quad e Azam Day  Speech', 'file (21).pdf', NULL, 'Whole Class', 'Quad e Azam Day', NULL, 125, 10),
(14, '2022-03-30', 17, 22, 9, NULL, 'adaaaa', 'file (25).pdf', NULL, 'Whole Class', 'Sura Baqara last 2 Ayat Reading', NULL, 238, 0),
(15, '2022-03-30', 17, 22, 9, 114, 'adaaaa', 'file (25).pdf', NULL, 'Whole Class', 'Sura Baqara last 2 Ayat Reading', NULL, 238, 14),
(16, '2022-03-30', 17, 22, 9, 117, 'adaaaa', 'file (25).pdf', NULL, 'Whole Class', 'Sura Baqara last 2 Ayat Reading', NULL, 238, 14),
(17, '2022-03-30', 17, 22, 9, 120, 'adaaaa', 'file (25).pdf', NULL, 'Whole Class', 'Sura Baqara last 2 Ayat Reading', NULL, 238, 14);

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
(57, 11, 17, 9, 'file (22).pdf'),
(58, 9, 17, 11, 'Admin  Board.pdf'),
(59, 9, 16, 12, 'Admin  Board.pdf'),
(60, 9, 17, 11, 'rafi.jpg');

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
  `Narration` varchar(255) DEFAULT NULL,
  `Vtype` varchar(255) DEFAULT NULL,
  `char_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`tr_Id`, `tr_Type`, `tr_Date`, `acc_Id`, `dr_Amt`, `cr_Amt`, `bl_Amt`, `tr_Status`, `std_Id`, `emp_Id`, `supp_Id`, `month`, `schedule_id`, `Narration`, `Vtype`, `char_id`) VALUES
(67, '3', '2021-11-09 12:06:45', '20', 2800.00, 2800.00, 0.00, 'Close', 6, NULL, NULL, '2021-11-01', 4, NULL, NULL, 0),
(73, '2', '2021-11-10 12:00:00', '65', 2800.00, 2800.00, 0.00, 'Close', 6, NULL, NULL, '2021-11-10', 4, NULL, NULL, 0),
(74, '3', '2022-02-07 13:52:36', '20', 48240.00, 48240.00, 0.00, 'Close', 229, NULL, NULL, '2022-02-01', 5, NULL, NULL, 0),
(75, '2', '2022-07-02 12:00:00', '20', 25000.00, 25000.00, 23740.00, 'Partial', 229, NULL, NULL, '2022-02-07', 5, NULL, NULL, 0),
(76, '2', '2022-02-11 12:00:00', '65', 48740.00, 48740.00, 0.00, 'Close', 229, NULL, NULL, '2022-02-07', 5, NULL, NULL, 0),
(77, '1', '2022-02-07 14:45:26', '20', 3200.00, 3200.00, 0.00, 'Close', 108, NULL, NULL, '2022-02-01', 6, NULL, NULL, 0),
(78, '2', '2022-07-02 12:00:00', '20', 3300.00, 3300.00, 0.00, 'Close', 108, NULL, NULL, '2022-02-07', 6, NULL, NULL, 0),
(79, '1', '2022-02-07 19:04:27', '20', 6600.00, 6600.00, 0.00, 'Close', 111, NULL, NULL, '2022-02-01', 7, NULL, NULL, 0),
(80, '3', '2022-02-07 19:19:21', '20', 5000.00, 5000.00, 0.00, 'Close', 114, NULL, NULL, '2022-02-01', 8, NULL, NULL, 0),
(81, '2', '2022-02-16 12:00:00', '65', 5100.00, 5100.00, 0.00, 'Close', 114, NULL, NULL, '2022-02-07', 8, NULL, NULL, 0),
(82, '1', '2022-02-07 19:28:35', '20', 5000.00, 5000.00, 0.00, 'Close', 114, NULL, NULL, '2022-02-01', 8, NULL, NULL, 0),
(83, '2', '2022-07-02 12:00:00', '20', 400.00, 400.00, 4700.00, 'Partial', 114, NULL, NULL, '2022-02-07', 8, NULL, NULL, 0),
(84, '2', '2022-07-02 12:00:00', '20', 5100.00, 5100.00, 0.00, 'Close', 114, NULL, NULL, '2022-02-07', 8, NULL, NULL, 0),
(85, '1', '2022-02-08 09:13:54', '20', 5000.00, 5000.00, 0.00, 'Close', 120, NULL, NULL, '2022-02-01', 9, NULL, NULL, 0),
(86, '2', '2022-08-02 12:00:00', '20', 3050.00, 3050.00, 2000.00, 'Partial', 120, NULL, NULL, '2022-02-08', 9, NULL, NULL, 0),
(87, '2', '2022-08-02 12:00:00', '20', 2050.00, 2050.00, 3000.00, 'Partial', 120, NULL, NULL, '2022-02-08', 9, NULL, NULL, 0),
(88, '2', '2022-08-02 12:00:00', '20', 3050.00, 3050.00, 2000.00, 'Partial', 120, NULL, NULL, '2022-02-08', 9, NULL, NULL, 0),
(89, '1', '2022-03-10 12:00:00', '3103', 0.00, 0.00, 0.00, 'Open', 0, NULL, NULL, '2022-02-23', 10, 'Fees generated form student id 228', 'Fee Generated', 0),
(90, '1', '2022-03-10 12:00:00', '228', 0.00, 0.00, 0.00, 'Open', 228, NULL, NULL, '2022-03-10', 10, 'Fees generated form student id 228', 'Fee Generated', 0),
(91, '2', '1970-01-01 12:00:00', '3103', 0.00, 50000.00, 0.00, 'Close', 0, NULL, NULL, '2022-02-23', 10, 'Fees payment for student 228', 'Fees payment', 0),
(92, '2', '1970-01-01 12:00:00', '20', 50000.00, 0.00, 0.00, 'Close', 0, NULL, NULL, '2022-02-23', 10, 'Fees payment for student 228', 'Fees payment', 0),
(93, '2', '1970-01-01 12:00:00', '3103', 0.00, 50000.00, 0.00, 'Close', 0, NULL, NULL, '2022-02-23', 10, 'Fees payment for student 228', 'Fees payment', 0),
(94, '2', '1970-01-01 12:00:00', '20', 50000.00, 0.00, 0.00, 'Close', 0, NULL, NULL, '2022-02-23', 10, 'Fees payment for student 228', 'Fees payment', 0),
(95, '2', '1970-01-01 12:00:00', '3103', 0.00, 50000.00, 0.00, 'Close', 0, NULL, NULL, '2022-02-23', 10, 'Fees payment for student 228', 'Fees payment', 0),
(96, '2', '1970-01-01 12:00:00', '20', 50000.00, 0.00, 0.00, 'Close', 0, NULL, NULL, '2022-02-23', 10, 'Fees payment for student 228', 'Fees payment', 0),
(97, '2', '1970-01-01 12:00:00', '3103', 0.00, 5000.00, 0.00, 'Close', 0, NULL, NULL, '2022-02-23', 7, 'Fees payment for student 111', 'Fees payment', 0),
(98, '2', '1970-01-01 12:00:00', '20', 5000.00, 0.00, 0.00, 'Close', 0, NULL, NULL, '2022-02-23', 7, 'Fees payment for student 111', 'Fees payment', 0),
(99, '2', '1970-01-01 12:00:00', '111', 0.00, 5000.00, 1600.00, 'Close', 111, NULL, NULL, '2022-02-23', 7, 'Fees payment for student 111', 'Fees payment', 0),
(100, '2', '1970-01-01 12:00:00', '3103', 0.00, 1600.00, 0.00, 'Close', 0, NULL, NULL, '2022-02-23', 7, 'Fees payment for student 111', 'Fees payment', 0),
(101, '2', '1970-01-01 12:00:00', '20', 1600.00, 0.00, 0.00, 'Close', 0, NULL, NULL, '2022-02-23', 7, 'Fees payment for student 111', 'Fees payment', 0),
(102, '2', '1970-01-01 12:00:00', '111', 0.00, 1600.00, 0.00, 'Close', 111, NULL, NULL, '2022-02-23', 7, 'Fees payment for student 111', 'Fees payment', 0),
(103, '2', '1970-01-01 12:00:00', '3103', 0.00, 2000.00, 0.00, 'Close', 0, NULL, NULL, '2022-02-23', 9, 'Fees payment for student 120', 'Fees payment', 0),
(104, '2', '1970-01-01 12:00:00', '20', 2000.00, 0.00, 0.00, 'Close', 0, NULL, NULL, '2022-02-23', 9, 'Fees payment for student 120', 'Fees payment', 0),
(105, '2', '1970-01-01 12:00:00', '120', 0.00, 2000.00, 0.00, 'Close', 120, NULL, NULL, '2022-02-23', 9, 'Fees payment for student 120', 'Fees payment', 0),
(106, '1', '2022-01-31 12:00:00', '2', 0.00, 2000.00, 0.00, 'Open', 0, NULL, NULL, '2022-02-24', 7, 'Fees generated form student id 111', 'Fee Generated', 0),
(107, '1', '2022-01-31 12:00:00', '3', 0.00, 3000.00, 0.00, 'Open', 0, NULL, NULL, '2022-02-24', 7, 'Fees generated form student id 111', 'Fee Generated', 0),
(108, '1', '2022-01-31 12:00:00', '4', 0.00, 1500.00, 0.00, 'Open', 0, NULL, NULL, '2022-02-24', 7, 'Fees generated form student id 111', 'Fee Generated', 0),
(109, '1', '2022-01-31 12:00:00', '5', 0.00, 1000.00, 0.00, 'Open', 0, NULL, NULL, '2022-02-24', 7, 'Fees generated form student id 111', 'Fee Generated', 0),
(110, '1', '2022-01-31 12:00:00', '28', 0.00, 100.00, 0.00, 'Open', 0, NULL, NULL, '2022-02-24', 7, 'Fees generated form student id 111', 'Fee Generated', 0),
(111, '1', '2022-01-31 12:00:00', '3103', 7600.00, 0.00, 0.00, 'Open', 0, NULL, NULL, '2022-02-24', 7, 'Fees generated form student id 111', 'Fee Generated', 0),
(112, '1', '2022-01-31 12:00:00', '111', 7600.00, 0.00, 0.00, 'Close', 111, NULL, NULL, '2022-01-31', 7, 'Fees generated form student id 111', 'Fee Generated', 0),
(113, '2', '1970-01-01 12:00:00', '3103', 0.00, 5600.00, 0.00, 'Close', 0, NULL, NULL, '2022-02-24', 7, 'Fees payment for student 111', 'Fees payment', 0),
(114, '2', '1970-01-01 12:00:00', '20', 5600.00, 0.00, 0.00, 'Close', 0, NULL, NULL, '2022-02-24', 7, 'Fees payment for student 111', 'Fees payment', 0),
(115, '2', '1970-01-01 12:00:00', '111', 0.00, 5600.00, 2000.00, 'Close', 111, NULL, NULL, '2022-02-24', 7, 'Fees payment for student 111', 'Fees payment', 0),
(116, '2', '1970-01-01 12:00:00', '3103', 0.00, 2000.00, 0.00, 'Close', 0, NULL, NULL, '2022-02-24', 7, 'Fees payment for student 111', 'Fees payment', 0),
(117, '2', '1970-01-01 12:00:00', '20', 2000.00, 0.00, 0.00, 'Close', 0, NULL, NULL, '2022-02-24', 7, 'Fees payment for student 111', 'Fees payment', 0),
(118, '2', '1970-01-01 12:00:00', '111', 0.00, 2000.00, 0.00, 'Close', 111, NULL, NULL, '2022-02-24', 7, 'Fees payment for student 111', 'Fees payment', 0),
(119, '1', '2022-02-24 12:00:00', '3103', 0.00, 0.00, 0.00, 'Open', 0, NULL, NULL, '2022-02-24', 11, 'Fees generated form student id 135', 'Fee Generated', 0),
(120, '1', '2022-02-24 12:00:00', '135', 0.00, 0.00, 0.00, 'Open', 135, NULL, NULL, '2022-02-24', 11, 'Fees generated form student id 135', 'Fee Generated', 0),
(121, '1', '2022-02-24 12:00:00', '3103', 0.00, 0.00, 0.00, 'Open', 135, NULL, NULL, '2022-03-04', 11, 'Fees generated form student id 135', 'Fee Generated', 0),
(122, '1', '2022-02-24 12:00:00', '135', 0.00, 0.00, 0.00, 'Open', 135, NULL, NULL, '2022-02-24', 11, 'Fees generated form student id 135', 'Fee Generated', 1),
(142, '1', '2022-03-01 12:00:00', '2', 0.00, 2000.00, 0.00, 'Open', 141, NULL, NULL, '2022-03-04', 15, 'Fees generated form student id 141', 'Fee Generated', 0),
(143, '1', '2022-03-01 12:00:00', '3', 0.00, 3000.00, 0.00, 'Open', 141, NULL, NULL, '2022-03-04', 15, 'Fees generated form student id 141', 'Fee Generated', 0),
(144, '1', '2022-03-01 12:00:00', '5', 0.00, 2000.00, 0.00, 'Open', 141, NULL, NULL, '2022-03-04', 15, 'Fees generated form student id 141', 'Fee Generated', 0),
(145, '1', '2022-03-01 12:00:00', '14', 0.00, 300.00, 0.00, 'Open', 141, NULL, NULL, '2022-03-04', 15, 'Fees generated form student id 141', 'Fee Generated', 0),
(146, '1', '2022-03-01 12:00:00', '15', 0.00, 200.00, 0.00, 'Open', 141, NULL, NULL, '2022-03-04', 15, 'Fees generated form student id 141', 'Fee Generated', 0),
(147, '1', '2022-03-01 12:00:00', '28', 0.00, 1000.00, 0.00, 'Open', 141, NULL, NULL, '2022-03-04', 15, 'Fees generated form student id 141', 'Fee Generated', 0),
(148, '1', '2022-03-01 12:00:00', '3103', 8500.00, 0.00, 0.00, 'Open', 141, NULL, NULL, '2022-03-04', 15, 'Fees generated form student id 141', 'Fee Generated', 0),
(149, '1', '2022-03-01 12:00:00', '141', 8500.00, 0.00, 8500.00, 'Open', 141, NULL, NULL, '2022-03-01', 15, 'Fees generated form student id 141', 'Fee Generated', 1),
(150, '1', '2022-03-01 12:00:00', '2', 0.00, 3000.00, 0.00, 'Open', 225, NULL, NULL, '2022-03-04', 16, 'Fees generated form student id 225', 'Fee Generated', 0),
(151, '1', '2022-03-01 12:00:00', '3', 0.00, 6000.00, 0.00, 'Open', 225, NULL, NULL, '2022-03-04', 16, 'Fees generated form student id 225', 'Fee Generated', 0),
(152, '1', '2022-03-01 12:00:00', '4', 0.00, 3000.00, 0.00, 'Open', 225, NULL, NULL, '2022-03-04', 16, 'Fees generated form student id 225', 'Fee Generated', 0),
(153, '1', '2022-03-01 12:00:00', '5', 0.00, 30.00, 0.00, 'Open', 225, NULL, NULL, '2022-03-04', 16, 'Fees generated form student id 225', 'Fee Generated', 0),
(154, '1', '2022-03-01 12:00:00', '6', 0.00, 3000.00, 0.00, 'Open', 225, NULL, NULL, '2022-03-04', 16, 'Fees generated form student id 225', 'Fee Generated', 0),
(155, '1', '2022-03-01 12:00:00', '12', 0.00, 6000.00, 0.00, 'Open', 225, NULL, NULL, '2022-03-04', 16, 'Fees generated form student id 225', 'Fee Generated', 0),
(156, '1', '2022-03-01 12:00:00', '13', 0.00, 2140.00, 0.00, 'Open', 225, NULL, NULL, '2022-03-04', 16, 'Fees generated form student id 225', 'Fee Generated', 0),
(157, '1', '2022-03-01 12:00:00', '14', 0.00, 2000.00, 0.00, 'Open', 225, NULL, NULL, '2022-03-04', 16, 'Fees generated form student id 225', 'Fee Generated', 0),
(158, '1', '2022-03-01 12:00:00', '15', 0.00, 1000.00, 0.00, 'Open', 225, NULL, NULL, '2022-03-04', 16, 'Fees generated form student id 225', 'Fee Generated', 0),
(159, '1', '2022-03-01 12:00:00', '16', 0.00, 2000.00, 0.00, 'Open', 225, NULL, NULL, '2022-03-04', 16, 'Fees generated form student id 225', 'Fee Generated', 0),
(160, '1', '2022-03-01 12:00:00', '28', 0.00, 20.00, 0.00, 'Open', 225, NULL, NULL, '2022-03-04', 16, 'Fees generated form student id 225', 'Fee Generated', 0),
(161, '1', '2022-03-01 12:00:00', '3103', 28190.00, 0.00, 0.00, 'Open', 225, NULL, NULL, '2022-03-04', 16, 'Fees generated form student id 225', 'Fee Generated', 0),
(162, '1', '2022-03-01 12:00:00', '225', 28190.00, 0.00, 13790.00, 'Partial', 225, NULL, NULL, '2022-03-01', 16, 'Fees generated form student id 225', 'Fee Generated', 1),
(163, '2', '2022-03-04 12:00:00', '3103', 0.00, 0.00, 0.00, 'Close', 225, NULL, NULL, '2022-03-04', 0, 'Fees ajustment  for student 225', 'Fees ajustment', 0),
(164, '2', '2022-03-04 12:00:00', '65', 0.00, 0.00, 0.00, 'Close', 225, NULL, NULL, '2022-03-04', 0, 'Fees ajustment  for student 225', 'Fees ajustment', 0),
(165, '2', '2022-03-04 12:00:00', '3103', 0.00, 0.00, 0.00, 'Close', 225, NULL, NULL, '2022-03-04', 0, 'Fees ajustment  for student 225', 'Fees ajustment', 0),
(166, '2', '2022-03-04 12:00:00', '65', 0.00, 0.00, 0.00, 'Close', 225, NULL, NULL, '2022-03-04', 0, 'Fees ajustment  for student 225', 'Fees ajustment', 0),
(167, '2', '2022-03-04 12:00:00', '3103', 0.00, 3000.00, 0.00, 'Close', 225, NULL, NULL, '2022-03-04', 16, 'Fees payment for student 225', 'Fees payment', 0),
(168, '2', '2022-03-04 12:00:00', '20', 3000.00, 0.00, 0.00, 'Close', 225, NULL, NULL, '2022-03-04', 16, 'Fees payment for student 225', 'Fees payment', 0),
(169, '2', '2022-03-04 12:00:00', '3103', 0.00, 3000.00, 0.00, 'Close', 225, NULL, NULL, '2022-03-04', 16, 'Fees payment for student 225', 'Fees payment', 0),
(170, '2', '2022-03-04 12:00:00', '20', 3000.00, 0.00, 0.00, 'Close', 225, NULL, NULL, '2022-03-04', 16, 'Fees payment for student 225', 'Fees payment', 0),
(171, '2', '2022-03-04 12:00:00', '225', 0.00, 3000.00, 25190.00, 'Close', 225, NULL, NULL, '2022-03-04', 16, 'Fees payment for student 225', 'Fees payment', 1),
(172, '2', '2022-03-04 12:00:00', '3103', 0.00, 3000.00, 0.00, 'Close', 225, NULL, NULL, '2022-03-04', 16, 'Fees payment for student 225', 'Fees payment', 0),
(173, '2', '2022-03-04 12:00:00', '20', 3000.00, 0.00, 0.00, 'Close', 225, NULL, NULL, '2022-03-04', 16, 'Fees payment for student 225', 'Fees payment', 0),
(174, '2', '2022-03-04 12:00:00', '225', 0.00, 3000.00, 22190.00, 'Close', 225, NULL, NULL, '2022-03-04', 16, 'Fees payment for student 225', 'Fees payment', 1),
(175, '2', '2022-03-04 12:00:00', '3103', 0.00, 3000.00, 0.00, 'Close', 225, NULL, NULL, '2022-03-04', 16, 'Fees payment for student 225', 'Fees payment', 0),
(176, '2', '2022-03-04 12:00:00', '20', 3000.00, 0.00, 0.00, 'Close', 225, NULL, NULL, '2022-03-04', 16, 'Fees payment for student 225', 'Fees payment', 0),
(177, '2', '2022-03-04 12:00:00', '225', 0.00, 3000.00, 19190.00, 'Close', 225, NULL, NULL, '2022-03-04', 16, 'Fees payment for student 225', 'Fees payment', 1),
(178, '2', '2022-03-04 12:00:00', '3103', 0.00, 2190.00, 0.00, 'Close', 225, NULL, NULL, '2022-03-04', 16, 'Fees payment for student 225', 'Fees payment', 0),
(179, '2', '2022-03-04 12:00:00', '20', 2190.00, 0.00, 0.00, 'Close', 225, NULL, NULL, '2022-03-04', 16, 'Fees payment for student 225', 'Fees payment', 0),
(180, '2', '2022-03-04 12:00:00', '225', 0.00, 2190.00, 17000.00, 'Close', 225, NULL, NULL, '2022-03-04', 16, 'Fees payment for student 225', 'Fees payment', 1),
(181, '2', '2022-03-04 12:00:00', '3103', 0.00, 3210.00, 0.00, 'Close', 225, NULL, NULL, '2022-03-04', 16, 'Fees payment for student 225', 'Fees payment', 0),
(182, '2', '2022-03-04 12:00:00', '20', 3210.00, 0.00, 0.00, 'Close', 225, NULL, NULL, '2022-03-04', 16, 'Fees payment for student 225', 'Fees payment', 0),
(183, '2', '2022-03-04 12:00:00', '225', 0.00, 3210.00, 13790.00, 'Close', 225, NULL, NULL, '2022-03-04', 16, 'Fees payment for student 225', 'Fees payment', 1),
(184, '1', '2022-03-01 12:00:00', '2', 0.00, 24000.00, 0.00, 'Open', 164, NULL, NULL, '2022-03-04', 19, 'Fees generated form student id 164', 'Fee Generated', 0),
(185, '1', '2022-03-01 12:00:00', '3', 0.00, 1000.00, 0.00, 'Open', 164, NULL, NULL, '2022-03-04', 19, 'Fees generated form student id 164', 'Fee Generated', 0),
(186, '1', '2022-03-01 12:00:00', '4', 0.00, 1000.00, 0.00, 'Open', 164, NULL, NULL, '2022-03-04', 19, 'Fees generated form student id 164', 'Fee Generated', 0),
(187, '1', '2022-03-01 12:00:00', '5', 0.00, 1000.00, 0.00, 'Open', 164, NULL, NULL, '2022-03-04', 19, 'Fees generated form student id 164', 'Fee Generated', 0),
(188, '1', '2022-03-01 12:00:00', '6', 0.00, 1000.00, 0.00, 'Open', 164, NULL, NULL, '2022-03-04', 19, 'Fees generated form student id 164', 'Fee Generated', 0),
(189, '1', '2022-03-01 12:00:00', '12', 0.00, 6000.00, 0.00, 'Open', 164, NULL, NULL, '2022-03-04', 19, 'Fees generated form student id 164', 'Fee Generated', 0),
(190, '1', '2022-03-01 12:00:00', '3103', 34000.00, 0.00, 0.00, 'Open', 164, NULL, NULL, '2022-03-04', 19, 'Fees generated form student id 164', 'Fee Generated', 0),
(191, '1', '2022-03-01 12:00:00', '164', 34000.00, 0.00, 34000.00, 'Open', 164, NULL, NULL, '2022-03-01', 19, 'Fees generated form student id 164', 'Fee Generated', 1),
(192, '1', '2022-03-01 12:00:00', '2', 0.00, 2000.00, 0.00, 'Open', 152, NULL, NULL, '2022-03-04', 20, 'Fees generated form student id 152', 'Fee Generated', 0),
(193, '1', '2022-03-01 12:00:00', '3', 0.00, 6000.00, 0.00, 'Open', 152, NULL, NULL, '2022-03-04', 20, 'Fees generated form student id 152', 'Fee Generated', 0),
(194, '1', '2022-03-01 12:00:00', '4', 0.00, 2000.00, 0.00, 'Open', 152, NULL, NULL, '2022-03-04', 20, 'Fees generated form student id 152', 'Fee Generated', 0),
(195, '1', '2022-03-01 12:00:00', '5', 0.00, 100.00, 0.00, 'Open', 152, NULL, NULL, '2022-03-04', 20, 'Fees generated form student id 152', 'Fee Generated', 0),
(196, '1', '2022-03-01 12:00:00', '12', 0.00, 6000.00, 0.00, 'Open', 152, NULL, NULL, '2022-03-04', 20, 'Fees generated form student id 152', 'Fee Generated', 0),
(197, '1', '2022-03-01 12:00:00', '14', 0.00, 1500.00, 0.00, 'Open', 152, NULL, NULL, '2022-03-04', 20, 'Fees generated form student id 152', 'Fee Generated', 0),
(198, '1', '2022-03-01 12:00:00', '28', 0.00, 20.00, 0.00, 'Open', 152, NULL, NULL, '2022-03-04', 20, 'Fees generated form student id 152', 'Fee Generated', 0),
(199, '1', '2022-03-01 12:00:00', '3103', 17620.00, 0.00, 0.00, 'Open', 152, NULL, NULL, '2022-03-04', 20, 'Fees generated form student id 152', 'Fee Generated', 0),
(200, '1', '2022-03-01 12:00:00', '152', 17620.00, 0.00, 0.00, 'Close', 152, NULL, NULL, '2022-03-01', 20, 'Fees generated form student id 152', 'Fee Generated', 1),
(201, '2', '2022-03-04 12:00:00', '3103', 0.00, 5000.00, 0.00, 'Close', 152, NULL, NULL, '2022-03-04', 20, 'Fees payment for student 152', 'Fees payment', 0),
(202, '2', '2022-03-04 12:00:00', '20', 5000.00, 0.00, 0.00, 'Close', 152, NULL, NULL, '2022-03-04', 20, 'Fees payment for student 152', 'Fees payment', 0),
(203, '2', '2022-03-04 12:00:00', '152', 0.00, 5000.00, 12620.00, 'Close', 152, NULL, NULL, '2022-03-04', 20, 'Fees payment for student 152', 'Fees payment', 1),
(204, '2', '2022-03-04 12:00:00', '3103', 0.00, 7000.00, 0.00, 'Close', 152, NULL, NULL, '2022-03-04', 20, 'Fees payment for student 152', 'Fees payment', 0),
(205, '2', '2022-03-04 12:00:00', '20', 7000.00, 0.00, 0.00, 'Close', 152, NULL, NULL, '2022-03-04', 20, 'Fees payment for student 152', 'Fees payment', 0),
(206, '2', '2022-03-04 12:00:00', '152', 0.00, 7000.00, 5620.00, 'Close', 152, NULL, NULL, '2022-03-04', 20, 'Fees payment for student 152', 'Fees payment', 1),
(207, '2', '2022-03-04 12:00:00', '3103', 0.00, 18240.00, 0.00, 'Close', 152, NULL, NULL, '2022-03-04', 0, 'Fees ajustment  for student 152', 'Fees ajustment', 0),
(208, '2', '2022-03-04 12:00:00', '65', 18240.00, 0.00, 0.00, 'Close', 152, NULL, NULL, '2022-03-04', 0, 'Fees ajustment  for student 152', 'Fees ajustment', 0),
(209, '3', '2022-03-04 12:00:00', '152', 0.00, 12620.00, 0.00, 'Close', 152, NULL, NULL, '2022-03-04', 20, 'Fees ajustment  for student 152', 'Fees ajustment', 152),
(210, '1', '2022-03-01 12:00:00', '2', 0.00, 2500.00, 0.00, 'Open', 167, NULL, NULL, '2022-03-04', 21, 'Fees generated form student id 167', 'Fee Generated', 0),
(211, '1', '2022-03-01 12:00:00', '3', 0.00, 5000.00, 0.00, 'Open', 167, NULL, NULL, '2022-03-04', 21, 'Fees generated form student id 167', 'Fee Generated', 0),
(212, '1', '2022-03-01 12:00:00', '4', 0.00, 2000.00, 0.00, 'Open', 167, NULL, NULL, '2022-03-04', 21, 'Fees generated form student id 167', 'Fee Generated', 0),
(213, '1', '2022-03-01 12:00:00', '5', 0.00, 100.00, 0.00, 'Open', 167, NULL, NULL, '2022-03-04', 21, 'Fees generated form student id 167', 'Fee Generated', 0),
(214, '1', '2022-03-01 12:00:00', '6', 0.00, 1200.00, 0.00, 'Open', 167, NULL, NULL, '2022-03-04', 21, 'Fees generated form student id 167', 'Fee Generated', 0),
(215, '1', '2022-03-01 12:00:00', '12', 0.00, 6000.00, 0.00, 'Open', 167, NULL, NULL, '2022-03-04', 21, 'Fees generated form student id 167', 'Fee Generated', 0),
(216, '1', '2022-03-01 12:00:00', '13', 0.00, 3000.00, 0.00, 'Open', 167, NULL, NULL, '2022-03-04', 21, 'Fees generated form student id 167', 'Fee Generated', 0),
(217, '1', '2022-03-01 12:00:00', '14', 0.00, 2000.00, 0.00, 'Open', 167, NULL, NULL, '2022-03-04', 21, 'Fees generated form student id 167', 'Fee Generated', 0),
(218, '1', '2022-03-01 12:00:00', '15', 0.00, 2000.00, 0.00, 'Open', 167, NULL, NULL, '2022-03-04', 21, 'Fees generated form student id 167', 'Fee Generated', 0),
(219, '1', '2022-03-01 12:00:00', '16', 0.00, 30.00, 0.00, 'Open', 167, NULL, NULL, '2022-03-04', 21, 'Fees generated form student id 167', 'Fee Generated', 0),
(220, '1', '2022-03-01 12:00:00', '17', 0.00, 300.00, 0.00, 'Open', 167, NULL, NULL, '2022-03-04', 21, 'Fees generated form student id 167', 'Fee Generated', 0),
(221, '1', '2022-03-01 12:00:00', '28', 0.00, 20.00, 0.00, 'Open', 167, NULL, NULL, '2022-03-04', 21, 'Fees generated form student id 167', 'Fee Generated', 0),
(222, '1', '2022-03-01 12:00:00', '3103', 24150.00, 0.00, 0.00, 'Open', 167, NULL, NULL, '2022-03-04', 21, 'Fees generated form student id 167', 'Fee Generated', 0),
(223, '1', '2022-03-01 12:00:00', '167', 24150.00, 0.00, 7150.00, 'Partial', 167, NULL, NULL, '2022-03-01', 21, 'Fees generated form student id 167', 'Fee Generated', 1),
(224, '2', '2022-03-04 12:00:00', '3103', 0.00, 15000.00, 0.00, 'Close', 167, NULL, NULL, '2022-03-04', 21, 'Fees payment for student 167', 'Fees payment', 0),
(225, '2', '2022-03-04 12:00:00', '21', 15000.00, 0.00, 0.00, 'Close', 167, NULL, NULL, '2022-03-04', 21, 'Fees payment for student 167', 'Fees payment', 0),
(226, '2', '2022-03-04 12:00:00', '167', 0.00, 15000.00, 9150.00, 'Close', 167, NULL, NULL, '2022-03-04', 21, 'Fees payment for student 167', 'Fees payment', 1),
(227, '2', '2022-03-04 12:00:00', '3103', 0.00, 2000.00, 0.00, 'Close', 167, NULL, NULL, '2022-03-04', 21, 'Fees payment for student 167', 'Fees payment', 0),
(228, '2', '2022-03-04 12:00:00', '20', 2000.00, 0.00, 0.00, 'Close', 167, NULL, NULL, '2022-03-04', 21, 'Fees payment for student 167', 'Fees payment', 0),
(229, '2', '2022-03-04 12:00:00', '167', 0.00, 2000.00, 7150.00, 'Close', 167, NULL, NULL, '2022-03-04', 21, 'Fees payment for student 167', 'Fees payment', 1),
(230, '2', '2022-03-04 12:00:00', '3103', 0.00, 0.00, 0.00, 'Close', 167, NULL, NULL, '2022-03-04', 0, 'Fees ajustment  for student 167', 'Fees ajustment', 0),
(231, '2', '2022-03-04 12:00:00', '65', 0.00, 0.00, 0.00, 'Close', 167, NULL, NULL, '2022-03-04', 0, 'Fees ajustment  for student 167', 'Fees ajustment', 0),
(232, '2', '2022-03-04 12:00:00', '3103', 0.00, 0.00, 0.00, 'Close', 167, NULL, NULL, '2022-03-04', 0, 'Fees ajustment  for student 167', 'Fees ajustment', 0),
(233, '2', '2022-03-04 12:00:00', '65', 0.00, 0.00, 0.00, 'Close', 167, NULL, NULL, '2022-03-04', 0, 'Fees ajustment  for student 167', 'Fees ajustment', 0),
(238, '1', '2022-03-01 12:00:00', '2', 0.00, 8000.00, 0.00, 'Open', 143, NULL, NULL, '2022-03-04', 22, 'Fees generated form student id 143', 'Fee Generated', 0),
(239, '1', '2022-03-01 12:00:00', '4', 0.00, 300.00, 0.00, 'Open', 143, NULL, NULL, '2022-03-04', 22, 'Fees generated form student id 143', 'Fee Generated', 0),
(240, '1', '2022-03-01 12:00:00', '3103', 8300.00, 0.00, 0.00, 'Open', 143, NULL, NULL, '2022-03-04', 22, 'Fees generated form student id 143', 'Fee Generated', 0),
(241, '1', '2022-03-01 12:00:00', '143', 8300.00, 0.00, 4000.00, 'Partial', 143, NULL, NULL, '2022-03-01', 22, 'Fees generated form student id 143', 'Fee Generated', 1),
(242, '2', '2022-03-04 12:00:00', '3103', 0.00, 4000.00, 0.00, 'Close', 143, NULL, NULL, '2022-03-04', 22, 'Fees payment for student 143', 'Fees payment', 0),
(243, '2', '2022-03-04 12:00:00', '21', 4000.00, 0.00, 0.00, 'Close', 143, NULL, NULL, '2022-03-04', 22, 'Fees payment for student 143', 'Fees payment', 0),
(244, '2', '2022-03-04 12:00:00', '143', 0.00, 4000.00, 4300.00, 'Close', 143, NULL, NULL, '2022-03-04', 22, 'Fees payment for student 143', 'Fees payment', 1),
(245, '2', '2022-03-04 12:00:00', '3103', 0.00, 300.00, 0.00, 'Close', 143, NULL, NULL, '2022-03-04', 22, 'Fees payment for student 143', 'Fees payment', 0),
(246, '2', '2022-03-04 12:00:00', '21', 300.00, 0.00, 0.00, 'Close', 143, NULL, NULL, '2022-03-04', 22, 'Fees payment for student 143', 'Fees payment', 0),
(247, '2', '2022-03-04 12:00:00', '143', 0.00, 300.00, 4000.00, 'Close', 143, NULL, NULL, '2022-03-04', 22, 'Fees payment for student 143', 'Fees payment', 1),
(248, '1', '2022-03-01 12:00:00', '2', 0.00, 2000.00, 0.00, 'Open', 157, NULL, NULL, '2022-03-04', 23, 'Fees generated form student id 157', 'Fee Generated', 0),
(249, '1', '2022-03-01 12:00:00', '3', 0.00, 5000.00, 0.00, 'Open', 157, NULL, NULL, '2022-03-04', 23, 'Fees generated form student id 157', 'Fee Generated', 0),
(250, '1', '2022-03-01 12:00:00', '4', 0.00, 10000.00, 0.00, 'Open', 157, NULL, NULL, '2022-03-04', 23, 'Fees generated form student id 157', 'Fee Generated', 0),
(251, '1', '2022-03-01 12:00:00', '3103', 17000.00, 0.00, 0.00, 'Open', 157, NULL, NULL, '2022-03-04', 23, 'Fees generated form student id 157', 'Fee Generated', 0),
(252, '1', '2022-03-01 12:00:00', '157', 17000.00, 0.00, 7000.00, 'Partial', 157, NULL, NULL, '2022-03-01', 23, 'Fees generated form student id 157', 'Fee Generated', 1),
(253, '2', '2022-03-04 12:00:00', '3103', 0.00, 5000.00, 0.00, 'Close', 157, NULL, NULL, '2022-03-04', 23, 'Fees payment for student 157', 'Fees payment', 0),
(254, '2', '2022-03-04 12:00:00', '21', 5000.00, 0.00, 0.00, 'Close', 157, NULL, NULL, '2022-03-04', 23, 'Fees payment for student 157', 'Fees payment', 0),
(255, '2', '2022-03-04 12:00:00', '157', 0.00, 5000.00, 12000.00, 'Close', 157, NULL, NULL, '2022-03-04', 23, 'Fees payment for student 157', 'Fees payment', 1),
(256, '2', '2022-03-04 12:00:00', '3103', 0.00, 5000.00, 0.00, 'Close', 157, NULL, NULL, '2022-03-04', 23, 'Fees payment for student 157', 'Fees payment', 0),
(257, '2', '2022-03-04 12:00:00', '21', 5000.00, 0.00, 0.00, 'Close', 157, NULL, NULL, '2022-03-04', 23, 'Fees payment for student 157', 'Fees payment', 0),
(258, '2', '2022-03-04 12:00:00', '157', 0.00, 5000.00, 7000.00, 'Close', 157, NULL, NULL, '2022-03-04', 23, 'Fees payment for student 157', 'Fees payment', 1),
(259, '1', '2022-03-01 12:00:00', '2', 0.00, 2000.00, 0.00, 'Open', 154, NULL, NULL, '2022-03-04', 24, 'Fees generated form student id 154', 'Fee Generated', 0),
(260, '1', '2022-03-01 12:00:00', '4', 0.00, 2000.00, 0.00, 'Open', 154, NULL, NULL, '2022-03-04', 24, 'Fees generated form student id 154', 'Fee Generated', 0),
(261, '1', '2022-03-01 12:00:00', '3103', 4000.00, 0.00, 0.00, 'Open', 154, NULL, NULL, '2022-03-04', 24, 'Fees generated form student id 154', 'Fee Generated', 0),
(262, '1', '2022-03-01 12:00:00', '154', 4000.00, 0.00, 2700.00, 'Partial', 154, NULL, NULL, '2022-03-01', 24, 'Fees generated form student id 154', 'Fee Generated', 1),
(263, '2', '2022-03-04 12:00:00', '3103', 0.00, 1300.00, 0.00, 'Close', 154, NULL, NULL, '2022-03-04', 24, 'Fees payment for student 154', 'Fees payment', 0),
(264, '2', '2022-03-04 12:00:00', '20', 1300.00, 0.00, 0.00, 'Close', 154, NULL, NULL, '2022-03-04', 24, 'Fees payment for student 154', 'Fees payment', 0),
(265, '2', '2022-03-04 12:00:00', '154', 0.00, 1300.00, 2700.00, 'Close', 154, NULL, NULL, '2022-03-04', 24, 'Fees payment for student 154', 'Fees payment', 1),
(266, '1', '2022-03-01 12:00:00', '2', 0.00, 2500.00, 0.00, 'Open', 193, NULL, NULL, '2022-03-05', 25, 'Fees generated form student id 193', 'Fee Generated', 0),
(267, '1', '2022-03-01 12:00:00', '3', 0.00, 2000.00, 0.00, 'Open', 193, NULL, NULL, '2022-03-05', 25, 'Fees generated form student id 193', 'Fee Generated', 0),
(268, '1', '2022-03-01 12:00:00', '4', 0.00, 4000.00, 0.00, 'Open', 193, NULL, NULL, '2022-03-05', 25, 'Fees generated form student id 193', 'Fee Generated', 0),
(269, '1', '2022-03-01 12:00:00', '5', 0.00, 100.00, 0.00, 'Open', 193, NULL, NULL, '2022-03-05', 25, 'Fees generated form student id 193', 'Fee Generated', 0),
(270, '1', '2022-03-01 12:00:00', '6', 0.00, 1200.00, 0.00, 'Open', 193, NULL, NULL, '2022-03-05', 25, 'Fees generated form student id 193', 'Fee Generated', 0),
(271, '1', '2022-03-01 12:00:00', '12', 0.00, 1000.00, 0.00, 'Open', 193, NULL, NULL, '2022-03-05', 25, 'Fees generated form student id 193', 'Fee Generated', 0),
(272, '1', '2022-03-01 12:00:00', '13', 0.00, 1000.00, 0.00, 'Open', 193, NULL, NULL, '2022-03-05', 25, 'Fees generated form student id 193', 'Fee Generated', 0),
(273, '1', '2022-03-01 12:00:00', '14', 0.00, 2000.00, 0.00, 'Open', 193, NULL, NULL, '2022-03-05', 25, 'Fees generated form student id 193', 'Fee Generated', 0),
(274, '1', '2022-03-01 12:00:00', '15', 0.00, 2000.00, 0.00, 'Open', 193, NULL, NULL, '2022-03-05', 25, 'Fees generated form student id 193', 'Fee Generated', 0),
(275, '1', '2022-03-01 12:00:00', '16', 0.00, 200.00, 0.00, 'Open', 193, NULL, NULL, '2022-03-05', 25, 'Fees generated form student id 193', 'Fee Generated', 0),
(276, '1', '2022-03-01 12:00:00', '17', 0.00, 200.00, 0.00, 'Open', 193, NULL, NULL, '2022-03-05', 25, 'Fees generated form student id 193', 'Fee Generated', 0),
(277, '1', '2022-03-01 12:00:00', '28', 0.00, 20.00, 0.00, 'Open', 193, NULL, NULL, '2022-03-05', 25, 'Fees generated form student id 193', 'Fee Generated', 0),
(278, '1', '2022-03-01 12:00:00', '3103', 16220.00, 0.00, 0.00, 'Open', 193, NULL, NULL, '2022-03-05', 25, 'Fees generated form student id 193', 'Fee Generated', 0),
(279, '1', '2022-03-01 12:00:00', '193', 16220.00, 0.00, 12220.00, 'Partial', 193, NULL, NULL, '2022-03-01', 25, 'Fees generated form student id 193', 'Fee Generated', 1),
(280, '2', '2022-03-05 12:00:00', '3103', 0.00, 4000.00, 0.00, 'Close', 193, NULL, NULL, '2022-03-05', 25, 'Fees payment for student 193', 'Fees payment', 0),
(281, '2', '2022-03-05 12:00:00', '21', 4000.00, 0.00, 0.00, 'Close', 193, NULL, NULL, '2022-03-05', 25, 'Fees payment for student 193', 'Fees payment', 0),
(282, '2', '2022-03-05 12:00:00', '193', 0.00, 4000.00, 12220.00, 'Close', 193, NULL, NULL, '2022-03-05', 25, 'Fees payment for student 193', 'Fees payment', 1),
(283, '1', '2022-03-01 12:00:00', '2', 0.00, 24000.00, 0.00, 'Open', 159, NULL, NULL, '2022-03-07', 27, 'Fees generated form student id 159', 'Fee Generated', 0),
(284, '1', '2022-03-01 12:00:00', '6', 0.00, 5000.00, 0.00, 'Open', 159, NULL, NULL, '2022-03-07', 27, 'Fees generated form student id 159', 'Fee Generated', 0),
(285, '1', '2022-03-01 12:00:00', '17', 0.00, 200.00, 0.00, 'Open', 159, NULL, NULL, '2022-03-07', 27, 'Fees generated form student id 159', 'Fee Generated', 0),
(286, '1', '2022-03-01 12:00:00', '28', 0.00, 20.00, 0.00, 'Open', 159, NULL, NULL, '2022-03-07', 27, 'Fees generated form student id 159', 'Fee Generated', 0),
(287, '1', '2022-03-01 12:00:00', '3103', 29220.00, 0.00, 0.00, 'Open', 159, NULL, NULL, '2022-03-07', 27, 'Fees generated form student id 159', 'Fee Generated', 0),
(288, '1', '2022-03-01 12:00:00', '159', 29220.00, 0.00, 14220.00, 'Partial', 159, NULL, NULL, '2022-03-01', 27, 'Fees generated form student id 159', 'Fee Generated', 1),
(289, '2', '2022-03-07 12:00:00', '3103', 0.00, 10000.00, 0.00, 'Close', 159, NULL, NULL, '2022-03-07', 27, 'Fees payment for student 159', 'Fees payment', 0),
(290, '2', '2022-03-07 12:00:00', '20', 10000.00, 0.00, 0.00, 'Close', 159, NULL, NULL, '2022-03-07', 27, 'Fees payment for student 159', 'Fees payment', 0),
(291, '2', '2022-03-07 12:00:00', '159', 0.00, 10000.00, 19220.00, 'Close', 159, NULL, NULL, '2022-03-07', 27, 'Fees payment for student 159', 'Fees payment', 1),
(292, '2', '2022-03-07 12:00:00', '3103', 0.00, 5000.00, 0.00, 'Close', 159, NULL, NULL, '2022-03-07', 27, 'Fees payment for student 159', 'Fees payment', 0),
(293, '2', '2022-03-07 12:00:00', '20', 5000.00, 0.00, 0.00, 'Close', 159, NULL, NULL, '2022-03-07', 27, 'Fees payment for student 159', 'Fees payment', 0),
(294, '2', '2022-03-07 12:00:00', '159', 0.00, 5000.00, 14220.00, 'Close', 159, NULL, NULL, '2022-03-07', 27, 'Fees payment for student 159', 'Fees payment', 1),
(295, '1', '2022-02-01 12:00:00', '2', 0.00, 2000.00, 0.00, 'Open', 114, NULL, NULL, '2022-03-14', 8, 'Fees generated form student id 114', 'Fee Generated', 0),
(296, '1', '2022-02-01 12:00:00', '3', 0.00, 2000.00, 0.00, 'Open', 114, NULL, NULL, '2022-03-14', 8, 'Fees generated form student id 114', 'Fee Generated', 0),
(297, '1', '2022-02-01 12:00:00', '4', 0.00, 1000.00, 0.00, 'Open', 114, NULL, NULL, '2022-03-14', 8, 'Fees generated form student id 114', 'Fee Generated', 0),
(298, '1', '2022-02-01 12:00:00', '3103', 5000.00, 0.00, 0.00, 'Open', 114, NULL, NULL, '2022-03-14', 8, 'Fees generated form student id 114', 'Fee Generated', 0),
(299, '1', '2022-02-01 12:00:00', '114', 5000.00, 0.00, 0.00, 'Close', 114, NULL, NULL, '2022-02-01', 8, 'Fees generated form student id 114', 'Fee Generated', 1),
(300, '2', '2022-03-01 12:00:00', '3103', 0.00, 0.00, 0.00, 'Close', 114, NULL, NULL, '2022-03-14', 0, 'Fees ajustment  for student 114', 'Fees ajustment', 0),
(301, '2', '2022-03-01 12:00:00', '65', 0.00, 0.00, 0.00, 'Close', 114, NULL, NULL, '2022-03-14', 0, 'Fees ajustment  for student 114', 'Fees ajustment', 0),
(302, '2', '2022-03-01 12:00:00', '3103', 0.00, 0.00, 0.00, 'Close', 114, NULL, NULL, '2022-03-14', 0, 'Fees ajustment  for student 114', 'Fees ajustment', 0),
(303, '2', '2022-03-01 12:00:00', '65', 0.00, 0.00, 0.00, 'Close', 114, NULL, NULL, '2022-03-14', 0, 'Fees ajustment  for student 114', 'Fees ajustment', 0),
(304, '2', '2022-03-14 12:00:00', '3103', 0.00, 5000.00, 0.00, 'Close', 114, NULL, NULL, '2022-03-14', 8, 'Fees payment for student 114', 'Fees payment', 0),
(305, '2', '2022-03-14 12:00:00', '20', 5000.00, 0.00, 0.00, 'Close', 114, NULL, NULL, '2022-03-14', 8, 'Fees payment for student 114', 'Fees payment', 0),
(306, '2', '2022-03-14 12:00:00', '3103', 0.00, 5000.00, 0.00, 'Close', 114, NULL, NULL, '2022-03-14', 8, 'Fees payment for student 114', 'Fees payment', 0),
(307, '2', '2022-03-14 12:00:00', '20', 5000.00, 0.00, 0.00, 'Close', 114, NULL, NULL, '2022-03-14', 8, 'Fees payment for student 114', 'Fees payment', 0),
(308, '2', '2022-03-14 12:00:00', '114', 0.00, 5000.00, 0.00, 'Close', 114, NULL, NULL, '2022-03-14', 8, 'Fees payment for student 114', 'Fees payment', 1),
(309, '2', '2022-04-06 15:48:05', '20', 0.00, 10000.00, 0.00, 'Open', NULL, 235, NULL, '2022-04-06', 0, 'Advance Salary For Employee Id235', 'Advance Salary', 0),
(310, '2', '2022-04-06 15:48:07', '20', 0.00, 10000.00, 0.00, 'Open', NULL, 235, NULL, '2022-04-06', 0, 'Advance Salary For Employee Id235', 'Advance Salary', 0),
(311, '2', '2022-04-06 15:48:17', '20', 0.00, 10000.00, 0.00, 'Open', NULL, 235, NULL, '2022-04-06', 0, 'Advance Salary For Employee Id235', 'Advance Salary', 0),
(312, '2', '2022-04-06 15:48:33', '20', 0.00, 10000.00, 0.00, 'Open', NULL, 235, NULL, '2022-04-06', 0, 'Advance Salary For Employee Id235', 'Advance Salary', 0),
(313, '1', '2022-04-06 16:01:53', '60', 48000.00, 0.00, 0.00, 'Open', NULL, 235, NULL, '2022-04-06', 12, 'Salary For Employee Id235', 'Generated Salary', 0),
(314, '1', '2022-04-06 16:01:53', '61', 15000.00, 0.00, 0.00, 'Open', NULL, 235, NULL, '2022-04-06', 12, 'Salary For Employee Id235', 'Generated Salary', 0),
(315, '1', '2022-04-06 16:01:53', '25', 0.00, 63000.00, 0.00, 'Open', NULL, 235, NULL, '2022-04-06', 12, 'Salary For Employee Id235', 'Generated Salary', 0),
(316, '1', '2022-04-06 16:01:53', '59', 63000.00, 0.00, 0.00, 'Close', NULL, 235, NULL, '2022-04-06', 12, 'Salary For Employee Id235', 'Generated Salary', 0),
(317, '1', '2022-04-06 16:01:53', '235', 0.00, 63000.00, 0.00, 'Close', NULL, 235, NULL, '2022-04-06', 12, 'Salary For Employee Id235', 'Generated Salary', 1),
(318, '1', '2022-04-06 16:04:00', '60', 48000.00, 0.00, 0.00, 'Open', NULL, 235, NULL, '2022-04-06', 11, 'Salary For Employee Id235', 'Generated Salary', 0),
(319, '1', '2022-04-06 16:04:00', '61', 15000.00, 0.00, 0.00, 'Open', NULL, 235, NULL, '2022-04-06', 11, 'Salary For Employee Id235', 'Generated Salary', 0),
(320, '1', '2022-04-06 16:04:00', '25', 0.00, 63000.00, 0.00, 'Open', NULL, 235, NULL, '2022-04-06', 11, 'Salary For Employee Id235', 'Generated Salary', 0),
(321, '1', '2022-04-06 16:04:00', '59', 63000.00, 0.00, 0.00, 'Close', NULL, 235, NULL, '2022-04-06', 11, 'Salary For Employee Id235', 'Generated Salary', 0),
(322, '1', '2022-04-06 16:04:00', '235', 0.00, 63000.00, 0.00, 'Close', NULL, 235, NULL, '2022-03-01', 11, 'Salary For Employee Id235', 'Generated Salary', 1),
(323, '2', '2022-04-01 12:00:00', '3103', 63000.00, 0.00, 0.00, 'Close', NULL, 235, NULL, '2022-04-07', 11, 'salary payment for 235', 'Generated Salary', 0),
(324, '2', '2022-04-01 12:00:00', '20', 0.00, 63000.00, 0.00, 'Close', NULL, 235, NULL, '2022-04-07', 11, 'salary payment for 235', 'Salary paid', 0),
(325, '2', '2022-04-01 12:00:00', '235', 63000.00, 0.00, 0.00, 'Close', NULL, 235, NULL, '2022-04-07', 12, 'salary payment for empploye id  235', 'salaray payment', 1),
(326, '2', '2022-04-01 12:00:00', '3103', 63000.00, 0.00, 0.00, 'Close', NULL, 235, NULL, '2022-04-07', 11, 'salary payment for 235', 'Generated Salary', 0),
(327, '2', '2022-04-01 12:00:00', '20', 0.00, 63000.00, 0.00, 'Close', NULL, 235, NULL, '2022-04-07', 11, 'salary payment for 235', 'Salary paid', 0),
(328, '2', '2022-04-01 12:00:00', '235', 63000.00, 0.00, 0.00, 'Close', NULL, 235, NULL, '2022-04-07', 11, 'salary payment for empploye id  235', 'salaray payment', 1),
(329, '1', '2022-04-07 13:10:05', '60', 48000.00, 0.00, 0.00, 'Open', NULL, 238, NULL, '2022-04-07', 13, 'Salary For Employee Id238', 'Generated Salary', 0),
(330, '1', '2022-04-07 13:10:05', '61', 12000.00, 0.00, 0.00, 'Open', NULL, 238, NULL, '2022-04-07', 13, 'Salary For Employee Id238', 'Generated Salary', 0),
(331, '1', '2022-04-07 13:10:05', '25', 0.00, 60000.00, 0.00, 'Open', NULL, 238, NULL, '2022-04-07', 13, 'Salary For Employee Id238', 'Generated Salary', 0),
(332, '1', '2022-04-07 13:10:05', '59', 60000.00, 0.00, 0.00, 'Close', NULL, 238, NULL, '2022-04-07', 13, 'Salary For Employee Id238', 'Generated Salary', 0),
(333, '1', '2022-04-07 13:10:05', '238', 0.00, 60000.00, 0.00, 'Close', NULL, 238, NULL, '2022-03-01', 13, 'Salary For Employee Id238', 'Generated Salary', 1),
(334, '1', '2022-04-07 13:11:39', '60', 48000.00, 0.00, 0.00, 'Open', NULL, 238, NULL, '2022-04-07', 14, 'Salary For Employee Id238', 'Generated Salary', 0),
(335, '1', '2022-04-07 13:11:39', '61', 12000.00, 0.00, 0.00, 'Open', NULL, 238, NULL, '2022-04-07', 14, 'Salary For Employee Id238', 'Generated Salary', 0),
(336, '1', '2022-04-07 13:11:40', '25', 0.00, 60000.00, 0.00, 'Open', NULL, 238, NULL, '2022-04-07', 14, 'Salary For Employee Id238', 'Generated Salary', 0),
(337, '1', '2022-04-07 13:11:40', '59', 60000.00, 0.00, 0.00, 'Close', NULL, 238, NULL, '2022-04-07', 14, 'Salary For Employee Id238', 'Generated Salary', 0),
(338, '1', '2022-04-07 13:11:40', '238', 0.00, 60000.00, 0.00, 'Close', NULL, 238, NULL, '2022-02-01', 14, 'Salary For Employee Id238', 'Generated Salary', 1),
(339, '2', '2022-04-07 12:00:00', '3103', 60000.00, 0.00, 0.00, 'Close', NULL, 238, NULL, '2022-04-07', 13, 'salary payment for 238', 'Generated Salary', 0),
(340, '2', '2022-04-07 12:00:00', '20', 0.00, 60000.00, 0.00, 'Close', NULL, 238, NULL, '2022-04-07', 13, 'salary payment for 238', 'Salary paid', 0),
(341, '2', '2022-04-07 12:00:00', '238', 60000.00, 0.00, 0.00, 'Close', NULL, 238, NULL, '2022-04-07', 13, 'salary payment for empploye id  238', 'salaray payment', 1),
(342, '2', '2022-04-07 12:00:00', '3103', 60000.00, 0.00, 0.00, 'Close', NULL, 238, NULL, '2022-04-07', 13, 'salary payment for 238', 'Generated Salary', 0),
(343, '2', '2022-04-07 12:00:00', '20', 0.00, 60000.00, 0.00, 'Close', NULL, 238, NULL, '2022-04-07', 13, 'salary payment for 238', 'Salary paid', 0),
(344, '2', '2022-04-07 12:00:00', '238', 60000.00, 0.00, 0.00, 'Close', NULL, 238, NULL, '2022-04-07', 14, 'salary payment for empploye id  238', 'salaray payment', 1);

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
(1, 'Admin', 'admin', 'emp1647266648.jpg', 'admin@gmail.com', '9999977777777', '', 'Active', NULL, '$2y$10$hohxZMHXui58RWegIaPixuJSK3DZoLi57Q4L.byFWGDNDs1NNiKp2', NULL, '2021-02-18 01:55:55', '2022-03-21 02:41:12'),
(76, 'Super Admin', 'super', 'user1640972310.jpg', 'pnt_Email', '03339654236', '', 'Active', NULL, '$2y$10$hohxZMHXui58RWegIaPixuJSK3DZoLi57Q4L.byFWGDNDs1NNiKp2', NULL, '2021-02-18 01:55:55', '2021-12-31 17:38:30'),
(105, 'Shafiq Ur Rehman', '1420386649147', 'user1643051238.jpg', 'admin2322@gmail.com', '12343', NULL, 'Active', NULL, '$2y$10$zJbcb9cusA665krl9665t.81qrUTWoE9QS6vxsFQ2w9PD62i3e0HC', NULL, '2022-01-24 19:07:18', '2022-03-16 09:24:14'),
(106, 'Faiza Noor', '1420385549148', 'user1643051308.jpg', 'fizanoor@gmail.com', '222222222222', NULL, 'Active', NULL, '$2y$10$WQFWDOwB56On9qThURljLuGTq5G0TbINMOVGgEiZb8nfUWvKokwdS', NULL, '2022-01-24 19:08:28', '2022-03-21 05:50:46'),
(107, 'Muhammad Anees', '1420385549146', 'user1643051560.jpg', NULL, '03353443510', NULL, 'Active', NULL, '$2y$10$FixGtKwljERyyGiGGQMBkOc7StQndBL00MZIYec4RfYeN7OCH30ja', NULL, '2022-01-24 19:12:40', '2022-04-14 01:11:04'),
(108, 'Muhammad Anas', '1420385549213', 'user1643096735.jfif', NULL, NULL, NULL, 'Active', NULL, '$2y$10$6p6ml3NzxOCvbBHdJAtQvuAsww/A/J.ssNAT/4vbQSdxagLhEe9yq', NULL, '2022-01-25 07:45:35', '2022-01-25 07:45:35'),
(109, 'Muhammad Faiz', '986523147885', 'user1643097332.jpeg', NULL, '03339654236', NULL, 'Active', NULL, '$2y$10$D4glGpVQuTlNAb5TSPsg2eErrQfH.nG0Vrjw14lMdFsgfERXX1KkS', NULL, '2022-01-25 07:55:32', '2022-03-21 02:59:33'),
(110, 'Miss Faiz', '986745234556', 'user1643097410.jfif', NULL, NULL, NULL, 'Active', NULL, '$2y$10$g4eXbbAauArqLSKyH6pW.eN8850ucNOYRZ7wAxRn.JMEWVbDcq04m', NULL, '2022-01-25 07:56:50', '2022-01-25 07:56:50'),
(111, 'Merab Faiz', '12324654635', 'user1643097621.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$iSLUEBhVjtbY.9nN7kAA3ePFkRbxU1jyA0UmQ25Pk5WME4WwAiVCu', NULL, '2022-01-25 08:00:21', '2022-01-25 08:00:21'),
(112, 'Waqas Butt', '134567890987', 'user1643098114.jpeg', NULL, '1111111111111', NULL, 'Active', NULL, '$2y$10$WNRte7qRub8IIm9j.9jxc.J6/yYF0TN/Vx.rlKqQBVZ5AySFG8mKK', NULL, '2022-01-25 08:08:34', '2022-04-05 05:13:37'),
(113, 'Nadia Butt', '1342356545321', 'user1643098237.jfif', NULL, NULL, NULL, 'Active', NULL, '$2y$10$Gddw04fW54T47MdcAPDXF.jLq9gtlruoosQv1zQHmOEbT/Nu8ThQe', NULL, '2022-01-25 08:10:37', '2022-01-25 11:03:28'),
(114, 'Adeel Raja', '13234565346798', 'user1643098567.jfif', 'refaqatkhattak88@gmail.com', '03339654236', NULL, 'Active', NULL, '$2y$10$C6Fae3JmIR5i8HX2391BKOliZoBzga4LaSimJg6tsbSmR2rMcUCOu', NULL, '2022-01-25 08:16:07', '2022-02-10 03:15:09'),
(115, 'akram jamli', '154378907653', 'user1643098977.jpeg', NULL, '22222222222', NULL, 'Active', NULL, '$2y$10$nV.TcoF7Y8RpNjfh5oXenehTF2PYlJrMsFxdq/vkYUVaLTfWD8Cpe', NULL, '2022-01-25 08:22:57', '2022-04-05 05:21:28'),
(116, 'miss akram jamli', '13452136578987', 'user1643099119.jpg', NULL, '1111111111111', NULL, 'Active', NULL, '$2y$10$JOSR/3OXOHw.IjrBiyfitelU2hs6EP/zgJOL9IGNSW7zfSHpTXM6m', NULL, '2022-01-25 08:25:19', '2022-03-21 05:18:23'),
(117, 'Waseem akram', '72345434657689', 'user1643099360.jfif', NULL, NULL, NULL, 'Active', NULL, '$2y$10$AI21IPnvsoTIFbGGcEAFreyNHLHc8ocvZklR2pwHQHjDFY6nwGzSC', NULL, '2022-01-25 08:29:20', '2022-01-25 08:29:20'),
(118, 'Laiq Khan', '14203456576789', 'user1643099768.jpeg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$lBnzuTLFkFICbsJd7iuGauo4rLzvO1/rSJuHwCEwVHOj.lYPswqnu', NULL, '2022-01-25 08:36:08', '2022-01-25 08:36:08'),
(119, 'Hussan Pari', '14203445676898', 'user1643099840.jpg', 'hussanpari@gmail.com', '0123456789', NULL, 'Active', NULL, '$2y$10$.A0AbbQNd15OqJ08n5r6BeVzOOmYglzvkQtgLSqdw.aoae6Rbt3Dq', NULL, '2022-01-25 08:37:20', '2022-03-21 06:14:57'),
(120, 'Naveed Iqbal', '988989877245', 'user1643100085.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$mLY1pdLTzaHnN7llu.m5d.qRxFZaEpdgvC0zsFmjwoQop2pudTLKe', NULL, '2022-01-25 08:41:25', '2022-01-25 08:41:25'),
(121, 'Noor ul Ain', '768909874563', 'user1643101534.jfif', NULL, NULL, NULL, 'Active', NULL, '$2y$10$bXYnpGmmd1wanmT8v8xe9O6.TNScE3GrwrU.uWBHEWzv3JlIQjm2q', NULL, '2022-01-25 09:05:34', '2022-03-16 06:06:17'),
(122, 'Muhammad Sadiq', '678543201890', 'user1643102282.jpeg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$IZdeFwSRezah/Dna2PDuRuiMlaALrK6BuKJdaLqrlLGNu7dDhSuBW', NULL, '2022-01-25 09:18:02', '2022-01-25 09:18:02'),
(123, 'Amna sadiq', '1457890098006', 'user1643102409.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$NF.K8r7WOctBODsGMOqsfezdp2ThNmFeIbun2qJovlWJbBUZ7WN/O', NULL, '2022-01-25 09:20:09', '2022-01-25 09:20:09'),
(124, 'Nadeem sadiq', '1543789078', 'user1643102632.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$bYuW4Rn/b./c3cdo01msrOGK9gQiBL8857/9lY36tlXoCXkLJdG7y', NULL, '2022-01-25 09:23:52', '2022-01-25 09:23:52'),
(125, 'Jerold', '14202999922291', 'emp1643106117.jpg', 'Jerold@test.com', '33323232323', NULL, 'Active', NULL, '$2y$10$UPjORwarYRk8VgQtdp7Zo.elbHTsfUGH3VpYq2pchbAPytlWFu0wG', NULL, '2022-01-25 10:21:57', '2022-02-03 08:16:03'),
(126, 'Mir shahid', '15609876912', 'user1643107860.jpeg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$P6nU.HG39Gn2yRSUQydeCuzD6AIuTw5S3QQhMiuBcI2rJmL1Pe1Jy', NULL, '2022-01-25 10:51:00', '2022-01-25 10:51:00'),
(127, 'Ajay Vignesh', '14202002222', 'user1643107957.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$WiWjZrJMPg4e1HZ1wD67oeniPwD2VY18A2Cs3VSuR1dc1X9ausjRO', NULL, '2022-01-25 10:52:37', '2022-01-25 10:52:37'),
(128, 'Sonia Bibe', '22456789878778', 'user1643108029.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$PEGQMkCpHU/FWHDqsveXu.KCreiLjdu.uBFuoxRifeG5OQTooUlqG', NULL, '2022-01-25 10:53:49', '2022-01-25 10:53:49'),
(129, 'Naseem Shahid', '1234356787654', 'user1643108208.jfif', NULL, NULL, NULL, 'Active', NULL, '$2y$10$CW69LEt3rN7KzQ67pn5qJu1Tyst1jgYcWjfFRgBaGzCHJTmGpDZlO', NULL, '2022-01-25 10:56:48', '2022-01-25 10:56:48'),
(130, 'gul zaman', '1420209999889', 'user1643118752.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$5/IghsLXdyg6brSdwdw3SeC4.gra/W6PZrD0oUQrL0m.euwbX1M1K', NULL, '2022-01-25 13:52:32', '2022-01-25 13:52:32'),
(131, 'gul zaman', '14202384948349', 'user1643119026.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$dxg5CFVhWecfoI8OEvuMh.c4g18Yg.xD3EIgdyxcWCzADRBfDJ8s.', NULL, '2022-01-25 13:57:06', '2022-01-25 13:57:06'),
(132, 'sharmeen naaz', '1420222289292', 'user1643119099.jpg', NULL, '22222222222', NULL, 'Active', NULL, '$2y$10$eX0hy3J5k4h29HCP33vGN.1nLZ5wXrg/K0QFaBKR4qnIml6eLzU3y', NULL, '2022-01-25 13:58:19', '2022-04-05 05:30:21'),
(133, 'Ali Rehman', '44936482389517', 'user1643121116.jpeg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$lq7evt/OKIJ7POidhAELWuR5S8T3O.zZd/eUdnVnR0eTmEtmGLuw.', NULL, '2022-01-25 14:31:56', '2022-01-25 14:31:56'),
(134, 'Nabela Ali', '375149624801', 'user1643121223.jfif', NULL, NULL, NULL, 'Active', NULL, '$2y$10$drJ5vYEDvnQYeZCon2jQTOsCeTG2AIrQQfB.ObXkpWaZ60rgAUjcm', NULL, '2022-01-25 14:33:43', '2022-01-25 14:33:43'),
(135, 'Islam Ali', '113487594109', 'user1643121452.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$suJ92nFIHGOCqsia8jxkYeQav6aJyuaLhphbKhBR4ii7OZ9DEDfhW', NULL, '2022-01-25 14:37:32', '2022-01-25 14:37:32'),
(136, 'Azmat Hyth', '225239617354', 'user1643122125.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$rLHxYHFsSDE9GEyzZTAY6.z7K4ow5cvcK/2XSI5mqVuFdQegDRtci', NULL, '2022-01-25 14:48:45', '2022-01-25 14:48:45'),
(137, 'Nadeem mailk', '1423365348908765', 'user1643122542.jpeg', NULL, '1111111111111', NULL, 'Active', NULL, '$2y$10$1pqpHPLkDbAQd9AT54LUPumdZxT07PSRygR34H2Y6TVjKAUDCbouG', NULL, '2022-01-25 14:55:42', '2022-04-05 05:29:47'),
(138, 'Fatima Malik', '145689065676', 'user1643122625.jfif', NULL, NULL, NULL, 'Active', NULL, '$2y$10$iOQ14hFj49bmsHrpgGtYo.jGmSYr2VW2E1tFtNI.5C5gcfQf3fY86', NULL, '2022-01-25 14:57:05', '2022-01-25 14:57:05'),
(139, 'Sawara Nadeen', '6615439845', 'user1643122907.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$lmYASEnDT43zwVOjciTize0frS55AfbEga5eycvkXMhotbG1O0TIG', NULL, '2022-01-25 15:01:47', '2022-01-25 15:01:47'),
(140, 'Muhammad Rehan', '142020289485', 'user1643179708.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$QGhxIsh7Yy/h3Oc1snDOp.ZBS9FESfiqU7vOuhAvJDXVXdSjwrBAW', NULL, '2022-01-26 06:48:28', '2022-01-26 06:48:28'),
(141, 'Tayyeb Ali', '1420202545445', 'user1643180211.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$PpakwAnytgCipOHIjawt4.bkzH6mKgeaz6kFpzVZrXVz5gzpWtTUS', NULL, '2022-01-26 06:56:51', '2022-01-26 06:56:51'),
(142, 'Furqan Ali', '142035656565656', 'user1643180639.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$ht1eQ43zNtPy5iSmNoisIOgXXpXAUyuTaFcG.qZPCroxtkYpNqM.i', NULL, '2022-01-26 07:03:59', '2022-01-26 07:03:59'),
(143, 'sheera gul', '1430389568695', 'user1643181065.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$H4SDHyXc9KVZe.dgQ0wOoOJvmbj2kD/n9evFE2NyKCyJfNjgeLwo6', NULL, '2022-01-26 07:11:05', '2022-01-26 07:11:05'),
(144, 'Shakeel Rehman', '130454548945', 'user1643181309.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$JdRQw/2MjfhldefMiFTruuJ0UBiUYAHoigmHDP5KQt342hcFCtJb.', NULL, '2022-01-26 07:15:09', '2022-01-26 07:15:09'),
(145, 'Abid Ali Khan', '65745743565424321', 'user1643181435.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$Dj/Rl3Kl/2fXQzBz7cXed.aHZ7jsHPaxkHK52tLsfdDKSPoCcPkGa', NULL, '2022-01-26 07:17:15', '2022-01-26 07:17:15'),
(146, 'Tahir Saddique', '13067455495856', 'user1643181556.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$B67xwBGCimG.EYlnTviWi.F1qknjzuzyUqObM8PLEFqxPnyemMMnO', NULL, '2022-01-26 07:19:16', '2022-01-26 07:19:16'),
(147, 'Gul Nar Begum', '5235235323532', 'user1643181556.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$9yvUQUXeXWjHMPt4ZxPHzei7.2mb/TmDfWpnGWlaLmg4bqcE2f6Gu', NULL, '2022-01-26 07:19:16', '2022-01-26 07:19:16'),
(148, 'Zabit Noor', '3252324532245', 'user1643181841.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$zz0DE1sxdFMARkQR.HYcLujn.O4bLxAW8Z6Xpu9O3hdSv.JURR8ia', NULL, '2022-01-26 07:24:01', '2022-01-26 07:24:01'),
(149, 'Saima Khan', '4364576546545', 'user1643181967.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$5z3NH93Uo./frf67k/wudORn7AkuG1yvQM2tsduw9PWsHWgs7Svp6', NULL, '2022-01-26 07:26:07', '2022-01-26 07:26:07'),
(150, 'Shakila Naz', '436432634264663', 'user1643194792.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$EsJPi6uOzFc.oEXDcAkWve3I51FaevVHbeQNY5metDI6E97E3g4hy', NULL, '2022-01-26 07:28:30', '2022-01-26 10:59:52'),
(151, 'Sadia', '1422103434434', 'user1643183039.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$LdYXHEfvpO57sGv1D4Uo1OExMINj9IYzPeHqaDukEz40Vn29OyA8O', NULL, '2022-01-26 07:43:59', '2022-01-26 07:43:59'),
(152, 'Jawad Ali', '1450345545855', 'user1643183883.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$fuAdSxPKYddG8ZdpR93XQOiWY1WbcQvDys17ci44Iub2Y2fpHgmNC', NULL, '2022-01-26 07:58:03', '2022-01-26 07:58:03'),
(153, 'Shameer', '1452103434334', 'user1643184487.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$Erl8G.Y6GbRicekrSjSemui/.bj6kGnBIOBxKqF7xHbpXMZEYoj9i', NULL, '2022-01-26 08:08:07', '2022-01-26 08:08:07'),
(154, 'Afnan Jamal', '1432245589594', 'user1643185192.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$FMy7L6hCGU402eS4Eszy8O.laRLrNUINnZ3Ro6ji2HVSfXAYCY/Tq', NULL, '2022-01-26 08:19:52', '2022-01-26 08:19:52'),
(155, 'Farhan khan', '142038554988', 'user1643191893.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$6q8CVwBahPKqMvXKDBVnduYnFv./qEF2VfA8AZ..ri/b/gWsO9GY2', NULL, '2022-01-26 10:11:33', '2022-01-26 10:11:33'),
(156, 'Adeel Ashfaq', '1420385549434', 'user1643192414.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$cK5RpK9OZF5/5EziWKZ7Aupj4mNkbM.xgjBGD28nic37mvvgm50Te', NULL, '2022-01-26 10:20:14', '2022-01-26 10:20:14'),
(157, 'Mehran', '1420385549881', 'user1643192753.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$i6WSu2aS356n8Xg6ClUfwOp3NDxZYcId16UxEE5FBfJ4SfM7xpTRi', NULL, '2022-01-26 10:25:53', '2022-01-26 10:25:53'),
(158, 'Sabit Mushtaaq', '1420383432288', 'user1643193761.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$YYLDJ3WAelnb.GHb9KRXduK3AIquH4C7riqHI4DDIa85T3Fp9ug5q', NULL, '2022-01-26 10:42:41', '2022-01-26 10:42:41'),
(159, 'Mushtaq Ahmad', '142038555444988', 'user1643194327.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$KfB8SkhqKMb5NFor1MNHc.D7xHCBmvV78hqjmg8Pxlt0SvhpKAbP2', NULL, '2022-01-26 10:52:07', '2022-01-26 10:52:07'),
(160, 'Samreen Abbas', '14203811343225', 'user1643194719.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$v7YbYsaQOhz8eapkhlQjc.B3N.My0YkJ3XQ0a/j.syopfdqz4UvoO', NULL, '2022-01-26 10:58:39', '2022-01-26 10:58:39'),
(161, 'Adil Raheem', '142038112088', 'user1643195650.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$4EgDKB1MJVvTQYXa2WY3yOZ/fqm2E9sQ6hs8PzUEY2mI0J6JB3/Wy', NULL, '2022-01-26 11:14:10', '2022-01-26 11:14:10'),
(162, 'Ashtiq khan', '145023132344', 'user1643196354.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$t6zgNM/bfCiLgYvfjehdWOhcKCCJRLn3HBOVE9nAnpg0hlvBNvJdi', NULL, '2022-01-26 11:25:54', '2022-01-26 11:25:54'),
(163, 'Razia Begum', '1420385003224', 'user1643197138.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$Fae2KvdHoDZczs8lmwf0/uDtKPG/HdvcbWjTCiZKLUotdo0tQrWyG', NULL, '2022-01-26 11:38:58', '2022-01-26 11:38:58'),
(164, 'Sharaf Ali', '143013233441188', 'user1643197471.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$GnSAen5z/XbNF50mxfrfy.0QRxbfEoaQJnL0bCX7RdBReY5vc0oxy', NULL, '2022-01-26 11:44:31', '2022-01-26 11:44:31'),
(165, 'Rehan Danish', '14203767555555', 'user1643197897.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$JEE1pLk2umuUOMCpdOxic.sJGti4QG.XBHj/133KfjdnQDKPD2Am2', NULL, '2022-01-26 11:51:37', '2022-01-26 11:51:37'),
(166, 'Sonia Sabir', '14312354554554', 'user1643198808.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$jPko7bMo32af.fTQjPBApe9OHarZxipu4VN96ShqAdUrNF6lUsUNe', NULL, '2022-01-26 12:06:48', '2022-01-26 12:06:48'),
(167, 'Yousaf Zia', '1440230045849', 'user1643199144.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$j1eeSecBYHLz35xbl9zBBeboo9sDFavBbl6hjYm4WR6wJfCJ8.HMO', NULL, '2022-01-26 12:12:24', '2022-01-26 12:12:24'),
(168, 'Yousaf Zia', '1440123456559', 'user1643199281.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$6iVy8D4wsJEiGHhngCd0bOObZY.1733v98IjocoYeWskJ6Sv66iCi', NULL, '2022-01-26 12:14:41', '2022-01-26 12:14:41'),
(169, 'Salman Ali', '1420226776765', 'user1643200208.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$UpEHYhgLD4H8Ddxjq8rAI.o/t3vj/D..oPRDQr7d8KLmbN86oPWJq', NULL, '2022-01-26 12:30:08', '2022-01-26 12:30:08'),
(170, 'Farhan Sabir', '1430565653365', 'user1643200430.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$hg/QjkUEEjAu3j68p.IJNu8gUqYI4Fef4ROidtUZbaE3HQM3jzV2e', NULL, '2022-01-26 12:33:50', '2022-01-26 12:33:50'),
(171, 'Nabeel jutt', '14305660048232', 'user1643200490.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$gyzrcsVUiuifRHunuDqnvOk6EVidNbfXMssOtItE2qTVIy1ONJgJa', NULL, '2022-01-26 12:34:50', '2022-01-26 12:34:50'),
(172, 'Majeed Abid', '142038006988', 'user1643200637.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$C6pHXFdSaBLUJrvvQAeQ7OaUN2pLEp8ok444iSnzpnhoJvWLe6phW', NULL, '2022-01-26 12:37:17', '2022-01-26 12:37:17'),
(173, 'Arbaz Gul', '1111111111222222', 'user1643200698.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$gVUgTxhA5ZjNXACKvwtQUebCPS4a8U89g7fEnehFtJcvgPyKV7686', NULL, '2022-01-26 12:38:18', '2022-01-26 12:38:18'),
(174, 'Sanam Jana', '2222224555555', 'user1643200789.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$HSm1brJk/zbmKxw0cI3XuOBZLVXJalnr8Sh8nhxDi7btvhxrTXXYK', NULL, '2022-01-26 12:39:49', '2022-01-26 12:39:49'),
(175, 'Mansoor Shah', '140220348349', 'user1643201070.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$kGpLhl9YYBr3lSoCFamkneYjLGae/Xw/oGR5ZAr7K2i/xresOHdGi', NULL, '2022-01-26 12:44:30', '2022-01-26 12:44:30'),
(176, 'Sara Rafi', '1430532323875', 'user1643201133.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$.3au.BHU66hqDWdJncShxuQQmr7tQtfOiq9FobMrcA6stEXhDXXWO', NULL, '2022-01-26 12:45:33', '2022-01-26 12:45:33'),
(177, 'Irum Naz', '73987325233636', 'user1643201192.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$yT3k7gnMujKKKa3DpHF7POAVgqG3oW3H/lodxdDsSsAYJDgRaKkZO', NULL, '2022-01-26 12:46:32', '2022-01-26 12:46:32'),
(178, 'Khalid Mansoor', '142038500023', 'user1643201290.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$UxGgGQ3S1tD0BSfe6RXf9OA8VfS6A5doMDNacLu3B7/MqGJBO6Mhm', NULL, '2022-01-26 12:48:10', '2022-01-26 12:48:10'),
(179, 'Furqan Hameed', '144032548984', 'user1643202047.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$MCQzC2UJKkxoe3/xdoASsO.r9loFGi3buvVyGMdpXhYjHNGo9m5Ay', NULL, '2022-01-26 13:00:47', '2022-01-26 13:00:47'),
(180, 'Yasir Ali', '14503655656565', 'user1643202827.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$S8j7V2w25UMUCTyab30zoOrFUBYY0M3yAn/N.nhJ1r8lzhieTjudi', NULL, '2022-01-26 13:13:47', '2022-01-26 13:13:47'),
(181, 'Zahid Orakzai', '123432432442354', 'user1643202907.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$VDLKZ3fv3RjGJoMZoSgWhOGN2wwP.SkzqV9snEUp98o9OXmsPcG3y', NULL, '2022-01-26 13:15:07', '2022-01-26 13:15:07'),
(182, 'Nadia Orakzai', '5436324634643', 'user1643202998.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$.1bPBFiDecX6GbZRPG3GaOQA7iUm2mrrECPM3JBd/Y6Zw8xj61pNu', NULL, '2022-01-26 13:16:38', '2022-01-26 13:16:38'),
(183, 'Sheraaz Shafi', '14203855000054', 'user1643203209.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$Glp/S0WSo8.6JZDL7EwvWe.m504zB4BFiCx.3z08ISKniHG7IKxKS', NULL, '2022-01-26 13:20:09', '2022-01-26 13:20:09'),
(184, 'Nishat Orakzai', '9870987654322', 'user1643203232.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$jbBqLHuIB8R/J1dUIVtbJeNApqC73whas7G99SGyQgQlj04u0zFuC', NULL, '2022-01-26 13:20:32', '2022-01-26 13:20:32'),
(185, 'Abbas khan', '235234545', 'user1643203583.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$mmUOgzYw7ssPDxI6rBqCQeHHqL2NbLI9d/z7AKAw5E.aBikozqN8i', NULL, '2022-01-26 13:26:23', '2022-01-26 13:26:23'),
(186, 'Sadia Khan', '4643426345623', 'user1643203675.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$RWxpj7ZrCwqdP/3g6BkFU.l9Vh9pe48B8kOt5C.oIvo066Ss/Qs0a', NULL, '2022-01-26 13:27:55', '2022-01-26 13:27:55'),
(187, 'Aiza Khan', '78998654651323', 'user1643203884.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$7S.S90B.BVPZQs2ediHJEeis78RusEuzkxNnFptJujfn3BL198p9u', NULL, '2022-01-26 13:31:24', '2022-01-26 13:31:24'),
(188, 'Arbab Taimoor', '53425636445642', 'user1643204071.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$OyeOx/xCsXqfOr1WuODU5ue2xMioxiRVsfGp3Ooiw3lq5sSJ.yx0m', NULL, '2022-01-26 13:34:31', '2022-01-26 13:34:31'),
(189, 'Sadaf Taimoor', '342623576547437', 'user1643204184.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$gT9gubATIHqNnXeX2ax2Ee0vFv/1NmqMYIVhu/bgjc2beGcftBcfq', NULL, '2022-01-26 13:36:24', '2022-01-26 13:36:24'),
(190, 'Danish Taimoor', '656534656432232', 'user1643204380.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$9y4ZswUDQ3Uc3e3452TwReHq9R/H5rGnQE5XVbfRpOKeW7g62RpX6', NULL, '2022-01-26 13:39:40', '2022-01-26 13:39:40'),
(191, 'Shah Jahan', '1430344584958', 'user1643204478.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$/nIliySDxMDf/4pYwdgRrujcZy3JBn2M3kuNtlBvIpeZFGB2gylzq', NULL, '2022-01-26 13:41:18', '2022-01-26 13:41:18'),
(192, 'Shaista Jameel', '143033854545', 'user1643204526.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$jt0BEGcZTrz/6YOIifOVtu.8yjZG92hL0vU8DYSTYtXFv4deK.M1S', NULL, '2022-01-26 13:42:06', '2022-01-26 13:42:06'),
(193, 'Shefan', '14503334883', 'user1643204711.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$HVY/5X4W.cRg2fr0/QF3y.yDv4eAr6xL8bWrL1D2EOuJfPYiriBwW', NULL, '2022-01-26 13:45:11', '2022-01-26 13:45:11'),
(194, 'Gulshan Islam', '466346454357', 'user1643205338.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$nFAYjzMGuXwNgRvRuT62f..YCFj2LTzfecn5Ak7CE93ytwf3oPSsu', NULL, '2022-01-26 13:47:33', '2022-01-26 13:59:36'),
(195, 'Gul Adama', '54657546744564', 'user1643204948.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$fwhzRHmmA/JMNBvCyBb0nOlx9sqTzralA7ZW8Uk.rYS2rNJRcNWLu', NULL, '2022-01-26 13:49:08', '2022-01-26 13:49:08'),
(196, 'Haya Gulshan', '4373563465798', 'user1643205291.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$SUImbJEzaBe2cq7szuI2MuEFHvUDhVNfLZ6xnIopMc.2Y8uV/gnEq', NULL, '2022-01-26 13:54:51', '2022-01-26 13:54:51'),
(197, 'Humayun Saqib', '1430544859458', 'user1643206018.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$.DpbBt0cbHjqF9XmS47cruHUS2hS9CKtOilnvBVBUzbCcAV1IaO5u', NULL, '2022-01-26 14:06:58', '2022-01-26 14:06:58'),
(198, 'Umar Asad', '46435643567456', 'user1643206129.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$cNjyo.Eaa8.wl72g/BWj.OG0CQaYYyoGuXFTAB6O79xXJgaHYAwyW', NULL, '2022-01-26 14:08:49', '2022-01-26 14:08:49'),
(199, 'Sofia Asad', '342343432423', 'user1643206264.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$fl0xR58/9NRSQCYxOARbYexkVwpR3t8FIfvOUOwJhlwUDNtyQ05dG', NULL, '2022-01-26 14:11:04', '2022-01-26 14:11:04'),
(200, 'ABBAS ABDULLAH', '14335657655456', 'user1643206312.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$TJp18jTKkYwCWIxIK8t8jOAr.k9.mS0OuAnIgs5T8vv898FQMwuEy', NULL, '2022-01-26 14:11:52', '2022-01-26 14:11:52'),
(201, 'Kashaf', '1450344584958', 'user1643206382.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$fdKDPJr0MWAGwkspGdORL.JRZInoN7cQpJL6gM6/EHMU10uwSiPy.', NULL, '2022-01-26 14:13:02', '2022-01-26 14:13:02'),
(202, 'Abid Asad', '54647355367657', 'user1643206444.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$Mwiovsm3Rqu8B96ekJUOoOex03pQk3tcqoOnl8tY0e5nmBnf20/QC', NULL, '2022-01-26 14:14:04', '2022-01-26 14:14:04'),
(203, 'AAYAN', '1420385000988', 'user1643206539.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$kEmcZmpx9VjJOmbkXQf8yeKnAr/al7Qp3iumv7TDr0NP2UOk4A5Au', NULL, '2022-01-26 14:15:39', '2022-01-26 14:15:39'),
(204, 'Atia Islam', '665856856858', 'user1643206695.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$uhJK2YRxZyrMsY5YjzcdU.TMhn9B/yd30jF5/Fr66dWNZbqY039EO', NULL, '2022-01-26 14:18:15', '2022-01-26 14:18:15'),
(205, 'Kamran Javed', '1420300967644', 'user1643206888.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$OTl15FrFGsTORCoLULs7wO0gUYCmni38hefvdWWgAdTZ/SZKQt7Hq', NULL, '2022-01-26 14:21:28', '2022-01-26 14:21:28'),
(206, 'Arsal Taimoor', '464543576435745', 'user1643206958.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$gFJQjw8pJ8qGSq70d6u2bO9/l99lhf5JhsNZd1uR0wERd0dh.asqu', NULL, '2022-01-26 14:22:38', '2022-01-26 14:22:38'),
(207, 'Muhammad Ismail', '575665865785', 'user1643264654.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$emMaSHD0lQ2Vc495V09w6u6xj/ukyIk0nzTPtgg6YQiba5bT3qua6', NULL, '2022-01-27 06:24:14', '2022-01-27 06:24:14'),
(208, 'Zareen Gul', '65464536564367', 'user1643264829.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$er4WNtxa6WBGcTVFwc8sAe2lxIqcWEMc72BV.bOohai2wezITDKF2', NULL, '2022-01-27 06:27:09', '2022-01-27 06:27:09'),
(209, 'Muhammad Arif', '645756865856', 'user1643265045.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$tFIXkqv3ii6BulcpX5TNAuNebB1PkhIB/bWTW3xGvOKeRmr.DLcXa', NULL, '2022-01-27 06:30:45', '2022-01-27 06:30:45'),
(210, 'Muhammad Wajid', '545645745743342', 'user1643265793.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$5C5NTjdOB1aCHvUhh7yzXudYMdKryK7aC.9jD0yMAYY2QPTiMyt3W', NULL, '2022-01-27 06:43:13', '2022-01-27 06:43:13'),
(211, 'Sultan Aziz', '23401741852963', 'user1643267214.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$.zXsvqtXJO986B4tAbYgGuA5bPTrqMV77T0sIPxMuLzfOAayrKNc2', NULL, '2022-01-27 07:06:54', '2022-01-27 07:06:54'),
(212, 'Fehmia Khattak', '23401789456321', 'user1643267303.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$0rZ596MGXZeHdcN.w6MyIeRizg9hiQIbxBkwDZX88SHmjt8mvxFge', NULL, '2022-01-27 07:08:23', '2022-01-27 07:08:23'),
(213, 'Tariq Aziz', '23401123456789', 'user1643267696.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$iWUUrXZsxin6ipyd3zva3.vxAUzHRtOdYdTXzpCVENtXb/P03FqGi', NULL, '2022-01-27 07:14:56', '2022-01-27 07:14:56'),
(214, 'Tahir Aziz', '23401741854789', 'user1643267978.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$zEQtoBJllHmFWJjfyIt1GOD9qrbEP1Az7DFDkWKb5J00mWYf3MIwW', NULL, '2022-01-27 07:19:38', '2022-01-27 07:19:38'),
(215, 'MuddasirAziz', '23401985632478', 'user1643268266.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$s5OavODhm3Sycf6wknIAtOuGRuXkSAZhypqYTLWoHpEoGpBAHD9vi', NULL, '2022-01-27 07:24:26', '2022-01-27 07:24:26'),
(216, 'Gul Rehman', '25401325647891', 'user1643268905.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$eChq9qD4513mASP5epAkqu2QyHaGuxPQUthRwnKL6fKso5TmyUMB.', NULL, '2022-01-27 07:35:05', '2022-01-27 07:35:05'),
(217, 'Gul Shadana', '25401965897453', 'user1643269043.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$Rs8fK7uA4ZFQALnEz7XzEu6XtzvT3vOEd9gAc8I4C.sxglY06JWhi', NULL, '2022-01-27 07:37:23', '2022-01-27 07:37:23'),
(218, 'Ishfaq Rehman', '25401936364328', 'user1643269164.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$IZ3sQTdatA./V.kUeeePg.aidwciIPC5zHFK5PHDLPMclEJiE5yV6', NULL, '2022-01-27 07:39:24', '2022-01-27 07:40:02'),
(219, 'Arshad Rehman', '25401321456987', 'user1643269479.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$PVMakMOI6INndvO5HuE0V.totK0Cm5UtHAvopHsv8d2OGjW1YfBpC', NULL, '2022-01-27 07:44:39', '2022-01-27 07:44:39'),
(220, 'Abad Gul', '26401654789321', 'user1643271813.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$F4Lmwh8r2rkjIZybuX.f4em0xkfUxM4JdTfWCEya8jldMBfr4Rigu', NULL, '2022-01-27 08:23:33', '2022-01-27 08:23:33'),
(221, 'Nawab Jana', '2610498745632', 'user1643271979.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$gJGBUG5lHYNybaXLN3.Oou8pr3T.vcg9m5jx075USvDb4NWKm7Eby', NULL, '2022-01-27 08:26:19', '2022-01-27 08:26:19'),
(222, 'Rehman Gul', '26401232115648', 'user1643272305.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$AUHLiVm8ChUarVkdxN/sSeLzR0ApWKu3SvzEXeJNXU2tb/.Ux3jIG', NULL, '2022-01-27 08:31:45', '2022-01-27 08:31:45'),
(223, 'Lal Sharifa', '26401325569774', 'user1643275593.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$DWQPV0gN37d3i6A7s5bT0e3AgGSEhiMDQ/6eDqTXcRhnsWkxAMB0.', NULL, '2022-01-27 09:26:33', '2022-01-27 09:26:33'),
(224, 'Nambi Rehman', '2640188524698', 'user1643275962.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$.x86eNE2hmEwmc1JlaaZBeTkkIoIMkVPSKOs8Tp9G5BQl/wWAKhaS', NULL, '2022-01-27 09:32:42', '2022-01-27 09:32:42'),
(225, 'Zia Ur Rehman', '26501564236587', 'user1643276239.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$oZuz9lWnWDWEM6J6vdAC3OuY.iFgPvXG.G.qVwY7aqdTdIskQ6g82', NULL, '2022-01-27 09:37:19', '2022-01-27 09:37:19'),
(226, 'Tajriat Khan', '4130198569741', 'user1643277403.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$Jq4G8.qESxURV/XDRXwdMOtNUin3sqW1aDGcOhO2I.wAFvM40/JdK', NULL, '2022-01-27 09:56:43', '2022-01-27 09:56:43'),
(227, 'Zari Jaan', '413015698745632', 'user1643277543.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$FRVAOi3ziaSfvK1bHC43kO.221VUEM9to8dHjRTspmj2TUSa2mfBa', NULL, '2022-01-27 09:59:03', '2022-01-27 09:59:03'),
(228, 'Abdul Basit', '413015469871254', 'user1643277721.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$njjcZ.GKg4S1iUMOhdPXe.ER3G6BuszaoKDSjNNAr7o3i3DK/0/pK', NULL, '2022-01-27 10:02:01', '2022-01-27 10:02:01'),
(229, 'Abdul Nasir', '1430256132897465', 'user1643278122.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$3nhHHJnYO/0xgVPglcuCpuH7dgFwOs1EpGRoSWUrf8Zz4beeoz1fS', NULL, '2022-01-27 10:08:42', '2022-01-27 10:08:42'),
(230, 'Adil shezaid', '1420345768909765', 'emp1643311418.jpeg', 'info@123fooddel.com', '8888888', NULL, 'Active', NULL, '$2y$10$5F0CjdfeczjmOmjuA2UgF.mun05JEp/mHlWyndZcuTPb0q2UqvrPm', NULL, '2022-01-27 19:23:39', '2022-01-28 10:43:11'),
(231, 'Majid Akhbar', '142023340556', 'emp1643364545.jpg', 'majid223ak@gmail.com', '34606556056', NULL, 'Active', NULL, '$2y$10$Kr10De67FkxWFmYyHP6yLOBLxplez02yWwwS/CG6qmCuslR5EAn5y', NULL, '2022-01-28 10:09:05', '2022-02-02 09:07:58'),
(232, 'Rabia Khan', '1450545453546', 'emp1643365270.jpg', 'rabimarwat221@gmail.com', '332354565466', NULL, 'Active', NULL, '$2y$10$.SPjOWnfwUnOshH8bHNI6epf1dhHGNGmdCFDk03kSu8hGNGWRqjhK', NULL, '2022-01-28 10:21:10', '2022-04-08 14:29:56'),
(233, 'Kamran Amjid', '140453934343', 'emp1643366113.jpg', 'test@gmail.com', '33244548558', NULL, 'Active', NULL, '$2y$10$zkSYtSd78rh/Ocv2RIk4we/ssd9p2KVdPmL/HxEoZc2oocNSNlsEG', NULL, '2022-01-28 10:35:13', '2022-01-28 10:56:51'),
(234, 'Sania Khalid', '1504443650454', 'emp1643367319.jpg', 'mdsania@gmail.com', '32545547656', NULL, 'Active', NULL, '$2y$10$cz.Uym.kBbqkLIdV4Itv0uziALId/q9AbbIJxm4hg4es6qlfDeEbG', NULL, '2022-01-28 10:55:19', '2022-01-28 12:48:48'),
(235, 'Mr Jamal', '13933489846567', 'emp1643367898.jpg', 'test@gmail.com', NULL, NULL, 'Active', NULL, '$2y$10$r8IoKiQhjji7JhWDQAJB3eEtniTe.zeDu/.TS8CzOZYGHeBxF8VXq', NULL, '2022-01-28 11:04:58', '2022-01-28 11:04:58'),
(236, 'Yasmeen Rasheed', '14030334894383', 'emp1643369203.jpg', 'yasmee223@gmail.com', '0302437438434', NULL, 'Active', NULL, '$2y$10$t9oKTKV.S9Sp0D7CnLkJrest5Yk/l1GWVSVye/QwPKBACQeD5Kope', NULL, '2022-01-28 11:26:43', '2022-03-14 02:58:26'),
(237, 'Khalima Riaz', '14305556656687', 'emp1643370197.jpg', 'test@gmail.com', '03225457454758', NULL, 'Active', NULL, '$2y$10$.FuLyG2oR723UEm41bnXx.juI6XFLUY6okDu6OUo/GT.CqXU8KQtC', NULL, '2022-01-28 11:27:17', '2022-02-08 05:12:14'),
(238, 'Samreen Mariam', '140594113677565', 'emp1643369642.jpg', 'test@gmail.com', '34342545554', NULL, 'Active', NULL, '$2y$10$WaNKXNW7qkG.w.kfFiveGO8SvIrm.U12e7i2iZrs0ziIGEZwXR.iS', NULL, '2022-01-28 11:34:02', '2022-02-03 08:05:43'),
(239, 'M Jameel', '143054545677', 'emp1643372099.jpg', 'test@gmail.com', NULL, NULL, 'Active', NULL, '$2y$10$s3CqzeLP.5Mx9MgGWSBZyOkBo3qdqfShlZVUbpYji2PZwx5.w.oYy', NULL, '2022-01-28 12:14:59', '2022-01-28 12:14:59'),
(240, 'Rohi Jahangeer', '13004344574845', 'emp1643373054.jpg', 'test@gmail.com', '3444545464', NULL, 'Active', NULL, '$2y$10$E4fNRrXWSiI8/.U6Oh0hGup4Npnaew1rUGgY5pdFsJpEM2SHeLRWu', NULL, '2022-01-28 12:30:54', '2022-01-28 12:43:12'),
(241, 'Wahab', '1403343478456', 'emp1643375049.jpg', 'test@gmail.com', NULL, NULL, 'Active', NULL, '$2y$10$IGUAFOsNOVlXF6U6qmdNYOqKmOjd3WIYiRO8hpgmYZ/anzAbm/aMC', NULL, '2022-01-28 13:04:09', '2022-01-28 13:04:09'),
(242, 'Khalid Jamal', '1429349889574', 'emp1643375991.jpg', 'test@gmail.com', NULL, NULL, 'Active', NULL, '$2y$10$UUsiL8lRWdafluEbim8CI.bYO385Jy0hQzZmUqgKqv8lMmUNN26Bq', NULL, '2022-01-28 13:19:51', '2022-01-28 13:19:51'),
(243, 'Marya Nawaz', '1530568569568', 'emp1643377011.jpg', 'test@gmail.com', '33756985698', NULL, 'Active', NULL, '$2y$10$4TRdL1whT3cHbF/b13Jjwe1bFQjiWcRS6oAHJ.9K7KfpdSD9eO3EO', NULL, '2022-01-28 13:36:51', '2022-03-10 09:11:37'),
(244, 'Arsalan Hamza', '1435234344596', 'emp1643377444.jpg', 'test@gmail.com', NULL, NULL, 'Active', NULL, '$2y$10$9XSkF2orf6iczsL/MDNwKuN/y1avcvlfuZo/Auc4u/p1r6C3GCCba', NULL, '2022-01-28 13:44:04', '2022-01-28 13:44:04'),
(245, 'Amjad Sabir', '154330465757865', 'emp1643377789.jpg', 'test@gmail.com', '333045845948', NULL, 'Active', NULL, '$2y$10$kdSodkQJQeZwB42ZOky0buDZlsQUAjzDTlMP/GvQEYeNGmvI9HaP6', NULL, '2022-01-28 13:49:49', '2022-04-05 02:18:35'),
(246, 'Fazilat Jawad', '150445485945', 'emp1643378564.jpg', 'test@gmail.com', NULL, NULL, 'Active', NULL, '$2y$10$gdhLUkSjW6JLzw0AoIrvOOZaZwbUBqCXdSrwx14Gtx0OfhuiyjJoK', NULL, '2022-01-28 14:02:44', '2022-01-28 14:02:44'),
(247, 'Jamal', '14403348738743', 'emp1643378989.jpg', 'test@gmail.com', NULL, NULL, 'Active', NULL, '$2y$10$xFG4JziX6b95LZPcIjKyuODRAmkwVROAUZqH/gpbnwXqxoBRWW2z.', NULL, '2022-01-28 14:09:49', '2022-01-28 14:09:49'),
(248, 'Kamran Hanif', '143055566566755', 'emp1643379402.jpg', 'test@gmail.com', NULL, NULL, 'Active', NULL, '$2y$10$JZTPoV9YUpfz6mtVRj4MVuJj/pE5CkWEuOCtu6aca1yLjjYXDVe/G', NULL, '2022-01-28 14:16:42', '2022-01-28 14:16:42'),
(249, 'M khalid', '145034454548004', 'emp1643608611.jpg', 'm.khalid22114@gmail.com', '3224554589', NULL, 'Active', NULL, '$2y$10$KB0gurUg9tigqDW3TfA8Feayv2w0FqiPs49fz4gjjXuYSQjhC75O.', NULL, '2022-01-31 05:56:51', '2022-03-11 08:12:06'),
(250, 'Zafar Habib', '8977456587965', 'user1645444579.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$ZV4eCpfNu8xEPQbp8jJsmOav8Gc3mk3Jt3UI0vABwZ02Fct/Vzjmi', NULL, '2022-02-21 06:56:19', '2022-02-21 06:56:19'),
(251, 'Raheela Rauf', '85611324412644', 'user1645444679.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$ThBfLiO0tryeis1qqvSI1ulETp4M10UJXvkbxUz/UxYfh5wH7/YZy', NULL, '2022-02-21 06:57:59', '2022-02-21 06:57:59'),
(252, 'Ibrar Khan', '543563247857435', 'user1645444846.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$/3CCUisTpLDn26miMypFXeMhEuwQVN9L9KorTwm/zVgUZRzdJ7jiK', NULL, '2022-02-21 07:00:46', '2022-02-21 07:00:46'),
(253, 'Rubaisha Zafar', '78311324564978', 'user1645445315.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$ii9rgkTvPplN9ww0NKyoYu1fqstSpZfeHDbIhliqvfWEgRn7ei3uW', NULL, '2022-02-21 07:08:35', '2022-02-21 07:08:35'),
(254, 'Gul Habib', '42315324532452', 'emp1645448815.jpg', 'gulhabib@gmail.com', '99999999999', NULL, 'Active', NULL, '$2y$10$dEbrglI4eNqznLd02zfaY.OFJzCHiXCAO3.n7lTvbmY8PnIgzk5pq', NULL, '2022-02-21 08:06:55', '2022-04-19 03:09:14'),
(255, 'FAzal Habib', '43634262345634', 'emp1645449530.jpg', 'sardarhabid@gmail.com', NULL, NULL, 'Active', NULL, '$2y$10$fDEkRE2X9eOa22DC5QlYauCycOU6pAsU8wFEk9/B20ebIjI0Lnt7u', NULL, '2022-02-21 08:18:50', '2022-02-21 08:18:50'),
(256, 'Abdullah', '4634654646356', 'emp1645450171.jpg', 'ghulamkhattak@gmail.com', '42123456789', NULL, 'Active', NULL, '$2y$10$ufbZ/eVyPP4K.PZsUwujbuypHxG6WkIfF99fzUZ2hgzUDV1wuMv5S', NULL, '2022-02-21 08:29:31', '2022-04-19 04:31:37'),
(257, 'Zain ul Abidin', '15203123456789', 'emp1646995790.jpg', 'zainulabidin@gmail.com', '99999999999', NULL, 'Active', NULL, '$2y$10$othiZyGckN0uFEcZ9OpSyOUYhX6FCQtatRuTPBIbr7lR84048nSES', NULL, '2022-03-11 05:49:50', '2022-03-11 05:51:13'),
(258, 'Zafran Ullah', '15203852147963', 'emp1646999129.jpg', 'zafranullah@gmail.com', '88888888888', NULL, 'Active', NULL, '$2y$10$8T.LIeH4wM7lw8avSm2IzOgzmEe.l0.ua4h6lswARoWns.GcSmJWK', NULL, '2022-03-11 06:45:30', '2022-03-11 08:02:09'),
(259, 'Abdul Qadir', '1420278654320', 'emp1647258048.jpg', 'abdulqadir@gmail.com', '88888888888', NULL, 'Active', NULL, '$2y$10$ykZ0ZCTxnIuSo35hKE45RecNPbRIWG0sWwBS6mglPk/Ew7w2wdtr2', NULL, '2022-03-14 06:40:48', '2022-03-15 08:13:12'),
(260, 'Muhammad Akmal', '1420613136625', 'user1647258763.jpg', NULL, '555555555', NULL, 'Active', NULL, '$2y$10$aSHbgEOQF49GDuO36nmbCe31m7zNcDgakYsByZepel/1Vqx/EtMVW', NULL, '2022-03-14 06:52:43', '2022-03-14 06:52:43'),
(261, 'Noreen Akmal', '1620695874125', 'user1647258866.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$3gW6r39cK5ecf783Nb3/JupREIgrwjFvjPmEaSIVTsFlKio3bYp4C', NULL, '2022-03-14 06:54:26', '2022-03-14 06:54:26'),
(262, 'Kamran Akmal', '1420613131414156', 'user1647259277.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$NUBaLl1nnSgwo4yknIVcue8.CBKQ5EcL1iu.FRv6zGDj.VnO7vNdS', NULL, '2022-03-14 07:01:17', '2022-03-14 07:01:17'),
(263, 'John Smith', '152038585274169', 'emp1647417761.jpg', 'johnsmith@gmail.com', '99999999999', NULL, 'Active', NULL, '$2y$10$TpVX9gXP7ZQDHhRmL5MUie.168l2nWBcfB8CxgoK7r3tocS7qEf/a', NULL, '2022-03-16 03:02:41', '2022-04-19 04:31:18'),
(264, 'Gul e Rana', '324513252135', 'emp1647419085.jpg', 'gulerana@gmail.com', '88888888888', NULL, 'Active', NULL, '$2y$10$bJmIx0XOfcoMHPgR/AhIS.rn7kpg8K0/qTPHAaghEei7F.tk7LG26', NULL, '2022-03-16 03:24:45', '2022-04-04 06:54:41'),
(265, 'Shamshad Akhtar', '2131421341235254', 'emp1647419165.jpg', 'shamshad@gmail.com', '99999999999', NULL, 'Active', NULL, '$2y$10$na/13982od1fdtDDrmJGU.i1L3odE.R0GFGW/cpiXSMiWaJZdpZui', NULL, '2022-03-16 03:26:05', '2022-04-19 02:54:46'),
(266, 'Damzaz Ahmad', '52133523523152321', 'emp1647424837.jpg', 'muhammadqalam@gmail.com', '99999999999', NULL, 'Active', NULL, '$2y$10$9H4xzJe7IgPrmDry.BwiGuPJ4NJmo95kFF9X6.WPQnVOTJNSmXbe.', NULL, '2022-03-16 05:00:37', '2022-04-19 04:30:58'),
(267, 'Zubair Gulzar', '4362347345754', 'emp1647425411.jpg', 'zubairgulzar@gmail.com', '99999999999', NULL, 'Active', NULL, '$2y$10$0YnkAdBF0jRxSrCAgp2UU.9Uj/yfVMfOZC2ocHGIK7OfQ84eZuo.K', NULL, '2022-03-16 05:10:11', '2022-04-19 02:50:59'),
(268, 'Gulzar Zafran', '32152315321532', 'emp1647425547.jpg', 'gulzarzafran@gmail.com', '99999999999', NULL, 'Active', NULL, '$2y$10$9kfrhXs6G7RiHdZsELQzEeghcexF6B9jPMZO1n6Vte5H3qheAEPNS', NULL, '2022-03-16 05:12:27', '2022-04-19 02:45:54'),
(269, 'Zahid Ullah Khan', '3235324323243343', 'emp1647425772.jpg', 'muhammadshahidkhan@gmail.com', '99999999999', NULL, 'Active', NULL, '$2y$10$B7WeBs06fRxIMLgDaB2jf.EE0KkD/A9eEDy/NbYUgvvGhEvF/XSXi', NULL, '2022-03-16 05:16:12', '2022-04-19 04:27:52'),
(270, 'Aiza Khan', '155015566449988', 'emp1647427284.jpg', 'muhammadkhan@gmail.com', '99999999999', NULL, 'Active', NULL, '$2y$10$Uldyh66GCoY5ccZwFQsBqOSDGUw.YJ8FlIphHSZJK3KicZpCCU0su', NULL, '2022-03-16 05:41:24', '2022-04-13 04:19:22'),
(271, 'Abdul Qadoos', '16206963852741', 'user1647587742.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$LTbNqMX6KfC99bKeAL4PsuNGkiOUYmjXtzKmHRDNxYdAh8riiHj0S', NULL, '2022-03-18 02:15:42', '2022-03-18 02:15:42'),
(272, 'Kamran Ghulam', '25252525252525', 'user1647596940.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$jRo.YVYm8.Ef2xA/ND2.d.i/.zdVoZDp./8hJNaRA5D3A5Vt79eoC', NULL, '2022-03-18 04:49:00', '2022-03-18 04:49:00'),
(273, 'Fakhar Zaman', '6565989874123', 'user1647597217.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$hyeIY88DQRy2eYfaDHwUdebL8EyOf351seGCmOVq7rlLK16PLKG4G', NULL, '2022-03-18 04:53:37', '2022-03-18 04:53:37'),
(274, 'Zar Nisa', '3523345632463', 'user1647599339.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$OwaucZELaCwaxwiMc5eHze8WcRRe6fZgsS3oAS71htXfdrrlBLbme', NULL, '2022-03-18 05:28:59', '2022-03-18 05:28:59'),
(275, 'Fakhira Munir', '951423687258', 'user1647599631.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$/4P7Z7wkcZhj5RPJeXw/R..9Ba9r26iqs5klsDuAex9xp7LjLuSBG', NULL, '2022-03-18 05:33:51', '2022-03-18 05:33:51'),
(276, 'Gulalai Wazir', '43464575467745', 'user1647599946.jpg', 'gulazaiwazir@gmail.com', '6333333333333', NULL, 'Active', NULL, '$2y$10$7v6aH5G0ILqSuwfvSbBV2eeLeqko.UAd5eSesof60qLB5THIVJtiO', NULL, '2022-03-18 05:39:06', '2022-03-18 05:39:06'),
(277, 'Hina Zafar', '72473275347', 'user1647602976.jpg', NULL, NULL, NULL, 'Active', NULL, '$2y$10$b7Jl4hMFay12fsWftbvaWu1fHc9GfBaHHD9IvR2yDDzLARlG8Z5gy', NULL, '2022-03-18 06:29:36', '2022-03-18 06:29:36'),
(278, 'Naimat Ullah', '6342634225345342', 'user1647607783.jpg', 'NaimatUllah@ptv.com', '666666666666', NULL, 'Active', NULL, '$2y$10$/qfYUTaJPt3HuC.MyXCt0.HWwGyFf2k1TPV5uBzT4PYV5NgKYQFom', NULL, '2022-03-18 07:49:43', '2022-03-18 07:49:43'),
(279, 'Muhammad Arif', '56478932114785', 'user1647611707.jpg', 'muhammadarif', NULL, NULL, 'Active', NULL, '$2y$10$mTsBxfPGnzchUy3sDgBbUePoMlPtK9dnzyb.58LIEPk3qwHPAhJrS', NULL, '2022-03-18 08:55:07', '2022-03-18 08:55:07'),
(280, 'Nayaz Khatoon', '542147852369', 'user1647611896.png', 'nayazkhatoon@gmail.com', NULL, NULL, 'Active', NULL, '$2y$10$VU9AItLeIxSI5yG74FWb6eBeX2DYb90gK8DRO52i7W8veto1nIZ4e', NULL, '2022-03-18 08:58:16', '2022-03-18 08:58:16'),
(282, 'Syeda Fatima Jalal', '3653875328732', 'user1647861577.jpg', 'SyedaFatimaJalal@gmail.com', '9876541', NULL, 'Active', NULL, '$2y$10$CQAVF47652Fwj7PIHGn7Jeu.F3rxF/14zKrs9Yfynt6lh4efYBml6', NULL, '2022-03-21 06:19:37', '2022-03-21 06:20:17'),
(283, 'Atizaz Ahmad', '56346342264326', 'user1647862024.jpg', 'AtizazAhmad@gmail.com', '0123456789', NULL, 'Active', NULL, '$2y$10$RT1R/XR8ycrWW6CgeVD3E.HpW9YLVD1s8JZ0aNvMhYaW5hR15roo.', NULL, '2022-03-21 06:27:04', '2022-03-21 06:27:04'),
(284, 'Gul Dad Khan', '123456879546212', 'user1648190049.jpg', 'guldadkhan@gmail.com', '03339654236', NULL, 'Active', NULL, '$2y$10$3AMWvJjfScKZz2inViaVJ.EJxF7fEzUulylMQQJMB/vFWCKmhUTTK', NULL, '2022-03-25 01:34:09', '2022-03-25 01:34:09'),
(285, 'Bibi Janana', '4643266434325435', 'user1648190181.jpg', 'bibijanana@gmail.com', '03353443510', NULL, 'Active', NULL, '$2y$10$llzMXSNR32qkIrhENyOBkOwSIDQkskQm7s/hrI4NCQoWBL25qzQLK', NULL, '2022-03-25 01:36:21', '2022-03-25 01:36:21'),
(289, 'Rajab Khan', '45463426346346343', 'user1648191296.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$z1eDzDOTOMMQ2Zpzt4e4MuhcKpTDrs7Mz1dOEE4uo2ed45RovjQA.', NULL, '2022-03-25 01:54:56', '2022-03-25 01:54:56'),
(290, 'Sher Bahadur 1', '97348283473249823', 'user1648191899.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$X6EK28FP6dV6KhIg1dMyWuMaCKTJhSZjD5XK/.xdlWLiHBjcEyIy2', NULL, '2022-03-25 02:04:59', '2022-03-25 02:14:07'),
(291, 'Kamran Khan', '63422632463422632', 'user1648192950.png', NULL, NULL, NULL, 'Active', NULL, '$2y$10$o1sXlHMe.5/XFP.TZz5KgeXJy76nQy5Q6hHgnAC7TagIooUku12mq', NULL, '2022-03-25 02:22:30', '2022-03-25 02:22:30'),
(292, 'Gulzar Ali', '534325346346355', 'user1649069708.jpg', 'gulzarali@gmail.com', '03339654236', NULL, 'Active', NULL, '$2y$10$I8.bEuw.wW4mIZaqyEr2oOL7q.OQ0hXOlwUv47WxBzBzD05TEmYje', NULL, '2022-04-04 05:55:08', '2022-04-04 05:55:08'),
(293, 'Gulzara Begum', '5654747565767', 'user1649069782.jpg', 'GulzarBegum@gmail.com', '0519654236', NULL, 'Active', NULL, '$2y$10$JmlHxPL69/N72cvM6haZs.zG84Zi3g4LWWbXtCvigL0qTuYoZNqJy', NULL, '2022-04-04 05:56:22', '2022-04-04 05:56:22'),
(294, 'Ali Zafar', '175026456546433', 'user1649413774.jpg', 'alizafar@gmail.com', '123456789', NULL, 'Active', NULL, '$2y$10$5gce8H8bEgNM3roJDXXBvedANUK8KdUraZ5A9.tWmj0AwUGQsH09K', NULL, '2022-04-08 05:29:34', '2022-04-08 05:29:34'),
(295, 'Sania Zafar', '175027956654323', 'user1649413857.jpg', 'saniazafar@gmail.com', '123456789', NULL, 'Active', NULL, '$2y$10$Mj6fr9F2lmaZyY.4iIQWveVyRgzcJkpMFOhD71Bs3/Ll4HEuQ0L8a', NULL, '2022-04-08 05:30:57', '2022-04-08 05:30:57'),
(296, 'Fiza Khan', '89456321558882', 'emp1649837198.png', 'muhammadfizan@gmail.com', '99999999999', NULL, 'Active', NULL, '$2y$10$L2puc6bQf1nr6bBeyNMb/.d/9xUvYUoxFxb6ZMfxKl5Qx9hFcp/dy', NULL, '2022-04-13 03:06:38', '2022-04-13 03:14:30'),
(297, 'Miss Tony Willing', '3254352346346', 'emp1649842775.jpg', 'tonywilling@gmail.com', NULL, NULL, 'Active', NULL, '$2y$10$PiLUou461dxiDL4TxJctEeSFGB03cqfagSjwI1yDSa5nU87mS1Zyq', NULL, '2022-04-13 04:39:35', '2022-04-13 04:39:35');

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
(7, 'Librarian'),
(8, 'Super Admin');

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
(5, '2022-03-16', NULL, 'All due is clear plz issue leaving certificate', 107);

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
-- Indexes for table `bank_account`
--
ALTER TABLE `bank_account`
  ADD PRIMARY KEY (`bank_acc_Id`),
  ADD KEY `fk_user_Id` (`user_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `class` (`cls_Id`);

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
-- Indexes for table `education_level`
--
ALTER TABLE `education_level`
  ADD PRIMARY KEY (`edu_level_Id`);

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
  ADD KEY `employee_info_prevfk` (`experience`(768)),
  ADD KEY `employee_info_proffk` (`professional`(768)),
  ADD KEY `employee_info_acdmfk` (`academic`(768)),
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
  ADD PRIMARY KEY (`grade_Id`),
  ADD KEY `examgarde` (`exam_Id`);

--
-- Indexes for table `grade_general`
--
ALTER TABLE `grade_general`
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
-- Indexes for table `professional_qualification`
--
ALTER TABLE `professional_qualification`
  ADD PRIMARY KEY (`prof_qual_Id`);

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
  ADD KEY `student_info_lschfk` (`lsch_Id`),
  ADD KEY `class_section` (`section_id`);

--
-- Indexes for table `student_sessions`
--
ALTER TABLE `student_sessions`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`syllabus_Id`),
  ADD KEY `exam_Id` (`exam_Id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`tr_Id`);

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
  MODIFY `acdm_qual_Id` bigint(10) NOT NULL AUTO_INCREMENT COMMENT 'Academic Qualification''s ID', AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `account_type`
--
ALTER TABLE `account_type`
  MODIFY `acc_type_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `adm_No` bigint(100) NOT NULL AUTO_INCREMENT COMMENT 'Admission number of student', AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `advance_salary`
--
ALTER TABLE `advance_salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `attendance_type`
--
ALTER TABLE `attendance_type`
  MODIFY `att_typ_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Attendance type''s ID', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attendence`
--
ALTER TABLE `attendence`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `auth_Id` bigint(10) NOT NULL AUTO_INCREMENT COMMENT 'Author ID', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bank_account`
--
ALTER TABLE `bank_account`
  MODIFY `bank_acc_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blood_group`
--
ALTER TABLE `blood_group`
  MODIFY `bg_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Blood Group ID', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `boards`
--
ALTER TABLE `boards`
  MODIFY `pk_board_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Board ID', AUTO_INCREMENT=9;

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
  MODIFY `cls_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Class Id', AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `classsched`
--
ALTER TABLE `classsched`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `classsched_days`
--
ALTER TABLE `classsched_days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=872;

--
-- AUTO_INCREMENT for table `classwise_achievement`
--
ALTER TABLE `classwise_achievement`
  MODIFY `id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `classwise_attendace`
--
ALTER TABLE `classwise_attendace`
  MODIFY `cls_att_Id` bigint(100) NOT NULL AUTO_INCREMENT COMMENT 'Classwise Attendance ID', AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `classwise_behaviour`
--
ALTER TABLE `classwise_behaviour`
  MODIFY `id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `class_section`
--
ALTER TABLE `class_section`
  MODIFY `c_section_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Section ID', AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `datesheet`
--
ALTER TABLE `datesheet`
  MODIFY `dsheet_Id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `desig_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Designation ID', AUTO_INCREMENT=965;

--
-- AUTO_INCREMENT for table `diary`
--
ALTER TABLE `diary`
  MODIFY `pk_diary_Id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'diary ID', AUTO_INCREMENT=93;

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
-- AUTO_INCREMENT for table `education_level`
--
ALTER TABLE `education_level`
  MODIFY `edu_level_Id` bigint(10) NOT NULL AUTO_INCREMENT COMMENT 'University\r\nBorad ', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `edu_department`
--
ALTER TABLE `edu_department`
  MODIFY `pk_reg_Id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'REgistration Id';

--
-- AUTO_INCREMENT for table `emergency_contact`
--
ALTER TABLE `emergency_contact`
  MODIFY `emer_cnt_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Student Emergency ID', AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT for table `employee_attendance`
--
ALTER TABLE `employee_attendance`
  MODIFY `emp_att_Id` bigint(100) NOT NULL AUTO_INCREMENT COMMENT 'Employee Attendance ID';

--
-- AUTO_INCREMENT for table `employee_contact`
--
ALTER TABLE `employee_contact`
  MODIFY `emp_cnt_Id` bigint(10) NOT NULL AUTO_INCREMENT COMMENT 'Employee contact table Id', AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `employee_info`
--
ALTER TABLE `employee_info`
  MODIFY `emp_Id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Employee ID', AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `employee_type`
--
ALTER TABLE `employee_type`
  MODIFY `emp_typ_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Employee type''s ID', AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `employment_info`
--
ALTER TABLE `employment_info`
  MODIFY `empt_Id` bigint(10) NOT NULL AUTO_INCREMENT COMMENT 'Employment table ID', AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `entity_type`
--
ALTER TABLE `entity_type`
  MODIFY `ent_typ_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Entity Type ID', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `examination`
--
ALTER TABLE `examination`
  MODIFY `exm_Id` bigint(100) NOT NULL AUTO_INCREMENT COMMENT 'Exam ID';

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `exam_Id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `exam_paper`
--
ALTER TABLE `exam_paper`
  MODIFY `exampaper_Id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `exam_type`
--
ALTER TABLE `exam_type`
  MODIFY `exm_typ_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Exam Type''s ID', AUTO_INCREMENT=10;

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
  MODIFY `fee_sch_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'PK', AUTO_INCREMENT=28;

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
  MODIFY `grade_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Grade ID', AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT for table `grade_general`
--
ALTER TABLE `grade_general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `last_school`
--
ALTER TABLE `last_school`
  MODIFY `lsch_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Last school Id', AUTO_INCREMENT=124;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

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
  MODIFY `pnt_Id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Parent ID', AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `payment_mode`
--
ALTER TABLE `payment_mode`
  MODIFY `PM_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Payment Mode ID';

--
-- AUTO_INCREMENT for table `pay_schedule`
--
ALTER TABLE `pay_schedule`
  MODIFY `pay_sch_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'PK', AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `periods`
--
ALTER TABLE `periods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `prev_experience`
--
ALTER TABLE `prev_experience`
  MODIFY `prev_exper_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Prev Experience ID', AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `professional_qualification`
--
ALTER TABLE `professional_qualification`
  MODIFY `prof_qual_Id` bigint(10) NOT NULL AUTO_INCREMENT COMMENT 'Professional Qualification''s ID', AUTO_INCREMENT=4;

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
  MODIFY `pk_school_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'School ID', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `school_section`
--
ALTER TABLE `school_section`
  MODIFY `sc_sec_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `setsubjectmarks`
--
ALTER TABLE `setsubjectmarks`
  MODIFY `submarks_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `stationary_category`
--
ALTER TABLE `stationary_category`
  MODIFY `stat_categ_Id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Stationary category ID', AUTO_INCREMENT=7;

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
  MODIFY `std_cat_Id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'Category ID', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student_contact`
--
ALTER TABLE `student_contact`
  MODIFY `pnt_cnt_Id` bigint(10) NOT NULL AUTO_INCREMENT COMMENT 'parent contact table id', AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `std_Id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'This is the student''s ID that will be used in Admission No as well', AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `student_sessions`
--
ALTER TABLE `student_sessions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `study_material`
--
ALTER TABLE `study_material`
  MODIFY `pk_study_material_Id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Study material ID', AUTO_INCREMENT=18;

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
  MODIFY `syllabus_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `tr_Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=345;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=298;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `user_type_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `withdrawl_student`
--
ALTER TABLE `withdrawl_student`
  MODIFY `with_Id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Withdrawl ID', AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bank_account`
--
ALTER TABLE `bank_account`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

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
-- Constraints for table `classsched`
--
ALTER TABLE `classsched`
  ADD CONSTRAINT `class` FOREIGN KEY (`cls_Id`) REFERENCES `class` (`cls_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `grade`
--
ALTER TABLE `grade`
  ADD CONSTRAINT `examgarde` FOREIGN KEY (`exam_Id`) REFERENCES `exams` (`exam_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `setsubjectmarks`
--
ALTER TABLE `setsubjectmarks`
  ADD CONSTRAINT `exam_setsubjectmarks` FOREIGN KEY (`exam_Id`) REFERENCES `exams` (`exam_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

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

--
-- Constraints for table `syllabus`
--
ALTER TABLE `syllabus`
  ADD CONSTRAINT `exam_syllabus` FOREIGN KEY (`exam_Id`) REFERENCES `exams` (`exam_Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
