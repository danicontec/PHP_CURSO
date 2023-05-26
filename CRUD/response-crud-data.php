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
        require("products-pdo.php");
        $products = new ManageProducts();
        $data = $products -> showProducts();
        foreach($data as $clave=>$valor){
            foreach($valor as $clave2=>$valor2){

                echo $valor2;
            }
        }
    ?>
</body>
</html>