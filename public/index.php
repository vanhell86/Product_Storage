<?php
session_start();
include __DIR__ . '/../vendor/autoload.php';

use Core\Database;


ini_set('display_errors', config('app.debug'));
include_once __DIR__ . "/../app/Views/layouts/header.php";

try {
    (new Database(
        config('database.database'),
        config('database.host'),
        config('database.username'),
        config('database.password')
    ));
} catch (Exception $e) {
    echo 'Connection error: ' . $e->getMessage();
}

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $router) {
    $namespace = "\\App\\Controllers\\";
    $router->get('/', $namespace . 'ProductsController@index');
    $router->get('/products/list', $namespace . 'ProductsController@index');
    $router->get('/products/add', $namespace . 'ProductsController@create');
    $router->post('/products/add', $namespace . 'ProductsController@create');
    $router->post('/products/add/dvd', $namespace . 'DvdsController@store');
    $router->post('/products/add/book', $namespace . 'BooksController@store');
    $router->post('/products/add/furniture', $namespace . 'FurnituresController@store');
    $router->delete('/products/delete', $namespace . 'ProductsController@destroy');

});


$httpMethod = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        [$controller, $method] = explode('@', $handler);
        //var_dump($controller . '  ' . $method);die;
        (new $controller)->$method($vars);
        break;
}
if ($httpMethod == 'GET') {
    unset($_SESSION['sku']);
    unset($_SESSION['name']);
    unset($_SESSION['price']);
    unset($_SESSION['type']);
}

include_once __DIR__ . "/../app/Views/layouts/footer.php";