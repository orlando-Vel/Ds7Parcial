<?php
function getNotes($conexion) {
    $sql = "SELECT * FROM notas";
    $statement = $conexion->query($sql);

    $notes = [];
    if ($statement) {
        $notes = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    return $notes;
}

function getNoteById($conexion, $id) {
    $sql = "SELECT * FROM notas WHERE id = :id";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();

    $note = $statement->fetch(PDO::FETCH_ASSOC);
    return $note;
}

function addNote($conexion, $title, $content) {
    $sql = "INSERT INTO notas (titulo, contenido) VALUES (:title, :content)";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':title', $title);
    $statement->bindParam(':content', $content);
    $statement->execute();
}

function updateNote($conexion, $id, $title, $content) {
    $sql = "UPDATE notas SET titulo = :title, contenido = :content WHERE id = :id";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':title', $title);
    $statement->bindParam(':content', $content);
    $statement->bindParam(':id', $id);
    $statement->execute();
}

function deleteNote($conexion, $id) {
    $sql = "DELETE FROM notas WHERE id = :id";
    $statement = $conexion->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
}

?>