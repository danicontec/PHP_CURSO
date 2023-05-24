<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Login</h2>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="user">Usuario</label>
            <input type="text" id="user" name="usuario">
            <label for="pass">Contraseña</label>
            <input type="password" id="pass" name="password">
            <input type="submit" value="Entrar" name="send">
        </form>
</body>
</html>