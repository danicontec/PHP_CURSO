<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        form {
            width: 300px;
        }

        form label {
            display: block;
        }

        form input {
            display: block;
        }

        form select {
            display: block;
        }

    </style>
</head>
<body>
    <form method="post">
        <label for="num1">Numero1</label>
        <input type="text" name="num1" id="num1" placeholder="">
        <label for="num2">Numero2</label>
        <input type="text" name="num2" id="num2" placeholder="">
        <select name="operacion" id="">
            <option value="Suma" selected>Suma</option>
            <option value="Resta">Resta</option>
            <option value="Multiplicacion">Multiplicacion</option>
            <option value="Division">Division</option>
            <option value="Modulo">Modulo</option>
            <option value="Incremento">Incremento</option>
            <option value="Decremento">Decremento</option>
        </select>
        <input type="submit" value="Enviar" name="enviar" id="enviar">
    </form>
    
    <?php

$send = $_POST["enviar"];
if(isset($send)){
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $ope = $_POST["operacion"];
    calc($ope);
}
    function calc($ope){
        if(!strcmp("Suma", $ope)){
            global $num1;
            global $num2;
           echo "<p>El resultado de la suma es " . ($num1 + $num2). "</p>";
        }
        if(!strcmp("Resta", $ope)){
            global $num1;
            global $num2;
           echo "<p>El resultado de la resta es " . ($num1 - $num2). "</p>";
        }
        if(!strcmp("Multiplicacion", $ope)){
            global $num1;
            global $num2;
           echo "<p>El resultado de la multiplicacion es " . ($num1 * $num2). "</p>";
        }
        if(!strcmp("Division", $ope)){
            global $num1;
            global $num2;
           echo "<p>El resultado de la division es " . ($num1 / $num2). "</p>";
        }
        if(!strcmp("Modulo", $ope)){
            global $num1;
            global $num2;
            echo "<p>El resultado del modulo es " . ($num1 % $num2). "</p>";
        }
        if(!strcmp("Incremento", $ope)){
            global $num1;
            global $num2;
            $num1++;
            $num2++;
            echo "<p>El incremento del primer valor es $num1 y el del segundo $num2</p>";
        }
        if(!strcmp("Decremento", $ope)){
            global $num1;
            global $num2;
            $num1--;
            $num2--;
            echo "<p>El decremento del primer valor es $num1 y el del segundo valor es $num2</p>";
        }
    }
    ?>
</body>
</html>