<?php
$host = "localhost";
$user = "root";   // XAMPP default user
$pass = "";       // XAMPP default password is empty
$db   = "fitness_db";

// Database Connection
$conn = mysqli_connect($host, $user, $pass, $db);

// Check Connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
