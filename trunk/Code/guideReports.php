<?php
	require_once("UserClass.php"); //include the user class	
	require_once("Definitions.php");
	require_once("dataValidation.php");
	require_once("generalFunctions.php");		
	session_start();
	$refererPage = "mainMenusPage_TABLE.php";
	$SelfrefererPage="guideReports.php";
	include("validateSession.php"); //validate session
	if (!$loggedUser->checkIfAllowed("editAttendecy"))
	{
		$redirect="Location:restricted2.html";
		echo header($redirect);
	}
	$globalYear;
	$globalMonth;
	//print_r($_POST);
?>
<html> 
	<style type="text/css">  
	    @import url(zivStyle.css);    
	</style>
	<script language="javascript" src="javascripts\javaScriptFunctions.js"></script>
	<head></head>
	<body>
	<form name="guideattendance" method="post" action="guideReports.php">
	<?php 
	//$dontShow = 0;
	$showMonthReport =0;?>

	<?php
	 
				// 	if a daily report was selected 
	if ( isset($_POST['editMonthlyGroup'])&& ($_POST['editMonthlyGroup']))
	{
		$sql = "SELECT * FROM USERS WHERE Username = '". $_POST[editMonthlyGroupUserName] ."'";
		$result = executeQuary($sql); 
		$myRecord = mysql_fetch_array($result);
		$firstName=$myRecord["FirstName"];
		drawEditDay($_POST['editMonthlyGroup'],$_POST[editMonthlyGroupUserName],$firstName,getUserGroup($_POST[editMonthlyGroupUserName]),0);
		//$dontShow =1;
	}
	
	$temp = 0;
	if (isset($_POST['weekchange']))			// if week button was pressed
	{
		$temp = $_POST['saveweeks'] +  $_POST['weekchange'];
	}
	if (isset($_POST['updateattendance']))		// if update button was pressed
	{
	$lastUser="";		/** <== REMOVE OLD V MARKINGS **/
		foreach ($_POST as $value)		// get all checked dates
			{		// check if this is a checkbox post
				if (strripos($value,",") > 0)		
				{							///*********  TODU - Add Update of data into DB !!!!
					$insert = explode(",", $value);		// split string "Username,day,month,year"
					
					/** REMOVE OLD V MARKINGS **/
					if ($lastUser=="")
						{
						$lastUser=$insert[0];
						updateUserAttendence($lastUser);
						}
					
					if ($lastUser!=$insert[0]) //Starting a new user
					{
						$lastUser=$insert[0];
						updateUserAttendence($lastUser);
					}

					/**^^^ REMOVE OLD V MARKINGS ^^^**/
					$sql = "INSERT INTO userattendance(UserName,day,month,year) values('".$insert[0]."','". $insert[1]."','". $insert[2]."','". $insert[3]."')"; 
					$result = executeQuary($sql);
				}
			}
			
	}
	
	if (isset($_POST['daliyreportSaveChange']))		// if update button was pressed
	{
		$ins = explode(",", $_POST['saveDate']);
		$sql = "DELETE FROM dailyreport WHERE Username='".$loggedUser->getUname()."' and day=".$ins[0]." and month=".$ins[1]." and year=".$ins[2];
		$result = executeQuary($sql);		
		$sql = "INSERT INTO dailyreport(UserName,day,month,year,socilGoal,professionalGaol,seaCenterId,activityNumber,outGuide,volGuide,profGuide1,profGuide2,timeofActicity,typesofseatols,activity,extend,goal,goal2,more,chelenge,extendevent,next,problems,problems2,kind,nextImprove) values('".$loggedUser->getUname()."',". $ins[0].",". $ins[1].",". $ins[2].",'".$_POST[socialGoal]."','".$_POST[profGoal]."','".$_POST[seacenter]."',".$_POST[activitynumber].",'".$_POST[outGuide]."','".$_POST[volGuide]."','".$_POST[zivProfguides1]."','".$_POST[zivProfguides2]."','".$_POST[timeofActicity]."','".$_POST[typesofseatols]."','".$_POST[activity]."','".$_POST[extend]."','".$_POST[goal]."','".$_POST[goal2]."','".$_POST[more]."','".$_POST[chelenge]."','".$_POST[extendevent]."','".$_POST[next]."','".$_POST[problems]."','".$_POST[problems2]."','".$_POST[kind]."','".$_POST[nextImprove]."')";
	
		$result = executeQuary($sql);
		if (mysql_affected_rows() == 0) 	//date was not inserted into DB
		{
				echo "Error in Insert SQL Query: ".$sql;
		}
	
	}
	
	if (isset($_POST['event']))		// if update button was pressed
	{	
		$ins = explode(",", $_POST['saveDate2']);
		$sqlevent = "DELETE FROM EventTable WHERE Username='".$loggedUser->getUname()."' and ".$ins[0]." and ".$ins[1]." and ".$ins[2];
		$result = executeQuary($sqlevent);	
		$sql = "INSERT INTO EventTable(Username,Eday,Emonth,Eyear,Ehour,eventDis, eventActionsbefore ,eventActionsduring ,eventActionsdAfter ,summary ,prevent ,react ,comments,Emin) values('".$loggedUser->getUname()."',". $ins[0].",". $ins[1].",". $ins[2].",".$_POST[Ehour].",'".$_POST[eventDis]."','".$_POST[eventActionsbefore]."','".$_POST[eventActionsduring]."','".$_POST[eventActionsdAfter]."','".$_POST[summary]."','".$_POST[prevent]."','".$_POST[react]."','".$_POST[comments]."',".$_POST[Emin].")";
		$result = executeQuary($sql);
		if (mysql_affected_rows() == 0) 	//date was not inserted into DB
		{
				echo "Error in Insert SQL Query: ".$sql;
		}
	}
	
	$allowViewAll = $loggedUser->checkIfAllowed("viewAllUsers");		//get user permissions 
	
	/***************************************************/
	if ($allowViewAll)	// if manager 
	{
		if (!$_POST['editMonthlyGroup'])
		{
						// display manager links page if - 1) if manager & no selected username OR 2) pressed back & manager 
				if(!isset($_POST['userNameManag'])||isset($_POST['backtoupdateattendance'])||isset($_POST['retorntoMonthReport']))
				{
					drawManegerMonthlyReport();
			//		$dontShow=1;
				}
				else
					// when manager select a user from links list
				if (isset($_POST[userNameManag])&& ($_POST[userNameManag]))
				{
					$sql = "SELECT * FROM USERS WHERE Username = '". $_POST[userNameManag] ."'";
					$result = executeQuary($sql); 
					$myRecord = mysql_fetch_array($result);
					$firstName=$myRecord["FirstName"];
					$lastName = $myRecord["LastName"];
					?> <h1><?php echo "סיכום חודשי עבור ".$firstName."  ".$lastName?></h1>
					<?php
					draw_montly_attendance_page(getUserGroup($_POST[userNameManag],0),claculateWeekDates(date("D")),$temp);		// display month att' for selected instractor
					drawMonmthlyReport($_POST[userNameManag],$globalMonth,$globalYear);
				//	$dontShow=1;
				}
		}
	//		if (isset($_POST['retorntoMonthReport']))
	//			{
	//				draw_montly_attendance_page($_POST['sid'],claculateWeekDates(date("D")),$temp);
	//				drawMonmthlyReport($_POST['saveUserName'],$globalMonth,$globalYear);
	//			}
	} //end Manager

	else		// Not a manager - instractor !
	{
		if (!$_POST['editMonthlyGroup'])
		{
					//draw user month report 
			if ((isset($_POST['monthateattendance'])&& !isset($_POST['backtoupdateattendance']))|| isset($_POST['retorntoMonthReport']))
			{
				draw_montly_attendance_page($loggedUser->getmemberOfGroup(),claculateWeekDates(date("D")),$temp);
				drawMonmthlyReport($loggedUser->getUname(),$globalMonth,$globalYear);
			}
				
			else		// draw user dailu report
			{
				draw_attendance_page($loggedUser->getmemberOfGroup(),claculateWeekDates(date("D")),$temp);
			}
		}
			if (isset($_POST['editDayGroup'])&&($_POST['editDayGroup']))
			{
				drawEditDay($_POST['editDayGroup'],$loggedUser->getUname(),$loggedUser->getFirstName(),$loggedUser->getmemberOfGroup(),1);
			}
		
	}
