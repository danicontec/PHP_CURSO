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
        //Las funciones por referencia cambian el valor desde el parametro de la funcion hacia afuera
        //Se reconocen porque en los parametros de la funcion llevan un &, y su comportamiento es parecido a una variable estatica

        $num = 0;
        function incrementaEnDiez(&$valor){
            while($valor < 10){
                $valor++;
            }
            return $valor;
        }

        echo $num."<br>";
        echo incrementaEnDiez($num)."<br>";
        echo $num."<br>";
        echo "El ultimo valor mostrado esta fuera de la llamada de la funcion y se conserva su valor (como si fuera estatica)<br>";

    ?>
</body>
</html>