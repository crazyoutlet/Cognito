-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 27, 2011 at 03:47 PM
-- Server version: 5.1.37
-- PHP Version: 5.2.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `project5_cognito`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountprivileges`
--

CREATE TABLE `accountprivileges` (
  `privilegesid` tinyint(4) NOT NULL AUTO_INCREMENT,
  `state` varchar(20) NOT NULL,
  PRIMARY KEY (`privilegesid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='account privileges, whether admin, teacher, user, or derek' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `accountprivileges`
--

INSERT INTO `accountprivileges` VALUES(1, 'student');
INSERT INTO `accountprivileges` VALUES(2, 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `schoolid` int(11) NOT NULL,
  `lastlogin` datetime NOT NULL,
  `privilegesid` tinyint(11) NOT NULL,
  UNIQUE KEY `userid` (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='User info stored here' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` VALUES(1, 'johnnyfishcake', '8d9f17ba1eaa387f25f73cf6854fb0f844ffd537', 1, '2011-02-27 15:13:51', 1);
INSERT INTO `accounts` VALUES(2, 'hwathechong', 'sha1(hwathechong)', 1, '2011-02-04 19:03:20', 1);
INSERT INTO `accounts` VALUES(3, 'chickennugget', 'sha1(chickennugget)', 1, '2011-02-04 19:28:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `calendarid` int(11) NOT NULL AUTO_INCREMENT,
  `itemname` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `starttime` datetime NOT NULL,
  `endtime` datetime NOT NULL,
  `date` datetime NOT NULL,
  `groupid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `repeatid` tinyint(4) NOT NULL,
  PRIMARY KEY (`calendarid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` VALUES(20, 'dga', 'asdfasdf', '2011-02-09 10:00:00', '2011-02-09 16:00:00', '2011-02-27 14:30:50', 1, 0, 1);
INSERT INTO `calendar` VALUES(19, 'Dog', 'face', '2011-02-17 10:00:00', '2011-02-17 12:00:00', '2011-02-27 14:26:39', 1, 0, 1);
INSERT INTO `calendar` VALUES(17, 'Hey', 'You', '2011-02-28 10:19:19', '2011-02-28 14:19:29', '2011-02-27 14:19:34', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `calendarrepeat`
--

CREATE TABLE `calendarrepeat` (
  `repeatid` tinyint(4) NOT NULL AUTO_INCREMENT,
  `label` varchar(20) NOT NULL,
  PRIMARY KEY (`repeatid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `calendarrepeat`
--

INSERT INTO `calendarrepeat` VALUES(1, 'No repeat');
INSERT INTO `calendarrepeat` VALUES(2, 'Daily');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `countryid` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`countryid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Stores the various country names' AUTO_INCREMENT=5 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` VALUES(1, 'Zimbabwe');
INSERT INTO `countries` VALUES(2, 'Maldives');

-- --------------------------------------------------------

--
-- Table structure for table `duration`
--

CREATE TABLE `duration` (
  `durationid` tinyint(4) NOT NULL AUTO_INCREMENT,
  `label` varchar(20) NOT NULL,
  PRIMARY KEY (`durationid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `duration`
--

INSERT INTO `duration` VALUES(1, '1 hour');

-- --------------------------------------------------------

--
-- Table structure for table `errorlog`
--

CREATE TABLE `errorlog` (
  `errorid` bigint(20) NOT NULL AUTO_INCREMENT,
  `typeid` tinyint(4) NOT NULL,
  `details` varchar(500) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`errorid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Log the errors that surface' AUTO_INCREMENT=5 ;

--
-- Dumping data for table `errorlog`
--

INSERT INTO `errorlog` VALUES(1, 1, 'Testing of notice.', '2011-02-04 19:23:57');
INSERT INTO `errorlog` VALUES(2, 2, 'Testing of warning!', '2011-02-04 01:00:00');
INSERT INTO `errorlog` VALUES(3, 3, 'Relax, this is a test', '2011-02-04 20:00:00');
INSERT INTO `errorlog` VALUES(4, 4, 'Woah, testing...', '2011-02-04 21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `errortype`
--

CREATE TABLE `errortype` (
  `typeid` tinyint(4) NOT NULL AUTO_INCREMENT,
  `label` varchar(20) NOT NULL,
  PRIMARY KEY (`typeid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='contains the different error types that are logged to errorl' AUTO_INCREMENT=5 ;

--
-- Dumping data for table `errortype`
--

INSERT INTO `errortype` VALUES(1, 'notice');
INSERT INTO `errortype` VALUES(2, 'warning');
INSERT INTO `errortype` VALUES(3, 'error');
INSERT INTO `errortype` VALUES(4, 'alert');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventid` bigint(20) NOT NULL AUTO_INCREMENT,
  `groupid` bigint(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `time` datetime NOT NULL,
  `durationid` tinyint(4) NOT NULL,
  PRIMARY KEY (`eventid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='events can be created inside groups, hence the groupid requi' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` VALUES(1, 1, 'Research at the library', 'We will be meeting at H.264 Library on the Sunday 32nd March 2011.', '2011-02-06 14:50:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `group2accounts`
--

CREATE TABLE `group2accounts` (
  `groupid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `privileges` tinyint(4) NOT NULL,
  PRIMARY KEY (`groupid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Mapping table for groups, accounts and privileges of the use' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `group2accounts`
--

INSERT INTO `group2accounts` VALUES(1, 1, 1);
INSERT INTO `group2accounts` VALUES(2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `groupfiles`
--

CREATE TABLE `groupfiles` (
  `fileid` bigint(20) NOT NULL AUTO_INCREMENT,
  `groupid` bigint(20) NOT NULL,
  `filetypeid` tinyint(4) NOT NULL,
  `filelocation` varchar(200) NOT NULL,
  `time` datetime NOT NULL,
  `permissionid` tinyint(4) NOT NULL,
  `type` tinyint(4) NOT NULL,
  PRIMARY KEY (`fileid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Store file uploaded in group' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `groupfiles`
--


-- --------------------------------------------------------

--
-- Table structure for table `grouppost`
--

CREATE TABLE `grouppost` (
  `postid` int(11) NOT NULL AUTO_INCREMENT,
  `groupid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `time` datetime NOT NULL,
  `priorityid` tinyint(4) NOT NULL,
  PRIMARY KEY (`postid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Store messages posted in groups' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `grouppost`
--

INSERT INTO `grouppost` VALUES(1, 1, 1, 'Work Allocation', 'Here is what I propose: <br> I will do the research while the rest of you work on the powerpoint.', '2011-02-06 12:43:53', 1);
INSERT INTO `grouppost` VALUES(2, 1, 1, 'Contact Information', 'Email me your contact information ASAP or risk termination from the project. Cheers!', '2011-02-06 14:38:23', 1);
INSERT INTO `grouppost` VALUES(3, 1, 2, 'Research Due', 'Hello. Research is due.', '2011-02-07 18:07:03', 1);
INSERT INTO `grouppost` VALUES(4, 1, 1, 'Web Report', 'Web report due!', '2011-02-07 21:02:07', 1);
INSERT INTO `grouppost` VALUES(5, 1, 1, 'Mentor Session', 'We need to meet our mentor, mr KCTan', '2011-02-08 21:30:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `grouppostpriority`
--

CREATE TABLE `grouppostpriority` (
  `priorityid` tinyint(4) NOT NULL AUTO_INCREMENT,
  `label` varchar(20) NOT NULL,
  PRIMARY KEY (`priorityid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `grouppostpriority`
--


-- --------------------------------------------------------

--
-- Table structure for table `groupprivileges`
--

CREATE TABLE `groupprivileges` (
  `groupprivilegesid` tinyint(4) NOT NULL AUTO_INCREMENT,
  `label` varchar(100) NOT NULL,
  PRIMARY KEY (`groupprivilegesid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `groupprivileges`
--

INSERT INTO `groupprivileges` VALUES(1, 'Student Initiated Group');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `groupid` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `description` varchar(400) NOT NULL,
  PRIMARY KEY (`groupid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Stores the group information' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` VALUES(1, 'Our Science Project', 'A project where we have to build a human-sized dog');

-- --------------------------------------------------------

--
-- Table structure for table `iplog`
--

CREATE TABLE `iplog` (
  `logid` bigint(20) NOT NULL AUTO_INCREMENT,
  `userid` varchar(30) NOT NULL,
  `ipaddress` int(11) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`logid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Log every user''s IP' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `iplog`
--

INSERT INTO `iplog` VALUES(1, '1', 127001, '2011-02-04 17:09:17');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `schoolid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `countryid` int(11) NOT NULL,
  PRIMARY KEY (`schoolid`),
  UNIQUE KEY `schoolid` (`schoolid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Contains the information of the various schools' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` VALUES(1, 'Tom Jones High School', '1 Bomb Street', 1);
INSERT INTO `schools` VALUES(2, 'Cow High School', 'Bukit Timah Moo Avenue', 2);

-- --------------------------------------------------------

--
-- Table structure for table `siteconfig`
--

CREATE TABLE `siteconfig` (
  `feature` varchar(20) NOT NULL,
  `state` tinyint(4) NOT NULL,
  PRIMARY KEY (`feature`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siteconfig`
--

INSERT INTO `siteconfig` VALUES('registration', 1);
