-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2018 at 12:10 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adeoyo_hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `act_id` int(255) NOT NULL,
  `action` text NOT NULL,
  `user_details` varchar(255) NOT NULL,
  `time_added` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`act_id`, `action`, `user_details`, `time_added`) VALUES
(1, 'Logged In', 'tolajide75@gmail.com', '2018-05-25 16:18:29'),
(2, 'Logged In', 'tolajide74@gmail.com', '2018-05-25 10:51:01'),
(3, 'Logged In', 'tolajide74@gmail.com', '2018-05-25 10:51:09'),
(4, 'Logged In', 'tolajide74@gmail.com', '2018-05-25 10:51:44'),
(5, 'Logged In', 'tolajide74@gmail.com', '2018-05-25 10:52:30'),
(6, 'Logged Out', 'tolajide74@gmail.com', '2018-05-25 10:52:54'),
(7, 'Logged In', 'tolajide74@gmail.com', '2018-05-25 10:52:56'),
(8, 'Logged Out', 'tolajide74@gmail.com', '2018-05-25 10:53:08'),
(9, 'Logged In', 'tolajide74@gmail.com', '2018-05-25 10:55:45'),
(10, 'Logged In', 'tolajide74@gmail.com', '2018-05-25 10:58:00'),
(11, 'Logged In', 'tolajide74@gmail.com', '2018-05-25 10:58:20'),
(12, 'Logged Out', 'tolajide74@gmail.com', '2018-05-25 10:59:37'),
(13, 'Logged In', 'tolajide74@gmail.com', '2018-05-25 10:59:43'),
(14, 'Logged Out', 'tolajide74@gmail.com', '2018-05-25 11:02:57'),
(15, 'Logged In', 'tolajide75@gmail.com', '2018-05-25 16:18:45'),
(16, 'Added South East 3 with 400 Bed Space to The Hospital Ward', 'tolajide74@gmail.com', '2018-05-25 14:12:50'),
(17, 'Added Adekunle with 200 Bed Space to The Hospital Ward', 'tolajide74@gmail.com', '2018-05-25 14:13:43'),
(18, 'Added South East 1 with 300 Bed Space to The Hospital Ward', 'tolajide74@gmail.com', '2018-05-25 14:30:36'),
(19, 'Added North East 1 with 200 Bed Space to The Hospital Ward', 'tolajide75@gmail.com', '2018-05-25 16:18:53'),
(20, 'Added Obafemi Awolowo with 500 Bed Space to The Hospital Ward', 'tolajide74@gmail.com', '2018-05-25 15:24:46'),
(21, 'Added South East 3 with 200 Bed Space to The Hospital Ward', 'tolajide74@gmail.com', '2018-05-25 15:39:35'),
(22, 'Added South East 3 with 200 Bed Space to The Hospital Ward', 'tolajide74@gmail.com', '2018-05-25 15:40:58'),
(23, 'Added South East 1 with 120 Bed Space For Patient to The Hospital Ward', 'tolajide74@gmail.com', '2018-05-25 15:41:43'),
(24, 'Added Obafemi Awolowo with 210 Bed Space For Patient to The Hospital Ward', 'tolajide74@gmail.com', '2018-05-25 15:42:19'),
(25, 'Updated Ward Name From Obafemi Awolowo to Obafemi Awolowo Hall', 'tolajide74@gmail.com', '2018-05-25 16:04:50'),
(26, 'Updated Ward Name From Obafemi Awolowo Hall to Obafemi Awolowo', 'tolajide74@gmail.com', '2018-05-25 16:05:04'),
(27, 'Logged Out', 'tolajide74@gmail.com', '2018-05-25 16:19:06'),
(28, 'Logged In', 'tolajide75@gmail.com', '2018-05-25 16:19:12'),
(29, 'Added Desmond Elliot Olusola with the Staff Number OSPH/18/0001 To The Staff List', 'tolajide75@gmail.com', '2018-05-26 16:00:09'),
(30, 'Added Adesina Tayo Victor with the Staff Number OSPH/18/0002 To The Staff List', 'tolajide75@gmail.com', '2018-05-26 16:03:24'),
(31, 'Added Hope Henry Juliet with the Staff Number OSPH/17/0001 To The Staff List', 'tolajide75@gmail.com', '2018-05-26 16:05:06'),
(32, 'Added Hope Henry Juliet with the Staff Number OSPH/16/0000001 To The Staff List', 'tolajide75@gmail.com', '2018-05-26 16:07:55'),
(33, 'Added Hope Henry Juliet with the Staff Number OSPH/17/0002 To The Staff List', 'tolajide75@gmail.com', '2018-05-26 16:09:24'),
(34, 'Added Hope Henry Juliet with the Staff Number OSPH/16/0002 To The Staff List', 'tolajide75@gmail.com', '2018-05-26 16:10:10'),
(35, 'Logged Out', 'tolajide75@gmail.com', '2018-05-27 11:13:22'),
(36, 'Logged In', 'tolajide74@gmail.com', '2018-05-27 11:54:52'),
(37, 'Logged Out', 'tolajide74@gmail.com', '2018-05-27 12:00:35'),
(38, 'Logged In', 'tolajide74@gmail.com', '2018-05-27 12:00:38'),
(39, 'Logged Out', 'tolajide74@gmail.com', '2018-05-27 12:01:09'),
(40, 'Logged In', 'tolajide74@gmail.com', '2018-05-27 12:01:12'),
(41, 'Logged Out', 'tolajide74@gmail.com', '2018-05-27 12:01:36'),
(42, 'Logged In', 'tolajide74@gmail.com', '2018-05-27 12:01:38'),
(43, 'Updated OSPH/18/0001 Details', 'tolajide74@gmail.com', '2018-05-27 14:05:36'),
(44, 'Updated OSPH/18/0001 Details', 'tolajide74@gmail.com', '2018-05-27 14:09:25'),
(45, 'Updated OSPH/18/0001 Details', 'tolajide74@gmail.com', '2018-05-27 14:12:32'),
(46, 'Updated OSPH/18/0001 Details', 'tolajide74@gmail.com', '2018-05-27 14:14:26'),
(47, 'Updated OSPH/18/0001 Details', 'tolajide74@gmail.com', '2018-05-27 14:42:55'),
(48, 'Update  Details And Changed The Student Passport', 'tolajide74@gmail.com', '2018-05-27 15:07:31'),
(49, 'Update  Details And Changed The Student Passport', 'tolajide74@gmail.com', '2018-05-27 15:09:34'),
(50, 'Logged Out', 'tolajide74@gmail.com', '2018-05-27 15:11:04'),
(51, 'Logged In', 'tolajide74@gmail.com', '2018-05-27 15:31:07'),
(52, 'Deleted Akorede Bayo K with the Staff Number OSPH/16/0002 From The Staff List', 'tolajide74@gmail.com', '2018-05-27 15:45:58'),
(53, 'Updated OSPH/17/0002 Details', 'tolajide74@gmail.com', '2018-05-27 15:49:10'),
(54, 'Logged Out', 'tolajide74@gmail.com', '2018-05-27 16:51:37'),
(55, 'Logged In', 'tolajide74@gmail.com', '2018-05-28 07:42:17'),
(56, 'Logged In', 'tolajide74@gmail.com', '2018-05-28 07:43:36'),
(57, 'Transferred OSPH/16/0000001 to A&E', 'tolajide74@gmail.com', '2018-05-29 07:21:25'),
(58, 'Transferred OSPH/17/0001 to Eye Clinic', 'tolajide74@gmail.com', '2018-05-29 07:21:25'),
(59, 'Transferred OSPH/17/0002 to Eye Clinic', 'tolajide74@gmail.com', '2018-05-29 07:22:24'),
(60, 'Transferred OSPH/18/0001 to Intensive Care Unit', 'tolajide74@gmail.com', '2018-05-29 07:22:24'),
(61, 'Transferred OSPH/18/0001 to Orthopedics', 'tolajide74@gmail.com', '2018-05-29 07:32:51'),
(62, 'Transferred OSPH/16/0000001 From  to Eye Clinic', 'tolajide74@gmail.com', '2018-05-29 08:08:37'),
(63, 'Transferred OSPH/17/0001 From  to Intensive Care Unit', 'tolajide74@gmail.com', '2018-05-29 08:08:37'),
(64, 'Transferred OSPH/16/0000001 From Eye Clinic to A&E', 'tolajide74@gmail.com', '2018-05-29 08:12:04'),
(65, 'Transferred OSPH/17/0001 From Intensive Care Unit to Eye Clinic', 'tolajide74@gmail.com', '2018-05-29 08:12:04'),
(66, 'Transferred OSPH/16/0000001 From Eye Clinic to A&E', 'tolajide74@gmail.com', '2018-05-29 08:12:20'),
(67, 'Transferred OSPH/17/0001 From Intensive Care Unit to Eye Clinic', 'tolajide74@gmail.com', '2018-05-29 08:12:20'),
(68, 'Transferred OSPH/17/0002 From Eye Clinic to Orthopedics', 'tolajide74@gmail.com', '2018-05-29 08:19:07'),
(69, 'Transferred OSPH/18/0001 From Intensive Care Unit to A&E', 'tolajide74@gmail.com', '2018-05-29 08:19:07'),
(70, 'Transferred OSPH/18/0001 From Orthopedics to Eye Clinic', 'tolajide74@gmail.com', '2018-05-29 08:19:07'),
(71, 'Added Obafemi Awolowo with 300 Bed Space For Patient to The Hospital Intensive Care Unit', 'tolajide74@gmail.com', '2018-05-29 08:45:17'),
(72, 'Updated Ward Name In Orthopedics From Obafemi Awolowo to Obafemi Awolowo', 'tolajide74@gmail.com', '2018-05-29 09:09:11'),
(73, 'Updated Ward Name In Intensive Care Unit From South East 1 to South East 1', 'tolajide74@gmail.com', '2018-05-29 09:09:24'),
(74, 'Updated Ward Name In A&E From South East 3 to South East 3', 'tolajide74@gmail.com', '2018-05-29 09:09:36'),
(75, 'Updated Ward Name In Orthopedics From Obafemi Awolowo to Independence', 'tolajide74@gmail.com', '2018-05-29 09:11:05'),
(76, 'Added Accounting To The Hospital Unit/Department', 'tolajide74@gmail.com', '2018-05-29 11:45:14'),
(77, 'Added Blood Bank To The Hospital Unit/Department', 'tolajide74@gmail.com', '2018-05-29 11:46:05'),
(78, 'Updated The Department Details From A to Accident And Emergency ', 'tolajide74@gmail.com', '2018-05-29 12:07:41'),
(79, 'Updated The Department Details From Accident And Emergency to Accident And Emergencies ', 'tolajide74@gmail.com', '2018-05-29 12:09:08'),
(80, 'Updated The Department Details From Intensive Care Unit to Intensive Care Unit (ICU) ', 'tolajide74@gmail.com', '2018-05-29 12:10:38'),
(81, 'Added Pharmacy To The Hospital Unit/Department', 'tolajide74@gmail.com', '2018-05-29 12:10:56'),
(82, 'Deleted Pharmacy From The Hospital Unit/Department List', 'tolajide74@gmail.com', '2018-05-29 12:14:53'),
(83, 'Added Pharmacy To The Hospital Unit/Department', 'tolajide74@gmail.com', '2018-05-29 12:15:03'),
(84, 'Updated The Department Details From Accident And Emergencies to ACCIDENT AND EMERGENCIES ', 'tolajide74@gmail.com', '2018-05-29 12:18:23'),
(85, 'Updated The Department Details From Accounting to ACCOUNTING ', 'tolajide74@gmail.com', '2018-05-29 12:18:41'),
(86, 'Updated The Department Details From Blood Bank to BLOOD BANK ', 'tolajide74@gmail.com', '2018-05-29 12:18:56'),
(87, 'Updated The Department Details From Eye Clinic to EYE CLINIC ', 'tolajide74@gmail.com', '2018-05-29 12:19:13'),
(88, 'Updated The Department Details From Intensive Care Unit (ICU) to INTENSIVE CARE UNIT (ICU) ', 'tolajide74@gmail.com', '2018-05-29 12:19:39'),
(89, 'Updated The Department Details From Orthopedics to ORTHOPEDICS ', 'tolajide74@gmail.com', '2018-05-29 12:20:19'),
(90, 'Updated The Department Details From Pharmacy to PHARMACY ', 'tolajide74@gmail.com', '2018-05-29 12:20:32'),
(91, 'Added RADIOLOGY To The Hospital Unit/Department', 'tolajide74@gmail.com', '2018-05-29 12:21:39'),
(92, 'Added LABORATORY To The Hospital Unit/Department', 'tolajide74@gmail.com', '2018-05-29 12:36:12'),
(93, 'Have Added BLOOD TEST Test To This Department LABORATORY', 'tolajide74@gmail.com', '2018-05-29 13:10:39'),
(94, 'Have Added BLOOD TEST Test To LABORATORY Department', 'tolajide74@gmail.com', '2018-05-29 13:13:33'),
(95, 'Have Added BLOOD TEST Test To ACCIDENT AND EMERGENCIES Department', 'tolajide74@gmail.com', '2018-05-29 13:14:30'),
(96, 'Have Added BLOOD TEST Test To ACCIDENT AND EMERGENCIES Department', 'tolajide74@gmail.com', '2018-05-29 13:14:39'),
(97, 'Have Added BLOOD TEST Test To ACCIDENT AND EMERGENCIES Department', 'tolajide74@gmail.com', '2018-05-29 13:14:49'),
(98, 'Have Added BLOOD TEST Test To ACCIDENT AND EMERGENCIES Department', 'tolajide74@gmail.com', '2018-05-29 13:17:56'),
(99, 'Have Added BLOOD TEST Test To LABORATORY Department', 'tolajide74@gmail.com', '2018-05-29 13:19:14'),
(100, 'Have Added BLOOD TEST Test To LABORATORY Department', 'tolajide74@gmail.com', '2018-05-29 13:20:14'),
(101, 'Have Added UTRASOUND Test To LABORATORY Department', 'tolajide74@gmail.com', '2018-05-29 13:20:48'),
(102, 'Have Added CT SCAN Test To LABORATORY Department', 'tolajide74@gmail.com', '2018-05-29 13:21:08'),
(103, 'Updated Test Details From BLOOD TEST to BLOOD TESTING and From LABORATORY to BLOOD BANK And Changed The Test Amount From 2000 to 20000', 'tolajide74@gmail.com', '2018-05-29 13:55:31'),
(104, 'Updated Test Details From BLOOD TESTING to BLOOD TEST and From BLOOD BANK to LABORATORY And Changed The Test Amount From 20000 to 2000', 'tolajide74@gmail.com', '2018-05-29 13:56:12'),
(105, 'Added PREGNANCY Test To LABORATORY Department', 'tolajide74@gmail.com', '2018-05-29 13:57:30'),
(106, 'Added HIV TEST Test To BLOOD BANK Department', 'tolajide74@gmail.com', '2018-05-29 13:57:53'),
(107, 'Added EYE TEST Test To EYE CLINIC Department', 'tolajide74@gmail.com', '2018-05-29 13:58:08'),
(108, 'Added EBOL Test To LABORATORY Department', 'tolajide74@gmail.com', '2018-05-29 13:58:58'),
(109, 'Updated Test Details From EBOL to EBOLA and From LABORATORY Department to LABORATORY Department And Changed The Test Amount From # 0 to 0', 'tolajide74@gmail.com', '2018-05-29 14:02:02'),
(110, 'Deleted EBOLA Details in LABORATORY From The Test List', 'tolajide74@gmail.com', '2018-05-29 14:09:51'),
(111, 'Added EBOLA Test To LABORATORY Department', 'tolajide74@gmail.com', '2018-05-29 14:10:52'),
(112, 'Deleted UTRASOUND Test Details in LABORATORY Department From The Test List', 'tolajide74@gmail.com', '2018-05-29 14:11:04'),
(113, 'Added UTRASOUND Test To LABORATORY Department', 'tolajide74@gmail.com', '2018-05-29 14:11:34'),
(114, 'Added Tramadol with the Drug number TRAMA/18/0001 to the Drug list', 'tolajide74@gmail.com', '2018-05-29 15:32:35'),
(115, 'Added Tramadol with Drug Number TRAMA/18/0001 to the stock list', 'tolajide74@gmail.com', '2018-05-29 15:32:35'),
(116, 'Added Tramadol with the Drug number TRAMA/18/0001 to the Drug list', 'tolajide74@gmail.com', '2018-05-29 15:33:20'),
(117, 'Updated Tramadol stock with 200 quantity', 'tolajide74@gmail.com', '2018-05-29 15:33:20'),
(118, 'Added Paracetamol with the Drug number PARAC/18/0001 to the Drug list', 'tolajide74@gmail.com', '2018-05-29 15:34:19'),
(119, 'Added Paracetamol with Drug Number PARAC/18/0001 to the stock list', 'tolajide74@gmail.com', '2018-05-29 15:34:19'),
(120, 'Added Paracetamol with the Drug number PARAC/18/0001 to the Drug list', 'tolajide74@gmail.com', '2018-05-29 15:36:21'),
(121, 'Updated Paracetamol stock with 700 quantity', 'tolajide74@gmail.com', '2018-05-29 15:36:21'),
(122, 'Added Paracetamol with the Drug number PARAC/18/0001 to the Drug list', 'tolajide74@gmail.com', '2018-05-29 15:40:38'),
(123, 'Added Paracetamol with Drug Number PARAC/18/0001 to the stock list', 'tolajide74@gmail.com', '2018-05-29 15:40:39'),
(124, 'Added Tramadol with the Drug number TRAMA/18/0002 to the Drug list', 'tolajide74@gmail.com', '2018-05-29 15:41:08'),
(125, 'Added Tramadol with Drug Number TRAMA/18/0002 to the stock list', 'tolajide74@gmail.com', '2018-05-29 15:41:09'),
(126, 'Added Diclophenac with the Drug number DICLO/18/0003 to the Drug list', 'tolajide74@gmail.com', '2018-05-29 16:01:35'),
(127, 'Added Diclophenac with Drug Number DICLO/18/0003 to the stock list', 'tolajide74@gmail.com', '2018-05-29 16:01:35'),
(128, 'Added Paracetamol with the Drug number PARAC/18/0004 to the Drug list', 'tolajide74@gmail.com', '2018-05-29 16:37:07'),
(129, 'Added Paracetamol with Drug Number PARAC/18/0004 to the stock list', 'tolajide74@gmail.com', '2018-05-29 16:37:07'),
(130, 'Added PARACETAMOL with the Drug number PARAC/18/0005 to the Drug list', 'tolajide74@gmail.com', '2018-05-29 16:47:03'),
(131, 'Added PARACETAMOL with Drug Number PARAC/18/0005 to the stock list', 'tolajide74@gmail.com', '2018-05-29 16:47:03'),
(132, 'Added PARACETAMOL with the Drug number PARAC/18/0006 to the Drug list', 'tolajide74@gmail.com', '2018-05-29 16:47:38'),
(133, 'Updated PARACETAMOL stock with 400 quantity', 'tolajide74@gmail.com', '2018-05-29 16:47:38'),
(134, 'Added PARACETAMOL with the Drug number PARAC/18/0007 to the Drug list', 'tolajide74@gmail.com', '2018-05-29 16:49:05'),
(135, 'Updated PARACETAMOL stock with 400 quantity', 'tolajide74@gmail.com', '2018-05-29 16:49:05'),
(136, 'Added DICLOPHENAC with the Drug number DICLO/18/0008 to the Drug list', 'tolajide74@gmail.com', '2018-05-29 17:00:56'),
(137, 'Added DICLOPHENAC with Drug Number DICLO/18/0008 to the stock list', 'tolajide74@gmail.com', '2018-05-29 17:00:56'),
(138, 'Added Dripping To The Drug Category List', 'tolajide74@gmail.com', '2018-05-29 17:49:25'),
(139, 'Updated Drug Category Name From Dripping To DRIPPINGJEGJK', 'tolajide74@gmail.com', '2018-05-29 18:08:08'),
(140, 'Deleted DRIPPINGJEGJK Drug Category Name From The Drug Category List', 'tolajide74@gmail.com', '2018-05-29 18:11:32'),
(141, 'Logged Out', 'tolajide74@gmail.com', '2018-05-29 18:58:47'),
(142, 'Logged In', 'tolajide74@gmail.com', '2018-05-30 16:43:51'),
(143, 'Updated PARACETAMOL with the Drug number PARAC/18/0007 in the Drug list', 'tolajide74@gmail.com', '2018-05-30 17:17:16'),
(144, 'Updated Drug Number PARAC/18/0007 With The Drug Name From PARACETAMOL to PARACETAMOL', 'tolajide74@gmail.com', '2018-05-30 17:17:16'),
(145, 'Updated PARACETAMOL with the Drug number PARAC/18/0007 in the Drug list', 'tolajide74@gmail.com', '2018-05-30 17:18:21'),
(146, 'Updated Drug Number PARAC/18/0007 With The Drug Name From PARACETAMOL to PARACETAMOL', 'tolajide74@gmail.com', '2018-05-30 17:18:21'),
(147, 'Updated PARACETAMOL with the Drug number PARAC/18/0007 in the Drug list', 'tolajide74@gmail.com', '2018-05-30 17:21:19'),
(148, 'Updated Drug Number PARAC/18/0007 With The Drug Name From PARACETAMOL to PARACETAMOL', 'tolajide74@gmail.com', '2018-05-30 17:21:19'),
(149, 'Updated PARACETAMOL with the Drug number PARAC/18/0007 in the Drug list', 'tolajide74@gmail.com', '2018-05-30 17:21:46'),
(150, 'Updated Drug Number PARAC/18/0007 With The Drug Name From PARACETAMOL to PARACETAMOL', 'tolajide74@gmail.com', '2018-05-30 17:21:46'),
(151, 'Updated PARACETAMOL with the Drug number PARAC/18/0007 in the Drug list', 'tolajide74@gmail.com', '2018-05-30 17:22:20'),
(152, 'Updated Drug Number PARAC/18/0007 With The Drug Name From PARACETAMOL to PARACETAMOL', 'tolajide74@gmail.com', '2018-05-30 17:22:20'),
(153, 'Added TRAMADOL with the Drug number TRAMA/18/0009 to the Drug list', 'tolajide74@gmail.com', '2018-05-30 17:24:18'),
(154, 'Added TRAMADOL with Drug Number TRAMA/18/0009 to the stock list', 'tolajide74@gmail.com', '2018-05-30 17:24:18'),
(155, 'Added POTINUR 2 with the Drug number POTIN/18/00010 to the Drug list', 'tolajide74@gmail.com', '2018-05-30 17:25:28'),
(156, 'Added POTINUR 2 with Drug Number POTIN/18/00010 to the stock list', 'tolajide74@gmail.com', '2018-05-30 17:25:28'),
(157, 'Added PARACETAMOL with the Drug number PARAC/18/0011 to the Drug list', 'tolajide74@gmail.com', '2018-05-30 17:28:19'),
(158, 'Added PARACETAMOL with Drug Number PARAC/18/0011 to the stock list', 'tolajide74@gmail.com', '2018-05-30 17:28:19'),
(159, 'Updated TRAMADOL with the Drug number TRAMA/18/0009 in the Drug list', 'tolajide74@gmail.com', '2018-05-30 17:55:08'),
(160, 'Updated Drug Number TRAMA/18/0009 With The Drug Name From TRAMADOL to TRAMADOL', 'tolajide74@gmail.com', '2018-05-30 17:55:08'),
(161, 'Updated POTINUR 2 with the Drug number POTIN/18/00010 in the Drug list', 'tolajide74@gmail.com', '2018-05-30 17:55:50'),
(162, 'Updated Drug Number POTIN/18/00010 With The Drug Name From POTINUR 2 to POTINUR 2', 'tolajide74@gmail.com', '2018-05-30 17:55:50'),
(163, 'Updated PARACETAMOL with the Drug number PARAC/18/0011 in the Drug list', 'tolajide74@gmail.com', '2018-05-30 17:56:10'),
(164, 'Updated Drug Number PARAC/18/0011 With The Drug Name From PARACETAMOL to PARACETAMOL', 'tolajide74@gmail.com', '2018-05-30 17:56:10'),
(165, 'Updated DICLOPHENAC with the Drug number DICLO/18/0008 in the Drug list', 'tolajide74@gmail.com', '2018-05-30 17:56:28'),
(166, 'Updated Drug Number DICLO/18/0008 With The Drug Name From DICLOPHENAC to DICLOPHENAC', 'tolajide74@gmail.com', '2018-05-30 17:56:28'),
(167, 'Updated PARACETAMOL with the Drug number PARAC/18/0007 in the Drug list', 'tolajide74@gmail.com', '2018-05-30 17:56:48'),
(168, 'Updated Drug Number PARAC/18/0007 With The Drug Name From PARACETAMOL to PARACETAMOL', 'tolajide74@gmail.com', '2018-05-30 17:56:48'),
(169, 'Logged Out', 'tolajide74@gmail.com', '2018-05-30 18:16:58'),
(170, 'Logged In', 'tolajide74@gmail.com', '2018-06-01 17:12:01'),
(171, 'Open Card 18/OSPH/FAM/001 With The Card Category Family Card For Mr Badejo', 'tolajide74@gmail.com', '2018-06-01 18:00:52'),
(172, 'Open Card 18/OSPH/IND/002 With The Card Category Individual Card For Mrs Nancy Woods', 'tolajide74@gmail.com', '2018-06-01 18:01:46'),
(173, 'Open Card 18/OSPH/IND/003 With The Card Category Individual Card For Mrs Adegoke', 'tolajide74@gmail.com', '2018-06-01 18:09:30'),
(174, 'Added PENTAX with the Drug number PENTA/18/0012 to the Drug list', 'tolajide74@gmail.com', '2018-06-02 14:20:36'),
(175, 'Added PENTAX with Drug Number PENTA/18/0012 to the stock list', 'tolajide74@gmail.com', '2018-06-02 14:20:36'),
(176, 'Updated Card 18/OSPH/IND/003 With The Card Category From Individual Card to Individual Card For Mrs Adegoke Hopeyemi', 'tolajide74@gmail.com', '2018-06-02 15:22:13'),
(177, 'Deleted Hospital Card 18/OSPH/FAM/001 For Mr Badejo', 'tolajide74@gmail.com', '2018-06-02 15:43:06'),
(178, 'Logged Out', 'tolajide74@gmail.com', '2018-06-02 15:59:59'),
(179, 'Logged In', 'tolajide74@gmail.com', '2018-06-03 11:11:47'),
(180, 'Added an Appointment For $Mrs Nancy Woods On Date 2018-06-07 with Adenike Kemisola', 'tolajide74@gmail.com', '2018-06-03 11:56:50'),
(181, 'Added an Appointment For Mrs Nancy Woods On Date 2018-06-15 with Adenike Kemisola', 'tolajide74@gmail.com', '2018-06-03 11:57:35'),
(182, 'Added an Appointment For Mrs Nancy Woods On Date 2018-06-12 with Hope Henry Juliet', 'tolajide74@gmail.com', '2018-06-03 11:58:06'),
(183, 'Added an Appointment For Mrs Adegoke Hopeyemi On Date 2018-06-21 with Adenike Kemisola', 'tolajide74@gmail.com', '2018-06-03 12:09:29'),
(184, 'Added an Appointment For Mrs Adegoke Hopeyemi On Date 2018-06-30 with Adenike Kemisola', 'tolajide74@gmail.com', '2018-06-03 12:18:56'),
(185, 'Logged Out', 'tolajide74@gmail.com', '2018-06-03 12:19:22'),
(186, 'Logged In', 'tolajide74@gmail.com', '2018-06-03 18:07:29'),
(187, 'Updated The Patient Appointment and Changed The Card Num From 18/OSPH/IND/003 To 18/OSPH/IND/003', 'tolajide74@gmail.com', '2018-06-04 10:17:54'),
(188, 'Updated The Patient Appointment and Changed The Card Num From 18/OSPH/IND/003 To 18/OSPH/IND/002', 'tolajide74@gmail.com', '2018-06-04 10:20:47'),
(189, 'Deleted The Scheduled Appointment For Mrs Nancy Woods On 2018-06-12 with Dr. Hope Henry Juliet', 'tolajide74@gmail.com', '2018-06-04 10:41:19'),
(190, 'Deleted The Scheduled Appointment For Mrs Nancy Woods On 2018-06-15 with Dr. Adenike Kemisola', 'tolajide74@gmail.com', '2018-06-04 10:41:29'),
(191, 'Added an Appointment For Mrs Adegoke Hopeyemi On Date 2018-06-30 with Adenike Kemisola', 'tolajide74@gmail.com', '2018-06-04 10:41:54'),
(192, 'Logged Out', 'tolajide74@gmail.com', '2018-06-04 10:50:07'),
(193, 'Logged In', 'juliet@gmail.com', '2018-06-04 17:29:43'),
(194, 'Logged Out', 'juliet@gmail.com', '2018-06-04 17:30:00'),
(195, 'Logged In', 'desmond@gmail.com', '2018-06-04 17:30:15'),
(196, 'Logged In', 'juliet@gmail.com', '2018-06-04 17:31:16'),
(197, 'Added an Appointment For Mrs Nancy Woods On Date 2018-06-17 with Hope Henry Juliet', 'juliet@gmail.com', '2018-06-04 17:59:39'),
(198, 'Added an Appointment For Mrs Adegoke Hopeyemi On Date 2018-06-23 with Hope Henry Juliet', 'juliet@gmail.com', '2018-06-04 18:01:34'),
(199, 'Updated The Patient Appointment and Changed The Card Num From 18/OSPH/IND/003 To 18/OSPH/IND/002 And The Appointment Date is \r\n					2018-06-21 with Dr. Adenike Kemisola', 'juliet@gmail.com', '2018-06-04 18:07:16'),
(200, 'Updated The Patient Appointment and Changed The Card Num From 18/OSPH/IND/002 To 18/OSPH/IND/002 And The Appointment Date is \r\n					2018-06-07 with Dr. Adenike Kemisola', 'juliet@gmail.com', '2018-06-04 18:09:00'),
(201, 'Updated The Patient Appointment and Changed The Card Num From 18/OSPH/IND/002 To 18/OSPH/IND/002 And The Appointment Date is \r\n					2018-06-07 with Dr. Adenike Kemisola', 'juliet@gmail.com', '2018-06-04 18:09:25'),
(202, 'Added an Appointment For Mrs Nancy Woods On Date 2018-06-11 with Hope Henry Juliet', 'juliet@gmail.com', '2018-06-04 18:09:58'),
(203, 'Updated The Patient Appointment and Changed The Card Num From 18/OSPH/IND/002 To 18/OSPH/IND/002 And The Appointment Date is \r\n					2020-06-11 with Dr. Hope Henry Juliet', 'juliet@gmail.com', '2018-06-04 18:10:13'),
(204, 'Updated The Patient Appointment and Changed The Card Num From 18/OSPH/IND/002 To 18/OSPH/IND/002 And The Appointment Date is \r\n					2018-06-11 with Dr. Hope Henry Juliet', 'juliet@gmail.com', '2018-06-04 18:10:31'),
(205, 'Logged Out', 'juliet@gmail.com', '2018-06-04 22:21:46'),
(206, 'Logged In', 'tolajide74@gmail.com', '2018-06-04 22:21:49'),
(207, 'Logged Out', 'tolajide74@gmail.com', '2018-06-04 22:26:28'),
(208, 'Logged In', 'juliet@gmail.com', '2018-06-04 22:26:40'),
(209, 'Added Details To Mrs Nancy Woods Case Note and Recommended HIV TEST', 'juliet@gmail.com', '2018-06-04 23:19:33'),
(210, 'Added Details To Mrs Nancy Woods Case Note and Recommended No Test ', 'juliet@gmail.com', '2018-06-04 23:20:15'),
(211, 'Added Details To Mrs Adegoke Hopeyemi Case Note and Recommended No Test ', 'juliet@gmail.com', '2018-06-04 23:33:41'),
(212, 'Added Details To Mrs Nancy Woods Case Note and Recommended HIV TEST', 'juliet@gmail.com', '2018-06-04 23:36:36'),
(213, 'Added Details To Mrs Adegoke Hopeyemi Case Note and Recommended No Test ', 'juliet@gmail.com', '2018-06-04 23:43:19'),
(214, 'Logged Out', 'juliet@gmail.com', '2018-06-04 23:47:37'),
(215, 'Logged In', 'juliet@gmail.com', '2018-06-05 07:02:59'),
(216, 'Added Details To Mrs Adegoke Hopeyemi Case Note and Recommended PREGNANCY', 'juliet@gmail.com', '2018-06-05 07:23:33'),
(217, 'Upadated Case Note Details and Changed The Patient Name From Mrs Adegoke Hopeyemi to Mrs Adegoke Hopeyemi And Recommended PREGNANCY', 'juliet@gmail.com', '2018-06-06 08:59:08'),
(218, 'Upadated Case Note Details and Changed The Patient Name From Mrs Adegoke Hopeyemi to Mrs Adegoke Hopeyemi And Recommended UTRASOUND', 'juliet@gmail.com', '2018-06-06 08:59:34'),
(219, 'Deleted Case Note Details For  With Card Number ', 'juliet@gmail.com', '2018-06-06 09:10:16'),
(220, 'Deleted Case Note Details For Mrs Adegoke Hopeyemi With Card Number 18/OSPH/IND/003', 'juliet@gmail.com', '2018-06-06 09:10:51'),
(221, 'Added Details To Mrs Nancy Woods Case Note and Recommended EBOLA', 'juliet@gmail.com', '2018-06-06 09:11:05'),
(222, 'Logged In', 'tolajide74@gmail.com', '2018-06-06 17:50:06'),
(223, 'Logged In', 'tolajide74@gmail.com', '2018-06-06 17:50:49'),
(224, 'Logged Out', 'tolajide74@gmail.com', '2018-06-06 17:51:23'),
(225, 'Logged In', 'tolajide74@gmail.com', '2018-06-06 17:51:25'),
(226, 'Logged In', 'tolajide74@gmail.com', '2018-06-06 17:51:55'),
(227, 'Logged In', 'tolajide74@gmail.com', '2018-06-06 17:52:35'),
(228, 'Logged Out', 'tolajide74@gmail.com', '2018-06-06 17:52:49'),
(229, 'Logged In', 'tolajide74@gmail.com', '2018-06-06 17:53:11'),
(230, 'Logged Out', 'tolajide74@gmail.com', '2018-06-06 19:13:17'),
(231, 'Logged In', 'juliet@gmail.com', '2018-06-06 19:13:27'),
(232, 'Logged Out', 'juliet@gmail.com', '2018-06-06 19:19:47'),
(233, 'Logged In', 'tolajide74@gmail.com', '2018-06-06 19:19:49'),
(234, 'Logged Out', 'tolajide74@gmail.com', '2018-06-06 19:25:58'),
(235, 'Logged In', 'juliet@gmail.com', '2018-06-06 19:26:07'),
(236, 'Updated OSPH/17/0001 Details', 'juliet@gmail.com', '2018-06-07 08:42:56'),
(237, 'Logged Out', 'juliet@gmail.com', '2018-06-08 08:31:45'),
(238, 'Logged In', 'tolajide74@gmail.com', '2018-06-08 08:31:48'),
(239, 'Added X RAY LEG Test To LABORATORY Department', 'tolajide74@gmail.com', '2018-06-08 08:32:40'),
(240, 'Added X RAY FEMUR Test To LABORATORY Department', 'tolajide74@gmail.com', '2018-06-08 08:33:10'),
(241, 'Added X RAY ULNER Test To LABORATORY Department', 'tolajide74@gmail.com', '2018-06-08 08:33:41'),
(242, 'Added X RAY TIBIAR Test To ORTHOPEDICS Department', 'tolajide74@gmail.com', '2018-06-08 08:34:04'),
(243, 'Logged Out', 'tolajide74@gmail.com', '2018-06-08 08:34:14'),
(244, 'Logged In', 'juliet@gmail.com', '2018-06-08 08:34:24'),
(245, ' Recommended 1 For 18/OSPH/IND/003', 'juliet@gmail.com', '2018-06-08 12:35:46'),
(246, ' Recommended 11,10 For 18/OSPH/IND/003', 'juliet@gmail.com', '2018-06-08 12:36:12'),
(247, ' Recommended 6 For 18/OSPH/IND/002', 'juliet@gmail.com', '2018-06-08 12:42:52'),
(248, 'Upadated Recommended Test Details and Changed The Patient Name From Mrs Adegoke Hopeyemi to Mrs Adegoke Hopeyemi And Recommended X RAY FEMUR', 'juliet@gmail.com', '2018-06-08 13:22:40'),
(249, 'Upadated Recommended Test Details and Changed The Patient Name From Mrs Adegoke Hopeyemi to Mrs Adegoke Hopeyemi And Recommended CT SCAN', 'juliet@gmail.com', '2018-06-08 13:23:23'),
(250, 'Deleted Recommended 1 For Mrs Adegoke Hopeyemi With The Card Number 18/OSPH/IND/003', 'juliet@gmail.com', '2018-06-08 13:32:46'),
(251, 'Deleted Recommended 6 For Mrs Nancy Woods With The Card Number 18/OSPH/IND/002', 'juliet@gmail.com', '2018-06-08 13:33:02'),
(252, ' Recommended 9 For 18/OSPH/IND/003', 'juliet@gmail.com', '2018-06-08 13:33:35'),
(253, 'Logged Out', 'juliet@gmail.com', '2018-06-08 13:33:51'),
(254, 'Logged In', 'taiwo@gmail.com', '2018-06-08 15:28:46'),
(255, 'Added DICLOPHENAC with the Drug number DICLO/18/0013 to the Drug list', 'taiwo@gmail.com', '2018-06-08 15:34:17'),
(256, 'Added DICLOPHENAC with Drug Number DICLO/18/0013 to the stock list', 'taiwo@gmail.com', '2018-06-08 15:34:17'),
(257, 'Updated Drug Category Name From Drip To DRIPS', 'taiwo@gmail.com', '2018-06-08 15:42:09'),
(258, 'Updated Drug Category Name From DRIPS To DRIP', 'taiwo@gmail.com', '2018-06-08 15:42:21'),
(259, 'Updated Drug Category Name From Injection To INJECTION', 'taiwo@gmail.com', '2018-06-08 15:42:32'),
(260, 'Updated Drug Category Name From Syrup To SYRUP', 'taiwo@gmail.com', '2018-06-08 15:42:40'),
(261, 'Updated Drug Category Name From Tablets To TABLETS', 'taiwo@gmail.com', '2018-06-08 15:42:48'),
(262, 'Updated OSPH/18/0002 Details', 'taiwo@gmail.com', '2018-06-08 15:58:18'),
(263, 'Added an Appointment For Mrs Nancy Woods On Date 2018-06-12 with Adesina Tayo Victor', 'taiwo@gmail.com', '2018-06-08 16:06:04'),
(264, 'Added an Appointment For Mrs Nancy Woods On Date 2018-06-24 with Adesina Tayo Victor', 'taiwo@gmail.com', '2018-06-08 16:06:44'),
(265, 'Updated OSPH/18/0002 Details', 'taiwo@gmail.com', '2018-06-08 16:19:54'),
(266, 'Updated OSPH/18/0002 Details', 'taiwo@gmail.com', '2018-06-08 16:21:17'),
(267, 'Updated OSPH/18/0002 Details', 'taiwo@gmail.com', '2018-06-08 16:21:34'),
(268, 'Logged Out', 'taiwo@gmail.com', '2018-06-08 16:24:35'),
(269, 'Logged In', 'tolajide74@gmail.com', '2018-06-08 16:29:17'),
(270, 'Logged Out', 'tolajide74@gmail.com', '2018-06-08 16:29:22'),
(271, 'Logged In', 'tolajide74@gmail.com', '2018-06-09 17:44:36'),
(272, 'Logged Out', 'tolajide74@gmail.com', '2018-06-09 17:45:29'),
(273, 'Logged In', 'taiwo@gmail.com', '2018-06-09 17:45:43'),
(274, 'Added BALM (MASSAGING) To The Drug Category List', 'taiwo@gmail.com', '2018-06-09 17:49:07'),
(275, 'Added NEUROGESIC with the Drug number NEURO/18/0014 to the Drug list', 'taiwo@gmail.com', '2018-06-09 17:50:26'),
(276, 'Added NEUROGESIC with Drug Number NEURO/18/0014 to the stock list', 'taiwo@gmail.com', '2018-06-09 17:50:26'),
(277, 'Added NEUROGESIC with the Drug number NEURO/18/0015 to the Drug list', 'taiwo@gmail.com', '2018-06-09 17:52:18'),
(278, 'Updated NEUROGESIC stock with 12 quantity', 'taiwo@gmail.com', '2018-06-09 17:52:18'),
(279, 'Added NEUROGESIC with the Drug number NEURO/18/0016 to the Drug list', 'taiwo@gmail.com', '2018-06-09 17:52:53'),
(280, 'Added NEUROGESIC with Drug Number NEURO/18/0016 to the stock list', 'taiwo@gmail.com', '2018-06-09 17:52:53'),
(281, 'Added P-ALAXIN with the Drug number P-ALA/18/0017 to the Drug list', 'taiwo@gmail.com', '2018-06-09 17:58:26'),
(282, 'Added P-ALAXIN with Drug Number P-ALA/18/0017 to the stock list', 'taiwo@gmail.com', '2018-06-09 17:58:26'),
(283, 'Added P-ALAXIN with the Drug number P-ALA/18/0018 to the Drug list', 'taiwo@gmail.com', '2018-06-09 17:58:26'),
(284, 'Updated P-ALAXIN stock with 24 quantity', 'taiwo@gmail.com', '2018-06-09 17:58:26'),
(285, 'Added an Appointment For Mrs Adegoke Hopeyemi On Date 2018-06-10 with Adesina Tayo Victory', 'taiwo@gmail.com', '2018-06-09 18:03:16'),
(286, 'Logged Out', 'taiwo@gmail.com', '2018-06-09 18:09:35'),
(287, 'Logged In', 'juliet@gmail.com', '2018-06-09 18:09:46'),
(288, 'Deleted The Scheduled Appointment For Mrs Nancy Woods On 2018-06-11 with Dr. Hope Henry Juliet Lola', 'juliet@gmail.com', '2018-06-09 18:12:36'),
(289, 'Added an Appointment For Mrs Adegoke Hopeyemi On Date 2018-06-18 with Hope Henry Juliet Lola', 'juliet@gmail.com', '2018-06-09 18:12:57'),
(290, 'Updated The Patient Appointment and Changed The Card Num From 18/OSPH/IND/003 To 18/OSPH/IND/003 And The Appointment Date is \r\n					2018-06-10 with Dr. Adesina Tayo Victory', 'juliet@gmail.com', '2018-06-09 18:14:31'),
(291, 'Added an Appointment For Mrs Adegoke Hopeyemi On Date 2018-06-11 with Hope Henry Juliet Lola', 'juliet@gmail.com', '2018-06-09 18:14:47'),
(292, 'Updated The Patient Appointment and Changed The Card Num From 18/OSPH/IND/003 To 18/OSPH/IND/003 And The Appointment Date is \r\n					2010-06-10 with Dr. Adesina Tayo Victory', 'juliet@gmail.com', '2018-06-09 18:15:53'),
(293, 'Added an Appointment For Mrs Adegoke Hopeyemi On Date 2018-06-12 with Hope Henry Juliet Lola', 'juliet@gmail.com', '2018-06-09 18:24:13'),
(294, 'Updated The Patient Appointment and Changed The Card Num From 18/OSPH/IND/003 To 18/OSPH/IND/003 And The Appointment Date is \r\n					2018-06-12 with Dr. Hope Henry Juliet Lola', 'juliet@gmail.com', '2018-06-09 18:24:23'),
(295, 'Updated The Patient Appointment and Changed The Card Num From 18/OSPH/IND/003 To 18/OSPH/IND/003 And The Appointment Date is \r\n					2020-06-12 with Dr. Hope Henry Juliet Lola', 'juliet@gmail.com', '2018-06-09 18:24:43'),
(296, 'Updated The Patient Appointment and Changed The Card Num From 18/OSPH/IND/003 To 18/OSPH/IND/003 And The Appointment Date is \r\n					2020-06-12 with Dr. Hope Henry Juliet Lola', 'juliet@gmail.com', '2018-06-09 18:25:44'),
(297, 'Logged Out', 'juliet@gmail.com', '2018-06-09 18:35:01'),
(298, 'Logged In', 'taiwo@gmail.com', '2018-06-11 07:52:34'),
(299, 'Added FLAGGY with the Drug number FLAGG/18/0019 to the Drug list', 'taiwo@gmail.com', '2018-06-11 07:56:15'),
(300, 'Added FLAGGY with Drug Number FLAGG/18/0019 to the stock list', 'taiwo@gmail.com', '2018-06-11 07:56:15'),
(301, 'Updated TRAMADOL with the Drug number TRAMA/18/0009 in the Drug list', 'taiwo@gmail.com', '2018-06-11 08:04:15'),
(302, 'Updated Drug Number TRAMA/18/0009 With The Drug Name From TRAMADOL to TRAMADOL', 'taiwo@gmail.com', '2018-06-11 08:04:15'),
(303, 'Added ZOGA !00 with the Drug number ZOGA /18/0020 to the Drug list', 'taiwo@gmail.com', '2018-06-11 08:38:07'),
(304, 'Added ZOGA !00 with Drug Number ZOGA /18/0020 to the stock list', 'taiwo@gmail.com', '2018-06-11 08:38:07'),
(305, 'Added AMPHICLOX with the Drug number AMPHI/18/0021 to the Drug list', 'taiwo@gmail.com', '2018-06-11 09:05:24'),
(306, 'Added AMPHICLOX with the Drug number AMPHI/18/0022 to the Drug list', 'taiwo@gmail.com', '2018-06-11 09:07:45'),
(307, 'Added AMPHICLOX with the Drug number AMPHI/18/0023 to the Drug list', 'taiwo@gmail.com', '2018-06-11 09:08:10'),
(308, 'Added AMPHICLOX with the Drug number AMPHI/18/0024 to the Drug list', 'taiwo@gmail.com', '2018-06-11 09:08:20'),
(309, 'Added AMPHICLOX with the Drug number AMPHI/18/0025 to the Drug list', 'taiwo@gmail.com', '2018-06-11 09:09:39'),
(310, 'Added AMPHICLOX with Drug Number AMPHI/18/0025 to the stock list', 'taiwo@gmail.com', '2018-06-11 09:09:39'),
(311, 'Added AMPHICLOX with the Drug number AMPHI/18/0026 to the Drug list', 'taiwo@gmail.com', '2018-06-11 09:09:48'),
(312, 'Updated AMPHICLOX stock with 10 quantity', 'taiwo@gmail.com', '2018-06-11 09:09:48'),
(313, 'Added AMPHICLOX with the Drug number AMPHI/18/0027 to the Drug list', 'taiwo@gmail.com', '2018-06-11 09:10:33'),
(314, 'Updated AMPHICLOX stock with 10 quantity', 'taiwo@gmail.com', '2018-06-11 09:10:33'),
(315, 'Added AMPHICLOX with the Drug number AMPHI/18/0028 to the Drug list', 'taiwo@gmail.com', '2018-06-11 09:12:03'),
(316, 'Updated AMPHICLOX stock with 10 quantity', 'taiwo@gmail.com', '2018-06-11 09:12:03'),
(317, 'Added AMPHICLOX with the Drug number AMPHI/18/0029 to the Drug list', 'taiwo@gmail.com', '2018-06-11 09:12:09'),
(318, 'Updated AMPHICLOX stock with 10 quantity', 'taiwo@gmail.com', '2018-06-11 09:12:09'),
(319, 'Added AMPHICLOX with the Drug number AMPHI/18/0030 to the Drug list', 'taiwo@gmail.com', '2018-06-11 09:12:45'),
(320, 'Updated AMPHICLOX stock with 10 quantity', 'taiwo@gmail.com', '2018-06-11 09:12:46'),
(321, 'Added CEPTRIN with the Drug number CEPTR/18/0031 to the Drug list', 'taiwo@gmail.com', '2018-06-11 09:16:14'),
(322, 'Added CEPTRIN with Drug Number CEPTR/18/0031 to the stock list', 'taiwo@gmail.com', '2018-06-11 09:16:14'),
(323, 'Logged Out', 'taiwo@gmail.com', '2018-06-11 09:32:26'),
(324, 'Logged In', 'taiwo@gmail.com', '2018-06-11 09:32:51'),
(325, 'Added GENTAMICIN with the Drug number GENTA/18/0032 to the Drug list', 'taiwo@gmail.com', '2018-06-11 09:36:31'),
(326, 'Added GENTAMICIN with Drug Number GENTA/18/0032 to the stock list', 'taiwo@gmail.com', '2018-06-11 09:36:31'),
(327, 'Logged In', 'taiwo@gmail.com', '2018-06-11 18:18:49'),
(328, 'Updated ZOGA !00 with the Drug number ZOGA /18/0020 in the Drug list', 'taiwo@gmail.com', '2018-06-11 18:26:04'),
(329, 'Updated Drug Number ZOGA /18/0020 With The Drug Name From ZOGA !00 to ZOGA !00', 'taiwo@gmail.com', '2018-06-11 18:26:04'),
(330, 'Updated ZOGA !00 with the Drug number ZOGA /18/0020 in the Drug list', 'taiwo@gmail.com', '2018-06-11 18:27:50'),
(331, 'Updated Drug Number ZOGA /18/0020 With The Drug Name From ZOGA !00 to ZOGA !00', 'taiwo@gmail.com', '2018-06-11 18:27:50'),
(332, 'Added PARACETAMOL with the Drug number PARAC/18/001 to the Drug list', 'taiwo@gmail.com', '2018-06-11 18:33:49'),
(333, 'Added PARACETAMOL with Drug Number PARAC/18/001 to the stock list', 'taiwo@gmail.com', '2018-06-11 18:33:49'),
(334, 'Updated PARACETAMOL with the Drug number PARAC/18/001 in the Drug list', 'taiwo@gmail.com', '2018-06-11 18:34:30'),
(335, 'Updated Drug Number PARAC/18/001 With The Drug Name From PARACETAMOL to PARACETAMOL', 'taiwo@gmail.com', '2018-06-11 18:34:30'),
(336, 'Updated PARACETAMOL with the Drug number PARAC/18/001 in the Drug list', 'taiwo@gmail.com', '2018-06-11 18:37:13'),
(337, 'Updated Drug Number PARAC/18/001 With The Drug Name From PARACETAMOL to PARACETAMOL', 'taiwo@gmail.com', '2018-06-11 18:37:13'),
(338, 'Updated PARACETAMOL with the Drug number PARAC/18/001 in the Drug list', 'taiwo@gmail.com', '2018-06-11 18:38:50'),
(339, 'Updated Drug Number PARAC/18/001 With The Drug Name From PARACETAMOL to PARACETAMOL', 'taiwo@gmail.com', '2018-06-11 18:38:50'),
(340, 'Updated PARACETAMOL with the Drug number PARAC/18/001 in the Drug list', 'taiwo@gmail.com', '2018-06-11 18:39:11'),
(341, 'Updated Drug Number PARAC/18/001 With The Drug Name From PARACETAMOL to PARACETAMOL', 'taiwo@gmail.com', '2018-06-11 18:39:11'),
(342, 'Updated PARACETAMOL with the Drug number PARAC/18/001 in the Drug list', 'taiwo@gmail.com', '2018-06-11 18:39:58'),
(343, 'Updated Drug Number PARAC/18/001 With The Drug Name From PARACETAMOL to PARACETAMOL', 'taiwo@gmail.com', '2018-06-11 18:39:58'),
(344, 'Updated PARACETAMOL with the Drug number PARAC/18/001 in the Drug list', 'taiwo@gmail.com', '2018-06-11 18:44:39'),
(345, 'Updated Drug Number PARAC/18/001 With The Drug Name From PARACETAMOL to PARACETAMOL', 'taiwo@gmail.com', '2018-06-11 18:44:39'),
(346, 'Updated PARACETAMOL with the Drug number PARAC/18/001 in the Drug list', 'taiwo@gmail.com', '2018-06-11 18:45:32'),
(347, 'Updated Drug Number PARAC/18/001 With The Drug Name From PARACETAMOL to PARACETAMOL', 'taiwo@gmail.com', '2018-06-11 18:45:32'),
(348, 'Updated PARACETAMOL with the Drug number PARAC/18/001 in the Drug list', 'taiwo@gmail.com', '2018-06-11 18:46:55'),
(349, 'Updated Drug Number PARAC/18/001 With The Drug Name From PARACETAMOL to PARACETAMOL', 'taiwo@gmail.com', '2018-06-11 18:46:55'),
(350, 'Updated PARACETAMOL with the Drug number PARAC/18/001 in the Drug list', 'taiwo@gmail.com', '2018-06-11 18:56:10'),
(351, 'Updated Drug Number PARAC/18/001 With The Drug Name From PARACETAMOL to PARACETAMOL', 'taiwo@gmail.com', '2018-06-11 18:56:10'),
(352, 'Updated PARACETAMOL with the Drug number PARAC/18/001 in the Drug list', 'taiwo@gmail.com', '2018-06-11 18:59:14'),
(353, 'Updated Drug Number PARAC/18/001 With The Drug Name From PARACETAMOL to PARACETAMOL', 'taiwo@gmail.com', '2018-06-11 18:59:15'),
(354, 'Updated PARACETAMOL with the Drug number PARAC/18/001 in the Drug list', 'taiwo@gmail.com', '2018-06-11 18:59:18'),
(355, 'Updated Drug Number PARAC/18/001 With The Drug Name From PARACETAMOL to PARACETAMOL', 'taiwo@gmail.com', '2018-06-11 18:59:18'),
(356, 'Updated PARACETAMOL with the Drug number PARAC/18/001 in the Drug list', 'taiwo@gmail.com', '2018-06-11 18:59:28'),
(357, 'Updated Drug Number PARAC/18/001 With The Drug Name From PARACETAMOL to PARACETAMOL', 'taiwo@gmail.com', '2018-06-11 18:59:28'),
(358, 'Updated PARACETAMOL with the Drug number PARAC/18/001 in the Drug list', 'taiwo@gmail.com', '2018-06-11 19:05:52'),
(359, 'Updated Drug Number PARAC/18/001 With The Drug Name From PARACETAMOL to PARACETAMOL', 'taiwo@gmail.com', '2018-06-11 19:05:52'),
(360, 'Updated PARACETAMOL with the Drug number PARAC/18/001 in the Drug list', 'taiwo@gmail.com', '2018-06-11 19:16:00'),
(361, 'Updated Drug Number PARAC/18/001 With The Drug Name From PARACETAMOL to PARACETAMOL', 'taiwo@gmail.com', '2018-06-11 19:16:01'),
(362, 'Updated PARACETAMOL with the Drug number PARAC/18/001 in the Drug list', 'taiwo@gmail.com', '2018-06-11 19:17:21'),
(363, 'Updated Drug Number PARAC/18/001 With The Drug Name From PARACETAMOL to PARACETAMOL', 'taiwo@gmail.com', '2018-06-11 19:17:21'),
(364, 'Updated PARACETAMOL with the Drug number PARAC/18/001 in the Drug list', 'taiwo@gmail.com', '2018-06-11 19:18:02'),
(365, 'Updated Drug Number PARAC/18/001 With The Drug Name From PARACETAMOL to PARACETAMOL', 'taiwo@gmail.com', '2018-06-11 19:18:02'),
(366, 'Updated PARACETAMOL with the Drug number PARAC/18/001 in the Drug list', 'taiwo@gmail.com', '2018-06-11 19:18:37'),
(367, 'Updated Drug Number PARAC/18/001 With The Drug Name From PARACETAMOL to PARACETAMOL', 'taiwo@gmail.com', '2018-06-11 19:18:37'),
(368, 'Updated PARACETAMOL with the Drug number PARAC/18/001 in the Drug list', 'taiwo@gmail.com', '2018-06-12 06:01:08'),
(369, 'Updated Drug Number PARAC/18/001 With The Drug Name From PARACETAMOL to PARACETAMOL', 'taiwo@gmail.com', '2018-06-12 06:01:08'),
(370, 'Updated PARACETAMOL with the Drug number PARAC/18/001 in the Drug list', 'taiwo@gmail.com', '2018-06-12 06:13:38'),
(371, 'Updated Drug Number PARAC/18/001 With The Drug Name From PARACETAMOL to PARACETAMOL', 'taiwo@gmail.com', '2018-06-12 06:13:38'),
(372, 'Updated PARACETAMOL with the Drug number PARAC/18/001 in the Drug list', 'taiwo@gmail.com', '2018-06-12 06:16:17'),
(373, 'Updated Drug Number PARAC/18/001 With The Drug Name From PARACETAMOL to PARACETAMOL', 'taiwo@gmail.com', '2018-06-12 06:16:17'),
(374, 'Updated PARACETAMOL with the Drug number PARAC/18/001 in the Drug list', 'taiwo@gmail.com', '2018-06-12 06:16:31'),
(375, 'Updated Drug Number PARAC/18/001 With The Drug Name From PARACETAMOL to PARACETAMOL', 'taiwo@gmail.com', '2018-06-12 06:16:32'),
(376, 'Updated PARACETAMOL with the Drug number PARAC/18/001 in the Drug list', 'taiwo@gmail.com', '2018-06-12 06:17:13'),
(377, 'Updated Drug Number PARAC/18/001 With The Drug Name From PARACETAMOL to PARACETAMOL', 'taiwo@gmail.com', '2018-06-12 06:17:13'),
(378, 'Updated PARACETAMOL with the Drug number PARAC/18/001 in the Drug list', 'taiwo@gmail.com', '2018-06-12 06:20:32'),
(379, 'Updated Drug Number PARAC/18/001 With The Drug Name From PARACETAMOL to PARACETAMOL', 'taiwo@gmail.com', '2018-06-12 06:20:32'),
(380, 'Updated PARACETAMOL with the Drug number PARAC/18/001 in the Drug list', 'taiwo@gmail.com', '2018-06-12 06:21:24'),
(381, 'Added PARACETAMOL with Drug Number PARAC/18/001 to the stock list', 'taiwo@gmail.com', '2018-06-12 06:21:25'),
(382, 'Updated PARACETAMOL with the Drug number PARAC/18/001 in the Drug list', 'taiwo@gmail.com', '2018-06-12 06:21:35'),
(383, 'Updated Drug Number PARAC/18/001 With The Drug Name From PARACETAMOL to PARACETAMOL', 'taiwo@gmail.com', '2018-06-12 06:21:35'),
(384, 'Updated PARACETAMOL with the Drug number PARAC/18/001 in the Drug list', 'taiwo@gmail.com', '2018-06-12 06:23:20'),
(385, 'Updated Drug Number PARAC/18/001 With The Drug Name From PARACETAMOL to PARACETAMOL', 'taiwo@gmail.com', '2018-06-12 06:23:20'),
(386, 'Updated PARACETAMOL with the Drug number PARAC/18/001 in the Drug list', 'taiwo@gmail.com', '2018-06-12 06:27:30'),
(387, 'Updated Drug Number PARAC/18/001 With The Drug Name From PARACETAMOL to PARACETAMOL', 'taiwo@gmail.com', '2018-06-12 06:27:30'),
(388, 'Updated PARACETAMOL with the Drug number PARAC/18/001 in the Drug list', 'taiwo@gmail.com', '2018-06-12 06:29:35'),
(389, 'Updated Drug Number PARAC/18/001 With The Drug Name From PARACETAMOL to PARACETAMOL', 'taiwo@gmail.com', '2018-06-12 06:29:35'),
(390, 'Updated PARACETAMOL with the Drug number PARAC/18/001 in the Drug list', 'taiwo@gmail.com', '2018-06-12 06:30:54'),
(391, 'Updated Drug Number PARAC/18/001 With The Drug Name From PARACETAMOL to PARACETAMOL', 'taiwo@gmail.com', '2018-06-12 06:30:54'),
(392, 'Updated PARACETAMOL with the Drug number PARAC/18/001 in the Drug list', 'taiwo@gmail.com', '2018-06-12 06:31:58'),
(393, 'Updated Drug Number PARAC/18/001 With The Drug Name From PARACETAMOL to PARACETAMOL', 'taiwo@gmail.com', '2018-06-12 06:31:58'),
(394, 'Updated PARACETAMOL with the Drug number PARAC/18/001 in the Drug list', 'taiwo@gmail.com', '2018-06-12 06:32:39'),
(395, 'Updated Drug Number PARAC/18/001 With The Drug Name From PARACETAMOL to PARACETAMOL', 'taiwo@gmail.com', '2018-06-12 06:32:39'),
(396, 'Added TRAMADOL with the Drug number TRAMA/18/002 to the Drug list', 'taiwo@gmail.com', '2018-06-12 06:36:14'),
(397, 'Added TRAMADOL with Drug Number TRAMA/18/002 to the stock list', 'taiwo@gmail.com', '2018-06-12 06:36:14'),
(398, 'Updated TRAMADOL with the Drug number TRAMA/18/002 in the Drug list', 'taiwo@gmail.com', '2018-06-12 06:36:41'),
(399, 'Updated Drug Number TRAMA/18/002 With The Drug Name From TRAMADOL to TRAMADOL', 'taiwo@gmail.com', '2018-06-12 06:36:41'),
(400, 'Updated TRAMADOL with the Drug number TRAMA/18/002 in the Drug list', 'taiwo@gmail.com', '2018-06-12 06:37:50'),
(401, 'Updated Drug Number TRAMA/18/002 With The Drug Name From TRAMADOL to TRAMADOL', 'taiwo@gmail.com', '2018-06-12 06:37:50'),
(402, 'Updated TRAMADOL with the Drug number TRAMA/18/002 in the Drug list', 'taiwo@gmail.com', '2018-06-12 06:37:51'),
(403, 'Updated Drug Number TRAMA/18/002 With The Drug Name From TRAMADOL to TRAMADOL', 'taiwo@gmail.com', '2018-06-12 06:37:51'),
(404, 'Updated TRAMADOL with the Drug number TRAMA/18/002 in the Drug list', 'taiwo@gmail.com', '2018-06-12 06:40:46'),
(405, 'Updated Drug Number TRAMA/18/002 With The Drug Name From TRAMADOL to TRAMADOL', 'taiwo@gmail.com', '2018-06-12 06:40:47'),
(406, 'Updated TRAMADOL with the Drug number TRAMA/18/002 in the Drug list', 'taiwo@gmail.com', '2018-06-12 06:41:58'),
(407, 'Updated Drug Number TRAMA/18/002 With The Drug Name From TRAMADOL to TRAMADOL', 'taiwo@gmail.com', '2018-06-12 06:41:58'),
(408, 'Updated TRAMADOL with the Drug number TRAMA/18/002 in the Drug list', 'taiwo@gmail.com', '2018-06-12 06:43:56'),
(409, 'Updated Drug Number TRAMA/18/002 With The Drug Name From TRAMADOL to TRAMADOL', 'taiwo@gmail.com', '2018-06-12 06:43:56'),
(410, 'Updated TRAMADOL with the Drug number TRAMA/18/002 in the Drug list', 'taiwo@gmail.com', '2018-06-12 06:46:18'),
(411, 'Updated Drug Number TRAMA/18/002 With The Drug Name From TRAMADOL to TRAMADOL', 'taiwo@gmail.com', '2018-06-12 06:46:19'),
(412, 'Updated TRAMADOL with the Drug number TRAMA/18/002 in the Drug list', 'taiwo@gmail.com', '2018-06-12 06:46:53'),
(413, 'Updated Drug Number TRAMA/18/002 With The Drug Name From TRAMADOL to TRAMADOL', 'taiwo@gmail.com', '2018-06-12 06:46:53'),
(414, 'Updated TRAMADOL with the Drug number TRAMA/18/002 in the Drug list', 'taiwo@gmail.com', '2018-06-12 06:47:24'),
(415, 'Updated Drug Number TRAMA/18/002 With The Drug Name From TRAMADOL to TRAMADOL', 'taiwo@gmail.com', '2018-06-12 06:47:24'),
(416, 'Updated TRAMADOL with the Drug number TRAMA/18/002 in the Drug list', 'taiwo@gmail.com', '2018-06-12 06:49:09'),
(417, 'Updated Drug Number TRAMA/18/002 With The Drug Name From TRAMADOL to TRAMADOL', 'taiwo@gmail.com', '2018-06-12 06:49:09'),
(418, 'Updated TRAMADOL with the Drug number TRAMA/18/002 in the Drug list', 'taiwo@gmail.com', '2018-06-12 06:50:00'),
(419, 'Updated Drug Number TRAMA/18/002 With The Drug Name From TRAMADOL to TRAMADOL', 'taiwo@gmail.com', '2018-06-12 06:50:00'),
(420, 'Updated TRAMADOL with the Drug number TRAMA/18/002 in the Drug list', 'taiwo@gmail.com', '2018-06-12 06:50:44'),
(421, 'Updated Drug Number TRAMA/18/002 With The Drug Name From TRAMADOL to TRAMADOL', 'taiwo@gmail.com', '2018-06-12 06:50:45'),
(422, 'Updated TRAMADOL with the Drug number TRAMA/18/002 in the Drug list', 'taiwo@gmail.com', '2018-06-12 06:51:31'),
(423, 'Updated Drug Number TRAMA/18/002 With The Drug Name From TRAMADOL to TRAMADOL', 'taiwo@gmail.com', '2018-06-12 06:51:31'),
(424, 'Updated PARACETAMOL with the Drug number PARAC/18/001 in the Drug list', 'taiwo@gmail.com', '2018-06-12 06:51:59'),
(425, 'Added PARACETAMOL with Drug Number PARAC/18/001 to the stock list', 'taiwo@gmail.com', '2018-06-12 06:51:59'),
(426, 'Updated PARACETAMOL with the Drug number PARAC/18/001 in the Drug list', 'taiwo@gmail.com', '2018-06-12 06:52:13'),
(427, 'Updated Drug Number PARAC/18/001 With The Drug Name From PARACETAMOL to PARACETAMOL', 'taiwo@gmail.com', '2018-06-12 06:52:13'),
(428, 'Updated PARACETAMOL with the Drug number PARAC/18/001 in the Drug list', 'taiwo@gmail.com', '2018-06-12 06:53:15'),
(429, 'Updated Drug Number PARAC/18/001 With The Drug Name From PARACETAMOL to PARACETAMOL', 'taiwo@gmail.com', '2018-06-12 06:53:15'),
(430, 'Updated PARACETAMOL with the Drug number PARAC/18/001 in the Drug list', 'taiwo@gmail.com', '2018-06-12 06:53:51'),
(431, 'Updated Drug Number PARAC/18/001 With The Drug Name From PARACETAMOL to PARACETAMOL', 'taiwo@gmail.com', '2018-06-12 06:53:52'),
(432, 'Updated PARACETAMOL with the Drug number PARAC/18/001 in the Drug list', 'taiwo@gmail.com', '2018-06-12 06:55:38'),
(433, 'Added PARACETAMOL with Drug Number PARAC/18/001 to the stock list', 'taiwo@gmail.com', '2018-06-12 06:55:38'),
(434, 'Updated PARACETAMOL with the Drug number PARAC/18/001 in the Drug list', 'taiwo@gmail.com', '2018-06-12 06:56:09'),
(435, 'Updated Drug Number PARAC/18/001 With The Drug Name From PARACETAMOL to PARACETAMOL', 'taiwo@gmail.com', '2018-06-12 06:56:09'),
(436, 'Updated PARACETAMOL with the Drug number PARAC/18/001 in the Drug list', 'taiwo@gmail.com', '2018-06-12 06:59:12'),
(437, 'Added PARACETAMOL with Drug Number PARAC/18/001 to the stock list', 'taiwo@gmail.com', '2018-06-12 06:59:12'),
(438, 'Updated PARACETAMOL with the Drug number PARAC/18/001 in the Drug list', 'taiwo@gmail.com', '2018-06-12 06:59:20'),
(439, 'Updated Drug Number PARAC/18/001 With The Drug Name From PARACETAMOL to PARACETAMOL', 'taiwo@gmail.com', '2018-06-12 06:59:20'),
(440, 'Updated PARACETAMOL with the Drug number PARAC/18/001 in the Drug list', 'taiwo@gmail.com', '2018-06-12 07:00:08'),
(441, 'Updated Drug Number PARAC/18/001 With The Drug Name From PARACETAMOL to PARACETAMOL', 'taiwo@gmail.com', '2018-06-12 07:00:08'),
(442, 'Updated TRAMADOL with the Drug number TRAMA/18/002 in the Drug list', 'taiwo@gmail.com', '2018-06-12 07:05:16');
INSERT INTO `activity` (`act_id`, `action`, `user_details`, `time_added`) VALUES
(443, 'Updated Drug Number TRAMA/18/002 With The Drug Name From TRAMADOL to TRAMADOL', 'taiwo@gmail.com', '2018-06-12 07:05:16'),
(444, 'Updated TRAMADOL with the Drug number TRAMA/18/002 in the Drug list', 'taiwo@gmail.com', '2018-06-12 07:07:00'),
(445, 'Updated Drug Number TRAMA/18/002 With The Drug Name From TRAMADOL to TRAMADOL', 'taiwo@gmail.com', '2018-06-12 07:07:00'),
(446, 'Updated TRAMADOL with the Drug number TRAMA/18/002 in the Drug list', 'taiwo@gmail.com', '2018-06-12 07:07:48'),
(447, 'Updated Drug Number TRAMA/18/002 With The Drug Name From TRAMADOL to TRAMADOL', 'taiwo@gmail.com', '2018-06-12 07:07:48'),
(448, 'Added TRAMADOL with the Drug number TRAMA/18/003 to the Drug list', 'taiwo@gmail.com', '2018-06-12 07:09:00'),
(449, 'Updated TRAMADOL stock with 100 quantity', 'taiwo@gmail.com', '2018-06-12 07:09:00'),
(450, 'Updated TRAMADOL with the Drug number TRAMA/18/003 in the Drug list', 'taiwo@gmail.com', '2018-06-12 07:12:00'),
(451, 'Updated Drug Number TRAMA/18/003 With The Drug Name From TRAMADOL to TRAMADOL', 'taiwo@gmail.com', '2018-06-12 07:12:00'),
(452, 'Updated TRAMADOL with the Drug number TRAMA/18/003 in the Drug list', 'taiwo@gmail.com', '2018-06-12 07:12:57'),
(453, 'Updated Drug Number TRAMA/18/003 With The Drug Name From TRAMADOL to TRAMADOL', 'taiwo@gmail.com', '2018-06-12 07:12:57'),
(454, 'Updated TRAMADOL with the Drug number TRAMA/18/003 in the Drug list', 'taiwo@gmail.com', '2018-06-12 07:14:03'),
(455, 'Updated Drug Number TRAMA/18/003 With The Drug Name From TRAMADOL to TRAMADOL', 'taiwo@gmail.com', '2018-06-12 07:14:03'),
(456, 'Added NEUROGESIC with the Drug number NEURO/18/004 to the Drug list', 'taiwo@gmail.com', '2018-06-12 07:32:48'),
(457, 'Added NEUROGESIC with Drug Number NEURO/18/004 to the stock list', 'taiwo@gmail.com', '2018-06-12 07:32:48'),
(458, 'Added NEUROGESIC with the Drug number NEURO/18/005 to the Drug list', 'taiwo@gmail.com', '2018-06-12 07:33:40'),
(459, 'Added NEUROGESIC with Drug Number NEURO/18/005 to the stock list', 'taiwo@gmail.com', '2018-06-12 07:33:40'),
(460, 'Updated NEUROGESIC with the Drug number NEURO/18/005 in the Drug list', 'taiwo@gmail.com', '2018-06-12 07:41:25'),
(461, 'Added NEUROGESIC with Drug Number NEURO/18/005 to the stock list', 'taiwo@gmail.com', '2018-06-12 07:41:25'),
(462, 'Updated NEUROGESIC with the Drug number NEURO/18/005 in the Drug list', 'taiwo@gmail.com', '2018-06-12 07:41:33'),
(463, 'Updated Drug Number NEURO/18/005 With The Drug Name From NEUROGESIC to NEUROGESIC', 'taiwo@gmail.com', '2018-06-12 07:41:33'),
(464, 'Updated NEUROGESIC with the Drug number NEURO/18/004 in the Drug list', 'taiwo@gmail.com', '2018-06-12 07:41:49'),
(465, 'Added NEUROGESIC with Drug Number NEURO/18/004 to the stock list', 'taiwo@gmail.com', '2018-06-12 07:41:49'),
(466, 'Updated NEUROGESIC with the Drug number NEURO/18/004 in the Drug list', 'taiwo@gmail.com', '2018-06-12 07:41:54'),
(467, 'Updated Drug Number NEURO/18/004 With The Drug Name From NEUROGESIC to NEUROGESIC', 'taiwo@gmail.com', '2018-06-12 07:41:54'),
(468, 'Updated NEUROGESIC with the Drug number NEURO/18/005 in the Drug list', 'taiwo@gmail.com', '2018-06-12 07:42:42'),
(469, 'Updated Drug Number NEURO/18/005 With The Drug Name From NEUROGESIC to NEUROGESIC', 'taiwo@gmail.com', '2018-06-12 07:42:42'),
(470, 'Added an Appointment For Mrs Adegoke Hopeyemi On Date 2018-06-23 with Adesina Tayo Victory', 'taiwo@gmail.com', '2018-06-12 07:56:35'),
(471, 'Logged Out', 'taiwo@gmail.com', '2018-06-12 08:31:31'),
(472, 'Logged In', 'tolajide74@gmail.com', '2018-06-12 08:31:36'),
(473, 'Updated PARACETAMOL with the Drug number PARAC/18/001 in the Drug list', 'tolajide74@gmail.com', '2018-06-12 08:32:23'),
(474, 'Updated Drug Number PARAC/18/001 With The Drug Name From PARACETAMOL to PARACETAMOL', 'tolajide74@gmail.com', '2018-06-12 08:32:23'),
(475, 'Added P-ALAXIN with the Drug number P-ALA/18/006 to the Drug list', 'tolajide74@gmail.com', '2018-06-12 08:33:50'),
(476, 'Added P-ALAXIN with Drug Number P-ALA/18/006 to the stock list', 'tolajide74@gmail.com', '2018-06-12 08:33:51'),
(477, 'Open Card 18/OSPH/IND/004 With The Card Category Individual Card For Dike Arinze', 'tolajide74@gmail.com', '2018-06-12 08:35:25'),
(478, 'Open Card 18/OSPH/FAM/005 With The Card Category Family Card For Chioma Kolly P', 'tolajide75@gmail.com', '2018-06-13 16:51:46'),
(479, 'Logged Out', 'tolajide75@gmail.com', '2018-06-13 16:52:49'),
(480, 'Logged In', 'taiwo@gmail.com', '2018-06-13 16:53:02'),
(481, 'Logged Out', 'taiwo@gmail.com', '2018-06-13 16:53:07'),
(482, 'Logged In', 'juliet@gmail.com', '2018-06-13 16:53:15'),
(483, 'Added Details To Mrs Adegoke Hopeyemi Case Note and Recommended X RAY ULNER', 'juliet@gmail.com', '2018-06-13 16:54:29'),
(484, 'Logged Out', 'juliet@gmail.com', '2018-06-13 16:54:41'),
(485, 'Logged In', 'tolajide75@gmail.com', '2018-06-13 16:54:48'),
(486, 'Logged Out', 'tolajide75@gmail.com', '2018-06-13 18:24:17'),
(487, 'Logged In', 'tolajide74@gmail.com', '2018-06-13 18:24:22'),
(488, 'Added Ajibola Mariam with the Staff Number OSPH/16/0003 To The Staff List', 'tolajide74@gmail.com', '2018-06-13 18:26:56'),
(489, 'Logged Out', 'tolajide74@gmail.com', '2018-06-13 18:27:37'),
(490, 'Logged In', 'mariam@gmail.com', '2018-06-13 18:27:56'),
(491, 'Sent Memo To Pharmacy on NOTICE OF MEETING To ,<br />\r\n<b>Notice</b>:  Undefined variable: set in <b>C:\\XAMPP\\htdocs\\oluwafunmilayohospital.com.ng\\clinic-administrator-panel\\ict-department\\compose_memo.php</b> on line <b>129</b><br />\r\n,<br />\r\n<b>Notice</b>:  Undefined variable: set in <b>C:\\XAMPP\\htdocs\\oluwafunmilayohospital.com.ng\\clinic-administrator-panel\\ict-department\\compose_memo.php</b> on line <b>129</b><br />\r\n', 'mariam@gmail.com', '2018-06-13 18:55:48'),
(492, 'Sent Memo To Pharmacy on NOTICE OF MEETING To ,<br />\r\n<b>Notice</b>:  Undefined variable: set in <b>C:\\XAMPP\\htdocs\\oluwafunmilayohospital.com.ng\\clinic-administrator-panel\\ict-department\\compose_memo.php</b> on line <b>129</b><br />\r\n,<br />\r\n<b>Notice</b>:  Undefined variable: set in <b>C:\\XAMPP\\htdocs\\oluwafunmilayohospital.com.ng\\clinic-administrator-panel\\ict-department\\compose_memo.php</b> on line <b>129</b><br />\r\n', 'mariam@gmail.com', '2018-06-13 18:58:15'),
(493, 'Sent Memo To Pharmacy on NOTICE OF MEETING To ', 'mariam@gmail.com', '2018-06-13 18:59:29'),
(494, 'Sent Memo To Pharmacy on NOTICE OF MEETING To ', 'mariam@gmail.com', '2018-06-13 19:00:00'),
(495, 'Sent Memo To Pharmacy on NOTICE OF MEETING To ', 'mariam@gmail.com', '2018-06-13 19:00:28'),
(496, 'Sent Memo To Pharmacy on NOTICE OF MEETING To ', 'mariam@gmail.com', '2018-06-13 19:00:41'),
(497, 'Sent Memo To Pharmacy on NOTICE OF MEETING To ', 'mariam@gmail.com', '2018-06-13 19:00:50'),
(498, 'Sent Memo To Pharmacy on NOTICE OF MEETING To ', 'mariam@gmail.com', '2018-06-13 19:03:04'),
(499, 'Sent Memo To Pharmacy on NOTICE OF MEETING To ', 'mariam@gmail.com', '2018-06-13 19:03:11'),
(500, 'Sent Memo To Pharmacy on NOTICE OF MEETING To OSPH/17/0001', 'mariam@gmail.com', '2018-06-13 19:04:31'),
(501, 'Sent Memo To Pharmacy on NOTICE OF MEETING To OSPH/17/0001', 'mariam@gmail.com', '2018-06-13 19:04:54'),
(502, 'Sent Memo To Pharmacy on NOTICE OF RESUMPTION To OSPH/16/0000001,OSPH/16/0003', 'mariam@gmail.com', '2018-06-13 19:06:25'),
(503, 'Sent Memo To ICT Department on NOTICE OF SCHOOL FEES To OSPH/16/0000001,OSPH/16/0003', 'mariam@gmail.com', '2018-06-13 19:10:44'),
(504, 'Sent Memo To Doctor on NOTICE OF RESUMPTION To ,OSPH/17/0001,OSPH/17/0002', 'mariam@gmail.com', '2018-06-15 09:56:03'),
(505, 'Sent Memo To Doctor on NOTICE OF RESUMPTION To ,OSPH/17/0001,OSPH/17/0002', 'mariam@gmail.com', '2018-06-15 09:56:19'),
(506, 'Sent Memo To Doctor on NOTICE OF SCHOOL FEES TO PARENT To OSPH/17/0001,OSPH/17/0002', 'mariam@gmail.com', '2018-06-15 09:57:20'),
(507, 'Sent Memo To Doctor on NOTICE OF SCHOOL FEES TO PARENT To OSPH/17/0001,OSPH/17/0002', 'mariam@gmail.com', '2018-06-15 09:58:20'),
(508, 'Sent Memo To Doctor on NOTICE OF SCHOOL FEES TO PARENT To OSPH/17/0001,OSPH/17/0002', 'mariam@gmail.com', '2018-06-15 09:58:43'),
(509, 'Sent Memo To Doctor on Notice of Staff Meeting To ,OSPH/17/0002', 'mariam@gmail.com', '2018-06-15 10:03:44'),
(510, 'Sent Memo To Doctor on Notice of Staff Meeting To ,OSPH/17/0002', 'mariam@gmail.com', '2018-06-15 10:10:32'),
(511, 'Sent Memo To Doctor on Notice of Staff Meeting To ,OSPH/17/0002', 'mariam@gmail.com', '2018-06-15 10:16:15'),
(512, 'Sent Memo To Doctor on Notice of Staff Meeting To ,OSPH/17/0002', 'mariam@gmail.com', '2018-06-15 10:16:29'),
(513, 'Sent Memo To Doctor on Notice of Staff Meeting To ,OSPH/17/0001,OSPH/17/0002', 'mariam@gmail.com', '2018-06-15 11:50:34'),
(514, 'Sent Memo To Doctor on NOTICE OF PTA MEETING To ,OSPH/17/0001', 'mariam@gmail.com', '2018-06-15 11:55:13'),
(515, 'Sent Memo To All The Staff on NOTICE OF PTA MEETING To 0', 'mariam@gmail.com', '2018-06-15 12:51:23'),
(516, 'Sent Memo To All The Staff on NOTICE OF SCHOOL FEES TO PARENT To 0', 'mariam@gmail.com', '2018-06-15 12:54:30'),
(517, 'Sent Memo To All The Staff on NOTICE OF SCHOOL FEES To 0', 'mariam@gmail.com', '2018-06-15 12:55:43'),
(518, 'Logged Out', 'mariam@gmail.com', '2018-06-15 13:26:38'),
(519, 'Logged In', 'tolajide74@gmail.com', '2018-07-07 11:51:29'),
(520, 'Logged Out', 'tolajide74@gmail.com', '2018-07-07 11:53:25'),
(521, 'Logged In', 'tolajide74@gmail.com', '2018-07-07 11:55:43'),
(522, 'Logged Out', 'tolajide74@gmail.com', '2018-07-07 15:18:29'),
(523, 'Logged In', 'tolajide74@gmail.com', '2018-07-07 15:19:36'),
(524, 'Added EPIDEMIOLOGY To The Hospital Unit/Department', 'tolajide74@gmail.com', '2018-07-07 15:40:40'),
(525, 'Logged Out', 'tolajide74@gmail.com', '2018-07-07 15:49:34'),
(526, 'Logged In', 'tolajide74@gmail.com', '2018-07-21 19:19:20'),
(527, 'Logged Out', 'tolajide74@gmail.com', '2018-07-21 19:21:16'),
(528, 'Logged In', 'tolajide74@gmail.com', '2018-08-04 12:06:17'),
(529, 'Logged In', 'tolajide74@gmail.com', '2018-08-11 17:04:59'),
(530, 'Added 18/OSPH/IND/003 Payment For CT SCAN with the Reciept Number -0001', 'tolajide74@gmail.com', '2018-08-11 18:23:08'),
(531, 'Added 18/OSPH/IND/003 Payment For BLOOD TEST with the Reciept Number 18-0001', 'tolajide74@gmail.com', '2018-08-11 18:24:54'),
(532, 'Added 18/OSPH/IND/003 Payment For BLOOD TEST with the Reciept Number 18-0002', 'tolajide74@gmail.com', '2018-08-11 18:25:11'),
(533, 'Added 18/OSPH/IND/002 Payment For EYE TEST with the Reciept Number 18-0003', 'tolajide74@gmail.com', '2018-08-11 18:26:14'),
(534, 'Added 18/OSPH/IND/002 Payment For X RAY FEMUR with the Reciept Number 18-0004', 'tolajide74@gmail.com', '2018-08-11 18:34:11'),
(535, 'Logged Out', 'tolajide74@gmail.com', '2018-08-15 09:10:32'),
(536, 'Logged In', 'tolajide74@gmail.com', '2018-08-15 09:11:15'),
(537, 'Logged In', 'tolajide74@gmail.com', '2018-08-23 11:51:45'),
(538, 'Logged Out', 'tolajide74@gmail.com', '2018-08-23 11:54:41'),
(539, 'Logged In', 'tolajide74@gmail.com', '2018-08-23 12:00:06'),
(540, 'Logged In', 'tolajide74@gmail.com', '2018-08-24 05:44:11'),
(541, 'Logged In', 'tolajide74@gmail.com', '2018-08-24 05:59:22'),
(542, 'Logged Out', 'tolajide74@gmail.com', '2018-08-24 06:00:11'),
(543, 'Logged In', 'tolajide74@gmail.com', '2018-08-24 06:13:52'),
(544, 'Logged Out', 'tolajide74@gmail.com', '2018-08-24 06:18:02'),
(545, 'Logged Out', 'tolajide74@gmail.com', '2018-08-24 06:18:09'),
(546, 'Logged In', 'tolajide74@gmail.com', '2018-08-24 06:18:22'),
(547, 'Logged In', 'tolajide74@gmail.com', '2018-10-08 16:16:43'),
(548, 'Logged Out', 'tolajide74@gmail.com', '2018-10-08 16:18:08');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `user_id` int(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access_level` int(1) NOT NULL,
  `time_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`user_id`, `full_name`, `user_name`, `password`, `access_level`, `time_registered`) VALUES
