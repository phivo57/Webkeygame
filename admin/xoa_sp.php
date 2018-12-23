<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
@session_start();
include_once("model/game.php");
$g = new game();
$doc = $g->Doc_games();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Admin | Xoá Game </title>
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
<!-- //lined-icons -->
<!-- tables -->
<link rel="stylesheet" type="text/css" href="css/table-style.css" />
<link rel="stylesheet" type="text/css" href="css/basictable.css" />
<script type="text/javascript" src="js/jquery.basictable.min.js"></script>
<script type="text/javascript" src="js/thu_vien.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $('#table').basictable();

      $('#table-breakpoint').basictable({
        breakpoint: 768
      });

      $('#table-swap-axis').basictable({
        swapAxis: true
      });

      $('#table-force-off').basictable({
        forceResponsive: false
      });

      $('#table-no-resize').basictable({
        noResize: true
      });

      $('#table-two-axis').basictable();

      $('#table-max-height').basictable({
        tableWrapper: true
      });
    });
</script>
<!-- //tables -->
</head> 
<body>
   <div class="page-container">
   <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner">
             <!--header start here-->
				<div class="header-main">
					<div class="logo-w3-agile">
						<h1><a href="#">Chào bạn <?php if(isset($_SESSION['ten_admin']))echo $_SESSION['ten_admin']?></a></h1>
					</div>
					<div class="clearfix"> </div>	
				</div>

<!--heder end here-->
		<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="trang_chu.php">Home</a> <i class="fa fa-angle-right"></i>Xoá Sản Phẩm</li>
        </ol>
<!--four-grids here-->
		<div class="four-grids">
			<div class="w3l-table-info">
						<h2>Danh sách game</h2>
						<table id="table">
								<thead>
									<tr>
									<th>Key Game</th>
									<th>Mã thể loại Game</th>
									<th>Tên Game</th>
									<th>Giá bán</th>
									<th>Giá nhập</th>
									<th>Ngày nhập</th>
									<th>Thao tác</th>
									</tr>
								</thead>
								<?php
									foreach($doc as $d)
									{
								?>
								<tbody>
									<tr>
									<td><?php echo $d['key_game']?></td>
									<td><?php echo $d['ma_the_loai']?></td>
									<td><?php echo $d['ten_game']?></td>
									<td><?php echo $d['don_gia_ban']?></td>
									<td><?php echo $d['don_gia_nhap']?></td>
									<td><?php echo $d['ngay_nhap']?></td>
									<td><a href="javascript:Xoa_Game(<?php echo $d['ma_game']?>)">Xoá</a></td>
									</tr>
								</tbody>
								<?php
									}
								?>
						</table>
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