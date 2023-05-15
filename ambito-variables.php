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
// En PHP aunque las variables se llaman igual se diferencia el ambito global y el ambito local de una variable, vease en este ejemplo
$nombre = "Dani";

function otroNombre(){
    $nombre = "Antonio";
    //la explicacion de esto esta mas abajo
    global $nombre;
    $nombre = $nombre . " ese es mi nombre";
}

otroNombre();
echo $nombre;

// Para usar una variable de fuera de una funcion o de otra estructura hay que usar la palabra 
// reservada global y asi esta se sobrescribe
?>
</body>
</html>