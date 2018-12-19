<?php
include_once("controller/c_games.php");
$c_games=new C_Games();
if(isset($_GET["ma_the_loai"])){
    $c_games->Hien_thi_games_theo_ma_the_loai();
}else if(isset($_POST['ten_game']))
{
    $c_games->Hien_thi_games_theo_tim_kiem();
}
else{
    $c_games->Hien_thi_games();
}


?>