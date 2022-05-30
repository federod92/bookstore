<?php

//incluye y evalúa el fichero especificado durante la ejecución del script
// Si ya se incluyó no se volverá a incluir
include_once 'db.php';

class Book extends DB{
    
    function obtenerBooks(){
        $query = $this->connect()->query('SELECT * FROM book');
        return $query;
    }

}

?>