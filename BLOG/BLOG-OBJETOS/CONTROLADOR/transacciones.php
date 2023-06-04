<?php
require_once("../modelo/manejo-blog.php");
require_once("../modelo/blog-behavior.php");
require_once("../modelo/properties-blog.php");

try{

    $init = new PDO("mysql:host=".HOST.";dbname=".NAME, USER, PASS);
    $init->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    if($_FILES["imagen"]["error"]){
        
        switch($_FILES["imagen"]["error"]){
            case 1: 
            echo "<p>El tamaño excede los requerimientos del archivo para el servidor</p>";
            break;
            
        case 2:
            echo "<p>El tamaño excede los requerimientos del formulario</p>";
            break;
            
            case 3:
            echo "<p>Error en la subida de archivo, interrumpido</p>";
            break;
        
        case 4:
            echo "No se ha enviado ningun archivo";
            break;
        }

    } else {
    
    echo "<p>Envio de archivo correcto</p>";
    if(isset($_FILES["imagen"]["name"]) && $_FILES["imagen"]["error"] == UPLOAD_ERR_OK){
        
        $ruta = $_SERVER["DOCUMENT_ROOT"] . "/img/upload/";
        if(!file_exists($ruta)){
            mkdir($ruta, 0777, true);   
        }
        
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta . $_FILES["imagen"]["name"]);
        echo "<p>Se ha movido la imagen al espacio del servidor";
    } else {
        echo "<p>El archivo no se ha podido mover al espacio del servidor";
    }
    }
    
    $data = new ManejoObjetos($init);
    $objects = new Blog();
    $objects->setTitulo($_POST["titulo"]);
    $objects->setFecha(date("Y-m-d H:i:s"));
    $objects->setComentario($_POST["comentarios"]);
    $objects->setImagen($_FILES["imagen"]["name"]);

    $data -> insertContent($objects);
} catch(Exception $e){
    echo "Error: ". $e->getMessage();
}

?>