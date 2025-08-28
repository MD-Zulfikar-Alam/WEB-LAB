<?php
include 'db.php';
$result = mysqli_query($conn, "SELECT * FROM fitness_plan");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Fitness Plan</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f9f9f9; padding: 20px; }
        h2 { color: #333; }
        a { text-decoration: none; background: #4CAF50; color: white; padding: 6px 12px; border-radius: 5px; }
        a:hover { background: #45a049; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; background: white; }
        th, td { padding: 10px; text-align: center; border: 1px solid #ddd; }
        th { background: #4CAF50; color: white; }
        tr:nth-child(even) { background: #f2f2f2; }
        .action a { margin: 0 5px; padding: 5px 10px; }
        .edit { background: #2196F3; }
        .edit:hover { background: #0b7dda; }
        .delete { background: #f44336; }
        .delete:hover { background: #da190b; }
    </style>
</head>
<body>
    <h2>📋 My Fitness Plan</h2>
    <a href="add.php">➕ Add New Plan</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Exercise</th>
            <th>Duration</th>
            <th>Calories</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['exercise']; ?></td>
            <td><?php echo $row['duration']; ?></td>
            <td><?php echo $row['calories']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td class="action">
                <a class="edit" href="edit.php?id=<?php echo $row['id']; ?>">✏️ Edit</a> 
                <a class="delete" href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?');">❌ Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
