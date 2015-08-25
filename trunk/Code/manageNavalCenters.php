<?php
require_once("UserClass.php");
require_once("generalFunctions.php");
session_start();
$refererPage = "mainMenusPage_TABLE.php";
$SelfrefererPage = "manageNavalCenters.php";

include("validateSession.php"); //validate session
//SET PERMISSIONS
	$allowEditing = $loggedUser->checkIfAllowed("editUsers");
	$allowViewAll = $loggedUser->checkIfAllowed("viewAllUsers");
	$editNavalCenters = $loggedUser->checkIfAllowed("editNavalCenters");
	if (!$loggedUser->checkIfAllowed("viewUsers"))
	{
		$redirect="Location:restricted2.html";
		echo header($redirect);
	}
/////// END OF VALIDATIONS ///////////////
?>
<html> 
	<style type="text/css">  
	    @import url(zivStyle.css);    
	</style>
	<script language="javascript" src="javascripts/javaScriptFunctions.js"></script>
	<head></head>
	<body> 
	<?php if (isset($_POST['addSeaCenter']))
	{ 
	
		$sql ="INSERT INTO navalcenters(ncName,ncCity,manager,managTelNumber,contectMan,contectManTelNumber,maneging,comants)values('".$_POST[ncName]."','".$_POST[ncCity]."','".$_POST[manager]."','".$_POST[managTelNumber]."','".$_POST[contectMan]."','".$_POST[contectManTelNumber]."','".$_POST[maneging]."','".$_POST[comants]."')";

		$result = executeQuary($sql);

		if (mysql_affected_rows() == 0) 	//date was not inserted into DB
		{
				echo "Error in Insert SQL Query: ".$sql;
		}


		foreach ($_POST as $value)
		{
			
			$sql2 ="INSERT INTO seacenterandtools(SeaCenter,Tool)values(".$value.",'".$_POST[ToolsName]."')";
			
			$result2 = executeQuary($sql2);
					
		}
	} 
	if (isset($_POST['addTool']))
	{ 
		$sql ="INSERT INTO seatools(ToolsName)values('".$_POST[ToolsName]."')";
		
		$result = executeQuary($sql);
		if (mysql_affected_rows() == 0) 	//date was not inserted into DB
		{
				echo "Error in Insert SQL Query: ".$sql;
		}
	
			
		
	} 
		/*Delete Group*/
	if (isset($_POST[deleteSeaCenters]) && (count($_POST)>1) )
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
					$value = "ncid='".$value."' OR ";
					$sqlString=$sqlString . $value;
					}
			}
		$sqlString[strripos($sqlString,"O")]=" ";
		$sqlString[strripos($sqlString,"R")]=" ";
		
		$sqlUpdateQuary = "delete FROM navalcenters  WHERE ".$sqlString;
		$result = executeQuary($sqlUpdateQuary);
	}
	if (isset($_POST[delete_Tools]) && (count($_POST)>1) )
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
					$value = "Tnum='".$value."' OR ";
					$sqlString=$sqlString . $value;
					}
			}
		$sqlString[strripos($sqlString,"O")]=" ";
		$sqlString[strripos($sqlString,"R")]=" ";
		
		$sqlUpdateQuary = "delete FROM seatools  WHERE ".$sqlString;
		$result = executeQuary($sqlUpdateQuary);
	}
			drawNavalCenters($editNavalCenters);
			drawKindofSeaToolS($editNavalCenters);
		?>


