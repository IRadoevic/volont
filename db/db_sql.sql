-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2023 at 08:59 PM
-- Server version: 8.0.27
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `volont`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int NOT NULL,
  `organiser_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `start_datetime` datetime DEFAULT NULL,
  `finish_datetime` datetime DEFAULT NULL,
  `finished` tinyint(1) NOT NULL DEFAULT '0',
  `interview` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_category`
--

CREATE TABLE `event_category` (
  `id` int NOT NULL,
  `event_id` int NOT NULL,
  `volonting_category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_coorganiser`
--

CREATE TABLE `event_coorganiser` (
  `id` int NOT NULL,
  `event_id` int NOT NULL,
  `coorganiser_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_pic`
--

CREATE TABLE `event_pic` (
  `id` int NOT NULL,
  `event_id` int NOT NULL,
  `pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `following`
--

CREATE TABLE `following` (
  `id` int NOT NULL,
  `followee_id` int NOT NULL,
  `follower_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE `friend` (
  `id` int NOT NULL,
  `friend1_id` int NOT NULL,
  `friend2_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `interview_applications`
--

CREATE TABLE `interview_applications` (
  `id` int NOT NULL,
  `applicant_id` int NOT NULL,
  `event_id` int NOT NULL,
  `informations` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requested_volonter_type`
--

CREATE TABLE `requested_volonter_type` (
  `id` int NOT NULL,
  `event_id` int NOT NULL,
  `volonter_type` varchar(255) NOT NULL,
  `number_of_volonters` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `pic` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` text,
  `gender` tinyint(1) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `register_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `volonting_category`
--

CREATE TABLE `volonting_category` (
  `id` int NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `volunteering`
--

CREATE TABLE `volunteering` (
  `id` int NOT NULL,
  `volunter_id` int NOT NULL,
  `event_id` int NOT NULL,
  `status` int NOT NULL,
  `apply_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `EVENT_fk0` (`organiser_id`);

--
-- Indexes for table `event_category`
--
ALTER TABLE `event_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `EVENT_CATEGORY_fk0` (`event_id`),
  ADD KEY `EVENT_CATEGORY_fk1` (`volonting_category_id`);

--
-- Indexes for table `event_coorganiser`
--
ALTER TABLE `event_coorganiser`
  ADD PRIMARY KEY (`id`),
  ADD KEY `EVENT_COORGANISER_fk0` (`event_id`),
  ADD KEY `EVENT_COORGANISER_fk1` (`coorganiser_id`);

--
-- Indexes for table `event_pic`
--
ALTER TABLE `event_pic`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `EVENT_PIC_fk0` (`event_id`);

--
-- Indexes for table `following`
--
ALTER TABLE `following`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FOLLOWING_fk0` (`followee_id`),
  ADD KEY `FOLLOWING_fk1` (`follower_id`);

--
-- Indexes for table `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `FRIEND_fk0` (`friend1_id`),
  ADD KEY `FRIEND_fk1` (`friend2_id`);

--
-- Indexes for table `interview_applications`
--
ALTER TABLE `interview_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `INTERVIEW_APPLICATIONS_fk0` (`applicant_id`),
  ADD KEY `INTERVIEW_APPLICATIONS_fk1` (`event_id`);

--
-- Indexes for table `requested_volonter_type`
--
ALTER TABLE `requested_volonter_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `REQUESTED_VOLONTER_TYPE_fk0` (`event_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `volonting_category`
--
ALTER TABLE `volonting_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `category` (`category`);

--
-- Indexes for table `volunteering`
--
ALTER TABLE `volunteering`
  ADD PRIMARY KEY (`id`),
  ADD KEY `VOLUNTEERING_fk0` (`volunter_id`),
  ADD KEY `VOLUNTEERING_fk1` (`event_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_category`
--
ALTER TABLE `event_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_coorganiser`
--
ALTER TABLE `event_coorganiser`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_pic`
--
ALTER TABLE `event_pic`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `following`
--
ALTER TABLE `following`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friend`
--
ALTER TABLE `friend`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interview_applications`
--
ALTER TABLE `interview_applications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requested_volonter_type`
--
ALTER TABLE `requested_volonter_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `volonting_category`
--
ALTER TABLE `volonting_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `volunteering`
--
ALTER TABLE `volunteering`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `EVENT_fk0` FOREIGN KEY (`organiser_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `event_category`
--
ALTER TABLE `event_category`
  ADD CONSTRAINT `EVENT_CATEGORY_fk0` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  ADD CONSTRAINT `EVENT_CATEGORY_fk1` FOREIGN KEY (`volonting_category_id`) REFERENCES `volonting_category` (`id`);

--
-- Constraints for table `event_coorganiser`
--
ALTER TABLE `event_coorganiser`
  ADD CONSTRAINT `EVENT_COORGANISER_fk0` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  ADD CONSTRAINT `EVENT_COORGANISER_fk1` FOREIGN KEY (`coorganiser_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `event_pic`
--
ALTER TABLE `event_pic`
  ADD CONSTRAINT `EVENT_PIC_fk0` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`);

--
-- Constraints for table `following`
--
ALTER TABLE `following`
  ADD CONSTRAINT `FOLLOWING_fk0` FOREIGN KEY (`followee_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FOLLOWING_fk1` FOREIGN KEY (`follower_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `friend`
--
ALTER TABLE `friend`
  ADD CONSTRAINT `FRIEND_fk0` FOREIGN KEY (`friend1_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FRIEND_fk1` FOREIGN KEY (`friend2_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `interview_applications`
--
ALTER TABLE `interview_applications`
  ADD CONSTRAINT `INTERVIEW_APPLICATIONS_fk0` FOREIGN KEY (`applicant_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `INTERVIEW_APPLICATIONS_fk1` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`);

--
-- Constraints for table `requested_volonter_type`
--
ALTER TABLE `requested_volonter_type`
  ADD CONSTRAINT `REQUESTED_VOLONTER_TYPE_fk0` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`);

--
-- Constraints for table `volunteering`
--
ALTER TABLE `volunteering`
  ADD CONSTRAINT `VOLUNTEERING_fk0` FOREIGN KEY (`volunter_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `VOLUNTEERING_fk1` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
