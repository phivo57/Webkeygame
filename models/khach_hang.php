<?php
require_once('database.php');
class khach_hang extends database
{
	function Doc_khach_hang_theo_ma_khach_hang($ma_khach_hang)
	{
		$sql="select * from khach_hang where ma_khach_hang=?";
		$this->setQuery($sql);
		return $this->loadRow(array($ma_khach_hang));	

	}
}