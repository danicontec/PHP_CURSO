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
            margin-bottom: 4px;
        }

        form{
            margin: auto;
            width: 400px;
            border: 2px solid gray;
            padding-bottom: 4px;
        }

        label, input {
            display: block;
            width: 190px;
            margin: 4px auto;
            text-align: center;
        }

        label:hover{
            color: orange;
        }

        input[type="text"]:focus{
            font-weight: bolder;
        }

        input[type="submit"]{
            width: 90px !important;
            margin-top: 16px !important;
        }

        input[type="submit"]:hover{
            background-color: gray;
            color: white;
            font-weight: bolder;
            width: 90px !important;
        }

        .ok{
            text-align: center;
            font-weight: bolder;
            color: green;
        }
    </style>
</head>
<body>
    <div class="form1">
        <h2>Login</h2>
        <form method="POST">
            <label for="user">Usuario</label>
            <input type="text" id="user" name="usuario">
            <label for="pass">Contraseña</label>
            <input type="password" id="pass" name="password">
            <input type="submit" value="Entrar" name="send">
        </form>
    </div>

    <div class="form2">
        <h2>Registro</h2>
        <form method="POST">
            <label for="user1">Usuario</label>
            <input type="text" id="user1" name="usuario1">
            <label for="pass1">Contraseña</label>
            <input type="password" id="pass1" name="password1">
            <input type="submit" value="Registrar" name="send1">
        </form>
    </div>

    <?php
        require("database-data.php");
        if(mysqli_error($str_connect)){
            echo "Error en la conexion";
            exit();
        } else{
            mysqli_select_db($str_connect,"sesiones");
            mysqli_set_charset($str_connect, "UTF-8");
        }

        if(isset($_POST["send1"])){
            $usuario = mysqli_real_escape_string($str_connect, $_POST["usuario1"]);
            $password = mysqli_real_escape_string($str_connect,$_POST["password1"]);

            $sql = "CALL InsertUserData('$usuario', '$password')";
            $result = mysqli_query($str_connect, $sql); 
            
            //TODO: Corregir salida de usuario y de procedimiento almacenado

            if(mysqli_affected_rows($str_connect)>0){
                echo "<p class='ok'>Registro insertado correctamente</p>";
            }
            else{
                
                echo "<p class='err'>Fallo al insertar el registro ".mysqli_error($str_connect)."</p>";
                
            }
        }
    ?>
    </body>
</html>