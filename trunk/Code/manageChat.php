<?php
	require_once("UserClass.php"); //include the user class		
	$refererPage = "mainMenusPage_TABLE.php";
	session_start();
	
	if ($_SESSION['user']) //check if session variable exsists
			$loggedUser=$_SESSION['user'];
	else
		{
		$redirect="Location:restricted.html";
		echo header($redirect);
		}
	/*
	 * end of page validations
	 */	
	
	if (isset($_POST[newMessage]))
	{
		$msg = htmlspecialchars($_POST[newMessage],ENT_QUOTES);
		$sql = "INSERT INTO chatMessages(username,time,day,month,year,GID,message) values('".$loggedUser->getUname()."','0','0','0','0','".$loggedUser->getmemberOfGroup()."','".$msg."')";
		//$chatLines.="<HR>".$_POST[newMessage];
		executeQuary($sql);
	//	printSqlQuary($sql);
	}
	

	//if ($_POST[getMessages])
	{
		if (!isset($_SESSION[firstMessage]))//Set the first message of the session in chat
		{
			$sql = "SELECT MID FROM chatMessages Where GID='".$loggedUser->getmemberOfGroup()."' ORDER BY MID DESC LIMIT 1";
			$result = executeQuary($sql);
			$myRecord = mysql_fetch_array($result);
			$_SESSION[firstMessage] =  $myRecord[MID];
			//$chatLines.= $sql."<br>";	
		}
		$sql = "SELECT * FROM chatMessages Where GID='".$loggedUser->getmemberOfGroup()."' and MID>'".$_SESSION[firstMessage]."'" ;
		$result = executeQuary($sql);
		$chatLines .="<table>";
		while ($myRecord = mysql_fetch_array($result))
		{			
			//$chatLines .=  $myRecord[message]. "\n<br>" ;
			if ($loggedUser->getUname()==$myRecord[username])
				$colorClass="self";
			else
				$colorClass="others";
				
			
			$chatLines .=  "<tr><td class=\"$colorClass\" width=\"20%\">".$myRecord[username].":</td><td class=\"$colorClass\">".$myRecord[message]. "</td></tr>" ;
		
		}
		$chatLines .="</table>";
		echo $chatLines;
	}
?>