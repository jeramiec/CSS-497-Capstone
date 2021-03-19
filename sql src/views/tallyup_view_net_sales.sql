
-- --------------------------------------------------------

--
-- Structure for view `net_sales`
--
DROP TABLE IF EXISTS `net_sales`;

CREATE ALGORITHM=UNDEFINED DEFINER=`jeramiec`@`localhost` SQL SECURITY DEFINER VIEW `net_sales`  AS SELECT `i`.`account_id` AS `account_id`, sum(`i`.`sold_price`) AS `net_sales` FROM `inventory` AS `i` GROUP BY `i`.`account_id` ;
