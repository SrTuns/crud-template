<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_clase = $_POST['nombre_clase'];
    $id_profesor = $_POST['id_profesor'];

    $sql = "INSERT INTO clases (nombre_clase, id_profesor) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $nombre_clase, $id_profesor);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Nueva clase añadida con éxito.";
    } else {
        echo "Error al añadir clase: " . $conn->error;
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles.css">
    <title>Añadir Clase</title>
</head>
<body>
    <h2>Añadir Clase</h2>
    <form method="post">
        <label for="nombre_clase">Nombre de la Clase:</label><br>
        <input type="text" id="nombre_clase" name="nombre_clase" required><br>
        <label for="id_profesor">ID del Profesor:</label><br>
        <input type="number" id="id_profesor" name="id_profesor" required><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
