<?php
    
    //incluye y evalúa el fichero especificado durante la ejecución del script
    // Si ya se incluyó no se volverá a incluir
    include_once 'apibooks.php';
   // $SERVER = 'localhost/bookstore'

   //petición de tipo GET
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            $api = new ApiBooks();
             $api->getAll();
            break;
        
        default:
            # code...
            break;
    }
    
    
?>