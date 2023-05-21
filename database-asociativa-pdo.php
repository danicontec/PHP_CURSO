<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form{
            text-align: center;
            margin-top: 44px;
        }

        label{
            display: block;
        }

        p{
            text-align:center;
        }


    </style>
</head>
<body>
    <form method="POST">
        <label>Seccion:<input type="text" name="seccion"></label>
        <label>Pais:<input type="text" name="pais"></label>
        <input type="submit" value="Enviar" name="send">
    </form>
    <?php

    //En este programa se buscan los valores por referencia, despues se muestran
    try{

        $init = new PDO("mysql:host=localhost;dbname=ods_db", "root", "");
        $init->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //En esta consulta se indica por 'etiquetas' o referencias los datos a encontrar para no tener que buscarlos por indices ni orden especifico
        $sql = "SELECT CODIGO_ARTICULO, SECCION, PAIS_ORIGEN  FROM HOJA1 WHERE SECCION=:sec AND PAIS_ORIGEN=:pais";
        $result = $init ->prepare($sql);
        
        //Ahora en el objeto result se buscan las referencias a traves del array, deben estar escritas exactamente igual
        $result -> execute(array(":sec" => $_POST["seccion"], ":pais" => $_POST["pais"]));
        
        if(isset($_POST["send"])){
            while($row=$result->fetch(PDO::FETCH_ASSOC)){
                echo "<p>Codigo: ".$row['CODIGO_ARTICULO']. " Seccion:".$row['SECCION']." Pais:".$row['PAIS_ORIGEN']."</p>";
            }
            
            $result -> closeCursor();
        }

    } catch (Exception $e){
        
        echo "Error: " . $e -> getMessage() ;
    }

        
    ?>
</body>
</html>