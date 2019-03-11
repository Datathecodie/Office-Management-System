<?php
include("dbConfig.php");
session_start();
//PHP code to output the Dashboard Values
$email=$_SESSION["email"];
$name=$_SESSION["user_name"];
$desg=$_SESSION["user_desg"];
$validate = "SELECT * FROM faculty WHERE name = '".$name."'  ";
$result2 = mysqli_query($con,$validate);
$row = mysqli_fetch_array($result2);
$dept = $row['dept']; 
$_SESSION["dept"]=$dept;
//File create
$filename="uploads/".$name;
$filesize=249036;
$sha1file = sha1_file($filename);
if(file_exists($filename)==0) {
if ($h = fopen($filename, 'w')) {
        if ($filesize > 1024) {
            for ($i = 0; $i < floor($filesize / 1024); $i++) {
                fwrite($h, bin2hex(openssl_random_pseudo_bytes(511)) . PHP_EOL);
            }
            $filesize = $filesize - (1024 * $i);
        }
        $mod = $filesize % 2;
        fwrite($h, bin2hex(openssl_random_pseudo_bytes(($filesize - $mod) / 2)));
        if ($mod) {
            fwrite($h, substr(uniqid(), 0, 1));
        }
        fclose($h);
        umask(0000);
        chmod($filename, 0644);
    }
    //create hash and store in db
    $sha1file = sha1_file($filename);
    $vali = "UPDATE faculty SET code = '".$sha1file."' WHERE name = '".$name."' ";
    $res2 = mysqli_query($con,$vali);
    
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
                <h1>Office Automation System</h1> 
        </div>

        <!-- Dashboard-->
        <div class="container bg-inverse text-white">
            <h1>Welcome <?php echo $name; ?> </h1> 
            <center> <h3><div class="title"> <a href="<?php echo $filename;?>"> <label> Click here to get verification file. </label></a></div></h3> </center> 
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
                     <li class="nav-item">
                    <a class="nav-link" href="doverify.php">Perform Verification</a>
                  </li>
                      <li class="nav-item">
                    <a class="nav-link" href="search.php">Search Document/Folder</a>
                  </li>
                                        
                </ul>
                
            </div>
            <div class="col-sm-9" style="background-color:inverse;">
                
               
                
                <div class="title"> List of Folders:</div>
                   
                <table class ="table" style ="margin:10px;">
                <thead>
                <th>ID</th><th>Folder Name </th><th>Date</th><th>Category</th>
                </thead>
                <tbody>
                    <?php 
                    $validate = "SELECT * FROM folder ";
                    $result2 = mysqli_query($con,$validate);
                     echo "<tr>
                            <td> 0 </td>
                            <td> <a href = \" newfolder.php\"> <img src = \"../assets/folder.png\" alt = \"folder\" width = 64 height = 64> </img> Click to Add New folder </a></td>
                            <td> </td>
                            <td> </td>
                            </tr>";
                    foreach ($result2 as $row)
                    { 
                        
                        $validate = "SELECT * FROM access WHERE fname = '".$name."' AND folder = '".$row['name']."' ";
                        $result2 = mysqli_query($con,$validate);
                        if(mysqli_num_rows($result2) > 0) {
                            echo "<tr>
                                <td> ".$row['id']."</td> ";
                            echo "  <td> <a href = \" viewfolder.php?var=". $row['name']."\"> <img src = \"../assets/folder.png\" alt = \"folder\" width = 64 height = 64> </img> ". $row['name']."  </a></td> ";
                            echo "  <td> ". $row['date']."</td>
                                <td> ". $row['description']."</td>
                             </tr>";
                        }
                            
                    }
                        
                    ?>
                </tbody>
                </table> 
                
                <?php
              
                if($desg == "Principal") {
                echo "    
                <div class=\"title\"> Add Verifiers to the Documents :</div>
                <table class =\"table\" style =\"margin:10px;\">
                <thead>
                    <th>ID</th> <th>Title</th>  <th>Uploaded Date</th>  <th>Click to Add Verifiers</th>
                </thead>
                <tbody>";
                    $vali = "SELECT * FROM request WHERE done = 'no' ";
                    $res2 = mysqli_query($con,$vali);
                    foreach ($res2 as $row)
                    {
                        echo "<tr>
                            <td> ". $row['id']."</td>
                            <td> ". $row['title']."</td>
                            <td> ". $row['date']."</td>
                            <td> <a href = \" newverify.php?title=".$row['title']."\">Click here </a> </td> 
                            </tr>";
                    }
                        
                    echo " </tbody>
                 </table> 
                <br /> <br /> "; }
                ?>
                
                
                <div class="title"> List of Documents uploaded by You:</div>
                  
                <table class ="table" style ="margin:10px;">
                <thead>
                <th>ID</th><th>Title</th><th>Date</th><th>Description</th><th>Document </th><th>Verification Status</th>
                </thead>
                <tbody>
                    <?php 
                    $validate = "SELECT * FROM document WHERE uname = '".$name."'  ";
                    $result2 = mysqli_query($con,$validate);
                    foreach ($result2 as $row)
                    {
                        echo "<tr>
                            <td> ".$row['id']."</td>
                            <td> <a href = \" viewdoc.php?var=". $row['title']."\">". $row['title']." </a></td>
                            <td> ". $row['date']."</td>
                            <td> ". $row['description']."</td>
                            <td> <a href = \"" .$row['path']."\"  >". $row['path']."</a> </td>
                            <td> <a href = \" checkverify.php?var=". $row['title']."\">Click here </a> </td> 
                            </tr>";
                    }
                        
                    ?>
                </tbody>
                </table> 
                
                      <div class="title"> List of Documents Backtracked to you You:</div>
                  
                <table class ="table" style ="margin:10px;">
                <thead>
                <th>ID</th><th>Title of document</th><th>Sender</th><th>Comment</th><th>Document Status</th>
                </thead>
                <tbody>
                    <?php 
                    $validate = "SELECT * FROM backtrack WHERE name = '".$name."' and view = '0' ";
                    $result2 = mysqli_query($con,$validate);
                    foreach ($result2 as $row)
                    {
                        echo "<tr>
                            <td> ".$row['id']."</td>
                            <td> <a href = \" viewdoc.php?var=". $row['docname']."\">". $row['docname']." </a></td>
                            <td> ". $row['msgfrom']."</td>
                            <td> ". $row['msg']." </td>
                            <td> <a href = \" verifycode3.php?id=". $row['id']."\">Click here to Backtrack the Document </a> </td> 
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
                
                <center>		Goa College of Engineering </center>
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
