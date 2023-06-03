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

        h2 {
            text-align: center;
        }

        form{
            margin: 4px auto;
            border: 2px solid gray;
            width:fit-content;
            padding: 6px;
            background-color: #674352;
        }

        table{
            margin: 20px auto;
            border: 2px solid gray;
            background-color: coral;
            border-collapse: collapse;
            overflow: hidden;
        }

        tr, th, td {
            border: 2px solid gray;
            text-align: center
        }

        td{
            max-width: fit-content;
            max-height: 50px;
        }

    </style>
</head>
<body>

    <h2>Elige una opcion</h2>
    <form method="GET">
        <input type="submit" value="Mostrar" name="mostrar">
        <input type="submit" value="Insertar" name="insertar">
        <input type="submit" value="Borrar" name="borrar">
    </form>
    <?php
        require_once("manage-images.php");
        $images = new ManageImages();
       
        if(isset($_GET["mostrar"])){
            $list = $images ->showImageProducts();

            if(sizeof($list)>0){
                echo "<table><tr><th>ID</th><th>NOMBRE</th><th>TIPO</th><th>CONTENIDO</th></tr>";
                
                foreach($list as $item){
                    echo "<tr>";
                    foreach($item as $value){

                        /*Dado que los caracteres de la imagen guardada estan en binario y se iran a muchisimos
                         caracteres se limita a 25 e imprime tres puntos suspensivos*/
                        echo "<td>";
                        if(strlen($value) > 25) {
                            $shortenedValue = substr($value, 0, 25) . "...";
                            echo "<span>$shortenedValue</span>";
                        } else {
                            echo $value;
                        } echo "</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            }

            else {
                echo "<p>No se encontraron datos con las imagenes asociadas";
            }
        }

        if(isset($_GET["insertar"])){
            echo "<form method='POST' enctype='multipart/form-data'><table><tr><th>NOMBRE</th><th>TIPO</th><th>CONTENIDO</th><th>ACCION</th></tr>";
            echo "<tr>
            <td><input type='text' name='name'></td>
            <td><input type='text' name='tipo'></td>
            <td><input type='file' name='contenido'></td>
            <td><input type='submit' value='Insertar' name='insert'></td>
            </tr></table></form>";

            if(isset($_POST["insert"])){

                /*De esta manera los archivos no pasan por el servidor solo se recogen los bytes 
                desde la carpeta temporal que se crea al subir el archivo*/

                $name = $_FILES["contenido"]["name"];
                $tmp_name = $_FILES["contenido"]["tmp_name"];
                $size = $_FILES["contenido"]["size"];

                if (move_uploaded_file($tmp_name, $name)) {
                    $contenido = file_get_contents($name);
                    $images->insertImageProduct($_POST["name"], $_POST["tipo"], $contenido);
                    echo "<p>Archivo subido correctamente.</p>";
                } else {
                    echo "<p>Ocurrió un error al subir el archivo.</p>";
                }
            }
        }

        if (isset($_GET["borrar"])) {
            $data = $images->showImageProducts();
            $i = 0;
    
            if (sizeof($data) > 0) {
                echo "<table><tr><th>ID</th><th>NOMBRE</th><th>TIPO</th><th>CONTENIDO</th><th>ACCION</th></tr>";
                foreach ($data as $valor) {
                    echo "<tr>";
                    foreach ($valor as $valor2) {
                        echo "<td>" . $valor2 . "</td>";
                    }
                    $i++;
                    echo "<td>
                        <form method='POST'>
                            <input type='hidden' name='imageId' value='" . $valor['ID'] . "'>
                            <input type='submit' value='Eliminar' name='delete".$i."'>
                        </form>
                    </td>";
                    if (isset($_POST["delete$i"])) {
                        
                        $imageId = $_POST['imageId'];
                        $images->deleteImageProduct($imageId);
                    }
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No se ha encontrado ningun achivo que borrar</p>";
            }
        }

    ?>
</body>
</html>