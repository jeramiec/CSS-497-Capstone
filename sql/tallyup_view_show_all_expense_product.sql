
-- --------------------------------------------------------

--
-- Structure for view `show_all_expense_product`
--
DROP TABLE IF EXISTS `show_all_expense_product`;

CREATE ALGORITHM=UNDEFINED DEFINER=`jeramiec`@`localhost` SQL SECURITY DEFINER VIEW `show_all_expense_product`  AS SELECT `e`.`expense_id` AS `expense_id`, `e`.`account_id` AS `account_id`, `e`.`product_id` AS `product_id`, `p`.`name` AS `name`, `e`.`purchase_price` AS `purchase_price`, `e`.`purchase_date` AS `purchase_date`, `e`.`purchase_location` AS `purchase_location`, `c`.`category_name` AS `category`, `e`.`notes` AS `notes` FROM ((`expense` `e` join `product` `p` on(`e`.`product_id` = `p`.`product_id`)) join `category` `c` on(`c`.`category_id` = `p`.`category_id`)) ;
