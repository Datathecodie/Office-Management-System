<?php
include ('dbConfig.php');
//login
session_start();
$email = $_POST['emailid'];
$pwd = $_POST['passw'];
$rad1 = $_POST['Radios'];

if($rad1 == 'clerk')
{
    $validate = "SELECT * FROM clerk WHERE email = '".$email."' AND pwd = '".md5($pwd)."'";
    $result1 = mysqli_query($con, $validate);
    if(mysqli_num_rows($result1) > 0)
            {
                $row = mysqli_fetch_array($result1);
                $_SESSION["email"]= $row["email"];
                $_SESSION["user_id"]= $row["cid"];
                $_SESSION["user_name"]= $row["name"];
                $_SESSION["user_type"]= "clerk";
                header("Location:clerk/home.php");
                exit;
            }
        else
            {
                header("Location:index.php?error=Invalid Credetials");
                exit;
            }
}
else
{    
    $validate = "SELECT * FROM faculty WHERE email = '".$email."' AND pwd = '".md5($pwd)."' ";
    $result2 = mysqli_query($con,$validate);
    if(mysqli_num_rows($result2) > 0)
            {
                $row = mysqli_fetch_array($result2);
                $_SESSION["email"]= $row["email"];
                $_SESSION["user_id"]= $row["fid"];
                $_SESSION["user_name"]= $row["name"];
                $_SESSION["user_dept"]= $row["dept"];
                $_SESSION["user_desg"]= $row["designation"];
                $_SESSION["user_type"]= "faculty";

                header("Location:faculty/home.php");
                exit;
            }
        else
            {
                header("Location:index.php?error=Invalid Credetials");
                exit;
            }  
}

header("Location:index.php?error=Log in Please ");
exit;


?>