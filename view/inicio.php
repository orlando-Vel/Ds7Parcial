<?php
session_start();

// Verificar si la sesión está iniciada
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header('Location: http://localhost/Ds7Parcial2/view/login.php');
    exit;
}


$id_usuario = $_SESSION['id'];


// Cerrar la sesión
if (isset($_POST['cerrar_sesion'])) {
    session_unset();
    session_destroy();
    header('Location: http://localhost/Ds7Parcial2/view/login.php');
    exit;
}

include ('..\controller\funciones.php');
include ('..\model\conexion.php');

$notes = getNotes($conexion, $id_usuario);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Blog de Notas</title>
</head>
<body>
    <h1>Mis Notas</h1>

    <a href="agregarNotas.php">Agregar Nota</a>

    <ul>
        <?php foreach ($notes as $note) { ?>
            <li>
                <?php echo $note['titulo']; ?>
                <a href="editarNotas.php?id=<?php echo $note['id_nota']; ?>">Editar</a>
                <a href="../controller/borrarNotas.php ?id= <?php echo $note['id_nota']; ?>">Eliminar</a>
            </li>
        <?php } ?>
    </ul>

    <div>
        <form method="post">
            <button type="submit" name="cerrar_sesion">Cerrar Sesión</button>
        </form>
    </div>
</body>
</html>

