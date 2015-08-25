<?php
require_once("UserClass.php");
require_once("generalFunctions.php");
session_start();
$refererPage = "mainPage.php";
$SelfrefererPage = "viewPictures.php";
include("validateSession.php"); //validate session
//SET PERMISSIONS
	$allowEditing = $loggedUser->checkIfAllowed("editUsers");
	$allowViewAll = $loggedUser->checkIfAllowed("viewAllUsers");
/////// END OF VALIDATIONS ///////////////
global $allUsresPictureFolder;
//print_r($_POST);
//echo "<hr>";
//print_r($_FILES);
//fileHandler($userPictureFolder,"newPicture",$loggedUser->getUname(),$loggedUser->getmemberOfGroup());
updatePictures();
?>
<html> 
	<style type="text/css">  
	    @import url(zivStyle.css);    
	</style>
	<script language="javascript" src="javascripts/javaScriptFunctions.js"></script>
	<head>
	</head>
	<body> 
		<?php	
		
		if (!isset($_POST[groupID])||(!$_POST[groupID]))		// logged user is not manager 	
		{
			$group = $loggedUser->getmemberOfGroup();
		}
		else 	// manager display all groups in combo-box
		{
			$group = $_POST[groupID];	
		}
		
		$userPictureFolder = $allUsresPictureFolder.$group."/";		// folder to insert the new picture
		$res = fileHandler($userPictureFolder,"newPicture",$loggedUser->getUname(),$group);	
		showPictures($group,$allowEditing,$allowViewAll,editSql($group));
		echo "</form>";				
				
		if (($res)&&($res != 1))	// error in upload file
			echo "<font color=\"red\"><b>".$res. "</b></font><br/>";
		
		if ($group)
			uploadNewPicture();

		?>
	</body> 
</html> 

<?php
/*******************************************************************************
*Name: showPictures
*Discription: draw all the pictures that belong to a group and allow editing
*input: edit - make the form editable, GID the group ID that the pictures belong to
*output: HTML code that is a table of pictures
*Author: Oded Goldshmidt
*Date: 9/10/2008 16:30
********************************************************************************/
function showPictures($GID=0,$edit=0,$viewAll=0,$sql)
{
?>
	<FORM method="post" action="viewPictures.php" name="viewPicturesForm">
	<input type = "hidden" name="DeleteButton" value="0"> 
	<!--     Group  Messages    -->		
	<?php 
	if ($viewAll) 
	{
		?>
		<div class="TITLE">
	
		בחר קבוצה:
		<br>
		</div>
		<select name="groupID" onChange="javascript:GrouplistSubmitPIC()">
			<?php getGroupsList($_POST[groupID]); ?>
		</select>
		<input type="hidden" name="listSubmit" value="0">
	<?php 
	} //end of view all 

	if (!$GID) 
	{
		echo "<h2> אין קבוצה !</h2>";
		return 0; //if no group don't display any pictures
	}
	$result = executeQuary($sql);
	$rows = mysql_affected_rows();		
	if ($rows == 0) 
	{				
			?>
				<table align="center">
					<tr>
					<td class="PICTURES" align="center"><img src="img/logo.gif"><br><br>אין תמונות קבוצתיות</td>
					</tr>
				</table>	
   		<?php 	return; //<?php if ($rows>1) echo $rows; else echo 2;
	}	
	else
	{
		$myRecord = mysql_fetch_array($result);
			?>
			<table align="center" class="PICTURES">
				<tr>
				<input type = "hidden" name="MainPicID" value="<?php echo $myRecord[PID]?>"> 
				<td class="PICTURES" align="center" colspan="6" height="400" bordercolor="black"><img width="480" height="360" src="<?php echo $myRecord[link]?>" name="mainPicture" border="1"></td>
				</tr>
				<tr>
				<td class="PICTURES">הועלה ע"י:<br>תאריך:<br>הערות:<br><td>
				<td class="PICTURES" id="mainPictureDetails"><?php echo $myRecord[userUploaded]."<br>".$myRecord[date]."<br>".$myRecord[comment]?></td>
			<?php if ($edit) {?>
				<td class="PICTURES" align="center"><input type="submit" name="deletePictures" value="    מחק    " title="לחץ כאן כדי למחוק את התמונה הראשית" onclick="return confirmPictureDelete()"></td>
			<?php }?>
				</tr>
			</table>
			<br>
			<br>
			<table align="center" class="PICTURES">
				<tr>
				<input type = "hidden" name="rightPicID" value="0"> 
			<?php if (!(($rows < 6 )&&($_POST['rightPicID']))) 
				{ ?>
		  			 <td class="PICTURES" align="left"><a href="javascript:PrevPicSubmit('<?php echo $myRecord[PID]?>')" title="קודם"><img src="img/rightArrow.jpg" border="0"></a></td>
		    <?php } ?>
			<td class="PICTURES" bordercolor="black"><a href="javascript:ShowPic('<?php echo $myRecord[PID] ?>','<?php echo $myRecord[link] ?>','<?php echo $myRecord[userUploaded]."<br>".$myRecord[date]."<br>".$myRecord[comment]?>')"><img width="120" height="90" src="<?php echo $myRecord[link]?>"  alt="<?php echo $myRecord[comment]?>" border="1" ></a></td>
			<?php  
			while ($myRecord = mysql_fetch_array($result))
			{?>
				<td class="PICTURES" bordercolor="black"><a href="javascript:ShowPic('<?php echo $myRecord[PID] ?>','<?php echo $myRecord[link] ?>','<?php echo $myRecord[userUploaded]."<br>".$myRecord[date]."<br>".$myRecord[comment]?>')"><img width="120" height="90" src="<?php echo $myRecord[link]?>"  alt="<?php echo $myRecord[comment]?>" border="1"></a></td>
			<?php
				$last = $myRecord;
			}
			if (!(($rows < 6 )&&($_POST['leftPicID'])))  
			{ ?>
		   		 <td class="PICTURES" align="right"><a href="javascript:NextPicSubmit('<?php echo $last[PID]?>')" title="הבא"><img src="img/leftArrow.jpg" border="0"></a></td>
		   <?php } ?>
		   		<input type = "hidden" name="leftPicID" value="0"> 	
				</tr>
			</table>	
  <?php }
  
}
/*******************************************************************************
*Name: updatePictures
*Discription: delete pictures that were chosen
*Author: Oded Goldshmidt
*Date: 9/11/2008 16:30
********************************************************************************/
function updatePictures()
{
	if (isset($_POST['DeleteButton'])&&($_POST['DeleteButton'])&&isset($_POST[deletePictures]))
	{
		$_POST['DeleteButton'] = 0;
		unset($_POST['DeleteButton']);
		$sql = "DELETE FROM pictures WHERE PID=".$_POST['MainPicID'];
		$result = executeQuary($sql);
	}
}

