<div id="navigation">
	<ul><?php
		if(!isset($_SESSION['userinfo'])){echo '
		
		<li><a href="#" title="#">Why Project Cognito</a></li>
        <li id="first"><a href="#" title="#">Features</a></li>
        <li><a href="#" title="#">About</a></li>
        <li><a href="login.php" title="#">Login</a></li>';}
        else{
        	echo '
        	
        		<li><a href="groups.php" title="#">Groups</a></li>
        		<li><a href="logout.php" title="#">Logout</a></li>
        	';
        }
        ?>
    </ul>
</div>