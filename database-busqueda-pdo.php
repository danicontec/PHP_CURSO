<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form{
            text-align: center;
        }

        p{
            text-align: center;
        }
    </style>
</head>
<body>

    <form method="POST">
        <label for="secc">Seccion:</label>
        <input type="text" name="seccion" id="secc">
        <input type="submit" value="Buscar" name="enviar">
    </form>
    <?php

    try{
        //Otra sintaxis que se puede usar es separar los primeros valores con ;
        $init = new PDO("mysql:host=localhost;dbname=ods_db;charset=utf8mb4", "root", "");

        //Los datos de esta funcion se pueden encontrar en https://www.php.net/manual/es/pdo.setattribute
        $init->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT NOMBRE_ARTICULO, PRECIO, FECHA FROM HOJA1 WHERE SECCION = ?";
        $result = $init -> prepare($sql);
        
        //Para recorrer la consulta sql, se pondran los àrametros de busqueda en un array,
        //esto puede ser por valores de formulario  valores directos

        // $result -> execute(array("FERRETERIA"));
        $result -> execute(array($_POST['seccion']));
        
        //Este array se recorre por valores asociativos, llamando a la constante FETCH_ASSOC de la clase PDO
        // es decir recorre los valores por los titulos de la tabla.
        if(isset($_POST["enviar"])){
            while($row=$result->fetch(PDO::FETCH_ASSOC)){
                echo "<p>Nombre: ".$row['NOMBRE_ARTICULO']. " Precio:".$row['PRECIO']." Fecha:".$row['FECHA']."</p>";
            }
            //Este metodo cierra el cursor y lo reinicia.
            $result -> closeCursor();
        }

    } catch(Exception $e) {
        
        echo "Error: ". $e->getMessage();
    }

    ?>
</body>
</html>