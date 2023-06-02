<?php

    /* Aqui se procesara todos los datos de la imagen, a traves de la variable 
    superglobal $_FILE, se le puede indicar un nombre, tamaño y una ubicacion en el
    servidor, como todas las variables superglobales trabajan con arrays para guardar
    estas propiedades, pero antes de eso crea una carpeta temporal*/

    $img_name = $_FILES["imagen"]["name"];
    $type_img = $_FILES["imagen"]["type"];
    $size_img = $_FILES["imagen"]["size"];
    
    //DOCUMENT_ROOT indica la ruta del servidor desde la raiz (www en caso de Wamp)
    $send_directory = $_SERVER["DOCUMENT_ROOT"] . "/img/uploads/";

    //Si el directorio no existe en la ruta especificada se crea, si ya existe, solo sube el archivo
    if(!file_exists($send_directory)){

        /*Primero ruta, despues permisos (parecido a Linux), por ultimo especificar
        si es carpeta recursiva, es decir si son anidadas con valor boolean*/
        mkdir($send_directory, 0777, true);
    } 

    if($size_img <=1000000){

        if($type_img == "image/jpeg" || $type_img == "img/jpg" || $type_img == "image/png" || $type_img =="img/gif"){

        if(file_exists($send_directory)){
    
            //Este método mueve la imagen subida del directorio temporal a la ruta especificada
            move_uploaded_file($_FILES["imagen"]["tmp_name"], $send_directory . $img_name);
            echo "Archivo subido al servidor <a href='./formulario-subida'><button>Volver</button></a>";
        }
    }else{
        echo "El archivo seleccionado no es una imagen <a href='./formulario-subida'><button>Volver</button></a>";
    }
    } else{
        echo "La imagen excede el tamaño <a href='./formulario-subida'><button>Volver</button></a>";
    }

    

?>