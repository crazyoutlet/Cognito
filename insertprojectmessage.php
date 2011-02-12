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
		
		$groupid = $_SESSION['groupinfoarray']['groupid'];
		$userid = $_SESSION['userinfo']['userid'];
		
		
		$insertmessage = 'INSERT INTO grouppost(groupid,userid,title,message,time,priorityid) VALUES("'.$groupid.'","'.$userid.'","'.$clean['title'].'","'.$clean['message'].'","'.date( 'Y-m-d H:i:s', time())
		.'","1")';
		$message = mysql_query($insertmessage);
		echo $message;
		
	}
	

?>