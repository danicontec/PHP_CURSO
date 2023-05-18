<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form class="form-1" method="POST">
        <label for="search">Codigo:</label>
        <input type="text" name="buscar" id="search">
        <input type="submit" value="Enviar" name="send">
    </form>
    <?php

        if(isset($_POST["send"])){
            
            $data = $_POST["buscar"];
            $db_host = "localhost";
            $db_user = "root";
            $db_pass = "";
            $str_connect = mysqli_connect($db_host, $db_user, $db_pass);
            if(mysqli_connect_errno()){
                echo "No se ha podido conectar con el gestor de BBDD.";
                exit();
            }
            else {
                mysqli_select_db($str_connect, "ods_db") or die("No se ha encontrado la BBDD.");
            }
            echo "<form method='POST'><table><tr><th>Codigo Articulo</th><th>Seccion</th>
            <th>Nombre_articulo</th><th>Precio</th><th>Fecha</th><th>Importado
            </th><th>Pais Origen</th><th>Actualizar</th></tr>";
            
            $names = array("cod","secc","name","price","date","imp","country");
            $query = "SELECT * FROM HOJA1 WHERE CODIGO_ARTICULO ='$data'";
            $result = mysqli_query($str_connect, $query);
            
            while ($row = mysqli_fetch_row($result)){
            for($i = 0; $i < sizeof($row); $i++){
              
                echo "<td><input type='text' value='$row[$i]' name='$names[$i]'/></td>";

            }
            echo "<td><button onclick ='updateMe()' name='update'>Actualizar</button></td>";

            }
            echo "</table></form>";
                       
        }
        //TODO: Implementar funcionalidad editable una vez recogidos los datos de la tabla
        function updateMe(){
            if(isset($_POST["update"])){
                $data1 = $_POST["cod"];
                $sec1 = $_POST["secc"];
                $name1 = $_POST["name"];
                $price1 = $_POST["price"];
                $date1 = $_POST["date"];
                $import1 = $_POST["imp"];
                $country1 = $_POST["country"];

                $query2 ="UPDATE HOJA1 SET CODIGO_ARTICULO = '$data1', SECCION = '$sec1'
                , NOMBRE_ARTICULO = '$name1', PRECIO = '$price1', FECHA='$date1', 
                IMPORTADO = '$import1', PAIS_ORIGEN = '$country1' WHERE CODIGO_ARTICULO = '$data1'";
                $db_host2 = "localhost";
                $db_user2 = "root";
                $db_pass2 = "";
                $str_connect2 = mysqli_connect($db_host2, $db_user2, $db_pass2);
                $result2 = mysqli_query($str_connect2, $query2);
                if($result2){
                    echo "Registros actualizados correctamente";
                }
            }
    }
    ?>
</body>
</html>