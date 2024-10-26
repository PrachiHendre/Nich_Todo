<?php
$host = 'sql12.freesqldatabase.com'; // e.g., localhost or your database host
$db = 'sql12740758';
$user = 'sql12740758';
$pass = 'GxMDbIN8u2';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}
?>
