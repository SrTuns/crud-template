<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_profesor = $_POST['id_profesor'];
    $nombre = $_POST['nombre'];
    $especialidad = $_POST['especialidad'];

    $sql = "UPDATE profesores SET nombre=?, especialidad=? WHERE id_profesor=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $nombre, $especialidad, $id_profesor);
    if ($stmt->execute()) {
        echo "Profesor actualizado con éxito.";
    } else {
        echo "Error al actualizar profesor: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>

<link rel="stylesheet" href="../styles.css">

<form method="post">
    <input type="hidden" name="id_profesor" value="<?php echo $id_profesor; ?>">
    <label for="nombre">Nombre:</label><br>
    <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required><br>
    <label for="especialidad">Especialidad:</label><br>
    <input type="text" id="especialidad" name="especialidad" value="<?php echo $especialidad; ?>" required><br>
    <input type="submit" value="Actualizar">
</form>
