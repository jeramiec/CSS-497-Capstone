
-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `product_type_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `size` varchar(4) DEFAULT NULL,
  `sku` varchar(20) DEFAULT NULL,
  `condition_id` int(11) DEFAULT NULL,
  `weight` decimal(19,2) DEFAULT NULL,
  `notes` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
