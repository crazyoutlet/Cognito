<?php
	function updateDaemon($jsonString){
		$dataDaemonSocket="sockets/datad";
		$socket = socket_create(AF_UNIX, SOCK_STREAM, 0);
		socket_connect($socket,$address);
			socket_write($socket,$jsonString);
			//return JSON string right away
			return(socket_read($socket,8192));		
	}
?>