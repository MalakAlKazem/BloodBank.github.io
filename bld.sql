-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2024 at 08:43 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bld`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_ifo`
--

CREATE TABLE `admin_ifo` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_ifo`
--

INSERT INTO `admin_ifo` (`admin_id`, `admin_name`, `admin_username`, `admin_password`) VALUES
(3, 'malak', 'malak', '202cb962ac59075b964b07152d234b70'),
(4, 'lama', 'lama', '202cb962ac59075b964b07152d234b70'),
(5, 'hacker', 'hacker', 'd6a6bc0db10694a2d90e3a69648f3a03');

-- --------------------------------------------------------

--
-- Table structure for table `blood`
--

CREATE TABLE `blood` (
  `blood_id` int(11) NOT NULL,
  `blood_group` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood`
--

INSERT INTO `blood` (`blood_id`, `blood_group`) VALUES
(1, 'B+'),
(2, 'B-'),
(3, 'A+'),
(4, 'A-'),
(5, 'O+'),
(6, 'O-'),
(7, 'AB+'),
(8, 'AB-');

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `contact_id` int(11) NOT NULL,
  `contact_address` varchar(100) NOT NULL,
  `contact_mail` varchar(50) NOT NULL,
  `contact_phone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`contact_id`, `contact_address`, `contact_mail`, `contact_phone`) VALUES
(1, 'Lebanon,Tyre', 'BloodBankBYM@mail.com', '03814519');

-- --------------------------------------------------------

--
-- Table structure for table `contact_query`
--

CREATE TABLE `contact_query` (
  `query_id` int(11) NOT NULL,
  `query_name` varchar(120) NOT NULL,
  `query_number` char(12) NOT NULL,
  `query_message` longtext NOT NULL,
  `query_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `query_status` int(11) NOT NULL,
  `query_mail` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_query`
--

INSERT INTO `contact_query` (`query_id`, `query_name`, `query_number`, `query_message`, `query_date`, `query_status`, `query_mail`) VALUES
(9, 'mk', '779898', 'hihihihi', '2024-01-02 22:15:40', 1, 'malk@mail'),
(25, 'lama', '8989876', 'The best website ever', '2024-01-07 16:52:43', 1, 'lama@outlook.com'),
(26, 'mhmd', '878798090', 'I love the website', '2024-01-07 19:14:42', 1, 'mhmd@outlook.com'),
(28, 'laurance', '67687989', 'life save', '2024-01-07 19:22:20', 1, 'laurance@mail.com'),
(29, 'ali', '7788', 'best website ', '2024-01-07 19:30:04', 1, 'ali@mail.com'),
(30, 'ali', '789000', 'hi there iam here', '2024-01-07 19:30:41', 2, 'ali@email.com'),
(31, 'hassan', '0090909090', 'Ajmal website ', '2024-01-07 19:31:04', 2, 'hassan@outlook.com'),
(32, 'malak', '657557', 'kter 7elow ', '2024-01-07 19:31:36', 2, 'malak@outlook.com');

-- --------------------------------------------------------

--
-- Table structure for table `donor_details`
--

CREATE TABLE `donor_details` (
  `donor_id` int(11) NOT NULL,
  `donor_name` varchar(50) NOT NULL,
  `donor_number` varchar(10) NOT NULL,
  `donor_mail` varchar(50) NOT NULL,
  `donor_age` int(60) NOT NULL,
  `donor_gender` varchar(10) NOT NULL,
  `donor_blood` int(11) NOT NULL,
  `donor_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donor_details`
--

INSERT INTO `donor_details` (`donor_id`, `donor_name`, `donor_number`, `donor_mail`, `donor_age`, `donor_gender`, `donor_blood`, `donor_address`) VALUES
(1, 'joe ', '213333', 'joe@mail.com', 35, 'Male', 5, 'Lebanon'),
(4, 'jolly', '232444', '212@hotmail.com', 32, 'Female', 7, 'sour'),
(7, 'malak', '000888999', '76213@outlook.com', 19, 'Female', 5, 'tyre'),
(8, 'ali', '8980', '212@hotmail.com', 35, 'Male', 3, 'sour'),
(9, 'mhmd', '689099', 'mhm@outlook.com', 25, 'Male', 3, 'Dubai'),
(10, 'ali', '808800', '88989@outlook.com', 25, 'Male', 3, 'beirut'),
(11, 'hassan', '8900923', 'hasan@mail.com', 20, 'Male', 3, 'sourrrrrrr'),
(12, 'karam', '12121', '212@hotmail.com', 20, 'Male', 7, 'tyre');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `page_type` varchar(50) DEFAULT NULL,
  `page_data` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `page_name`, `page_type`, `page_data`) VALUES
(2, 'Why Become Donor', 'donor', '<span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Blood is the most precious gift that anyone can give to another person — the gift of life. A decision to donate your blood can save a life, or even several if your blood is separated into its components — red cells, platelets and plasma — which can be used individually for patients with specific conditions. Safe blood saves lives and improves health. Blood transfusion is needed for:</span><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\"><br><ul><li>women with complications of pregnancy, such as ectopic pregnancies and haemorrhage before, during or after childbirth.\r\n</li><li>children with severe anaemia often resulting from malaria or malnutrition.\r\n</li><li>people with severe trauma following man-made and natural disasters.\r\n</li><li>many complex medical and surgical procedures and cancer patients.</li></ul>\r\n<br>It is also needed for regular transfusions for people with conditions such as thalassaemia and sickle cell disease and is used to make products such as clotting factors for people with haemophilia. There is a constant need for regular blood supply because blood can be stored for only a limited time before use.</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;Regular blood donations by a sufficient number of healthy people are needed to ensure that safe blood will be available whenever and wherever it is needed.</span>                                                                                                                        '),
(3, 'About Us ', 'aboutus', '<span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Blood bank&nbsp;</span><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">is a place where blood bag that is collected from blood donation events is stored in one place. The term “blood bank” refers to a division of a hospital laboratory where the storage of blood product occurs and where proper testing is performed to reduce the risk of transfusion related events . The process of managing the blood bag that is received from the blood donation events needs a proper and systematic management. The blood bag must be handled with care and treated thoroughly as it is related to someone’s life. The development of Web-based Blood Bank And Donation Management System is proposed to provide a management functional to the blood bank in order to handle the blood bag and to make entries of the individuals who want to donate blood and who are in need.</span>                                                                                                    '),
(4, 'The Need For Blood', 'needforblood', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">There are many reasons patients need blood. A common misunderstanding about blood usage is that accident victims are the patients who use the most blood. Actually, people needing the most blood include those:\r\n1) Being treated for cancer<br>\r\n2) Undergoing orthopedic surgeries<br>\r\n3) Undergoing cardiovascular surgeries<br>\r\n4) Being treated for inherited blood disorders</span>'),
(5, 'Blood Tips', 'bloodtips', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">\r\n1) You must be in good health. <br>\r\n2) Hydrate and eat a healthy meal before your donation.<br>\r\n3) You’re never too old to donate blood. <br>\r\n4) Rest and relaxed.<br>\r\n5) Don’t forget your FREE post-donation snack. \r\n</span>'),
(6, 'Who you could Help', 'whoyouhelp', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">\r\nEvery 2 seconds, someone in the World needs blood. Donating blood can help:\r\n\r\n1) People who go through disasters or emergency situations.<br>\r\n2) People who lose blood during major surgeries.<br>\r\n3) People who have lost blood because of a gastrointestinal bleed.<br>\r\n4) Women who have serious complications during pregnancy or childbirth.<br>\r\n5) People with cancer or severe anemia sometimes caused by thalassemia or sickle cell disease.<br>\r\n</span>'),
(7, 'Blood Groups', 'bloodgroups', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">\r\n  <p>  Blood group of any human being will mainly fall in any one of the following groups.</p>\r\n                <ul>\r\n\r\n                  <li>A positive or A negative</li>\r\n                  <li>B positive or B negative</li>\r\n                  <li>O positive or O negative</li>\r\n                  <li>AB positive or AB negative.</li>\r\n                </ul>\r\n                <p>Your blood group is determined by the genes you inherit from your parents.<br>\r\n                  A healthy diet helps ensure a successful blood donation, and also makes you feel better!\r\n                </p>\r\n\r\n</span>'),
(8, 'Universal Donors And Recepients', 'universal', '<p style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: medium; font-weight: 400; text-align: justify;\">The most common blood type is O, followed by type A. Type O individuals are often called \"universal donors\" since their blood can be transfused into persons with any blood type. Those with type AB blood are called \"universal recipients\" because they can receive blood of any type.</p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: medium; font-weight: 400; text-align: justify;\">For emergency transfusions, blood group type O negative blood is the variety of blood that has the lowest risk of causing serious reactions for most people who receive it. Because of this, it is sometimes called the universal blood donor type.</span>                                        ');

-- --------------------------------------------------------

--
-- Table structure for table `qurey_stat`
--

CREATE TABLE `qurey_stat` (
  `id` int(11) NOT NULL,
  `query_type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `qurey_stat`
