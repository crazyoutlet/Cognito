<?php
	require_once('inc/header.php');
	if(!isset($_SESSION['userinfo'])){
		header('Location:login.php');
	}
	
	if(isset($_POST['month'])&&isset($_POST['year'])){
		//var_dump($_SESSION["groupinfoarray"]);
		//VALIDATE THE MONTH AND YEAR!
		$monthheadings = array('January','February','March','April','May','June','July','August','September','October','November','December');
		echo '<h1>'.$monthheadings[$_POST['month']-1].'</h1>';
		
		echo '<table cellpadding="0" cellspacing="0" class="calendar" border="1">';

		$month = $_POST['month'];
		$year = $_POST['year'];
		echo '<input type="hidden" id="calendarmonth" value="'.$month.'">';
		echo '<input type="hidden" id="calendaryear" value="'.$year.'">';
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
			
			/* add in the day number */
			
			//QUERY FOR STUFF
			$month=str_pad($month,2,'0',STR_PAD_LEFT);
			$day=str_pad($list_day,2,'0',STR_PAD_LEFT);
			
			
			$dateformat = $year.'-'.$month.'-'.$day;
			//echo $_SESSION["groupinfoarray"]["groupid"].$dateformat;
			$selectstuff = 'SELECT * FROM  `calendar` WHERE DATE LIKE  "'.$dateformat.'%" AND groupid="'.$_SESSION['groupinfoarray']['groupid'].'" ORDER BY DATE ASC';
			
			$selectstuff = mysql_query($selectstuff) or die('die');
			if(mysql_num_rows($selectstuff)>0){
				echo '<td id="'.$list_day.'" style="background-color:gray;">';
			}else echo '<td id="'.$list_day.'">';			
			//END QUERY FOR STUFF
			echo '<center>'.$list_day.'</center>';
			
			echo '</td>';
			if($running_day == 6){
				echo '</tr>';
				if(($day_counter+1) != $days_in_month){
					echo '<tr>';
				}
				$running_day = -1;
				$days_in_this_week = 0;
			}
			$days_in_this_week++; $running_day++; $day_counter++;
		}
		
		/* finish the rest of the days in the week */
		if($days_in_this_week < 8):
			for($x = 1; $x <= (8 - $days_in_this_week); $x++):
				echo '<td> </td>';
		endfor;
		endif;
		echo '</tr></table>';
	}	
?>