-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 20, 2023 at 07:20 PM
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
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(20) NOT NULL DEFAULT 'undefined',
  `cat_desp` varchar(2047) NOT NULL DEFAULT 'description not available',
  `cat_img` text NOT NULL DEFAULT 'assets/img/cat2.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_desp`, `cat_img`) VALUES
(1, 'category 1', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. ', 'assets/img/cat1.png'),
(2, 'category 2', 'Cause dried no solid no an small so still widen. Tan.\r\n\r\n', 'assets/img/cat2.jpg'),
(43, 'Events & Culturals', 'Mitafest is the inter-college cultural festival of Madras Institute of Technology. The festival is held during the month of January or February every year. It is claimed to be the oldest inter-college festival in Chennai. It is the flagship event of MIT and an event of grandeur and extravaganza, drawing footfalls of more than 20,000 students from 100+ colleges for participating in 50+ events across the span of 3 days. It has thrived for more than 40 years and has blended along as the pride of our institute. \r\n', 'assets/img/img445026160.png'),
(45, 'MIT Clubs', 'University clubs, also known as college clubs or student organizations, are groups formed by students within a university or college to pursue shared interests, hobbies, causes, or activities.', 'assets/img/clubs.png'),
(47, 'Coding', '\"Coding\" refers to the process of writing instructions in a programming language to create software, applications, websites, and other digital solutions. It is the primary method through which programmers communicate with computers to make them perform specific tasks and functions.', 'assets/img/coding.jpg'),
(48, 'Gaming', 'Gaming is a form of interactive entertainment that involves playing video games on various platforms. It has become an integral part of modern culture and has a significant impact on society, technology, and the entertainment industry.', 'assets/img/gaming.jpg'),
(49, 'AI', 'Artificial Intelligence (AI) refers to the development of computer systems that can perform tasks that typically require human intelligence. These tasks include learning, reasoning, problem-solving, understanding natural language, and perceiving and interacting with the environment. AI aims to create intelligent machines that can simulate human-like behavior and make decisions without human intervention.', 'assets/img/ai.jpg'),
(50, 'Hostel', 'Hostel facilities are available for students studying at MIT to provide them with a comfortable and convenient living arrangement during their academic years.The hostels are equipped with basic facilities such as mess halls providing meals, recreational areas, study rooms, and common rooms where students can socialize and relax.', 'assets/img/mithostels.jpg'),
(52, 'Martial Arts', 'Martial arts are systems of structured practices and techniques developed for combat, self-defense, physical conditioning, mental discipline, and sometimes spiritual growth. These practices have evolved over centuries and across cultures, and they encompass a wide range of techniques, strategies, and philosophies.', 'assets/img/img450347999.png');

-- --------------------------------------------------------

--
-- Table structure for table `otp_login`
--

CREATE TABLE `otp_login` (
  `id` int(11) NOT NULL,
  `otp` int(11) NOT NULL,
  `is_expired` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `otp_login`
--

INSERT INTO `otp_login` (`id`, `otp`, `is_expired`, `created_at`) VALUES
(106, 892552, 0, '2023-07-20 17:15:38'),
(107, 266039, 0, '2023-07-20 18:13:28'),
(108, 703380, 0, '2023-07-20 18:16:16'),
(109, 813872, 0, '2023-07-20 18:24:19'),
(110, 533775, 0, '2023-07-20 18:37:20'),
(111, 645720, 0, '2023-07-20 18:48:31'),
(112, 774524, 0, '2023-07-20 18:49:18'),
(113, 439526, 0, '2023-07-21 11:19:14'),
(114, 351636, 0, '2023-07-21 11:29:46'),
(115, 336706, 0, '2023-07-21 12:25:54'),
(116, 769481, 0, '2023-07-21 12:42:36'),
(117, 775022, 0, '2023-07-21 17:38:20'),
(118, 359215, 0, '2023-07-21 17:39:05'),
(119, 346109, 0, '2023-07-21 17:45:32'),
(120, 826634, 0, '2023-07-21 17:52:04'),
(121, 220489, 0, '2023-07-21 18:13:59'),
(122, 427788, 0, '2023-07-21 18:15:15'),
(123, 701531, 0, '2023-07-21 18:16:55'),
(124, 687959, 0, '2023-07-21 18:18:40'),
(125, 233192, 0, '2023-07-21 18:19:13'),
(126, 601814, 0, '2023-07-21 18:20:26'),
(127, 920857, 0, '2023-07-21 18:21:21'),
(128, 989192, 0, '2023-07-21 18:21:44'),
(129, 211920, 0, '2023-07-21 18:22:13'),
(130, 681681, 0, '2023-07-21 18:23:01'),
(131, 637769, 0, '2023-07-21 18:25:24'),
(132, 205530, 0, '2023-07-21 18:26:52'),
(133, 969910, 0, '2023-07-21 18:38:41'),
(134, 101680, 0, '2023-07-21 19:14:00'),
(135, 790327, 0, '2023-07-21 19:24:57'),
(136, 981442, 0, '2023-07-21 19:28:23'),
(137, 466854, 0, '2023-07-22 14:52:23'),
(138, 876859, 0, '2023-07-22 16:47:19'),
(139, 644220, 0, '2023-07-22 18:05:42'),
(140, 114744, 0, '2023-07-22 18:10:00'),
(141, 558715, 0, '2023-07-22 18:20:40'),
(142, 223161, 0, '2023-07-22 18:45:48'),
(143, 600506, 0, '2023-07-22 19:10:48'),
(144, 755206, 0, '2023-07-22 19:21:45'),
(145, 938030, 0, '2023-07-22 19:33:10'),
(146, 841526, 0, '2023-07-24 15:22:23'),
(147, 588966, 0, '2023-07-24 16:20:10'),
(148, 792905, 0, '2023-07-24 16:24:33'),
(149, 507151, 0, '2023-07-28 07:08:06'),
(150, 343064, 0, '2023-07-28 09:58:23'),
(151, 486642, 0, '2023-07-28 16:32:24'),
(152, 899122, 0, '2023-07-29 18:44:09'),
(153, 594450, 0, '2023-08-02 10:12:57'),
(154, 746447, 0, '2023-08-10 07:30:26'),
(155, 375438, 0, '2023-08-10 12:59:03'),
(156, 618749, 0, '2023-08-10 12:59:07'),
(157, 802669, 0, '2023-08-11 19:45:57'),
(158, 624366, 0, '2023-08-11 19:55:43'),
(159, 177569, 0, '2023-08-12 12:21:15'),
(160, 172789, 0, '2023-08-13 08:06:03'),
(161, 467312, 0, '2023-08-13 08:06:13'),
(162, 242200, 0, '2023-08-13 08:06:24'),
(163, 139921, 0, '2023-08-14 12:08:41'),
(164, 814906, 0, '2023-08-18 15:30:22'),
(165, 192348, 0, '2023-08-18 16:50:20'),
(166, 961231, 0, '2023-08-18 17:13:23'),
(167, 132274, 0, '2023-08-18 17:52:20'),
(168, 780908, 0, '2023-08-18 17:52:30'),
(169, 102016, 0, '2023-08-18 17:52:41'),
(170, 257650, 0, '2023-08-20 15:31:22'),
(171, 859934, 0, '2023-08-20 15:33:01'),
(172, 419592, 0, '2023-08-20 15:54:48'),
(173, 949168, 0, '2023-08-20 16:26:14'),
(174, 623377, 0, '2023-08-20 16:39:40');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_cat` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL DEFAULT 'No title',
  `post_content` longtext NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `post_by` int(11) NOT NULL DEFAULT 1,
  `post_img` text NOT NULL DEFAULT 'no image'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_cat`, `post_title`, `post_content`, `post_date`, `post_by`, `post_img`) VALUES
(1, 1, 'post 1', 'Now led tedious shy lasting females off. Dashwood marianne in of entrance be on wondered possible building. Wondered sociable he carriage in speedily margaret. Up devonshire of he thoroughly insensible alteration. An mr settling occasion insisted distance ladyship so. Not attention say frankness intention out dashwoods now curiosity. Stronger ecstatic as no judgment daughter speedily thoughts. Worse downs nor might she court did nay forth these.\r\n\r\nOn then sake home is am leaf. Of suspicion do departure at extremely he believing. Do know said mind do rent they oh hope of. General enquire picture letters garrets on offices of no on. Say one hearing between excited evening all inhabit thought you. Style begin mr heard by in music tried do. To unreserved projection no introduced invitation.\r\n', '2023-07-06 14:38:40', 8, 'assets/img/p1.jpg'),
(2, 2, 'Karthickkannan from IT Department of MIT campus, Chromepet,Anna University,Chennai - Karthi verse', 'Admiration stimulated cultivated reasonable be projection possession of. Real no near room ye bred sake if some. Is arranging furnished knowledge agreeable so. Fanny as smile up small. It vulgar chatty simple months turned oh at change of. Astonished set expression solicitude way admiration.\r\n\r\nWrote water woman of heart it total other. By in entirely securing suitable graceful at families improved. Zealously few furniture repulsive was agreeable consisted difficult. Collected breakfast estimable questions in to favourite it. Known he place worth words it as to. Spoke now noise off smart her ready. ', '2023-07-06 14:39:58', 8, 'assets/img/MIT.jpg'),
(9, 2, 'Naruto Uzumaki from Hidden Leaf Village(Honohagakure) - Naruto verse', 'Woody equal ask saw sir weeks aware decay. Entrance prospect removing we packages strictly is no smallest he. For hopes may chief get hours day rooms. Oh no turned behind polite piqued enough at. Forbade few through inquiry blushes you. Cousin no itself eldest it in dinner latter missed no. Boisterous estimating interested collecting get conviction friendship say boy. Him mrs shy article smiling respect opinion excited. Welcomed humoured rejoiced peculiar to in an.\r\n\r\nIgnorant saw her her drawings marriage laughter. Case oh an that or away sigh do here upon. Acuteness you exquisite ourselves now end forfeited. Enquire ye without it garrets up himself. Interest our nor received followed was. Cultivated an up solicitude mr unpleasant.\r\n', '2023-07-06 14:39:58', 8, 'assets/img/naruto.jpeg'),
(10, 2, 'Pikachu form Electric type pokemons - Pokemon verse', 'Turned it up should no valley cousin he. Speaking numerous ask did horrible packages set. Ashamed herself has distant can studied mrs. Led therefore its middleton perpetual fulfilled provision frankness. Small he drawn after among every three no. All having but you edward genius though remark one.\r\n\r\nIn show dull give need so held. One order all scale sense her gay style wrote. Incommode our not one ourselves residence. Shall there whose those stand she end. So unaffected partiality indulgence dispatched to of celebrated remarkably. Unfeeling are had allowance own perceived abilities. ', '2023-07-06 14:58:14', 1, 'assets/img/pokemon.jpg'),
(13, 1, '$title', '$content', '0000-00-00 00:00:00', 1, '$image'),
(14, 2, 'let;s see', 'Enter your contetn here', '0000-00-00 00:00:00', 1, ''),
(15, 1, 'title', 'Enter your content here', '0000-00-00 00:00:00', 1, 'assets/img/Screenshot from 2023-07-15 09-45-09.png'),
(16, 1, 'title 134', 'Enter yor content here obvi second test', '2023-07-19 15:59:34', 1, 'assets/img/Screenshot from 2023-07-14 23-47-58.png'),
(17, 1, 'title image test', 'testing image uploading and local save', '2023-07-19 16:45:41', 1, 'assets/img/Screenshot from 2023-07-15 09-32-52.png'),
(18, 2, 'title test image', 'image testing', '2023-07-19 17:31:54', 1, 'assets/img/Screenshot from 2023-07-14 23-50-55.png'),
(19, 2, 'dfa', 'adfdaf', '2023-07-19 17:42:12', 1, 'assets/img/img290322478'),
(20, 1, 'cat1 post', 'dfaf', '2023-07-20 11:01:01', 1, 'assets/img/img110384447png'),
(22, 1, 'fasf', 'afd', '2023-07-20 13:14:34', 1, 'assets/img/img156110389.png'),
(23, 1, 'mascarade', 'Enter', '2023-07-22 17:38:50', 1, 'assets/img/img123411546.png'),
(24, 1, 'mascarade', 'Enter', '2023-07-22 17:45:06', 1, 'assets/img/img189211960.png'),
(25, 2, 'dont', 'dont use this .use MITCHAT BOT', '2023-07-22 18:07:02', 22, 'assets/img/img23411815.'),
(26, 1, 'why not', 'dafafdas', '2023-07-22 18:22:49', 1, 'assets/img/img127283709.'),
(29, 1, 'My first post', 'my first content....', '2023-08-02 10:14:31', 24, 'assets/img/img12330368.png'),
(30, 1, 'India', 'I am on the way to reach you', '2023-08-10 07:31:45', 26, 'assets/img/img133417805.jpg'),
(31, 45, 'Anyone from NSO?', 'NSO Sports event at MIT annexure ground,2023\r\n\r\nOur NSO conducted many competitions at our ground, and our 1st year students got 1st price in the 400 meters competition, our 2nd year students got 1st price in the Kho-kho competition.', '2023-08-10 09:42:12', 26, 'assets/img/img4561829144.png'),
(32, 43, 'What is \'Mitafest\'?', 'Mitafest at OAT, 2023\r\n\r\nMitafest is the great festival held in Madras Institute of Technology,Chrompet every year. Many celebrities are invited and they have been visited this fest and given their presence to it.', '2023-08-10 10:09:41', 26, 'assets/img/img4383996390.jpeg'),
(33, 43, 'Do you know about \'Homefest\'?', 'Homefest 2023 at MIT Hostels\r\n\r\nHomefest is the second great festival held at MIT hostels every year for hostel students.It is the hostel day for the MIT students.Many competition and dance performances will be conducted at MIT hostel for hostel boys.Hostel students will celebrate this fest, like the Mitafest. They enjoy a lot.', '2023-08-10 10:30:04', 26, 'assets/img/img4378458181.jpeg'),
(34, 43, 'Can you say ,what does \'Samhita\' means?', 'Samhita 2023 - IT Department\r\n\r\nSamhita is the another fest conducted by IT department students every year.\r\nIt is one of the famous coding event and it is an Intera college event .So that anyone can participate in this event.This will be a great opportunity to all to learn coding skills.', '2023-08-10 10:47:31', 26, 'assets/img/img4362974071.jpg'),
(35, 45, 'Do you know the about NSS?', 'National Service Scheme (NSS) is a youth-focused program in India that aims to instill the values of community service, social responsibility, and personal development among students. It operates under the Ministry of Youth Affairs and Sports, Government of India. Our MIT has a renowned name for our NSS club. NSS students serve our college as well our nation by giving many services to all.', '2023-08-10 11:02:08', 26, 'assets/img/img4522997206.jpeg'),
(36, 45, 'Anyone from YRC??', 'The Youth Red Cross (YRC) is a humanitarian organization affiliated with the Indian Red Cross Society (IRCS). It is a youth-focused wing that aims to mobilize and empower young people to contribute to humanitarian service, community development, and social welfare. The YRC promotes humanitarian values and principles among youth, fostering a spirit of volunteerism and empathy.In our college ,YRC students effectively involve to conduct Blood donation camps and to give different services for many Differently abled persons.', '2023-08-10 11:19:23', 26, 'assets/img/img457530956.jpg'),
(39, 47, 'Is there anyone have interest to make your own website to launch your ideas in it?', 'Web development refers to the process of creating websites or web applications. It involves various tasks, from designing the user interface and user experience to coding the functionality and ensuring the website\'s proper functionality on different devices and browsers.\r\nHas anyone know more about it?\r\nPlease add your knowledge to it in your replies.', '2023-08-10 12:43:36', 26, 'assets/img/webdev.jpg'),
(40, 47, 'Is there any person who are much interested in python programming?', 'Python is a versatile and widely-used programming language known for its simplicity, readability, and extensive libraries and frameworks. It is used for various purposes, including web development, data analysis, scientific computing, machine learning, artificial intelligence, automation, and more. \r\n\r\nPlease Contact me personally.\r\nEmail ID1 : karthickkannanakarthi@gmail.com or\r\nEmail ID2 : masterofinfinity@gmail.com', '2023-08-10 12:50:29', 26, 'assets/img/img4771676017.jpg'),
(41, 47, 'Can anyone join with me to develop an app for adding posts,blogs and videos?', 'App development refers to the process of creating software applications that run on various platforms, such as mobile devices, desktop computers, or web browsers. Apps serve a wide range of purposes, from entertainment and communication to productivity and business solutions.\r\n\r\n', '2023-08-10 12:55:43', 26, 'assets/img/img4770963538.png'),
(42, 52, 'Do you know how many martial arts styles does \'Bruce lee\' learnt?', 'These are based on his notes (Bruce Lee\'s Commenatries on The Martial Way and Tao of Jeet Kune Do Expanded Edition), book (Chinese Gung Fu A Philosophical Self Defense), Bruce Lee A Life biography, interviews, documentaries, etc. I tried to put them in order but the list is incomplete. IIRC Dan Inosanto said Bruce Lee trained in 26 styles which formed JKD. Last one is Jeet Kune Do, which is both a philosophy and style formed by combining all the arts he trained.\r\n\r\nI.Northern Kung Fu Styles\r\n\r\nWing Chun School\r\n\r\nBart Kuar Clan\r\n\r\nYing Yee\r\n\r\nNorthern Praying Mantis\r\n\r\nEagle Claw School\r\n\r\nTam Tuei\r\n\r\nSpringing Leg\r\n\r\nNorthern Sil Lum\r\n\r\nLaw Hon\r\n\r\nLost Track School\r\n\r\nWa K\'ung\r\n\r\nCh\'a K\'ung\r\n\r\nMonkey Style\r\n\r\nChuiang K\'ung Pai\r\n\r\n\r\n\r\nII.Southern Kung Fu Styles\r\n\r\nWing Chung\r\n\r\nSouthern Praying Mantis\r\n\r\nDragon Style\r\n\r\nWhite Crane School\r\n\r\nSouthern Sil Lum\r\n\r\nChoy Lay Fut\r\n\r\nHung K\'ung\r\n\r\nChoy Ga\r\n\r\nFut Ga\r\n\r\nMok Ga\r\n\r\nYal Gung Moon\r\n\r\nLi Ga\r\n\r\nLau Gai\r\n\r\n\r\n\r\nIII.Other Styles\r\n\r\nBoxing (St. Francis Xavier\'s College)\r\n\r\nFencing (Peter Lee, his older brother)\r\n\r\nEscrima (Dan Inosanto)\r\n\r\nKarate (he trained with many karatekas)\r\n\r\nTaekwondo (Jhoon Goo Rhee)\r\n\r\nTang Soo Do (Chuck Norris)\r\n\r\nHapkido (Ji Han-Jae)\r\n\r\nJudo (Jesse Glover, Gene Lebell)\r\n\r\nWrestling (Gene Lebell)\r\n\r\nJeet Kune Do\r\n\r\n\r\n\r\nIV.Weapons\r\n\r\nTabak toyok/nunchaku (Escrima)\r\n\r\nDouble sticks (Escrima)\r\n\r\nStaff (Wing Chun)\r\n\r\nKnife (Wing Chun)\r\n\r\nDarts (Kato and Way of the Dragon)', '2023-08-18 18:18:18', 24, 'assets/img/brucelee.jpg'),
(43, 52, 'Do you have knowledge about \'Kungfu\'?', 'Kung Fu, also spelled as \"gongfu\" or \"kungfu,\" is a term that encompasses a diverse range of traditional Chinese martial arts. The term \"kung fu\" translates to \"skill achieved through hard work\" or \"achievement gained through effort\" and is used to describe any discipline or skill that requires time, effort, and practice to master.\r\n\r\nKung Fu includes a wide variety of styles, techniques, and philosophies, each with its own unique characteristics and training methods. ', '2023-08-18 18:34:07', 1, 'assets/img/kungfu.jpeg'),
(44, 52, 'Can I learn online the use of a nunchaku? or must be like a traditional martial art?', 'The nunchaku is a traditional Okinawan weapon that consists of two sticks connected by a chain or rope. It was originally used as a farming tool but has become associated with martial arts due to its effectiveness as a defensive weapon. Learning to use nunchaku requires practice, patience, and proper technique to avoid self-injury.', '2023-08-18 18:41:31', 24, 'assets/img/nunchaku.jpeg'),
(45, 52, 'dfsf', 'afafdad', '2023-08-20 15:41:26', 29, 'assets/img/img5284293769.png'),
(46, 52, 'dafsf', 'affasf', '2023-08-20 15:41:48', 29, 'assets/img/img5247194148.jpeg'),
(47, 52, 'dafsf', 'affasf', '2023-08-20 15:44:05', 29, 'assets/img/img5293707321.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `reply_id` int(1) NOT NULL,
  `reply_post` int(11) NOT NULL,
  `reply_user` int(11) NOT NULL,
  `reply_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `reply_content` mediumblob NOT NULL,
  `replied_to` int(11) DEFAULT NULL,
  `reply_next` varchar(255) DEFAULT NULL,
  `indentation` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`reply_id`, `reply_post`, `reply_user`, `reply_time`, `reply_content`, `replied_to`, `reply_next`, `indentation`) VALUES
(237, 9, 1, '2023-07-20 09:15:40', 0x686f7720776173206974, NULL, NULL, 0),
(238, 9, 1, '2023-07-20 09:15:48', 0x616e6f74686572207265706c79, NULL, NULL, 0),
(239, 9, 1, '2023-07-20 09:15:58', 0x6d6174652069732069742061637475616c6c7920776f726b696e67, NULL, NULL, 0),
(240, 9, 1, '2023-07-20 10:31:05', 0x6d6174652069732069742061637475616c6c7920776f726b696e67, NULL, NULL, 0),
(241, 9, 1, '2023-07-20 10:31:53', 0x6d6174652069732069742061637475616c6c7920776f726b696e67, NULL, '352 351 333', 0),
(242, 10, 1, '2023-07-20 10:32:25', 0x6f68686f2066, NULL, NULL, 0),
(243, 10, 1, '2023-07-20 10:32:33', 0x6920677565737320697420776f726b732074686f0d0a, NULL, NULL, 0),
(244, 1, 1, '2023-07-20 12:13:49', 0x4e6172656e, NULL, '361 360', 0),
(245, 9, 1, '2023-07-20 13:12:06', 0x526176697368616e6b617220706f737465642074686973, NULL, '369 368 326', 0),
(246, 22, 1, '2023-07-20 13:15:24', 0x6c6b6a6466617366, NULL, NULL, 0),
(247, 1, 1, '2023-07-21 13:26:00', 0x74686973206973206d79207265706c79, NULL, NULL, 0),
(248, 1, 1, '2023-07-21 18:42:12', 0x6b6172746869636b206b616e6e616e, NULL, '350 349 348 347 346 345 344', 0),
(249, 20, 1, '2023-07-21 19:21:51', 0x676f6f6420706f7374, NULL, NULL, 0),
(250, 20, 1, '2023-07-21 19:24:11', 0x676f6f6420706f7374, NULL, NULL, 0),
(251, 20, 1, '2023-07-21 19:24:20', 0x6166736673, NULL, NULL, 0),
(252, 20, 1, '2023-07-21 19:24:24', 0x676f6f6420706f7374, NULL, NULL, 0),
(253, 13, 1, '2023-07-21 19:24:40', 0x61667366, NULL, NULL, 0),
(254, 2, 1, '2023-07-21 19:25:28', 0x6f68206d79, NULL, NULL, 0),
(255, 20, 1, '2023-07-22 13:33:35', 0x6e62, NULL, NULL, 0),
(256, 20, 1, '2023-07-22 13:34:16', 0x6e62, NULL, NULL, 0),
(257, 25, 1, '2023-07-22 18:07:35', 0x6869, NULL, NULL, 0),
(258, 26, 1, '2023-07-22 18:23:32', 0x7265706c7920692073686f756c64206368616e67652073686f756c646e277420493f0d0a, NULL, NULL, 0),
(259, 13, 1, '2023-07-22 18:45:26', 0x697320746865207573657220646966666572656e74206e6f770d0a, NULL, NULL, 0),
(260, 13, 1, '2023-07-22 18:47:07', 0x6a, NULL, NULL, 0),
(261, 13, 1, '2023-07-22 19:02:46', 0x736461667361, NULL, NULL, 0),
(262, 13, 1, '2023-07-22 19:03:32', 0x736461667361, NULL, NULL, 0),
(263, 13, 1, '2023-07-22 19:03:45', 0x7364616e672073657269616c2073656e74696d656e74, NULL, NULL, 0),
(264, 13, 1, '2023-07-22 19:04:51', 0x686f772069732074686973206e6f65, NULL, NULL, 0),
(265, 2, 1, '2023-07-22 19:08:58', 0x6c657427736565, NULL, '377 376 375', 0),
(266, 2, 1, '2023-07-22 19:10:14', 0x6c657427736565, NULL, NULL, 0),
(267, 2, 1, '2023-07-22 19:10:20', 0x7361646164, NULL, NULL, 0),
(268, 2, 1, '2023-07-22 19:11:38', 0x6b6a, NULL, NULL, 0),
(269, 2, 1, '2023-07-22 19:14:50', 0x6b6a, NULL, NULL, 0),
(270, 2, 1, '2023-07-22 19:14:59', 0x686f772069745c5c, NULL, NULL, 0),
(271, 23, 1, '2023-07-22 19:15:30', 0x6d6173636172616465, NULL, NULL, 0),
(272, 2, 1, '2023-07-22 19:20:54', 0x686f772069745c5c, NULL, NULL, 0),
(273, 2, 1, '2023-07-22 19:21:00', 0x686f772069742e2e, NULL, NULL, 0),
(274, 20, 1, '2023-07-22 19:22:25', 0x6c6f7473206f66207265706c69657321, NULL, NULL, 0),
(275, 26, 1, '2023-07-22 19:24:50', 0x7265706c7920692073686f756c64206368616e67652073686f756c646e277420493f0d0a, NULL, NULL, 0),
(276, 26, 1, '2023-07-22 19:24:57', 0x686a676b686b, NULL, NULL, 0),
(278, 23, 22, '2023-07-22 19:31:37', 0x61736661666166617366, NULL, NULL, 0),
(279, 20, 1, '2023-07-22 19:31:53', 0x6c6f7473206f66207265706c69657321, NULL, NULL, 0),
(280, 20, 1, '2023-07-22 19:32:03', 0x6c6f7473206f66207265706c73, NULL, NULL, 0),
(281, 10, 1, '2023-07-22 19:33:59', 0x656e6e616b75, NULL, NULL, 0),
(282, 20, 1, '2023-07-22 19:35:14', 0x6c6f7473206f66207265706c73, NULL, NULL, 0),
(283, 20, 1, '2023-07-22 19:35:20', 0x736466736673, NULL, NULL, 0),
(285, 2, 9, '2023-07-22 19:42:27', 0x2c, NULL, NULL, 0),
(286, 26, 9, '2023-07-22 19:52:44', 0x686a676b686b, NULL, NULL, 0),
(287, 2, 9, '2023-07-22 19:53:52', 0x6d626b, NULL, NULL, 0),
(288, 2, 9, '2023-07-22 20:07:12', 0x6d626b, NULL, '358 357', 0),
(291, 30, 26, '2023-08-10 07:33:16', 0x68656c6c6f, NULL, NULL, 0),
(292, 31, 26, '2023-08-10 09:42:57', 0x776861742061626f7574206f7468657220636f6d7065746974696f6e733f, NULL, NULL, 0),
(298, 39, 1, '2023-08-11 19:57:31', 0x5365656d7320696e746572657374696e67212120436f756e74206d6520696e, NULL, NULL, 0),
(302, 41, 8, '2023-08-12 12:22:20', 0x3c68313e204920776f756c64206c6f766520746f20646f2074686174203c2f68313e, NULL, NULL, 0),
(303, 41, 8, '2023-08-12 12:23:45', 0x3c70207374796c65203d2027636f6c6f723a726564273e57696c6c20492067657420706169643c2f703e, NULL, NULL, 0),
(304, 1, 9, '2023-08-13 09:25:35', 0x72657375626d697373696f6e2070726576656e74696f6d, NULL, NULL, 0),
(305, 13, 9, '2023-08-13 09:26:01', 0x6a62, NULL, NULL, 0),
(306, 33, 1, '2023-08-14 12:09:59', 0x4e6963652070686f746f206775797321, NULL, '379', 0),
(307, 40, 1, '2023-08-14 12:14:28', 0x536369656e746966696320636f6d707574696e67206973206d79207069656365206f662063616b652120766572792070756d70656420757020746f20776f726b207769746820796f7521, NULL, NULL, 0),
(308, 9, 1, '2023-08-14 12:28:56', 0x73776565746e65737320696e206d79206c696665, 240, NULL, 1),
(309, 9, 1, '2023-08-14 12:29:18', 0x73776565746e65737320696e206d79206c696665, 240, NULL, 1),
(310, 9, 1, '2023-08-14 12:29:29', 0x6564616d616d65, 308, NULL, 2),
(311, 40, 1, '2023-08-14 12:34:16', 0x616464206d652061732077656c6c, 307, NULL, 1),
(312, 40, 1, '2023-08-14 12:34:39', 0x616464206d652061732077656c6c, 307, NULL, 1),
(313, 40, 1, '2023-08-14 12:37:47', 0x616464206d652061732077656c6c, 307, NULL, 1),
(314, 40, 1, '2023-08-14 12:40:51', 0x616464206d652061732077656c6c, 307, NULL, 1),
(315, 2, 1, '2023-08-14 15:53:25', 0x7265706c7920746f, 266, NULL, 1),
(316, 2, 1, '2023-08-14 15:53:53', 0x7265706c7920746f, 266, NULL, 1),
(317, 40, 1, '2023-08-14 16:26:38', 0x5465787420626f78206d757374206265206d6164652061206c6974746c65206269676765723f207269676a74, 312, NULL, 2),
(318, 40, 1, '2023-08-14 16:26:54', 0x446973636172642077617320736f6d657468696e6720656c7365, 311, NULL, 2),
(319, 40, 1, '2023-08-14 16:27:01', 0x446973636172642077617320736f6d657468696e6720656c7365, 311, NULL, 2),
(323, 9, 1, '2023-08-14 17:38:25', 0x6e6f77, 245, NULL, 1),
(324, 9, 1, '2023-08-14 17:41:09', 0x6e6f77, 245, NULL, 1),
(325, 9, 1, '2023-08-14 17:41:21', 0x6e6f77206c657420757320736565, 245, '330', 1),
(326, 9, 1, '2023-08-14 17:43:50', 0x6e6f77206c657420757320736565, 245, NULL, 1),
(327, 9, 1, '2023-08-14 17:44:02', 0x64667320697320776f726b696e672c206974207365656d73, 325, NULL, 2),
(328, 9, 1, '2023-08-14 17:44:06', 0x64667320697320776f726b696e672c206974207365656d73, 325, NULL, 2),
(329, 9, 1, '2023-08-14 17:45:02', 0x64667320697320776f726b696e672c206974207365656d73, 325, NULL, 2),
(330, 9, 1, '2023-08-14 17:45:37', 0x736f207468697320776f726b7320627574206e6f742074686174, 241, NULL, 1),
(331, 9, 1, '2023-08-14 17:45:40', 0x736f207468697320776f726b7320627574206e6f742074686174, 241, NULL, 1),
(332, 9, 1, '2023-08-14 17:45:54', 0x6c6574206d6520616464206d6f7265207265706c696573, 241, '335', 1),
(333, 9, 1, '2023-08-14 17:45:57', 0x6c6574206d6520616464206d6f7265207265706c696573, 241, NULL, 1),
(334, 9, 1, '2023-08-14 17:46:50', 0x6e6f77207265706c79696e6720746f2074686973206661696c73, 332, NULL, 2),
(335, 9, 1, '2023-08-14 17:46:56', 0x6e6f77207265706c79696e6720746f2074686973206661696c73, 332, NULL, 2),
(336, 2, 1, '2023-08-14 18:21:06', 0x666473, NULL, '343 341 338 337', 0),
(337, 2, 1, '2023-08-14 18:22:30', 0x77656c6c, 336, '342 340 339', 1),
(338, 2, 1, '2023-08-14 18:22:36', 0x77656c6c, 336, NULL, 1),
(339, 2, 1, '2023-08-14 18:22:49', 0x616e6f74686572, 337, NULL, 2),
(340, 2, 1, '2023-08-14 18:22:52', 0x616e6f74686572, 337, NULL, 2),
(341, 2, 1, '2023-08-14 18:23:03', 0x61746c656173742074686973, 336, NULL, 1),
(342, 2, 1, '2023-08-14 18:28:21', 0x616e6f74686572, 337, '356 355', 2),
(343, 2, 1, '2023-08-14 18:28:32', '', 336, '367 366 365', 1),
(344, 1, 1, '2023-08-14 18:28:57', 0x6a6b, 248, '362 359', 1),
(345, 1, 1, '2023-08-14 18:29:02', 0x6a6b, 248, NULL, 1),
(346, 1, 1, '2023-08-14 18:29:19', 0x616e6f74686572, 248, NULL, 1),
(347, 1, 1, '2023-08-14 18:29:23', 0x616e6f74686572, 248, NULL, 1),
(348, 1, 1, '2023-08-14 18:31:23', 0x616e6f74686572, 248, NULL, 1),
(349, 1, 1, '2023-08-14 18:32:24', 0x616e6f74686572, 248, NULL, 1),
(350, 1, 1, '2023-08-14 18:34:02', 0x616e6f74686572, 248, NULL, 1),
(351, 9, 1, '2023-08-14 18:35:09', 0x6272696768742069646561, 241, '354 353', 1),
(352, 9, 1, '2023-08-14 18:35:28', 0x6272696768742069646561, 241, NULL, 1),
(353, 9, 1, '2023-08-14 18:35:51', 0x546869732073686f756c6420776f726b2061732077656c6c, 351, NULL, 2),
(354, 9, 1, '2023-08-14 18:35:58', 0x546869732073686f756c6420776f726b2061732077656c6c, 351, NULL, 2),
(355, 2, 1, '2023-08-14 19:06:42', 0x5468697320776f756c6420626520746f6f206d756368, 342, NULL, 3),
(356, 2, 1, '2023-08-14 19:06:55', 0x5468697320776f756c6420626520746f6f206d756368, 342, NULL, 3),
(357, 2, 1, '2023-08-14 19:07:23', 0x616464696e67207265706c6965732068657265, 288, NULL, 1),
(358, 2, 1, '2023-08-14 19:07:31', 0x616464696e67207265706c6965732068657265, 288, NULL, 1),
(359, 1, 1, '2023-08-18 15:32:31', '', 344, NULL, 2),
(360, 1, 1, '2023-08-18 15:32:41', 0x6c736b646a6666, 244, NULL, 1),
(361, 1, 1, '2023-08-18 15:32:44', 0x6c736b646a6666, 244, NULL, 1),
(362, 1, 1, '2023-08-18 15:33:22', '', 344, NULL, 2),
(363, 35, 1, '2023-08-18 15:33:39', 0x73616166, NULL, NULL, 0),
(364, 35, 1, '2023-08-18 15:37:02', 0x73616166, NULL, NULL, 0),
(365, 2, 1, '2023-08-18 15:45:19', '', 343, NULL, 2),
(366, 2, 1, '2023-08-18 15:45:26', '', 343, NULL, 2),
(367, 2, 1, '2023-08-18 15:46:24', '', 343, NULL, 2),
(368, 9, 1, '2023-08-18 16:04:59', 0x7265706c79696e6720746f2074686973, 245, '371 370', 1),
(369, 9, 1, '2023-08-18 16:05:09', 0x7265706c79696e6720746f2074686973, 245, NULL, 1),
(370, 9, 1, '2023-08-18 16:05:20', 0x7365636f6e64207265706c79, 368, NULL, 2),
(371, 9, 1, '2023-08-18 16:05:25', 0x7365636f6e64207265706c79, 368, NULL, 2),
(375, 2, 1, '2023-08-18 16:51:26', 0x6b616466, 265, NULL, 1),
(376, 2, 1, '2023-08-18 16:51:31', 0x6b616466, 265, NULL, 1),
(377, 2, 1, '2023-08-18 16:51:37', 0x6b616466, 265, '378', 1),
(378, 2, 1, '2023-08-18 16:52:31', 0x6a6a6e6a6e, 377, NULL, 2),
(379, 33, 1, '2023-08-18 16:59:55', 0x6e6f7374616c676961206973206b69636b696e6720696e, 306, NULL, 1),
(380, 42, 29, '2023-08-20 15:45:03', 0x49206c6f7665206272756365206c6565, NULL, NULL, 0),
(381, 42, 29, '2023-08-20 15:45:27', 0x49206c6f7665206272756365206c6565, NULL, NULL, 0),
(382, 42, 29, '2023-08-20 15:46:31', 0x49206c6f7665206272756365206c6565, NULL, NULL, 0),
(383, 42, 29, '2023-08-20 15:47:02', 0x49206c6f7665206272756365206c6565, NULL, NULL, 0),
(384, 42, 29, '2023-08-20 15:48:51', 0x49206c6f7665206272756365206c6565, NULL, NULL, 0),
(385, 42, 29, '2023-08-20 15:49:02', 0x49206c6f7665206272756365206c6565, NULL, NULL, 0),
(386, 42, 29, '2023-08-20 15:49:11', 0x49206c6f7665206272756365206c6565, NULL, NULL, 0),
(387, 42, 29, '2023-08-20 15:49:37', 0x7364667366, NULL, NULL, 0),
(388, 42, 29, '2023-08-20 15:49:40', 0x7364667366, NULL, NULL, 0),
(389, 42, 29, '2023-08-20 15:50:36', 0x7364667366, NULL, NULL, 0),
(390, 42, 29, '2023-08-20 15:51:03', 0x7364667366, NULL, NULL, 0),
(391, 42, 29, '2023-08-20 15:51:46', 0x7364667366, NULL, NULL, 0),
(392, 42, 1, '2023-08-20 15:55:22', 0x6a616e657368, NULL, NULL, 0),
(393, 42, 1, '2023-08-20 15:55:26', 0x6a616e657368, NULL, '395 394', 0),
(394, 42, 1, '2023-08-20 15:56:08', 0x6c6b6a6166, 393, NULL, 1),
(395, 42, 1, '2023-08-20 16:05:13', 0x6d6168616e65, NULL, NULL, 0),
(396, 42, 1, '2023-08-20 16:05:13', '', 393, NULL, 1),
(397, 42, 1, '2023-08-20 16:05:18', 0x6d6168616e65, NULL, NULL, 0),
(398, 42, 1, '2023-08-20 16:13:39', 0x6d6168616e65, NULL, NULL, 0),
(402, 42, 1, '2023-08-20 16:27:16', 0x7365636f6e64207265706c79, NULL, NULL, 0),
(403, 42, 1, '2023-08-20 16:27:46', 0x7365636f6e64207265706c79, NULL, NULL, 0),
(404, 42, 1, '2023-08-20 16:27:56', 0x7365636f6e64207265706c79, NULL, NULL, 0),
(405, 42, 1, '2023-08-20 16:28:38', 0x7365636f6e64207265706c79, NULL, NULL, 0),
(406, 42, 1, '2023-08-20 16:28:46', 0x74686972640d0a, NULL, NULL, 0),
(407, 42, 1, '2023-08-20 16:28:59', 0x74686972640d0a, NULL, NULL, 0),
(408, 42, 1, '2023-08-20 16:29:21', 0x74686972640d0a, NULL, NULL, 0),
(409, 42, 1, '2023-08-20 16:29:40', 0x74686972640d0a, NULL, NULL, 0),
(410, 42, 1, '2023-08-20 16:30:40', 0x74686972640d0a, NULL, NULL, 0),
(411, 42, 1, '2023-08-20 16:36:44', 0x666f75727468, NULL, NULL, 0),
(412, 42, 1, '2023-08-20 16:37:14', 0x666f75727468, NULL, NULL, 0),
(413, 42, 1, '2023-08-20 16:37:26', 0x666f75727468, NULL, NULL, 0),
(414, 42, 1, '2023-08-20 16:38:22', 0x666f75727468, NULL, NULL, 0),
(416, 42, 1, '2023-08-20 16:40:32', 0x6669667468, NULL, NULL, 0),
(417, 42, 1, '2023-08-20 16:40:50', 0x6669667468, NULL, NULL, 0),
(418, 42, 1, '2023-08-20 16:41:07', 0x6669667468, NULL, NULL, 0),
(419, 42, 1, '2023-08-20 16:41:15', 0x6669667468, NULL, NULL, 0),
(420, 42, 1, '2023-08-20 16:41:29', 0x6669667468, NULL, NULL, 0),
(421, 42, 1, '2023-08-20 16:41:37', 0x7369787468, NULL, NULL, 0),
(422, 42, 1, '2023-08-20 16:41:58', 0x7369787468, NULL, NULL, 0),
(423, 42, 1, '2023-08-20 16:42:35', 0x7369787468, NULL, NULL, 0),
(424, 42, 1, '2023-08-20 16:42:56', 0x7369787468, NULL, NULL, 0),
(425, 42, 1, '2023-08-20 16:44:17', 0x7369787468, NULL, NULL, 0),
(426, 42, 1, '2023-08-20 16:45:09', 0x736576656e7468, NULL, '430 427', 0),
(427, 42, 1, '2023-08-20 16:55:44', 0x7265706c7920746f2074686973207265706c79, 426, '429 428', 1),
(428, 42, 1, '2023-08-20 16:56:09', 0x6772616e646368696c64207265706c79, 427, NULL, 2),
(429, 42, 1, '2023-08-20 16:56:29', 0x756e636c652061756e7479207265706c79, 427, '431', 2),
(430, 42, 1, '2023-08-20 16:56:54', 0x67726e616420756e636c652061756e7479207265706c79, 426, NULL, 1),
(431, 42, 1, '2023-08-20 16:57:36', 0x736c6461666a, 429, '432', 3),
(432, 42, 1, '2023-08-20 16:57:49', 0x6a6461666a7073616f6a, 431, NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `reply_extend`
--

CREATE TABLE `reply_extend` (
  `reply_id` int(11) NOT NULL,
  `reply_content` text NOT NULL,
  `reply_user` int(11) NOT NULL,
  `reply_post` int(11) NOT NULL,
  `replied_to` int(11) DEFAULT NULL,
  `indentation` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reply_extend`
--

INSERT INTO `reply_extend` (`reply_id`, `reply_content`, `reply_user`, `reply_post`, `replied_to`, `indentation`) VALUES
(288, 'Some content', 8, 2, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `uemail` varchar(255) NOT NULL,
  `udept` text NOT NULL,
  `upass` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `userlevel` int(11) NOT NULL DEFAULT 0,
  `bio` text DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `uname`, `uemail`, `udept`, `upass`, `created_at`, `userlevel`, `bio`) VALUES
(1, 'Naren', 'oraclenaren2004@gmail.com', 'Information Technology', '25f1324ecf6037af71bd906e007d7fb89410f19a', '2023-07-01 16:32:36', 1, 'final check'),
(2, 'user', 'user@gmail.com', 'Production Technology', 'b1406631e7b5be745d56b40afe796b71877dc1e6', '2023-07-02 05:12:21', 0, ''),
(8, 'pospandi', 'oraclenaren2004@gmail.com', 'Information Technology', '0b34a70507ddb4bd4be1dff54d9bd7ac483573c0', '2023-07-03 10:42:09', 0, ''),
(9, 'naren_dandelion', 'oraclenaren2004@gmail.com', 'Computer Technology', '0b34a70507ddb4bd4be1dff54d9bd7ac483573c0', '2023-07-20 13:50:19', 0, 'fafsdf'),
(19, '2022506133', 'oraclenaren2004@gmail.com', 'Information Technology', '0b34a70507ddb4bd4be1dff54d9bd7ac483573c0', '2023-07-20 15:42:15', 0, 'master'),
(20, 'au2022510060', '2022506133@student.annauniv.edu', 'Information Technology', '0b34a70507ddb4bd4be1dff54d9bd7ac483573c0', '2023-07-20 15:43:00', 0, ''),
(21, 'karthickannan', 'karthickannanakarthi@gmail.com', 'Information Technology', '1f61e764e24a2c774bf8230b87687afa4cbba405', '2023-07-21 19:18:58', 1, ''),
(22, 'rajubai', 'ravishankarmitit@gmail.com', 'Information Technology', 'be08a8358266a34c4721a7c615319ed8e34eac89', '2023-07-22 18:05:09', 0, ''),
(23, 'youtuve', 'anselmflavian@gmail.com', 'Information Technology', '6f3d3a178e1f1469fd25c2ebcf85a69fdbce0ed1', '2023-07-24 16:23:34', 0, ''),
(24, 'karthi666', 'karthickkannanakarthi@gmail.com', 'Information Technology', '959b931bc39f9688fa9c7f2e26c4a85190d20410', '2023-08-02 10:12:21', 1, 'Karthickannan at MIT'),
(25, 'au2022510060e', 'oraclenaren2004@gmail.com', 'Instrumentation Engineering', '0b34a70507ddb4bd4be1dff54d9bd7ac483573c0', '2023-08-09 10:47:41', 0, ''),
(26, '2022506110', 'oraclenaren2004@gmail.com', 'Information Technology', '815b269d96d8264ee08feb83d692e7bad70a1040', '2023-08-10 07:29:17', 0, ''),
(27, 'jhjhihj', 'ijkjijj@gmmdmd.com', 'Production Technology', '8ed2809033c0547660602539aeb788354d906644', '2023-08-12 11:48:55', 0, ''),
(28, 'newU', 'karthickkannanakarthi@gmail.com', 'Information Technology', '1b09a7a238b08268ca1ec7fa29d525fac9aa4dba', '2023-08-18 17:12:15', 0, ''),
(29, 'Janesh123', 's4janesh@gmail.com', 'Instrumentation Engineering', '00dfd13236fc48cd4da7506b8e66853b3374ce3a', '2023-08-20 15:29:39', 0, 'I like:\r\n1.Breaking bad\r\n2.Naruto\r\n3.Death Note');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `otp_login`
--
ALTER TABLE `otp_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_link_user` (`post_by`),
  ADD KEY `post_link_cat` (`post_cat`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`reply_id`),
  ADD KEY `post_link_reply` (`reply_post`),
  ADD KEY `user_link_reply` (`reply_user`);

--
-- Indexes for table `reply_extend`
--
ALTER TABLE `reply_extend`
  ADD PRIMARY KEY (`reply_id`),
  ADD KEY `reply_link_post` (`reply_post`),
  ADD KEY `reply_link_user` (`reply_user`),
  ADD KEY `reply_link_reply` (`replied_to`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `otp_login`
--
ALTER TABLE `otp_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `reply_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=433;

--
-- AUTO_INCREMENT for table `reply_extend`
--
ALTER TABLE `reply_extend`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=289;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_link_cat` FOREIGN KEY (`post_cat`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_link_user` FOREIGN KEY (`post_by`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `post_link_reply` FOREIGN KEY (`reply_post`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_link_reply` FOREIGN KEY (`reply_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reply_extend`
--
ALTER TABLE `reply_extend`
  ADD CONSTRAINT `reply_link_post` FOREIGN KEY (`reply_post`) REFERENCES `post` (`post_id`),
  ADD CONSTRAINT `reply_link_reply` FOREIGN KEY (`replied_to`) REFERENCES `reply_extend` (`reply_id`),
  ADD CONSTRAINT `reply_link_user` FOREIGN KEY (`reply_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
