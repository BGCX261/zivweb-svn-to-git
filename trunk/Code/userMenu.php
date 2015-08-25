<!-- קובץ זה משמש להצגת התפריטים המתאימים למשתמש שמחובר -->
<?php
require_once("UserClass.php");
session_start();
$refererPage = "login.php";
include("validateSession.php"); //validate session

?>
<table class="MENU_LIST">
	<tr  class="MENU_ITEM">
		<td>
			<a class="MENU_ITEM" href="mainPage.php" target="DATA_IFRAME">דף ראשי</a>
		</td>
	</tr>
	<tr  class="MENU_ITEM">
		<td>
			<a class="MENU_ITEM" href="gaming.php" target="DATA_IFRAME">משחקיה</a>
		</td>
	</tr>
	<tr  class="MENU_ITEM">
		<td>
			<a class="MENU_ITEM" href="chatCheck.html" target="DATA_IFRAME">צ'אט</a>
		</td>
	</tr> 
	<?php if ($loggedUser->checkIfAllowed("viewForum")){ ?>
	<tr  class="MENU_ITEM">
		<td>
			<a class="MENU_ITEM" href="forumMainPage.php" target="DATA_IFRAME">פורום</a>
		</td>
	</tr>
	<?php } ?>
  	<?php if ($loggedUser->checkIfAllowed("sendMessageToGroup")) {?>	
  	<tr  class="MENU_ITEM">
		<td>
			<a href="manageMessages.php" target="DATA_IFRAME">הודעות לקבוצה</a>
		</td>
	</tr>
	<?} ?>
	<?php if ($loggedUser->checkIfAllowed("viewUsers")) {?>
	<tr  class="MENU_ITEM">
		<td>
		  		<a class="MENU_ITEM" href="manageUsers.php" target="DATA_IFRAME">ניהול משתמשים</a>
		 </td>
	</tr>
	<?} ?>
	<?php if ($loggedUser->checkIfAllowed("viewGroups")) {?>
		<tr  class="MENU_ITEM">
			<td>
		  		<a class="MENU_ITEM" href="manageGroups.php" target="DATA_IFRAME">ניהול קבוצות</a>
		  	</td>
		</tr>
	<?} ?>
	<?php if ($loggedUser->checkIfAllowed("viewPermissions")) {?>
		<tr  class="MENU_ITEM">
			<td>
		  		<a class="MENU_ITEM" href="managePermissionGroups.php" target="DATA_IFRAME">ניהול הרשאות</a>
		  	</td>
		</tr>	
	<?} ?>
		  		<?php if ($loggedUser->checkIfAllowed("viewInstructorsFolder")) {?>
		<tr  class="MENU_ITEM">
			<td>
		  		<a class="MENU_ITEM" href="guideFolder.php" target="DATA_IFRAME">תיק מדריך</a>
		  	</td>
		</tr>
		  		<?} ?>
		  		<?php if ($loggedUser->checkIfAllowed("viewInstructorsFolder")) {?>
		<tr  class="MENU_ITEM">
			<td>
		  		<a class="MENU_ITEM" href="manageNavalCenters.php" target="DATA_IFRAME">מרכזים ימיים</a>
		  	</td>
		</tr>
		  		<?} ?>
		<tr  class="MENU_ITEM">
			<td>
		  		<a class="MENU_ITEM" href="userDetailes.php" target="DATA_IFRAME">הנתונים שלי</a>
		  	</td>
		</tr>
		<tr  class="MENU_ITEM_TITLE">
			<td>
		  		 מילוי טפסים
		  	</td>
		 </tr>
		  <?php if ($loggedUser->checkIfAllowed("viewAttendecy")) {?>
		  <tr class="MENU_ITEM">
				<td>
		  			<a class="MENU_ITEM" href="guideReports.php" target="DATA_IFRAME">דיווח יומי - נוכחות</a>
		  	  	</td>
		 </tr>
 		<?php } ?>
  		<tr class="MENU_ITEM_TITLE">
			<td>
  				דוחות
  			</td>
  		</tr>
		 <tr class="MENU_ITEM">
			<td>
		  		דו"ח 1
			</td>
		</tr>
		<tr class="MENU_ITEM">
			<td>
		  		<a href="todo.php" target="DATA_IFRAME">מה נשאר?</a>
	  		</td>
  
		
</table>	


