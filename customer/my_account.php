<!DOCTYPE html>
<?php
session_start();
include("functions/functions.php");
?>
<html>
<head>
    <title>My online Shop</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>
<!-- Main class starts here -->
<div class="main_wrapper">

    <!-- Main header starts here -->
    <div class="header_wrapper">
        <img src="images/logo.gif" alt="shoplogo" id="logo" style="height: 100px; width: 333px;">
        <img src="images/ad_banner.gif" alt="banner" id="banner" style="width: 667px; height: 100px;">
    </div>
    <!--header ends here -->

    <!--navigation bar starts here -->
    <div class="menubar">
        <ul id="menu">
            <li><a href="../index.php">Home</a></li>
            <li><a href="../all_products.php">All Products</a></li>
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
            <div id="sidebar_title">My Account</div>
            <ul id="cats">
                <?php
                $user = $_SESSION['customer_email'];

                $sel_img = "select * from customers where customer_email='$user' ";

                $run_img = mysqli_query($con,$sel_img);

                $row_img = mysqli_fetch_array($run_img);

                $c_image = $row_img['customer_image'];

                $c_name = $row_img['customer_name'];

                echo "<p style='text-align: center'><img src='customer_images/$c_image' width='150px' height='150px'/></p>"


                ?>
                <li><a href="my_account.php?my_orders">My Orders</a> </li>
                <li><a href="my_account.php?edit_account">Edit Account</a> </li>
                <li><a href="my_account.php?change_pass">Change Account</a> </li>
                <li><a href="my_account.php?delete_account">Delete Account</a> </li>
            </ul>

        </div>
        <div id="content_area">
            <?php echo cart(); ?>

            <div id="shopping_cart">
		<span style="float: right; font-size: 17px; padding: 5px; line-height: 40px;">
            <?php
            if(isset($_SESSION['customer_email']))
            {
                echo "<b>Welcome</b> " .$_SESSION['customer_email'] . "<b style='color: yellow'>Your</b>";
            }
            ?>

            <?php
            if(!isset($_SESSION['customer_email']))
            {
                echo "<a href='checkout.php'>Login</a>";
            }
            else
            {
                echo "<a href='logout.php' style='color:orange;'>Logout</a>";
            }

            ?>

		</span>

            </div>

            <?php echo getIp(); ?>
            <div id="products_box">
                <?php
                if(!isset($_GET['my_orders'])) {
                    if (!isset($_GET['edit_account'])) {
                        if (!isset($_GET['change_pass'])) {
                            if (!isset($_GET['delete_account'])) {
                                echo " 
                <h2 style='padding: 20px;'>Welcome: $c_name </h2><br>
                <b>You can see your order by clicking this <a href='my_account.php?my_orders'>link</a> </b>";
                }
                        }
                    }
                }

                if(isset($_GET['edit_account']))
                {
                    include("edit_account.php");
                }
                if(isset($_GET['change_pass']))
                {
                    include("change_pass.php");
                }
                if(isset($_GET['delete_account']))
                {
                    include("delete_account.php");
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