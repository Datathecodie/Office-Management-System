<?php
include("dbConfig.php");
session_start();
$name=$_GET["name"];
$fname=$_GET["fname"];


    $insert ="Insert into access (folder,fname) value ('".$name."','".$fname."')";
    $result = mysqli_query($con,$insert);
    header("Location:newverifyfolder.php?name=".$name);


?>