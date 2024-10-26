<?php
require_once('config.php');

if (isset($_GET['id']) && isset($_GET['completed'])) {
    $id = $_GET['id'];
    $completed = $_GET['completed'];

    $stmt = $conn->prepare("UPDATE tasks SET completed = ? WHERE id = ?");
    $stmt->execute([$completed, $id]);

    header("Location: index.php"); 
    exit;
}
?>