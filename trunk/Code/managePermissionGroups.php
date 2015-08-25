<?php
require_once("UserClass.php");
require_once("Definitions.php");
require_once("dataValidation.php");
require_once("generalFunctions.php");
session_start();
$refererPage = "mainMenusPage_TABLE.php";
$SelfrefererPage="managePermissionGroups.php";

include("validateSession.php"); //validate session
//SET PERMISSIONS
	$allowEditing = $loggedUser->checkIfAllowed("editPermissions");
	if (!$loggedUser->checkIfAllowed("viewPermissions"))
	{
		$redirect="Location:restricted2.html";
		echo header($redirect);
	}
//////// END OF VALIDATIONS ////////////////
?>
<html>
	<style type="text/css">  
	    @import url(zivStyle.css);    
	</style>
	<script language="javascript" src="javascripts/javaScriptFunctions.js"></script>
<head>
</head>
<body>
	<form name="permissiongroups" action="managePermissionGroups.php" method="post" onsubmit="return confirmDelete()">
<?php
	// call function to show all the permissions groups and add group main page
	if (isset($_POST['deletePermission'])) 
	{
		if (isset($_POST['selectedPermission'])) 
			deletePermission($_POST['selectedPermission']);		// call a function to delete the permission
	}
	if (isset($_POST['addPermission'])) 
	{
		addPermission();		// call a function to delete the permission
	}
	
	new_draw_persmissions_page();
	?>
	</form>
<?php	
	// check which radio button was selected 
