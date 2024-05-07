<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_clase = $_POST['id_clase'];
    $nombre_clase = $_POST['nombre_clase'];
    $id_profesor = $_POST['id_profesor'];

    $sql = "UPDATE clases SET nombre_clase=?, id_profesor=? WHERE id_clase=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sii", $nombre_clase, $id_profesor, $id_clase);
    if ($stmt->execute()) {
        echo "Clase actualizada con éxito.";
    } else {
        echo "Error al actualizar clase: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>

<link rel="stylesheet" href="../styles.css">

<form method="post">
    <input type="hidden" name="id_clase" value="<?php echo $id_clase; ?>">
    <label for="nombre_clase">Nombre de la Clase:</label><br>
    <input type="text" id="nombre_clase" name="nombre_clase" value="<?php echo $nombre_clase; ?>" required><br>
    <label for="id_profesor">ID del Profesor:</label><br>
    <input type="number" id="id_profesor" name="id_profesor" value="<?php echo $id_profesor; ?>" required><br>
    <input type="submit" value="Actualizar">
</form>
