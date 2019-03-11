<?php
include("dbConfig.php");
session_start();
//PHP code to output the Dashboard Values
$email=$_SESSION["email"];
$name=$_SESSION["user_name"];
$folder=$_GET["folder"];
$doc=$_GET["doc"];

 $insert ="Insert into foldercon (fname,docname) value ('".$folder."','".$doc."')";
    $result = mysqli_query($con,$insert);
    header("Location:filetofolder.php?folder=$folder");
?>

