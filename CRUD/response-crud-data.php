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
        
        form.selection{
            text-align: center;
            margin-bottom: 16px;
        }

        div.links{
            margin-top: 16px;
            text-align: center;
            font-size: 28px;
        }

        div.links a {
            text-decoration: none;
            color: violet;
        }

        div.links a:hover {
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
        <input type="submit" value="paginacion" name="pag">
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
        
        $i = 0;
        $data = $products ->showProducts();
        $id = 0;
        $name = "";
        if(sizeof($data)>0){
            echo "<table><tr><th>ID</th><th>NOMBRE</th><th>CATEGORIA</th><th>PRECIO</th>
            <th>DISPONIBLE</th><th>Accion</th></tr>";

            foreach ($data as $valor) {
                echo "<tr>";
                foreach ($valor as $valor2) {
                    $i++;
                    if($valor["ID"] == $valor2){
                        $id = $valor2;
                        echo "<td>". $valor2. "</td>";
                    } 
                    else{

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
                <input type='submit' name='upda$i' value='Actualizar'>
                </td></form></tr>";
                
                if(isset($_POST["upda$i"])){
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

    //Codigo de Paginacion, por terminar registros, captura de registros en funcion de la pagina
    if(isset($_GET["pag"])){
        $total = $products ->showProducts();
        $total_reg = sizeof($total);
        $valor_inicial = 0;
        $paginas = 0;
        
        if($total_reg == 0){
            echo "<p>No se han encontrado registros</p>";
        } else if ($total_reg <=3) {
            echo "<table><tr>ID<th><th>NOMBRE</th><th>CATEGORIA</th><th>PRECIO</th><th>DISPONIBLE</th></tr>";
            foreach ($total as $valor) {
                foreach($valor as $valorreg){
                    echo "<tr><td>". $valorreg. "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else if ($total_reg >3){
            echo "<form method='POST' class='selection'>
            <label>Mostrar:</label>
                <select name='cantidad'>
                    <option value='2'>2</option>
                    <option value='4'>4</option>
                    <option value='6'>6</option>
                    <option value='8'>8</option>
                </select>
                <input type='submit' value='enviar' name='size'>
            </form>";

            if(isset($_POST["size"])){
                $registros = $_POST["cantidad"];
                $paginas = ceil($total_reg/$registros);
                $table = $products ->paginaProductos($valor_inicial, $registros);

                echo "<table><tr><th>ID</th><th>NOMBRE</th>
                <th>CATEGORIA</th><th>PRECIO</th>
                <th>DISPONIBLE</th></tr>";
                foreach($table as $valor){
                    echo "<tr>";
                    foreach($valor as $valorreg){
                        echo "<td>$valorreg</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
                echo "<div class='links'><form method='POST'>";
                for($i=1;$i<=$paginas;$i++){
                    echo "<input type='submit' name='pag$i' value='$i'>";
                }
                echo "</form></div>";

                if(isset($_POST["pag$i"])){
                    header("Location: index");
                    $pagina = $_POST["pag$i"];
                    if($pagina == 1){
                        $table = $products ->paginaProductos($valor_inicial, $registros);

                echo "<table><tr><th>ID</th><th>NOMBRE</th>
                <th>CATEGORIA</th><th>PRECIO</th>
                <th>DISPONIBLE</th></tr>";
                foreach($table as $valor){
                    echo "<tr>";
                    foreach($valor as $valorreg){
                        echo "<td>$valorreg</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
                }


                }
            }
        }
    }
    ?>
</body>
</html>
