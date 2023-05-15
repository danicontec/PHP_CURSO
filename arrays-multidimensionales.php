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
    //Con estos arrays multidimensionales hay que tener cuidado en no repetir las claves o se pueden sobreescribir valores, por ejemplo:
        $datos_asignatura = array("Laboratorio"=>array("Clase"=>"1C",
                                    "Pasillo"=>"2A"),
                            "Programación"=>array("Clase"=>"2C"));

            foreach($datos_asignatura as $clave=>$valor){
                echo "Asignatura: ".$clave."<br>";
                foreach($valor as $clave2=>$valor2){
                    echo "$clave2 $valor2 <br>";
                }
            }
        $datos_asignatura2 = array("Laboratorio"=>array("Clase"=>"1C",
                                    "Clase"=>"2A"),
                            "Programación"=>array("Clase"=>"2C"));

            foreach($datos_asignatura2 as $clave=>$valor){
                echo "Asignatura: ".$clave."<br>";
                foreach($valor as $clave2=>$valor2){
                    echo "$clave2 $valor2 <br>";
                }
            }
    //Se ha modificado el valor de pasillo y repetido la clave Clase, esto hara que solo muestre el ultimo valor.
    //Las claves deben ser unicas.

    //Para ver la estructura del array se puede usar la funcion var_dump. Apareceran solo los valores de la clave unica.

     echo var_dump($datos_asignatura);
     echo var_dump($datos_asignatura2);
    ?>
</body>
</html>