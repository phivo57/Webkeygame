<?php
if (!isset($_SESSION)) session_start();
unset($_SESSION['ten_khach_hang']);
header('location:index.php');
?>