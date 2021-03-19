
-- --------------------------------------------------------

--
-- Structure for view `monthly_sales`
--
DROP TABLE IF EXISTS `monthly_sales`;

CREATE ALGORITHM=UNDEFINED DEFINER=`jeramiec`@`localhost` SQL SECURITY DEFINER VIEW `monthly_sales`  AS SELECT `i`.`account_id` AS `account_id`, monthname(`i`.`sold_date`) AS `month`, year(`i`.`sold_date`) AS `year`, sum(case when `p`.`category_id` <> 2 then `i`.`sold_price` else 0 end) AS `s_company`, sum(case when `p`.`category_id` = 2 then `i`.`sold_price` else 0 end) AS `s_personal` FROM (`inventory` `i` join `product` `p` on(`p`.`product_id` = `i`.`product_id`)) GROUP BY year(`i`.`sold_date`), month(`i`.`sold_date`), `i`.`account_id` ;
