<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }

        h2{
            margin-top: 20px;
            text-align:center;
        }

        form {
            margin: auto;
            padding-top: 8px;
            padding-bottom: 8px;
            background-color: aquamarine;
            width: 300px;
            border: 1px solid brown;
        }

        label, input{
            display:block;
            margin: auto;
            text-align: center;
        }

        input[type="checkbox"]{
            display: inline-block;
            position: absolute;
            margin-top: -16px;
            margin-left: 95px;
            
        }

        input[type="submit"]{
            margin-top: 8px;
        }

        .pack{
            margin-top: 8px;
            margin-bottom: 4x;
        }
    </style>
</head>
<body>
    <h2>Iniciar sesion</h2>
    <form method="POST">
        <label for="usu-log">Usuario:</label>
        <input type="text" name="usuario" id="usu-log">
        <label for="pass-log">Contraseña:</label>
        <input type="password" name ="contraseña" id="pass-log">
        <div class="pack">
            <label for="rem">Recordarme</label>    
            <input type="checkbox" name="recordar" id="rem">
        </div>

        <input type="submit" value="Entrar" name="enviar">
    </form>

    <?php
        require("database-users.php");
        
        if(isset($_POST['enviar'])){
            $usuario = $_POST['usuario'];
            $contraseña = $_POST['contraseña'];
            $return_cookie = new ReturnUsers();

            if(isset($_POST["recordar"]) && isset($_POST["recordar"]) == "on"){
                setcookie("usuario", $return_cookie->getUser($usuario, $contraseña),time()+10);
                session_start();
                $_SESSION['user'] = $_COOKIE["usuario"];
                header("Location: response");
            } else {
                session_start();
                $_SESSION['user'] = $return_cookie->getUser($usuario, $contraseña);
                header("Location: response");
            }
        }
    ?>
</body>
</html>