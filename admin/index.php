<?php

session_start();
require_once("config/class.user.php");
$login = new USER();

if($login->is_loggedin()!="")
{
 $login->redirect('dashboard');
}

if(isset($_POST['submit']))
{
 $uname = $_POST['username'];
 $upass = $_POST['password'];
  
 if($login->doLogin($uname,$upass))
	{
		$login->redirect('dashboard');
	}
	else
	{
		$error = "Wrong Details";
	}
}

?>

<!DOCTYPE HTML>
<html>
<head>
<title>Log into Spring Field | Spring Field</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"> </script>
</head>
<body>
	<div class="Login">
		<hr>
		<hr>
		<hr>
		<hr>
		<hr>


	
		
						<h1> <a href="index"><center> <font color="green"> Springfield </font> </center> </a></h1> 
		<div class="login-bottom">
			<h2>Login</h2>
			<div id="error">
        <?php
			if(isset($error))
			{
				?>
                <div class="alert alert-danger">
                   <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                </div>
                <?php
			}
		?>
        </div>
			<form action="#" method="post">
			<div class="col-md-6">
				<div class="login-mail">
					<input type="text" name="username" placeholder="Username" required="">
					<i class="fa fa-envelope"></i>
				</div>
				<div class="login-mail">
					<input type="password" name="password" placeholder="Password" required="">
					<i class="fa fa-lock"></i>
				</div>

			
			</div>
			<div class="col-md-6 login-do">
				<label class="hvr-shutter-in-horizontal login-sub">
					<input type="submit" name="submit" value="Login">

					</label>

					<p>Forgot password?</p>	
				<a href="signup" class="hvr-shutter-in-horizontal">Forgot Password</a>
			</div>
			
			<div class="clearfix"> </div>
			</form>
		</div>
	</div>
		<!---->
<div class="copy-right">
            <p>&copy; 2018 Springfield School of Novaliches. All Rights Reserved </a> </p>	    </div>  
<!---->
<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	


</body>
</html>

