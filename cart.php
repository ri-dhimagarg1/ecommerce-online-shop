<!DOCTYPE html>
<?php
include("functions/functions.php");
session_start();
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
				<form action="" method="post" enctype="multipart/form-data">
				<table align="center" width="700px" bgcolor="skyblue">
					<tr align="center">
					<td>Remove</td>
					<td>Product(s)</td>
					<td>Quantity</td>
					<td>Total Price</td>
					</tr>
					<?php

	$total =0;

	global $con;

	$ip = getIp();

	$sel_price = "select * from cart where ip_add='$ip' ";

	$run_price = mysqli_query($con,$sel_price);

	while($p_price = mysqli_fetch_array($run_price))
	{
		$pro_id = $p_price['p_id'];

		$pro_price = "select * from products where product_id='$pro_id' ";

		$run_pro_price = mysqli_query($con,$pro_price);

		while($pp_price= mysqli_fetch_array($run_pro_price))
		{
			$product_price =array($pp_price['product_price']);

			$values =array_sum($product_price);

			$product_title= $pp_price['product_title'];

			$product_image = $pp_price['product_image'];

			$single_price = $pp_price['product_price'];

			$total+=$values;
			?>

			<tr>
				<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"></td>
				<td><?php echo $product_title; ?><br>
				<img src="admin_area/product_images/<?php echo $product_image; ?>" width="60" height="60" >
				</td>
				<td><input type="text" name="qty" size="4" value="<?php echo $_SESSION['qty']; ?>"></td>
				<?php
				if(isset($_POST['update_cart']))
				{
					$qty = $_POST['qty'];

					$update_qty = "update cart set qty='$qty' ";

					$run_qty = mysqli_query($con,$update_qty);

					$_SESSION['qty'] = $qty;

					$total = $total*$qty;
				}
				?>
				<td><?php echo "$".$single_price; ?></td>
			</tr>

			<?php
		}
	}
	?>
	<tr>
	<td colspan="5" align="right">SubTotal:</td>
	<td><?php echo "$". $total; ?></td>
	</tr>
	<tr align="center"> 
		<td colspan="2"><input type="submit" name="update_cart" value="Update Cart"></td>
		<td><input type="submit" name="continue" value="Continue Shopping"></td>
		<td><a href="checkout.php" style="text-decoration:none; color:black;">Checkout</a></td>
	</tr>




					
				</table>
					
				</form>

				<?php
				function updatecart()
				{
				global $con;

				$ip = getIp();

				if(isset($_POST['update_cart']))
				{
					foreach ($_POST['remove'] as $remove_id) {
						
						$delete_product = "delete from cart where p_id='$remove_id' and ip_add='$ip' ";

						$run_delete = mysqli_query($con,$delete_product);

						if($run_delete)
						{
							echo "<script>window.open('cart.php','_self'); </script>";
						}
					}
				}

				if(isset($_POST['continue']))
				{
					echo "<script>window.open('index.php','_self'); </script>";
				}
				echo @$up_cart =updatecart();
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