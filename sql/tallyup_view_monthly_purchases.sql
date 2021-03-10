
-- --------------------------------------------------------

--
-- Structure for view `monthly_purchases`
--
DROP TABLE IF EXISTS `monthly_purchases`;

CREATE ALGORITHM=UNDEFINED DEFINER=`jeramiec`@`localhost` SQL SECURITY DEFINER VIEW `monthly_purchases`  AS SELECT `e`.`account_id` AS `account_id`, monthname(`e`.`purchase_date`) AS `month`, year(`e`.`purchase_date`) AS `year`, sum(case when `p`.`category_id` <> 2 then `e`.`purchase_price` else 0 end) AS `p_company`, sum(case when `p`.`category_id` = 2 then `e`.`purchase_price` else 0 end) AS `p_personal` FROM (`expense` `e` join `product` `p` on(`p`.`product_id` = `e`.`product_id`)) GROUP BY year(`e`.`purchase_date`), month(`e`.`purchase_date`), `e`.`account_id` ;
