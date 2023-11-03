<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\style\login.css">
    <title>Document</title>
</head>
<body>
    <div class="div-formulario">
        <img src="..\logo\logoutp.png" alt="" class="logo">
        <form method="post" action="..\controller\validar.php">
            <h1>Sistema de Login</h1>
            <p>Email: <input type="text" placeholder="Ingrese su Email" name="email"></p>
            <p>Comtraseña: <input type="password" placeholder="Ingrese su contraseña" name="pass"></p>
            <input type="submit" value="Ingresar" class="btnEnviar">
            <p>No tienes cuaenta? <a href="crearUsuario.php">Crear cuenta</a></p>
        </form>
    </div>
</body>
</html>