<?php

use core\Router;
use Core\Session;
use Core\ValidationException;

session_start();

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'core/functions.php';

spl_autoload_register(function ($class) {   // every time I create new object ($simona= new Simona)
    require base_path("$class.php");        // this function is activated automatically and finds the class (class Simona)
});

require base_path('bootstrap.php');

$router = new Router();


require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

try {
    $router->route($uri, $method);
} catch (ValidationException $exception) {
    Session::flash('errors', $exception->errors);
    Session::flash('old', $exception->old);

    return redirect($router->previousUrl());
}


Session::unflash();