<?php
include('../model/conexion.php');
include('../controller/funciones.php');

$note = null;

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $note = getNoteById($conexion, $_GET['id']); // Función para obtener una nota por su ID
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    updateNote($conexion, $id, $title, $content); // Función para actualizar una nota

    header("Location: http://localhost/Ds7Parcial2/view/inicio.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Nota</title>
</head>
<body>
    <h1>Editar Nota</h1>

    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $note['id']; ?>">
        Título: <input type="text" name="title" value="<?php echo $note['titulo']; ?>"><br>
        Contenido: <textarea name="content"><?php echo $note['contenido']; ?></textarea><br>
        <input type="submit" value="Actualizar Nota">
    </form>
</body>
</html>
