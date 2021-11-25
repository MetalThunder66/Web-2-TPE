<?php

require_once './libs/smarty/libs/Smarty.class.php';

class GenreView{
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showAllGenres($genres, $exito, $error){
        $this->smarty->assign('title', 'Generos Cargados');
        $this->smarty->assign('genres', $genres);
        $this->smarty->assign('exito', $exito);
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/genreList.tpl');  
    }

    function showGenreForm($genre, $genres, $exito, $error){
        if($genre){
            $this->smarty->assign('title', 'Editar Genero');
        }else{
            $this->smarty->assign('title', 'Agregar Genero');
        }
        $this->smarty->assign('exito', $exito);
        $this->smarty->assign('error', $error);
        $this->smarty->assign('genres', $genres);
        $this->smarty->assign('genre', $genre);
        $this->smarty->display('templates/genreForm.tpl');       
    }
}