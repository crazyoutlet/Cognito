<?php
	require_once('inc/header.php');
	if(!isset($_SESSION['userinfo'])){
		header('Location:login.php');
	}


	if(isset($_POST['title'])&&isset($_POST['description'])&&isset($_POST['date'])&&isset($_POST['groupid'])){
		$clean= array();
		$clean['title'] = mysql_real_escape_string($_POST['title']);
		
		$clean['description'] = mysql_real_escape_string($_POST['description']);
		$clean['date'] = mysql_real_escape_string($_POST['date']);
		
		$insertquery = 'INSERT INTO calendar(itemname,description,date,groupid,repeatid) VALUES("'.$clean['title'].'","'.$clean['description'].'","'.$clean['date'].'","'.$_POST['groupid'].'","1")';
	
		$query = mysql_query($insertquery) or die('shitface');
	}
?>