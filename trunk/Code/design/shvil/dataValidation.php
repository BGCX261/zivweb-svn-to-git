<?php
include_once("Definitions.php");
$mosConfig_locale_debug = 0;
$mosConfig_locale_use_gettext = 0;
/*******************************************************************************
*Name: executeQuary
*Discription: This method get a sql command executes it and returns the result set  
*input: a sql command (as String)
*output: reult set that results from the queary executed
* Author: Amit Eitan
* Date: 6/9/2008 2:19
********************************************************************************/
function executeQuary($sql)
	{		
	 	global $dbServer;
	 	global $dbUser;
	 	global $dbPassword;
	 	global $dbSchemeSelect;

	 	$db = mysql_connect($dbServer,$dbUser,$dbPassword) or die('error message');
		$Bool_val=mysql_select_db($dbSchemeSelect,$db);
		$result = mysql_query($sql,$db); 
		return $result;
	}
?>
<?php
/*******************************************************************************
*Name: Validate_Request
*Discription: 
*input: 
*output:
* Author:
* Date: 
********************************************************************************/
function Validate_Request()
    {
    global $persistent;
    unset($errors);
    foreach($_REQUEST as $key=>$val)
        {
        	switch($key){
                case "first_name": if(validate_first_name($val))
                                        {
                                        $persistent[$key]=$val;
                                        }
                                    else
                                        {
                                        $persistent[$key]="";
                                        }
                                    break;
                case "last_name": if(validate_last_name($val))
                                        {
                                        $persistent[$key]=$val;
                                        }
                                    else
                                        {
                                        $persistent[$key]="";
                                        }
                                    break; 
				case "ID": if(validate_ID($val))
                                        {
                                        $persistent[$key]=$val;
                                        }
                                    else
                                        {
                                        $persistent[$key]="";
                                        }
                                    break;                                                                                         
                case "user_name": if (validate_user_name($val))
                                        {
                                        	if (!checkIfUserNameExsists($val))
                                        		$persistent[$key]=$val;
                                        	else
                                        		$persistent[$key]="";
                                        }
                                    else
                                        {
                                        $persistent[$key]="";
                                        }
                                    break;
                case "pass1": if (validate_pass1($val))
                                        {
                                        $persistent[$key]=$val;
                                        } 
                                    else
                                        {
                                        $persistent[$key]="";
                                        }
                                    break;
                case "pass2": if (validate_pass2($val))
                                        {
                                        $persistent[$key]=$val;
                                        }
                                    else
                                        {
                                        $persistent[$key]="";
                                        }
                                    break;
                case "email": if(validate_email($val))
                                       {
                                        $persistent[$key]=$val;
                                       }
                                    else
                                        {
                                        $persistent[$key]="";
                                        }
                                    break;
                case "year_of_birth": if(validate_YearOfBirth($val))
                                        {
                                        $persistent[$key]=$val;
                                        }
                                    else
                                        {
                                        $persistent[$key]="";
                                        }
                                    break; 
                case "phone": if(validate_Phone($val))
                                        {
                                        $persistent[$key]=$val;
                                        }
                                    else
                                        {
                                        $persistent[$key]="";
                                        }
                                    break;
                case "cell_phone": if(validate_CellPhone($val))
                                        {
                                        $persistent[$key]=$val;
                                        }
                                    else
                                        {
                                        $persistent[$key]="";
                                        }
                                    break;
                case "city": if(validate_city($val))
                                        {
                                        $persistent[$key]=$val;
                                        }
                                    else
                                        {
                                        $persistent[$key]="";
                                        }
                                    break;
                case "street": if(validate_street($val))
                                        {
                                        $persistent[$key]=$val;
                                        }
                                    else
                                        {
                                        $persistent[$key]="";
                                        }
                                    break;
                case "house_number": if(validate_houseNumber($val))
                                        {
                                        $persistent[$key]=$val;
                                        }
                                    else
                                        {
                                        $persistent[$key]="";
                                        }
                                    break; 
                case "father_name": if(validate_father_name($val))
                                        {
                                        $persistent[$key]=$val;
                                        }
                                    else
                                        {
                                        $persistent[$key]="";
                                        }
                                    break;
                case "mother_name": if(validate_mother_name($val))
                                        {
                                        $persistent[$key]=$val;
                                        }
                                    else
                                        {
                                        $persistent[$key]="";
                                        }
                                    break;
                case "father_phone": if(validate_father_CellPhone($val))
                                        {
                                        $persistent[$key]=$val;
                                        }
                                    else
                                        {
                                        $persistent[$key]="";
                                        }
                                    break;
                case "mother_phone": if(validate_mother_CellPhone($val))
                                        {
                                        $persistent[$key]=$val;
                                        }
                                    else
                                        {
                                        $persistent[$key]="";
                                        }
                                    break;
                case "memberOfGroup": 	{
                                        $persistent[$key]=$val;
                                        }
                                    break;
                case "year_of_birth": 	{
                                        $persistent[$key]=$val;
                                        }
                                    break;   
                case "month_of_birth": 	{
                                        $persistent[$key]=$val;
                                        }
                                    break;  
                case "day_of_birth": 	{
                                        $persistent[$key]=$val;
                                        }
                                    break;                                                                                                                                                                                                                            
            }
            
        }
    }
