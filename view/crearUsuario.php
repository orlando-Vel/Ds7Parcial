<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\style\crearUsuario.css">
    <title>Document</title>
</head>
<body>
<div class="div-formulario">
        <form method="post" enctype="multipart/form-data">
            <h1>Crear Usuario</h1>
            <p>Nombre</p>
            <input type="text" placeholder="Ingrese su Nombre" name="name" required>
            <p>Apellido</p>
            <input type="text" placeholder="Ingrese su Apellido" name="lastname" required>
            <p>Usuario</p>
            <input type="text" placeholder="Ingrese su usuario" name="user" required>
            <p>Email</p>
            <input type="email" placeholder="Ingrese su Email" name="email" required>
            <p>Contraseña</p>
            <input type="password" placeholder="Ingrese su Contraseña" name="pass" required>
            <input type="submit" value="Enviar" class="btnEnviar" name="registro">
            <p>Tienes una cuenta?<a href="login.php">Login</a></p>
        </form>
        <?php
        include("../model/registro.php");
        ?>
    </div>
</body>
</html>