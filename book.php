<?php

//incluye y evalúa el fichero especificado durante la ejecución del script
// Si ya se incluyó no se volverá a incluir
include_once 'db.php';

class Book extends DB{

    //creo una funcion donde me devuelve todos los libros
    function obtenerBooks(){
        $query = $this->connect()->query('SELECT * FROM book');
        return $query;
    }

    //creo una funcion donde me devuelve un libro por ID
    function obtenerBook($id){
        $query = $this->connect()->prepare('SELECT * FROM book WHERE id = :id');
        $query->execute(['id' => $id]);
        return $query;
    }

}
?>