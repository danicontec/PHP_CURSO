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
            
            mysqli_set_charset($str_connect, "UTF-8");
            $names = array("cod","secc","name","price","date","imp","country");
            $query = "SELECT * FROM HOJA1 WHERE CODIGO_ARTICULO ='$data'";
            $result = mysqli_query($str_connect, $query);
            if(mysqli_affected_rows($str_connect)>0){
                echo "<form method='POST' action='database-edit-data.php'><table><tr><th>Codigo Articulo</th><th>Seccion</th>
            <th>Nombre_articulo</th><th>Precio</th><th>Fecha</th><th>Importado
            </th><th>Pais Origen</th><th>Actualizar</th></tr>";
            }
            else{
                echo "No se encuentra el codigo de articulo, pruebe con otro";
            }
            while ($row = mysqli_fetch_row($result)){
            for($i = 0; $i < sizeof($row); $i++){
              
                echo "<td><input type='text' value='$row[$i]' name='$names[$i]'/></td>";

            }
            echo "<td><input type='submit' name='update' value='actualizar'></td>";

            }
            echo "</table></form>";
                       
        }
        
    ?>
</body>
</html>