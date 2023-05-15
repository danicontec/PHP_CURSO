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
        $i = 0;
        echo "valores menores a 5 ordenados en bucle desde 0 <br/>";
        while($i < 5){
            echo "i = ".$i."<br>";
            $i++;
        }

        do {
            echo "Diferencia con do-while (Se ejecuta una vez sea verdad o no)<br/>";
            echo "i = ".$i."<br>";
        } while($i < 0);
    ?>
</body>
</html>