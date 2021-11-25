<?php
require_once 'libs/Router.php';
require_once 'api/api-comment.controller.php';

// creo el router
$router = new Router();

$router->addRoute('comentarios/', 'POST', 'ApiCommentController', 'addOne');
$router->addRoute('comentarios/:ID', 'DELETE', 'ApiCommentController', 'remove');
$router->addRoute('comentarios/libros/:ID', 'GET', 'ApiCommentController', 'getAll'); 


$resource = $_GET['resource'];
$method = $_SERVER['REQUEST_METHOD'];
$router->route($resource, $method);

