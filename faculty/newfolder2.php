<?php
include("dbConfig.php");
session_start();
$name=$_POST["name"];
$desc=$_POST["desc"];
date_default_timezone_set('Asia/Kolkata');
$date1 = date("y/m/d h:i:s");

    $insert ="Insert into folder (name,description,date) value ('".$name."','".$desc."','".$date1."')";
    $result = mysqli_query($con,$insert);
    header("Location:newverifyfolder.php?name=$name");   
?>