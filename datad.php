<?php
//Server stuff
if(isset($argv[1])){
	$address=$argv[1];
}
else{
	$address="sockets/datad";
}
if(file_exists($address)){unlink($address);}
$socket = socket_create(AF_UNIX, SOCK_STREAM, 0);
socket_bind($socket,$address);
socket_listen($socket);
echo("Connected at address $address \n");
while(chop($request)!="exit"){
	$childsocket=socket_accept($socket);
	$request=socket_read($childsocket,4096);
		//JSON stuff
		$data=array();
		$data[1]=array("currentPage"=>"pageid","lastAction"=>1928378392,"status"=>1);
		$data[2]=array("currentPage"=>"messages","lastAction"=>392721362,"status"=>3);
		$data[3]=array("currentPage"=>"news","lastAction"=>3847223,"status"=>2);
		//$request='{"type":"select","fields":["lastAction","currentPage"],"users":[1,3,4]}';
		//$request='{"type":"update","fields":["lastAction","currentPage"],"users":{"3":[12345678,"index"],"2":[42,"wot"],"5":[1337,"xkcd"]}}';
		$request=json_decode($request,true);
		if($request['type']=="select"){
			$response=array();
			foreach($request['users'] as $value){
				if(isset($data[$value])){
					$response[$value]=array();
					foreach($request['fields'] as $field){
						$response[$value][$field]=$data[$value][$field];
					}
				}
				else{
					$response[$value]=0;
				}
			}
			socket_write($childsocket,json_encode($response));
		}
		if($request['type']=="update"){
			foreach($request['users'] as $user=>$userdata){
				if(!isset($data[intval($user)])){
					$data[intval($user)]=array();
				}
				foreach($request['fields'] as $index=>$field){
					$data[intval($user)][$field]=$userdata[$index];
				}
			}
			socket_write($childsocket,1);
		}
	socket_close($childsocket);
}
socket_close($socket);
unlink($address);
echo("\n");


?>