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
				                    <form role="form" action="confirmreg.php" method="POST" class="registration-form">
				                    	<div class="form-group">
				                    		<label class="sr-only" for="name">Full name</label>
				                        	<input type="text" name="name" placeholder="Full Name" class="form-first-name form-control" id="form-first-name">
				                        </div>
				                        
                                        <div class="form-group">
				                        	<label class="sr-only" for="email">Email</label>
				                        	<input type="text" name="email" placeholder="Email" class="form-email form-control" id="form-email">
				                        </div>
								        
                                        <div class="form-group">
                                          <select class="form-control" id="depart" name="depart">
                                              <option value="IT">IT</option>
                                              <option value="Comp">COMP</option>
                                              <option value="ETC">ETC</option>
                                              <option value="ENE">ENE</option>
                                              <option value="none">None</option>
                                            </select>
                                          </div>
                                        <label for="dept">Select None for Clerk</label>
				                       
                                         <div class="form-group">
                                          <select class="form-control" id="desig" name="desig">
                                              <option value="Principal">Principal</option>
                                              <option value="HOD">HOD</option>
                                              <option value="Professor">Professor</option>
                                              <option value="Asst. Professor">Asst. Professor</option>
                                              <option value="none">Clerk</option>
                                            </select>
                                          </div>
                                        
                                            <div class="form-check">
                                              <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="radio1" value="clerk" checked>
                                                Clerk
                                              </label>
                                            </div>
                                            <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="radio1" value="faculty">
                                                Faculty
                                              </label>
                                            </div>
                                        
                                        <div class="form-group">
				                    		<label class="sr-only" for="fcid">Faculty/Clerk ID</label>
				                        	<input type="text" name="fcid" placeholder="Faculty/Clerk ID" class="form-first-name form-control" id="fcid">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="pass">Password</label>
				                        	<input type="password" name="pass" placeholder="Choose Password" class="form-password form-control" id="pass">
				                        </div>

				                        <button type="submit" class="btn">Sign Up</button>
                                        <br /> <br />
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