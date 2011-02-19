<?php
	require_once('inc/header.php');
	if(!isset($_SESSION['userinfo'])){
		header('Location:index.php');
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
    					//alert("Data Loaded: " + data);
   				});
			});
			
			$('td').live('click',function(){
				var gid = $('#groupie').val();		  
				var mon = $('#calendarmonth').val();
				var yea = $('#calendaryear').val();	
				
				var squareid = ($(this).attr('id'));
				$.post('fetchcalendarevents.php',{groupid:gid,month:mon,year:yea,dayofmonth:squareid},
					function(data){
					   $('#displaycalendarevents').html(data);
					   
					});
			});
			$('#createnewbutton').live('click',function(event){
				var title = $('#createnewtitle').val();
				var description = $('#createnewdescription').val();
				var selecteddate = $('#selecteddate').val();
				var gid = $('#groupie').val();
				
				if(title!='' && description!=''){
					$.post('createnewcalendaritem.php',{title:title,description:description,date:selecteddate,groupid:gid},
					function(data){
						
					   
					});
				}
			});
			$('#createnewthing').live('click',function(event){
				event.preventDefault();
				//alert($('#selecteddate').val());
									  
				var displaystring =	'<form>Title<input type="text" id="createnewtitle"><br>Description<textarea id="createnewdescription"/><input type="button" id="createnewbutton" value="Create"></form>';
						
				$('#createsomethingnewbox').html(displaystring);					  
									  
			});
						  
			$('.calnav').click(function(event){
				event.preventDefault();
				var value=$(this).html();
				var calendarmonth = $('#calendarmonth').val();
				var calendaryear = $('#calendaryear').val();
				
				if(value=='Previous Month'){
					if(calendarmonth>1&&calendarmonth<=12){
						calendarmonth--;
						
					}
					else if(calendarmonth==1){
						calendarmonth=12;
						calendaryear--;
					}
				}else if(value=="Next Month"){
					if(calendarmonth>=1&&calendarmonth<=11){
						calendarmonth++;
					}else if(calendarmonth==12){
						calendarmonth=1;
						calendaryear++;
					}
							   
				}
				
				$('#calendarmonth').val(calendarmonth);
				$('#calendaryear').val(calendaryear);
							   			   
							   
				$.post('fetchcalendar.php',{month:calendarmonth,year:calendaryear},
					function(data){
					   $('#calendararea').html(data);			  
									  
				});
			});
			
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
        
		<h3>Calendar</h3>
			<input type="hidden" id="groupie" value="<?php echo $groupinfoarray['groupid']; ?>"/>
			<input type="hidden" id="calendarmonth" value="<?php echo '2'; ?>"/>
			<input type="hidden" id="calendaryear" value="<?php echo '2011'; ?>"/>
			
			<a href="#" class="calnav" value="prev">Previous Month</a>
			<a href="#" class="calnav" value="next">Next Month</a>
			<div id="calendararea"><?php include_once('calendardisplay.php');?></div>

			<div id="displaycalendarevents" style="border:1px solid gray; padding:20px"></div>

		
		
		
		
		
        <div id="footer">
        <p id="copyright">&copy; 2008 - <a href="/">Your name</a></p>
        
        </div>
        
        </div>
        </div>
</body>
</html>