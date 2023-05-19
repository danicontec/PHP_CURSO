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
        }

        .form1{
            width: 50%;
            padding-top: 100px;
            float: left;
        }
        
        .form1 h2 {
            text-align: center;
        }
        
        .form1 label, input{
            display: block;
            text-align: center;
            margin: auto;
            width: 180px;
        }

        .form1 input[type="submit"]{
            width : 70px !important;
            margin-top: 16px;
        }
        
        .form2{
            width: 50%;
            float:right;
            padding-top: 100px;
        }

        .form2 h2 {
            text-align: center;
        }

        .form2 label, input{
            display: block;
            text-align: center;
            margin: auto;
            width: 180px;
        }
        
        .form2 input[type="submit"]{
            width : 70px !important;
            margin-top: 16px;
        }

        .instrucciones{
            text-align: center;
            font-weight: bolder;
            margin-top: 16px;
            color: red;
        }

        span {
            color: green;
        }
    </style>
</head>
<body>
    <p class="instrucciones">Copiar la cadena de caracteres: ' OR '1' = '1 en los distintos campos contraseña, dejando las comillas como estan para ver diferencia, <span>funcionamiento normal poner datos existentes</span></p>
    <div class="form1">
        <h2>Formulario sin seguridad</h2>
        <form method="POST">
            <label for="user">Usuario</label>
            <input type="text" name="usuario" id="user">
            <label for="pass">Contraseña</label>
            <input type="password" name="passw" id="pass">
            <input type="submit" value="Validar" name="send">
        </form>
    </div>
    <div class="form2">
        <h2>Formulario con seguridad</h2>
        <form method="POST">
            <label for="usern">Usuario</label>
            <input type="text" name="usuario1" id="usern">
            <label for="password">Contraseña</label>
            <input type="password" name="passw1" id="password">
            <input type="submit" value="Validar" name="send1">
        </form>
    </div>
        <?php
            if (isset($_POST["send"])){
            $insecureUser = $_POST["usuario"];
            $insecurePass = $_POST["passw"];

            $db_host = "localhost";
            $db_user = "root";  
            $db_pass = "";

            $str_connect = mysqli_connect($db_host, $db_user, $db_pass);

            if(mysqli_errno($str_connect)){
                    echo "No se encuentra conexion con el servidor de datos";
                    exit();
            }
            else{
                mysqli_select_db($str_connect, "ods_db");
            }
            
            $query = "SELECT * FROM USUARIOS WHERE usuario = '$insecureUser' AND password='$insecurePass'";
            $result = mysqli_query($str_connect, $query);
            $data = array("Nombre", "Usuario", "Contraseña");
            if($result){
                while($row = mysqli_fetch_row($result)){
                    for($i = 0; $i <count($row); $i++){
                        echo "$data[$i]: $row[$i]<br>";

                    }
                }
                mysqli_close($str_connect);
            }
            }

            if (isset($_POST["send1"])){
                $db_host = "localhost";
                $db_user = "root";  
                $db_pass = "";
    
                $str_connect = mysqli_connect($db_host, $db_user, $db_pass);

                //Para proteger la base de datos de posible inyeccion SQL se usa la funcion mysqli_real_escape_string
                //Existe otra funcion parecida que es mysqli_addslashes pero no es tan segura como la mencionada anhteriormente
                $secureUser = mysqli_real_escape_string($str_connect,$_POST["usuario1"]);
                $securePass = mysqli_real_escape_string($str_connect,$_POST["passw1"]);

            if(mysqli_errno($str_connect)){
                    echo "No se encuentra conexion con el servidor de datos";
                    exit();
            }
            else{
                mysqli_select_db($str_connect, "ods_db");
            }
            
            $query = "SELECT * FROM USUARIOS WHERE usuario = '$secureUser' AND password='$securePass'";
            $result = mysqli_query($str_connect, $query);
            $data = array("Nombre", "Usuario", "Contraseña");
            if($result){
                while($row = mysqli_fetch_row($result)){
                    for($i = 0; $i <count($row); $i++){
                        echo "$data[$i]: $row[$i]<br>";
                    }
                }
            mysqli_close($str_connect);
            }
            }
        ?>
</body>
</html>