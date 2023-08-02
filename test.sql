-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 02, 2023 at 09:59 AM
-- Server version: 5.7.39
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `active`) VALUES
(5, 'ชั้น', 1);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_value`
--

CREATE TABLE `attribute_value` (
  `id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL,
  `attribute_parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attribute_value`
--

INSERT INTO `attribute_value` (`id`, `value`, `attribute_parent_id`) VALUES
(5, 'ชั้นที่ #1', 2),
(6, 'ชั้นที่ #2', 2),
(7, '1', 3),
(8, '2', 3),
(9, 'ชั้นที่ #3', 2),
(10, 'ชั้นที่ #4', 2),
(12, 'ชั้นที่ #5', 2),
(14, 'ชั้น บน', 1),
(15, 'ชั้น ล่าง', 1),
(20, 'ล็อกเกอร์เหล็ก', 2),
(21, 'ชั้น 1', 4),
(22, 'ชั้น 2', 4),
(23, 'ชั้น 3', 4),
(24, 'ชั้น 4', 4),
(25, 'ชั้น 5', 4),
(26, 'ชั้น 6', 4),
(27, '3', 3),
(28, '4', 3),
(29, 'ชั้นล่าง', 5),
(30, 'ชั้นบน', 5),
(31, 'รอบนอก', 5),
(35, '1', 6),
(36, '2', 6),
(37, '3', 6),
(38, '4', 6),
(39, '5', 6),
(40, '6', 6),
(41, '1', 7),
(42, '2', 7),
(43, '3', 7),
(44, '4', 7),
(45, '5', 7),
(46, '6', 7);

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('Admin', 1, NULL, NULL, NULL, 1689998486, 1689998486);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auto_number`
--

CREATE TABLE `auto_number` (
  `group` varchar(32) NOT NULL,
  `number` int(11) DEFAULT NULL,
  `optimistic_lock` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auto_number`
--

INSERT INTO `auto_number` (`group`, `number`, `optimistic_lock`, `update_time`) VALUES
('202307-???', 4, 1, 1690253301),
('d2538d1d8ebc2944ff5a3dd2b532204c', 3, 1, 1690253301),
('RP202307-???', 3, 1, 1690264861),
('RP202308-???', 1, 1, 1690941522);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL COMMENT 'รหัส',
  `name` varchar(100) DEFAULT NULL COMMENT 'ชื่อ',
  `color` varchar(45) DEFAULT NULL COMMENT 'สี'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `code`, `name`, `color`) VALUES
(1, 'AC', 'บัญชี', '#6aa84f'),
(2, 'EN', 'แผนกวิศวกรรม', '#9900ff'),
(3, 'GM', 'ผู้จัดการ', '#ff00ff'),
(4, 'MK', 'การตลาด', '#434343'),
(5, 'PD', 'ฝ่ายผลิต', '#071952'),
(6, 'QC', 'แผนกควบคุมคุณภาพ', '#ff9900'),
(7, 'PC', 'แผนกจัดซื้อ', '#ff00ff'),
(8, 'WH', 'แผนกคลังสินค้า', '#980000'),
(9, 'RD', 'แผนกวิจัยและพัฒนาผลิตภัณฑ์', '#ff0000'),
(10, 'PN', 'ฝ่ายวางแผนและควบคุมการผลิต', '#674ea7'),
(11, 'IT', 'แผนกเทคโนโลยีสารสนเทศ', '#1D5D9B'),
(12, 'HR', 'บุคคลและธุรการ', '#765827');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `numbers` varchar(255) DEFAULT NULL COMMENT 'รหัสเอกสาร',
  `title` varchar(255) DEFAULT NULL COMMENT 'ชื่อเอกสาร',
  `description` text COMMENT 'รายละเอียด',
  `expiration_date` date DEFAULT NULL COMMENT 'วันที่หมดอายุ',
  `days_left` int(11) DEFAULT NULL COMMENT 'เตือนหมดอายุ (วัน)',
  `created_at` datetime DEFAULT NULL COMMENT 'สร้างเมื่อ',
  `updated_at` datetime DEFAULT NULL COMMENT 'ปรับปรุงเมื่อ',
  `created_by` int(11) DEFAULT NULL COMMENT 'ผู้สร้าง',
  `updated_by` int(11) DEFAULT NULL COMMENT 'ผู้ปรับปรุง',
  `categories_id` int(11) DEFAULT NULL COMMENT 'หมวดหมู่',
  `status_id` int(11) DEFAULT NULL COMMENT 'สถานะเอกสาร',
  `ref` varchar(255) DEFAULT NULL COMMENT 'อ้างอิง',
  `docs` text COMMENT 'ไฟล์เอกสาร'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `numbers`, `title`, `description`, `expiration_date`, `days_left`, `created_at`, `updated_at`, `created_by`, `updated_by`, `categories_id`, `status_id`, `ref`, `docs`) VALUES
