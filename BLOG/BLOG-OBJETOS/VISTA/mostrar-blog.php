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
    
        require("../modelo/manejo-blog.php");
        require("../modelo/properties-blog.php");

        try{

            $connection = new PDO("mysql:host=".HOST.";dbname=".NAME, USER, PASS);
            $connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $objects = new ManejoObjetos($connection);
            $entries = $objects ->orderByDate();

            if(empty($entries)){
                echo "<p>No hay entradas<p>";
            } else {

                foreach($entries as $values){

                    echo "<h1>". $values ->getTitulo()."</h1>";
                    echo "<h3>". $values ->getFecha()."</h3>";
                    echo "<p>". $values ->getComentario()."</p>";

                    if($values ->getImagen()!=""){
                    
                        echo "<img src='"."/img/upload/". $values ->getImagen()."' alt='Imagen' width='300' height='200'>";
                    }
                    echo "<hr>";
                }

            }

        } catch(Exception $e){

            echo "Error: ". $e->getMessage();

        }
    ?>

    <a href="form"><button>Formulario</button></a>
</body>
</html>