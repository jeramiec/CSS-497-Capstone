CREATE TABLE `account_type` (
  `account_type_id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`account_type_id`),
  UNIQUE KEY `type_UNIQUE` (`type`),
  UNIQUE KEY `account_type_id_UNIQUE` (`account_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4