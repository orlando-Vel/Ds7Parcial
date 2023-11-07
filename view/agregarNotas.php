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
    $description = $_POST['description'];
    $content = $_POST['content'];

    $userId = $_SESSION['id'];

    addNote($conexion, $userId, $title, $description, $content);

    header("Location: http://localhost/Ds7Parcial2/view/inicio.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Agregar Nota</title>
    <link rel="stylesheet" href="..\style\Notas.css">
    <link rel="stylesheet" href="..\style\login.css">
</head>
<body>
    <section class="title" >
        <h1>Agregar Nota</h1>
    </section>

    <section class="block" >
        <form id="form_size" method="post" action="">
            <div class="form__group field">
                <input type="text" class="form__field" placeholder="Título" name="title" id='title'/>
                <label for="title" class="form__label">Título</label>
            </div>
            <div class="form__group field">
                <input type="text" class="form__field" placeholder="Descripción" name="description" id='description' />
                <label for="description" class="form__label">Descripción</label>
            </div>
            <div class="form__group field">
                <textarea class="form__field" placeholder="Contenido" name="content" id='content'></textarea>
                <label for="content" class="form__label">Contenido</label>
            </div>
            <div class="foot_page">
                <form class="form_foot">
                    <button class="exit" type="submit" value="Agregar Nota">Agregar Nota</button>
                </form>
            </div>
        </form>
    </section>
</body>
</html>

