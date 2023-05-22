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
            border: 2px solid gray;
            background-color: cyan;
            width: 400px;
            padding-top: 4px;
        }

        label, input{
            display: block;
            margin: 4px auto;
            text-align: center;
            width: 190px;
        }

        label{
            font-weight: bolder;
            color: maroon;
        }

        input[type="submit"]{
            width: 75px !important;
            margin-top: 8px !important;
            margin-bottom: 12px !important;
        }

        p{
            color: green;
            text-align: center;
            font-weight: bolder;
        }
    </style>
</head>
<body>

    <form method="POST">
        <label for="cod">Codigo:</label>
        <input type="text" name="codigo" id="cod">

        <label for="secc">Seccion:</label>
        <input type="text" name="seccion" id="secc">

        <label for="name">Nombre:</label>
        <input type="text" name="nombre" id="name">

        <label for="price">Precio:</label>
        <input type="text" name="precio" id="price">

        <label for="date">Fecha:</label>
        <input type="text" name="fecha" id="date">

        <label for="import">Importado:</label>
        <input type="text" name="importado" id="import">

        <label for="country">Pais</label>
        <input type="text" name="pais" id="country">

        <input type="submit" value="Insertar" name="send">
    </form>

    <?php
        $init = new PDO("mysql:host=localhost;dbname=ods_db;charset=utf8mb4", "root", "");
        $init -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "INSERT INTO HOJA1 (CODIGO_ARTICULO, SECCION, NOMBRE_ARTICULO,
         PRECIO, FECHA, IMPORTADO, PAIS_ORIGEN) VALUES
          (:cod, :sec, :nom, :pre, :fec, :imp, :pais)";
        $stmt = $init -> prepare($sql);

        if(isset($_POST["send"])){

            $stmt -> execute(array(":cod"=>$_POST["codigo"], ":sec"=>$_POST["seccion"],
                    ":nom"=>$_POST["nombre"], ":pre"=>$_POST["precio"],
                    ":fec"=>$_POST["fecha"], ":imp"=>$_POST["importado"],
                    ":pais"=>$_POST["pais"]));
            
            if($stmt){

                echo "<p>Datos insertados correctamente</p>";

            }

        }

    ?>
</body>
</html>