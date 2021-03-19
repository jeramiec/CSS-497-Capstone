
-- --------------------------------------------------------

--
-- Structure for view `total_available_items`
--
DROP TABLE IF EXISTS `total_available_items`;

CREATE ALGORITHM=UNDEFINED DEFINER=`jeramiec`@`localhost` SQL SECURITY DEFINER VIEW `total_available_items`  AS SELECT `i`.`account_id` AS `account_id`, count(`p`.`product_id`) AS `total_available_items` FROM (`inventory` `i` join `product` `p` on(`i`.`product_id` = `p`.`product_id`)) WHERE `p`.`status_id` <> 3 GROUP BY `i`.`account_id` ;
