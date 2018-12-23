<?php
    include('database.php');
    class dang_nhap extends database
    {
        function Doc_Admin()
        {
            $sql="select * from user";
            $this->setQuery($sql);
		    return $this->loadAllRows();
        }
        function Doc_Admin_theo_tenDn_pass($ten,$mk)
	    {
            $sql="select * from user where email=? and password=?";
            $this->setQuery($sql);
            return $this->loadRow(array($ten,md5($mk)));	

        }
        
    }
?>