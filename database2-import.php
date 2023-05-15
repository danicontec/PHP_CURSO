<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table * {
            background-color: brown;
            color: white;
        }
        table {
            border: 1px solid black;
            margin: auto;
            
        }
        th {
            border: 1px solid black;
        }
        td {
            border: 1px solid black;
            text-align: center;
        }

        th:hover,td:hover{
            background-color: orange;
            color: red;
        }
    </style>
</head>
<body>
    <?php
        $db_host= "localhost";
        $db_user = "root";
        $db_pass = "";
        
        $db_connect = mysqli_connect($db_host, $db_user, $db_pass);
        
        mysqli_set_charset($db_connect, "utf-8");
        if(mysqli_connect_errno()){
            echo "Error al conectar con la BBDD";
            exit();
        }
        else{
            mysqli_select_db($db_connect, "ods_db") or die("No se encuentra la BBDD");
        }
        $query = "SELECT * FROM HOJA1";
        $result = mysqli_query($db_connect, $query);
        echo "<table><tr><th>Codigo Articulo</th><th>Seccion</th>
        <th>Nombre Articulo</th><th>Precio</th><th>Fecha</th><th>Importado</th>
        <th>Pais Origen</th></tr>";
        while($row = mysqli_fetch_row($result)){

            for($i = 0 ; $i < sizeof($row); $i++){
                if ($i==0){
                    echo "<tr>";
                }
                echo "<td>$row[$i] ";
            }
            echo "</td>";
            if ($row == sizeof($row)-1){
            echo "</tr>";
            }
        }
        echo "</table>";

    ?>
</body>
</html>