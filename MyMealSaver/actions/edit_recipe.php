<?php
require '../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];
    
    $stmt = $conn->prepare("SELECT * FROM recipes WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $recipe = $result->fetch_assoc();
    
    if (!$recipe) {
        header("Location: ../pages/dashboard.php");
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id"])) {
    $id = $_POST["id"];
    $title = $_POST["title"];
    $instructions = $_POST["instructions"];

    $stmt = $conn->prepare("UPDATE recipes SET title = ?, instructions = ? WHERE id = ?");
    $stmt->bind_param("ssi", $title, $instructions, $id);
    $stmt->execute();

    header("Location: ../pages/dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Recipe</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>
    <div class="container">
        <a href="../pages/dashboard.php" class="logout">← Back to Dashboard</a>
        
        <h1>Edit Recipe</h1>

        <?php if (isset($recipe)): ?>
        <div class="card add-card">
            <h2>Update Recipe Details</h2>
            <form method="POST" action="edit_recipe.php" class="add-form">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($recipe['id']); ?>">
                <input type="text" name="title" value="<?php echo htmlspecialchars($recipe['title']); ?>" placeholder="Recipe Title" required>
                <textarea name="instructions" rows="6" placeholder="Instructions" required><?php echo htmlspecialchars($recipe['instructions']); ?></textarea>
                <button type="submit">Update Recipe</button>
            </form>
        </div>
        <?php else: ?>
        <div class="card">
            <p style="text-align: center; color: red; font-size: 1.2em;">Recipe not found.</p>
            <p style="text-align: center;">
                <a href="../pages/dashboard.php" style="color: #007BFF; text-decoration: none; font-weight: bold;">Return to Dashboard</a>
            </p>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>