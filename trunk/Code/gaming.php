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
    <th class="gamesTd"><u>������ ������ ���� ��� :</u><br><br></th>
  </tr>
  <tr>
    <td> 1) ����� ���� ����� ����� ������ ���� ������� ���� �� ��� EMBED,������ : <a href="http://www.ultimatearcade.com/downloads" target="blank">http://www.ultimatearcade.com</a><br><br></td>
  </tr>
  
    <tr>
    	<td>2) �� ���� ����� �������� �� �� ����� ��� ����� , ���� �����: <br><br><img src="img/games_desc.JPG"></td>
  	</tr>
  	
  	 <tr>
    	<td>3) ���� ��� �� ������ �� ���� �� ����� ��� ����� ���� ���� ����� �����, ������:<br><br><img src="img/Game_code.jpg"><br><br><img src="img/game_code_exmp.jpg"><br><br></td>
  	</tr>
  	
  	 <tr>
    	<td>4) ���� ���� ������ �� ���� �� ������ ����� (URL) �� ������, ������:  <a href="http://www.ultimatearcade.com/games/tribal-olympics-2/150x150.jpg" target="blank">http://www.ultimatearcade.com/games/tribal-olympics-2/150x150.jpg</a><br><br> ���� ������ ���� ���� �"� ����� �� ������ ����� ������ ����� �� ����� ������ Properties ��� �� ����� �� � URL<br><br><img src="img/game_link.jpg"><br><br></td>
  	</tr>
  	
  	<tr>
    	<td>5) ��� �� ����� ����.<br><br></td>
  	</tr>
  	
  	<tr>
    	<td align="center"><INPUT TYPE="submit" name="return" value="     ����     " title="��� ��� �� ��� ����� ������ �������"><br><br></td>
  	</tr>
  
</table>
	<?php
}



function addGame()
{
/*���� ������� �� ������ �� ������ �������� ��� �"� ���� ���� ���� ������ ����� �� ���
������� �� ����� �� ����� ������ ���� ��� ��� ���� ������ �� ���� �� ��� �� ����� ������*/
//	print_r($_POST);
	if (isset($_POST[add_game])&&($_POST["gameName"]!="")&&($_POST["gameDesc"]!="")&&($_POST["gameCode"]!=""))
	{
		/******���� ������ ������ �� ����!****/
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
			<th class="gamesTd"> ����� ��� ���� ���� �����...<br>��� �� ����� � PLAY ��� ������ �����<br><br><?php echo $myRecord[gameDescription]; ?><br><br><INPUT TYPE="submit" name="return" value="     ����     " title="��� ��� �� ��� ����� ������ �������"></th>
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
			<th class="gamesTd" background="img/1.jpg"><?php if ($allowEditing) {?><input type = "checkbox" name="<?php echo $myRecord1[gameId]."_game" ?>" title="��� �� ������ ����� ���� ��"  value="<?php echo $myRecord1[gameId]?>"><?php }?><a href="javascript:displayGame('<?php echo $myRecord1[gameId] ?>')"><img width="135" height="135" border="0" src="<?php echo $myRecord1[imglink]?>"  alt="<?php echo $myRecord1[gamename]?>"></a></th>
		<?php if ($myRecord2) { ?>
			<td class="gamesTd" background="img/1.jpg"><b><h3><?php echo $myRecord2[gamename] ?></h3></b><br><?php echo $myRecord2[gameDescription] ?></td>
			<th class="gamesTd" background="img/1.jpg"><?php if ($allowEditing) {?><input type = "checkbox" name="<?php echo $myRecord2[gameId]."_game" ?>" title="��� �� ������ ����� ���� ��"  value="<?php echo $myRecord2[gameId]?>"><?php }?><a href="javascript:displayGame('<?php echo $myRecord2[gameId] ?>')"><img width="135" height="135" border="0" src="<?php echo $myRecord2[imglink]?>"  alt="<?php echo $myRecord2[gamename]?>"></a></th>
		<?php }?>
		</tr>

<?php } 
	if ($allowEditing){?>	
		</table>
		<br>
		<br>
 		<table align="center">
			<tr class="TABLE_HEADER">
				<td colspan="3">����� ���� ���</td>
			</tr>
			<tr>
	 			<td>�� �����:</td>
	 			<td colspan="2"><INPUT NAME="gameName" type="text" ></td>
	 		</tr>
	 		<tr>
	 			<td>�����:</td>
	 			<td colspan="2"><INPUT NAME="gameDesc" type="text" ></td><td></td>
	 		</tr>
	 		<tr>
	 			<td>���	:</td>
	 			<td colspan="2"><INPUT NAME="gameCode" type="text" ></td>
	 		</tr>
	 		<tr>
	 			<td>���� ������:</td>
	 			<td colspan="2"><INPUT NAME="gamePic" type="text" ></td>
	 		</tr>
	 		<tr>
	 			<td><INPUT TYPE="submit" name="add_game" value=" ���� ���� " title="��� ��� �� ��� ������ �� �����"></td>
	 			<td><INPUT TYPE="reset" name="clear_games" value=" ��� ���� " title="��� ��� ��� ����� �� �����"></td>
	 			<td><INPUT TYPE="submit" name="help" value="   ����   " title="��� ��� ��� ����� ��� ����� ����� ����"></td>
	 		</tr>
	 		<tr>				
	 			 <td colspan="3" align="right"><INPUT TYPE="submit" name="delete_games" value="  ��� ����  " title="��� �� �� ������� �������� !" onclick="return confirmDelete()"></td>
	 		</tr>
 		</table>
<?php }
}

?>
