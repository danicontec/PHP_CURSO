<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=ç, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            padding: 0;
            margin: 0;
        }

        h2{
            text-align: center;
        }

        form{
            display: block;
            width: 600px;
            text-align: center;
            margin: 2px auto;
            background-color: green;
            color: white;
            font-weight: bolder;
            padding-bottom: 8px;
            padding-top: 8px;
            border: 8px dotted black;
        }

        label, input,textarea{
            display: block;
            margin: 8px auto;
        }

        input[type="submit"]{
            background-color: cyan;
            width: 88px;
            height: 24px;
        }

        a{
            color: white;
            text-decoration: none;
        }

        p{
            font-size: 24px;
        }
        p :hover{
            color: yellow;
        }
    </style>
</head>
<body>
    <h2>Nueva entrada</h2>
    <form method="POST" action="contenido" enctype="multipart/form-data" name="form1">
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" id="titulo">
        <label for="comentarios">Comentarios:</label>
        <textarea name="comentarios" id="comentarios" cols="30" rows="10"></textarea>
        <input type="hidden" name="MAX_TAM" value="2097152">
        <span>Seleccione una imagen inferior a 2MB</span> 
        <input type="file" name="imagen" id="imagen">
        <input type="submit" value="Enviar" name="enviar">
        <p><a href="mostrar-blog.php">Pagina de visualizacion del Blog</a></p>   
    </form>
</body>
</html>