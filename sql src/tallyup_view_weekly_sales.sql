
-- --------------------------------------------------------

--
-- Structure for view `weekly_sales`
--
DROP TABLE IF EXISTS `weekly_sales`;

CREATE ALGORITHM=UNDEFINED DEFINER=`jeramiec`@`%` SQL SECURITY DEFINER VIEW `weekly_sales`  AS SELECT `i`.`account_id` AS `account_id`, week(`i`.`sold_date`) AS `week`, monthname(`i`.`sold_date`) AS `month`, year(`i`.`sold_date`) AS `year`, sum(case when `p`.`category_id` <> 2 then `i`.`sold_price` else 0 end) AS `s_company`, sum(case when `p`.`category_id` = 2 then `i`.`sold_price` else 0 end) AS `s_personal`, count(`i`.`sold_price`) AS `total_products_sold` FROM (`inventory` `i` join `product` `p` on(`p`.`product_id` = `i`.`product_id`)) GROUP BY year(`i`.`sold_date`), month(`i`.`sold_date`), `i`.`account_id` ORDER BY year(`i`.`sold_date`) DESC, month(`i`.`sold_date`) DESC, week(`i`.`sold_date`) DESC ;
