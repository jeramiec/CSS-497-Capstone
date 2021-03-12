
-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `expense_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `purchase_price` decimal(19,2) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `purchase_location` varchar(100) DEFAULT NULL,
  `notes` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`expense_id`, `account_id`, `product_id`, `purchase_price`, `purchase_date`, `purchase_location`, `notes`) VALUES
(202306, 19894, 177218, '129.12', NULL, NULL, NULL),
(202694, 10465, 137881, '96.30', NULL, NULL, NULL),
(203863, 11087, 162769, '9.39', NULL, NULL, NULL),
(203893, 13107, 186786, '81.56', NULL, NULL, NULL),
(206895, 18393, 166987, '40.21', NULL, NULL, NULL),
(218281, 10465, 185643, '56.23', NULL, NULL, NULL),
(222829, 11052, 137145, '5.29', NULL, NULL, NULL),
(228939, 11270, 192973, '10.00', '2021-02-09', NULL, NULL),
(234578, 11270, 173270, '88.23', '2021-03-17', NULL, NULL),
(238690, 10465, 153944, '100.43', NULL, NULL, NULL),
(239683, 13107, 181504, '120.10', NULL, NULL, NULL),
(260703, 10465, 145826, '69.99', NULL, NULL, NULL),
(278920, 13107, 156604, '32.42', NULL, NULL, NULL),
(286390, 11270, 193113, '100.00', '2021-03-10', NULL, NULL),
(291845, 11052, 139840, '19.42', NULL, NULL, NULL),
(298286, 18393, 198031, '188.34', NULL, NULL, NULL),
(298314, 11270, 174338, '200.00', '2021-02-28', NULL, ''),
(298320, 11270, 167653, '200.00', '2021-01-14', NULL, ''),
(298344, 11270, 199522, '100.00', '2021-03-10', 'Wix', ''),
(298389, 11270, 199523, '321.00', '2021-02-09', NULL, ''),
(298390, 11270, 199566, '176.00', '2021-03-04', '', 'This is a test item.'),
(298392, 11270, 101824, '20.00', '2021-01-06', NULL, ''),
(298393, 19908, 199568, '176.00', '2021-03-04', NULL, 'This is a test item.'),
(298394, 19908, 199569, '176.00', '2021-03-04', NULL, 'This is a test item.'),
(298395, 19908, 199570, '176.00', '2021-02-25', NULL, 'This is a test item.'),
(298396, 19908, 199571, '176.00', '2021-01-06', NULL, 'This is a test item.'),
(298397, 19908, 199572, '176.00', '2020-12-10', NULL, 'This is a test item.');
