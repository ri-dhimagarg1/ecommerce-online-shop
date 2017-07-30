<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="admin_style.css">
</head>
<body>
<div class="login">
	<h1><?php echo @($_GET['not_admin']);?></h1>
	<h1>Admin Login</h1>
    <form method="post">
    	<input type="text" name="email" placeholder="Email" required="required" />
        <input type="password" name="p" placeholder="Password" required="required" />
        <button type="submit" name="login" class="btn btn-primary btn-block btn-large">Login</button>
    </form>
</div>
</body>
</html>