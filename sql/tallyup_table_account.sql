
-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_id` int(11) NOT NULL,
  `account_type_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `company` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `account_type_id`, `role_id`, `first_name`, `last_name`, `phone_number`, `address`, `email`, `username`, `password`, `company`) VALUES
(10028, 1, 0, 'Winfield', 'Celiz', NULL, '152 1st Point', 'wcelizo@imgur.com', 'wcelizo', 'BskRhOYzz', 'Browsedrive'),
(10190, 1, 0, 'Cori', 'Matuszynski', NULL, '35 Kenwood Avenue', 'cmatuszynskiy@xinhuanet.com', 'cmatuszynskiy', 'uCP4ZS', 'Voonder'),
(10437, 1, 0, 'Aloise', 'Simnor', NULL, '6380 Cordelia Crossing', 'asimnorj@dagondesign.com', 'asimnorj', '0P1YXIwj9qP', 'Tagopia'),
(10465, 1, 0, 'Glyn', 'Otton', NULL, '531 Badeau Pass', 'gottong@4shared.com', 'gottong', '1234', 'Quatz'),
(10480, 1, 0, 'Jasper', 'Coggeshall', NULL, '25955 Lakeland Plaza', 'jcoggeshall17@nydailynews.com', 'jcoggeshall17', 'lFNzzqgD', 'Vidoo'),
(10592, 1, 0, 'Lexi', 'Slayny', NULL, '73 Porter Terrace', 'lslayny5@hao123.com', 'lslayny5', 'JQCHycwA', 'Feedmix'),
(10595, 1, 0, 'Keely', 'Eldrid', NULL, '0 Kinsman Road', 'keldrida@mashable.com', 'keldrida', 'GXn5kky2zulP', 'Trudoo'),
(10733, 1, 0, 'Kirbee', 'Yakobovicz', NULL, '419 Hintze Street', 'kyakoboviczf@cdbaby.com', 'kyakoboviczf', 'QTETbme', 'Tazzy'),
(10956, 1, 0, 'Torre', 'Guy', NULL, '3 Schlimgen Drive', 'tguy10@quantcast.com', 'tguy10', 'FW7xfB', 'Realcube'),
(11052, 1, 0, 'Briggs', 'Hoffmann', NULL, '6 Towne Pass', 'bhoffmannt@dmoz.org', 'bhoffmannt', 'SiwTzdrM9FS', 'Digitube'),
(11087, 1, 0, 'Carney', 'Trinkwon', NULL, '854 Westridge Hill', 'ctrinkwonh@de.vu', 'ctrinkwonh', 'BUc9l6EoihCP', 'Gigazoom'),
(11270, 1, 0, 'Camile', 'Teacy', NULL, '7686 Bartillon Parkway', 'cteacyk@hubpages.com', 'cteacyk', '1234', 'Dabshots'),
(11299, 1, 0, 'Gianina', 'Harsnipe', NULL, '122 Main Court', 'gharsnipe1d@noaa.gov', 'gharsnipe1d', 'kqkHaMmvg', 'Skyba'),
(11389, 1, 0, 'Hyacinth', 'Nisbet', NULL, '088 Larry Street', 'hnisbetz@usgs.gov', 'hnisbetz', '0MFJiBMUaByb', 'Tazz'),
(11705, 1, 0, 'Dalenna', 'Dalrymple', NULL, '57 Hayes Lane', 'ddalrymple9@epa.gov', 'ddalrymple9', 'R131yAp0j8', 'Yata'),
(11775, 1, 0, 'Euell', 'Chree', NULL, '91598 Garrison Center', 'echree4@sphinn.com', 'echree4', '9WDhvjzey5ii', 'Yodo'),
(12228, 1, 0, 'Marta', 'Bucke', NULL, '307 Green Ridge Place', 'mbucke2@qq.com', 'mbucke2', 'BYKWzPtR6F', 'Twimbo'),
(12478, 1, 0, 'Ashien', 'Skamal', NULL, '2851 Hazelcrest Avenue', 'askamal1b@tiny.cc', 'askamal1b', 'Now9JdnHj', 'Izio'),
(12482, 1, 0, 'Witty', 'D\' Angelo', NULL, '66008 Parkside Terrace', 'wdangelos@newsvine.com', 'wdangelos', 'dCVopUlbVJTG', 'Photobug'),
(12522, 1, 0, 'Adriaens', 'McGavigan', NULL, '740 Holy Cross Lane', 'amcgaviganc@digg.com', 'amcgaviganc', 'lEO4sIua', 'Babbleset'),
(13107, 1, 0, 'Ephraim', 'Symington', NULL, '01643 American Court', 'esymingtonv@squarespace.com', 'esymingtonv', 'HOPLqAAWlyl', 'Rhyloo'),
(13487, 1, 0, 'Isaak', 'Runcie', NULL, '007 Crest Line Way', 'iruncien@hugedomains.com', 'iruncien', 'hJSeBJsBm', 'Izio'),
(13972, 1, 0, 'Etta', 'Mossbee', NULL, '87821 Barby Hill', 'emossbee16@elpais.com', 'emossbee16', 'tQpVsGve', 'Snaptags'),
(14036, 1, 0, 'Joscelin', 'Cluett', NULL, '87524 Green Ridge Junction', 'jcluett14@prlog.org', 'jcluett14', '0OnmzLJ', 'Linklinks'),
(14115, 1, 0, 'Heidi', 'Patrono', NULL, '910 Arizona Parkway', 'hpatronou@rediff.com', 'hpatronou', 'tahwVE', 'Yodo'),
(14201, 1, 0, 'Rochell', 'Stannislawski', NULL, '8 Ridgeway Crossing', 'rstannislawskib@goodreads.com', 'rstannislawskib', 'efLrHZl', 'Shufflebeat'),
(14239, 1, 0, 'Hattie', 'Boothby', NULL, '564 1st Drive', 'hboothby3@studiopress.com', 'hboothby3', '4guEAJQv', 'Trilith'),
(14381, 1, 0, 'Ingra', 'Bayston', NULL, '51 Warbler Crossing', 'ibayston6@furl.net', 'ibayston6', 'SzD0re6gCt', 'Eabox'),
(14622, 1, 0, 'Neill', 'Janowicz', NULL, '3 Schurz Place', 'njanowicz11@census.gov', 'njanowicz11', 'ZtHlnTY', 'Tazzy'),
(15144, 1, 0, 'Corey', 'Burn', NULL, '0097 Superior Parkway', 'cburni@miibeian.gov.cn', 'cburni', 'i4WCzQ7QhxLB', 'Ooba'),
(15878, 1, 0, 'Ky', 'Hritzko', NULL, '57977 Dayton Center', 'khritzkoe@dagondesign.com', 'khritzkoe', 'aZ31bIhiFcS', 'Yotz'),
(16035, 1, 0, 'Benita', 'Gwinnett', NULL, '3 Towne Plaza', 'bgwinnettx@va.gov', 'bgwinnettx', 'Q560F2vxt', 'Meetz'),
(16185, 1, 0, 'Finn', 'Bienvenu', NULL, '734 Schurz Pass', 'fbienvenud@amazon.de', 'fbienvenud', 'OjrErla4t', 'Zoozzy'),
(16547, 1, 0, 'Brittni', 'Dibsdale', NULL, '8325 Lyons Pass', 'bdibsdale19@icio.us', 'bdibsdale19', 'wKQKQ0OEB7ws', 'Realbuzz'),
(16837, 1, 0, 'Godart', 'Gendricke', NULL, '89 Blue Bill Park Crossing', 'ggendricke8@wordpress.com', 'ggendricke8', 'OMIaBJaAsa', 'Vinte'),
(17184, 1, 0, 'Bendicty', 'Nineham', NULL, '384 North Park', 'bnineham0@phpbb.com', 'bnineham0', 'NkL4gofr3lH', 'Eadel'),
(17251, 1, 0, 'Marnie', 'Doerling', NULL, '374 Barby Trail', 'mdoerling13@hostgator.com', 'mdoerling13', '5k1l427fz', 'Browsedrive'),
(17602, 1, 0, 'Alane', 'Calltone', NULL, '59 Roxbury Road', 'acalltone15@1688.com', 'acalltone15', 'AKw2hxME5IVU', 'Jayo'),
(17922, 1, 0, 'Geno', 'Weich', NULL, '3155 Schurz Circle', 'gweichw@moonfruit.com', 'gweichw', 'Rf6yIPgs', 'Skinder'),
(18013, 1, 0, 'Jennilee', 'Trimmill', NULL, '46196 Huxley Alley', 'jtrimmillm@4shared.com', 'jtrimmillm', 'Xk14oMj', 'Voomm'),
(18181, 1, 0, 'Garrot', 'Toffanini', NULL, '083 Blaine Pass', 'gtoffaninir@samsung.com', 'gtoffaninir', 'OZURWU', 'Skilith'),
(18344, 1, 0, 'Adiana', 'Glandfield', NULL, '2309 Transport Drive', 'aglandfield7@uiuc.edu', 'aglandfield7', 'iQXr2uL', 'Tekfly'),
(18393, 1, 0, 'Francisca', 'McGilben', NULL, '774 Chive Avenue', 'fmcgilben12@cloudflare.com', 'fmcgilben12', 'jA0KZC', 'Demivee'),
(18578, 1, 0, 'Merwin', 'Goldney', NULL, '61378 Schiller Point', 'mgoldneyp@odnoklassniki.ru', 'mgoldneyp', 'SU1N2Q', 'Innojam'),
(18801, 1, 0, 'Ambrosius', 'Moyle', NULL, '73 Paget Way', 'amoyleq@vkontakte.ru', 'amoyleq', 'DREMpitm', 'Kimia'),
(19166, 1, 0, 'Frances', 'Ritson', NULL, '33 Blue Bill Park Trail', 'fritson1a@zdnet.com', 'fritson1a', 'KEdDPZ', 'Buzzster'),
(19503, 1, 0, 'Daveen', 'Cockerton', NULL, '1 5th Trail', 'dcockerton18@twitpic.com', 'dcockerton18', 'hoJ0ifRcV4', 'Roomm'),
(19623, 1, 0, 'Devin', 'Bambridge', NULL, '5 Bellgrove Court', 'dbambridge1c@japanpost.jp', 'dbambridge1c', 'DscaLlxb', 'Quatz'),
(19714, 1, 0, 'Adelind', 'Borthram', NULL, '79880 Mcbride Point', 'aborthram1@mac.com', 'aborthram1', 'aJq08w', 'Demizz'),
(19894, 1, 0, 'Sarine', 'Benitti', NULL, '560 Trailsway Circle', 'sbenittil@columbia.edu', 'sbenittil', 'piigmGXkub', 'Roombo'),
(19908, 0, 0, NULL, NULL, NULL, NULL, 'jeramiec@uw.edu', 'jeramiec', '1234', NULL),
(19909, 0, 0, NULL, NULL, NULL, NULL, '', '', '', NULL),
(19910, 0, 0, NULL, NULL, NULL, NULL, 'fakeemail@yayhaya.com', 'bigbigbig', '1234', NULL);
