<?php
include("dbConfig.php");
session_start();
$title=$_GET["title"];
$id=$_GET["id"];

    $insert ="update backtrack set view = '1' where id= '".$id."'" ;
    $result = mysqli_query($con,$insert);
    header("Location:home.php");


?>