?>	
	</form>


<?php
/*******************************************************************************
*Name: draw_attendance_page
*Discription: This functions draw the attendance table  
*input: sid - group number of the logged user (in order to get all users in this group)
*output: none
*Author: Oded G
*Date: 9/10/2008 00:42
********************************************************************************/
function draw_attendance_page($sid=0, $dates ,$weeksFromCur = 0)
{
?>
	<input type="hidden" name="editDayGroup" value="0">
	<input type="hidden" name="arrowbutton" value="0">
	<input type="hidden" name="saveweeks" value=<?php echo $weeksFromCur?>>
	<!-- /* FOR REMOVING OLD PRESENS*/  -->
	<input type="hidden" name="weekStart" value=<?php echo calcDate($dates,0,$weeksFromCur)?>>
	<input type="hidden" name="weekEnd" value=<?php echo calcDate($dates,6,$weeksFromCur)?>>	
	<table CLASS="CALENDAR" BORDER="1">
	 <tr CLASS="TABLE_HEADER">
   	 	<td>שם חניך</td>
   	 	<td class="CALENDAR">ראשון
   	 	<br><a href="javascript:DateEditSubmit('<?php echo calcDate($dates,0,$weeksFromCur);?>')" title="לחץ כאן כדי לערוך את הפעילות היומית"><?php echo calcDateDiffFormat($dates,0,$weeksFromCur); ?></a></td>
   	 	<td class="CALENDAR">שני
   	 	<br><a href="javascript:DateEditSubmit('<?php echo calcDate($dates,1,$weeksFromCur);?>')" title="לחץ כאן כדי לערוך את הפעילות היומית"><?php echo calcDateDiffFormat($dates,1,$weeksFromCur); ?></a></td>
   	 	<td class="CALENDAR">שלישי
   	 	<br><a href="javascript:DateEditSubmit('<?php echo calcDate($dates,2,$weeksFromCur);?>')" title="לחץ כאן כדי לערוך את הפעילות היומית"><?php echo calcDateDiffFormat($dates,2,$weeksFromCur); ?></a></td>
   	 	<td class="CALENDAR">רביעי
   	 	<br><a href="javascript:DateEditSubmit('<?php echo calcDate($dates,3,$weeksFromCur);?>')" title="לחץ כאן כדי לערוך את הפעילות היומית"><?php echo calcDateDiffFormat($dates,3,$weeksFromCur); ?></a></td>
   	 	<td class="CALENDAR">חמישי
   	 	<br><a href="javascript:DateEditSubmit('<?php echo calcDate($dates,4,$weeksFromCur);?>')" title="לחץ כאן כדי לערוך את הפעילות היומית"><?php echo calcDateDiffFormat($dates,4,$weeksFromCur); ?></a></td>
   	 	<td class="CALENDAR">שישי
   	 	<br><a href="javascript:DateEditSubmit('<?php echo calcDate($dates,5,$weeksFromCur);?>')" title="לחץ כאן כדי לערוך את הפעילות היומית"><?php echo calcDateDiffFormat($dates,5,$weeksFromCur); ?></a></td>
   	 	<td class="CALENDAR">שבת
   	 	<br><a href="javascript:DateEditSubmit('<?php echo calcDate($dates,6,$weeksFromCur);?>')" title="לחץ כאן כדי לערוך את הפעילות היומית"><?php echo calcDateDiffFormat($dates,6,$weeksFromCur); ?></a></td>
     </tr>
     	<?php 
		//  excute quary to get the list of all users which belong to this group
     	$teamSql="SELECT u.username,u.firstname,u.lastname FROM users u,users_activitygroups a where u.username=a.username and a.sid=".$sid;	
		$Teamresult=executeQuary($teamSql);

		while ($myRecord = mysql_fetch_array($Teamresult))
		{
			$array = getattendanceRange($myRecord[username],calcDate($dates,0,$weeksFromCur),calcDate($dates,6,$weeksFromCur),0);
		?>
	<tr>
     	<td>
     		<?php
     			echo $myRecord[firstname]." " .$myRecord[lastname];
     		 ?>
   	 	</td>
   	 	<td >
   	 		<input type = "checkbox" name="<?php echo $myRecord[username]."_sunday" ?>" title="סמן אם ברצונך לעדכן נוכחות חניך ביום זה"  value="<?php echo $myRecord[username].",".calcDate($dates,0,$weeksFromCur)?>"   <?php if ($array[0]) echo "checked=\"true\""; ?>>
   	 	</td>
   	 	<td >
   	 		<input type = "checkbox" name="<?php echo $myRecord[username]."_monday" ?>" title="סמן אם ברצונך לעדכן נוכחות חניך ביום זה"  value="<?php echo $myRecord[username].",".calcDate($dates,1,$weeksFromCur)?>"   <?php if ($array[1]) echo "checked=\"true\""; ?>>
   	 	</td>
   	 	<td >
   	 		<input type = "checkbox" name="<?php echo $myRecord[username]."_tuesday" ?>"  title="סמן אם ברצונך לעדכן נוכחות חניך ביום זה"  value="<?php echo $myRecord[username].",".calcDate($dates,2,$weeksFromCur)?>"   <?php if ($array[2]) echo "checked=\"true\""; ?>>
   	 	</td>
   	 	<td > 
   	 		<input type = "checkbox" name="<?php echo $myRecord[username]."_wednesday" ?>"  title="סמן אם ברצונך לעדכן נוכחות חניך ביום זה"  value="<?php echo $myRecord[username].",".calcDate($dates,3,$weeksFromCur)?>"   <?php if ($array[3]) echo "checked=\"true\""; ?>>
   	 	</td>
   	 	<td >
   	 	   	 <input type = "checkbox" name="<?php echo $myRecord[username]."_thursday" ?>"  title="סמן אם ברצונך לעדכן נוכחות חניך ביום זה"  value="<?php echo $myRecord[username].",".calcDate($dates,4,$weeksFromCur)?>"   <?php if ($array[4]) echo "checked=\"true\""; ?>>
   	 	</td>
   	 	<td >
   	 	   	 <input type = "checkbox" name="<?php echo $myRecord[username]."_friday" ?>"  title="סמן אם ברצונך לעדכן נוכחות חניך ביום זה"  value="<?php echo $myRecord[username].",".calcDate($dates,5,$weeksFromCur)?>"   <?php if ($array[5]) echo "checked=\"true\""; ?>>
   	 	</td>
   	 	<td >
   	 	   	 <input type = "checkbox" name="<?php echo $myRecord[username]."_saturday" ?>"  title="סמן אם ברצונך לעדכן נוכחות חניך ביום זה"  value="<?php echo $myRecord[username].",".calcDate($dates,6,$weeksFromCur)?>"   <?php if ($array[6]) echo "checked=\"true\""; ?>>
   	 	</td>
     </tr>
<?php }
	?> 
		<tr CLASS="ADD_NEW_PERMISSIONS">
     	<td >סה"כ חניכים בפעילות</td>
   	 	<td >
   	 		<?php echo countAttendance(calcDate($dates,0,$weeksFromCur),$sid);?>
   	 	</td>
   	 	<td >
   	 		<?php echo countAttendance(calcDate($dates,1,$weeksFromCur),$sid);?>
   	 	</td>
   	 	<td >
   	 		<?php echo countAttendance(calcDate($dates,2,$weeksFromCur),$sid);?>
   	 	</td>
   	 	<td > 
   	 		<?php echo countAttendance(calcDate($dates,3,$weeksFromCur),$sid);?>
   	 	</td>
   	 	<td >
   	 		<?php echo countAttendance(calcDate($dates,4,$weeksFromCur),$sid);?>
   	 	</td>
   	 	<td >
   	 		<?php echo countAttendance(calcDate($dates,5,$weeksFromCur),$sid);?>
   	 	</td>
   	 	<td >
   	 		<?php echo countAttendance(calcDate($dates,6,$weeksFromCur),$sid);?>
   	 	</td>
     </tr>
</table>	
	 <table CLASS="LIST_BUTTONS">		
		 <tr>
		 	<td>
		 	<input type = "hidden" name="weekchange" value="0"> 
		 	 <a href="javascript:WeekSubmit(-1)" title="שבוע קודם"><img src="img/rightArrow.jpg" border="0"></a></td>
		 	<td>   <input type = "submit" name="updateattendance" value="   עדכן   " title="לחץ כאן כדי לשמור את עידכון נוכחות">  </td>
		    <td>   
		    <a href="javascript:WeekSubmit(1)" title="שבוע הבא"><img src="img/leftArrow.jpg" border="0"></a></td>
		 </tr>
		 <tr>
		 <td></td>
		 <td><input type = "submit" align="middle" name="monthateattendance" value="     הצג דו'ח נוכחות חודשי     " title="לחץ כאן כדי להציג את הנוכחות החודשית"></td>
		 <td></td>
		 </tr>		 
	</table>

<?php }
/*******************************************************************************
*Name: draw_montly_attendance_page
*Discription: This functions draw the attendance table for a full month 
*input: sid - group number of the logged user (in order to get all users in this group)
*output: none
*Author: Oded G
*Date: 9/10/2008 00:42
********************************************************************************/
function draw_montly_attendance_page($sid=0, $dates ,$weeksFromCur = 0)
{
	global $globalYear,$globalMonth;
	$month = date("n", mktime(0, 0, 0, date("m") +  $weeksFromCur  , date("d") , date("Y")));
   	$year = date("Y", mktime(0, 0, 0, date("m") + $weeksFromCur  , date("d") , date("Y")));
	
   	$globalYear = $year;
   	$globalMonth = $month;
   	$days = cal_days_in_month(CAL_GREGORIAN,$month,$year);
	$currDate = $days.",".$month.",".$year;
	echo "<div class=\"DATE_TITLE\"><h1>".$month."/".$year."</h1></div>";

?>
	<input type="hidden" name="monthateattendance" value="0">	
	<input type="hidden" name="sid" value="<?php echo $sid;?>">
	<input type="hidden" name="editDayGroup" value="0">
	<input type="hidden" name="saveweeks" value=<?php echo $weeksFromCur?>>		
	<table CLASS="MONTH_CALENDAR" BORDER="1">
	 <tr CLASS="TABLE_HEADER">
   	 	<td>שם חניך</td>
		<?php	
			for ($i=1; $i<=$days; $i++)
			{ 	?>
   	 	<td class="CALENDAR"><?php echo $i?></td>
   	 <?php  }?>
     </tr>
	     <?php  
	     		//  excute quary to get the list of all users which belong to this group
     	$teamSql="SELECT u.username,u.firstname,u.lastname FROM users u,users_activitygroups a where u.username=a.username and a.sid=".$sid;	
		//printSqlQuary($teamSql);
     	$Teamresult=executeQuary($teamSql);
		$imgsrcX = "<img src=\"img/x.jpg\">";
		$imgsrcV = "<img src=\"img/v.jpg\">";
		while ($myRecord = mysql_fetch_array($Teamresult))
		{
		?>
	<tr>
     	<td>
     		<?php
     			echo $myRecord[firstname]." " .$myRecord[lastname];
     		 ?>
   	 	</td>
   	 	<?php
   	 		$userMonthlyatten = getattendanceRange($myRecord[username],$currDate,$currDate,true);
	     	for ($i=1; $i<=$days; $i++)
			{ 	
			?>
   	 		<td class="MONTH_CALENDAR">
   	 			<?php 
   	 			if ($userMonthlyatten[$i] == 1)  
   	 				echo $imgsrcV;
   	 			else 
   	 				echo $imgsrcX;
   	 					 ?>
   	 		</td>
	  <?php } ?>
	  </tr>
<?php } ?>
		<tr CLASS="ADD_NEW_PERMISSIONS">
     		<td >סה"כ חניכים בפעילות</td>
   	 	<?php
	     	for ($i=1; $i<=$days; $i++)
			{ 	?>
	   	 	   	 <td >
	   	 			<?php echo countAttendance($i.",".$month.",".$year,$sid);?>
	   	 		</td>
   	 <?php } ?>
   	 	</tr>	
     </table>
     	 <table CLASS="LIST_BUTTONS">		
		 <tr>
		 	<td>
		 	<input type = "hidden" name="weekchange" value="0"> 
		 	 <a href="javascript:WeekSubmit(-1)" title="חודש קודם"><img src="img/rightArrow.jpg" border="0"></a></td>
		 	<td>   <input type = "submit" name="backtoupdateattendance" value="   חזור   " title="לחץ כאן כדי לחזור לעידכון נוכחות בתצוגה שבועית" >  </td>
		    <td>   
		    <a href="javascript:WeekSubmit(1)" title="חודש הבא"><img src="img/leftArrow.jpg" border="0"></a></td>
		 </tr>
	</table>
		 <input type = "hidden" name="arrowbutton" value="0"> 	
<?php 
}
/*******************************************************************************
*Name: verifyIfChecked
*Discription: This functions calculate if the user was attended in a given date 
*input: $check -  details in format of "username,day,month,year"
*output: echo an HTML "checked" if the Query had result
*Author: Oded G.
*Date: 9/10/2008 14:01
********************************************************************************/	
	function verifyIfChecked($check)
	{
		$insert = explode(",", $check);		// split string "Username,day,month,year"
		$sql = "SELECT * from userattendance u where u.UserName='".$insert[0]."' and u.day='".$insert[1]."' and u.month ='".$insert[2]."' and u.year='".$insert[3]."'"; 
		$result = executeQuary($sql);
		if (mysql_affected_rows() > 0) 	//there is an entry in the DB
		{
			return 1;	
		}
		else 
			return 0;
	}

