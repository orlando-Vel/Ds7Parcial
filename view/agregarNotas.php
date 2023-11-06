<?php
session_start();

// Verificar si la sesión está iniciada
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header('Location: http://localhost/Ds7Parcial2/view/login.php');
    exit;
}

include('../model/conexion.php');
include('../controller/funciones.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $userId = $_SESSION['id'];

    addNote($conexion, $userId, $title, $content); // Solo pasamos el ID de usuario, título y contenido

    header("Location: http://localhost/Ds7Parcial2/view/inicio.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Agregar Nota</title>
</head>
<body>
    <h1>Agregar Nota</h1>

    <form method="post" action="">
        Título: <input type="text" name="title"><br>
        Contenido: <textarea name="content"></textarea><br>
        <input type="submit" value="Agregar Nota">
    </form>
</body>
</html>
