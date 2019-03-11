<!DOCTYPE html>
<html lang="en">
<?php
    $error='';
    if(isset($_REQUEST['error']))
    { 	$error=$_REQUEST['error']; } 
?>    
<head>
  <title>Office Automation System</title>
  <link rel="shortcut icon" href="assets/ico/favicon.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/bootstrap.min.css">
  <script src="assets/jquery.min.js"></script>
  <script src="assets/popper.min.js"></script>
  <script src="assets/bootstrap.min.js"></script>
</head>
    
<body style="background-image: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
    
        <div class="top-content">
            <div class="inner-bg">
                <div class="container">
                	
                    <div class="row">
                        <div class="col-sm-3 "></div>
                        <div class="col-sm-6 justify-content-center">
                            <h1><strong>Office Automation System</strong></h1>
                        </div>
                        <div class="col-sm-3 "></div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-4 "></div>
                        <div class="col-sm-4 d-flex justify-content-center bg-primary">
                        	
                        	<div class="form-box ">
	                        	<div class="form-top">
                                    <?php echo " $error";?>
                                    <br /><br />
	                        		<div class="form-top-left">
	                        			<h3>Login   </h3>
	                        		</div>
                                    <div class="form-top-right">
	                        			<i class="fa fa-lock"></i>
	                        		</div>
	                            </div>
                                
	                            <div class="form-bottom">
				                    <form role="form" method="post" class="login-form" action="confirmlogin.php">
				                    	<div class="form-group">
                                            <input type="email" class="form-control" name="emailid" placeholder="Enter email">
                                         </div>
                                        <div class="form-group">
				                        	<label class="sr-only" for="form-password">Password</label>
				                        	<input type="password" name="passw" id="passw" placeholder="Password..." class="form-password form-control" id="form-password">
				                        </div>
                                        <fieldset class="form-group">
                                            <div class="form-check">
                                              <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="Radios" id="optionsRadios1" value="faculty" checked> 
                                                Faculty
                                              </label>
                                            </div>
                                            <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="Radios" id="optionsRadios2" value="clerk">
                                                Clerk
                                              </label>
                                            </div>
                                          </fieldset>
				                        <button type="submit" class="btn">Login</button>
                                        <br /><br />
                                        <label class ="text-uppercase " > <a href="register.php"><p class="text-warning"><strong> New User, Register here </strong></p> </a></label> <br /> <br />
				                    </form>
			                    </div>
		                    </div>
	                        
                        </div>
                        <div class="col-sm-4 "></div>
    	
                    </div>
                    
                </div>
            </div>
            
        </div>
    
    
</body>
</html>
