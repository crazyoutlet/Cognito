<?php
	require_once('inc/header.php');

	
	$displaymsg = '';
	
	if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['hidden'])){
		if ($_POST['hidden'] == $_SESSION['hiddenkey']){
			/* Prevent sending of POST request from third party site*/
			
			/* Clean inputs*/
	
			$clean = array();
			$clean['username']=filter_var($_POST['username'], FILTER_SANITIZE_STRING);
			$clean['password']=filter_var($_POST['password'], FILTER_SANITIZE_STRING);
			
			
			$clean['username']=mysql_real_escape_string($clean['username']);
			$clean['password']=mysql_real_escape_string($clean['password']);
	
			$inputquery = 'SELECT UserId FROM accounts WHERE username = "'.$clean['username'].'" AND password = "'.sha1($clean['password'].$passwordsalt).'" LIMIT 1';
			
			$executeinputquery = mysql_query($inputquery);
			$resultsinputquery = mysql_num_rows($executeinputquery);
			
			if ($resultsinputquery==0){
				$displaymsg = 'Wrong username/password combination';
			}else if($resultsinputquery==1){
				$getinputid = mysql_fetch_array($executeinputquery);
			
				/* Set the last login time */
		
				$insertlastlogintimequery = 'UPDATE accounts SET lastlogin ="'.date( 'Y-m-d H:i:s', time()).'" WHERE username="'.$clean['username'].'" AND password="'.sha1($clean['password'].$passwordsalt).'"';
		
				$results = mysql_query($insertlastlogintimequery);			
			
				$_SESSION['userinfo']=array();
				$_SESSION['userinfo']['userid']=$getinputid[0];
				$_SESSION['userinfo']['username']=$clean['username'];
				
			
				$displaymsg = 'Logged in successfully. Will be redirected';
				
			}
			
						
		}
	}
	
	if (isset($_SESSION['userinfo'])){
		header('Location:home.php');
	}
	
	$_SESSION['hiddenkey']=sha1(time());
	
	
	
?>
<html>
<head>
	<title></title>
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
        <h2>Login</h2>
        <p>
        <?php echo $displaymsg;?>
		<form action='login.php' method='post'>
			Username <input type = 'text' name='username'><br>
			Password <input type = 'password' name='password'><br>
			<input type = 'hidden' name='hidden' value='<?php echo $_SESSION['hiddenkey']?>'>
			<input type="submit">
	
		</form>
        </p>
        <a href="forgot.php">Forgot your password?</a>
		<?php
			$checkregistrationstate = 'SELECT state FROM siteconfig WHERE feature="registration"';
			$registrationstate = mysql_query($checkregistrationstate);
			$registrationstate = mysql_fetch_array($registrationstate);
			$registrationstate = $registrationstate['state'];
			
			if($registrationstate==1){
				//Allow users to register by themself	
				echo '<a href="register.php">Register</a>';
			}
		?>
     
        
        <div id="footer">
        <p id="copyright">&copy; 2008 - <a href="/">Your name</a></p>
        
        <!-- Please don't delete this. You can use this template for free and this is the only way that you can say thanks to me -->
          <p id="dont-delete-this">Design by <a href="http://www.davidkohout.cz">David Kohout</a> | Our tip: <a href="http://www.junglegym.cz/uvodni-stranka.aspx" title="Dětská Hřiště Jungle Gym">Dětská Hřiště</a></p>
        <!-- Thank you :) -->
        
        </div>
        
        </div>
        </div>
        
</body>
</html>