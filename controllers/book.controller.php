<?php

require_once 'models/book.model.php';
require_once 'views/book.view.php';

class BookController {
    private $model;
    private $view;



    public function __construct(){
        $this->model = new BookModel();
        $this->view = new BookView();
        //$this->checkSession();
    }
    
    public function showBooks(){
        $books = $this->model->getAllBooks();
        $genres = $this->model->getGenres();

        $this->view->showAllBooks($books, $genres);
    }

    public function showBooksByGenre($genre){
        $books = $this->model->getBooksByGenre($genre);
        $genres = $this->model->getGenres();

        $this->view->showAllBooksByGenre($books, $genre, $genres);    
    }

    public function showBook($id){
        $book = $this->model->getBookById($id);
        $genres = $this->model->getGenres();  
        
        $this->view->showBookById($book, $genres);
    }

    public function deleteBook($id){
        $this->model->deleteBookDb($id);
        header("Location: " . BASE_URL);   
    }

    private function checkSession(){
        //verificar si esta logueado this->checkSession();
        session_start();
        if(!empty($_SESSION['USER_ID'])){
            header("Location: " . BASE_URL . "login");
        }
    }

    public function updateBook($idTarea){
        $this->model->updateBookDb($idTarea);  
        header("Location: " . BASE_URL);  
    }

    public function addBook(){
        //$this->checkSession();
        $titulo = $_REQUEST['titulo'];
        $prioridad = $_REQUEST['prioridad'];
        $descripcion = $_REQUEST['descripcion'];
        $this->model->addBookDb($titulo, $prioridad, $descripcion);
        
        header("Location: " . BASE_URL);
    }


    public function showForm(){
        $genres = $this->model->getGenres();
        $this->view->showBookForm($genres);
    }

    

    

    
}

