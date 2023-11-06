<?php

function getNotes($conexion, $id_usuario) {
    $sql = "SELECT * FROM notas WHERE id_usuario = :id_usuario";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':id_usuario', $id_usuario);
    $statement->execute();

    $notes = [];
    if ($statement) {
        $notes = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    return $notes;
}

function getNoteById($conexion, $id_nota) {
    $sql = "SELECT * FROM notas WHERE id_nota = :id_nota";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':id_nota', $id_nota);
    $statement->execute();

    $note = $statement->fetch(PDO::FETCH_ASSOC);
    return $note;
}


function addNote($conexion, $id_usuario, $titulo, $contenido) {
    try {
        $sql = "INSERT INTO notas (id_usuario, titulo, contenido) VALUES (:id_usuario, :titulo, :contenido)";
        $statement = $conexion->prepare($sql);
        $statement->bindParam(':id_usuario', $id_usuario);
        $statement->bindParam(':titulo', $titulo);
        $statement->bindParam(':contenido', $contenido);
        $statement->execute();
    } catch (PDOException $e) {
        echo "Error al guardar la nota: " . $e->getMessage();
    }
}


function updateNote($conexion, $id_nota, $titulo, $contenido) {
    $sql = "UPDATE notas SET titulo = :titulo, contenido = :contenido WHERE id_nota = :id_nota";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':titulo', $titulo);
    $statement->bindParam(':contenido', $contenido);
    $statement->bindParam(':id_nota', $id_nota);
    $statement->execute();
}



function deleteNote($conexion, $id_nota) {
    try {
        $sql = "DELETE FROM notas WHERE id_nota = :id_nota";
        $statement = $conexion->prepare($sql);
        $statement->bindParam(':id_nota', $id_nota);
        $statement->execute();
    } catch (PDOException $e) {
        echo "Error al borrar la nota: " . $e->getMessage();
    }
}

function getCountOfNotes($conexion) {
    $sql = "SELECT usuarios.usuario, COUNT(notas.id_nota) as cantidad_notas 
    FROM usuarios
    LEFT JOIN notas ON usuarios.id = notas.id_usuario 
    WHERE usuarios.rol != 'administrador' 
    GROUP BY usuarios.id";

    $stmt = $conexion->query($sql);

    $notasPorUsuario = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $usuario = array(
        "usuario" => $row["usuario"],
        "cantidad_notas" => $row["cantidad_notas"]
    );
    $notasPorUsuario[] = $usuario;
    }

    return $notasPorUsuario;
}

?>