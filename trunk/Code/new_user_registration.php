<html dir="rtl">
<head>
<meta http-equiv="content-type" content="text/html;charset=iso-8859-8-i">
<title>����� ����</title>
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
<h1>������ ����� - ��� ���� �� ������ ����� �� ��� ������ ������</h1>
<form name="registation" method="POST">
<table>
	<tr>
		<td>*�� ����:</td>
		<td>
			<input type="text" name="first_name" title="���� �� ����" value="<?php print_r($persistent["first_name"])?>">
		</td>
	</tr>
	<tr>
		<td>*�� �����:</td>
		<td>
			<input type="text" name="last_name" title="���� �� �����"value="<?php print_r($persistent["last_name"])?>">
		</td>
	</tr>
		
	<tr>		
		<td>*�� �����:</td>
		<td>
			<input type="text" name="user_name" title="���� �� ����� ������� �������" value="<?php print_r($persistent["user_name"])?>">
		</td>
	</tr>
	
	<tr>
		<td>*�����:</td>
		<td>
			<input type="password" name="pass1"  title="���� ����� �����" value=<?php print_r($persistent["pass1"]) ?>>
		</td>
	</tr>
	
	<tr>
		<td>*����� �����:</td>
		<td>
			<input type="password" name="pass2"  title="���� ����� �����" value=<?php print_r($persistent["pass1"])?>>
		</td>
	</tr>
 	<tr>
		<td>��� ���:</td>
		<td>
			<select name="memberOfGroup"> 
				<?php getGroupsList();?>
			</select>
		</td>
	</tr> 
	<tr>
		<td>���� ����:</td>
		<td>
			<input type="text" name="ID" title="���� ���� ���� �� 9 �����" value="<?php print_r($persistent["ID"])?>">
		</td>
	</tr>
	
	<tr>
		<td>����� ���"�:</td>
		<td>
			<input type="text" name="email" title="���� ����� ���� ��������" value=<?php print_r($persistent["email"]) ?>>
		</td>
	</tr>
	
	<tr>
		<td>����� ����:</td>
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
		<td>�����:</td>
		<td>
			<input type="text" name="phone" title="���� ���� ����� "value=<?php print_r($persistent["phone"]) ?>>
		</td>
	</tr>
	
	<tr>
		<td>����� ������:</td>
		<td>
			<input type="text" name="cell_phone" title="���� ���� ����� ������" value=<?php print_r($persistent["cell_phone"]) ?>>
		</td>
	</tr>
	
	<tr>
		<td>����:</td>
		<td>
			<input type="text" name="city" title="���� �� �� ����� �� ��� ��" value=<?php print_r($persistent["city"]) ?>>
		</td>
	</tr>
	
	<tr>
		<td>����:</td>
		<td>
			<input type="text" name="street" title="���� �� �� ����� �� ��� ��" value=<?php print_r($persistent["street"]) ?>>
		</td>
	</tr>
	
	<tr>
		<td>���� ���:</td>
		<td>
			<input type="text" name="house_number" title="���� �� ���� ���� �� ��� ��" value=<?php print_r($persistent["house_number"]) ?>>
		</td>
	</tr>
	
	<tr>
		<td>�� ���:</td>
		<td>
			<input type="text" name="father_name" title="���� �� �� ���" value="<?php print_r($persistent["father_name"])?>">
		</td>
	</tr>
	<tr>
		<td> ����� �� ���:</td>
		<td>
			<input type="text" name="father_phone" title="���� ���� ����� �� ���" value=<?php print_r($persistent["father_phone"]) ?>>
		</td>
	</tr>
	<tr>
		<td>�� ���:</td>
		<td>
			<input type="text" name="mother_name" title="���� �� �� ���" value="<?php print_r($persistent["mother_name"])?>">
		</td>
	</tr>
	<tr>
		<td>����� �� ���:</td>
		<td>
			<input type="text" name="mother_phone" title="���� ���� ����� �� ���" value=<?php print_r($persistent["mother_phone"]) ?>>
		</td>
	</tr>


</table>
<input type="submit" title="��� ������" value="�����"></form>

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
		echo "<center><b><hr>***  ����� ������ ������   ***<hr> <a href=".$index_page.">���� ����� ����</a></b></center>";
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