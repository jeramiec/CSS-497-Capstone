
-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE `account_type` (
  `account_type_id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`account_type_id`, `type`, `description`) VALUES
(0, 'Retailer', 'For storeowners who sell custom or made goods.'),
(1, 'Reseller', 'For storeowners who resell a curated selection of goods.'),
(2, 'Dropship', 'For storeowners who sell dropshipped goods.');
