<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Blog</h2>
    <hr>
    <?php
        require("properties-blog.php");
        $init = mysqli_connect(HOST, USER, PASS, NAME);

        if(mysqli_error($init)){

            echo "<p>Error generado en: " . mysqli_error($init);
        }

        $sql = "SELECT * FROM CONTENIDO ORDER BY FECHA DESC";
        
        if($row=mysqli_query($init,$sql)){
            while($data = mysqli_fetch_assoc($row)){
                echo "<h3>".$data['TITULO']."</h3>";
                echo "<h4>".$data['FECHA']."</h4>";
                echo "<p>".$data['COMENTARIO']."</p>";

                if($data['IMAGEN']!=""){
                    echo "<img src='../../img/upload/".$data['IMAGEN'] ."' width=300 height=200 >";
                }
                echo "<hr>";
            }
        }
    ?>
</body>
</html>