<?php
	require_once("UserClass.php"); //include the user class	
	require_once("generalFunctions.php");	
	session_start();
	$refererPage = "mainMenusPage_TABLE.php";
	include("validateSession.php"); //validate session
	//SET PERMISSIONS
	$allowEditing = $loggedUser->checkIfAllowed("sendMessageToGroup");
/////// END OF VALIDATIONS ///////////////
	unset($_SESSION[firstMessage]);
?>
<html> 
	<style type="text/css">  
	    @import url(zivStyle.css);    
	</style>
	<script language="javascript" src="javascripts/javaScriptFunctions.js"></script>

	<head>
			<meta http-equiv="Content-Type" content="text/html; charset=windows-1255">
		<?php loadPictures(1)?>
	</head>
	<body onload="initSlideshow()"> 
		<table style="border:thin;border-color:aqua;background-color:#F0F8FF;" align="center" width="80%"> 
			<tr class="TABLE_HEADER">
				<td>הודעות מהמדריך</td>
			</tr>
			<tr>
				<td  width="700"><?php
					getMesseges($loggedUser->getmemberOfGroup())
					?>
				</td>
			</tr>
			<tr class="TABLE_HEADER">
				<td align="center">הודעות מההנהלה</td>
			</tr>
			<tr>
				<td width="700"><?php
					getMesseges(1);
					?>
				</td>
			</tr>
			<?php if ($allowEditing) { 			?>
			<!--           NOT FOR CHANICHIM  -->
			<tr class="TABLE_HEADER">
				<td align="center">הודעות למדריכים בלבד</td>
			</tr>
			<tr>
				<td width="700"><?php
					getMesseges(2);
					?>
				</td>
			</tr>
			<!--            NOT FOR CHANICHIM  -->
			<?php 
			}	?>
		</table>
		<br>
		<br>
		<table style="border:thin;border-color:aqua;background-color:#F0F8FF;" align="center">
		<tr>
			<td>
			<table style="border:thin;">
				<tr class="TABLE_HEADER">
					<td width="200">ימי הולדת לחודש <?php echo getHebMonth(date('m'));?></td>
				</tr>
				<tr>
					<td align="center">
					<marquee id="Birthday" behavior="scroll" direction="up" scrollamount="2" scrolldelay="100" height="240" width="150" onMouseOver="this.stop();" onMouseOut="this.start();"><?php getBirthdays();?></marquee>
					</td>
				</tr>
			</table>
			</td>
			<td width="50">
			</td>
			<td>
			<div class="PIC_AREA">
				<br>
				<img width="350" height="260" src="img/logo.gif" name="slideShow" border="1">
				<div id="picComments">
				</div>
				<a href="viewPictures.php">צפה בעוד תמונות</a>
			</div>
			</td>
		</tr>
	  </table>
		<hr>
	</body> 
</html> 

<?php
function loadPictures($group=0)
{
	if (!$group) return 0; //if no group don't display any pictures
	global $loggedUser;
	global $numberOfRecentPictures;
	$sql = "SELECT * FROM pictures WHERE GID='".$loggedUser->getMemberOfGroup()."' ORDER BY PID  DESC LIMIT $numberOfRecentPictures";
	$result = executeQuary($sql);
	//$numberOfPictures = mysql_affected_rows();
	$index=1;
	?>

	<script type="text/javascript">
	<!-- 
	var pictureLinksArray = new Array();
	NoOfPicturesLoaded=0;

	<?php
	while ($myRecord = mysql_fetch_array($result))
			{	
				?>
				NoOfPicturesLoaded++;
				pictureLinksArray[<?php echo $index?>]= new Image();
				pictureLinksArray[<?php echo $index++?>].src="<?php echo $myRecord[link] ?>";
				<?php
			}
	?>
	--></script>
	<?php
}

function getBirthdays()
{
	global $loggedUser;
	global $numberOfRecentPictures;
	if (!$loggedUser->getMemberOfGroup()) return "אין קבוצה !"; //if no group don't display any birthdays
	
	$sql = "SELECT u.FirstName,u.LastName,u.MonthOfBirth, u.DayOfBirth FROM users u ,users_activitygroups g  WHERE g.sid='".$loggedUser->getMemberOfGroup()."' and u.Username= g.username and u.approved='1' and u.MonthOfBirth='".date('n')."' order by u.DayOfBirth";
	$result = executeQuary($sql);
	if (mysql_affected_rows() == 0)
	{
		echo "אין ימי הולדת !";
		return ;
	}
	
	while ($myRecord = mysql_fetch_array($result))
	{	
		$ballons = "";
		if ($myRecord['DayOfBirth'] == date('j'))
		{
			$ballons = "<img src= \"img/ballons.JPG\">";
		}
		echo $myRecord['DayOfBirth']."/".$myRecord['MonthOfBirth']."  ".$myRecord['FirstName']." ".$myRecord['LastName']."  ".$ballons."<br><br>";
	}
}

?>

