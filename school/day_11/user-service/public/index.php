<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__.'/../vendor/autoload.php';
$users = [
    ['user_id' => 1, 'name' => 'Sok La', 'email' => 'Sokla@gmail.com'],
    ['user_id' => 2, 'name' => 'Soka Ly', 'email' => 'Sokha@gmail.com'],
    ['user_id' => 3, 'name' => 'Jack Doe', 'email' => 'helo@gmail.com'],
];

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write('Hello world!');

    return $response;
});
// none id request
$app->get('/users', function (request $request, Response $response, $args) use ($users) {
    global $users;
    $response->getBody()->write(json_encode($users));

    return $response->withHeader('Content-Type', 'application/json');
});
// request with id
$app->get('/users/{id}', function (request $request, Response $response, $args) use ($users) {
    global $users;
    $id = $args['id'];
    $response->getBody()->write(json_encode(['user_id' => $users[$id - 1]['user_id'], 'name' => $users[$id - 1]['name']]));

    return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
});
