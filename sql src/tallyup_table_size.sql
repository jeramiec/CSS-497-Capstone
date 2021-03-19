
-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `size_id` int(11) NOT NULL,
  `original_size` varchar(10) DEFAULT NULL,
  `length` varchar(7) DEFAULT NULL,
  `width` varchar(7) DEFAULT NULL,
  `height` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
