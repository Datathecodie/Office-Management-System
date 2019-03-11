<?php
include("dbConfig.php");
session_start();
$title=$_POST["title"];
$desc=$_POST["desc"];
$dept=$_POST["depart"];
$name=$_SESSION["user_name"];
$date1=date("Y-m-d");
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["filepath"]["name"]);
$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
// Check file size
   /* if ($_FILES["filepath"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
    }*/

// Allow certain file formats
    if($FileType != "doc" && $FileType != "docx" && $FileType != "jpg" && $FileType != "pdf" ) {
        echo "Sorry, only pdf, doc, docx & jpg files are allowed.";
        $uploadOk = 0;
    }

    
    if (move_uploaded_file($_FILES["filepath"]["tmp_name"], $target_file)) {
        echo "The file ".  $_FILES["filepath"]["name"]. " has been uploaded.";
        echo "The file ".  $title. " has been uploaded.";
        echo "The file ".  $dept. " has been uploaded.";
        echo "The file ".  $desc. " has been uploaded.";
        echo "The file<p><a href=\"".$target_file."\">  has been uploaded.";
        $insert ="Insert into document (title,description,dept,path,date,uname,forc) value ('".$title."','".$desc."','".$dept."','".$target_file."','".$date1."','".$name."','faculty')";
    $result = mysqli_query($con,$insert);
        $_SESSION['title']=$title;
    header("Location:newverify.php?error=Upload Succesful&title=$title");
        
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    
?>