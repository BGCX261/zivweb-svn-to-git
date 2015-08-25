<?php
/*
 * FILE: generalFunctions.php
 * Discription: This file contains functions that are used in multipile files
 * to prevent copying of code
 * 
 * getGroupList - creats HTML code for the list of groups
 * getUsersGroup - searches the DB for the user group the user belongs to
 * 
 */
$refererPage = "mainMenusPage_TABLE.php";
require_once("dataValidation.php");
/*******************************************************************************
*Name: getGroupsList
*Discription: This function creats a list of all the groups in the DB  
* 				the value of each group tha will show in th $_POST is the SID
*input:none
*output: HTML code that is in the option format
*Author: Amit Eitan
*Date: 27/9/2008 10:40
********************************************************************************/
function getGroupsList($selectedValue=0)
	{		
		$sql = "SELECT * FROM activitygroups";
		$GroupListresult=executeQuary($sql);
		?>
		<option value="0">  </option>
		<?php
		while ($myRecord = mysql_fetch_array($GroupListresult))
			{	
				if ($myRecord[0]<4) continue; //skip groups instructors and administrators
				if ($selectedValue == $myRecord[0]) // compare group number
					$selectedString = "selected=\"yes\""; 
				else
					$selectedString="";
				?>
				<option value="<?php echo $myRecord[0]?>" <?php echo $selectedString?>><?php echo $myRecord[City]. " - ".$myRecord[aGroupName];?></option>
				<?php
			}
	}
/*******************************************************************************
*Name: getGroupGuide
*Discription: The function returns the username of the groups guide
*input: sid of the group, optional boolean if the retun value needed is the username of the guide
*output: string with the guide name or the guides uname
*Author: Amit Eitan
*Date: 27/9/2008 10:40
********************************************************************************/
function getGroupGuide($SID=0,$returnUname=0)
	{
		if ($SID ==0 ) return 0; //No group no guide
		$sql = "SELECT a.username,u.firstname,u.lastname FROM users_activitygroups a,usesrpermissionsgroups p, users u WHERE a.SID='".$SID."' and a.username=p.username and p.username=u.username";
		$groupGuide =executeQuary($sql);
		$myRecord = mysql_fetch_array($groupGuide);
			{	
				$returnString=$myRecord[firstname]." ".$myRecord[lastname];
			}
		if ($returnUname)
			return $myRecord[username];
		else
			return $returnString;
	}
function getPermissionList($selectedValue=0)
	{		
		$sql = "SELECT * FROM permissionsgroups";
		$GroupListresult=executeQuary($sql);
		?>
		<option value="0"> חניך </option>
		<?php
		while ($myRecord = mysql_fetch_array($GroupListresult))
			{	
				if ($selectedValue == $myRecord[PID])
					$selectedString = "selected=\"yes\""; 
				else
					$selectedString="";
				?>
				<option value="<?php echo $myRecord[0]?>" <?php echo $selectedString?>><?php echo $myRecord[PGroupName];?></option>
				<?php
			}
	}
	
/*******************************************************************************
*Name: getUserGroup
*Discription: This functions echos to screen the users Group name  
*input: the user name
*output: none
*Author: Amit Eitan
*Date: 29/9/2008 01:01
********************************************************************************/
function getUserGroup($Username,$print=0)
	{		
		$teamSql="SELECT a.aGroupName,a.SID FROM activitygroups a,users_activitygroups u WHERE u.UserName='".$Username."' and u.SID = a.SID";	
		$Teamresult=executeQuary($teamSql);
		if (mysql_num_rows($Teamresult)>0)
		{
			$TeamName= mysql_fetch_array($Teamresult);
			if ($print)
				echo $TeamName[aGroupName];
			return $TeamName[1]; //return $teamName[SID]
		}
		else
		{
			if ($print)
				echo "אין קבוצה";
			return 0;
		}
	}

