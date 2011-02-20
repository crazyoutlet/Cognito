<?php
	if(isset($_POST['type'])){
		if($_POST['type']=='date'){
			echo date('d-m-Y');
		}
	}
?>