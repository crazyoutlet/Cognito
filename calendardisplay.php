<?php

?>
<table cellpadding="0" cellspacing="0" class="calendar" border="1">

<?php
	$month = 6;
	$year = 2011;
	$calendar='';
	
	$headings = array('Sun','Mon','Tues','Wed','Thur','Fri','Sat');
	
	echo '<tr><th width="40px">'.implode('</th><th width="40px">',$headings).'</th></tr>';

	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();
	
	echo '<tr>';
	
	for($x = 0; $x < $running_day; $x++){
		echo '<td> </td>';
		$days_in_this_week++;
	}
	
	/* keep going with days.... */
	for($list_day = 1; $list_day <= $days_in_month; $list_day++){
		echo '<td id="'.$list_day.'">';
		/* add in the day number */
		echo '<center>'.$list_day.'</center>';
	
		echo '</td>';
		if($running_day == 6){
			echo '</tr>';
			if(($day_counter+1) != $days_in_month){
				echo '<tr class="calendar-row">';
			}
			$running_day = -1;
			$days_in_this_week = 0;
		}
			$days_in_this_week++; $running_day++; $day_counter++;
		}
	
	/* finish the rest of the days in the week */
		if($days_in_this_week < 8):
			for($x = 1; $x <= (8 - $days_in_this_week); $x++):
				echo '<td class="calendar-day-np"> </td>';
			endfor;
		endif;
	
	
	
?>
</tr></table>