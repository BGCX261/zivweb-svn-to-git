<?php
require_once("UserClass.php");
require_once("generalFunctions.php");
session_start();
$refererPage = "mainMenusPage_TABLE.php";
$SelfrefererPage ="forumMainPage.php";

include("validateSession.php"); //validate session

//RELEVENT SQL TABLE: PID, subject, text, commenting
//SET PERMISSIONS
$allowEditing = $loggedUser->checkIfAllowed("editForum");
//	$allowViewAll = $loggedUser->checkIfAllowed("viewAllUsers");
	if (!$loggedUser->checkIfAllowed("viewForum"))
	{
		$redirect="Location:restricted2.html";
		echo header($redirect);
	}
/////// END OF VALIDATIONS ///////////////
deleteForumItems();
addNewSubject();
?>
<html> 
	<style type="text/css">  
	    @import url(zivStyle.css);    
	</style>
<head>
	<script language="javascript" src="javascripts/javaScriptFunctions.js"></script>
</head>
<body>
	<hr>  
	<form action="forumMainPage.php" method="POST" name="FORUM_LIST_FORM">
	
		<?php 
			if (isset($_POST[getForumTopic])||isset($_POST[commenting]))
				{
					if (isset($_POST[commenting]))
					{
						$_POST[getForumTopic]=	$_POST[commenting];
					}
					?>
					<input type="hidden" name="deleteItem" value="-1">
					<input type="hidden" name="deleteItemCommenting" value="-1">
					<?php
					displaySelected($allowEditing);
				}
			else	
				echo displayTopics() 
		?>
	</form>
	<hr>
		<?php 
			if (isset($_POST[getForumTopic]))
				echo "הוספת תגובה חדשה";
			else	
				echo "הוספת נושא חדש" 
		?>

	<form method="POST" action="forumMainPage.php" name="newSubject">
	<?php 
		if (isset($_POST[getForumTopic]))
		{		
	?>
		<input type="hidden" value="<?php echo $_POST[getForumTopic] ?>" name="commenting">
	<?php
	}
	?>
	<table>
		<tr>
			<td>
				נושא:
			</td>	
			<td width="100%">
				<textarea rows="1" cols="70" name="subject"></textarea>
			</td>
		</tr>
		<tr>
			<td colspan="2">
			<textarea rows="5" cols="70" name="text"></textarea>
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" value="<?php 
												if (isset($_POST[getForumTopic]))
													echo "הוספת תגובה";
												else	
												echo "הוספת נושא חדש" 
											?>" name="<?php 
												if (isset($_POST[getForumTopic]))
													echo "newComment";
												else	
												echo "newSubject" 
											?>">
			</td>
			<td>
				<input type="reset" value=" נקה ">
			</td>
		</tr>
	</table>
	</form>
	
		
</body>
 
<!--  PHP FUNCTIONS  -->
<?php
function addNewSubject()
{
	global $loggedUser;
	if (!isset($_POST[newSubject])&&!isset($_POST[newComment])) /*if there is no new subject to add*/
		return;
	if ($_POST[subject]=="") //empty subject
	{
		return;
	}
	if (isset($_POST[commenting]))
		$commenting=$_POST[commenting];
	else
		$commenting=0;
	$sql = "INSERT INTO forum (subject,text,user,date,commenting) values ('$_POST[subject]','$_POST[text]','".$loggedUser->getUname()."','".date("j/n/y, G:i")."','$commenting')";
	executeQuary($sql);
}
function displayTopics()
{
	$sql = "SELECT * FROM forum WHERE commenting='0'";
	$result = executeQuary($sql);
	$forumTopics = "<input type=\"hidden\" name=\"getForumTopic\" value=\"0\">"; 
	$forumTopics .= "<TABLE CLASS=\"FORUM_TOPICS\">";
	$forumTopics.="<tr>";
				$forumTopics.="<td CLASS=\"FORUM_TOPICS_HEADER\">";
					$forumTopics.="נושא";
				$forumTopics.="</td>";
				$forumTopics.="<td CLASS=\"FORUM_TOPICS_HEADER\">";
					$forumTopics.="נכתב ע\"י";
				$forumTopics.="</td>";
				$forumTopics.="<td CLASS=\"FORUM_TOPICS_HEADER\">";
					$forumTopics.="בתאריך";
				$forumTopics.="</td>";
	$forumTopics.="</tr>";
	while ($myRecord = mysql_fetch_array($result))
		{			
			$forumTopics.="<tr>";
				$forumTopics.="<td CLASS=\"FORUM_TOPICS\">";
					$forumTopics.="<a CLASS=\"FORUM_TOPICS\" href=\"javascript:SubjectSubmit(".$myRecord[PID].")\">";
					$forumTopics.=$myRecord[subject];
					$forumTopics.="</a>";
				$forumTopics.="</td>";
				$forumTopics.="<td CLASS=\"FORUM_TOPICS\">";
					$forumTopics.=$myRecord[user];
				$forumTopics.="</td>";
				$forumTopics.="<td CLASS=\"FORUM_TOPICS\">";
					$forumTopics.=$myRecord[date];
				$forumTopics.="</td>";
			$forumTopics.="</tr>";
		}
	$forumTopics.="</TABLE>";
	return $forumTopics;
}
function displaySelected($allowEditing=false)
{
	
	$sql = "SELECT * FROM forum WHERE PID='".$_POST[getForumTopic]."' OR commenting='".$_POST[getForumTopic]."' ORDER BY PID";
	$result = executeQuary($sql);
	
	?>
	<input type="submit" value="חזור">
	
	<TABLE class="FORUM_TOPIC_DISPLAY"> <?php
	while ($myRecord = mysql_fetch_array($result))
		{	
			if (!isset($class))
				$class = "FORUM_SUBJECT";
			else
				$class = "FORUM_COMMENT";
			?>
			<tr>
				<td class="<?php echo $class ?>">
					<?php echo $myRecord[subject]." - <b>".$myRecord[user]."</b>"?>	
				</td>
				<td class="<?php echo $class ?>_DATE">
					<?php echo $myRecord[date]?>
					
					<?php if($allowEditing) {?>
						<input type="submit" value="מחק" name="deleteForumItem" onmouseup="javascript:forumDelete(<?php echo $myRecord[PID]?>,<?php echo $myRecord[commenting]?>)">
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td colspan="2" class="<?php echo $class ?>_TEXT">
					<?php  echo $myRecord[text]?>
				</td>
			</tr>
			<?php
		}
	?></TABLE> 
	<input type="submit" value="חזור">
	<?php
}

function deleteForumItems()
{
	if (!isset($_POST[deleteItem]))
		return;
	if ($_POST[deleteItemCommenting]==0)
		$deleteAllComments=" OR commenting=$_POST[deleteItem]";
	$sql = "DELETE FROM forum WHERE PID='$_POST[deleteItem]'$deleteAllComments";
	executeQuary($sql);	
}
?>
