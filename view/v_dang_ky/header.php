<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
$thong_bao="";
if(isset($_SESSION["error"])){
	$thong_bao=$_SESSION["error"];
	unset($_SESSION["error"]);
}
else if(isset($_SESSION["thanh_cong"]))
{
	$thong_bao = $_SESSION["thanh_cong"];
	unset($_SESSION["thanh_cong"]);
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Đăng ký</title>
<script src="js/jquery-1.11.0.min.js"></script>
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
<div class="header">
		<div class="header-main">
			<h3 style="text-align:center;color:red">
				<?php echo $thong_bao ?>
			</h3>
		       <h1>ĐĂNG KÝ</h1>
			<div class="header-bottom">
				<div class="header-right w3agile">
					<div class="header-left-bottom agileinfo">
					 	<form method="post">
							<input type="text"  value="" name="ten" placeholder="Nhập tên" required/>
							<input type="email"  value="" name="email" placeholder="Nhập email" required />
							<input type="password"  value="" name="password" placeholder="Nhập mật khẩu" required/>
							<div class="clear"></div>
							<input type="submit" name="dk"value="Đăng Ký">
						</form>	
					</div>
				</div>
			</div>
		</div>
</div>
<!--header end here-->