CREATE TABLE `inventory` (
  `inventory_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `listed_price` decimal(19,2) DEFAULT NULL,
  `sold_price` decimal(19,2) DEFAULT NULL,
  `sold_date` date DEFAULT NULL,
  PRIMARY KEY (`inventory_id`),
  KEY `fk_product_id_idx` (`product_id`),
  KEY `fk_inventory_account_id_idx` (`account_id`),
  CONSTRAINT `fk_inventory_account_id` FOREIGN KEY (`account_id`) REFERENCES `account` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=399682 DEFAULT CHARSET=utf8mb4