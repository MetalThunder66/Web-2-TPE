<?php

require_once 'models/book.model.php';
require_once 'models/genre.model.php';
require_once 'models/author.model.php';
require_once 'models/editorial.model.php';
require_once 'views/book.view.php';
include_once 'helpers/auth.helper.php';

class BookController {
    private $bookModel;
    private $genreModel;
    private $authorModel;
    private $editorialModel;
    private $bookView;
    private $authHelper;
    

    public function __construct(){
        $this->bookModel = new BookModel();
        $this->genreModel = new GenreModel();
        $this->authorModel = new AuthorModel();
        $this->editorialModel = new EditorialModel();
        $this->bookView = new BookView();
        $this->authHelper = new AuthHelper();
    }
    
    public function showBooks(){
        $books = $this->bookModel->getAllBooks();
        $genres = $this->genreModel->getGenres();

        $this->bookView->showAllBooks($books, $genres);
    }

    public function showBooksByGenre($genre){
        $books = $this->bookModel->getBooksByGenre($genre);
        $genres = $this->genreModel->getGenres();

        $this->bookView->showAllBooksByGenre($books, $genre, $genres);    
    }

    public function showBook($id){
        $book = $this->bookModel->getBookById($id);
        if ($book){
            $genres = $this->genreModel->getGenres();  
            $this->bookView->showBookById($book, $genres);
        }else{
            header("Location: " . BASE_URL);     
        }    
    }

    public function deleteBook($id){    
        $this->authHelper->isAdmin();  //chequeo si usuario es admin
        $book = $this->bookModel->getBookById($id);
        if ($book){
            $this->bookModel->deleteBookDb($id);
        }
        header("Location: " . BASE_URL);   
    }

    public function sendBookForm(){
        $this->authHelper->isAdmin();
        $generos = $this->genreModel->getGenres(); //obtengo los datos cargados en la db para modificar o editar libro
        $autores = $this->authorModel->getAuthors();
        $editoriales = $this->editorialModel->getEditorials();

        if (isset($_POST['titulo']) && isset($_POST['anio']) //compruebo cada campo del formulario
        && !empty($_POST['genero']) && !empty($_POST['autor'])
        && !empty($_POST['editoriales']) && isset($_POST['descripcion'])) { 
        
            $titulo = $_POST['titulo']; 
            $anio = $_POST['anio'];
            $genero = $_POST['genero']; //guardo las claves foraneas de cada categoria
            $autor = $_POST['autor'];
            $editorial = $_POST['editoriales'];
            $descripcion = $_POST['descripcion'];

            if (isset($_POST['idLibro'])){  //si tengo la id, es poruqe se va a editar el libro
                $idLibro = $_POST['idLibro']; 
                $this->bookModel->updateBookDb($titulo, $anio, $descripcion, $autor, $genero, $editorial, $idLibro);
                header("Location: " . BASE_URL);

            }else{   //sino es para agregar uno nuevo
                $this->bookModel->addBookDb($titulo, $anio, $genero, $autor, $editorial, $descripcion);
                $this->bookView->showBookForm(null, "Libro Agregado con Exito", $generos, $autores, $editoriales, null);
            } 
        }else{
            $this->bookView->showBookForm("Verifique que todos los campos estén completados antes de continuar", null, $generos, $autores, $editoriales);
        }     
    }

    public function showBookForm($idLibro = null){
        $this->authHelper->isAdmin();
        $genres = $this->genreModel->getGenres();
        $authors = $this->authorModel->getAuthors();
        $editorials = $this->editorialModel->getEditorials();
        
        if ($idLibro){ //si viene id es para editar un libro
            $libro = $this->bookModel->getBookById($idLibro);
            $this->bookView->showBookForm(null, null, $genres, $authors, $editorials, $libro);
        }else{ //sino es para agregar uno nuevo
            $this->bookView->showBookForm(null, null, $genres, $authors, $editorials, null);
        }  
    }   
}

