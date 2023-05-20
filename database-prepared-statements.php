<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: gray;
        }
        h1{
            text-align:center;
            margin-bottom: 2px;
            letter-spacing: -1.75px;
        }

        form {
            margin: auto;
            background-color: wheat;
            text-align: center;
            border: 2px solid cyan;
            width: 30%;
        }
        
        label, input{
            margin: 2px auto;
            text-align: center;
            width: 20%;
            font-weight: bolder;
        }

        input[type="submit"]{
            width: 25% !important;
        }

        .info{
            text-align: center;
            font-weight: bolder;
        }
        table{
            margin:16px auto;
            text-align: center;
        }
        table tr {
            background-color: wheat;
        }
        
        th,td{
            border: 2px solid cyan;
            padding: 0;
        }
        </style>
</head>
<body>
    <h1>Formulario de busqueda consultas preparadas</h1>
    <form method="POST">
        <label for="country">Pais</label>
        <input type="text" name="cnt" id="country">
        <input type="submit" value="Buscar" name="send">
    </form>
    <?php
        //Las consultas preparadas, sustituyen el valor por el caracter ?, se hacen a traves de la funcion mysqli_prepare()
        //La funcion mysqli_prepare devuelve un objeto mysqli_stmt
        //Luego de esto para juntar el parametro con el caracter ? y la el statement se llama a la funcion mysqli_stmt_bind_param()
        //Una vez hacho todo esto, se ejecuta la funcion mysqli_stmt_execute
        //Para tratar cada campo de la consulta se necesita almacenar en memoria y para ello esta la funcion mysqli_stmt_bind_result()
        //Una vez hecho todos estos pasos se lee la consulta con mysqli_stmt_fetch

        $db_host = "localhost";
        $db_user = "root";
        $db_pass = "";

        $str_connect = mysqli_connect($db_host, $db_user, $db_pass);

        if(mysqli_errno($str_connect)){
            echo "<p class='info'>No se encuentra el gestor de datos</p>";
            exit();
        }

        else {
            mysqli_select_db($str_connect, "ods_db") or die("<p class='info'>No se encuentra la base de datos</p>");
            mysqli_set_charset($str_connect, "UTF-8");
        }

        if(isset($_POST["send"])){
            $country = $_POST["cnt"];
            $sql = "SELECT * FROM HOJA1 WHERE PAIS_ORIGEN = ?";
            $result = mysqli_prepare($str_connect, $sql);

            //Las variables success, ok y okstmt pueden ser reutilizadas directamente desde success pero se nombraron diferentes para dejar claro que son procesos distintos.
            $success = mysqli_stmt_bind_param($result, "s", $country); //true or false
            $ok = mysqli_stmt_execute($result);
            $count = 0;
            if(!$ok){
                echo "<p class='info'>Error en la consulta</p>";
            }
            else {
                $okstmt = mysqli_stmt_bind_result($result, $cod, $sec, $name, $price, $date, $imp, $cntr);
                
                //Opcion de contador dado que afected rows esta dando valor -1 quiazas en un futuro solucione esta linea
                while(mysqli_stmt_fetch($result)){
                    if ($count == 0){
                        echo "<table><tr><th>Cod</th><th>Seccion</th><th>Nombe</th><th>Precio</th><th>Fecha</th><th>Importado</th><th>Pais</th></tr>";
                    }
                    echo "<tr><td>$cod</td> <td>$sec</td> <td>$name</td> <td>$price</td> <td>$date</td> <td>$imp</td> <td>$cntr</td></tr>";
                    $count++;
                }
                echo "</table>";
                mysqli_stmt_close($result);
                mysqli_close($str_connect);
            }
        }

    ?>
</body>
</html>