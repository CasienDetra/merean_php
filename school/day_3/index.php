<?php

/* PDO Connection */
include 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $price = $_POST['price'] ?? 0;

    $stmt = $pdo->prepare('INSERT INTO student (name, price) VALUES (?, ?)');
    $stmt->execute([$name, $price]);
}

$result = $pdo->query('SELECT * FROM student');
