<?php
include('../model/conexion.php');
include('funciones.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    deleteNote($conexion, $_GET['id']); // Función para eliminar una nota

    header("Location: http://localhost/Ds7Parcial2/view/inicio.php");
}
?>
