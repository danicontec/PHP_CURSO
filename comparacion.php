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

    //Estas funciones estan invertidas, pintan un 0 si son iguales y un 1 si no lo son. No siguen la logica booleana.
    // Por lo tanto se invierte if para darle un sentido mas logico.
    $str1 = "hola";
    $str2 = "HOLA";
    $res1 = strcmp($str1, $str2);
    $res2 = strcasecmp($str1, $str2);

    echo "Los resultados sin case $res1 y los resultados con case $res2 <br/>";
    if(!$res1){
        echo "Coinciden ignoran case";
    }
    else {
        echo "No coinciden no ignoran case";
    }

    ?>
</body>
</html>