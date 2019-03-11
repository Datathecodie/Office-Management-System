<?php
include("dbConfig.php");
session_start();
//PHP code to output the Dashboard Values
$email=$_SESSION["email"];
$name=$_SESSION["user_name"];
$title=$_GET["var"];

?>
<html>
    <body bgcolor ="#B3FFB3"> 
<?php
if(isset($_GET['var']))
{
   echo "<h2> Goa College of Engineering </h2>  <br> <h3> Office Management System</h3>";
    $a=0;
   $validate = "SELECT * FROM fnotes WHERE folder = '".$title."'  ";
   $result2 = mysqli_query($con,$validate);
    foreach ($result2 as $row)
        {   $a++;
            echo $a. ". ".$row['name']." (". $row['desg']." In ". $row['dept']." Department) : ". $row['note']. " <br> <br>";
        }
}
?> </body>
    </html>