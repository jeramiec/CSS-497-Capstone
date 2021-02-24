CREATE TABLE `account` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_type_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `company` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`account_id`),
  KEY `role_idx` (`role_id`),
  KEY `type_idx` (`account_type_id`),
  CONSTRAINT `fk_role` FOREIGN KEY (`role_id`) REFERENCES `account_role` (`account_role_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19911 DEFAULT CHARSET=utf8mb4