
-- --------------------------------------------------------

--
-- Table structure for table `product_condition`
--

CREATE TABLE `product_condition` (
  `product_condition_id` int(11) NOT NULL,
  `condition_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_condition`
--

INSERT INTO `product_condition` (`product_condition_id`, `condition_name`) VALUES
(0, 'Brand new'),
(1, 'Like new'),
(2, 'Used'),
(3, 'Very used'),
(4, 'Damaged; issues');
