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
    //En este programa examinaremos la logica de los operadores segun su orden de importancia.

    $condicion1 = true;
    $condicion2 = false;
    $resultado1 = $condicion1 && $condicion2;
    $resultado2 = $condicion1 and $condicion2;

    if($resultado1){
        echo "Es verdadero<br/>";
    }

    else{
         echo "Es falso<br/>";
    }
    if($resultado2){
        echo "Es verdadero<br/>";
    }

    else{
         echo "Es falso<br/>";
    }

    //Esto pasa porque el operador = esta por encima de importancia del operador and, aunque esto sea tambien un operador logico.
    //Lista de operadores por su orden de importancia: https://www.php.net/manual/es/language.operators.precedence.php
    ?>
</body>
</html>