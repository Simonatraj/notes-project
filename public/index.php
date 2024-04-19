<?php
use core\Router;

session_start();

const BASE_PATH = __DIR__ . '/../';  // with this constant I am located in folder jeffrey-way

require BASE_PATH . 'core/functions.php'; // I am pasting the file functions here

spl_autoload_register(function ($class) {   // every time I create new object ($simona= new Simona)
    require base_path("$class.php");        // this function is activated automatically and finds the class (class Simona)
});

require base_path('bootstrap.php');

 $router = new Router();


require base_path('routes.php');  


$uri = parse_url($_SERVER['REQUEST_URI'])['path'];


$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);
 









