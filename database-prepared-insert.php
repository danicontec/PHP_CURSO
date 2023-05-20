<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h2{
            text-align: center;
        }
        form {
            margin: auto;
            width: 400px;
            border: 3px solid #BC8D83;
            background-color: blueviolet;
            height:auto;
            padding-top: 8px;
            padding-bottom: 1px;
        }

        label{
            color: whitesmoke;
            font-weight: bolder;
        }

        label:hover{
            color: orange;
        }

        label, input{
            display: block;
            margin: 4px auto;
            text-align: center;
            width: 190px;
        }

        input[type="submit"]{
            width: 90px !important;
            margin-top: 12px !important;
            margin-bottom: 12px !important;
        }

        
    </style>
</head>
<body>
    <h2>Formulario insercion de datos</h2>
    <form method="POST">
        
                <!-- CODIGO_ARTICULO SECCION NOMBRE_ARTICULO PRECIO	
                FECHA IMPORTADO PAIS_ORIGEN	 -->
        <label for="cod">Codigo</label>
        <input type="text" name="codigo" id="cod">
        <label for="secc">Seccion</label>
        <input type="text" name="seccion" id="secc">
        <label for="nom">Nombre</label>
        <input type="text" name="nombre" id="nom">
        <label for="pre">Precio</label>
        <input type="text" name="precio" id="pre">
        <label for="date">Fecha</label>
        <input type="text" name="fecha" id="date">
        <label for="imp">Importado</label>
        <input type="text" name="importado" id="imp">
        <label for="country">Pais</label>
        <input type = "text" name= "pais" id="country">
        <input type="submit" value="Insertar" name="insert">
    </form>
    <?php
        require("database-data.php");
        if(mysqli_connect_errno()){
            echo "<p class='info'>No se puede acceder al gestor de datos</p>";
            exit();
        }
        else{
            mysqli_select_db($str_connect, "ods_db") or die("<p class='info'>No se encuentra la base de datos</p>");
            mysqli_set_charset($str_connect, "UTF-8");
        }

        if(isset($_POST["insert"])){
            $codigo = $_POST["codigo"]; 
            $seccion = $_POST["seccion"];
            $nombre = $_POST["nombre"]; 
            $precio = $_POST["precio"]; 
            $fecha = $_POST["fecha"];   
            $importado = $_POST["importado"];
            $pais = $_POST["pais"];

            $query = "INSERT INTO HOJA1 (CODIGO_ARTICULO, SECCION, NOMBRE_ARTICULO, PRECIO
            , FECHA, IMPORTADO, PAIS_ORIGEN) VALUES(?, ?, ?, ?, ?, ?, ?)";
            $result = mysqli_prepare($str_connect, $query);
            $success = mysqli_stmt_bind_param($result, "sssssss", $codigo, $seccion,
            $nombre, $precio, $fecha, $importado, $pais);
            $ok = mysqli_stmt_execute($result);

            if(!$ok){
                echo "<p class='info'>No se ha ejecutado la consulta</p>";
            }
            else{
                //En este caso al ser una consulta de insercion no hace falta la funcion de mysqli_stmt_result, porque no se recorre registros
                echo "<p class='info'>Se han insertado los registros en la tabla.</p>";
            }
        }

    ?>
</body>
</html>