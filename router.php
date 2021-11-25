<?php
require_once './controllers/book.controller.php';
require_once './controllers/genre.controller.php';
require_once './controllers/auth.controller.php';
require_once './controllers/user.controller.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/listar');
define('LOGIN', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/login');
define('ADMIN', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/admin');
define('GENRES', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/listar_generos');
define('USERS', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/listar_usuarios');

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
$genreController = new GenreController();
$authController = new AuthController();
$authHelper = new AuthHelper();
$userController = new UserController();

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
        $authController->logout();
        break;
    case 'listar': //listar libros de la db
        $bookController->showBooks();
        break;
    case 'listar_usuarios':
        $userController->showUsersList();
        break;
    case 'cambiar_rol':
        if (!empty($params[1])){
            $userController->changeRol($params[1]);
        }else
            header('Location: ' . USERS);
        break;
    case 'eliminar_usuario':
        if (!empty($params[1])){
            $userController->deleteUser($params[1]);
        }else
            header('Location: ' . USERS);
        break;
    case 'libros_genero':
        if (!empty($params[1])) {
            $bookController->showBooksByGenre($params[1]);
        } else {
            header('Location: ' . BASE_URL);
        }
        break;
    case 'listar_generos':
        $genreController->showGenres();
        break;
    case 'editar_genero':
        if (!empty($params[1])){
            $genreController->showGenreForm($params[1]);
        }elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $genreController->updateGenre();
        }else
            header('Location: ' . GENRES);
        break;
        case 'agregar_genero':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $genreController->addGenre();
            }else 
                $genreController->showGenreForm(null);   
        break;
    case 'eliminar_genero':
        if (!empty($params[1])){
            $genreController->deleteGenre($params[1]);
        }else
            header('Location: ' . GENRES);
        break;
    case 'detalle_libro':
        if (!empty($params[1])) {
            $bookController->showBook($params[1]);
        } else
            header('Location: ' . BASE_URL);
        break;
    case 'editar_libro':
        if (!empty($params[1])) {
            $bookController->showBookForm($params[1]);
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $bookController->sendBookForm();
        } else
            header('Location: ' . BASE_URL);
        break;
    case 'eliminar':
        $bookController->deleteBook($params[1]);
        break;
    case 'agregar_libro':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $bookController->sendBookForm();
        } else 
            $bookController->showBookForm(null);
        break;
    default:
        echo ('Pagina no encontrada. Error 404.');
        break;
}
