<?php
	require_once('inc/header.php');
	if(!isset($_SESSION['userinfo'])){
		header('Location:login.php');
	}
	echo '<h1>Date view - '.$_SESSION['currentselecteddate'].'</h1>';
	$hours = 24;
	
		
	$fetchstuff = 'SELECT * FROM  `calendar` WHERE DATE LIKE  "'.$_SESSION['currentselecteddate'].'%" AND groupid="'.$_SESSION['groupinfoarray']['groupid'].'" ORDER BY DATE ASC';
	$fetchstuff = mysql_query($fetchstuff);
	while($stuffrow = mysql_fetch_array($fetchstuff)){
		$line = '<h5>'.$stuffrow['itemname'].' '.$stuffrow['starttime'].' '.$stuffrow['endtime'].'</h5>';
		echo $line;
	}
	
	
	echo '<table border="1">';
	for($i=0;$i<$hours;$i++){
		echo '<tr>';
			echo '<td width="100px">'.$i.':00 - '.($i).':59 </td>';
			
			
			
			echo '<td colspan="10">hello</td>';
			
		echo '</tr>';
	}
	echo '</table>';
?>