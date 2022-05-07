<?php
    $matches = [];

    if(preg_match('/\/([^\/]+)\/([^\/]+)/',$_SERVER["REQUEST_URI"],$matches)){
        $_GET['tipo_recurso'] = $matches[1];
        $_GET['recursoId'] = $matches[2];

        error_log(print_r($matches,1));

        require 'ejemplo_API.php';
    }elseif(preg_match('/\/([^\/]+)\/?/',$_SERVER["REQUEST_URI"],$matches)){

        $_GET['tipo_recurso'] = $matches[1];
        
        error_log(print_r($matches,1));

        require'ejemplo_API.php';
    }else{
        error_log('no matches');
        http_response_code(404);
    }
?>