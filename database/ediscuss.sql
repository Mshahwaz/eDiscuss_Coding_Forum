-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2021 at 02:41 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ediscuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(8) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_desc` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_desc`, `created`) VALUES
(1, 'Python', 'Python is an interpreted high-level general-purpose programming language. Its design philosophy emphasizes code readability with its use of significant indentation. ', '2021-08-26 22:17:18'),
(2, 'Javascript', 'JavaScript, often abbreviated as JS, is a programming language that conforms to the ECMAScript specification. ', '2021-08-26 22:17:54'),
(3, 'Django', 'Django is a Python-based free and open-source web framework that follows the model–template–views architectural pattern.', '2021-08-27 19:41:17'),
(4, 'Flask', 'Flask is a micro web framework written in Python. It is classified as a microframework because it does not require particular tools or libraries.', '2021-08-27 19:41:45'),
(5, 'C', 'C is a general-purpose, procedural computer programming language supporting structured programming, lexical variable scope, and recursion, with a static type system. ', '2021-08-29 23:47:17'),
(6, 'C++', 'C++ is a general-purpose programming language created by Bjarne Stroustrup as an extension of the C programming language, ', '2021-08-29 23:48:34'),
(7, 'Php', 'PHP is a general-purpose scripting language geared towards web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1994.', '2021-08-29 23:49:42'),
(8, 'Java', 'Java is a high-level, class-based, object-oriented programming language that is designed to have as few implementation dependencies as possible.', '2021-08-29 23:50:09');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(8) NOT NULL,
  `comment_desc` text NOT NULL,
  `thread_id` int(7) NOT NULL,
  `comment_by` int(8) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_desc`, `thread_id`, `comment_by`, `comment_time`) VALUES
(1, 'this is a comment add from database.', 1, 1, '2021-08-28 12:56:54'),
(2, 'somebody please fix this', 2, 2, '2021-08-28 13:10:36'),
(3, 'This is a long paragraph written to show how the line-height of an element is affected by our utilities. Classes are applied to the element itself or sometimes the parent element. These classes can be customized as needed with our utility API.', 6, 3, '2021-08-28 13:18:37'),
(4, 'This is a long paragraph written to show how the line-height of an element is affected by our utilities. Classes are applied to the element itself or sometimes the parent element. These classes can be customized as needed with our utility API.', 6, 4, '2021-08-28 13:21:45'),
(5, 'wsedwdw', 7, 5, '2021-08-28 14:38:44'),
(6, 'this is a comment', 1, 0, '2021-08-29 17:39:26'),
(7, 'this is a comment', 8, 0, '2021-08-29 17:42:58'),
(8, 'this ', 8, 0, '2021-08-29 17:43:05'),
(9, 'this comment is after email login\r\n', 2, 16, '2021-08-29 17:54:52'),
(10, 'start with basics', 10, 17, '2021-08-29 18:24:51'),
(11, '&lt;script&gt; alert-Hello world&lt;/script&gt;', 3, 17, '2021-08-29 18:37:25'),
(12, '&lt;script&gt; alert-Hello world&lt;/script&gt;', 3, 17, '2021-08-29 18:39:00'),
(13, 'please refer code with harry youtube channel', 4, 16, '2021-08-29 23:34:31'),
(14, 'You are not able to post a *uking hack', 11, 16, '2021-08-29 23:40:57');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(7) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_cat_id` int(7) NOT NULL,
  `thread_user_id` int(7) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES
