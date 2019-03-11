<?php 
	
	define('HOST','localhost');
	define('USER','root');
	define('PASS','');
	define('DB','officesystem');
	
	$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect '.mysqli_connect_error());
	$ocon = new mysqli(HOST,USER,PASS,DB);
	
	if($ocon->connect_error)
	{
		die("Connection failed : ".$ocon->connect_error);
	}

?>