<?php
include("dbConfig.php");
session_start();
//PHP code to output the Dashboard Values
$email=$_SESSION["email"];
$name=$_SESSION["user_name"];
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
               <h1> Office Automation System </h1>
        </div>

        <!-- Dashboard-->
        <div class="container bg-inverse text-white">
          <h1>Welcome <?php echo $name; ?> </h1>
            <form action="logout.php" method="post"><button type="submit" class="btn btn-danger float-md-right" onclick="logout.php">Logout</button> </form>
          
            <div class="row">
            <div class="col-sm-3" style="background-color:black;">
              
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a class="nav-link active" href="Home.php">Dashboard</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="upload.php">Upload a New Document</a>
                  </li>
                </ul>
                
            </div>
            <div class="col-sm-9" style="background-color:inverse;">
                            
                <div class="title"> List of Documents uploaded by You:</div>
                   
                <table class ="table" style ="margin:10px;">
                <thead>
                <th>id</th>
                <th>Title</th>
                <th>Date</th>
                <th>Document </th>
				<th>Description </th>
               
                </thead>
                <tbody>
                    <?php 
                    $validate = "SELECT * FROM document WHERE uname = '".$name."'  ";
                    $result2 = mysqli_query($con,$validate);
                    foreach ($result2 as $row)
                    {
                        echo "<tr>
                            <td> ".$row['id']."</td>
                            <td> ". $row['title']."</td>
                            <td> ". $row['date']."</td>
                           <td> <a href = \"" .$row['path']."\"  >". $row['path']."</a> </td>
						   <td> ". $row['description']."</td>
                         
                            </tr>";
                    }
                        
                    ?>
                </tbody>
                </table> 
            </div>
          </div>
        </div>

	        <!-- Footer -->
	        <div class="container jumbotron bg-primary">

						Goa College of Engineering
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
