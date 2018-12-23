<!-- Games Page Starts here -->
<?php
$thong_bao="";
if(isset($_SESSION["error"])){
	$thong_bao=$_SESSION["error"];
	unset($_SESSION["error"]);
}
?>
<div class="games">
	<div class="container">
		<div class="page-path">
			<ul class="path-list">
				<li><a href=".">Trang chủ</a></li>&nbsp;&nbsp;/&nbsp;&nbsp;
				<li class="act">Games</li>
			</ul>
			<p><a href=".">Về Trang Chủ</a></p>
			<div class="clearfix"></div>
		</div>
		<h3 class="page-header">
            Danh Sách Games
		</h3>
		<div class="main">
                <?php echo $thong_bao?>		
                <?php
                    foreach($game as $games)
                    {
                ?>
                <div class="view view-first">
                    <img src="<?php echo $games['hinh']?>" />
                    <div class="mask">
                        <h2><?php echo $games['ten_game']?></h2>
                        <p><?php echo $games['mo_ta_tom_tat']?></p>
                        <a href="chi_tiet_games.php?ma_game=<?php echo $games['ma_game']?>" class="info">Xem chi tiết</a>
                    </div>
                </div> 
                <?php
                    }
                ?> 
          </div>
          <div class="side-bar">
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
          <div class="clearfix"></div>
	</div>
</div>
<!-- Games Page Ends here -->
