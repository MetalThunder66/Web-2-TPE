<?php

class UserModel{
    private $db;
    
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_biblioteca;charset=utf8', 'root', '');
    }

    function getUserByEmail($email) { //obtener datos del usuario via mail
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE email = ?');
        $query->execute([$email]);
        $user = $query->fetch(PDO::FETCH_OBJ);

        return $user;
    }

    function emailExists($email){ //verifica si existe el mail del usuario
        $query = $this->db->prepare('SELECT nombre FROM usuarios WHERE email = ?');
        $query->execute([$email]);
        $user = $query->fetch(PDO::FETCH_OBJ);

        return $user;    
    }

    function saveUser($userName,$userEmail,$userPassword,$userRol){
        $query = $this ->db->prepare('INSERT INTO usuarios (nombre, email, password, rol) 
                                        VALUES (?, ?, ?, ?)');
        $query->execute([$userName,$userEmail,$userPassword,$userRol]);
    }

    function getAllUsers($userEmail){ //obtener todos los usuarios registrados, menos el logueado
        $query = $this ->db->prepare('SELECT id, nombre, email, rol 
                                        FROM `usuarios`
                                        WHERE NOT email = ?
                                        ORDER BY nombre');
        $query->execute([$userEmail]);   
        $users = $query->fetchAll(PDO::FETCH_OBJ); 
        
        return $users;
    }

    function changeUserRol($id, $newRole){ //cambiar rol de usuario
        $query = $this->db -> prepare('UPDATE usuarios SET rol = ? WHERE id = ?');
        $query -> execute([$newRole, $id]);
    }

    function userRolById($id){
        $query = $this->db -> prepare('SELECT rol FROM usuarios WHERE id = ?');
        $query -> execute([$id]);
        $user = $query->fetch(PDO::FETCH_OBJ);

        return $user;
    }

    function userIdExists($id){
        $query = $this->db -> prepare('SELECT id FROM usuarios WHERE id = ?');
        $query -> execute([$id]);
        $user = $query->fetch(PDO::FETCH_OBJ);

        return $user;
    }

    function deleteUserDb($id){
        $query = $this->db -> prepare('DELETE FROM usuarios WHERE id=?');
        $query -> execute([$id]);    
    }

}