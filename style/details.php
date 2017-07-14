<!DOCTYPE html>
<?php
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
	<li><a href="#">Home</a></li>
	<li><a href="#">All Products</a></li>
	<li><a href="#">Account</a></li>
	<li><a href="#">Sign Up</a><Log in/li>
	<li><a href="#">Shopping Cart</a></li>
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

		<div id="shopping_cart">
		<span style="float: right; font-size: 18px; padding: 5px; line-height: 40px;">

		Welcome Guest!<b style="color:yellow">Shopping Cart-</b>Total Items: Total Price:<a href="cart.php" style="color: yellow;">Go to cart</a>
			
		</span>
			
		</div>

		<div id="products_box">
			<?php 

		$get_pro = "select * from products order by RAND() LIMIT 0,6";

		$run_pro = mysqli_query($con,$get_pro);

		while($row_pro = mysqli_fetch_array($run_pro))
		{
		$pro_id = $row_pro['product_id'];
		$pro_cat = $row_pro['product_cat'];
		$pro_brand = $row_pro['product_brand'];
		$pro_title = $row_pro['product_title'];
		$pro_price = $row_pro['product_price'];
		$pro_image = $row_pro['product_image'];


		echo "

			<div id='single_product'>

			<h3>$pro_title</h3>
			<img src='admin_area/product_images/$pro_image' width='180' height='180'/>
			<p><b>$ $pro_price</b></p>
			<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
			<a href='index.php?pro_id=$pro_id'><button style='float:right;'>Add to Cart</button></a>
			</div>



		";

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