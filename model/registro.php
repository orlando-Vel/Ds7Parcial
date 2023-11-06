<?php
include("conexion.php");

if (isset($_POST['registro'])) {
    $name = trim($_POST['name']);
    $lastname = trim($_POST['lastname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['pass']);
    $usuario = trim($_POST['user']);
    $rol = trim($_POST['rol']);

    //cifra la contraseña
    $passCifrado = password_hash($password, PASSWORD_DEFAULT);

    try {
        $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, apellido, email, password, usuario, rol) VALUES (:name, :lastname, :email, :password, :usuario, :rol)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $passCifrado);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':rol', $rol);
        $stmt->execute();
        
        echo "Tu registro se ha completado";
        echo '<meta http-equiv="refresh" content="3;url=http://localhost/Ds7Parcial2/view/login.php">';
    } catch (PDOException $e) {
        echo "Error en el registro. Regresa para intentar nuevamente.";
    }
}
?>