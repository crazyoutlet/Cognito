<?php
	require_once('inc/header.php');
	if(!isset($_SESSION['userinfo'])){
		header('Location:login.php');
	
	}
	
	if(isset($_POST['message'])&&isset($_POST['title'])){
		$clean['message'] = nl2br($_POST['message']);
		$clean['message'] = mysql_real_escape_string($clean['message']);
		
		$clean['title'] = nl2br($_POST['title']);
		$clean['title'] = mysql_real_escape_string($clean['title']);
		
		var_dump($clean);
		var_dump($_SESSION['groupinfoarray']);
		
		
		#$insertmessage = 'INSERT INTO grouppost(groupid,userid,title,message,time,priority) VALUES("'.1.'","'.1.'","'.1.'","'.1.'","'.1.'","'.1.'")';
		
		
		
	}
	

?>