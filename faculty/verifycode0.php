<?php
include("dbConfig.php");
session_start();
$title=$_POST["title"];
$name=$_POST["name"];
$date1=date("Y-m-d");
 
$target_dir = "test/";
$target_file = $target_dir.basename($_FILES["filepath"]["name"]);

if(move_uploaded_file($_FILES["filepath"]["tmp_name"], $target_file) ) 
{
    // check sha1
    $validate = "SELECT * FROM faculty where name = '".$name."' ";
    $result2 = mysqli_query($con,$validate);
    $row = mysqli_fetch_array($result2);
    $check = $row['code'];

    $sha1file = sha1_file($target_file);
    
    if($sha1file == $check)
    { $insert ="Update verify set verified = 'yes', date='".$date1."' where title = '".$title."' and fname= '".$name."' ";
        $result = mysqli_query($con,$insert);
        header("Location:newverify.php?title=".$title); }
    else echo "verification file incorrect. ";
}

else echo "test   ".$_FILES['filepath']['error']."    ".$upload_mb;
?>
