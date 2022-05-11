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
            'titulo' => 'cien anos de soledad ',
            'id_autor' => 3,
            'id_genero' =>4,
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
                echo json_encode($libros);
            }else{
                if(array_key_exists($idTraeGet,$libros)){
                    echo json_encode($libros[$idTraeGet]);
                }
            }
            break;
        case 'PUT';
        //validamos que ese id esra el el array books para saber cual modificar 
            if(!empty($idTraeGet) && array_key_exists($idTraeGet,$libros)){
                // tomamos los datos que vamos a modificar ya teniendo el id de el objeto que se va a modificar 
                $json = file_get_contents('php://input');
                $libros[$idTraeGet] = json_decode($json,true);
                //codificamos en formato json y devuelvo toda la colecion completa 
                echo json_encode($libros);
            }
            break;
        case 'POST';
            $json = file_get_contents('php://input');
            $libros[] = json_decode($json,true);
            echo json_encode($libros);
            break;
        case 'DELETE';
        //aqur validamos que el id que viene por la url exista en el array por q ese es el que vamos a eliminar 
            if(!empty($idTraeGet)&& array_key_exists($idTraeGet,$libros)){
                //con esta funcion se elimina esa key con su informacion de el array
                unset($libros[$idTraeGet]);
                echo json_encode($libros);
            }
            break;
    }
?>