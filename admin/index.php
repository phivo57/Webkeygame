<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
include('model/dang_nhap.php');
@session_start();
if(isset($_POST['dn']))
{
	if(isset($_POST['name'])) $user = $_POST['name'];
	if(isset($_POST['password'])) $pas = $_POST['password'];
	$dn = new dang_nhap();
	$login = $dn->Doc_Admin_theo_tenDn_pass($user,$pas);
	if($login!==false)
	{
		
		$_SESSION['ten_admin'] = $login['ten_user'];
		header("location:trang_chu.php");
	}
	else
	{
		
		$_SESSION['error'] = "Tài khoản hoặc mật khẩu không tồn tại";
	}
	$thong_bao="";
	if(isset($_SESSION['error']))
	{
		$thong_bao = $_SESSION['error'];
		unset($_SESSION['error']);
	}
}
?>
<!DOCTYPE html>
<html>

<head>
<title>Đăng Nhập | Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Gaming Login Form Widget Tab Form,Login Forms,Sign up Forms,Registration Forms,News letter Forms,Elements"/>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/style_1.css" rel="stylesheet" type="text/css" media="all" />
</head>
<?php
?>
<body>
	<div class="padding-all">
		<div class="header">
			<h1><img src="./images/5.png" alt=" "> Admin Đăng Nhập</h1>
		</div>
		<div class="design-w3l">
			<div class="mail-form-agile">
			<h3><?php if(isset($thong_bao)) echo $thong_bao;?></h3>
				<form method="post">
					<input type="text" name="name" placeholder="Nhập Email" required=""/>
					<input type="password"  name="password" class="padding" placeholder="Nhập Password" required=""/>
					<input type="submit" name="dn" value="Đăng nhập">
				</form>
			</div>
		  <div class="clear"> </div>
		</div>
		
		<div class="footer">
		<p>© 2017 Gaming Login form. All Rights Reserved | Design by  <a href="https://w3layouts.com/" >  w3layouts </a></p>
		</div>
	</div>
</body>
</html>
