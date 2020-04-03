-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2020 at 04:19 AM
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
-- Table structure for table `allocate`
--

CREATE TABLE `allocate` (
  `allocateId` int(11) NOT NULL,
  `allocate_tutor` varchar(225) NOT NULL,
  `allocate_student` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `meeting_type` varchar(30) NOT NULL,
  `venue` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `username`, `title`, `date`, `time`, `meeting_type`, `venue`, `comment`, `status`) VALUES
(41, 'student', 'Assignment', '2020-04-01', '09:00:00', 'Real', 'Classroom', 'Courserwork', 'Approved'),
(42, 'James Richard', 'Coursework', '2020-04-02', '11:30:00', 'Virtual', 'None', 'Coursework assignment file', 'Disapproved');

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

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `username`, `message`, `date`) VALUES
(23, 'Student', 'Hi Sir', '2020-04-01'),
(29, 'tutor', 'Hi student', '2020-04-02');

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
  `role` varchar(30) NOT NULL DEFAULT 'student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studId`, `username`, `password`, `firstName`, `lastName`, `email`, `role`) VALUES
(1, 'junecrawford', '*6691484EA6B50DDDE1926A220DA01FA9E575C18A', 'June', 'Crawford', 'junecrawford12@gmail.com', 'student'),
(2, 'blairhooper', '*FA35C895070370A8E0FAA793FED74F0CFDBF0F30', 'Blair', 'Hooper', 'blairhoope32@gmail.com', 'student'),
(3, 'ellenrory', '*84F164907546B257C16DDECEF4A812F6B53BB1C0', 'Ellen', 'Rory', 'rory123@gmail.com', 'student'),
(4, 'berlynnHarris', '*5050491B41CB33B1654946FC9A73980ED3398B58', 'Berlynn', 'Harris', 'berlynnHarris66@gmail.com', 'student'),
(5, 'wilson', '*F8D8635127425FA4728404E74CE078A4858FB632', 'Wilson', 'Sanders', 'wilsonsanders123@gmail.com', 'student'),
(6, 'rachellee', '*242CDBDE76385C008FEBAB372DE3836D669ECAFA', 'Rachel', 'Lee', 'rachellee123@gmail.com', 'student'),
(7, 'allanjohns', '*90A1E02148BBD73DA1D7BD9842DA87BE8A418712', 'Allan', 'Johns', 'allanjohn123@gmail.com', 'student'),
(8, 'arelyholland', '*2396488DAB1391917F9F4547C7B1D3F5E7B0A3A9', 'Arely', 'Holland', 'arelyholland123@gmail.com', 'student'),
(9, 'tyronechang', '*11BD51004DEED40B977E5F919D2E6E6C293A961D', 'Tyrone', 'Chang', 'tyronechang123@gmail.com', 'student'),
(10, 'geraldhansen', '*3E7A3F571C1BFC3E88BB2AC74B0ED3354AA27988', 'Gerald', 'Hansen', 'geraldhansen123@gmail.com', 'student'),
(11, 'student', 'student123', 'Samuel Matthew', 'Joel', 'student@gmail.com', 'student'),
(13, 'James Richard', 'jr321', 'James ', 'Richard', 'jamesrichard@gmail.com', 'student');

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
  `email` varchar(50) NOT NULL,
  `role` varchar(30) NOT NULL DEFAULT 'tutor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutor`
--

INSERT INTO `tutor` (`tutorId`, `username`, `password`, `firstName`, `lastName`, `email`, `role`) VALUES
(1, 'alissawatson', '*F2D4AC5311973E82879D4B832212BB66B1B90EA8', 'Alissa', 'Watson', 'alissawatson123@gmail.com', 'tutor'),
(2, 'andreavaughn', '*C47234366547E789588997F4DC2DB8197C125A85', 'Andrea', 'Vaughn', 'andreavaughn123@gmail.com', 'tutor'),
(3, 'parkerfernandez', '*27AAE1CB2017138EB2F1849C6C98478EB879FCC6', 'Parker', 'Fernandez', 'parkerfernandez123@gmail.com', 'tutor'),
(4, 'joannawoods', '*75916FA6AC9D0FF2DD9CB98CAED5AA1EEA626AA0', 'Joanna', 'Woods', 'joannawoods1223@gmail.com', 'tutor'),
(5, 'sammysutton', '*CAE63E62F3CB90F53A35D5A16BC7CAED7D578C8A', 'Sammy', 'Sutton', 'sammysutton123@gmail.com', 'tutor'),
(6, 'hayleebates', '*2291A16C63B3D01435F65438847501944A57A866', 'Haylee', 'Bates', 'hayleebates123@gmail.com', 'tutor'),
(7, 'charleesilva', '*ED2910D312B314CD3DDB5D11163F01B75ACB8E82', 'Charlee', 'Silva', 'hayleebates123@gmail.com', 'tutor'),
(8, 'dianamassey', '*076A995FF0AFD5D56DD0A6AA9105CDD67AEEB05A', 'Diana', 'Massey', 'dianamassey123@gmail.com', 'tutor'),
(9, 'kysononeal', '*1B7AFB3189046E2F5439DE349219C08A3A543F6F', 'Kyson', 'Oneal', 'kysononeal123@gmail.com', 'tutor'),
(10, 'shawncarlson', '*F0DE2018D6B92B3EF53B849390075AA0EBC407F1', 'Shawn', 'Carlson', 'shawncarlson123@gmail.com', 'tutor'),
(11, 'tutor', 'tutor123', 'Susan', 'Grace', 'tutor@gmail.com', 'tutor');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `upload_id` int(11) NOT NULL,
  `upload` text NOT NULL,
  `comment` varchar(225) NOT NULL DEFAULT 'No comment',
  `date` date NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`upload_id`, `upload`, `comment`, `date`, `status`) VALUES
(25, 'courseworks.PDF', 'Coursework assignment file', '2020-03-30', 'Disapproved'),
(28, 'images.png', 'Image of outdoor activity', '2020-04-03', 'Approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `allocate`
--
ALTER TABLE `allocate`
  ADD PRIMARY KEY (`allocateId`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studId`);

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
-- AUTO_INCREMENT for table `allocate`
--
ALTER TABLE `allocate`
  MODIFY `allocateId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tutor`
--
ALTER TABLE `tutor`
  MODIFY `tutorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `upload_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
