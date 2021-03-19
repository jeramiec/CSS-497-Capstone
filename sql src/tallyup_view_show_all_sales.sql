
-- --------------------------------------------------------

--
-- Structure for view `show_all_sales`
--
DROP TABLE IF EXISTS `show_all_sales`;

CREATE ALGORITHM=UNDEFINED DEFINER=`jeramiec`@`localhost` SQL SECURITY DEFINER VIEW `show_all_sales`  AS SELECT `i`.`account_id` AS `account_id`, `i`.`inventory_id` AS `inventory_id`, `p`.`product_id` AS `product_id`, `s`.`status_name` AS `status`, `p`.`name` AS `name`, `p`.`size` AS `size`, `p`.`color` AS `color`, `e`.`purchase_price` AS `purchase_price`, `i`.`sold_price` AS `sold_price`, `i`.`sold_date` AS `sold_date`, `i`.`sold_price`- `e`.`purchase_price` AS `profit` FROM (((`product` `p` join `inventory` `i` on(`p`.`product_id` = `i`.`product_id`)) left join `expense` `e` on(`p`.`product_id` = `e`.`product_id`)) left join `status` `s` on(`p`.`status_id` = `s`.`status_id`)) WHERE `p`.`status_id` = 2 OR `p`.`status_id` = 3 ;
