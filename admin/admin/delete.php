<?php
require '../inc/database.php';

// Get the ID
$Uid = $_GET['id'];

//Delete from database
$del = "DELETE  FROM users WHERE id = :id";
$stmt = $conn->prepare($del);
$stmt->bindParam(':id', $Uid);   
$stmt->execute();
header('Location: /admin/');