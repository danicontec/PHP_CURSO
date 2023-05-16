<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form method="POST">
        <label for="">Codigo Articulo</label>
        <input type="text" name="cod" id="codigo">
        <label for="">Categoria</label>
        <input type="text" name="cat" id="categoria">
        <input type="submit" value="Actualizar" name="send">
        <?php
            $db_host = "localhost";
            $db_user = "root";
            $db_pass = "";

            $str_connect = mysqli_connect($db_host, $db_user, $db_pass);

            if(mysqli_errorno($str_connect)){
                echo "No se ha podido conectar con el gestor de BBDD";
                exit();
            }

            else {
                mysqli_select_db($str_connect, "ods_db") or die("No se ha encontrado la BBDD");
            }


        ?>
    </form>
</body>
</html>