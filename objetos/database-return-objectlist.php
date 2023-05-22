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
        require("database-objecto-list.php");
        $productos = new ListItems();
        $array_items = $productos -> getItems();
        $i=0;

        //Al trabajar con objetos y devolver una funcion de array, esta aparece como multidimensional
        //Muestra primero los indices como primer elemento y despues cada titulo de tabla como subindice de array dimensional
        if(sizeof($array_items)>0){
            echo "<table><tr><th>Codigo</th><th>Seccion</th><th>Nombre</th>
            <th>Precio</th><th>Fecha</th><th>Importado</th><th>Pais</th></tr>";
            foreach($array_items as $clave=>$valor){
                if($i==0){
                    echo"<tr>";
                }
                foreach($valor as $a){

                    echo "<td>".$a."</td>";
                }
                echo "</tr>";
                $i++;
            }
            echo "</table>";

        }
    ?>
</body>
</html>