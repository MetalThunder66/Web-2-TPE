<?php

require_once 'models/genre.model.php';
require_once 'views/genre.view.php';

class GenreController{
    private $genreModel;
    private $bookModel;
    private $genreView;
    private $authHelper;

    public function __construct(){
        $this->genreModel = new GenreModel();
        $this->bookModel = new BookModel();
        $this->genreView = new GenreView();
        $this->authHelper = new AuthHelper();
    }

    public function showGenreForm($genreId){
        $this->authHelper->isAdmin();
        $genres=$this->genreModel->getGenres();
        if($genreId){
            $genre = $this->genreModel->getGenreById($genreId);
            if($genre){   
                $this->genreView->showGenreForm($genre, $genres, null, null);
            }else{
                $this->genreView->showGenreForm(null, $genres, null, 'No se pudo cargar el Genero.');      
            }     
        }else{
            $this->genreView->showGenreForm(null, $genres, null, null); 
        }
    }

    public function addGenre(){
        $this->authHelper->isAdmin();  
        $genres=$this->genreModel->getGenres();
        if (!empty($_POST['nombreGen'])){
            $nombreGen = $_POST['nombreGen'];            
            $lastId = $this->genreModel->newGenre($nombreGen);
            if ($lastId){
                $this->genreView->showGenreForm(null, $genres, 'Genero agregado con Exito', null);    
            }
        }else{
            $this->genreView->showGenreForm(null, $genres, null, 'Verifique que el campo este completo');     
        }  
    }

    public function updateGenre(){
        $this->authHelper->isAdmin();
        if (isset($_POST['nombreGen']) && isset($_POST['idGen'])){
            $nombreGen = $_POST['nombreGen'];
            $idGen = $_POST['idGen'];
            $this->genreModel->changeGenreName($nombreGen, $idGen);    
        }
        header("Location: " . GENRES);           
    }

    public function showGenres(){
        $this->authHelper->isAdmin();
        $genres = $this->genreModel->getGenres();
        $this->genreView->showAllGenres($genres, null, null);
    }

    public function deleteGenre($id){
        $this->authHelper->isAdmin();  
        $genre = $this->genreModel->getGenreById($id); //verifico si el genero existe
        if ($genre){
            $genres = $this->genreModel->getGenres();
            $cant = $this->bookModel->countBooksWithGen($id);
            if ($cant->total == 0){
                $this->genreModel->deleteGenreDb($id);
                $this->genreView->showAllGenres($genres, 'Genero Eliminado con Exito', null);
            }else
                $this->genreView->showAllGenres($genres, null, 'Verifique que no exista ningun libro cargado con el genero a eliminar');
                
        }
    }
}