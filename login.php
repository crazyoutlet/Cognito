<?php
	require_once('inc/header.php');
	
	
	if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['hidden'])){
		if ($_POST['hidden'] == $_SESSION['hiddenkey']){
			echo 'fattay';
		
		}
	}
	
	$_SESSION['hiddenkey']=sha1(time());
	
	
	
?>
<html>
<head>
<title></title>
</head>
<body>
<form action='login.php' method='post'>
	<input type = 'text' name='username'>
	<input type = 'password' name='password'>
	<input type = 'hidden' name='hidden' value='<?php echo $_SESSION['hiddenkey']?>'>
	<input type="submit">

</form>

</body>
</html>