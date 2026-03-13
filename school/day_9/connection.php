<?php

$host = 'localhost';
$dbname = 'product_db_api';
$username = 'root';
$password = '';
try {

    $pdo = new PDO('mysql:host=$host;dbname=$dbname', $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    exit(json_encode(['error' => 'connection failed'.$e->getMessage()]));
}
