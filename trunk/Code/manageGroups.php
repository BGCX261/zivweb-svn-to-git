<?php
require_once("UserClass.php");
session_start();
$refererPage = "mainMenusPage_TABLE.php";
$SelfrefererPage = "manageGroups.php";
include("validateSession.php"); //validate session
//SET PERMISSIONS
	$allowEditing = $loggedUser->checkIfAllowed("editGroups");
	$allowViewAll = $loggedUser->checkIfAllowed("viewAllUsers");
	if (!$loggedUser->checkIfAllowed("viewGroups"))
	{
		$redirect="Location:restricted2.html";
		echo header($redirect);
	}
/////// END OF VALIDATIONS ///////////////
/*
 * Update Users
 */
?>
<html> 
	<style type="text/css">  
	    @import url(zivStyle.css);    
	</style>
	<script language="javascript" src="javascripts/javaScriptFunctions.js"></script>
<head></head>
<body>  
	<!-- DISPLAY THE ACTIVITY GROUP LIST -->
	<?php
	
	updates();
	if (isset($_POST[editGroup])&& $allowEditing) //if editing a group
		editGroup($_POST[editGroup]);	
	else //else..
		drawGroupsForm($allowEditing);	
	?>
</body>
</html>
<?php
/*******************************************************************************
*Name: updates
*Discription: This function check if any updates realated to GROUPS where made
*input: none
*output: none
*Author: Amit Eitan
*Date: 9/10/2008 17:30
********************************************************************************/
function updates()
{
	/*UPDATE GROUPINFO*/
	if (isset($_POST[submitEditGroup]))
	{
		$sql = "UPDATE activitygroups Set aGroupName='".$_POST["aGroupName"]."', City='".$_POST["City"]."', Address='".$_POST["Address"]."' WHERE SID='".$_POST["groupID"]."'";
		executeQuary($sql);
	}
	
	/*Add Group*/
	if (isset($_POST[add_group]))
	{
		/******צריך להוסיף בדיקות על הקלט!****/
		$sqlInsert ="INSERT INTO activitygroups(aGroupName,City,Address)";
		$sqlInsert.=" values('" . $_POST["groupName"]. "','"  .  $_POST["groupCity"]. "','"  .  $_POST["groupAddress"]."')";
		$result = executeQuary($sqlInsert);
	}
	
	/*Delete Group*/
	if (isset($_POST[delete_groups]) && (count($_POST)>1) )
	{
		$deleteFirstFlag=0;
		foreach ($_POST as $value)
			{
				if ($deleteFirstFlag<1)
				{
					$deleteFirstFlag++;
				}
				else
					{
					$value = "SID='".$value."' OR ";
					$sqlString=$sqlString . $value;
					}
			}
		$sqlString[strripos($sqlString,"O")]=" ";
		$sqlString[strripos($sqlString,"R")]=" ";
		
		$sqlUpdateQuary = "delete FROM activitygroups  WHERE ".$sqlString;
		$result = executeQuary($sqlUpdateQuary);
	}
}
/*******************************************************************************
*Name: editGroup
*Discription: This function creats HTML that allows the editing of a specified Group
*input: the group number of the wanted group
*output: HTML FORM that allows to edit the group details
*Author: Amit Eitan
*Date: 9/10/2008 17:30
********************************************************************************/
function editGroup($sid)
{
	$sql ="SELECT * FROM activityGroups WHERE SID='".$sid."'";
	$result = executeQuary($sql);
	$myRecord = mysql_fetch_array($result);
	?><!--  -->
		<FORM method="POST" action="manageGroups.php" onsubmit="return confirmDelete()">
		<input type="hidden" name="groupID" value="<?php echo $myRecord[0] ?>">
		<table>
			<tr class="TABLE_HEADER">
				<td colspan="2" >פרטי קבוצה</td>
				
			</tr>
			<tr>
				<td>שם קבוצה</td>
				<td>
					<input type="text" name="aGroupName" value="<?php echo $myRecord[aGroupName] ?>">
				</td>
			</tr>
			<tr>
				<td>עיר</td>
				<td>
					<input type="text" name="City" value="<?php echo $myRecord[City] ?>">
				</td>
			</tr>
			<tr>
				<td>רחוב</td>
				<td>
					<input type="text" name="Address" value="<?php echo $myRecord[Address] ?>">
				</td>
			</tr>
			<tr>
				<td>מדריך</td>
				<td>
					<?php echo getGroupGuide($myRecord[0])?>
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="submitEditGroup" value="עדכן">
				</td>
				<td>
					<input type="submit" name="cancelEditGroup" value="בטל">
				</td>
			</tr>
		</table>
		</FORM>
	<?php
	
}
/*******************************************************************************
*Name: drawGroupsForm
*Discription: This function creats a list of all the groups in the DB  
* 				the value of each group tha will show in th $_POST is the SID
*input: none
*output: HTML code that is a table
*Author: Amit Eitan
*Date: 9/10/2008 16:30
********************************************************************************/
function drawGroupsForm($allowEditing=false)
{
$sql ="SELECT * FROM activityGroups";

	$result = executeQuary($sql);
	if (mysql_num_rows($result)==0)
	{
		?>
		<div class="QUARY_RESULT_ERROR">
		אין קבוצות
		</div>
		<?php
	}
	else
	{ 
?>		
		<?php if ($allowEditing) {?>
		<FORM method="POST" name="GROUP_LIST_FORM" action="manageGroups.php" onsubmit="return confirmDelete()">
		<?php } ?>
		<input type="hidden" name="editGroup" value="true">
		<input type="hidden" name="manageGroupsForm" value="true">
		<table class=list border=1>
		<tr class="TABLE_HEADER">
				<?php if ($allowEditing) {?>
				<td>בחירה</td>
				<?php } ?>
				<td>שם קבוצה</td>
				<td>עיר</td>
				<td>רחוב</td>
				<td>מדריך</td>
			</tr>
			<?php 	
			while ($myRecord = mysql_fetch_array($result))
			{
			if ($myRecord[0]<4) continue; //skip groups instructors and administrators
			?>	
			<tr>
				<?php if ($allowEditing) {?>
				<td><INPUT NAME="<?php echo $myRecord[0];?>" TYPE="checkbox" value="<?php echo $myRecord[0];?>"> </td>
				<?php } ?>
				<td><a href="javascript:GroupEditSubmit(<?php echo $myRecord[0];?>)"><?php echo $myRecord[aGroupName];?></a><?php// echo $myRecord[aGroupName];?> </td>
				<td><?php echo $myRecord[City];?> </td>
				<td><?php echo $myRecord[Address];?> </td>
				<td><?php echo getGroupGuide($myRecord[0]);?></td>
			</tr>	
			<?php
			}	
			?>
			 </table>
			<?php if ($allowEditing) {?>
			 <table class="LIST_BUTTONS">
			<tr>
				<td><INPUT TYPE="submit" name="delete_groups" value=" מחק קבוצות נבחרות "></td>
				<td><INPUT TYPE="reset" value="  נקה   "></td>
			</tr>
			</table>
			<?php }?>
 	<?php if ($allowEditing) {?>
 	</FORM>
 	
 	<!-- Add a new group -->
 <form action="manageGroups.php" method="post">
 		<table>
			<tr class="TABLE_HEADER">
				<td colspan="2">הוספת קבוצה חדשה</td>
			</tr>
			<tr>
	 			<td>שם הקבוצה:</td>
	 			<td><INPUT NAME="groupName" type="text" ></td>
	 		</tr>
	 		<tr>
	 			<td>עיר הקבוצה:</td>
	 			<td><INPUT NAME="groupCity" type="text" ></td><td></td>
	 		</tr>
	 		<tr>
	 			<td>כתובת	:</td>
	 			<td><INPUT NAME="groupAddress" type="text" ></td>
	 		</tr>
	 		<tr>
	 			<td><INPUT TYPE="submit" name="add_group" value=" הוסף קבוצה "></td>
	 			<td><center><INPUT TYPE="reset" name="add_group" value=" נקה טופס"></center></td>
	 		</tr>
 		</table>
 	</form>
 	<?php }?>
<?php
	}
}
?>