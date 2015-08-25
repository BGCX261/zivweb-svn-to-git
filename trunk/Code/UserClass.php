<?php 
require_once("dataValidation.php");
require_once("generalFunctions.php");
require_once("dates.php");

class User{
	private $uname="";
	private $passwd="";
	private $email="";
	private $phone="";
	private $cellPhone="";
	private $firstName="";
	private $lastName="";
	private $id="";
	private $BirthYear="";
	private $birthMonth="";
	private	$birthDay="";
	private $city="";
	private $Street="";
	private $houseNumber="";
	private $permission="";
	private $memberOfGroup="";
	private $approvedUser="";
	private $motherName="";
	private $fatherName="";
	private $fatherPhoneNo="";
	private $motherPhoneNo="";
	private $parrentPermission="";
	private $payment="";
	
	private function setUname($uname){ $this->uname=(validate_user_name($uname))? $uname:"";}
	
	private function setEmail($email){$this->email=(validate_email($email))? $email:"";}
	
	private function setPhone($phone){$this->phone=(validate_Phone($phone))? $phone:"";}

	private function setPasswd($passwd_arr)
		{
			if(validate_pass1($passwd_arr[1]))
			{
				if(validate_pass2($passwd_arr[1], $passwd_arr[2]))
				{
					$this->passwd=md5( $passwd_arr[2]);
				}
				else{$this->passwd="";}
			}
		}
	
	public function getFirstName(){return $this->firstName;}
	
	public function getLastName(){return $this->lastName;}
	
	public function getUname(){return $this->uname;}
	
	public function getmemberOfGroup(){return $this->memberOfGroup;}
	
	function getPasswd(){return $this->passwd;}
	
	function getEmail(){return $this->email;}
	
	function getPhone(){return $this->phone;}
	
	function getPermissionID(){return $this->permission[PID];}

