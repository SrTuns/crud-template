<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_profesor = $_POST['id_profesor'];

    $sql = "DELETE FROM profesores WHERE id_profesor=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_profesor);
    if ($stmt->execute()) {
        echo "Profesor eliminado con éxito.";
    } else {
        echo "Error al eliminar profesor: " . $stmt->error;
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
    <title>Eliminar Profesor</title>
</head>
<body>
    <h2>Eliminar Profesor</h2>
    <form method="post">
        <label for="id_profesor">ID del Profesor:</label><br>
        <input type="number" id="id_profesor" name="id_profesor" required><br>
        <input type="submit" value="Eliminar">
    </form>
</body>
</html>
