<?php
require_once("UserClass.php");
require_once("generalFunctions.php");
session_start();
$refererPage = "mainMenusPage_TABLE.php";
$SelfrefererPage ="manageUsers.php";

include("validateSession.php"); //validate session

	
//SET PERMISSIONS
	$allowEditing = $loggedUser->checkIfAllowed("editUsers");
	$allowViewAll = $loggedUser->checkIfAllowed("viewAllUsers");
	if (!$loggedUser->checkIfAllowed("viewUsers"))
	{
		$redirect="Location:restricted2.html";
		echo header($redirect);
	}
/////// END OF VALIDATIONS ///////////////
$sqlEndNotApproved = " Approved='0'";
$sqlEndApproved = " Approved='1'";

$sqlSortByPermission="";
$sqlSortByGroup ="";
/*
 * RETHINKING OF THE SQL QUARY IN THIS PAGE
 SELECT u.*,p.PID,g.SID FROM users u, usesrpermissionsgroups p,users_activitygroups g  WHERE u.Username=p.Username and p.Username=g.Username
** Users without permission :
* SELECT distinct u.username FROM users u where u.Username not in (SELECT u1.Username FROM usesrpermissionsgroups u1)
** Users without group :
* * SELECT distinct u.username FROM users u where u.Username not in (SELECT u1.Username FROM users_activitygroups u1)

 */
if ($allowViewAll) //set sql string to view all users 
{
	if (!isset($_POST[sortByPermission]) && !isset($_POST[sortByGroup]))
	{
		$sqlSTART ="SELECT * FROM users ";
		$sqlEndNotApproved = "WHERE ".$sqlEndNotApproved;
		$sqlEndApproved = "WHERE ".$sqlEndApproved;
	}
	else
	{//ARRANGE THE SQL STRING FOR DIFFERENT SORTINGS
		$sqlEndNotApproved = " and ".$sqlEndNotApproved;
		$sqlEndApproved = " and ".$sqlEndApproved;
		$sqlSortByPermission = "";
		$sqlSortByGroup = "";
		if (isset($_POST[sortByPermission]))
		{
			$sqlSTART = "SELECT distinct * FROM users u";
			if ($_POST[PID]==0) //if the selected permission is HANICHIM
			{
				$sqlSortByPermission = $sqlSortByPermission." where u.Username not in (SELECT u1.Username FROM usesrpermissionsgroups u1)";
				
			}
			else
			{
				$sqlSTART= $sqlSTART. " ,usesrpermissionsgroups p  ";
				$sqlSortByPermission=" WHERE u.userName = p.UserName and p.PID='".$_POST[PID]."'";
				//$sqlSTART = $sqlSTART.$sqlSortByPermission;
			}

		}
		
		if (isset($_POST[sortByGroup])) //arrange the sql String to sort by 
		{
			if (isset($_POST[sortByPermission])) //if sorting also by permissions
			{
				if ($_POST[GID]==0) //if the the selected group is No Group
				{
					if ($_POST[PID]==0) //and if the selected permission is HANICHIM
					{
						$sqlSortByPermission = "";
						$sqlSTART = "SELECT distinct * FROM users u where u.Username not in (SELECT u1.Username FROM users_activitygroups u1)";
						$sqlSTART = $sqlSTART. " and  u.username not in (SELECT u1.Username FROM usesrpermissionsgroups u1)";
					}
					else
					{
						$sqlSortByGroup = "u.Username not in (SELECT u1.Username FROM users_activitygroups u1)";
						//$sqlSTART = "SELECT distinct * FROM users u where u.Username not in (SELECT u1.Username FROM users_activitygroups u1)";
						$sqlSortByGroup = " and ".$sqlSortByGroup;
					}
				}
				else // if there are both a group and the selection is not for Chanichim
				{
					
					$sqlSTART = $sqlSTART." ,users_activitygroups ua";
					$sqlSortByGroup = " and ua.Username = u.userName and ua.SID='".$_POST[GID]."'";
				}
			} // SORTING ONLY BY GROUPS
			else
			{
			$sqlSTART = "SELECT distinct * FROM users u";
			if ($_POST[GID]==0) //if the the selected group is No Group
				{
					$sqlSortByGroup = " where u.Username not in (SELECT u1.Username FROM users_activitygroups u1)";
				}
				else // Sort by group and there selection is a group and not (no group)
				{
					$sqlSTART = $sqlSTART." ,users_activitygroups ua";
					$sqlSortByGroup = " where ua.Username = u.userName and ua.SID='".$_POST[GID]."'"; 
				}
			}
		}//end of arrange by groupID
		$sqlSTART = $sqlSTART.	$sqlSortByPermission .$sqlSortByGroup;
	}

}
else //set sql string to see only the logged user team members users
{
	$sqlSTART="SELECT u.* FROM users u,users_activitygroups a where u.username=a.username and a.sid='".$loggedUser->getmemberOfGroup()."'";
	$sqlEndNotApproved="and ".$sqlEndNotApproved;
	$sqlEndApproved="and ".$sqlEndApproved;
}
$sql = $sqlSTART.$sqlEndNotApproved;

