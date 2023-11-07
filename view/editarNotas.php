<?php
include('../model/conexion.php');
include('../controller/funciones.php');

if (isset($_GET['id'])) {
    $id_nota = $_GET['id'];

    $nota = getNoteById($conexion, $id_nota);

    if ($nota) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['titulo']) && isset($_POST['contenido']) && isset($_POST['descripcion'])) {
                $nuevo_titulo = $_POST['titulo'];
                $nuevo_contenido = $_POST['contenido'];
                $nueva_descripcion = $_POST['descripcion'];

                updateNote($conexion, $id_nota, $nuevo_titulo, $nuevo_contenido, $nueva_descripcion);

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
    <link rel="stylesheet" href="..\style\Notas.css">
    <link rel="stylesheet" href="..\style\login.css">
</head>
<body>

<?php if ($nota) : ?>
    <section class="title" >
        <h1>Editar Nota</h1>
    </section>

    <section class="block" >
        <form id="form_size" method="post">
            <div class="form__group field">
                <input type="text" class="form__field" placeholder="Título" name="titulo" id='titulo' value="<?php echo $nota['titulo']; ?>"/>
                <label for="titulo" class="form__label">Título</label>
            </div>

            <div class="form__group field">
                <textarea class="form__field" placeholder="Descripción" name="descripcion" id='descripcion'><?php echo $nota['descripcion']; ?></textarea>
                <label for="descripcion" class="form__label">Descripción</label>
            </div>

            <div class="form__group field">
                <textarea class="form__field" placeholder="Contenido" name="contenido" id='contenido'><?php echo $nota['contenido']; ?></textarea>
                <label for="contenido" class="form__label">Contenido</label>
            </div>

            <!--
            <label for="titulo">Título:</label><br>
            <input type="text" id="titulo" name="titulo" value="<?php echo $nota['titulo']; ?>"><br><br>

            <label for="descripcion">Descripción:</label><br>
            <textarea id="descripcion" name="descripcion"><?php echo $nota['descripcion']; ?></textarea><br><br>

            <label for="contenido">Contenido:</label><br>
            <textarea id="contenido" name="contenido"><?php echo $nota['contenido']; ?></textarea><br><br> -->

            <div class="foot_page">
                <form class="form_foot">
                    <button class="exit" type="submit" value="Guardar Cambios">Guardar Cambios</button>
                </form>
            </div>
        </form>
    </section>
<?php endif; ?>

</body>
</html>