/*******************************************************************************
*Name: getUserGroup
*Discription: This functions echos to screen the users Permission name  
*input: the user name
* 		boolean for returning the entire permission set
* 		booleand for printing the Permission Id of the user
*output: return the permision ID (PID) 
*Author: Amit Eitan
*Date: 29/9/2008 01:01
********************************************************************************/
function getPermissionID($Username,$returnAll=0,$print=0)
	{		
		$permisionSql="SELECT * FROM permissionsgroups p,usesrpermissionsgroups u WHERE u.UserName='".$Username."' and u.PID = p.PID";	
		$permissionResult=executeQuary($permisionSql);
		if (mysql_num_rows($permissionResult)>0)
		{
			$permisionIDandName= mysql_fetch_array($permissionResult);
			
			if ($returnAll) return $permisionIDandName;
			if ($print)
				echo $permisionIDandName[PGroupName];
			return $permisionIDandName[pid];
		}
			else
				{
				if ($print)
						echo "חניך";
				return 0; //NO GROUP = חניך
				}	
	}
function printSqlQuary($sqlQuary)
{
	echo "<HR dir='ltr'><CENTER>". $sqlQuary . "</CENTER><HR>";
}
/*******************************************************************************
*Name: file handler
*Discription: This function deals with uploading files to the server  
*input: $destinationDir - the destination folder for the uploaded file
* 		$fileDiscriptorName - filediscriptior (name of the file in the FILES array
* 		$username - the user name uploaded the file
* 		$userGroup - the group of the user
*output: return the result of the upload
*Author: Amit Eitan and Oded Golds
*Date: 29/9/2008 01:01
********************************************************************************/
function fileHandler($destinationDir,$fileDiscriptorName,$username='0',$userGroup='0')
{
//	echo "<hr>";
//	print_r($_FILES);
//	echo "<hr>";
//	print_r($_POST);
//	echo "<hr>";
	if (!empty($_FILES))
	{
		if ($_FILES[error]!= 0)
			return "שגיאה בהעלאת הקובץ : ".$_FILES[error];	
		
		$filesize = $_FILES[$fileDiscriptorName]['size'];
		$UserFileName=$_FILES[$fileDiscriptorName]["name"];
		$ext = substr($UserFileName,strrpos($UserFileName,'.') + 1);		// cut the file type from the name
		$ext = strtolower($ext);	
		$accepted = array("gif","jpeg", "jpg", "png","doc","xls","docx","pdf");		// valid file extentions 	
		if(!in_array($ext, $accepted))	// check if file type supported
		{
			return "סוג קובץ ".$ext." אינו מתאים !";
		}
		
		$accepted = array("gif","jpeg", "jpg", "png");
		if(in_array($ext, $accepted))		// image file
		{
			if ($filesize > 1000000)		// size over 1 MB
				return "קובץ גדול מ- 1 MB ! אנא הקטן ונסה שוב ...";
		}
		
		$ext = substr($UserFileName,strrpos($UserFileName,'.'));		// cut the file type from the name include the .
		$dir =getcwd()."/".$destinationDir;
		$date = getdate();
		$dateString = 	$date[mday] . "/".$date[mon] . "/".$date[year] . " - ".$date[hours].":". $date[minutes];
		if (!file_exists($dir)) //CHECK IF DIRECTORY DOESN'T EXSISTS
		{
			mkdir($dir); //create the directory
		}
		if (isset($_POST[uploadNewInstAid]))  //adding new file for the instructor aid (TIK MADRICH)
        {     
       	$sql ="INSERT INTO guideFolderFiles(filename,link,type,date) values('newFile','0','0','0')";
       	executeQuary($sql);
       	$sql = "SELECT FID FROM guideFolderFiles Where filename='newFile'";

       	$result = executeQuary($sql);
       	$FID = mysql_fetch_array($result);
       	$FID = $FID[FID]; 	
 		$sql ="UPDATE guideFolderFiles SET filename='$_POST[dispalyName]',link='".$destinationDir.$FID.$ext."',type='$_POST[type]',date='$dateString' WHERE FID='$FID'";
		
        executeQuary($sql);
        $_FILES[$fileDiscriptorName]["name"]=$FID.$ext;
       }
	
     if (isset($_POST[updateInstFile]))  //Update exsisting (TIK MADRICH)
       {     
 		$sql ="UPDATE guideFolderFiles SET filename='$_POST[dispalyName]',type='$_POST[type]',date='$dateString' WHERE FID='$_POST[updateFile]'";
        executeQuary($sql);
        if ($_FILES[error]==0)
        	 $_FILES[$fileDiscriptorName]["name"]=$_POST[updateFile].$ext;
       }
	 if (isset($_POST[deleteInstAid]))  //Delete exsisting (TIK MADRICH)
       {

       	$sql = "DELETE FROM guideFolderFiles WHERE FID='$_POST[updateFile]'";     

        executeQuary($sql);
		unlink($_POST[updateFileLink]); 
		return 0;
		
       }
	if (isset($_POST[uploadNewPicture]))
      	 {
      	if ($fileType == "image/pjpeg") 
        	$fileTypeOk=true;
       	$sql ="INSERT INTO pictures(comment,link,date,userUploaded,GID) values('".$_POST[pictureComments]."','".$destinationDir.$UserFileName ."','".$dateString ."','".$username."','".$userGroup."')";
       	executeQuary($sql);
       	}
    
      /* move the file from the temp location to the final destination */
      	$res = move_uploaded_file($_FILES[$fileDiscriptorName]["tmp_name"],$dir.$_FILES[$fileDiscriptorName]["name"]);
       	//echo "res=".$res."<BR>";
      	return $res;
      	
	}
}

