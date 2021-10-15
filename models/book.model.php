<?php

class BookModel{
    private $db;
    
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_biblioteca;charset=utf8', 'root', '');
    }

    function getAllBooks(){ //pedido a BDD todos los libros
        //2. enviamos la consulta (2 subpasos: preparar y ejecutar la consulta) 
        $query = $this->db -> prepare(
            'SELECT id_libro, nombre_libro AS Libro, autores.nombre_autor AS Autor, generos.nombre_gen AS Genero
            FROM libros 
            INNER JOIN autores 
            ON autor_fk = autores.id_autor 
            INNER JOIN generos 
            ON genero_fk = generos.id_genero
            ORDER BY nombre_libro');
        $query -> execute();  
        
        //3. obtengo la respuesta de la bdd
        $books = $query -> fetchAll(PDO::FETCH_OBJ); 

        //4. cerramos la conexion
        //PDO se encarga d cerrarla sola
        return $books;     
    }

    function getGenres(){ //pedido generos para nav?
        $query = $this->db -> prepare('SELECT nombre_gen FROM `generos`'); 
        $query -> execute();  
        
        $genres = $query -> fetchAll(PDO::FETCH_OBJ);
        return $genres;
    }

    function getBooksByGenre($genre){
        $query = $this->db -> prepare(
            "SELECT nombre_libro AS Libro, autores.nombre_autor AS Autor, generos.nombre_gen AS Genero 
            FROM libros 
            INNER JOIN autores 
            ON autor_fk = autores.id_autor 
            INNER JOIN generos 
            ON genero_fk = generos.id_genero
            WHERE generos.nombre_gen = '".$genre."'
            ORDER BY nombre_libro"); 

        $query -> execute();  
        
        $booksByGenre = $query -> fetchAll(PDO::FETCH_OBJ);
        return $booksByGenre;       
    }

    function getBookById($id){
        $query = $this->db -> prepare(
            'SELECT l.id_libro, l.nombre_libro, l.anio, l.descripcion, a.nombre_autor, a.ciudad_autor, 
                g.nombre_gen, e.nombre_editorial, e.ciudad_editorial
            FROM libros l
            INNER JOIN autores a
            ON autor_fk = a.id_autor 
            INNER JOIN generos g
            ON genero_fk = g.id_genero
            INNER JOIN editoriales e
            ON editorial_fk = e.id_editorial
            WHERE id_libro = ' . $id);
            
        $query -> execute();  
        
        $bookById = $query -> fetch(PDO::FETCH_OBJ);
        return $bookById;     
    }

    function deleteBookDb($id){
        $query = $this->db -> prepare('DELETE FROM `libros` WHERE id_libro=?');
        $query -> execute([$id]);
    }

    function updateBookDb($id){
        $query = $this->db -> prepare('UPDATE `libros` SET `finalizada`=1 WHERE id=?');
        $query -> execute([$id]);    
    }

    function addBookDb($titulo, $descripcion, $prioridad){
        $query = $this->db -> prepare('INSERT INTO `tarea`(`titulo`, `descripcion`, `prioridad`) VALUES (?, ?, ?)');
        $query -> execute([$titulo, $descripcion, $prioridad]);  
    
        //INSERT INTO `tarea`(`titulo`, `descripcion`, `prioridad`) VALUES ('hola','descripcion','5');
    
        return $this->db->lastInsertId();
    
    }

    

    
}