<?php
	require_once('inc/header.php');

	unset($_SESSION['userinfo']);
	header('Location:index.php');


?>