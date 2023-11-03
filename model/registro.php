<?php
include("conexion.php");

if (isset($_POST['registro'])) {
    $name = trim($_POST['name']);
    $lastname = trim($_POST['lastname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['pass']);
    $usuario = trim($_POST['user']);
    

    //cifra la contraseña
    $passCifrado = password_hash($password, PASSWORD_DEFAULT);
    
    $consulta = "INSERT INTO usuarios (nombre, apellido, email, password, usuario)
                VALUES ('$name', '$lastname', '$email', '$passCifrado','$usuario')";

    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        echo "Tu registro se ha completado";
        echo '<meta http-equiv="refresh" content="3;url=http://localhost/Ds7Parcial2/view/login.php">';
    } else {
        echo "Error en el registro. Regresa para intentar nuevamente.";
    }
}
?>