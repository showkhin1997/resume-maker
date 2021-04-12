create database `resume`;

use `resume`;

CREATE TABLE `user` (
  `id` int(9) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,  
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB;


CREATE TABLE `personal_information` (
  `id` int(11) NOT NULL auto_increment,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL, 
  `user_id` int(11) NOT NULL, 
  `email` varchar(50) NOT NULL, 
  `home` varchar(100) NOT NULL,
  `profile` varchar(200) NOT NULL,  
  `image` longtext NOT NULL,  
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB;

CREATE TABLE `experience` (
  `id` int(11) NOT NULL auto_increment,
  `company_name` varchar(100) NOT NULL,
  `end_date` date NOT NULL,
  `position` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL, 
  `address` varchar(100) NOT NULL, 
  `description` varchar(100) NOT NULL,   
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB;

CREATE TABLE `education` (
  `id` int(11) NOT NULL auto_increment,
  `degreename1` varchar(150) NOT NULL,
  `majorSubject1` varchar(150) NOT NULL,
  `instituteName1` varchar(150) NOT NULL,
  `startDate1` date NOT NULL, 
  `endDate1` date NOT NULL, 
  `degreename2` varchar(150) NOT NULL,
  `subjectName2` varchar(150) NOT NULL,
  `instituteName2` varchar(150) NOT NULL,
  `startDate2` date NOT NULL, 
  `endDate2` date NOT NULL,   
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB;
