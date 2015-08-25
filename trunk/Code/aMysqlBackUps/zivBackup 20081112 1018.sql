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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activitygroups`
--

/*!40000 ALTER TABLE `activitygroups` DISABLE KEYS */;
INSERT INTO `activitygroups` (`SID`,`aGroupName`,`City`,`Address`) VALUES 
 (1,'administration','',''),
 (2,'instructor','',''),
 (3,'GenralPublic',' ',NULL),
 (4,'tigers','carmiel','hagalil 67'),
 (5,'äçåöôðéí','ëøîéàì','àéï øçåáåú'),
 (6,'ìäåñéó áãé÷ú ú÷éðåú','ùìà éòùå ôãéçåú','ëàï'),
 (7,'âæø','òéï ëøîì','òéï ëøîì'),
 (10,'áéï äøéí åáéï ñìòéí','çìîéù','ìéã çìîéù'),
 (15,'fightClub','Chicago','Dungen1'),
 (16,'àøï','çåìåï','çåìåï'),
 (17,'ùìåí òìéëí','çåìåï','çåìåï'),
 (18,'äãñä ðòåøéí','òî÷ çôø','òî÷ çôø'),
 (19,'áâéï + âåìãä','ðñ öéåðä','ðñ öéåðä'),
 (20,'çèä\"á ùøú','ðúðéä','ðúðéä'),
 (21,'ùôéøà','ðúðéä','ðúðéä'),
 (22,'àìãã','ðúðéä ','ðúðéä '),
 (23,'îøëæ îéøá áï àøé','ðúðéä ','ðúðéä '),
 (24,'ùéôîï','èéøú äëøîì','èéøú äëøîì'),
 (25,'î÷éó','øîú âï','øîú âï'),
 (26,'úéëåï çãù ','øîú âï','øîú âï'),
 (27,'÷öéø','çåìåï','çåìåï'),
 (28,'òîì îãòéí','çãøä','çãøä'),
 (29,'ðååä öàìéí','îöéìä','îöéìä'),
 (30,'òéøåðé ä','úì àáéá','úì àáéá'),
 (31,'òéøåðé ç','úì àáéá','úì àáéá');
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
  `message` varchar(600) NOT NULL,
  PRIMARY KEY  (`MID`)
) ENGINE=InnoDB AUTO_INCREMENT=534 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chatmessages`
--

