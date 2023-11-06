<?php
include('../model/conexion.php');
include('../controller/funciones.php');

if (isset($_GET['id'])) {
    $id_nota = $_GET['id'];

    $nota = getNoteById($conexion, $id_nota);

    if ($nota) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['titulo']) && isset($_POST['contenido'])) {
                $nuevo_titulo = $_POST['titulo'];
                $nuevo_contenido = $_POST['contenido'];

                updateNote($conexion, $id_nota, $nuevo_titulo, $nuevo_contenido);

                header("Location: http://localhost/Ds7Parcial2/view/inicio.php");
                exit;
            }
        }
    } else {
        echo "Nota no encontrada.";
    }
} else {
    echo "ID de nota no proporcionado.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Nota</title>
</head>
<body>

<?php if ($nota) : ?>
    <h2>Editar Nota</h2>
    <form method="post">
        <label for="titulo">Título:</label><br>
        <input type="text" id="titulo" name="titulo" value="<?php echo $nota['titulo']; ?>"><br><br>

        <label for="contenido">Contenido:</label><br>
        <textarea id="contenido" name="contenido"><?php echo $nota['contenido']; ?></textarea><br><br>

        <input type="submit" value="Guardar Cambios">
    </form>
<?php endif; ?>

</body>
</html>
