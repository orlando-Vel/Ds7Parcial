<?php
session_start();

include("../model/conexion.php");

$email = mysqli_real_escape_string($conexion, $_POST['email']);
$contrasena = $_POST['pass'];

if (empty($email) || empty($contrasena)) {
    echo '<script>
    alert("Por favor, ingresa correo y contraseña.");
    window.location.href = "../view/login.php";
    </script>';
    exit;
}

$consulta = "SELECT * FROM usuarios WHERE email = '$email'";
$resultado = mysqli_query($conexion, $consulta);

if ($fila = mysqli_fetch_assoc($resultado)) {
    if (password_verify($contrasena, $fila['password'])) {
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $fila['id'];
        header('Location: http://localhost/Ds7Parcial2/view/inicio.php');
        exit;
    }
}

echo '<script>
    alert("Credenciales incorrectas.");
    window.location.href = "../view/login.php";
    </script>';
mysqli_close($conexion);
?>