<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form{
            text-align:center;
        }

        table{
            margin: auto;
        }
    </style>
</head>
<body>
    <form method="POST">

        <label for="user">Usuario:<label>
        <input type="text" name="usuario" id="user">
        <input type="submit" value="Enviar" name="send">

    </form>

    <?php
        require("database-pdo-list.php");
        $list_pdo = new ListPDO();

        if(isset($_POST['send'])){

            $user = $_POST['usuario'];
            $array_user = $list_pdo->getUsers($user);
            $i = 0;

            if(sizeof($array_user)>0){
                echo "<table><tr><th>Nombre</th><th>Usuario</th><th>Contraseña</th></tr>";
                foreach($array_user as $clave=>$valor){
                    if($i==0){
                        echo"<tr>";
                    }
                    foreach($valor as $a){
    
                        echo "<td>".$a."</td>";
                    }
                    echo "</tr>";
                    $i++;
                }
                echo "</table>";
        }
    }
    ?>
</body>
</html>