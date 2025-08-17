<?php
// db.php - Database connection

$host = "localhost";
$username = "root";    // default XAMPP username
$password = "";        // default XAMPP password is empty
$dbname = "diu_coffee_shop";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