/*******************************************************************************
*Name: validate_first_name
*Discription: 
*input: 
*output:
* Author:
* Date: 
********************************************************************************/
function validate_first_name($uname){
	$msg="==> שם פרטי ";
	if(isHTML($uname, $msg)){return FALSE;};
	if(isempty($uname, $msg)){return FALSE;};
	if(isRestrictedChars($uname, $msg)){return FALSE;};
	return TRUE;
}
/*******************************************************************************
*Name: validate_last_name
*Discription: 
*input: 
*output:
* Author:
* Date: 
********************************************************************************/
function validate_last_name($uname){
	$msg="==> שם משפחה ";
	if(isHTML($uname, $msg)){return FALSE;};
	if(isempty($uname, $msg)){return FALSE;};
	if(isRestrictedChars($uname, $msg)){return FALSE;};
	return TRUE;
}
/*******************************************************************************
*Name: validate_ID
*Discription: 
*input: 
*output:
* Author:
* Date: 
********************************************************************************/
function validate_ID($number){
	$msg="==> מספר זהות ";
	if(isHTML($number, $msg)){return FALSE;};
	if(isRestrictedChars($number, $msg)){return FALSE;};
	if(isNotNum($number, $msg)){return FALSE;};
	if(isNotID($number, $msg)){return FALSE;};
	return TRUE;
}
?>
<?php
/*******************************************************************************
*Name: validate_user_name
*Discription: 
*input: 
*output:
* Author:
* Date: 
********************************************************************************/
function validate_user_name($uname){
	$msg="==> שם משתמש ";
	if(isHTML($uname, $msg)){return FALSE;};
	if(isempty($uname, $msg)){return FALSE;};
	if(isRestrictedChars($uname, $msg)){return FALSE;};
	return TRUE;
}
?>
<?php
/*******************************************************************************
*Name: checkIfUserNameExsists
*Discription: 
*input: 
*output:
* Author:
* Date: 
********************************************************************************/
function checkIfUserNameExsists($uname){
//	$sql = "SELECT * FROM users WHERE username =" . "'" . $uname ."'";
//	global $errors;
//	echo $sql;
//	$result = executeQuary($sql);
//	if (!empty($result))
//		{
//		$msg="==> שם משתמש ";
//		$errors[]=$msg." שם משתמש כבר קיים במערכת";
//		return True;
//		}
	return False;
}
 ?>
<?php
/*******************************************************************************
*Name: validate_pass1
*Discription: 
*input: 
*output:
* Author:
* Date: 
********************************************************************************/
function validate_pass1($pass){
	$msg="==>Password";
	if(isHTML($pass, $msg)){return FALSE;};
	if(isempty($pass, $msg)){return FALSE;};
	if(isRestrictedChars($pass, $msg)){return FALSE;};
	return TRUE;
}
 ?>
