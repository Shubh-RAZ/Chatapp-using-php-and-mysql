-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2020 at 07:31 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mychat`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `comment_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`user_id`, `post_id`, `comment`, `comment_date`) VALUES
(4, 16, 'talha ki maa ki choot', '2020-08-07 16:17:50'),
(4, 16, 'talha ki maa ki choot', '2020-08-07 16:19:51');

-- --------------------------------------------------------

--
-- Table structure for table `manju`
--

CREATE TABLE `manju` (
  `friends_id` int(11) NOT NULL,
  `friend_requests` varchar(64) DEFAULT NULL,
  `status` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `msg_sub` varchar(255) NOT NULL,
  `msg_topic` varchar(255) NOT NULL,
  `reply` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `msg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mythought`
--

CREATE TABLE `mythought` (
  `topic_id` int(11) NOT NULL,
  `topic_name` varchar(100) NOT NULL,
  `topic_content` varchar(255) NOT NULL,
  `topic_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mythought`
--

INSERT INTO `mythought` (`topic_id`, `topic_name`, `topic_content`, `topic_date`) VALUES
(15, 'final', 'check', '2020-07-03 10:35:25'),
(16, 'hi ', 'just a test\r\n', '2020-07-29 05:35:44');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_content` varchar(255) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `santosh`
--

CREATE TABLE `santosh` (
  `friends_id` int(11) NOT NULL,
  `friend_requests` varchar(64) DEFAULT NULL,
  `status` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `talha`
--

CREATE TABLE `talha` (
  `friends_id` int(11) NOT NULL,
  `friend_requests` varchar(64) DEFAULT NULL,
  `status` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `talha`
--

INSERT INTO `talha` (`friends_id`, `friend_requests`, `status`) VALUES
(10, 'vamps', 'NOT ACCEPTED'),
(7, 'manju', 'NOT ACCEPTED'),
(7, 'manju', 'NOT ACCEPTED');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_country` text NOT NULL,
  `user_gender` text NOT NULL,
  `user_birthday` date NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_status` varchar(100) NOT NULL,
  `ver_code` int(11) NOT NULL,
  `posts` int(11) NOT NULL,
  `current_status` varchar(100) NOT NULL,
  `user_last_login` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_country`, `user_gender`, `user_birthday`, `user_image`, `user_reg_date`, `user_status`, `ver_code`, `posts`, `current_status`, `user_last_login`) VALUES
(7, 'manju', 'manjunath', 'manju@gmail.com', 'Nepal', 'Male', '2020-08-10', 'image.jpg', '2020-08-10 03:58:18', 'unverified', 1473209503, 0, 'online', '2020-08-10 03:58:18'),
(8, 'talha', 'talha1234', 'talha@gmail.com', 'India', 'Male', '2020-08-10', 'image.jpg', '2020-08-10 04:03:32', 'unverified', 327730287, 0, 'online', '2020-08-10 04:03:32'),
(9, 'santosh', 'santosh1234', 'santosh@gmail.com', 'India', 'Male', '2020-08-10', 'image.jpg', '2020-08-10 04:08:06', 'unverified', 1253930347, 0, '', '2020-08-10 04:08:06'),
(10, 'vamps', 'vamps1234', 'vamps@gmail.com', 'India', 'Male', '2020-08-10', 'image.jpg', '2020-08-10 04:11:22', 'unverified', 285588573, 0, 'online', '2020-08-10 04:11:22');

-- --------------------------------------------------------

--
-- Table structure for table `users_chat`
--

CREATE TABLE `users_chat` (
  `msg_id` int(11) NOT NULL,
  `sender_username` varchar(255) NOT NULL,
  `receiver_username` varchar(255) NOT NULL,
  `msg_content` varchar(255) NOT NULL,
  `msg_status` text NOT NULL,
  `msg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_chat`
--

INSERT INTO `users_chat` (`msg_id`, `sender_username`, `receiver_username`, `msg_content`, `msg_status`, `msg_date`) VALUES
(139, 'user2', '', 'hi user', 'unread', '2020-07-01 06:56:19'),
(152, 'talha', 'user2', 'hi', 'read', '2020-07-28 14:47:24'),
(153, 'user2', 'talha', 'bhai', 'read', '2020-07-28 14:58:12'),
(155, 'user3', 'talha', 'hello', 'read', '2020-07-29 06:25:06'),
(156, 'talha', 'user2', 'hbkhb', 'unread', '2020-08-04 12:51:35'),
(159, 'Talha', 'Shubh', 'hi This is Talha Here', 'read', '2020-08-05 16:14:24'),
(161, 'Shubh', 'Talha', 'hi this is shubham here', 'unread', '2020-08-06 10:52:54'),
(162, 'Shubh', 'Talha', 'gvjgbjhbklhbkjnkjnwfkwjendwekjdwnekjdwendkjwnd', 'unread', '2020-08-06 11:14:41'),
(165, 'Shubh', 'User2', 'hi this is user2 here', 'unread', '2020-08-06 13:13:53'),
(166, 'Shubh', 'Talha', 'zvdzdvzd', 'unread', '2020-08-09 16:10:40');

-- --------------------------------------------------------

--
-- Table structure for table `vamps`
--

CREATE TABLE `vamps` (
  `friends_id` int(11) NOT NULL,
  `friend_requests` varchar(64) DEFAULT NULL,
  `status` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vamps`
--

INSERT INTO `vamps` (`friends_id`, `friend_requests`, `status`) VALUES
(7, 'manju', 'NOT ACCEPTED');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `mythought`
--
ALTER TABLE `mythought`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_chat`
--
ALTER TABLE `users_chat`
  ADD PRIMARY KEY (`msg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mythought`
--
ALTER TABLE `mythought`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users_chat`
--
ALTER TABLE `users_chat`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
