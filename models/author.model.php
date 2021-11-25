<?php

class AuthorModel{
    private $db;
    
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_biblioteca;charset=utf8', 'root', '');
    }

    function getAuthors(){ 
        $query = $this->db -> prepare('SELECT * FROM `autores`'); 
        $query -> execute();  
        
        $autores = $query -> fetchAll(PDO::FETCH_OBJ);
        return $autores;
    }
}