<?php
/*******************************************************************************
*Name: validate_pass2
*Discription: 
*input: 
*output:
* Author:
* Date: 
********************************************************************************/
function validate_pass2($pass){
	$msg="==>Password (confirm)";
	if(isHTML($pass, $msg)){return FALSE;};
	if(isempty($pass, $msg)){return FALSE;};
	if(isRestrictedChars($pass, $msg)){return FALSE;};
	if(isNotConfirmed($pass,$_REQUEST["pass1"],$msg)){return FALSE;};
	return TRUE;
}
 ?>
<?php
/*******************************************************************************
*Name: validate_email
*Discription: 
*input: 
*output:
* Author:
* Date: 
********************************************************************************/
function validate_email($email){
	$msg="==>Email";
	if(isHTML($email, $msg)){return FALSE;};
	if(isRestrictedChars($email, $msg)){return FALSE;};
	if(isNotEmail($email, $msg)){return FALSE;};
	return TRUE;
}
 ?>
<?php
/*******************************************************************************
*Name: validate_YearOfBirth
*Discription: 
*input: 
*output:
* Author:
* Date: 
********************************************************************************/
function validate_YearOfBirth($number){
	$msg="==>שנת לידה";
	if(isHTML($number, $msg)){return FALSE;};
	if(isRestrictedChars($number, $msg)){return FALSE;};
	if(isNotNum($number, $msg)){return FALSE;};
	if(isNotYear($number, $msg)){return FALSE;};
	return TRUE;
}
 ?>
