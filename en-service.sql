-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 22, 2023 at 07:41 AM
-- Server version: 5.7.39
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

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
('RP202307-???', 25, 1, 1689950140);

-- --------------------------------------------------------

--
-- Table structure for table `repair`
--

CREATE TABLE `repair` (
  `id` int(11) NOT NULL,
  `ticket_number` varchar(100) DEFAULT NULL COMMENT 'เลขที่เอกสาร',
  `title` varchar(255) DEFAULT NULL COMMENT 'เรื่อง',
  `details` text COMMENT 'คำอธิบาย',
  `request_date` datetime DEFAULT NULL COMMENT 'วันที่ร้องขอ',
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

INSERT INTO `repair` (`id`, `ticket_number`, `title`, `details`, `request_date`, `created_at`, `updated_at`, `created_by`, `updated_by`, `repair_priority_id`, `location`, `docs`, `repair_status_id`, `ref`) VALUES
(17, 'RP202307-017', 'EN แก้ Bug En-stock', '', '2023-08-04 00:00:00', '2023-07-21 16:42:14', '2023-07-21 21:41:54', 4, 1, 1, '', '{\"2b3c561679bc69d1ebf60136aabca24a.jpeg\":\"pexels-photo-378570.jpeg\",\"46696319e6d3226c10ae69cbad6eb8ca.jpg\":\"277771020_5648948028468601_6018621816321507604_n.jpg\"}', 2, 'f3gjrT49KivGxlXjOppF_z'),
(18, 'RP202307-018', 'PD อัพเกรด Notbook คุณยศพร', '', '2023-07-28 00:00:00', '2023-07-21 16:44:36', '2023-07-21 21:42:16', 5, 1, 2, '', '{\"7f3555706ef8806374c2e8dc373f68d5.png\":\"GALAXY TAB A8 VS REALME PAD X Which One is Better - YouTube.png\",\"b95a6b2d61d5b2c4469833245cae4b43.pdf\":\"ใบเสนอราคา  คุณแมว แม่ลาว.pdf\"}', 1, 'RP202307-018'),
(19, 'RP202307-019', 'EN ตรวจ spec Tablet สำหรับ งาน Stock Barcode', '', '2023-07-27 00:00:00', '2023-07-21 16:50:40', '2023-07-21 21:42:40', 3, 1, 1, 'กดเกดเเกดเเพ', '{\"807235be0f79b88ee3728b65de5ddca2.png\":\"logo-pbpartner.png\",\"9c51e8d4c27740c7dbbd13d5d65301c3.png\":\"logo-pbchiangmai.png\",\"3e7a50900dc2e957b6eef24d0ead8088.jpg\":\"logo-piya.jpg\",\"c53ef9c077c057b59b261efb4ccbc8d7.png\":\"logo-phulay.png\"}', 3, 'RP202307-019'),
(20, 'RP202307-020', 'EN ติดตั้งโปรแกรมเครื่องใหม่ ยศพนธ์', '', '2023-08-04 00:00:00', '2023-07-21 20:41:29', '2023-07-21 21:43:01', 2, 2, 3, 'adada', '{\"61aed485a4b92c730bdec68c15d3ad6b.jpg\":\"File-100.jpg\"}', 3, 'RP202307-020'),
(21, 'RP202307-021', 'CEO ทำระบบ Link data Tacking QA<>PD', '', '2023-07-28 00:00:00', '2023-07-21 21:17:16', '2023-07-21 21:43:39', 1, 1, 1, '', '{\"e0bd50c547caf36b6a338b42d335f02b.pdf\":\"ถั่วเหลือง Organic - อุ่มแสง.pdf\"}', 2, 'RP202307-021'),
(22, 'RP202307-022', 'โทรศัพท์ป้อม รปภ ไม่มีสัญญาณ', '', '2023-08-31 00:00:00', '2023-07-21 21:17:53', '2023-07-21 21:41:10', 3, 1, 3, '', '{\"dc348addb30bc8884a479591c3c9597f.docx\":\"2023-07-04  แบบทดสอบ อบรม 7 WASTE.docx\"}', 1, 'RP202307-022'),
(23, 'RP202307-023', 'แอร์ห้อง server มีน้ำหยด', '', '2023-07-29 00:00:00', '2023-07-21 21:18:17', '2023-07-21 21:36:18', 6, 1, 1, '', '{\"cd9a7bfd7fac2e4613dc8282b6fc8324.pdf\":\"PKA2023_Ver1_22-Dec-2022_10.00.pdf\"}', 3, 'RP202307-023'),
(24, 'RP202307-024', 'ขอทำปลั๊กพ่วง 2 ตัว', '', '2023-06-29 00:00:00', '2023-07-21 21:18:40', '2023-07-21 21:36:03', 5, 1, 2, '', '{\"22883dd55a909f4686dc5b612a5faba9.png\":\"trp-sign.png\"}', 4, 'RP202307-024'),
(25, 'RP202307-025', 'เปลี่ยนกล้องวงจรปิดฝ่ายผลิต', '', '2023-07-04 00:00:00', '2023-07-21 21:35:40', NULL, 1, 1, 1, '', '{\"47ebc6172783dd648bff92655358c4a3.png\":\"trp-sign.png\"}', 1, 'RP202307-025');

-- --------------------------------------------------------

--
-- Table structure for table `repairman`
--

CREATE TABLE `repairman` (
  `id` int(11) NOT NULL,
  `ticket_id` int(11) DEFAULT NULL COMMENT 'ใบแจ้งซ่อม',
  `ticket_number` varchar(100) DEFAULT NULL COMMENT 'เลขที่ใบแจ้งซ่อม',
  `technician_team` varchar(255) DEFAULT NULL COMMENT 'ทีมช่าง',
  `repair_start` datetime DEFAULT NULL COMMENT 'วันที่เริ่มซ่อม',
  `repair_end` datetime DEFAULT NULL COMMENT 'วันที่ซ่อมเสร็จ',
  `repair_type_id` int(11) DEFAULT NULL COMMENT 'ประเภทการซ่อม',
  `spare_part` text COMMENT 'รายการอะไหล่',
  `cost` float DEFAULT '0' COMMENT 'ค่าใช้จ่าย',
  `image` text COMMENT 'รูปภาพ',
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
(1, 'Normal', 'ปกติ', '#6aa84f'),
(2, 'Urgent', 'เร่งด่วน', '#ff0000'),
(3, 'Not Urgent', 'ไม่รีบ', '#ff00ff');

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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thai_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อ-สกุล',
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` smallint(6) NOT NULL DEFAULT '1',
  `status` smallint(6) NOT NULL DEFAULT '10'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `thai_name`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `created_at`, `updated_at`, `verification_token`, `role`, `status`) VALUES
(1, 'admin', 'ผู้ดูแลระบบ', '2tzscTHLNpS0rJlIJx_Uz1qZnvi6yS_q', '$2y$13$HwJ0Osagp4BHhcjKJMS.Su1kte.bpcDMCIusYWpu088FzQai9YqC6', NULL, 'admin@admin.com', 1689666356, 1689666356, 'SA3gozOob2BBbQR0Ue5t4mJQpoyb0gcp_1689666356', 10, 10),
(2, 'demo', 'ผู้ทดสอบระบบ', 'lJsMEFiO-XjqJrVhH2aDcjXyrP0oC0vy', '$2y$13$9cR6h5aFzqkDiaIYP4DQYuywLj.cgAyUBuIexfQNZCqaJQ.T/Zxfi', NULL, 'demo@demo.com', 1689756005, 1689756005, 'sfLH5psKTa0wMf7dH-kiSrkNcSPqn9OD_1689756005', 1, 10),
(3, 'onanong', 'อรอนงค์ ชมภู', '2bj5VmZ1PEwJDerqRsj3fhE8i2zvsVZq', '$2y$13$08zXpjOdJu83tT84JNqebe3SMFVctXSfynLDfss3sFMiveC7tPEUS', NULL, 'onanong@nfc.com', 1689759317, 1689759317, '9NqfkSJcx8KkIodMLNCeH9HLqhOUmcxw_1689759317', 1, 10),
(4, 'supanna', 'สุพรรณา พันธ์ภู่', 'yJwBMulOJv3IDmDkCXrdYZ-VMEw_zwLZ', '$2y$13$O4m3JByeXwarBQx8Na5aXuqT8v0WqaRJakqletAVt/p8XffgPvcau', NULL, 'supanna@nfc.com', 1689759339, 1689759339, '4Zgy1uVGJvXg2nZOAHcFCSj0NK0Ll3Ze_1689759339', 5, 10),
(5, 'prakaiwan', 'ประกายวรรณ เทพมณี', 'y2RYhV3E1NG68CUaa8svzBknRdbCTO79', '$2y$13$GkUZhR.dM5CJdm9MCnTYp.Ij9eya2sBVX.9CaRP/nlJq92WAQ7y02', NULL, 'prakaiwan@nfc.com', 1689759362, 1689759362, '2qNZk71gb01_K-bdCiscD38z36G9exZH_1689759362', 1, 10),
(6, 'sale', 'ฝ่ายขาย', 'EHSvx6uElywR8fG2XRQ_xKE4sups-8cO', '$2y$13$fOXl5gCyOYl4NxlvgBJ85O7wQvWcVNYnzg4IGDNkIkX6hl2d7aMbO', NULL, 'sale@nfc.com', 1689759388, 1689759388, '9ZnxmSRzPpvLgxD0MPSamdokpcp_eMul_1689759388', 1, 10),
(7, 'planning', 'ฝ่ายวางแผน', 'JWT4BgIkYF4TIN62mLaKv5iL0uLMn7C9', '$2y$13$g08zQ7xjXISzs99kS2yApuOCRcV6QpMOfdzNAwYY8fP9N96pEuAye', NULL, 'planning@nfc.com', 1689759413, 1689759413, '7xCjBXE9xNLx1gWqKX2LaVex2ah0IWt4_1689759413', 1, 9),
(8, 'production', 'ฝ่ายผลิต', 'FjE8vrSWJ1uVTanpvQJDnpq_OiUySrzg', '$2y$13$Oa3U4rEqDwN8W0ytkDHCjuPw8CW4d44l9tEWbi3N3myBogr4mmzBy', NULL, 'production@nfc.com', 1689759430, 1689759430, 'qNJ-e9RkWlfqvHqmvmSsItU1rlpb_D3j_1689759430', 5, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributes`
--
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
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_item`
--
ALTER TABLE `orders_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repair`
--
ALTER TABLE `repair`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_repair_repair_status1_idx` (`repair_status_id`),
  ADD KEY `fk_repair_repair_priority1_idx` (`repair_priority_id`);

--
-- Indexes for table `repairman`
--
ALTER TABLE `repairman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_approver_ticket_idx` (`ticket_id`),
  ADD KEY `fk_repairman_repair_type1_idx` (`repair_type_id`);

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
-- Indexes for table `repair_type`
--
ALTER TABLE `repair_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders_item`
--
ALTER TABLE `orders_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=376;

--
-- AUTO_INCREMENT for table `repair`
--
ALTER TABLE `repair`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `repairman`
--
ALTER TABLE `repairman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `repair_priority`
--
ALTER TABLE `repair_priority`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `repair_status`
--
ALTER TABLE `repair_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `repair_type`
--
ALTER TABLE `repair_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `repair`
--
ALTER TABLE `repair`
  ADD CONSTRAINT `fk_repair_repair_priority1` FOREIGN KEY (`repair_priority_id`) REFERENCES `repair_priority` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_repair_repair_status1` FOREIGN KEY (`repair_status_id`) REFERENCES `repair_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `repairman`
--
ALTER TABLE `repairman`
  ADD CONSTRAINT `fk_approver_ticket` FOREIGN KEY (`ticket_id`) REFERENCES `repair` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_repairman_repair_type1` FOREIGN KEY (`repair_type_id`) REFERENCES `repair_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
