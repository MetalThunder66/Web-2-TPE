<?php

class CommentModel{
    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_biblioteca;charset=utf8', 'root', '');
    }

    function saveComment($comment, $valoration, $libroFk, $usuarioFk){
        $query = $this->db->prepare('INSERT INTO comentarios (comentario, valoracion, libro_fk, usuario_fk) 
                                    VALUES (?, ?, ?, ?)');
        $query->execute([$comment, $valoration, $libroFk, $usuarioFk]);
    
        return $this->db->lastInsertId();
    }

    function getComment($idComment){
        $query = $this->db->prepare('SELECT * FROM comentarios WHERE id = ?');
        $query->execute([$idComment]);
        $comment = $query->fetch(PDO::FETCH_OBJ);
        return $comment;
    }

    function deleteComment($idComment){
        $query = $this->db->prepare('DELETE FROM comentarios WHERE id = ?');
        $query->execute([$idComment]);    
    }

    function getAllComments($idBook){
        $query = $this->db->prepare('SELECT * FROM comentarios WHERE libro_fk = ?');
        $query->execute([$idBook]);
        $comments = $query->fetchAll(PDO::FETCH_OBJ);
        return $comments;
    }
}