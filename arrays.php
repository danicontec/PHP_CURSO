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
    //En PHP hay varias formas de construir Arrays, una de ellas es esta donde el lenguaje se encarga de ir rellenando indices por orden
    $meses[]="Enero";
    $meses[]="Febrero";
    $meses[]="Marzo";
    $meses[]="Abril";
    $meses[]="Mayo";
    $meses[]="Junio";
    $meses[]="Julio";
    $meses[]="Agosto";
    $meses[]="Octubre";
    $meses[]="Noviembre";
    $meses[]="Diciembre";

    echo $meses[1];

    //Se puede definir los indices tambien, pero de esta manera se sobreescribe el valor que ya estaba identificado arriba, no acomoda valores 

    $meses[8]="Septiembre";
    for($i= 0; $i<sizeof($meses);$i++){
    echo " ".$meses[$i];
    }

    //Otra forma de definir un array es por clave/valor o asociativo.
    $persona = array("nombre"=>"Daniel", "apellido"=>"martel");

    //se puede ver un dato en concreto llamando a la clave del array
    echo $persona["nombre"]."<br>";

    //Tambien se puede añadir datos al final del array asociativo de esta manera, con una clave nueva
    $persona["edad"]=25;

    foreach($persona as $clave => $valor){
    echo " ".$clave." ".$valor."<br>";
    }
    //Si se le da un valor diferente a la variable del array asociativo se modifica con el nuevo valor que se añade.
    $persona = "Juan Valdes";
    echo $persona;
    ?>


</body>
</html>