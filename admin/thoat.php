<?php
if (!isset($_SESSION)) session_start();
unset($_SESSION['ten_admin']);
header('location:index.php');
?>