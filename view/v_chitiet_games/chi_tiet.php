<!-- Games Page Starts here -->
<?php
@session_start();

?>
<div class="games">
	<div class="container">
		<div class="page-path">
			<ul class="path-list">
				<li><a href="games.php">Games</a></li>&nbsp;&nbsp;/&nbsp;&nbsp;
				<li class="act">Chi Tiết Game</li>
			</ul>
			<div class="clearfix"></div>
		</div>
		<div class="side-bar" style="float:right">
				<h4><a href="games.php">Các thể loại game</a></h4>
				<ul class="game-list">
					<?php
						foreach($loaigames as $loais)
						{
					?>
					<li><a href="games.php?ma_the_loai=<?php echo $loais['ma_the_loai']?>"><?php echo $loais['ten_the_loai']?></a></li>
					<?php
						}
					?>
				</ul>
			</div>
		<div class="blog-content">
		
			<form class="form-item">
			
			<div class="about-top">
				
			
				<img src="<?php echo $arr['hinh']?>" alt="">
				
				
				
				
				<div class="about-details">
				
					<h3><?php echo $arr['ten_game']?></h3>
					<p style="font-size:15px"><?php echo $arr['mo_ta_chi_tiet'] ?></p>
					<input name="ma_game" type="hidden" value="<?php echo $arr['ma_game'] ?>">
					
					
				</div>
				
			</div>
			
			<div class="clearfix"></div>
			
			 
			</form>
			
			<h3 class="page-header">Cấu hình tối thiểu</h3>
			<p style="font-size:20px"><?php echo $arr["cau_hinh"]?></p>
			<?php 
				if($arr["cau_hinh_yeu_cau"]!="")
				{
			?>
			<h3 class="page-header">Cấu hình yêu cầu</h3>
			<p style="font-size:20px"><?php echo $arr["cau_hinh_yeu_cau"]?></p>
			<?php
				}
			?>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- Games Endss Here -->
