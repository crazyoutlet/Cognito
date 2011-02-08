<?php
	require_once('inc/header.php');
	if(!isset($_SESSION['userinfo'])){
		header('Location:login.php');
	
	}
	if(isset($_POST['groupid'])){
		
	
	}

     $fetchposts = 'SELECT grouppost.title,grouppost.message,grouppost.time,grouppost.priorityid,accounts.username FROM grouppost, accounts WHERE groupid = "'.$_POST['groupid'].'" AND grouppost.userid = accounts.userid ORDER BY time DESC LIMIT 20'; 
     $getposts = mysql_query($fetchposts);
     
     
     $test = array();
     while($row = mysql_fetch_array($getposts)){
     	echo '<tr><td>'.$row['username'].'&nbsp;</td><td>';
       	echo '<span style="float:right;">'.$row['time'].'</span>';
       	echo '<b>'.$row['title'].'</b>';
       	echo ' '.$row['message'];
       	echo '</td>';
		echo '<td>'.$row['time'];
       	echo '</td></tr>';
       			
     
      

     }
     
?>