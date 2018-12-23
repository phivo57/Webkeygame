<?php
include_once('models/game.php');
class C_Chi_Tiet_Games
{
    public function Hien_thi_chi_tiet_games(){
        // Models
        $ma_game = $_GET['ma_game'];
        $g = new game();
        $arr = $g->Doc_game_theo_ma_game($ma_game);
        $loaigames = $g->Doc_the_loai_game();
        // Views
        $title="Games";
        require_once("views/v_chitiet_games/layouts.php");
    }
    public function Hien_thi_games_theo_ma_the_loai(){
        // Models
        $ma_the_loai = $_GET['ma_the_loai'];
        $g = new game();
        $game = $g->Doc_game_theo_the_loai_game($ma_the_loai);
        $loaigames = $g->Doc_the_loai_game();
        // Views
        $title="Games";
        require_once("views/v_chitiet_games/layouts.php");
    }
}
?>