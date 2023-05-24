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
    <?php
        
        try{
            $pdo = new PDO("mysql:host=localhost;dbname=sesiones;charset=utf8mb4", "root", "");
            $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM USERDATA WHERE USUARIO=:user AND CONTRASEÑA=:pass";
            $stmt = $pdo -> prepare($sql);
            
            if(isset($_POST["send"])){

                $stmt -> execute(array(":user" => $_POST["usuario"], ":pass" => $_POST["password"]));
                if($stmt -> rowCount()>0){
                    echo "1";
                    session_start();
                    $_SESSION["usuario"] = $_POST["usuario"];
                    
                } else {
                    echo "No existe el usuario";
                }   
            }
        } catch(Exception $e){
            echo "Error: " . $e -> getMessage();
        }
        if(!isset($_SESSION["usuario"])){
            include("form-session.php");
        }
        else{
            echo "<p>Bienvenido a la plataforma ".$_SESSION["usuario"]."</p>";
            echo "<a href=./out2><button>Salir</button></a>";
        }
        
    ?>
</body>
</html>