/*!40000 ALTER TABLE `chatmessages` DISABLE KEYS */;
INSERT INTO `chatmessages` (`MID`,`username`,`time`,`day`,`month`,`year`,`GID`,`message`) VALUES 
 (458,'amit','0',0,0,0,'5','\'WTF\''),
 (459,'amit','0',0,0,0,'5','×‘×œ×‘×” ×‘×œ×”'),
 (460,'amit','0',0,0,0,'5','\r\n'),
 (461,'amit','0',0,0,0,'5','×¢×•×“×“'),
 (462,'amit','0',0,0,0,'5','test'),
 (463,'amit','0',0,0,0,'5','hi'),
 (464,'amit','0',0,0,0,'5','ma kore'),
 (465,'amit','0',0,0,0,'5','\nstam'),
 (466,'amit','0',0,0,0,'5','inst ??? are youthere ?\n'),
 (467,'inst','0',0,0,0,'4','odedd'),
 (468,'amit','0',0,0,0,'5','×¡×™×•×Ÿ ×œ×ž×” ××ª ×œ× ×ž×§×©×™×‘×”?'),
 (469,'amit','0',0,0,0,'5','×ž×” ×–×” ×¤×”???\n'),
 (470,'amit','0',0,0,0,'5','×ž×™ ×¢×•×“ ×ž×—×•×‘×¨??'),
 (471,'amit','0',0,0,0,'5','at po ?'),
 (472,'inst','0',0,0,0,'4','\nooo'),
 (473,'kid','0',0,0,0,'5','ma ?'),
 (474,'inst','0',0,0,0,'4','lll'),
 (475,'amit','0',0,0,0,'5','\nhelloe '),
 (476,'amit','0',0,0,0,'5','ofer'),
 (477,'amit','0',0,0,0,'5','testing'),
 (478,'amit','0',0,0,0,'5','\n1 2 3'),
 (479,'amit','0',0,0,0,'5','see it ?'),
 (480,'amit','0',0,0,0,'5','\nfi'),
 (481,'amit','0',0,0,0,'5','\n×›×Ÿ'),
 (482,'amit','0',0,0,0,'5','write yes\n'),
 (483,'amit','0',0,0,0,'5','\n××—×ª ×©×ª×™×™× ×©×œ×•×© ×“×’ ×ž×œ×•×—'),
 (484,'tal','0',0,0,0,'27','oded'),
 (485,'tal','0',0,0,0,'27','\nwhat the fuck'),
 (486,'tal','0',0,0,0,'27','\nma kore'),
 (487,'tal','0',0,0,0,'27','\n??'),
 (488,'tal','0',0,0,0,'27','\nam erok'),
 (489,'tal','0',0,0,0,'27','\noded'),
 (490,'amit','0',0,0,0,'5','guideReports.php.'),
 (491,'tal','0',0,0,0,'27','\nlo'),
 (492,'kid','0',0,0,0,'5','what ?'),
 (493,'amit','0',0,0,0,'5','test'),
 (494,'amit','0',0,0,0,'5','\nhello'),
 (495,'amit','0',0,0,0,'5','\nchecking'),
 (496,'amit','0',0,0,0,'5','oded'),
 (497,'amit','0',0,0,0,'5','\nwhat&#039;s up?'),
 (498,'kid','0',0,0,0,'5','\r\nyes'),
 (499,'amit','0',0,0,0,'5','\n×ž×” ×§×•×¨×”?'),
 (500,'kid','0',0,0,0,'5','fdsf'),
 (501,'amit','0',0,0,0,'5','\n×‘×“×™×§×”'),
 (502,'amit','0',0,0,0,'5','×¨×•××”?'),
 (503,'amit','0',0,0,0,'5','\r\n××™×œ×•×Ÿ?'),
 (504,'amit','0',0,0,0,'5','×¢×ž×™×ª??'),
 (505,'amit','0',0,0,0,'5','××™×œ×•×Ÿ'),
 (506,'amit','0',0,0,0,'5','××™×œ×•×Ÿ'),
 (507,'amit','0',0,0,0,'5','\r\n×× ×™ ×¨×©×ž×ª×™'),
 (508,'amit','0',0,0,0,'5','\r\n×¨×•××”?'),
 (509,'amit','0',0,0,0,'5','\r\n×¨×©×ž×ª×™'),
 (510,'amit','0',0,0,0,'5','\r\n×¢×ž×™×ª'),
 (511,'amit','0',0,0,0,'5','test\r\n'),
 (512,'amit','0',0,0,0,'5','\r\n×¢×ž×™×ª ××™×ª×Ÿ ×•×”×©×¨×ª'),
 (513,'amit','0',0,0,0,'5','\r\n×¢×ž×™×ª ××™×ª×Ÿ ×œ×”×œ×”×œ×”×œ×”×œ×”'),
 (514,'amit','0',0,0,0,'5','××•×§×™ ×ž×•×–×¨\r\n'),
 (515,'amit','0',0,0,0,'5','\r\n××ž×•×¨ ×œ×”×™×•×ª 2 ×¦×‘××™×'),
 (516,'amit','0',0,0,0,'5','××™×œ×•×Ÿ'),
 (517,'amit','0',0,0,0,'5','\r\n××™×š ×¢×•×©×” ×¤×¨×”?'),
 (518,'amit','0',0,0,0,'5','×™×© ×™×© ×™×© '),
 (519,'amit','0',0,0,0,'5','\r\n×¢×ž×™×ª ×”×›×œ ×‘×¡×“×¨ '),
 (520,'amit','0',0,0,0,'5','×ž×” ?'),
 (521,'kid','0',0,0,0,'5','×‘×•×§×¨ ××•×¨'),
 (522,'eylondukas','0',0,0,0,'15','123456'),
 (523,'hadas','0',0,0,0,'5','×™×• ×™×•'),
 (524,'hadas','0',0,0,0,'5','\r\n×™×• ×™×• ×™×•'),
 (525,'hadas','0',0,0,0,'5','××™×¤×” ×”×‘×œ×•× ×™×?'),
 (526,'amit','0',0,0,0,'5','×©×œ×•×'),
 (527,'amit','0',0,0,0,'5','\r\n×‘×•×§×¨ ××•×¨'),
 (528,'amit','0',0,0,0,'5','×‘×“×™×§×”'),
 (529,'kid','0',0,0,0,'5','test'),
 (530,'kid','0',0,0,0,'5','\none two three'),
 (531,'amit','0',0,0,0,'5','test'),
 (532,'amit','0',0,0,0,'5','cvvv'),
 (533,'amit','0',0,0,0,'5','×©×œ×•× ×¨×‘');
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
 ('inst',1,11,2008,'','','Hifa',22,'âââ','âââ','bill','inst','','','','','','','','','','','','','ââ',NULL),
 ('inst',2,11,2008,'','','Hifa',125,'','','','','','','','','','','','','','','','','ìøåõ',NULL),
 ('inst',4,11,2008,'ñááä','éåôé','ôåö÷ø',25,'÷åáé','çééí','bill','inst','','','òëâ','ëéâ','ã÷ëãâë','òëâò','éòëéâòéã','âëé','éòâëéòâé','òãâùãâëãùâ','','','ìøåõ',NULL),
 ('inst',9,11,2008,'ìøåõ ','ìøåõ ','öåôé éí éôå',12,'îðçí ','îðçí ','ùøä ','àåøé áëø','ëôåìä','ìøåõ ','ìøåõ ','ìøåõ ','ìøåõ ','ìøåõ ','ìøåõ ','ìøåõ ','ìøåõ ','','ìøåõ ','ìøåõ ','âéáåù éîé ','ìøåõ '),
 ('inst',28,10,2008,'ìðöç','ìðöç','Hifa',1,'áðé','áðé','bill','inst','ëôåìä','12 ÷éà÷éí','ìðöç','ìðöç','','','','','','','','','ðéñéåï',NULL);
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
 ('amit',26,10,2008,1,'ááááááááááá','ááááááááááááááááááá','ááááááááááááá','','','','','',5),
 ('inst',2,11,2008,3,'ìììììììììììììììììì','ìììììììììììì','ìììììììììì','ììììì','ìììììììììììììììììììììììììììììììì','ìììììììììììììììì','ìììììììììì','ììììììììììììììììììììììììììì',15),
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
-- Definition of table `forum`
--

