<?php
	require_once('inc/header.php');
	if(!isset($_SESSION['userinfo'])){
		header('Location:login.php');
	}

	if(isset($_POST['title'])&&isset($_POST['description'])&&isset($_POST['starting'])&&isset($_POST['groupid'])&&isset($_POST['ending'])){
		$clean= array();
		$clean['title'] = mysql_real_escape_string($_POST['title']);
		
		$clean['description'] = mysql_real_escape_string($_POST['description']);
		$clean['starting'] = mysql_real_escape_string($_POST['starting']);
		$clean['ending'] = mysql_real_escape_string($_POST['ending']);
		
		echo $clean['starting'].' '.$clean['ending'];
		$today = getdate();
		
		$clean['datetime']=$today['year'].'-'.str_pad($today['mon'], 2, 0, STR_PAD_LEFT).'-'.str_pad($today['mday'], 2, 0, STR_PAD_LEFT).' '.date("H:i:s");
		echo $clean['datetime'];
		
		$insertquery = 'INSERT INTO calendar(itemname,description,starttime,endtime,date,groupid,repeatid) VALUES("'.$clean['title'].'","'.$clean['description'].'","'.$clean['starting'].'","'.$clean['ending'].'","'.$clean['datetime'].'","'.$_POST['groupid'].'","1")';
	
		$query = mysql_query($insertquery) or die('shitface');
		
		echo 'success';
	}
?>