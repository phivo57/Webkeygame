<?php
$thong_bao="";
if(isset($_SESSION["error"])){
	$thong_bao=$_SESSION["error"];
	unset($_SESSION["error"]);
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Đăng nhập</title>
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/kiem_tra.js"></script>
<!-- Custom Theme files -->
<link href="css/style_1.css" rel="stylesheet" type="text/css" media="all"/>
<!-- for-mobile-apps -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="Classy Login form Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!-- //for-mobile-apps -->
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
<!--header start here-->
<p style="text-align:right;margin:10px"><a href="." style="color:red"  >&lsaquo; &lsaquo;  Về Trang Chủ</a></p>
<div class="header">
		<div class="header-main">
			<h3 style="text-align:center;color:red">
				<?php echo $thong_bao ?>
			</h3>
		       <h1>ĐĂNG NHẬP</h1>
			<div class="header-bottom">
				<div class="header-right w3agile">
					<div class="header-left-bottom agileinfo">
					 	<form method="post">
							<input type="email"  value="" name="name" placeholder="Nhập email" required />
							<input type="password"  value="" name="password"  placeholder="Nhập mật khẩu" required />
							<div class="clear"></div>
							<input type="submit" value="Đăng Nhập" name="dn">
						</form>	
						<div class="header-left-top">
							<div class="sign-up"> <h2>or</h2> </div>
						</div>
						<div class="header-social wthree">
							<form action="dang_ky.php" method="post">
							<input type="submit" value="Đăng ký">
							</form>
						</div>	
					</div>
				</div>
			</div>
		</div>
</div>
<!--header end here-->