$selectUsersRadioButton["unregistred"]="CHECKED";
		
/***************************************************************************************************************************/
/* 
*  Display Options Setup 
*/
//	echo "<div dir=ltr>";
//	echo "<HR><HR><center>";
//	print_r($_POST);
//	echo "<HR><HR></center>";
//	echo "</div>";
/*adding a new user*/
if (isset($_POST[addUser])&& !isset($_POST[userUpdeateCancel])) 
{
	$sql = "INSERT INTO users (Username,Approved) VALUES('".$_POST[uname]."','1')";
	executeQuary($sql);
	/*MAKE SURE THE USER WILL HAVE INITIAL PASSWORD 1234*/
	$_POST[resetPassword]=TRUE;
}

/*update an exsisting user or add inset the details in case of a new user*/
if (isset($_POST[userUpdateSave]))
{
		$userDetails = new User($displayUserInfo);
		$userDetails->updateUserData($_POST);
}
if (isset($_POST[resetPassword]))  //Reset a useres password
	{
	$resetedPassword=md5("1234");
	$sql= "UPDATE users SET password='".$resetedPassword."' where Username='".$_POST[uname]."'";
	executeQuary($sql);
	}
if (isset($_POST[unregistred]))
	{
		$selectUsersRadioButton["registred"]="";
		$selectUsersRadioButton["all"]="";
		switch($_POST[unregistred])
		{
			case "no": //$sql ="SELECT * FROM users WHERE Approved='1'";
						$sql = $sqlSTART.$sqlEndApproved;
						$selectUsersRadioButton["registred"]="CHECKED";
						$selectUsersRadioButton["unregistred"]="";
						break;
			case "yes": //$sql ="SELECT * FROM users WHERE Approved='0'";
						$sql = $sqlSTART.$sqlEndNotApproved;			
						$selectUsersRadioButton["unregistred"]="CHECKED";
						break;
			case "all": //$sql ="SELECT * FROM users";
						$sql = $sqlSTART;
						$selectUsersRadioButton["all"]="CHECKED";
						$selectUsersRadioButton["unregistred"]="";
						break;
		}
	}
/*
 * Update Users
 */
if (isset($_POST[newUserApproval]) && (count($_POST)>1) && (isset($_POST[delete_users])||isset($_POST[confirm])))
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
					$value = "Username='".$value."' OR ";
					$sqlString=$sqlString . $value;
					}
			}
		$sqlString[strripos($sqlString,"O")]=" ";
		$sqlString[strripos($sqlString,"R")]=" ";
		if (!isset($_POST[delete_users])) //ALOW USERS TO ACCESS THE SITE
			$sqlUpdateQuary = "UPDATE users SET Approved='1' WHERE ".$sqlString;
		else
			$sqlUpdateQuary = "delete FROM users  WHERE ".$sqlString;
			
			$result = executeQuary($sqlUpdateQuary);
	}
else
{
	if (isset($_POST[getUserInfo]))	
		{
		$displayUserInfo=$_POST[getUserInfo];
		}
}
?>
<html> 
	<style type="text/css">  
	    @import url(zivStyle.css);    
	</style>
<head>
	<script language="javascript" src="javascripts/javaScriptFunctions.js"></script>
