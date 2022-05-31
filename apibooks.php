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
                    "precio" => $row['precio']
                    //"imagen" => $row['imagen'],
                );
                array_push($books["items"], $item);
            }
        
            //echo json_encode($books);
            //ocupo la funcion printJASON para mostrar mi json
            $this->printJSON($books);

        }else{
            $this->error('No hay elementos');
        }
    }

    function getById($id){
        $book = new Book();
        $books = array();
        $books["items"] = array();

        $res = $book->obtenerBook($id);

        if($res->rowCount() == 1){
            $row = $res->fetch();
        
            $item=array(
                    
                    "id" => $row['id'],
                    "isbn" => $row['isbn'],
                    "nombre" => $row['nombre'],
                    "autor" => $row['autor'],
                    "precio" => $row['precio']
                    //"imagen" => $row['imagen'],
            );
            array_push($books["items"], $item);
            $this->printJSON($books);
        }else{
            echo json_encode(array('mensaje' => 'No hay elementos'));
        }
    }

    //funcion para mostrar mi JSON

    function printJSON($array){

        echo '<code>'. json_encode($array) .'</code>';

    }

    //funcion para estandarizar mis mensajes de error
    function error($mensaje){
        echo '<code>'. json_encode(array('mensaje' => $mensaje)) .'</code>';
        
    }



   
}

?>