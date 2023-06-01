<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .center{
            width: 100%;
        }

        h1, table{
            text-align: center;
            margin: auto;
            margin-top: 16px;
        }

    </style>
</head>
<body>
    <div class="center">


  <?php
    /*Este código PHP se ejecuta llamando a las variables que estan en el controlador
    usando arquitectura MVC, revisar las llamadas de los archivos en la estructura de carpetas*/

  echo "<table><tr><th>ID</th><th>NOMBRE</th><th>CATEGORIA
  </th><th>PRECIO</th><th>DISPONIBLE</th></tr>";
  foreach($product_data as $datos){
    echo "<tr>";
    foreach($datos as $valores){
        echo "<td>$valores</td>";
    }
echo "</tr>";
  }
  echo "</table>";
  ?>
  </div>  
</body>
</html>