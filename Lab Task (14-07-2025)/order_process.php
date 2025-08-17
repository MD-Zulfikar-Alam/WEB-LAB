<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to place an order.");
}

$user_id = $_SESSION['user_id'];
$coffee = mysqli_real_escape_string($conn, $_POST['coffee']);
$quantity = intval($_POST['quantity']);

if ($quantity < 1) {
    die("Quantity must be at least 1.");
}

$sql = "INSERT INTO orders (user_id, coffee, quantity, order_time) VALUES ($user_id, '$coffee', $quantity, NOW())";

if (mysqli_query($conn, $sql)) {
    echo "Order placed successfully!<br>";
    echo "<a href='order.php'>Place another order</a>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
