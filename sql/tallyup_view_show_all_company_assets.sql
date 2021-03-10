
-- --------------------------------------------------------

--
-- Structure for view `show_all_company_assets`
--
DROP TABLE IF EXISTS `show_all_company_assets`;

CREATE ALGORITHM=UNDEFINED DEFINER=`jeramiec`@`localhost` SQL SECURITY DEFINER VIEW `show_all_company_assets`  AS SELECT `product`.`name` AS `name`, `product`.`color` AS `color`, `inventory`.`product_id` AS `product_id` FROM (`inventory` join `product` on(`inventory`.`product_id` = `product`.`product_id`)) WHERE `product`.`product_type_id` = 1 ;
