<html dir="rtl">
<head>
<meta http-equiv="content-type" content="text/html;charset=iso-8859-8-i">
<title>הרשמה לאתר</title>
</head>
<body>
<?php
require_once("Definitions.php");
require_once("dataValidation.php");
require_once("generalFunctions.php");
require_once("dates.php");

function draw_page($persistent)
{
?>
<h1>ברוכים הבאים - אנא מלאו את הפרטים הבאים על מנת להצטרף למערכת</h1>
<form name="registation" method="POST">
<table>
	<tr>
		<td>*שם פרטי:</td>
		<td>
			<input type="text" name="first_name" title="הכנס שם פרטי" value="<?php print_r($persistent["first_name"])?>">
		</td>
	</tr>
	<tr>
		<td>*שם משפחה:</td>
		<td>
			<input type="text" name="last_name" title="הכנס שם משפחה"value="<?php print_r($persistent["last_name"])?>">
		</td>
	</tr>
		
	<tr>		
		<td>*שם משתמש:</td>
		<td>
			<input type="text" name="user_name" title="הכנס שם משתמש באותיות לועזיות" value="<?php print_r($persistent["user_name"])?>">
		</td>
	</tr>
	
	<tr>
		<td>*סיסמא:</td>
		<td>
			<input type="password" name="pass1"  title="הכנס סיסמה סודית" value=<?php print_r($persistent["pass1"]) ?>>
		</td>
	</tr>
	
	<tr>
		<td>*אימות סיסמא:</td>
		<td>
			<input type="password" name="pass2"  title="הכנס סיסמה סודית" value=<?php print_r($persistent["pass1"])?>>
		</td>
	</tr>
 	<tr>
		<td>בית ספר:</td>
		<td>
			<select name="memberOfGroup"> 
				<?php getGroupsList();?>
			</select>
		</td>
	</tr> 
	<tr>
		<td>מספר זהות:</td>
		<td>
			<input type="text" name="ID" title="הכנס מספר זהות בן 9 ספרות" value="<?php print_r($persistent["ID"])?>">
		</td>
	</tr>
	
	<tr>
		<td>כתובת דוא"ל:</td>
		<td>
			<input type="text" name="email" title="הכנס כתובת דואר אלקטרוני" value=<?php print_r($persistent["email"]) ?>>
		</td>
	</tr>
	
	<tr>
		<td>תאריך לידה:</td>
		<td>   
			<select name="year_of_birth" >
			<?php getYear();?>
			</select>
		
		    
			<select name="month_of_birth" >
			<?php getMonth();?>
			</select>
		
		    
			<select name="day_of_birth" >
			<?php getDay();?>
			</select>
		</td>
	</tr>
	
	<tr>
		<td>טלפון:</td>
		<td>
			<input type="text" name="phone" title="הכנס מספר טלפון "value=<?php print_r($persistent["phone"]) ?>>
		</td>
	</tr>
	
	<tr>
		<td>טלפון סלולרי:</td>
		<td>
			<input type="text" name="cell_phone" title="הכנס מספר טלפון סלולרי" value=<?php print_r($persistent["cell_phone"]) ?>>
		</td>
	</tr>
	
	<tr>
		<td>ישוב:</td>
		<td>
			<input type="text" name="city" title="הכנס את שם הישוב בו אתה גר" value=<?php print_r($persistent["city"]) ?>>
		</td>
	</tr>
	
	<tr>
		<td>רחוב:</td>
		<td>
			<input type="text" name="street" title="הכנס את שם הרחוב בו אתה גר" value=<?php print_r($persistent["street"]) ?>>
		</td>
	</tr>
	
	<tr>
		<td>מספר בית:</td>
		<td>
			<input type="text" name="house_number" title="הכנס את מספר הבית בו אתה גר" value=<?php print_r($persistent["house_number"]) ?>>
		</td>
	</tr>
	
	<tr>
		<td>שם האב:</td>
		<td>
			<input type="text" name="father_name" title="הכנס את שם האב" value="<?php print_r($persistent["father_name"])?>">
		</td>
	</tr>
	<tr>
		<td> טלפון של האב:</td>
		<td>
			<input type="text" name="father_phone" title="הכנס מספר טלפון של האב" value=<?php print_r($persistent["father_phone"]) ?>>
		</td>
	</tr>
	<tr>
		<td>שם האם:</td>
		<td>
			<input type="text" name="mother_name" title="הכנס את שם האם" value="<?php print_r($persistent["mother_name"])?>">
		</td>
	</tr>
	<tr>
		<td>טלפון של האם:</td>
		<td>
			<input type="text" name="mother_phone" title="הכנס מספר טלפון של האם" value=<?php print_r($persistent["mother_phone"]) ?>>
		</td>
	</tr>


</table>
<input type="submit" title="לחץ להרשמה" value="הירשם"></form>

<?php
}
Validate_Request();
if(isset($persistent) ){
	if(empty($errors)){
		/*INSERT NEW USER INTO USERS TABLE*/
		$sql ="INSERT INTO users(UserName,FirstName,LastName,ID,City,Street,HouseNumber,CellPhone,Phone,Email,Password,Approved,YearOfBirth,MonthOfBirth,DayOfBirth,FatherName,FatherPhone,MotherName,MotherPhone)";
		$sql.=" values('" . $persistent["user_name"]. "','"  . $persistent["first_name"]. "','"  . $persistent["last_name"]. "','"  . $persistent["ID"] . "','"  . $persistent["city"]. "','"  . $persistent["street"]. "','"  . $persistent["house_number"]. "','"  . $persistent["cell_phone"]. "','"  . $persistent["phone"]. "','"  . $persistent["email"]. "','"  . md5($persistent["pass1"]). "',"  .  "'0'". ",'"  . $persistent["year_of_birth"]. "','"  . $persistent["month_of_birth"]. "','" .  $persistent["day_of_birth"]. "','"  . $persistent["father_name"]. "','"  .$persistent["father_phone"]. "','"  . $persistent["mother_name"]. "','"  .  $persistent["mother_phone"]  . "')";
		//printSqlQuary($sql);
		$result = executeQuary($sql);
		
		/*INSERT NEW USER INTO USERS-GROUPS TABLE*/
		$sql ="INSERT INTO users_activitygroups(UserName,SiD)";
		$sql.=" values('" . $persistent["user_name"]. "','"  . $persistent["memberOfGroup"]. "')";
		$result = executeQuary($sql);
		echo "<center><b><hr>***  רישום הסתיים בהצלחה   ***<hr> <a href=".$index_page.">חזרה לעמוד הבית</a></b></center>";
	}
	else{
		draw_page($persistent);
		echo_errors();
	}
}
else{
	draw_page($persistent);
}
?> 
</body>