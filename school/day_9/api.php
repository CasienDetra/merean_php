<?php

header('Conent-Type: application/json');
header('Access-Control-Allow-Method: GET,POST,PUT,DELETE');

include 'config.php';
include 'db.php';

if (! isset($_GET['API_KEY']) || $_GET['API_KEY'] !== API_KEY) {
    http_response_code(401);
    echo json_encode(['error' => 'Unauthorized Access']);
    exit();
}
switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $sql = $pdo->prepare('SELECT * from products where is_deleted = 0 and product_id =?');
            $sql->execute($_GET['id']);
            $product = $sql->fetch(PDO::FETCH_ASSOC);
            echo json_encode($product ?: ['message' => 'product not found'], JSON_PRETTY_PRINT);
        } else {
            $sql = $pdo->query('select * from products where is_deleted = 0');
            $sql->execute();
            echo json_encode($sql->fetchAll(PDO::FETCH_ASSOC), JSON_PRETTY_PRINT);
        }
        break;
    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        if (isset($data['name']) && isset($data['price']) && isset($data['description'])) {
            $sql = $pdo->prepare('INSERT INTO products (name, price,description) VALUES (:name, :price,:description)');
            $sql->execute([$data['name'], $data['price'], $data['description']]);
            echo json_encode(['message' => 'product created successfully', 'product_id' => $pdo->lastInsertId()]);
        } else {
            echo json_encode(['error' => 'Missing required fields (name, price)']);
        }
        break;
    case 'PUT':
        $data = json_decode(file_get_contents('php://input'), true);
        if (isset($data['id']) && isset($data['name']) && isset($data['price']) && isset($data['description'])) {
            $sql = $pdo->prepare('UPDATE products SET name = :name, price = :price, description = :description WHERE product_id = :id');
            $sql->execute([
                'name' => $data['name'],
                'price' => $data['price'],
                'description' => $data['description'],
                'id' => $data['id'],
            ]);
            echo json_encode(['message' => 'product created successfully', 'product_id' => $pdo->lastInsertId()]);
        } else {
            echo json_encode(['error' => 'Missing required fields (name, price)']);
        }
        break;
    case 'DELETE':
        $id = $_GET['id'] ?? null;
        if (isset($id)) {
            $sql = $pdo->prepare('UPDATE products set is_deleted = 1 where product_id = ?');
            $sql->execute($id);
            echo json_encode(['message' => 'product deleted ']);
        } else {
            echo json_encode(['error' => 'Product id is required']);
        }
        break;
    default:
        echo json_encode(['error' => 'Invalid request method']);
        break;
}
echo json_encode('Api key is working');
