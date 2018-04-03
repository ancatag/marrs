CREATE TABLE `sb_stu` (
  `stu_id` bigint(11) AUTO_INCREMENT NOT NULL,
  `stu_fullname` varchar(50) NOT NULL,
  `stu_username` varchar(50) NOT NULL,
  `stu_password` varchar(50) NOT NULL,
  `stu_email` varchar(50) NOT NULL,
  `stu_dob` date DEFAULT NULL,
  `stu_gender` enum('Male','Female') DEFAULT NULL,
  `stu_photo` text,
  `stu_fathername` varchar(50) DEFAULT NULL,
  `stu_mothername` varchar(45) DEFAULT NULL,
  `stu_commadd` varchar(155) DEFAULT NULL,
  `stu_commadd1` varchar(200) DEFAULT NULL,
  `stu_commadd2` varchar(200) DEFAULT NULL,
  `stu_capincode` varchar(45) DEFAULT NULL,
  `stu_permadd` varchar(155) DEFAULT NULL,
  `stu_permadd1` varchar(200) DEFAULT NULL,
  `stu_permadd2` varchar(200) DEFAULT NULL,
  `stu_papincode` varchar(45) DEFAULT NULL,
  `stu_created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `stu_modified_date` datetime NOT NULL,
  `stu_phone` varchar(25) DEFAULT NULL,
  `stu_status` enum('Active','Inactive','Deleted','Pending') NOT NULL DEFAULT 'Pending',
  `stu_profstatus` enum('1','0') NOT NULL DEFAULT '0',
    PRIMARY KEY (stu_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `sb_stu_news` (
  `stu_news_id` bigint(11) AUTO_INCREMENT NOT NULL,
  `stu_news_title` varchar(50) NOT NULL,
  `stu_news_content` text,
  `stu_news_created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `stu_news_modified_date` datetime NOT NULL,
  `stu_news_status` enum('1','0') NOT NULL DEFAULT '0',
    PRIMARY KEY (stu_news_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;