<?php
include ('sessioncheck.php');
//session_start();
// TI
//include ('php_files/dbconnect.php');

session_destroy();
header("Location:../index.php");
exit;

?>