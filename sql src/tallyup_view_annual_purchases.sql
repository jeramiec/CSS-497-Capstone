
-- --------------------------------------------------------

--
-- Structure for view `annual_purchases`
--
DROP TABLE IF EXISTS `annual_purchases`;

CREATE ALGORITHM=UNDEFINED DEFINER=`jeramiec`@`localhost` SQL SECURITY DEFINER VIEW `annual_purchases`  AS SELECT `e`.`account_id` AS `account_id`, year(`e`.`purchase_date`) AS `year`, sum(case when `p`.`category_id` <> 2 then `e`.`purchase_price` else 0 end) AS `company`, sum(case when `p`.`category_id` = 2 then `e`.`purchase_price` else 0 end) AS `personal` FROM (`expense` `e` join `product` `p` on(`p`.`product_id` = `e`.`product_id`)) GROUP BY year(`e`.`purchase_date`), `e`.`account_id` ;
