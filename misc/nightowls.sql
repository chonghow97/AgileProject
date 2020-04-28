-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2020 at 07:16 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nightowls`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(225) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `role` varchar(30) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `username`, `password`, `firstName`, `lastName`, `email`, `role`) VALUES
(1, 'admin', 'admin123', 'Lucas', 'Mark', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `type` varchar(30) NOT NULL,
  `venue` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `comment_post_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `comment` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `username` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `username`, `date`, `content`) VALUES
(9, 'Lorem Ipsum test', 'student', '2020-04-28', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean at nisl dignissim, volutpat mi at, accumsan diam. Morbi vel fringilla enim. Nullam sagittis suscipit mollis. Pellentesque lobortis, ligula et auctor ultricies, libero sapien lacinia est, vel posuere nisl elit quis velit. Curabitur a lobortis urna. Praesent et nibh at augue volutpat iaculis. Sed suscipit sapien diam, in pharetra libero blandit a. Donec lobortis diam et ex suscipit pellentesque. Vivamus feugiat, tortor non finibus dictum, tortor enim congue sem, sit amet commodo urna nunc ut nibh.\r\n\r\nMauris venenatis rhoncus nibh quis lobortis. Sed vel dolor tempus leo dictum tristique non id lorem. Donec viverra turpis eget metus feugiat pulvinar. Nullam fermentum venenatis tincidunt. Praesent tempor dictum posuere. Morbi ultrices justo vitae purus suscipit placerat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum aliquet porttitor sem sed faucibus. In consectetur vehicula mollis. Proin fringilla velit et ipsum consequat, sit amet eleifend enim ultrices. Ut elementum leo ut quam rhoncus, non mattis turpis lobortis. Fusce ac mattis nisi. Pellentesque et libero erat.\r\n\r\nNam molestie congue nisl ut blandit. Maecenas non urna placerat, pharetra dolor a, faucibus neque. Nullam lacus nisi, bibendum sodales finibus vitae, egestas eu neque. Nam sed lectus at erat volutpat maximus nec quis ex. Etiam sed lectus eros. Fusce imperdiet luctus efficitur. Vestibulum facilisis eros consectetur lorem aliquam tempor. Aliquam erat volutpat. Ut dictum dui quis orci ullamcorper, quis egestas enim tincidunt. Nunc rutrum eu mauris sed porttitor. Donec vel orci sit amet elit lobortis viverra eu quis metus. Suspendisse ac orci luctus, scelerisque leo id, gravida massa. Fusce elit elit, luctus ut laoreet sed, aliquet nec dolor. Vivamus convallis ut massa a posuere.\r\n\r\nNulla ac arcu nunc. In non enim ex. Mauris sagittis sollicitudin dui. Proin turpis justo, rutrum quis turpis eu, vulputate suscipit nunc. Aliquam efficitur placerat ipsum, et porta neque condimentum in. Cras aliquet ante pretium auctor luctus. Pellentesque egestas elit sed erat interdum, vel cursus velit condimentum. Aenean imperdiet orci vitae lacus sodales, non lobortis tortor fringilla. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed scelerisque metus a luctus maximus. Cras nec hendrerit ex, in blandit metus. Donec cursus, nulla nec lacinia convallis, sapien sapien tempor nisi, dapibus mollis risus magna non nulla. Curabitur elementum, tellus sed posuere aliquam, tortor sapien lacinia nisl, a maximus nisl neque nec felis. In iaculis tellus nunc, at varius libero convallis vitae. Curabitur sed mollis felis, a dignissim risus.\r\n\r\nMorbi eget leo vitae lorem luctus lacinia vel vel sapien. Nullam in nisl ac magna euismod vestibulum. Donec interdum lacus vel ornare rutrum. Duis at sapien eu velit tempus auctor. Donec semper ipsum non urna maximus eleifend. Sed lacinia ligula ut lacus interdum pellentesque. Ut dui arcu, molestie vel mi in, imperdiet luctus velit. Nam bibendum lacus mauris, a dignissim arcu ullamcorper et. Aenean viverra mollis dapibus. Mauris at vestibulum tortor. Phasellus sollicitudin sed urna a iaculis.');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studId` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Tutor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studId`, `username`, `password`, `firstName`, `lastName`, `email`, `Tutor`) VALUES
(1, 'junecrawford', 'jc123', 'June', 'Crawford', 'junecrawford12@gmail.com', 0),
(2, 'blairhooper', 'bh123', 'Blair', 'Hooper', 'blairhoope32@gmail.com', 0),
(3, 'ellenrory', 'er123', 'Ellen', 'Rory', 'rory123@gmail.com', 0),
(4, 'berlynnHarris', 'bh123', 'Berlynn', 'Harris', 'berlynnHarris66@gmail.com', 0),
(10, 'geraldhansen', '*3E7A3F571C1BFC3E88BB2AC74B0ED3354AA27988', 'Gerald', 'Hansen', 'geraldhansen123@gmail.com', 0),
(11, 'student', 'student123', 'Samuel Matthew', 'Joel', 'student@gmail.com', 0),
(13, 'James Richard', 'jr321', 'James ', 'Richard', 'jamesrichard@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(11) NOT NULL,
  `thread` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tutor`
--

CREATE TABLE `tutor` (
  `tutorId` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutor`
--

INSERT INTO `tutor` (`tutorId`, `username`, `password`, `firstName`, `lastName`, `email`) VALUES
(1, 'alissawatson', 'aw123', 'Alissa', 'Watson', 'alissawatson123@gmail.com'),
(2, 'andreavaughn', 'av123', 'Andrea', 'Vaughn', 'andreavaughn123@gmail.com'),
(3, 'parkerfernandez', 'pf123', 'Parker', 'Fernandez', 'parkerfernandez123@gmail.com'),
(8, 'dianamassey', 'dm123', 'Diana', 'Massey', 'dianamassey123@gmail.com'),
(11, 'tutor', 'tutor123', 'Susan', 'Grace', 'tutor@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `upload_id` int(11) NOT NULL,
  `upload_thread_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `upload` text NOT NULL,
  `comment` varchar(225) NOT NULL DEFAULT 'No comment',
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studId`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);

--
-- Indexes for table `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`tutorId`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`upload_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tutor`
--
ALTER TABLE `tutor`
  MODIFY `tutorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `upload_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
