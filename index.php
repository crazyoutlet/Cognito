<?php
	require_once('inc/header.php');
	if(isset($_SESSION['userinfo'])){
		header('Location:home.php');
	}
?>
<html>
<head>
<title>Cognito</title>
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
        <h2>Lorem ipsum dolor sit amet</h2>
        <p>Lorem ipsum dolor sit amet, <a href="/">consectetur</a> adipisicing elit, sed do eiusmod tempor incidi dunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercita tion ullamco laboris nisi ut aliquip ex ea commodo. cidi dunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercita tion ullamco laboris nisi ut aliquip ex ea <a href="/">commodo</a>. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidi dunt ut labore et dolore magna aliqua.
        </p>
        
        <h3>LOREM IPSUM DOLOR SIT AMET</h3>
        
            <div class="thumbnail">
            <a href="/"><img src="img/sample.gif" alt="" width="130" height="95" /></a><br />
            </div>
            <div class="thumbnail">
            <a href="/"><img src="img/sample.gif" alt="" width="130" height="95" /></a><br />
            </div>
            <div class="thumbnail">
            <a href="/"><img src="img/sample.gif" alt="" width="130" height="95" /></a><br />
            </div>
            <div class="thumbnail">
            <a href="/"><img src="img/sample.gif" alt="" width="130" height="95" /></a><br />
            </div>
            <div class="thumbnail">
            <a href="/"><img src="img/sample.gif" alt="" width="130" height="95" /></a><br />
            </div>
        
            <hr class="noscreen clear" />
        
        <h2>Lorem ipsum dolor sit amet</h2>
        <p>Lorem ipsum dolor sit amet, <a href="/">consectetur</a> adipisicing elit, sed do eiusmod tempor incidi dunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercita tion ullamco laboris nisi ut aliquip ex ea commodo. cidi dunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercita tion ullamco laboris nisi ut aliquip ex ea <a href="/">commodo</a>.
        </p>
        
        
        <table>
          <tr class="table-top">
            <td>Sample table</td>
            <td>Sample table</td>
            <td>Sample table</td>
            <td>Sample table</td>
          </tr>
          <tr>
            <td>Lorem ipsum</td>
            <td>Lorem ipsum</td>
            <td>Lorem ipsum</td>
            <td>Lorem ipsum</td>
          </tr>
          <tr>
            <td>Lorem ipsum</td>
            <td>Lorem ipsum</td>
            <td>Lorem ipsum</td>
            <td>Lorem ipsum</td>
          </tr>
          <tr>
            <td>Lorem ipsum</td>
            <td>Lorem ipsum</td>
            <td>Lorem ipsum</td>
            <td>Lorem ipsum</td>
          </tr>
          </table>
          
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidi dunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercita tion ullamco laboris nisi ut aliquip ex ea commodo. </p><p>Cidi dunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercita tion ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidi dunt ut labore et dolore magna aliqua.</p>
        </div>
        
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