<?php
include("dbConfig.php");
session_start();
//PHP code to output the Dashboard Values
$email=$_SESSION["email"];
$name=$_SESSION["user_name"];
$desg=$_SESSION["user_desg"];
$dept=$_SESSION["dept"];
$title=$_GET["var"];
$x1=0;
switch($desg){
        
    case "Principal" : $x1="no";
        break;
    case "HOD" : $x1="Principal";
        break;
    case "Professor" : $x1 = "HOD";
        break;
}
if(isset($_POST['note1']))
{
       $validate = "SELECT * FROM faculty WHERE name = '".$name."'  ";
       $result2 = mysqli_query($con,$validate);
       $row = mysqli_fetch_assoc($result2);
       $validate = " INSERT into notes (name, note, desg, dept,doc) VALUES ('".$name."','".$_POST['note1']."','".$row['designation']."','".$row['dept']."' ,'".$_GET['var']."')  ";
       $result2 = mysqli_query($con,$validate);
}

if(isset($_POST['note2']))
{
    //Get authorities name
    //then insert it
     $validate = "SELECT * FROM faculty WHERE dept = '".$dept."' and designation = '".$x1."' ";
       $result2 = mysqli_query($con,$validate);
       $row = mysqli_fetch_assoc($result2);
       $validate = "INSERT into backtrack (name, docname, msg,msgfrom) VALUES ('".$row['name']."','".$title."','".$_POST['note2']."','".$name."' )  ";
       $result2 = mysqli_query($con,$validate);
}
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
        <div class="  bg-inverse text-white container">
          <h1>Welcome <?php echo $name; ?> </h1>
          <!--  <form action="logout.php" method="post"><button type="submit" class="btn btn-danger float-md-right" onclick="logout.php">Logout</button> </form>-->
          
            <div class="  row">
            <div class="col-sm-2 bg-inverse text-white" >
              
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a class="nav-link active" href="Home.php">Dashboard</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="upload.php">Upload a New Document</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="doverify.php">Perform Verification</a>
                  </li>
                </ul>
                <br />
                <br /><br /><br /><br />
            </div>
            <div class="col-sm-10 bg-faded text-muted">
                <br />    
                
                 <div class="title"> Details of the document:</div>
                   
                      <?php 
                    $validate = "SELECT * FROM document WHERE title = '".$title."'  ";
                    $result2 = mysqli_query($con,$validate);
                    foreach ($result2 as $row)
                    {        
                         echo "<iframe src = \" viewnote.php?var=".$title." \" width=\"400\" height=\"300\"> </iframe>"; //Green part
                         echo "<iframe src = \" viewdetails.php?var=".$row['title']."\" width=\"400\" height=\"300\"> </iframe>";
                
                        ?>
                              <form action="" method="post" enctype="multipart/form-data">
    
                                  <div class="form-group">
                                    <label for="exampleTextarea">Add a Note to the document</label>
                                    <textarea class="form-control" name="note1" rows="3"></textarea>
                                  </div>  

                                  <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                                    <br><br>
                                <span style = "visibility: <?php if( $x1 == "no") echo "hidden"; else echo "visible";?>;">
                                 <form action="" method="post" enctype="multipart/form-data">
                                  <div class="form-group">
                                    <label for="exampleTextarea" >Send a Backtracking notice to <?php echo $x1;?> </label>
                                    <textarea class="form-control" name="note2" rows="3"></textarea>
                                  </div>  

                                  <button type="submit" class="btn btn-primary">Submit</button>
                                    </form> </span>
                        <?php   
                    }
                    ?>    
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