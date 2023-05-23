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
    </style>
</head>
<body>
        <h2>Login</h2>
        <form method="POST">
            <label for="user">Usuario</label>
            <input type="text" id="user" name="usuario">
            <label for="pass">Contraseña</label>
            <input type="password" id="pass" name="password">
            <input type="submit" value="Entrar" name="send">
        </form>

    <?php
        try{

            $init = new PDO("mysql:host=localhost;dbname=sesiones;charset=utf8mb4", "root", "");
            $init->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT * FROM USERDATA WHERE USUARIO=:user AND CONTRASEÑA=:pass";
            $result = $init->prepare($query);
            
            if(isset($_POST["send"])){
                $result->execute(array(":user" => $_POST["usuario"], ":pass" => $_POST["password"]));

                if($result -> rowCount() == 1){
                    //TODO: Cambiar redirecciones de sesion ok y no ok
                    
                    //Esta funcion inicia y mantiene sesiones, PHP detecta cuando ha sido iniciada segun usuario
                    session_start();
                    $_SESSION["usuario"] = $_POST["usuario"];
                    header("Location: ./redirect");
                    echo "Bienvenido";

                }else{
    
                    echo "Usuario o contraseña incorrectos";
    
                }
            }

        } catch(Exception $e){

            echo "Error: ". $e->getMessage();

        }
        
    ?>
</body>
</html>