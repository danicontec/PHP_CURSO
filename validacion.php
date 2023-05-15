<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form{
            margin: auto;
            border: 1px solid green;
            width: 20%;
            padding: 1px;
        }

        form label {
            display: block;
            margin: auto;
            text-align: center;
        }

        form input {
            display: block;
            margin: auto;
        }

        form h2 {
            text-align: center;
        }

        form :nth-last-child(1){
            margin-bottom: 12px;
            margin-top: 4px;
        }

        .yes {
            text-align: center;
            font-weight: bolder;
            color: green;
        }

        .no {
            text-align: center;
            font-weight: bolder;
            color: red;
        }
    </style>
</head>
<body>
    <form  action="validacion2.php" method="post">
        <h2>Formulario Ingreso</h2>
            <label for="usuario">Nombre</label>
            <input type="text" id="usuario" name="usuario" autofocus>
            <label for="edad">Edad</label>
            <input type="text" id="edad" name="edad">
            <input type="submit" value="enviar" id="enviar" name="enviar">
    </form>
        <!-- En este formulario redirecciona a otro archivo php por lo que el formulario desaparecera, si se integra
        el codigo del archivo si se integra en este pedazo de codigo se mantiene el formulario y
        se integra la salida del archivo justo debajo, para usar ese codigo quitar action del form -->

        <?php
         $name = $_POST["usuario"];
         $age = $_POST["edad"];
 
         if(isset($_POST["enviar"])){
             
             if ($name == "Dani"){
             echo "<p class='yes'>Puedes entrar</p>";
             }
              else {
             echo "<p class='no'>No puedes entrar</p>";
             }
         
         }
        ?>
</body>
</html>