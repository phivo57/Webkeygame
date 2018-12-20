<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
@session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>TPQShopKeyGame | <?php echo $title?></title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/jCart.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/cart.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
</head>
<body>
<!-- Header Starts Here -->
<div class="header">
	<div class="container">
		<div class="logo">
			<a href="."><img src="images/logo.png" alt=""></a>
		</div>
		<span class="menu"></span>
		<div class="navigation">
		<ul class="navig cl-effect-3" >
				<li><a href=".">Trang Chủ</a></li>
				<li><a href="games.php">Games</a></li>
				<li><a href="faq.php">FAQ</a></li>
				<li>
					<?php
						if(isset($_SESSION['ten_khach_hang']))
						{						
							echo "<a href='logout.php'>Thoát</a>";
						}
						else
						{
							echo "<a href='login.php'>Đăng nhập</a>";
						}
					?>
				</li>
			</ul>
			<div style="float:right;position:fixed;width: 400px;right: 5px;">
				<a href="#" class="cart-box" id="cart-info" title="View Cart">
					<?php 
						if(isset($_SESSION["games"]))
						{
							echo count($_SESSION["games"]); 
						}else
						{
							echo 0; 
						}
					?>
				</a>
				<div class="shopping-cart-box">
						<a href="#" class="close-shopping-cart-box" >Close</a>
						<h4>Giỏ hàng của bạn</h4> 
						<div id="shopping-cart-results"></div>
				</div>
			</div>
			<script>
				$( "span.menu" ).click(function() {
				  $( ".navigation" ).slideToggle( "slow", function() {
				    // Animation complete.
				  });
				});
			</script>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- Header Ends Here -->