(1, 'DOC-202307-001', 'ddddddddwasdasdddd', 'dddddd', '2023-07-27', 60, '2023-07-25 09:37:46', '2023-07-25 11:19:32', 1, 1, 3, 1, 'N18UL1l2Fa-395lgxHsNLR', '{\"ccc7ec2cde62623ff978f220a8b2086b.pdf\":\"ถั่วเหลือง Organic - ST-Lawrence Beans.pdf\"}'),
(2, 'DOC-202307-002', 'asdasdasd', '', '2023-07-28', 60, '2023-07-25 09:45:57', NULL, 1, 1, 1, 1, '202307-003', '{\"459b0302b91da73d29586339b57b83f0.pdf\":\"ถั่วเหลือง Organic FT. - อุ่มแสง.pdf\"}'),
(3, 'DOC-202307-003', 'asdasdasddasda', '', '2023-07-28', 60, '2023-07-25 09:48:21', '2023-07-25 10:16:24', 1, 1, 2, 1, '202307-004', '{\"f3a24b6f6093966191117c148a6437c9.jpg\":\"test.jpg\"}');

-- --------------------------------------------------------

--
-- Table structure for table `document_categories`
--

CREATE TABLE `document_categories` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL COMMENT 'รหัส',
  `name` varchar(255) DEFAULT NULL COMMENT 'ชื่อ',
  `detail` text COMMENT 'รายละเอียด',
  `color` varchar(255) DEFAULT NULL COMMENT 'สี'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `document_categories`
--

INSERT INTO `document_categories` (`id`, `code`, `name`, `detail`, `color`) VALUES
(1, 'General', 'เอกสารทั่วไป', '', '#0000ff'),
(2, 'ISO', 'International Organization for Standardization', '', '#6527BE'),
(3, 'COI', 'หนังสือรับรองสูตรส่วนประกอบ (Certificate of Ingredient)', '', '#F31559'),
(4, 'COA', 'ใบรายงานผลการตรวจวิเคราะห์สินค้า Certificate of Analysis', '', '#090580'),
(5, 'Fair Trade', 'Fair Trade', '', '#FD8D14'),
(6, 'Manual', 'คู่มือ', '', '#CECE5A'),
(7, 'Spec', 'Product Specification', '', '#FFE17B'),
(8, 'Quotation', 'Quotation', '', '#91C8E4'),
(9, 'Regulation', 'Regulation', '', '#749BC2'),
(10, 'Reference', 'Reference', '', '#4682A9'),
(11, 'Standard', 'Standard', '', '#FBA1B7'),
(12, 'Data Sheet', 'Data Sheet', '', '#6C3428');

-- --------------------------------------------------------

--
-- Table structure for table `document_status`
--

CREATE TABLE `document_status` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL COMMENT 'รหัส',
  `name` varchar(255) DEFAULT NULL COMMENT 'ชื่อ',
  `detail` text COMMENT 'รายละเอียด',
  `color` varchar(255) DEFAULT NULL COMMENT 'สี'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `document_status`
--