/*******************************************************************************
*Name: addPermission
*Discription: This functions adds a permission from the database  
*input: the global $_POST with the correct fields
*output: none
*Author: Amit Eitan
*Date: 28/9/2008 00:42
********************************************************************************/
function addPermission()
{
	unset ($_POST['addPermission']);
	
	$sql = "SELECT PID FROM permissionsgroups WHERE PGroupName='".$_POST["PGroupName"]."'";
	$result = executeQuary($sql);
	if (mysql_num_rows($result)==0) //check for uniqe name
	{ 
	
		foreach ($_POST as $value)
				{
					if ($deleteFirstFlag<1) //Skip the first two cells in array containg other things
					{
						$deleteFirstFlag++;
					}
					else //create the INTO( **** ) and values( ***** ) 
						{
						$insertIntoString = $insertIntoString   .$value. ",";
						$valueString = $valueString . "1," ;

						}
				}
		$insertIntoString[strripos($insertIntoString,",")]=" "; //strip the extra ,
		$valueString[strripos($valueString,",")]=" "; //strip the extra ,

		$sqlInsert ="INSERT INTO permissionsgroups(PGroupName,".$insertIntoString.")"; 
		$sqlInsert.=" values('" .$_POST["PGroupName"]."'," .$valueString. ")";

		executeQuary($sqlInsert);
	}
	else // a permission with that name exsists
	{
		?>
		<DIV CLASS="QUARY_RESULT_ERROR">
			הרשאה עם שם זה כבר קיימת
		</DIV>
		<?php
	}
	//UPDATE permissionsgroups SET viewUsers='1',editUsers='1',viewGroups='1',editGroups='1' WHERE PID=44
}
/*******************************************************************************
*Name: deletePermission
*Discription: This functions deletes a permission from the database  
*input: permission ID (pid) of the wanted permission
*output: none
*Author: Amit Eitan
*Date: 28/9/2008 00:42
********************************************************************************/
function deletePermission($selectedPermission)
{
	$sqlUpdateQuary = "delete FROM permissionsgroups  WHERE PID=".$selectedPermission;	
	$result = executeQuary($sqlUpdateQuary);
}
function draw_persmissions_page()
{
?>

	 
	 <table CLASS="list" BORDER="1">
	 <tr CLASS="PERMISSIONS_TABLE_HEADER">
     	<td>
     		בחירה
     	</td>
   	 	<td >
   	 		שם הרשאה
   	 	</td>
   	 	<td >
   	 		צפייה במשתמשים
   	 	</td>
   	 	<td >
   	 		עריכת במשתמשים
   	 	</td>
   	 	<td >
			צפייה בקבוצות
   	 	</td>
   	 	<td >
   	 		עריכת קבוצות
   	 	</td>
   	 	<td >
			צפייה בהרשאות
   	 	</td>
   	 	<td >
   	 		עריכת בהרשאות
   	 	</td>
   	 	<td >
			צפייה בכל המשתמשים
   	 	</td>
   	 	<td >
   	 		שלח הודעות לקבוצה 
   	 	</td>
   	 	<td >
   	 		שלח הודעות לכולם 
   	 	</td>
   	 	<td >
   	 		צפייה בנוכחות 
   	 	</td>
   	 	<td >
   	 		עריכת נוכחות
   	 	</td>
   	 	<td >
   	 		צפייה בתיק מדריך 
   	 	</td>
   	 	<td >
   	 		עריכת תיק מדריך
   	 	</td>
   	 	<td >
   	 		צפייה במרכזים ימיים 
   	 	</td>
   	 	<td >
   	 		עריכת מרכזים ימיים
   	 	</td>
   	 	<td >
			עריכת משחקים
   	 	</td>
   	 	<td >
			צפייה בפורום
   	 	</td>
   	 	<td >
			עריכת הפורום
   	 	</td>
     </tr>
	<?php 
		//  excute quary to get the list of all permission groups
		$sql ="SELECT * FROM  `permissionsgroups` ORDER BY Pgroupname";		//הפעלת שאילתא לקבלת כל קבוצות ההרשאה
		$result = executeQuary($sql);		//execute get all permissions groups
		$imgsrcX = "<img src=\"img/x.jpg\">";
		$imgsrcV = "<img src=\"img/v.jpg\">";
		$resultsArray;
		$index=1;
		while ($myRecord = mysql_fetch_array($result))
		{
//			$resultsArray[0][index]= $myRecord[PGroupName];
//			$resultsArray[1][index]=$myRecord[viewUsers];
//			$resultsArray[2][index]=$myRecord[editUsers];
//			$resultsArray[0][index]=$myRecord[viewGroups];
//   	 		$resultsArray[0][index]= $myRecord[editGroups];
//   	 		$resultsArray[0][index]= $myRecord[viewPermissions];
//   	 		$resultsArray[0][index]= $myRecord[editPermissions];
//			$resultsArray[0][index]=$myRecord[viewAllUsers];
//   	 		$resultsArray[0][index]=$myRecord[sendMessageToGroup];
//			$resultsArray[0][index]=$myRecord[sendMessageToAll];
//   	 		<?php if ($myRecord[viewAttendecy])
//
//   	 		<?php if ($myRecord[editAttendecy])
//   	 		<?php if ($myRecord[viewInstructorsFolder])
//
//   	 		<?php if ($myRecord[editInstructorsFolder])
//   	 		<?php if ($myRecord[viewNavalCenters])

($myRecord[editNavalCenters])

//   	 		<?php if ($myRecord[editGames])
   	 		
	?>
	 	<tr>
     	<td>
     		<input type = "radio" name=selectedPermission   value="<?php print_r($myRecord[PID]);?>"<?php if ((isset($_POST['rd']))&(($_POST['rd']) == $myRecord[Pgroupname])){echo "checked=\"checked\"";}?>>
     	</td>
   	 	<td >
   	 		<?php echo ($myRecord[PGroupName])	?>
   	 		
   	 	</td>
   	 	<td >
   	 		<?php if ($myRecord[viewUsers])
   	 					echo $imgsrcV;
   	 			else
		   	 		echo $imgsrcX;
   	 		?>
   	 	</td>
   	 	<td >
   	 		<?php if ($myRecord[editUsers])
   	 					echo $imgsrcV;
   	 			else
		   	 		echo $imgsrcX;
   	 		?>
   	 	</td>
   	 	<td >
   	 		<?php if ($myRecord[viewGroups])
   	 					echo $imgsrcV;
   	 			else
		   	 		echo $imgsrcX;
   	 		?>
   	 	</td>
   	 	<td >
   	 		<?php if ($myRecord[editGroups])
   	 					echo $imgsrcV;
   	 			else
		   	 		echo $imgsrcX;
   	 		?>
   	 	</td>
   	 	<td >
   	 		<?php if ($myRecord[viewPermissions])
   	 					echo $imgsrcV;
   	 			else
		   	 		echo $imgsrcX;
   	 		?>
   	 	</td>
   	 	<td >
   	 		<?php if ($myRecord[editPermissions])
   	 					echo $imgsrcV;
   	 			else
		   	 		echo $imgsrcX;
   	 		?>
   	 	</td>
   	 	<td >
			<?php if ($myRecord[viewAllUsers])
   	 					echo $imgsrcV;
   	 			else
		   	 		echo $imgsrcX;
   	 		?>
   	 	</td>
   	 	<td >
   	 		<?php if ($myRecord[sendMessageToGroup])
   	 					echo $imgsrcV;
   	 			else
		   	 		echo $imgsrcX;
   	 		?>
   	 	</td>
   	 	<td >
			<?php if ($myRecord[sendMessageToAll])
   	 					echo $imgsrcV;
   	 			else
		   	 		echo $imgsrcX;
   	 		?>
   	 	</td>
   	 	<td >
   	 		<?php if ($myRecord[viewAttendecy])
   	 					echo $imgsrcV;
   	 			else
		   	 		echo $imgsrcX;
   	 		?>
   	 	</td>
   	 	<td >
   	 		<?php if ($myRecord[editAttendecy])
   	 					echo $imgsrcV;
   	 			else
		   	 		echo $imgsrcX;
   	 		?>
   	 	</td>
   	 	<td >
   	 		<?php if ($myRecord[viewInstructorsFolder])
   	 					echo $imgsrcV;
   	 			else
		   	 		echo $imgsrcX;
   	 		?> 
   	 	</td>
   	 	<td >
   	 		<?php if ($myRecord[editInstructorsFolder])
   	 					echo $imgsrcV;
   	 			else
		   	 		echo $imgsrcX;
   	 		?> 
   	 	</td>
   	 <td >
   	 		<?php if ($myRecord[viewNavalCenters])
   	 					echo $imgsrcV;
   	 			else
		   	 		echo $imgsrcX;
   	 		?> 
   	 	</td>
   	 	<td >
   	 		<?php if ($myRecord[editNavalCenters])
   	 					echo $imgsrcV;
   	 			else
		   	 		echo $imgsrcX;
   	 		?> 
   	 	</td>
   	 	<td >
   	 		<?php if ($myRecord[editGames])
   	 					echo $imgsrcV;
   	 			else
		   	 		echo $imgsrcX;
   	 		?> 
   	 	</td>
   	 	<td >
   	 		<?php if ($myRecord[viewForum])
   	 					echo $imgsrcV;
   	 			else
		   	 		echo $imgsrcX;
   	 		?> 
   	 	</td>
   	 	<td >
   	 		<?php if ($myRecord[editForum])
   	 					echo $imgsrcV;
   	 			else
		   	 		echo $imgsrcX;
   	 		?> 
   	 	</td>
     </tr>
<?php	} ?>
	 	<!--  ADD A NEW PERMISSION GROUP  -->
	 	<tr CLASS="ADD_NEW_PERMISSIONS">
	 	<td colspan="20">הוספת קבוצה חדשה</td>
	 	</tr>
	 	<tr>
     	<td colspan="2">
     		<input type = "text" name="PGroupName" width="100%">
   	 	</td>
   	 	<td >
   	 		<input type = "checkbox" name="viewUsers"   value="viewUsers">
   	 	</td>
   	 	<td >
   	 		<input type = "checkbox" name="editUsers"   value="editUsers">
   	 	</td>
   	 	<td >
   	 		<input type = "checkbox" name="viewGroups"   value="viewGroups">
   	 	</td>
   	 	<td >
   	 		<input type = "checkbox" name="editGroups"   value="editGroups">
   	 	</td>
   	 	<td >
   	 	   	 <input type = "checkbox" name="viewPermissions"   value="viewPermissions">
   	 	</td>
   	 	<td >
   	 	   	 <input type = "checkbox" name="editPermissions"   value="editPermissions">
   	 	</td>
   	 	<td >
   	 	   	 <input type = "checkbox" name="viewAllUsers"   value="viewAllUsers">
   	 	</td>
   	 	<td >
   	 		<input type = "checkbox" name="sendMessageToGroup"   value="sendMessageToGroup">
   	 	</td>
   	 	<td >
   	 		<input type = "checkbox" name="sendMessageToAll"   value="sendMessageToAll">
   	 	</td>
   	 	<td >
   	 	   	 <input type = "checkbox" name="viewAttendecy"   value="viewAttendecy">
   	 	</td>
   	 	<td >
   	 	   	 <input type = "checkbox" name="editAttendecy"   value="editAttendecy">
   	 	</td>
   	 	<td >
   	 		<input type = "checkbox" name="viewInstructorsFolder"   value="viewInstructorsFolder">
   	 	</td>
   	 	<td >
   	 		<input type = "checkbox" name="editInstructorsFolder"   value="editInstructorsFolder">
   	 	</td>
   	 	<td >
   	 		<input type = "checkbox" name="viewNavalCenters"   value="viewNavalCenters">
   	 	</td>
   	 	<td >
   	 		<input type = "checkbox" name="editNavalCenters"   value="editNavalCenters">
   	 	</td>
   	 	<td >
   	 		<input type = "checkbox" name="editGames"   value="editGames">
   	 	</td>
   	 		<td >
   	 		<input type = "checkbox" name="viewForum"   value="viewForum">
   	 	</td>
   	 		<td >
   	 		<input type = "checkbox" name="editForum"   value="editForum">
   	 	</td>
     </tr>
<!--  Add a new permision group to database -->
</table>	
	
	 <table CLASS="LIST_BUTTONS">		
	 <tr>
	 	<td>   <input type = "submit" name="addPermission" value="   הוסף    ">  </td>
	    <td>   <input type = "submit" name="deletePermission" value="   מחק   ">    </td>
	 </tr>
</table>
<?php

} //endFunction
/******************************************************************************************/
function new_draw_persmissions_page()
{

?>
	
	 
	 <table CLASS="list" BORDER="1">
	 <tr CLASS="PERMISSIONS_TABLE_HEADER">
     	<td>
     		<?php $permissionsArray["בחירה"]?>
     		בחירה
     	</td>
   	 	<td >
   	 		<?php $permissionsArray["שם הרשאה"]?>
   	 		שם הרשאה
   	 	</td>
   	 	<td >
   	 		<?php $permissionsArray["צפייה במשתמשים"]?>
   	 		צפייה במשתמשים
   	 	</td>
   	 	<td >
   	 		<?php $permissionsArray["עריכת במשתמשים"]?>
   	 		עריכת במשתמשים
   	 	</td>
   	 	<td >
   	 		<?php $permissionsArray["צפייה בקבוצות"]?>
			צפייה בקבוצות
   	 	</td>
   	 	<td >
   	 		<?php $permissionsArray["עריכת קבוצות"]?>
   	 		עריכת קבוצות
   	 	</td>
   	 	<td >
   	 		<?php $permissionsArray["צפייה בהרשאות"]?>
			צפייה בהרשאות
   	 	</td>
   	 	<td >
   	 		<?php $permissionsArray["עריכת בהרשאות"]?>
   	 		עריכת בהרשאות
   	 	</td>
   	 	<td >
   	 		<?php $permissionsArray["צפייה בכל המשתמשים"]?>
			צפייה בכל המשתמשים
   	 	</td>
   	 	<td >
   	 		<?php $permissionsArray["שלח הודעות לקבוצה"]?>
   	 		שלח הודעות לקבוצה 
   	 	</td>
   	 	<td >
   	 		<?php $permissionsArray["שלח הודעות לכולם"]?>
   	 		שלח הודעות לכולם 
   	 	</td>
   	 	<td >
   	 		<?php $permissionsArray["צפייה בנוכחות"]?>
   	 		צפייה בנוכחות 
   	 	</td>
   	 	<td >
   	 		<?php $permissionsArray["עריכת נוכחות"]?>
   	 		עריכת נוכחות
   	 	</td>
   	 	<td >
   	 		<?php $permissionsArray["צפייה בתיק מדריך"]?>
   	 		צפייה בתיק מדריך 
   	 	</td>
   	 	<td >
   	 		<?php $permissionsArray["עריכת תיק מדריך"]?>
   	 		עריכת תיק מדריך
   	 	</td>
   	 	<td >
   	 		<?php $permissionsArray["צפייה במרכזים ימיים"]?>
   	 		צפייה במרכזים ימיים 
   	 	</td>
   	 	<td >
   	 		<?php $permissionsArray["עריכת מרכזים ימיים"]?>
   	 		עריכת מרכזים ימיים
   	 	</td>
   	 	<td >
   	 		<?php $permissionsArray["עריכת משחקים"]?>
   	 		עריכת משחקים
   	 	</td>
   	 	<td >
   	 		<?php $permissionsArray["צפייה בפורום"]?>
   	 		צפייה בפורום
   	 	</td>
   	 	<td >
   	 		<?php $permissionsArray["עריכת פורום"]?>
   	 		עריכת פורום
   	 	</td>
     </tr>
	<?php 
		//  excute quary to get the list of all permission groups
		$sql ="SELECT * FROM  `permissionsgroups` ORDER BY Pgroupname";		//הפעלת שאילתא לקבלת כל קבוצות ההרשאה
		$result = executeQuary($sql);		//execute get all permissions groups
		$imgsrcX = "<img src=\"img/x.jpg\">";
		$imgsrcV = "<img src=\"img/v.jpg\">";
		while ($myRecord = mysql_fetch_array($result))
		{
	?>
	 	<tr>
     	<td>
     		<input type = "radio" name=selectedPermission   value="<?php print_r($myRecord[PID]);?>"<?php if ((isset($_POST['rd']))&(($_POST['rd']) == $myRecord[Pgroupname])){echo "checked=\"checked\"";}?>>
     	</td>
   	 	<td >
   	 		<?php echo ($myRecord[PGroupName])	?>
   	 		<?php $permissionsArray[$myRecord[PGroupName]]=$myRecord[PGroupName]?>
   	 	</td>
   	 	<td >
   	 		<?php if ($myRecord[viewUsers])
   	 					echo $res=$imgsrcV;
   	 			else
		   	 		echo $res=$imgsrcX;
		   	 $permissionsArray[$myRecord[PGroupName]][$myRecord[viewUsers]]=$res;
   	 		?>
   	 	</td>
   	 	<td >
   	 		<?php if ($myRecord[editUsers])
   	 					echo $res=$imgsrcV;
   	 			else
		   	 		echo $res=$imgsrcX;
		   	 $permissionsArray[$myRecord[PGroupName]][$myRecord[editUsers]]=$res;
   	 		?>
   	 	</td>
   	 	<td >
   	 	   	 <?php if ($myRecord[viewGroups])
   	 					echo $res=$imgsrcV;
   	 			else
		   	 		echo $res=$imgsrcX;
		   	 $permissionsArray[$myRecord[PGroupName]][$myRecord[viewGroups]]=$res;
   	 		?>
   	 	</td>
   	 	<td >
   	 	   	 <?php if ($myRecord[editGroups])
   	 					echo $res=$imgsrcV;
   	 			else
		   	 		echo $res=$imgsrcX;
		   	 $permissionsArray[$myRecord[PGroupName]][$myRecord[editGroups]]=$res;
   	 		?>
   	 	</td>
   	 	<td >
   	 	   	 <?php if ($myRecord[viewPermissions])
   	 					echo $res=$imgsrcV;
   	 			else
		   	 		echo $res=$imgsrcX;
		   	 $permissionsArray[$myRecord[PGroupName]][$myRecord[viewPermissions]]=$res;
   	 		?>
   	 	</td>
   	 	<td >
   	 	   	 <?php if ($myRecord[editPermissions])
   	 					echo $res=$imgsrcV;
   	 			else
		   	 		echo $res=$imgsrcX;
		   	 $permissionsArray[$myRecord[PGroupName]][$myRecord[editPermissions]]=$res;
   	 		?>
   	 	</td>
   	 	<td >
   	   	   	 <?php if ($myRecord[viewAllUsers])
   	 					echo $res=$imgsrcV;
   	 			else
		   	 		echo $res=$imgsrcX;
		   	 $permissionsArray[$myRecord[PGroupName]][$myRecord[viewAllUsers]]=$res;
   	 		?>
   	 	</td>
   	 	<td >
   	 	   	<?php if ($myRecord[sendMessageToGroup])
   	 					echo $res=$imgsrcV;
   	 			else
		   	 		echo $res=$imgsrcX;
		   	 $permissionsArray[$myRecord[PGroupName]][$myRecord[sendMessageToGroup]]=$res;
   	 		?>
   	 	</td>
   	 	<td >
   	 	   	<?php if ($myRecord[sendMessageToAll])
   	 					echo $res=$imgsrcV;
   	 			else
		   	 		echo $res=$imgsrcX;
		   	 $permissionsArray[$myRecord[PGroupName]][$myRecord[sendMessageToAll]]=$res;
   	 		?>
   	 	</td>
   	 	<td >
   	   	  	<?php if ($myRecord[viewAttendecy])
   	 					echo $res=$imgsrcV;
   	 			else
		   	 		echo $res=$imgsrcX;
		   	 $permissionsArray[$myRecord[PGroupName]][$myRecord[viewAttendecy]]=$res;
   	 		?>
   	 	</td>
   	 	<td >
      	   	<?php if ($myRecord[editAttendecy])
   	 					echo $res=$imgsrcV;
   	 			else
		   	 		echo $res=$imgsrcX;
		   	 $permissionsArray[$myRecord[PGroupName]][$myRecord[editAttendecy]]=$res;
   	 		?>
   	 	</td>
   	 	<td >
         	<?php if ($myRecord[viewInstructorsFolder])
   	 					echo $res=$imgsrcV;
   	 			else
		   	 		echo $res=$imgsrcX;
		   	 $permissionsArray[$myRecord[PGroupName]][$myRecord[viewInstructorsFolder]]=$res;
   	 		?>
   	 	</td>
   	 	<td >
         	<?php if ($myRecord[editInstructorsFolder])
   	 					echo $res=$imgsrcV;
   	 			else
		   	 		echo $res=$imgsrcX;
		   	 $permissionsArray[$myRecord[PGroupName]][$myRecord[editInstructorsFolder]]=$res;
   	 		?>
   	 	</td>
   	 <td >
         	<?php if ($myRecord[viewNavalCenters])
   	 					echo $res=$imgsrcV;
   	 			else
		   	 		echo $res=$imgsrcX;
		   	 $permissionsArray[$myRecord[PGroupName]][$myRecord[viewNavalCenters]]=$res;
   	 		?>
   	 	</td>
   	 	<td >
         	<?php if ($myRecord[editNavalCenters])
   	 					echo $res=$imgsrcV;
   	 			else
		   	 		echo $res=$imgsrcX;
		   	 $permissionsArray[$myRecord[PGroupName]][$myRecord[editNavalCenters]]=$res;
   	 		?>
   	 	</td>
   	 	<td >
         	<?php if ($myRecord[editGames])
   	 					echo $res=$imgsrcV;
   	 			else
		   	 		echo $res=$imgsrcX;
		   	 $permissionsArray[$myRecord[PGroupName]][$myRecord[editGames]]=$res;
   	 		?>
   	 	</td>
   	 		<td >
         	<?php if ($myRecord[viewForum])
   	 					echo $res=$imgsrcV;
   	 			else
		   	 		echo $res=$imgsrcX;
		   	 $permissionsArray[$myRecord[PGroupName]][$myRecord[editGames]]=$res;
   	 		?>
   	 	</td>
   	 		<td >
         	<?php if ($myRecord[editForum])
   	 					echo $res=$imgsrcV;
   	 			else
		   	 		echo $res=$imgsrcX;
		   	 $permissionsArray[$myRecord[PGroupName]][$myRecord[editGames]]=$res;
   	 		?>
   	 	</td>
     </tr>
<?php	} ?>
	 	<!--  ADD A NEW PERMISSION GROUP  -->
	 	<tr CLASS="ADD_NEW_PERMISSIONS">
	 		<td colspan="18">הוספת קבוצה חדשה</td>
	 	</tr>
	 	<tr>
     	<td colspan="2">
     		<input type = "text" name="PGroupName" width="100%">
   	 	</td>
   	 	<td >
   	 		<input type = "checkbox" name="viewUsers"   value="viewUsers">
   	 	</td>
   	 	<td >
   	 		<input type = "checkbox" name="editUsers"   value="editUsers">
   	 	</td>
   	 	<td >
   	 		<input type = "checkbox" name="viewGroups"   value="viewGroups">
   	 	</td>
   	 	<td >
   	 		<input type = "checkbox" name="editGroups"   value="editGroups">
   	 	</td>
   	 	<td >
   	 	   	 <input type = "checkbox" name="viewPermissions"   value="viewPermissions">
   	 	</td>
   	 	<td >
   	 	   	 <input type = "checkbox" name="editPermissions"   value="editPermissions">
   	 	</td>
   	 	<td >
   	 	   	 <input type = "checkbox" name="viewAllUsers"   value="viewAllUsers">
   	 	</td>
   	 	<td >
   	 		<input type = "checkbox" name="sendMessageToGroup"   value="sendMessageToGroup">
   	 	</td>
   	 	<td >
   	 		<input type = "checkbox" name="sendMessageToAll"   value="sendMessageToAll">
   	 	</td>
   	 	<td >
   	 	   	 <input type = "checkbox" name="viewAttendecy"   value="viewAttendecy">
   	 	</td>
   	 	<td >
   	 	   	 <input type = "checkbox" name="editAttendecy"   value="editAttendecy">
   	 	</td>
   	 	<td >
   	 		<input type = "checkbox" name="viewInstructorsFolder"   value="viewInstructorsFolder">
   	 	</td>
   	 	<td >
   	 		<input type = "checkbox" name="editInstructorsFolder"   value="editInstructorsFolder">
   	 	</td>
   	 	<td >
   	 		<input type = "checkbox" name="viewNavalCenters"   value="viewNavalCenters">
   	 	</td>
   	 	<td >
   	 		<input type = "checkbox" name="editNavalCenters"   value="editNavalCenters">
   	 	</td>
   	 	<td >
   	 		<input type = "checkbox" name="editGames"   value="editGames">
   	 	</td>
   	 	<td >
   	 		<input type = "checkbox" name="viewForum"   value="viewForum">
   	 	</td>
   	 	<td >
   	 		<input type = "checkbox" name="editForum"   value="editForum">
   	 	</td>
     </tr>
<!--  Add a new permision group to database -->
</table>	
	
	 <table CLASS="LIST_BUTTONS">		
	 <tr>
	 	<td>   <input type = "submit" name="addPermission" value="   הוסף    ">  </td>
	    <td>   <input type = "submit" name="deletePermission" value="   מחק   ">    </td>
	 </tr>
</table>
<?php

} //endFunction
/******************************************************************************************/
if (isset($_POST['submit']))
	if (isset($errors))
	{
		foreach ($errors as $key=>$val)
		echo "<br>$val";
		unset($errors);
	}
?>

</body>
</html>
