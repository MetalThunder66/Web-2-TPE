<?php
require_once './controllers/book.controller.php';
require_once './controllers/auth.controller.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
define('LOGIN', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/login');

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'listar';
}

$params = explode('/', $action);

//tabla ruteo
//listar -> lista toodas los libros
//insertar -> inserta una tarea (recibe el post)
$bookController = new BookController();
$authController = new AuthController();

switch ($params[0]) {
    case 'login':
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { //si el login viene por envio de formulario
            $authController->login();
        } else {
            $authController->showLogin();
        }
        break;
    case 'registrar':
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { //si el registro viene por envio de formulario
            $authController->registerUser();
        } else {
            $authController->showRegister();
        }
        break;
    case 'logout': 
            //$authController = new AuthController();
            $authController->logout();
            break;   
    case 'listar': //listar libros de la db
       
        $bookController->showBooks();
        break;
    case 'generos':
        
        $bookController->showBooksByGenre($params[1]);
        break;
    case 'detalle_libro':
        if (!empty($params[1])) {
            $bookController->showBook($params[1]);
        } else {
            header('Location: ' . BASE_URL . 'listar');
        }
        break;
    case 'editar':
        
        if (!empty($params[1])) {
            $bookController->updateBook($params[1]);
        } else {
            header('Location: ' . BASE_URL . 'editar');
        }
        break;
    case 'eliminar':
        
        $bookController->deleteBook($params[1]);
        break;
    case 'agregar':
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
            $bookController->addBook();
        } else {
            $bookController->showForm();
        }
        
        
        break;
    default:
        echo ('Pagina no encontrada. Error 404.');
        break;
}
