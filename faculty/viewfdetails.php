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
        // Here list of all files in folder will come, and an link to add new file to folder too.
if(isset($_GET['var']))
{
   $validate = "SELECT * FROM foldercon WHERE fname = '".$title."'  ";
   $result2 = mysqli_query($con,$validate);
     echo "<br>  ID       File Name  <br>";
    foreach ($result2 as $row)
        {
            echo "<br>  ".$row['id']."     ";
    
            echo " <a target = \"_parent\" href =\"viewdoc.php?var=".$row['docname']." \"> ". $row['docname']." </a>  <br>";
        }
      echo "<br> <a target = \"_parent\" href = \"filetofolder.php?folder=".$title." \">  Click here to add new file to the folder. </a>  <br>";
}
?> </body>
    </html>

