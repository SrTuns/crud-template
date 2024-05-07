<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $especialidad = $_POST['especialidad'];

    $sql = "INSERT INTO profesores (nombre, especialidad) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $nombre, $especialidad);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Nuevo profesor añadido con éxito.";
    } else {
        echo "Error al añadir profesor: " . $conn->error;
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
    <title>Añadir Profesor</title>
</head>
<body>
    <h2>Añadir Profesor</h2>
    <form method="post">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br>
        <label for="especialidad">Especialidad:</label><br>
        <input type="text" id="especialidad" name="especialidad" required><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
