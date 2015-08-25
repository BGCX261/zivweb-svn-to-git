<?php
require_once("UserClass.php");
require_once("generalFunctions.php");
session_start();
$refererPage = "mainMenusPage_TABLE.php";
$SelfrefererPage = "gaming.php";
include("validateSession.php"); //validate session
//SET PERMISSIONS
$allowEditing = $loggedUser->checkIfAllowed("editGames");
/////// END OF VALIDATIONS ///////////////
addGame();			/** need to test why duplicate games are entered */
deleteGames(); 
?>
<html> 
	<style type="text/css">  
	    @import url(zivStyle.css);    
	</style>
	<script language="javascript" src="javascripts/javaScriptFunctions.js"></script>
	<head>
	</head>
	<body> 
	<FORM method="post" action="gaming.php" name="addGames">
	<?php 
	
	
	if (isset($_POST[help]))
		drawHelpPage();
	else 
		if (isset($_POST[displayGameId])&&(!isset($_POST[add_game]))&&(!isset($_POST[delete_games])))
			 drawGameMode($_POST[displayGameId]);
		else 
			drawGamesTable($allowEditing); 
	?>
	 	</form>
	</body> 
</html> 

<?php


function drawHelpPage()
{
	?>
	<table class="gameMode" align="center">
  <tr>
    <th class="gamesTd"><u>הוראות להוספת משחק חדש :</u><br><br></th>
  </tr>
  <tr>
    <td> 1) איתור משחק מתאים הניתן להוספה לאתר באמצעות צרוף של קוד EMBED,לדוגמא : <a href="http://www.ultimatearcade.com/downloads" target="blank">http://www.ultimatearcade.com</a><br><br></td>
  </tr>
  
    <tr>
    	<td>2) יש למלא בשדות המתאימים את שם המשחק ואת תיאור , מטרת המשחק: <br><br><img src="img/games_desc.JPG"></td>
  	</tr>
  	
  	 <tr>
    	<td>3) בשדה קוד יש להכניס את הקוד של המשחק כפי שניתן לקבל באתר הורדת המשחק, לדוגמא:<br><br><img src="img/Game_code.jpg"><br><br><img src="img/game_code_exmp.jpg"><br><br></td>
  	</tr>
  	
  	 <tr>
    	<td>4) בשדה לינק לתמונה יש למלא את הכתובת המלאה (URL) של התמונה, לדוגמא:  <a href="http://www.ultimatearcade.com/games/tribal-olympics-2/150x150.jpg" target="blank">http://www.ultimatearcade.com/games/tribal-olympics-2/150x150.jpg</a><br><br> לינק לתמונה ניתן לקבל ע"י לחיצה על התמונה בעזרת הכפתור הימני של העכבר ובחירת Properties ואז יש לשמור את ה URL<br><br><img src="img/game_link.jpg"><br><br></td>
  	</tr>
  	
  	<tr>
    	<td>5) לחץ על כפתור הוסף.<br><br></td>
  	</tr>
  	
  	<tr>
    	<td align="center"><INPUT TYPE="submit" name="return" value="     חזור     " title="לחץ כאן על מנת לחזור לתפריט המשחקים"><br><br></td>
  	</tr>
  
</table>
	<?php
}



function addGame()
{
/*עודד ששיניתי את המיקום של הקריאה לפונקציה הזו ע"מ שהיא תקרה לפני שמתחיל הציור של הדף
ועדכנתי את הגודל של הלינק בדאדטא בייס אבל נפל השרת בנתיים לא נראה לי שיש את הבעיה שתיארת*/
//	print_r($_POST);
	if (isset($_POST[add_game])&&($_POST["gameName"]!="")&&($_POST["gameDesc"]!="")&&($_POST["gameCode"]!=""))
	{
		/******צריך להוסיף בדיקות על הקלט!****/
		$sqlInsert ="INSERT INTO games(gamename,gameDescription,gamecode,imglink)";
		$sqlInsert.=" values('" . $_POST["gameName"]. "','"  .  $_POST["gameDesc"]. "','"  .  $_POST["gameCode"]."','".$_POST["gamePic"]."')";
//		printSqlQuary($sqlInsert);
		$result = executeQuary($sqlInsert);
		
	}
}

function deleteGames()
{
	if (isset($_POST[delete_games]))
	{
			foreach ($_POST as $key => $value)		// get all checked games
			{		// check if this is a checkbox post
				if (strripos($key,"_game") > 0)
				{	
					$sql = "DELETE FROM games WHERE gameId=".$value;
					$result = executeQuary($sql);
				}
			}
	}
	
}


