
-- --------------------------------------------------------

--
-- Structure for view `total_sold`
--
DROP TABLE IF EXISTS `total_sold`;

CREATE ALGORITHM=UNDEFINED DEFINER=`jeramiec`@`localhost` SQL SECURITY DEFINER VIEW `total_sold`  AS SELECT `i`.`account_id` AS `account_id`, count(`p`.`status_id`) AS `total_sold` FROM (`inventory` `i` left join `product` `p` on(`p`.`product_id` = `i`.`product_id`)) WHERE `p`.`status_id` = 3 GROUP BY `i`.`account_id` ;
