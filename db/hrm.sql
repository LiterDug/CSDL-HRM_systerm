-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 15, 2024 lúc 04:00 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hrm`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_user` varchar(30) NOT NULL,
  `admin_pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `admin_user`, `admin_pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_academic_rank`
--

CREATE TABLE `tbl_academic_rank` (
  `rank_id` int(3) NOT NULL,
  `rank_name` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_academic_rank`
--

INSERT INTO `tbl_academic_rank` (`rank_id`, `rank_name`) VALUES
(1, 'Instructor I'),
(2, 'Instructor II'),
(3, 'Instructor III'),
(9, 'Assistant Professor I'),
(10, 'Assistant Professor II'),
(11, 'Assistant Professor III'),
(12, 'Assistant Professor IV'),
(13, 'Associate Professor II'),
(14, 'Associate Professor I'),
(15, 'Associate Professor III'),
(16, 'Associate Professor IV'),
(17, 'Associate Professor V'),
(18, 'Professor I'),
(19, 'Professor II'),
(20, 'Professor III'),
(21, 'Professor IV'),
(22, 'Professor V'),
(23, 'Professor VI'),
(24, 'Professor VII'),
(26, 'Professor VIII');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_department`
--

CREATE TABLE `tbl_department` (
  `dept_id` int(3) NOT NULL,
  `dept_name` char(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_department`
--

INSERT INTO `tbl_department` (`dept_id`, `dept_name`) VALUES
(2, 'College of Education'),
(3, 'College of Arts and Science'),
(4, 'College of Industrial Technology'),
(5, 'Institute of Industrial Technology'),
(6, 'College of Business Management and Accountancy'),
(7, 'College of Fisheries');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_personnel`
--

CREATE TABLE `tbl_personnel` (
  `per_id` int(6) NOT NULL,
  `per_firstname` char(20) NOT NULL,
  `pos_id` int(3) NOT NULL,
  `per_gender` char(6) NOT NULL,
  `per_address` varchar(150) NOT NULL,
  `per_date_of_birth` date NOT NULL,
  `dept_id` int(3) NOT NULL,
  `per_contact_no` varchar(20) NOT NULL,
  `date_modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_personnel`
--

INSERT INTO `tbl_personnel` (`per_id`, `per_firstname`, `pos_id`, `per_gender`, `per_address`, `per_date_of_birth`, `dept_id`, `per_contact_no`, `date_modified`) VALUES
(165, 'nguyen', 59, 'Male', '', '0000-00-00', 2, '+639    -   -   ', '2024-11-10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_personnel_master_file`
--

CREATE TABLE `tbl_personnel_master_file` (
  `per_id` int(7) NOT NULL,
  `per_firstname` char(20) NOT NULL,
  `pos_id` int(3) NOT NULL,
  `per_gender` char(6) NOT NULL,
  `per_address` varchar(150) NOT NULL,
  `per_date_of_birth` date NOT NULL,
  `dept_id` int(3) NOT NULL,
  `per_position` varchar(50) NOT NULL,
  `per_contact_no` varchar(20) NOT NULL,
  `date_modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_personnel_master_file`
--

INSERT INTO `tbl_personnel_master_file` (`per_id`, `per_firstname`, `pos_id`, `per_gender`, `per_address`, `per_date_of_birth`, `dept_id`, `per_position`, `per_contact_no`, `date_modified`) VALUES
(165, 'nguyen', 0, 'Male', '', '0000-00-00', 0, '', '+639    -   -   ', '2024-11-10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_position`
--

CREATE TABLE `tbl_position` (
  `pos_id` int(3) NOT NULL,
  `pos_name` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_position`
--

INSERT INTO `tbl_position` (`pos_id`, `pos_name`) VALUES
(41, 'Chairperson'),
(42, 'PME, Coordinator'),
(43, 'SSG Adviser'),
(44, 'Chair, BSIS'),
(45, 'Chair, BSE'),
(46, 'Chair, Graduate School'),
(47, 'CIMD Coordinator'),
(48, 'Chair, SAS'),
(49, 'Coordinator, Extension'),
(50, 'PPDM, IGP'),
(51, 'OSA Coordinator'),
(52, 'SSD In-Charge'),
(53, 'Criminology Chairperson'),
(54, 'Chair, BS Industrial Technology'),
(55, 'Chair, Extension'),
(56, 'Student Teaching Supervisor'),
(57, 'Discipline Officer'),
(58, 'Dean, Fortune Towne'),
(59, 'Fisheries Chairperson'),
(60, 'Business Administration Chairperson'),
(61, 'NSTP Coordinator'),
(62, 'Executive Director'),
(63, 'Dean. College of Fisheries'),
(64, 'Research Coordinator, Technopacer Adviser'),
(65, 'IGP Coordinator'),
(66, 'Chair, BSIS                                  ICT C'),
(67, 'Acting Registrar'),
(68, 'Assistant Discipline Officer'),
(69, 'Chair, BSOA'),
(70, 'Alumni Coordinator'),
(71, 'Dean IT'),
(72, 'Education Chairperson, Student Teaching Supervisor'),
(73, 'ECS Coordinator'),
(74, 'Director, PME'),
(75, 'Chair, BSA'),
(76, 'Chairperson, Information Technology'),
(77, 'Adviser, SSG'),
(78, 'Chair, BSACT'),
(79, 'Sports Coordinator'),
(80, 'Guidance Counselor'),
(81, 'SUC President');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_promotion`
--

CREATE TABLE `tbl_promotion` (
  `promote_id` int(5) NOT NULL,
  `per_id` int(6) NOT NULL,
  `rank_id` int(3) NOT NULL,
  `date_promoted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_promotion`
--

INSERT INTO `tbl_promotion` (`promote_id`, `per_id`, `rank_id`, `date_promoted`) VALUES
(1, 67, 2, '2015-12-31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_salary`
--

CREATE TABLE `tbl_salary` (
  `per_id` int(11) NOT NULL,
  `working_time` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `month` int(11) DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_academic_rank`
--
ALTER TABLE `tbl_academic_rank`
  ADD PRIMARY KEY (`rank_id`);

--
-- Chỉ mục cho bảng `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Chỉ mục cho bảng `tbl_personnel`
--
ALTER TABLE `tbl_personnel`
  ADD PRIMARY KEY (`per_id`);

--
-- Chỉ mục cho bảng `tbl_position`
--
ALTER TABLE `tbl_position`
  ADD PRIMARY KEY (`pos_id`);

--
-- Chỉ mục cho bảng `tbl_promotion`
--
ALTER TABLE `tbl_promotion`
  ADD PRIMARY KEY (`promote_id`);

--
-- Chỉ mục cho bảng `tbl_salary`
--
ALTER TABLE `tbl_salary`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `per_id` (`per_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_academic_rank`
--
ALTER TABLE `tbl_academic_rank`
  MODIFY `rank_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `dept_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_personnel`
--
ALTER TABLE `tbl_personnel`
  MODIFY `per_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT cho bảng `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `pos_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT cho bảng `tbl_promotion`
--
ALTER TABLE `tbl_promotion`
  MODIFY `promote_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_salary`
--
ALTER TABLE `tbl_salary`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_salary`
--
ALTER TABLE `tbl_salary`
  ADD CONSTRAINT `tbl_salary_ibfk_1` FOREIGN KEY (`per_id`) REFERENCES `tbl_personnel` (`per_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
