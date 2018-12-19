<?php
@session_start();
$gio_hang=$_SESSION["games"];

include_once("models/dat_hang.php");
include_once("models/khach_hang.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Giao hàng</title>
</head>
<body>
<h2>Chúng tôi xin cám ơn quí khách đã mua hàng tại website TPQShop </h2>
<p>Người nhận hàng Anh/Chị: <?php if(isset($_SESSION['ten_khach_hang'])) echo $_SESSION['ten_khach_hang'] ?></p>
<p>Hình thức thanh toán: <?php  if(isset($hinh_thuc_thanh_toan)) echo $hinh_thuc_thanh_toan ?></p>
<p>Tổng tiền thanh toán: <?php if(isset($tong_tien)) echo number_format($tong_tien) ?> đồng</p>
<h3>Đơn hàng của quí khách</h3>
<table width="100%" border="1" cellspacing="2" cellpadding="2" style="border-collapse:collapse">
  <tr>
    <td>Sản phẩm</td>
    <td>Số lượng</td>
    <td>Đơn giá</td>
    <td>Thành tiền</td>
  </tr>
  <?php
  if(isset($gio_hang))
  {
	foreach($gio_hang as $item)
	{  
		$thanhtien=$item["product_qty"]*$item["don_gia_ban"];
  ?>
  <tr>
    <td><?php echo $item["ten_game"] ?></td>
    <td><?php echo $item["product_qty"] ?></td>
    <td><?php echo $item["don_gia_ban"] ?> đồng</td>
    <td><?php echo number_format($thanhtien) ?> đồng</td>
  </tr>
  <?php
  }
  }
  unset($_SESSION["games"]);
	header("refresh:10;url=games.php");
  ?>
</table>

</body>
</html>