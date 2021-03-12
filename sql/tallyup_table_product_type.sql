
-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `product_type_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`product_type_id`, `name`, `description`) VALUES
(0, 'Products', 'Sellable goods in inventory'),
(1, 'Tools', 'Personal tools in inventory'),
(2, 'Sneakers', 'Shoes'),
(3, 'Accessories', 'Headwear, eyewear, jewelry, and extras'),
(4, 'Collectables', 'Collectable items');
