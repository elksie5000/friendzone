-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 29, 2018 at 09:32 PM
-- Server version: 5.6.34-log
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentid` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `createdtime` date NOT NULL,
  `authorid` int(200) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentid`, `comment`, `createdtime`, `authorid`, `post_id`) VALUES
(1, 'Say seomthing', '2018-04-28', 4, 1),
(2, 'Saying something again', '2018-04-28', 4, 45),
(3, 'Bored', '2018-04-28', 4, 45),
(4, 'Again', '2018-04-28', 4, 45),
(5, 'What a lovely picture!', '2018-04-29', 8, 52),
(6, 'Looks like something from a Suede album', '2018-04-29', 8, 50),
(7, 'Nice picture', '2018-04-29', 9, 50),
(8, 'A toucan - not flying yet, mind', '2018-04-29', 9, 52),
(9, 'Cats, eh?', '2018-04-29', 9, 53),
(10, 'Nice!', '2018-04-29', 10, 50),
(11, 'Laptops give you wings!', '2018-04-29', 10, 55),
(12, 'I quite like that picture. Can it fly with that beak?', '2018-04-29', 10, 52),
(13, 'Nice again', '2018-04-29', 10, 50),
(14, 'Stressed', '2018-04-29', 10, 54);

-- --------------------------------------------------------

--
-- Table structure for table `comment_post_link`
--

CREATE TABLE `comment_post_link` (
  `comment_post_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postid` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `authorid` int(11) NOT NULL,
  `createdtime` date NOT NULL,
  `image_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postid`, `title`, `description`, `authorid`, `createdtime`, `image_link`) VALUES
(50, 'Keele\'s tower block', 'This is an image of the O Block at the University of Keele\'s Horwood halls of residence.', 8, '2018-04-29', 'uploads/29042018120102o_block_keele.jpeg'),
(53, 'Smelling the daisies', 'A cat seems to be happy with a field of daisies. Photo source: Pixabay', 9, '2018-04-29', 'uploads/29042018152756kitty-2948404_960_720.jpg'),
(54, 'Stressed out', 'When does the working day finish? Argh! I can\'t cope.', 10, '2018-04-29', 'uploads/29042018153625girl-1064659_640.jpg'),
(55, 'Angel\'s wings?', 'A businesswoman with what appears to be angel wings. What do you think?', 11, '2018-04-29', 'uploads/29042018153744analytics-2697949_640.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag_link`
--

CREATE TABLE `post_tag_link` (
  `postid` int(11) NOT NULL,
  `tagid` int(11) NOT NULL,
  `post_tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tagid` int(11) NOT NULL,
  `tagname` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tagid`, `tagname`) VALUES
(2, 'toucans'),
(3, 'women'),
(4, 'animal'),
(5, 'buildings'),
(6, 'ducks'),
(7, 'keele'),
(8, 'business');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(255) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `second_name` varchar(25) NOT NULL,
  `email` varchar(52) NOT NULL,
  `password` varchar(520) NOT NULL,
  `bio` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `first_name`, `second_name`, `email`, `password`, `bio`) VALUES
(8, 'Tom', 'Hardy', 'th@gugle.com', '9ad04ef778df4a633fc01164d6b485ce0c6cbf7cabd0405ec9eb0b37c2f65f295b5a4384a59f1e6e8bc48c65c3e2e457c12013cd91d55d62016b6eebf34f5c87', 'Bain'),
(9, 'Ken', 'Livingstone', 'kl@gugle.com', '9ad04ef778df4a633fc01164d6b485ce0c6cbf7cabd0405ec9eb0b37c2f65f295b5a4384a59f1e6e8bc48c65c3e2e457c12013cd91d55d62016b6eebf34f5c87', 'A politician'),
(10, 'Damon', 'Albarn', 'da@gugle.com', '9ad04ef778df4a633fc01164d6b485ce0c6cbf7cabd0405ec9eb0b37c2f65f295b5a4384a59f1e6e8bc48c65c3e2e457c12013cd91d55d62016b6eebf34f5c87', 'I am a parody account'),
(11, 'Bob', 'Brewer', 'bb@gugle.com', '9ad04ef778df4a633fc01164d6b485ce0c6cbf7cabd0405ec9eb0b37c2f65f295b5a4384a59f1e6e8bc48c65c3e2e457c12013cd91d55d62016b6eebf34f5c87', NULL),
(12, '', '', 'w8t89@gm', '8cdb302555ae5db7caf6365736de0b442ed26382a3ec931f18aa9698578c8b37c97fa8e62aa83f2e4df7656c667286a5e883bd05cb37080d9cbe55799519e1f1', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentid`);

--
-- Indexes for table `comment_post_link`
--
ALTER TABLE `comment_post_link`
  ADD PRIMARY KEY (`comment_post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postid`);

--
-- Indexes for table `post_tag_link`
--
ALTER TABLE `post_tag_link`
  ADD PRIMARY KEY (`post_tag_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tagid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD KEY `userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `comment_post_link`
--
ALTER TABLE `comment_post_link`
  MODIFY `comment_post_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `post_tag_link`
--
ALTER TABLE `post_tag_link`
  MODIFY `post_tag_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tagid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
