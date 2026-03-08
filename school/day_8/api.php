<?php

include '../day_7/api/api.php';
header('Access-Controll-Allow-Methods : PUT');
// update
if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $input = json_decode(file_get_contents('php://input'), true);
    if (isset($input['id']) && isset($input['name']) && isset($input['email'])) {
        $id = $input['id'];
        foreach ($data as &$row) {
            if ($row['id'] == $id) {
                $row['name'] = $input['name'];
                $row['email'] = $input['email'];
                echo json_encode(['message' => 'user update success', 'user' => $row]);
                break;
            }
        }
        echo json_encode(['message' => 'data not found']);
    } else {
        echo json_encode(['error' => 'Missing required fields']);
    }
}

// delete
header('Access-Controll-Allow-Methods : DELETE');
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $input = json_decode(file_get_contents('php://input'), true);
    if (isset($input['id'])) {
        foreach ($data as &$row) {
            if ($row['id'] == $input['id']) {
                echo json_encode(['message' => 'user update success', 'user' => $row['id']]);
                exit();
            }
        }
        echo json_encode(['message' => 'user not found']);
    } else {
        echo json_encode(['error' => 'Missing required fields (id)']);
    }
}
