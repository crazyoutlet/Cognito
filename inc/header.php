<?php
	session_start();
	
	require_once('config.php');
	
	mysql_connect('localhost:8888','root','root');
	
	mysql_select_db('project5_cognito');
?>