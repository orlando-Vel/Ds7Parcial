<?php
session_start();

// Verificar si la sesión está iniciada
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header('Location: http://localhost/Ds7Parcial2/view/login.php');
    exit;
}

// Cerrar la sesión
if (isset($_POST['cerrar_sesion'])) {
    session_unset();
    session_destroy();
    header('Location: http://localhost/Ds7Parcial2/view/login.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Recuento de Notas por Usuario</title>
</head>
<body>
    <h1>Recuento de Notas por Usuario</h1>

    <?php
    include('../model/conexion.php');
    include('../controller/funciones.php');

    $notasPorUsuario =  getCountOfNotes($conexion);

    if ($notasPorUsuario) {
        echo "<table border='1'>";
        echo "<tr><th>Nombre de Usuario</th><th>Cantidad de Notas</th></tr>";
        foreach ($notasPorUsuario as $usuario) {
            echo "<tr>";
            echo "<td>".$usuario['usuario']."</td>"; // Asegúrate que la clave sea 'usuario'
            echo "<td>".$usuario['cantidad_notas']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontraron resultados.";
    }
    ?>

    <div>
        <form method="post">
            <button type="submit" name="cerrar_sesion">Cerrar Sesión</button>
        </form>
    </div>
</body>
</html>
