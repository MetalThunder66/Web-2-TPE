<?php

class EditorialModel{
    private $db;
    
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_biblioteca;charset=utf8', 'root', '');
    }

    function getEditorials(){ 
        $query = $this->db -> prepare('SELECT * FROM `editoriales`'); 
        $query -> execute();  
        
        $editoriales = $query -> fetchAll(PDO::FETCH_OBJ);
        return $editoriales;
    }
}