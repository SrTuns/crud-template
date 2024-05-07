<?php
include '../db.php';

// Procesar el formulario de actualización
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id_estudiante = $_POST['id_estudiante'];
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $id_clase = $_POST['id_clase'];

    $sql = "UPDATE estudiantes SET nombre=?, edad=?, id_clase=? WHERE id_estudiante=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siii", $nombre, $edad, $id_clase, $id_estudiante);
    if ($stmt->execute()) {
        echo "Registro actualizado con éxito.";
    } else {
        echo "Error al actualizar registro: " . $stmt->error;
    }
    $stmt->close();
}

// Formulario para seleccionar el estudiante a actualizar
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['edit'])) {
    $id_estudiante = $_GET['id_estudiante'];
    $sql = "SELECT nombre, edad, id_clase FROM estudiantes WHERE id_estudiante=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_estudiante);
    $stmt->execute();
    $stmt->bind_result($nombre, $edad, $id_clase);
    $stmt->fetch();
    $stmt->close();
?>

<link rel="stylesheet" href="../styles.css">

<form method="post">
    <input type="hidden" name="id_estudiante" value="<?php echo $id_estudiante; ?>">
    <label for="nombre">Nombre:</label><br>
    <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required><br>
    <label for="edad">Edad:</label><br>
    <input type="number" id="edad" name="edad" value="<?php echo $edad; ?>" required><br>
    <label for="id_clase">ID Clase:</label><br>
    <input type="number" id="id_clase" name="id_clase" value="<?php echo $id_clase; ?>" required><br>
    <input type="submit" name="update" value="Actualizar">
</form>

<?php
}
$conn->close();
?>
