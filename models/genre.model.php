<?php

class GenreModel{
    private $db;
    
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_biblioteca;charset=utf8', 'root', '');
    }

    function getGenres(){ 
        $query = $this->db->prepare('SELECT * FROM generos'); 
        $query->execute();  
        
        $genres = $query->fetchAll(PDO::FETCH_OBJ);
        return $genres;
    }

    function getGenreById($id){
        $query = $this->db->prepare('SELECT * FROM generos
                                        WHERE id_genero = ?'); 
        $query->execute([$id]);  
        
        $genre = $query->fetch(PDO::FETCH_OBJ);
        return $genre;    
    }

    function changeGenreName($nombreGen, $idGen){
        $query = $this->db->prepare('UPDATE generos SET nombre_gen = ?
                                    WHERE id_genero = ?');
        $query->execute([$nombreGen, $idGen]);  
    }

    function newGenre($nombreGen){
        $query = $this->db -> prepare ('INSERT INTO generos (nombre_gen) 
                                        VALUES (?)');
        $query -> execute([$nombreGen]);
        return $this->db->lastInsertId();
    }

    function deleteGenreDb($id){
        $query = $this->db -> prepare('DELETE FROM generos WHERE id_genero=?');
        $query -> execute([$id]);
    }

    
}

