<?php
include_once("model/game.php");
if(isset($_GET["ma_game"])){
    $ma_game=$_GET["ma_game"];
    $m_game=new game();
    $kq=$m_game->Xoa_game($ma_game);
    
    if($kq){
        header("location:xoa_sp.php");
    }
    

}
?>