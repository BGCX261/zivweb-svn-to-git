<!-- קובץ זה משמש להצגת התפריטים המתאימים למשתמש שמחובר -->
<?php
require_once("UserClass.php");

//$refererPage = "login.php";
	global $entryPagesDirectory;

?>
<table class="MENU_LIST" width="137">
	<tr  class="MENU_ITEM">
		<td>
			<div  id="addNewFileLayerTitle" onmousemove="javascript:LayerOnMouseOver(addNewFileLayerTitle)" onclick="javascript:showMenu(addNewFileLayer)">
				<a class="MENU_ITEM" href="<?php echo $entryPagesDirectory;?>Wellcom.html" target="DATA_IFRAME">  <big >על   העמותה </big> </a>
			</div>
		</td>
	</tr>
	<tr>
		<td class=SUB_MENU_ITEM>
			<DIV id="addNewFileLayer" class=SUB_MENU_ITEM>
				<a  href="<?php echo $entryPagesDirectory;?>backRound.html " class=SUB_MENU_ITEM target="DATA_IFRAME">רקע</a> <br>
				<a  href="<?php echo $entryPagesDirectory;?>DestOfPop.html"  class=SUB_MENU_ITEM target="DATA_IFRAME">אוכלוסיית היעד</a> <br>
				<a  href="<?php echo $entryPagesDirectory;?>Goals.html"  class=SUB_MENU_ITEM target="DATA_IFRAME">יעדים</a>
			</DIV>			
		</td>
	</tr>
	<tr  class="MENU_ITEM">
		<td>
			<div  id="addNewFileLayerTitle2" onmousemove="javascript:LayerOnMouseOver(addNewFileLayerTitle2)" onclick="javascript:showMenu(addNewFileLayer2)">
				<a class="MENU_ITEM" href="<?php echo $entryPagesDirectory;?>activity.html" target="DATA_IFRAME"><big>מודל פעילות</big></a>
			</div>
		</td>
	</tr>
	<tr>
		<td class=SUB_MENU_ITEM>
			<DIV id="addNewFileLayer2" class=SUB_MENU_ITEM>
				<a  href="<?php echo $entryPagesDirectory;?>activity.html " class=SUB_MENU_ITEM target="DATA_IFRAME"> מודל   פעילות </a> <br>
				<a  href="<?php echo $entryPagesDirectory;?>foucusInOneGroup.html"  class=SUB_MENU_ITEM target="DATA_IFRAME">התמקדות בקבוצה אחת</a> <br>
			</DIV>			
		</td>
	</tr>
</table>	