(1, 'Adesina Taiwo Olajumoke', 'tolajide74@gmail.com', 'b63e58a251cbdb2678919dbcd79fdc519c927304', 1, '2017-09-12 18:18:35'),
(2, 'Adesina Taiwo Olajide Eniolorunopa', 'tolajide75@gmail.com', 'b63e58a251cbdb2678919dbcd79fdc519c927304', 1, '2017-09-18 09:10:51'),
(3, 'Adesola', 'tolajide7@gmail.com', 'b63e58a251cbdb2678919dbcd79fdc519c927304', 1, '2017-09-12 18:53:42'),
(8, 'Linda Atambi', 'linda@gmail.com', '03cb346ca97a01487d9ae674295eeb7bb678c210', 2, '2017-09-20 10:16:49'),
(9, 'Desmond Elliot Olusola Kolade', 'desmond@gmail.com', '33030877822cdbbc27f088877240fd6eb8c501c8', 2, '2018-05-27 14:14:26'),
(10, 'Adesina Tayo Victory', 'taiwo@gmail.com', '591db58f3957cbf2aaccc1d7bf7ddc4dd2983d1a', 4, '2018-06-08 16:19:54'),
(11, 'Hope Henry Juliet Lola', 'juliet@gmail.com', '128a94f3a1e21a8f2dcae794bb932306c0e51072', 3, '2018-06-07 08:42:56'),
(12, 'Gabriel Desola Jumoke', 'julietnew@gmail.com', '98a9757202d8b0bbed0ba8a21b1960e526ab3074', 0, '2018-05-27 15:07:31'),
(13, 'Adenike Kemisola', 'julietold@gmail.com', 'ce5e6c8ca2de58531fce0350640157494eaca91f', 1, '2018-05-27 15:49:10'),
(14, 'Ajibola Mariam', 'mariam@gmail.com', 'b39c6248128ce2fc035af762c619c9f26965999a', 1, '2018-06-13 18:26:56');

