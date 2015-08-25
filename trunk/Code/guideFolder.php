<?php
	require_once("UserClass.php"); //include the user class		
	session_start();
	$refererPage = "mainMenusPage_TABLE.php";
	$SelfrefererPage="guideFolder.php";
	include("validateSession.php"); //validate session
//SET PERMISSIONS
	$allowEditing = $loggedUser->checkIfAllowed("editInstructorsFolder");
	//$allowViewAll = ""; NOT RELEVANT
	if (!$loggedUser->checkIfAllowed("viewInstructorsFolder"))
	{
		$redirect="Location:restricted2.html";
		echo header($redirect);
	}
/////// END OF VALIDATIONS ///////////////
	
	if ($allowEditing) 
	{ 	
		global $instructorsFolderDir; // The directory of the instructor aid folder
		$res = fileHandler($instructorsFolderDir,"instructorAid"); //check if a file was uploaded
		if (($res)&&($res != 1))	// error in upload file
			echo "<font color=\"red\"><b>".$res."</b></font><br/>";
	}
	
	function drawListLine($link,$displayname,$date,$type,$FID)
	{
		?>
		<li class="DOCUMENT_IMG_LIST">
		<?php
		if (isset($_POST[finishEditing]))
			unset($_POST[edit]);
		if (isset($_POST[edit])) {
		
		?>	
		<a href="<?php echo $link?>"><?php echo $displayname?></a><?php echo " ".$date?>	
					
			<form enctype="multipart/form-data" method="POST" action="guideFolder.php" onsubmit="return confirmDelete()">
			
						    	<input type="file" name="instructorAid" value="UPDATE"/><br/>
						    	<input type="hidden" name="updateFile" value="<?php echo $FID ?>">
						    	<input type="hidden" name="updateFileLink" value="<?php echo $link ?>">
						    	<input type="hidden" name="edit" value="1">
	            				<table width="600px">
								<tr>
									<td>
			            				סוג:
			            			</td>
	            					<td>
			            				<select name="type">
			            					<option value="1" <?if ($type==1) echo " selected=\"yes\"" ?>>עזר הדרכה</option>
			            					<option value="2" <?if ($type==2) echo " selected=\"yes\"" ?>>נספח</option>
			            					<option value="3" <?if ($type==3) echo " selected=\"yes\"" ?>>טופס</option>
			            				</select>
	            					</td>
	            				</tr>
	            				<tr>
	            					<td>
	            						שם תצוגה
	            					</td>
	            					<td width="80%">
	            						<textarea rows="1" cols="80" name="dispalyName"><?php echo $displayname?></textarea>
	            					</td>
	            				</tr>
	            				<tr>
	            					<td>
	            						<input type="submit" name="updateInstFile" value="עדכן רשומה"/>
	            					</td>
	            					<td>
	            						<input type="submit" name="deleteInstAid" value="מחק עזר זה"/>
	            					</td>
	            				</tr>
	            				</table>
	            	
	        		</form>
	        		
			
		<?php } else
		{?>
			<a href="<?php echo $link?>"><?php echo $displayname?></a><?php echo " ".$date?>
		<?php } ?>
		</li>
		<?php
	}
?>

<html> 
	<style type="text/css">  
	    @import url(zivStyle.css);
	</style>
	<script language="javascript" src="javascripts/javaScriptFunctions.js"></script>
	<head></head>
	<body> 
		<ul>
			<li CLASS="TITLE">עזרי הדרכה
				<ul class="DOCUMENT_IMG_LIST">
					<?php 
					$sql = "SELECT * FROM guidefolderfiles WHERE type='1'";
					$result = executeQuary($sql);
					while ($myRecord = mysql_fetch_array($result))
					{
						drawListLine($myRecord[link], $myRecord[fileName],$myRecord[date],$myRecord[type],$myRecord[FID]); 
					}
					?>
				</ul>
			</li>
			<li CLASS="TITLE">נספחים
				<ul class="DOCUMENT_IMG_LIST">
					<?php 
					$sql = "SELECT * FROM guidefolderfiles WHERE type='2'";
					$result = executeQuary($sql);
					while ($myRecord = mysql_fetch_array($result))
					{
						drawListLine($myRecord[link], $myRecord[fileName],$myRecord[date],$myRecord[type],$myRecord[FID]);
					}
					?>
				</ul>
			</li>
			<li CLASS="TITLE">טפסים
				<ul class="DOCUMENT_IMG_LIST">
					<?php 
					$sql = "SELECT * FROM guidefolderfiles WHERE type='3'";
					$result = executeQuary($sql);
					while ($myRecord = mysql_fetch_array($result))
					{
						drawListLine($myRecord[link], $myRecord[fileName],$myRecord[date],$myRecord[type],$myRecord[FID]); 
					}
					?>
				</ul>
			</li>
			
			
		</ul>
		<?php if (isset($_POST[edit])) {?>
		<div  id="addNewFileLayerTitle" onmousemove="javascript:LayerOnMouseOver(addNewFileLayerTitle)" onclick="javascript:showMenu(addNewFileLayer)">
			<img src="img/plusSymbol.jpg"> 		הוספת עזר הדרכה
		</div>
						<DIV id="addNewFileLayer">
							<?php if ($allowEditing) { ?>
							<form enctype="multipart/form-data" method="POST" action="guideFolder.php">
							<input type="hidden" name="edit" value="1">
							<?php } ?>
						    	<input type="file" name="instructorAid" /><br/>
	            				<table>
								<tr>
									<td>
			            				סוג:
			            			</td>
	            					<td>
			            				<select name="type">
			            					<option value="1">עזר הדרכה</option>
			            					<option value="2">נספח</option>
			            					<option value="3">טופס</option>
			            				</select>
	            					</td>
	            				</tr>
	            				<tr>
	            					<td>
	            						שם תצוגה
	            					</td>
	            					<td>
	            						<input type="text" name="dispalyName" value="">
	            					</td>
	            				</tr>
	            				<tr>
	            					<td>
	            						<input type="submit" name="uploadNewInstAid" value="upload"/>
	            					</td>
	            				</tr>
	            				</table>
	            			<?php if ($allowEditing) { ?>
	        				</form>
	        				<?php } ?>
						</DIV>
			<?php } ?>
	<?php if ($allowEditing) { ?>
	<form name="EDIT" method="POST" action="guideFolder.php">
		<?php if  (isset($_POST[edit])) {?>
		<input type="submit" name="finishEditing" value=" סיים עריכה">
		<?php }else { ?>
		<input type="submit" name="edit" value="ערוך תיק מדריך">
		<?php } ?>
	</form>
	<?php } ?>
	</body> 
</html> 