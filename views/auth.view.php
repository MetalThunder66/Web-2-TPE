<?php

require_once './libs/smarty/libs/Smarty.class.php';

class AuthView{
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    public function showFormLogin($error = null, $genres = null){ //asi le aclaro que el parametro es opcional
        $this->smarty->assign('title', 'Login');
        $this->smarty->assign('error', $error);
        $this->smarty->assign('genres', $genres);
        $this->smarty->display('templates/formLogin.tpl');
    }

    public function showFormRegister($exito = null, $error = null, $genres = null){
        $this->smarty->assign('title', 'Registrar Nuevo Usuario');
        $this->smarty->assign('genres', $genres);
        $this->smarty->assign('error', $error);
        $this->smarty->assign('exito', $exito);
        $this->smarty->display('templates/formRegister.tpl');    
    }
}