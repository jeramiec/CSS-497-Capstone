
-- --------------------------------------------------------

--
-- Structure for view `total_users`
--
DROP TABLE IF EXISTS `total_users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`jeramiec`@`localhost` SQL SECURITY DEFINER VIEW `total_users`  AS SELECT count(0) AS `total_accounts` FROM `account` ;
