<?php

// Подключение всех функций
require 'connect.php';

// Настройки доступности
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Настройки ресурсов и данных
$method = $_SERVER['REQUEST_METHOD'];

$q = $_GET['q'];
$params = explode('/', $q);

$type = $params[0];
$id = $params[1];
$active = $params[2];

$data = json_decode(file_get_contents('php://input'), true);

// Страница не найдена
function not_found(){
    $resNotFound = [
        "message" => [
            "message" => "Page not found"
        ]
    ];

    http_response_code(404);
    return json_encode($resNotFound);
}

// Роутинг
switch($method){
    case "GET":
        switch($type){
            case "not":
                echo not_found();
                break;
        }
}
?>