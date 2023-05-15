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
        include("herencia-static-definicion.php");
        $compra1 = new Concesionario("baja");
        $compra1 -> aireAcondicionado();
        $compra1 -> eligeColor("gris");
        $compra1 -> eligeColor("amarillo");

        //la sintaxis de :: es para hacer referencia a un atributo o un metodo de la clase, pero por buena practica esta encapsulada
        //por eso usamos el metodo que calcula en vez del atributo de la clase aunque sea estatico
        Concesionario::aplica_descuento();
        echo $compra1 -> get_precioFinal();

    ?>
</body>
</html>