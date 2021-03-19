
-- --------------------------------------------------------

--
-- Structure for view `annual_sales`
--
DROP TABLE IF EXISTS `annual_sales`;

CREATE ALGORITHM=UNDEFINED DEFINER=`jeramiec`@`localhost` SQL SECURITY DEFINER VIEW `annual_sales`  AS SELECT `i`.`account_id` AS `account_id`, year(`i`.`sold_date`) AS `year`, sum(case when `p`.`category_id` <> 2 then `i`.`sold_price` else 0 end) AS `company`, sum(case when `p`.`category_id` = 2 then `i`.`sold_price` else 0 end) AS `personal` FROM (`inventory` `i` join `product` `p` on(`p`.`product_id` = `i`.`product_id`)) GROUP BY year(`i`.`sold_date`), `i`.`account_id` ;
