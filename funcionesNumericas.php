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
        $aleatorio = rand();
        $aleatorioRango = rand(4,14);
        $exponenteDe = pow(3,3);
        $redondeo = 8.5;
        $redondeoDosDec = 3.26584;

        //Asi se hace un casting explicito en PHP
        $noCasting = "2";
        $casting = (int)$noCasting;

        echo "Cualquier numero aleatorio $aleatorio<br/>";
        echo "Cualquier numero aleatorio entre 4 y 14 es: $aleatorioRango<br/>";
        echo "3 elevado a 3 es $exponenteDe<br/>";
        echo "El redondeo de $redondeo es ".round($redondeo)."<br/>";
        echo "A dos decimales el numero $redondeoDosDec queda como ".round($redondeoDosDec, 2)."<br/>";
        

    ?>
</body>
</html>