</head>
<body>  
	<!-- CHOOSE WHO TO DISPLAY FROM THE USERS -->
	<form method="post" action="manageUsers.php">
		<input name="unregistred" type="radio" value="yes" <?php echo $selectUsersRadioButton["unregistred"]?>>
		משתמשים לא רשומים
		<input name="unregistred" type="radio" value="no"  <?php echo $selectUsersRadioButton["registred"]?>>
		משתמשים רשומים
		<input name="unregistred" type="radio" value="all" <?php echo $selectUsersRadioButton["all"]?>>
		כולם   
		<br>
		<?php
		if ($allowViewAll)
		{
		?>
		<div  id="addNewFileLayerTitle" onmousemove="javascript:LayerOnMouseOver(addNewFileLayerTitle)" onclick="javascript:showMenu(addNewFileLayer)">
			<img src="img/searchSymbol.jpg"> 		סינון מתקדם
		
		</div>
		<DIV id="addNewFileLayer">
		<br>
סנן על פי הרשאה
		<br>
			<input type="checkbox" name="sortByPermission" value="check">
			<select name="PID">
				<?php getPermissionList(); ?>
			</select>
		<br>
		
		סנן עפ"י קבוצה:
		<br>			
			<input type="checkbox" name="sortByGroup" value="check">
			<select name="GID">
				<?php getGroupsList(); ?>
			</select>
		<?php } ?>
		</DIV>
		<br>
		<input type="submit" value="  הצג  ">
	</form>
	<!-- DISPLAY THE USER LISTS -->
	<?php
	if (!isset($displayUserInfo))
	{
		$result = executeQuary($sql);
		
		if (mysql_num_rows($result)==0)
		{
			?>
			<div class="QUARY_RESULT_ERROR">
			אין משתמשים
			</div>
			<?php
		}

		else
		{ 
		
			?>
			<FORM method="POST" action="manageUsers.php" name="USERS_LIST_FORM" onsubmit="return confirmDelete()">
				<input type="hidden" name="newUserApproval" value="true">
				<input type="hidden" name="getUserInfo" value="">
				<table class=list border=1>
				<tr class="TABLE_HEADER">
						<td>בחירה</td>
						<td>שם משתמש</td>
						<td>שם פרטי	</td>
						<td>שם משפחה </td>
						<td>קבוצה</td>
						<td>קבוצת הרשאות</td>
						<td>תאריך לידה</td>
						<td>עיר מגורים</td>
						<td>רחוב</td>
						<td>מס בית</td>
						<td>טלפון נייד</td>
						<td>טלפון בבית</td>
						<td>דוא"ל</td>
						<td>משתמש מאושר</td>
					</tr>
					<?php 			
					while ($myRecord = mysql_fetch_array($result))
					{
					?>	
					<tr>
						<td><INPUT  NAME="<?php echo $myRecord[Username];?>" TYPE="checkbox" value="<?php echo $myRecord[Username];?>"> </td>
						<td>
							<a href="javascript:UserSubmit(<?php echo "'".$myRecord[Username]."'";?>)"><?php echo $myRecord[Username];?></a> 
						</td>
						<td><?php echo $myRecord[FirstName];?> </td>
						<td><?php echo $myRecord[LastName];?> </td>
						<td>
							<?php
							getUserGroup($myRecord[Username],true); //From generalFunctions.php //TODO IMPROVE QUARY
							 ?>
							</td>
						<td><?php getPermissionID($myRecord[Username],false,true);?></td>
						<td><?php echo $myRecord[DayOfBirth]."/".$myRecord[MonthOfBirth]."/".$myRecord[YearOfBirth];?> </td>
						<td><?php echo $myRecord[City];?> </td>
						<td><?php echo $myRecord[Street];?> </td>
						<td><?php echo $myRecord[HouseNumber];?> </td>
						<td><?php echo $myRecord[CellPhone];?> </td>
						<td><?php echo $myRecord[Phone];?> </td>
						<td><?php echo $myRecord[Email];?> </td>
						<td><?php 	if ($myRecord[Approved]==1)
										echo "כן";
									else echo "לא";
							?> 
						</td>
					</tr>	
					<?php
					}	
					?>
					 </table>
					 <table class="LIST_BUTTONS">
					<tr>
						<td><INPUT TYPE="submit" name="confirm" value="אשר"></td>
						<td><INPUT TYPE="submit" name="delete_users" value="מחק"></td>
						<td><INPUT TYPE="submit" name="add_user" value="הוסף משתמש"></td>
						<td><INPUT TYPE="reset" value="נקה"></td>
					</tr>
					</table>
		 	</FORM>
		 	<?php
		} 
	}
	else 
	{	//Display selected user information
			if (isset($_POST[add_user]))
				$userDetails=new User();
			else
				$userDetails = new User($displayUserInfo);
			?>
			<form method="POST" action="manageUsers.php" name="USER_DETAILS" onsubmit="return confirmDelete()">
				<?php 
				if (isset($_POST[editUserData])&&$allowEditing||isset($_POST[add_user]))
				{
					$userDetails->getUserInfoHTML($loggedUser->getPermissionID());  //allow the editing to be done by the logged user permission
				}
				else
					$userDetails->getUserInfoHTML(); ?>
			</form>
			<?php
	}
?>
</body>

