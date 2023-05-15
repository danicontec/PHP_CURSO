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
        function pasarPrimeraMayusculas($frase, $condition=true){
            $resultado = ucwords($frase);
            if (!$condition) {
                echo strtolower($frase);
        }
         else {echo $resultado;}
    }
    echo pasarPrimeraMayusculas('me llamo dani y tu como te llamas<br>');
    echo pasarPrimeraMayusculas('me llamo DANI y tu como te llamas<br>', false);
    ?>
    
</body>
</html>