function drawGameMode($gameId)
{	//gameId, gamename, gameDescription, gamecode, imglink
	
		$sql = "SELECT * FROM games g WHERE gameId='".$gameId."'";
		$result = executeQuary($sql);
		$myRecord = mysql_fetch_array($result);
	?>
	<table class="gameMode" align="center">
		<tr>
			<th class="gamesTd"><b><h2 align="center"><?php echo $myRecord[gamename];?><b></h2><br><?php echo $myRecord[gamecode]; ?></th>
		</tr>
		<tr>
			<th class="gamesTd"> המשחק יחל בעוד מספר שניות...<br>לחץ על כפתור ה PLAY כדי להתחיל במשחק<br><br><?php echo $myRecord[gameDescription]; ?><br><br><INPUT TYPE="submit" name="return" value="     חזור     " title="לחץ כאן על מנת לחזור לתפריט המשחקים"></th>
		</tr>		
	</table>
<?php
}

function drawGamesTable($allowEditing=false)
{
	?>
	<input type = "hidden" name="displayGameId" value="0"> 
	<table class="games"  align="center" >
	<?php
	$sql = "SELECT * FROM games g";
	$result = executeQuary($sql);
	$i = 0;
	
	while ($myRecord1 = mysql_fetch_array($result))
	{
		$myRecord2 = mysql_fetch_array($result);
		?>
		<tr>
			<td class="gamesTd" background="img/1.jpg"><b><h3><?php echo $myRecord1[gamename] ?></h3></b><br><?php echo $myRecord1[gameDescription]?></td>
			<th class="gamesTd" background="img/1.jpg"><?php if ($allowEditing) {?><input type = "checkbox" name="<?php echo $myRecord1[gameId]."_game" ?>" title="סמן אם ברצונך למחוק משחק זה"  value="<?php echo $myRecord1[gameId]?>"><?php }?><a href="javascript:displayGame('<?php echo $myRecord1[gameId] ?>')"><img width="135" height="135" border="0" src="<?php echo $myRecord1[imglink]?>"  alt="<?php echo $myRecord1[gamename]?>"></a></th>
		<?php if ($myRecord2) { ?>
			<td class="gamesTd" background="img/1.jpg"><b><h3><?php echo $myRecord2[gamename] ?></h3></b><br><?php echo $myRecord2[gameDescription] ?></td>
			<th class="gamesTd" background="img/1.jpg"><?php if ($allowEditing) {?><input type = "checkbox" name="<?php echo $myRecord2[gameId]."_game" ?>" title="סמן אם ברצונך למחוק משחק זה"  value="<?php echo $myRecord2[gameId]?>"><?php }?><a href="javascript:displayGame('<?php echo $myRecord2[gameId] ?>')"><img width="135" height="135" border="0" src="<?php echo $myRecord2[imglink]?>"  alt="<?php echo $myRecord2[gamename]?>"></a></th>
		<?php }?>
		</tr>

<?php } 
	if ($allowEditing){?>	
		</table>
		<br>
		<br>
 		<table align="center">
			<tr class="TABLE_HEADER">
				<td colspan="3">הוספת משחק חדש</td>
			</tr>
			<tr>
	 			<td>שם המשחק:</td>
	 			<td colspan="2"><INPUT NAME="gameName" type="text" ></td>
	 		</tr>
	 		<tr>
	 			<td>תיאור:</td>
	 			<td colspan="2"><INPUT NAME="gameDesc" type="text" ></td><td></td>
	 		</tr>
	 		<tr>
	 			<td>קוד	:</td>
	 			<td colspan="2"><INPUT NAME="gameCode" type="text" ></td>
	 		</tr>
	 		<tr>
	 			<td>לינק לתמונה:</td>
	 			<td colspan="2"><INPUT NAME="gamePic" type="text" ></td>
	 		</tr>
	 		<tr>
	 			<td><INPUT TYPE="submit" name="add_game" value=" הוסף משחק " title="לחץ כאן על מנת להוסיף את המשחק"></td>
	 			<td><INPUT TYPE="reset" name="clear_games" value=" נקה טופס " title="לחץ כאן כדי לנקות את השדות"></td>
	 			<td><INPUT TYPE="submit" name="help" value="   עזרה   " title="לחץ כאן כדי לפנות לדף הדרכת הוספת משחק"></td>
	 		</tr>
	 		<tr>				
	 			 <td colspan="3" align="right"><INPUT TYPE="submit" name="delete_games" value="  מחק משחק  " title="מחק את כל המשחקים המסומנים !" onclick="return confirmDelete()"></td>
	 		</tr>
 		</table>
<?php }
}

?>
