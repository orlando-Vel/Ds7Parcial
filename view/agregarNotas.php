<?php
include('../model/conexion.php');
include('../controller/funciones.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    addNote($conexion, $title, $content); // Función para agregar nota a la base de datos

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
