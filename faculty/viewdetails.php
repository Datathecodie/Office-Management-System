<?php
include("dbConfig.php");
session_start();
//PHP code to output the Dashboard Values
$email=$_SESSION["email"];
$name=$_SESSION["user_name"];
$title=$_GET["var"];

?>
<html>
    <body > 
<?php
if(isset($_GET['var']))
{
   $validate = "SELECT * FROM document WHERE title = '".$title."'  ";
   $result2 = mysqli_query($con,$validate);
    foreach ($result2 as $row)
        {
            echo "<br>  Title: ".$row['title']." <br><br> Description: ". $row['description']." <br><br> File Path : <a href = \" ".$row['path']." \">". $row['path']." </a> <br>";
        }
}
?> </body>
    </html>