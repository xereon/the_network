CREATE TABLE IF NOT EXISTS `chat` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(50) NOT NULL,
`msg` varchar(100) NOT NULL,
`user_id` int(11) NOT NULL,
`date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (`id`),
KEY `date_index` (`date`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=193 ;

/* TODO - impliment registration login */
CREATE TABLE `users` (
  `user_id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `user_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `user_country` varchar(100) NOT NULL,
  `user_gender` varchar(100) NOT NULL,
  `dob_day` varchar(100) NOT NULL,
  `dob_month` varchar(100) NOT NULL,
  `dob_year` varchar(100) NOT NULL,
  `user_image` text NOT NULL,
  `user_register_date` date NOT NULL,
  `user_lastlogin` date NOT NULL,
  `status` text NOT NULL,
  `posts` text NOT NULL,
  `friends` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