INSERT INTO `document_status` (`id`, `code`, `name`, `detail`, `color`) VALUES
(1, 'Active', 'ใช้งาน', '', '#328906'),
(2, 'Cancel', 'ยกเลิก', '', '#FE0000'),
(3, 'Draft', 'ร่าง', '', '#3AA6B9'),
(4, 'In Progress', 'ดำเนินการ', '', '#E7B10A');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL COMMENT 'ชื่อจริง',
  `last_name` varchar(200) NOT NULL COMMENT 'นามสกุล',
  `date_of_birth` date NOT NULL COMMENT 'วันเกิด',
  `gender` varchar(200) NOT NULL COMMENT 'เพศ',
  `email` varchar(200) NOT NULL COMMENT 'อีเมล',
  `phone` varchar(20) DEFAULT NULL COMMENT 'เบอร์ติดต่อ',
  `address` text COMMENT 'ที่อยู่',
  `department` varchar(200) DEFAULT NULL COMMENT 'แผนก',
  `job_title` varchar(200) DEFAULT NULL COMMENT 'ตำแหน่งงาน',
  `hire_date` date NOT NULL COMMENT 'วันที่จ้าง',
  `salary` decimal(10,2) DEFAULT NULL COMMENT 'เงินเดือน',
  `manager_id` int(11) DEFAULT NULL COMMENT 'ผู้บังคับบัญชา',
  `branch` varchar(200) NOT NULL COMMENT 'สาขา',
  `status` varchar(200) NOT NULL COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `manager_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `hire_date` date NOT NULL,
  `department` varchar(100) DEFAULT NULL,
  `job_title` varchar(100) DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1690249274),
('m130524_201442_init', 1690249279),
('m230722_064642_create_repair', 1690249280),
('m230723_143557_create_department', 1690249280),
('m230723_151952_create_repair_order', 1690249280),
('m230724_010614_create_auto_number', 1690249280),
('m230724_071653_create_uploads', 1690249280),
('m230725_005121_create_documents', 1690249547);

-- --------------------------------------------------------

--
-- Table structure for table `photo_library`
--

CREATE TABLE `photo_library` (
  `id` int(11) NOT NULL,
  `ref` varchar(255) DEFAULT NULL,
  `event_name` varchar(255) DEFAULT NULL COMMENT 'ชื่องาน',
  `detail` text COMMENT 'รายละเอียด',
  `start_date` date DEFAULT NULL COMMENT 'วันที่เริ่มถ่ายภาพ',
  `end_date` date DEFAULT NULL COMMENT 'วันที่ถ่ายภาพเสร็จ',
  `location` varchar(255) DEFAULT NULL COMMENT 'สถานที่',
  `customer_name` varchar(150) DEFAULT NULL COMMENT 'ชื่อลูกค้า',
  `customer_mobile_phone` varchar(20) DEFAULT NULL COMMENT 'เบอร์โทร',
  `real_filename` varchar(255) DEFAULT NULL COMMENT 'ชื่อไฟล์จริง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `photo_library`
--

INSERT INTO `photo_library` (`id`, `ref`, `event_name`, `detail`, `start_date`, `end_date`, `location`, `customer_name`, `customer_mobile_phone`, `real_filename`) VALUES
(1, '0Nhe89WIrNISENK11YSnxh', 'asdasdas', 'adasda', NULL, NULL, '', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `repair`
--

CREATE TABLE `repair` (
  `id` int(11) NOT NULL,
  `ticket_number` varchar(100) DEFAULT NULL COMMENT 'เลขที่เอกสาร',
  `title` varchar(255) DEFAULT NULL COMMENT 'เรื่อง',
  `details` text COMMENT 'คำอธิบาย',
  `requester_name` varchar(255) DEFAULT NULL COMMENT 'ผู้แจ้งงาน',
  `request_date` date DEFAULT NULL COMMENT 'วันที่ร้องขอ',
  `department_id` int(11) DEFAULT NULL COMMENT 'จากหน่วยงาน',
  `repair_team_id` int(11) DEFAULT NULL COMMENT 'ถึงหน่วยงาน',
  `created_at` datetime DEFAULT NULL COMMENT 'วันที่แจ้ง',
  `updated_at` datetime DEFAULT NULL COMMENT 'ปรับปรุงเมื่อ',
  `created_by` int(11) DEFAULT NULL COMMENT 'ผู้แจ้ง',
  `updated_by` int(11) DEFAULT NULL COMMENT 'ผู้ปรับปรุง',
  `repair_priority_id` int(11) DEFAULT NULL COMMENT 'ความเร่งด่วน',
  `location` varchar(100) DEFAULT NULL COMMENT 'สถานที่',
  `docs` text COMMENT 'ไฟล์',
  `repair_status_id` int(11) DEFAULT NULL COMMENT 'สถานะงาน',
  `ref` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `repair`
--

INSERT INTO `repair` (`id`, `ticket_number`, `title`, `details`, `requester_name`, `request_date`, `department_id`, `repair_team_id`, `created_at`, `updated_at`, `created_by`, `updated_by`, `repair_priority_id`, `location`, `docs`, `repair_status_id`, `ref`) VALUES
(1, 'RP202307-001', 'ทดสอบการใช้งาน 1', '', 'ธีรพงศ์ ขันตา', '2023-08-01', 3, 2, '2023-07-01 12:00:00', '2023-07-25 11:59:54', 1, 1, 2, 'B1', '{\"8394ba6634a75ab22708e1b52b69a1fb.jpg\":\"test.jpg\"}', 2, 'RP202307-001'),
(2, 'RP202307-002', 'ทดสอบการใช้งาน 2', NULL, 'Jane Doe', '2023-08-01', 5, 1, '2023-07-01 12:00:00', '2023-07-21 12:00:00', 1, 1, 2, 'B2', '{\"8b7104df65dc3245a1fc5251be8216b8.jpeg\":\"pexels-photo-378570.jpeg\"}', 2, 'RP202307-002'),
(3, 'RP202307-003', 'dasdasdad', '', 'ธีรพงศ์ ขันตา', '2023-07-27', 4, 2, '2023-07-25 13:01:01', '2023-08-02 09:25:12', NULL, 1, 1, 'กดเกดเเกดเเพ', '{\"0e92e34ca00b63e3bce98b59dd37cb60.jpg\":\"Bottling_2.jpg\",\"d5e4e2b6cec2a865763fa837217ab681.pdf\":\"Organic Soybean Fairtrade - Pratithi Organic Foods.pdf\"}', 1, 'RP202307-003'),
(4, 'RP202308-001', 'กล้องวงจรปิดดับ', 'ช่องที่ 2 / 8', 'ทักษิณ อินทรศิลา', '2023-08-02', 12, 2, '2023-08-02 08:58:42', NULL, 1, 1, 1, 'B1', '{\"75539e5d6cbbbb28278e68b2fed4d978.png\":\"8-4-2566 16-12-55.png\"}', 1, 'RP202308-001');

-- --------------------------------------------------------

--
-- Table structure for table `repair_order`
--

CREATE TABLE `repair_order` (
  `id` int(11) NOT NULL,
  `ticket_id` int(11) DEFAULT NULL COMMENT 'ใบแจ้งซ่อม',
  `ticket_number` varchar(100) DEFAULT NULL COMMENT 'เลขที่ใบแจ้งซ่อม',
  `technician_team` varchar(255) DEFAULT NULL COMMENT 'ทีมช่าง',
  `repair_start` datetime DEFAULT NULL COMMENT 'วันที่เริ่มซ่อม',
  `repair_end` datetime DEFAULT NULL COMMENT 'วันที่ซ่อมเสร็จ',
  `repair_type_id` int(11) DEFAULT NULL COMMENT 'ประเภทการซ่อม',
  `spare_part` text COMMENT 'รายการอะไหล่',
  `cost` float DEFAULT '0' COMMENT 'ค่าใช้จ่าย',
  `files` text COMMENT 'ไฟล์แนบ',
  `comment` text COMMENT 'ความคิดเห็น'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `repair_priority`
--

CREATE TABLE `repair_priority` (
  `id` int(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL COMMENT 'รหัส',
  `name` varchar(100) DEFAULT NULL COMMENT 'ชื่อ',
  `color` varchar(45) DEFAULT NULL COMMENT 'สี'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `repair_priority`
--

INSERT INTO `repair_priority` (`id`, `code`, `name`, `color`) VALUES
(1, 'normal', NULL, NULL),
(2, 'Urgent', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `repair_status`
--

CREATE TABLE `repair_status` (
  `id` int(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL COMMENT 'รหัส',
  `name` varchar(100) DEFAULT NULL COMMENT 'ชื่อ',
  `color` varchar(45) DEFAULT NULL COMMENT 'สี'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `repair_status`
--

INSERT INTO `repair_status` (`id`, `code`, `name`, `color`) VALUES
(1, 'New Request', 'ใหม่', '#ff0000'),
(2, 'In Progress', 'กำลังดำเนินการ', '#ff9900'),
(3, 'Success', 'สำเร็จ', '#1A5D1A'),
(4, 'Cancel', 'ยกเลิก', '#435B66');

-- --------------------------------------------------------

--
-- Table structure for table `repair_team`
--

CREATE TABLE `repair_team` (
  `id` int(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL COMMENT 'รหัส',
  `name` varchar(100) DEFAULT NULL COMMENT 'ชื่อ',
  `color` varchar(45) DEFAULT NULL COMMENT 'สี'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `repair_team`
--

INSERT INTO `repair_team` (`id`, `code`, `name`, `color`) VALUES
(1, 'EN', 'วิศวกรรม', '#862B0D'),
(2, 'IT', 'เทคโนโลยีสารสนเทศ', '#4E4FEB');

-- --------------------------------------------------------

--
-- Table structure for table `repair_type`
--

CREATE TABLE `repair_type` (
  `id` int(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL COMMENT 'รหัส',
  `name` varchar(100) DEFAULT NULL COMMENT 'ชื่อ',
  `color` varchar(45) DEFAULT NULL COMMENT 'สี'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `repair_type`
--

INSERT INTO `repair_type` (`id`, `code`, `name`, `color`) VALUES
(1, 'Project', 'งานโครงการ', '#0000ff'),
(2, 'Repair', 'ซ่อมแซม', '#ffff00'),
(3, 'New', 'สร้างใหม่', '#ff00ff'),
(4, 'Adapt', 'ดัดแปลง', '#9900ff'),
(5, 'Install', 'ติดตั้ง', '#3c78d8'),
(6, 'Move', 'โยกย้าย', '#e69138');

-- --------------------------------------------------------

--
-- Table structure for table `software`
--

CREATE TABLE `software` (
  `id` int(11) NOT NULL,
  `softwarecategory_id` int(11) DEFAULT NULL,
  `center_code` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `assets_code` varchar(45) DEFAULT NULL,
  `bit` int(2) DEFAULT NULL,
  `cd_key` varchar(45) DEFAULT NULL,
  `serial_no` varchar(45) DEFAULT NULL,
  `po_no` varchar(45) DEFAULT NULL,
  `buy_date` date DEFAULT NULL,
  `last_install_date` date DEFAULT NULL,
  `image` text,
  `comment` text,
  `email_reg` varchar(45) DEFAULT NULL,
  `email_pass_reg` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `officecol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `softwarecategory`
