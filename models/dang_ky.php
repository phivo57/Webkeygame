<?php
    include('database.php');
    class dang_ky extends database
    {
        function Dk_khach_hang($ten,$email,$mat_khau)
        {
            $sql="insert into khach_hang(ten_khach_hang,email,mat_khau) values('$ten','$email','$mat_khau')";
            $this->setQuery($sql);
		    return $this->loadRow(array($ten,$email,md5($mat_khau)));
        }
        function doc_khach_hang()
        {
            $sql="select * from khach_hang ";
            $this->setQuery($sql);
		    return $this->loadAllRows();
        }
    }
?>