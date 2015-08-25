<?php
/*
 * Filename: Login.php
 * Description: this file dispalys the user loginpage and performs the login checks
 * Author: Amit Eitan
 */
session_start();
require_once("UserClass.php");
$aUser=new User();
global $index_page; //the address of the sites main page
if(!$aUser->login())
	{
	?>
	<html dir="rtl">
	<head>
	<!-- 
		<meta http-equiv="content-type" content="text/html;charset=iso-8859-8-i">
	 -->
	<style type="text/css">  
	    @import url(zivStyle.css);    
	</style>
	<title>����� ����</title>
	</head>
	<body>
		<h1>����� ������� ������</h1>
		<form name="registation" method="post">
		<?php if ($_POST[trys]<4) 
		{
		?>
		<table>
			<tr> 
				<td>�� �����:</td>
				<td>
					<input type="text" name="uname" value=<?php $aUser->getUname()?>>
				</td>
				<td>
					<input type="hidden" name="trys" value="<?php echo ($_POST[trys]+1) ?>">
					<div class="QUARY_RESULT_ERROR">				
					<?php if ($_POST[trys]>0) 
						echo "�� ����� �� ����� �� ������";		
					?>
					</div>
					
					
				</td>
			</tr>
			<tr>
				<td>�����:</td>
					<td>
						<input type=password name=passwd  value=>
					</td>
				</tr>
		</table>
		<input type=submit value=�����></form>
		<?php
		} else
		echo "���� ��� �������� �������" ?>
		<a href=new_user_registration.php>��� �� �� �����? ����� ����</a><br/>
		
	<?php
	}
else{
	
	$_SESSION['user']=$aUser;		
	if ($aUser->approved())
		{
		$redirect="Location:mainMenusPage_TABLE.php";
		echo header($redirect);
		}
	else
		{
		?>
		<div class="WAITING_FOR_APPROVAL">
			����� ������ �����
			<br>
			<a href="<?php echo $index_page ?>">���� ����� ����</a>
		</div>
		<?php
		}
	}
	?>
	</body>
</html>