(1, 'unable to install pyaudio in windows.', 'i am unable to install pyaudio in windows', 2, 5, '2021-08-27 21:34:58'),
(2, 'Not able to use python', 'please help me.', 1, 4, '2021-08-27 21:50:02'),
(3, 'Unable to understand list ', 'i am unable to understand list in pyhton please help me.', 1, 7, '2021-08-28 11:27:53'),
(4, 'learn javascript', 'i want to learn javascript', 2, 8, '2021-08-28 11:34:29'),
(5, 'yut ', 'sdjgsj', 1, 1, '2021-08-28 12:32:06'),
(6, 'fetch api not working', 'i am i trouble fetch api not working in Ms edge.', 4, 6, '2021-08-28 12:34:04'),
(7, 'edasd', 'sdsdsdsd', 1, 6, '2021-08-28 14:38:24'),
(8, 'this comment is after login', 'there is problem', 1, 0, '2021-08-29 17:41:08'),
(9, 'this sdjgh', 'shad', 1, 16, '2021-08-29 18:01:02'),
(10, 'i want to learn Jquery ', 'please help me', 4, 17, '2021-08-29 18:24:13'),
(11, '&lt;script&gt;You are hacked&lt;/script&gt;', 'Alert you are hacked &lt;script&gt;', 1, 17, '2021-08-29 19:07:25'),
(12, 'pointers in C', 'Please explain to me the concept of pointer in C', 5, 19, '2021-09-02 23:45:34'),
(13, 'OOPS in php', 'WHat are access modifiers in oops php?', 7, 20, '2021-10-26 13:05:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(8) NOT NULL,
  `user_email` varchar(20) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `user_email`, `user_pass`, `timestamp`) VALUES
(1, 'dfd@djf', 'gsdfgg', '2021-08-28 13:49:44'),
(2, 'shahwaz@12', '123asd', '2021-08-28 14:28:41'),
(3, 'seds@dfd', 'sdfdfs', '2021-08-28 14:29:59'),
(4, 'shah@gmail.com', 'Mshah', '2021-08-28 23:16:49'),
(16, 'mshah@1221', '$2y$10$d6vznAKEBLMt7c4sRpEckuZeKYEGBN3YXH6nIzfZK6/Ws7B6zowwq', '2021-08-29 17:54:03'),
(17, 'shah', '$2y$10$UtGxMw2ls/rQPIacfPmBo.PhJUYVv3NlLPHdIfol5eyrzswRKH.Ty', '2021-08-29 18:23:08'),
(18, 'shah1212', '$2y$10$oraBPE4L6j2Bmq3PUgNZV.xPGXt9QXYtVUSs1sIEC6Itin9dHVRCe', '2021-08-29 19:35:49'),
(19, 'shah@1313', '$2y$10$zhAQmkgmXYIWdp6NhwTG8u5fYUTYzJFMOCinYOVTr65R0I5qfgyim', '2021-09-02 23:43:56'),
(20, 'akram123', '$2y$10$7fliyAvuOlpA1aRigrUBtehcMqjN6lYwTQ0w2y8CM8s62ZshsFwci', '2021-10-26 13:03:39');

-- --------------------------------------------------------

--
-- Table structure for table `user_contact`
--

CREATE TABLE `user_contact` (
  `sno` int(8) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_concern` text NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_contact`
--

INSERT INTO `user_contact` (`sno`, `user_name`, `user_email`, `user_concern`, `time`) VALUES
(1, 'shah', 'shah', 'iasijais', '2021-08-30 21:49:12'),
(2, 'shah', 'shah@1', 'insert it into database', '2021-08-30 21:53:46'),
(3, 'Hi', 'my@12', 'hu lu lu', '2021-08-30 21:59:11'),
(4, 'hio', 'SHa@12', 'fkmdkmkd', '2021-08-30 22:01:07'),
(5, 'sjos', 'zkjxj@12', 'dlskklfs', '2021-08-30 22:04:03'),
(6, 'sjos', 'zkjxj@12', 'dlskklfs', '2021-08-30 22:04:04'),
(16, 'sahh', 'shah@12', 'dwwdfsw', '2021-09-02 23:24:25'),
(17, 'sah', 'sjsj@12', 'wwed', '2021-09-02 23:26:42'),
(18, 'shah', 'sd@12', 'dwd', '2021-09-02 23:29:55'),
(19, 'rahul', 'rahul@1223', 'please help me', '2021-09-25 14:48:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_desc`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `user_contact`
--
ALTER TABLE `user_contact`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_contact`
--
ALTER TABLE `user_contact`
  MODIFY `sno` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
