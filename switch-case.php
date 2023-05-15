<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form{
            width: 300px;
            margin: auto;
            background-color: purple;
            color: white;
            border: 4px solid red;
        }

        label, input {
            display: block;
            margin: auto;
            text-align: center;
        }

        .text{
            text-align: center; 
        }
    </style>
</head>
<body>
    <form method="post">
        <label for="">Datos a analizar</label><br/>
        <input type="text" name="data1"><br/>
        <input type="submit" value="enviar" name="send">
    </form>
    <?php 
    $data = $_POST["data1"];
        if(isset($_POST["send"])){
    switch($data){
        case "Dani":
            echo "<p class='text'>Es Dani</p>";
            break;
        case "Debo":
            echo "<p class='text'>Es Debo</p>";
            break;
        case "":
            echo "<p class='text'>No introdujiste nada</p>";
            break;
        default:
            echo "<p class='text'>Has introducido un valor que no es Dani ni Debo</p>";
    }
}
    ?>
</body>
</html>