<?php

/* PDO */
$servername = 'localhost';
$dbname = 'learning';
$username = 'root';
$password = '';
try {
    $dsn = "mysql:host=$severname,dbname=$dbaname,$username,$password";
    $pdo = new PDO($dsn);
} catch (Exception $e) {
    echo 'error : '."$e";
}
$statement = $pdo->exec('select * from student;');

/* if ($_SERVER('REQUEST_METHOD') == 'POST') { */
/*     $name = $pdo->real_esape_string($_POST['name']); */
/*     $price = $pdo->real_esape_string($_POST['price']); */
/* } */
