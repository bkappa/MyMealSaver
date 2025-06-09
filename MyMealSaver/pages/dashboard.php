<?php

include '../includes/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Dashboard</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>
    <div class="container">
        <a href="logout.php" class="logout">Logout</a>
        
        <h1>Recipe List</h1>

        <div class="recipes-container">
            <?php
            $result = $conn->query("SELECT * FROM recipes");
            while ($row = $result->fetch_assoc()) {
            ?>
                <div class="card recipe-item">
                    <p><strong><?php echo htmlspecialchars($row['title']); ?></strong></p>
                    <hr>
                    <p><?php echo nl2br(htmlspecialchars($row['instructions'])); ?></p>
                    <div class="recipe-actions">
                        <a href="../actions/edit_recipe.php?id=<?php echo $row['id']; ?>">Edit</a>
                        <a href="../actions/delete_recipe.php?id=<?php echo $row['id']; ?>">Delete</a>
                    </div>
                </div>
            <?php } ?>
        </div>

        <div class="card add-card">
            <h2>Add a New Recipe</h2>
            <form method="POST" action="../actions/add_recipe.php" class="add-form">
                <input type="text" name="title" placeholder="Recipe Title" required>
                <textarea name="instructions" placeholder="Instructions" rows="4" required></textarea>
                <button type="submit">Add Recipe</button>
            </form>
        </div>
    </div>
</body>
</html>