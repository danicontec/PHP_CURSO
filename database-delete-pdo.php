<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    form{
        margin: auto;
        width: 300px;
        background-color: orange;
    }

    label,input{
        margin: auto;
        text-align: center;
    }

    label {
        font-weight: bolder;
        color: blue;
    }

    p{
        text-align: center;
    }


</style>
<body>
    <form method="POST">
    <label for="cod">Codigo</label>
    <input type="text" name="codigo" id="cod">
    <input type="submit" value="Enviar" name="send">
    </form>

    <?php
        $open = new PDO("mysql:host=localhost;dbname=ods_db","root","");
        $open->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM HOJA1 WHERE CODIGO_ARTICULO = :cod";
        $result = $open->prepare($sql);

        if(isset($_POST["send"])){

            $result -> execute(array(":cod"=>$_POST["codigo"]));
            if($result){
                echo "<p>Articulo eliminado</p>";
            }

        }
        
    ?>
</body>
</html>