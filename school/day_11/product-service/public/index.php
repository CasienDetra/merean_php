<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__.'/../vendor/autoload.php';

$app = AppFactory::create();

$user_url = 'http://localhost:8080/users';

$app->get('/products/{id}/users/{user_id}', function (Request $request, Response $response, $args) use ($user_url) {
    $user_id = $args['user_id'];
    $product_id = $args['id'];

    $user_Service_url = $user_url.$user_id;
    $user_data = file_get_contents($user_Service_url);
    $user = json_decode($user_data, true);
    global $products;
    $response->getBody()->write(json_encode(['product' => $products[$product_id - 1], 'user' => $user]));

    return $response->withHeader('Content-Type', 'application/json');
});

$app->run();
