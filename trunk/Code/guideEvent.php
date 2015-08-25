<?php
	require_once("UserClass.php"); //include the user class	
	require_once("Definitions.php");
	require_once("dataValidation.php");
	require_once("generalFunctions.php");		
	session_start();
	include("validateSession.php"); //validate session
	echo "<HR>";
	print_r($_POST);
	echo "<HR>";
	
?>
<html> 
	<style type="text/css">  
	    @import url(zivStyle.css);    
	</style>
	<script language="javascript" src="javascripts/javaScriptFunctions.js"></script>
	<head></head>
	<body> 
		<form name="ExtendEvent" method="post" action="guideEvent.php">
<?php
	if (isset($_POST['event']))		// if update button was pressed
	{	
			$ins = explode(",", $_POST['saveDate2']);
		
			$sql = "INSERT INTO EventTable(Username,Eday,Emonth,Eyear,Ehour,eventDis, eventActionsbefore ,eventActionsduring ,eventActionsdAfter ,summary ,prevent ,react ,comments) values('".$loggedUser->getUname()."',". 12 .",". 1 .",". 2 .",'".$_post[Ehour]."','".$_post[eventDis]."','".$_POST[eventActionsbefore]."','".$_post[eventActionsduring]."','".$_post[eventActionsdAfter]."','".$_post[summary]."','".$_POST[prevent]."','".$_post[react]."','".$_post[comments]."')";
			printSqlQuary($sql);	
			$result = executeQuary($sql);
			if (mysql_affected_rows() == 0) 	//date was not inserted into DB
			{
					echo "Error in Insert SQL Query: ".$sql;
			}
	}	

?>	
	<h1>דו"ח אירוע חריג משמעת ובטיחות </h1><br>
		<h2>שם המדריך:    <?php echo $loggedUser->getUname() ?><br> 
			שם בית הספר:  <?php getUserGroup($loggedUser->getUname(),true) ?><br>
		</h2>	
			     	<?php 
			//  excute quary to get the list of all users which belong to this group
			//d.socilGoal,d.professionalGaol,d.seaCenterId,d.activityNumber,d.outGuide,d.volGuide,d.profGuide1,d.profGuide2,d.timeofActicity,d.typesofseatols,d.activity
	     	$EventSql="SELECT e.Eday,e.Emonth,e.Eyear,e.Ehour,e.eventDis, e.eventActionsbefore ,e.eventActionsduring ,e.eventActionsdAfter ,e.summary ,e.prevent ,e.react ,e.comments FROM EventTable e where e.username='".$loggedUser->getUname()."'";	
			$Eventresult=executeQuary($EventSql);
			$myRecord = mysql_fetch_array($Eventresult);
			?>
			שעת המקרה: <br>
				<input type="text" name="Ehour" value ="<?php echo $myRecord[Ehour] ?>" > <br>
				<br>
				<br>
		<table CLASS="CALENDAR" BORDER="1">
		 <tr >
		 	
		 	<td>תיאור האירוע <br>
		 	</td>
		 	<td> <input type="text" name="eventDis"  value="<?php echo $myRecord[eventDis] ?>">

		 	</td>
		</tr>
		<tr >
		 	<td>כיצד פעלתי או הגבתי למניעה לפני האירוע  <br></td>
		 	<td> <input type="text" name="eventActionsbefore"  value="<?php echo $myRecord[eventActionsbefore] ?>"></td>
		</tr>
		<tr >
		 	<td>כיצד פעלתי או הגבתי במהלך האירוע    <br></td>
		 	<td> <input type="text" name="eventActionsduring"  value="<?php echo $myRecord[eventActionsduring] ?>"></td>
		</tr>
		<tr >
		 	<td>כיצד פעלתי או הגבתי לאחר האירוע    <br></td>
		 	<td> <input type="text" name="eventActionsdAfter"  value="<?php echo $myRecord[eventActionsdAfter] ?>"></td>
		</tr>
		<tr >
		 	<td>סיכום המצב בעת מילוי הדו"ח   <br></td>
		 	<td> <input type="text" name="summary"  value="<?php echo $myRecord[summary] ?>"></td>
		</tr>		
		</table>
		<br><br>
		מסקנות לעתיד <br><br>
		<table CLASS="CALENDAR" BORDER="1">
		 <tr >		 	
		 	<td>מניעה: מה אפשר לעשות לפני הפעילות <br>
		 	</td>
		 	<td> <input type="text" name="prevent"  value="<?php echo $myRecord[prevent] ?>">
		 	</td>
		</tr>
		 <tr >		 	
		 	<td>תגובה: כיצד להגיב אחרת אם צריך <br>
		 	</td>
		 	<td> <input type="text" name="react"  value="<?php echo $myRecord[react] ?>">
		 	</td>
		</tr>
		 <tr >		 	
		 	<td>הערות נוספות  <br>
		 	</td>
		 	<td> <input type="text" name="comments"  value="<?php echo $myRecord[comments] ?>">
		 	</td>
		</tr>
</table>		
	 <input type = "submit" name="event" value="   שליחת אירוע חריג   " title="לחץ לשמירת אירוע חריג  ">	 
</form>
</body>
</html>
