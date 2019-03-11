<?php
include("dbConfig.php");
session_start();
$title=$_GET["title"];
$name=$_GET["name"];


    $insert ="Insert into verify (title,fname,verified) value ('".$title."','".$name."','no')";
    $result = mysqli_query($con,$insert);
    $insert ="update request set done = 'yes' where title= '".$title."'" ;
    $result = mysqli_query($con,$insert);
    $_SESSION['title']=$title;
    header("Location:newverify.php?title=".$title);


?>