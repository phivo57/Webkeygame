<?php
session_start();
require("../inc/database.php");
if (!isset($_SESSION['sess_email'])) { 
    header('Location: ../login.php');
    exit;
} elseif(isset($_SESSION['sess_email']) && $_SESSION['sess_userrole'] == "user"){
    header('Location: /membrii/');
    exit;
}
?>


<!-- Here goes the content -->

admin secure place <br>
content goes here


