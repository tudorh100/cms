-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2022 at 05:45 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(15, 'new update'),
(17, 'css and bilogy'),
(18, 'html'),
(19, 'java and css');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(4, 15, 'joy', 'joy@gmail.com', 'gsgsgs', 'approved', '2022-07-09'),
(5, 12, 'pere', 'pere@yahoo.com', 'pere is comment ', 'approved', '2022-07-09'),
(6, 12, 'fidels', 'fide@yahoo.com', 'this is me fidelis egbo', 'approved', '2022-07-10'),
(7, 15, 'akachi', 'aka@gmail.com', 'yyyyr', ' Unpproved', '2022-07-10'),
(8, 16, 'danjuma', 'danjuma@yahoo.com', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Obcaecati odio maiores enim beatae vitae commodi tenetur nam eveniet voluptatem aliquam!\r\n', 'approved', '2022-07-11'),
(9, 16, '', '', '', ' Unpproved', '2022-07-16'),
(10, 16, '', '', '', ' Unpproved', '2022-07-16');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(14, 0, '', '', '2022-07-08', 'IMG-20201201-WA0010.jpg', '', '', 4, '4'),
(15, 0, 'ruby', 'emmanuel philip', '2022-07-08', './images/IMG-20201201-WA0021.jpg', 'this is the newest post done for now shaLorem ipsum dolor sit amet consectetur adipisicing elit. Quae qui sapiente asperiores laborum nam cupiditate pariatur optio, architecto \r\ndelectus maiores est maxime non quam voluptates accusamus voluptatum suscipit temporibus modi! Cum tempore provident accusamus nisi voluptates unde reiciendis, ipsam corporis exercitationem \r\nhic ea rerum odio nesciunt voluptate facilis veritatis voluptas sapiente. Nam obcaecati vero eveniet numquam minus sed adipisci hic.\r\n', 'ugolo, gracey,joy', 5, '4'),
(16, 0, 'hhh sami', 'dandy', '2022-07-10', './images/IMG-20201201-WA0006.jpg', 'lorem lorel lll', 'dandy,html', 3, 'published'),
(17, 17, 'html', 'deborah', '2022-07-12', 'IMG-20201201-WA0016.jpg', 'this sis jus a post conee', 'debi', 0, 'published'),
(18, 17, 'html', 'deborah', '2022-07-12', 'IMG-20201201-WA0016.jpg', 'this sis jus a post conee', 'debi', 0, 'published');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(2, 'emma', '1111', 'justice', 'esiri', 'jboy@yahoo.com', 'jjjd', 'subscriber', 'randsalt'),
(3, 'derako sam', '2222', 'dera ddddd', 'dera sally', 'dera@yahoo.com', 'demaco', 'admin', 'randsalt'),
(4, 'emmanemm', 'emma@yahoo.com', 'asikpo', 'daniel', 'hh@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystring22'),
(10, 'je', 'je@yahoo.com', '', '', 'ra4xQ3v5p/WRw', '', 'subscriber', '$2y$10$iusesomecrazystring22'),
(15, 'ben', 'raoFusANprziw', '', '', 'ben@yahoo.com', '', 'subscriber', '$2y$10$iiusesomecrazystring22'),
(16, 'sam', 'ra1pwfIuIVHso', '', '', 'sam@yahoo.com', '', 'subscriber', '$2y$10$iusesomecrazystring22'),
(18, 'eman', '$2y$12$VLmUfVWhD76fkDiP78mU6ubH/JxFrBV/q6zYoFFG3w0wlQRtnAcUa', '', '', 'etim@yahoo.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(19, 'berry', '$2y$12$9.oPFQCBeifwDFuZUxYZ3OFAq02hWjLthzOFZ7eL.9LWEodKidlva', '', '', 'berry@yahoo.com', '', 'admin', '$2y$10$iusesomecrazystrings22'),
(20, 'sabi', '$2y$10$IpKj1cM30TTYVWF/O2OqZ.Z8S6CqU3P7diKevm9jqwlJFyp6tTjny', 'sabi', 'sabi', 'sabi@yahoo.com', 'sabi', 'admin', '$2y$10$iusesomecrazystrings22');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(3) NOT NULL,
  `session` int(255) NOT NULL,
  `time` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
