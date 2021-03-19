
-- --------------------------------------------------------

--
-- Structure for view `net_purchases`
--
DROP TABLE IF EXISTS `net_purchases`;

CREATE ALGORITHM=UNDEFINED DEFINER=`jeramiec`@`localhost` SQL SECURITY DEFINER VIEW `net_purchases`  AS SELECT `e`.`account_id` AS `account_id`, sum(`e`.`purchase_price`) AS `net_purchases` FROM `expense` AS `e` GROUP BY `e`.`account_id` ;
