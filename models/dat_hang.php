<?php
require_once('database.php');
class dat_hang extends database
{
	function Them_hoa_don($ma_khach_hang,$ngay_dat,$tong_tien,$ma_trang_thai)
	{
		$sql="insert into hoa_don values(?,?,?,?,?)";
		$this->setQuery($sql);
		$param=array(NULL,$ma_khach_hang,$ngay_dat,$tong_tien,$ma_trang_thai);
		$this->execute($param);
		return  $this->getLastId();
	}
	// ma_hoa_don, ma_mon, so_luong, don_gia, mon_thuc_don
	function Them_chi_tiet_hoa_don($ma_hoa_don,$ma_game,$don_gia,$so_luong,$tong_tien)
	{
		$sql="insert into ct_hoa_don values(?,?,?,?,?,?)";
		$this->setQuery($sql);
		$param=array(NULL,$ma_hoa_don,$ma_game,$don_gia,$so_luong,$tong_tien);
		return $this->execute($param);
	}
	function Tong_tien($arr)
	{
		$tong=0;
		foreach($arr as $item)
		{
			$tong+= $item["product_qty"]* $item["don_gia_ban"];
		}
		return $tong;	
	}

}