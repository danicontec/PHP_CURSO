<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="Post">
        <label>Buscar:</label>
        <input type="text" name="buscar"/>
        <input type="submit" value="Buscar" name="send"/>
    </form>

    <?php
    
    $db_host = "localhost";
    $db_user="root";
    $db_pass="";
    
    $str_connect = mysqli_connect($db_host, $db_user, $db_pass);
    if(mysqli_connect_errno()){
        echo "No ha sido posible conectar la base de datos";
        exit();
    }
    else{
        mysqli_select_db($str_connect,"ods_db") or die("No se ha encontrado la base de datos");
    }
    
    if(isset($_POST["send"])){
        $search = $_POST['buscar'];
        $query = "SELECT * FROM HOJA1 WHERE SECCION='$search'";
        $result = mysqli_query($str_connect, $query);

        echo "<table><tr><th>Codigo Producto</th><th>Nombre</th><th>Seccion</th>
        <th>Precio</th><th>Fecha</th><th>Importado</th>
        <th>Pais Origen</th></tr>";

        while($row = mysqli_fetch_row($result)){
                for($i=0;$i<sizeof($row);$i++){
                if($i==0){
                    echo "<tr>";
                }
                echo "<td>$row[$i]</td>";
                if($row == sizeof($row)-1){
                    echo "</tr>";
                }
            }
        }
        echo "</table>";
        mysqli_close($str_connect);
    }
    ?>
</body>
</html>