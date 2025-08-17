<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
</head>
<body>
  <h2>Welcome, <?= htmlspecialchars($_SESSION["username"]) ?>!</h2>
  <p>Your Serial Number: <?= htmlspecialchars($_SESSION["serial_number"]) ?></p>
  <a href="logout.php">Logout</a>
</body>
</html>
