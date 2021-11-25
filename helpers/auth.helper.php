<?php

class AuthHelper {
    function __construct() {
        // abre la sessión siempre para usar el helper
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
        
    }

    public function getUserEmail(){
        return $_SESSION['USER_EMAIL'];  
    }

    public function getUserId(){
        return $_SESSION['USER_ID'];  
    }

    public function login($user) {
        $_SESSION['USER_ID'] = $user->id;
        $_SESSION['USER_EMAIL'] = $user->email;
        $_SESSION['ROL'] = $user->rol;
        $_SESSION['LAST_ACTIVITY'] = time();
    }

    public function checkLoggedIn() {       
        if (empty($_SESSION['USER_ID'])) {
            header("Location: " . LOGIN);
            die();
        }
    }

    function isAdmin(){
        $this->checkLoggedIn();
        if ($_SESSION['ROL'] == 0){
            header("Location: " . BASE_URL); 
            die();   
        }
    }

    function logout() {
        session_destroy();
        header("Location: " . BASE_URL . 'login');
    } 

    function checkActivity(){ 
        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 120)) { /* Desloguea en 2 minutos */
                $this->logout();
        } else{
            $_SESSION['LAST_ACTIVITY'] = time();
        }
    }

}