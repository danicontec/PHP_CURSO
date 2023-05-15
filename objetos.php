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
    //Los objetos al igual que en otros lenguajes se definen por una clase y despues se instancian en otro sitio
    // donde han de ser llamados y usar sus comportamientos y propiedades.

    //La peculiaridad que tiene PHP es que para trabajar con los atributos no se hace con el caracter . sino con -> tanto en 
    // la propia clase como en instanciaciones
        
        include("objetos-definicion.php");
        $coche = new Coche();
        $coche2 = new Coche();
        $coche3 = new Coche();


        $coche -> frenar();
        echo "El coche tiene ".$coche->getRuedas(). " ruedas<br>";
        $coche -> setRuedas(4);
        echo "El coche tiene ".$coche->getRuedas(). " ruedas<br>";

        $camion = new Camion();
        $camion -> setRuedas(8);
        echo $camion -> ruedas ."<br>";

        $camion -> compartir();
        //aqui aparecera las dos funcionalidades, arrastra el codigo del padre.
        $camion -> arrancar();

     //los setters rellenan los datos que no esten en el constructor o modifican los que ya tienen por defecto.
    ?>
</body>
</html>