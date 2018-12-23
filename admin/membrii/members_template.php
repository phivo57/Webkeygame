<?php
session_start();
require("../inc/database.php");
if (!isset($_SESSION['sess_email'])) { 
    header('Location: ../login.php');
    exit;
} elseif(isset($_SESSION['sess_email']) && $_SESSION['sess_userrole'] == "admin"){
    header('Location: /admin/');
    exit;
}

?>

Members template <br>
content goes here
