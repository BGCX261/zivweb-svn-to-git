<?php
	/************************************
	 * Discription:
	 * This is the main page. divided into three (title, side bar, information)
	 * int the begining of the page we check if the user is really logged in.
	 ***********************************/
	require_once("UserClass.php"); //include the user class		
	require_once 'Definitions.php';

	//$refererPage = "login.php";
	$SelfrefererPage="entryPage_TABLE.php";
	global $entryPagesDirectory;
	
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
	 	<table class="mainFrame" border="1" width="99%" style="height:100%;"  align="center">
	 		<tr> <!-- BANNER -->
	 			<td colspan="3" width="100%">
	 				<div id="banner"> 
	 					<?php include($entryPagesDirectory."banner.php");?> 
	 				</div>
	 			</td>
	 		</tr>
	 		<tr> <!-- MENU and Information IFRAME -->
	 			<td width="15%" style="height:100%" class="USER_MENU"> <!-- MENU -->
	 				<div id="userMenu">
	 					<?php include($entryPagesDirectory."EntryMenu.php");?>
	 				</div>
	 				<!-- EMBED LOGIN UNDER THE MENUS -->
	 				<div>
	 					<?php //include("login.php"); ?>
	 				</div> 
	 			</td>
	 			<td width="100%"> <!-- IFRAME -->
	 				<div id="dataFrame" class="dataFrame">
	 					<IFRAME src ="<?php echo $entryPagesDirectory ?>Wellcom.html" width="100%" height="700px" name="DATA_IFRAME" id="test"> </IFRAME>
	 					<!-- TODO check the option of inclue insted of IFRAME -->
	 					<?php //include("datapage.php");?>
	 				</div> 
	 			</td>
	 			<!--  NEWS DATA -->
	 			<td width="150" style=vertical-align:top;border:thin;>
	 				<table>
		 				<tr>
		 					<td width="150" height="22" style=text-align:right;color:white;font-weight:bold;   background="img/newsBack.gif">חדשות</td>
		 				</tr>
		 				<tr>
		 					<td style="padding-right:10px;background-color:#F0F8FF;border-color:black;">
			 					<marquee behavior="scroll" direction="up" scrollamount="2" scrolldelay="100" height="200" width="150" onMouseOver="this.stop();" onMouseOut="this.start();"><?php getMesseges(3);?>	</marquee>
		 					</td>
		 				</tr>	
	 				</table>
	 			</td>
	 		</tr>
	 	</table>
	 </body>
</html>
