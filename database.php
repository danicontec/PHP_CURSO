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
        $db_host = "localhost";
        $db_name = "usuarios";
        $db_user = "root";
        $db_pass = '';

        $str_connect = mysqli_connect($db_host, $db_user, $db_pass);

        //Este if evalua si no se conecta a la base de datos.
        if (mysqli_connect_errno()) {
            echo "ha fallado la conexion con la base de datos";
            exit();
        }
        //Esta linea selecciona la base de datos desues de la conexion, si no la encuentra muestra el mensaje del die
        mysqli_select_db($str_connect,$db_name) or die("No se encuentra la base de datos");

        //Esta sentencia evita errores de caracteres
        mysqli_set_charset($str_connect, "UTF-8");
        $query = "SELECT * FROM DATOS_USUARIO";

        $result = mysqli_query($str_connect, $query);
       
        
        while ($row = mysqli_fetch_row($result)){
            
            for($i=0;$i<sizeof($row);$i++){

                echo $row[$i] . " ";
                
            } 
            echo "<br>"; 
        }

    ?>
</body>
</html>