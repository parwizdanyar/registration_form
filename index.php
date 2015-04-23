
			<?php
            	require_once("db_function.php");
            	$funObj = new dbFunction();
            	// submit form for login user
            	if(isset($_POST['login'])){
				
            		// get user name
            		$emailid = htmlspecialchars($_POST['emailid']);
            		// get password
            		$password = htmlspecialchars($_POST['password']);
            		
            		$user = $funObj -> login($emailid, $password);
            		
            		if($user){
	            		header("Location:home.php");
	            		die();
            		}else{
	            		echo "<script>alert('Your Email / Password Donot match.')</script>";
            		}
            	}
            	
            	
            	// submit form for registering user
            	if(isset($_POST['register'])){
            		// get user name
            		$user_name = htmlspecialchars(mysql_real_escape_string($_POST['user_name']));
            		// get email
            		$emailid = htmlspecialchars(mysql_real_escape_string($_POST['emailid']));
            		// get password
            		$password = htmlspecialchars(mysql_real_escape_string($_POST['password']));
            		// get confirm password
            		$confirm_password = htmlspecialchars(mysql_real_escape_string($_POST['confirm_password']));
            		if($password == $confirm_password){
	            		$email = $funObj -> is_user_exist($emailid);
	            		if(!$email){
		            		$register = $funObj -> user_register($user_name, $emailid, $password);
		            		if($register){
			            		echo "<script>alert('Registration Successful')</script>";
		            		}else{
			            		echo "<script>alert('Registration Not Successful')</script>";
		            		}
	            		}else{
		            		echo "<script>alert('Email Already Exist')</script>"; 
	            		}
            		}else{
	            		echo "<script>alert('Password Not Match')</script>";	
            		}
            	}
            ?>


<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8" />
    <title>Contact List | Login Page</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
     <!-- PAGE LEVEL STYLES -->
     	<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
     	<link rel="stylesheet" href="assets/css/login.css" />
     	<link rel="stylesheet" href="assets/plugins/magic/magic.css" />
     	
   
     <!-- END PAGE LEVEL STYLES -->
   
</head>
<body >

   <!-- PAGE CONTENT --> 
    <div class="container">
    <div class="text-center">
    </div>
    <div class="tab-content">
        <div id="login" class="tab-pane active">
            <form action="index.php" method="post" class="form-signin">
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">
                    Enter your username and password
                </p>
                <input type="text" placeholder="E-mail" class="form-control" name="emailid" id="emailid"/>
                <input type="password" placeholder="Password" class="form-control" name="password" id="password_log"/>
                <button class="btn text-muted text-center btn-danger" type="submit" name="login">Sign in</button>
            </form>
        </div>
        <div id="forgot" class="tab-pane">
            <form action="index.html" class="form-signin">
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">Enter your valid e-mail</p>
                <input type="email"  required="required" placeholder="Your E-mail"  class="form-control" />
                <br />
                <button class="btn text-muted text-center btn-success" type="submit">Recover Password</button>
            </form>
        </div>
        <div id="signup" class="tab-pane">
            <form action="index.php" method="post" class="form-signin">
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">Please Fill Details To Register</p>
                 <input type="email" placeholder="E-mail" class="form-control" name="emailid" id="emailid" required/>
                <input type="text" placeholder="Username" class="form-control" name="user_name" id="user_name" required/>
                <input type="password" placeholder="Password" class="form-control" name="password" id="password" required/>
               <input type="password" placeholder="Confirm Password" class="form-control" name="confirm_password" id="confirm_password" required/>
                <button class="btn text-muted text-center btn-success" type="submit" name="register">Register</button>
            </form>
        </div>
    </div>
    <div class="text-center">
        <ul class="list-inline">
            <li><a class="text-muted" href="#login" data-toggle="tab">Login</a></li>
            <li><a class="text-muted" href="#signup" data-toggle="tab">Signup</a></li>
            
        </ul>
    </div>


</div>

	  <!--END PAGE CONTENT -->     
	      
      <!-- PAGE LEVEL SCRIPTS -->
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <script src="assets/plugins/jquery-2.0.3.min.js"></script>
      <script src="assets/plugins/bootstrap/js/bootstrap.js"></script>
      <script src="assets/js/login.js"></script>
      <!--END PAGE LEVEL SCRIPTS -->

</body>
    <!-- END BODY -->
</html>
