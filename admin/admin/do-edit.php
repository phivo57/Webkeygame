<?php 
	require '../inc/database.php';

// Get the variables	
$role = $_GET['role'];
$Uid = $_GET['Uid'];

// Update the database
$update = "UPDATE users SET role = :role WHERE id = :id";
$stmt = $conn->prepare($update);
$stmt->bindValue(':role', $role);
$stmt->bindValue(':id', $Uid);
$stmt->execute();

header('Location: /admin/');
?>