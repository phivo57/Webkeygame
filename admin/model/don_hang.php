<?php
    include('database.php');
    class don_hang extends database
    {
        function doc_don_hang()
        {
            $sql = "select * from hoa_don";
            $this->setQuery($sql);
            return $this->loadAllRows();
            
        
    }
?>