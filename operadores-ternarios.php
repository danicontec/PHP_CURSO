<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form{
            width: 400px;
            margin: auto;
            border: 3px solid #333;
            padding: 2px;
            background-color: #3324FF;
        }

        label, input{
            display: block;
            margin: 0 auto 0 auto;
            text-align: center;
        }

        form :nth-last-child(1){
            margin-bottom: 12px;
            margin-top: 2px;
        }
        .centrado {
            text-align: center;
        }
    </style>
</head>
<body>
    <form method="post">
        <label for="">Primer Valor</label><br/>
        <input type="text" name="valor1" id="valor1"><br/>
        <label for="">Segundo Valor</label><br/>
        <input type="text" name="valor2" id="valor2"><br/>
        <input type="submit" value="enviar">
    </form>

    <?php
    $data1 = $_POST["valor1"];
    $data2 = $_POST["valor2"];
    $ternario1 = $data1 == "" ? "El primer valor no tiene datos asociados" : "El primer valor tiene asociado $data1 <br/>";
    $ternario2 = $data2 == "" ? "El segundo valor no tiene datos asociados" : "El segundo valor tiene asociado $data2<br/>";
        echo "<p class='centrado'>$ternario1</p>";
        echo "<p class='centrado'>$ternario2</p>";


    ?>
</body>
</html>