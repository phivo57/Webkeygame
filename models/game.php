<?php
    include('database.php');
    class game extends database
    {
        function Doc_games()
        {
            $sql="select * from games";
            $this->setQuery($sql);
		    return $this->loadAllRows();
        }
        function Doc_the_loai_game()
        {
            $sql = "select * from loai_games";
            $this->setQuery($sql);
		    return $this->loadAllRows();
        }
        function Doc_game_theo_ma_game($ma_game)
        {
            $sql="select * from games where ma_game=?";
            $this->setQuery($sql);
            return $this->loadRow(array($ma_game));
        }
        function Doc_game_theo_the_loai_game($ma_the_loai)
        {
            $sql="select * from games inner join loai_games on loai_games.ma_the_loai = games.ma_the_loai
            where games.ma_the_loai=?";
            $this->setQuery($sql);
            return $this->loadAllRows(array($ma_the_loai));
        }
        function tim_game_theo_ten_game($ten)
        {
            $sql="select * from games where ten_game like'%$ten%'";
            $this->setQuery($sql);
            return $this->loadAllRows(array($ten));
        }
    }
?>
