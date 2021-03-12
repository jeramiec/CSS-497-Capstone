
-- --------------------------------------------------------

--
-- Table structure for table `account_role`
--

CREATE TABLE `account_role` (
  `account_role_id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_role`
--

INSERT INTO `account_role` (`account_role_id`, `title`, `description`) VALUES
(0, 'Owner', 'User is a storeowner (full ownership of company)'),
(1, 'Member', 'User is a member of the store (limited to inventory editing, expense editing, and data analyzing)');
