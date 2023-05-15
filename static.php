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
    function miEstatica(){
        //static conserva el valor una vez terminada de ejecutar la funcion.
        static $valorSumatorio = 0;
        $valorSumatorio++;
        echo $valorSumatorio;
    }

    miEstatica();
    miEstatica();
    miEstatica();
    miEstatica();
    miEstatica();
    ?>
</body>
</html>