-- --------------------------------------------------------

--
-- Table structure for table `card_category`
--

CREATE TABLE `card_category` (
  `card_category_id` int(255) NOT NULL,
  `card_category_name` varchar(255) NOT NULL,
  `numbers_user` int(2) NOT NULL,
  `care_price` varchar(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `card_category`
--

INSERT INTO `card_category` (`card_category_id`, `card_category_name`, `numbers_user`, `care_price`, `time_added`) VALUES
(1, 'Family Card', 6, '2000', '2018-06-01 17:11:43'),
(2, 'Individual Card', 1, '500', '2018-06-01 17:11:47');

-- --------------------------------------------------------

--
-- Table structure for table `case_note`
--

CREATE TABLE `case_note` (
  `case_note_id` int(255) NOT NULL,
  `card_number` varchar(255) NOT NULL,
  `staff_number` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `test_id` int(255) NOT NULL,
  `time_inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `case_note`
--

INSERT INTO `case_note` (`case_note_id`, `card_number`, `staff_number`, `content`, `test_id`, `time_inserted`) VALUES
(1, '18/OSPH/IND/002', 'OSPH/17/0001', 'The Patient Looks so Ill and Pale', 5, '2018-06-04 23:36:36'),
(4, '18/OSPH/IND/002', 'OSPH/17/0001', 'Terrible Cough and Chest Pain Terrible and Sleepless Night', 8, '2018-06-06 09:11:05'),
(5, '18/OSPH/IND/003', 'OSPH/17/0001', 'jhbviutwu a gerugu', 12, '2018-06-13 16:54:29');

-- --------------------------------------------------------

--
-- Table structure for table `drugs`
--

CREATE TABLE `drugs` (
  `drug_id` int(255) NOT NULL,
  `drug_name` varchar(255) NOT NULL,
  `carton` int(255) NOT NULL,
  `sachet` int(255) NOT NULL,
  `pack_price` int(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `drug_number` varchar(255) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `manufacturer` text NOT NULL,
  `miligram` varchar(255) NOT NULL,
  `type_id` int(255) NOT NULL,
  `category_id` int(255) NOT NULL,
  `manu_date` varchar(255) NOT NULL,
  `exp_date` varchar(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drugs`
--

INSERT INTO `drugs` (`drug_id`, `drug_name`, `carton`, `sachet`, `pack_price`, `price`, `drug_number`, `quantity`, `manufacturer`, `miligram`, `type_id`, `category_id`, `manu_date`, `exp_date`, `time_added`) VALUES
(1, 'PARACETAMOL', 100, 200, 400, '50', 'PARAC/18/001', '10', '3', '100MG', 2, 1, '2018-06-03', '2018-06-30', '2018-06-12 08:32:22'),
(2, 'TRAMADOL', 16, 19, 1000, '100', 'TRAMA/18/002', '13', '1', '100MG', 4, 1, '2018-05-27', '2018-06-30', '2018-06-12 07:07:48'),
(3, 'TRAMADOL', 105, 347, 600, '700', 'TRAMA/18/003', '102', '3', '100MG', 4, 1, '2018-06-20', '2018-06-30', '2018-06-12 07:14:03'),
(4, 'NEUROGESIC', 30, 1, 10000, '1000', 'NEURO/18/004', '100', '5', '100MG', 2, 5, '2018-05-27', '2018-06-30', '2018-06-12 07:41:49'),
(5, 'NEUROGESIC', 30, 1, 10000, '1000', 'NEURO/18/005', '100', '5', '100MG', 2, 5, '2018-05-27', '2018-06-30', '2018-06-12 07:42:42'),
(6, 'P-ALAXIN', 20, 20, 700, '70', 'P-ALA/18/006', '30', '3', '750MG', 4, 1, '2018-06-10', '2018-06-30', '2018-06-12 08:33:50');

-- --------------------------------------------------------

--
-- Table structure for table `drug_category`
--

CREATE TABLE `drug_category` (
  `drug_cate_id` int(255) NOT NULL,
  `drug_category_name` varchar(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drug_category`
--

INSERT INTO `drug_category` (`drug_cate_id`, `drug_category_name`, `time_added`) VALUES
(1, 'TABLETS', '2018-06-08 15:42:48'),
(2, 'SYRUP', '2018-06-08 15:42:39'),
(3, 'INJECTION', '2018-06-08 15:42:32'),
(4, 'DRIP', '2018-06-08 15:42:21'),
(5, 'BALM (MASSAGING)', '2018-06-09 17:49:07');

-- --------------------------------------------------------

--
-- Table structure for table `drug_stock`
--

CREATE TABLE `drug_stock` (
  `stock_id` int(255) NOT NULL,
  `drug_name` varchar(255) NOT NULL,
  `miligram` text NOT NULL,
  `drug_cate_id` int(255) NOT NULL,
  `type_id` int(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `carton` int(255) NOT NULL,
  `total_sachet` int(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drug_stock`
--

INSERT INTO `drug_stock` (`stock_id`, `drug_name`, `miligram`, `drug_cate_id`, `type_id`, `quantity`, `carton`, `total_sachet`, `time_added`) VALUES
(1, 'TRAMADOL', '100MG', 1, 4, '115', 121, 347, '2018-06-12 07:14:03'),
(3, 'PARACETAMOk', '100MG', 1, 2, '10', 0, 0, '2018-06-12 06:58:57'),
(4, 'PARACETAMOL', '100MG', 1, 2, '10', 100, 200, '2018-06-12 08:32:23'),
(5, 'NEUROGESIC', '100', 5, 2, '100', 30, 1, '2018-06-12 07:32:48'),
(6, 'NEUROGESIC', '200MG', 5, 2, '100', 30, 1, '2018-06-12 07:33:40'),
(7, 'NEUROGESIC', '800MG', 5, 2, '100', 30, 1, '2018-06-12 07:41:25'),
(8, 'NEUROGESIC', '100MG', 5, 2, '100', 30, 1, '2018-06-12 07:41:49'),
(9, 'P-ALAXIN', '750MG', 1, 4, '30', 20, 20, '2018-06-12 08:33:50');

-- --------------------------------------------------------

--
-- Table structure for table `drug_type`
--

CREATE TABLE `drug_type` (
  `type_id` int(255) NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drug_type`
--

INSERT INTO `drug_type` (`type_id`, `type_name`, `time_added`) VALUES
(1, 'Anagesics', '2017-09-15 12:50:12'),
(2, 'Pain Relief', '2017-09-15 12:50:20'),
(3, 'Sedative', '2017-09-15 12:50:28'),
(4, 'Antibiotics', '2017-09-15 12:50:40'),
(5, 'Malaria', '2018-06-09 17:57:15'),
(6, 'Abortion', '2018-06-09 17:57:15');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `faclity_id` int(255) NOT NULL,
  `facility_name` varchar(255) NOT NULL,
  `facility_category` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `facility_category`
--

CREATE TABLE `facility_category` (
  `cate_id` int(255) NOT NULL,
  `cate_name` varchar(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facility_category`
--

INSERT INTO `facility_category` (`cate_id`, `cate_name`, `time_added`) VALUES
(1, 'Laundry', '2018-07-07 15:44:22'),
(2, 'First Aid Box', '2018-07-07 15:44:22'),
(3, 'Test', '2018-07-07 15:46:06'),
(4, 'Patient Bed', '2018-07-07 15:46:06');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_card`
--

CREATE TABLE `hospital_card` (
  `card_id` int(255) NOT NULL,
  `card_number` varchar(255) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `date_birth` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `card_category_id` int(11) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital_card`
--

INSERT INTO `hospital_card` (`card_id`, `card_number`, `patient_name`, `sex`, `date_birth`, `address`, `card_category_id`, `time_added`) VALUES
(2, '18/OSPH/IND/002', 'Mrs Nancy Woods', 'Female', '1988-06-15', 'University of Ibadan', 2, '2018-06-01 18:01:46'),
(3, '18/OSPH/IND/003', 'Mrs Adegoke Hopeyemi', 'Male', '2018-06-13', 'Ororuwo Osun State', 2, '2018-06-02 15:22:13'),
(4, '18/OSPH/IND/004', 'Dike Arinze', 'Male', '2018-06-19', 'Hotel', 2, '2018-06-12 08:35:25'),
(5, '18/OSPH/FAM/005', 'Chioma Kolly P', 'Female', '2018-06-11', 'mowe', 1, '2018-06-13 16:51:45');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_memo`
--

CREATE TABLE `hospital_memo` (
  `memo_id` int(255) NOT NULL,
  `memo_content` text NOT NULL,
  `memo_reciever` text NOT NULL,
  `memo_sender` text NOT NULL,
  `memo_category` varchar(255) NOT NULL,
  `subject` text NOT NULL,
  `attachment` text NOT NULL,
  `time_written` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital_memo`
--

INSERT INTO `hospital_memo` (`memo_id`, `memo_content`, `memo_reciever`, `memo_sender`, `memo_category`, `subject`, `attachment`, `time_written`) VALUES
(1, 'There will be meeting tomorrow', ',OSPH/17/0001,OSPH/17/0002', 'mariam@gmail.com', 'Doctor', 'Notice of Staff Meeting', 'ADESINA TAIWO OLAJIDE CV.pdf', '2018-06-15 11:50:34'),
(2, 'This is Just a Notification of our staff meeting', ',OSPH/17/0001', 'mariam@gmail.com', 'Doctor', 'NOTICE OF PTA MEETING', '', '2018-06-15 11:55:13'),
(3, 'PTA', '0', 'mariam@gmail.com', 'All The Staff', 'NOTICE OF PTA MEETING', '', '2018-06-15 12:51:23'),
(4, 'This is A fresh Notice', '0', 'mariam@gmail.com', 'All The Staff', 'NOTICE OF SCHOOL FEES TO PARENT', 'DIAMONDVILLE.xlsx', '2018-06-15 12:54:30'),
(5, 'Money', '0', 'mariam@gmail.com', 'All The Staff', 'NOTICE OF SCHOOL FEES', 'DESIGN_AND_IMPLEMENTATION_OF_AN_AUTOMATED_INVENTORY_CONTROL_SYSTEM_FOR_A_MANUFACTURING_ORGANISATION.pdf', '2018-06-15 12:55:43');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_test`
--

CREATE TABLE `hospital_test` (
  `test_id` int(255) NOT NULL,
  `test_name` varchar(255) NOT NULL,
  `unit_id` int(255) NOT NULL,
  `test_amount` varchar(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital_test`
--

INSERT INTO `hospital_test` (`test_id`, `test_name`, `unit_id`, `test_amount`, `time_added`) VALUES
(1, 'BLOOD TEST', 10, '2000', '2018-05-29 13:56:12'),
(3, 'CT SCAN', 10, '3000', '2018-05-29 13:21:08'),
(4, 'PREGNANCY', 10, '5000', '2018-05-29 13:57:30'),
(5, 'HIV TEST', 6, '4000', '2018-05-29 13:57:53'),
(6, 'EYE TEST', 2, '500', '2018-05-29 13:58:08'),
(8, 'EBOLA', 10, '0', '2018-05-29 14:10:52'),
(9, 'UTRASOUND', 10, '5000', '2018-05-29 14:11:34'),
(10, 'X RAY LEG', 10, '7000', '2018-06-08 08:32:40'),
(11, 'X RAY FEMUR', 10, '6000', '2018-06-08 08:33:10'),
(12, 'X RAY ULNER', 10, '5000', '2018-06-08 08:33:41'),
(13, 'X RAY TIBIAR', 4, '6000', '2018-06-08 08:34:04');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_unit`
--

CREATE TABLE `hospital_unit` (
  `unit_id` int(255) NOT NULL,
  `unit_name` varchar(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital_unit`
--

INSERT INTO `hospital_unit` (`unit_id`, `unit_name`, `time_added`) VALUES
(1, 'INTENSIVE CARE UNIT (ICU)', '2018-05-29 12:19:39'),
(2, 'EYE CLINIC', '2018-05-29 12:19:13'),
(3, 'ACCIDENT AND EMERGENCIES', '2018-05-29 12:18:23'),
(4, 'ORTHOPEDICS', '2018-05-29 12:20:19'),
(5, 'ACCOUNTING', '2018-05-29 12:18:40'),
(6, 'BLOOD BANK', '2018-05-29 12:18:56'),
(8, 'PHARMACY', '2018-05-29 12:20:32'),
(9, 'RADIOLOGY', '2018-05-29 12:21:39'),
(10, 'LABORATORY', '2018-05-29 12:36:12'),
(11, 'EPIDEMIOLOGY', '2018-07-07 15:40:40');

-- --------------------------------------------------------

--
-- Table structure for table `last_numbers`
--

CREATE TABLE `last_numbers` (
  `last_id` int(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `numbers` varchar(255) NOT NULL,
  `year_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `last_numbers`
--

INSERT INTO `last_numbers` (`last_id`, `category`, `numbers`, `year_number`) VALUES
(1, 'Staff', '000', '2018'),
(2, 'Patient', '000', '2018'),
(3, 'Drugs', '000', '2018'),
(4, 'Staff', '0001', '2018'),
(5, 'Staff', '2', '2018'),
(6, 'Staff', '1', '2017'),
(7, 'Staff', '0001', '2016'),
(8, 'Staff', '2', '2017'),
(9, 'Staff', '0002', '2016'),
(21, 'Patient', '001', '2018'),
(22, 'Patient', '002', '2018'),
(23, 'Patient', '003', '2018'),
(45, 'Drugs', '001', '2018'),
(46, 'Drugs', '002', '2018'),
(47, 'Drugs', '003', '2018'),
(48, 'Drugs', '004', '2018'),
(49, 'Drugs', '005', '2018'),
(50, 'Drugs', '006', '2018'),
(51, 'Patient', '004', '2018'),
(52, 'Patient', '005', '2018'),
(53, 'Staff', '0003', '2016'),
(54, 'Receipt', '0001', '2018'),
(55, 'Receipt', '0001', ''),
(56, 'Receipt', '0002', ''),
(57, 'Receipt', '0003', ''),
(58, 'Receipt', '0004', '');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `manufacturer_id` int(255) NOT NULL,
  `manufacturer_name` varchar(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`manufacturer_id`, `manufacturer_name`, `time_added`) VALUES
(1, 'Tuyil Pharmacetical Company', '2017-09-14 14:22:04'),
(3, 'Bicham Pharmacetical Company', '2017-09-19 12:55:54'),
(5, 'Emzor Pharmacetical Company', '2017-09-19 12:56:12');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(255) NOT NULL,
  `patient_number` varchar(255) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `date_birth` varchar(20) NOT NULL,
  `ward_id` int(255) NOT NULL,
  `bed_space` int(255) NOT NULL,
  `patient_condition` text NOT NULL,
  `causes_admission` text NOT NULL,
  `reaction_drugs` text NOT NULL,
  `next_kin_name` varchar(255) NOT NULL,
  `next_kin_phone` varchar(255) NOT NULL,
  `next_kin_adress` text NOT NULL,
  `time_admitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient_appointment`
--

CREATE TABLE `patient_appointment` (
  `appointment_id` int(255) NOT NULL,
  `staff_number` varchar(255) NOT NULL,
  `patient_number` varchar(255) NOT NULL,
  `dateof_appointment` varchar(20) NOT NULL,
  `unit_id` int(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_appointment`
--

INSERT INTO `patient_appointment` (`appointment_id`, `staff_number`, `patient_number`, `dateof_appointment`, `unit_id`, `time_added`) VALUES
(1, 'OSPH/17/0001', '18/OSPH/IND/003', '2020-06-12', 3, '2018-06-09 18:24:43'),
(2, 'OSPH/18/0002', '18/OSPH/IND/003', '2018-06-23', 8, '2018-06-12 07:56:35');

-- --------------------------------------------------------

--
-- Table structure for table `patient_discharge`
--

CREATE TABLE `patient_discharge` (
  `discharge_id` int(255) NOT NULL,
  `staff_number` varchar(255) NOT NULL,
  `patient_number` varchar(255) NOT NULL,
  `discharge_condition` text NOT NULL,
  `pharmacy_clearance` int(1) NOT NULL,
  `account_clearance` int(1) NOT NULL,
  `time_discharged` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient_payment`
--

CREATE TABLE `patient_payment` (
  `payment_id` int(255) NOT NULL,
  `staff_number` varchar(255) NOT NULL,
  `card_number` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `receipt_number` varchar(255) NOT NULL,
  `time_paid` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_payment`
--

INSERT INTO `patient_payment` (`payment_id`, `staff_number`, `card_number`, `payment_type`, `amount`, `receipt_number`, `time_paid`) VALUES
(1, 'OSPH/17/0002', '18/OSPH/IND/003', 'CT SCAN', '3000', '17-0001', '2018-08-11 18:26:49'),
(2, 'OSPH/17/0002', '18/OSPH/IND/003', 'BLOOD TEST', '2000', '18-0001', '2018-08-11 18:24:54'),
(3, 'OSPH/17/0002', '18/OSPH/IND/003', 'BLOOD TEST', '2000', '18-0002', '2018-08-11 18:25:11'),
(4, 'OSPH/17/0002', '18/OSPH/IND/002', 'EYE TEST', '500', '18-0003', '2018-08-11 18:26:14'),
(5, 'OSPH/17/0002', '18/OSPH/IND/002', 'X RAY FEMUR', '6000', '18-0004', '2018-08-11 18:34:11');

-- --------------------------------------------------------

--
-- Table structure for table `patient_test`
--

CREATE TABLE `patient_test` (
  `patient_test_id` int(11) NOT NULL,
  `staff_number` varchar(255) NOT NULL,
  `card_number` varchar(255) NOT NULL,
  `specification` text NOT NULL,
  `test_id` varchar(255) NOT NULL,
  `time_recommended` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_test`
--

INSERT INTO `patient_test` (`patient_test_id`, `staff_number`, `card_number`, `specification`, `test_id`, `time_recommended`) VALUES
(2, 'OSPH/17/0001', '18/OSPH/IND/003', 'The Patient Has fat Embolism and Have Problem Breathing', '3', '2018-06-08 13:23:23'),
(4, 'OSPH/17/0001', '18/OSPH/IND/003', 'She is Pregnant', '9', '2018-06-08 13:33:35');

-- --------------------------------------------------------

--
-- Table structure for table `patient_transfer`
--

CREATE TABLE `patient_transfer` (
  `transfer_id` int(255) NOT NULL,
  `patient_number` varchar(255) NOT NULL,
  `staff_number` varchar(255) NOT NULL,
  `previous_ward` int(255) NOT NULL,
  `previous_unit` int(255) NOT NULL,
  `previous_bed` int(255) NOT NULL,
  `new_ward` int(255) NOT NULL,
  `new_unit` int(255) NOT NULL,
  `patient_condition` text NOT NULL,
  `transfer_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(255) NOT NULL,
  `passport` text NOT NULL,
  `staff_number` varchar(255) NOT NULL,
  `staff_name` varchar(255) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `marital_status` varchar(20) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `date_birth` varchar(20) NOT NULL,
  `staff_email` varchar(255) NOT NULL,
  `staff_phone` varchar(13) NOT NULL,
  `address` text NOT NULL,
  `type_id` int(255) NOT NULL,
  `dept_id` int(255) NOT NULL,
  `year_employ` varchar(4) NOT NULL,
  `state_origin` text NOT NULL,
  `qualification_id` varchar(255) NOT NULL,
  `kin_details` text NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `passport`, `staff_number`, `staff_name`, `sex`, `marital_status`, `religion`, `date_birth`, `staff_email`, `staff_phone`, `address`, `type_id`, `dept_id`, `year_employ`, `state_origin`, `qualification_id`, `kin_details`, `time_added`) VALUES
(1, 'images (1).png', 'OSPH/18/0001', 'Desmond Elliot Olusola Kolade', 'Female', 'Married', 'Islam', '2018-05-16', 'desmond@gmail.com', '09098877898', 'Jos Home', 2, 1, '2018', 'Anambra', '2,3,5,2,3,5,2,3,5', 'Kola Balogun 0906476878 Num 5 Favors Building Bodija Oyo State', '2018-05-27 14:42:55'),
(2, 'download (1).jpg', 'OSPH/18/0002', 'Adesina Tayo Victory', 'Male', 'Single', 'Christainity', '1980-05-09', 'taiwo@gmail.com', '0999809200', 'Mowe Ogun State', 4, 8, '2018', 'Ogun State', '2,3,1', 'Mr Enioloruonopa 08138139333', '2018-06-08 16:22:15'),
(3, 'nol.jpg', 'OSPH/17/0001', 'Hope Henry Juliet Lola', 'Female', 'Married', 'Islam', '1990-05-17', 'juliet@gmail.com', '080766767557', 'Hospital Residence', 3, 3, '2017', 'Ekiti', '2,1,5', 'Joseph Jolade', '2018-06-07 08:42:56'),
(4, 'stu.jpg', 'OSPH/16/0000001', 'Gabriel Desola Jumoke', 'Female', 'Single', 'Christainity', '1990-01-17', 'julietnew@gmail.com', '080766767559', 'Hospital Residence', 1, 4, '2016', 'Outside Nigeria', '3', 'Joseph', '2018-05-27 15:07:31'),
(5, 'nol.jpg', 'OSPH/17/0002', 'Adenike Kemisola', 'Female', 'Single', 'Christainity', '2018-04-07', 'tolajide74@gmail.com', '080766767879', 'Hospital Residence', 3, 2, '2017', 'Outside Nigeria', '3', 'God''s Grace Avenue Estate', '2018-08-11 18:12:49'),
(6, 'images.jpg', 'OSPH/16/0003', 'Ajibola Mariam', 'Female', 'Single', 'Christainity', '1994-06-21', 'mariam@gmail.com', '090766546446', 'Follow', 1, 9, '2016', 'Cross River State', '3', 'SdFffgiomgfndbts ynjfkh,nmufyy', '2018-06-13 18:26:55');

-- --------------------------------------------------------

--
-- Table structure for table `staff_qualification`
--

CREATE TABLE `staff_qualification` (
  `qualification_id` int(255) NOT NULL,
  `qualification_name` varchar(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_qualification`
--

INSERT INTO `staff_qualification` (`qualification_id`, `qualification_name`, `time_added`) VALUES
(1, 'Ond', '2017-05-11 05:11:02'),
(2, 'Hnd', '2017-05-11 05:10:38'),
(3, 'Bsc', '2017-05-11 05:14:29'),
(4, 'Msc', '2017-05-11 05:10:48'),
(5, 'Phd', '2017-05-11 05:11:12');

-- --------------------------------------------------------

--
-- Table structure for table `staff_transfer`
--

CREATE TABLE `staff_transfer` (
  `staff_transfer_id` int(255) NOT NULL,
  `staff_number` varchar(255) NOT NULL,
  `prev_unit_id` int(255) NOT NULL,
  `new_unit_id` int(255) NOT NULL,
  `transfer_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_transfer`
--

INSERT INTO `staff_transfer` (`staff_transfer_id`, `staff_number`, `prev_unit_id`, `new_unit_id`, `transfer_time`) VALUES
(1, 'OSPH/16/0000001', 2, 3, '2018-05-29 08:12:04'),
(2, 'OSPH/17/0001', 1, 2, '2018-05-29 08:12:04'),
(3, 'OSPH/17/0002', 2, 4, '2018-05-29 08:19:07'),
(4, 'OSPH/18/0001', 4, 2, '2018-05-29 08:19:07'),
(5, 'OSPH/18/0001', 4, 2, '2018-05-29 08:19:07');

-- --------------------------------------------------------

--
-- Table structure for table `staff_type`
--

CREATE TABLE `staff_type` (
  `type_id` int(255) NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_type`
--

INSERT INTO `staff_type` (`type_id`, `type_name`, `time_added`) VALUES
(1, 'ICT Department\n', '2018-05-27 15:21:10'),
(2, 'Chief Medical Director', '2018-05-27 15:21:26'),
(3, 'Doctor', '2018-05-27 15:21:42'),
(4, 'Pharmacy', '2018-05-27 15:23:48'),
(5, 'Matron', '2018-05-25 16:40:24'),
(6, 'Pharmacist', '2018-05-27 15:24:04'),
(7, 'Nurse', '2018-05-27 15:23:18'),
(8, 'Health Assistant', '2018-05-27 15:29:25'),
(9, 'Account Department', '2018-05-27 15:29:53');

-- --------------------------------------------------------

--
-- Table structure for table `ward`
--

CREATE TABLE `ward` (
  `ward_id` int(255) NOT NULL,
  `ward_name` varchar(255) NOT NULL,
  `bed_space` int(255) NOT NULL,
  `unit_id` int(255) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ward`
--

INSERT INTO `ward` (`ward_id`, `ward_name`, `bed_space`, `unit_id`, `time_added`) VALUES
(1, 'South East 3', 200, 3, '2018-05-29 09:09:36'),
(2, 'South East 1', 420, 1, '2018-05-30 18:08:30'),
(3, 'Independence', 200, 4, '2018-05-29 09:11:05'),
(4, 'Obafemi Awolowo', 300, 1, '2018-05-29 08:45:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`act_id`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `card_category`
--
ALTER TABLE `card_category`
  ADD PRIMARY KEY (`card_category_id`);

--
-- Indexes for table `case_note`
--
ALTER TABLE `case_note`
  ADD PRIMARY KEY (`case_note_id`);

--
-- Indexes for table `drugs`
--
ALTER TABLE `drugs`
  ADD PRIMARY KEY (`drug_id`);

--
-- Indexes for table `drug_category`
--
ALTER TABLE `drug_category`
  ADD PRIMARY KEY (`drug_cate_id`);

--
-- Indexes for table `drug_stock`
--
ALTER TABLE `drug_stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `drug_type`
--
ALTER TABLE `drug_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`faclity_id`);

--
-- Indexes for table `facility_category`
--
ALTER TABLE `facility_category`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `hospital_card`
--
ALTER TABLE `hospital_card`
  ADD PRIMARY KEY (`card_id`);

--
-- Indexes for table `hospital_memo`
--
ALTER TABLE `hospital_memo`
  ADD PRIMARY KEY (`memo_id`);

--
-- Indexes for table `hospital_test`
--
ALTER TABLE `hospital_test`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `hospital_unit`
--
ALTER TABLE `hospital_unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `last_numbers`
--
ALTER TABLE `last_numbers`
  ADD PRIMARY KEY (`last_id`);

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `patient_appointment`
--
ALTER TABLE `patient_appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `patient_discharge`
--
ALTER TABLE `patient_discharge`
  ADD PRIMARY KEY (`discharge_id`);

--
-- Indexes for table `patient_payment`
--
ALTER TABLE `patient_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `patient_test`
--
ALTER TABLE `patient_test`
  ADD PRIMARY KEY (`patient_test_id`);

--
-- Indexes for table `patient_transfer`
--
ALTER TABLE `patient_transfer`
  ADD PRIMARY KEY (`transfer_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `staff_qualification`
--
ALTER TABLE `staff_qualification`
  ADD PRIMARY KEY (`qualification_id`);

--
-- Indexes for table `staff_transfer`
--
ALTER TABLE `staff_transfer`
  ADD PRIMARY KEY (`staff_transfer_id`);

--
-- Indexes for table `staff_type`
--
ALTER TABLE `staff_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `ward`
--
ALTER TABLE `ward`
  ADD PRIMARY KEY (`ward_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `act_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=549;
--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `card_category`
--
ALTER TABLE `card_category`
  MODIFY `card_category_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `case_note`
--
ALTER TABLE `case_note`
  MODIFY `case_note_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `drugs`
--
ALTER TABLE `drugs`
  MODIFY `drug_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `drug_category`
--
ALTER TABLE `drug_category`
  MODIFY `drug_cate_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `drug_stock`
--
ALTER TABLE `drug_stock`
  MODIFY `stock_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `drug_type`
--
ALTER TABLE `drug_type`
  MODIFY `type_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `faclity_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `facility_category`
--
ALTER TABLE `facility_category`
  MODIFY `cate_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `hospital_card`
--
ALTER TABLE `hospital_card`
  MODIFY `card_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `hospital_memo`
--
ALTER TABLE `hospital_memo`
  MODIFY `memo_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `hospital_test`
--
ALTER TABLE `hospital_test`
  MODIFY `test_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `hospital_unit`
--
ALTER TABLE `hospital_unit`
  MODIFY `unit_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `last_numbers`
--
ALTER TABLE `last_numbers`
  MODIFY `last_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `manufacturer_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `patient_appointment`
--
ALTER TABLE `patient_appointment`
  MODIFY `appointment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `patient_discharge`
--
ALTER TABLE `patient_discharge`
  MODIFY `discharge_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `patient_payment`
--
ALTER TABLE `patient_payment`
  MODIFY `payment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `patient_test`
--
ALTER TABLE `patient_test`
  MODIFY `patient_test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `patient_transfer`
--
ALTER TABLE `patient_transfer`
  MODIFY `transfer_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `staff_qualification`
--
ALTER TABLE `staff_qualification`
  MODIFY `qualification_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `staff_transfer`
--
ALTER TABLE `staff_transfer`
  MODIFY `staff_transfer_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `staff_type`
--
ALTER TABLE `staff_type`
  MODIFY `type_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ward`
--
ALTER TABLE `ward`
  MODIFY `ward_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
