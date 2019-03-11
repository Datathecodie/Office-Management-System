<?php
include("dbConfig.php");
session_start();
//PHP code to output the Dashboard Values
$email=$_SESSION["email"];
$name=$_SESSION["user_name"];

$error='';
if(isset($_REQUEST['error']))
{
	$error=$_REQUEST['error'];
} 

$term = $_POST['term'];
$rad1 = $_POST['Radios'];
$rad2 = $_POST['Radios1'];

?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->

        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  

	</head>
	<body style="background-image: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
        <!--Header -->
        <div class="container jumbotron bg-primary">
            <h1>  Office Automation System </h1>
        </div>

        <!-- Dashboard-->
        <div class="container bg-inverse text-white">
          <h1>Welcome <?php echo $name."</h1>".$error; ?> 
            <form action="logout.php" method="post"><button type="submit" class="btn btn-danger float-md-right" onclick="logout.php">Logout</button> </form>
          
            <div class="row">
            <div class="col-sm-3 bg-inverse text-white" >
              
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a class="nav-link " href="Home.php">Dashboard</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="upload.php">Upload a New Document</a>
                  </li>
                     <li class="nav-item">
                    <a class="nav-link" href="doverify.php">Perform Verification</a>
                  </li>
                </ul>
                <br />
                <br /><br /><br /><br />
            </div>
            <div class="col-sm-9 bg-faded text-muted">
                <br />            
                <div class="title"> <h2>Search Results</h2> </div>
                <?php
                echo "  ".$term;
                if($rad1=="name")   //search by name
                {
                    
                    if($rad2=="doc") {$case = 1; $query = "SELECT * FROM document Where title LIKE '%".$term."%'";}//name  document case 1
                    else{$case = 2; $query = "SELECT * FROM folder Where name LIKE '%".$term."%'";} //name folder case 2
                }
                else //search by desc
                {
                    
                    if($rad2=="doc") {$case = 1; $query = "SELECT * FROM document Where description LIKE '%".$term."%'";}// desc document 3
                    else {$case = 2; $query = "SELECT * FROM folder Where description LIKE '%".$term."%'";} //desc folder case 4
                }
                ?>
                
                                <table class ="table" style ="margin:10px;">
                <thead>
                <th>ID</th><th>Folder/Document Name </th><th>Date</th><th>Category</th>
                </thead>
                <tbody>
                    <?php 
                    $validate = $query;
                    $result2 = mysqli_query($con,$validate);
                    foreach ($result2 as $row)
                    {
                        if($case == 1)
                        {
                           echo "<tr>
                            <td> ".$row['id']."</td>
                            <td> <a href = \" viewdoc.php?var=". $row['title']."\">". $row['title']." </a></td>
                            <td> ". $row['date']."</td>
                            <td> ". $row['description']."</td>
                            </tr>"; 
                        }
                        if ($case ==2) {
                        echo "<tr>
                            <td> ".$row['id']."</td>
                            <td> <a href = \" viewfolder.php?var=". $row['name']."\"> <img src = \"../assets/folder.png\" alt = \"folder\" width = 64 height = 64> </img> ". $row['name']."  </a></td>
                            <td> ". $row['date']."</td>
                            <td> ". $row['description']."</td>
                            </tr>"; }
                    }
                        
                    ?>
                </tbody>
                </table>
                <br /> <br />
            </div>
          </div>
        </div>

	        <!-- Footer -->

	        <div class="container panel bg-primary ">

                <footer>	Goa College of Engineering </footer>
				</div>


        <!--JS Code-->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins)  -->
        <script src="../assets/js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
<!--        <script src="../assets/js/bootstrap.min.js"></script>-->
        <script src="../assets/js/jquery-3.1.1.slim.min.js"></script>
        <script src="../assets/js/tether.min.js"></script>
        
        
       <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
 
        
	</body>
</html>

  

<!--if($rad1 == 'clerk')
{
    $validate = "SELECT * FROM clerk WHERE email = '".$email."' AND pwd = '".$pwd."'";
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
                header("Location:index.php?error=Invalid Credetial $email $pwd");
                exit;
            }
}
else
{    
    $validate = "SELECT * FROM faculty WHERE email = '".$email."' AND pwd = '".$pwd."' ";
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
                header("Location:index.php?error=Invalid Credetial  $email here");
                exit;
            }  
}-->