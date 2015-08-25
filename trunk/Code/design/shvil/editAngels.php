<?php
include_once("dataValidation.php");
if (isset($_POST[createKML]))
{
	global $kmlStart;
	global $kmlEnd;
	
	$handle = fopen("test.kml", "w");
	fwrite($handle,$kmlStart);
	
	$sql = "SELECT * FROM angels ORDER BY cordN DESC";
	$result = executeQuary($sql);
	while ($myRecord = mysql_fetch_array($result))
		{
		/*********************************/	
			if ($myRecord[$food])	
				$food="יש";
			else
				$food="אין";
			
			if ($myRecord[$electricity])	
				$electricity="יש";
			else
				$electricity="אין";	

			if ($myRecord[$toilets])	
				$toilets="יש";
			else
				$toilets="אין";	
						
			if ($myRecord[$shower])	
				$shower="יש";
			else
				$shower="אין";		
						
			if ($myRecord[$kitchen])	
				$kitchen="יש";
			else
				$kitchen="אין";		
						
			
			if ($myRecord[$groceries])	
				$groceries="יש";
			else
				$groceries="אין";		
					
			
			if ($myRecord[$internet])	
				$internet="יש";
			else
				$internet="אין";	
				
			
			if ($myRecord[$paid])	
				$paid=$myRecord[$paid];
			else
				$paid="חינם";	
				
				
		/*********************************/
		$discription = "
		<div dir=rtl>
		<!-- Info-->
		<table   align=right>
			<tr>
				<td>
					שם
				</td>
				<td>
					טלפון
				</td>
				<td>
					מייל
				</td>
			</tr>

			<tr>
				<td>
					$myRecord[name]
				</td>
				<td>
					$myRecord[phoneNumber]
				</td>
				<td>
					$myRecord[email]
				</td>
			</tr>
		</table>
		<br>
		<br>
		<br>
<!-- HEADER-->
	<table  border=1>
		<tr>
			<td>
				ארוחות
			</td>
			<td>
				חשמל
			</td>
			<td>
				שירותים
			</td>
			<td>
				מים חמים
			</td>
			<td>
				מטבחון
			</td>
			<td>
				מכולת
			</td>
			<td>
				אינטרנט
			</td>
			<td>
				בתשלום
			</td>
		</tr>
<!-- DATA -->
		<tr>
			<td>	
				$food
			</td>	
			<td>	
				$electricity
			</td>	
			<td>	
				$toilets		
			</td>	
			<td>	
				$shower		
			</td>	
			<td>	
				$kitchen		
			</td>	
			<td>	
				$groceries	
			</td>	
			<td>	
				$internet
			</td>	
			<td>	
				$paid
			</td>	
		</tr>
	</table>
	</div>
	<hr>
	הערות
	<hr> $myRecord[comment]	
	";
		$placeMark = "<Placemark>
		<name>test</name>
		<description> <![CDATA[
		$discription 
		 ]]>
		</description>
		<LookAt>
			<longitude>$myRecord[cordN]</longitude>
			<latitude>$myRecord[cordE]</latitude>
			<altitude>0</altitude>
			<range>1200.0</range>
			<tilt>0</tilt>
			<heading>0.3835492093822805</heading>
		</LookAt>
		<styleUrl>#msn_ylw-pushpin</styleUrl>
		<Point>
			<coordinates>$myRecord[cordN],$myRecord[cordE],0</coordinates>
		</Point>
	</Placemark>";
		fwrite($handle,$placeMark);
		}
	
	
	
	fwrite($handle,$kmlEnd);
	fclose($handle);
}
if (isset($_POST[addNew]))
{
//	print_r($_POST);
//	echo "<hr>";
	$sqlSTART = "INSERT INTO angels (Name,phoneNumber,email,cordE,cordN,comment,food,electricity,toilets,shower,kitchen,groceries,internet,paid,address) ";
	if (!isset($_POST[food]))
		$_POST[food]=0;
	if (!isset($_POST[electricity]))
		$_POST[electricity]=0;
	if (!isset($_POST[toilets]))
		$_POST[toilets]=0;
	if (!isset($_POST[shower]))
		$_POST[shower]=0;
	if (!isset($_POST[kitchen]))
		$_POST[kitchen]=0;
	if (!isset($_POST[groceries]))
		$_POST[groceries]=0;
	if (!isset($_POST[internet]))
		$_POST[internet]=0;
	if (!isset($_POST[paid]))
		{
		$_POST[paid]=0;
		$_POST[paidAmount]=0;
		}	
	$sqlValues="VALUES ('$_POST[Name]','$_POST[phoneNumber]','$_POST[email]','$_POST[cordE]','$_POST[cordN]','$_POST[comment]','$_POST[food]','$_POST[electricity]','$_POST[toilets]','$_POST[shower]','$_POST[kitchen]','$_POST[groceries]','$_POST[internet]','$_POST[paidAmount]','$_POST[address]')";
	$sql=$sqlSTART.$sqlValues;
	//printSqlQuary($sql);
	executeQuary($sql);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html dir='rtl'>

<head>
	<title>עריכת מלאכי השביל</title>
</head>

<body>
	<?php
//		$sql = "SELECT * FROM angels";
//		$result = executeQuary($sql);
//		while ($myRecord = mysql_fetch_array($result))
//		{
//			print_r($myRecord);					
//		}
	?>
	<form action="editAngels.php" method="POST" name="createKML"> 
		<input type="submit" name="createKML" value="createKML"></input> 
	</form>
	<center >
	<table border =1 width="100%" style="text-align: right; vertical-align: top; direction: rtl" >
		<!--  HEADER -->
		<tr style="vertical-align: top">
			<td>
				שם
			</td>
			<td>
				יישוב
			</td>
			<td>
				טלפון
			</td>
			<td>
				מייל
			</td>
			<td>
				נ.צ
			</td>
			<td>
				הערות
			</td>
			<td>
				מה יש
			</td>
		</tr>
		<!--  TABLE DATA ROWS -->
		<?php
		$sql = "SELECT * FROM angels ORDER BY cordN DESC";
		$result = executeQuary($sql);
		while ($myRecord = mysql_fetch_array($result))
		{
		?>
		<tr style="vertical-align: top">
			<td>
				<?php echo $myRecord[Name] ?>
			</td>
			<td>
				<?php echo $myRecord[address] ?>
			</td>
			<td>
				<?php echo $myRecord[phoneNumber] ?>
			</td>
			<td>
				<?php echo $myRecord[email] ?>
			</td>
			<td>
				<?php echo $myRecord[cordE]."/".$myRecord[cordN] ?>
			</td>
			<td>
				<?php echo $myRecord[comment] ?>
			</td>
			<td>
				<ul>
					<?php if ($myRecord[food]) {?>
						<li>ארוחות</li>
					<?php } ?>
					<?php if ($myRecord[electricity]) {?>
						<li>חשמל</li>
					<?php } ?>
					<?php if ($myRecord[toilets]) {?>
						<li>שרותים</li>
					<?php } ?>
					<?php if ($myRecord[shower]) {?>
						<li>מקלחת</li>
					<?php } ?>
					<?php if ($myRecord[kitchen]) {?>
						<li>מטבחון</li>
					<?php } ?>
					<?php if ($myRecord[groceries]) {?>
						<li>מכולת</li>
					<?php } ?>
					<?php if ($myRecord[internet]) {?>
						<li>אינטרנט</li>
					<?php } ?>
										
				</ul>
				מחיר:
				<?php if ($myRecord[paid]) {?>
						 <?php echo $myRecord[paid];} else echo"חינם"?>
			</td>
		</tr>
		<?php					
		}
	?>
	</table>
	<div style="background-color: navy; color: white;">
	<hr>
	הוספת מלאך חדש
	<hr>
	</div>
	<form action="editAngels.php" name="addAngel" method="post">
	<table style="direction: rtl; text-align:  right">
			<tr>
				<td>
					שם	
				</td>
				<td>
					<input type="text" name="Name">
				</td>
			</tr>
			<tr>
				<td>
					יישוב	
				</td>
				<td>
					<input type="text" name="address">
				</td>
			</tr>
			<tr>
				<td>
					טלפון	
				</td>
				<td>
					<input type="text" name="phoneNumber">
				</td>
			</tr>
			<tr>
				<td>
					מייל	
				</td>
				<td>
					<input type="text" name="email">
				</td>
			</tr>
			<tr>
				<td>
					נ.צ	
				</td>
				<td style="text-align: right; direction: ltr">
					<input type="text" name="cordE">E/
					<input type="text" name="cordN">N
				</td>
			</tr>
			<tr>
				<td>
					הערות
				</td>
				<td>
<textarea rows="3" cols="100" name="comment"></textarea>
					
				</td>
			</tr>
			<tr>
				<td>
					מה יש	
				</td>
				<td>
					
					<TABLE>
						<tr>
							<td>
								<input type="checkbox" name="food" value="1">
							</td>
							<td>
								ארוחות
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="electricity" value="1">
							</td>
							<td>
								חשמל
							</td>
						</tr>
						<tr>
 							<td>
								<input type="checkbox" name="toilets" value="1">
							</td>
							<td>
								שירותים
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="shower" value="1">
							</td>
							<td>
								מים חמים
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="kitchen" value="1">
							</td>
							<td>
								מטבחון
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="groceries" value="1">
							</td>
							<td>
								מכולת
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="internet" value="1">
							</td>
							<td>
								אינטרנט
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="paid" value="1">
							</td>
							<td>
								תשלום
							</td>
							<td>
								<input type="text" name="paidAmount" value="1">
							</td>
						</tr>
					</TABLE>
				</td>
			</tr>
	</table>
	<input type="submit" name="addNew" value="הוסף חדש">
	</form>
	</center>
</body>
</html>