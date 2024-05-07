<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $id_clase = $_POST['id_clase'];

    $sql = "INSERT INTO estudiantes (nombre, edad, id_clase) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sii", $nombre, $edad, $id_clase);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Nuevo estudiante añadido con éxito.";
    } else {
        echo "Error al añadir estudiante: " . $conn->error;
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
    <title>Añadir Estudiante</title>
</head>
<body>
    <h2>Añadir Estudiante</h2>
    <form method="post">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br>
        <label for="edad">Edad:</label><br>
        <input type="number" id="edad" name="edad" required><br>
        <label for="id_clase">ID Clase:</label><br>
        <input type="number" id="id_clase" name="id_clase" required><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
