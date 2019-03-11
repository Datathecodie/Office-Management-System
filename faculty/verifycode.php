<?php
include("dbConfig.php");
session_start();
$title=$_GET["title"];
$name=$_GET["name"];
$date1=date("Y-m-d");

?>

<html>
    <head>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    </head>
<body>
 
    <form action="verifycode0.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
          <label for="example-text-input">Enter your Verification File</label>
          </div>
            <input type="hidden" name="title" value="<?php echo $title; ?>">
            <input type="hidden" name="name" value="<?php echo $name; ?>">
      <div class="form-group">
        <label for="exampleInputFile">File input</label>
        <input type="file" class="form-control-file" name="filepath" id="exampleInputFile" aria-describedby="fileHelp">
        </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
   
</body>
</html>