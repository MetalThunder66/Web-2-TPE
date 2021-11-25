<?php

require_once './libs/smarty/libs/Smarty.class.php';

class BookView{
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showAllBooks($books, $genres){
        $this->smarty->assign('title', 'Libros Disponibles');
        $this->smarty->assign('books', $books);
        $this->smarty->assign('genres', $genres);

        $this->smarty->display('templates/bookList.tpl');  
    }

    function showAllBooksByGenre($books, $genre, $genres, ){
        $this->smarty->assign('title', 'Genero ' . ucfirst($genre));
        $this->smarty->assign('books', $books);
        $this->smarty->assign('genres', $genres);

        $this->smarty->display('templates/bookList.tpl');  
    }

    function showBookById($book,$genres){
        $this->smarty->assign('title', 'Detalle de Libro');
        $this->smarty->assign('book', $book);  
        $this->smarty->assign('genres', $genres);
        
        $this->smarty->display('templates/bookDetail.tpl');  

    }

    function showBookForm($error = null, $exito = null, $genres, $authors, $editorials, $book = null){
        if($book){ //si book no es null es porque viene para editar libro
            $this->smarty->assign('title', 'Editar Libro');    
        }else{
            $this->smarty->assign('title', 'Agregar Libro');
        }
        
        $this->smarty->assign('error', $error);
        $this->smarty->assign('exito', $exito);
        $this->smarty->assign('genres', $genres);
        $this->smarty->assign('authors', $authors);
        $this->smarty->assign('editorials', $editorials);
        $this->smarty->assign('book', $book);
        $this->smarty->display('templates/bookForm.tpl'); 
    }

    function showHomeLocation(){
        header('Location: ' .BASE_URL. 'listar');
    }
}