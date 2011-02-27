<?php
	require_once('inc/header.php');
	if(!isset($_SESSION['userinfo'])){
		header('Location:login.php');
	}
	
	/*SELECT * 
	 FROM  `calendar` 
	 WHERE DATE LIKE  '2011-02-14%'*/
	$clean = array();
	
	function leapcheck($year){
		return ((($year % 4) == 0) && ((($year % 100) != 0) || (($year %400) == 0)));
	}
	
	
	if(isset($_POST['month'])&&isset($_POST['year'])&&isset($_POST['dayofmonth'])){
	
		
		$ok = 1;
		
		//Validate month
		if(is_numeric($_POST['month'])){
			if($_POST['month']<=12 && $_POST['month']>=0){
				$clean['month']=$_POST['month'];
			}else $ok=0;
		}else $ok=0;
		
		//Validate year
		if(is_numeric($_POST['year'])){
			if($_POST['year']<=2100 && $_POST['year']>=2010){
				$clean['year']=$_POST['year'];
			}else $ok=0;
		}else $ok=0;
		
		//Validate dayofmonth
		if(is_numeric($_POST['dayofmonth'])){
			//February
			
			
			
			if($clean['month']==2){
				if(leapcheck($clean['year'])){
					if($_POST['dayofmonth']>=0 && $_POST['dayofmonth']<=29){
						$clean['dayofmonth']=$_POST['dayofmonth'];
					}else{
						$ok=0;
					}
				}else {
					if($_POST['dayofmonth']>=0 && $_POST['dayofmonth']<=28){
						$clean['dayofmonth']=$_POST['dayofmonth'];
					}else{
						$ok=0;
					}
				}
				
			}else{
				if($_POST['dayofmonth']<=31 && $_POST['dayofmonth']>=0){
					$clean['dayofmonth']=$_POST['dayofmonth'];
				}else{
					$ok=0;
				}
			}
		}else{
			$ok=0;
		}
		
		
		//If validated
		if($ok==1){
			
			echo '<a id="createnewthing" href="#" style="float:right;">Create new thing</a><br><div id="createsomethingnewbox"></div>';
			
			$clean['month']=str_pad($clean['month'],2,'0',STR_PAD_LEFT);
			$clean['dayofmonth']=str_pad($clean['dayofmonth'],2,'0',STR_PAD_LEFT);
			
			$dateformat = $clean['year'].'-'.$clean['month'].'-'.$clean['dayofmonth'];
			
			$_SESSION['currentselecteddate']=$dateformat;
			
			$fetchstuff = 'SELECT * FROM  `calendar` WHERE DATE LIKE  "'.$dateformat.'%" AND groupid="'.$_SESSION['groupinfoarray']['groupid'].'" ORDER BY DATE ASC';
			$fetchstuff = mysql_query($fetchstuff);
			while($stuffrow = mysql_fetch_array($fetchstuff)){
				//var_dump($stuffrow);
				$line = '<h5>'.$stuffrow['itemname'].'</h5>';
				$line .='<p>'.$stuffrow['description'].'</p>';
				$line .='<span>'.$stuffrow['date'].'</span>';
				
				
				echo $line;
			}
			echo '<input type="hidden" value="'.$dateformat.'" id="selecteddate">';
		}
	}
	
?>
