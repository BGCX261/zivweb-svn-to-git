<?php
require_once("UserClass.php");
require_once("generalFunctions.php");
session_start();
$refererPage = "mainMenusPage_TABLE.php";
$SelfrefererPage = "manageMessages.php";
include("validateSession.php"); //validate session
$loggedUser = $_SESSION['user'];
//SET PERMISSIONS
	$allowEditing = $loggedUser->checkIfAllowed("sendMessageToGroup");
	$allowViewAll = $loggedUser->checkIfAllowed("sendMessageToAll");

	if (!$loggedUser->checkIfAllowed("$allowEditing"))
	{
		$redirect="Location:restricted2.html";
		echo header($redirect);
	}
/////// END OF VALIDATIONS ///////////////

$sql ="SELECT * FROM activityGroups";
// DELETE GROUPS
update($loggedUser);

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
	<!--     Group  Messages    -->
	<FORM method="POST" action="manageMessages.php" name="groupMessageForm">		
			<?php if ($allowViewAll) {
			?>
			<div class="TITLE">
		
			בחר קבוצה:
			<br>
			</div>
			<select name="groupID" onChange="javascript:GrouplistSubmitMSG()">
				<?php getGroupsList($_POST[groupID]); ?>
			</select>
 		
 			
			<input type="hidden" name="listSubmit" value="0">
			<?php } //end of view all?> 
			<!--  SHOW THE MESSAGE TEXT AREA OF THE GROUP MESSAGES -->	
			<?php if ($allowViewAll) 
					$groupID = $_POST[groupID];
			else $groupID=$loggedUser->getmemberOfGroup();
			?>
					<center>
					<textarea name="messeges_area" rows="10" cols="50">
<?php getMesseges($groupID,false,false) ?>
					</textarea> 
					</center>
			
			 <table class="LIST_BUTTONS">
			<tr>
				<td>
					<input name="source" type="hidden" value="groupMessage">
					<INPUT TYPE="submit" name="update_message" value="  עדכן הודעה ">
				</td>
				
			</tr>
			</table>
<?php if ($allowViewAll) {?>
 	</FORM>
 		<!--  Message from the menegment -->
 	הודעות מההנהלה לכול המשתמשים<br>
	<FORM method="POST" action="manageMessages.php" >		
			<?php 	
		//	while ($myRecord = mysql_fetch_array($result))
			{
			?>	
					<center>
					<textarea name="messeges_area" rows="10" cols="50">
<?php getMesseges(1,false,false);?>
					</textarea> 
					</center>
			<?php
			}	
			?>
			 <table class="LIST_BUTTONS">
			<tr>
				
				<td>
					<input name="source" type="hidden" value="mngMsgs">
					<INPUT TYPE="submit" name="update_message" value="  עדכן הודעה ">
				</td>
				
			</tr>
			</table>
 	</FORM>
 		הודעות לסגל בלבד<br>
 		<!--  Messages not for chanichim -->
	<FORM method="POST" action="manageMessages.php" >		
			<?php 	
		//	while ($myRecord = mysql_fetch_array($result))
			{
			?>	
					<center>
					<textarea name="messeges_area" rows="10" cols="50">
<?php getMesseges(2,false,false);?>
					</textarea> 
					</center>
			<?php
			}	
			?>
			 <table class="LIST_BUTTONS">
			<tr>
				<td>
					<INPUT name="source" type="hidden" value="notKids">
					<INPUT TYPE="submit" name="update_message" value="  עדכן הודעה ">
				</td>
				
			</tr>
			</table>
 	</FORM>
 	
 	 		חדשות לאתר<br>
 		<!--  News for all site -->
	<FORM method="POST" action="manageMessages.php" >		
			<?php 	
		//	while ($myRecord = mysql_fetch_array($result))
			{
			?>	
					<center>
					<textarea name="messeges_area" rows="10" cols="50">
<?php getMesseges(3,false,false);?>
					</textarea> 
					</center>
			<?php
			}	
			?>
			 <table class="LIST_BUTTONS">
			<tr>
				<td>
					<INPUT name="source" type="hidden" value="newsUpdate">
					<INPUT TYPE="submit" name="update_message" value="  עדכן הודעה ">
				</td>
				
			</tr>
			</table>
 	</FORM>
<?php } //end of view all?> 
 	<?php
	} ?>
</body>
<?php
function update($loggedUser)
{
	
if (isset($_POST[messeges_area])&& !$_POST[listSubmit])
	{
/******צריך להוסיף בדיקות על הקלט!****/
		switch ($_POST[source])
		{
			case "groupMessage":
								if (isset($_POST[groupID]))
								{
									$updateGroupId = $_POST[groupID];
								}
								else
									$updateGroupId = $loggedUser->getmemberOfGroup();
									
								break;
			case "mngMsgs":
								$updateGroupId=1;
													
								break;
			case "notKids":
								$updateGroupId=2;
								break;
								
			case "newsUpdate":
								$updateGroupId=3;
								break;					
				
		
		}
		//$sql ="INSERT INTO guideFolderFiles(filename,link,type,date) values('".$_POST[dispalyName]."','".$destinationDir.$UserFileName ."','".$_POST[type] ."','".$dateString ."')";
		//$sql = "UPDATE messeges SET Message='".$_POST[messeges_area]."\n <small><i>".date("j/n/y G:i")."</i></small>' WHERE GID='".$updateGroupId."'";
		$sql = "UPDATE messeges SET Message='<div class=MARQ_DATE><small><b>".date("j/n/y G:i").":</b></small> ".$_POST[messeges_area]."</div>' WHERE GID='".$updateGroupId."'";
		executeQuary($sql);
		if (mysql_affected_rows() == 0) 	//date was not inserted into DB
			{
				$sql ="INSERT INTO messeges(GID,Message) values('".$updateGroupId."','<div class=MARQ_DATE><small><b>".date("j/n/y G:i").":</b></small> ".$_POST[messeges_area]."</div>')";					
				//$sql ="INSERT INTO messeges(GID,Message) values('".$updateGroupId."','".$_POST[messeges_area]."\n <small><i>".date("j/n/y G:i")."</i></small>')";
					executeQuary($sql);
			}
	}
}
?>