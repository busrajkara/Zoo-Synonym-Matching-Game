<?php
$host = 'localhost';
$db = 'zoo_game';
$user = 'root';
$pass = ''; // XAMPP kullanıyorsan şifre genelde boş olur, tasarım için boş  bıraklıdı

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
