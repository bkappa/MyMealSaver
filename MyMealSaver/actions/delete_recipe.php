<?php
include '../includes/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM recipes WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    header("Location: ../pages/dashboard.php");
}
?>
