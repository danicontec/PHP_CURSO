<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form{
            margin:auto;
            width: 300px;
            border: 3px solid gray;
        }

        form :nth-last-child(1){
            margin: 12px auto;
        }
        label, input {
            display:block;
            width: 180px;
            margin: auto;
            text-align: center;
        }

        h2{
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="insercion">

        <h2>Formulario de insercion de Tablas</h2>
        
        <form method="POST">
            <label for="codigo">Codigo Artículo:</label>
            <input type="text" name="cod_art" id="codigo">
            
        <label for="seccion">Sección:</label>
        <input type="text" name="sec" id="seccion">

        <label for="name">Nombre:</label>
        <input type="text" name="nombre" id="name">

        <label for="price">Precio:</label>
        <input type="text" name="precio" id="price">

        <label for="date">Fecha:</label>
        <input type="text" name="fech" id="date">

        <label for="import">Importado:</label>
        <input type="text" name="importado" id="import">
        
        <label for="country">Pais de origen</label>
        <input type="text" name="pais" id="country">

        <input type="submit" value="Enviar" name="send">
    </form>
    <?php
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $str_connect = mysqli_connect($db_host, $db_user, $db_pass);

    if (mysqli_connect_errno()) {
        echo "No conecta la base de Datos";
    } else {
        mysqli_select_db($str_connect, "ods_db") or die("No es posible encontrar la base de datos");
    }

    if(isset($_POST["send"])){
        
        $cod = $_POST["cod_art"];
        $sec = $_POST["sec"];
        $name = $_POST["nombre"];
        $price = $_POST["precio"];
        $date = $_POST["fech"];
        $import = $_POST["importado"];
        $country = $_POST["pais"];

        //Cuando se hace referencia a las variables aunque sean string hay que ponerlas entre comillas simples.
        $sql = "INSERT INTO HOJA1(CODIGO_ARTICULO, SECCION, NOMBRE_ARTICULO, PRECIO, FECHA, IMPORTADO, PAIS_ORIGEN) VALUES ('$cod'
        , '$sec', '$name', '$price', '$date', '$import', '$country' )";

        
        $result = mysqli_query($str_connect, $sql);
        if ($result) {
            echo "Registro insertado";
        }

        else{
            echo mysqli_error($str_connect);
        }
    }
    
    
    
    
    ?>
</div>
<div class="borrado">
    
    <h2>Formulario de borrado de registros</h2>
        
        <form method="POST">
            <label for="codigo">Codigo Artículo:</label>
            <input type="text" name="cod_art1" id="codigo">
            

        <input type="submit" value="Borrar" name="send1">
    </form>
    <?php
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $str_connect = mysqli_connect($db_host, $db_user, $db_pass);

    if (mysqli_connect_errno()) {
        echo "No conecta la base de Datos";
    } else {
        mysqli_select_db($str_connect, "ods_db") or die("No es posible encontrar la base de datos");
    }

    if(isset($_POST["send1"])){
        
        $cod = $_POST["cod_art1"];

        //Cuando se hace referencia a las variables aunque sean string hay que ponerlas entre comillas simples.
        $sql = "DELETE FROM HOJA1 WHERE CODIGO_ARTICULO = '$cod'";

        
        $result = mysqli_query($str_connect, $sql);
        if ($result) {
            echo "Registro borrado <br>";
            //esta funcion devuelve las lineas afectadas tras una modificacion
            echo mysqli_affected_rows($str_connect);
        }

        else{
            //esta funcion da el tipo de error que esta llegando en caso de no poder hacer modificaciones
            echo mysqli_error($str_connect);
        }
    }
    ?>
</div>
</body>

</html>