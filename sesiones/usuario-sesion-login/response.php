<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        if(!isset($_SESSION["user"])) {
           header("Location: logout");
           exit();
       }
        if(isset($_COOKIE["usuario"])) {
            echo "<h1>Bienvenid@ ".$_COOKIE["usuario"]."</h1>";
            echo "<a href='logout.php'><button>Salir</button></a>";
        } else {
            echo "<h1>Sesion iniciada pero sin cookie</h1>";
            echo "<a href='logout.php'><button>Salir</button></a>";
        }

    ?>
</body>
</html>