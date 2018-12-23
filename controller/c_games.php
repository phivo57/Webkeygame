<?php
@session_start();
// Models
include_once('models/game.php');
class C_Games
{
    public function Hien_thi_games(){
        
        $g = new game();
        $game = $g->Doc_games();
        $loaigames = $g->Doc_the_loai_game();
        // Views
        $title="Games";
        require_once("views/v_games/layouts.php");
    }
    public function Hien_thi_games_theo_ma_the_loai()
    {
        // Models
        $ma_the_loai = $_GET['ma_the_loai'];
        $g = new game();
        $game = $g->Doc_game_theo_the_loai_game($ma_the_loai);
        $loaigames = $g->Doc_the_loai_game();
        // Views
        $title="Games";
        require_once("views/v_games/layouts.php");
    }
    public function Hien_thi_games_theo_tim_kiem()
    {
        // Models
        if(isset($_POST['tim']))
        {
            $ten  = $_POST["ten_game"];
            $g = new game();
            $game = $g->tim_game_theo_ten_game($ten);
            //print_r($game);
            if($game==[])
            {
                $_SESSION['error']="Không tìm thấy sản phẩm";
            }
            $loaigames = $g->Doc_the_loai_game();
        }
        // Views
        $title="Games";
        require_once("views/v_games/layouts.php");
    }
    
}
?>