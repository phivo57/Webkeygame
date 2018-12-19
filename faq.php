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
<title>TPQShopKeyGame | FAQ</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-1.11.0.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery.mixitup.min.js"></script>
<script type="text/javascript">
$(function () {
	
	var filterList = {
	
		init: function () {
		
			// MixItUp plugin
			// http://mixitup.io
			$('#portfoliolist').mixitup({
				targetSelector: '.portfolio',
				filterSelector: '.filter',
				effects: ['fade'],
				easing: 'snap',
				// call the hover effect
				onMixEnd: filterList.hoverEffect()
			});				
		
		},
		
		hoverEffect: function () {
		
			// Simple parallax effect
			$('#portfoliolist .portfolio').hover(
				function () {
					$(this).find('.label').stop().animate({bottom: 0}, 200, 'easeOutQuad');
					$(this).find('img').stop().animate({top: -30}, 500, 'easeOutQuad');				
				},
				function () {
					$(this).find('.label').stop().animate({bottom: -40}, 200, 'easeInQuad');
					$(this).find('img').stop().animate({top: 0}, 300, 'easeOutQuad');								
				}		
			);				
		
		}

	};
	
	// Run the show!
	filterList.init();
	
	
});	
</script>
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
			<div class="clearfix"></div>
			<script>
				$( "span.menu" ).click(function() {
				  $( ".navigation" ).slideToggle( "slow", function() {
				    // Animation complete.
				  });
				});
			</script>

		</div>
		<div class="clearfix"></div>
	</div>
</div>
<div class="banner"></div>
<!-- Header Ends Here -->
<div class="banner-bot">
	<div class="container">
		<h2>Chào mừng bạn <?php if(isset($_SESSION["ten_khach_hang"]))echo $_SESSION["ten_khach_hang"]?> đến với Shop!</h2>
		<p>Chuyên cung cấp key game cho người việt - Web hỗ trợ người Việt Nam dễ tiếp cận với game có bản quyền</p>
	</div>
</div>
<!-- Gallery Starts Here -->
<div class="gallery">
	<div class="container">
		<h3>FAQ</h3>
        <h4 style="text-align:left;font-size:25px">A. Cam kết dịch vụ: </h4>
        <p style="text-align:left"> - Chúng tôi cam kết tất cả các sản phẩm bán ra đều chính hãng từ các nhà cung cấp như Steam, Origin, Battle.net v.v.

Tất cả các sản phẩm bán ra đều hợp pháp với pháp luật Việt Nam

Cam kết hỗ trợ khách hàng sau khi mua sản phẩm.</p>
        <hr/>
        <h4 style="text-align:left;font-size:25px">B. Qui định về sản phẩm: </h4>
        <p style="text-align:left"> - Tất cả các sản phẩm bán ra đều là hàng chính hãng từ các nhà cung cấp Steam, Origin, Battle.net v.v.

Tất cả các sản phẩm phần mềm đều kích hoạt vĩnh viễn.

Hỗ trợ đổi mới hoặc hoàn lại tiền với bất kì sản phẩm nào gặp lỗi.</p>
        <hr/>
        <h4 style="text-align:left;font-size:25px">C. Qui định chuyển giao sản phẩm: </h4>
        <p style="text-align:left"> - Sau khi quý khách đặt hàng tại tpqshop. Sản phẩm sẽ được gửi đến địa chỉ email của quý khách (Đổi với cả sản phẩm trực tuyến) và giao hàng tận nơi đối với các sản phẩm vật lý.</p>
        <hr/>
        <h4 style="text-align:left;font-size:25px">D. Chính sách bảo hành: </h4>
        <p style="text-align:left"> - Bảo hành trọn đời với mọi phần mềm.

Cam kết đổi mới hoặc hoàn lại tiền nếu sản phẩm gặp lỗi.</p>
        <hr/>
        <h4 style="text-align:left;font-size:25px">E. Phương thức thanh toán: </h4>
        <p style="text-align:left"> - Chuyển khoản qua ngân hàng, nhận tiền mặt, thanh toán qua thẻ</p>
        <hr/>
        <h4 style="text-align:left;font-size:25px">E. Cách thức mua hàng: </h4>
        <p style="text-align:left"> - Đăng nhập vào website (Nếu chưa có tài khoản tại website, mời bạn đăng kí)</p>
        <p style="text-align:left"> - Sau khi đăng nhập vào trang Game, chọn vào game muốn mua và bấm đặt hàng</p>
        <p style="text-align:left"> - Bấm vào logo giỏ hàng để thanh toán, sau khi thanh toán thành công, bạn sẽ nhận được code-game thông qua email mà bạn đã đăng kí trên website</p>
        <hr/>
	</div>
</div>
<!-- Gallery Ends Here -->
<!-- Video Part starts Here -->
<div class="video-serch">
	<div class="container">
		<div class="col-md-6 vid-col">
			<p>Video Hướng dẫn mua hàng trên website </p>
			<div class="more">
				<a href="login.php">Đến mua hàng</a>
			</div>
		</div> 
		<div class="col-md-6 vid-coll">
			<div class="play-but">
				<a href="#small-dialog5" class="thickbox play-icon popup-with-zoom-anim"><img src="images/vid-play.png" alt="" /></a>
			</div>
			<!--pop-up-box-->
					  <script type="text/javascript" src="js/modernizr.custom.53451.js"></script>  
					<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
					<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
			<!--pop-up-box-->
			<div id="small-dialog5" class="mfp-hide">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/_vrndA3cJuM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
				 <script>
						$(document).ready(function() {
						$('.popup-with-zoom-anim').magnificPopup({
							type: 'inline',
							fixedContentPos: false,
							fixedBgPos: true,
							overflowY: 'auto',
							closeBtnInside: true,
							preloader: false,
							midClick: true,
							removalDelay: 300,
							mainClass: 'my-mfp-zoom-in'
						});
																						
						});
				</script>
		</div>
		<div class="clearfix"></div>
	</div>	
</div>
<!-- Video Part Ends Here -->
<!-- Footer Starts Here -->
<div class="footer">
	<div class="container">
		<ul class="social">
			<li><i class="fa"></i></li>
			<li><i class="fb"></i></li>
			<li><i class="fc"></i></li>
		</ul>
		<p>2014 Design by <a href="http://w3layouts.com">W3layouts</a></p>
	</div>
	
</div>
<!-- Footer Ends Here -->
</body>
</html>