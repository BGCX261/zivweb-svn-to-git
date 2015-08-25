<?php
require_once("UserClass.php");
require_once("dataValidation.php");
session_start();
$refererPage = "mainMenusPage_TABLE.php";
$SelfrefererPage = "userDetailes.php";
include("validateSession.php"); //validate session


if (isset($_POST[userUpdateSave]))
{
	$loggedUser->updateUserData($_POST);
}
changePassword($loggedUser);
$loggedUser->refresh();
?>
<html> 
	<style type="text/css">  
	    @import url(zivStyle.css);
	</style>
	<script language="javascript" src="javascripts/javaScriptFunctions.js"></script>
	<head></head>
	<body> 
				<form method="POST" action="userDetailes.php" name="USER_DETAILS">
				<?php 
				if (isset($_POST[editUserData]))
				{
					$loggedUser->getUserInfoHTML(-1);  //allow the editing to be done only for updating data
				}
				else
					$loggedUser->getUserInfoHTML(false,true); ?>
				</form>
				<form method="POST" action="userDetailes.php" name="USER_DETAILS_PASSWORD_CHANGE">
				החלפת סיסמא
				<table>
				<tr> 
					<td>סיסמא ישנה</td>
					<td>
						<input type="password" name="oldPassWOrd" >
					</td>

				</tr>
				<tr>
					<td>סיסמא חדשה:</td>
						<td>
							<input type=password name=passwd  value=>
						</td>
				</tr>
				<tr>
					<td>הקש סיסמא חדשה שנית לאימות</td>
					<td>
						<input type=password name=passwdConf  value=>
					</td>
				</tr>
			</table>
		<input type=submit value="שנה סיסמא"></form>
	</body> 
</html> 
<?php
function changePassword($loggedUser)
{
	if (isset($_POST[oldPassWOrd]))
	{
		
		echo "<hr>";
		print_r($_POST);
		print_r($loggedUser);
		echo "<hr>";
		echo $loggedUser->getUname();
		echo "<hr>";

		
		if ($loggedUser->getPasswd()== md5($_POST[oldPassWOrd]))
		{
			if ($_POST["passwd"]==$_POST["passwdConf"])
			if(validate_pass1($_POST["passwd"]))
				{
				$hash_passwd=md5($_POST["passwd"]);
				}
			else
				{
					return FALSE;
				}
		$sql = "UPDATE users SET Password='".$hash_passwd."' Where Username='".$loggedUser->getUname()."'";
		printSqlQuary($sql);
		executeQuary($sql);
		}
		
	}
	
}
?>