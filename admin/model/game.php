<?php
    include('database.php');
    class game extends database
    {
        //`ma_game`, `key_game`, `ma_the_loai`, `ten_game`, `don_gia_nhap`, `don_gia_ban`, `mo_ta_tom_tat`, `mo_ta_chi_tiet`, `cau_hinh`, `cau_hinh_yeu_cau`, `ngay_nhap`, `ma_trang_thai`, `hinh`
        function Them_game($key_game,$ma_the_loai,$ten_game,$don_gia_nhap,$don_gia_ban,$mo_ta_tom_tat,$mo_ta_chi_tiet,$cau_hinh,$cau_hinh_yeu_cau,$ngay_nhap,$ma_trang_thai,$hinh)
        {
            $sql="insert into games values(?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $this->setQuery($sql);
            $this->execute(array(NULL,$key_game,$ma_the_loai,$ten_game,$don_gia_nhap,$don_gia_ban,$mo_ta_tom_tat,$mo_ta_chi_tiet,$cau_hinh,$cau_hinh_yeu_cau,$ngay_nhap,$ma_trang_thai,$hinh));
            return $this->getLastId();
        }
        function Xoa_game($ma_game)
        {
            $sql="delete from games where ma_game=?";
            $this->setQuery($sql);
            return $this->execute(array($ma_game));
        }
        function Sua_game($key_game,$ma_the_loai,$ten_game,$don_gia_nhap,$don_gia_ban,$mo_ta_tom_tat,$mo_ta_chi_tiet,$cau_hinh,$cau_hinh_yeu_cau,$ngay_nhap,$ma_trang_thai,$hinh,$ma_game)
        {
            $sql="update games set key_game=?,ma_the_loai=?,ten_game=?,don_gia_nhap=?,don_gia_ban=?,mo_ta_tom_tat=?,mo_ta_chi_tiet=?,cau_hinh=?,cau_hinh_yeu_cau=?,ngay_nhap=?,ma_trang_thai=?,hinh=? where ma_game=?";
            $this->setQuery($sql);
            return $this->execute(array($key_game,$ma_the_loai,$ten_game,$don_gia_nhap,$don_gia_ban,$mo_ta_tom_tat,$mo_ta_chi_tiet,$cau_hinh,$cau_hinh_yeu_cau,$ngay_nhap,$ma_trang_thai,$hinh,$ma_game));
        }
        function Doc_games()
        {
            $sql="select * from games";
            $this->setQuery($sql);
		    return $this->loadAllRows();
        }  
    }
?>