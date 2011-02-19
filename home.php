<?php
	require_once('inc/header.php');
	if(!isset($_SESSION['userinfo'])){
		header('Location:login.php');
	
	}
	
?>
<html>
<head>
<title>Cognito - Home</title>
<link href="css/screen.css" type="text/css" rel="stylesheet" media="screen,projection" />
</head>
<body>
<div id="layout">
      
      <div id="header">
        
        <h1 id="logo"><a href="index.php" title="#"><span>Project</span> Cognito</a></h1>
        <hr class="noscreen" />   
          
              
     	<?php include('inc/nav.php')  ?>  
        <hr class="noscreen" />  
    
      </div>
          
        <div id="main">
        
        <div id="main-box">
        <div id="quote"><br><br></div>
        </div>
        
        <div id="content">
        <h2>Groups</h2>
       		<?php
       			$retrieveprojects = 'SELECT groups.title, groups.description, groups.groupid FROM groups,group2accounts WHERE group2accounts.groupid = groups.groupid AND group2accounts.userid = "'.$_SESSION['userinfo']['userid'].'"';
       			$results = mysql_query($retrieveprojects);
       			
       			echo '<table><tr class="table-top"><th></th><th>Project Name</th><th>Description</th><th></th></tr>';
       			while($row = mysql_fetch_array($results)){
       				echo '<tr><td></td><td><a href="groupview.php?groupid='.$row['groupid'].'">'.$row['title'].'</a></td><td>'.$row['description'].'</td><td></td></tr>';
       			}
       			echo '</table>';
       			
       		
       		?>
        
        </div>
        </div>
</body>
</html>