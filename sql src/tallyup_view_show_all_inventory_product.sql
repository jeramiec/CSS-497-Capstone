
-- --------------------------------------------------------

--
-- Structure for view `show_all_inventory_product`
--
DROP TABLE IF EXISTS `show_all_inventory_product`;

CREATE ALGORITHM=UNDEFINED DEFINER=`jeramiec`@`localhost` SQL SECURITY DEFINER VIEW `show_all_inventory_product`  AS SELECT `p`.`product_id` AS `product_id`, `p`.`name` AS `name`, `p`.`color` AS `color`, `s`.`status_name` AS `status`, `pt`.`name` AS `type`, `cat`.`category_name` AS `category`, `p`.`size` AS `size`, `p`.`sku` AS `sku`, `pc`.`condition_name` AS `condition`, `i`.`inventory_id` AS `inventory_id`, `i`.`account_id` AS `account_id`, `i`.`listed_price` AS `listed_price`, `i`.`sold_price` AS `sold_price`, `i`.`sold_date` AS `sold_date`, `e`.`purchase_price` AS `purchase_price`, `e`.`purchase_date` AS `purchase_date`, `p`.`weight` AS `weight`, `p`.`notes` AS `notes` FROM ((((((`product` `p` join `inventory` `i` on(`p`.`product_id` = `i`.`product_id`)) left join `expense` `e` on(`e`.`product_id` = `i`.`product_id`)) left join `status` `s` on(`p`.`status_id` = `s`.`status_id`)) left join `product_type` `pt` on(`p`.`product_type_id` = `pt`.`product_type_id`)) left join `category` `cat` on(`p`.`category_id` = `cat`.`category_id`)) left join `product_condition` `pc` on(`p`.`condition_id` = `pc`.`product_condition_id`)) ;
