<?php
$server = 'localhost'; // Your database server
$username = 'root';              // Your database user
$password = '';          // Your database password
$database = 'games';              // Your database name

try{
	$conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch(PDOException $e){
	die( "Connection failed: " . $e->getMessage());
}