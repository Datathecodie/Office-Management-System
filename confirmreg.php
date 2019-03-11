<?php
include ('dbConfig.php');

$name = $_POST['name'];
$email = $_POST['email'];
$desg = $_POST['desig'];
$dept = $_POST['depart'];
$pwd = $_POST['pass'];
$fcid = $_POST['fcid'];
$rad = $_POST['radio1'];

if($rad == 'clerk')
{
    //clerk
    $pwd1=md5($pwd);
    $insert ="Insert into clerk (cid,name,email,pwd) value ('".$fcid."','".$name."','".$email."','".$pwd1."')";
    $result = mysqli_query($con,$insert);
    header("Location:index.php?error=Log in Please clerk ");
}
else
{    
    //fac
    $pwd1=md5($pwd);
    $insert ="Insert into faculty (fid,name,email,pwd,dept,designation) value ('".$fcid."','".$name."','".$email."','".$pwd1."','".$dept."','".$desg."')";
    $result = mysqli_query($con,$insert);
    header("Location:index.php?error=Log in Please fac ");
}

header("Location:index.php?error=Log in Please ");
exit;
?>