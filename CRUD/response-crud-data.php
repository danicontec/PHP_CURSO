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
        }

        p{
            text-align: center;
        }

        form.form1 {
            text-align: center;
            margin-bottom: 20px;
        }

        input {
            margin: 0 12px 0;
        }

        table {
            margin: auto;
            background-color: orangered;
            color: white;
            text-align: center;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 5px;
        }

        td {
            color: violet;
        }

        td:hover {
            color: purple;
        }
    </style>
</head>
<body>
    <h2>Manejo de productos CRUD</h2>
    <form class="form1" method="GET">
        <input type="submit" value="ver" name="show">
        <input type="submit" value="borrar" name="delete">
        <input type="submit" value="insertar" name="insert">
        <input type="submit" value="cambiar" name="change">
    </form>

    <?php
    require("products-pdo.php");
    $products = new ManageProducts();

    if (isset($_GET['show'])) {
        $data = $products->showProducts();

        if (sizeof($data) > 0) {
            echo "<table><tr><th>ID</th><th>NOMBRE</th><th>SECCION</th><th>PRECIO</th><th>DISPONIBILIDAD</th></tr>";
            foreach ($data as $valor) {
                echo "<tr>";
                foreach ($valor as $valor2) {
                    echo "<td>" . $valor2 . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
    }

    if (isset($_GET['delete'])) {
        $data = $products->showProducts();
        $i = 0;

        if (sizeof($data) > 0) {
            echo "<table><tr><th>ID</th><th>NOMBRE</th><th>SECCION</th><th>PRECIO</th><th>DISPONIBILIDAD</th><th>Eliminar</th></tr>";
            foreach ($data as $valor) {
                echo "<tr>";
                foreach ($valor as $valor2) {
                    echo "<td>" . $valor2 . "</td>";
                }
                $i++;
                echo "<td>
                    <form method='POST'>
                        <input type='hidden' name='productId' value='" . $valor['ID'] . "'>
                        <input type='submit' value='Eliminar' name='delete".$i."'>
                    </form>
                </td>";
                if (isset($_POST['delete'.$i])) {
                    $productId = $_POST['productId'];
                    $products->deleteProduct($productId);
                }
                echo "</tr>";
            }
            echo "</table>";
        }
    }

    if(isset($_GET["insert"])){
        echo "<form method='POST'><table><tr><th>NOMBRE</th><th>CATEGORIA</th><th>PRECIO</th><th>DISPONIBLE</th><th>Insertar</th></tr>";
        echo "<tr><td><input type='text' placeholder='texto' name='name'></td><td><input type='text' placeholder='texto' name='cat'></td>
        <td><input type='text' placeholder='num decimal' name='prec'></td><td><input type='text' placeholder='0: No, 1: Si' name='disp'></td><td>
        <input type='submit' value='insertar' name='act'></td></tr></table></form>";

        if(isset($_POST["act"])){

            $name = $_POST["name"];
            $cat = $_POST["cat"];
            $prec = $_POST["prec"];
            $disp = $_POST["disp"];

            $products ->insertProduct($name, $cat, $prec, $disp);

        }
    }

    if(isset($_GET["change"])){

        $data = $products ->showProducts();
        $id = 0;
        $name = "";
        if(sizeof($data)>0){
            echo "<table><tr><th>ID</th><th>NOMBRE</th><th>CATEGORIA</th><th>PRECIO</th>
            <th>DISPONIBLE</th><th>Accion</th></tr>";

            foreach ($data as $valor) {
                echo "<tr>";
                foreach ($valor as $valor2) {
                    if($valor["ID"] == $valor2){
                        $id = $valor2;
                        echo "<td>". $valor2. "</td>";
                    } else {
                        if($valor["NOMBRE"]==$valor2){
                            $name = "name";
                        }
                        if($valor["CATEGORIA"]==$valor2){
                            $name = "cate";
                        }
                        if($valor["PRECIO"]==$valor2){
                            $name = "pre";
                        }
                        if($valor["DISPONIBLE"]==$valor2){
                            $name = "disp";
                        }
                        echo "<form method='POST'><td><input type='text' name='$name' value='$valor2'></td>";
                        
                    }
                    
                }
                echo "<td>
                <input type='submit' name='upda' value='Actualizar'>
                </td></form></tr>";
                
                if(isset($_POST["upda"])){
                    $idr = $id;
                    $name = $_POST["name"];
                    $cat = $_POST["cate"];
                    $pre = $_POST["pre"];
                    $dis = $_POST["disp"];
                    $products -> updateProduct($idr, $name, $cat, $pre, $dis);
                }
            }

        } else {
            echo "<p>No se han encontrado registros que actualizar</p>";
        }

    }
    ?>
</body>
</html>
