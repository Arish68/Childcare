-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 11, 2021 at 02:19 AM
-- Server version: 10.3.28-MariaDB-log-cll-lve
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intevzay_childcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `addartworknotifications`
--

CREATE TABLE `addartworknotifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parant_id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `lesson_id` int(11) NOT NULL DEFAULT 0,
  `art_id` int(11) NOT NULL DEFAULT 0,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'You have new Art/Work.',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = unread, 1 = read',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addartworknotifications`
--

INSERT INTO `addartworknotifications` (`id`, `parant_id`, `teacher_id`, `lesson_id`, `art_id`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 6, 6, 4, 'You have new Art/Work.', 0, '2021-06-04 22:58:50', '2021-06-04 22:58:50'),
(2, 5, 10, 7, 5, 'You have new Art/Work.', 0, '2021-06-11 01:31:56', '2021-06-11 01:31:56'),
(3, 5, 10, 7, 6, 'You have new Art/Work.', 0, '2021-06-11 01:32:35', '2021-06-11 01:32:35'),
(4, 19, 20, 6, 7, 'You have new Art/Work.', 0, '2021-07-10 19:46:58', '2021-07-10 19:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `addmeetupsnotifications`
--

CREATE TABLE `addmeetupsnotifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meetup_id` int(10) UNSIGNED NOT NULL,
  `meetup_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'You have new Meetup..',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = read, 1 = unread',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addmeetupsnotifications`
--

INSERT INTO `addmeetupsnotifications` (`id`, `meetup_id`, `meetup_title`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Aquarium', 'You have new Meetup..', 0, '2021-06-04 20:21:52', '2021-06-04 20:21:52');

-- --------------------------------------------------------

--
-- Table structure for table `admin_meetup_comment_notification`
--

CREATE TABLE `admin_meetup_comment_notification` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meetup_id` int(10) UNSIGNED NOT NULL,
  `comment_id` int(50) DEFAULT NULL,
  `meetup_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'You have new Comment from Admin.',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = read, 1 = unread',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `applied_requests`
--

CREATE TABLE `applied_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `request_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applied_requests`
--

INSERT INTO `applied_requests` (`id`, `teacher_id`, `request_id`, `parent_id`, `notes`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, NULL, NULL, 'accepted', '2021-05-27 09:22:43', '2021-05-27 09:24:19'),
(2, 2, 2, 1, NULL, NULL, 'accepted', '2021-05-27 09:22:51', '2021-05-27 09:23:53'),
(3, 2, 3, 1, NULL, NULL, 'cancelled', '2021-05-27 09:22:58', '2021-05-27 09:23:44'),
(4, 2, 5, 1, NULL, NULL, 'accepted', '2021-05-27 09:33:46', '2021-06-08 11:44:17'),
(5, 2, 4, 1, NULL, NULL, 'accepted', '2021-05-27 09:33:53', '2021-06-19 12:00:21'),
(6, 3, 10, 4, NULL, NULL, 'accepted', '2021-05-27 10:23:03', '2021-05-27 10:26:13'),
(7, 3, 9, 4, NULL, NULL, 'accepted', '2021-05-27 10:25:35', '2021-05-27 10:26:00'),
(8, 3, 8, 4, NULL, NULL, NULL, '2021-05-27 10:28:49', '2021-05-27 10:28:49'),
(9, 6, 13, 5, NULL, NULL, 'accepted', '2021-06-04 20:26:32', '2021-06-04 22:50:16'),
(10, 6, 12, 5, NULL, NULL, 'cancelled', '2021-06-04 20:27:58', '2021-06-04 22:50:05'),
(11, 6, 11, 5, NULL, NULL, 'accepted', '2021-06-04 22:46:53', '2021-06-04 22:49:51'),
(12, 3, 4, 1, NULL, NULL, NULL, '2021-06-08 11:29:53', '2021-06-08 11:29:53'),
(13, 9, 16, 7, NULL, NULL, 'cancelled', '2021-06-08 12:16:42', '2021-06-08 12:18:11'),
(14, 9, 15, 7, NULL, NULL, NULL, '2021-06-08 12:17:09', '2021-06-08 12:17:09'),
(15, 10, 17, 5, NULL, NULL, 'accepted', '2021-06-11 01:11:00', '2021-06-11 01:25:09'),
(16, 2, 20, 1, NULL, NULL, NULL, '2021-06-19 12:05:16', '2021-06-19 12:05:16'),
(17, 2, 19, 1, NULL, NULL, 'cancelled', '2021-06-19 12:05:38', '2021-06-19 12:08:56'),
(18, 2, 18, 1, NULL, NULL, 'accepted', '2021-06-19 12:06:04', '2021-06-19 12:07:34'),
(19, 20, 22, 19, NULL, NULL, 'accepted', '2021-07-10 18:50:01', '2021-07-10 19:43:03'),
(20, 20, 21, 19, NULL, NULL, 'accepted', '2021-07-10 19:46:04', '2021-07-10 21:07:40');

-- --------------------------------------------------------

--
-- Table structure for table `approved_reject_notifications`
--

CREATE TABLE `approved_reject_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dataType` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `approved_reject_notifications`
--

INSERT INTO `approved_reject_notifications` (`id`, `teacher_id`, `parent_id`, `message`, `dataType`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Yours request rejected', 'rejected', 1, '2021-05-27 09:23:44', '2021-05-27 09:28:27'),
(2, 2, 1, 'Yours request approved', 'accepted', 1, '2021-05-27 09:23:53', '2021-05-27 09:33:34'),
(3, 2, 1, 'Yours request approved', 'accepted', 1, '2021-05-27 09:24:19', '2021-05-27 09:33:29'),
(4, 3, 4, 'Yours request approved', 'accepted', 0, '2021-05-27 10:26:00', '2021-05-27 10:26:00'),
(5, 3, 4, 'Yours request approved', 'accepted', 1, '2021-05-27 10:26:13', '2021-06-08 11:27:59'),
(9, 2, 1, 'Yours request approved', 'accepted', 0, '2021-06-08 11:44:17', '2021-06-08 11:44:17'),
(10, 9, 7, 'Yours request rejected', 'rejected', 0, '2021-06-08 12:18:11', '2021-06-08 12:18:11'),
(11, 10, 5, 'Yours request approved', 'accepted', 1, '2021-06-11 01:25:09', '2021-06-11 01:29:40'),
(12, 2, 1, 'Yours request approved', 'accepted', 0, '2021-06-19 12:00:21', '2021-06-19 12:00:21'),
(13, 2, 1, 'Yours request approved', 'accepted', 0, '2021-06-19 12:07:34', '2021-06-19 12:07:34'),
(14, 2, 1, 'Yours request rejected', 'rejected', 0, '2021-06-19 12:08:56', '2021-06-19 12:08:56'),
(16, 20, 19, 'Yours request approved', 'accepted', 1, '2021-07-10 21:07:40', '2021-07-10 21:15:23');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meeting_id` int(10) UNSIGNED NOT NULL,
  `current_id` int(10) UNSIGNED DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin_read` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `meeting_id`, `current_id`, `admin_id`, `message`, `is_admin_read`, `created_at`, `updated_at`) VALUES
(1, 1, 6, NULL, 'I will be there!', 0, '2021-06-04 22:57:14', '2021-06-04 22:57:14'),
(2, 1, 10, NULL, 'Yayy! Cant wait! This will be so fun', 0, '2021-06-11 01:12:42', '2021-06-11 01:12:42'),
(3, 1, 19, NULL, 'Count me in!', 0, '2021-07-08 03:24:06', '2021-07-08 03:24:06');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `premium` char(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_approved` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscription_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscription_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscription_valid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscription_month` int(11) DEFAULT NULL,
  `subscription_trial` tinyint(1) DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skills` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_history` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `verificaitonCode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_brand` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_last_four` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `firstname`, `lastname`, `email`, `type`, `premium`, `password`, `phone_no`, `address`, `gender`, `latitude`, `longitude`, `admin_approved`, `subscription_status`, `subscription_type`, `subscription_valid`, `subscription_month`, `subscription_trial`, `image`, `bio`, `skills`, `work_history`, `rate`, `education`, `deleted_at`, `verificaitonCode`, `device_token`, `stripe_id`, `card_brand`, `card_last_four`, `trial_ends_at`, `created_at`, `updated_at`) VALUES
(1, 'Parent', 'Side', 'parentside@test.com', '1', '0', '$2y$10$d3JrSIkEuYTc7RJYCahlQusLoQc7Wd8mP6Xy0pAUaO1b/o4hYE.ra', '8484840', 'Test', 'Male', '33.5343927', '73.0525296', NULL, '1', NULL, '2021-07-19', NULL, 0, '1622015154_.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fT1XBBjrRwCDiRAFxpv6_q:APA91bHmeA1IYrBBi6hyVAVyi-FT4k7KHt7MKgFq2xdTXB8R-c5e7aXQMm2NfI_49VsHdZmbl4np3TrFBCpL7_L0ekoS6Piudyja48n-VuoeJMi9s0jOK6tVUAaEZ5qnAQa_3rKRGxfi', 'cus_JhKqPjihTKOX9r', NULL, NULL, '2021-05-27 11:45:59', '2021-05-26 11:45:54', '2021-06-19 14:07:12'),
(2, 'Teacher', 'Side', 'teacherside@test.com', '0', '0', '$2y$10$55Ty1s824OaQ3zYuPIGzZ./HM824hujqhHaf/9Guk8xEDaZRdKdFC', '84840', 'Test', 'Male', '33.5343927', '73.0525296', '1', '1', NULL, '2021-07-19', NULL, 0, '1622015354_.jpg', 'Introduction', '[{\"id\":\"1\",\"name\":\"First Aid Certification\"},{\"id\":\"4\",\"name\":\"Early Childhood Education\"}]', '2 years', '50', 'BSCS', NULL, NULL, 'fT1XBBjrRwCDiRAFxpv6_q:APA91bHmeA1IYrBBi6hyVAVyi-FT4k7KHt7MKgFq2xdTXB8R-c5e7aXQMm2NfI_49VsHdZmbl4np3TrFBCpL7_L0ekoS6Piudyja48n-VuoeJMi9s0jOK6tVUAaEZ5qnAQa_3rKRGxfi', 'cus_JhLXWLXZQMLahL', NULL, NULL, '2021-05-27 11:50:29', '2021-05-26 11:49:14', '2021-06-19 14:25:45'),
(3, 'Ramzi', 'Teacher', 'ramziteacher@test.com', '0', '0', '$2y$10$sXD5r98qdDwC3WudV29/l.ODxFRzv1ITEwlUwRUR9HnWUME8GPWzm', '848404', 'Test', 'Male', '33.5344607', '73.052593', '1', '1', NULL, '2021-07-08', NULL, 0, '1622096292_.jpg', 'Introduction', '[{\"id\":\"1\",\"name\":\"First Aid Certification\"},{\"id\":\"3\",\"name\":\"Certified Teacher\"},{\"id\":\"4\",\"name\":\"Early Childhood Education\"}]', '2 years', '30', 'BSCS', NULL, NULL, 'fT1XBBjrRwCDiRAFxpv6_q:APA91bHmeA1IYrBBi6hyVAVyi-FT4k7KHt7MKgFq2xdTXB8R-c5e7aXQMm2NfI_49VsHdZmbl4np3TrFBCpL7_L0ekoS6Piudyja48n-VuoeJMi9s0jOK6tVUAaEZ5qnAQa_3rKRGxfi', 'cus_JdFxe6i8N2ai3s', NULL, NULL, '2021-05-28 10:18:41', '2021-05-27 10:18:12', '2021-06-08 11:34:19'),
(4, 'Hamza', 'Parent', 'hamzaparent@test.com', '1', '0', '$2y$10$vshhCjwEJvkTZOhskRDEFe6eR0pkPIvNoVSQBWe4REp/hwkPBw8Yu', '84845484', 'Test', 'Male', '33.5344609', '73.0525903', NULL, NULL, NULL, NULL, NULL, 1, '1622096406_.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ci7zHrTuQxSyV-cQHXhkyj:APA91bHULcmoBAv18nn6jBaQGh78DjCYLEbNgG8vu-xuy8zQasylDEOD2WtAjo6hXLcN8KZE5autQHXVip6L9u9bk8y63uaDp6mMaEQ_KZ89YTEbTHn2GC1cZmQAnC5qfqve0we_jTuC', NULL, NULL, NULL, '2021-05-28 10:20:11', '2021-05-27 10:20:06', '2021-05-27 10:20:11'),
(5, 'Parent', 'Eight', 'parent8@gmail.com', '1', '0', '$2y$10$yq3ZfP5sESDoDSOrMUTRCuRJA9ZRz.VqTtkl2p0Gsohf2CJuV0u4O', '6542135649', '123 sesame st', 'Male', '33.7652904', '-84.406972', NULL, NULL, NULL, NULL, NULL, 1, '1622819803_.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'edEakvm3TjujidV4bBpndR:APA91bFBdRTm7JB_VDMmQSkHU5YMx4xR3POMfuLzRuxexqKcQgzhT8FngQvCVwYR864DokyT02fyMUIuNf3Rl2j8EzlqrwzOk8LyhOvSd_iC02J46tsu-bdwR14eQtpDSZdeKGUOyLuh', NULL, NULL, NULL, '2021-06-05 19:18:00', '2021-06-04 19:16:43', '2021-06-11 01:43:06'),
(6, 'Teacher', 'Eight', 'teacher8@gmail.com', '0', '0', '$2y$10$CcprUwK77L54ah6Krs449uHWCpeS0dBgt4syYbYREvbYG2k5FIYYu', '6545863214', '1 sesame st', 'Female', '33.7652904', '-84.406972', '1', NULL, NULL, NULL, NULL, 1, '1622821582_.jpg', 'I have 10 plus years of childcare experience', '[{\"id\":\"1\",\"name\":\"First Aid Certification\"},{\"id\":\"2\",\"name\":\"CPR Certification\"},{\"id\":\"4\",\"name\":\"Early Childhood Education\"}]', '10 plus years', '25', 'Masters degree', NULL, NULL, 'dMo1tv47R-S_KggiZr2bdO:APA91bH9SA4-SJ904F-0ib3P6qLfaj24hHCKsm6QMd9NZ6j0GFfnKbDNuxUBtCNWHA_T0V9eyZvgI676y7DbDUaLhQDxXTCqjvEPW41gLb0ZKQ3NpJEKFIWsmfF87-H13Y0xV65lLQOk', NULL, NULL, NULL, '2021-06-05 19:46:26', '2021-06-04 19:46:22', '2021-06-04 23:03:34'),
(7, 'New', 'Parent', 'newparent@test.com', '1', '0', '$2y$10$ISfypFKf/tz25Zvd5fb94em5r67durk6sf2Q8fSq50OBzP0u2t7Cy', '6464345', 'Test', 'Male', '33.5395234', '73.0527071', NULL, NULL, NULL, NULL, NULL, 1, '1623139696_.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fnw-NSK6QZeACRayEFuusf:APA91bFRjTtdUzN-OPHEH9LOLcgd3At96PrfkL_FJCTjoTz6OBcnHycG03I6D-rkg1XPvTRjUKVdO31c07vCx6eIzZBKmaf4lbljvL-GDoxfXEZg4N8elCU7eVTQBWuigm_oLNIJyCou', NULL, NULL, NULL, '2021-06-09 12:08:25', '2021-06-08 12:08:16', '2021-06-08 12:18:00'),
(9, 'New', 'Teacher', 'newteacher@test.com', '0', '0', '$2y$10$UhIAaUR2.ZmC7c0amLTj3Ow7p0jnQzXe7tgRJtG/AawjT5AuWiFkK', '64345181', 'Test', 'Male', '33.5395234', '73.0527071', '1', NULL, NULL, NULL, NULL, 1, '1623140093_.jpg', 'Introduction', '[{\"id\":\"1\",\"name\":\"First Aid Certification\"},{\"id\":\"2\",\"name\":\"CPR Certification\"},{\"id\":\"4\",\"name\":\"Early Childhood Education\"}]', '2 Years', '68', 'Education', NULL, NULL, 'fnw-NSK6QZeACRayEFuusf:APA91bFRjTtdUzN-OPHEH9LOLcgd3At96PrfkL_FJCTjoTz6OBcnHycG03I6D-rkg1XPvTRjUKVdO31c07vCx6eIzZBKmaf4lbljvL-GDoxfXEZg4N8elCU7eVTQBWuigm_oLNIJyCou', NULL, NULL, NULL, '2021-06-09 12:14:58', '2021-06-08 12:14:53', '2021-06-08 12:15:12'),
(10, 'Teacher', 'Nine', 'teach9@gmail.com', '0', '0', '$2y$10$m5ibc/Folcf0qaHJLBK2iOMVN.PGr/tYBlehAJNM0eFuzPD2q3Wmu', '6458563197', '123 love lane', 'Female', '33.7652768', '-84.4069827', '1', NULL, NULL, NULL, NULL, 1, '1623358401_.jpg', 'Hello!', '[{\"id\":\"1\",\"name\":\"First Aid Certification\"},{\"id\":\"3\",\"name\":\"Certified Teacher\"}]', '10 years', '25', 'Master', NULL, NULL, 'edEakvm3TjujidV4bBpndR:APA91bFBdRTm7JB_VDMmQSkHU5YMx4xR3POMfuLzRuxexqKcQgzhT8FngQvCVwYR864DokyT02fyMUIuNf3Rl2j8EzlqrwzOk8LyhOvSd_iC02J46tsu-bdwR14eQtpDSZdeKGUOyLuh', NULL, NULL, NULL, '2021-06-12 00:55:24', '2021-06-11 00:53:21', '2021-06-11 01:49:47'),
(11, 'Arish', 'Tester', 'bholarecord@test.com', '1', '0', '$2y$10$n7.SRocD.LiKbSyAQibnquTH0Ym5iZk83SUR1d1xDO.OcHF3N/jgu', '9431810', 'Test', 'Male', '33.5344285', '73.0526341', NULL, NULL, NULL, NULL, NULL, 1, '1624528500_.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'e-vxJta0S3uEqNQAkUIR9X:APA91bGu4DLbqZbCOj_0CmbwnWG3GiFgmqAuZmqA4LB37q6Po5gN_mOzAn1OSC8bz74yPAiXUiIrGdPhJQGUPIBDrM5eXt640Jvi2F6IR71xYMJlco9JZfmlSZgWFcUYPvD_g488pLKE', NULL, NULL, NULL, '2021-06-25 13:55:09', '2021-06-24 13:55:00', '2021-06-24 13:55:09'),
(12, 'Ramzi', 'Test', 'ramzaitester@test.com', '1', '0', '$2y$10$4uhhjdYkU3WJ0Ys87op1EO7m0n.B4Cxr8BdTY63Db9YiDcGYn4Vby', '643481', 'Test', 'Male', '33.5344285', '73.0526341', NULL, NULL, NULL, NULL, NULL, 1, '1624528632_.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'e-vxJta0S3uEqNQAkUIR9X:APA91bGu4DLbqZbCOj_0CmbwnWG3GiFgmqAuZmqA4LB37q6Po5gN_mOzAn1OSC8bz74yPAiXUiIrGdPhJQGUPIBDrM5eXt640Jvi2F6IR71xYMJlco9JZfmlSZgWFcUYPvD_g488pLKE', NULL, NULL, NULL, '2021-06-25 13:57:18', '2021-06-24 13:57:13', '2021-06-24 13:57:18'),
(13, 'Test', 'User', 'testuser@test.com', '1', '0', '$2y$10$pPMaaO0xMXKU/6beAwIzNOhE.0epbrXE6favO9ijJQkvWo6MyJW4G', '646418', 'Test', 'Male', '33.5344285', '73.0526341', NULL, NULL, NULL, NULL, NULL, 1, '1624528852_.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'e6_-RF9iTvWbU967pfcOVx:APA91bFhwocp1K4EUBtxYeAyAON58prDfmwUuVQwy5LaynVobyY9gvJNaTur9J519RCA2mOwBTgTjIv7aKNfADedjLAY2P0Gz6_t1K3UyzgE9IbjrkqyJy8j91-p_OXXA2mXNYh75lkc', NULL, NULL, NULL, '2021-06-25 14:00:57', '2021-06-24 14:00:52', '2021-06-24 14:00:57'),
(14, 'Test', 'User', 'testuser@testing.com', '1', '0', '$2y$10$Y41g/TVJuO4WLB/4Lwj8bummotgOXG9cuQfTnH43YT8PdMoe0ybvq', '646418916151', 'Test', 'Male', '33.5344285', '73.0526341', NULL, NULL, NULL, NULL, NULL, 1, '1624529027_.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'e6_-RF9iTvWbU967pfcOVx:APA91bFhwocp1K4EUBtxYeAyAON58prDfmwUuVQwy5LaynVobyY9gvJNaTur9J519RCA2mOwBTgTjIv7aKNfADedjLAY2P0Gz6_t1K3UyzgE9IbjrkqyJy8j91-p_OXXA2mXNYh75lkc', NULL, NULL, NULL, '2021-06-25 14:03:51', '2021-06-24 14:03:47', '2021-06-24 14:03:51'),
(15, 'Testing', 'Testing', 'testuser1234@test.com', '1', '0', '$2y$10$99WNO9iCST/fa11dCQPBXe6S5gfpc/45GiBir2L1lNYDHcfsV2QqC', '94645484948404', 'Test', 'Male', '33.5344285', '73.0526341', NULL, NULL, NULL, NULL, NULL, 1, '1624529126_.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'e6_-RF9iTvWbU967pfcOVx:APA91bFhwocp1K4EUBtxYeAyAON58prDfmwUuVQwy5LaynVobyY9gvJNaTur9J519RCA2mOwBTgTjIv7aKNfADedjLAY2P0Gz6_t1K3UyzgE9IbjrkqyJy8j91-p_OXXA2mXNYh75lkc', NULL, NULL, NULL, '2021-06-25 14:05:33', '2021-06-24 14:05:26', '2021-06-24 14:05:33'),
(16, 'Test', 'Test', 'testuser012@test.com', '1', '0', '$2y$10$bFFaVCwBzVusvw0uNiiYH.x2Rw1Iv2jtchpZ3n7fsggPKW2QUhP76', '945185454', 'Gsg', 'Male', '33.5344285', '73.0526341', NULL, NULL, NULL, NULL, NULL, 1, '1624529319_.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'e6_-RF9iTvWbU967pfcOVx:APA91bFhwocp1K4EUBtxYeAyAON58prDfmwUuVQwy5LaynVobyY9gvJNaTur9J519RCA2mOwBTgTjIv7aKNfADedjLAY2P0Gz6_t1K3UyzgE9IbjrkqyJy8j91-p_OXXA2mXNYh75lkc', NULL, NULL, NULL, '2021-06-25 14:08:56', '2021-06-24 14:08:39', '2021-06-24 14:08:56'),
(17, 'Hdg', 'Cgg', 'test@test.com', '1', '0', '$2y$10$nXxz2.KjikJy4lRrfwyEBODCRNpDVl0SMdBdr.V9BQ.pCj/Zkgxz6', '0963', 'Fgh', 'Male', '33.5339732', '73.0576834', NULL, NULL, NULL, NULL, NULL, 1, '1624531859_.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eD78Bcs8SkObjJm4w-YM-2:APA91bH-O4tUMD07aW_4-nAav1LtBBed6Qi4Qg5ZUzci6BI3Abg8_u3RKRnMPoWSMuX2JjXgs3108Dx1BniPKwj7a1DAJvlfvUThyjVOIFsft8-LrelmwYPZUTxjI-hf9Lz9FUQIBIlr', NULL, NULL, NULL, '2021-06-25 14:51:05', '2021-06-24 14:51:00', '2021-06-24 14:51:05'),
(18, 'Parent', 'Ten', 'parent10@gmail.com', '1', '0', '$2y$10$tCW7xpP.9/KxdlFO1I2QnOBmxRcF.jLCalbBhrKweYaTl1SHL2Aw2', '6852365478', '113 sesame steet', 'Male', '40.9079988', '-72.6590846', NULL, NULL, NULL, NULL, NULL, 1, '1625103992_.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cIretP9FTXuY9MdrVYKVQJ:APA91bHWDcthpK0kvYCpILLyNQ_Aae-yPI5Hg7NgD_0o6MveIXP4hpv9p8hJImpxI8ffqYL2B-ly712RojuPXgoq2eFyOhXDkoXXIsDNXuWPLCOLGzzGvFXuUdobe6hnXeqzmQD13wzO', NULL, NULL, NULL, '2021-07-02 05:47:41', '2021-07-01 05:46:32', '2021-07-01 05:47:41'),
(19, 'Parent', 'Eleven', 'parent11@gmail.com', '1', '0', '$2y$10$N6ACCS.jymGog60HhPYS5efMMNeq7TAxPROG4M5DmN2SvgV/bDvE2', '6785623214', '123 love joy lane', 'Male', '40.6423158', '-73.7834209', NULL, NULL, NULL, NULL, NULL, 1, '1625699783_.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cihxcUsSRx-pYxD6AW0PHU:APA91bFSNTjzz9LRRylN0TNfuS3gFaBIA9F_NUVllFpYeGBA2WCi8DlC0V1nlCRdcXgqHPVliHj65lPX2g02LdyRRVryCiWDALGGWyKfxFOtf7YOBP0meFLmFjilO36kI1m4XIhQd1aY', NULL, NULL, NULL, '2021-07-09 03:16:43', '2021-07-08 03:16:23', '2021-07-10 21:18:37'),
(20, 'Teacher', 'Eleven', 'teach11@gmail.com', '0', '0', '$2y$10$hUDL18hbOmHJ68P0skGvgebiw4XOW6ftgvdbkw8Q9zsWe6GaCGFi2', '6852365478', '137 joy lane', 'Female', '33.7652583', '-84.4069832', '1', '1', NULL, '2021-08-15', NULL, 0, '1625888500_.jpg', 'Hello!', '[{\"id\":\"1\",\"name\":\"First Aid Certification\"},{\"id\":\"3\",\"name\":\"Certified Teacher\"},{\"id\":\"4\",\"name\":\"Early Childhood Education\"}]', '10 years experience', '25', 'Master', NULL, NULL, 'cihxcUsSRx-pYxD6AW0PHU:APA91bFSNTjzz9LRRylN0TNfuS3gFaBIA9F_NUVllFpYeGBA2WCi8DlC0V1nlCRdcXgqHPVliHj65lPX2g02LdyRRVryCiWDALGGWyKfxFOtf7YOBP0meFLmFjilO36kI1m4XIhQd1aY', 'cus_JrDN3fIuaaSFZo', NULL, NULL, '2021-07-11 07:41:49', '2021-07-10 07:41:40', '2021-07-15 17:50:15');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lessonartworks`
--

CREATE TABLE `lessonartworks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parant_id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `parant_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessonartworks`
--

INSERT INTO `lessonartworks` (`id`, `parant_id`, `teacher_id`, `lesson_id`, `parant_title`, `title`, `image`, `remarks`, `status`, `created_at`, `updated_at`) VALUES
(1, 47, 46, 4, 'Bhola Parent05', 'Art and Crafts', '1611034215_.jpg', 'teacher about Bhola', 1, '2021-01-19 10:30:15', '2021-01-19 10:30:15'),
(2, 47, 46, 4, 'Bhola Parent05', 'Art and Crafts', '1611034678_.jpg', 'tea guguvuv vuvjbjbjbibibibjbibbjjnjbibjnjbj vjjvjvjvjvjbjbib', 1, '2021-01-19 10:37:58', '2021-01-19 10:37:58'),
(3, 65, 66, 6, 'Parent 1 One', 'Art and Crafts', '1616981002_.jpg', 'very good!', 1, '2021-03-29 05:23:22', '2021-03-29 05:23:22'),
(4, 5, 6, 6, 'Parent Eight', 'Art and Crafts', '1622833130_.jpg', 'Great Job!', 1, '2021-06-04 22:58:50', '2021-06-04 22:58:50'),
(5, 5, 10, 7, 'Parent Eight', 'Art and Crafts', '1623360716_.jpg', 'wisdom did a great job!', 1, '2021-06-11 01:31:56', '2021-06-11 01:31:56'),
(6, 5, 10, 7, 'Parent Eight', 'Art and Crafts', '1623360755_.jpg', 'great work!', 1, '2021-06-11 01:32:35', '2021-06-11 01:32:35'),
(7, 19, 20, 6, 'Parent Eleven', 'Art and Crafts', '1625932018_.jpg', 'good job', 1, '2021-07-10 19:46:58', '2021-07-10 19:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purpose` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lesson_month` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplies_1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplies_2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0 = active, 1 = inactive',
  `teacher_show` int(11) NOT NULL DEFAULT 1 COMMENT '0 = No, 1 = Yes',
  `parant_show` int(11) NOT NULL DEFAULT 1 COMMENT '0 = No, 1 = Yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `category_id`, `title`, `image`, `purpose`, `lesson_month`, `supplies_1`, `supplies_2`, `status`, `teacher_show`, `parant_show`, `created_at`, `updated_at`) VALUES
(2, 5, 'The wooden Camel', '1599465773_.jpeg', 'Migrations are a type of version control for your database. They allow a team to modify the database schema and stay up to date on the current schema state.', NULL, 'Some migration operations are destructive, meaning they may cause you to lose data. In order to protect you from running these commands against your production database, you will be prompted for confirmation before these commands are executed. To force the commands to run without a prompt,', 'Some migration operations are destructive, meaning they may cause you to lose data. In order to protect you from running these commands against your production database, you will be prompted for confirmation before these commands are executed. To force the commands to run without a prompt,', 1, 1, 1, '2020-09-07 03:02:53', '2020-09-28 15:12:05'),
(3, 6, 'test2', '1601288889_.jpeg', 'test3', NULL, 'test', 'test', 1, 1, 1, '2020-09-28 14:28:09', '2020-09-28 14:44:18'),
(4, 7, 'test3', '1601293560_.jpeg', 'teste3t', NULL, 'test3', 'tsdsdts', 1, 1, 1, '2020-09-28 15:46:00', '2020-09-28 15:46:00'),
(5, 8, 'test3', '1601293586_.jpeg', 'tettdt', NULL, 'hdhssj', 'ushanas', 1, 1, 1, '2020-09-28 15:46:26', '2020-09-28 15:46:26'),
(6, 6, 'Noah\'s Ark', '1611174369_.jpg', 'In this lesson, the children learn about Noah and the ark he built according to God\'s instructions. The children also learn that it is very important to obey God in all things.', '04', 'Noah Builds the Ark (Coloring Page) \r\nMiniature plastic animals or hand puppets \r\nFaces of Mr. and Mrs. Noah', 'PRAYER & WORSHIP TIME (5-10 minutes)\r\n\r\nBIBLE VERSE (5 minutes)\r\n\"Noah walked with God.\" Genesis 6:9b NKJV\r\nExplain to the children that Noah loved and obeyed God even when no one else would\r\n\r\nBIBLE STORY (15 minutes)\r\nGather the children around you for story time. After the introduction, read the Children\'s version of the story. As an option, you can read the story directly from the Bible.\r\n\r\nIntroduction:\r\nListen carefully as I read a story to you, about Noah, his family, and the Ark. When I\'m done, I will ask you some very interesting questions.     \r\nDiscussion Questions:\r\n1. In our story today who was following God? (Noah.)\r\n2. What did God tell Noah to build? (An Ark.)\r\n3. What is an Ark? (A boat that was very big.)\r\n4. Why did God tell Noah to build the Ark? (God was going to cause a flood of water to cover the earth.)\r\n5. Did Noah do what God asked? (Yes.)\r\n6. Why do you think it is important to obey God? (Allow for discussion.)\r\n\r\nART ACTIVITY\r\nAllow the child or children to color Noah Builds the Ark coloring page. Take a picture of there art work and upload below.', 1, 1, 1, '2021-01-21 01:26:09', '2021-06-11 00:13:14'),
(7, 8, 'Fruits of the Spirit', '1623355754_.jpg', 'Devotion\r\n“Each tree is recognized by its own fruit” (Luke 6:44).\r\n\r\nFortunately, we don’t have to guess what the fruit of a Christian’s life is to be, since Galatians 5:22-25 tells us. When God and others look at our trees—our lives—they should see nothing but “love, joy, peace, forbearance, kindness, goodness, faithfulness, gentleness and self-control.”\r\n\r\nModel for your students what it looks like to live by the Spirit, showing and sharing with them the fruit of your life.', '05', 'Bibles\r\npaper, crayons, blindfolds\r\nreusable adhesive, masking tape\r\nself-stick notes, pencils', 'SAY: I know someone who is the right guide. He helps us to turn and keep going in the right direction. I’m talking about the Holy Spirit.\r\n\r\nAsk students to turn in their Bibles to Acts 2:38, 39. Have volunteers read those verses aloud. Then have kids turn to John 14:15-18, and have volunteers read those verses aloud.\r\n\r\nASK:\r\n\r\nWho is promised the gift of the Holy Spirit? (those who repent of their sins and are baptized)\r\nWhat do these verses say about the Holy Spirit? (God sends the Holy Spirit. He’s the Spirit of truth. He’s a counselor. He will be with us forever. We can’t see Him. He lives with us and in us.)\r\nSAY: When we live by the Spirit, we live a certain way. Let’s find out about that.', 1, 1, 1, '2021-06-11 00:09:14', '2021-06-11 00:12:07');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_cetogires`
--

CREATE TABLE `lesson_cetogires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purpose` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lesson_cetogires`
--

INSERT INTO `lesson_cetogires` (`id`, `title`, `purpose`, `description`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Toddlers', 'Toddlers for small children but not for adult', 'The description will uploads soon but less', 1, '2020-09-07 06:31:40', '2020-09-07 06:50:32'),
(6, 'Pre-K', 'The  Purpose of Pre-K', 'The Description of Pre K', 1, '2020-09-07 06:57:00', '2020-09-07 06:57:00'),
(7, 'Infant', 'test3', 'test3', 1, '2020-09-28 15:45:09', '2020-09-28 15:45:09'),
(8, 'School Age', 'test3', 'test3', 1, '2020-09-28 15:45:37', '2020-09-28 15:45:37');

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meeting_date` date NOT NULL,
  `meeting_time` time NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meetings`
--

INSERT INTO `meetings` (`id`, `title`, `meeting_date`, `meeting_time`, `image`, `description`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Aquarium', '2021-06-19', '14:30:00', '1622823712_.jpg', 'Lets meet at the Aquarium!', '123 Luckie Street', '2021-06-04 20:21:52', '2021-06-04 20:21:52');

-- --------------------------------------------------------

--
-- Table structure for table `meeting_notifications`
--

CREATE TABLE `meeting_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meeting_id` int(11) DEFAULT NULL,
  `commenter_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dataType` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meeting_notifications`
--

INSERT INTO `meeting_notifications` (`id`, `meeting_id`, `commenter_id`, `customer_id`, `message`, `dataType`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 10, 6, 'Yayy! Cant wait! This will be so fun', 'meeting', 0, '2021-06-11 01:12:42', '2021-06-11 01:12:42'),
(2, 1, 19, 6, 'Count me in!', 'meeting', 0, '2021-07-08 03:24:06', '2021-07-08 03:24:06'),
(3, 1, 19, 10, 'Count me in!', 'meeting', 0, '2021-07-08 03:24:06', '2021-07-08 03:24:06'),
(4, 1, 19, 1, 'Count me in!', 'meeting', 0, '2021-07-08 03:24:06', '2021-07-08 03:24:06');

-- --------------------------------------------------------

--
-- Table structure for table `meeting_users`
--

CREATE TABLE `meeting_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meeting_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meeting_users`
--

INSERT INTO `meeting_users` (`id`, `meeting_id`, `customer_id`, `created_at`, `updated_at`) VALUES
(1, 1, 6, '2021-06-04 22:56:59', '2021-06-04 22:56:59'),
(2, 1, 10, '2021-06-11 01:12:15', '2021-06-11 01:12:15'),
(3, 1, 1, '2021-06-19 09:51:24', '2021-06-19 09:51:24'),
(4, 1, 19, '2021-07-08 03:23:51', '2021-07-08 03:23:51');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2020_07_07_124349_create_customers_table', 1),
(8, '2014_10_12_000000_create_users_table', 2),
(9, '2014_10_12_100000_create_password_resets_table', 2),
(10, '2019_08_19_000000_create_failed_jobs_table', 2),
(11, '2020_07_09_105431_create_meetups_table', 2),
(12, '2020_07_11_071356_create_user_requests_table', 2),
(13, '2020_08_07_111615_create_customers_table', 2),
(14, '2020_08_08_095530_create_user_requests_table', 3),
(15, '2020_08_08_101515_create_user_requests_table', 4),
(16, '2020_08_10_100241_create_meetings_table', 5),
(17, '2020_08_11_042859_create_meeting_users_table', 6),
(18, '2020_08_11_070330_create_comments_table', 7),
(19, '2020_08_20_112411_create_request_notifications_table', 8),
(20, '2020_08_21_063750_create_applied_requests_table', 9),
(21, '2020_08_21_095016_create_approved_reject_notifications_table', 10),
(22, '2020_08_24_124710_create_ratings_table', 11),
(23, '2020_08_24_131510_create_ratings_table', 12),
(24, '2020_09_07_073124_admin_lessons_table', 13),
(25, '2020_09_07_084805_lesson_categories_table', 14),
(26, '2020_09_08_061815_lessonartworks', 15),
(28, '2020_09_09_053119_add_premium_to_customers', 16),
(29, '2020_09_09_060616_addartwork_notifications', 17),
(30, '2020_09_09_082147_addmeetupsnotifications', 18),
(31, '2020_09_09_111351_admin_meetup_comment_notification', 19);

-- --------------------------------------------------------

--
-- Table structure for table `parent_childrens`
--

CREATE TABLE `parent_childrens` (
  `id` int(11) NOT NULL,
  `parent_id` bigint(191) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `gender` varchar(191) DEFAULT NULL,
  `birthday` varchar(191) DEFAULT NULL,
  `allergy` varchar(225) DEFAULT NULL,
  `exception` varchar(225) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent_childrens`
--

INSERT INTO `parent_childrens` (`id`, `parent_id`, `name`, `gender`, `birthday`, `allergy`, `exception`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hamid', 'male', '2021-05-26T11:31:00.000Z', '[{\"gluten\":true,\"eggs\":false,\"dairy\":false,\"peanuts\":true,\"shellfish\":true,\"antibiotics\":false,\"otherAllergies\":false}]', '[{\"ADHD\":true,\"autism\":false,\"downs\":false,\"deaf\":false,\"cerebral\":true,\"blind\":true,\"otherExceptionalities\":false}]', 'Note about kids', '2021-05-26 15:34:43', '2021-05-26 15:34:43'),
(2, 5, 'Wisdom', 'male', '2020-06-05T15:13:00.000Z', '[{\"gluten\":false,\"eggs\":false,\"dairy\":true,\"peanuts\":false,\"shellfish\":false,\"antibiotics\":false,\"otherAllergies\":false}]', '[{\"ADHD\":false,\"autism\":false,\"downs\":false,\"deaf\":false,\"cerebral\":false,\"blind\":false,\"otherExceptionalities\":false}]', NULL, '2021-06-04 19:24:41', '2021-06-04 19:24:41'),
(3, 19, 'Love', 'female', '2020-07-07T23:10:00.000Z', '[{\"gluten\":false,\"eggs\":false,\"dairy\":true,\"peanuts\":false,\"shellfish\":false,\"antibiotics\":false,\"otherAllergies\":false}]', '[{\"ADHD\":false,\"autism\":false,\"downs\":false,\"deaf\":false,\"cerebral\":false,\"blind\":false,\"otherExceptionalities\":false}]', 'Beautiful', '2021-07-08 03:18:22', '2021-07-08 03:18:22');

-- --------------------------------------------------------

--
-- Table structure for table `parent_child_requests`
--

CREATE TABLE `parent_child_requests` (
  `id` int(11) NOT NULL,
  `parent_id` int(191) DEFAULT NULL,
  `child_id` int(191) DEFAULT NULL,
  `request_id` int(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent_child_requests`
--

INSERT INTO `parent_child_requests` (`id`, `parent_id`, `child_id`, `request_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2021-05-27 09:20:56', '2021-05-27 09:20:56'),
(2, 1, 1, 5, '2021-05-27 09:22:12', '2021-05-27 09:22:12'),
(3, 5, 2, 11, '2021-06-04 19:35:28', '2021-06-04 19:35:28'),
(4, 5, 2, 12, '2021-06-04 19:41:37', '2021-06-04 19:41:37'),
(5, 5, 2, 13, '2021-06-04 19:42:27', '2021-06-04 19:42:27'),
(6, 5, 2, 17, '2021-06-10 23:40:47', '2021-06-10 23:40:47'),
(7, 19, 3, 21, '2021-07-08 03:22:22', '2021-07-08 03:22:22'),
(8, 19, 3, 22, '2021-07-08 03:23:31', '2021-07-08 03:23:31'),
(9, 19, 3, 23, '2021-07-10 21:22:46', '2021-07-10 21:22:46');

-- --------------------------------------------------------

--
-- Table structure for table `parent_notifications`
--

CREATE TABLE `parent_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `dataType` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parent_notifications`
--

INSERT INTO `parent_notifications` (`id`, `teacher_id`, `parent_id`, `request_id`, `dataType`, `status`, `created_at`, `updated_at`) VALUES
(4, 2, 1, 5, 'ApplyRequest', 0, '2021-05-27 09:33:46', '2021-05-27 09:33:46'),
(5, 2, 1, 4, 'ApplyRequest', 0, '2021-05-27 09:33:53', '2021-05-27 09:33:53'),
(6, 3, 4, 10, 'ApplyRequest', 0, '2021-05-27 10:23:03', '2021-05-27 10:23:03'),
(7, 3, 4, 9, 'ApplyRequest', 1, '2021-05-27 10:25:35', '2021-05-27 10:25:53'),
(8, 3, 4, 8, 'ApplyRequest', 0, '2021-05-27 10:28:49', '2021-05-27 10:28:49'),
(12, 3, 1, 4, 'ApplyRequest', 1, '2021-06-08 11:29:53', '2021-06-08 11:36:59'),
(13, 9, 7, 16, 'ApplyRequest', 0, '2021-06-08 12:16:42', '2021-06-08 12:16:42'),
(14, 9, 7, 15, 'ApplyRequest', 0, '2021-06-08 12:17:09', '2021-06-08 12:17:09'),
(15, 10, 5, 17, 'ApplyRequest', 1, '2021-06-11 01:11:00', '2021-06-11 01:46:10'),
(16, 2, 1, 20, 'ApplyRequest', 0, '2021-06-19 12:05:16', '2021-06-19 12:05:16'),
(17, 2, 1, 19, 'ApplyRequest', 0, '2021-06-19 12:05:38', '2021-06-19 12:05:38'),
(18, 2, 1, 18, 'ApplyRequest', 0, '2021-06-19 12:06:04', '2021-06-19 12:06:04'),
(19, 20, 19, 22, 'ApplyRequest', 1, '2021-07-10 18:50:01', '2021-07-10 19:42:33'),
(20, 20, 19, 21, 'ApplyRequest', 1, '2021-07-10 19:46:04', '2021-07-10 21:07:24');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(10) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`, `updated_at`) VALUES
(1, 'teacher8@gmail.com', '225059', '2021-06-11 00:17:09', '2021-06-11 00:17:09'),
(2, 'parentside@test.com', '783642', '2021-06-19 08:53:33', '2021-06-19 09:38:36');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `s_payment_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valid_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscription_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscription_month` int(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `request_id` int(11) DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL,
  `stars` bigint(20) NOT NULL DEFAULT 0,
  `reviews` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`id`, `teacher_id`, `request_id`, `parent_id`, `stars`, `reviews`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 5, 'Tvuvtctb ubjbt vyvub', '2021-05-27 09:28:16', '2021-05-27 09:28:16'),
(2, 3, 9, 4, 5, 'Complete request from teacher side', '2021-05-27 10:27:28', '2021-05-27 10:27:28'),
(3, 6, 13, 5, 5, 'Parent 8 and child were a pleasure to serve!', '2021-06-04 23:05:29', '2021-06-04 23:05:29'),
(4, 10, 17, 5, 5, 'Pleasure working with you!', '2021-06-11 01:50:49', '2021-06-11 01:50:49'),
(5, 20, 21, 19, 5, 'Lovely family to work with!', '2021-07-10 21:14:33', '2021-07-10 21:14:33'),
(6, 20, 22, 19, 5, 'Always a pleasure to work with', '2021-07-10 21:15:08', '2021-07-10 21:15:08');

-- --------------------------------------------------------

--
-- Table structure for table `rate_notifications`
--

CREATE TABLE `rate_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL,
  `request_id` bigint(20) UNSIGNED NOT NULL,
  `dataType` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `viewer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rate_notifications`
--

INSERT INTO `rate_notifications` (`id`, `teacher_id`, `parent_id`, `request_id`, `dataType`, `status`, `viewer_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 'Rated', 1, 2, '2021-05-27 09:24:53', '2021-05-27 09:28:03'),
(2, 2, 1, 1, 'Rated', 0, 1, '2021-05-27 09:28:16', '2021-05-27 09:28:16'),
(3, 3, 4, 9, 'Rated', 1, 3, '2021-05-27 10:26:41', '2021-05-27 10:27:41'),
(4, 3, 4, 9, 'Rated', 1, 4, '2021-05-27 10:27:28', '2021-05-27 10:27:37'),
(5, 6, 5, 13, 'Rated', 1, 6, '2021-06-04 23:02:38', '2021-06-04 23:03:43'),
(7, 10, 5, 17, 'Rated', 1, 10, '2021-06-11 01:47:39', '2021-06-11 01:49:59'),
(8, 10, 5, 17, 'Rated', 0, 5, '2021-06-11 01:50:49', '2021-06-11 01:50:49'),
(9, 2, 1, 18, 'Rated', 0, 2, '2021-06-19 12:08:01', '2021-06-19 12:08:01'),
(10, 20, 19, 22, 'Rated', 1, 20, '2021-07-10 21:10:14', '2021-07-10 21:14:37'),
(11, 20, 19, 21, 'Rated', 1, 20, '2021-07-10 21:10:56', '2021-07-10 21:13:51'),
(12, 20, 19, 21, 'Rated', 1, 19, '2021-07-10 21:14:34', '2021-07-10 21:18:42'),
(13, 20, 19, 22, 'Rated', 1, 19, '2021-07-10 21:15:08', '2021-07-10 21:18:52');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `request_id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `stars` int(11) NOT NULL,
  `reviews` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `customer_id`, `request_id`, `teacher_id`, `stars`, `reviews`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 2, 4, 'Gg hbjnko', '2021-05-27 09:04:13', '2021-05-27 09:04:13'),
(2, 1, 2, 2, 4, 'Yvyvububvubu', '2021-05-27 09:04:26', '2021-05-27 09:04:26'),
(3, 1, 3, 2, 4, 'Vyvubugygyb s', '2021-05-27 09:04:37', '2021-05-27 09:04:37'),
(4, 1, 1, 2, 5, 'This is feedback to teacher', '2021-05-27 09:24:53', '2021-05-27 09:24:53'),
(5, 4, 9, 3, 5, 'Complete the request', '2021-05-27 10:26:41', '2021-05-27 10:26:41'),
(6, 5, 13, 6, 5, 'Teacher 8 was wonderful! I would definitely have her come care for my child again!', '2021-06-04 23:02:38', '2021-06-04 23:02:38'),
(7, 5, 17, 10, 5, 'Great job! Thank you', '2021-06-11 01:47:39', '2021-06-11 01:47:39'),
(8, 1, 18, 2, 5, 'Bzjsgdg', '2021-06-19 12:08:01', '2021-06-19 12:08:01'),
(9, 19, 22, 20, 5, 'Great teacher!', '2021-07-10 21:10:14', '2021-07-10 21:10:14'),
(10, 19, 21, 20, 5, 'Will hire again!', '2021-07-10 21:10:55', '2021-07-10 21:10:55');

-- --------------------------------------------------------

--
-- Table structure for table `request_notifications`
--

CREATE TABLE `request_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'A new request found',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unread',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_notifications`
--

INSERT INTO `request_notifications` (`id`, `teacher_id`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'A new request found', 'unread', '2021-05-27 09:20:56', '2021-05-27 09:20:56'),
(2, 2, 'A new request found', 'unread', '2021-05-27 09:21:16', '2021-05-27 09:21:16'),
(3, 2, 'A new request found', 'unread', '2021-05-27 09:21:34', '2021-05-27 09:21:34'),
(4, 2, 'A new request found', 'unread', '2021-05-27 09:21:53', '2021-05-27 09:21:53'),
(5, 2, 'A new request found', 'unread', '2021-05-27 09:22:12', '2021-05-27 09:22:12'),
(6, 2, 'A new request found', 'unread', '2021-05-27 10:20:49', '2021-05-27 10:20:49'),
(7, 3, 'A new request found', 'unread', '2021-05-27 10:20:49', '2021-05-27 10:20:49'),
(8, 2, 'A new request found', 'unread', '2021-05-27 10:21:09', '2021-05-27 10:21:09'),
(9, 3, 'A new request found', 'unread', '2021-05-27 10:21:09', '2021-05-27 10:21:09'),
(10, 2, 'A new request found', 'unread', '2021-05-27 10:21:28', '2021-05-27 10:21:28'),
(11, 3, 'A new request found', 'unread', '2021-05-27 10:21:28', '2021-05-27 10:21:28'),
(12, 2, 'A new request found', 'unread', '2021-05-27 10:21:45', '2021-05-27 10:21:45'),
(13, 3, 'A new request found', 'unread', '2021-05-27 10:21:45', '2021-05-27 10:21:45'),
(14, 2, 'A new request found', 'unread', '2021-05-27 10:22:04', '2021-05-27 10:22:04'),
(15, 3, 'A new request found', 'unread', '2021-05-27 10:22:04', '2021-05-27 10:22:04'),
(16, 2, 'A new request found', 'unread', '2021-06-04 19:35:29', '2021-06-04 19:35:29'),
(17, 3, 'A new request found', 'unread', '2021-06-04 19:35:29', '2021-06-04 19:35:29'),
(18, 2, 'A new request found', 'unread', '2021-06-04 19:41:38', '2021-06-04 19:41:38'),
(19, 3, 'A new request found', 'unread', '2021-06-04 19:41:38', '2021-06-04 19:41:38'),
(20, 2, 'A new request found', 'unread', '2021-06-04 19:42:27', '2021-06-04 19:42:27'),
(21, 3, 'A new request found', 'unread', '2021-06-04 19:42:27', '2021-06-04 19:42:27'),
(22, 2, 'A new request found', 'unread', '2021-06-08 12:09:10', '2021-06-08 12:09:10'),
(23, 3, 'A new request found', 'unread', '2021-06-08 12:09:10', '2021-06-08 12:09:10'),
(24, 6, 'A new request found', 'unread', '2021-06-08 12:09:10', '2021-06-08 12:09:10'),
(25, 2, 'A new request found', 'unread', '2021-06-08 12:09:34', '2021-06-08 12:09:34'),
(26, 3, 'A new request found', 'unread', '2021-06-08 12:09:34', '2021-06-08 12:09:34'),
(27, 6, 'A new request found', 'unread', '2021-06-08 12:09:34', '2021-06-08 12:09:34'),
(28, 2, 'A new request found', 'unread', '2021-06-08 12:11:19', '2021-06-08 12:11:19'),
(29, 3, 'A new request found', 'unread', '2021-06-08 12:11:19', '2021-06-08 12:11:19'),
(30, 6, 'A new request found', 'unread', '2021-06-08 12:11:19', '2021-06-08 12:11:19'),
(31, 2, 'A new request found', 'unread', '2021-06-10 23:40:47', '2021-06-10 23:40:47'),
(32, 3, 'A new request found', 'unread', '2021-06-10 23:40:47', '2021-06-10 23:40:47'),
(33, 6, 'A new request found', 'unread', '2021-06-10 23:40:47', '2021-06-10 23:40:47'),
(34, 9, 'A new request found', 'unread', '2021-06-10 23:40:47', '2021-06-10 23:40:47'),
(35, 2, 'A new request found', 'unread', '2021-06-19 12:03:24', '2021-06-19 12:03:24'),
(36, 3, 'A new request found', 'unread', '2021-06-19 12:03:24', '2021-06-19 12:03:24'),
(37, 6, 'A new request found', 'unread', '2021-06-19 12:03:24', '2021-06-19 12:03:24'),
(38, 9, 'A new request found', 'unread', '2021-06-19 12:03:24', '2021-06-19 12:03:24'),
(39, 10, 'A new request found', 'unread', '2021-06-19 12:03:24', '2021-06-19 12:03:24'),
(40, 2, 'A new request found', 'unread', '2021-06-19 12:03:48', '2021-06-19 12:03:48'),
(41, 3, 'A new request found', 'unread', '2021-06-19 12:03:48', '2021-06-19 12:03:48'),
(42, 6, 'A new request found', 'unread', '2021-06-19 12:03:48', '2021-06-19 12:03:48'),
(43, 9, 'A new request found', 'unread', '2021-06-19 12:03:48', '2021-06-19 12:03:48'),
(44, 10, 'A new request found', 'unread', '2021-06-19 12:03:48', '2021-06-19 12:03:48'),
(45, 2, 'A new request found', 'unread', '2021-06-19 12:04:31', '2021-06-19 12:04:31'),
(46, 3, 'A new request found', 'unread', '2021-06-19 12:04:31', '2021-06-19 12:04:31'),
(47, 6, 'A new request found', 'unread', '2021-06-19 12:04:31', '2021-06-19 12:04:31'),
(48, 9, 'A new request found', 'unread', '2021-06-19 12:04:31', '2021-06-19 12:04:31'),
(49, 10, 'A new request found', 'unread', '2021-06-19 12:04:31', '2021-06-19 12:04:31'),
(50, 2, 'A new request found', 'unread', '2021-07-08 03:22:22', '2021-07-08 03:22:22'),
(51, 3, 'A new request found', 'unread', '2021-07-08 03:22:22', '2021-07-08 03:22:22'),
(52, 6, 'A new request found', 'unread', '2021-07-08 03:22:22', '2021-07-08 03:22:22'),
(53, 9, 'A new request found', 'unread', '2021-07-08 03:22:22', '2021-07-08 03:22:22'),
(54, 10, 'A new request found', 'unread', '2021-07-08 03:22:22', '2021-07-08 03:22:22'),
(55, 2, 'A new request found', 'unread', '2021-07-08 03:23:31', '2021-07-08 03:23:31'),
(56, 3, 'A new request found', 'unread', '2021-07-08 03:23:31', '2021-07-08 03:23:31'),
(57, 6, 'A new request found', 'unread', '2021-07-08 03:23:31', '2021-07-08 03:23:31'),
(58, 9, 'A new request found', 'unread', '2021-07-08 03:23:31', '2021-07-08 03:23:31'),
(59, 10, 'A new request found', 'unread', '2021-07-08 03:23:31', '2021-07-08 03:23:31'),
(60, 2, 'A new request found', 'unread', '2021-07-10 21:22:46', '2021-07-10 21:22:46'),
(61, 3, 'A new request found', 'unread', '2021-07-10 21:22:46', '2021-07-10 21:22:46'),
(62, 6, 'A new request found', 'unread', '2021-07-10 21:22:46', '2021-07-10 21:22:46'),
(63, 9, 'A new request found', 'unread', '2021-07-10 21:22:46', '2021-07-10 21:22:46'),
(64, 10, 'A new request found', 'unread', '2021-07-10 21:22:46', '2021-07-10 21:22:46'),
(65, 20, 'A new request found', 'unread', '2021-07-10 21:22:46', '2021-07-10 21:22:46');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `user_id`, `name`, `stripe_id`, `stripe_status`, `stripe_plan`, `quantity`, `trial_ends_at`, `ends_at`, `customer_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Childcare', 'sub_JdFxaPkpPxkYwr', 'active', 'monthly', 1, NULL, NULL, 3, '2021-06-08 11:34:19', '2021-06-08 11:34:19'),
(2, NULL, 'Childcare', 'sub_JdFxPvCLHZve48', 'active', 'monthly', 1, NULL, NULL, 3, '2021-06-08 11:34:19', '2021-06-08 11:34:19'),
(3, NULL, 'Childcare', 'sub_JhKqdfMtNOkoHX', 'active', 'monthly', 1, NULL, NULL, 1, '2021-06-19 08:52:55', '2021-06-19 08:52:55'),
(4, NULL, 'Childcare', 'sub_JhKqT07gMAeMZu', 'active', 'monthly', 1, NULL, NULL, 1, '2021-06-19 08:52:55', '2021-06-19 08:52:55'),
(5, NULL, 'Childcare', 'sub_JhLXl5vakIjOmt', 'active', 'monthly', 1, NULL, NULL, 2, '2021-06-19 09:35:52', '2021-06-19 09:35:52'),
(6, NULL, 'Childcare', 'sub_JrDN0ZqjPyHRGP', 'active', 'monthly', 1, NULL, NULL, 20, '2021-07-15 17:50:15', '2021-07-15 17:50:15');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_items`
--

CREATE TABLE `subscription_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscription_items`
--

INSERT INTO `subscription_items` (`id`, `subscription_id`, `stripe_id`, `stripe_plan`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 'si_JdFxYAeDiX78nx', 'monthly', 1, '2021-06-08 11:34:19', '2021-06-08 11:34:19'),
(2, 2, 'si_JdFxq5ltLr58y0', 'monthly', 1, '2021-06-08 11:34:19', '2021-06-08 11:34:19'),
(3, 3, 'si_JhKqagBjCKhqYR', 'monthly', 1, '2021-06-19 08:52:55', '2021-06-19 08:52:55'),
(4, 4, 'si_JhKqH1MQlUBd7N', 'monthly', 1, '2021-06-19 08:52:55', '2021-06-19 08:52:55'),
(5, 5, 'si_JhLXwenyIsmFtG', 'monthly', 1, '2021-06-19 09:35:52', '2021-06-19 09:35:52'),
(6, 6, 'si_JrDNbW0IeSNQps', 'monthly', 1, '2021-07-15 17:50:15', '2021-07-15 17:50:15');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plans`
--

CREATE TABLE `subscription_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_plan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_product_id` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `plan_duration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscription_plans`
--

INSERT INTO `subscription_plans` (`id`, `title`, `sub_title`, `description`, `currency`, `stripe_plan`, `stripe_product_id`, `duration`, `plan_duration`, `price`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Monthly', 'Payment will automatically be withdrawn once per month', 'Benefits for Parents:\r\nUnlimited Childcare Requests\r\nView of Lessons taught to your child\r\nUp to 2 cancelled services\r\nFull list of teachers in your area\r\n\r\nNot Included in this subscription:\r\nArts and Crafts photos\r\nAccess to community meet ups\r\n\r\nTeacher Benefits:', 'usd', 'monthly', 'prod_JG0yMs2RDf3680', 1, 'month', 1.99, 0, 1, '2021-04-07 10:32:22', '2021-06-11 00:55:16'),
(2, 'Bi-Annual', 'Bi-Annual (6 Months)', 'Bi-Annual (6 Months)', 'usd', 'bi-annual', 'prod_JG0zT1hm9L4DUj', 6, 'month', 11.99, 1, 1, '2021-04-07 10:33:41', '2021-04-07 10:35:36'),
(3, 'Annual', 'Annual (12 Months)', 'Annual (12 Months)', 'usd', 'annual', 'prod_JG10EJEA1oYQ9x', 1, 'month', 11.99, 2, 1, '2021-04-07 10:35:09', '2021-04-07 10:35:09'),
(4, 'Premium', 'Premium (Special Package)', 'Premium (Special Package)\r\nBenefits:\r\nUnlimited Childcare Requests\r\nView of Lessons taught to your child\r\nUp to 2 cancelled services\r\nFull list of teachers in your area\r\nArts and Crafts photos\r\nAccess to community meet ups', 'usd', 'premium', 'prod_JG12MiQtjPbc5j', 1, 'year', 11.99, 3, 1, '2021-04-07 10:36:24', '2021-06-04 20:23:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$WZVN/KpntFneK.yWm9/rT.UL0ZMyeeDScnrEu6XDXYLPTZoX6OxuW', '1fLofoWCVMcQn0x0ka3aiCCngNwH7sVj2GGO0t6FZka0RSoSwwJZp2H7GIvJ', '2020-08-10 03:20:18', '2020-08-10 03:20:18');

-- --------------------------------------------------------

--
-- Table structure for table `user_requests`
--

CREATE TABLE `user_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(255) DEFAULT NULL,
  `from` datetime NOT NULL,
  `to` datetime NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_requests`
--

INSERT INTO `user_requests` (`id`, `customer_id`, `teacher_id`, `from`, `to`, `address`, `service`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2021-05-27 10:20:41', '2021-05-27 10:20:45', 'Test1', 'Traveling for Work', 'completed', NULL, '2021-05-27 09:20:56', '2021-05-27 09:24:54'),
(2, 1, 2, '2021-05-27 10:21:03', '2021-05-27 10:21:05', 'Test2', 'Girls/Guys Night out', 'completed', NULL, '2021-05-27 09:21:16', '2021-05-27 09:25:15'),
(3, 1, 2, '2021-05-27 10:21:22', '2021-05-27 10:21:24', 'Test3', 'Regular Work Day', 'cancelled', NULL, '2021-05-27 09:21:34', '2021-05-27 09:23:44'),
(4, 1, 2, '2021-05-27 10:21:41', '2021-05-27 10:21:43', 'Test4', 'Running Errands', 'active', NULL, '2021-05-27 09:21:53', '2021-06-19 12:00:21'),
(5, 1, 2, '2021-05-27 10:21:58', '2021-05-27 10:22:00', 'Test5', 'Date Night', 'cancelled', NULL, '2021-05-27 09:22:12', '2021-06-19 12:01:20'),
(6, 4, NULL, '2021-05-27 11:20:35', '2021-05-27 11:20:37', 'Multan', 'Traveling for Work', NULL, NULL, '2021-05-27 10:20:49', '2021-05-27 10:20:49'),
(7, 4, NULL, '2021-05-27 11:20:53', '2021-05-27 11:20:55', 'Karachi', 'Girls/Guys Night out', NULL, NULL, '2021-05-27 10:21:09', '2021-05-27 10:21:09'),
(8, 4, NULL, '2021-05-27 11:21:14', '2021-05-27 11:21:16', 'Lahore', 'Regular Work Day', NULL, NULL, '2021-05-27 10:21:28', '2021-05-27 10:21:28'),
(9, 4, 3, '2021-05-27 11:21:33', '2021-05-27 11:21:35', 'Islamabad', 'Running Errands', 'completed', NULL, '2021-05-27 10:21:45', '2021-05-27 10:26:41'),
(10, 4, 3, '2021-05-27 11:21:51', '2021-05-27 11:21:54', 'Rawalpindi', 'Date Night', 'active', NULL, '2021-05-27 10:22:04', '2021-05-27 10:26:13'),
(11, 5, 6, '2021-07-04 11:34:46', '2021-07-04 15:35:02', '123 sesame st', 'Regular Work Day', 'cancelled', NULL, '2021-06-04 19:35:28', '2021-06-04 23:03:07'),
(12, 5, 6, '2021-08-04 11:41:01', '2021-08-05 11:41:14', '123 sesame st', 'Traveling for Work', 'cancelled', NULL, '2021-06-04 19:41:37', '2021-06-04 22:50:05'),
(13, 5, 6, '2021-09-04 11:41:55', '2021-09-06 11:42:02', '123 sesame street', 'Traveling for Work', 'completed', NULL, '2021-06-04 19:42:27', '2021-06-04 23:02:39'),
(14, 7, NULL, '2021-06-08 13:08:51', '2021-06-08 13:08:54', 'Islamabad', 'Traveling for Work', NULL, NULL, '2021-06-08 12:09:10', '2021-06-08 12:09:10'),
(15, 7, NULL, '2021-06-08 13:09:14', '2022-06-08 13:09:20', 'Lahore', 'Regular Work Day', NULL, NULL, '2021-06-08 12:09:33', '2021-06-08 12:09:33'),
(16, 7, 9, '2021-06-08 13:11:12', '2021-06-08 13:11:15', 'Karachi', 'Running Errands', 'cancelled', NULL, '2021-06-08 12:11:19', '2021-06-08 12:18:11'),
(17, 5, 10, '2021-06-11 16:39:48', '2021-06-12 15:40:01', '123 sesame street atl ga 30337', 'Traveling for Work', 'completed', NULL, '2021-06-10 23:40:47', '2021-06-11 01:47:39'),
(18, 1, 2, '2021-06-19 13:03:09', '2021-06-19 13:03:12', 'New Request', 'Traveling for Work', 'completed', NULL, '2021-06-19 12:03:24', '2021-06-19 12:08:02'),
(19, 1, 2, '2021-06-19 13:03:30', '2021-06-19 13:03:34', 'Hello Request', 'Regular Work Day', 'cancelled', NULL, '2021-06-19 12:03:48', '2021-06-19 12:08:56'),
(20, 1, NULL, '2021-06-19 13:03:54', '2021-06-19 13:03:58', 'Assistant Request', 'Running Errands', NULL, NULL, '2021-06-19 12:04:31', '2021-06-19 12:04:31'),
(21, 19, 20, '2021-07-09 19:21:18', '2021-07-11 19:21:41', '123 love joy lane', 'Traveling for Work', 'completed', NULL, '2021-07-08 03:22:22', '2021-07-10 21:10:56'),
(22, 19, 20, '2021-07-12 19:22:36', '2021-07-12 21:22:45', '123 love joy ln', 'Running Errands', 'completed', NULL, '2021-07-08 03:23:31', '2021-07-10 21:10:14'),
(23, 19, NULL, '2021-07-10 13:19:35', '2021-07-11 13:22:12', '10 lovr street', 'Traveling for Work', NULL, NULL, '2021-07-10 21:22:46', '2021-07-10 21:22:46');

-- --------------------------------------------------------

--
-- Table structure for table `user_subscriptions`
--

CREATE TABLE `user_subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'product unique key',
  `valid_from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valid_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addartworknotifications`
--
ALTER TABLE `addartworknotifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addartworknotifications_parant_id_index` (`parant_id`),
  ADD KEY `addartworknotifications_teacher_id_index` (`teacher_id`);

--
-- Indexes for table `addmeetupsnotifications`
--
ALTER TABLE `addmeetupsnotifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addmeetupsnotifications_meetup_id_index` (`meetup_id`);

--
-- Indexes for table `admin_meetup_comment_notification`
--
ALTER TABLE `admin_meetup_comment_notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_meetup_comment_notification_meetup_id_index` (`meetup_id`);

--
-- Indexes for table `applied_requests`
--
ALTER TABLE `applied_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applied_requests_teacher_id_index` (`teacher_id`),
  ADD KEY `applied_requests_request_id_index` (`request_id`);

--
-- Indexes for table `approved_reject_notifications`
--
ALTER TABLE `approved_reject_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`),
  ADD KEY `customers_stripe_id_index` (`stripe_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lessonartworks`
--
ALTER TABLE `lessonartworks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lessonartworks_parant_id_index` (`parant_id`),
  ADD KEY `lessonartworks_teacher_id_index` (`teacher_id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lesson_cetogires`
--
ALTER TABLE `lesson_cetogires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meeting_notifications`
--
ALTER TABLE `meeting_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meeting_users`
--
ALTER TABLE `meeting_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parent_childrens`
--
ALTER TABLE `parent_childrens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parent_child_requests`
--
ALTER TABLE `parent_child_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parent_notifications`
--
ALTER TABLE `parent_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rates_teacher_id_foreign` (`teacher_id`),
  ADD KEY `rates_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `rate_notifications`
--
ALTER TABLE `rate_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rate_notifications_teacher_id_foreign` (`teacher_id`),
  ADD KEY `rate_notifications_parent_id_foreign` (`parent_id`),
  ADD KEY `rate_notifications_viewer_id_foreign` (`viewer_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_customer_id_index` (`customer_id`),
  ADD KEY `ratings_request_id_index` (`request_id`);

--
-- Indexes for table `request_notifications`
--
ALTER TABLE `request_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`);

--
-- Indexes for table `subscription_items`
--
ALTER TABLE `subscription_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscription_items_subscription_id_stripe_plan_unique` (`subscription_id`,`stripe_plan`),
  ADD KEY `subscription_items_stripe_id_index` (`stripe_id`);

--
-- Indexes for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_requests`
--
ALTER TABLE `user_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_requests_customer_id_index` (`customer_id`);

--
-- Indexes for table `user_subscriptions`
--
ALTER TABLE `user_subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_subscriptions_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addartworknotifications`
--
ALTER TABLE `addartworknotifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `addmeetupsnotifications`
--
ALTER TABLE `addmeetupsnotifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_meetup_comment_notification`
--
ALTER TABLE `admin_meetup_comment_notification`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applied_requests`
--
ALTER TABLE `applied_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `approved_reject_notifications`
--
ALTER TABLE `approved_reject_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lessonartworks`
--
ALTER TABLE `lessonartworks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lesson_cetogires`
--
ALTER TABLE `lesson_cetogires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `meeting_notifications`
--
ALTER TABLE `meeting_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `meeting_users`
--
ALTER TABLE `meeting_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `parent_childrens`
--
ALTER TABLE `parent_childrens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `parent_child_requests`
--
ALTER TABLE `parent_child_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `parent_notifications`
--
ALTER TABLE `parent_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rate_notifications`
--
ALTER TABLE `rate_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `request_notifications`
--
ALTER TABLE `request_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subscription_items`
--
ALTER TABLE `subscription_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_requests`
--
ALTER TABLE `user_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_subscriptions`
--
ALTER TABLE `user_subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rates`
--
ALTER TABLE `rates`
  ADD CONSTRAINT `rates_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rates_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rate_notifications`
--
ALTER TABLE `rate_notifications`
  ADD CONSTRAINT `rate_notifications_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rate_notifications_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rate_notifications_viewer_id_foreign` FOREIGN KEY (`viewer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_subscriptions`
--
ALTER TABLE `user_subscriptions`
  ADD CONSTRAINT `user_subscriptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
