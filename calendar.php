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
	<style>
		.calview{
			float:right;
			background-color:#DDDDDD;
			color:blue;
			margin-left:10px;
		}
		.currentcalendarmode{
			font-weight:bold;
		}
	</style>
	<script>
		function loadcalc(){
				var calendarmonth = $('#calendarmonth').val();
				var calendaryear = $('#calendaryear').val();
				
								
				$.post('fetchcalendar.php',{month:calendarmonth,year:calendaryear},
					function(data){
					   $('#calendararea').html(data);			  
									  
				});

		}
		function initdate(){
			$.post('getdate.php',{type:'date'},
				function(data){
					var datechunks = data.split('-');	  
					$('#calendarmonth').val(datechunks[1]);
					$('#calendaryear').val(datechunks[2]);
					$('#calendarday').val(datechunks[0]);
					
					loadcalc();		  
				});	
			
		}
		function initview(){
			$('#calendarview').val('month');
			$('#calviewmonth').addClass('currentcalendarmode');
			
			
		}			
		$(document).ready(function(){
			
			
			initdate();
			initview();
			
			function rgb2hex(rgb) {
				rgb = rgb.match(/^rgba?\((\d+),\s*(\d+),\s*(\d+)(?:,\s*(\d+))?\)$/);
				function hex(x) {
					return ("0" + parseInt(x).toString(16)).slice(-2);
				}
				return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
			}
			
			var laststored=0;
			var colourstored = '';
			
			$('.calview').live('click',function(){
				var clickedid=$(this).attr('id');
				//first get the value in the hidden 
				var hiddenvalue=$('#calendarview').val();
				if(hiddenvalue=="month"&& clickedid=="calviewday"){
					
					$('#calendarview').val('day');
					
					setInterval(loadcalc,1000);
			
					
					$('#calviewmonth').removeClass('currentcalendarmode');
					$('#calviewday').addClass('currentcalendarmode');

				}else if(hiddenvalue=="day" && clickedid=="calviewmonth"){
					clearInterval(loadcalc);
					$('#calendarview').val('month');
					$('#calviewday').removeClass('currentcalendarmode');
					$('#calviewmonth').addClass('currentcalendarmode');
					
				}
			});
			
			$('td').live('click',function(){
				
				var squareid = ($(this).attr('id'));
				$('#calendarday').val(squareid);
				
				
				var gid = $('#groupie').val();		  
				var mon = $('#calendarmonth').val();
				var yea = $('#calendaryear').val();	
				
				//Clear the old function
				if(laststored>0){
					$('#'+laststored).css('background-color',colourstored);
				
				}
				
				$.post('fetchcalendarevents.php',{groupid:gid,month:mon,year:yea,dayofmonth:squareid},
					function(data){
					   $('#displaycalendarevents').html(data);
					   
					});
					
				
				colourstored = $('#'+squareid).css('background-color');	
				//Color the square red	
				$('#'+squareid).css('background-color','red');
				//Backup to clear when the function is called again
				laststored=squareid;
			});
			$('#createnewbutton').live('click',function(event){
				var title = $('#createnewtitle').val();
				var description = $('#createnewdescription').val();
				var selecteddate = $('#selecteddate').val();
				var gid = $('#groupie').val();
				
				if(title!='' && description!=''){
					$.post('createnewcalendaritem.php',{title:title,description:description,date:selecteddate,groupid:gid},
					function(data){
						//alert('New item added!');
						alert(data);
						loadcalc();
					});
				}
			});
			$('#createnewthing').live('click',function(event){
				event.preventDefault();
				//alert($('#selecteddate').val());
									  
				var displaystring =	'<form>Title<input type="text" id="createnewtitle"><br>Description<textarea id="createnewdescription"/><input type="button" id="createnewbutton" value="Create"></form>';
						
				$('#createsomethingnewbox').html(displaystring);					  
									  
			});
			$('#calnavtoday').click(function(event){
				event.preventDefault();
				initdate();							  
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
        
		<h1>Calendar</h1>
			<input type="hidden" id="groupie" value="<?php echo $_SESSION['groupinfoarray']['groupid']; ?>"/>
			<input type="hidden" id="calendarmonth" value=""/>
			<input type="hidden" id="calendaryear" value=""/>
			<input type="hidden" id="calendarday" value=""/>
			<input type="hidden" id="calendarview" value=""/>
			
			
			<a href="#" class="calnav" value="prev">Previous Month</a>
			<a href="#" class="calnav" value="next">Next Month</a>
			
			<a href="#" id="calnavtoday" value="today">Today</a>
			
			<a href="#" class="calview " id="calviewmonth">Month</a>
			<a href="#" class="calview" id="calviewday">Day</a>
			
			<div class="label">
				<?php
					
				?>
			</div>
			<div id="calendararea"></div>

			<div id="displaycalendarevents" style="border:1px solid gray; padding:20px"></div>

		
		
		
		
		
        <div id="footer">
        <p id="copyright">&copy; 2008 - <a href="/">Your name</a></p>
        
        </div>
        
        </div>
        </div>
</body>
</html>