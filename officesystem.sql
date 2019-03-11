-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2018 at 10:55 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `officesystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE `access` (
  `id` int(11) NOT NULL,
  `folder` varchar(40) NOT NULL,
  `fname` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`id`, `folder`, `fname`) VALUES
(2, 'sdfsdf', 'Hod IT'),
(3, 'Hod IT', 'Principal'),
(4, 'Hod IT', 'Hod IT'),
(5, 'Hod IT', 'HOD Comp');

-- --------------------------------------------------------

--
-- Table structure for table `backtrack`
--

CREATE TABLE `backtrack` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `docname` varchar(40) NOT NULL,
  `msgfrom` varchar(40) NOT NULL,
  `msg` varchar(200) NOT NULL,
  `view` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `backtrack`
--

INSERT INTO `backtrack` (`id`, `name`, `docname`, `msgfrom`, `msg`, `view`) VALUES
(3, 'Principal', 'lllllll', 'Hod IT', 'not working ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `clerk`
--

CREATE TABLE `clerk` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pwd` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clerk`
--

INSERT INTO `clerk` (`id`, `cid`, `name`, `email`, `pwd`) VALUES
(6, 101123, 'Clerky Man', 'clerk@q.com', '34776981fa47aa6cf3f2915d11bae051');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `dept` varchar(40) NOT NULL,
  `path` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `uname` varchar(40) NOT NULL,
  `forc` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`id`, `title`, `description`, `dept`, `path`, `date`, `uname`, `forc`) VALUES
(23, 'Document 1', 'sfafs', 'IT', 'uploads/Letter to Oza.docx', '2018-04-04', 'Principal', 'faculty'),
(24, 'h,kjhlhl', 'lj;oj;j;', 'IT', 'uploads/module_table_bottom.png', '2018-04-04', 'Principal', 'faculty'),
(25, 'hhkjhkjm', 'uiuijkkj', 'IT', 'uploads/BE IT Syllabus.pdf', '2018-04-04', 'Principal', 'faculty'),
(26, 'lllllll', 'test', 'IT', 'uploads/BOSCompEngMinutesOfMeetingOn2009Jan16.pdf', '2018-06-22', 'Hod IT', 'faculty');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `fid` varchar(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pwd` varchar(40) NOT NULL,
  `dept` varchar(40) NOT NULL,
  `designation` varchar(40) NOT NULL,
  `code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `fid`, `name`, `email`, `pwd`, `dept`, `designation`, `code`) VALUES
(35, '120', 'Principal', 'princ@q.com', '45144950bfc76c567750adb9d055eb9b', 'IT', 'Principal', ''),
(36, '789', 'Hod IT', 'ithod@q.com', '884e38214f74d3f7945b47e05f63f6bd', 'IT', 'HOD', 'b98e0e253bb814ca221493e5eec50dfcd4369761'),
(37, '5545', 'HOD Comp', 'comphod@q.com', 'b1faab677626cf1b3fdb23359155f5a4', 'Comp', 'HOD', ''),
(38, '7553', 'Prof IT', 'profit@q.com', '8cb554127837a4002338c10a299289fb', 'IT', 'Professor', ''),
(39, '885', 'profcomp', 'profcomp@q.com', '6ce7bdd648b059baf1d39962d105b70c', 'Comp', 'Professor', '');

-- --------------------------------------------------------

--
-- Table structure for table `fnotes`
--

CREATE TABLE `fnotes` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `note` varchar(200) NOT NULL,
  `desg` varchar(40) NOT NULL,
  `dept` varchar(40) NOT NULL,
  `folder` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fnotes`
--

INSERT INTO `fnotes` (`id`, `name`, `note`, `desg`, `dept`, `folder`) VALUES
(3, 'Principal', 'testing the notes', 'Principal', 'IT', 'New'),
(4, 'Principal', 'testing the notes', 'Principal', 'IT', 'New'),
(5, 'Hod IT', 'test\r\n', 'HOD', 'IT', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `folder`
--

CREATE TABLE `folder` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(200) NOT NULL,
  `closedate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `folder`
--

INSERT INTO `folder` (`id`, `name`, `date`, `description`, `closedate`) VALUES
(1, 'New', '2018-04-24', 'folder', '0000-00-00'),
(2, 'profcomp', '2018-06-24', 'aaa', NULL),
(3, 'sdfsdf', '2018-06-25', 'gsdsdg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `foldercon`
--

CREATE TABLE `foldercon` (
  `id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `docname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foldercon`
--

INSERT INTO `foldercon` (`id`, `fname`, `docname`) VALUES
(1, 'New', 'Document 1');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `note` varchar(200) NOT NULL,
  `desg` varchar(40) NOT NULL,
  `dept` varchar(40) NOT NULL,
  `doc` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `name`, `note`, `desg`, `dept`, `doc`) VALUES
(1, 'Principal', 'test', 'Principal', 'IT', 'h,kjhlhl'),
(2, 'Principal', 'test', 'Principal', 'IT', 'h,kjhlhl'),
(3, 'Principal', 'testing some notes here\r\n', 'Principal', 'IT', 'Document 1'),
(4, 'Principal', 'testing some notes here\r\n', 'Principal', 'IT', 'Document 1'),
(5, 'Principal', 'testing some notes here\r\n', 'Principal', 'IT', 'Document 1'),
(6, 'Hod IT', 'hello\r\n', 'HOD', 'IT', 'lllllll');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `date` date NOT NULL,
  `done` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `verify`
--

CREATE TABLE `verify` (
  `id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `verified` varchar(3) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verify`
--

INSERT INTO `verify` (`id`, `title`, `fname`, `verified`, `date`) VALUES
(18, 'Document 1', 'Hod IT', 'yes', '2018-04-04'),
(19, 'Document 1', 'HOD Comp', 'no', NULL),
(20, 'Document 1', 'Prof IT', 'yes', '2018-04-04'),
(21, 'hhkjhkjm', 'HOD Comp', 'no', NULL),
(22, 'lllllll', 'Prof IT', 'no', NULL),
(23, 'lllllll', 'Hod IT', 'yes', '2018-06-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `backtrack`
--
ALTER TABLE `backtrack`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clerk`
--
ALTER TABLE `clerk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fnotes`
--
ALTER TABLE `fnotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `folder`
--
ALTER TABLE `folder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foldercon`
--
ALTER TABLE `foldercon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verify`
--
ALTER TABLE `verify`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access`
--
ALTER TABLE `access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `backtrack`
--
ALTER TABLE `backtrack`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clerk`
--
ALTER TABLE `clerk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `fnotes`
--
ALTER TABLE `fnotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `folder`
--
ALTER TABLE `folder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `foldercon`
--
ALTER TABLE `foldercon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `verify`
--
ALTER TABLE `verify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
