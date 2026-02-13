<?php

/* PDO Connection */
$host = 'localhost';
$db = 'learning';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass);
} catch (\PDOException $e) {
    exit('Connection failed: '.$e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $price = $_POST['price'] ?? 0;

    $stmt = $pdo->prepare('INSERT INTO student (name, price) VALUES (?, ?)');
    $stmt->execute([$name, $price]);
}

$result = $pdo->query('SELECT * FROM student');
