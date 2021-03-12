
-- --------------------------------------------------------

--
-- Structure for view `total_purchases`
--
DROP TABLE IF EXISTS `total_purchases`;

CREATE ALGORITHM=UNDEFINED DEFINER=`jeramiec`@`%` SQL SECURITY DEFINER VIEW `total_purchases`  AS SELECT `e`.`account_id` AS `account_id`, count(0) AS `total_purchases` FROM `expense` AS `e` GROUP BY `e`.`account_id` ;
