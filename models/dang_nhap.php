<?php
    include('database.php');
    class dang_nhap extends database
    {
        function Doc_khach_hang()
        {
            $sql="select * from khach_hang";
            $this->setQuery($sql);
		    return $this->loadAllRows();
        }
        function Doc_khach_hang_theo_tenDn_pass($ten,$mk)
	    {
            $sql="select * from khach_hang where email=? and mat_khau=?";
            $this->setQuery($sql);
            return $this->loadRow(array($ten,md5($mk)));	

	    }
    }
?>