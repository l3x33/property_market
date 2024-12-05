<?php
$host = 'localhost';
$db = 'property_market';
$user = 'Student';
$pass = '12';

try {
    $pdo = new PDO(dsn: "mysql:host=$host;dbname=$db", username: $user, password: $pass);
    $pdo->setAttribute(attribute: PDO::ATTR_ERRMODE, value: PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