DROP TABLE IF EXISTS `forum`;
CREATE TABLE `forum` (
  `PID` int(10) unsigned NOT NULL auto_increment COMMENT 'post ID',
  `subject` varchar(100) NOT NULL,
  `text` varchar(800) NOT NULL,
  `commenting` int(10) unsigned NOT NULL default '0',
  `user` varchar(45) NOT NULL,
  `date` varchar(45) NOT NULL,
  PRIMARY KEY  (`PID`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `forum`
--

/*!40000 ALTER TABLE `forum` DISABLE KEYS */;
INSERT INTO `forum` (`PID`,`subject`,`text`,`commenting`,`user`,`date`) VALUES 
 (7,'îé ñáåï','ùìåí ìëí ëéöã îëéðéí îé ñáåï?',0,'amit','November 11, 2008, 8:38 am'),
 (11,'ðå áàîú ðøàä ìê','æä ìà áàîú òåáã ëëä öøéê ìäù÷éò âí ÷öú åìòùåú òåâåú áåõ ',7,'amit','11/11/08, 11:50'),
 (12,'àúí îîù îîù òåùéí öçå÷ îòáåãä','ðå áàîú \r\næä ðøàä ìê äâéåðé?\r\nîä ùöøéê ìòùåú æä ìàëåì áîáä áæîï ìçõ',7,'amit','11/11/08, 11:58'),
 (16,'éåí äåìãú ùîç ì KID ','îæì èåá ì KID',0,'amit','11/11/08, 18:17'),
 (17,'îé øåöä ìáåà ìéåí äåìãú ','îçø á 21',16,'amit','11/11/08, 18:17'),
 (19,'ìîä ùåìçéí ôøä ìçìì??','áùáéì äçìá!!\r\n\r\nàåøè',0,'amit','11/11/08, 18:46'),
 (20,'ùúå÷','áåà ðìê ì÷ðéåú',7,'amit','11/11/08, 19:49'),
 (21,'áçéøåú áëøîéàì òéø äàåøåú','éù ììëú ìáçåø ëé æä îàã çùåá àçøú éáçøå àðùéí ùàúä ìà áçøú áäí åëå\'',0,'amit','11/11/08, 19:50'),
 (22,'ùñ ìùìèåï','',21,'amit','11/11/08, 19:51'),
 (23,'àå ìôçåú ãéöä ìåéï','òãééï àéï úåöàåú àîú',21,'amit','12/11/08, 0:27');
/*!40000 ALTER TABLE `forum` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

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
 (36,'Rubik Cube 2','Twist and turn the colored tiles to create six faces of solid colors on your cube.','<embed src=\"http://www.ultimatearcade.com/games.swf?x=rubik-cube-2\" scale=\"noscale\" quality=\"high\" bgcolor=\"#000000\" width=\"600\" height=\"430\" name=\"games\" align=\"middle\" allowScriptAccess=\"sameDomain\" allowFullScreen=\"false\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" />','http://www.ultimatearcade.com/games/rubik-cube-2/150x150.jpg'),
 (44,'Mr. Shuster','Walk and jump across a dangerous landscape collecting fuel capsules','<embed src=\"http://www.ultimatearcade.com/games.swf?x=mr-shuster\" scale=\"noscale\" quality=\"high\" bgcolor=\"#000000\" width=\"740\" height=\"300\" name=\"games\" align=\"middle\" allowScriptAccess=\"sameDomain\" allowFullScreen=\"false\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" />','http://www.ultimatearcade.com/games/mr-shuster/150x150.jpg'),
 (45,'Sequencer','Classic game in which you try to repeat longer and longer sequences of colored lights','<embed src=\"http://www.ultimatearcade.com/games.swf?x=sequencer\" scale=\"noscale\" quality=\"high\" bgcolor=\"#000000\" width=\"466\" height=\"400\" name=\"games\" align=\"middle\" allowScriptAccess=\"sameDomain\" allowFullScreen=\"false\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" />','http://www.ultimatearcade.com/games/sequencer/150x150.jpg');
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
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

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
 (69,'ãåç àéøåò çøéâ','instAidFolder/69.doc',1,'27/10/2008 - 21:13'),
 (70,'ìáãé÷ä','instAidFolder/70doc',2,'10/11/2008 - 21:14'),
 (71,'áãé÷ú ú÷éðåú','instAidFolder/71.doc',2,'10/11/2008 - 21:17');
/*!40000 ALTER TABLE `guidefolderfiles` ENABLE KEYS */;


--
-- Definition of table `messeges`
--

DROP TABLE IF EXISTS `messeges`;
CREATE TABLE `messeges` (
  `GID` int(10) unsigned NOT NULL auto_increment,
  `Message` varchar(400) NOT NULL,
  PRIMARY KEY  (`GID`),
  CONSTRAINT `FK_messeges_1` FOREIGN KEY (`GID`) REFERENCES `activitygroups` (`SID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messeges`
--

/*!40000 ALTER TABLE `messeges` DISABLE KEYS */;
INSERT INTO `messeges` (`GID`,`Message`) VALUES 
 (1,'<div class=MARQ_DATE><small><b>12/11/08 0:24:</b></small> ëùàðùéí ÷èðéí òåùéí öì âãåì æä ñéîï ùäùîù ùå÷òú....</div>'),
 (2,'<div class=MARQ_DATE><small><b>11/11/08 20:11:</b></small> ëì îä ùëúåá ëàï çðéëéí ìà éëåìéí ìøàåú àáì ëì ùàø äàðùéí áîàâø ëï éøàå áøâò ùéúçáøå</div>'),
 (3,'<div class=MARQ_DATE><small><b>11/11/08 18:04:</b></small> ìîùä ùìåí øá !!\r\nöà îäîéí ãçåó éù ëøéù !\r\núæäø îäñðôéø îàçåøê !!!!\r\nîùä .....?\r\nîùä ?\r\nîùä ?! \r\nìà .......									</div>'),
 (4,'<div class=MARQ_DATE><small><b>11/11/08 17:38:</b></small> òåãã îåñø ùäúîåðä äëé éôä äéà ùìå				</div>'),
 (5,'<div class=MARQ_DATE><small><b>11/11/08 17:31:</b></small> ùìåí çåöôðéí !! îä äîöá ?? øöéúé ø÷ ìãåç òì ...</div>'),
 (6,'çôøôøú ìà îîù øåàä èåá'),
 (7,'áòéï ëøîì éù îìà îîú÷éí'),
 (10,'äåãòåú àéï					'),
 (15,'ùìåí ìëì äçáøéí !\r\nàðà äáéàå îöá øåç ìèéåì áéåí øàùåï.\r\náðé					\n<small><b>11/11/08 16:56</b></small>');
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
  `maneging` varchar(450) default NULL,
  `comants` varchar(450) default NULL,
  `area` varchar(45) default NULL,
  PRIMARY KEY  USING BTREE (`ncid`,`ncName`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `navalcenters`
--

/*!40000 ALTER TABLE `navalcenters` DISABLE KEYS */;
INSERT INTO `navalcenters` (`ncid`,`ncName`,`ncCity`,`sailBoats`,`manager`,`managTelNumber`,`contectMan`,`contectManTelNumber`,`maneging`,`comants`,`area`) VALUES 
 (5,'ôåö÷ø','ðäøéä',15,'éåñé áéèåï','052252525','øåðéú äîëåòøú','052666666','ã÷ì','àéï äòøåú ',NULL),
 (7,'úì àáéá éôå ','úì àáéá',5,'éåñé','0526666666','îðçí','0526666666','ááé','éù ìé äøáä ñéøåú ',NULL),
 (18,'áú éí ','áú éí ',NULL,'èì ùðééãøîï ','052666666','úîéø ','052444444','òåôø ','àéï î÷åí ìéùåï ',NULL),
 (19,'îøëæ éîé øàù äð÷øä','øàù äð÷øä',NULL,'àåãé àãìîï ','052-3798610','','','','',NULL),
 (20,'÷öéðé éí òëå','áéä\"ñ ì÷öéðé éí òëå',NULL,'òîðåàì ãøåø ','','','','äçáøä ìçéðåê éîé','',NULL),
 (23,'îøëæ éîé òëå','ðîì òëå',NULL,'ðçåí ëõ ','0528486048','','','îùøã äçéðåê','',NULL),
 (24,'òîåúú îåòãåï äùééè òëå','',NULL,'ìéàåø ãäï ','0524766680','','','òîåúú îåòãåï äùééè òëå','',NULL),
 (25,'îøëæ ùééè çéôä','äçåó äù÷è áú âìéí',NULL,'ùáúàé ìåé ','0544881123','âáé àèéàñ ','0505519293','òîåúú ùééè çéôä','',NULL),
 (26,'îøëæ éîé èáøéä','',NULL,'éò÷á ùâá ','0508670610','','','òéøééú èáøéä','',NULL),
 (27,'îøëæ éîé àåìâä','âáòú àåìâä',NULL,'ùîåìé÷ ôåìéðø ','0502458147','àáéòã ','0523309567','òîåúä ùééè çãøä','',NULL),
 (28,'îøëæ îéøá','îòâï îéëàì åùãåú éí',NULL,'','','','','','',NULL),
 (29,'äîëììä äéîéú','îëîåøú',NULL,'æàá âìàåáø','','','','','',NULL),
 (30,'îáåàåú éí','îëîåøú',NULL,'','','','','äçáøä ìðéäåì áéä\"ñ éîééí','',NULL),
 (31,'îøëæ éîé îëîåøú','îëîåøú',NULL,'ñåðâå','0577246958','','','îåòöä òî÷ çôø','',NULL),
 (32,'öáò äúëìú','ðúðéä åôøéôøéä  ú\"à åáú-éí',NULL,'àéöé÷ âì ','0522756940','','','îåòãåï ôøèé','',NULL),
 (33,'æáåìåï - ðúðéä','ðúðéä',NULL,'îùä ôñç','0522500472','','','æáåìå','',NULL),
 (34,'öåôé éí- ðúðéä','ðúðéä',NULL,'àéöé÷ ','0542440149','','','öåôé éí','äî÷åí áäúäååú',NULL),
 (35,'öåôé éí àøöé','',NULL,'æáø÷','','','','úðåòú äöåôéí','',NULL),
 (36,'áðé äøöìéä','îøéðä äøöìéä åîìåï ãðéàì',NULL,'ñáé ','0505490877','çæé ','0548187255','òéøééú äøöìéä ','',NULL),
 (37,'öåôé éí ú\"à','îçåì÷ ìùðé îøëæéí, îøéðä ú\"à åáéø÷åï',NULL,'øîé æâãåï ','0523244747','','','öåôéí','',NULL),
 (38,'öåôé éí éôå','ðîì éôå',NULL,'ëôéø çåãøä ','0573907614','','','öåôéí','',NULL),
 (39,'îøëæéí éîééí ú\"à éôå','îøéðä ú\"à åðîì éôå ',NULL,'àîðåï àøæ','','','','îùøä\"ç ááå÷ø òéøéú ú\"à àçä\"ö','',NULL),
 (40,'îøëæ éîé áú éí','çì÷ öôåðé ùì çåó áú éí',NULL,'ãøåø àéìðé ','0544939949','','','îùøä\"ç','',NULL),
 (41,'æáåìåï áú éí','áçåó äöôåðé áú éí',NULL,'àìé àáéðåòí ','0544537818','','','æáåìåï','',NULL),
 (42,'äôåòì áú éí','áçåó äöôåðé áú éí',NULL,'ãðéàì øâø ','050-6893067','','','äôåòì','ùðé îáðéí âãåìéí,çùîì åîéí, î÷ìçåú, àåôèéîéñèéí, 420, ùúé ñéøåú îðåò',NULL),
 (43,'æáåìåï - ôìîçéí','÷éáåõ ôìîçéí',NULL,'','','','','æáåìå','',NULL),
 (44,'öåôé éí – áú éí','áú éí',NULL,'','','','','öåôéí','',NULL),
 (45,'àåøè éîé','îøéðä àùãåã',NULL,'éøåï àì òîé','','','','øùú àåøè','',NULL),
 (46,'îøëæ éîé àù÷ìåï','îøéðä àù÷ìåï',NULL,'ùìîä ùååøìöáøâ ','0522628799','','','îùøä\"ç','ëéúåú, î÷ìçåú, ùøåúéí, ôòéìåú ùì ÷éà÷éí, ñðåðéåú, àåôèéîéñèéí.',NULL);
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
  `viewNavalCenters` tinyint(1) NOT NULL default '0',
  `editNavalCenters` tinyint(1) NOT NULL default '0',
  `editGames` tinyint(1) NOT NULL default '0',
  `viewForum` tinyint(1) NOT NULL default '0',
  `editForum` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`PID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissionsgroups`
--

/*!40000 ALTER TABLE `permissionsgroups` DISABLE KEYS */;
INSERT INTO `permissionsgroups` (`PID`,`PGroupName`,`viewUsers`,`editUsers`,`viewGroups`,`editGroups`,`viewPermissions`,`editPermissions`,`viewAllUsers`,`sendMessageToGroup`,`sendMessageToAll`,`viewAttendecy`,`editAttendecy`,`viewInstructorsFolder`,`editInstructorsFolder`,`viewNavalCenters`,`editNavalCenters`,`editGames`,`viewForum`,`editForum`) VALUES 
 (1,'îðäì',1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1),
 (2,'îãøéê',1,1,0,0,0,0,0,1,0,1,1,1,0,0,0,0,1,0),
 (3,'ðéñéåï',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1);
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
  KEY `FK_pictures_1` (`userUploaded`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

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
 (46,'áéí ','amit','29/10/2008 - 19:38','picturesByGroupID/5/áéí.jpg',5),
 (47,'úîåðä çãùä ìáãé÷ä','oded','10/11/2008 - 19:47','picturesByGroupID/4/9.jpg',4),
 (48,'æéå ðòåøéí','oded','10/11/2008 - 19:48','picturesByGroupID/4/14.jpg',4),
 (49,'æéå ðòåøéí çãù','oded','10/11/2008 - 19:49','picturesByGroupID/4/16.jpg',4),
 (50,'úîåðä îñåâ çãù','oded','10/11/2008 - 19:50','picturesByGroupID/4/newPic.bmp',4),
 (52,'ãùã','amit','10/11/2008 - 20:19','picturesByGroupID/5/9.jpg',5),
 (57,'ðéñéåï','amit','10/11/2008 - 21:10','picturesByGroupID/5/14.jpg',5),
 (58,'áãé÷ú ã','amit','10/11/2008 - 21:10','picturesByGroupID/5/16.jpg',5),
 (59,'ããé','amit','10/11/2008 - 21:29','picturesByGroupID/5/úì àáéá 003.jpg',5),
 (62,'òîéú àéúï','q','10/11/2008 - 21:49','picturesByGroupID/20/IMG_0449.JPG',20),
 (63,'ñéååï ÷ãåù','q','10/11/2008 - 21:49','picturesByGroupID/20/IMG_0451.JPG',20),
 (64,'àéìåï ãåëñ','q','10/11/2008 - 21:50','picturesByGroupID/20/IMG_0453.JPG',20),
 (65,'ããé âåìãùîéãè','q','10/11/2008 - 21:50','picturesByGroupID/20/IMG_0455.JPG',20),
 (66,'áççåú WEB','q','10/11/2008 - 21:50','picturesByGroupID/20/IMG_0482.jpg',20),
 (67,'SAP ëãåøñì','q','10/11/2008 - 21:50','picturesByGroupID/20/IMG_3249.JPG',20);
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
 ('-3798558','',NULL,NULL),
 ('-6893017','',NULL,NULL),
 ('1','',NULL,NULL),
 ('19','',NULL,NULL),
 ('4','',NULL,NULL),
 ('5','',NULL,NULL),
 ('502458147','',NULL,NULL),
 ('505490877','',NULL,NULL),
 ('505519293','',NULL,NULL),
 ('508670610','',NULL,NULL),
 ('522500472','',NULL,NULL),
 ('52252525','',NULL,NULL),
 ('522628799','',NULL,NULL),
 ('522756940','',NULL,NULL),
 ('523244747','',NULL,NULL),
 ('523309567','',NULL,NULL),
 ('52444444','',NULL,NULL),
 ('524766680','',NULL,NULL),
 ('52666666','',NULL,NULL),
 ('528486048','',NULL,NULL),
 ('542440149','',NULL,NULL),
 ('544537818','',NULL,NULL),
 ('544881123','',NULL,NULL),
 ('544939949','',NULL,NULL),
 ('548187255','',NULL,NULL),
 ('573907614','',NULL,NULL),
 ('577246958','',NULL,NULL),
 ('6','',NULL,NULL),
 ('7','',NULL,NULL);
/*!40000 ALTER TABLE `seacenterandtools` ENABLE KEYS */;


--
-- Definition of table `seatools`
--

DROP TABLE IF EXISTS `seatools`;
CREATE TABLE `seatools` (
  `ToolsName` varchar(45) NOT NULL,
  `Tnum` int(10) unsigned NOT NULL auto_increment,
  PRIMARY KEY  USING BTREE (`Tnum`,`ToolsName`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seatools`
--

/*!40000 ALTER TABLE `seatools` DISABLE KEYS */;
INSERT INTO `seatools` (`ToolsName`,`Tnum`) VALUES 
 ('îôøù ',4),
 ('÷éà÷',5),
 ('÷øååì',6),
 ('àåôèéîéñ',7),
 ('âìùðé øåç',8),
 ('ñðåðéú',9),
 ('ñéøú îðåò',10);
/*!40000 ALTER TABLE `seatools` ENABLE KEYS */;


--
-- Definition of table `todolist`
--

DROP TABLE IF EXISTS `todolist`;
CREATE TABLE `todolist` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `comment` varchar(100) NOT NULL,
  `done` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `todolist`
--

/*!40000 ALTER TABLE `todolist` DISABLE KEYS */;
INSERT INTO `todolist` (`id`,`comment`,`done`) VALUES 
 (11,'äöâú ùâéàåú áî÷øä ùì ìåâéï ìà ðëåï',1),
 (12,'úé÷åï äèåôñ ùì ãéååç äðåëçåú ëê ùéàôùø ìîçå÷',1),
 (13,'äåñôú àôùøåú òøéëä ìúé÷ îãøéê',1),
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
 (30,'ãåçåú çåãùééí ìáðé ',0),
 (31,'òéãëåï îùç÷éä áîùç÷éí ',1),
 (32,'òãëåï îøëæéí éîééí',0),
 (33,'àéùåø àå ëéùìåï ùì ääåñôä',0);
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
 ('Duke_Nuke',10,11,2008),
 ('Duke_Nuke',11,10,2008),
 ('Duke_Nuke',12,10,2008),
 ('Duke_Nuke',13,10,2008),
 ('Duke_Nuke',14,10,2008),
 ('Duke_Nuke',15,10,2008),
 ('Duke_Nuke',16,10,2008),
 ('Duke_Nuke',17,10,2008),
 ('Duke_Nuke',18,10,2008),
 ('Duke_Nuke',28,10,2008),
 ('Duke_Nuke',29,9,2008),
 ('eylon',20,10,2008),
 ('inst',8,10,2008),
 ('inst',10,11,2008),
 ('inst',14,10,2008),
 ('inst',15,10,2008),
 ('inst',28,10,2008),
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
 ('oded',28,10,2008),
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
  `MonthOfBirth` varchar(45) NOT NULL default '0',
  `DayOfBirth` varchar(45) NOT NULL default '0',
  `MotherName` varchar(45) NOT NULL default '0',
  `FatherName` varchar(45) NOT NULL default '0',
  `MotherPhone` varchar(45) NOT NULL default '0',
  `FatherPhone` varchar(45) NOT NULL default '0',
  `ParrentsPermission` tinyint(1) NOT NULL default '0',
  `payment` tinyint(1) NOT NULL default '0',
  `startYear` int(10) unsigned NOT NULL default '0',
  `endYear` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`Username`,`FirstName`,`LastName`,`ID`,`YearOfBirth`,`City`,`Street`,`HouseNumber`,`CellPhone`,`Phone`,`Email`,`Password`,`Approved`,`MonthOfBirth`,`DayOfBirth`,`MotherName`,`FatherName`,`MotherPhone`,`FatherPhone`,`ParrentsPermission`,`payment`,`startYear`,`endYear`) VALUES 
 ('alonh','àìåï ','çé ','','0','','','','','','','81dc9bdb52d04dc20036dbd8313ed055',1,'0','0','','','','',0,0,0,0),
 ('amit','òîéú','àéúï','035697457','1979','carmiel','îáöò àñó','21','0523818604','0774003486','amiteitan@gmail.com','0cb1eb413b8f7cee17701a37a1d74dc3',1,'11','12','','','','',0,0,0,0),
 ('asafh','àñó  ','äéðåê','','0','','','','','','','81dc9bdb52d04dc20036dbd8313ed055',1,'0','0','','','','',0,0,0,0),
 ('benny','áðé','ùíîùôçä','','0','','','','','','','42f4b247702c99bda0fc7bcc41c70d19',1,'0','0','','','','',0,0,0,0),
 ('bill','bill','fname1','123456786','','','','','','','bill@noplace.com','81dc9bdb52d04dc20036dbd8313ed055',1,'','','','','','',0,0,0,0),
 ('daniell','ãðéàì ','ìéôéðñ÷é ','','0','','','','','','','81dc9bdb52d04dc20036dbd8313ed055',1,'0','0','','','','',0,0,0,0),
 ('dorban','éåñé ','áåáìéì','987654321','1957','àù÷ìåï','','','','','','81dc9bdb52d04dc20036dbd8313ed055',1,'5','23','','','','',0,0,0,0),
 ('DUke','àéìåï','ãåëñ','123456789','0','ëôø îñøé÷','ðòìé äáéú äàãåîåú','55','0528346528','049854204','eylon@masaryk.org.il','81dc9bdb52d04dc20036dbd8313ed055',1,'0','0','îéðé','ùàåì','049854204','0528346528',0,0,0,0),
 ('Duke_Nuke','àéìåï','ãåëñ','034999755','0','','','','','0528346528','eylondukas@gmail.com','3335881e06d4d23091389226225e17c7',1,'0','0','','','','',0,0,0,0),
 ('ed','ed','44444','','0','','','','0538346528','','','202cb962ac59075b964b07152d234b70',0,'0','0','','','','',0,0,0,0),
 ('eee','eee','eeee','','0','','','','','','','202cb962ac59075b964b07152d234b70',0,'0','0','','','','0498542045',0,0,0,0),
 ('eini','òéðá ','áåáìéì','123454321','1983','àù÷ìåï','ôøéãîï','76','','','','81dc9bdb52d04dc20036dbd8313ed055',1,'11','17','','éåñé','','',0,0,0,0),
 ('eylon','àéìåï','ãåëñ','034999755','1979','ëôø îñøé÷','ñåîñåí','13','0528346528','049854528','eylon@masaryk.org.il','3335881e06d4d23091389226225e17c7',1,'4','11','îéðé','ùàåì','0528346204','0528346204',0,0,0,0),
 ('eylondukas','eylon','dukas','','0','','','','0528346528','','','81dc9bdb52d04dc20036dbd8313ed055',1,'0','0','','','','',0,0,0,0),
 ('gals','âì  ','ùàåì','','0','','','','','','','81dc9bdb52d04dc20036dbd8313ed055',1,'0','0','','','','',0,0,0,0),
 ('guym','âéà ','îåø','','0','','','','','','','81dc9bdb52d04dc20036dbd8313ed055',1,'0','0','','','','',0,0,0,0),
 ('guym2','âéà ','îåø','','0','','','','','','','81dc9bdb52d04dc20036dbd8313ed055',1,'0','0','','','','',0,0,0,0),
 ('hadas','fdfdf','äãhh','1234','0','','','','','','','81dc9bdb52d04dc20036dbd8313ed055',1,'12','11','','','','',0,0,0,0),
 ('higuy','âéà','ôéðñ','987656789','1965','ðäøéä','äëåëáéí','23','0536754356','039876543','erevtov@gmail.com','81dc9bdb52d04dc20036dbd8313ed055',1,'7','15','öéôé','','','',0,0,0,0),
 ('III','àðé','åàðé','','0','','áãé÷ä','äùúîùå áçéöéí ëãé ìðäåâ áîäéøåú','','','','202cb962ac59075b964b07152d234b70',0,'0','0','','îøåöé à÷ñèøéí','049854528','0528346528',0,0,0,0),
 ('inst','inst','inst','','1985','','','','','','','183224d27b72b647391e179fa311b891',1,'2','29','','','','',0,0,0,0),
 ('kid','kid','kid','','','','','','','','','7de007e43f108e4b54b079f66e4285d8',1,'11','11','','','','',0,0,0,0),
 ('liorz','ìéàåø æ','øâøé','','0','','','','','','','81dc9bdb52d04dc20036dbd8313ed055',1,'0','0','','','','',0,0,0,0),
 ('nadavr','ðãá',' øééê ','','0','','','','','','','81dc9bdb52d04dc20036dbd8313ed055',1,'0','0','','','','',0,0,0,0),
 ('nirbarak','ðéø','áø÷','','0','','','','','','','81dc9bdb52d04dc20036dbd8313ed055',1,'0','0','','','','',0,0,0,0),
 ('oded','ããé','âåìã','045054458','0','ëøîéàì','ääâðä','6','0524584565','045255455','ded@goole.cof','d21cce18b6e5fcb886fc674e24e3c655',1,'0','0','àéìðä','àáé','','',0,0,0,0),
 ('ofer','ofer ','shmeltzer','123456789','0','','','','0528346544','049854222','','81dc9bdb52d04dc20036dbd8313ed055',1,'0','0','','','','',0,0,0,0),
 ('orenb','àåøï ','áï éäåãä','','0','','','','','','','81dc9bdb52d04dc20036dbd8313ed055',1,'0','0','','','','',0,0,0,0),
 ('reutl','øòåú ','ìçîï','','0','','','','','','','81dc9bdb52d04dc20036dbd8313ed055',1,'0','0','','','','',0,0,0,0),
 ('roeys','øåòé ','ùéôøåï','','0','','','','','','','81dc9bdb52d04dc20036dbd8313ed055',1,'0','0','','','','',0,0,0,0),
 ('sarao','ùøä ','àåçéåï ','','0','','','','','','','81dc9bdb52d04dc20036dbd8313ed055',1,'0','0','','','','',0,0,0,0),
 ('sarao2','ùøä ','àåçéåï','','0','','','','','','','81dc9bdb52d04dc20036dbd8313ed055',1,'0','0','','','','',0,0,0,0),
 ('shahafpatishi','ùçó ','ôèéùé','','0','','','','','','','81dc9bdb52d04dc20036dbd8313ed055',1,'0','0','','','','',0,0,0,0),
 ('sivankd','ñéåï','÷ãåù','060606159','','','','','','1234','sivankd@gmail.com','d41d8cd98f00b204e9800998ecf8427e',1,'11','12','','','','',0,0,0,0),
 ('tal','tal','shnaiderman','033567984','1982','','','','','','tal@gmail.com','202cb962ac59075b964b07152d234b70',1,'2','18','','','','',0,0,0,0),
 ('urib','àåøé áëø','áëø','','0','','','','','','','81dc9bdb52d04dc20036dbd8313ed055',1,'0','0','','','','',0,0,0,0),
 ('user3','öéôøéâåìéñ','äçîéùé','','1997','','','','','','','92877af70a45fd6a2ed7fe81e1236b78',1,'9','4','','','','',0,0,0,0),
 ('yoni','éåðé','áìåê','555666777','1997','òéï öôöôä','','','','0345665456','yoni@inter.net','81dc9bdb52d04dc20036dbd8313ed055',1,'11','28','','','','',0,0,0,0),
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
 ('dorban',5),
 ('eini',5),
 ('eylon',5),
 ('hadas',5),
 ('higuy',5),
 ('kid',5),
 ('sivankd',5),
 ('user3',5),
 ('yoni',5),
 ('III',7),
 ('øåðéëäï',10),
 ('eylondukas',15),
 ('nirbarak',16),
 ('DUke',17),
 ('shahafpatishi',17),
 ('nadavr',18),
 ('asafh',19),
 ('roeys',20),
 ('guym',21),
 ('guym2',22),
 ('ofer',22),
 ('daniell',23),
 ('gals',24),
 ('liorz',25),
 ('urib',26),
 ('reutl',27),
 ('tal',27),
 ('sarao',28),
 ('sarao2',29),
 ('orenb',30),
 ('alonh',31);
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
 ('alonh',2),
 ('asafh',2),
 ('bill',2),
 ('daniell',2),
 ('gals',2),
 ('guym',2),
 ('guym2',2),
 ('liorz',2),
 ('nadavr',2),
 ('nirbarak',2),
 ('orenb',2),
 ('reutl',2),
 ('roeys',2),
 ('sarao',2),
 ('sarao2',2),
 ('shahafpatishi',2),
 ('urib',2);
/*!40000 ALTER TABLE `usesrpermissionsgroups` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
