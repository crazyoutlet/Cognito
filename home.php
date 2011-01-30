<?php
	require_once('inc/header.php');
?>
<html>
<head>
<title>Cognito - Home</title>
</head>
<body>
	<?php
		echo 'Welcome back, '.$_SESSION['userinfo']['username'];
	?>
	
	
	<a href='logout.php'>Logout</a>
</body>
</html>