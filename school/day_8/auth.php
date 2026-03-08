<?php

header('Content-Type : application/json');
$valid_api_key = '12345';

if (! isset($_GET['api_key']) || $_GET['api_key'] !== $valid_api_key) {
    echo 'api key wrong';
}
