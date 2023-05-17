<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h2{
            text-align: center;
        }
        
        form{
            margin: auto;
            border: 2px solid gray;
            background-color: purple;
            width: 300px;
            color: cyan;
        }

        form :nth-last-child(1){
            display:block;
            margin: 12px auto;
        }

        label, input[type="text"]{
            display: block;
            width: 180px;
            margin: auto;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Actualizacion categoria</h2>
    <form method="POST">
        <label for="">Codigo Articulo</label>
        <input type="text" name="cod" id="codigo" required>
        <label for="">Categoria</label>
        <input type="text" name="cat" id="categoria" required>
        <input type="submit" value="Actualizar" name="send">
    </form>
        <?php
            $db_host = "localhost";
            $db_user = "root";
            $db_pass = "";

            $str_connect = mysqli_connect($db_host, $db_user, $db_pass);

            if(mysqli_connect_errno()){
                echo "No se ha podido conectar con el gestor de BBDD";
                exit();
            }

            else {
                mysqli_select_db($str_connect, "ods_db") or die("No se ha encontrado la BBDD");
            }
            
            if(isset($_POST["send"])){
                $cod = $_POST["cod"];
                $cat = $_POST["cat"];
                
                $query = "UPDATE HOJA1 SET SECCION = '$cat' WHERE CODIGO_ARTICULO = '$cod'";

                $result = mysqli_query($str_connect, $query);

                if($result){
                    if(mysqli_affected_rows($str_connect)==1){
                    echo "Se ha modificado el registro";
                    }
                    else if(mysqli_affected_rows($str_connect)>1){
                        echo "Se han modificado " . 
                        mysqli_affected_rows($str_connect) . " registros";
                    }
                }
            }

        ?>
</body>
</html>