--

INSERT INTO `qurey_stat` (`id`, `query_type`) VALUES
(1, 'Read'),
(2, 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_ifo`
--
ALTER TABLE `admin_ifo`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `blood`
--
ALTER TABLE `blood`
  ADD PRIMARY KEY (`blood_id`);

--
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `contact_query`
--
ALTER TABLE `contact_query`
  ADD PRIMARY KEY (`query_id`),
  ADD KEY `fk_query_status` (`query_status`);

--
-- Indexes for table `donor_details`
--
ALTER TABLE `donor_details`
  ADD PRIMARY KEY (`donor_id`),
  ADD KEY `fk_donor_blood` (`donor_blood`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `qurey_stat`
--
ALTER TABLE `qurey_stat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_ifo`
--
ALTER TABLE `admin_ifo`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blood`
--
ALTER TABLE `blood`
  MODIFY `blood_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_query`
--
ALTER TABLE `contact_query`
  MODIFY `query_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `donor_details`
--
ALTER TABLE `donor_details`
  MODIFY `donor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact_query`
--
ALTER TABLE `contact_query`
  ADD CONSTRAINT `fk_query_status` FOREIGN KEY (`query_status`) REFERENCES `qurey_stat` (`id`);

--
-- Constraints for table `donor_details`
--
ALTER TABLE `donor_details`
  ADD CONSTRAINT `fk_donor_blood` FOREIGN KEY (`donor_blood`) REFERENCES `blood` (`blood_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
