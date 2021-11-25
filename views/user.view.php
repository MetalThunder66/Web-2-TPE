<?php

require_once './libs/smarty/libs/Smarty.class.php';

class UserView{
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showAllUsers($users, $genres, $success = null){
        $this->smarty->assign('title', 'Usuarios Cargados');
        $this->smarty->assign('genres', $genres);
        $this->smarty->assign('success', $success);
        $this->smarty->assign('users', $users);
        $this->smarty->display('templates/userList.tpl');  
    }
}