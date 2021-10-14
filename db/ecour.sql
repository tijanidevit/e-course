-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2021 at 08:38 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecour`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `student_id`, `course_id`, `created_at`) VALUES
(1, 1, 2, '2021-10-10 14:22:03'),
(2, 2, 1, '2021-10-10 14:33:23');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_title` varchar(120) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(120) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `duration` varchar(10) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_title`, `description`, `image`, `tutor_id`, `duration`, `category_id`, `created_at`) VALUES
(1, 'Programming From Zero to Hero', 'Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero Programming From Zero to Hero ', 'default.jpg', 1, '3 Weeks', 1, '2021-10-09 18:24:25');

-- --------------------------------------------------------

--
-- Table structure for table `course_enrollments`
--

CREATE TABLE `course_enrollments` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `complete_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_enrollments`
--

INSERT INTO `course_enrollments` (`id`, `student_id`, `course_id`, `complete_status`, `created_at`) VALUES
(1, 2, 1, 0, '2021-10-09 18:23:14');

-- --------------------------------------------------------

--
-- Table structure for table `course_materials`
--

CREATE TABLE `course_materials` (
  `id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `title` varchar(120) NOT NULL,
  `description` text NOT NULL,
  `embeded_code` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_materials`
--

INSERT INTO `course_materials` (`id`, `section_id`, `title`, `description`, `embeded_code`, `created_at`) VALUES
(1, 1, 'Know this first', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'https://www.youtube.com/watch?v=FCMxA3m_Imc', '2021-10-10 05:55:12'),
(2, 2, 'Why Data Types?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'https://www.youtube.com/embed/A37-3lflh8I', '2021-10-10 05:55:12');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `title` varchar(120) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `course_id`, `title`, `description`, `created_at`) VALUES
(1, 1, 'Final Assessment', 'Final Assessment is very important. You have to score at least 70% to earn the certificates.\r\n\r\nFinal Assessment is very important. You have to score at least 70% to earn the certificates.\r\nFinal Assessment is very important. You have to score at least 70% to earn the certificates.', '2021-10-10 09:58:02');

-- --------------------------------------------------------

--
-- Table structure for table `exam_questions`
--

CREATE TABLE `exam_questions` (
  `id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `question` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_questions`
--

INSERT INTO `exam_questions` (`id`, `exam_id`, `question`) VALUES
(1, 1, 'Why will you learn to program?'),
(2, 1, 'Who designed the first computer system?');

-- --------------------------------------------------------

--
-- Table structure for table `question_options`
--

CREATE TABLE `question_options` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `option` varchar(110) NOT NULL,
  `is_answer` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_options`
--

INSERT INTO `question_options` (`id`, `question_id`, `option`, `is_answer`, `created_at`) VALUES
(1, 1, 'Option A', 1, '2021-10-10 10:02:56'),
(2, 1, 'Option B', 0, '2021-10-10 10:02:56'),
(3, 2, 'Wiz Babbage', 0, '2021-10-10 10:08:34'),
(4, 2, 'Charles Babbage', 1, '2021-10-10 10:08:34');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `section` varchar(110) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `course_id`, `section`, `created_at`) VALUES
(1, 1, 'Introduction', '2021-10-10 05:45:54'),
(2, 1, 'Data Types', '2021-10-10 05:45:54');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `fullname` varchar(120) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(190) NOT NULL,
  `password` text NOT NULL,
  `picture` varchar(120) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fullname`, `gender`, `email`, `password`, `picture`, `created_at`) VALUES
(2, 'Archie Thomas', 'male', 'archie.thomas@example.com', '1ed01e1b917407630ab4717c9a17c533', '2218-Davido.jpg', '2021-10-09 18:03:44');

-- --------------------------------------------------------

--
-- Table structure for table `student_exams`
--

CREATE TABLE `student_exams` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_exams`
--

INSERT INTO `student_exams` (`id`, `student_id`, `course_id`, `score`, `created_at`) VALUES
(1, 2, 1, 1, '2021-10-10 13:57:15'),
(3, 2, 1, 1, '2021-10-10 14:14:43'),
(4, 2, 1, 1, '2021-10-10 14:19:17'),
(5, 2, 1, 1, '2021-10-10 14:19:25'),
(6, 2, 1, 1, '2021-10-10 14:19:45'),
(7, 2, 1, 1, '2021-10-10 14:21:45'),
(8, 2, 1, 0, '2021-10-10 14:21:51'),
(9, 2, 1, 1, '2021-10-10 14:21:58'),
(10, 2, 1, 2, '2021-10-10 14:22:03'),
(11, 2, 1, 1, '2021-10-10 14:33:16'),
(12, 2, 1, 2, '2021-10-10 14:33:23');

-- --------------------------------------------------------

--
-- Table structure for table `tutors`
--

CREATE TABLE `tutors` (
  `id` int(11) NOT NULL,
  `fullname` varchar(120) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `about` text NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` text NOT NULL,
  `picture` varchar(120) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutors`
--

INSERT INTO `tutors` (`id`, `fullname`, `gender`, `about`, `email`, `password`, `picture`, `created_at`) VALUES
(1, 'Bayonle Lawal', 'Male', 'awalawalawalawalawalawalawalawalawalawalawalawalawalawalawalawalawalawal awalawalawalawalawalawal awal awalawal vawal awal awalawalv v awal awal', 'lawal@gmail.com', 'b099c7e1c1b67f4701530f4b1501a59f', 'default.png', '2021-10-09 18:25:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_enrollments`
--
ALTER TABLE `course_enrollments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_materials`
--
ALTER TABLE `course_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_questions`
--
ALTER TABLE `exam_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_options`
--
ALTER TABLE `question_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_exams`
--
ALTER TABLE `student_exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutors`
--
ALTER TABLE `tutors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course_enrollments`
--
ALTER TABLE `course_enrollments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course_materials`
--
ALTER TABLE `course_materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exam_questions`
--
ALTER TABLE `exam_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `question_options`
--
ALTER TABLE `question_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_exams`
--
ALTER TABLE `student_exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tutors`
--
ALTER TABLE `tutors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
