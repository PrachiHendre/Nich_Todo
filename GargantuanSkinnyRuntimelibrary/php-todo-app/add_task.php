<?php
require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task = $_POST['task'];

    $stmt = $conn->prepare("INSERT INTO tasks (task) VALUES (?)");
    $stmt->execute([$task]);

    header("Location: index.php"); // Redirect back to the main page
    exit;
}
?>