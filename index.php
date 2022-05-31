<?php

    //incluye y evalúa el fichero especificado durante la ejecución del script
    // Si ya se incluyó no se volverá a incluir
    include_once 'apibooks.php';

    $api = new ApiBooks();
    //verificamos si el índice del arreglo está creado, si está creado lo muestra
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        if(is_numeric($id)){
            $api->getById($id);
        }else{
            $api->error('El id es incorrecto');
        }
    }else{
        $api->getAll();
    }
    
?>