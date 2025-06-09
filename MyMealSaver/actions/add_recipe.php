<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $instructions = $_POST['instructions'];

    $stmt = $conn->prepare("INSERT INTO recipes (title, instructions) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $instructions);
    $stmt->execute();

    header("Location: ../pages/dashboard.php");
}
?>
