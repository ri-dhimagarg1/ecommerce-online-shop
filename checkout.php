<!DOCTYPE html>
<?php
session_start();
include("functions/functions.php");
?>
<html>
<head>
	<title>My online Shop</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
<!-- Main class starts here -->
<div class="main_wrapper">

<!-- Main header starts here -->
<div class="header_wrapper">
<img src="images/shoplogo.jpg" alt="shoplogo" id="logo" style="height: 100px; width: 333px;">
<img src="images/addbanner.jpg" alt="banner" id="banner" style="width: 667px; height: 100px;">
</div>
<!--header ends here -->

<!--navigation bar starts here -->
<div class="menubar">
<ul id="menu">
	<li><a href="index.php">Home</a></li>
	<li><a href="all_products.php">All Products</a></li>
	<li><a href="customer/my_account.php">Account</a></li>
	<li><a href="#">Sign Up</a><Log in/li>
	<li><a href="cart.php">Shopping Cart</a></li>
	<li><a href="#">Contact Us</a></li>
</ul>

<div id="form">
<form action="results.php" method="get" enctype="multipart/form.php" >
<input type="text" name="user_query" placeholder="Search here"/>
<input type="submit" name="search" value="Search"/>
</form>
</div>
</div>
<!--navigation bar ends here-->

<!-- starting of content panel-->
<div class="content_wrapper">

	<div id="sidebar">
		<div id="sidebar_title">Categories</div>
		<ul id="cats">
			<?php get_cat(); ?>
			
		</ul>
		<div id="sidebar_title">Brands</div>
		<ul id="cats">
		<?php get_brand(); ?>
			
		</ul>
	</div>
	<div id="content_area">
	<?php echo cart(); ?>

		<div id="shopping_cart">
		<span style="float: right; font-size: 18px; padding: 5px; line-height: 40px;">

		Welcome Guest!<b style="color:yellow">Shopping Cart-</b>Total Items: <?php total_items(); ?> Total Price:<?php total_price(); ?><a href="cart.php" style="color: yellow;">Go to cart</a>
			
		</span>
			
		</div>

		<?php echo getIp(); ?>

		<div id="products_box">
				<?php
				if(!isset($_SESSION['customer_email']))
				{
					include("customer_login.php");
				}
				else
				{
					include("payment.php");
				}
				?>
			
		</div>

	</div>

</div>

<!--ending of content panel-->

<!--startinf of footer-->

<div id="footer">
<h2 style="text-align: center; padding-top: 30px;">&copy; 2017 www.futureheadtech.com </h2>

</div>
	
<!--ending of footer-->

</div>

</body>
</html>