<?php
require_once("UserClass.php");
require_once("generalFunctions.php");
?>
<html> 
	<style type="text/css">  
	    @import url(zivStyle.css);    
	</style>
	<script language="javascript" src="javascripts/javaScriptFunctions.js"></script>
	<head></head>
	<body> 
		<?php
			updates();	
			drawTodoListForm();
		?>
	</body> 
</html> 
<?php
function updates()
{
	if (isset($_POST[id]))
	{
		$val = 1-$_POST[done];
		$sql = "UPDATE todolist Set done='".$val."' WHERE id='".$_POST[id]."'";
	}
	if (!$_POST["newComment"]=="")
		$sql ="INSERT INTO todolist(comment) values('".$_POST["newComment"]."')";
	executeQuary($sql);
}
function drawTodoListForm()
{
	$sql = "SELECT * FROM todolist order by done";
	$result = executeQuary($sql);
	?>
	
	<table>
		<tr>
			<td>
				מה לעשות?
			</td>
		</tr>

	<?php
	while ($myRecord = mysql_fetch_array($result))
			{
				if ($myRecord[done])
				{
					$style = "style=\" text-decoration: line-through; color:red\"";
				}
				else
					$style="";
			?>
		
			<tr>
				<td <?php echo $style ?>>
					<?php echo $myRecord[comment] ?>
				</td>
				<td>
					<FORM action="todo.php" method="POST">
					<input type="hidden" name="id" value="<?php echo $myRecord[id] ?>">
					<input type="hidden" name="done" value="<?php echo $myRecord[done] ?>">
					<input type="submit" name="commit" value="<?if ($myRecord[done]) echo "לא בוצע"; else echo"בוצע"?>">
					</FORM>
				</td>
			</tr>
			
			<?php				
			}
			?>
			</table>
			
			<FORM action="todo.php" method="POST">
			<table>
			<tr>
				<td>
					<input type="text" name="newComment" width="50%">
				</td>
				<td>
					<input type="submit" name="newValue" value="הוספת חדש">
		
				</td>
			</tr>
			</table>
			</FORM>
			<?php 
	?>

	<?php
}
 ?>