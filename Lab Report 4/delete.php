<?php
include 'db.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM fitness_plan WHERE id=$id");
header("Location: index.php");
?>
