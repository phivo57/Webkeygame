<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
@session_start();
include('model/game.php');
if(isset($_POST['them']))
{
	
	if(isset($_POST['key_game'])) $key_game = $_POST['key_game'];
	if(isset($_POST['the_loai'])) $ma_the_loai = $_POST['the_loai'];
	if(isset($_POST['ten_game'])) $ten_game = $_POST['ten_game'];
	if(isset($_POST['dg_nhap'])) $don_gia_nhap = $_POST['dg_nhap'];
	if(isset($_POST['dg_ban'])) $don_gia_ban = $_POST['dg_ban'];
	if(isset($_POST['mt_tom_tat'])) $mo_ta_tom_tat = $_POST['mt_tom_tat'];
	if(isset($_POST['mt_chi_tiet'])) $mo_ta_chi_tiet = $_POST['mt_chi_tiet'];
	if(isset($_POST['cau_hinh'])) $cau_hinh = $_POST['cau_hinh'];
	if(isset($_POST['cau_hinh_yc'])) $cau_hinh_yeu_cau = $_POST['cau_hinh_yc'];
	if(isset($_POST['ngay_nhap'])) $ngay_nhap = $_POST['ngay_nhap'];
	if(isset($_POST['trang_thai'])) $ma_trang_thai = $_POST['trang_thai'];
	$hinh = $_FILES["hinh"]["error"]==0?"images/". $_FILES["hinh"]["name"]:"";
	$add = new game();

	$them = $add->Them_game($key_game,$ma_the_loai,$ten_game,$don_gia_nhap,$don_gia_ban,$mo_ta_tom_tat,$mo_ta_chi_tiet,$cau_hinh,$cau_hinh_yeu_cau,$ngay_nhap,$ma_trang_thai,$hinh);
	if($them)
	{
		// Upload hinh ve tm images
		if($_FILES["hinh"]["error"]==0){
			move_uploaded_file($_FILES["hinh"]["tmp_name"],"images/" . $_FILES["hinh"]["name"] );
		}
		echo "<script>alert('Thêm sản phẩm thành công');window.location=`trang_chu.php`</script>";
	}
	else
	{
		echo "<script>alert('Thêm sản phẩm không thành công');window.location=`trang_chu.php`</script>";
	}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Admin | Thêm Game </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<link rel="stylesheet" href="css/style_1.css" type='text/css' />
<!-- //lined-icons -->
</head> 
<body>
   <div class="page-container">
   <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner">
             <!--header start here-->
				<div class="header-main">
					<div class="logo-w3-agile">
						<h1><a href="index.html">Chào bạn <?php if(isset($_SESSION['ten_admin']))echo $_SESSION['ten_admin']?></a></h1>
					</div>
					<div class="clearfix"> </div>	
				</div>

<!--heder end here-->
		<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="trang_chu.php">Home</a> <i class="fa fa-angle-right"></i></li>
        </ol>
<!--four-grids here-->
		<div class="four-grids">
		<div class="design-w3l">
		<div class="mail-form-agile">
			<form method="post" enctype="multipart/form-data">
				<input type="text" name="key_game" placeholder="Nhập Key game" required=""/>
				<input type="text"  name="the_loai" class="padding" placeholder="Nhập mã thể loại" required=""/>
				<input type="text"  name="ten_game" class="padding" placeholder="Nhập tên game" required=""/>
				<input type="text"  name="dg_nhap" class="padding" placeholder="Nhập đơn giá nhập" required=""/>
				<input type="text"  name="dg_ban" class="padding" placeholder="Nhập đơn giá bán" required=""/>
				<input type="text"  name="mt_tom_tat" class="padding" placeholder="Nhập mô tả tóm tắt" required=""/>
				<input type="text"  name="mt_chi_tiet" class="padding" placeholder="Nhập mô tả chi tiết" required=""/>
				<input type="text"  name="cau_hinh" class="padding" placeholder="Nhập cấu hình" required=""/>
				<input type="date"  name="ngay_nhap" class="padding" placeholder="Ngày nhập" required=""/>
				<input type="text"  name="cau_hinh_yc" class="padding" placeholder="Nhập cấu hình yêu cầu" required=""/>
				<input type="text"  name="trang_thai" class="padding" placeholder="Nhập mã trạng thái" required=""/>
				<input type="file"  name="hinh" class="padding"/>

				<input type="submit" name="them" value="Thêm">
			</form>
		</div>
		</div>
			<div class="clearfix"></div>
		</div>
<script>
$(document).ready(function() {
		var navoffeset=$(".header-main").offset().top;
		$(window).scroll(function(){
		var scrollpos=$(window).scrollTop(); 
		if(scrollpos >=navoffeset){
			$(".header-main").addClass("fixed");
		}else{
			$(".header-main").removeClass("fixed");
		}
		});
		
});
</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">
</div>
<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
	 <p>© 2016 Pooled. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
</div>	
<!--COPY rights end here-->
</div>
</div>
  <!--//content-inner-->
			<!--/sidebar-menu-->
				<div class="sidebar-menu">
					<header class="logo1">
						<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> 
					</header>
						<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
                        <div class="menu">
									<ul id="menu">	
										<li id="menu-academico" ><a href="#"><i class="fa fa-list-ul" aria-hidden="true"></i><span>Chức năng</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
											<ul id="menu-academico-sub" >
												<li id="menu-academico-avaliacoes" ><a href="them.php">Thêm</a></li>
												<li id="menu-academico-avaliacoes" ><a href="sua_sp.php">Sửa</a></li>
												<li id="menu-academico-avaliacoes" ><a href="xoa_sp.php">Xoá</a></li>
											</ul>
										</li>
										<li>
											<a href="don_hang.php"><i class="fa fa-table"></i><span>Đơn hàng</span><div class="clearfix"></div></a>
										</li>
								  	</ul>
							</div>
							  <div class="clearfix"></div>		
						</div>
				</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->	   
<!-- morris JavaScript -->	
<script src="js/raphael-min.js"></script>
<script src="js/morris.js"></script>
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	});
	</script>
</body>
</html>