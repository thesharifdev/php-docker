<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

$path = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';
$method = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'GET';

if ($method === 'POST') {
    echo json_encode([
        'path' => $path,
        'method' => $method,
        'message' => 'Hello, World!'
    ]);
} else {
    echo json_encode([
        'path' => $path,
        'method' => $method,
        'message' => 'This is a GET request'
    ]);
}
