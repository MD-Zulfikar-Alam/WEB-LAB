<?php
require 'db.php';

// Sanitize inputs
$fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$birth = mysqli_real_escape_string($conn, $_POST['birth']);
$password = $_POST['password'];

// Validate email domain for .cse@diu.edu.bd
if (!preg_match('/^[a-zA-Z0-9._%+-]+@cse\.diu\.edu\.bd$/', $email)) {
    die("Email must be a valid '.cse@diu.edu.bd' email.");
}

// Password validation (at least one uppercase, one lowercase, one '@')
if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*@).+$/', $password)) {
    die("Password must contain uppercase, lowercase letters and '@'.");
}

// Hash the password securely
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert user (without serial first)
$sql_insert = "INSERT INTO users (fullname, email, birth, password) VALUES ('$fullname', '$email', '$birth', '$hashed_password')";
if (mysqli_query($conn, $sql_insert)) {
    $last_id = mysqli_insert_id($conn);

    // Generate serial = YYYY + zero-padded 3-digit last_id
    $birth_year = date('Y', strtotime($birth));
    $serial = $birth_year . str_pad($last_id, 3, '0', STR_PAD_LEFT);

    // Update the serial in the same record
    $sql_update = "UPDATE users SET serial='$serial' WHERE id=$last_id";
    mysqli_query($conn, $sql_update);

    echo "Registration successful. Your serial number: $serial <br>";
    echo "<a href='login.php'>Click here to login</a>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
