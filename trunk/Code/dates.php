<?php
function getDay($selectedValue=0)
	{		
		?>
		<option value="0" selected> יום </option>
		<?php
		for ($i=1;$i<32;$i++)
		{
				?>
				<option value="<?php echo "$i" ?>" <?php if ($selectedValue==$i) echo "SELECTED=TRUE" ?>> <?php echo $i ?> </option>
				<?php
		}
	}
function getMonth($selectedValue=0)
	{		
		?>
		<option value="0" selected> חודש </option>
		<?php
		for ($i=1;$i<13;$i++)
		{
				
				?>
				<option value="<?php echo "$i" ?>" <?php if ($selectedValue==$i) echo "SELECTED=TRUE" ?>> <?php echo $i ?> </option>
				<?php
		}
	}
function getYear($selectedValue=0)
	{		
		$date = getdate();
		$currentYear=$date[year];
		?>
		<option value="0" selected> שנה </option>
		<?php
		for ($i=$currentYear;$i>$currentYear-70;$i--)
		{
				?>
				<option value="<?php echo "$i" ?>" <?php if ($selectedValue==$i) echo "SELECTED=TRUE" ?>> <?php echo $i ?> </option>
				<?php
		}
	}
?>