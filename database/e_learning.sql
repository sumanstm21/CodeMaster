-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2020 at 02:39 AM
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
-- Database: `e_learning`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllUserEmail` ()  BEGIN
	SELECT email  FROM user;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetCoursesLessons` ()  SELECT lesson.lesson_id as lesson_id, course.title as course_title, lesson.title as lesson_title
FROM lesson
LEFT JOIN course
ON lesson.course_id = course.course_id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `content_creator`
-- (See below for the actual view)
--
CREATE TABLE `content_creator` (
`first_name` varchar(50)
,`last_name` varchar(50)
,`email` varchar(100)
,`title` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `title`, `description`, `user_id`) VALUES
(2, 'RDBS', 'RDBDSKDJ:AS akjd;aj d\r\ndfdafkjdfjasdf\r\nadsf\r\nads\r\nfads\r\nfpads\r\n]fpa\r\nsdfd\r\nsf[\r\nadsfasd\r\nf', 1),
(3, 'MYSQL', 'adfj;jfad\r\nfdsfijasd\r\nfasdfasd\r\nfas\r\ndf\r\nasd\r\nf\r\nasd\r\nfasdfadsf', 1),
(4, 'POSTSQ:', '\'kdsafk\'sdlfdsfasdfadjsfjkadsfa\r\nsdfasd\r\nfasd\r\nfasdfasdfhalkdhfadshfasd\r\nfadsfhasdfha;sdfh;alsdjfhasdf', 1),
(5, 'SQL SERVER', 'SAKDJLAKJDLASKJD@KASJDKAJ@SDKJ', 1),
(6, 'Oracle', 'QQASDASDAS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `home_content`
--

CREATE TABLE `home_content` (
  `home_content_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_content`
--

INSERT INTO `home_content` (`home_content_id`, `title`, `description`, `created_at`, `user_id`) VALUES
(1, 'Why use Mongo DB', 'Powerful query language\r\nRich and expressive query language that allows you to filter and sort by any field, no matter how nested it may be within a document.\r\n\r\nSupport for aggregations and other modern use-cases such as geo-based search, graph search, and text search.\r\n\r\nQueries are themselves JSON, and thus easily composable. No more concatenating strings to dynamically generate SQL queries.', '2020-04-26 22:10:28', 2),
(2, 'Relational Model Concepts', '1. Attribute: Each column in a Table. Attributes are the properties which define a relation. e.g., Student_Rollno, NAME,etc.\r\n2. Tables – In the Relational model the, relations are saved in the table format. It is stored along with its entities. A table has two properties rows and columns. Rows represent records and columns represent attributes.\r\n3. Tuple – It is nothing but a single row of a table, which contains a single record.\r\n4. Relation Schema: A relation schema represents the name of the relation with its attributes.\r\n5. Degree: The total number of attributes which in the relation is called the degree of the relation.\r\n6. Cardinality: Total number of rows present in the Table.\r\n7. Column: The column represents the set of values for a specific attribute.\r\n8. Relation instance – Relation instance is a finite set of tuples in the RDBMS system. Relation instances never have duplicate tuples.\r\n9. Relation key - Every row has one, two or multiple attributes, which is called relation key.\r\n10. Attribute domain – Every attribute has some pre-defined value and scope which is known as attribute domain', '2020-04-26 22:12:37', 2),
(3, 'Advantages of using Relational model', 'Simplicity: A relational data model is simpler than the hierarchical and network model.\r\nStructural Independence: The relational database is only concerned with data and not with a structure. This can improve the performance of the model.\r\nEasy to use: The relational model is easy as tables consisting of rows and columns is quite natural and simple to understand\r\nQuery capability: It makes possible for a high-level query language like SQL to avoid complex database navigation.\r\nData independence: The structure of a database can be changed without having to change any application.\r\nScalable: Regarding a number of records, or rows, and the number of fields, a database should be enlarged to enhance its usability.', '2020-04-26 22:13:15', 2),
(4, 'Disadvantages of using Relational model', 'Few relational databases have limits on field lengths which can\'t be exceeded.\r\nRelational databases can sometimes become complex as the amount of data grows, and the relations between pieces of data become more complicated.\r\nComplex relational database systems may lead to isolated databases where the information cannot be shared from one system to another.', '2020-04-26 22:13:38', 2),
(5, 'What is Record Type?', 'A Record type is a complex data type which allows the programmer to create a new data type with the desired column structure.\r\n\r\nIt groups one or more column to form a new data type\r\nThese columns will have its own name and data type\r\nA Record type can accept the data\r\nAs a single record that consists of many columns OR\r\nIt can accept the value for one particular column of a record\r\nRecord type simply means a new data type. Once the record type is created, it will be stored as a new data type in the database and the same shall be used to declare a variable in programs.\r\nIt will use the keyword \'TYPE\' to instruct the compiler that it is creating the new data type.\r\nIt can be created at \"database level\" which can be stored as database objects, used all-over the database or it can be created at the \"subprogram levels\", which is visible only inside the subprograms.\r\nThe database level record type can also be declared for the table columns so that single column can hold the complex data.\r\nThe data in these data type can be accessed by referring to their variable_name followed by period operator (.) followed by column_name i.e. \'<record_type_variable_name>.<column_name>\'', '2020-04-26 22:14:25', 2);

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `lesson_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `video_link` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`lesson_id`, `course_id`, `title`, `description`, `video_link`, `created_at`) VALUES
(9, 3, 'Mysql Introduction', 'akjdkdjf;akdsjf;kdsaj', 'ldjdhlkdjsfhlksadjf', '2020-06-02 21:45:38'),
(10, 3, 'Mysql Data Types', 'adjasldkashdkjhlskdjh', '', '2020-06-02 21:45:38'),
(11, 3, 'Mysql Relation', 'aklsdfkajsdfhkjh', 'ladjfhlkadsjfhlkjh', '2020-06-02 22:14:13'),
(12, 3, 'Mysql Foreign Key', 'ksdfjglkjahlakdjfh', 'jkhglkjahflkdajsh', '2020-06-02 22:18:30'),
(13, 6, 'Oracle Introduction', 'LAKJDLAJDLKAJSD', 'akdjasdkj', '2020-06-03 22:08:39'),
(14, 6, 'Oracle Data type', 'akdjfhakjdhk', 'aldld', '2020-06-03 22:08:50'),
(15, 6, 'Oracle Support', 'dfaldkfjlkjlkdjfldkjflkj', 'ldkfjlajd;asjd;aslkj', '2020-06-03 22:09:03');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `avatar_img` varchar(200) NOT NULL,
  `status` enum('Admin','User') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `password`, `avatar_img`, `status`) VALUES
(1, 'Admin', 'Admin', 'Admin@admin.com', 'admin', '', 'Admin'),
(2, 'Content', 'Writer', 'Contentwriter@gmail.com', 'content', '', 'Admin'),
(3, 'User A', 'AA', 'user@aaa.com', 'user', '', 'User'),
(4, 'User B', 'BB', 'user@bbb.com', 'user', '', 'Admin'),
(7, 'News', 'Writer', 'news@writer.com', 'news', '', 'Admin'),
(21, 'User', 'TT', 'Usertt@mail.com', '123456', '', 'Admin'),
(25, 'User', 'QQ', 'Userqq@mail.com', '123456', '', 'User');

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `user_history` AFTER INSERT ON `user` FOR EACH ROW BEGIN
	INSERT INTO `user_added` (`id`, `information`, `executed_time`) VALUES (NULL, 'user added', current_timestamp());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_added`
--

CREATE TABLE `user_added` (
  `id` int(11) NOT NULL,
  `information` varchar(255) NOT NULL,
  `executed_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_added`
--

INSERT INTO `user_added` (`id`, `information`, `executed_time`) VALUES
(1, 'user added', '2020-06-02 18:16:11'),
(2, 'user added', '2020-06-03 09:36:03'),
(3, 'user added', '2020-06-03 09:54:03');

-- --------------------------------------------------------

--
-- Table structure for table `user_favourite`
--

CREATE TABLE `user_favourite` (
  `user_favourite_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_favourite`
--

INSERT INTO `user_favourite` (`user_favourite_id`, `user_id`, `lesson_id`, `status`) VALUES
(1, 1, 10, 1),
(2, 1, 9, 1),
(13, 1, 11, 1),
(14, 1, 13, 1),
(15, 1, 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_learning`
--

CREATE TABLE `user_learning` (
  `user_learning_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `lesson_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure for view `content_creator`
--
DROP TABLE IF EXISTS `content_creator`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `content_creator`  AS  select `user`.`first_name` AS `first_name`,`user`.`last_name` AS `last_name`,`user`.`email` AS `email`,`home_content`.`title` AS `title` from (`home_content` left join `user` on(`user`.`user_id` = `home_content`.`user_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `home_content`
--
ALTER TABLE `home_content`
  ADD PRIMARY KEY (`home_content_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`lesson_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_added`
--
ALTER TABLE `user_added`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_favourite`
--
ALTER TABLE `user_favourite`
  ADD PRIMARY KEY (`user_favourite_id`),
  ADD KEY `user_favourite_ibfk_1` (`user_id`),
  ADD KEY `lesson_id` (`lesson_id`);

--
-- Indexes for table `user_learning`
--
ALTER TABLE `user_learning`
  ADD PRIMARY KEY (`user_learning_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `course_id` (`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `home_content`
--
ALTER TABLE `home_content`
  MODIFY `home_content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `lesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_added`
--
ALTER TABLE `user_added`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_favourite`
--
ALTER TABLE `user_favourite`
  MODIFY `user_favourite_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_learning`
--
ALTER TABLE `user_learning`
  MODIFY `user_learning_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `home_content`
--
ALTER TABLE `home_content`
  ADD CONSTRAINT `home_content_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `lesson`
--
ALTER TABLE `lesson`
  ADD CONSTRAINT `lesson_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_favourite`
--
ALTER TABLE `user_favourite`
  ADD CONSTRAINT `user_favourite_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_favourite_ibfk_2` FOREIGN KEY (`lesson_id`) REFERENCES `lesson` (`lesson_id`);

--
-- Constraints for table `user_learning`
--
ALTER TABLE `user_learning`
  ADD CONSTRAINT `user_learning_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_learning_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `user_learning` (`user_learning_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
