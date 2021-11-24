<?php

require __DIR__.'/vendor/autoload.php';

$method = $_SERVER['REQUEST_METHOD'];
$path = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/';

$router = new App\Router($method, $path);

$router->get("/","App\Controller\HomeController::index");

$router->get("/cliente","App\Controller\CrudController::index");

$router->get("/cliente/novo","App\Controller\CrudController::create");

$router->post("/cliente/salvar", "App\Controller\CrudController::store");

$router->get("/cliente/excluir/{id}","App\Controller\CrudController::delete");

$router->get("/cliente/alterar/{id}","App\Controller\CrudController::edit");

$router->post("/cliente/atualizar/{id}","App\Controller\CrudController::update");

$router->post("/cliente/remover/{id}", "App\Controller\CrudController::remove");


$result = $router->handler();

if (!$result){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

$result = explode('::', $result);
$controller = new $result[0];
$action = $result[1];
$controller->$action($router->getParams());