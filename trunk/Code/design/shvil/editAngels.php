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
				$food="��";
			else
				$food="���";
			
			if ($myRecord[$electricity])	
				$electricity="��";
			else
				$electricity="���";	

			if ($myRecord[$toilets])	
				$toilets="��";
			else
				$toilets="���";	
						
			if ($myRecord[$shower])	
				$shower="��";
			else
				$shower="���";		
						
			if ($myRecord[$kitchen])	
				$kitchen="��";
			else
				$kitchen="���";		
						
			
			if ($myRecord[$groceries])	
				$groceries="��";
			else
				$groceries="���";		
					
			
			if ($myRecord[$internet])	
				$internet="��";
			else
				$internet="���";	
				
			
			if ($myRecord[$paid])	
				$paid=$myRecord[$paid];
			else
				$paid="����";	
				
				
		/*********************************/
		$discription = "
		<div dir=rtl>
		<!-- Info-->
		<table   align=right>
			<tr>
				<td>
					��
				</td>
				<td>
					�����
				</td>
				<td>
					����
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
				������
			</td>
			<td>
				����
			</td>
			<td>
				�������
			</td>
			<td>
				��� ����
			</td>
			<td>
				������
			</td>
			<td>
				�����
			</td>
			<td>
				�������
			</td>
			<td>
				������
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
	�����
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
	<title>����� ����� �����</title>
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
				��
			</td>
			<td>
				�����
			</td>
			<td>
				�����
			</td>
			<td>
				����
			</td>
			<td>
				�.�
			</td>
			<td>
				�����
			</td>
			<td>
				�� ��
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
						<li>������</li>
					<?php } ?>
					<?php if ($myRecord[electricity]) {?>
						<li>����</li>
					<?php } ?>
					<?php if ($myRecord[toilets]) {?>
						<li>������</li>
					<?php } ?>
					<?php if ($myRecord[shower]) {?>
						<li>�����</li>
					<?php } ?>
					<?php if ($myRecord[kitchen]) {?>
						<li>������</li>
					<?php } ?>
					<?php if ($myRecord[groceries]) {?>
						<li>�����</li>
					<?php } ?>
					<?php if ($myRecord[internet]) {?>
						<li>�������</li>
					<?php } ?>
										
				</ul>
				����:
				<?php if ($myRecord[paid]) {?>
						 <?php echo $myRecord[paid];} else echo"����"?>
			</td>
		</tr>
		<?php					
		}
	?>
	</table>
	<div style="background-color: navy; color: white;">
	<hr>
	����� ���� ���
	<hr>
	</div>
	<form action="editAngels.php" name="addAngel" method="post">
	<table style="direction: rtl; text-align:  right">
			<tr>
				<td>
					��	
				</td>
				<td>
					<input type="text" name="Name">
				</td>
			</tr>
			<tr>
				<td>
					�����	
				</td>
				<td>
					<input type="text" name="address">
				</td>
			</tr>
			<tr>
				<td>
					�����	
				</td>
				<td>
					<input type="text" name="phoneNumber">
				</td>
			</tr>
			<tr>
				<td>
					����	
				</td>
				<td>
					<input type="text" name="email">
				</td>
			</tr>
			<tr>
				<td>
					�.�	
				</td>
				<td style="text-align: right; direction: ltr">
					<input type="text" name="cordE">E/
					<input type="text" name="cordN">N
				</td>
			</tr>
			<tr>
				<td>
					�����
				</td>
				<td>
<textarea rows="3" cols="100" name="comment"></textarea>
					
				</td>
			</tr>
			<tr>
				<td>
					�� ��	
				</td>
				<td>
					
					<TABLE>
						<tr>
							<td>
								<input type="checkbox" name="food" value="1">
							</td>
							<td>
								������
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="electricity" value="1">
							</td>
							<td>
								����
							</td>
						</tr>
						<tr>
 							<td>
								<input type="checkbox" name="toilets" value="1">
							</td>
							<td>
								�������
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="shower" value="1">
							</td>
							<td>
								��� ����
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="kitchen" value="1">
							</td>
							<td>
								������
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="groceries" value="1">
							</td>
							<td>
								�����
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="internet" value="1">
							</td>
							<td>
								�������
							</td>
						</tr>
						<tr>
							<td>
								<input type="checkbox" name="paid" value="1">
							</td>
							<td>
								�����
							</td>
							<td>
								<input type="text" name="paidAmount" value="1">
							</td>
						</tr>
					</TABLE>
				</td>
			</tr>
	</table>
	<input type="submit" name="addNew" value="���� ���">
	</form>
	</center>
</body>
</html>