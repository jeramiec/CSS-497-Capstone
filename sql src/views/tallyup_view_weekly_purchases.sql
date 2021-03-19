
-- --------------------------------------------------------

--
-- Structure for view `weekly_purchases`
--
DROP TABLE IF EXISTS `weekly_purchases`;

CREATE ALGORITHM=UNDEFINED DEFINER=`jeramiec`@`%` SQL SECURITY DEFINER VIEW `weekly_purchases`  AS SELECT `e`.`account_id` AS `account_id`, week(`e`.`purchase_date`) AS `week`, monthname(`e`.`purchase_date`) AS `month`, year(`e`.`purchase_date`) AS `year`, sum(case when `p`.`category_id` <> 2 then `e`.`purchase_price` else 0 end) AS `p_company`, sum(case when `p`.`category_id` = 2 then `e`.`purchase_price` else 0 end) AS `p_personal`, count(`e`.`purchase_price`) AS `total_products_purchased` FROM (`expense` `e` join `product` `p` on(`p`.`product_id` = `e`.`product_id`)) GROUP BY week(`e`.`purchase_date`), year(`e`.`purchase_date`), month(`e`.`purchase_date`), `e`.`account_id` ORDER BY year(`e`.`purchase_date`) DESC, month(`e`.`purchase_date`) DESC, week(`e`.`purchase_date`) DESC ;
