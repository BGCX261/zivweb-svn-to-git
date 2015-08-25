<?php
	/************************************
	 * Discription:
	 * This is the main page. divided into three (title, side bar, information)
	 * int the begining of the page we check if the user is really logged in.
	 ***********************************/
	require_once("UserClass.php"); //include the user class		
	session_start();

	$refererPage = "login.php";
	$SelfrefererPage="mainMenusPage_TABLE.php";
	if (isset($_POST[logoutPlease]))
	{
		session_destroy();
		$redirect="Location:".$index_page;
		echo header($redirect);
	}
		
	include("validateSession.php"); //validate session
	

	if (!isset($_POST[logoutPlease]))
	{

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html> 
	<style type="text/css">  
	    @import url(zivStyle.css); 
	</style>  
		<script language="javascript" src="javascripts/javaScriptFunctions.js"></script>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1255">
		<title>זיו נעורים</title>
	</head>
	 <body>	
	 
	 	<table class="mainFrame" border="1" width="99%" style="height:100%;" align="center">
	 		<tr> <!-- BANNER -->
	 			<td colspan="2" width="100%">
	 				<div id="banner"> 
	 					<?php include("banner.php");?> 
	 				</div>
	 			</td>
	 		</tr>
	 		<tr > <!-- MENU and Information IFRAME -->
	 			<td width="12%" style="height:100%" class="USER_MENU"> <!-- MENU -->
	 				<div id="userMenu">
	 					<?php include("userMenu.php");?>
	 				</div> 
	 			</td>
	 			<td width="100%"> <!-- IFRAME -->
	 				<div id="dataFrame" class="dataFrame">
	 					<IFRAME src ="mainPage.php" width="100%" height="700px" name="DATA_IFRAME" id="test"> </IFRAME>
	 					<!-- TODO check the option of inclue insted of IFRAME -->
	 					<?php //include("datapage.php");?>
	 				</div> 
	 			</td>
	 		</tr>
	 	</table>

	 </body>
</html>
<?
//	if (isset($_POST[logoutPlease]))
	//{
		//session_destroy();
	}
?>
