<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require("properties-blog.php");
        $conexion = mysqli_connect(HOST, USER, PASS, NAME);

        if(mysqli_error($conexion)){
            echo "<p>Error en: " . mysqli_error($conexion);
            exit();
        }

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

        $titulo = $_POST["titulo"];
        $fecha = date("Y-m-d H:i:s");
        $comentario = $_POST["comentarios"];
        $imagen = $_FILES["imagen"]["name"];

        $sql = "INSERT INTO CONTENIDO (TITULO, FECHA, COMENTARIO, IMAGEN) VALUES ('$titulo','$fecha','$comentario', '$imagen')";
        $result = mysqli_query($conexion, $sql);
        
        if($result){
            echo "<p>Se ha insertado el contenido correctamente</p>";
            mysqli_close($conexion);
        }

    ?>
</body>
</html>