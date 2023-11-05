<?php
session_start();

include("../model/conexion.php");

$email = $_POST['email'];
$contrasena = $_POST['pass'];

if (empty($email) || empty($contrasena)) {
    echo '<script>
    alert("Por favor, ingresa correo y contraseña.");
    window.location.href = "../view/login.php";
    </script>';
    exit;
}

try {
    $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $fila = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($fila && password_verify($contrasena, $fila['password'])) {
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $fila['id'];
        header('Location: http://localhost/Ds7Parcial2/view/inicio.php');
        exit;
    } else {
        echo '<script>
            alert("Credenciales incorrectas.");
            window.location.href = "../view/login.php";
            </script>';
        exit;
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>