<?php

require_once 'models/user.model.php';
require_once 'views/auth.view.php';
require_once 'helpers/auth.helper.php';

class AuthController{
    private $model;
    private $view;
    private $bookModel;
    private $authHelper;


    public function __construct(){
        $this->model = new UserModel();
        $this->view = new AuthView(); 
        $this->bookModel = new BookModel();
        $this->authHelper = new AuthHelper();  
    }

    public function showLogin(){
        $genres = $this->bookModel->getGenres();
        $this->view->showFormLogin(null, $genres);
    }

    public function login() {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password']; 
     
            // Obtengo el usuario de la base de datos
            $user = $this->model->getUser($email);
     
            // Si el usuario existe y las contraseñas coinciden
            if ($user && password_verify($password, $user->password)) {
                 // armo la sesion del usuario  
                $this->authHelper->login($user);
                header("Location: " . BASE_URL);
            } else {
                $this->view->showFormLogin("Usuario o contraseña inválida");
            }
        }
    }

    public function logout() {
        $this->authHelper->logout();
    }

    public function showRegister(){
        $genres = $this->bookModel->getGenres();
        $this->view->showFormRegister(null, $genres);        
    }

    public function registerUser(){
        //Creo la cuenta cuando venga en el POST
        if(!empty($_POST['nombre']) && !empty($_POST['email']) && !empty($_POST['password'])){
            $userName=$_POST['nombre'];
            $userEmail=$_POST['email'];
            $userPassword=password_hash($_POST['password'], PASSWORD_BCRYPT);

            //Guardo el nuevo usuario en la base de datos
            $this->model->saveUser($userName,$userEmail,$userPassword);
            header("Location: " . BASE_URL);
        }else {
            $this->view->showFormRegister("Todos los campos deben estar completados");
        }
    }
}