--

CREATE TABLE `softwarecategory` (
  `id` int(11) NOT NULL,
  `category_name` varchar(200) DEFAULT NULL,
  `category_child` int(11) DEFAULT NULL,
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `upload_id` int(11) NOT NULL,
  `ref` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL COMMENT 'ชื่อไฟล์',
  `real_filename` varchar(255) DEFAULT NULL COMMENT 'ชื่อไฟล์จริง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`upload_id`, `ref`, `file_name`, `real_filename`) VALUES
(1, '0Nhe89WIrNISENK11YSnxh', 'pexels-ameruverse-digital-marketing-media-1643403.jpg', '37f7f4a625ab350198a50a8a339444af.jpg'),
(2, '0Nhe89WIrNISENK11YSnxh', 'pexels-shane-kell-1363873.jpg', 'c62b6241587e5513d2f3e1b53c0b2d10.jpg'),
(3, '0Nhe89WIrNISENK11YSnxh', 'pexels-pixabay-531321.jpg', '78cf0e37f7a5da203b6d97d05e711ac6.jpg'),
(4, '0Nhe89WIrNISENK11YSnxh', '5fd9decfef9c1_thumb900_1_.png', '30f34d03043a3d00952f9a55dc3239e7.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thai_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` int(11) DEFAULT '1',
  `status` smallint(6) NOT NULL DEFAULT '9'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `thai_name`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `created_at`, `updated_at`, `verification_token`, `role`, `status`) VALUES
(1, 'admin', 'ผู้ดูแลระบบ', '2tzscTHLNpS0rJlIJx_Uz1qZnvi6yS_q', '$2y$13$HwJ0Osagp4BHhcjKJMS.Su1kte.bpcDMCIusYWpu088FzQai9YqC6', NULL, 'admin@admin.com', 1689666356, 1689666356, 'SA3gozOob2BBbQR0Ue5t4mJQpoyb0gcp_1689666356', 10, 10),
(2, 'demo', 'ผู้ทดสอบระบบ', 'lJsMEFiO-XjqJrVhH2aDcjXyrP0oC0vy', '$2y$13$HwJ0Osagp4BHhcjKJMS.Su1kte.bpcDMCIusYWpu088FzQai9YqC6', NULL, 'demo@demo.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 5, 10),
(3, 'theerapong', 'ธีรพงศ์ ขันตา', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'theerapong@theerapong.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10),
(4, 'onanong', 'อรอนงค์ ชุมภู', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'onanong@gmail.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10),
(5, 'supanna', 'สุพรรณา พันธ์ภู่', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'supanna@email.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10),
(6, 'peeranai', 'พีรนัย โสทรทวีพงศ์', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'peeranai@gmail.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 5, 10),
(7, 'sawika', 'สาวิกา พินิจ', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'sawika@email.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10),
(8, 'araya', 'อารยา เทพโพธา', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'acc.nfcfa@gmail.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10),
(9, 'kannika', 'กรรณิกา คำภีระ', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'kannika@nfc.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10),
(10, 'watsara', 'วรรษรา หลวงเป็ง', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'lee_lew@hotmail.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10),
(11, 'yosaporn', 'ยศพร พยัคฆญาติ', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'ypayakayat@yahoo.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10),
(12, 'taweekiat', 'ทวีเกียรติ คำเทพ', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'd.taweekiat@gmail.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10),
(13, 'kullanitnaree', 'กุลนิษฐ์นรี เจริญจิตรวี', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'kullanitnaree@nfc.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10),
(14, 'jiraporn', 'จิราภรณ์ กาบแก้ว', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'jiraporn@nfc.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10),
(15, 'lapaeporn', 'ลภีพร กาบแก้ว', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'lapaeporn@nfc.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10),
(16, 'ratsamee', 'รัศมี ศศิยศพงศ์', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'ratsamee@nfc.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10),
(17, 'thaksin', 'ทักษิณ อินทรศิลา', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'notethaksin@hotmail.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10),
(18, 'chadaporn', 'ชฎาภรณ์ แก้วคำ', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'kaewkhamchadaporn@gmail.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10),
(19, 'pranee', 'ปราณี แดงโคตร', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'pranee@nfc.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10),
(20, 'premmika', 'เปรมมิกา พินิจ', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'premmika2910@gmail.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10),
(21, 'tanyarat', 'ธัญญารัตน์ นิ่มวงษ์', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'nimwong2539@gmail.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10),
(22, 'charinee', 'ชาริณี จันต๊ะนาเขต', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'charinee@nfc.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10),
(23, 'prakaiwan', 'ประกายวรรณ เทพมณี', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'prakaiwan4213@gmail.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10),
(24, 'suriya', 'สุริยา สมเพชร', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'suriyasompatch@gmail.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10),
(25, 'suphot', 'สุพจน์ ช่างฆ้อง', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'changkhong.8777@gmail.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10),
(26, 'natthaphon', 'ณัฐพล ขันเขียว', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'natthaphon@nfc.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10),
(27, 'sarawut', 'สราวุฒิ โฆษิตเกียรติคุณ', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'en.nfc2016@gmail.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10),
(28, 'yosapon', 'ยศพนธ์ โพธิ', 'It8nRvHqQbvTZGP2pons9wVh9gDhBENP', '$2y$13$27pLgOgxi8r7hDfNmfi2NOM5PmQzDvJJFGO5IvsCwWe3NWQsSDxYi', NULL, 'yosapon@nfc.com', 1689666356, 1689666356, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `work_group`
--

CREATE TABLE `work_group` (
  `id` int(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `work_group`
--

INSERT INTO `work_group` (`id`, `code`, `name`, `color`) VALUES
(1, 'GM', 'ผู้บริหาร', '#ff00ff'),
(2, 'WH', 'คลังสินค้า', '#980000'),
(3, 'QC', 'ควบคุมคุณภาพ', '#ff9900'),
(4, 'QA', 'ควบคุมเอกสาร', '#434343'),
(5, 'PC', 'จัดซื้อ', '#ff00ff'),
(6, 'HR', 'บุคคลและธุรการ', '#765827'),
(7, 'AC', 'บัญชี', '#6aa84f'),
(8, 'PD', 'ฝ่ายผลิต', '#071952'),
(9, 'RD', 'วิจัยและพัฒนาผลิตภัณฑ์', '#ff0000'),
(10, 'EN', 'วิศวกรรม', '#9900ff'),
(11, 'IT', 'เทคโนโลยีสารสนเทศ', '#1D5D9B'),
(12, 'SL', 'ขาย', '#7A9D54'),
(13, 'PN', 'วางแผนและควบคุมการผลิต', '#674ea7');

-- --------------------------------------------------------

--
-- Table structure for table `work_priority`
--

CREATE TABLE `work_priority` (
  `id` int(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `work_priority`
--

INSERT INTO `work_priority` (`id`, `code`, `name`, `color`) VALUES
(1, 'Nomal', 'ปกติ', '#1A5D1A'),
(2, 'Urgent', 'ด่วน', '#EF6262'),
(3, 'Most Urgent', 'ด่วนที่สุด', '#FE0000');

-- --------------------------------------------------------

--
-- Table structure for table `work_record`
--

CREATE TABLE `work_record` (
  `id` int(11) NOT NULL,
  `work_number` varchar(45) DEFAULT NULL COMMENT 'เลขที่งาน',
  `priority_id` int(11) DEFAULT '1' COMMENT 'ความสำคัญ',
  `work_group_id` int(11) DEFAULT NULL COMMENT 'กลุ่ม',
  `work_type_id` int(11) DEFAULT NULL COMMENT 'ประเภท',
  `title` varchar(200) DEFAULT NULL COMMENT 'หัวข้อ',
  `description` text COMMENT 'รายละเอียด',
  `start_date` datetime DEFAULT NULL COMMENT 'เริ่ม',
  `end_date` datetime DEFAULT NULL COMMENT 'เสร็จ',
  `images` text COMMENT 'รูปภาพ',
  `docs` text COMMENT 'เอกสาร',
  `member` text COMMENT 'ผู้ปฏิบัติงาน',
  `cost` decimal(10,2) DEFAULT '0.00' COMMENT 'ค่าใช้จ่าย',
  `work_status_id` int(11) DEFAULT NULL COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `work_record`
--

INSERT INTO `work_record` (`id`, `work_number`, `priority_id`, `work_group_id`, `work_type_id`, `title`, `description`, `start_date`, `end_date`, `images`, `docs`, `member`, `cost`, `work_status_id`) VALUES
(1, 'IT-203308-001', 3, 11, 3, 'สำรองข้อมูลก่อนไฟดับ', 'ไฟจะดับในวันที่ 8/8/2023 เวลา 8.00 น. - 8/8/2023 เวลา 17.00 น. ', '2023-08-02 13:00:00', '2023-08-08 17:00:00', NULL, NULL, NULL, '0.00', 1),
(2, 'IT-203308-002', 1, 6, 5, 'กล้องวงจรปิดใช้งานไม่ได้', 'ช่อง 2 และ 5 อาคาร B1', '2023-08-02 13:00:00', '2023-08-02 17:00:00', NULL, NULL, NULL, '100.00', 2),
(3, 'IT-203308-003', 2, 10, 2, 'แก้ไขโปรแกรม Stock Enineer', 'เพิ่มเติม Unit', '2023-07-25 11:00:00', '2023-07-28 16:00:00', NULL, NULL, NULL, '2000.00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `work_status`
--

CREATE TABLE `work_status` (
  `id` int(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `work_status`
--

INSERT INTO `work_status` (`id`, `code`, `name`, `color`) VALUES
(1, 'TODO', 'งานต้องทำ', '#CD1818'),
(2, 'DONING', 'กำลังทำ', '#FFC95F'),
(3, 'SUCCESS', 'ทำเสร็จ', '#17594A');

-- --------------------------------------------------------

--
-- Table structure for table `work_type`
--

CREATE TABLE `work_type` (
  `id` int(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `work_type`
--

INSERT INTO `work_type` (`id`, `code`, `name`, `color`) VALUES
(1, 'Support', 'สนับสนุน', '#F11A7B'),
(2, 'Develop', 'พัฒนาโปรแกรม', '#0B666A'),
(3, 'Server', 'เซิฟเวอร์', '#F31559'),
(4, 'Network', 'เน็ตเวิร์ค', '#FF52A2'),
(5, 'CCTV', 'กล้องวงจรปิด', '#FFB07F'),
(6, 'Supply', 'ขอซื้อ', '#FE0000'),
(7, 'Meeting', 'ประชุม', '#6528F7'),
(8, 'Other', 'งานอื่นๆ', '#A076F9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_value`
--
ALTER TABLE `attribute_value`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `auto_number`
--
ALTER TABLE `auto_number`
  ADD PRIMARY KEY (`group`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numbers` (`numbers`);

--
-- Indexes for table `document_categories`
--
ALTER TABLE `document_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `document_status`
--
ALTER TABLE `document_status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `manager_id` (`manager_id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`manager_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `photo_library`
--
ALTER TABLE `photo_library`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repair`
--
ALTER TABLE `repair`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repair_order`
--
ALTER TABLE `repair_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repair_priority`
--
ALTER TABLE `repair_priority`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repair_status`
--
ALTER TABLE `repair_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repair_team`
--
ALTER TABLE `repair_team`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `repair_type`
--
ALTER TABLE `repair_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `software`
--
ALTER TABLE `software`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `softwarecategory`
--
ALTER TABLE `softwarecategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`upload_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `work_group`
--
ALTER TABLE `work_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_priority`
--
ALTER TABLE `work_priority`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_record`
--
ALTER TABLE `work_record`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_work_record_work_priority_idx` (`priority_id`),
  ADD KEY `fk_work_record_work_status1_idx` (`work_status_id`),
  ADD KEY `fk_work_record_work_group1_idx` (`work_group_id`),
  ADD KEY `fk_work_record_work_type1_idx` (`work_type_id`);

--
-- Indexes for table `work_status`
--
ALTER TABLE `work_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_type`
--
ALTER TABLE `work_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `attribute_value`
--
ALTER TABLE `attribute_value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `document_categories`
--
ALTER TABLE `document_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `document_status`
--
ALTER TABLE `document_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `manager_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photo_library`
--
ALTER TABLE `photo_library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `repair`
--
ALTER TABLE `repair`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `repair_order`
--
ALTER TABLE `repair_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `repair_priority`
--
ALTER TABLE `repair_priority`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `repair_status`
--
ALTER TABLE `repair_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `repair_team`
--
ALTER TABLE `repair_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `repair_type`
--
ALTER TABLE `repair_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `software`
--
ALTER TABLE `software`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `softwarecategory`
--
ALTER TABLE `softwarecategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `upload_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `work_group`
--
ALTER TABLE `work_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `work_priority`
--
ALTER TABLE `work_priority`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `work_record`
--
ALTER TABLE `work_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `work_status`
--
ALTER TABLE `work_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `work_type`
--
ALTER TABLE `work_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`manager_id`) REFERENCES `employee` (`employee_id`) ON DELETE SET NULL;

--
-- Constraints for table `work_record`
--
ALTER TABLE `work_record`
  ADD CONSTRAINT `fk_work_record_work_group1` FOREIGN KEY (`work_group_id`) REFERENCES `work_group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_work_record_work_priority` FOREIGN KEY (`priority_id`) REFERENCES `work_priority` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_work_record_work_status1` FOREIGN KEY (`work_status_id`) REFERENCES `work_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_work_record_work_type1` FOREIGN KEY (`work_type_id`) REFERENCES `work_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
