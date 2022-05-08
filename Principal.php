<?php
    $matches = [];

/* con el sigiente if lo que estamos haciendo es perguntar si en la url hay 2 /  /
entinces si hay dos el matches captura una por una en su array siendo [1] el valor que esta entre las dos 
primeros /valor/
y [2] lo que esta despues de el ultimo / asignandolo a las variables de el $_GET tipo recurso y recurso id
y el erro_log me esta imprimiendo lo que capturo el match eso es como un array 


y el caso contrario pasa el elif que hay valida solo el valor que esta despues de el promer / entonces como solo biene una variabl
pues solo asigna tipo de recurso que viene siendo la primera que tienen que enviar jaja y imprime ese arrauy
el require se usa para llamar a el .php en el que tengo el codigo jaja */

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