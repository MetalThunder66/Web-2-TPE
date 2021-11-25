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

    function getBooksByGenre($genre){
        $query = $this->db -> prepare(
            "SELECT id_libro, nombre_libro AS Libro, autores.nombre_autor AS Autor, generos.nombre_gen AS Genero 
            FROM libros 
            INNER JOIN autores 
            ON autor_fk = autores.id_autor 
            INNER JOIN generos 
            ON genero_fk = generos.id_genero
            WHERE generos.nombre_gen = ?
            ORDER BY nombre_libro"); 

        $query -> execute([$genre]);  
        
        $booksByGenre = $query -> fetchAll(PDO::FETCH_OBJ);
        return $booksByGenre;       
    }

    function getBookById($id){
        $query = $this->db -> prepare(
            'SELECT *
            FROM libros
            INNER JOIN autores a
            ON autor_fk = a.id_autor 
            INNER JOIN generos g
            ON genero_fk = g.id_genero
            INNER JOIN editoriales e
            ON editorial_fk = e.id_editorial
            WHERE id_libro = ?');
            
        $query -> execute([$id]);  
        
        $bookById = $query -> fetch(PDO::FETCH_OBJ);
        return $bookById;     
    }

    function deleteBookDb($id){
        $query = $this->db -> prepare('DELETE FROM libros WHERE id_libro=?');
        $query -> execute([$id]);
    }

    function updateBookDb($titulo, $anio, $descripcion, $autor, $genero, $editorial, $id){
        $query = $this->db -> prepare('UPDATE libros 
                                        SET nombre_libro = ?, anio = ?, descripcion = ?,
                                            autor_fk = ?, genero_fk = ?, editorial_fk = ?
                                        WHERE id_libro= ?');
        $query -> execute([$titulo, $anio, $descripcion, $autor, $genero, $editorial, $id]);    
    }

    function addBookDb($titulo, $anio, $genero, $autor, $editorial, $descripcion){
        $query = $this->db -> prepare ('INSERT INTO libros (id_libro, nombre_libro, anio, descripcion, 
                                                            autor_fk, genero_fk, editorial_fk) 
                                        VALUES (?, ?, ?, ?, ?, ?, ?)');
        $query -> execute([null, $titulo, $anio, $descripcion, $autor, $genero, $editorial]);    
    }  

    function countBooksWithGen($genFk){
        $query = $this->db -> prepare('SELECT count(*) AS total 
                                        FROM libros WHERE genero_fk = ?');
        $query -> execute([$genFk]);
        $total = $query->fetch(PDO::FETCH_OBJ);
        return $total; 
    }
}