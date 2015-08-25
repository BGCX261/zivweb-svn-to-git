<?php
/*FileName: validateSession
 *Discription: this file is added at the top of each page in the website
 * 				and adds the ability to validate if the user is genuine or
 * 				the session was hijacked
 *Autors: Amit Eitan
 *Date Modified: 
 */
	global $refererSiteUrl;
	if ($_SESSION['user']) //check if session variable exsists
		$loggedUser=$_SESSION['user'];
	else
	{
	$redirect="Location:restricted.html";
	echo header($redirect);
	}
	
	if($loggedUser->login()) //check if logged in
	{
	$redirect="Location:restricted.html";
	echo header($redirect);
	}
	
	if(!$loggedUser->approved()) //Check if Approved allready
	{
	$redirect="Location:restricted.html";
	echo header($redirect);
	}
//	echo "<hr>".$_SERVER["HTTP_REFERER"]."<hr>";
//	if ($_SERVER["HTTP_REFERER"] === "http://".$refererSiteUrl."/".$refererPage || $_SERVER["HTTP_REFERER"] === "http://".$refererSiteUrl."/".$SelfrefererPage || !isset($_SERVER["HTTP_REFERER"]))
//	{
//		
//	}
//	else
//	{
//			$redirect="Location:restricted.html";
//			echo header($redirect);
//	}

//ECHO FOR REFERE STUFF
//echo "<hr>";
//echo $_SERVER["HTTP_REFERER"];
//echo "<hr>";
//echo "<hr>http://".$refererSiteUrl."/".$refererPage."<HR>";
//echo "<hr>";
?>