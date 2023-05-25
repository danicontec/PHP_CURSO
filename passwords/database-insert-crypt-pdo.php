<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        }
        
        h2{
            text-align: center;
            margin-bottom: 4px;
        }

        form{
            margin: 40px auto;
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
    <form method="POST">
    <label for="name">Nombre</label>
    <input type="text" name="name" id="name">
    <label for="user">Usuario</label>
    <input type="text" name="user" id="user">
    <label for="pass">Contraseña</label>
    <input type="text" name="pass" id="pass">
    <input type="submit" value="Insertar" name="send">
</form>
<?php
        /*En este codigo se introduciran usuarios
         con la contraseña encriptada en la base de datos
         usando la funcion password_hash*/
         if(isset($_POST["send"])){
            
            $name = $_POST["name"];
            $user = $_POST["user"];
            $pass = $_POST["pass"];

            //$crypto = password_hash($pass, PASSWORD_DEFAULT);

            //La funcion de arriba aumenta el cifrado de la contraseña
            $crypto = password_hash($pass, PASSWORD_DEFAULT, array("cost"=>14));
                $conn = new PDO("mysql:host=localhost;dbname=ods_db","root","");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = 'INSERT INTO USUARIOS (NOMBRE, USUARIO, PASSWORD) VALUES (:name, :user, :pass)';
                $stmt = $conn->prepare($sql);
                $result = $stmt -> execute(array(":name"=>$name, ":user"=>$user, ":pass"=>$crypto));
                if($result){
                    echo "Usuario registrado";
                } else{
                    echo "Error en la insercion";
                }
        }
    ?>
</body>
</html>