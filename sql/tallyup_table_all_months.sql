
-- --------------------------------------------------------

--
-- Table structure for table `all_months`
--

CREATE TABLE `all_months` (
  `month_id` int(11) NOT NULL,
  `month_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `all_months`
--

INSERT INTO `all_months` (`month_id`, `month_name`) VALUES
(1, 'January'),
(2, 'February'),
(3, 'March'),
(4, 'April'),
(5, 'May'),
(6, 'June'),
(7, 'July'),
(8, 'August'),
(9, 'September'),
(10, 'October'),
(11, 'November'),
(12, 'December');
