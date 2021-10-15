<?php

class UserModel{
    private $db;
    
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_biblioteca;charset=utf8', 'root', '');
    }

    function getUser($email) {
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE email = ?');
        $query->execute([$email]);
        $user = $query->fetch(PDO::FETCH_OBJ);

        return $user;
    }

    function saveUser($userName,$userEmail,$userPassword){
        $query = $this ->db->prepare('INSERT INTO usuarios (nombre, email, password) VALUES (? , ? , ?)');
        $query->execute([$userName,$userEmail,$userPassword]);
    }

}