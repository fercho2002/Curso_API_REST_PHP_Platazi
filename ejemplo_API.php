<?php
    $arreglo = [
        'books',
        'autor',
        'genres'
    ];
    $tipoRecurso = $_GET['tipo_recurso'];
    

    if(!in_array($tipoRecurso,$arreglo)){
        die;
    }

    $libros = [
        1=> [
            'titulo' => 'cien años de soledad ',
            'id_autor' => 1,
            'id_genero' => 1,
        ],
        2=> [
            'titulo' => 'El coronel no tiene quien le escriba',
            'id_autor' => 1,
            'id_genero' => 2,
        ],
    ];
    header('Content-Type : application/json');

    //aca miramos si 'recursoID' viene como variable en el get de la url si viene esa palabra 'recursoId' entones la capturamos despues de '?' y si no pues la ponemos mo '' que es un nulo eso va despues de ':'

    /*
    // esto es igual que la siguiente linea de codigo 
    // es como un if pero en una sola linea de codigo 
    if(array_key_exists('recursoId',$_GET)){
        $idTraeGet = $_GET['recursoId'];
    }else{
        $idTraeGet=''; 
    }
    */
    $idTraeGet = array_key_exists('recursoId',$_GET)? $_GET['recursoId']: '';
    switch (strtoupper($_SERVER['REQUEST_METHOD'])){
        case 'GET':
            if(empty($idTraeGet)){
                echo " no tenemos ese Id de libro pruebe con otro";
            }else{
                if(array_key_exists($idTraeGet,$libros)){
                    echo json_encode($libros[$idTraeGet]);
                }
            }
            break;
        case 'PUT';
            break;
        case 'POST';
        echo "post no esta programado perroo ";
            break;
        case 'DELETE';
            break;
    }
?>