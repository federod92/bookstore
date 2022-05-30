<?php
    
    //incluye y evalúa el fichero especificado durante la ejecución del script
    // Si ya se incluyó no se volverá a incluir
    include_once 'apibooks.php';

    $api = new ApiBooks();

    $api->getAll();
    
?>