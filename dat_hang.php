<?php
@session_start();
include_once("models/dat_hang.php");
include_once("models/khach_hang.php");
if(isset($_POST["end"]))
{
    $dat_hang=new dat_hang();
    $khach_hang=new khach_hang();
    $gio_hang=$_SESSION["games"];
    $ma_khach_hang=$_SESSION["ma_khach_hang"];
    $kh=$khach_hang->Doc_khach_hang_theo_ma_khach_hang($ma_khach_hang);
    $hinh_thuc_thanh_toan=$_POST["httt"];
    $tong_tien=$dat_hang->Tong_tien($gio_hang);
    $ma_hoa_don=$dat_hang->Them_hoa_don($ma_khach_hang,date("Y-m-d"),$tong_tien,4);
    if($ma_hoa_don)
    {
        //Thêm chi tiết hóa đơn
        foreach($gio_hang as $item)
        {
            $ma_game=$item["ma_game"];
            $so_luong=$item["product_qty"];
            $don_gia=$item["don_gia_ban"];
            $tong_tien = $don_gia * $so_luong;
            $dat_hang->Them_chi_tiet_hoa_don($ma_hoa_don,$ma_game,$don_gia,$so_luong,$tong_tien);	
        }
        // Xóa session products 
    }
    include("giao_hang.php");
}
?>