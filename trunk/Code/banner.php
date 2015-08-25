<script language="JavaScript" type="text/javascript">
<!--
function logoutSubmit ()
{

  document.LOG_OUT_FORM.logoutPlease.value="true";
  document.LOG_OUT_FORM.submit() ;
}

-->
</script>
<?php
	require_once("UserClass.php"); //include the user class		
	require_once("generalFunctions.php"); //include the user class
	session_start();
	$refererPage = "login.php";
	include("validateSession.php"); //validate session

?>
	<form name="LOG_OUT_FORM" action="mainMenusPage_TABLE.php" method="post"> 
		<input type="hidden" name="logoutPlease" />
		שלום <?php echo $loggedUser->getFirstName() ?> -
		<a title="לחץ כאן אם ברצונך להתנתק" href="javascript:logoutSubmit()">  התנתק</a>
	</form>
	 <table  width="100%">
            <tr   ><!-- row 1 logo and slogan-->   
                <td background = "img/banner.jpg" height="180px">
						
                </td>
            </tr>
    </table>
	<marquee direction=RIGHT id=msgMarq Scrollamount=4 onmouseover="msgMarq.stop()" onmouseout="msgMarq.start()"> <?php getMesseges(1,false);?> </marquee>
	