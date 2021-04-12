-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2021 at 03:45 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newsdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_author`
--

CREATE TABLE `blog_author` (
  `autID` int(11) NOT NULL,
  `autName` varchar(255) NOT NULL,
  `autSlug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_author`
--

INSERT INTO `blog_author` (`autID`, `autName`, `autSlug`) VALUES
(2, 'Ispace Blog', 'ispace-blog'),
(3, 'Proxynet Blog', 'proxynet-blog');

-- --------------------------------------------------------

--
-- Table structure for table `blog_cats`
--

CREATE TABLE `blog_cats` (
  `catID` int(11) UNSIGNED NOT NULL,
  `catTitle` varchar(255) DEFAULT NULL,
  `catSlug` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_cats`
--

INSERT INTO `blog_cats` (`catID`, `catTitle`, `catSlug`) VALUES
(13, 'Technology', 'technology'),
(16, 'Proskool', 'proskool'),
(15, 'iSPACE', 'ispace'),
(17, 'Partnership', 'partnership'),
(18, 'Proxynet', 'proxynet');

-- --------------------------------------------------------

--
-- Table structure for table `blog_members`
--

CREATE TABLE `blog_members` (
  `memberID` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_members`
--

INSERT INTO `blog_members` (`memberID`, `username`, `password`, `email`) VALUES
(1, 'Demo', '$2a$12$TF8u1maUr5kADc42g1FB0ONJDEtt24ue.UTIuP13gij5AHsg5f5s2', 'demo@demo.com'),
(2, 'ispace', '$2y$10$dPr6aD2768B8OtV4nL4Ka.GqwyZGOxpXmSItrY0Mcqy.zcekbdvey', 'ispace@ispace.com');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts_seo`
--

CREATE TABLE `blog_posts_seo` (
  `postID` int(11) UNSIGNED NOT NULL,
  `postTitle` varchar(255) DEFAULT NULL,
  `postSlug` varchar(255) DEFAULT NULL,
  `postDesc` text DEFAULT NULL,
  `postCont` text DEFAULT NULL,
  `postImage` varchar(255) NOT NULL,
  `postDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_posts_seo`
--

INSERT INTO `blog_posts_seo` (`postID`, `postTitle`, `postSlug`, `postDesc`, `postCont`, `postImage`, `postDate`) VALUES
(17, 'Creativity and Coding : LEARN TO CODE, CODE TO LEARN!!', 'creativity-and-coding-learn-to-code-code-to-learn', '<p>In today&rsquo;s digital age, knowing how to code can be likened to being able to read.</p>\r\n<p>When we teach our children to read and write, add and subtract,</p>\r\n<p>we&rsquo;re teaching them ways to interact with the world around us.</p>', '<p style=\"text-align: justify;\">In today&rsquo;s digital age, knowing how to code can be likened to being able to read.</p>\r\n<p style=\"text-align: justify;\">When we teach our children to read and write, add and subtract,</p>\r\n<p style=\"text-align: justify;\">we&rsquo;re teaching them ways to interact with the world around us.</p>\r\n<p style=\"text-align: justify;\">We are teaching them to code, however, not so much as an end in itself but because our world has morphed:</p>\r\n<p style=\"text-align: justify;\">so many of the things we once did with elements such as fire and iron,</p>\r\n<p style=\"text-align: justify;\">or tools such as pencil and paper, are now wrought in code.</p>\r\n<p style=\"text-align: justify;\">We are teaching coding to help our kids craft their future.</p>\r\n<p style=\"text-align: justify;\"><strong>Coding Apps and Games</strong></p>\r\n<p style=\"text-align: justify;\">Coding apps are a great way for kids to have fun while learning to code.</p>\r\n<p style=\"text-align: justify;\">Although computer programming may sound too technical for kids, apps are a great way</p>\r\n<p style=\"text-align: justify;\">to introducing coding in a way that kids won&rsquo;t realise they are learning.</p>\r\n<p style=\"text-align: justify;\">Here are some of our recommendations for coding apps.</p>\r\n<p style=\"text-align: justify;\"><strong>Coding Books</strong></p>\r\n<p style=\"text-align: justify;\">Books about coding and computer programming are a great way to get kids involved and make coding fun.</p>\r\n<p style=\"text-align: justify;\">Many assume that learning to code is too difficult for children, especially if you don&rsquo;t know how to code yourself.</p>\r\n<p style=\"text-align: justify;\">However, kids can start learning the concepts of coding from a very young age quite easily if given the opportunity.</p>', 'images/learn_code.jpg', '2020-04-05 15:14:39'),
(22, 'ProSkool Benefits to the administration of your School.', 'proskool-benefits-to-the-administration-of-your-school', '<p>ProSkool is a unique,&nbsp;secured School Information Management Software&nbsp;that cuts across every area of school life ranging from registration of students to examination.</p>\r\n<p>It is a web-based school application that works both online and offline (i.e. locally on your school network). It is sociable,&nbsp;customizable and user friendly.</p>', '<p>ProSkool is a unique,&nbsp;secured School Information Management Software&nbsp;that cuts across every area of school life ranging from registration of students to examination.</p>\r\n<p>It is a web-based school application that works both online and offline (i.e. locally on your school network). It is sociable,&nbsp;customizable and user friendly.</p>\r\n<p>&nbsp;</p>\r\n<p>As a school that runs ProSkool Mobile App, you can:</p>\r\n<ul>\r\n<li>Send and receive messages to and from the school with notification</li>\r\n<li>Parents can view their ward&rsquo;s attendance, result, class timetable, school bills, payment receipt and termly performance analysis with notification.</li>\r\n<li>View school&rsquo;s calendar</li>\r\n<li>Read school news.</li>\r\n<li>View photo gallery</li>\r\n<li>Read school news.</li>\r\n</ul>', 'images/prosk2.png', '2020-12-20 23:45:49'),
(23, 'Features of ProSkool APP', 'features-of-proskool-app', '<p>Below are some of the&nbsp;features&nbsp;of ProSkool APPs</p>\r\n<ol>\r\n<li>Easy setup of School Information with features for School name, address, logo, motto, email, and website.</li>\r\n<li>Setup of session details with features for stating when the session starts and ends.</li>\r\n<li>Class details with features for class arms, class categories, class-teacher allocation.</li>\r\n<li>Subject details with features for subject categories, class-subject allocation, and subject-teacher allocation.</li>\r\n</ol>', '<ul>\r\n<li>\r\n<p>Below are some of the&nbsp;features&nbsp;of ProSkool APPs</p>\r\n<ol>\r\n<li>Easy setup of School Information with features for School name, address, logo, motto, email, and website.</li>\r\n<li>Setup of session details with features for stating when the session starts and ends.</li>\r\n<li>Class details with features for class arms, class categories, class-teacher allocation.</li>\r\n<li>Subject details with features for subject categories, class-subject allocation, and subject-teacher allocation.</li>\r\n<li>Grade set up with features for stating maximum and minimum score and comments for grades.</li>\r\n<li>ProSkool is easy capture of staff personal data.</li>\r\n<li>Features for creating staff login details (username and password)</li>\r\n<li>Allocation of staff to single or multiple user roles.</li>\r\n<li>Easy capture of student biodata, academic information, family information, and medical details.</li>\r\n<li>Smart search for students information</li>\r\n<li>ProSkool features importing students data from excel</li>\r\n<li>Feature for promoting students from one class to another</li>\r\n<li>Birthday alert (for students, staff, and parents) with feature for extraction of phone numbers and email addresses.</li>\r\n<li>Easy capture of staff personal data</li>\r\n<li>Allocation of staff to single or multiple user role</li>\r\n<li>Migration of student names as student progresses from class to class</li>\r\n<li>Notification for birthdays of students, staff, and parents.</li>\r\n<li>Extensive salary configuration settings</li>\r\n<li>Generate and Manage the Payroll Processes according to the Salary Structure assigned to the employee</li>\r\n<li>Accurately computes salary for all employees including loan deductions, tax, miscellaneous addition or deduction</li>\r\n<li>Automated generation of payslips and payroll which are printable and can be mailed</li>\r\n<li>Excel export facility</li>\r\n</ol></li>\r\n</ul>', 'images/prosk3.png', '2020-12-20 23:52:32'),
(24, 'ProSkool: School processes made easy (a must-have for your School)', 'proskool-school-processes-made-easy-a-must-have-for-your-school', '<p>ProSkool is a&nbsp;software solution&nbsp;of&nbsp;Proxynet Communications, an ICT firm that is focused on the deployment of Professional Audio Visual Solutions,</p>\r\n<p>Software Development, System Integration, Enterprise Security, and Storage Solution.</p>', '<p>ProSkool is a&nbsp;software solution&nbsp;of&nbsp;Proxynet Communications, an ICT firm that is focused on the deployment of Professional Audio Visual Solutions, Software Development, System Integration, Enterprise Security, and Storage Solution.</p>\r\n<p>ProSkool is a unique, secured School Information Management Software that cuts across every area of school processes ranging from registration of students, attendance, students results, payroll to billing, expenditure monitor/records, managing multi-site schools, etc. It is a web-based school application that works both online and offline (i.e. locally on your school network). It is scalable, customizable, and user-friendly.</p>\r\n<p>Contact us today for a presentation/demo in your school on: +234 9031829347, +234 8177588223, + (233) 302 546 703</p>', 'images/prosk1.jpg', '2020-12-20 23:54:46'),
(25, 'iSPACE', 'ispace', '<p>The acronym iSpace means Introduction to Systematic Programming, Animation, Computer Engineering, and Electronics.</p>\r\n<p>iSPACE is a co-curricular academic program designed to help Primary and Secondary School students develop innovative</p>\r\n<p>and creative abilities and skills that will be useful in other areas of learning and problem-solving.</p>', '<p>The acronym iSpace means Introduction to Systematic Programming, Animation, Computer Engineering, and Electronics.</p>\r\n<p>iSPACE is a co-curricular academic program designed to help Primary and Secondary School students develop innovative</p>\r\n<p>and creative abilities and skills that will be useful in other areas of learning and problem-solving.</p>\r\n<p>Training is done in the following areas:</p>\r\n<ul>\r\n<li>Programming (Mobile App Development and Games Development)</li>\r\n<li>Animation &ndash; Graphics Character Design and Character Animation)</li>\r\n<li>Computer Engineering &ndash; based on CompTIA A+ standard curriculum</li>\r\n<li>Electronics Circuit/Device Design</li>\r\n</ul>\r\n<p>iSPACE can run alongside a school&rsquo;s academic calendar or as an after school extra-curricular activity (CLUB).</p>\r\n<p>&nbsp;</p>\r\n<p>Students will be able to:</p>\r\n<p>Analyze, invent, and program their own Android Apps.<br />Create their own animation characters and program them according to their own creative ideas.<br />Design and create computer games of varying themes<br />Assemble computers, troubleshoot, and handle system maintenance.<br />Design electronic devices e.g. Phone chargers, Alarm Systems, Auto-Control Circuits, Chaser Light, etc.<br />And much more,<br />iSPACE will get students acquainted with resourceful applications that will enable them express their creative ideas.</p>\r\n<p>It will also help develop in students a new way of thinking (computational and logical thinking) about problem-solving.</p>\r\n<p>It would teach students how to program and invent, thereby laying a foundation for those who will help develop an interest in pursuing a career in IT/ICT/Engineering.</p>\r\n<p>&nbsp;</p>\r\n<p>Finally, it would inspire students to invent, create, discover and explore.</p>\r\n<p>iSPACE is a product of ProxyNet Communications, a leading indigenous ICT company headquartered in Lagos.</p>', 'images/ispa.jpg', '2020-12-21 00:00:00'),
(26, 'Proxynet Communications becomes Logitech Authorised Distributor for West Africa', 'proxynet-communications-becomes-logitech-authorised-distributor-for-west-africa', '<p>Logitech&nbsp;has named Lagos-based<a href=\"http://www.proxynetgroup.com\">&nbsp;Proxynet Communication</a>s (trading as Content and Solutions Distribution Network) as its new Authorised distribution partner for West Africa.</p>', '<p>Logitech&nbsp;has named Lagos-based<a href=\"http://www.proxynetgroup.com\">&nbsp;Proxynet Communication</a>s (trading as Content and Solutions Distribution Network) as its new Authorised distribution partner for West Africa.</p>\r\n<p>The distributor specializes in&nbsp; IT solutions, supplying to customers in the financial, manufacturing, telecommunications, government, oil, and blue-chip markets.</p>\r\n<p>The deal with&nbsp;Logitech covers all of the manufacturer&rsquo;s product ranges, including Enterprise Solutions,&nbsp; and spans Ghana, Coted Ivoire, Senegal, Guinea, Mali, Gabon, Angola, Mauritius, Kenya, and Tanzania, as well as Nigeria.</p>', 'images/pp.jpg', '2020-12-21 00:12:27'),
(27, 'Proxynet Communications becomes Peerless-AV Africa Distributor', 'proxynet-communications-becomes-peerless-av-africa-distributor', '<p>Peerless-AV has named Lagos-based<a href=\"http://www.proxynetgroup.com/blog2/why-your-school-administrative-need-proskool-app/\">&nbsp;Proxynet Communication</a>s (trading as Content and Solutions Distribution Network) as its new distribution partner for West Africa. The distributor specialises in AV and IT solutions, supplying to customers in the financial, manufacturing, telecommunications, government, oil and blue-chip markets.&nbsp;</p>', '<p>Peerless-AV has named Lagos-based<a href=\"http://www.proxynetgroup.com/blog2/why-your-school-administrative-need-proskool-app/\">&nbsp;Proxynet Communication</a>s (trading as Content and Solutions Distribution Network) as its new distribution partner for West Africa. The distributor specialises in AV and IT solutions, supplying to customers in the financial, manufacturing, telecommunications, government, oil and blue-chip markets. The deal with Peerless-AV covers all of the manufacturer&rsquo;s product ranges, including trolleys and stands, videowall mounts, the Modular Series, indoor kiosks and outdoor displays, and spans Ghana, Coted Ivoire, Senegal, Guinea, Mali, Gabon, Angola, Mauritius, Kenya and Tanzania, as well as Nigeria.</p>\r\n<p>&lsquo;Proxynet Communications has been a long-term player in the African AV and IT markets, and have been suppliers of various major display brands for over 14 years,&rsquo; said Peerless-AV&rsquo;s EMEA vice president, Melinda Von Horvath. &lsquo;With the addition of our mounts and AV solutions to the portfolio, customers in the region will benefit from a wide choice of high quality, compatible solutions for their installations.&rsquo;</p>\r\n<p>In addition to the supply of Peerless-AV products, Proxynet Communications will also rub training events, online marketing activities, sales incentives and customer support for the brand.</p>\r\n<p>&lsquo;Peerless-AV is key to our growth and development,&rsquo; commented Proxynet Communications CEO Edward Ifeanyi Ozo-Onyali. &lsquo;The brand&rsquo;s range of mounts and AV solutions are highly impressive, internationally recommended and field-proven, and perfectly match our requirements. We will now be able to offer customers&nbsp;<a href=\"https://www.peerless-av.com/en-us/professional\">complete value added AV solutions</a>, combining displays with complementary Peerless-AV products.&rsquo;</p>', 'images/proxynet-Peerless.jpg', '2021-01-19 17:23:23');

-- --------------------------------------------------------

--
-- Table structure for table `blog_post_cats`
--

CREATE TABLE `blog_post_cats` (
  `id` int(11) UNSIGNED NOT NULL,
  `postID` int(11) DEFAULT NULL,
  `catID` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_post_cats`
--

INSERT INTO `blog_post_cats` (`id`, `postID`, `catID`) VALUES
(52, 24, 16),
(31, 3, 8),
(51, 23, 16),
(50, 22, 16),
(45, 17, 11),
(53, 25, 15),
(54, 26, 17),
(55, 26, 18),
(56, 27, 17);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_author`
--
ALTER TABLE `blog_author`
  ADD PRIMARY KEY (`autID`);

--
-- Indexes for table `blog_cats`
--
ALTER TABLE `blog_cats`
  ADD PRIMARY KEY (`catID`);

--
-- Indexes for table `blog_members`
--
ALTER TABLE `blog_members`
  ADD PRIMARY KEY (`memberID`);

--
-- Indexes for table `blog_posts_seo`
--
ALTER TABLE `blog_posts_seo`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `blog_post_cats`
--
ALTER TABLE `blog_post_cats`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_author`
--
ALTER TABLE `blog_author`
  MODIFY `autID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog_cats`
--
ALTER TABLE `blog_cats`
  MODIFY `catID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `blog_members`
--
ALTER TABLE `blog_members`
  MODIFY `memberID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blog_posts_seo`
--
ALTER TABLE `blog_posts_seo`
  MODIFY `postID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `blog_post_cats`
--
ALTER TABLE `blog_post_cats`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
