<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\style\crearUsuario.css">
    <script src="..\js\dropdown.js"></script>
    <title>Document</title>
</head>
<body>
<div class="div-formulario">
        <form method="post" enctype="multipart/form-data">
            <h1>Crear Usuario</h1>
            <div class="form__group field">
                <input type="text" class="form__field" placeholder="Nombre" name="name" id='name' required />
                <label for="name" class="form__label">Nombre</label>
            </div>
            <div class="form__group field">
                <input type="text" class="form__field" placeholder="Apellido" name="lastname" id='lastname' required />
                <label for="lastname" class="form__label">Apellido</label>
            </div>
            <div class="form__group field">
                <input type="text" class="form__field" placeholder="Usuario" name="user" id='user' required />
                <label for="user" class="form__label">Usuario</label>
            </div>
            <div class="form__group field">
                <input type="email" class="form__field" placeholder="Email" name="email" id='email' required />
                <label for="email" class="form__label">Email</label>
            </div>
            <div class="form__group field">
                <input type="password" class="form__field" placeholder="Contraseña" name="pass" id='pass' required />
                <label for="pass" class="form__label">Contraseña</label>
            </div>
            <div class="select">
                <select name="rol" id="rol" required>
                    <option value="" disabled>Rol</option>
                    <option value="usuario">Usuario</option>
                    <option value="administrador">Administrador</option>
                </select>
            </div>
            <!--
            <p>Rol</p>
            <select name="rol" required>
                <option value="usuario">Usuario</option>
                <option value="administrador">Administrador</option>
            </select> -->
            <input type="submit" value="Enviar" class="btnEnviar" name="registro">
            <p>Tienes una cuenta?<a href="login.php">Login</a></p>
        </form>
        <?php
        include("../model/registro.php");
        ?>
    </div>
</body>
</html>