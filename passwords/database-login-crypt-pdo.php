<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        h2 {
            text-align: center;
            margin-bottom: 4px;
        }

        form {
            margin: 40px auto;
            width: 400px;
            border: 2px solid gray;
            padding-bottom: 4px;
        }

        label,
        input {
            display: block;
            width: 190px;
            margin: 4px auto;
            text-align: center;
        }

        label:hover {
            color: orange;
        }

        input[type="text"]:focus {
            font-weight: bolder;
        }

        input[type="submit"] {
            width: 90px !important;
            margin-top: 16px !important;
        }

        input[type="submit"]:hover {
            background-color: gray;
            color: white;
            font-weight: bolder;
            width: 90px !important;
        }
    </style>
</head>
<body>
    <form method="POST">
        <h2>Login</h2>
        <label for="user">Usuario</label>
        <input type="text" name="user" id="user">
        <label for="pass">Contraseña</label>
        <input type="password" name="pass" id="pass">
        <input type="submit" value="Verificar" name="send">
    </form>

    <?php
    if(isset($_POST["send"])){
        $user = $_POST["user"];
        $pass = $_POST["pass"];

        $init = new PDO("mysql:host=localhost;dbname=ods_db", "root", "");
        $sql = $init->prepare("SELECT * FROM usuarios WHERE usuario = :user");
        $sql->execute(array(":user" => $user));
        $result = $sql->fetch(PDO::FETCH_ASSOC);

        if($result){
            if(password_verify($pass, $result["password"])){
                echo "Usuario registrado";
            } else{
                echo "Usuario no registrado";
            }
        }
    }
    ?>
</body>
</html>
