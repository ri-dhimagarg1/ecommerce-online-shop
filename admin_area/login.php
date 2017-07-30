<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="admin_style.css">
</head>
<body>
<div class="login">
	<h1><?php echo @($_GET['not_admin']);?></h1>
	<h1><?php echo @($_GET['logged_out']);?></h1>
	<h1>Admin Login</h1>
    <form method="post"  action="login.php">
    	<input type="text" name="email" placeholder="Email" required="required" />
        <input type="password" name="p" placeholder="Password" required="required" />
        <button type="submit" name="login" class="btn btn-primary btn-block btn-large">Login</button>
    </form>
</div>
</body>
</html>
<?php
include("includes/db.php");
session_start();
if(isset($_POST['login']))
{
	$email = mysql_real_escape_string($_POST['email']);
	$pass = mysql_real_escape_string($_POST['p']);

	$sel_user = "select * from admins where user_email='$email' AND user_pass='$pass'";

	$run_user = mysqli_query($con,$sel_user);

	$check_user = mysqli_num_rows($run_user);
	echo $check_user;
	if($check_user==1){
	
	$_SESSION['user_email']=$email; 
	
	echo "<script>window.open('index.php?logged_in=You have successfully Logged in!','_self')</script>";
	
	}
	else
	{
		echo "Email or Password is wrong.";
	}
}
?>