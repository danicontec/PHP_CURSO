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
    
    //Para trabajar con PDO se hace a traves de objetos, por lo que primero hay que llamar a la clase y su constructor
    //Primer dato servidor y gestor de datos, segundo dato usuario, tercer dato password
    try{

        $init = new PDO('mysql:host=localhost; dbname=ods_db', 'root', '');
        echo "Conexión exitosa";

    } catch(Exception $e){

        die("Error: " . $e->getMessage());

    } finally{

        //Esto libera memoria de procesos igualando el objeto PDO  a null.
       
        $init = null;
        
    }

    ?>
</body>
</html>