<?php
include 'db.php';

if (isset($_POST['submit'])) {
    $exercise = $_POST['exercise'];
    $duration = $_POST['duration'];
    $calories = $_POST['calories'];
    $date = $_POST['date'];

    $sql = "INSERT INTO fitness_plan (exercise, duration, calories, date) 
            VALUES ('$exercise','$duration','$calories','$date')";
    mysqli_query($conn, $sql);

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Plan</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f1f1f1; padding: 20px; }
        h2 { color: #333; }
        form { background: white; padding: 20px; border-radius: 10px; width: 350px; }
        input[type=text], input[type=number], input[type=date] { 
            width: 100%; padding: 10px; margin: 8px 0; border: 1px solid #ccc; border-radius: 5px; 
        }
        input[type=submit] { background: #4CAF50; color: white; padding: 10px; border: none; border-radius: 5px; cursor: pointer; }
        input[type=submit]:hover { background: #45a049; }
        a { text-decoration: none; display: inline-block; margin-top: 10px; color: #2196F3; }
    </style>
</head>
<body>
    <h2>➕ Add Fitness Plan</h2>
    <form method="post">
        Exercise: <input type="text" name="exercise" required><br>
        Duration: <input type="text" name="duration" required><br>
        Calories: <input type="number" name="calories" required><br>
        Date: <input type="date" name="date" required><br>
        <input type="submit" name="submit" value="Add Plan">
    </form>
    <a href="index.php">⬅ Back to Home</a>
</body>
</html>
