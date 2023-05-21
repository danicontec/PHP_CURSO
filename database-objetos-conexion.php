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
        $connect = new mysqli("localhost", "root", "", "ods_db");
        if ($connect -> errno){
            echo "No se ha encontrado la conexion";
            exit();
        }
        else {
            $connect -> set_charset("utf-8");
            $sql = "SELECT * FROM USUARIOS";
            $result = $connect -> query($sql);
            if($result){
                echo "<table><tr><th>Nombre</th><th>Usuario</th><th>Contraseña</th>";
                while($row = $result -> fetch_row()){
                    for($i = 0; $i < count($row); $i++){
                    if($i==0){
                        echo "<tr>";
                    }
                    echo "<td>$row[$i]</td>";
                }
            }
            }

        }

    ?>
</body>
</html>