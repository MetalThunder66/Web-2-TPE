<?php

require_once 'models/user.model.php';
require_once 'views/auth.view.php';
require_once 'helpers/auth.helper.php';

class AuthController{
    private $userModel;
    private $authView;
    private $genreModel;
    private $authHelper;


    public function __construct(){
        $this->userModel = new UserModel();
        $this->authView = new AuthView(); 
        $this->genreModel = new GenreModel();
        $this->authHelper = new AuthHelper();  
    }

    public function showLogin(){
        $genres = $this->genreModel->getGenres();
        $this->authView->showFormLogin(null, $genres);
    }

    public function login() {
        if (!empty($_POST['email']) && !empty($_POST['password'])) { //isset para verificar los datos
            $email = $_POST['email'];
            $password = $_POST['password']; 
     
            // Obtengo el usuario de la base de datos
            $user = $this->userModel->getUserByEmail($email);
     
            // Si el usuario existe y las contraseñas coinciden
            if ($user && password_verify($password, $user->password)) {
                 // armo la sesion del usuario  
                $this->authHelper->login($user);
                header("Location: " . BASE_URL);
            } else {
                $this->authView->showFormLogin("Usuario o contraseña inválida");
            }
        }
    }

    public function logout() {
        $this->authHelper->logout();
        header("Location: " . LOGIN);
    }

    public function showRegister(){
        $genres = $this->genreModel->getGenres();
        $this->authView->showFormRegister(null, null, $genres);        
    }

    public function registerUser(){
        $genres = $this->genreModel->getGenres();

        //Creo la cuenta cuando venga en el POST
        if(!empty($_POST['nombre']) && !empty($_POST['email']) && !empty($_POST['password'])){
            $userName = $_POST['nombre'];
            $userEmail = $_POST['email'];
            $userPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);
            
            if (!isset($_POST['rol'])){
                $userRol = 0;
            }else{
                $userRol = $_POST['rol'];
            }

            //Guardo el nuevo usuario en la base de datos
            $this->userModel->saveUser($userName,$userEmail,$userPassword,$userRol);
                
            if((isset($_SESSION['ROL'])) && ($_SESSION['ROL'] == 1)){
                $this->authView->showFormRegister("Usuario Registrado Con Exito", null, $genres);
            }else{
                $user = $this->userModel->getUserByEmail($userEmail);
                $this->authHelper->login($user);
                header("Location: " . BASE_URL);
            } 
        }else {
            $this->authView->showFormRegister(null, "Todos los campos deben estar completados", $genres);
        }
    }
}