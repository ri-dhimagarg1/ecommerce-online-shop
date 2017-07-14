<?php 
include("includes/db.php");
?>

<div> 
	
	<form method="post" action=""> 
		
		<table width="500" align="center" bgcolor="skyblue"> 
			
			<tr align="center">
				<td colspan="3"><h2>Login or Register to Buy!</h2></td>
			</tr>
			
			<tr>
				<td align="right"><b>Email:</b></td>
				<td><input type="text" name="email" placeholder="enter email" required/></td>
			</tr>
			
			<tr>
				<td align="right"><b>Password:</b></td>
				<td><input type="password" name="pass" placeholder="enter password" required/></td>
			</tr>
			
			<tr align="center">
				<td colspan="3"><a href="checkout.php?forgot_pass">Forgot Password?</a></td>
			</tr>
			
			<tr align="center">
				<td colspan="3"><input type="submit" name="login" value="Login" /></td>
			</tr>
			
		
		
		</table> 
	
			<h2 style="float:right; padding-right:20px;"><a href="customer_register.php" style="text-decoration:none;">New? Register Here</a></h2>
	
	
	</form>