/*******************************************************************************
*Name: claculateWeekDates
*Discription: This functions calculate dates for all 7 week days according to input date  
*input: date in format of 3 letters string
*output: return the array with the result 
*Author: Oded G.
*Date: 9/10/2008 14:01
********************************************************************************/
function claculateWeekDates($date)
{
	switch($date)
	{
                case "Sun": $resultarray = array(0,1,2,3,4,5,6);
                                   break;
                
                case "Mon": $resultarray = array(-1,0,1,2,3,4,5);
                                    break; 
                                    
                case "Tue": $resultarray = array(-2,-1,0,1,2,3,4);
                                    break;
                                    
                case "Wed": $resultarray = array(-3,-2,-1,0,1,2,3);
                                    break; 
                                    
                case "Thu": $resultarray = array(-4,-3,-2,-1,0,1,2);
                                    break; 
                                    
                case "Fri": $resultarray = array(-5,-4,-3,-2,-1,0,1);
                                    break;  
                                     
                case "Sat": $resultarray = array(-6,-5,-4,-3,-2,-1,0);
                                    break;                                                                       
	}
	return $resultarray;
}
/*******************************************************************************
*Name: getMesseges
*Discription: this function echos the selected message  
*input: group id of the message
* 		withLineBreaks: display the message with line breaks
* 		withHtmlTags: strip the message from tags
*output: return the array with the result 
*Author: Amit Eitan & Oded G.
*Date: 9/10/2008 12:01
********************************************************************************/
function getMesseges($gid,$withLineBreaks=true,$withHtmlTags=true)
{
	$sql = "select * from messeges WHERE GID='".$gid."'";
	$result = executeQuary($sql);
	if (mysql_num_rows($result)==0)
		echo "אין הודעות";
	while ($myRecord = mysql_fetch_array($result))
					{
						if ($myRecord[Message]=="")
							echo "אין הודעות";
						
						$newstr = $myRecord[Message];
						if (!$withHtmlTags)
						{
							$newstr=strip_tags($newstr);
							$newstr = substr($newstr,strrpos($newstr,':') + 1);
						}
						if ($withLineBreaks)
						{
							// Order of replacement
							$str     = $myRecord[Message];
							$order   = array("\r\n", "\n", "\r");
							$replace = '<br/>';
							// Processes \r\n's first so they aren't converted twice.
							$newstr = str_replace($order, $replace, $str);	
						}	
						echo $newstr;
					}
}

// return the hebrow month for given number
function getHebMonth($month)
{
        switch($month)
        {
      
                case 1:		return "ינואר";
                                    break;
                case 2:		return "פברואר";
                                    break;
                case 3:		return "מרץ";
                                    break;
                case 4:    return "אפריל";
                                    break;
                case 5:		return "מאי";
                                    break;
                case 6:		return "יוני";
                                    break;
                case 7:		return "יולי";
                                    break;
                case 8:		return "אוגוסט";
                                    break;
                case 9:		return "ספטמבר";
                                    break;
                case 10:		return "אוקטובר";
                                    break;
                case 11:		return "נובמבר";
                                    break;
                                    
                case 12:		return "דצמבר";
                                    break;
        }                                                                     
}

?>