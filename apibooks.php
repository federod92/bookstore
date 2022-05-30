<?php

//incluye y evalúa el fichero especificado durante la ejecución del script
// Si ya se incluyó no se volverá a incluir
include_once 'book.php';

class ApiBooks{


    function getAll(){
        $book = new Book();
        $books = array();
        $books["items"] = array();

        $res = $book->obtenerBooks();

        if($res->rowCount()){
            while ($row = $res->fetch(PDO::FETCH_ASSOC)){
    
                $item=array(
                    "id" => $row['id'],
                    "isbn" => $row['isbn'],
                    "nombre" => $row['nombre'],
                    "autor" => $row['autor'],
                    //"imagen" => $row['imagen'],
                );
                array_push($books["items"], $item);
            }
        
            echo json_encode($books);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }
}

?>