	function clearAll(){$this->uname="";$this->passwd="";$this->email="";$this->phone="";}	
	/*******************************************************************************
	 * Name: approved
	 * Discription: This method returns true if the user is approved in the system
	 *******************************************************************************/
	public function  approved()
	{
		return $this->approvedUser;
	}
	public function refresh()
	{
		$this->getUserDetails();
	}
/*******************************************************************************
*Name: checkIfAllowed
*Discription: This method check if a user is allowd a specific part of the preivilages
*input: the permission type (e.g alloewd to edit users)
*output: true or false
*Author: Amit Eitan
*Date: 9/10/2008 14:32
********************************************************************************/
public function checkIfAllowed($permissionType)
{
		return $this->permission[$permissionType];
}
/*******************************************************************************
 * Name: getUserDetails()
 * Description: This method updates the UserClass data with data from database
 * Input: None
 * OutPut: None
 *******************************************************************************/
	private function getUserDetails()
	{
		$sql = "SELECT * FROM USERS WHERE Username = '". $this->uname ."'";
		$result = executeQuary($sql); 
		$myRecord = mysql_fetch_array($result);
		$this->firstName=$myRecord["FirstName"];
		$this->lastName=$myRecord["LastName"];
		$this->approvedUser=$myRecord["Approved"];
		$this->id=$myRecord["ID"];
		$this->phone=$myRecord["Phone"];
		$this->cellPhone=$myRecord["CellPhone"];
		$this->email=$myRecord["Email"];	
		$this->passwd = $myRecord["Password"];
		$this->BirthYear=$myRecord["YearOfBirth"];
		$this->birthDay=$myRecord["DayOfBirth"];
		$this->birthMonth=$myRecord["MonthOfBirth"];
		$this->city=$myRecord["City"];
		$this->Street=$myRecord["Street"];
		$this->houseNumber=$myRecord["HouseNumber"];
		$this->memberOfGroup=getUserGroup($this->uname);
		
		$this->permission=getPermissionID($this->uname,true);

		$this->approvedUser=$myRecord["Approved"];
		$this->fatherName=$myRecord["FatherName"];
		$this->fatherPhoneNo=$myRecord["FatherPhone"];
		$this->motherName=$myRecord["MotherName"];
		$this->motherPhoneNo=$myRecord["MotherPhone"];
		$this->payment==$myRecord["payment"];
		$this->parrentPermission=$myRecord["parrentsPermission"];
	}
	/*
	 * Constuctor creates A user and get's the details from the database
	 * or does not do any thing
	 * Discription - pai is a difualt value to prevent someone gueesing the name that represent's
	 * no name at all
	 */
	function __construct($userName=3.1415926535)
	{
		if (!($userName==3.1415926535)) //if it's an empty constructor
		{
			$this->uname=$userName;
			$this->getUserDetails();
		}			
	}
	
/*
 * Name:login()
 * Discription: This method check if the password and username Match 
 * Input: (Using the $_POST at the Login Page)
 * Output: returns true if there is a match.
 * 			false if NOT
 */
	function login()
	{
		if(validate_user_name($_POST["uname"]))
			{
			$uname=$_POST["uname"];
			}
		else{ 
			return FALSE;
			}
			
		if(validate_pass1($_POST["passwd"]))
			{
			$hash_passwd=md5($_POST["passwd"]);
			}
		else
			{
				return FALSE;
			}
		$sql = "SELECT username, Password FROM USERS where username = '".$uname."' AND Password='".$hash_passwd."'"; 
		$result = 	executeQuary($sql); 
		if ($myRecord = mysql_fetch_array($result)) 
			{ 
			if($uname == $myRecord['username'] && $hash_passwd == $myRecord['Password']) 
				{ 
				$this->setUname($uname);
				$tmpPassArr[1]=$_POST["passwd"];$tmpPassArr[2]=$_POST["passwd"];
				$this->setPasswd($tmpPassArr);
				$this->getUserDetails();
				return true; 
				}
				else
					{return  false;} 
			}
			else
				{return  false;} 
		}
/*******************************************************************************
*Name: 
*Discription:
*input: 
*output:
*Author: 
*Date: 
********************************************************************************/
//		function updateUserInfo(){
//		$new_u_id=$_POST["new_u_id"];
//		$old_u_id=$_POST["old_u_id"];
//		$new_uname=$_POST["new_uname"];
//		$old_uname=$_POST["old_uname"];
//		$sql = "UPDATE USER SET user_id='$new_u_id' ,uname='$new_uname' WHERE user_id='$old_u_id'";
//		$result = executeQuary($sql);  
//		echo mysql_error();
//		if (mysql_affected_rows($db)>=1){
//			echo "<br/>Update completed. <br/>";
//			echo "$sql";
//			return true; 
//		}else{ return  false;} 
//	}
function updateUserData($details)
{
	//$sql = "DELETE FROM users WHERE UserName='".$details["uname"]."'";  //remove current user from System
	//$result = executeQuary($sql);
	//$sqlUpdateQuary = "UPDATE users SET Approved='1' WHERE ".$sqlString;
		
	/*ReInsert the user to the system*/
	$sql = "UPDATE users Set ";
	//$sql = $sql."UserName='".$details["uname"]."'";
	$sql = $sql."FirstName='".$details["firstName"]."',";
	$sql = $sql."LastName='".$details["lastName"]."',";
	$sql = $sql."ID='".$details["id"]."',";
	$sql = $sql."City='".$details["city"]."',";
	$sql = $sql."Street='".$details["street"]."',";
	$sql = $sql."HouseNumber='".$details["houseNumber"]."',";
	$sql = $sql."CellPhone='".$details["cellPhone"]."',";
	$sql = $sql."Phone='".$details["phone"]."',";
	$sql = $sql."Email='".$details["email"]."',";
	$sql = $sql."FatherName='".$details["fatherName"]."',";
	$sql = $sql."MotherName='".$details["motherName"]."',";
	$sql = $sql."FatherPhone='".$details["fatherPhoneNumber"]."',";
	$sql = $sql."MotherPhone='".$details["motherPhoneNumber"]."',";
	$sql = $sql."YearOfBirth='".$details["year_of_birth"]."',";
	$sql = $sql."MonthOfBirth='".$details["month_of_birth"]."',";
	$sql = $sql."DayOfBirth='".$details["day_of_birth"]."'";
	$sql = $sql." WHERE UserName='".$details["uname"]."'";
	
	$result = executeQuary($sql);
	
	/*Update Group*/
	
	if ($details["memberOfGroup"]>0)
	{
	//TODO ////////////////////////////////////////
//	echo "<div dir=ltr>";
//	echo "<HR>IN GROUP<HR><center>";
//	print_r($_POST);
//	echo "<HR><HR></center>";
//	echo "</div>";
	
	$sql = "UPDATE users_activitygroups Set SID='".$details["memberOfGroup"]."' WHERE username='".$details["uname"]."'";
	$result = executeQuary($sql);
	if (mysql_affected_rows()==0) //user was not a member of a  group
		{
			$sql ="INSERT INTO users_activitygroups(UserName,SID) values('".$details["uname"]."','". $details["memberOfGroup"]."')";
			$result = executeQuary($sql);
			
		}
	}
	else  //the new group is No group
	{
		$sql = "DELETE FROM users_activitygroups WHERE username='".$details["uname"]."'";
		$result = executeQuary($sql);
	}
	
	/*Update Permission*/
	if ($details["permissionGroup"])
	{
		$sql = "UPDATE usesrpermissionsgroups Set PID='".$details["permissionGroup"]."' WHERE username='".$details["uname"]."'";
		$result = executeQuary($sql);
		if (mysql_affected_rows()==0) //user doesn't have a previos premission
		{
			$sql ="INSERT INTO usesrpermissionsgroups(UserName,PID) values('".$details["uname"]."','". $details["permissionGroup"]."')";
			$result = executeQuary($sql);
			
		}
	}
	else // הרשאת חניך
	{
		$sql = "DELETE FROM usesrpermissionsgroups WHERE username='".$details["uname"]."'";
		$result = executeQuary($sql);
	}
}
/*******************************************************************************
*Name: getUserInfoHTML
*Discription: This method creates a HTML view of the user details  
*input: edit - make the user data editable
*output: HTML code that is in the option format
*Author: Amit Eitan
*Date: 27/9/2008 16:40
********************************************************************************/
function getUserInfoHTML($edit=0,$notAllowdToEdit=0)
	{
		if ($edit)
		{
			$LineStart = "<input type=\"text\" name=\"";
			$LineMiddle = "\" value=\"";
			$LineEnd = "\"";
		}
		else
		{
			$LineStart = "";
			$LineMiddle = "";
			$LineEnd = "";
		}
	 	if (isset($_POST[add_user])) 
	 		{ $addUser=true;
		?>
		<input type="hidden" name="addUser" value="addUser">
		<?php } ?>
	 	
	 	<input type="hidden" name="newUserApproval" value="<?php echo $this->uname?>">
	 	<input type="hidden" name="getUserInfo" value="<?php echo $this->uname?>">
	 	<input type="hidden" name="uname" value="<?php echo $this->uname?>">  
	 	<!-- 
	 	
	 	-->
	 	<table>
	 		<tr>
	 			<td>שם פרטי	</td>
	 			<td><?php //echo $this->firstName ?>
	 				<?php 	echo $LineStart;
	 						if ($edit) echo "firstName";
	 						echo $LineMiddle.$this->firstName.$LineEnd
	 				?>
	 			</td>
	 		</tr>
	 		<tr>
	 			<td>שם משפחה</td>
	 			<td>
	 				<?php 	echo $LineStart;
	 						if ($edit) echo "lastName";
	 						echo $LineMiddle.$this->lastName.$LineEnd
	 				?>
	 			</td>
	 		</tr>
	 		<tr>
	 			<td>שם משתמש</td>
	 			<td>
	 				<?php 	//echo $this->uname; 	?>
	 				<?php 	echo $LineStart;
	 						if ($addUser) echo "uname";
	 						echo $LineMiddle.$this->uname.$LineEnd
	 				?>
	 			</td>
	 		</tr>
	 		<tr>
	 			<td>תעודת זהות</td>
	 			<td>
	 			<?php 	echo $LineStart;
	 					if ($edit) echo "id";
	 					echo $LineMiddle.$this->id.$LineEnd
	 			?>
	 			</td>
	 		</tr>
	 		<tr>
	 			<td>בית ספר</td>
	 			<td>
	 			<?php 	//From generalFunctions.php
	 					if ($edit && ($edit!=-1) ){ ?> 
		 					<select name="memberOfGroup" >
									<?php getGroupsList($this->memberOfGroup); ?> 
							</select>
	 					<?php
	 					}
	 					else 
	 					{	
	 						 getUserGroup($this->uname,true); //Echo to screen
	 					}	
	 			?>
	 			
	 			</td>
	 		</tr>
	 		<tr>
	 			<td>טלפון</td>
	 			<td>
	 			<?php 	echo $LineStart;
	 					if ($edit) echo "phone";
	 					echo $LineMiddle.$this->phone.$LineEnd
	 			?>
	 			</td>
	 		</tr>
	 		<tr>
	 			<td>טלפון נייד</td>
	 			<td>
	 			<?php 	echo $LineStart;
	 					if ($edit) echo "cellPhone";
	 					echo $LineMiddle.$this->cellPhone.$LineEnd
	 			?>
	 			</td>
	 		</tr>
	 		<tr>
	 			<td>דוא"ל</td>
	 			<td>
	 				<?php 	echo $LineStart;
	 					if ($edit) echo "email";
	 					echo $LineMiddle.$this->email.$LineEnd
	 				?>
	 			</td>
	 		</tr>
	 		<tr>
	 			<td> תאריך לידה</td>
	 			<td>
	 				<?php 	//echo $LineStart;
	 						if ($edit) { ?> 
		 								<select name="year_of_birth" >
										<?php getYear($this->BirthYear);?>
										</select>
		
		    
										<select name="month_of_birth" >
										<?php getMonth($this->birthMonth);?>
										</select>
		
		    
										<select name="day_of_birth" >
										<?php getDay($this->birthDay);?>
										</select> <?php
	 								   }
	 						else 
	 						if ((strcmp($this->BirthYear,"")!=0)&&($this->BirthYear!=0)) echo $LineMiddle.$this->birthDay."/".$this->birthMonth."/".$this->BirthYear.$LineEnd; ?></td>
	 		</tr>
	 		<tr>
	 			<td>ישוב</td>
	 			<td>
		 			<?php 	echo $LineStart;
		 					if ($edit) echo "city";
		 					echo $LineMiddle.$this->city.$LineEnd
		 			?>
	 			</td>
	 		</tr>
	 		<tr>
	 			<td>רחוב</td>
	 			<td>
	 				<?php 	echo $LineStart;
	 					if ($edit) echo "street";
	 					echo $LineMiddle.$this->Street.$LineEnd
	 				?>
	 			</td>
	 		</tr>
	 		<tr>
	 			<td>מס' בית</td>
	 			<td>
	 				<?php 	echo $LineStart;
	 					if ($edit) echo "houseNumber";
	 					echo $LineMiddle.$this->houseNumber.$LineEnd
	 				?>
	 			</td>
	 		</tr>
	 		<tr>
	 			<td>שם האב</td>
	 			<td>
	 				<?php 	echo $LineStart;
	 					if ($edit) echo "fatherName";
	 					echo $LineMiddle.$this->fatherName.$LineEnd
	 				?>
	 			</td>
	 		</tr>
	 		<tr>
	 			<td>מספר טלפון של האב</td>
	 			<td>
	 				<?php 	echo $LineStart;
	 					if ($edit) echo "fatherPhoneNumber";
	 					echo $LineMiddle.$this->fatherPhoneNo.$LineEnd
	 				?>
	 			</td>
	 		</tr>
	 		<tr>
	 			<td>שם האם</td>
	 			<td>
	 				<?php 	echo $LineStart;
	 					if ($edit) echo "motherName";
	 					echo $LineMiddle.$this->motherName.$LineEnd
	 				?>
	 			</td>
	 		</tr>
	 		<tr>
	 			<td>מספר טלפון של האם</td>
	 			<td>
	 				<?php 	echo $LineStart;
	 					if ($edit) echo "motherPhoneNumber";
	 					echo $LineMiddle.$this->motherPhoneNo.$LineEnd
	 				?>
	 			</td>
	 		</tr>
	 		<tr>
	 			<td>הרשאות</td>
	 			
	 			<td>
	 				<?php 	//From generalFunctions.php
	 					if ($edit==1) { ?> 
		 					<select name="permissionGroup" >
									<?php getPermissionList($this->permission[PID]);?>
							</select>
	 					<?php
	 					}
	 					else 
	 					{	
	 					if (isset($this->permission[PGroupName])) 
	 						echo $this->permission[PGroupName];
	 					else echo "חניך";
	 					} 
	 				?>
	 				<input type="hidden" name="approved" value="<?php echo $this->approved()?>">
	 				</td>
	 		</tr> 			
	 		<?php
 
			//			$this->birthDay="";
			//			$this->birthMonth="";
			
			//	
			//			$this->city="";
			//			$this->Street="";
			//			$this->houseNumber="";
			//			
			//			$this->memberOfGroup="";
			//			$this->permissionGroup="";
			//			
			//			$this->approvedUser="";
			?>
 
	 	</table>
	 	<table>
	 		<tr>
	 			<?php 
	 				if ($edit)
	 				{
	 					?>
	 					<td>
	 						<input type="submit" name="userUpdateSave" value="שמור שינויים">
	 					</td>
	 					<td>
	 						<input type="submit" name="userUpdeateCancel" value="בטל שינויים">
	 					</td>
	 					<td>
	 						<input type="submit" name="resetPassword" value="איפוס סיסמא" title="איפוס הסיסמא ל1234">
	 					</td>
	 				<?php
	 				}
	 				else
	 				{
	 					if (!$notAllowdToEdit)
	 					{
	 					?><td><input type="submit" name="editUserData" value="ערוך"></td>
	 					<?php
	 					}
	 				}
	 			?>
	 		</tr>
	 	</table>
	 	<?php
	}
}
?>
