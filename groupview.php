<?php
	require_once('inc/header.php');
	if(!isset($_SESSION['userinfo'])){
		header('Location:login.php');
	}
	if(isset($_GET['groupid'])){
		$number = (int)$_GET['groupid'];
	
	
	
	
		/* Check if groupid is value and the user is allowed to access it*/
		$checkvalue = 'SELECT * FROM groups,group2accounts WHERE groups.groupid = "'.$number.'" AND group2accounts.userid = "'.$_SESSION['userinfo']['userid'].'" LIMIT 1';
		$checkquery = mysql_query($checkvalue);	
		if(mysql_num_rows($checkquery)==1){
					
			$groupinfoarray = mysql_fetch_array($checkquery);
		
			$_SESSION['groupinfoarray'] = $groupinfoarray;
		
		}else{
			header('Location:groups.php');
		}
	
	}
	
?>
<html>
<head>
<title>Cognito</title>
<link href="css/screen.css" type="text/css" rel="stylesheet" media="screen,projection" />
	<script src="jquery.js"></script>
	<script>
		$(document).ready(function(){
			
			$('#submitmessage').click(function(){
				var messagetitle = $('#messagetitle').val();
				var messagecontent = $('#message').val();
				
				$.post("insertprojectmessage.php", { title: messagetitle, message: messagecontent },
   					function(data){
    					getposts();
   				});
			});
			
			function getposts() {
				var gid = $('#groupie').val();
				
				$.post('fetchprojectposts.php',{groupid:gid},
					function(data){
						console.log(data);
						$('#postmessages').html(data);
				
				});	
				
			}
			getposts();
			setInterval(getposts,5000);
			
		});
	</script>
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
       		<h2><?php echo $groupinfoarray['title']?> - </h2>
       		
       		<h3>Latest Activities <span style="font-weight:normal;">(more)</span></h3>

       		
       		<h3>Posts <span style="font-weight:normal;">(more)</span></h3>
       		<input type="hidden" id="groupie" value="<?php echo $groupinfoarray['groupid']; ?>"/>
       		<div id="posts">
       			<table>
       		
       			<div id="postmessages"></div>
       			
       		
       			<tr><td></td><td>
       			
       			Title: <input type="text" id="messagetitle"/>
       			<br><br><textarea rows="5" cols="70" id="message"></textarea>
       			
       			<input type="submit" id="submitmessage"/>
       			
       			</td><td></td>
       			
       			</tr>
       			
       			</table>
       		</div>
       		
       		<h3>Calendar <span style="font-weight:normal;">(more)</span></h3>
       		
       		<h3>Milestones<span style="font-weight:normal;">(more)</span></h3>
       		
       		<h3>Events <span style="font-weight:normal;">(more)</span></h3>
       		
       		<?php
       			$getevents = 'SELECT duration.label, events.title, events.description, events.time FROM duration, events WHERE events.groupid="'.$groupinfoarray['groupid'].'" AND duration.durationid = events.durationid';
       			$fetchevents = mysql_query($getevents);
       			echo '<table>';
       			while($event = mysql_fetch_array($fetchevents)){
       				echo '<tr><td></td><td>';
       				
       				echo '<span style="float:right">'.$event['time'].'</span';
       				echo '<b>'.$event['title'].'</b><br><br>'	;
       				
       				
       				echo $event['description'];
       				echo '<br><br></td></tr>';
       			}
       			echo '</table>';       			
       		?>
       		<h3>Members <span style="font-weight:normal;">(more)</span></h3>
       		<table>
       			<?php
       				$fetchmembers = 'SELECT accounts.username, accounts.userid FROM accounts,group2accounts WHERE accounts.userid = group2accounts.userid ';
       				$fetch = mysql_query($fetchmembers);
       				echo '<table>';
       				while($member = mysql_fetch_array($fetch)){
       					echo '<tr><td><a href="whois.php?username='.$member['username'].'">'.$member['username'].'</td></tr>';
       				}
       				echo '</table>';
       			?>
       		</table>	
       		
       		<h3>Messaging <span style="font-weight:normal;">(more)</span></h3> 
       		<h3>Files <span style="font-weight:normal;">(more)</span></h3>        		
        </div>
        
        <div id="footer">
        <p id="copyright">&copy; 2008 - <a href="/">Your name</a></p>
        
        <!-- Please don't delete this. You can use this template for free and this is the only way that you can say thanks to me -->
          <p id="dont-delete-this">Design by <a href="http://www.davidkohout.cz">David Kohout</a> | Our tip: <a href="http://www.junglegym.cz/uvodni-stranka.aspx" title="D?tsk‡ H?i?t? Jungle Gym">D?tsk‡ H?i?t?</a></p>
        <!-- Thank you :) -->
        
        </div>
        
        </div>
        </div>
</body>
</html>