<?php
/*******************************************************************************
*Name: validate_Phone
*Discription: 
*input: 
*output:
* Author:
* Date: 
********************************************************************************/
function validate_Phone($phone){
	$msg="==>טלפון";
	if(isHTML($phone, $msg)){return FALSE;};
	if(isRestrictedChars($phone, $msg)){return FALSE;};
	if(isNotNum($phone, $msg)){return FALSE;};
	if(isNotPhone($phone, $msg)){return FALSE;};
	return TRUE;
}
?>
<?php
/*******************************************************************************
*Name: validate_CellPhone
*Discription: 
*input: 
*output:
* Author:
* Date: 
********************************************************************************/
function validate_CellPhone($phone){
	$msg="==>סלולרי";
	if(isHTML($phone, $msg)){return FALSE;};
	if(isRestrictedChars($phone, $msg)){return FALSE;};
	if(isNotNum($phone, $msg)){return FALSE;};
	if(isNotCellPhone($phone, $msg)){return FALSE;};
	return TRUE;
}
/*******************************************************************************
*Name: validate_city
*Discription: 
*input: 
*output:
* Author:
* Date: 
********************************************************************************/
function validate_city($uname){
	$msg="==> עיר ";
	if(isHTML($uname, $msg)){return FALSE;};
	if(isRestrictedChars($uname, $msg)){return FALSE;};
	return TRUE;
}
/*******************************************************************************
*Name: validate_street
*Discription: 
*input: 
*output:
* Author:
* Date: 
********************************************************************************/
function validate_street($uname){
	$msg="==> רחוב ";
	if(isHTML($uname, $msg)){return FALSE;};
	if(isRestrictedChars($uname, $msg)){return FALSE;};
	return TRUE;
}
/*******************************************************************************
*Name: validate_houseNumber
*Discription: 
*input: 
*output:
* Author:
* Date: 
********************************************************************************/
function validate_houseNumber($number){
	$msg="==>מספר בית";
	if(isHTML($number, $msg)){return FALSE;};
	if(isRestrictedChars($number, $msg)){return FALSE;};
	if(isNotNum($number, $msg)){return FALSE;};
	return TRUE;
}
/*******************************************************************************
*Name: validate_father_name
*Discription: 
*input: 
*output:
* Author:
* Date: 
********************************************************************************/
function validate_father_name($uname){
	$msg="==> שם האב ";
	if(isHTML($uname, $msg)){return FALSE;};
	if(isRestrictedChars($uname, $msg)){return FALSE;};
	return TRUE;
}
/*******************************************************************************
*Name: validate_mother_name
*Discription: 
*input: 
*output:
* Author:
* Date: 
********************************************************************************/
function validate_mother_name($uname){
	$msg="==> שם האם ";
	if(isHTML($uname, $msg)){return FALSE;};
	if(isRestrictedChars($uname, $msg)){return FALSE;};
	return TRUE;
}
/*******************************************************************************
*Name: validate_father_CellPhone
*Discription: 
*input: 
*output:
* Author:
* Date: 
********************************************************************************/
function validate_father_CellPhone($phone){
	$msg="==>טלפון האב";
	if(isHTML($phone, $msg)){return FALSE;};
	if(isRestrictedChars($phone, $msg)){return FALSE;};
	if(isNotNum($phone, $msg)){return FALSE;};
	if(isNotPhone($phone, $msg)) {return FALSE;};
	return TRUE;
}
/*******************************************************************************
*Name: validate_mother_CellPhone
*Discription: 
*input: 
*output:
* Author:
* Date: 
********************************************************************************/
function validate_mother_CellPhone($phone){
	$msg="==>טלפון האם";
	if(isHTML($phone, $msg)){return FALSE;};
	if(isRestrictedChars($phone, $msg)){return FALSE;};
	if(isNotNum($phone, $msg)){return FALSE;};
	if(isNotPhone($phone, $msg)) {return FALSE;};
										
	return TRUE;
}
/*******************************************************************************
*Name: isempty
*Discription: 
*input: 
*output:
* Author:
* Date: 
********************************************************************************/
function isempty($var, $msg) {
	global $errors;
	if(empty($var)){
		$errors[]=$msg." השדה ריק";
		return TRUE;
	}
	return FALSE;
}
/*******************************************************************************
*Name: isHTML
*Discription: 
*input: 
*output:
* Author:
* Date: 
********************************************************************************/
function isHTML($var, $msg){
	global $errors;
	if(strcmp(htmlspecialchars($var), $var) != 0 || strcmp(strip_tags($var), $var) != 0){
		$var="";
		$errors[]=$msg.": HTML special charaters are not allowed";
		return TRUE;
	}
	return FALSE;
}
/*******************************************************************************
*Name: isNotNum
*Discription: 
*input: 
*output:
* Author:
* Date: 
********************************************************************************/
function isNotNum($var,$msg){
	global $errors;
	if(empty($var))		return FALSE;
	if(!ctype_digit($var)){
		$var="";
		$errors[]=$msg." אינו מספר";
		return TRUE;
	}
	return FALSE;
}
/*******************************************************************************
*Name: isNotConfirmed
*Discription: 
*input: 
*output:
* Author:
* Date: 
********************************************************************************/
function isNotConfirmed($var1,$var2, $msg){
	global $errors;
	if(strcmp($var1,$var2) != 0){
		$var1="";$var2="";
		$errors[]=$msg." אימות סיסמא לא תואם";
		return TRUE;
	}
	return FALSE;
}
/*******************************************************************************
*Name: isRestrictedChars
*Discription: 
*input: 
*output:
* Author:
* Date: 
********************************************************************************/
function isRestrictedChars(&$var, $msg){
	global $errors;
	$restricted=FALSE;
	for($i=0; $i<strlen($var);$i++){
		switch($var[$i]){
			case "'": $restricted=TRUE;break;
			case '"': $restricted=TRUE;break;
			case '`': $restricted=TRUE;break;
		}
	}
	if($restricted){
			$errors[]=$msg . ": התוים ` ' \" אינם חוקיים "; 
	}
	return $restricted;
}
/*******************************************************************************
*Name: isNotEmail
*Discription: 
*input: 
*output:
* Author:
* Date: 
********************************************************************************/
function isNotEmail(&$var, $msg){
	global $errors;
	if(empty($var))	return FALSE;
	if(isHTML($var,"")){$var=""; return TRUE;}
	//$RegularExpression="/^([a-z0-9]([a-z0-9_-]*\.?[a-z0-9])*)(\+[a-z0-9]+)?@([a-z0-9]([a-z0-9-]*[a-z0-9])*\.)*([a-z0-9]([a-z0-9-]*[a-z0-9]+)*)\.[a-z]{2,6}$/i";
	$RegularExpression="/^(([a-z0-9]+)|([a-z0-9]+\.[a-z0-9]+))@([a-z0-9]+\.[a-z0-9]+)+$/i";

	if(!preg_match($RegularExpression, $var)){
		$var=""; 
		$errors[]=$msg . ": אנא הכנס כתובת דואר חוקית";
		return TRUE;
	}
	return FALSE;
}
/*******************************************************************************
*Name: isNotYear
*Discription: 
*input: 
*output:
* Author:
* Date: 
********************************************************************************/
function isNotYear(&$var, $msg){
	global $errors;
	if(empty($var))	return FALSE;
	if(isHTML($var,"")){$var=""; return TRUE;}
	$RegularExpression="/^(([1-2])([0,9])([0-9])([0-9]))+$/i";

	if(!preg_match($RegularExpression, $var)){
		$var=""; 
		$errors[]=$msg . ": אנא הכנס שנת לידה חוקית";
		return TRUE;
	}
	return FALSE;
}
/*******************************************************************************
*Name: isNotID
*Discription: 
*input: 
*output:
* Author:
* Date: 
********************************************************************************/
function isNotID(&$var, $msg){
	global $errors;
	if(empty($var))	return FALSE;
	if(isHTML($var,"")){$var=""; return TRUE;}
	$RegularExpression="/^(([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9]))+$/i";

	if(!preg_match($RegularExpression, $var)){
		$var=""; 
		$errors[]=$msg . ": אנא הכנס מספר זהות חוקי";
		return TRUE;
	}
	return FALSE;
}
/*******************************************************************************
*Name: isNotPhone
*Discription: 
*input: 
*output:
* Author:
* Date: 
********************************************************************************/
function isNotPhone(&$var, $msg){
	global $errors;
	if(empty($var))	return FALSE;
	if(isHTML($var,"")){$var=""; return TRUE;}
	$RegularExpression1="/^(([0])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9]))+$/i";
	$RegularExpression2="/^(([0])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9]))+$/i";
	$RegularExpression3="/^(([0])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9]))+$/i";
	
	if((!preg_match($RegularExpression1, $var))&&(!preg_match($RegularExpression2, $var))&&(!preg_match($RegularExpression3, $var))){
		$var=""; 
		$errors[]=$msg . ": אנא הכנס מספר טלפון חוקי";
		return TRUE;
	}
	return FALSE;
}
/*******************************************************************************
*Name: isNotCellPhone
*Discription: 
*input: 
*output:
* Author:
* Date: 
********************************************************************************/
function isNotCellPhone(&$var, $msg){
	global $errors;
	if(empty($var))	return FALSE;
	if(isHTML($var,"")){$var=""; return TRUE;}
	$RegularExpression3="/^(([0])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9]))+$/i";

	if(!preg_match($RegularExpression, $var)){
		$var=""; 
		$errors[]=$msg . ": אנא הכנס מספר טלפון סלולרי חוקי";
		return TRUE;
	}
	return FALSE;
}
/*******************************************************************************
*Name: echo_errors
*Discription: 
*input: 
*output:
* Author:
* Date: 
********************************************************************************/
function echo_errors()
{
	global $errors;
	foreach($errors as $key=>$err){
		if(strcmp("==>", substr($err,0,3)) == 0){
			echo "<font color=\"red\">".$err. "</font><br/>";
		}
	}
	return count($errors);
}?>