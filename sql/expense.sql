CREATE TABLE `expense` (
  `expense_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cost` decimal(19,2) NOT NULL DEFAULT 0.00,
  `purchase_date` date DEFAULT NULL,
  `purchase_location` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`expense_id`),
  KEY `fk_expense_account_id_idx` (`account_id`),
  KEY `fk_product_expense_id_idx` (`product_id`),
  CONSTRAINT `fk_expense_account_id` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_product_expense_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=298287 DEFAULT CHARSET=utf8mb4