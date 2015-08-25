-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.0.51b-community-nt


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema zivweb
--

CREATE DATABASE IF NOT EXISTS zivweb;
USE zivweb;

--
-- Definition of table `activitygroups`
--

DROP TABLE IF EXISTS `activitygroups`;
CREATE TABLE `activitygroups` (
  `SID` int(10) unsigned NOT NULL auto_increment,
  `aGroupName` varchar(45) NOT NULL default 'no name',
  `City` varchar(45) NOT NULL,
  `Address` varchar(45) default NULL,
  PRIMARY KEY  (`SID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activitygroups`
--

/*!40000 ALTER TABLE `activitygroups` DISABLE KEYS */;
INSERT INTO `activitygroups` (`SID`,`aGroupName`,`City`,`Address`) VALUES 
 (1,'administration','',''),
 (2,'instructor','',''),
 (4,'tigers','carmiel','hagalil 67'),
 (5,'äçåöôðéí','ëøîéàì','àéï øçåáåú'),
 (6,'ìäåñéó áãé÷ú ú÷éðåú','ùìà éòùå ôãéçåú','ëàï'),
 (7,'âæø','òéï ëøîì','òéï ëøîì'),
 (10,'áéï äøéí åáéï ñìòéí','çìîéù','ìéã çìîéù'),
 (15,'fightClub','Chicago','Dungen1');
/*!40000 ALTER TABLE `activitygroups` ENABLE KEYS */;


--
-- Definition of table `chatmessages`
--

DROP TABLE IF EXISTS `chatmessages`;
CREATE TABLE `chatmessages` (
  `MID` int(10) unsigned NOT NULL auto_increment,
  `username` varchar(45) NOT NULL,
  `time` varchar(45) NOT NULL,
  `day` int(10) unsigned NOT NULL,
  `month` int(10) unsigned NOT NULL,
  `year` int(10) unsigned NOT NULL,
  `GID` varchar(45) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY  (`MID`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chatmessages`
--

/*!40000 ALTER TABLE `chatmessages` DISABLE KEYS */;
INSERT INTO `chatmessages` (`MID`,`username`,`time`,`day`,`month`,`year`,`GID`,`message`) VALUES 
 (17,'amit','0',0,0,0,'5','blah blah1'),
 (18,'amit','0',0,0,0,'5','blah blah2'),
 (19,'amit','0',0,0,0,'5','3'),
 (20,'amit','0',0,0,0,'5','blah blah4'),
 (21,'amit','0',0,0,0,'5','blah blah5'),
 (22,'amit','0',0,0,0,'5','blah blah6'),
 (23,'amit','0',0,0,0,'5','blah blah7'),
 (24,'amit','0',0,0,0,'5','blah blah8'),
 (25,'amit','0',0,0,0,'5','blah blah9'),
 (26,'amit','0',0,0,0,'5','blah blah0'),
 (27,'amit','0',0,0,0,'5','blah blah11'),
 (28,'amit','0',0,0,0,'5','12'),
 (29,'amit','0',0,0,0,'5','blah blah13'),
 (30,'amit','0',0,0,0,'5','blah blah14'),
 (31,'amit','0',0,0,0,'5','blah blah15'),
 (32,'amit','0',0,0,0,'5','blah blah16'),
 (33,'amit','0',0,0,0,'5','blah blah17'),
 (34,'amit','0',0,0,0,'5','blah blah18'),
 (35,'amit','0',0,0,0,'5','blah blah19'),
 (36,'amit','0',0,0,0,'5','blah blah20'),
 (37,'amit','0',0,0,0,'5','blah blah21'),
 (38,'amit','0',0,0,0,'5','blah blah22'),
 (39,'amit','0',0,0,0,'5','blah blah23'),
 (40,'amit','0',0,0,0,'5','blah blah24'),
 (41,'amit','0',0,0,0,'5','blah blah25'),
 (42,'amit','0',0,0,0,'5','blah blah26'),
 (43,'amit','0',0,0,0,'5','blah blah27'),
 (44,'amit','5555',2,5,999,'5','test'),
 (45,'amit','888',0,0,0,'5','8888');
/*!40000 ALTER TABLE `chatmessages` ENABLE KEYS */;


--
-- Definition of table `dailyreport`
--

DROP TABLE IF EXISTS `dailyreport`;
CREATE TABLE `dailyreport` (
  `UserName` char(45) NOT NULL,
  `day` int(10) unsigned NOT NULL default '0',
  `month` int(10) unsigned NOT NULL default '0',
  `year` int(10) unsigned NOT NULL default '0',
  `socilGoal` text,
  `professionalGaol` text,
  `seaCenterId` varchar(45) default NULL,
  `activityNumber` int(10) unsigned default NULL,
  `outGuide` varchar(45) default NULL,
  `volGuide` varchar(45) default NULL,
  `profGuide1` varchar(45) default NULL,
  `profGuide2` varchar(45) default NULL,
  `timeofActicity` varchar(45) default NULL,
  `typesofseatols` varchar(45) default NULL,
  `activity` text,
  `extend` text,
  `goal` text,
  `goal2` text,
  `more` text,
  `chelenge` text,
  `extendevent` text,
  `next` text,
  `problems` text,
  `problems2` text,
  `kind` varchar(45) default NULL,
  `nextImprove` text,
  PRIMARY KEY  (`UserName`,`day`,`month`,`year`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dailyreport`
--

/*!40000 ALTER TABLE `dailyreport` DISABLE KEYS */;
INSERT INTO `dailyreport` (`UserName`,`day`,`month`,`year`,`socilGoal`,`professionalGaol`,`seaCenterId`,`activityNumber`,`outGuide`,`volGuide`,`profGuide1`,`profGuide2`,`timeofActicity`,`typesofseatols`,`activity`,`extend`,`goal`,`goal2`,`more`,`chelenge`,`extendevent`,`next`,`problems`,`problems2`,`kind`,`nextImprove`) VALUES 
 ('amit',1,11,2008,'ââââââââââââââââââââââââââââââââââââââââââââââââââââââââââââââââââââââââââââââââ','âââââââââââââââââââââââââââââââââââââââ','Hifa',12,'âââââ','ââââââââ','bill','inst','ëôåìä','ââââââââââââââ','ââââââââââââââââââââââââââââ','âââââââââââââââââââââââââââââââââ','âââââââââââââââââââââââââââââââ','âââââââââââââââââââââââââââ','ââââââââââââââââââââââââââââââââââââââ','ââââââââââââââââââââââââââââââââââââââââââââââââââââââââââ','ââââââââââââââââââââââââââ',NULL,NULL,NULL,NULL,NULL),
 ('amit',26,10,2008,'','','Hifa',123,'yosi the big ','voli','bill','inst','','','','','','','','','','','','','÷éà÷éí ',NULL),
 ('amit',28,10,2008,'ìììììììììììììììììììììììììììììììììììììììììììììììììììììììììììììì','ìììììììììììììììììììììììììììììììììììììììì','ôåö÷ø',33,'ììììììììììììììì','ììììììììììììììììììììììììììììì','','àåâø','','ìììììììììììììììì','ììììììììììììììììììììììììììììììììììì','ììììììììììììììììììììììììììììììììììì','ìììììììììììììììììììììììììììììììììììììììììììììì','ììììììììììììììììììììììììì','ììììììììììììììììììììììììììììììììììì','ììììììììììììììììììììììììììììììììììììììììì','ìììììììììììììììììììììììììììììììììììì','','','','',NULL),
 ('amit',31,10,2008,'ããããããããããã','ããããããããããããããããããããããã','Hifa',33,'áááááááááááááááá','','','','','','ãããããããããããããããããããããããããããããããããã','ããããããããããããããããããããããããããããããããããããããããããããããããããã','ããããããããããããããããããããããããããããããã','äääääääääääääää','äääääääääääääääääääääääääää','äääääääääääääääääää','ääääääääääääääääääää','äääääääääääääääääääääääää','äääääääääääääääääääää','ääääääääääääääääääääääääääääääääääääääää',NULL,NULL),
 ('ss',22,22,2333,'á',NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
 ('ss2',22,22,222,'é','é','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
 ('ss3',22,23,222,'ì','ò','ç',12,'éåñé','îðùä','inst','àåâø',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `dailyreport` ENABLE KEYS */;


--
-- Definition of table `eventtable`
--

DROP TABLE IF EXISTS `eventtable`;
CREATE TABLE `eventtable` (
  `Username` varchar(45) NOT NULL,
  `Eday` int(10) unsigned NOT NULL default '0',
  `Emonth` int(10) unsigned NOT NULL default '0',
  `Eyear` int(10) unsigned NOT NULL default '0',
  `Ehour` int(10) unsigned NOT NULL default '0',
  `eventDis` text,
  `eventActionsbefore` text,
  `eventActionsduring` text,
  `eventActionsdAfter` text,
  `summary` text,
  `prevent` text,
  `react` text,
  `comments` text,
  `Emin` int(10) unsigned NOT NULL,
  PRIMARY KEY  USING BTREE (`Username`,`Eday`,`Emonth`,`Eyear`,`Ehour`,`Emin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `eventtable`
--

/*!40000 ALTER TABLE `eventtable` DISABLE KEYS */;
INSERT INTO `eventtable` (`Username`,`Eday`,`Emonth`,`Eyear`,`Ehour`,`eventDis`,`eventActionsbefore`,`eventActionsduring`,`eventActionsdAfter`,`summary`,`prevent`,`react`,`comments`,`Emin`) VALUES 
 ('amit',23,10,2008,2,'kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk								 asssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss','llllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll','','','','','','',0),
 ('sivank',1,1,111,5,'bla bla bla','bla','bla','bla','bla','bla','bla','bla',0);
/*!40000 ALTER TABLE `eventtable` ENABLE KEYS */;


--
-- Definition of table `formpermissionsgroup`
--

DROP TABLE IF EXISTS `formpermissionsgroup`;
CREATE TABLE `formpermissionsgroup` (
  `FID` int(10) unsigned NOT NULL,
  `PID` int(10) unsigned NOT NULL,
  KEY `FK_forms` (`FID`),
  KEY `FK_PermissionsGroup` (`PID`),
  CONSTRAINT `FK_forms` FOREIGN KEY (`FID`) REFERENCES `forms` (`FID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_PermissionsGroup` FOREIGN KEY (`PID`) REFERENCES `permissionsgroups` (`PID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `formpermissionsgroup`
--

/*!40000 ALTER TABLE `formpermissionsgroup` DISABLE KEYS */;
/*!40000 ALTER TABLE `formpermissionsgroup` ENABLE KEYS */;


--
-- Definition of table `forms`
--

DROP TABLE IF EXISTS `forms`;
CREATE TABLE `forms` (
  `FID` int(10) unsigned NOT NULL auto_increment,
  `FName` varchar(45) NOT NULL,
  PRIMARY KEY  (`FID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `forms`
--

/*!40000 ALTER TABLE `forms` DISABLE KEYS */;
INSERT INTO `forms` (`FID`,`FName`) VALUES 
 (1,'Add User Form'),
 (2,'Delete User Form'),
 (3,'Chat'),
 (4,'Forum'),
 (5,'Tik Madrih'),
 (6,'Finance');
/*!40000 ALTER TABLE `forms` ENABLE KEYS */;


--
-- Definition of table `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE `games` (
  `gameId` int(11) NOT NULL auto_increment,
  `gamename` varchar(45) default NULL,
  `gameDescription` varchar(400) default NULL,
  `gamecode` text,
  `imglink` varchar(100) NOT NULL,
  PRIMARY KEY  (`gameId`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `games`
--

/*!40000 ALTER TABLE `games` DISABLE KEYS */;
INSERT INTO `games` (`gameId`,`gamename`,`gameDescription`,`gamecode`,`imglink`) VALUES 
 (1,'ùç÷ ëãåøñì òí ñáúà !','îùç÷ ëãåøñì îøú÷ òí ñáúà! çåùá ùàúä îñåâì ...','<embed src=\"http://www.ultimatearcade.com/games.swf?x=ultimate-mega-hoops-2\" scale=\"noscale\" quality=\"high\" bgcolor=\"#000000\" width=\"600\" height=\"530\" name=\"games\" align=\"middle\" allowScriptAccess=\"sameDomain\" allowFullScreen=\"false\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" />','GamesPictures/1.jpg'),
 (2,'èèøéñ','ðñä ìñåáá ÷åáéåú ëãé ìäòìéí ùåøåú...','<embed src=\"http://www.ultimatearcade.com/games.swf?x=tetrix\" scale=\"noscale\" quality=\"high\" bgcolor=\"#000000\" width=\"650\" height=\"480\" name=\"games\" align=\"middle\" allowScriptAccess=\"sameDomain\" allowFullScreen=\"false\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" />','GamesPictures/2.jpg'),
 (3,'çééæø áîðåñä','òæøå ìððé ìáøåç îï äëìà!','<embed src=\"http://www.ultimatearcade.com/games.swf?x=alien-prison-break\" scale=\"noscale\" quality=\"high\" bgcolor=\"#000000\" width=\"600\" height=\"360\" name=\"games\" align=\"middle\" allowScriptAccess=\"sameDomain\" allowFullScreen=\"false\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" />','GamesPictures/3.jpg'),
 (4,'îøåöé à÷ñèøéí','äùúîùå áçéöéí ëãé ìðäåâ áîäéøåú','<embed src=\"http://www.ultimatearcade.com/games.swf?x=extreme-racing-2\" scale=\"noscale\" quality=\"high\" bgcolor=\"#000000\" width=\"550\" height=\"400\" name=\"games\" align=\"middle\" allowScriptAccess=\"sameDomain\" allowFullScreen=\"false\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" />','GamesPictures/4.jpg'),
 (10,'îàøá áîãáø','îùéîúê ëçééì öáàé ìäáéñ àú äàåéá äøùò','<embed src=\"http://www.ultimatearcade.com/games.swf?x=desert-ambush\" scale=\"noscale\" quality=\"high\" bgcolor=\"#000000\" width=\"740\" height=\"420\" name=\"games\" align=\"middle\" allowScriptAccess=\"sameDomain\" allowFullScreen=\"false\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" />','GamesPictures/5.jpg'),
 (15,'äîëä äñåôéú','äùúîù áî÷ìãú ëãé ìâáåø òì äéøéá','<embed src=\"http://www.ultimatearcade.com/games.swf?x=final-knockout\" scale=\"noscale\" quality=\"high\" bgcolor=\"#000000\" width=\"600\" height=\"400\" name=\"games\" align=\"middle\" allowScriptAccess=\"sameDomain\" allowFullScreen=\"false\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" />','GamesPictures/6.jpg'),
 (17,'áééñáåì','äîèøä ìäòéó ëãåøéí îçåõ ìàéöèãéåï','<embed src=\"http://www.ultimatearcade.com/games.swf?x=ultimate-baseball\" scale=\"noscale\" quality=\"high\" bgcolor=\"#000000\" width=\"721\" height=\"425\" name=\"games\" align=\"middle\" allowScriptAccess=\"sameDomain\" allowFullScreen=\"false\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" />','GamesPictures/7.jpg'),
 (19,'ìäöéì àú ðîå','äùúîù áòëáø ëãé ìîöåà àú äúåìòéí äàãåîåú åìäæäø îãééâéí','<embed src=\"http://www.ultimatearcade.com/games.swf?x=chomper\" scale=\"noscale\" quality=\"high\" bgcolor=\"#000000\" width=\"700\" height=\"400\" name=\"games\" align=\"middle\" allowScriptAccess=\"sameDomain\" allowFullScreen=\"false\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" />','GamesPictures/8.jpg'),
 (21,'ùãä àñèøåàéãéí','äùúîù áòëáø ìëååï åìôåöõ àáðé çìì','<embed src=\"http://www.ultimatearcade.com/games.swf?x=asteroid-field\" scale=\"noscale\" quality=\"high\" bgcolor=\"#000000\" width=\"550\" height=\"420\" name=\"games\" align=\"middle\" allowScriptAccess=\"sameDomain\" allowFullScreen=\"false\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" />','http://www.ultimatearcade.com/games/asteroid-field/150x150.jpg'),
 (36,'Rubik Cube 2','Twist and turn the colored tiles to create six faces of solid colors on your cube.','<embed src=\"http://www.ultimatearcade.com/games.swf?x=rubik-cube-2\" scale=\"noscale\" quality=\"high\" bgcolor=\"#000000\" width=\"600\" height=\"430\" name=\"games\" align=\"middle\" allowScriptAccess=\"sameDomain\" allowFullScreen=\"false\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" />','http://www.ultimatearcade.com/games/rubik-cube-2/150x150.jpg');
/*!40000 ALTER TABLE `games` ENABLE KEYS */;


--
-- Definition of table `guidefolderfiles`
--

DROP TABLE IF EXISTS `guidefolderfiles`;
CREATE TABLE `guidefolderfiles` (
  `FID` int(10) unsigned NOT NULL auto_increment,
  `fileName` varchar(45) NOT NULL,
  `link` varchar(45) NOT NULL,
  `type` int(10) unsigned NOT NULL,
  `date` varchar(45) NOT NULL,
  PRIMARY KEY  (`FID`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guidefolderfiles`
--

/*!40000 ALTER TABLE `guidefolderfiles` DISABLE KEYS */;
INSERT INTO `guidefolderfiles` (`FID`,`fileName`,`link`,`type`,`date`) VALUES 
 (56,'ãâùéí ìôòéìåú áçåãù äøàùåï','instAidFolder/56.doc',1,'27/10/2008 - 21:14'),
 (57,'èáìú áøéëåú','instAidFolder/57.doc',2,'27/10/2008 - 21:2'),
 (58,'èáìú ôòéìåú ùéà îòåãëðú','instAidFolder/58.doc',2,'27/10/2008 - 21:4'),
 (59,'èåôñ äæîðä ìçùéôä','instAidFolder/59.doc',3,'27/10/2008 - 21:5'),
 (60,'àéùåø äåøéí','instAidFolder/60.doc',2,'27/10/2008 - 21:6'),
 (61,'ð÷åãåú ìøàéåú ìîãøéê','instAidFolder/61.doc',1,'27/10/2008 - 21:7'),
 (62,'øùéîä ùîéú','instAidFolder/62.doc',2,'27/10/2008 - 21:7'),
 (63,'ãååç ôòéìåú éåîéú','instAidFolder/63.doc',1,'27/10/2008 - 21:8'),
 (64,'ãåâîà ìãåç ôòéìåú','instAidFolder/64.doc',1,'27/10/2008 - 21:8'),
 (65,'ãåç úëðåï ìãåâîà','instAidFolder/65.doc',1,'27/10/2008 - 21:9'),
 (66,'ð÷åãåú ìøàåéåðåú ìçðéëéí','instAidFolder/66.doc',1,'27/10/2008 - 21:10'),
 (67,'îããéí ìôòéìåú æéå ðòåøéí','instAidFolder/67.doc',2,'27/10/2008 - 21:11'),
 (68,'ôòéìåú äðöìä','instAidFolder/68.doc',1,'27/10/2008 - 21:13'),
 (69,'ãåç àéøåò çøéâ','instAidFolder/69.doc',1,'27/10/2008 - 21:13');
/*!40000 ALTER TABLE `guidefolderfiles` ENABLE KEYS */;


--
-- Definition of table `mainandsecendery`
--

DROP TABLE IF EXISTS `mainandsecendery`;
CREATE TABLE `mainandsecendery` (
  `mainTitle` varchar(45) NOT NULL,
  `secondery` varchar(45) NOT NULL,
  PRIMARY KEY  (`mainTitle`,`secondery`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mainandsecendery`
--

/*!40000 ALTER TABLE `mainandsecendery` DISABLE KEYS */;
INSERT INTO `mainandsecendery` (`mainTitle`,`secondery`) VALUES 
 ('&icirc;&aring;&atilde;&igrave; &ocirc;&ograve','äéí'),
 ('&icirc;&aring;&atilde;&igrave; &ocirc;&ograve','äîãøéê äçáøúé'),
 ('&icirc;&aring;&atilde;&igrave; &ocirc;&ograve','ä÷áåöä'),
 ('main 1','secend 1...1'),
 ('main 1','secend 1.0 ');
/*!40000 ALTER TABLE `mainandsecendery` ENABLE KEYS */;


--
-- Definition of table `messeges`
--

DROP TABLE IF EXISTS `messeges`;
CREATE TABLE `messeges` (
  `GID` int(10) unsigned NOT NULL auto_increment,
  `Message` varchar(400) NOT NULL,
  PRIMARY KEY  (`GID`),
  CONSTRAINT `FK_messeges_1` FOREIGN KEY (`GID`) REFERENCES `activitygroups` (`SID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messeges`
--

/*!40000 ALTER TABLE `messeges` DISABLE KEYS */;
INSERT INTO `messeges` (`GID`,`Message`) VALUES 
 (1,'ääðäìä îåñøú ùëãàé ìäéæäø ëùùåúéí îùìåìéú'),
 (2,'ëì îä ùëúåá ëàï çðéëéí ìà éëåìéí ìøàåú àáì ëì ùàø äàðùéí áîàâø ëï éøàå áøâò ùéúçáøå'),
 (4,'÷ãçú äáîáä'),
 (5,'äåãòåú àéï																																													'),
 (6,'çôøôøú ìà îîù øåàä èåá'),
 (7,'áòéï ëøîì éù îìà îîú÷éí'),
 (10,'äåãòåú àéï					');
/*!40000 ALTER TABLE `messeges` ENABLE KEYS */;


--
-- Definition of table `navalcenters`
--

DROP TABLE IF EXISTS `navalcenters`;
CREATE TABLE `navalcenters` (
  `ncid` int(10) unsigned NOT NULL auto_increment,
  `ncName` varchar(45) NOT NULL,
  `ncCity` varchar(45) NOT NULL,
  `sailBoats` int(11) default NULL,
  `manager` varchar(45) default NULL,
  `managTelNumber` varchar(45) default NULL,
  `contectMan` varchar(45) default NULL,
  `contectManTelNumber` varchar(45) default NULL,
  `maneging` varchar(45) default NULL,
  `comants` varchar(45) default NULL,
  `area` varchar(45) default NULL,
  PRIMARY KEY  (`ncid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `navalcenters`
--

/*!40000 ALTER TABLE `navalcenters` DISABLE KEYS */;
INSERT INTO `navalcenters` (`ncid`,`ncName`,`ncCity`,`sailBoats`,`manager`,`managTelNumber`,`contectMan`,`contectManTelNumber`,`maneging`,`comants`,`area`) VALUES 
 (4,'Hifa','Hifa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
 (5,'ôåö÷ø','ðäøéä',15,'éåñé áéèåï','052252525','øåðéú äîëåòøú','052666666','ã÷ì','àéï äòøåú ',NULL),
 (6,'áìä ','á ìä ',15,'','','','','','',NULL),
 (7,'úì àáéá éôå ','úì àáéá',5,'éåñé','0526666666','îðçí','0526666666','ááé','éù ìé äøáä ñéøåú ',NULL);
/*!40000 ALTER TABLE `navalcenters` ENABLE KEYS */;


--
-- Definition of table `permissionsgroups`
--

DROP TABLE IF EXISTS `permissionsgroups`;
CREATE TABLE `permissionsgroups` (
  `PID` int(10) unsigned NOT NULL auto_increment,
  `PGroupName` varchar(45) NOT NULL,
  `viewUsers` tinyint(1) NOT NULL default '0',
  `editUsers` tinyint(1) NOT NULL default '0',
  `viewGroups` tinyint(1) NOT NULL default '0',
  `editGroups` tinyint(1) NOT NULL default '0',
  `viewPermissions` tinyint(1) NOT NULL default '0',
  `editPermissions` tinyint(1) NOT NULL default '0',
  `viewAllUsers` tinyint(1) NOT NULL default '0',
  `sendMessageToGroup` tinyint(1) NOT NULL default '0',
  `sendMessageToAll` tinyint(1) NOT NULL default '0',
  `viewAttendecy` tinyint(1) NOT NULL default '0',
  `editAttendecy` tinyint(1) NOT NULL default '0',
  `viewInstructorsFolder` tinyint(1) NOT NULL default '0',
  `editInstructorsFolder` tinyint(1) NOT NULL default '0',
  `viewNavalCenters` tinyint(1) NOT NULL,
  `editNavalCenters` tinyint(1) NOT NULL,
  PRIMARY KEY  (`PID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissionsgroups`
--

/*!40000 ALTER TABLE `permissionsgroups` DISABLE KEYS */;
INSERT INTO `permissionsgroups` (`PID`,`PGroupName`,`viewUsers`,`editUsers`,`viewGroups`,`editGroups`,`viewPermissions`,`editPermissions`,`viewAllUsers`,`sendMessageToGroup`,`sendMessageToAll`,`viewAttendecy`,`editAttendecy`,`viewInstructorsFolder`,`editInstructorsFolder`,`viewNavalCenters`,`editNavalCenters`) VALUES 
 (1,'îðäì',1,1,1,1,1,1,1,1,1,1,1,1,1,1,1),
 (2,'îãøéê',1,1,0,0,0,0,0,1,0,1,1,1,0,0,0);
/*!40000 ALTER TABLE `permissionsgroups` ENABLE KEYS */;


--
-- Definition of table `pictures`
--

DROP TABLE IF EXISTS `pictures`;
CREATE TABLE `pictures` (
  `PID` int(10) unsigned NOT NULL auto_increment,
  `comment` varchar(200) NOT NULL,
  `userUploaded` varchar(45) NOT NULL,
  `date` varchar(45) NOT NULL,
  `link` varchar(45) NOT NULL,
  `GID` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`PID`),
  KEY `FK_pictures_1` (`userUploaded`),
  CONSTRAINT `FK_pictures_1` FOREIGN KEY (`userUploaded`) REFERENCES `users` (`Username`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pictures`
--

/*!40000 ALTER TABLE `pictures` DISABLE KEYS */;
INSERT INTO `pictures` (`PID`,`comment`,`userUploaded`,`date`,`link`,`GID`) VALUES 
 (26,'ðéñéåï øàùåï ','amit','24/10/2008 - 16:30','picturesByGroupID/5/new pic.jpg',5),
 (27,'éåí çãù ìæéå ðòåøéí','amit','24/10/2008 - 16:32','picturesByGroupID/5/day2.jpg',5),
 (28,'ëê ùèéí','amit','24/10/2008 - 16:32','picturesByGroupID/5/4.jpg',5),
 (29,'çãù çãù','amit','24/10/2008 - 16:32','picturesByGroupID/5/1(1).jpg',5),
 (30,'àéúí ìðöç','amit','24/10/2008 - 16:33','picturesByGroupID/5/11.jpg',5),
 (31,'èàøø\' \' ÷ àøààà','amit','24/10/2008 - 16:34','picturesByGroupID/5/12.jpg',0),
 (43,'çãùä ','amit','24/10/2008 - 17:16','picturesByGroupID/5/HDL_leb3.jpg',0),
 (44,'çãùä','amit','29/10/2008 - 19:38','picturesByGroupID/5/7.jpg',5),
 (45,'ëåìí','amit','29/10/2008 - 19:38','picturesByGroupID/5/8.jpg',5),
 (46,'áéí ','amit','29/10/2008 - 19:38','picturesByGroupID/5/áéí.jpg',5);
/*!40000 ALTER TABLE `pictures` ENABLE KEYS */;


--
-- Definition of table `seacenterandtools`
--

DROP TABLE IF EXISTS `seacenterandtools`;
CREATE TABLE `seacenterandtools` (
  `SeaCenter` varchar(45) NOT NULL,
  `Tool` varchar(45) NOT NULL,
  `count` int(10) unsigned default NULL,
  `comant` varchar(45) default NULL,
  PRIMARY KEY  (`SeaCenter`,`Tool`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seacenterandtools`
--

/*!40000 ALTER TABLE `seacenterandtools` DISABLE KEYS */;
INSERT INTO `seacenterandtools` (`SeaCenter`,`Tool`,`count`,`comant`) VALUES 
 ('','',NULL,NULL),
 ('','4',NULL,NULL),
 ('','5',NULL,NULL),
 ('','7',NULL,NULL),
 ('','äåñó îøëæ éîé',NULL,NULL),
 ('','öôåï',NULL,NULL),
 ('','true',NULL,NULL),
 ('úì àáéá éôå ','0526666666',NULL,NULL),
 ('úì àáéá éôå ','4',NULL,NULL),
 ('úì àáéá éôå ','5',NULL,NULL),
 ('úì àáéá éôå ','6',NULL,NULL),
 ('úì àáéá éôå ','ááé',NULL,NULL),
 ('úì àáéá éôå ','äåñó îøëæ éîé',NULL,NULL),
 ('úì àáéá éôå ','éåñé',NULL,NULL),
 ('úì àáéá éôå ','éù ìé äøáä ñéøåú ',NULL,NULL),
 ('úì àáéá éôå ','îðçí',NULL,NULL),
 ('úì àáéá éôå ','öôåï',NULL,NULL),
 ('úì àáéá éôå ','true',NULL,NULL),
 ('úì àáéá éôå ','úì àáéá',NULL,NULL),
 ('úì àáéá éôå ','úì àáéá éôå ',NULL,NULL);
/*!40000 ALTER TABLE `seacenterandtools` ENABLE KEYS */;


--
-- Definition of table `seatools`
--

DROP TABLE IF EXISTS `seatools`;
CREATE TABLE `seatools` (
  `ToolsName` varchar(45) NOT NULL,
  `Tnum` int(10) unsigned NOT NULL auto_increment,
  PRIMARY KEY  USING BTREE (`Tnum`,`ToolsName`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seatools`
--

/*!40000 ALTER TABLE `seatools` DISABLE KEYS */;
INSERT INTO `seatools` (`ToolsName`,`Tnum`) VALUES 
 ('îôøù ',4),
 ('÷éà÷',5),
 ('÷øååì',6),
 ('àåôèéîéñ',7),
 ('âìùðé øåç',8);
/*!40000 ALTER TABLE `seatools` ENABLE KEYS */;


--
-- Definition of table `seconderyandtext`
--

DROP TABLE IF EXISTS `seconderyandtext`;
CREATE TABLE `seconderyandtext` (
  `Secondry` varchar(45) NOT NULL,
  `Text` text NOT NULL,
  PRIMARY KEY  (`Secondry`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seconderyandtext`
--

/*!40000 ALTER TABLE `seconderyandtext` DISABLE KEYS */;
INSERT INTO `seconderyandtext` (`Secondry`,`Text`) VALUES 
 ('secend 1...1','text1.1'),
 ('secend 1.0 ','text 1.0 '),
 ('äéí','äòöîä áàîöòåú äéí ðåáòú îúåê úôéñä äîàîéðä ëé áàîöòåú çéáåø ìéí åä÷ðééú îéåîðåéåú áäùèú ëìé ùééè, áðé äðåòø éøëùå òøëéí ëâåï àîåï, òáåãú öååú, áéèçåï òöîé, åàçøàéåú, ùéùîùå àåúí áúçåîéí àçøéí ùì çééäí. \r\n'),
 ('äîãøéê äçáøúé','äîãøéê îäååä òåâï òáåø áðé äðåòø áäöéáå ìäí âáåìåú îçã, úåê ùäåà ÷ùåá ìöøëéäí äàéùééí, îëéì åúåîê îàéãê. îòøëú äéçñéí áéï äîãøéê ìáðé äðåòø, ëôøèéí åë÷áåöä, îåùúúú òì àîåï, àëôúéåú åëáåã äããé. îàôééðéí àìä, áùéìåá ùì çðéëä àéùéú ìàåøê äúäìéê, äåôëéí àú äîãøéê ìãîåú îùîòåúéú äîæîðú ìáðé äðåòø åîòåããú ôéúåç îåèéáöéä ôðéîéú ìäöìçä.\r\n\r\n'),
 ('ä÷áåöä','ì÷éçú çì÷ ôòéì áîñâøú ÷áåöúéú îçééáú äúîãä, îìååä áúçåùú ùééëåú åîàôùøú ìáðé äðåòø ìäúðñåú áäúðäâåéåú çãùåú åìäôðéí îåãìéí äúðäâåúééí ðåñôéí. ');
/*!40000 ALTER TABLE `seconderyandtext` ENABLE KEYS */;


--
-- Definition of table `todolist`
--

DROP TABLE IF EXISTS `todolist`;
CREATE TABLE `todolist` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `comment` varchar(100) NOT NULL,
  `done` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `todolist`
--

/*!40000 ALTER TABLE `todolist` DISABLE KEYS */;
INSERT INTO `todolist` (`id`,`comment`,`done`) VALUES 
 (11,'äöâú ùâéàåú áî÷øä ùì ìåâéï ìà ðëåï',1),
 (12,'úé÷åï äèåôñ ùì ãéååç äðåëçåú ëê ùéàôùø ìîçå÷',1),
 (13,'äåñôú àôùøåú òøéëä ìúé÷ îãøéê',0),
 (14,'áðééú òîåã  áéú ì÷áåöä - äåãòåú, úîåðåú åëå\'',0),
 (15,'ôåøåí? öàè?',0),
 (16,'áãé÷åú ú÷éðåú ÷ìè áòáøéú',1),
 (17,'ååéãåà ääøùàåú áëì òîåã - àáèçä',0),
 (18,'ùìéçú äåãòåú',1),
 (19,'äåñôú äùãåú äçñøéí ùì äîùúîù åäàôùøåú ìòøåê à',0),
 (20,'ìîðåò îîãøéê àú äéëåìú ìùðåú äøùàåú ùì îùúîùéí',1),
 (21,'PERFORMANCE',0),
 (22,'HTTP REFERER!!!',1),
 (23,'äåñôú ãó ôøèéí àéùééí ìëì îùúîù äîçåáø ìîòøëú',1),
 (24,'àéôåñ ñéñîà ò\"é îãøéê',1),
 (25,'ìçùåá àåìé ìäâáéì àú âåãì äúîåðåú ùàôùø ìäòìåú åìäåñéó äñáø àéê ìä÷èéï',0),
 (26,'ñéãåø äòîåã ùì ääøùàåú',0),
 (27,'ìäåñéó éëåìú ñéðåï ááçéøú äîùúîùéí áòîåã äðéäåì',1),
 (28,'ìçùåá òì úé÷ îãøéê',0),
 (29,'äåñôú  ãó ëðéñä ',0),
 (30,'ãåçåú çåãùééí ìáðé ',0);
/*!40000 ALTER TABLE `todolist` ENABLE KEYS */;


--
-- Definition of table `userattendance`
--

DROP TABLE IF EXISTS `userattendance`;
CREATE TABLE `userattendance` (
  `Username` varchar(45) NOT NULL default '',
  `day` int(10) unsigned NOT NULL,
  `month` int(10) unsigned NOT NULL,
  `year` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`Username`,`day`,`month`,`year`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userattendance`
--

/*!40000 ALTER TABLE `userattendance` DISABLE KEYS */;
INSERT INTO `userattendance` (`Username`,`day`,`month`,`year`) VALUES 
 ('amit',1,7,2008),
 ('amit',2,9,2008),
 ('amit',3,1,2009),
 ('amit',3,6,2009),
 ('amit',4,3,2008),
 ('amit',5,10,2008),
 ('amit',6,10,2008),
 ('amit',7,10,2008),
 ('amit',8,10,2008),
 ('amit',9,6,2009),
 ('amit',9,10,2008),
 ('amit',10,6,2009),
 ('amit',10,10,2008),
 ('amit',11,10,2008),
 ('amit',13,10,2008),
 ('amit',14,10,2008),
 ('amit',14,11,2008),
 ('amit',15,10,2008),
 ('amit',16,10,2008),
 ('amit',17,10,2008),
 ('amit',18,10,2008),
 ('amit',20,9,2008),
 ('amit',20,10,2008),
 ('amit',23,6,2009),
 ('amit',24,6,2009),
 ('amit',27,10,2008),
 ('amit',28,10,2008),
 ('amit',29,10,2008),
 ('amit',30,9,2008),
 ('amit',30,10,2008),
 ('amit',31,10,2008),
 ('bill',2,10,2008),
 ('bill',5,10,2008),
 ('bill',6,10,2008),
 ('bill',7,10,2008),
 ('bill',8,10,2008),
 ('bill',9,10,2008),
 ('bill',10,10,2008),
 ('bill',11,10,2008),
 ('bill',13,10,2008),
 ('bill',14,10,2008),
 ('bill',15,10,2008),
 ('bill',16,10,2008),
 ('bill',17,10,2008),
 ('bill',20,10,2008),
 ('bill',29,9,2008),
 ('bill',29,10,2008),
 ('bill',30,9,2008),
 ('Duke_Nuke',2,10,2008),
 ('Duke_Nuke',3,10,2008),
 ('Duke_Nuke',5,10,2008),
 ('Duke_Nuke',6,10,2008),
 ('Duke_Nuke',7,10,2008),
 ('Duke_Nuke',8,10,2008),
 ('Duke_Nuke',9,10,2008),
 ('Duke_Nuke',10,10,2008),
 ('Duke_Nuke',11,10,2008),
 ('Duke_Nuke',12,10,2008),
 ('Duke_Nuke',13,10,2008),
 ('Duke_Nuke',14,10,2008),
 ('Duke_Nuke',15,10,2008),
 ('Duke_Nuke',16,10,2008),
 ('Duke_Nuke',17,10,2008),
 ('Duke_Nuke',18,10,2008),
 ('Duke_Nuke',29,9,2008),
 ('eylon',20,10,2008),
 ('inst',8,10,2008),
 ('inst',14,10,2008),
 ('inst',15,10,2008),
 ('kid',5,10,2008),
 ('kid',6,10,2008),
 ('kid',7,10,2008),
 ('kid',8,10,2008),
 ('kid',9,10,2008),
 ('kid',10,10,2008),
 ('kid',11,10,2008),
 ('kid',13,10,2008),
 ('kid',15,10,2008),
 ('kid',16,10,2008),
 ('kid',17,10,2008),
 ('kid',18,10,2008),
 ('kid',20,10,2008),
 ('sivankd',1,7,2008),
 ('sivankd',1,9,2008),
 ('sivankd',1,11,2008),
 ('sivankd',2,9,2008),
 ('sivankd',3,1,2009),
 ('sivankd',3,6,2009),
 ('sivankd',3,10,2008),
 ('sivankd',4,9,2008),
 ('sivankd',4,10,2008),
 ('sivankd',5,10,2008),
 ('sivankd',6,10,2008),
 ('sivankd',7,10,2008),
 ('sivankd',8,10,2008),
 ('sivankd',9,6,2009),
 ('sivankd',9,10,2008),
 ('sivankd',10,6,2009),
 ('sivankd',10,10,2008),
 ('sivankd',11,10,2008),
 ('sivankd',12,10,2008),
 ('sivankd',13,10,2008),
 ('sivankd',14,10,2008),
 ('sivankd',14,11,2008),
 ('sivankd',15,10,2008),
 ('sivankd',15,11,2008),
 ('sivankd',16,10,2008),
 ('sivankd',17,10,2008),
 ('sivankd',18,10,2008),
 ('sivankd',23,6,2009),
 ('sivankd',23,10,2008),
 ('sivankd',24,6,2009),
 ('sivankd',30,9,2008),
 ('sivankd',31,12,2008),
 ('test2',1,9,2008),
 ('test2',1,10,2008),
 ('test2',1,11,2008),
 ('test2',2,7,2008),
 ('test2',2,10,2008),
 ('test2',3,6,2009),
 ('test2',5,10,2008),
 ('test2',6,10,2008),
 ('test2',7,10,2008),
 ('test2',8,10,2008),
 ('test2',9,10,2008),
 ('test2',10,6,2009),
 ('test2',10,10,2008),
 ('test2',11,10,2008),
 ('test2',12,10,2008),
 ('test2',13,10,2008),
 ('test2',14,9,2008),
 ('test2',14,10,2008),
 ('test2',15,10,2008),
 ('test2',15,11,2008),
 ('test2',16,10,2008),
 ('test2',17,10,2008),
 ('test2',18,9,2008),
 ('test2',18,10,2008),
 ('test2',21,10,2008),
 ('test2',22,10,2008),
 ('test2',29,9,2008),
 ('test2',30,12,2008),
 ('user3',5,10,2008),
 ('user3',6,10,2008),
 ('user3',7,10,2008),
 ('user3',8,10,2008),
 ('user3',9,10,2008),
 ('user3',10,10,2008),
 ('user3',11,10,2008),
 ('user3',12,10,2008),
 ('user3',13,10,2008),
 ('user3',14,10,2008),
 ('user3',15,10,2008),
 ('user3',16,10,2008),
 ('user3',17,10,2008),
 ('user3',18,10,2008);
/*!40000 ALTER TABLE `userattendance` ENABLE KEYS */;


--
-- Definition of table `userpresent`
--

DROP TABLE IF EXISTS `userpresent`;
CREATE TABLE `userpresent` (
  `username` varchar(45) NOT NULL,
  `day` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY  (`username`,`day`,`month`,`year`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userpresent`
--

/*!40000 ALTER TABLE `userpresent` DISABLE KEYS */;
/*!40000 ALTER TABLE `userpresent` ENABLE KEYS */;


--
-- Definition of table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `Username` varchar(45) NOT NULL COMMENT 'User ID - usernaem for system login',
  `FirstName` varchar(45) NOT NULL default '-',
  `LastName` varchar(45) NOT NULL default '-',
  `ID` varchar(45) default '-' COMMENT 'Teudat zeut',
  `YearOfBirth` varchar(45) default '-' COMMENT 'Senat leda',
  `City` varchar(45) default '-',
  `Street` varchar(45) default '-',
  `HouseNumber` varchar(45) default '-',
  `CellPhone` varchar(45) default '-',
  `Phone` varchar(45) default '-' COMMENT 'Home Number',
  `Email` varchar(45) default '-',
  `Password` varchar(45) NOT NULL default '-',
  `Approved` tinyint(1) NOT NULL default '0' COMMENT 'approved 1 - waiting 0',
  `MonthOfBirth` varchar(45) NOT NULL,
  `DayOfBirth` varchar(45) NOT NULL,
  `MotherName` varchar(45) NOT NULL,
  `FatherName` varchar(45) NOT NULL,
  `MotherPhone` varchar(45) NOT NULL,
  `FatherPhone` varchar(45) NOT NULL,
  `ParrentsPermission` tinyint(1) NOT NULL default '0',
  `payment` tinyint(1) NOT NULL default '0',
  `startYear` int(10) unsigned NOT NULL,
  `endYear` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`Username`,`FirstName`,`LastName`,`ID`,`YearOfBirth`,`City`,`Street`,`HouseNumber`,`CellPhone`,`Phone`,`Email`,`Password`,`Approved`,`MonthOfBirth`,`DayOfBirth`,`MotherName`,`FatherName`,`MotherPhone`,`FatherPhone`,`ParrentsPermission`,`payment`,`startYear`,`endYear`) VALUES 
 ('amit','òîéú','àéúï','035697457','1979','carmiel','îáöò àñó','21','0523818604','0774003486','amiteitan@gmail.com','0cb1eb413b8f7cee17701a37a1d74dc3',1,'4','13','','','','',0,0,0,0),
 ('benny','áðé','ùíîùôçä','','0','','','','','','','42f4b247702c99bda0fc7bcc41c70d19',1,'0','0','','','','',0,0,0,0),
 ('bill','bill','fname1','123456786','','','','','','','bill@noplace.com','81dc9bdb52d04dc20036dbd8313ed055',1,'','','','','','',0,0,0,0),
 ('DUke','àéìåï','ãåëñ','123456789','1981','ëôø îñøé÷','äàéæãøëú','55','0528346528','049854204','eylon@masaryk.org.il','81dc9bdb52d04dc20036dbd8313ed055',1,'7','6','îéðé','ùàåì','049854204','0528346528',0,0,0,0),
 ('Duke_Nuke','àéìåï','ãåëñ','034999755','0','','','','','0528346528','eylondukas@gmail.com','3335881e06d4d23091389226225e17c7',1,'0','0','','','','',0,0,0,0),
 ('eee','eee','eeee','','0','','','','','','','202cb962ac59075b964b07152d234b70',0,'0','0','','','','0498542045',0,0,0,0),
 ('eylon','àéìåï','ãåëñ','034999755','1979','ëôø îñøé÷','ñåîñåí','13','0528346528','049854528','eylon@masaryk.org.il','3335881e06d4d23091389226225e17c7',1,'4','11','îéðé','ùàåì','0528346204','0528346204',0,0,0,0),
 ('III','àðé','åàðé','','0','','áãé÷ä','äùúîùå áçéöéí ëãé ìðäåâ áîäéøåú','','','','202cb962ac59075b964b07152d234b70',0,'0','0','','îøåöé à÷ñèøéí','049854528','0528346528',0,0,0,0),
 ('inst','inst','inst','','','','','','','','','183224d27b72b647391e179fa311b891',1,'','','','','','',0,0,0,0),
 ('kid','kid','kid','','','','','','','','','7de007e43f108e4b54b079f66e4285d8',1,'','','','','','',0,0,0,0),
 ('oded','ããé','âåìã','045054458','0','ëøîéàì','ääâðä','6','0524584565','045255455','ded@goole.cof','d21cce18b6e5fcb886fc674e24e3c655',1,'0','0','àéìðä','àáé','','',0,0,0,0),
 ('q','àåâø','áåàù','123456786','0','1111','1111','999999','23456','12345','noone@test.com','-',1,'0','0','','','','',0,0,0,0),
 ('sivankd','ñéåï','÷ãåù','060606159','','','','','','1234','sivankd@gmail.com','d41d8cd98f00b204e9800998ecf8427e',1,'','','','','','',0,0,0,0),
 ('user3','öéôøéâåìéñ','äçîéùé','','1997','','','','','','','92877af70a45fd6a2ed7fe81e1236b78',1,'9','4','','','','',0,0,0,0),
 ('øåðéëäï','øåðé','ëäï','012345678','1995','òéø äàåøåú','îáöò àñó','21','','','boash@kipud.com','53c11f86ec05b855fbd349bd07dfba91',1,'4','1','ùøåðä','âéìé','','',0,0,0,0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


--
-- Definition of table `users_activitygroups`
--

DROP TABLE IF EXISTS `users_activitygroups`;
CREATE TABLE `users_activitygroups` (
  `username` varchar(45) NOT NULL,
  `SID` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`username`),
  KEY `FK_Studygroup` USING BTREE (`SID`),
  CONSTRAINT `FK_users` FOREIGN KEY (`SID`) REFERENCES `activitygroups` (`SID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_users_activitygroups_2` FOREIGN KEY (`username`) REFERENCES `users` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_activitygroups`
--

/*!40000 ALTER TABLE `users_activitygroups` DISABLE KEYS */;
INSERT INTO `users_activitygroups` (`username`,`SID`) VALUES 
 ('Duke_Nuke',4),
 ('inst',4),
 ('oded',4),
 ('amit',5),
 ('bill',5),
 ('eylon',5),
 ('kid',5),
 ('sivankd',5),
 ('user3',5),
 ('DUke',7),
 ('III',7),
 ('øåðéëäï',10);
/*!40000 ALTER TABLE `users_activitygroups` ENABLE KEYS */;


--
-- Definition of table `usesrpermissionsgroups`
--

DROP TABLE IF EXISTS `usesrpermissionsgroups`;
CREATE TABLE `usesrpermissionsgroups` (
  `UserName` varchar(45) NOT NULL,
  `PID` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`UserName`),
  KEY `FK_usesrpermissionsgroups_2` (`PID`),
  CONSTRAINT `FK_usesrpermissionsgroups_1` FOREIGN KEY (`UserName`) REFERENCES `users` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_usesrpermissionsgroups_2` FOREIGN KEY (`PID`) REFERENCES `permissionsgroups` (`PID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usesrpermissionsgroups`
--

/*!40000 ALTER TABLE `usesrpermissionsgroups` DISABLE KEYS */;
INSERT INTO `usesrpermissionsgroups` (`UserName`,`PID`) VALUES 
 ('amit',1),
 ('benny',1),
 ('oded',1),
 ('sivankd',1),
 ('bill',2),
 ('inst',2),
 ('q',2);
/*!40000 ALTER TABLE `usesrpermissionsgroups` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
