<?php

header('Content_Type: application/json');
header('Access-Control-Allow-Methods: POST');
// sample data
$data = [
    ['id' => 1,
        'name' => 'Reaksmey',
        'email' => 'hello123@gmail.com',
    ],

    ['id' => 2,
        'name' => 'sokha',
        'email' => 'hell89hh@gmail.com',
    ],
];
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    foreach ($data as $row) {
        if ($row['id'] == $id) {
            echo json_encode($row);
            exit;
        }
    }
    echo json_encode(['message' => 'data not found']);
} else {
    echo json_encode($data);
}
// convert data to json
echo json_encode($data, JSON_PRETTY_PRINT);

/* POST METHOD */
$data = json_decode(file_get_contents('php://input'), true);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($data['name']) && isset($data['email'])) {
        $newUser = [
            'id' => rand(3, 100),
            'name' => $data['name'],
            'email' => $data['email'],
        ];
        echo json_encode(['message ' => 'user add success', 'user' => $newUser]);
    } else {
        echo json_encode(['error' => 'Missing require fields']);
    }
}
