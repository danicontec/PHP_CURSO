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
    print "Esta es mi primera pagina php <br/>"; 
    print "Hola Dani esta es tu primera pagina <br/>"; 

    // Esto es un comentario PHP

    /*Esto es un comentario
    multilinea
    en PHP*/


    //Esta comprobacion de cookie es de la seccion de sesiones, (archivo cookies)
    if($_COOKIE["prueba2"]){
        echo "<p>El valor de la cookie es " . $_COOKIE["prueba2"] . "</p>";
        }
    ?>
</body>
</html>