function editSql($group)
{
	if (isset($_POST['rightPicID'])&&($_POST['rightPicID']))	
		$sql = "SELECT PID, userUploaded, date, link, comment FROM pictures WHERE GID='".$group."' and PID >=".$_POST['rightPicID']." order by pid DESC limit 6";
	else 
		if (isset($_POST['leftPicID'])&&($_POST['leftPicID']))	
			$sql = "SELECT PID, userUploaded, date, link, comment FROM pictures WHERE GID='".$group."' and PID <=".$_POST['leftPicID']." order by pid DESC limit 6";
			else $sql = "SELECT PID, userUploaded, date, link, comment FROM pictures WHERE GID='".$group."' order by pid DESC limit 6";
	return $sql;	
}

/*******************************************************************************
*Name: uploadNewPicture
*Discription: upload pictures that were chosen to upload
*Author: Oded Goldshmidt
*Date: 9/10/2008 12:30
********************************************************************************/
function uploadNewPicture()
{
?>			
	<!--  ADD NEW PICTURES -->	
		<br>
		<div  id="addNewFileLayerTitle" onmousemove="javascript:LayerOnMouseOver(addNewFileLayerTitle)" onclick="javascript:showMenu(addNewFileLayer)"><img name=images src="img/plusSymbol.jpg">הוספת תמונה לאלבום הקבוצתי</div>

					<DIV id="addNewFileLayer">
						<form enctype="multipart/form-data" method="POST" action="viewPictures.php">
					    	<input type="file" name="newPicture" /><br/>
            				<table>
            				<tr>
            					<td>
            						הערות לתמונה
            					</td>
            					<td>
            						<input type="text" name="pictureComments" value="">
            					</td>
            				</tr>
            				<tr>
            					<td>
            						<input type="submit" name="uploadNewPicture" value="upload"/>
            					</td>
            				</tr>
            				</table>
        				</form>
					</DIV>
<?php
}
?>

