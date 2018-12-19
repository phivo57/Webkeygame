<?php
include_once("controller/c_chi_tiet_games.php");
$c_chitiet=new C_Chi_Tiet_Games();
//$c_chitiet->Hien_thi_chi_tiet_games()
if(isset($_GET["ma_the_loai"])){
    $c_chitiet->Hien_thi_games_theo_ma_the_loai();
}else{
    $c_chitiet->Hien_thi_chi_tiet_games();
}
?>