<?php

$user='root';
$pass='';
$db='testdb';

$conn = new mysqli('localhost',$user,$pass,$db) or die("unable to connect");
if($conn)
	echo "Connection OK";
else{
	
	echo "Connection failed";
}
?>