<?php
/*******************************************************************************
*Name: drawNavalCenters
*Discription: draw all the naval centers
*input: none
*output: HTML code that is a table
*Author: Amit Eitan
*Date: 9/10/2008 16:30
********************************************************************************/
function drawNavalCenters($allowEditing=0)
{
$sql ="SELECT * FROM navalcenters";

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
		<?php if ($allowEditing) {?>
		<FORM method="POST" name="NAVAL_CENTERS_LIST_FORM" action="manageNavalCenters.php" onsubmit="return confirmDelete()">
		<?php } ?>
		<input type="hidden" name="editNavalCenter" value="true">
		<input type="hidden" name="manageNavalCenterForm" value="true">
		<table class=list border=1 bordercolor="aqua">
		<tr class="TABLE_HEADER">
				<?php if ($allowEditing) {?>
				<td>בחירה</td>
				<?php } ?>
				<td>שם מרכז</td>
				<td>מיקום</td>
			<?php /*	<td>סוג סירות מפרש</td> */?>
				<td>מנהל</td>
				<td> טלפון של מנהל המרכז הימי</td>
				<td>איש קשר </td>
				<td>    טלפון של איש הקשר </td>
				<td> בניהול</td> 
				<td>הערות </td>
			</tr>
			<?php 	
			while ($myRecord = mysql_fetch_array($result))
			{
			?>	
			<tr bordercolor="aqua">
				<?php if ($allowEditing) {?>
				<td bordercolor="aqua"><INPUT NAME="<?php echo $myRecord[ncid];?>" TYPE="checkbox" value="<?php echo $myRecord[ncid];?>"> </td>
				<?php } ?>
				<td bordercolor="aqua"><?php echo $myRecord[ncName];?> </td>
				<td bordercolor="aqua"><?php echo $myRecord[ncCity];?> </td>
			<?php /*	<td>	
				<select name="seaTools">
		 		<?php getSeaCenterAndTool(0,$myRecord[ncName])?>
		 		</select> 
		 		</td>*/ ?>
				<td bordercolor="aqua"><?php echo $myRecord[manager]; ?> </td>
				<td bordercolor="aqua"><?php echo $myRecord[managTelNumber]; ?> </td>
				<td bordercolor="aqua"><?php echo $myRecord[contectMan]; ?> </td>
				<td bordercolor="aqua"><?php echo $myRecord[contectManTelNumber]; ?> </td>
				<td bordercolor="aqua"><?php echo $myRecord[maneging]; ?> </td>			
				<td bordercolor="aqua"><?php echo $myRecord[comants] ?> </td> 
			</tr>	
			
			<?php
			}	
			?>
			</table>
			<br>
			<?php if ($allowEditing) {?>
			<INPUT TYPE="submit" name="deleteSeaCenters" value=" מחק מרכזים נבחרים ">
			<br>
			<br>
		<table >
				<tr class="TABLE_HEADER">
				<td colspan="2">פרטי המרכז הימי החדש </td>
				 <?php /* ?><td> שם אמצעי</td> */ ?>
				</tr>
				<tr>
					<td>שם מרכז</td>
					<td><input type="text" value="" name="ncName" size="50" ></td>
									

					<td>
					<table>
						<?php 
						$sql ="SELECT * FROM seatools s;";
						$result = executeQuary($sql); ?>
						<?php while ($myRecord = mysql_fetch_array($result))
						{?>
						<tr>	
					<?php /* ?>	<td><INPUT NAME="<?php echo $myRecord[Tnum];?>" TYPE="checkbox" value="<?php echo $myRecord[Tnum];?>"></td> 
						<td><?php echo $myRecord[ToolsName];?></td> */?>
				<?php /*?>		<td>  כמות<input type="text" value="" name="count,"."<?php echo $myRecord[Tnum];?>"></td>	
						<td>הערות<input type="text" value="" name="comant,"."<?php echo $myRecord[Tnum];?>">  </td>
				<?php */ ?>	
						</tr>		 
							
						<?php } ?>
					</table> 
					</td>

				</tr>
				<tr>
					<td>מיקום</td>	
					<td><input type="text" value="" name= "ncCity" size="50"> </td>
				</tr>
			<?php /*	<tr>
					<td> סוגי סירות מפרש</td>
					<td><input type="text" value="" name="sailBoats"> </td>
				</tr> */ ?>
				<tr>
					<td>מנהל</td>
					<td><input type="text" value="" name="manager" size="50"></td>
				</tr>
				<tr>
					<td> טלפון של מנהל המרכז הימי</td>
					<td><input type="text" value="" name="managTelNumber" size="50">
				</tr>
				<tr>
					<td>איש קשר </td>
					<td><input type="text" value="" name="contectMan" size="50"></td>
				</tr>
				<tr>
					<td>    טלפון של איש הקשר </td>
					<td><input type="text" value="" name="contectManTelNumber" size="50"></td>
				</tr>
				<tr>	
					<td> בניהול</td> 
					<td><input type="text" value="" name="maneging" size="50"></td>
				</tr>				<tr>	
					<td>הערות </td>		
					<td><center><textarea name="comants" rows="10" cols="55"><?php echo $myRecord[comants] ?></textarea></center></td> 			
				</tr>
		<?php /* ?>	<tr>
					<td>איזור </td>
					<td>
					<select name ="area" >
					<option>צפון</option>
					<option>נתניה חדרה</option>
					<option>מרכז</option>
					<option>דרום</option>
					</select>
					</td>
				</tr>
		<?Php */ ?>
		
		
		
		
		</table>
			<br>

			 <?php } ?>
			<?php if ($allowEditing) {?>
				<input type="submit" name="addSeaCenter" value="הוסף מרכז ימי">

			<?php }?>
 	<?php if ($allowEditing) {?>
 	</FORM>
 	<?php
 		}
	}
}
?>
<?php function drawKindofSeaToolS($editNavalCenters = 0)
{$sql ="SELECT * FROM seatools s;";

	$result = executeQuary($sql);
	if (mysql_num_rows($result)==0)
	{
		?>
		<div class="QUARY_RESULT_ERROR">
		אין כלי ים 
		</div>
		<?php
	}
	else
	{ 
?>		
		<?php if ($editNavalCenters) {?>
		<FORM method="POST" name="NAVAL_TOOLS_LIST_FORM" action="manageNavalCenters.php" onsubmit="return confirmDelete()">
		<?php } ?>
		<input type="hidden" name="editTools" value="true">
		<input type="hidden" name="manageNToolsForm" value="true">
		<table class=list border=1>
		<tr class="TABLE_HEADER">
				<?php if ($editNavalCenters) {?>
				<td>בחירה</td>
				
				<td>שם האמצעי הימי</td>
				<?php } ?>
			</tr>
			<?php if ($editNavalCenters) {
			while ($myRecord = mysql_fetch_array($result))
			{
			?>	
			<tr>

				<td><INPUT NAME="<?php echo $myRecord[Tnum];?>" TYPE="checkbox" value="<?php echo $myRecord[Tnum];?>"> </td>

				<td><?php echo $myRecord[ToolsName];?></td>
			</tr>				
			<?php
			}	
			}
			?>

			<?php if ($editNavalCenters) {?>
			<tr>
				<td>שם אמצעי ימי</td>
				<td><input type="text" value="" name="ToolsName" ></td>
			</tr>
			</table>
			<br>
			 <?php } ?>
			<?php if ($editNavalCenters) {?>

				<input type="submit" name="addTool" value="הוסף אמצעי">
				<INPUT TYPE="submit" name="delete_Tools" value=" מחק אמצעים  ">

			<?php }?>
 	<?php if ($editNavalCenters) {?>
 	</FORM>
 	<?php
 		}
	}
}
 ?>
 <?php
 function getSeaCenterAndTool($selectedValue=0,$seaCenter)
	{		
		$sql ="SELECT * FROM seacenterandtools s where s.SeaCenter='".$seaCenter."';";
		$GroupListresult=executeQuary($sql);
		?>

		<?php
		while ($myRecord = mysql_fetch_array($GroupListresult))
			{	
				if ($selectedValue == $myRecord[0]) // compare group number
					$selectedString = "selected=\"yes\""; 
				else
					$selectedString="";
				?>
				<option value="<?php echo $myRecord[0]?>" <?php echo $selectedString?>><?php echo $myRecord[Tool]?></option>
				<?php
			}
	} ?>
</body>
</html>