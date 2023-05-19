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
        include("database-form-edit.php");

                $db_host2 = "localhost";
                $db_user2 = "root";
                $db_pass2 = "";
                $str_connect2 = mysqli_connect($db_host2, $db_user2, $db_pass2);
                if(mysqli_connect_errno()){
                    echo "No se ha podido conectar con el gestor de BBDD.";
                    exit();
                }
                else {
                    mysqli_select_db($str_connect2, "ods_db") or die("No se ha encontrado la BBDD.");
                }

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
                        $result2 = mysqli_query($str_connect2, $query2);
                        mysqli_set_charset($str_connect, "UTF-8");
                        if($result2){
                            echo "Datos acualizados";
                            $query3 = "SELECT * FROM HOJA1 WHERE CODIGO_ARTICULO = '$data1'";
                            $result3 = mysqli_query($str_connect2, $query3);
                            while($row = mysqli_fetch_row($result3)){
                                for($i=0; $i<sizeof($row); $i++){
                                    echo "<p>$row[$i]</p>";
                                }
                            }
                            echo "<button><a href='database-form-edit' target='_self'>Limpiar</a></button>";
                        }
                }
    
    
    ?>
</body>
</html>