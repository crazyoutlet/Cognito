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
	
			$inputquery = 'SELECT UserId FROM cognito_accounts WHERE Username = "'.$clean['username'].'" AND Password = "'.sha1($clean['password'].'yyc478shaocloudrandnamemisterdn').'" LIMIT 1';
			
			$executeinputquery = mysql_query($inputquery);
			$resultsinputquery = mysql_num_rows($executeinputquery);
			
			if ($resultsinputquery==0){
				$displaymsg = 'Wrong username/password combination';
			}else if($resultsinputquery==1){
				$getinputid = mysql_fetch_array($executeinputquery);
			
				/* Set the last login time */
		
				$insertlastlogintimequery = 'UPDATE cognito_accounts SET LastLogin ="'.date( 'Y-m-d H:i:s', time()).'" WHERE Username="'.$clean['username'].'" AND Password="'.sha1($clean['password'].$passwordsalt).'"';
		
							
			
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
</head>
<body>
<?php echo $displaymsg;?>
<form action='login.php' method='post'>
	Username <input type = 'text' name='username'><br>
	Password<input type = 'password' name='password'><br>
	<input type = 'hidden' name='hidden' value='<?php echo $_SESSION['hiddenkey']?>'>
	<input type="submit">

</form>

</body>
</html>