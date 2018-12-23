<?php 
session_start();

//destroing the session
	session_destroy();
	header('Location: ../login.php');