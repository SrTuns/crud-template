<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_estudiante = $_POST['id_estudiante'];

    $sql = "DELETE FROM estudiantes WHERE id_estudiante=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_estudiante);
    if ($stmt->execute()) {
        echo "Estudiante eliminado con éxito.";
    } else {
        echo "Error al eliminar estudiante: " . $stmt->error;
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
    <title>Eliminar Estudiante</title>
</head>
<body>
    <h2>Eliminar Estudiante</h2>
    <form method="post">
        <label for="id_estudiante">ID del Estudiante:</label><br>
        <input type="number" id="id_estudiante" name="id_estudiante" required><br>
        <input type="submit" value="Eliminar">
    </form>
</body>
</html>
