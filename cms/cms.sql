-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2022 at 01:32 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(25, 'Baseball'),
(26, 'Basketball'),
(27, 'Football');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(12, 10, 'Marko', 'marko@gmail.com', 'Very nice post.', 'approved', '2022-11-23');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_autor` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_autor`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(10, 25, 'Baseball’s Longest Game', 'Norman L. Macht', '2022-11-23', 'baseball.jpg', 'The story of baseball’s longest-ever game\r\nOne of the exciting aspects of going to a ball game is the anticipation that you might see something you’ve never seen before or even something that nobody’s ever seen, like a batter hitting five home runs.\r\nI was watching baseball for 65 years before I saw a no-hitter.\r\n\r\nBut one thing I guarantee you and future generations of baseball fans will never see is a game like the one witnessed by 3,500 shivering fans in Boston on a Saturday afternoon more than 100 years ago: a 26-inning game between the Boston Braves and Brooklyn Dodgers (sometimes called the Robins for their popular manager Wilbert Robinson) that ended in a tie, in which both starting pitchers pitched the complete game.\r\n\r\nThis account of baseball’s longest game and the pitchers who went the distance is based primarily on my interview with one of those pitchers, Joe Oeschger, at his home in Ferndale, California, in 1986. - Norman L. Macht\r\n\r\n', 'baseball, longest game ever', 1, 'published'),
(11, 26, 'Shaquille ONeal: An Incredible Career but how good was he?', 'Tomas Milner', '2022-11-23', 'Shaquill.png', ' Shaquille O’Neal: Physical, Dominant, Playful and a Winner. How good was Shaq?\r\nLooking back at the incredible career of Shaquille O’Neal and answering the question… How good was he?\r\n“Peace I gotta go, I ain’t no joke, now I slam it, jam it, and make sure it’s broke!”  \r\n\r\nThose are some lyrics from a popular Rap song made in 1994 entitled “Can We Rock”.  What does the song have to do with the sport of basketball?  \r\n\r\nWould you believe that the line was uttered by one of basketball’s most dominant centers and players ever?  \r\n\r\nIn fact, an argument can be made that this man is possibly the most physically dominant player in all of the professional sports worldwide.  \r\n\r\nThe inability of defenders to stop him left an impact on the sport that lends itself to the idea that there has never been, nor will there ever be, anyone greater to play in the NBA.  The beauty of the series of articles about The Greatest Players In NBA History is that there is no particular order, and the list of those who are on and off of it, was designed to spark great debate.   ', 'Shaquille ONeil basketball Lakers Greatest Players NBA ', 0, 'published'),
(12, 27, 'The 5 Best Belgian Footballers of all-time', 'Markos Alonso', '2022-11-23', 'LukakuVertonghen.jpg', '   The 5 Greatest ever Belgian Footballers\r\nWhile often underappreciated due to a lack of major international honours, Belgium is still widely renowned for the amount of talent it produces on a regular basis. But who are Belgium’s greatest players?\r\nThe Belgians tend to perform well in major tournaments despite a dearth of silverware; and these performances stretch across different eras, illustrating a collective mentality gotten through patriotism and pride rather than solely individual quality.\r\n\r\nHere then, are 5 Belgians who have best represented their country in football.', 'Lukaku, Vertongen, Belgium, football, players, greatest', 0, 'published');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_randSalt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `user_randSalt`) VALUES
(1, 'uros98', 'uros', 'Uros', 'Radivojevic', 'ukriadivojevic@gmail.com', 'slika5.jfif', 'admin', '');

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
