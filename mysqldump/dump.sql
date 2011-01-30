CREATE TABLE `cognito_accounts` (
  `UserId` varchar(50) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `LastLogin` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cognito_accounts`
--

INSERT INTO `cognito_accounts` VALUES('c47ac8f440ee9101e02f57645e2278aa62ca15d4', 'user1', '2bd93c0fafeee03d032992f81dc7a020da938dfd', '2011-01-30 12:12:56');