/*******************************************************************************
*Name: calcDate
*Discription: This functions calculate date in given format  
*input: $dates - array which include day diffrences, $num - which index in the array ,$weeksFromCur - how many weeks from current week 
*output: return the date in format of "day,month,year" 
*Author: Oded G.
*Date: 9/10/2008 10:01
********************************************************************************/	
	function calcDate($dates,$num, $weeksFromCur)
	{
		return date("j,n,Y", mktime(0, 0, 0, date("m")  , date("d") + $dates[$num] + (7 * $weeksFromCur), date("Y")));
	} 
	
/*******************************************************************************
*Name: calcDateDiffFormat
*Discription: This functions calculate date in given format  
*input: $dates - array which include day diffrences, $num - which index in the array ,$weeksFromCur - how many weeks from current week 
*output: return the date in format of "day-month-year" 
*Author: Oded G.
*Date: 10/10/2008 12:01
********************************************************************************/
	function calcDateDiffFormat($dates,$num, $weeksFromCur)
	{
		return date("j-n-Y", mktime(0, 0, 0, date("m")  , date("d") + $dates[$num] + (7 * $weeksFromCur), date("Y")));
	}
	
/*******************************************************************************
*Name: countAttendance
*Discription: This functions calculate how many users attend in a givem date  
*input: date in format of "day,month,year"
*output: return the count 
*Author: Oded G.
*Date: 10/10/2008 12:01
********************************************************************************/
	function countAttendance($date,$sid)
	{
		$ins = explode(",", $date);		// split string "day,month,year"
		$sql = "SELECT u.username from userattendance u,users_activitygroups a where u.Username=a.Username and a.sid='".$sid."' and u.day='".$ins[0]."' and u.month ='".$ins[1]."' and u.year='".$ins[2]."'";
		$result = executeQuary($sql);
		return mysql_affected_rows();
	}

	
	function drawEditDay($date,$loggedUsername,$loggedUserfirstname,$loggedUsergroup,$edit=1)
	{
		$ins = explode(",", $date);
		?>	
		<h1>דו"ח פעילות יומית </h1>
		<h2>שם המדריך:    <?php echo $loggedUserfirstname ?><br> 
			שם בית הספר:  <?php  getUserGroup($loggedUsername,true) ?><br>
			תאריך:  <?php echo $ins[0]."/".$ins[1]."/".$ins[2] ?> <br>
			הכנה לקראת הפעילות
			</h2>
		
		<input type="hidden" name="saveDate" value="<?php echo $date;?>">
	     	<?php 
			//  excute quary to get the list of all users which belong to this group
			//d.socilGoal,d.professionalGaol,d.seaCenterId,d.activityNumber,d.outGuide,d.volGuide,d.profGuide1,d.profGuide2,d.timeofActicity,d.typesofseatols,d.activity
	     	$daySql="SELECT d.socilGoal,d.professionalGaol,d.seaCenterId,d.activityNumber, d.nextImprove ,d.outGuide,d.volGuide,d.profGuide1,d.profGuide2,d.timeofActicity,d.typesofseatols,d.activity, d.extend,d.goal,d.goal2,d.more ,d.chelenge ,d.extendevent,d.next,d.problems, d.problems2,d.kind FROM dailyreport d where d.username='".$loggedUsername."' and d.day='".$ins[0]."' and d.month='".$ins[1]."' and d.year='".$ins[2]."'";	
			$Dayresult=executeQuary($daySql);
			$myRecord = mysql_fetch_array($Dayresult);
			?>
			<table CLASS="CALENDAR" BORDER="1">
		 <tr >
		 	
		 	<td>שם המרכז הימי המפעיל<br>
		 	<?php if ($edit==1){ ?>
		 		<select name="seacenter">
		 		<?php getSeaCenter($myRecord[seaCenterId]); ?>
		 		</select>
		 	<?php } else echo $myRecord[seaCenterId] ?>	

		 	</td>
		 	<td> מספר פעילות <br>
		 	<?php if ($edit==1){ ?>
		 		<input type="text" name="activitynumber" value="<?php echo $myRecord[activityNumber] ?>">
		 	<?php } else echo $myRecord[activityNumber] ?> 
		 	</td>
		</tr>
		<tr>
			<td> סוג הפעילות</td>
			<td>
			<?php if ($edit==1){ ?>
			<input type="text" name="kind" value="<?php echo $myRecord[kind] ?>">
			<?php } else echo $myRecord[kind] ?>
			</td>
		</tr>
		
		<tr>
			<td> מדריך מקצועי זר</td>
			<td>
			<?php if ($edit==1){ ?>
			<input type="text" name="outGuide" value="<?php echo $myRecord[outGuide] ?>">
			<?php } else echo $myRecord[outGuide] ?>
			</td>
		</tr>
		<tr>
			<td> מדריך מתנדב</td>
			<td>
			<?php if ($edit==1){ ?>
			<input type="text" name="volGuide" value="<?php echo $myRecord[volGuide] ?>">
			<?php } else echo $myRecord[volGuide] ?>
			</td>
		</tr>
		<tr>
			<td> מדריך מקצועי זיו נעורים</td>
			<td>
				<?php if ($edit==1){ ?>
				<select name="zivProfguides1" >
					<?php getAllGuidsName($myRecord[profGuide1]);?>
				</select>
				<?php } else echo $myRecord[profGuide1] ?>
			</td>
		</tr>
		<tr>
			<td>  מדריך מקצועי זיו נעורים</td>
			<td>
			<?php if ($edit==1){ ?>
			<select name="zivProfguides2" >
					<?php getAllGuidsName($myRecord[profGuide2]);?>
			</select>
			<?php } else echo $myRecord[profGuide2] ?>
			</td>
		</tr>
		<tr>
			<td>  אורך הפעילות</td>
			<td>
			<?php if ($edit==1){ ?>
			<select name="timeofActicity">
			<?php if ($myRecord[timeofActicity]=="רגילה") { ?>
			
			<option selected="yes">רגילה </option>
			<option> כפולה</option>
			<?php } else { ?>
				<option>רגילה </option>
				<option selected="yes"> כפולה</option>
			<?php } ?>
			</select>
			<?php } else echo $myRecord[timeofActicity] ?>
			</td>
		</tr>
		
		<tr>
			<td> מטרת הפעילות : חברתית  </td>
			<td>
			<?php if ($edit==1){ ?>
			<center>
			<textarea  name="socialGoal" rows="10" cols="50"><?php echo $myRecord[socilGoal] ?></textarea>
			</center>
			<?php } else echo $myRecord[socilGoal] ?>
			</td>
		</tr>
		<tr>
		
		<td>	 מטרת הפעילות : מקצועית</td>
		<td>
			<?php if ($edit==1){ ?>
			<center>
			<textarea  name="profGoal" rows="10" cols="50"><?php echo $myRecord[professionalGaol] ?></textarea>
			</center>		
			<?php } else echo $myRecord[professionalGaol] ?>	
		</td>
		</tr>
		<tr>
			<td>
				סוג, מספר הכלים ועזרים נוספים
			</td>
			<td>
				<?php if ($edit==1){ ?>
				<input type="text" name="typesofseatols" value="<?php echo $myRecord[typesofseatols] ?>">
				<?php } else echo $myRecord[typesofseatols] ?>	
			</td>
		</tr>
		<tr>
			<td>
				תכנון מהלך הפעילות
			</td>
			<td>
			<?php if ($edit==1){ ?>
			<center>
				<textarea  name="activity" cols="50" rows="10"><?php echo $myRecord[activity] ?></textarea>
				</center>
			<?php } else echo $myRecord[activity] ?>	
			</td>
		</tr>
		<tr>
			<td>
				תיאור הפעילות בהרחבה, משלב המפגש בביה"ס עד לאחר הפיזור
			</td>
			<td>
			<?php if ($edit==1){ ?>
			<center>
				<textarea  name="extend" cols="50" rows="10"><?php echo $myRecord[extend] ?></textarea>
				</center>
			<?php } else echo $myRecord[extend] ?>	
			</td>
		</tr>
		<tr>
			<td>
				ערך השגת המטרה המקצועית
			</td>
			<td>
			<?php if ($edit==1){ ?>
			<center>
				<textarea  name="goal" cols="50" rows="10"><?php echo $myRecord[goal] ?></textarea>
				</center>
			<?php } else echo $myRecord[goal] ?>	
			</td>
		</tr>
			<tr>
			<td>
				ערך השגת המטרה החברתית
			</td>
			<td>
			<?php if ($edit==1){ ?>
			<center>
				<textarea  name="goal2" cols="50" rows="10"><?php echo $myRecord[goal2] ?></textarea>
				</center>
			<?php } else echo $myRecord[goal2] ?>	
			</td>
		</tr>
		
			<tr>
			<td>
				הצלחות נוספות
			</td>
			<td>
			<?php if ($edit==1){ ?>
			<center>
				<textarea  name="more" cols="50" rows="10"><?php echo $myRecord[more] ?></textarea>
				</center>
			<?php } else echo $myRecord[more] ?>	
			</td>
		</tr>
		<tr>
			<td>
				אתגרים – קשיים ודילמות
			</td>
			<td>
			<?php if ($edit==1){ ?>
			<center>
				<textarea  name="chelenge" cols="50" rows="10"><?php echo $myRecord[chelenge] ?></textarea>
				</center>
			<?php } else echo $myRecord[chelenge] ?>	
			</td>
		</tr>
		<tr>
			<td>
				אירועים מיוחדים
			</td>
			<td>
			<?php if ($edit==1){ ?>
			<center>
				<textarea  name="extendevent" cols="50" rows="10"><?php echo $myRecord[extendevent] ?></textarea>
				</center>
			<?php } else echo $myRecord[extendevent] ?>	
			</td>
		</tr>
		<tr>
			<td>
				מטרות, יעדים ונקודות לשיפור לפעילות הבאה
			</td>
			<td>
			<?php if ($edit==1){ ?>
			<center>
				<textarea  name="nextImprove" cols="50" rows="10"><?php echo $myRecord[nextImprove] ?></textarea>
				</center>
			<?php } else echo $myRecord[nextImprove] ?>	
			</td>
		</tr>
		<tr>
			<td>
				בעיות בתשתית הימית הקשורות במפעיל איחור, חוסר בציוד, ציוד לא תקין, תיאום וכו
			</td>
			<td>
			<?php if ($edit==1){ ?>
			<center>
				<textarea  name="problems" cols="50" rows="10"><?php echo $myRecord[problems] ?></textarea>
				</center>
			<?php } else echo $myRecord[problems] ?>	
			</td>
		</tr>
			<tr>
			<td>
				בעיות בהדרכה המקצועית נא לציין את שמות המדריך/ים
			</td>
			<td>
			<?php if ($edit==1){ ?>
			<center>
				<textarea  name="problems2" cols="50" rows="10"><?php echo $myRecord[problems2] ?></textarea>
				</center>
			</td>
			<?php } else echo $myRecord[problems2] ?>	
		</tr>
		</table>

		<?php if ($edit==1){ ?>
		 <table CLASS="LIST_BUTTONS">		
			 <tr>
			 	<td>
			 	<td>   <input type = "submit" name="daliyreportSaveChange" value="   עדכן   " title="לחץ כאן כדי לשמור את דוח היומי">  </td>
			 
				 </tr>
		</table>
		<?php } else {?>
			 <input type = "submit" name="retorntoMonthReport" value="חזרה לדוח חודשי" >	 
		<?php } 
    		$EventSql="SELECT e.Eday,e.Emonth,e.Eyear,e.Ehour,e.Emin,e.eventDis, e.eventActionsbefore ,e.eventActionsduring ,e.eventActionsdAfter ,e.summary ,e.prevent ,e.react ,e.comments FROM eventtable e where e.username='".$loggedUsername."'and e.Eday=".$ins[0]." and e.Emonth=".$ins[1]." and e.Eyear=".$ins[2];
			$Eventresult=executeQuary($EventSql);
			if (mysql_affected_rows()<1 && ($edit!=1))
				return; ?>

		
<div  id="addNewFileLayerTitle" onmousemove="javascript:LayerOnMouseOver(addNewFileLayerTitle)" onclick="javascript:showMenu(addNewFileLayer)">
			<img src="img/exclamationMark.JPG">   דו"ח אירוע חריג לפעילות זו
		
		</div>
<DIV id="addNewFileLayer">		
			<input type="hidden" name="saveDate2" value="<?php echo $date;?>">
		
		<h1>דו"ח אירוע חריג משמעת ובטיחות </h1><br>
		<?php 

//	     	$EventSql="SELECT e.Eday,e.Emonth,e.Eyear,e.Ehour,e.Emin,e.eventDis, e.eventActionsbefore ,e.eventActionsduring ,e.eventActionsdAfter ,e.summary ,e.prevent ,e.react ,e.comments FROM eventtable e where e.username='".$loggedUsername."'and e.Eday=".$ins[0]." and e.Emonth=".$ins[1]." and e.Eyear=".$ins[2];
//	     	
//			$Eventresult=executeQuary($EventSql);
			$myRecord = mysql_fetch_array($Eventresult);
			?>
			שעת המקרה: <br>
			<?php if ($edit==1) { ?>
			<select name="Emin" >
			<option value="<?php echo $myRecord[Emin] ?>"> 00</option>
			<option > 05 </option><option > 10 </option><option > 15 </option><option > 20 </option><option > 25 </option>
			<option > 30 </option><option > 35 </option><option > 40 </option><option > 45 </option><option > 50 </option>
			<option > 55 </option>
			</select>
			<?php }else echo $myRecord[Emin] ?>
			:
			<?php if ($edit==1) { ?>
			<select name="Ehour" >
			<option value="<?php echo $myRecord[Ehour] ?>">00 </option>
			<option > 01 </option><option > 02 </option><option > 03 </option><option > 04 </option><option > 05 </option>
			<option > 06 </option><option > 07 </option><option > 08 </option><option > 09 </option><option > 10 </option>
			<option > 11 </option><option > 12 </option><option > 13 </option><option > 14 </option><option > 15 </option>
			<option > 16 </option><option > 17 </option><option > 18 </option><option > 19 </option><option > 20 </option>
			<option > 21 </option><option > 22 </option><option > 23 </option><option > 24 </option>
			</select>
			<?php }else echo $myRecord[Ehour] ?>
			<br>
			<br>
		<table CLASS="CALENDAR" BORDER="1">
		 <tr >
		 	
		 	<td>תיאור האירוע <br>
		 	</td>
		 	<td>
		 		<?php if ($edit==1) { ?>
		 		<center> 
		 		<textarea name="eventDis"  rows="10" cols="50"><?php echo $myRecord[eventDis] ?></textarea>
				</center> 
				<?php }else echo  $myRecord[eventDis] ?>
		 	</td>
		</tr>
		<tr >

		 	<td>כיצד פעלתי או הגבתי למניעה לפני האירוע  <br></td>
		 	<td> 
		 	<?php if ($edit==1) { ?>
		 	<center>
		 	 <textarea name="eventActionsbefore"   rows="10" cols="50"><?php echo $myRecord[eventActionsbefore] ?></textarea>
		 	
		 	</center>
		 	<?php }else echo $myRecord[eventActionsbefore] ?>
		 	 </td>
		</tr>
		<tr >
		 	<td>כיצד פעלתי או הגבתי במהלך האירוע    <br></td>
		 	<td>
		 	<?php if ($edit==1) { ?>
			<center>
		 	<textarea name="eventActionsduring" rows="10" cols="50" ><?php echo $myRecord[eventActionsduring] ?></textarea>
		 	</center>
		 	<?php }else echo $myRecord[eventActionsduring] ?>
		 	</td>
		 	
		</tr>
		<tr >
		 	<td>כיצד פעלתי או הגבתי לאחר האירוע    <br></td>
		 	<td>
		 	<?php if ($edit==1) { ?>
		 	<center> 
		 	<textarea name="eventActionsdAfter" rows="10" cols="50" ><?php echo $myRecord[eventActionsdAfter] ?></textarea>
		 	</center>
		 	<?php }else echo $myRecord[eventActionsdAfter] ?>
		 	</td>
		</tr>
		<tr >
		 	<td>סיכום המצב בעת מילוי הדו"ח   <br></td>
		 	<td>
		 	<?php if ($edit==1) { ?>
		 	<center>  
		 	<textarea name="summary"  rows="10" cols="50"><?php echo $myRecord[summary] ?></textarea>
		 	</center> 
		 	<?php }else echo  $myRecord[summary] ?>
		 	</td>
		 	
		</tr>		
		</table>
		<br><br>
		מסקנות לעתיד <br><br>
		<table CLASS="CALENDAR" BORDER="1">
		 <tr >		 	
		 	<td>מניעה: מה אפשר לעשות לפני הפעילות <br>
		 	</td>
		 	<td> 
		 	<?php if ($edit==1) { ?>
		 	<center>
		 	<textarea name="prevent"  rows="10" cols="50"><?php echo $myRecord[prevent] ?></textarea>
		 	</center>
		 	<?php }else echo $myRecord[prevent] ?>
		 	</td>
		</tr>
		 <tr >		 	
		 	<td>תגובה: כיצד להגיב אחרת אם צריך <br>
		 	</td>
		 	<td> 
		 	<?php if ($edit==1) { ?>
		 	<center>
		 	<textarea name="react" rows="10" cols="50"><?php echo $myRecord[react] ?></textarea>
		 	</center>
		 	<?php }else echo $myRecord[react] ?>
		 	</td>
		</tr>
		 <tr >		 	
		 	<td>הערות נוספות  <br>
		 	</td>
		 	<td> 
		 	<?php if ($edit==1) { ?>
		 	<center>
		 	<textarea name="comments"  rows="10" cols="50"><?php echo $myRecord[comments] ?></textarea>
		 	</center>
		 	<?php }else echo $myRecord[comments] ?>
		 	</td>
		</tr>
</table>		
<?php if ($edit==1) { ?>
	 <input type = "submit" name="event" value="   שליחת אירוע חריג   " title="לחץ לשמירת אירוע חריג  ">
	 <?} ?>	 
</DIV>
	<?php }
	
	function updateUserAttendence($userToUpdate)
	{
		$weekStart = explode(",", $_POST[weekStart]);
		$weekEnd = explode(",", $_POST[weekEnd]);
		if ($weekStart[1]==$weekEnd[1])
		{
			$daySql = "day>='".$weekStart[0]."' and day <='".$weekEnd[0]."'";
			$monthSql = "month='".$weekStart[1]."'";
			$yearSql = "year='".$weekStart[2]."'";
			$sql = "DELETE FROM userattendance WHERE Username='".$userToUpdate."' and ".$daySql." and ".$monthSql." and ".$yearSql;
		}
		else
		{
			
			$daySql = "day>='".$weekStart[0]."' and day <='".cal_days_in_month(CAL_GREGORIAN,$weekStart[1],$weekStart[2])."' and month='".$weekStart[1]."'";
			$yearStartSql = "year='".$weekStart[2]."'";
			$daySql = $daySql. " and ".$yearStartSql;
			
			$daySql2 = "day>='1' and day <='".$weekEnd[0]."' and month='".$weekEnd[1]."'";
			$yearEndSql = " year='".$weekEnd[2]."'";
			$daySql2 = $daySql2. " and ".$yearEndSql;
			$sql = "DELETE FROM userattendance WHERE Username='".$userToUpdate."' and (".$daySql." OR ".$daySql2.")";
		}
		executeQuary($sql);
	}

	
	function getAllGuidsName($selectedValue=0)
	{		
		$sql ="SELECT u.FirstName,u.lastName FROM users u ,usesrpermissionsgroups up where up.PID=2 and up.UserName=u.UserName; ";
		$GroupListresult=executeQuary($sql);
		?>
		<option value=""> אף מדריך לא השתתף </option>
		<?php
		while ($myRecord = mysql_fetch_array($GroupListresult))
			{	
				if ($selectedValue == $myRecord[0]) // compare group number
					$selectedString = "selected=\"yes\""; 
				else
					$selectedString="";
				?>
				<option value="<?php echo $myRecord[0]?>" <?php echo $selectedString?>><?php echo $myRecord[FirstName]. " - ".$myRecord[lastName];?></option>
				<?php
			}
	}
	function getSeaCenter($selectedValue=0)
	{		
		$sql ="SELECT n.ncName FROM navalcenters n; ";
		$GroupListresult=executeQuary($sql);
		?>
		<option value=""> פעילות מחוץ למרכז ימי </option>
		<?php
		while ($myRecord = mysql_fetch_array($GroupListresult))
			{	
				if ($selectedValue == $myRecord[0]) // compare group number
					$selectedString = "selected=\"yes\""; 
				else
					$selectedString="";
				?>
				<option value="<?php echo $myRecord[0]?>" <?php echo $selectedString?>><?php echo $myRecord[ncName]?></option>
				<?php
			}
	}
	function getattendanceRange($username,$startDate,$endDate,$month = 0)
	{
		$weekStart = explode(",", $startDate);
		$weekEnd = explode(",",$endDate);
		if ($month)
		{
		//	$sql = "select u.username,u.firstname,u.lastname,a.day from users u, userattendance a ,users_activitygroups g where u.username = a.username and a.month='".$weekStart[1]."' and a.year='".$weekStart[2]."' and g.username = a.username and g.SID='".$gid."'";
			$sql = "select a.day from userattendance a where a.username = '".$username."' and a.month='".$weekStart[1]."' and a.year='".$weekStart[2]."'";
			$result = executeQuary($sql);
			while ($myRecord = mysql_fetch_array($result))
			{
				$resultArray[$myRecord[day]] = 1;
			}
			return $resultArray; 
		}
		
		else 		// Weekly attendance
		{
			if ($weekStart[1] == $weekEnd[1])		// days are in the same month
			{
				$daySql = "day>='".$weekStart[0]."' and day <='".$weekEnd[0]."'";
				$monthSql = "month='".$weekStart[1]."'";
				$yearSql = "year='".$weekStart[2]."'";
				$sql = "SELECT a.day FROM userattendance a WHERE a.username='".$username."' and ".$daySql." and ".$monthSql." and ".$yearSql;
			}
			else		// diffrent month
			{
				$daySql = "day>='".$weekStart[0]."' and day <='".cal_days_in_month(CAL_GREGORIAN,$weekStart[1],$weekStart[2])."' and month='".$weekStart[1]."'";
				$yearStartSql = "year='".$weekStart[2]."'";
				$daySql = $daySql. " and ".$yearStartSql;
				
				$daySql2 = "day>='1' and day <='".$weekEnd[0]."' and month='".$weekEnd[1]."'";
				$yearEndSql = " year='".$weekEnd[2]."'";
				$daySql2 = $daySql2. " and ".$yearEndSql;
				$sql = "SELECT a.day, a.month, a.year FROM userattendance a WHERE a.username='".$username."' and (".$daySql." OR ".$daySql2.")";
			}
			
			$result = executeQuary($sql);
			while ($myRecord = mysql_fetch_array($result))
			{
				$resultArray[date("w", mktime(0, 0, 0, $myRecord[month]  , $myRecord[day] , $myRecord[year]))] = 1;
			}
			return $resultArray; 
		}
	
	}
	?>
	<?php function drawMonmthlyReport($user,$month,$year)
	{
		?>	
		<input type="hidden" name="editMonthlyGroup" value="0">
		<input type="hidden" name="editMonthlyGroupUserName" value="0">
		<input type="hidden" name="userNameManag" value="<?php echo $user;?>">
		<?php
		$daySql="SELECT d.day,d.seaCenterId,d.kind ,d.outGuide,d.volGuide,d.profGuide1,d.profGuide2,d.timeofActicity FROM dailyreport d where d.username='".$user."' and d.month='".$month."' and d.year='".$year."'";	
		$Dayresult=executeQuary($daySql);
		if (mysql_affected_rows() < 1 )
			return;
		?>
	<table CLASS="CALENDAR" BORDER="1">
		<tr class="TABLE_HEADER">
			<td>
				<?php echo "תאריך" ?>
			</td>
			<td>
				<?php echo "סוג הפעילות" ?>
			</td>
			<td>
				<?php echo "מדריך מקצועי זר" ?>
			</td>
			<td>
				<?php echo "מדריך מתנדב" ?>
			</td>	
			<td>
				<?php echo "מד.מקצועי זיו נעורים" ?>
			</td>	
			<td>
				<?php echo "מד.מקצועי זיו נעורים" ?>
			</td>	
			<td>
				<?php echo "אורך הפעילות" ?>
			</td>	
			<td>
				<?php echo "שם המרכז הימי המפעיל" ?>
			</td>
	</tr>	
			<?php 
			while ($myRecord = mysql_fetch_array($Dayresult))
			{?>
	<tr>			
						<td>
							<?php $date3 = $myRecord[day].",".$month.",".$year ?>
							<a href="javascript:DateEditMonthlySubmit('<?php echo $date3;?>','<?php echo $user ?>')" title="לחץ כאן כדי לראות את הפעילות היומית"><?php echo $myRecord[day]."/".$month."/".$year ?></a>	
						</td>
						<td>
							 <?php echo " ".$myRecord[kind] ?>
						</td>
						<td>
						    <?php echo " ".$myRecord[outGuide] ?>
						</td>
						<td>
						    <?php echo " ".$myRecord[volGuide] ?>
						</td>
						<td>
						    <?php echo " ".$myRecord[profGuide1] ?>
						</td>
						<td>
						    <?php echo " " .$myRecord[profGuide2] ?>
						</td>
						<td>
						    <?php echo " ".$myRecord[timeofActicity] ?>
						  </td>
						
			
						<td>
						    <?php echo " ". $myRecord[seaCenterId] ?>
						</td>
	</tr>
				
				
			<?php }?> 

	</table>
	

	 <?php }?>  

<?php function drawManegerMonthlyReport()
{ ?>
<input type="hidden" name="userNameManag" value="0">
<h1>הצג דו"ח חודשי מנהל  עבור מדריך:</h1>
<?php $sql = "SELECT u.UserName,s.FirstName ,s.LastName ,a.aGroupName FROM usesrpermissionsgroups u ,users s , users_activitygroups g ,activitygroups a where u.PID=2 and u.UserName=s.UserName and u.UserName=g.UserName and g.sid=a.sid;";
		  $GroupListresult=executeQuary($sql);

		  while ($myRecord = mysql_fetch_array($GroupListresult))
		  {
		  	?><a href="javascript:DateEditMonthlyManegerSubmit('<?php echo $myRecord[UserName] ?>')" title="לחץ לדוח עבור מדריך זה "><?php echo $myRecord[FirstName]." ".$myRecord[LastName]."-".$myRecord[aGroupName]?></a>
		  	<br>		
		 <?php  }?>

<?php } ?>
	
	
</body> 
</html> 


