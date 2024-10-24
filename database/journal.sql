-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2024 at 02:00 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `journal`
--

-- --------------------------------------------------------

--
-- Table structure for table `journal`
--

CREATE TABLE `journal` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `img_url` varchar(255) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `journal`
--

INSERT INTO `journal` (`id`, `title`, `content`, `img_url`, `create_at`, `updated_at`, `type`) VALUES
(56, 'A Quiet Day at the Park', 'Today, I spent a peaceful afternoon at the park, just sitting on a bench and watching the world go by. The trees were starting to change color, and the air had a crispness to it that signaled autumn. I hadn&rsquo;t realized how much I needed this break from the usual fast pace of life. Watching the leaves fall was almost meditative, and for a brief moment, it felt like time had slowed down.\r\n\r\nI also noticed a few families enjoying picnics and kids playing in the distance, which added to the warmth of the day. It reminded me of how small, simple moments can be the most fulfilling. I stayed there for a while, soaking in the tranquility. Days like this are rare, and I&rsquo;m glad I got to experience it.', 'images/pixel_art_background_practice2_by_raisinbreadx_de3vi9c-fullview.jpg', '2024-10-24 11:43:32', '2024-10-24 11:47:45', 'travel'),
(57, 'Unexpected News', ' I received some surprising news today at work&mdash;my project got chosen for a big presentation next week! It came out of the blue, and although I&rsquo;m excited, I also feel a wave of nervousness. This could be a great opportunity for me to showcase my ideas, but I want to make sure I&rsquo;m fully prepared. I&rsquo;ve already started planning the outline and gathering my thoughts.\r\n\r\nTonight, I went over some key points and decided on the main message I want to convey. It&rsquo;s going to take a lot of work to get everything ready, but I&rsquo;m determined to give it my best. Although the pressure is building, I can feel the adrenaline pushing me to stay focused. I know it&rsquo;ll be worth it in the end.', 'images/360_F_573695700_oqLeByUUoo6Nv6MVgtzSNjEHlrPteADv.jpg', '2024-10-24 11:48:29', '2024-10-24 11:48:29', 'home'),
(58, 'A Fun Night with Friends', 'Tonight was one for the books. We all went out for dinner at our favorite spot and spent hours just talking, laughing, and catching up on life. It&rsquo;s been a while since we all got together, and I didn&rsquo;t realize how much I missed being around my friends. The food was amazing, but the company was even better.\r\n\r\nAfter dinner, we walked around the city for a bit, talking about everything from work stress to weekend plans. There&rsquo;s something so refreshing about hanging out with people who know you well and make you feel at ease. It was exactly the kind of night I needed&mdash;a reminder that no matter how busy life gets, moments like these are what really matter.', 'images/aa040ec6845c62139afbfa67c7988540.jpg', '2024-10-24 11:48:50', '2024-10-24 11:48:50', 'friends'),
(59, 'Learning Something New', 'I decided to try cooking a new dish today, something I&rsquo;ve never attempted before. I followed a recipe I found online and spent the afternoon in the kitchen. It didn&rsquo;t turn out perfectly&mdash;there were definitely a few missteps along the way&mdash;but I&rsquo;m proud that I gave it a try. The experience taught me that cooking is more about the process than the result.\r\n\r\nAfterward, I sat down to enjoy what I had made, even though it wasn&rsquo;t exactly like the picture in the recipe. It was a reminder that trying new things is important, even if you don&rsquo;t get them right the first time. I&rsquo;ll definitely try again and maybe even experiment with different ingredients next time.', 'images/images (1).jpeg', '2024-10-24 11:49:09', '2024-10-24 11:49:09', 'home'),
(60, 'A Lazy Afternoon', 'Today was one of those rare lazy afternoons where I had nothing planned, and it felt wonderful. I curled up with a book I&rsquo;ve been meaning to finish for weeks and just let myself get lost in the story. There&rsquo;s something magical about allowing yourself the freedom to do nothing without feeling guilty.\r\n\r\nAs the hours passed, I realized how much I needed this break from the constant rush. Sometimes, being still is the most productive thing you can do. It gave me time to reflect and recharge, and by the end of the day, I felt more relaxed than I&rsquo;ve been in a long time.', 'images/images.jpeg', '2024-10-24 11:49:34', '2024-10-24 11:49:34', 'home'),
(61, 'A Productive Workday', 'I finally tackled that long to-do list at work that I&rsquo;ve been putting off for days. Once I got started, the momentum built, and I found myself getting through tasks much faster than I expected. It felt great to check things off one by one and see my progress. There&rsquo;s something incredibly satisfying about finishing a day knowing you&rsquo;ve been productive.\r\n\r\nBy the end of the day, I was exhausted but content. I rewarded myself with a nice dinner and some time to unwind. It reminded me that even though some days feel overwhelming, pushing through and staying focused can make all the difference.', 'images/pixel-art-sun-building-sunset-wallpaper-preview.jpg', '2024-10-24 11:49:56', '2024-10-24 11:49:56', 'business'),
(62, 'A Rainy Evening', 'The rain started early in the evening, and I knew right away it was going to be a cozy night. I love the sound of rain hitting the window&mdash;it has a calming effect on me. I made a cup of tea, sat by the window, and just watched the rain fall for a while. It&rsquo;s moments like this that remind me how important it is to slow down and appreciate life&rsquo;s simple pleasures.\r\n\r\nAs the rain continued, I reflected on the week, thinking about the highs and lows. It&rsquo;s funny how the sound of rain can make you feel more introspective. By the end of the evening, I felt a sense of peace and clarity that I hadn&rsquo;t felt in a while. Rainy nights like this are rare, and I&rsquo;m glad I made the most of it.', 'images/pixel-art-town-city-waneella-hd-wallpaper-preview.jpg', '2024-10-24 11:50:16', '2024-10-24 11:50:16', 'home'),
(63, 'Catching Up with an Old Friend', 'I met up with an old friend for coffee today, and it was like no time had passed at all. We hadn&rsquo;t seen each other in years, but within minutes, we were deep in conversation, reminiscing about the old days and catching up on where life had taken us. It was comforting to realize that some friendships stay strong, no matter how much time has passed.\r\n\r\nWe talked about everything&mdash;work, family, and the challenges we&rsquo;ve both faced over the years. It was a reminder that even though life changes, some connections remain constant. By the time we parted ways, I felt uplifted and grateful for the reconnection.', 'images/Screenshot11-1920x1080-867128141c0a4282db76a07ae91d278e.jpg', '2024-10-24 11:50:45', '2024-10-24 11:50:45', 'friends'),
(64, 'A Tough Decision', 'I&rsquo;ve been wrestling with a tough decision at work lately, and today I spent a lot of time weighing the pros and cons. It&rsquo;s one of those situations where there isn&rsquo;t a clear right or wrong choice, and that&rsquo;s what makes it so difficult. I&rsquo;ve been thinking about what&rsquo;s best for my career and my personal growth, but it&rsquo;s not easy to find clarity.\r\n\r\nI talked it over with a few trusted colleagues, which helped me see things from different perspectives. While I still haven&rsquo;t made a final decision, I feel a little more confident about the direction I&rsquo;m leaning toward. I know that whatever choice I make, I&rsquo;ll have to trust myself and embrace the outcome.', 'images/adventure-3879655_960_720.jpg', '2024-10-24 11:51:03', '2024-10-24 11:51:03', 'home'),
(65, 'Feeling Grateful', 'Today, I took some time to reflect on all the things I&rsquo;m grateful for. It&rsquo;s so easy to get caught up in the stress and chaos of daily life that I sometimes forget how lucky I am. I thought about the supportive friends and family I have, the opportunities I&rsquo;ve been given, and the good health I enjoy. There&rsquo;s so much to be thankful for, even on tough days.\r\n\r\nTaking a moment to focus on gratitude shifted my perspective for the rest of the day. It&rsquo;s amazing how much lighter you feel when you focus on the positives instead of the negatives. I&rsquo;m going to try to make this a regular practice, especially on the days when I feel overwhelmed.', 'images/thwpNs.png', '2024-10-24 11:51:29', '2024-10-24 11:51:49', 'business');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `journal`
--
ALTER TABLE `journal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
