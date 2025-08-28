<?php
include 'db.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM fitness_plan WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $exercise = $_POST['exercise'];
    $duration = $_POST['duration'];
    $calories = $_POST['calories'];
    $date = $_POST['date'];

    mysqli_query($conn, "UPDATE fitness_plan 
                         SET exercise='$exercise', duration='$duration', calories='$calories', date='$date' 
                         WHERE id=$id");

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Plan</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f1f1f1; padding: 20px; }
        h2 { color: #333; }
        form { background: white; padding: 20px; border-radius: 10px; width: 350px; }
        input[type=text], input[type=number], input[type=date] { 
            width: 100%; padding: 10px; margin: 8px 0; border: 1px solid #ccc; border-radius: 5px; 
        }
        input[type=submit] { background: #2196F3; color: white; padding: 10px; border: none; border-radius: 5px; cursor: pointer; }
        input[type=submit]:hover { background: #0b7dda; }
        a { text-decoration: none; display: inline-block; margin-top: 10px; color: #2196F3; }
    </style>
</head>
<body>
    <h2>✏️ Edit Fitness Plan</h2>
    <form method="post">
        Exercise: <input type="text" name="exercise" value="<?php echo $row['exercise']; ?>" required><br>
        Duration: <input type="text" name="duration" value="<?php echo $row['duration']; ?>" required><br>
        Calories: <input type="number" name="calories" value="<?php echo $row['calories']; ?>" required><br>
        Date: <input type="date" name="date" value="<?php echo $row['date']; ?>" required><br>
        <input type="submit" name="update" value="Update Plan">
    </form>
    <a href="index.php">⬅ Back to Home</a>
</body>
</html>
