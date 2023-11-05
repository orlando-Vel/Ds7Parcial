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
            <div class="form__group field">
                <input type="email" class="form__field" placeholder="Ingrese su Email" name="email" id='email' required />
                <label for="email" class="form__label">Email</label>
                <input type="password" class="form__field" placeholder="Ingrese su contraseña" name="pass" id='pass' required />
                <label for="password" class="form__label">Contraseña</label>
            </div>

            <input type="submit" value="Ingresar" class="btnEnviar">
            <hr>
            <p>No tienes cuaenta? <a href="crearUsuario.php">Crear cuenta</a></p>
        </form>
    </div>
</body>
</html>