<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_clase = $_POST['id_clase'];

    $sql = "DELETE FROM clases WHERE id_clase=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_clase);
    if ($stmt->execute()) {
        echo "Clase eliminada con éxito.";
    } else {
        echo "Error al eliminar clase: " . $stmt->error;
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
    <title>Eliminar Clase</title>
</head>
<body>
    <h2>Eliminar Clase</h2>
    <form method="post">
        <label for="id_clase">ID de la Clase:</label><br>
        <input type="number" id="id_clase" name="id_clase" required><br>
        <input type="submit" value="Eliminar">
    </form>
</body>
</html>
